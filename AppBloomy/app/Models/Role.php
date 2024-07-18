<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Role extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory, Notifiable;

    protected $table = 'tb_role';
    protected $primaryKey = 'id_role';
    public $timestamps = false;

    protected $fillable = [
        'nama_role',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }

    public function pekerja()
    {
        return $this->hasMany(Pekerja::class, 'id_role');
    }
}
