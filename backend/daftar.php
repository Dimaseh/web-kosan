<?php include 'koneksi.php' ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];
  $namaLengkap = $_POST['nama_lengkap'];
  $pekerjaan = $_POST['pekerjaan'];
  $noHP = $_POST['no_hp'];
  $jenisKelamin = $_POST['jenis_kelamin'];
  $role = $_POST['role'];

  if ($password !== $confirmPassword) {
    echo "Kata sandi dan konfirmasi kata sandi tidak sesuai.";
    exit;
  }

  $targetDir = "../images/User";
  $fotoKTP = $_FILES['foto-ktp']['name'];
  $fotoKTPPath = $targetDir . basename($fotoKTP);
  $fotoKTPTmp = $_FILES["foto-ktp"]["tmp_name"];
  $uploadKTPStatus = move_uploaded_file($fotoKTPTmp, $fotoKTPPath);

  $fotoProfil = $_FILES['foto_profil']['name'];
  $fotoProfilPath = $targetDir . basename($fotoProfil);
  $fotoProfilTmp = $_FILES["foto_profil"]["tmp_name"];
  $uploadProfilStatus = move_uploaded_file($fotoProfilTmp, $fotoProfilPath);

  if ($uploadKTPStatus && $uploadProfilStatus) {
    $sql = "INSERT INTO users (`Nama`, `Email`, `Password`, `Confirm Password`, `NamaLengkap`, `Pekerjaan`, `Foto KTP`, `JenisKelamin`, `Foto Profil`, `role`)
            VALUES ('$nama', '$email', '$password', '$confirmPassword', '$namaLengkap', '$pekerjaan', '$fotoKTPPath', '$jenisKelamin', '$fotoProfilPath', '$role')";

    // Menjalankan query
    if ($conn->query($sql) === TRUE) {
      header('Location: ../index.php');
      exit;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Gagal mengunggah gambar. Pastikan file yang diunggah adalah gambar valid.";
  }
}
?>