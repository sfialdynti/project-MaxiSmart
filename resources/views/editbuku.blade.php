<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Buku - MaxiSmart </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
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
              <div class="grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Data Buku</h4>
                    <form class="forms-sample" action="/buku/update/{{ $buku->id }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class=" js-example-basic-single w-100 @error('kategoris_id') is-invalid @enderror" id="kategori" name="kategoris_id">
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $buku->kategoris_id?'selected': '' }}>{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategoris_id')
                          <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="nama_buku">Nama Buku</label>
                        <input type="text" class="form-control @error('nama_buku') is-invalid @enderror" id="nama_buku" name="nama_buku" placeholder="Nama Buku" value="{{ old('nama_buku', $buku->nama_buku ?? '') }}">
                      </div>
                      <div class="form-group">
                        <label for="deskripsi_buku">Deskripsi Buku</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi_buku" name="deskripsi_buku" placeholder="Deskripsi Buku" value="{{ old('deskripsi_buku', $buku->deskripsi_buku ?? '') }}">
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Harga" value="{{ old('harga', $buku->harga ?? '') }}">
                      </div>
                      <div class="form-group">
                        <label for="jumlah_buku">Jumlah Buku</label>
                        <input type="number" class="form-control @error('jumlah_buku') is-invalid @enderror" id="jumlah_buku" placeholder="Jumlah Buku" name="jumlah_buku" value="{{ old('jumlah_buku', $buku->jumlah_buku ?? '') }}">
                        @error('jumlah_buku')
                          <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        @if($buku->foto_buku)
                        <div>
                            <img src="{{ asset('storage/foto/' .$buku->foto_buku) }}"width="100px" class=" mb-3 border" style="border-radius: 10px">
                        </div>
                        @endif
                        <input type="file" name="foto_buku" class="file-upload-default @error('foto_buku') is-invalid @enderror">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info @error('foto_buku') is-invalid @enderror" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                          @error('foto_buku')
                          <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>     
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>