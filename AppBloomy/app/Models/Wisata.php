<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Wisata extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory, Notifiable;

    protected $table = 'tb_wisata';
    protected $primaryKey = 'id_wisata';
    public $timestamps = false;

    protected $fillable = [
        'nama_wisata',
        'kategori',
        'keterangan',
        'foto_usaha',
        'tgl_berdiri',
        'tgl_input',
        'lokasi',
    ];
}
