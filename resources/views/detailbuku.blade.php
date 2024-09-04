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
                    <span style="color: #1a7482">{{ $buku->nama_buku }}</span>
                </a>
            </div>
        </div>
    </nav>

    
    <div class=" py-5 container" style="margin-top: 60px">
        @if(session('berhasil'))
            <div class="alert alert-success">
                {{ session('berhasil') }}
            </div>
        @endif
        <div class=" card shadow border-0">
            <div class=" row">
                <div class=" d-flex col-2 m-5">
                    <img src="{{ asset('storage/foto/' .$buku->foto_buku) }}" alt="" style="width: 220px; height: 370px; border-radius: 30px" class=" shadow">
                </div>
                <div class="col m-5">
                    <h3>{{ $buku->nama_buku }}</h3>
                    <p>{{ $buku->kategori->nama_kategori }}</p>
                    <p>{{ $buku->deskripsi_buku }}</p>
                    <h6>Stok : {{ $buku->jumlah_buku }}</h6>
                    <h5 class=" mt-5">Rp. {{ number_format($buku->harga, 2, ',', '.') }}</h5>

                    
                    <form action="/tambahkeranjang" method="POST" class=" mt-5">
                        @csrf
                        <input type="hidden" name="bukus_id" value="{{ $buku->id }}">
                        <input type="hidden" id="stok_buku" value="{{ $buku->jumlah_buku }}">
                        <div class="row">

                            <div class="input-group mb-3 col" style="max-width: 200px;">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-outline-secondary" onclick="decrementQuantity()">-</button>                            
                                </div>
                            <input type="number" name="jumlah" id="jumlah" class="form-control text-center" value="1" min="1" max="{{ $buku->jumlah_buku }}" oninput="checkQuantity()">                            
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" onclick="incrementQuantity()">+</button>                            
                            </div>
                            </div>
                        <button type="submit" name="keranjang" class="col mb-3 btn text-white " style=" background-color: #1a7482">Tambah ke Keranjang</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function decrementQuantity() {
            var input = document.getElementById('jumlah');
            var value = parseInt(input.value, 10);
            if (value > 1) {
                input.value = value - 1;
            }
        }
    
        function incrementQuantity() {
            var input = document.getElementById('jumlah');
            var value = parseInt(input.value, 10);
            var stok = parseInt(document.getElementById('stok_buku').value, 10);
            if (value < stok) {
                input.value = value + 1;
            }
        }
    
        function checkQuantity() {
            var input = document.getElementById('jumlah');
            var value = parseInt(input.value, 10);
            var stok = parseInt(document.getElementById('stok_buku').value, 10);
            if (value > stok) {
                input.value = stok;
            } else if (value < 1) {
                input.value = 1;
            }
        }
    </script>
    
</body>
</html>