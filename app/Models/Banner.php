<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  use HasFactory;
  public function image(){
    return $this->hasOne(Image::class,'id','image_id');
  }

  public function category_banner()
  {
    return $this->hasOne(CategoryBanner::class , 'id' , 'banner_id');
  }
}
