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
            <button id="back-button">Back</button>
            <span><span id="page-num"></span> / <span id="max-page-num"></span></span>
        </div>
        <div class="pdf-container">
            <button class="button" id="prev"></button>
            <canvas id="pdf-render"></canvas>
            <button class="button" id="next"></button>
        </div>
    </div>
    @endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            const url = './storage/Book/BookFile/Naruto.pdf';
            const pdfjsLib = window['pdfjs-dist/build/pdf'];

            let pdfDoc = null;
            let pageNum = 1;
            let pageIsRendering = false;
            let pageNumIsPending = null;

            const scale = 1.5;
            const canvas = document.querySelector('#pdf-render');
            const ctx = canvas.getContext('2d');


            // Fetch the PDF
            pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
                pdfDoc = pdfDoc_;
                // Check for last page read in local storage
                const storedPage = localStorage.getItem('lastPageRead');
                pageNum = storedPage ? parseInt(storedPage) : 1;
                renderPage(pageNum);
                document.querySelector('#max-page-num').textContent = pdfDoc.numPages;
            });

            // Render the page
            const renderPage = num => {
                pageIsRendering = true;

                // Get page
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

                    // Store the last page read in local storage
                    localStorage.setItem('lastPageRead', num);
                });
                console.log(num)
                document.querySelector('#page-num').textContent = num;
            };

            // Check for pages rendering
            const queueRenderPage = num => {
                if (pageIsRendering) {
                    pageNumIsPending = num;
                } else {
                    console.log(num)
                    renderPage(num);
                }
            };

            // Show Prev Page
            const showPrevPage = () => {
                if (pageNum <= 1) {
                    return;
                }
                pageNum--;
                queueRenderPage(pageNum);
            };

            // Show Next Page
            const showNextPage = () => {
                if (pageNum >= pdfDoc.numPages) {
                    return;
                }
                pageNum++;
                console.log(pageNum)
                queueRenderPage(pageNum);
            };

            document.querySelector('#prev').addEventListener('click', showPrevPage);
            document.querySelector('#next').addEventListener('click', showNextPage);

        });

    </script>
</body>
</html>
