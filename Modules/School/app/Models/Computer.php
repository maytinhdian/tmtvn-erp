<?php

namespace Modules\School\app\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\School\Database\factories\ComputerFactory;

class Computer extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['school_name','mac_address','pc_name','user_name','created_id'];

    protected $hidden =['created_id','updated_at','created_at','deleted_at'];

    protected function macAddress(): Attribute
    {
        return new Attribute(
            fn($value) => Str::upper(trim($value)), // accessor
            fn($value) => Str::upper(trim($value)), // mutator
        );
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_id = optional(Auth::user())->id;
        });
    }
}
