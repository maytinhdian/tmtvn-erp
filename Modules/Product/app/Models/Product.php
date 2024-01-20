<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\ProductFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','category_id',];

    public function categories(){
        return $this->hasMany(Categories::class);
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_id = auth()->user()->id;
        });
    }

}
