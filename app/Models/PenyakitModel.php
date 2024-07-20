<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyakitModel extends Model
{
    use HasFactory;
    protected $table = 'penyakit';
    protected $primaryKey = 'id_penyakit';

    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit',
        'deskripsi',
        'penanganan',
    ];
}
