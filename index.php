<html lang="en">
<!DOCTYPE html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Boarding HOUSE - HOME</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/common.css" />

  <style>
    .availability-form {
      margin-top: -50px;
      z-index: 2;
      position: relative;
    }

    @media screen and (max-width: 575px) {
      .availability-form {
        margin-top: 25px;
        padding: 0 35px;
      }
    }
  </style>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">
        <img src="images/carousel/Boarding.png" style="max-width: 100%; max-height: 100px; width: auto; height: auto;" />
      </a>


      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
        </ul>
        <div class="d-flex">
          <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
            Login
          </button>
          <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
            Register
          </button>
        </div>
      </div>
    </div>
  </nav>

  <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="backend/login.php" onsubmit="confirmSubmit(event)">
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-circle fs-3 me-2"></i> User Login
            </h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control shadow-none" name="name" />
            </div>
            <div class="mb-4">
              <label class="form-label">Password</label>
              <input type="password" class="form-control shadow-none" name="Password" />
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <button type="submit" class="btn btn-dark shadow-none">
                LOGIN
              </button>
              <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="backend/daftar.php" method="post" enctype="multipart/form-data" onsubmit="confirmSubmit(event)">
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-lines-fill fs-3 me-2"></i> User
              Registration
            </h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
              Note: Dalam peringatan ini, pastikan Anda memasukkan detail yang benar dan sesuai dengan kartu identitas Anda yang sah untuk menghindari masalah di kemudian hari.
            </span>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control shadow-none" name="nama" required />
                </div>
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control shadow-none" name="email" required />
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control shadow-none" name="password" required />
                </div>
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">Confirm Password</label>
                  <input type="password" class="form-control shadow-none" name="confirm_password" required />
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control shadow-none" name="nama_lengkap" required />
                </div>
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">Masukan Pekerjaan</label>
                  <input type="text" class="form-control shadow-none" name="pekerjaan" required />
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">No HP</label>
                  <input type="number" class="form-control shadow-none" name="no_hp" required />
                </div>
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">Foto KTP</label>
                  <input type="file" class="form-control shadow-none" accept="image/*" name="foto-ktp" onchange="previewImage(event, 'preview-image-ktp')" />
                  <img id="preview-image-ktp" src="" alt="Preview Image" style="max-width: 200px; display: none;">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label for="gender">Jenis Kelamin</label>
                  <select class="form-control" id="gender" name="jenis_kelamin" required>
                    <option hidden value=""></option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">Foto Profil</label>
                  <input type="file" class="form-control shadow-none" accept="image/*" name="foto_profil" onchange="previewImage(event, 'preview-image-profil')" />
                  <img id="preview-image-profil" src="" alt="Preview Image" style="max-width: 200px; display: none;">
                </div>
              </div>
              <div class="justify-content-center">
                <div class="form-group text-center">
                  <label class="form-label">Daftar sebagai:</label>
                  <select class="form-control shadow-none text-center" name="role">
                    <option hidden value=""></option>
                    <option value="user">User</option>
                    <option value="owner">Owner</option>
                  </select>
                </div>
              </div>

            </div>
          </div>

          <div class="text-center my-1">
            <button type="submit" class="btn btn-dark shadow-none" onclick="showMessage">
              REGISTER
            </button>
            <script>
              function confirmSubmit(event) {
                event.preventDefault();
                Swal.fire({
                  title: 'Apakah Anda yakin?',
                  text: "Apakah data yang Anda masukkan sudah benar?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Sudah',
                  cancelButtonText: 'Cek Lagi'
                }).then((result) => {
                  if (result.isConfirmed) {
                    var form = event.target;
                    form.submit();
                  }
                });
              }
            </script>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>

  <!-- Carousel -->

  <div class="container-fluid px-lg-4 mt-4">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="images/carousel/1.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/2.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/3.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/4.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/5.png" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/carousel/6.png" class="w-100 d-block" />
        </div>
      </div>
    </div>
  </div>

  <!-- CARI LOKASI -->

  <div class="container availability-form">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-4 rounded">
        <h5 class="mb-2">Butuh tempat KOS?</h5>
        <h6 class="mb-4">Dapatkan pilihan terbaik dan sewa sekarang juga!</h6>
        <form>
          <div class="row align-items-end">
            <div class="col-lg-12 mb-3">
              <div class="input-group input-group-lg">
                <input type="search" class="form-control shadow-none" placeholder="Masukkan lokasi/alamat kos.." />
                <div class="input-group-prepend">
                  <button type="submit" class="btn btn-lg text-white shadow-none custom-bg">
                    <i class="bi bi-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- REKOMENDASI KAMAR KOS -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REKOMENDASI KAMAR KOS</h2>

  <?php
  include 'backend/koneksi.php';
   
  // Query untuk mendapatkan data kost
  $query = "SELECT * FROM kost";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $namaKost = $row['nama_kost'];
      $hargaSewa = $row['harga_sewa'];
      $alamat = $row['alamat'];
      $jenisKost = $row['jenis_kost'];
      $gambar = $row['foto_bangunan_utama'];
      $gambarUrl = './owner/' . $gambar;
  ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
              <img src="<?php echo $gambarUrl; ?>" class="card-img-top" />
              <div class="card-body">
                <h5><?php echo $namaKost; ?></h5>
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <h6 class="mb-0"><?php echo 'Rp ' . number_format($hargaSewa, 0, ',', '.') . '/bulan'; ?></h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap ml-auto"><?php echo $jenisKost; ?></span>
                </div>
                <i class="bi bi-geo-alt"></i>
                <span class="badge rounded-pill bg-light text-dark text-wrap mb-4">
                  <?php echo $alamat; ?>
                </span>
                <div class="rating mb-4">
                  <h6 class="mb-1">Rating</h6>
                  <span class="badge rounded-pill">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-half text-warning"></i>
                  </span>
                </div>
                <div class="d-flex justify-content-evenly mb-2">
                  <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Pesan Sekarang</a>
                  <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Lebih Banyak</a>
                </div>
              </div>
            </div>
          </div>
      <?php
    }
  } else {
    // Jika tidak ada data kost
    echo "Tidak ada data kost.";
  }
      ?>
      <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Lebih Banyak >>></a>
      </div>
        </div>
      </div>


      <!-- LOKASI KOS YANG TERSEDIA -->
      <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">LOKASI KOS YANG TERSEDIA</h2>

      <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
          <div class="col-lg-3 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
              <img src="images/carousel/kampusss2.jpg" class="card-img" />
              <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <h3 style="color: white;">KAMPUS-1</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
              <img src="images/carousel/kampusss2.jpg" class="card-img" />
              <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <h3 style="color: white;">KAMPUS-2</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
              <img src="images/carousel/kampusss2.jpg" class="card-img" />
              <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <h3 style="color: white;">KAMPUS-3</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto">
              <img src="images/carousel/kampusss2.jpg" class="card-img" />
              <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <h3 style="color: white;">KAMPUS-4</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Lebih Banyak >>></a>
          </div>
        </div>
      </div>

      <!-- Wilayah Layanan Kami -->
      <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Wilayah Layanan Kami</h2>

      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
            <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.2175956422951!2d101.37964990467607!3d0.47608622369175924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a93ba4853879%3A0x7beea897adf8ac91!2sKampus%20Universitas%20Riau!5e0!3m2!1sid!2sid!4v1701289846753!5m2!1sid!2sid" loading="lazy"></iframe>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="bg-white p-4 rounded mb-4">
              <h5>Hubungi</h5>
              <a href="tel: +62 823 1234 5678" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>+62 823 1234 5678</a>
              <br />
              <a href="tel: +62 823 1234 5678" class="d-inline-block text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>+62 823 1234 5678</a>
            </div>
            <div class="bg-white p-4 rounded mb-4">
              <h5>Ikuti</h5>
              <a href="#" class="d-inline-block mb-3">
                <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-twitter me-1"></i> Twitter</span>
              </a>
              <br />
              <a href="#" class="d-inline-block mb-3">
                <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-facebook me-1"></i> Facebook</span>
              </a>
              <br />
              <a href="#" class="d-inline-block mb-3">
                <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-instagram me-1"></i> Instagram</span>
              </a>
            </div>
          </div>
        </div>
      </div>



      <div class="container-fluid bg-white mt-5">
        <div class="row">
          <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2">BOORDING HOUSE</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium
              tenetur fugiat mollitia, odit ducimus, quo consequatur illum porro
              amet vero facere autem enim itaque aut quaerat error? Reiciendis,
              nobis maiores.
            </p>
          </div>
          <div class="col-lg-4 p-4">
            <h5 class="mb-3">Link</h5>
            <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a>
            <br />
            <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a>
            <br />
            <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a>
            <br />
            <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a>
            <br />
            <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
          </div>
          <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow us</h5>
            <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
              <i class="bi bi-twitter me-1"></i> Twitter </a><br />
            <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
              <i class="bi bi-facebook me-1"></i> Facebook </a><br />
            <a href="#" class="d-inline-block text-dark text-decoration-none">
              <i class="bi bi-instagram me-1"></i> Instagram </a><br />
          </div>
        </div>
      </div>

      <h6 class="text-center bg-dark text-white p-3 m-0">
        Designed and Developed by DODY SAHENDRA WIJAYA
      </h6>

      <script>
        function previewImage(event, previewImageId) {
          var input = event.target;
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              document.getElementById(previewImageId).src = e.target.result;
              document.getElementById(previewImageId).style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
      </script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>





      <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

      <script>
        var swiper = new Swiper(".swiper-container", {
          spaceBetween: 30,
          effect: "fade",
          loop: true,
          autoplay: {
            delay: 3500,
            disableOnInteraction: false,
          },
        });

        var swiper = new Swiper(".swiper-testimonials", {
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
          },
          pagination: {
            el: ".swiper-pagination",
          },
          breakpoints: {
            320: {
              slidesPerView: 1,
            },
            640: {
              slidesPerView: 1,
            },
            768: {
              slidesPerView: 2,
            },
            1024: {
              slidesPerView: 3,
            },
          },
          initialSlide: 1,
        });
      </script>
</body>

</html>