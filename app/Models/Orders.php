<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $with=['customer','billing','shipping','order_items'];
    use HasFactory;
    Protected $fillable = ['customer_id','shipping_id','billing_id','amount','pay_method','shipping_type','order_status'];

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id')->select('id','name','email','mobile',);
    }
    public function billing(){
        return $this->belongsTo(Billing::class,'billing_id')->select('id','firstname','lastname','country','address','mobile');
    }
    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id')->select('id','s_firstname','s_lastname','s_country','s_address','s_mobile');
    }

    public function order_items(){
        return $this->hasMany(Order_items::class,'order_id')->select('id','order_id','product_id','product_name','product_price','product_qty');
    }
}
