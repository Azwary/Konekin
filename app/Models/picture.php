<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'pictures';
    protected $fillable = [
        'id_kegiatan',
        'picture',
    ];
    public $timestamps = false;
}
