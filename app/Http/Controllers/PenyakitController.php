<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenyakitModel;
use Illuminate\Support\Facades\Auth;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakit = PenyakitModel::all();
        // $settingItem = SettingModel::first();
        $currentUser = Auth::user();
        return view('pages.penyakit.index', [
            'title' => 'penyakit',
            'active' => 'Penyakit',
            'penyakit' => $penyakit,
            'currentUser' => $currentUser,
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function create()
    {
        // $settingItem = SettingModel::first();
        $currentUser = Auth::user();
        return view('pages.penyakit.create', [
            'title' => 'Tambah penyakit ',
            'active' => 'Penyakit',
            'currentUser' => $currentUser,
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function edit($id)
    {
        // $settingItem = SettingModel::first();
        $currentUser = Auth::user();
        return view('pages.penyakit.edit', [
            'title' => 'Edit penyakit',
            'active' => 'Penyakit',
            'penyakit' => PenyakitModel::findOrFail($id),
            'currentUser' => $currentUser,
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array 
        ]);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_penyakit' => 'required|max:40',
            'nama_penyakit' => 'required',
            'deskripsi' => 'required',
            'penanganan' => 'required',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama budaya sudah ada. Harap pilih nama budaya yang lain.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            penyakitModel::create($validatedData);

            return redirect('/penyakit')->with('success', 'Data Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Kode Penyakit Sudah Digunakan.');
        }

    }
    public function update(Request $request, $id)
    {
        $penyakit = penyakitModel::find($id);

        if (!$penyakit) {
            return redirect('/penyakit')->with('error', 'Data penyakit tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'kode_penyakit' => 'required|max:40',
            'nama_penyakit' => 'required',
            'deskripsi' => 'required',
            'penanganan' => 'required',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama budaya sudah ada. Harap pilih nama budaya yang lain.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $validatedData = $validator->validated();

            $penyakit->update($validatedData);

            return redirect('/penyakit')->with('success', 'Data Berhasil Diperbarui!');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Kode Penyakit Sudah Digunakan.');
        }
    }

    public function destroy(int $id)
    {
        $penyakit = penyakitModel::find($id);

        if (!$penyakit) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        $penyakit->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $penyakit = PenyakitModel::where('kode_penyakit', 'like', "%{$query}%")
            ->orWhere('nama_penyakit', 'like', "%{$query}%")
            ->orWhere('deskripsi', 'like', "%{$query}%")
            ->orWhere('penanganan', 'like', "%{$query}%")
            ->get();

        return view('penyakit.index', compact('penyakit'));
    }

}
