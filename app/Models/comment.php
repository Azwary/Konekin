<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_comment';
    protected $table = 'comment_komunitas';
    // public $incrementing = false;

    // Tidak menggunakan kolom timestamps
    public $timestamps = false;
    protected $fillable = [
        'id_comment',
        'email',
        'id_komunitas',
        'comment',
    ];

    public function community()
    {
        return $this->belongsTo(Community::class, 'id_komunitas', 'id_komunitas');
    }
}
