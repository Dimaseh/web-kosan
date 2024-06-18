<?php
include '../backend/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["notagihan"])) {
        $notagihan = $_GET["notagihan"];

        $sql = "SELECT bukti_bayar FROM tagihan WHERE notagihan = '$notagihan'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $buktiBayarFileName = $row['bukti_bayar'];
            $buktiBayarPath = '../file/buktipembayaran/' . $buktiBayarFileName;

            if (file_exists($buktiBayarPath)) {
                echo '<iframe src="' . $buktiBayarPath . '" width="100%" height="600px" frameborder="0"></iframe>';
            } else {
                echo "Bukti pembayaran tidak ditemukan.";
            }
        } else {
            echo "Nomor tagihan tidak diberikan.";
        }
    }
}
?>
