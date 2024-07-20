<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasisDetailModel extends Model
{
    use HasFactory;

    protected $table = 'basisrule_detail';

    protected $primaryKey = 'id_basis_detail';
    

    protected $fillable = [
        'id_basis',
        'id_penyakit',
        'id_gejala',
        'bobot_prioritas',
    ];

    public function basis()
    {
        return $this->belongsTo(BasisModel::class, 'id_basis', 'id_basis');
    }

    public function gejala()
    {
        return $this->belongsTo(GejalaModel::class, 'id_gejala', 'id_gejala');
    }

    public function penyakit()
    {
        return $this->belongsTo(PenyakitModel::class, 'id_basis', 'id_penyakit');
    }
}
