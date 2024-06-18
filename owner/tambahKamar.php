<?php
session_start();
$username = $_SESSION['Nama'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Owner | Tambah Kamar</title>

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
                    <a href="/Booking/index.php" class="nav-link active">Tambah Kamar</a>
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
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr style="border-color: white;">
                                            <div class="form-group text-center">
                                                <h5>Info Kamar</h5>
                                                <hr style="border-color: white;">
                                            </div>
                                            <?php
                                            include '../backend/koneksi.php';

                                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                $jumlahkamar = $_POST['jumlah-kamar'];
                                                $panjangkamar = $_POST['panjang-kamar'];
                                                $lebarkamar = $_POST['lebar-kamar'];
                                                $tipekamar = $_POST['tipe-kamar'];
                                                $biayafasilitas = $_POST['biaya-fasilitas'];

                                                // Query untuk mendapatkan id_kost terakhir dari tabel kost
                                                $query_last_id_kost = "SELECT id_kost FROM kost ORDER BY id_kost DESC LIMIT 1";
                                                $result_last_id_kost = $conn->query($query_last_id_kost);

                                                if ($result_last_id_kost->num_rows > 0) {
                                                    $row_last_id_kost = $result_last_id_kost->fetch_assoc();
                                                    $id_kost = $row_last_id_kost['id_kost'];

                                                    // Query INSERT
                                                    $query = "INSERT INTO kamar (id_kost, jumlah_kamar, panjang_kamar, lebar_kamar, tipe_kamar, biaya_fasilitas)
                  VALUES ('$id_kost', '$jumlahkamar', '$panjangkamar', '$lebarkamar', '$tipekamar', '$biayafasilitas')";

                                                    // Eksekusi query
                                                    if ($conn->query($query) === TRUE) {
                                                        // Data berhasil disimpan
                                                        echo "Data berhasil disimpan.";
                                                    } else {
                                                        // Terjadi kesalahan saat menyimpan data
                                                        echo "Error: " . $query . "<br>" . $conn->error;
                                                    }
                                                } else {
                                                    // Tidak ada data di tabel kost
                                                    echo "Tidak ada data di tabel kost.";
                                                }
                                            }
                                            ?>
                                            <?php
                                            $query_nama_kost = "SELECT id_kost, nama_kost FROM kost";
                                            $result_nama_kost = $conn->query($query_nama_kost);
                                            ?>

                                            <form method="POST" action="">
                                                <div class="form-group">
                                                    <label for="idKost">Pilih Nama Kost</label>
                                                    <select class="form-control" id="idKost" name="id_kost" required>
                                                        <option value="" selected disabled>Pilih Nama Kost</option>
                                                        <?php
                                                        if ($result_nama_kost->num_rows > 0) {
                                                            while ($row_nama_kost = $result_nama_kost->fetch_assoc()) {
                                                                $id_kost = $row_nama_kost['id_kost'];
                                                                $nama_kost = $row_nama_kost['nama_kost'];
                                                                echo "<option value='$id_kost'>$nama_kost</option>";
                                                            }
                                                        } else {
                                                            echo "<option disabled>Tidak ada data nama_kost</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah-kamar">Jumlah Kamar</label>
                                                    <input type="number" class="form-control" id="jumlah-kamar" name="jumlah-kamar" placeholder="Masukkan jumlah kamar">
                                                </div>

                                                <div class="form-group">
                                                    <label for="panjang-kamar">Panjang Kamar</label>
                                                    <input type="number" class="form-control" id="panjang-kamar" name="panjang-kamar" placeholder="Masukkan panjang kamar">
                                                </div>

                                                <div class="form-group">
                                                    <label for="lebar-kamar">Lebar Kamar</label>
                                                    <input type="number" class="form-control" id="lebar-kamar" name="lebar-kamar" placeholder="Masukkan lebar kamar">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tipe-kamar">Tipe Kamar</label>
                                                    <select class="form-control" id="tipe-kamar" name="tipe-kamar">
                                                        <option value="kamar-mandi-luar">Kamar Mandi Luar</option>
                                                        <option value="kamar-mandi-dalam">Kamar Mandi Dalam</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="biaya-fasilitas">Biaya Fasilitas Kamar</label>
                                                    <input type="text" class="form-control" id="biaya-fasilitas" name="biaya-fasilitas" placeholder="Masukkan biaya fasilitas kamar">
                                                </div>

                                                <hr style="border-color: white;">

                                                <div class="card-footer">
                                                    <div class="row">
                                                        <button type="submit" class="btn btn-primary">Tambah Kamar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
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


    <script>
        function validateNumber(event) {
            var input = event.target.value;
            var onlyNumbers = /^\d+$/;

            if (!input.match(onlyNumbers)) {
                event.target.value = input.replace(/[^0-9]/g, '');
            }
        }
    </script>


</body>

</html>