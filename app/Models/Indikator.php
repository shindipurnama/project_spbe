<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indikator extends Model
{use HasFactory, SoftDeletes;

    public $table = 'indikator';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'indikator_id',
        'indikator_name',
        'int_attribute',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
