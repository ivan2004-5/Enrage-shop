<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function service()
    {
        return view('service');
    }

    public function basket()
    {
        return view('basket');
    }
}

