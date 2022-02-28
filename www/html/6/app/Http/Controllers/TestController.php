<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('test.index');
    }

    public function hello()
    {
        $data = [
            'msg'=>'これはBladeを利用したサンプルです。'
        ];
        return view('test.hello', $data);
    }
}
