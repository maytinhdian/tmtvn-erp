<?php

namespace Modules\Customer\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Value extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['value'];

   public function attributes(): BelongsToMany{
    return $this->belongsToMany(Attribute::class);
   }

   protected static function booted()
   {
       static::creating(function ($model) {
           $model->created_id = auth()->user()->id;
       });
   }
}
