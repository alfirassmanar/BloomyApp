<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pekerja extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_pekerja';
    protected $primaryKey = 'id_pekerja';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_wisata',
        'alamat_pekerja',
        'no_hp',
        'berkas',
        'foto_pekerja',
        'tgl_masuk',
        'tgl_keluar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata');
    }
}
