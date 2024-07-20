<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasisModel extends Model
{
    use HasFactory;
    protected $table = 'basisrule';
    protected $primaryKey = 'id_basis';

    protected $fillable = [
        'id_penyakit',
        'id_gejala',
        'bobot_prioritas',
    ];

    public function penyakit()
    {
        return $this->belongsTo(PenyakitModel::class, 'id_penyakit', 'id_penyakit');
    }

    public function gejala()
    {
        return $this->belongsToMany(GejalaModel::class, 'basis_detail', 'id_basis', 'id_gejala');
    }

    public function details()
    {
        return $this->hasMany(BasisDetailModel::class, 'id_basis', 'id_basis');
    }
}
