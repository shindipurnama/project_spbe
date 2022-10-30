<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjadwalan extends Model
{use HasFactory, SoftDeletes;

    public $table = 'penjadwalan';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'penjadwalan_id',
        'start_date',
        'end_date',
        'attribute',
        'created_at',
        'updated_at',
        'deleted_at',
        'userID',
    ];
}
