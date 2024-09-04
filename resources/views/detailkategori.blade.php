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
                    <span style="color: #1a7482">{{ $kategori->nama_kategori }}</span>
                </a>
            </div>
            <div class="col">
                <form type="" action="{{ route('search', $kategori->id) }}" class="d-flex">
                    @csrf
                    <input type="search" name="search" id="" placeholder="Type here..." class=" form-control me-2" style="background-color: transparent">
                    <button type="submit" class=" btn btn-outline-info">Search</button>
                </form>
            </div>

        </div>
    </nav>

    <div class=" py-5">
        <div class=" container">
            <div class=" row">
                @foreach ($buku as $item)
                    
                <div class=" d-flex col-2">
                    <a href="{{ route('buku.show', ['kategori_id' => $kategori->id, 'id' => $item->id]) }}" class=" text-decoration-none">

                    <div class=" card my-5 shadow border-0" style="border-radius: 20px; width: 170px; height: 400px">
                        <img src="{{ asset('storage/foto/' .$item->foto_buku) }}" alt="" style="width: 120px; height:170px; border-radius: 30px" class=" m-4 shadow">
                        <div class=" card-body">
                            <h6 class=" card-title">{{ $item->nama_buku }}</h6>
                            <p class=" card-text" style="font-size: 14px">Stok :{{ $item->jumlah_buku }}</p>
                            <p class=" fw-bold">Rp. {{ number_format($item->harga, 2, ',', '.') }}</p>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach

            </div>


        </div>
    </div>



    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>