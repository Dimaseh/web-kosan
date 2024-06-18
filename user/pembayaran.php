<?php
session_start();
$username = $_SESSION['Nama'];
?>
<?php
include '../backend/koneksi.php';
if (isset($_GET['notagihan'])) {
    $no_tagihan = $_GET['notagihan'];

    // Perbaiki query untuk memilih transaksi berdasarkan notagihan
    $query = "SELECT t.*, k.no_rekening, k.nama_pemilik, k.harga_sewa AS harga_sewa_kost, k.foto_bangunan_utama
    FROM transaksi t
    JOIN kost k ON t.namakost = k.nama_kost
    WHERE t.notagihan = '$no_tagihan';";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $namakost = $row['namakost'];
        $TanggalMasuk = $row['tanggalmasuk'];
        $durasiSewa = $row['lamasewa'];
        $namaPenghuni = $row['namalengkap'];
        $jeniskelamin = $row['jeniskelamin'];
        $no_hp = $row['nohp'];
        $hargaKost = $row['harga_sewa_kost'];
        $hargaSewa = $row['hargasewa'];
        $biayaKos = $row['biayakos'];
        $gambar = $row['foto_bangunan_utama'];
        $gambarUrl = '../owner/' . $gambar;
        $biayaFasilitas = $row['biayafasilitas'];
        $totalTagihan = $hargaSewa + $biayaKos + $biayaFasilitas;
        $formattedTotalTagihan = 'Rp ' . number_format($totalTagihan, 0, ',', '.');
    } else {
        die("Invalid parameter or data not found.");
    }
} else {
    die("Parameter is missing.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Pembayaran</title>

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
                                <i class="nav-icon fas fa-credit-card"></i>

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
                                <i class="nav-icon fas fa-folder"></i>
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
                                <i class="nav-icon fas fa-folder"></i>
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
                    <!-- Info boxes -->
                    <!-- /.row -->

                    <div class="row">
                        <form method="POST" action="prosestagihan.php">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h5 class="card-title">Struk Pembayaran</h5>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="invoice p-3">
                                        <!-- title row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div style="display: flex; align-items: center;">
                                                    <div style="flex: 1;">
                                                        <h4>
                                                            <?php echo $namakost; ?>
                                                            <input type="hidden" name="nama_kost" value="<?php echo $namakost; ?>">
                                                            <input type="hidden" name="notagihan" value="<?php echo $no_tagihan; ?>">
                                                        </h4>
                                                        <h5>
                                                            <?php echo 'Rp ' . number_format($hargaKost, 0, ',', '.'); ?>
                                                        </h5>
                                                        <h6 class="badge rounded-pill bg-light text-dark text-wrap mb-1" style="font-size: 15px;"><?php echo $jeniskelamin; ?></h6>
                                                        <h5>
                                                            <i class="fas fa-map-signs"></i>
                                                            <?php echo $row['alamat']; ?>
                                                        </h5>
                                                    </div>
                                                    <div>
                                                        <span>
                                                            <img src="img/Boarding.png" style="width: 150px; height: 150px; border-radius: 50%;">
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- info row -->
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                                <img src="<?php echo $gambarUrl; ?>" class="card-img-top" />
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">
                                                <div class="form-group">
                                                    <label for="check-in-date">Tanggal Masuk</label>
                                                    <input type="date" class="form-control" id="check-in-date" name="check-in-date" value="<?php echo $TanggalMasuk; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rent-duration">Lama Sewa</label>
                                                    <input type="text" class="form-control" id="rent-duration" name="rent-duration" value="<?php echo "$durasiSewa"; ?> Bulan" readonly>
                                                </div>
                                            </div>


                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- Table row -->
                                        <div class="row">
                                            <div class="col-12 table-responsive mt-4">
                                                <h4>Data Penghuni</h4>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Nama Lengkap:</th>
                                                            <td><?php echo $namaPenghuni; ?></td>
                                                            <input type="hidden" name=namalengkap value="<?php echo $namaPenghuni ?>">
                                                        </tr>
                                                        <tr>
                                                            <th>Jenis Kelamin:</th>
                                                            <td><?php echo $jeniskelamin; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nomor HP/Telpon:</th>
                                                            <td><?php echo $no_hp; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pekerjaan:</th>
                                                            <td><?php echo $row['pekerjaan']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-12 table-responsive mt-4">
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <!-- accepted payments column -->
                                            <div class="col-6">
                                                <p class="lead">Payment Methods:</p>
                                                <img src="dist/img/credit/visa.png" alt="Visa">
                                                <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                                                <img src="dist/img/credit/american-express.png" alt="American Express">
                                                <img src="dist/img/credit/paypal2.png" alt="Paypal">

                                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                                                    plugg
                                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                                </p>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-6">
                                                <div class="table-responsive mt-4">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Tanggal Terkini:</th>
                                                            <td id="currentDate"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Biaya Lainnya:</th>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Biaya Kos</th>
                                                            <td><?php echo 'Rp ' . number_format($hargaKost, 0, ',', '.'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Biaya Fasilitas</th>
                                                            <td><?php echo 'Rp ' . number_format($biayaFasilitas, 0, ',', '.'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Lama Sewa</th>
                                                            <td><?php echo $durasiSewa; ?> Bulan</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width:50%">Total Tagihan:</th>
                                                            <td><?php echo $formattedTotalTagihan; ?></td>
                                                            <input type="hidden" name="TotalTagihan" value="<?php echo $totalTagihan; ?>">
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-12">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="termsCheckbox" required>
                                                    <label class="form-check-label" for="termsCheckbox">
                                                        Saya menyetujui persetujuan ketentuan yang berlaku.
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn btn-success float-left" onclick="showPaymentPopup()" disabled>
                                                    <i class="fas fa-credit-card"></i> Submit Payment
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showPaymentPopup() {
            Swal.fire({
                icon: 'info',
                title: 'Pemberitahuan',
                text: 'Pembayaran Sesuai Nominal.',
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    const accountNumber = '<?php echo $row['no_rekening']; ?>'; // Nomor rekening
                    const paymentAmount = '<?php echo $formattedTotalTagihan; ?>'; // Nominal pembayaran
                    const nama = '<?php echo $row['nama_pemilik']; ?>'; // Nama pemilik


                    Swal.fire({
                        icon: 'info',
                        title: 'Pembayaran',
                        html: 'Mohon Selesaikan Pembayaran Sebelum hari tanggal bulan tahun <br><br>' +
                            '<strong>Nomor Rekening:</strong> ' + accountNumber + '<br>' +
                            '<strong>Nama Pemilik:</strong> ' + nama + '<br>' +
                            '<strong>Nominal Pembayaran:</strong> ' + paymentAmount,
                        confirmButtonText: 'OK',
                        showCancelButton: true,
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Menunggu Proses Pembayaran',
                                text: 'Mohon tunggu sebentar, proses pembayaran sedang berlangsung.',
                                allowOutsideClick: false,
                                showCancelButton: false,
                                showConfirmButton: false,
                                timer: 3000, // Durasi tampilan pemberitahuan (dalam milidetik)
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                            });

                            // Kirim data formulir ke file prosestagihan.php menggunakan AJAX
                            const formData = new FormData(document.querySelector('form'));
                            fetch('prosestagihan.php', {
                                    method: 'POST',
                                    body: formData
                                }).then(response => response.text())
                                .then(data => {
                                    console.log(data);
                                });

                            setTimeout(showSuccessPopup, 3000); // Contoh penundaan sebelum menampilkan popup sukses (3000 milidetik = 3 detik)
                        }
                    });
                }
            });
        }

        function showSuccessPopup() {
            Swal.fire({
                icon: 'success',
                title: 'Pembayaran Berhasil',
                html: 'Terima kasih! Anda telah memakai layanan kami. 😊<br><a href="print.php?notagihan=<?php echo $no_tagihan; ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print Struk Pembayaran</a>'
            });
        }

        const termsCheckbox = document.getElementById('termsCheckbox');
        const submitButton = document.querySelector('.btn-success');

        termsCheckbox.addEventListener('change', function() {
            if (termsCheckbox.checked) {
                submitButton.removeAttribute('disabled');
            } else {
                submitButton.setAttribute('disabled', 'disabled');
            }
        });
    </script>

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            showPaymentPopup();
        });
    </script>

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