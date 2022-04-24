<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','status','price','sale_price','description','image','category_id','brand_id'];
    //  protected $guarded  = [];
    public function category(){
        return $this->belongsTo(Category::class,'category_id', 'id');        
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id', 'id');        
    }
    public function imgProduct(){
        return $this->hasMany(ImgProduct::class,'product_id');        
    }
}
