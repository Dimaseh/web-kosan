<?php
include '../backend/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["notagihan"]) && isset($_GET["status"])) {
        $notagihan = $_GET["notagihan"];
        $status = $_GET["status"];

        $updateSql = "UPDATE tagihan SET status = '$status' WHERE notagihan = '$notagihan'";
        if ($conn->query($updateSql) === TRUE) {
            $response = array("status" => "success");
            echo json_encode($response);
        } else {
            $response = array("status" => "error");
            echo json_encode($response);
        }
    } else {
        $response = array("status" => "error");
        echo json_encode($response);
    }
}
?>
