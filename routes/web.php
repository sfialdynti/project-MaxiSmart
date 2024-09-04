<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\UserController;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/daftarusr', function () {
//     return view('daftarusr');
// });

// Route::get('/kr', function () {
//     return view('pesanansaya');
// });


//Login
Route::get('/', [HomeController::class, 'show']);
Route::get('/login', [LoginController::class, 'login']);
Route::post('/auth', [LoginController::class, 'auth'] );

//Logout
Route::get('/logout', [LoginController::class, 'logout']);

//Register
Route::get('/register', [LoginController::class, 'register']);
Route::post('/add/reg', [LoginController::class, 'addreg']);

Route::middleware('statuslogin')->group(function () {
    //dashboard 
Route::get('/dashboard', [DashboardController::class, 'adm']);
// Route::get('/dashboard', [DashboardController::class, 'index']);

//User
Route::get('/daftarusr', [UserController::class, 'showusr']);
Route::post('/daftarusr', [UserController::class, 'search']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/create', [UserController::class, 'add']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);

//Kategori
Route::get('/daftarktgr', [KategoriController::class, 'showktgr']);
Route::post('/daftarktgr', [KategoriController::class, 'search']);
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
Route::post('/kategori/update/{id}', [KategoriController::class, 'update']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori/create', [KategoriController::class, 'add']);
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete']);

//Buku
Route::get('/daftarbuku', [BukuController::class, 'showbuku']);
Route::post('/daftarbuku', [BukuController::class, 'search']);
Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
Route::post('/buku/update/{id}', [BukuController::class, 'update']);
Route::get('/buku/create', [BukuController::class, 'create']);
Route::post('/buku/create', [BukuController::class, 'add']);
Route::get('/buku/delete/{id}', [BukuController::class, 'delete']);


Route::get('/detail/profile/{id}', [HomeController:: class, 'dtluser']);
Route::post('/profile/update/{id}', [HomeController::class, 'updtuser']);
// Route::get('/kategori/{slug}', [HomeController::class, 'showKategori'])->name('kategori.show');
// Route::get('/home', [HomeController::class, 'tampilbuku']);

// Keranjang
Route::post('/tambahkeranjang', [KeranjangController::class, 'tambahkeranjang']);
Route::get('/keranjang', [KeranjangController::class, 'showkeranjang']);
Route::get('/keranjang/delete/{id}', [KeranjangController::class, 'delete']);

//Pembayaran
Route::post('/pembayaran', [PembayaranController::class, 'show']);
Route::post('/pembayaranfix', [PembayaranController::class, 'beli']);
Route::get('/pesanansaya', [PembayaranController::class, 'psn']);


    
});

//Home / landingpage
Route::get('/home', [HomeController::class, 'show']);
Route::get('/detail/kategori/{id}', [HomeController::class, 'detail']);
Route::get('/kategori/{id}/search', [HomeController::class, 'searchbuku'])->name('search');
Route::get('/detail/buku/{id}', [HomeController::class, 'dtlbuku']);
Route::get('detail/kategori/{kategori_id}/buku/{id}', [HomeController::class, 'dtlbuku'])->name('buku.show');
