<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{use HasFactory, SoftDeletes;

    public $table = 'roles';


    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'role_id',
        'role',
        'email',
        'attribute',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
