<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login (){
        return view('login');
    }

    public function auth(Request $request){
        $validate = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Masukkan Email yang Valid',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        if (Auth::attempt($validate)) {
            if (Auth::user()->levels_id == 1) {
                return redirect('dashboard');
            } else {
                return redirect('home');
            }
        }

        return redirect()->back()->with('statusLogin', 'Maaf Login anda gagal, Email atau Password yang dimasukkan salah');

    }

    public function register (){
        $data['level'] = Level::all();
        return view('register', $data);
    }

    public function addreg (Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'alamat' => 'required',
            'nohp' => 'required',
        ], [
            'name.required' => 'Nama Lengkap tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Masukkan Email yang Valid',
            'email.unique' => 'Email sudah digunakkan, silahkan pakai email yang lain',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus berjumlah minimal 6 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'nohp.required' => 'No Handphone tidak boleh kosong',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'levels_id' => $request->levels_id ?? 2,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'foto' => $request->hasFile('foto') ? $request->file('foto')->store('public/foto') : null,
        ]);

        return redirect('login');

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
