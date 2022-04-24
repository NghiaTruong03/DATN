<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';
    
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
    public function ProWishlists()
    {
        return $this->belongsTo(ProWishlists::class, 'wishlist_id','id');
    }
}
