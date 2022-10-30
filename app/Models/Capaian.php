<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capaian extends Model
{use HasFactory, SoftDeletes;

    public $table = 'capian';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'spbe_id',
        'penilaian_id',
        'jumlah_capaian',
        'jumlah_kirteria',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
