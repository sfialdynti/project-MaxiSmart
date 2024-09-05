<?php

namespace App\Http\Controllers;

use App\Models\DetailPembayaran;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use Egulias\EmailValidator\Result\Reason\DetailedReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $itemIds = $request->input('items', []);
        $items = Keranjang::whereIn('id', $itemIds)->get();

        $total = $items->sum(function($item){
            $harga_satuan = $item ->bukus->harga;
            return $item->jumlah * $harga_satuan;
        });

        return view('pembayaran', [
            'user' => $user,
            'items' => $items,
            'total' => $total
        ]);
    }

    public function beli(Request $request)
    {
        $user = Auth::user();
        $keranjang = Keranjang::where('users_id', $user->id)->get();

        $totalbayar = $keranjang->sum(function($item){
            return $item->bukus->harga * $item->jumlah;
        });

        $pembayaran = Pembayaran::create([
            'users_id' => $user->id,
            'total' => $totalbayar,
            'tanggal_transaksi' => now(),
            'tanggal_sampai' => now()->addDays(4),
        ]);

        foreach ($keranjang as $item){
            $harga_buku = $item->bukus->harga ?? 0;

           DetailPembayaran::create([
            'pembayarans_id' => $pembayaran->id,
            'bukus_id' => $item->bukus_id,
            'jumlah' => $item->jumlah,
            'harga' => $harga_buku
           ]);

            $buku = $item->bukus;
            $buku->jumlah_buku -= $item->jumlah;
            $buku->save();

           
        }
        Keranjang::where('users_id', $user->id)->delete();        
        return redirect('pesanansaya');
    }

    public function psn()
    {
        $data['pesanan'] = Pembayaran::with('keranjang.bukus')
        ->where('users_id', auth()->id())
        ->get();

        return view('pesanansaya', $data);
    }
}
