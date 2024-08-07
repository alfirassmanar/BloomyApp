<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Kuliner extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory, Notifiable;

    protected $table = 'tb_kuliner';
    protected $primaryKey = 'id_kuliner';
    public $timestamps = false;

    protected $fillable = [
        'nama_kuliner',
        'kategori',
        'keterangan',
        'foto_usaha',
        'tgl_berdiri',
        'tgl_input',
        'lokasi',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
