<?php
session_start();
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
                    <a href="/Booking/index.php" class="nav-link active">Ubah Kost</a>
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
                                        <div class="col-md-8">
                                            <hr style="border-color: white;">
                                            <div class="form-group text-center">
                                                <h5>INFO KOS</h5>
                                                <hr style="border-color: white;">
                                            </div>
                                            <?php
                                            include '../backend/koneksi.php';

                                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                $idKost = $_POST['id_kost'];
                                                $namaKost = $_POST['nama_kost'];
                                                $fasilitasKamar = isset($_POST['facilities']) ? implode(", ", $_POST['facilities']) : "";
                                                $alamat = $_POST['alamat'];
                                                $provinsi = $_POST['provinsi'];
                                                $kota = $_POST['kota'];
                                                $kecamatan = $_POST['kecamatan'];
                                                $kelurahan = $_POST['kelurahan'];
                                                $deskripsi = $_POST['deskripsi'];
                                                $kontak = $_POST['kontak'];
                                                $jenisKost = $_POST['jenis_kost'];
                                                $tipeKost = $_POST['tipe_kost'];
                                                $hargaSewa = $_POST['harga_sewa'];
                                                $namaPemilik = $_POST['nama_pemilik'];
                                                $namaBank = $_POST['nama_bank'];
                                                $nomorRekening = $_POST['no_rekening'];
                                                $fotoBangunan = $_FILES['foto-bangunan']['name'];
                                                $fotoKamar = $_FILES['foto-kamar']['name'];
                                                $fotoInterior = $_FILES['foto-interior']['name'];
                                                $fotoKamarMandi = $_FILES['foto-kamar-mandi']['name'];

                                                // Upload file foto ke folder tertentu (sesuaikan dengan konfigurasi server dan kebutuhan Anda)
                                                // Misalnya, jika folder penyimpanan foto adalah 'uploads/'
                                                $fotoBangunanPath = 'img/uploads/' . $fotoBangunan;
                                                $fotoKamarPath = 'img/uploads/' . $fotoKamar;
                                                $fotoInteriorPath = 'img/uploads/' . $fotoInterior;
                                                $fotoKamarMandiPath = 'img/uploads/' . $fotoKamarMandi;

                                                // Memindahkan file foto dari temporary location ke folder penyimpanan
                                                move_uploaded_file($_FILES['foto-bangunan']['tmp_name'], $fotoBangunanPath);
                                                move_uploaded_file($_FILES['foto-kamar']['tmp_name'], $fotoKamarPath);
                                                move_uploaded_file($_FILES['foto-interior']['tmp_name'], $fotoInteriorPath);
                                                move_uploaded_file($_FILES['foto-kamar-mandi']['tmp_name'], $fotoKamarMandiPath);

                                                // Query untuk memperbarui data kos berdasarkan ID kos
                                                $query = "UPDATE kost SET 
                            nama_kost = '$namaKost',
                            tipe_kost = '$tipeKost',
                            jenis_kost = '$jenisKost',
                            alamat = '$alamat',
                            provinsi = '$provinsi',
                            kota = '$kota',
                            kecamatan = '$kecamatan',
                            kelurahan = '$kelurahan',
                            deskripsi = '$deskripsi',
                            kontak = '$kontak',
                            harga_sewa = '$hargaSewa',
                            nama_pemilik = '$namaPemilik',
                            nama_bank = '$namaBank',
                            no_rekening = '$nomorRekening',
                            foto_bangunan_utama = '$fotoBangunanPath',
                            foto_kamar = '$fotoKamarPath',
                            foto_kamar_mandi = '$fotoKamarMandiPath',
                            foto_interior = '$fotoInteriorPath',
                            fasilitas_kost = '$fasilitasKamar'
                        WHERE id_kost = '$idKost'";

                                                // Eksekusi query
                                                if (mysqli_query($conn, $query)) {
                                                    echo "Data berhasil diperbarui.";
                                                    echo "<script> window.location.href = 'editKamar.php?id_kost=" . $idKost . "'; </script>";
                                                } else {
                                                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                                }
                                            } else {
                                                // Jika method request bukan POST, ambil data kos yang akan diedit berdasarkan ID kos
                                                $idKost = $_GET['id'];
                                                $query = "SELECT * FROM kost WHERE id_kost = '$idKost'";
                                                $result = $conn->query($query);

                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    $namaKost = $row['nama_kost'];
                                                    $alamat = $row['alamat'];
                                                    $provinsi = $row['provinsi'];
                                                    $kota = $row['kota'];
                                                    $kecamatan = $row['kecamatan'];
                                                    $kelurahan = $row['kelurahan'];
                                                    $deskripsi = $row['deskripsi'];
                                                    $kontak = $row['kontak'];
                                                    $jenisKost = $row['jenis_kost'];
                                                    $tipeKost = $row['tipe_kost'];
                                                    $hargaSewa = $row['harga_sewa'];
                                                    $namaPemilik = $row['nama_pemilik'];
                                                    $namaBank = $row['nama_bank'];
                                                    $nomorRekening = $row['no_rekening'];
                                                    $fasilitasKamar = $row['fasilitas_kost'];
                                                } else {
                                                    echo "Data kos tidak ditemukan.";
                                                    exit;
                                                }
                                            }
                                            ?>
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <input type="hidden" name="id_kost" value="<?php echo $idKost; ?>">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Nama Kos</label>
                                                    <input name="nama_kost" type="text" class="form-control" id="exampleInputName" placeholder="Enter your name" value="<?php echo $namaKost; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputAddress">Boarding Address</label>
                                                    <textarea class="form-control" id="exampleInputAddress" rows="3" placeholder="Enter your address" name="alamat"><?php echo $alamat; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName">Provinsi</label>
                                                    <input type="text" class="form-control" id="exampleInputName" placeholder="Enter your name house" name="provinsi" value="<?php echo $provinsi; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName">Kabupaten/Kota</label>
                                                    <input type="text" class="form-control" id="exampleInputName" placeholder="Enter your name house" name="kota" value="<?php echo $kota; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName">Kecamatan</label>
                                                    <input type="text" class="form-control" id="exampleInputName" placeholder="Enter your name house" name="kecamatan" value="<?php echo $kecamatan; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName">Kelurahan</label>
                                                    <input type="text" class="form-control" id="exampleInputName" placeholder="Enter your name house" name="kelurahan" value="<?php echo $kelurahan; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputAddress">Deskripsi Kos (optional)</label>
                                                    <textarea class="form-control" id="exampleInputAddress" rows="3" placeholder="Enter your address" name="deskripsi"><?php echo $deskripsi; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPhone">Nomor Telepon</label>
                                                    <input type="text" class="form-control" id="exampleInputPhone" placeholder="Enter your phone number" oninput="validateNumber(event)" required name="kontak" value="<?php echo $kontak; ?>">
                                                    <hr style="border-color: white;">
                                                </div>
                                                <div class="form-group text-center">
                                                    <h5>Detail Kos</h5>
                                                    <hr style="border-color: white;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputRoomType">Room Tipe Gender</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="exampleInputRoomType" name="jenis_kost">
                                                            <option hidden value=""></option>
                                                            <option value="laki-laki" <?php if ($jenisKost == 'laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                                            <option value="perempuan" <?php if ($jenisKost == 'perempuan') echo 'selected'; ?>>Perempuan</option>
                                                            <option value="campuran" <?php if ($jenisKost == 'campuran') echo 'selected'; ?>>Campuran</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputRoomType">Tipe Kos</label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="exampleInputRoomType" name="tipe_kost">
                                                            <option hidden value=""></option>
                                                            <option value="perbulan" <?php if ($tipeKost == 'perbulan') echo 'selected'; ?>>Per Bulan</option>
                                                            <option value="pertahun" <?php if ($tipeKost == 'pertahun') echo 'selected'; ?>>Per Tahun</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPrice">Harga</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text form-control">Rp.</span>
                                                        </div>
                                                        <input type="number" class="form-control" id="exampleInputPrice" placeholder="Masukkan harga" min="100000" max="10000000" step="50000" value="<?php echo $hargaSewa; ?>" name="harga_sewa">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text form-control">/ Bulan</span>
                                                        </div>
                                                    </div>
                                                    <hr style="border-color: white;">
                                                </div>
                                        </div>
                                        <!-- /.col -->
                                        <h5>Fasilitas KOS</h5>
                                        <hr style="border-color: white;">
                                    </div>
                                    <div class="form-group">
                                        <legend>Fasilitas Kamar</legend>
                                        <div class="row">
                                            <div class="col">
                                                <fieldset>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="facilities[]" value="Listrik" id="exampleCheckListrik" <?php if (strpos($fasilitasKamar, 'AC') !== false) echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheckAC">Listrik</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="facilities[]" value="Kasur" id="exampleCheckKasur" <?php if (strpos($fasilitasKamar, 'Kasur') !== false) echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheckKasur">Kasur</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="facilities[]" value="WiFi" id="exampleCheckWiFi" <?php if (strpos($fasilitasKamar, 'WiFi') !== false) echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheckWiFi">WiFi</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="facilities[]" value="Kamar Mandi" id="exampleCheckKamarMandi" <?php if (strpos($fasilitasKamar, 'Kamar Mandi') !== false) echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheckKamarMandi">Kamar Mandi</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col">
                                                <fieldset>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="facilities[]" value="Tempat Parkir" id="exampleCheckTempatParkir" <?php if (strpos($fasilitasKamar, 'Tempat Parkir') !== false) echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheckTempatParkir">Tempat Parkir</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="facilities[]" value="Mushola" id="exampleCheckMushola" <?php if (strpos($fasilitasKamar, 'Mushola') !== false) echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheckMushola">Mushola</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="facilities[]" value="Laundry" id="exampleCheckLaundry" <?php if (strpos($fasilitasKamar, 'Laundry') !== false) echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheckLaundry">Laundry</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="facilities[]" value="Dapur" id="exampleCheckDapur" <?php if (strpos($fasilitasKamar, 'Dapur') !== false) echo 'checked'; ?>>
                                                        <label class="form-check-label" for="exampleCheckDapur">Dapur</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <hr style="border-color: white;">
                                    </div>
                                    <div class="form-group text-center">
                                        <h5>Info Pembayaran</h5>
                                        <hr style="border-color: white;">
                                    </div>
                                    <div class="form-group">
                                        <label for="owner-name">Nama Pemilik Kos</label>
                                        <input type="text" class="form-control" id="owner-name" name="nama_pemilik" placeholder="Masukkan nama pemilik kos" value="<?php echo $namaPemilik; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="bank-name">Nama Bank</label>
                                        <input type="text" class="form-control" id="bank-name" name="nama_bank" placeholder="Masukkan nama bank" value="<?php echo $namaBank; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="account-number">Nomor Rekening</label>
                                        <input type="text" class="form-control" id="account-number" name="no_rekening" placeholder="Masukkan nomor rekening" value="<?php echo $nomorRekening; ?>">
                                        <hr style="border-color: white;">
                                    </div>
                                    <div class="form-group text-center">
                                        <h5>Foto Bangunan</h5>
                                        <hr style="border-color: white;">
                                    </div>

                                    <div class="form-group">
                                        <label for="foto-bangunan">Foto Bangunan</label>
                                        <input type="file" class="form-control-file" id="foto-bangunan" name="foto-bangunan" value="" onchange="previewImage(event, 'preview-foto-bangunan')">
                                        <br>
                                        <img id="preview-foto-bangunan" src="<?php echo $fotoBangunan; ?>" alt="Preview Foto Bangunan" style="max-width: 200px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="foto-kamar">Foto Kamar</label>
                                        <input type="file" class="form-control-file" id="foto-kamar" name="foto-kamar" onchange="previewImage(event, 'preview-foto-kamar')">
                                        <br>
                                        <img id="preview-foto-kamar" src="<?php echo $fotoKamar; ?>" alt="Preview Foto Kamar" style="max-width: 200px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="foto-interior">Foto Interior Kamar</label>
                                        <input type="file" class="form-control-file" id="foto-interior" name="foto-interior" onchange="previewImage(event, 'preview-foto-interior')">
                                        <br>
                                        <img id="preview-foto-interior" src="<?php echo $fotoInterior; ?>" alt="Preview Foto Interior Kamar" style="max-width: 200px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="foto-kamar-mandi">Foto Kamar Mandi</label>
                                        <input type="file" class="form-control-file" id="foto-kamar-mandi" name="foto-kamar-mandi" onchange="previewImage(event, 'preview-foto-kamar-mandi')">
                                        <br>
                                        <img id="preview-foto-kamar-mandi" src="<?php echo $fotoKamarMandi; ?>" alt="Preview Foto Kamar Mandi" style="max-width: 200px;">
                                    </div>
                                    <hr style="border-color: white;">
                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <button class="btn btn-primary" onclick="submitAndRedirect()">Ubah</button>
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

    <script>
        function submitAndRedirect() {
            // Ambil ID dari URL
            var urlParams = new URLSearchParams(window.location.search);
            var id = urlParams.get('id_kost');

            // Redirect ke halaman editKamar.php dengan mengirimkan ID sebagai parameter
            window.location.href = 'editKamar.php?id_kost=' + idKost;
        }

        function previewImage(event, previewId) {
            var reader = new FileReader();
            var imageElement = document.getElementById(previewId);
            reader.onload = function() {
                if (reader.readyState == 2) {
                    imageElement.src = reader.result;
                }
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>


    <!-- <script>
        function checkRoomType() {
            var selectElement = document.getElementById("exampleInputRoomType");
            var customRoomSize = document.getElementById("customRoomSize");

            if (selectElement.value === "custom") {
                customRoomSize.style.display = "block";
            } else {
                customRoomSize.style.display = "none";
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showPaymentPopup() {
            const qrCodeUrl = 'img/QR.jpg'; // Ganti dengan URL QR kode Anda
            const qrCodeHtml = '<img src="' + qrCodeUrl + '" alt="QR Code" style="max-width: 300px; height: auto;">';


            Swal.fire({
                icon: 'info',
                title: 'Biaya register',
                html: 'Biaya register sebesar Rp.25.000 akan ditagihkan.<br><br>' + qrCodeHtml,
                confirmButtonText: 'OK',
                showCancelButton: true,
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    showSuccessPopup();
                }
            });
        }

        function showSuccessPopup() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil register',
                text: 'Terima kasih! Anda telah berhasil melakukan registrasi.',
            });
        }
    </script>
    <script>
        function validateNumber(event) {
            const input = event.target;
            const inputValue = input.value;

            // Menghilangkan karakter non-digit dari input
            const onlyNumbers = inputValue.replace(/\D/g, '');
            input.value = onlyNumbers;

            // Menampilkan pesan kesalahan jika karakter non-digit dimasukkan
            const accountNumberError = document.getElementById('accountNumberError');
            if (onlyNumbers !== inputValue) {
                accountNumberError.textContent = 'Mohon masukkan hanya angka';
            } else {
                accountNumberError.textContent = '';
            }
        }
    </script>

    <script type="text/javascript">
        // Array untuk menyimpan nomor kamar
        var roomNumbers = [];

        // Fungsi untuk menyimpan nomor kamar
        function saveRoomNumber() {
            var roomNumberInput = document.getElementById('roomNumber');
            var roomNumber = roomNumberInput.value;

            if (roomNumber.trim() !== '') {
                roomNumbers.push(roomNumber);
                roomNumberInput.value = '';

                displaySavedRoomNumbers();
            }
        }

        // Fungsi untuk menampilkan nomor kamar yang tersimpan
        function displaySavedRoomNumbers() {
            var savedRoomNumbersList = document.getElementById('savedRoomNumbersList');
            savedRoomNumbersList.value = roomNumbers.join(', ');
        }

        function hapusInput() {
            roomNumbers = [];
            displaySavedRoomNumbers();
        }
    </script>



    <script>
        function updateMap() {
            var addressInput = document.getElementById('exampleInputAddress');
            var address = encodeURIComponent(addressInput.value);

            var mapIframe = document.getElementById('mapIframe');

            if (address !== '') {
                // Mengganti alamat di URL peta dengan alamat yang diinputkan
                var mapUrl = 'https://www.google.com/maps/place/' + address;
                mapIframe.src = mapUrl;
            }
        }
    </script> -->

</body>

</html>