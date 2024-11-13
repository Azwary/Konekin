<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class joins extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_komunitas';
    protected $table = 'joint';
    public $incrementing = false;

    // Tidak menggunakan kolom timestamps
    public $timestamps = false;
    protected $fillable = [
        'id_komunitas',
        'email',
        'KEY',
        'id',
    ];
    public function komunitas()
    {
        return $this->belongsTo(Community::class, 'id_komunitas', 'id_komunitas');
    }
}
