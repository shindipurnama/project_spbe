<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capaian extends Model
{
    use HasFactory;

    public $table = 'capaian';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'kirteria_id',
        'penilaian_id',
        'jumlah_capaian',
        'spbe_id',
        'nilai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function kirteria()
    {
        return $this->hasone(kirteria::class, 'id', 'kirteria_id');
    }
    public function penilaian()
    {
        return $this->hasone(PenilaianMandiri::class, 'penilaian_id', 'penilaian_id');
    }

    public function spbe()
    {
        return $this->hasone(IndikatorSPBE::class, 'spbe_id', 'spbe_id');
    }

    public function user()
    {
        return $this->hasone(User::class, 'id', 'user_id');
    }
}
