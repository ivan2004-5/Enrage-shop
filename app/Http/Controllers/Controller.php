<?php

namespace App\Http\Controllers;
use BaseController;

class Controller  {

    public function index() {




        return view('index');
    }

    public function catalog() {
        return view('catalog');
    }

    public function contact() {
        return view('contact');
    }

}
