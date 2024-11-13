<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Community extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'id_komunitas';
    protected $table = 'komunitas';
    public $incrementing = false; // Menonaktifkan auto-increment

    protected $fillable = [
        'id_komunitas',
        'nama_komunitas',
        'image_komunitas',
        'description_komunitas',
        'KEY',
        'id_kategori',
    ];
    public function adminCommunity()
    {
        return $this->hasOne(AdminCommunity::class, 'id_komunitas', 'id_komunitas');
    }
    public function forum()
    {
        return $this->hasMany(comment::class, 'id_komunitas', 'id_komunitas');
    }

}
