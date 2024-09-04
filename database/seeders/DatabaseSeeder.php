<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Level;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Level::create([
            'nama_level' => 'Admin'
        ]);

        Level::create([
            'nama_level' => 'Pengguna'
        ]);

        User::create([
            'name' => 'sofia',
            'email' => 'sofia@gmail.com',
            'password' => bcrypt('12345'),
            'levels_id' => 1,
            'alamat' => 'Bandung',
            'nohp' => '0899766666',
            'foto' => ''
        ]);

        // User::factory(15)->create();

        // Kategori::create([
        //     'nama_kategori' => 'Fiksi'
        // ]);

        // Kategori::create([
        //     'nama_kategori' => 'Pengetahuan'
        // ]);

        // Buku::create([
        //     'kategoris_id' => 2,
        //     'nama_buku' => 'Ips',
        //     'deskripsi_buku' => 'Buku ini adalah',
        //     'harga' => '100000',
        //     'jumlah_buku' => 50,
        //     'foto_buku' => ''
        // ]);

        // Buku::create([
        //     'kategoris_id' => 1,
        //     'nama_buku' => 'Filosofi Tras',
        //     'deskripsi_buku' => 'Buku ini adalah',
        //     'harga' => '150000',
        //     'jumlah_buku' => 50,
        //     'foto_buku' => ''
        // ]);

    }
}
