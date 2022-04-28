<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * 
     * 
     * @var string
     */
    protected $table = 'carts';

    protected $fillable = [
        'id',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cart_details()
    {
        return $this->hasMany(CartDetails::class, 'cart_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($cart) { // before delete() method call this
            $cart->cart_details()->delete();
        });
    }
}
