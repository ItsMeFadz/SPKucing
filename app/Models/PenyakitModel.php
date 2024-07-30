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

    public function basis()
    {
        return $this->hasMany(BasisModel::class, 'id_penyakit', 'id_penyakit');
    }

    public function basisDetails()
    {
        return $this->hasMany(BasisDetailModel::class, 'id_penyakit');
    }

}
