<?php

namespace Modules\Customer\app\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected function name(): Attribute
    {
        return new Attribute(
            fn($value) => Str::upper(trim($value)), // accessor
            fn($value) => Str::upper(trim($value)), // mutator
        );
    }

    public function asset(): HasMany
    {
        return $this->hasMany('assets', 'id', 'asset_id');
    }
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_id = auth()->user()->id;
        });
    }
}
