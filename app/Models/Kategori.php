<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kategori';
    protected $table = 'kategori';
    public $incrementing = false;

    // Tidak menggunakan kolom timestamps
    public $timestamps = false;
    protected $fillable = [
        'id_kategori',
        'nama_kategori',
    ];
}
