<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenilaianMandiri extends Model
{use HasFactory, SoftDeletes;

    public $table = 'penilaian_mandiri';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'penilaian_id',
        'penjadwalan_id',
        'penilaian_name',
        'jumlah_indikator',
        'int_anttribute',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
