<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\BasisDetailModel;
use App\Models\BasisModel;
use App\Models\DiagnosisModel; // Tambahkan model DiagnosisModel
use App\Models\DiagnosisDetailModel; // Tambahkan model DiagnosisModel
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class DiagnosisController extends Controller
{
    public function index()
    {
        $gejalas = GejalaModel::all();
        return view('diagnosis', compact('gejalas'));
    }

    public function data_diagnosis()
    {

        $diagnosis = DiagnosisModel::all();
        $currentUser = Auth::user();
        return view('pages.datadiagnosis.index', [
            'title' => 'Data Diagnosis',
            'active' => 'Data_Diagnosis',
            'currentUser' => $currentUser,
            'diagnosis' => $diagnosis,
        ]);
    }

    public function getDiagnosisDetail($id)
    {
        $diagnosisDetail = DiagnosisDetailModel::where('id_diagnosis', $id)
            ->join('penyakit', 'diagnosis_detail.id_penyakit', '=', 'penyakit.id_penyakit')
            ->select('diagnosis_detail.id_diagnosis_detail', 'diagnosis_detail.id_diagnosis', 'diagnosis_detail.id_penyakit', 'diagnosis_detail.id_gejala', 'diagnosis_detail.nilai_cf', 'penyakit.kode_penyakit', 'penyakit.nama_penyakit')
            ->groupBy('diagnosis_detail.id_penyakit', 'diagnosis_detail.id_gejala', 'diagnosis_detail.nilai_cf', 'penyakit.kode_penyakit', 'penyakit.nama_penyakit', 'diagnosis_detail.id_diagnosis_detail', 'diagnosis_detail.id_diagnosis')
            ->distinct()
            ->get();

        return response()->json($diagnosisDetail);
    }


    // DiagnosisController.php
    public function downloadDiagnosisPdf()
    {
        // Ambil semua data diagnosis beserta detailnya, termasuk join dengan tabel gejala
        $diagnoses = DiagnosisModel::with(['details.penyakit', 'details.gejala'])->get();

        // Ambil kode gejala dan nama gejala dengan join dari tabel gejala
        foreach ($diagnoses as $diagnosis) {
            foreach ($diagnosis->details as $detail) {
                $gejala = GejalaModel::find($detail->id_gejala);
                if ($gejala) {
                    $detail->kode_gejala = $gejala->kode_gejala;
                    $detail->nama_gejala = $gejala->nama_gejala;
                } else {
                    $detail->kode_gejala = 'N/A';
                    $detail->nama_gejala = 'N/A';
                }
            }
        }

        // Generate PDF dengan data diagnosis
        $pdf = Pdf::loadView('pdf.diagnosis_detail', compact('diagnoses'));

        // Unduh PDF
        return $pdf->download('data_diagnosis.pdf');
    }



    public function unduhPdf()
    {
        // Ambil data yang diperlukan untuk PDF
        $gejalas = GejalaModel::all(); // atau data yang relevan
        $cfCombinePerBasis = session('cfCombinePerBasis', []);
        $jumlahPenyakit = count($cfCombinePerBasis);

        // Generate PDF
        $pdf = Pdf::loadView('pdf.diagnosis', compact('cfCombinePerBasis', 'jumlahPenyakit'));

        // Unduh PDF
        return $pdf->download('hasil_diagnosis.pdf');
    }

    public function calculate(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'nama_kucing' => 'required|string|max:255',
            'no_hp' => 'required|string',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'gejala' => 'required|array',
            'gejala.*' => 'required|numeric|min:0|max:1',
        ]);

        // Insert data into 'diagnosis' table
        $diagnosis = DiagnosisModel::create([
            'nama_pemilik' => $request->input('nama_pemilik'),
            'nama_kucing' => $request->input('nama_kucing'),
            'no_hp' => $request->input('no_hp'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
        ]);

        $gejalaInput = $request->input('gejala');
        $cfCombinePerBasis = [];
        $gejalaDitampilkan = []; // Array untuk menyimpan kode gejala yang sudah ditampilkan

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
                            'kode_penyakit' => '',
                            'deskripsi' => '',
                            'penanganan' => '',
                            'gejala' => [],
                        ];
                    }

                    $cfCombinePerBasis[$idBasis]['cf_combine'] += $cfCurrent * (1 - $cfCombinePerBasis[$idBasis]['cf_combine']);

                    // Ambil data gejala
                    $gejala = GejalaModel::find($id_gejala);
                    if ($gejala) {
                        // Tambahkan gejala jika belum ada
                        if (!isset($gejalaDitampilkan[$id_gejala])) {
                            $gejalaDitampilkan[$id_gejala] = [
                                'kode_gejala' => $gejala->kode_gejala,
                                'nama_gejala' => $gejala->nama_gejala,
                                'nilai_keyakinan' => $cfUser,
                            ];
                        }
                        // Tambahkan data gejala ke cfCombinePerBasis
                        if (!isset($cfCombinePerBasis[$idBasis]['gejala'][$id_gejala])) {
                            $cfCombinePerBasis[$idBasis]['gejala'][$id_gejala] = $gejalaDitampilkan[$id_gejala];
                        }
                    }
                }
            }
        }

        foreach ($cfCombinePerBasis as $idBasis => $data) {
            $basis = BasisModel::find($idBasis); // Ambil data basis berdasarkan id_basis
            if ($basis) {
                $penyakit = $basis->penyakit; // Ambil data penyakit dari relasi basis ke penyakit
                $cfCombinePerBasis[$idBasis]['id_penyakit'] = $penyakit->id_penyakit; // Tambahkan id_penyakit ke array
                $cfCombinePerBasis[$idBasis]['nama_penyakit'] = $penyakit->nama_penyakit;
                $cfCombinePerBasis[$idBasis]['kode_penyakit'] = $penyakit->kode_penyakit;
                $cfCombinePerBasis[$idBasis]['deskripsi'] = $penyakit->deskripsi;
                $cfCombinePerBasis[$idBasis]['penanganan'] = $penyakit->penanganan;
            }
        }

        // Menghitung jumlah penyakit yang terkait
        $jumlahPenyakit = count($cfCombinePerBasis);

        // Urutkan $cfCombinePerBasis berdasarkan nilai cf_combine secara descending (terbesar ke terkecil)
        usort($cfCombinePerBasis, function ($a, $b) {
            return $b['cf_combine'] <=> $a['cf_combine'];
        });

        // Ambil data penyakit dengan CF tertinggi
        $penyakitTertinggi = $cfCombinePerBasis[0] ?? null;

        // Simpan data diagnosis_detail
        if ($penyakitTertinggi && isset($penyakitTertinggi['id_penyakit'])) {
            foreach ($gejalaDitampilkan as $gejala) {
                DiagnosisDetailModel::create([
                    'id_diagnosis' => $diagnosis->id_diagnosis,
                    'id_penyakit' => $penyakitTertinggi['id_penyakit'],
                    'id_gejala' => $gejala['kode_gejala'],
                    'nilai_cf' => $penyakitTertinggi['cf_combine'],
                ]);
            }
        }

        session(['cfCombinePerBasis' => $cfCombinePerBasis]);

        return view('hasil', compact('cfCombinePerBasis', 'jumlahPenyakit'));
    }

}
