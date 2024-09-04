<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <title>Login-MaxiSmart</title>
</head>
<body>
    @if (session('statusLogin'))
        <div class="alert alert-danger">
            {{ session('statusLogin') }}
        </div>
    @endif

    <section>
        <div class=" px-4 py-5 px-md-5 text-center text-lg-start">
            <div class="container">
                <div class=" row align-items-center">
                    <div class=" col-lg-6 mb-5 mb-lg-0">
                        <h1 class=" my-5 fw-bold" style="color: #1a7482">The Best Online Shop 
                            <br>
                            <span class="" style="color: #66c0a5">For your reading hobby</span>
                        </h1>
                        <p style="color: rgb(94, 94, 94)">Ayoo login ke akunmu. <br> Klik Register untuk membuat akun :)</p>
                    </div>

                    <div class=" col-lg-6 mb-5 mb-lg-0">
                        <ul class=" nav nav-pills" style="font-size: 25px">
                            <li class=" nav-item">
                                <a href="/login" class=" nav-link" style="color: #1a7482">Login</a>
                            </li>
                            <p class=" nav-link fw-bold" style="color: #1a7482">/</p>
                            <li class=" nav-item">
                                <a href="/register" class=" nav-link" style="color: #1a7482">Register</a>
                            </li>
                        </ul>

                        <div class="card bg-transparent shadow border-0">
                            <div class=" card-body py-5">
                                <form action="/auth" method="post">
                                    @csrf
                                <div class=" row">
                                    <div class=" mb-4">
                                        <label for="email" class=" form-check-label " style="color: #1a7482">Email</label>
                                        <input name="email" class=" form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                        @error('email')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class=" mb-4">
                                        <label for="password" class=" form-check-label" style="color: #1a7482">Password</label>
                                        <input type="password" name="password" class=" form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <div class=" invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class=" mb-4">
                                        <button class="btn btn-block text-white" type="submit" style="background-color: #1a7482">Login</button>
                                    </div>


                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>