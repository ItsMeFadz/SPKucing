<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\ArtikelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        $artikel = ArtikelModel::all();
        // $artikel = ArtikelModel::paginate(6);
        // $settingItem = SettingModel::first();

        return view('pages.artikel.index', [
            'title' => 'artikel',
            'active' => 'Artikel',
            'artikel' => $artikel,
            'currentUser' => $currentUser,
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function create()
    {
        $currentUser = Auth::user();
        // $settingItem = SettingModel::first();
        return view('pages.artikel.create', [
            'title' => 'Tambah Artikel ',
            'active' => 'Artikel',
            'currentUser' => $currentUser,
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function edit($id)
    {
        // $settingItem = SettingModel::first();
        $currentUser = Auth::user();
        return view('pages.artikel.edit', [
            'title' => 'Edit Artikel',
            'active' => 'Artikel',
            'artikel' => ArtikelModel::findOrFail($id),
            'currentUser' => $currentUser,
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array 
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_artikel' => 'required',
            'penulis' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
                'file' => 'Kolom :attribute tidak boleh lebih dari :max kilobyte.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');
                $validatedData['gambar'] = $filePath;
            }

            ArtikelModel::create($validatedData);

            return redirect('/artikel')->with('success', 'Data Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }


    public function update(Request $request, $id)
    {
        $artikel = ArtikelModel::find($id);

        if (!$artikel) {
            return redirect('/artikel')->with('error', 'Data artikel tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'nama_artikel' => 'required',
            'penulis' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
                'file' => 'Kolom :attribute tidak boleh lebih dari :max kilobyte.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');
                $validatedData['gambar'] = $filePath;

                // Hapus gambar lama jika ada
                if ($artikel->gambar && file_exists(storage_path('app/public/' . $artikel->gambar))) {
                    unlink(storage_path('app/public/' . $artikel->gambar));
                }
            }

            $artikel->update($validatedData);

            return redirect('/artikel')->with('success', 'Data Berhasil Diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }

    public function destroy(int $id)
    {
        $artikel = ArtikelModel::find($id);

        if (!$artikel) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        $artikel->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    }
}
