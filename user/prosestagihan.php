<?php
include '../backend/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $notagihan = $_POST['notagihan'];
    $namalengkap =$_POST['namalengkap'];
    $namakost = $_POST['nama_kost'];
    $totalTagihan = $_POST['TotalTagihan'];
    $tanggalTagihan = $_POST['check-in-date'];

    $sql = "INSERT INTO tagihan (notagihan, namalengkap, nama_kost, total_tagihan, tanggal_tagihan)
            VALUES ('$notagihan', '$namalengkap', '$namakost', '$totalTagihan', '$tanggalTagihan');";

    if ($conn->query($sql) === TRUE) {
        header("Location: print.php?notagihan=" . $notagihan);
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
