<?php
    include '../backend/koneksi.php';

    if (isset($_GET['id'])) {
        $idKost = $_GET['id'];
        
        $query_delete_kamar = "DELETE FROM kamar WHERE id_kost = '$idKost'";
        $result_delete_kamar = $conn->query($query_delete_kamar);
        
        $query_delete_kost = "DELETE FROM kost WHERE id_kost = '$idKost'";
        $result_delete_kost = $conn->query($query_delete_kost);
        
        if ($result_delete_kost) {
            header('Location: kosSaya.php');
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        header('Location: index.php');
    }

    $conn->close();
?>