<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $fillable = ['brand_id', 'category_id', 'name', 'slug', 'model', 'price', 'off_price', 'off_date_start', 'off_date_end',
        'thumbnail', 'gallery', 'quantity', 'sku_code', 'featured', 'size', 'color', 'warranty', 'warrenty_duration',
        'warrenty_conditions', 'description', 'video', 'status', 'create_by'];


    protected $hidden = ['updated_at'];
    public function category() {
        return $this->belongsTo( Category::class );
    }
    public function brand(){
        return $this->belongsTo (Product::class);
    }
    public function reviews(){
        return $this->hasMany(ProductReview::class,'product_id');
    }

   public  const ACTIVE = 'active';
   public  const INACTIVE = 'inactive';
}
