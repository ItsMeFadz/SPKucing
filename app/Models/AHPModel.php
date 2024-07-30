<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AHPModel extends Model
{
    use HasFactory;
    protected $table = 'set_ahp';
    protected $primaryKey = 'id_set_ahp';

    protected $fillable = [
        'id_basis',
        'jumlah_ratio',
        'n_kriteria',
        'consistency_index',
        'consistency_ratio',
    ];

    public function basis()
    {
        return $this->belongsTo(BasisModel::class, 'id_basis', 'id_basis');
    }

    // $table->increments('id_set_ahp');
    //         $table->string('id_basis');
    //         $table->string('bobot_prioritas');
    //         $table->string('consistency_ratio');
}
