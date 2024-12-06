<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, Order};

class ProfileController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            // Fetch orders from the last 7 days using query builder
            $orderCounts = [];
            for ($i = 6; $i >= 0; $i--) {
                $date = now()->subDays($i)->format('Y-m-d');
                // Count orders for each date
                $count = Order::whereDate('created_at', $date)->count();
                $orderCounts[] = $count;
            }
    
            // Prepare dates for the x-axis
            $dates = [];
            for ($i = 6; $i >= 0; $i--) {
                $dates[] = now()->subDays($i)->format('d F');
            }
    
            return view('profile.show', [
                'user' => Auth::user(),
                'orderCounts' => $orderCounts,
                'dates' => $dates,
            ]);
        } else {
            return redirect()->route('register');
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

