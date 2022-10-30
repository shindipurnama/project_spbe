<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hasil extends Model
{use HasFactory, SoftDeletes;

    public $table = 'hasil';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'penilaian_id',
        'total_score',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
