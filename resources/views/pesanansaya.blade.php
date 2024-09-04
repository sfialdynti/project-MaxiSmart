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
                    <span style="color: #1a7482" class="m-2">Pesanan Saya</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px">
        @foreach ($pesanan as $key => $item)
        <div class="card shadow border-0 mt-3 p-5">
            <div class="row align-items-center">
                <div class="col-2">
                    <p class="fw-bold text-primary">{{ $key+1 }}</p>
                </div>
            <div class="col ">
                <p class="text-black fw-bolder">Total : Rp. {{ number_format($item->total, 2) }}</p>
                <p class="text-black">Tanggal Pembelian {{ $item->tanggal_transaksi }}</p>
                <p class="text-black">Tanggal Sampai {{ $item->tanggal_sampai }}</p>
            </div>    
            </div>
        </div>
        @endforeach
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>