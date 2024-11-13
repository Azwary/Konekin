<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'forum';
    // public $incrementing = false;

    // Tidak menggunakan kolom timestamps
    // public $timestamps = false;
    protected $fillable = [
        'id_komunitas',
        'KEY',
        'comment',
    ];

    public function community()
    {
        return $this->belongsTo(Community::class, 'id_komunitas', 'id_komunitas');
    }
}
