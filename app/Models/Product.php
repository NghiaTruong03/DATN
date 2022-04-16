<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','status','price','sale_price','description','image','category_id'];
    //  protected $guarded  = [];
    public function category(){
        return $this->belongsTo(Category::class,'category_id', 'id');        
    }

    
}
