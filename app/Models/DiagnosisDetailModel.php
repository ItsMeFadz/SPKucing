<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosisDetailModel extends Model
{
    use HasFactory;
    protected $table = 'diagnosis_detail';
    protected $primaryKey = 'id_diagnosis_detail';

    protected $fillable = [
        'id_diagnosis',
        'id_penyakit',
        'id_gejala',
        'nilai_cf',
    ];

    // DiagnosisDetailModel.php
    public function penyakit()
    {
        return $this->belongsTo(PenyakitModel::class, 'id_penyakit', 'id_penyakit');
    }

    public function gejala()
    {
        return $this->belongsTo(GejalaModel::class, 'id_gejala', 'id_gejala');
    }

}
