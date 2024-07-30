<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosisModel extends Model
{
    use HasFactory;
    protected $table = 'diagnosis';
    protected $primaryKey = 'id_diagnosis';

    protected $fillable = [
        'nama_pemilik',
        'nama_kucing',
        'no_hp',
        'email',
        'alamat',
    ];

    public function penyakit()
    {
        return $this->belongsTo(PenyakitModel::class, 'id_penyakit');
    }

    public function gejala()
    {
        return $this->belongsTo(GejalaModel::class, 'id_gejala');
    }

    public function details()
    {
        return $this->hasMany(DiagnosisDetailModel::class, 'id_diagnosis');
    }

}
