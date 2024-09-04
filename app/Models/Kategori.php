<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'kategoris_id', 'id');
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($kategori)
    //     {
    //         $kategori->slug = Str::slug($kategori->nama_kategori);
    //     });
    // }
}
