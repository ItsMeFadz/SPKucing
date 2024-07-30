<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GejalaModel extends Model
{
    use HasFactory;
    protected $table = 'gejala';
    protected $primaryKey = 'id_gejala';

    protected $fillable = [
        'kode_gejala',
        'nama_gejala',
    ];

    public function diagnosisDetails()
    {
        return $this->hasMany(DiagnosisDetailModel::class, 'id_gejala', 'id_gejala');
    }

    public function basisDetails()
    {
        return $this->hasMany(BasisDetailModel::class, 'id_gejala', 'id_gejala');
    }
}
