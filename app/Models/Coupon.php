<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'coupon_name',
        'coupon_type',
        'coupon_value',
        'coupon_code',
        'coupon_quantity',
    ];
}
