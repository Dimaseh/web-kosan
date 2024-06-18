<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}
$username = $_SESSION['Nama'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Owner | Dashboard</title>

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
                    <a href="/Booking/index.php" class="nav-link active">Dasboard</a>
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

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8 mb-3">
                                <h5 class="mb-2">Butuh tempat KOS?</h5>
                                <h6 class="mb-4">Dapatkan pilihan terbaik dan sewa sekarang juga!</h6>
                                <div class="input-group input-group-lg">
                                    <input type="search" class="form-control shadow-none rounded" placeholder="Masukkan lokasi/alamat kos.." />
                                    <button type="submit" class="btn btn-primary text-white rounded">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-3 mb-3">
                                        <select class="form-select form-control shadow-none" id="provinsi" onchange="setKotaOptions()">
                                            <option selected disabled>Pilih Provinsi</option>
                                            <option value="Aceh">Aceh</option>
                                            <option value="Bali">Bali</option>
                                            <option value="Bangka Belitung">Bangka Belitung</option>
                                            <option value="Banten">Banten</option>
                                            <option value="Bengkulu">Bengkulu</option>
                                            <option value="DI Yogyakarta">DI Yogyakarta</option>
                                            <option value="DKI Jakarta">DKI Jakarta</option>
                                            <option value="Gorontalo">Gorontalo</option>
                                            <option value="Jambi">Jambi</option>
                                            <option value="Jawa Barat">Jawa Barat</option>
                                            <option value="Jawa Tengah">Jawa Tengah</option>
                                            <option value="Jawa Timur">Jawa Timur</option>
                                            <option value="Kalimantan Barat">Kalimantan Barat</option>
                                            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                            <option value="Kalimantan Timur">Kalimantan Timur</option>
                                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                                            <option value="Lampung">Lampung</option>
                                            <option value="Maluku">Maluku</option>
                                            <option value="Maluku Utara">Maluku Utara</option>
                                            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                            <option value="Papua">Papua</option>
                                            <option value="Papua Barat">Papua Barat</option>
                                            <option value="Riau">Riau</option>
                                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                                            <option value="Sumatera Barat">Sumatera Barat</option>
                                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                                            <option value="Sumatera Utara">Sumatera Utara</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <select class="form-select form-control shadow-none" id="kota" disabled>
                                            <option selected disabled>Pilih Kota</option>
                                        </select>
                                    </div>
                                    <script>
                                        function setKotaOptions() {
                                            var provinsiSelect = document.getElementById("provinsi");
                                            var kotaSelect = document.getElementById("kota");
                                            var provinsi = provinsiSelect.value;

                                            // Reset opsi kota
                                            kotaSelect.innerHTML = '<option selected disabled>Pilih Kota</option>';

                                            // Set opsi kota sesuai dengan provinsi yang dipilih
                                            switch (provinsi) {
                                                case "Aceh":
                                                    kotaSelect.innerHTML += '<option value="Banda Aceh">Banda Aceh</option>' +
                                                        '<option value="Langsa">Langsa</option>';
                                                    break;
                                                case "Bali":
                                                    kotaSelect.innerHTML += '<option value="Denpasar">Denpasar</option>' +
                                                        '<option value="Singaraja">Singaraja</option>';
                                                    break;
                                                case "Bangka Belitung":
                                                    kotaSelect.innerHTML += '<option value="Pangkal Pinang">Pangkal Pinang</option>' +
                                                        '<option value="Tanjung Pandan">Tanjung Pandan</option>';
                                                    break;
                                                    // Tambahkan case untuk setiap provinsi lainnya

                                                case "Sumatera Barat":
                                                    kotaSelect.innerHTML += '<option value="Padang">Padang</option>' +
                                                        '<option value="Batusangkar">Batusangkar</option>';
                                                    break;
                                            }
                                            // Mengaktifkan opsi kota
                                            kotaSelect.disabled = false;
                                        }
                                    </script>
                                    <div class="col-lg-3 mb-3">
                                        <select class="form-select form-control shadow-none">
                                            <option selected disabled>Pilih Jenis Kos</option>
                                            <option value="kos1">Laki-laki</option>
                                            <option value="kos2">Perempuan</option>
                                            <option value="kos3">Campuran</option>
                                            <!-- Tambahkan opsi jenis kos lain sesuai kebutuhan -->
                                        </select>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <select class="form-select form-control shadow-none">
                                            <option selected disabled>Urutkan berdasarkan</option>
                                            <option value="terbaru">Terbaru</option>
                                            <option value="terlama">Terlama</option>
                                            <option value="harga-terendah">Harga Terendah</option>
                                            <option value="harga-tertinggi">Harga Tertinggi</option>
                                            <!-- Tambahkan opsi pengurutan lain sesuai kebutuhan -->
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    include '../backend/koneksi.php';
                    $login_id = $_SESSION['Nama'];

                    $query = "SELECT * FROM kost WHERE nama_pemilik = '$login_id'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        echo '<div class="row">';
                        while ($row = $result->fetch_assoc()) {
                            $namaKost = $row['nama_kost'];
                            $hargaSewa = $row['harga_sewa'];
                            $alamat = $row['alamat'];
                            $jenisKost = $row['jenis_kost'];
                            $gambar = $row['foto_bangunan_utama'];
                            $gambarUrl = './' . $gambar;
                    ?>

                            <div class="col-lg-3 mb-3">
                                <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
                                    <img src="<?php echo $gambarUrl; ?>" class="card-img-top" />
                                    <div class="card-body">
                                        <h5><?php echo $namaKost; ?></h5>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h6 class="mb-0"><?php echo 'Rp ' . number_format($hargaSewa, 0, ',', '.') . '/bulan'; ?></h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap ml-auto"><?php echo $jenisKost; ?></span>
                                        </div>
                                        <i class="fas fa-map-signs"></i>
                                        <span class="badge rounded-pill text-wrap mb-4">
                                            <?php echo $alamat; ?>
                                        </span>
                                        <div class="rating mb-4">
                                            <h6 class="mb-1">Rating</h6>
                                            <span class="badge rounded-pill">
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star-half text-warning"></i>
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <a href="detail.php?id_kost=<?php echo $row['id_kost']; ?>" class="btn btn-sm btn-dark shadow-none">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                        echo '</div>';
                    } else {
                        echo "Tidak ada data kost.";
                    }
                    ?>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->

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
        // Mendapatkan elemen dengan id "currentDate"
        const currentDateElement = document.getElementById('currentDate');

        // Mendapatkan tanggal terkini
        const currentDate = new Date();

        // Mengatur format tanggal
        const formattedDate = currentDate.toLocaleDateString('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });


        // Mengganti isi elemen dengan tanggal terkini
        currentDateElement.textContent = formattedDate;
    </script>
</body>

</html>