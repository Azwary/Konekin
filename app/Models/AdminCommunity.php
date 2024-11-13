<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCommunity extends Model
{
    use HasFactory;
    protected $table = 'admin_komunitas';

    protected $primaryKey = 'id_komunitas';
    // protected $table = ' admin_komunitas';
    // public $incrementing = false;

    // Tidak menggunakan kolom timestamps
    protected $fillable = [
        'email',
        'id_komunitas',
        'created_date',
        'updated_date',
    ];
    
}
