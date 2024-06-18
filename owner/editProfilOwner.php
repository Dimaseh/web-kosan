<?php
session_start();
$username = $_SESSION['Nama'];

include '../backend/koneksi.php';

$login_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jeniskelamin = $_POST['JenisKelamin'];
    $username = $_POST['Nama'];
    $NamaLengkap = $_POST['NamaLengkap'];
    $Email = $_POST['Email'];
    $Pekerjaan = $_POST['Pekerjaan'];
    $fotoProfil = $_FILES['Foto_Profil']['name'];
    $tmp_name = $_FILES['Foto_Profil']['tmp_name'];

    if ($_FILES['Foto_Profil']['error'] === 0) {
        $gambar = uniqid() . '_' . $fotoProfil;
        $gambarUrl = './' . $gambar;

        if (move_uploaded_file($tmp_name, $gambarUrl)) {
            $ambil = $conn->query("SELECT `Foto Profil` FROM users WHERE id = '$login_id'");
            $tampil = $ambil->fetch_assoc();
            $fotoProfilLama = $tampil['Foto Profil'];
            if ($fotoProfilLama && file_exists($fotoProfilLama)) {
                unlink($fotoProfilLama);
            }

            $query = "UPDATE users SET `JenisKelamin` = '$jeniskelamin', `Nama` = '$username', `NamaLengkap` = '$NamaLengkap', `Email` = '$Email', `Pekerjaan` = '$Pekerjaan', `Foto Profil` = '$gambar' WHERE id = '$login_id'";
        } else {
            echo "Failed to upload the profile picture.";
            exit;
        }
    } else {
        $query = "UPDATE users SET `JenisKelamin` = '$jeniskelamin', `Nama` = '$username', `NamaLengkap` = '$NamaLengkap', `Email` = '$Email', `Pekerjaan` = '$Pekerjaan' WHERE id = '$login_id'";
    }

    // Execute the query
    if ($conn->query($query) === TRUE) {
        echo "Data Berhasil di edit";
        header("Location: profilOwner.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Ambil data profil dari database untuk ditampilkan dalam form
$ambil = $conn->query("SELECT * FROM users WHERE id = '$login_id'");
$tampil = $ambil->fetch_assoc();

$jeniskelamin = $tampil['JenisKelamin'];
$username = $tampil['Nama'];
$NamaLengkap = $tampil['NamaLengkap'];
$Email = $tampil['Email'];
$Pekerjaan = $tampil['Pekerjaan'];
$fotoProfil = $tampil['Foto Profil'];
$fotoProfilUrl = './' . $fotoProfil;
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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h5 class="card-title">Edit</h5>

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
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col col-6">
                                                <div class="row mb-3">
                                                    <div class="col">Username:</div>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="Nama" value="<?php echo $username; ?>" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">Nama Lengkap:</div>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="NamaLengkap" value="<?php echo $NamaLengkap ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">Email:</div>
                                                    <div class="col-sm-8">
                                                        <input type="email" name="Email" value="<?php echo $Email; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">Pekerjaan:</div>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="Pekerjaan" value="<?php echo $Pekerjaan; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">Jenis Kelamin:</div>
                                                    <div class="col-sm-8">
                                                        <select name="JenisKelamin" class="form-control">
                                                            <option value="" selected disabled hidden>Pilih jenis kelamin</option>
                                                            <option value="Laki-laki" <?php if ($jeniskelamin == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                                            <option value="Perempuan" <?php if ($jeniskelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="new-profile-picture" class="form-label">Ubah Foto Profil:</label><br>
                                                            <img id="current-profile-picture" src="<?php echo $fotoProfilUrl; ?>" alt="Foto Profil" style="max-width: 200px;">
                                                            <input id="new-profile-picture" type="file" name="Foto_Profil" accept="image/*" onchange="previewImage(event)">
                                                            <img id="preview-image" src="" alt="Preview Image" style="max-width: 200px; display: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success float-right" name="submit">
                                                <i class="fas fa-save"></i> Simpan
                                            </button>
                                        </div>
                                    </div>
                            </div>
                            </form>
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
        function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-image').src = e.target.result;
                    document.getElementById('preview-image').style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
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