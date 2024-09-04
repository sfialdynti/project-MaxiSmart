<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar User - MaxiSmart </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">

      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo">
              <span>Admin MS</span>
            </a>
          </div>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">Data MaxiSmart</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#usr" aria-expanded="false" aria-controls="usr">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="usr">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/daftarusr"> Lihat User </a></li>
                  <li class="nav-item"> <a class="nav-link" href="/user/create"> Tambah User </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#ktgr" aria-expanded="false" aria-controls="ktgr">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Kategori</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ktgr">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/daftarktgr"> Lihat Kategori </a></li>
                  <li class="nav-item"> <a class="nav-link" href="/kategori/create"> Tambah Kategori </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#buku" aria-expanded="false" aria-controls="buku">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Buku</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="buku">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/daftarbuku"> Lihat Buku </a></li>
                  <li class="nav-item"> <a class="nav-link" href="/buku/create"> Tambah Buku </a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class=" grid-margin stretch-card">
                <div class="card">
                  @if (Session::get('pesan'))
                    <div class="alert alert-info">
                    {{ Session::get('pesan') }}
                    </div>
                  @endif
                  <br>
                  <div class="card-body">
                    <h4 class="card-title">Buku</h4>
                    {{-- <p>Total Data : {{ $total_kategori }}</p> --}}
                    <div class="row mb-4">
                      <div class=" col-md-6">
                        <h5 class=""><a href="/buku/create" class=" text-decoration-none">Tambah Buku</a></h5>
                      </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Nama Buku</th>
                            <th>Deskripsi Buku</th>
                            <th>Harga</th>
                            <th>Jumlah Buku</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($buku as $key => $item)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ $item->nama_buku }}</td>
                            <td>{{ $item->deskripsi_buku }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->jumlah_buku }}</td>
                            <td><img src="{{ asset('storage/foto/'.$item->foto_buku) }}" alt="" style="width: 50px; height: 50px;"></td>
                            <td>
                              <label class="badge badge-warning">
                                <a href="buku/edit/{{ $item->id }}" class=" text-decoration-none text-white">Edit</a>
                              </label>
                              <label class="badge badge-danger">
                                <a href="buku/delete/{{ $item->id }}" class=" text-decoration-none text-white" onclick="return window.confirm('Yakin hapus data ini?')">Hapus</a>
                              </label>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class=" my-5">
                        {{ $buku->withQueryString()->links() }}
                    </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/todolist.js"></script>
  </body>
</html>