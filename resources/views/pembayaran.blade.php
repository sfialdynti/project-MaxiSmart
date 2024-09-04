<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <title>Pembayaran - MaxiSmart</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow-sm fixed-top" style="background-color: white; color:#1a7482">
        <div class="container">
            <a href="/home" class="navbar-brand fw-bold">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#1a7482" class="bi bi-reply-fill" viewBox="0 0 16 16">
                    <path d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                </svg>
                <span style="color: #1a7482" class="m-2">Pembayaran</span>
            </a>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px">
        <h2 class="mb-4">Pesanan</h2>

        <div class="card shadow border-0 mb-4">
            <div class="card-body p-4">
                @foreach ($items as $item)
                    @php
                        $harga_satuan = $item->bukus->harga;
                        $subtotal = $item->jumlah * $harga_satuan;
                    @endphp
                    <div class="row align-items-center mb-3 p-4">
                        <div class="col-3">
                            <img src="{{ asset('storage/foto/' .$item->bukus->foto_buku) }}" alt="" style="width: 120px; height: 170px; border-radius: 30px" class="shadow">
                        </div>
                        <div class="col-7">
                            <p class="text-black fw-bold">{{ $item->bukus->nama_buku }}</p>
                            <p class="text-black">Jumlah Beli: {{ $item->jumlah }}</p>
                            <p class="text-black">Harga Buku: Rp. {{ number_format($harga_satuan, 2) }}</p>
                            <p class="text-black fw-bolder">Sub Total: Rp. {{ number_format($subtotal, 2) }} </p>
                        </div>
                    </div>
                @endforeach
                <hr>
                <h4>Total Pembayaran: Rp. {{ number_format($total, 2) }}</h4>
            </div>
        </div>

        <h4 class="mb-3">Detail Pembayaran</h4>
        <form action="/pembayaranfix" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Pengiriman</label>
                <input type="text" class="form-control" id="alamat" name="alamat" rows="3" value="{{ $user->alamat }}"></input>
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $user->nohp }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_transaksi" class="form-label">Tanggal Pembelian</label>
                <input type="date" name="tanggal_transaksi" class="form-control" id="" value="{{ now()->format('Y-m-d') }}" readonly>
            </div>
            <div class="mb-3">
                <label for="tanggal_sampai" class="form-label">Tanggal Sampai</label>
                <input type="date" name="tanggal_sampai" class="form-control" id="" value="{{ now()->addDays(4)->format('Y-m-d') }}" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
        </form>
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
