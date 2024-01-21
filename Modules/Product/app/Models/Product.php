<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    // protected $fillable = ['name','categories_id','slug','description','price'];
    protected $guarded = [];
    public function categories()
    {
        return $this->hasMany(Categories::class);
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_id = auth()->user()->id;
        });
    }

}
