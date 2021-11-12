<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $with = ['sub_cats'];
    protected $fillable = ['root','name','slug','icon','banner','status','user_id'];

    public function sub_cats(){
        return $this->hasMany(self::class,'root');
    }
}
