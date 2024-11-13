<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'galleries';
    protected $fillable = [
        'id_komunitas',
        'image_path',
    ];
}
