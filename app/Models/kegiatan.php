<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kegiatan';
    protected $table = 'kegiatan';
    // public $incrementing = false;

    // Tidak menggunakan kolom timestamps
    public $timestamps = false;
    protected $fillable = [
        'id_komunitas',
        'id_kegiatan',
        'nama_kegiatan',
        'detail_kegiatan',
        'tgl_kegiatan',
        'jam_kegiatan',
        'slug',
        'gallery',
        'id',
    ];
}
