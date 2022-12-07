<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class TestController extends Controller
{
    public function test()
    {
        return view('test');
    }
}
