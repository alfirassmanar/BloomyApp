<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Blog extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_blog';
    protected $primaryKey = 'id_blog';
    public $timestamps = false;

    protected $fillable = [
        'id_kategori',
        'id_wisata',
        'id_umkm',
        'id_kuliner',
        'nama_penulis',
        'foto_blog',
        'tgl_input',
        'artikel'
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata', 'id_wisata');
    }
    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'id_umkm', 'id_umkm');
    }
    public function kuliner()
    {
        return $this->belongsTo(Kuliner::class, 'id_kuliner', 'id_kuliner');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
