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
                <a href="/home" class=" navbar-brand fw-bold col-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#1a7482" class="bi bi-reply-fill" viewBox="0 0 16 16">
                        <path d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                    </svg>
                </a>
                <span style="color: #1a7482; font-size: 20px" class=" col-2 fw-bold mt-2">Profile</span>
            </div>
        </div>
    </nav>

    <div class=" container" style="margin-top: 100px">
        <div class=" card shadow border-0" style="border-radius: 20px;">
            <form action="/profile/update/{{ $user->id }}" method="post" enctype="multipart/form-data">
            <div class=" row">
                @csrf
                <div class=" col-2 m-5">
                    @if ($user->foto)
                    <img src="{{ asset('storage/foto/' .$user->foto) }}" alt="" class=" rounded-circle" style="width: 160px; height: 160px">
                    @endif
                    <div class=" col mt-4">
                        <input type="file" name="foto" class="file-upload-default @error('foto_buku') is-invalid @enderror">
                    </div>
                </div>
                <div class=" col m-5">
                    <div class=" mb-2">
                        <label for="name" style="color: #1a7482" class=" mb-2">Nama Lengkap</label>
                        <input type="text" name="name" id="" class=" form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name ?? '') }}">
                        @error('name')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class=" mb-2">
                        <label for="email" style="color: #1a7482" class=" mb-2">Email</label>
                        <input type="email" name="email" id="" class=" form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email ?? '') }}">
                        @error('email')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class=" mb-2">
                        <label for="password" style="color: #1a7482" class=" mb-2">Password</label>
                        <input type="password" name="password" id="" class=" form-control @error('password') is-invalid @enderror" value="">
                        @error('password')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class=" mb-2">
                        <label for="alamat" style="color: #1a7482" class=" mb-2">Alamat</label>
                        <input type="text" name="alamat" id="" class=" form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $user->alamat ?? '') }}">
                        @error('alamat')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class=" mb-2">
                        <label for="nohp" style="color: #1a7482" class=" mb-2">No Handphone</label>
                        <input type="number" name="nohp" id="" class=" form-control @error('nohp') is-invalid @enderror" value="{{ old('nohp', $user->nohp ?? '') }}">
                        @error('nohp')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" style="background-color: #1a7482" class=" border-0 text-white p-2 rounded-3 px-4">Edit</button>
                    </div>

                </div>
            </div>
        </form>
        </div>
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>