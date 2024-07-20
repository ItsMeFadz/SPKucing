<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\ArtikelModel;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        $totalGejala = GejalaModel::count(); // Hitung total gejala
        $totalPenyakit = PenyakitModel::count(); // Hitung total gejala
        $totalArtikel = ArtikelModel::count(); // Hitung total gejala
        $totalUser = ArtikelModel::count(); // Hitung total gejala
        $totalUser = User::count(); // Hitung total gejala

        return view('dashboard', [
            'title' => 'dashboard',
            'active' => 'Dashboard',
            'currentUser' => $currentUser,
            'totalGejala' => $totalGejala, // Kirim data total gejala    ke view
            'totalPenyakit' => $totalPenyakit, // Kirim data total gejala ke view
            'totalArtikel' => $totalArtikel, // Kirim data total gejala ke view
            'totalUser' => $totalUser, // Kirim data total gejala ke view
        ]);
    }
}
