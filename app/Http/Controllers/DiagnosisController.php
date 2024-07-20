<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\BasisDetailModel;
use App\Models\BasisModel;

class DiagnosisController extends Controller
{
    public function index()
    {
        $gejalas = GejalaModel::all();
        return view('diagnosis', compact('gejalas'));
    }

    public function calculate(Request $request)
    {
        $gejalaInput = $request->input('gejala');
        $cfCombinePerBasis = [];

        foreach ($gejalaInput as $id_gejala => $cfUser) {
            if ($cfUser != 0) { // Hanya proses jika keyakinan tidak 0
                $basisDetails = BasisDetailModel::where('id_gejala', $id_gejala)->get();

                foreach ($basisDetails as $basisDetail) {
                    $idBasis = $basisDetail->id_basis;
                    $cfGejala = $basisDetail->bobot_prioritas;
                    $cfCurrent = $cfGejala * $cfUser;

                    if (!isset($cfCombinePerBasis[$idBasis])) {
                        $cfCombinePerBasis[$idBasis] = [
                            'cf_combine' => 0,
                            'nama_penyakit' => '',
                            'kode_penyakit' => '', // Tambahkan kode_penyakit
                        ];
                    }

                    $cfCombinePerBasis[$idBasis]['cf_combine'] += $cfCurrent * (1 - $cfCombinePerBasis[$idBasis]['cf_combine']);
                }
            }
        }

        // Mengambil nama penyakit, kode penyakit, dan cf_combine berdasarkan id_penyakit dari $cfCombinePerBasis
        foreach ($cfCombinePerBasis as $idBasis => $data) {
            $basis = BasisModel::find($idBasis); // Ambil data basis berdasarkan id_basis
            if ($basis) {
                $penyakit = $basis->penyakit; // Ambil data penyakit dari relasi basis ke penyakit
                $cfCombinePerBasis[$idBasis]['nama_penyakit'] = $penyakit->nama_penyakit;
                $cfCombinePerBasis[$idBasis]['kode_penyakit'] = $penyakit->kode_penyakit; // Ambil kode_penyakit dari model penyakit
            }
        }

        // Urutkan $cfCombinePerBasis berdasarkan nilai cf_combine secara descending (terbesar ke terkecil)
        usort($cfCombinePerBasis, function ($a, $b) {
            return $b['cf_combine'] <=> $a['cf_combine'];
        });

        return view('hasil', compact('cfCombinePerBasis'));
    }


}