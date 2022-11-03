<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndikatorSPBE extends Model
{use HasFactory, SoftDeletes;

    public $table = 'indikator_spbe';


    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'spbe_id',
        'indikator_id',
        'domain_id',
        'aspek_id',
        'spbe',
        'jumlah_capaian',
        'total',
        'int_attribute',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}