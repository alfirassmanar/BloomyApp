<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Access\HandlesAuthorization;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HandlesAuthorization;

    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'email',
        'nama_lengkap',
        'id_role',
        'foto',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function pekerja()
    {
        return $this->belongsTo(Pekerja::class, 'id_pekerja');
    }
}
