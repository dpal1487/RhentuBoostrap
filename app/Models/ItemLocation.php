<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemLocation extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'address_id',
    'item_id',
  ];

  public function location()
  {
    return $this->hasOne(Item::class , 'id' , 'item_id');
  }

//   public function location()
//   {
//     return $this->hasOne(Address::class , 'id' , 'address_id');
//   }
}
