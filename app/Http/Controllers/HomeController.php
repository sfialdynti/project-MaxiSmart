<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function show(Request $request)
    {
        $data['user'] = Auth::user();
        $data['kategori'] = Kategori::all();
        return view('home', $data);
    }

    public function searchbuku(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $query = $kategori->bukus();

    if ($search = $request->get('search')) {
        $query->where('nama_buku', 'LIKE', '%'.$search.'%');
    }

    $buku = $query->get();

    return view('detailkategori', compact('kategori', 'buku'));
    }

    public function detail(Request $request)
    {
        $data['kategori'] = Kategori::with('bukus')->find($request->id);
        $data['buku'] = $data['kategori']->bukus;
    
        return view('detailkategori', $data);
    }

    public function dtlbuku(Request $request)
    {
        $data['buku'] = Buku::find($request->id);
        $data['produk'] = Kategori::All();

        return view('detailbuku', $data);
    }


    public function dtluser(Request $request)
    {
        $data['user'] = User::find($request->id);
        return view('profile', $data);
    }

    public function updtuser(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'alamat' => 'required',
            'nohp' => 'required',
            'foto' => 'image'
        ], [
            'name.required' => 'Nama Lengkap tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Masukkan Email yang Valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus berjumlah minimal 6 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'nohp.required' => 'No Handphone tidak boleh kosong',
            'foto.image' => 'Foto harus menggunakan format yang benar'
        ]);

        $fileName = '';
        
        if ($request->file('foto')) {
            $extfile = $request->file('foto')->getClientOriginalExtension();
            $fileName = time() . "." . $extfile;
            $request->file('foto')->storeAs('public/foto', $fileName);
        }

        $update = User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : DB ::raw('password'),
            'levels_id' => $request->levels_id ?? 2,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'foto' => $fileName
        ]);

        return redirect('home');

    }

}
