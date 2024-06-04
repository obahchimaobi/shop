<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_email',
        'cart_id',
        'cart_name',
        'cart_description',
        'cart_price',
        'cart_image',
        'cart_category',
        'item_quantity'
    ];
}
