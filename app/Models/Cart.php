<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;

    protected $fillable = ['user_id']; // Добавьте user_id, если хотите привязывать корзину к пользователям

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
