<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'fone_img', 'desc', 'price'];

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
}
