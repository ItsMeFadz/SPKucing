<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArtikelModel;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil semua data artikel dari database
        $artikels = ArtikelModel::all();

        // Kirim data artikel ke view 'landing'
        return view('landing', compact('artikels'));
    }
}
