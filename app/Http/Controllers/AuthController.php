<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function prosesregister(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'password' => ['required', 'min:8', 'confirmed'],
                // 'password_konfirmasi' => ['required', 'min:8', 'confirmed'],
            ],

            [
                'name.required' => 'Silahkan isi nama anda',
                'username.required' => 'Silahkan isi usernama anda',
                'username.unique' => 'Nama ini sudah terdaftar sebelumnnya',
                'password.required' => 'Silahkan isi password anda',
                'password.min' => 'Isi password minimal 8 karakter',
                'password.confirmed' => 'Password dan konfirmasi password harus sama',
            ]
        );

        $validatedData['password'] = Hash::make($validatedData['password']);
        // dd($validatedData);
        User::create($validatedData);

        return redirect()->route('login.login')->with('success', 'Registrasi anda berhasil!, Silahkan Login');
    }


    public function proseslogin(Request $request)
    {
        $validatedData = $request->validate(
            [
                'username' => ['required'],
                'password' => 'required|min:8',
            ],

            [
                'username.required' => 'Silahkan isi usernama anda',
                'password.required' => 'Silahkan isi password anda',
                'password.min' => 'Isi password minimal 8 karakter',
            ]
        );

        Auth::attempt($validatedData);

        if (Auth::check()) {
            return redirect()->route('penjualan.index');
        } else {
            return redirect()->route('login.login')->with(['loginError' => 'Username atau Password tidak ditemukan!']);
        }
    }
}
