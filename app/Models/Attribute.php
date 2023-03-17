<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
  use HasFactory;
  protected $fillable = ['name', 'category_id', 'field', 'key', 'type', 'render_as', 'display_order'];
  protected $hidden = ['created_at', 'updated_at', 'category_id'];
  public function rules()
  {
    return $this->hasMany(\App\Http\Models\Rules::class, 'attribute_id');
  }
  public function attribute()
  {
    return $this->hasMany(Attribute::class, 'parent_id');
  }
  public function parent()
  {
    return $this->hasOne(Attribute::class, 'id','parent_id');
  }
  public function values()
  {
    return $this->hasMany(AttributeValue::class,'attribute_id', 'id');
  }
  public function attributeRules()
  {
    return $this->hasMany(AttributeRules::class, 'attribute_id');
  }
  public function category()
  {
    return $this->hasOne(Categories::class, 'id', 'category_id');
  }
}