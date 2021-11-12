<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_wishlist extends Model
{
    use HasFactory;
    Protected $fillable = ['user_id','product_id'];
}
