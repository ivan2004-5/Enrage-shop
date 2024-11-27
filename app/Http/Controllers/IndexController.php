<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function service()
    {
        $services = Service::all();
        return view('service', compact('services'));
    }

    public function basket()
    {
        return view('basket');
    }
}

