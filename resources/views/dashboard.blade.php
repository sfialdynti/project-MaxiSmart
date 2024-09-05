<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin MaxiSmart </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
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
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <i class="menu-icon mdi mdi-account-circle-outline"></i>
                  <p class="mb-1 mt-3 fw-semibold">{{ $user->name }}</p>
                  <p class="fw-light text-muted mb-0">{{ $user->email }}</p>
                </div>
                <a class="dropdown-item" href="/logout"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Log Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="dashboard">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">Data MaxiSmart</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#usr" aria-expanded="false" aria-controls="usr">
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
              <a class="nav-link" data-bs-toggle="collapse" href="#ktgr" aria-expanded="false" aria-controls="ktgr">
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
              <a class="nav-link" data-bs-toggle="collapse" href="#buku" aria-expanded="false" aria-controls="buku">
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
              <div class="col-sm-12">
                <div class="home-tab">
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                              <p class="statistics-title">Jumlah User</p>
                              <h3 class="rate-percentage text-center">{{ $total_user }}</h3>
                            </div>
                            <div>
                              <p class="statistics-title">Jumlah Kategori</p>
                              <h3 class="rate-percentage text-center">{{ $total_kategori }}</h3>
                            </div>
                            <div>
                              <p class="statistics-title">Jumlah Buku</p>
                              <h3 class="rate-percentage text-center">{{ $total_buku }}</h3>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">Jumlah Penjualan</p>
                              <h3 class="rate-percentage text-center">{{ $total_pembayaran }}</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                          <div class="row">
                            <div class=" grid-margin stretch-card">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Data Penjualan Produk</h4>
                                  <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Total Pembelian</th>
                                          <th>Tanggal Transaksi</th>
                                          <th>Tanggal Sampai</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($pembayaran as $key => $item)
                                        <tr>
                                          <td>{{ $key+1 }}</td>
                                          <td>{{ $item->total }}</td>
                                          <td>{{ $item->tanggal_transaksi }}</td>
                                          <td>{{ $item->tanggal_sampai }}</td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div> 
                    </div>
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>