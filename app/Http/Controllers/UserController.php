<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $currentUser = Auth::user();
        return view('pages.user.index', [
            'title' => 'User',
            'active' => 'User',
            'user' => $user,
            'currentUser' => $currentUser,
        ]);
    }

    public function create()
    {
        $currentUser = Auth::user();
        return view('pages.user.create', [
            'title' => 'Tambah User',
            'active' => 'User',
            'currentUser' => $currentUser,
        ]);
    }

    public function edit($id)
    {
        $currentUser = Auth::user();
        return view('pages.user.edit', [
            'title' => 'Edit User',
            'active' => 'User',
            'user' => User::findOrFail($id),
            'currentUser' => $currentUser,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:40',
            'nama' => 'required',
            'password' => 'required|confirmed|min:8',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'min' => [
                'string' => 'Kolom :attribute harus memiliki minimal :min karakter.',
            ],
            'confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();
            $validatedData['password'] = Hash::make($validatedData['password']);

            User::create($validatedData);

            return redirect('/user')->with('success', 'Data Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Username Sudah Digunakan.');
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'username' => 'required|max:40',
            'nama' => 'required',
            'password' => 'nullable|confirmed|min:8',
            'password_lama' => 'required_with:password',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'min' => [
                'string' => 'Kolom :attribute harus memiliki minimal :min karakter.',
            ],
            'confirmed' => 'Konfirmasi password tidak cocok.',
            'required_with' => 'Kolom password lama harus diisi jika ingin mengubah password.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            // Verifikasi password lama jika password baru diisi
            if (!empty($validatedData['password'])) {
                if (!Hash::check($validatedData['password_lama'], $user->password)) {
                    return redirect()->back()->withErrors(['password_lama' => 'Password lama tidak sesuai.'])->withInput();
                }
                $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                unset($validatedData['password']);
            }

            $user->update($validatedData);

            return redirect('/user')->with('success', 'Data Berhasil Diperbarui!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }


    public function destroy(int $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus.');
    }
}
