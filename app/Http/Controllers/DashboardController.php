<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPembayaran;
use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adm(){
        $user = Auth::user();
        $data = [
            'total_user' => User::count(),
            'total_kategori' => Kategori::count(),
            'total_buku' => Buku::count(),
            'total_pembayaran' => DetailPembayaran::count(),
            'pembayaran' => Pembayaran::with('user')->get()
        ];

        return view('dashboard', ['user' => $user]+ $data);
    }
}
