<?php

namespace App\Http\Controllers;

use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BasisModel;
use App\Models\BasisDetailModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BasisController extends Controller
{
public function index()
{
    // $basis = BasisModel::all();
    $basis = BasisModel::with('penyakit')->get();
    // $settingItem = SettingModel::first();
    $currentUser = Auth::user();
    return view('pages.basis.index', [
        'title' => 'Basis',
        'active' => 'Basis',
        'basis' => $basis,
        'currentUser' => $currentUser,
        // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
    ]);
}

    public function create()
    {
        // $settingItem = SettingModel::first();
        $currentUser = Auth::user();
        return view('pages.basis.create', [
            'title' => 'Tambah Basis ',
            'active' => 'Basis',
            'currentUser' => $currentUser,
            'penyakit' => PenyakitModel::all(),
            'gejala' => GejalaModel::all(),
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function edit($id)
    {
        $currentUser = Auth::user();
        $basis = BasisModel::findOrFail($id);
        $gejala = GejalaModel::all();
        $penyakit = PenyakitModel::all();

        $selectedGejala = BasisDetailModel::where('id_basis', $id)->pluck('id_gejala')->toArray();

        return view('pages.basis.edit', [
            'title' => 'Edit Basis',
            'active' => 'Basis',
            'basis' => $basis,
            'gejala' => $gejala,
            'penyakit' => $penyakit,
            'selectedGejala' => $selectedGejala,
            'currentUser' => $currentUser,
        ]);
    }

    public function set_bobot($id)
    {
        // $settingItem = SettingModel::first();
        $basisDetails = BasisDetailModel::with('gejala')->where('id_basis', $id)->get();
        $currentUser = Auth::user();
        return view('pages.basis.set_bobot', [
            'title' => 'Edit Bobot',
            'active' => 'Basis',
            // 'gejala' => BasisModel::findOrFail($id),
            'currentUser' => $currentUser,
            'basisDetails' => $basisDetails, // Menambahkan settingItem ke dalam array 
        ]);
    }

    public function store(Request $request)
    {
        // Debugging request data
        // dd($request->all());
        Log::info('Request data:', $request->all());

        $validator = Validator::make($request->all(), [
            'id_penyakit' => 'required|integer|unique:basisrule,id_penyakit',
            'id_gejala' => 'required|array',
            'id_gejala.*' => 'required|integer',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'unique' => 'Data dengan penyakit yang dipilih sudah ada.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();
            Log::info('Validated data:', $validatedData);

            // Simpan data ke dalam tabel basisrule
            $basis = BasisModel::create([
                'id_penyakit' => $validatedData['id_penyakit'],
            ]);

            // Mengubah objek menjadi array sebelum mencatatnya
            Log::info('Basis created:', $basis->toArray());

            // Simpan data gejala ke dalam tabel basis_detail
            foreach ($validatedData['id_gejala'] as $id_gejala) {
                BasisDetailModel::create([
                    'id_basis' => $basis->id_basis,
                    'id_penyakit' => $validatedData['id_penyakit'],
                    'id_gejala' => $id_gejala,
                ]);
            }

            Log::info('Gejala details saved');

            return redirect('/basis')->with('success', 'Data Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            Log::error('Validation error:', $e->errors());

            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput()->with('error', 'Data dengan penyakit yang dipilih sudah ada.');
        } catch (\Exception $e) {
            Log::error('Exception error:', ['message' => $e->getMessage()]);

            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }


    // BasisController.php
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_penyakit' => 'required|exists:penyakit,id_penyakit', // pastikan id_penyakit ada di tabel penyakit
            'id_gejala' => 'required|array',
            'id_gejala.*' => 'required|exists:gejala,id_gejala', // pastikan semua id_gejala ada di tabel gejala
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'exists' => 'Data :attribute yang dipilih tidak valid.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            // Update basis detail dengan data yang divalidasi
            $basis = BasisModel::findOrFail($id); // Cari basis berdasarkan ID yang diberikan
            $basis->update([
                'id_penyakit' => $validatedData['id_penyakit'],
            ]);

            // Hapus basisDetail yang ada sebelum menyimpan yang baru
            BasisDetailModel::where('id_basis', $basis->id_basis)->delete();

            // Simpan data gejala ke dalam tabel basis_detail
            foreach ($validatedData['id_gejala'] as $id_gejala) {
                BasisDetailModel::create([
                    'id_basis' => $basis->id_basis,
                    'id_penyakit' => $validatedData['id_penyakit'],
                    'id_gejala' => $id_gejala,
                ]);
            }

            // Redirect dengan pesan sukses jika update berhasil
            return redirect()->route('basis.index')->with('success', 'Data Berhasil Diperbarui!');

        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Error: ' . $e->getMessage()], 500);
            }

            return redirect()->back()->with('error', 'Gagal menyimpan data. Error: ' . $e->getMessage());
        }
    }

    public function destroy(int $id)
    {
        $basis = BasisModel::find($id);

        if (!$basis) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        // Menghapus data terkait di BasisDetailModel
        $basis->details()->delete();

        // Menghapus data di BasisModel
        $basis->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    }


    public function storeBasisDetail(Request $request)
    {
        $idBasis = $request->input('id_basis');

        // Mengambil basis yang sudah ada atau membuat yang baru jika tidak ada
        $basis = BasisModel::firstOrCreate(['id_basis' => $idBasis]);

        // Menghapus basisDetails yang ada sebelum menyimpan yang baru
        BasisDetailModel::where('id_basis', $basis->id_basis)->delete();

        foreach ($request->input('basisDetails') as $detail) {
            BasisDetailModel::create([
                'id_basis' => $basis->id_basis,
                'id_penyakit' => $basis->id_penyakit,
                'id_gejala' => $detail['id_gejala'],
                'bobot_prioritas' => $detail['bobot_prioritas'],
            ]);
        }

        return response()->json(['success' => true]);
    }

}
