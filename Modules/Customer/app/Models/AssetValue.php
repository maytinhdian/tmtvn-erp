<?php

namespace Modules\Customer\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Customer\Database\factories\AssetValueFactory;

class AssetValue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

   public function attributes(): HasMany{
    return $this->hasMany('AssetAttribute','id','attribute_id');
   }
}
