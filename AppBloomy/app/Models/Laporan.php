<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Laporan extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_review';
    public $incrementing = false;
    protected $primaryKey = 'id_review';
    public $timestamps = false;

    protected $fillable = [
        'id_pertanyaan',
        'email',
        'nama_lengkap',
        'tujuan',
        'np1',
        'np2',
        'np3',
        'np4',
        'np5',
        'np6',
        'np7',
        'np8',
        'np9',
        'np10',
    ];

    protected $hidden = [];
}
