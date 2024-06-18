<?php
session_start();
$username = $_SESSION['Nama'];
$namaPemilik = isset($_SESSION['Nama']) ? $_SESSION['Nama'] : "";

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

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
                    <a href="/Booking/index.php" class="nav-link active">FROM REGISTER KOS</a>
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
                                                $namaPemilik = $_POST['name_pemilik'];
                                                $namaBank = $_POST['nama_bank'];
                                                $nomorRekening = $_POST['no_rekening'];
                                                $fotoBangunan = $_FILES['foto_bangunan_utama']['name'];
                                                $fotoKamar = $_FILES['foto_kamar']['name'];
                                                $fotoInterior = $_FILES['foto_interior']['name'];
                                                $fotoKamarMandi = $_FILES['foto_kamar_mandi']['name'];

                                                $uploadDirectory = 'img/uploads/';

                                                $fotoBangunanPath = $uploadDirectory . $fotoBangunan;
                                                $fotoKamarPath = $uploadDirectory . $fotoKamar;
                                                $fotoInteriorPath = $uploadDirectory . $fotoInterior;
                                                $fotoKamarMandiPath = $uploadDirectory . $fotoKamarMandi;

                                                // Memindahkan file foto dari temporary location ke folder penyimpanan
                                                move_uploaded_file($_FILES['foto_bangunan_utama']['tmp_name'], $fotoBangunanPath);
                                                move_uploaded_file($_FILES['foto_kamar']['tmp_name'], $fotoKamarPath);
                                                move_uploaded_file($_FILES['foto_interior']['tmp_name'], $fotoInteriorPath);
                                                move_uploaded_file($_FILES['foto_kamar_mandi']['tmp_name'], $fotoKamarMandiPath);

                                                // Query untuk memasukkan data ke dalam tabel 'kost'
                                                $query = "INSERT INTO kost (nama_kost, tipe_kost, jenis_kost, nama_pemilik, nama_bank, no_rekening, foto_bangunan_utama, foto_kamar, foto_kamar_mandi, foto_interior, provinsi, kota, kecamatan, kelurahan, alamat, harga_sewa, kontak, deskripsi, id_pemilik, fasilitas_kost)
    VALUES ('$namaKost', '$tipeKost', '$jenisKost', '$namaPemilik', '$namaBank', '$nomorRekening', '$fotoBangunanPath', '$fotoKamarPath', '$fotoKamarMandiPath', '$fotoInteriorPath', '$provinsi', '$kota', '$kecamatan', '$kelurahan', '$alamat', '$hargaSewa', '$kontak', '$deskripsi', 0, '$fasilitasKamar')";

                                                // Eksekusi query
                                                if (mysqli_query($conn, $query)) {
                                                    echo "<script>alert('Data berhasil disimpan.'); window.location.href = 'tambahKamar.php?id=$id_kost';</script>";
                                                    // Lakukan tindakan lain yang diinginkan setelah data berhasil disimpan
                                                } else {
                                                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                                                }
                                            }
                                            ?>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Nama Kos</label>
                                                    <input name="nama_kost" type="text" class="form-control" id="exampleInputName" placeholder="Enter your name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputAddress">Boarding Address</label>
                                                    <textarea name="alamat" class="form-control" id="exampleInputAddress" rows="3" placeholder="Enter your address"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="provinsi">Provinsi</label>
                                                    <select name="provinsi" class="form-control" id="provinsi">
                                                        <option value="">--Pilih Provinsi--</option>
                                                        <option value="Aceh">Aceh</option>
                                                        <option value="Bali">Bali</option>
                                                        <option value="Bangka Belitung">Bangka Belitung</option>
                                                        <option value="Banten">Banten</option>
                                                        <option value="Bengkulu">Bengkulu</option>
                                                        <option value="Gorontalo">Gorontalo</option>
                                                        <option value="Jakarta">Jakarta</option>
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
                                                        <option value="Yogyakarta">Yogyakarta</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputName">Kabupaten/Kota</label>
                                                    <input name="kota" type="text" class="form-control" id="exampleInputName" placeholder="Enter your name house">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName">Kecamatan</label>
                                                    <input name="kecamatan" type="text" class="form-control" id="exampleInputName" placeholder="Enter your name house">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName">Kelurahan</label>
                                                    <input name="kelurahan" type="text" class="form-control" id="exampleInputName" placeholder="Enter your name house">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputAddress">Deskripsi Kos (optional)</label>
                                                    <textarea name="deskripsi" class="form-control" id="exampleInputAddress" rows="3" placeholder="Enter your address"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPhone">Nomor Telepon</label>
                                                    <input name="kontak" type="text" class="form-control" id="exampleInputPhone" placeholder="Enter your phone number" oninput="validateNumber(event)" required>
                                                    <hr style="border-color: white;">
                                                </div>
                                                <div class="form-group text-center">
                                                    <h5>Detail Kos</h5>
                                                    <hr style="border-color: white;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputRoomType">Room Tipe Gender</label>
                                                    <div class="input-group">
                                                        <select name="jenis_kost" class="form-control" id="exampleInputRoomType" onchange="checkRoomType()">
                                                            <option hidden value=""></option>
                                                            <option value="laki-laki">Laki-laki</option>
                                                            <option value="perempuan">Perempuan</option>
                                                            <option value="perempuan">Campuran</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputRoomType">Tipe Kos</label>
                                                    <div class="input-group">
                                                        <select name="tipe_kost" class="form-control" id="exampleInputRoomType" onchange="checkRoomType()">
                                                            <option hidden value=""></option>
                                                            <option value="perbulan">PerBulan</option>
                                                            <option value="pertahun">PerTahun</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPrice">Harga</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text form-control">Rp.</span>
                                                        </div>
                                                        <input name="harga_sewa" type="number" class="form-control" id="exampleInputPrice" placeholder="Masukkan harga" min="100000" max="10000000" step="50000" value="50000">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text form-control">/ Bulan</span>
                                                        </div>
                                                    </div>
                                                    <hr style="border-color: white;">
                                                </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <hr style="border-color: white;">
                                            <div class="form-group text-center">
                                                <h5>Fasilitas KOS</h5>
                                                <hr style="border-color: white;">
                                            </div>
                                            <div class="form-group">
                                                <legend>Fasilitas Kamar</legend>
                                                <div class="row">
                                                    <div class="col">
                                                        <fieldset>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="facilities[]" value="Listrik" id="exampleCheckListrik">
                                                                <label class="form-check-label" for="exampleCheckAC">Listrik</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="facilities[]" value="Kasur" id="exampleCheckKasur">
                                                                <label class="form-check-label" for="exampleCheckTV">Kasur</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="facilities[]" value="WiFi" id="exampleCheckWiFi">
                                                                <label class="form-check-label" for="exampleCheckWiFi">WiFi</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="facilities[]" value="Kamar Mandi" id="exampleCheckKamarMandi">
                                                                <label class="form-check-label" for="exampleCheckWiFi">kamar mandi</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col">
                                                        <fieldset>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="facilities[]" value="Tempat Parkir" id="exampleCheckTempatParkir">
                                                                <label class="form-check-label" for="exampleCheckAC">Tempat Parkir</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="facilities[]" value="Mushola" id="exampleCheckMushola">
                                                                <label class="form-check-label" for="exampleCheckTV">Mushola</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="facilities[]" value="Laundry" id="exampleCheckLaundry">
                                                                <label class="form-check-label" for="exampleCheckWiFi">Laundry</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="facilities[]" value="Dapur" id="exampleCheckDapur">
                                                                <label class="form-check-label" for="exampleCheckWiFi">Dapur</label>
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
                                                <input type="text" class="form-control" id="owner-name" name="name_pemilik" placeholder="Masukkan nama pemilik kos" value="<?php echo $namaPemilik; ?>" readonly>
                                            </div>
                                            <div class=" form-group">
                                                <label for="bank-name">Nama Bank</label>
                                                <input type="text" class="form-control" id="bank-name" name="nama_bank" placeholder="Masukkan nama bank">
                                            </div>

                                            <div class="form-group">
                                                <label for="account-number">Nomor Rekening</label>
                                                <input type="text" class="form-control" id="account-number" name="no_rekening" placeholder="Masukkan nomor rekening">
                                                <hr style="border-color: white;">
                                            </div>
                                            <div class="form-group text-center">
                                                <h5>Foto Bangunan</h5>
                                                <hr style="border-color: white;">
                                            </div>
                                            <div class="form-group">
                                                <label for="foto_bangunan_utama">Foto Bangunan</label>
                                                <input type="file" class="form-control-file" id="foto_bangunan_utama" name="foto_bangunan_utama">
                                            </div>

                                            <div class="form-group">
                                                <label for="foto_kamar">Foto Kamar</label>
                                                <input type="file" class="form-control-file" id="foto_kamar" name="foto_kamar">
                                            </div>

                                            <div class="form-group">
                                                <label for="foto_interior">Foto Interior Kamar</label>
                                                <input type="file" class="form-control-file" id="foto_interior" name="foto_interior">
                                            </div>

                                            <div class="form-group">
                                                <label for="foto_kamar_mandi">Foto Kamar Mandi</label>
                                                <input type="file" class="form-control-file" id="foto_kamar_mandi" name="foto_kamar_mandi">
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
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                                </form>
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
    <script>
        $(document).ready(function() {
            $('#provinsi').select({
                placeholder: '--Pilih Provinsi--',
                allowClear: true
            });
        });
    </script>

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