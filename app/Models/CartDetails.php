<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    use HasFactory;

     /**
     * 
     * 
     * @var string
     */
    protected $table = 'cart_details';

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'total'
    ];

    public function cart(){
        return $this->belongsTo(Cart::class,'cart_id');        
    }

}
