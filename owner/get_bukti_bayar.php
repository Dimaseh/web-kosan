<?php

include '../backend/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['notagihan'])) {
  $notagihan = $_GET['notagihan'];

  // Query to get the bukti bayar URL from the database
  $sql = "SELECT bukti_bayar FROM tagihan WHERE notagihan = '$notagihan'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $buktiBayarUrl = '../file/buktipembayaran/' . $row['bukti_bayar'];

    // Return the URL as JSON response
    echo json_encode(array('status' => 'success', 'url' => $buktiBayarUrl));
  } else {
    echo json_encode(array('status' => 'error', 'message' => 'Bukti pembayaran tidak ditemukan.'));
  }
} else {
  echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
}

$conn->close();
?>
