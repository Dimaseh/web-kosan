<?php
session_start();
$username = $_SESSION['Nama'];
$namalengkap = $_SESSION['NamaLengkap'];
?>
<?php
include '../backend/koneksi.php';
if (isset($_GET['id_kost'])) {
    $idKost = $_GET['id_kost'];
    $query = "SELECT k.*, kamar.jumlah_kamar, kamar.panjang_kamar, kamar.lebar_kamar, kamar.tipe_kamar, k.harga_sewa
FROM kost k
INNER JOIN kamar ON k.id_kost = kamar.id_kost
WHERE k.id_kost = '$idKost';";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hargaSewa = $row['harga_sewa'];
        $gambar = $row['foto_bangunan_utama'];
        $gambarUrl = '../owner/' . $gambar;
        $hargaSewaTahun = $hargaSewa * 12 * 0.9;
        $tipeKamarKost = $row['tipe_kamar'];
    } else {
        die("Invalid id_kost parameter or data not found.");
    }
} else {
    die("id_kost parameter is missing.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Dashboard</title>

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
                    <a href="/Booking/index.php" class="nav-link active">Home</a>
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
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="dasboardUser.php" class="nav-link active">
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
                            <a href="dataKos.php" class="nav-link active">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>
                                    Data Kos
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="profilUser.php" class="nav-link active">
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
                            <a href="tagihan.php" class="nav-link active">
                                <i class="nav-icon fas fa-cash-register"></i>
                                <p>
                                    Tagihan
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
                                        <span id="current-day"></span> <span id="last-updated"></span>
                                        <h2>Mulai KOS Kapan....?</h2>
                                        <?php

                                        ?>
                                        <form method="post" action="prosespembayaran1.php">
                                            <div class="form-group" id="rent-duration-group">
                                                <label for="No_Tagihan">No Tagihan</label>
                                                <input type="text" class="form-control" id="no_tagihan" name="no_tagihan" readonly>
                                            </div>
                                            <div class="form-group" id="rent-duration-group">
                                                <label for="Nama_Kost">Nama Kost</label>
                                                <input type="text" class="form-control" id="rent-duration" name="nama_kost" value="<?php echo $row['nama_kost']; ?>" readonly>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="start-date">Alamat</label>
                                                        <input type="alamat" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="harga_sewa">Harga Sewa</label>
                                                        <input type="text" class="form-control" id="hargasewa" name="harga_sewa" value="<?php echo $hargaSewa ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="start-date">Tanggal Mulai Kos</label>
                                                        <input type="date" class="form-control" id="start-date" name="start-date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="rent-type">Hitungan Sewa</label>
                                                        <select class="form-control" id="rent-type" name="rent-type" onchange="toggleRentDuration()">
                                                            <option hidden value=""></option>
                                                            <option value="bulan">Bulanan</option>
                                                            <option value="tahun">Tahunan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group" id="rent-duration-group">
                                                <label for="rent-duration">Durasi Sewa</label>
                                                <select class="form-control" id="rent-duration" name="rent-duration">
                                                    <option hidden value=""></option>
                                                    <!-- Opsi bulanan -->
                                                    <option value="1 Bulan">1 Bulan</option>
                                                    <option value="2 Bulan">2 Bulan</option>
                                                    <option value="3 Bulan">3 Bulan</option>
                                                    <!-- Opsi tahunan -->
                                                    <option value="12 Tahun">1 Tahun</option>
                                                    <option value="24 Tahun">2 Tahun</option>
                                                    <option value="36 Tahun">3 Tahun</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h2 style="border-bottom: 1px solid white; color: white;">Masukan Data Dirimu</h2>
                                        <h6 style="color: red; font-size: 14px;">Perhatian: Pastikan data dirimu sesuai untuk mempermudah proses pembookingan kost agar tidak ada masalah!!!</h6>
                                        <div class="form-group">
                                            <label for="full-name">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="full-name" name="full-name" placeholder="Masukkan nama lengkap" value="<?php echo $namalengkap; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option hidden value=""></option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone-number">Nomor HP</label>
                                            <input type="tel" class="form-control" id="phone-number" name="phone-number" placeholder="Masukkan nomor HP">
                                        </div>
                                        <div class="form-group">
                                            <label for="occupation">Pekerjaan</label>
                                            <select class="form-control" id="occupation" name="occupation">
                                                <option hidden value=""></option>
                                                <option value="mahasiswa">Mahasiswa</option>
                                                <option value="pegawai">Pegawai</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <div class="card-header bg-primary text-white">
                                                <h4 class="mb-0">Kamar</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Tipe</th>
                                                                <th>Kuota</th>
                                                                <th>Tipe Kamar</th>
                                                                <th>Fasilitas Kamar</th>
                                                                <th class="text-center">Total Harga</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php if ($tipeKamarKost == 'kamar-mandi-dalam') {
                                                                        echo 'A1';
                                                                    } elseif ($tipeKamarKost == 'kamar-mandi-luar') {
                                                                        echo 'A2';
                                                                    } else {
                                                                        echo $tipeKamarKost;
                                                                    } ?></td>
                                                                <td><?php echo $row['jumlah_kamar']; ?> <span>Kamar</span></td>
                                                                <input type="hidden" name="id_kost" value="<?php echo $idKost; ?>">
                                                                <td><?php if ($tipeKamarKost == 'kamar-mandi-dalam') {
                                                                        echo 'Kamar Mandi Dalam';
                                                                    } elseif ($tipeKamarKost == 'kamar-mandi-luar') {
                                                                        echo 'Kamar Mandi Luar';
                                                                    } else {
                                                                        echo $tipeKamarKost;
                                                                    } ?></td>
                                                                <td><?php echo $row['panjang_kamar']; ?> x <?php echo $row['lebar_kamar']; ?> <span>M</span></td>
                                                                <td>
                                                                    <div><?php echo 'Rp ' . number_format($hargaSewa, 0, ',', '.') . '/bulan'; ?></div>
                                                                    <div><?php echo 'Rp ' . number_format($hargaSewaTahun, 0, ',', '.') . '/tahun'; ?></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="room-type">Tipe Kamar</label>
                                            <select class="form-control" id="room-type" name="room-type">
                                                <option value="single">Single Room</option>
                                                <option value="double">Double Room</option>
                                            </select>
                                        </div>
                                        <h2 style="border-bottom: 1px solid"></h2>
                                        <p style="font-size: 14px;">Periksa kembali kost yang anda booking apakah telah sesuai</p>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col">
                                                    <a data-toggle="modal" data-target="#profilePictureModal">
                                                        <img class="profile-user-img img-fluid" src="<?php echo $gambarUrl; ?>" alt="User profile picture" style="width: 100%; height: auto;">
                                                    </a>
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
                                                <!-- /.col -->
                                                <div class="col-sm-4 mt-2">
                                                    <div class="row">
                                                        <div><?php echo $row['nama_pemilik']; ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div><?php echo $row['nama_kost']; ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div><?php echo $row['fasilitas_kost']; ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div><?php echo $row['alamat']; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right mt-4">Pembayaran</button>
                                </div>
                                </form>
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

    <script>
        // Get the current date
        var currentDate = new Date();

        // Format the current date to YYYY-MM-DD
        var year = currentDate.getFullYear();
        var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
        var day = currentDate.getDate().toString().padStart(2, '0');
        var formattedDate = year + '-' + month + '-' + day;

        // Set the input value to the current date
        document.getElementById("start-date").value = formattedDate;
    </script>

    <script>
        // Function to format number as Indonesian Rupiah
        function formatRupiah(number) {
            let formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            return formatter.format(number);
        }

        // Get the input element
        const hargaSewaInput = document.getElementById('hargasewa');

        // Get the span element to display the formatted value
        const formattedHargaSewaSpan = document.getElementById('formattedHargaSewa');

        // Format the initial value
        formattedHargaSewaSpan.textContent = formatRupiah(hargaSewaInput.value);

        // Listen for changes in the input value and update the formatted value
        hargaSewaInput.addEventListener('change', function() {
            formattedHargaSewaSpan.textContent = formatRupiah(hargaSewaInput.value);
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
        function toggleRentDuration() {
            var rentType = document.getElementById("rent-type").value;
            var rentDurationGroup = document.getElementById("rent-duration-group");
            var rentDuration = document.getElementById("rent-duration");

            if (rentType === "bulan") {
                rentDuration.innerHTML = "<option value='1'>1 Bulan</option><option value='2'>2 Bulan</option><option value='3'>3 Bulan</option>";
                rentDurationGroup.style.display = "block";
            } else if (rentType === "tahun") {
                rentDuration.innerHTML = "<option value='12'>1 Tahun</option><option value='24'>2 Tahun</option><option value='36'>3 Tahun</option>";
                rentDurationGroup.style.display = "block";
            } else {
                rentDurationGroup.style.display = "none";
            }
        }

        function generateRandomNumber() {
            const randomNumber = Math.floor(Math.random() * 1000000); // Change 1000000 to set the maximum range for the random number
            return randomNumber.toString().padStart(6, '0'); // Adjust the padStart value to match the desired number of digits
        }

        // Fill the input field with the generated random number when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            const rentDurationInput = document.getElementById('no_tagihan');
            rentDurationInput.value = generateRandomNumber();
        });
    </script>

    <script>
        // Dapatkan elemen dengan id "current-day"
        var currentDayElement = document.getElementById("current-day");

        // Dapatkan objek tanggal saat ini
        var currentDate = new Date();

        // Dapatkan nama hari dari objek tanggal
        var currentDayName = currentDate.toLocaleDateString("id-ID", {
            weekday: "long"
        });

        // Isi elemen dengan nama hari
        currentDayElement.textContent = currentDayName;

        // Dapatkan elemen dengan id "last-updated"
        var lastUpdatedElement = document.getElementById("last-updated");

        // Dapatkan nama bulan dari objek tanggal
        var currentMonthName = currentDate.toLocaleDateString("id-ID", {
            month: "long"
        });

        // Dapatkan tanggal dan tahun dalam bentuk tulisan
        var currentDateText = currentDate.getDate() + " " + currentMonthName + " " + currentDate.getFullYear();

        // Isi elemen dengan tanggal terakhir diperbarui
        lastUpdatedElement.textContent = currentDateText;
    </script>

</body>

</html>