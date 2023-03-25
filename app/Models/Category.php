<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'meta_id',
        'description',
        'keywords',
        'image_id',
        'status'
    ];
    protected static function boot() {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

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

  public function meta()
  {
    return $this->hasOne(Meta::class , 'id' , 'meta_id');
  }
}
