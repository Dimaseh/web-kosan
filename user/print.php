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
    WHERE t.notagihan = $no_tagihan;";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $TanggalMasuk = $row['tanggalmasuk'];
        $durasiSewa = $row['lamasewa'];
        $namaPenghuni = $row['namalengkap'];
        $jeniskelamin = $row['jeniskelamin'];
        $no_hp = $row['nohp'];
        $gambar = $row['foto_bangunan_utama'];
        $gambarUrl = '../owner/' . $gambar;
        $hargaSewa = $row['harga_sewa_kost'];
        $biayaKos = $row['biayakos'];
        $biayaFasilitas = $row['biayafasilitas'];
        $totalTagihan = ($hargaSewa * $durasiSewa) + $biayaKos + $biayaFasilitas;
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
    <title>AdminLTE 3 | Invoice Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <!-- /.row -->

                <div class="row">
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
                                                <?php echo $row['namakost']; ?>
                                                </h4>
                                                <h5>
                                                <?php echo 'Rp ' . number_format($hargaSewa, 0, ',', '.'); ?>/bulan
                                                </h5>
                                                <h6 class="badge rounded-pill bg-light text-dark text-wrap mb-1" style="font-size: 15px;">Laki-laki</h6>
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
                                                    <td><?php echo 'Rp ' . number_format($hargaSewa, 0, ',', '.') . '/bulan'; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Biaya Fasilitas</th>
                                                    <td><?php echo 'Rp ' . number_format($biayaFasilitas, 0, ',', '.') . '/bulan'; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Lama Sewa</th>
                                                    <td><?php echo $durasiSewa; ?> Bulan</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Total Tagihan:</th>
                                                    <td><?php echo $formattedTotalTagihan; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
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