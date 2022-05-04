<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','status','price','sale_price','description','product_quantity','view','image','category_id','brand_id'];
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
    public function proWishlists()
    {
        return $this->hasMnay(ProWishlists::class, 'product_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($img_prd) { // before delete() method call this
            $img_prd->imgProduct()->each(function($abc) {
                $abc->delete();
            });
        });
        //     static::deleting(function($img_prd) { // before delete() method call this
        //         $img_prd->imgProduct()->delete();
        //    });
       
    }
    
}
