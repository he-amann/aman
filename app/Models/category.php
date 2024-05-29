<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable=['name','description'];


    public function allproduct()
    {
    return $this->hasMany(productcategory::class,'category_id','id');
    }


public function product()
{
    return $this->hasOne(productcategory::class,'category_id','id');
}


}
