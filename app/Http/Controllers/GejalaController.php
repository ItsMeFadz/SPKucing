<?php

namespace App\Http\Controllers;


use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\GejalaModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GejalaController extends Controller
{
    public function index()
    {
        $gejala = GejalaModel::all();
        $currentUser = Auth::user();
        // $settingItem = SettingModel::first();
        return view('pages.gejala.index', [
            'title' => 'gejala',
            'active' => 'Gejala',
            'gejala' => $gejala,
            'currentUser' => $currentUser,
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function create()
    {
        // $settingItem = SettingModel::first();
        $currentUser = Auth::user();
        return view('pages.gejala.create', [
            'title' => 'Tambah Gejala ',
            'active' => 'Gejala',
            'currentUser' => $currentUser,
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function edit($id)
    {
        // $settingItem = SettingModel::first();
        $currentUser = Auth::user();
        return view('pages.gejala.edit', [
            'title' => 'Edit Gejala',
            'active' => 'Gejala',
            'gejala' => GejalaModel::findOrFail($id),
            'currentUser' => $currentUser,
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array 
        ]);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_gejala' => 'required|max:40',
            'nama_gejala' => 'required',
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

            GejalaModel::create($validatedData);

            return redirect('/gejala')->with('success', 'Data Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }

    }
    public function update(Request $request, $id)
    {
        $gejala = GejalaModel::find($id);

        if (!$gejala) {
            return redirect('/gejala')->with('error', 'Data gejala tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'kode_gejala' => 'required|max:40',
            'nama_gejala' => 'required',
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

            $gejala->update($validatedData);

            return redirect('/gejala')->with('success', 'Data Berhasil Diperbarui!');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }

    public function destroy(int $id)
    {
        $gejala = GejalaModel::find($id);

        if (!$gejala) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        $gejala->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    }
}
