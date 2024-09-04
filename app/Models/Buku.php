<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kategori() 
    {
        return $this->belongsTo(Kategori::class, 'kategoris_id');
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    public function detailpembayaran()
    {
        return $this->hasMany(DetailPembayaran::class);
    }
}
