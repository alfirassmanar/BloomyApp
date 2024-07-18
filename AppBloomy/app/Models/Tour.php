<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tb_tour';
    protected $primaryKey = 'id_tour';
    public $timestamps = true;

    protected $fillable = [
        'nama_tour',
        'id_pekerja',
        'tgl_mulai',
        'tgl_selesai',
        'lama_tour',
        'id_wisata',
        'fasilitas_penginapan',
        'fasilitas_konsumsi',
        'total_harga',
        'updated_at',
        'created_at',
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata', 'id_wisata');
    }
    public function pekerja()
    {
        return $this->belongsTo(Pekerja::class, 'id_pekerja');
    }
}
