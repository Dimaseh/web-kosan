<?php
session_start();
$username = $_SESSION['Nama'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Owner | Cek Transaksi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble img-circle" src="img/Boarding.png" alt="AdminLTELogo" height="100" width="100">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/Booking/index.php" class="nav-link active">Cek Transaksi</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="img/Boarding.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?php echo $username; ?></span>
            </a>

            <!-- Sidebar -->
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="dasboardOwner.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>

                                <p>
                                    Dasboard
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="profilOwner.php" class="nav-link active">
                                <i class="nav-icon fas fa-user"></i>

                                <p>
                                    Profil
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="register.php" class="nav-link active">
                                <i class="nav-icon fas fa-file"></i>

                                <p>
                                    Tambah KOS
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="kosSaya.php" class="nav-link active">
                                <i class="nav-icon fas fa-house-user"></i>

                                <p>
                                    KOS SAYA
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link active">
                                <i class="nav-icon fas fa fa-times"></i>
                                <p>
                                    Exit
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- /.row -->

                    <div class="row justify-content-center">
                        <div class="col-md-8 bg-warning rounded">
                            <!-- /.card-header -->
                            <div class="mt-3 row">
                                <div class="col-sm-3 col-6">
                                    <a data-toggle="modal" data-target="#profilePictureModal">
                                        <img class="profile-user-img img-fluid" src="img/profil.jpg" alt="User profile picture" style="width: 100%; height: auto; border-radius: 5px;  border: 2px solid white;">
                                    </a>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 col-6">
                                    <div class="row">
                                        <div class="col">Nama Lengkap:</div>
                                        <div class="col-sm-6">ajo</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Email:</div>
                                        <div class="col-sm-6">ajo@gmail.com</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Pekerjaan:</div>
                                        <div class="col-sm-6">Mahasiswa</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Jenis Kelamin:</div>
                                        <div class="col-sm-6">Laki-laki</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Nomor HP:</div>
                                        <div class="col-sm-6">0816153123</div>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <hr style="background-color: white;">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div style="border: 2px solid white; padding: 10px; border-radius: 5px;">
                                            <img src="gambar_bukti.jpg" alt="Gambar Bukti Transaksi" style="width: 100%;">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Kolom Tanggal Masuk -->
                                        <p>Tanggal Masuk: 01 Januari 2023</p>
                                        <!-- Total Tagihan -->
                                        <p>Total Tagihan: Rp. 1.000.000</p>
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Kolom Tanggal Keluar -->
                                        <p>Tanggal Keluar: 10 Januari 2023</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="termsCheckbox">
                                <label class="form-check-label" for="termsCheckbox">
                                    Apakah Anda yakin transaksi benar dan telah mengecek transaksi Anda?
                                </label>
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-light" onclick="validateTransaction()">Validasi</button>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <h6 class="text-center bg-dark text-white p-3 m-0">
            Designed and Developed by ZUM KOS
        </h6>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>

</body>

</html>