<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory,SoftDeletes,Notifiable;

    protected $fillable = ['name','email','mobile','password','email_verified','email_verified_at','email_verified_token'];
}
