<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function tambahkeranjang(Request $request)
    {
        $buku = Buku::find($request->id);

        $cekkeranjang = Keranjang::where('users_id', Auth::id())->where('bukus_id', $request->bukus_id)->first();
        if ($cekkeranjang) {
            $cekkeranjang->jumlah += $request->jumlah;
            $cekkeranjang->save();
        } else {
            Keranjang::create([
                'users_id' => Auth::id(),
                'bukus_id' => $request->bukus_id,
                'jumlah' =>$request->jumlah,
            ]);
        }

        return redirect()->back()->with('berhasil', 'Buku berhasil ditambahkan ke keranjang');
    }

    public function showkeranjang(Request $request)
    {
        $data['keranjang'] = Keranjang::where('users_id', Auth::id())->with('bukus')->get();

        return view('keranjang', $data);
    }

    public function delete(Request $request)
    {
        $keranjang = Keranjang::find($request->id);
        $delete = Keranjang::where('id', $keranjang->id)->delete();

        return redirect('keranjang');
    }

}
