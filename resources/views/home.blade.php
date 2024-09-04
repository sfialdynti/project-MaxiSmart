<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <title>Home-MaxiSmart</title>
</head>
<body>

    <nav class=" navbar navbar-expand-lg shadow-sm fixed-top" style="background-color: white; color:#1a7482">
        <div class=" container">
            <a href="/home" class=" navbar-brand fw-bold" style="font-size: 30px; color:#1a7482">MaxiSmart</a>
            <div class="row">

                <div class="col">
                    <ul class=" navbar-nav">
                    <li class=" nav-item dropdown">
                        <a href="" class=" nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                        <ul class=" dropdown-menu dropdown">
                            @foreach ($kategori as $item)
                            <li><a href="detail/kategori/{{ $item->id }}" class=" dropdown-item">{{ $item->nama_kategori }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                        <li class=" nav-item">
                            <a href="#aboutus" class=" nav-link">AboutUs</a>
                        </li>
                        <li class=" nav-item">
                            <a href="#contact" class=" nav-link">Contact</a>
                        </li>
                        
                        <li class=" nav-item dropdown">
                            <a href="/profile" class=" nav-link " role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                            </a>
                            <ul class=" dropdown-menu dropdown dropdown-menu-start">
                                @guest
                                <li>
                                    <a href="/login" class=" dropdown-item">Login</a>
                                </li>
                                <li>
                                    <a href="/register" class=" dropdown-item">Daftar</a>
                                </li>
                                @endguest

                                @auth
                                    <li>
                                        <a href="detail/profile/{{ $user->id }}" class=" dropdown-item">Profile</a>
                                    </li>
                                    <li>
                                        <a href="/pesanansaya" class=" dropdown-item">Pesanan</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/logout"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>LogOut</a>
                                    </li>
                                @endauth
                            </ul>
                        </li>

                        <li class=" nav-item">
                            <a href="/keranjang" class=" nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

    <div class=" px-4 py-5 text-center text-lg-start" style="background-color: #1a7482;">
        <div class="container">
            <div class=" row align-items-center py-4">
                <div class=" col-lg-6 py-5">
                    <h1 class=" fw-bold pt-5 pb-3" style="color: white; font-size:50px;">Let's improve 
                        <br>
                        our knowledge
                        <br> 
                        by reading
                    </h1>
                    <p style="color: #f9cfc8; font-size:20px" class=" fw-bold">“If you don’t like to read, you haven’t found the right book.”</p>
                    <p style="color: #f9cfc8">-J.K Rowling</p>
                    <hr style="border-top: 3px solid white; width: 60%;">
                </div>
                <div class=" col-lg-6 d-flex justify-content-center">
                    <img src="img/pngbook.png" alt="" style="width: 270px;">
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: -250px">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,256L60,250.7C120,245,240,235,360,202.7C480,171,600,117,720,133.3C840,149,960,235,1080,234.7C1200,235,1320,149,1380,106.7L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    </div>

    <div class=" py-5">
        <div class=" container text-center pt-3 pb-5">
            <h4 class=" fw-bold">Our Latest Innovations</h4>
            <p class=" text-center pt-3" style="font-size: 18px">To support you in achieving a good life, our team developed this idea. 
                This dedication has resulted in an online store that will accompany you on your adventures and expand your knowledge. 
                Discover every genre that represents your personality and explore yourself with the latest releases.
            </p>
        </div>
    </div>

    <div class=" py-5">
        <img src="img/novel.jpg" alt="" style="width: 100%; height: 500px">
    </div>

    <div class=" container py-5">
        <h3 class=" pb-4 fw-bold">Kategori</h3>
        <div class=" overflow-x-auto" style="scrollbar-width: none">
            <div class=" row flex-nowrap">

                @foreach ($kategori as $item)
                    
                <div class=" text-center ms-3 pt-2" style="background-color: #1a7482; border-radius: 30px; width: 14%">
                    <a href="detail/kategori/{{ $item->id }}" class=" text-decoration-none text-white">
                        <p>{{ $item->nama_kategori }}</p>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class=" py-5">
        <div class=" container">
            @foreach ($kategori as $item)
            <div class=" d-flex justify-content-between align-items-center">
                <h2 class=" text-center flex-grow-1 fw-bold">{{ $item->nama_kategori }}</h2>
                <a href="detail/kategori/{{ $item->id }}">
                    <button class=" btn px-4 py-2" style="background-color: #f9cfc8; border-radius: 20px;">Learn More</button>
                </a>
            </div>
            <div class=" container overflow-x-auto"  style="scrollbar-width: none">

                <div class=" row flex-nowrap">
                    @foreach ($item->bukus->slice(0,8) as $buku)
                        <div class=" col-2 d-flex align-items-stretch">
                            <a href="detail/buku/{{ $buku->id }}" class=" text-decoration-none">
                                <div class=" card my-5 shadow border-0" style="border-radius: 20px; width: 170px; height: 380px">
                                    <img src="{{ asset('storage/foto/' .$buku->foto_buku) }}" alt="" style="width: 120px; height:170px; border-radius: 30px" class=" m-4 shadow">
                                    <div class=" card-body">
                                        <h6 class=" card-title">{{ $buku->nama_buku }}</h6>
                                        <p class=" card-text" style="font-size: 14px">{{ $buku->kategori->nama_kategori }}</p>
                                        <p class=" fw-bold">Rp. {{ number_format($buku->harga, 2, ',', '.') }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer class=" footer" id="aboutus">
        <div style="background-color: #1a7482; width: 100%; height: 40px">
            .
        </div>
        <div class=" container py-5">
            <div class=" row">
                <div class=" col-5">
                    <span class=" fw-bold" style="font-size: 22px">MaxiSmart</span>
                    <ul class=" ps-0" style="list-style-type: none;">
                        <li>Layanan kami membuka dunia literasi dan pengetahuan tanpa batas untuk Anda. Kami menghadirkan beragam pilihan buku, menyediakan tempat untuk anda mencari dan membeli buku secara online. mulai dari karya-karya internasional yang mendunia hingga buku-buku lokal yang memikat hati. Semua dihadirkan untuk memenuhi selera dan kebutuhan membaca Anda, menjadikan Anda pusat dari setiap halaman yang Anda baca.</li>
                    </ul>
                </div>
                <div class=" col-3">
                    <span class=" fw-bold" style="font-size: 22px">Follow Us</span>
                    <ul class=" ps-0" style="list-style-type: none;">
                        <li>Books & promotion updates:</li>
                        <li>Ig : @maxismart.ofc</li>
                        <li>Twitter : @maxismart.ofcstore</li>
                    </ul>
                </div>
                <div class=" col-3" id="contact">
                    <span class=" fw-bold" style="font-size: 22px">Customer Service</span>
                    <ul class=" ps-0" style="list-style-type: none;">
                        <li>Hubungi Kami</li>
                        <li>Email : maxismartofficial@gmail.com</li>
                        <li>No Whatsapp : +62 09876543654</li>
                        <br>
                        <li>Weekday : 08:00 - 20:00 WIB</li>
                        <li>Weekend : 09:00 - 18:00 WIB</li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>


    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>