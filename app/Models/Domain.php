<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model
{use HasFactory, SoftDeletes;

    public $table = 'domain';


    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'domain_id',
        'nama_domain',
        'email',
        'intattribute',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
