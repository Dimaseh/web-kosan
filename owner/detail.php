<?php
session_start();
$username = $_SESSION['Nama'];
?>
<?php include '../backend/koneksi.php';
$login_id = $_SESSION['id'];
$idKost = $_GET['id_kost'];

// Query untuk mendapatkan data kost berdasarkan id_kost
$query = "SELECT k.*, km.jumlah_kamar, km.panjang_kamar, km.lebar_kamar, km.tipe_kamar, km.biaya_fasilitas
FROM kost k
JOIN kamar km ON k.id_kost = $idKost";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $PemilikKos = $row['nama_pemilik'];
    $fasilitasKost = $row['fasilitas_kost'];
    $tipeKamar = $row['tipe_kamar'];
    $jumlahKamar = $row['jumlah_kamar'];
    $fasilitasKost = $row['fasilitas_kost'];
    $deskripsi = $row['deskripsi'];
    $namaKost = $row['nama_kost'];
    $hargaSewa = $row['harga_sewa'];
    $alamat = $row['alamat'];
    $jenisKost = $row['jenis_kost'];
    $gambar = $row['foto_bangunan_utama'];
    $gambarUrl = './' . $gambar;
} else {
    // Jika tidak ada data kost dengan id_kost yang diberikan
    echo "Tidak ada data kost dengan ID tersebut.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Detail</title>

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
                    <a href="/Booking/index.php" class="nav-link active">Detail</a>
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
                        <div class="col-md-8">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <div class="col-md-12">
                                        <div class="d-flex  flex-column">
                                            <a data-toggle="modal" data-target="#profilePictureModal">
                                                <img class="profile-user-img img-fluid" src="<?php echo $gambarUrl; ?>" alt="User profile picture" style="width: 100%; height: auto; margin-bottom: 10px;">
                                            </a>
                                            <div class="d-flex justify-content-between">
                                                <span class="badge rounded-pill bg-white text-dark text-wrap" style="font-size: 1rem;"><?php if ($jenisKost == 'perempuan') {
                                                                                                                                            echo 'Perempuan';
                                                                                                                                        } elseif ($jenisKost == 'laki-laki') {
                                                                                                                                            echo 'Laki - Laki';
                                                                                                                                        } else {
                                                                                                                                            echo $jenisKost;
                                                                                                                                        }
                                                                                                                                        ?></span>
                                                <span class="badge rounded-pill d-flex justify-content-end">
                                                    <i class="fas fa-star text-warning" style="font-size: 1rem;"></i>
                                                    <i class="fas fa-star text-warning" style="font-size: 1rem;"></i>
                                                    <i class="fas fa-star text-warning" style="font-size: 1rem;"></i>
                                                    <i class="fas fa-star-half text-warning" style="font-size: 1rem;"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal for displaying the larger image -->
                                    <div class="modal fade" id="profilePictureModal" tabindex="-1" role="dialog" aria-labelledby="profilePictureModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="<?php echo $gambarUrl; ?>" alt="User profile picture" style="max-width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <i class="fas fa-map-signs"></i>
                                            <span class="badge rounded-pill text-wrap mb-4">
                                                <?php echo $alamat; ?>
                                            </span>
                                            <div class="features mb-4">
                                                <h6 class="mb-1">Deskripsi Kos</h6>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    <?php echo $deskripsi; ?>
                                                </span>
                                            </div>
                                            <div class="facilities mb-4">
                                                <h6 class="mb-1">Fasilitas Kamar</h6>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    <?php echo $fasilitasKost; ?>
                                                </span>
                                            </div>
                                            <div class="guests mb-4">
                                                <h6 class="mb-1">Alamat</h6>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                    <?php echo $alamat; ?>
                                                </span>
                                            </div>
                                            <div class="mb-4">
                                                <div class="card-header bg-primary text-white">
                                                    <h6 class="mb-1">Info Kamar</h6>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-striped projects">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10%">Tersedia</th>
                                                                <th style="width: 30%">Tipe Kamar</th>
                                                                <th style="width: 30%">Fasilitas Kamar</th>
                                                                <th style="width: 30%" class="text-center">Harga Sewa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $jumlahKamar; ?></td>
                                                                <td>
                                                                    <span><?php if ($tipeKamar == 'kamar-mandi-dalam') {
                                                                                echo 'Kamar Mandi Dalam';
                                                                            } elseif ($tipeKamar == 'kamar-mandi-luar') {
                                                                                echo 'Kamar Mandi Luar';
                                                                            } else {
                                                                                echo $tipeKamar;
                                                                            } ?></span>
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-success"><?php echo $fasilitasKost; ?></span>
                                                                </td>
                                                                <td class="project-state text-center">
                                                                    <span><?php echo 'Rp ' . number_format($hargaSewa, 0, ',', '.') . '/bulan'; ?></span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-primary h-100">
                                                <div class="card-header">
                                                    <h5><?php echo 'Rp ' . number_format($hargaSewa, 0, ',', '.') . '/bulan'; ?></h5>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Isi card di sini -->
                                                    <div class="row mb-2">
                                                        <div class="col">Pemilik Kos:</div>
                                                        <div class="col-sm-6"><?php echo $PemilikKos; ?></div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col">Sisa Kamar:</div>
                                                        <div class="col-sm-6"><?php echo $jumlahKamar ?> <span>Kamar</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

</body>

</html>