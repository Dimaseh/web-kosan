<?php
include '../backend/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $notagihan = $_POST['notagihan'];

    if (isset($_FILES['bukti-bayar']) && $_FILES['bukti-bayar']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['bukti-bayar']['tmp_name'];
        $fileName = $_FILES['bukti-bayar']['name'];
        $fileSize = $_FILES['bukti-bayar']['size'];

        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        if ($fileSize > 10000000) {
            echo json_encode(array('status' => 'error', 'message' => 'files with a maximum file size of 10MB are allowed.'));
            exit;
        }

        $newFileName = uniqid('bukti_bayar_') . '.' . $fileExtension;

        $uploadDirectory = '../file/buktipembayaran/';

        if (!is_dir($uploadDirectory) || !is_writable($uploadDirectory)) {
            echo json_encode(array('status' => 'error', 'message' => 'Upload directory is not writable.'));
            exit;
        }

        $uploadedFilePath = $uploadDirectory . $newFileName;
        if (move_uploaded_file($fileTmpPath, $uploadedFilePath)) {
            try {
                $sql = "UPDATE tagihan SET bukti_bayar = '$newFileName', status = 'Pending' WHERE notagihan = '$notagihan'";
                if ($conn->query($sql) === TRUE) {
                    echo json_encode(array('status' => 'success'));
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'Error updating database.'));
                }
            } catch (Exception $e) {
                echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to upload the file.'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'No file was uploaded.'));
    }
}
?>
