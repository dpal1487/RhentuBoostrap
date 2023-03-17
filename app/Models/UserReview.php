<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
  public function rating()
  {
    return $this->hasOne(Rating::class, 'id', 'review_id');
  }
  public function user()
  {
    return $this->hasOne(User::class, 'id', 'user_id');
  }
}
