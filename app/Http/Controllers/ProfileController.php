<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return view('profile.show', ['user' => Auth::user()]);
        } else {
            return redirect()->route('register'); // Или route('login') если надо перенаправить на вход
        }
    }

    public function edit()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login'); // Перенаправление, если пользователь не авторизован
        }
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Вы не авторизованы.'); // Обработка неавторизованного пользователя
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            $avatar = file_get_contents($request->file('avatar')->getRealPath());
            $user->avatar = $avatar;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Профиль успешно обновлен!');
    }
}

