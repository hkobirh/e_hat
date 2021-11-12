<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','product_id','rating','message','status'];

    protected $with = ['customer'];
    public function customer() {
        return $this->belongsTo( Customer::class )->select('id','name','email');
    }
    public function product() {
        return $this->belongsTo( Product::class );
    }

    public  const SUCCESS = 'success';
    public  const PENDING = 'pending';
}
