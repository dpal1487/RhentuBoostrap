<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function image()
  {
    return $this->hasOne(Image::class, 'id', 'image_id');
  }
  public function childrens()
  {
    return $this->hasMany(Category::class, 'parent_id', 'id');
  }
  public function attributes(){
    return $this->hasMany(Attribute::class,'category_id','id');
  }
  public function priceCondition(){
    return $this->hasMany(TimePeriod::class,'category_id','id');
  }
}