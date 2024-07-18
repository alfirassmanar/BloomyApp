<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Kategori extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_kategori';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;

    protected $fillable = [
        'kategori',
    ];

    public function wisata()
    {
        return $this->hasMany(Wisata::class, 'id_kategori');
    }
}
