<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Plan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable =[
        'name',
        'category_id',
        'no_of_ads',
        'description',
        'amount',
        'currency',
        'expires_in_days',
        'discount',
        'status',
];
    public function category()
        {
            return $this->hasOne(Category::class, 'id', 'category_id');
        }
    protected static function boot()
    {
        parent::boot();
        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }
}
