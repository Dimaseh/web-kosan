<?php
include '../backend/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $notagihan = $_POST['no_tagihan'];
    $namaKost = $_POST['nama_kost'];
    $idKost = $_POST['id_kost'];
    $hargaSewa = floatval($_POST["harga_sewa"]);
    $alamat = $_POST["alamat"];
    $tanggalMasuk = $_POST["start-date"];
    $lamaSewa = intval($_POST["rent-duration"]);
    $namaLengkap = $_POST["full-name"];
    $jenisKelamin = $_POST["gender"];
    $noHp = $_POST["phone-number"];
    $pekerjaan = $_POST["occupation"];

    $hargasewa_total = $hargaSewa * $lamaSewa;

    $sql = "INSERT INTO transaksi (notagihan, namakost, hargasewa, alamat, tanggalmasuk, lamasewa, namalengkap, jeniskelamin, nohp, pekerjaan)
            VALUES ('$notagihan', '$namaKost', '$hargasewa_total', '$alamat', '$tanggalMasuk', '$lamaSewa', '$namaLengkap', '$jenisKelamin', '$noHp', '$pekerjaan');";

    if ($conn->query($sql) === TRUE) {
        $sql = "UPDATE kamar SET jumlah_kamar = jumlah_kamar - 1 WHERE id_kost = '$idKost'";
        if ($conn->query($sql) === TRUE) {
            header("Location: pembayaran.php?notagihan=$notagihan");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>