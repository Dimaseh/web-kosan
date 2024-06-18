<?php
    include '../backend/koneksi.php';

    if (isset($_GET['id_kost'])) {
        $idKost = $_GET['id_kost'];
        
        $query = "DELETE FROM kamar WHERE id_kost = '$idKost'";
        $result = $conn->query($query);
        
        if ($result) {
            header('Location: Kamar.php');
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        header('Location: Kamar.php');
    }

    $conn->close();
?>