<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProWishlist extends Model
{
    use HasFactory;
    protected $table = 'pro_wishlists';

    protected $fillable = [
        'wishlist_id',
        'product_id',
    ];

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }
    public function wish_product()
    {
        return $this->hasOne(Wishlist::class, 'user_id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id', 'id');        
    }
}
