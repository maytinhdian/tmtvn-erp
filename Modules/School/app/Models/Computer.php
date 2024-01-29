<?php

namespace Modules\School\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\School\Database\factories\ComputerFactory;

class Computer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['school_name','mac_address','pc_name','user_name'];

    // protected static function booted()
    // {
    //     static::creating(function ($model) {
    //         $model->created_id = auth()->user()->id;
    //     });
    // }
}
