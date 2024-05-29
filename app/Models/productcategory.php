<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productcategory extends Model
{
    use HasFactory;
    protected $fillable=['category_id','product_id'];
   
    public function productIds()
    {
        return $this->belongsToMany(product::class,'product_id','id');
    }
    
    public function categoryIds()
    {
        return $this->belongsToMany(category::class,'category_id','id');
    }
   
    public function productId()
    {
        return $this->belongsTo(product::class,'product_id','id');
    }


    public function categoryId()
    {
        return $this->belongsTo(category::class,'category_id','id');
    }
}
