<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=['name','price','description','discount',];
   
   
   
    public function allcategory()
    {
        return $this->hasMany(productcategory::class,'product_id','id');
    }
   
    public function category()
    {
        return $this->hasOne(productcategory::class,'product_id','id');
    }
    public function photos(){
        return $this->hasMany(productmedia::class,'product_id','id');
    }
}
