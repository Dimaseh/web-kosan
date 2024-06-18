<?php
session_start();
$username = $_SESSION['Nama'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Owner | Penyewa</title>

    <!-- SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

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
                    <a href="/Booking/index.php" class="nav-link active">Penyewa</a>
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
                        <div class="col-md-10">
                            <!-- /.card-header -->
                            <div class="card-footer">
                                <div class="table-responsive">
                                    <table class="table table-striped projects">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">No</th>
                                                <th style="width: 20%">Nama Penyewa</th>
                                                <th style="width: 15%">No Tagihan</th>
                                                <th style="width: 15%">Tanggal Masuk</th>
                                                <th style="width: 15%">Status</th>
                                                <th style="width: 30%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../backend/koneksi.php';
                                            $namaKost = $_GET['namaKost'];
                                            $sql = "SELECT t.`namalengkap`, t.`notagihan`, t.`tanggalmasuk`, tg.`status`, tg.`bukti_bayar`
                                            FROM transaksi t
                                            JOIN kost k ON t.namakost = k.nama_kost
                                            JOIN tagihan tg ON t.notagihan = tg.notagihan
                                            WHERE k.nama_kost = '$namaKost';
                                            
                                            ";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                $nomor = 1;

                                                while ($row = $result->fetch_assoc()) {
                                                    $kodeTransaksi = $row['notagihan'];
                                                    $namaPenyewa = $row['namalengkap'];
                                                    $tanggalMasuk = date('d-m-Y', strtotime($row['tanggalmasuk']));
                                                    $status = $row['status'];
                                                    $buktiBayar = $row['bukti_bayar'];

                                                    if (empty($buktiBayar)) {
                                                        $statusColor = 'warning';
                                                        $aksi = 'Menunggu Pembayaran';
                                                    } elseif ($status === 'Pending') {
                                                        $statusColor = 'warning';
                                                        $aksi = '<button class="btn btn-primary btn-sm cek-bukti-bayar" data-notagihan="' . $kodeTransaksi . '">Cek</button>';
                                                    } elseif ($status === 'Lunas') {
                                                        $statusColor = 'success';
                                                        $aksi = 'Lunas';
                                                    }

                                                    echo "<tr>";
                                                    echo "<td>$nomor</td>";
                                                    echo "<td>$namaPenyewa</td>";
                                                    echo "<td>$kodeTransaksi</td>";
                                                    echo "<td>$tanggalMasuk</td>";
                                                    echo "<td><span class='badge badge-$statusColor'>$status</span></td>";
                                                    echo "<td>$aksi</td>";
                                                    echo "</tr>";

                                                    $nomor++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='6' class='text-center'>Tidak ada data transaksi.</td></tr>";
                                            }
                                            $conn->close();
                                            ?>
                                        </tbody>
                                    </table>
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
    <script>
        const cekBuktiBayarButtons = document.querySelectorAll('.cek-bukti-bayar');
        cekBuktiBayarButtons.forEach(button => {
            button.addEventListener('click', function() {
                const notagihan = this.getAttribute('data-notagihan');

                fetch(`get_bukti_bayar.php?notagihan=${notagihan}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            const buktiBayarUrl = data.url;

                            Swal.fire({
                                title: 'Bukti Pembayaran',
                                html: `<iframe src="${buktiBayarUrl}" width="100%" height="400px" frameborder="0"></iframe>`,
                                showConfirmButton: true,
                                allowOutsideClick: false,
                                width: '80%',
                                showCancelButton: true,
                                confirmButtonText: 'Terima',
                                cancelButtonText: 'Tolak',
                            }).then(result => {
                                if (result.isConfirmed) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Pembayaran Diterima',
                                        text: 'Bukti pembayaran telah diterima. Status diubah menjadi "Lunas".',
                                    }).then(() => {
                                        fetch(`update_status.php?notagihan=${notagihan}&status=Lunas`)
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.status === 'success') {
                                                    window.location.reload();
                                                } else {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Gagal Memperbarui Status',
                                                        text: 'Terjadi kesalahan saat memperbarui status. Silakan coba lagi.',
                                                    });
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Gagal Memperbarui Status',
                                                    text: 'Terjadi kesalahan saat memperbarui status. Silakan coba lagi.',
                                                });
                                            });
                                    });
                                } else if (result.isDenied) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Pembayaran Ditolak',
                                        text: 'Bukti pembayaran ditolak. Status diubah menjadi "Belum Bayar".',
                                    }).then(() => {
                                        fetch(`update_status.php?notagihan=${notagihan}&status=Belum Bayar`)
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.status === 'success') {
                                                    window.location.reload();
                                                } else {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Gagal Memperbarui Status',
                                                        text: 'Terjadi kesalahan saat memperbarui status. Silakan coba lagi.',
                                                    });
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Gagal Memperbarui Status',
                                                    text: 'Terjadi kesalahan saat memperbarui status. Silakan coba lagi.',
                                                });
                                            });
                                    });
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Mendapatkan Bukti Pembayaran',
                                text: 'Terjadi kesalahan saat mendapatkan bukti pembayaran. Silakan coba lagi.',
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Mendapatkan Bukti Pembayaran',
                            text: 'Terjadi kesalahan saat mendapatkan bukti pembayaran. Silakan coba lagi.',
                        });
                    });
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





</body>

</html>