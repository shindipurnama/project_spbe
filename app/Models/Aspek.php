<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aspek extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'aspek';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'aspek_id',
        'aspek_name',
        'intattribute1',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
