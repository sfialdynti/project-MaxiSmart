<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembayaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }

    public function bukus()
    {
        return $this->belongsTo(Buku::class);
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }
}
