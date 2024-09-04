<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

    <title>MaxiSmart</title>
    
</head>
<body>
    <nav class=" navbar navbar-expand-lg shadow-sm fixed-top" style="background-color: white; color:#1a7482">
        <div class=" container">
            <div class=" row">
                <a href="/home" class=" navbar-brand fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#1a7482" class="bi bi-reply-fill" viewBox="0 0 16 16">
                        <path d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                    </svg>
                    <span style="color: #1a7482" class="m-2">Tas mu</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px">
        @if($keranjang->isEmpty())
        <div class="alert alert-info" role="alert">
            Keranjang Anda kosong. Tambahkan beberapa buku ke keranjang untuk melanjutkan.
        </div>
        @else
        <form action="/pembayaran" method="post">
            @csrf
            @foreach ($keranjang as $item)
            @php
                $harga_satuan = $item->bukus->harga;
                $subtotal = $item->jumlah * $harga_satuan;
            @endphp
                <div class="card shadow border-0 mt-3 p-5">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <input type="checkbox" name="items[]" value="{{ $item->id }}">
                        </div>
                    <div class="col-3 ">                                
                        <img src="{{ asset('storage/foto/' .$item->bukus->foto_buku) }}" alt="" style="width: 120px; height: 170px; border-radius: 30px" class=" shadow">
                    </div>
                    <div class="col-6 ">
                        <p class="text-black fw-bold" style="font-size: 20px">{{ $item->bukus->nama_buku }}</p>
                        <p class="text-black">Jumlah Beli : {{ $item->jumlah }}</p>
                        <p class="text-black">Harga Buku : Rp. {{ number_format($harga_satuan, 2) }}</p>
                        <p class="text-black fw-bolder">Sub Total : Rp. {{ number_format($subtotal, 2) }}</p>
                    </div>
                    <div class="col-2 text-end ">
                        <a href="keranjang/delete/{{ $item->id }}" style="display:inline;" onclick="return window.confirm('Yakin hapus buku ini dari keranjang?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                        </a>
                    </div>         
                </div>
             </div>
            @endforeach
                <div class="d-flex justify-content-end mt-5 mb-5 ">
                    <button type="submit" class="btn btn-primary">Lanjutkan ke Pembayaran</button>
                </div>
        </form>
        @endif
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>