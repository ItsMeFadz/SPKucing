<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AHPModel;

class AHPController extends Controller
{
    public function saveData(Request $request)
    {
        // Validasi request
        $request->validate([
            'id_basis' => 'required',
            'jumlah_ratio' => 'required',
            'n_kriteria' => 'required',
            'lamda_max' => 'required',
            'consistency_index' => 'required',
            'consistency_ratio' => 'required',
        ]);

        // Buat atau update data di tabel set_ahp
        AHPModel::updateOrCreate(
            ['id_basis' => $request->id_basis],
            [
                'id_basis' => $request->id_basis,
                'jumlah_ratio' => $request->jumlah_ratio,
                'n_kriteria' => $request->n_kriteria,
                'lamda_max' => $request->lamda_max,
                'consistency_index' => $request->consistency_index,
                'consistency_ratio' => $request->consistency_ratio,
            ]
        );

        return response()->json(['success' => true]);
    }

}
