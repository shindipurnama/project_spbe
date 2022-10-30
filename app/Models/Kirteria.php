<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kirteria extends Model
{use HasFactory, SoftDeletes;

    public $table = 'kirteria';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kirteria_id',
        'spbe_id',
        'kirteria',
        'int_attribute',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
