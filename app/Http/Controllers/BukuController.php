<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function showbuku()
    {
        $data['buku'] = Buku::orderby('nama_buku', 'asc')->get();
        $data['total_buku'] = Buku::count();
        $data['buku'] = Buku::paginate(10);
        return view('daftarbuku', $data);
    }

    public function search(Request $request){
        $search = $request->input('cari');
        $query = Buku::query();

        if ($search) {
        $query->where('nama_buku', 'LIKE', '%'.$request->cari.'%')
        ->orWhereHas('kategori', function($query) use ($search){
            $query->where('nama_kategori', 'LIKE', '%'.$search.'%');
        })->get();
        }

        $data['buku'] = $query->paginate(10)->appends(['cari' => $search]);
        return view('daftarbuku', $data);
    }

    public function create()
    {
        $data['kategori'] = Kategori::all();
        return view('tambahbuku', $data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'kategoris_id' => 'required',
            'nama_buku' => ['required', 'unique:bukus,nama_buku'],
            'deskripsi_buku' => 'required',
            'harga' => 'required',
            'jumlah_buku' => 'required',
            'foto_buku' => 'image'
        ], [
            'kategoris_id.required' => 'Kategori tidak boleh kosong',
            'nama_buku.required' => 'Nama buku tidak boleh kosong',
            'nama_buku.unique' => 'Buku sudah ada, silahkan tambah buku yang lain yang lain',
            'deskripsi_buku.required' => 'Deskripsi tidak boleh kosong',
            'harga.required' => 'Harga tidak boleh kosong',
            'jumlah_buku.required' => 'Jumlah buku tidak boleh kosong',
            'foto_buku.image' => 'Foto harus menggunakan format yang benar' 
        ]);

        $fileName = '';
        if ($request->file('foto_buku')) {
            $extFile = $request->file('foto_buku')->getClientOriginalExtension();
            $fileName = time() . "." . $extFile;
            $request->file('foto_buku')->storeAs('public/foto', $fileName);
        }

        $buku = Buku::create([
            'kategoris_id' => $request->kategoris_id,
            'nama_buku' => $request->nama_buku,
            'deskripsi_buku' => $request->deskripsi_buku,
            'harga' => $request->harga,
            'jumlah_buku' => $request->jumlah_buku,
            'foto_buku' => $fileName
        ]);

        if ($buku) {
            Session::flash('pesan', 'Data berhasil disimpan');
        }else {
            Session::flash('pesan', 'Data Gagal disimpan');
        }

        return redirect('daftarbuku');

    }

    public function edit(Request $request)
    {
        $data['buku'] = Buku::find($request->id);
        $data['kategori'] = Kategori::all();
        return view('editbuku', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'kategoris_id' => 'required',
            'nama_buku' => 'required',
            'deskripsi_buku' => 'required',
            'harga' => 'required',
            'jumlah_buku' => 'required',
            'foto_buku' => 'image'
        ], [
            'kategoris_id.required' => 'Kategori tidak boleh kosong',
            'nama_buku.required' => 'Nama buku tidak boleh kosong',
            'deskripsi_buku.required' => 'Deskripsi tidak boleh kosong',
            'harga.required' => 'Harga tidak boleh kosong',
            'jumlah_buku.required' => 'Jumlah buku tidak boleh kosong',
            'foto_buku.image' => 'Foto harus menggunakan format yang benar' 
        ]);

        $fileName = '';
        if ($request->file('foto_buku')) {
            $extFile = $request->file('foto_buku')->getClientOriginalExtension();
            $fileName = time() . "." . $extFile;
            $request->file('foto_buku')->storeAs('public/foto', $fileName);
        }

        $update = Buku::where('id', $request->id)->update([
            'kategoris_id' => $request->kategoris_id,
            'nama_buku' => $request->nama_buku,
            'deskripsi_buku' => $request->deskripsi_buku,
            'harga' => $request->harga,
            'jumlah_buku' => $request->jumlah_buku,
            'foto_buku' => $fileName
        ]);

        if ($update) {
            Session::flash('pesan', 'Data berhasil diubah');
        }else{
            Session::flash('pesan', 'Data gagal diubah');
        }

        return redirect('daftarbuku');
    }

    public function delete(Request $request)
    {
        $buku = Buku::find($request->id);
        $delete = Buku::where('id', $request->id)->delete();
        if ($delete) {
            if ($buku->foto_buku) {
                Storage::delete('foto/' .$buku->foto);
            }
            Session::flash('pesan', 'Data berhasil dihapus');
        }else{
            Session::flash('pesan', 'Data gagal dihapus');
        }

        return redirect('daftarbuku');
    }
}
