<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;
    Protected $fillable = ['order_id','product_id','product_name','product_slug','product_price','product_qty'];
    public function orders(){
        return $this->belongsTo(Orders::class,'order_id');
    }
}
