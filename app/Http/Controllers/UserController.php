<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showusr()
    {
        $data['user'] = User::orderby('name', 'asc')->get();
        $data['total_user'] = User::count();
        $data['user'] = User::paginate(10);
        return view('daftarusr', $data);
    }

    public function search(Request $request){
        $search = $request->input('cari');
        $query = User::query();

        if ($search) {
        $query->where('name', 'LIKE', '%'.$request->cari.'%')->orwhere('email', 'LIKE', '%'.$request->cari.'%')->get();
        }
        $data['user'] = $query->paginate(10)->appends(['cari' => $search]);
        return view('daftarusr', $data);
    }

    
    public function create()
    {
        $data['level'] = Level::all();
        return view('tambahusr', $data);
    }
    
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'levels_id' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'foto' => 'image'
        ], [
            'name.required' => 'Nama Lengkap tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Masukkan Email yang Valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus berjumlah minimal 6 karakter',
            'levels_id.required' => 'Peran tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'nohp.required' => 'No Handphone tidak boleh kosong',
            'foto.image' => 'Foto harus menggunakan format yang benar'
        ]);

        $fileName = '';
        if ($request->file('foto')) {
            $extFile = $request->file('foto')->getClientOriginalExtension();
            $fileName = time() . "." . $extFile;
            $request->file('foto')->storeAs('public/foto', $fileName);
        }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : DB ::raw('password'),
            'levels_id' => $request->levels_id,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'foto' => $fileName
        ]);

        if ($user) {
            Session::flash('pesan', 'Data berhasil disimpan');
        }else {
            Session::flash('pesan', 'Data Gagal disimpan');
        }
        
        return redirect('daftarusr');
    }
    
    public function edit(Request $request)
    {
        $data['user'] = User::find($request->id);
        $data['level'] = Level::all();
        return view('editusr', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'levels_id' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'foto' => 'image'
        ], [
            'name.required' => 'Nama Lengkap tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Masukkan Email yang Valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus berjumlah minimal 6 karakter',
            'levels_id.required' => 'Peran tidak boleh kosong',
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
            'levels_id' => $request->levels_id,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'foto' => $fileName
        ]);

        if ($update) {
            Session::flash('pesan', 'Data berhasil diubah');
        }else{
            Session::flash('pesan', 'Data gagal diubah');
        }

        return redirect('daftarusr');
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $delete = User::where('id', $request->id)->delete();
        if ($delete) {
            if ($user->foto) {
                Storage::delete('foto/' .$user->foto);
            }
            Session::flash('pesan', 'Data berhasil dihapus');
        }else{
            Session::flash('pesan', 'Data gagal dihapus');
        }

        return redirect('daftarusr');
    }
}
