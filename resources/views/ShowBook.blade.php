<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Viewer</title>
    <link rel="stylesheet" href="{{ asset('CSS/bookview.css') }}">
</head>
<body>
    @extends('Layout')
    @section('PageContent')
    <div class="page-container">
        <div class="pdf-header">
            <a href="{{ route('Detail Book', ['ISBN' => $book->ISBN]) }}"><button id="back-button">Back</button></a>
            <span><span id="page-num"></span> / <span id="max-page-num"></span></span>
        </div>
        <div class="pdf-container">
            <form class="button" id="formPrev" action="{{ route('Decrease Book Page', ['ISBN' => $book->ISBN, 'page' => $page])}}" method="POST">
                @method('POST')
                @csrf
                <button class="button" id="prev">Prev</button>
            </form>

            <canvas id="pdf-render"></canvas>

            <form class="button" id="formNext" action="{{ route('Increase Book Page', ['ISBN' => $book->ISBN, 'page' => $page])}}" method="POST">
                @method('POST')
                @csrf
                <button class="button" id="next">Next</button>
            </form>
        </div>
    </div>
    @endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const url = {!! json_encode($filePath) !!};
            const pdfjsLib = window['pdfjs-dist/build/pdf'];
            let pdfDoc = null;
            let pageNum = {!! json_encode($page) !!};
            pageNum = parseInt(pageNum);
            let ISBN = {!! json_encode($book->ISBN) !!};
            let pageIsRendering = false;
            let pageNumIsPending = null;
            const scale = 1.5;
            const canvas = document.querySelector('#pdf-render');
            const ctx = canvas.getContext('2d');

            console.log(pageNum);

            pdfjsLib.getDocument(url).promise
                .then(pdfDoc_ => {
                    pdfDoc = pdfDoc_;
                    document.querySelector('#max-page-num').textContent = pdfDoc.numPages;

                    let url;
                    if(pageNum < 1){
                        url = `{{ route('Show Book', ['ISBN' => $book->ISBN, 'page' => 1])}}`
                        window.location.href = url
                    }else if(pageNum > pdfDoc.numPages){
                        url = `{{ route('Show Book', ['ISBN' => $book->ISBN, 'page' => 20])}}`.replace('20', pdfDoc.numPages);
                        window.location.href = url
                    }

                    renderPage(pageNum);
                })
                .catch(error => {
                    console.error('Error loading PDF:', error);
                });

            const renderPage = num => {
                if (num < 1 || num > pdfDoc.numPages) {
                    console.error('Invalid page number:', num);
                    return;
                }

                pageIsRendering = true;
                pdfDoc.getPage(num).then(page => {
                    const viewport = page.getViewport({ scale });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderCtx = {
                        canvasContext: ctx,
                        viewport: viewport
                    };

                    page.render(renderCtx).promise.then(() => {
                        pageIsRendering = false;

                        if (pageNumIsPending !== null) {
                            renderPage(pageNumIsPending);
                            pageNumIsPending = null;
                        }
                    });
                }).catch(error => {
                    console.error('Error rendering page:', error);
                });
                document.querySelector('#page-num').textContent = num;
            };

            document.getElementById("prev").addEventListener('click', function(event) {
                event.preventDefault();
                if (pageNum - 1 < 1) {
                    return;
                }
                document.getElementById("formPrev").submit();
            });

            document.getElementById("next").addEventListener('click', function(event) {
                event.preventDefault();
                if (pageNum + 1 > pdfDoc.numPages) {
                    return;
                }
                document.getElementById("formNext").submit();
            });
        });
    </script>
</body>
</html>
