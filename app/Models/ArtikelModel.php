<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';

    protected $fillable = [
        'nama_artikel',
        'penulis',
        'gambar',
    ];
}
