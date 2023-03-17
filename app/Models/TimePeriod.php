<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimePeriod extends Model
{
  public function time()
  {
    return $this->hasOne(Time::class, 'id', 'time_id');
  }
}