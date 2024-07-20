<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        // $settingItem = SettingModel::first();
        return view('pages.login', [
            'title' => 'Login',
            // 'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function login_proses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'exists:users,username'],
            'password' => ['required'],
        ], [
            'username.exists' => 'Username tidak terdaftar.',
            'password.required' => 'Password harus diisi.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $credentials = $validator->validated();

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('Dashboard');
            } else {
                return redirect()->back()->with('loginError', 'Gagal Masuk, password salah');
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal login. Silakan coba lagi.');
        }
    }

    public function logout(Request $request)
    {
        \Log::info('Logout method called with method: ' . $request->method());

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }



}
