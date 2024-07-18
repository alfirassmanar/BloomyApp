<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Transaksi extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory, Notifiable;

    protected $table = 'tb_transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_tour',
        'no_tiket',
        'jumlah_pesanan',
        'total_bayar',
        'tgl_pesan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'id_tour');
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata');
    }

    public function pekerja()
    {
        return $this->belongsTo(Pekerja::class, 'id_pekerja');
    }
}
