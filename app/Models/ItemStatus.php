<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStatus extends Model
{
    public function itemstatus()
    {
        return $this->hasOne(Item::class , 'status_id' , 'id');
    }

}
