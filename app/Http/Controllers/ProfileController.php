<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return view('profile.show', ['user' => Auth::user()]);
        } else {
            return redirect()->route('register');
        }
    }
}

