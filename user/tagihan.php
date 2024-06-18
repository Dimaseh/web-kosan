<?php
session_start();
$username = $_SESSION['Nama'];
$namalengkap = $_SESSION['NamaLengkap'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Tagihan</title>

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
                    <a href="/Booking/index.php" class="nav-link active">Tagihan</a>
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
                        <div class="col-md-10">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h5 class="card-title">Tagihan</h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-footer">
                                    <div class="table-responsive">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 1%">No</th>
                                                    <th style="width: 20%">No Tagihan</th>
                                                    <th style="width: 20%">Nama Kos</th>
                                                    <th>Tanggal Tagihan</th>
                                                    <th>Total Tagihan</th>
                                                    <th style="width: 20%" class="text-center">Status</th>
                                                    <th style="width: 8%" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include '../backend/koneksi.php';
                                                $sql = "SELECT * FROM tagihan where namalengkap = '$namalengkap';";

                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    $nomor = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        $notagihan = $row['notagihan'];
                                                        $totalTagihan = $row['total_tagihan'];
                                                        $namaKos = $row['nama_kost'];
                                                        $tanggalTagihan = $row['tanggal_tagihan'];
                                                        $status = $row['status'];
                                                        $buktiBayar = $row['bukti_bayar'];

                                                        $tanggalTagihan = date('d-m-Y', strtotime($tanggalTagihan));

                                                        if ($buktiBayar === null) {
                                                            $statusColor = 'danger';
                                                            $status = 'Belum Bayar';
                                                            $aksi = '<button class="btn btn-success btn-sm submit-bukti-bayar" data-notagihan="' . $notagihan . '">Submit Bukti Bayar</button>';
                                                        } else {
                                                            if ($status == 'Pending') {
                                                                $statusColor = 'warning';
                                                                $aksi = 'Menunggu Validasi';
                                                            } elseif ($status == 'Lunas') {
                                                                $statusColor = 'success';
                                                                $aksi = '<a href="bukti_pembayaran.php?notagihan=' . $notagihan . '" class="btn btn-primary btn-sm">Lihat Bukti Pembayaran</a>';
                                                            }
                                                        }

                                                        echo "<tr>";
                                                        echo "<td>$nomor</td>";
                                                        echo "<td>$notagihan</td>";
                                                        echo "<td>$namaKos</td>";
                                                        echo "<td>$tanggalTagihan</td>";
                                                        echo "<td>Rp " . number_format($totalTagihan, 0, ',', '.') . "</td>";
                                                        echo "<td class='text-center'><span class='badge badge-$statusColor'>$status</span></td>";
                                                        echo "<td class='text-center'>$aksi</td>";
                                                        echo "</tr>";

                                                        $nomor++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='6' class='text-center'>Tidak ada data tagihan.</td></tr>";
                                                }
                                                $conn->close();
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <p><b>Status</b></p>
                                        <p>
                                            Belum Bayar = Segera Lunasi Pembayaran Anda <br>
                                            Pending = Pembayaran anda sedang diproses<br>
                                            Lunas = Transaksi Selesai dan telah terverifikasi
                                        </p>
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
    <script>
        async function showBuktiBayarForm(notagihan) {
            try {
                // Tampilkan form untuk mengunggah bukti pembayaran
                const {
                    value: file
                } = await Swal.fire({
                    title: 'Submit Bukti Bayar',
                    html: `
          <h4>Submit Bukti Bayar</h4>
          <div class="form-group">
            <label for="bukti-bayar">Bukti Pembayaran</label>
            <input type="file" class="form-control" id="bukti-bayar" name="bukti-bayar" required>
            <input type="hidden" name="notagihan" value="${notagihan}">
          </div>
        `,
                    showCancelButton: true,
                    confirmButtonText: 'Kirim',
                    preConfirm: () => {
                        const buktiBayarInput = document.getElementById('bukti-bayar');
                        return buktiBayarInput.files[0];
                    },
                });

                if (!file) return; // User canceled the submission

                // Kirim data ke halaman p_upload_bukti.php menggunakan AJAX
                const formData = new FormData();
                formData.append('notagihan', notagihan);
                formData.append('bukti-bayar', file);

                const response = await fetch('p_upload_bukti.php', {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    const result = await response.json();
                    if (result.status === 'success') {
                        // Berikan respons pengunggahan (gantikan dengan tindakan sesuai kebutuhan)
                        Swal.fire({
                            icon: 'success',
                            title: 'Bukti Pembayaran Berhasil Diunggah',
                            text: 'Terima kasih atas pembayaran Anda. Bukti pembayaran berhasil diunggah.',
                            timer: 3000,
                            timerProgressBar: true,
                        }).then(() => {
                            // Refresh halaman setelah unggah berhasil (gantikan dengan tampilan atau tindakan sesuai kebutuhan)
                            window.location.reload();
                        });
                    } else {
                        // Tampilkan pesan error jika terjadi kesalahan
                        throw new Error('Terjadi kesalahan saat mengunggah bukti pembayaran.');
                    }
                } else {
                    // Tampilkan pesan error jika terjadi kesalahan
                    throw new Error('Terjadi kesalahan saat mengunggah bukti pembayaran.');
                }
            } catch (error) {
                // Tampilkan pesan error jika terjadi kesalahan
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Mengunggah Bukti Pembayaran',
                    text: error.message,
                });
            }
        }

        const submitBuktiBayarButtons = document.querySelectorAll('.submit-bukti-bayar');
        submitBuktiBayarButtons.forEach(button => {
            button.addEventListener('click', function() {
                const notagihan = this.getAttribute('data-notagihan');
                showBuktiBayarForm(notagihan);
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