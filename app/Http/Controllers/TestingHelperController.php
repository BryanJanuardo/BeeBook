<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Helpers\Helper;

class TestingHelperController extends Controller
{
    function index(){
        Helper::test();
    }
}
