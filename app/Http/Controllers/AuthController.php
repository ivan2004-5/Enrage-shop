<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\AuthenticatesUsers;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('profile')->with('success', 'Вы успешно вошли в систему!');
        }

        return back()->withErrors(['email' => 'Неверный email или пароль']);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
            $request->validate([
                'name' => 'required|string|max:25',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed',
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            Auth::login($user);
    
            return redirect()->route('profile')->with('success', 'Регистрация прошла успешно!');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }    
}