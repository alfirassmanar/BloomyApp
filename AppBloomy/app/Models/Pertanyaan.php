<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PErtanyaan extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_pertanyaan';
    public $incrementing = false;
    protected $primaryKey = 'id_pertanyaan';
    public $timestamps = false;

    protected $fillable = [
        'pertanyaan',
    ];

    protected $hidden = [];
}
