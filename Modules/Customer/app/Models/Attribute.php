<?php

namespace Modules\Customer\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Model
{

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    public function values() : BelongsToMany{
        return $this->belongsToMany(Value::class);
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_id = auth()->user()->id;
        });
    }
}
