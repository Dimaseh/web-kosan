-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2024 pada 12.42
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infokost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `panjang_kamar` int(11) NOT NULL,
  `lebar_kamar` int(11) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `biaya_fasilitas` int(11) NOT NULL,
  `fasilitas_kamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_kost`, `jumlah_kamar`, `panjang_kamar`, `lebar_kamar`, `tipe_kamar`, `biaya_fasilitas`, `fasilitas_kamar`) VALUES
(5, 5, 3, 3, 3, 'kamar-mandi-luar', 10000, ''),
(7, 7, 4, 4, 3, 'kamar-mandi-luar', 0, ''),
(8, 8, 7, 3, 3, 'kamar-mandi-luar', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kost`
--

CREATE TABLE `kost` (
  `id_kost` int(11) NOT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `tipe_kost` varchar(255) NOT NULL,
  `jenis_kost` varchar(255) NOT NULL,
  `nama_pemilik` text NOT NULL,
  `nama_bank` text NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `foto_bangunan_utama` varchar(255) NOT NULL,
  `foto_kamar` varchar(255) NOT NULL,
  `foto_kamar_mandi` varchar(255) NOT NULL,
  `foto_interior` varchar(255) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kelurahan` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `fasilitas_kost` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kost`
--

INSERT INTO `kost` (`id_kost`, `nama_kost`, `tipe_kost`, `jenis_kost`, `nama_pemilik`, `nama_bank`, `no_rekening`, `foto_bangunan_utama`, `foto_kamar`, `foto_kamar_mandi`, `foto_interior`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `alamat`, `harga_sewa`, `kontak`, `deskripsi`, `id_pemilik`, `fasilitas_kost`) VALUES
(5, 'Omah Bens 2', 'perbulan', 'laki-laki', 'owner', 'bri', 3423424, 'img/uploads/IMG_67761.png', 'img/uploads/IMG_67761.png', 'img/uploads/IMG_42663.png', 'img/uploads/IMG_65019.png', 'Yogyakarta', 'Sleman', 'Depok', 'Catur tunggal', 'Seturan Yogyakarta', 500000, '081224429692', 'bebas jam malam', 0, 'Listrik, WiFi, Kamar Mandi, Tempat Parkir'),
(7, 'Valencia', 'perbulan', 'laki-laki', 'owner', 'bri', 3423424, 'img/uploads/IMG_78809.png', 'img/uploads/', 'img/uploads/', 'img/uploads/', 'Yogyakarta', 'Sleman', 'depok', 'condong catur', 'Condong catur', 500000, '081224429692', 'bebas jam malam', 0, 'Listrik, Kasur, WiFi, Kamar Mandi'),
(8, 'Kos hijau', 'perbulan', 'laki-laki', 'owner', 'bri', 3423424, 'img/uploads/IMG_67761.png', 'img/uploads/IMG_67761.png', 'img/uploads/thumbnail.jpg', 'img/uploads/IMG_42663.png', 'Yogyakarta', 'sleman', 'depok', 'babarsari', 'babarsari', 550000, '081224429692', 'bebas jam malam', 0, 'Listrik, Kasur, WiFi, Kamar Mandi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `notagihan` int(11) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `total_tagihan` int(25) NOT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `tanggal_tagihan` date NOT NULL,
  `bukti_bayar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`notagihan`, `namalengkap`, `total_tagihan`, `nama_kost`, `status`, `tanggal_tagihan`, `bukti_bayar`) VALUES
(462133, 'user', 1500000, 'Omah Bens 2', 'Lunas', '2024-06-18', 'bukti_bayar_667133466d7f9.pdf'),
(547728, 'user', 1500000, 'Valencia', 'Pending', '2024-06-18', 'bukti_bayar_66713ed6b4d8d.png'),
(562143, 'dimas guntara', 1650000, 'Kos hijau', 'Lunas', '2024-06-18', 'bukti_bayar_667157b4ad2e8.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `notagihan` int(11) NOT NULL,
  `namakost` varchar(100) NOT NULL,
  `hargasewa` int(25) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `tanggalkeluar` date DEFAULT NULL,
  `lamasewa` int(11) DEFAULT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `jeniskelamin` varchar(255) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `biayakos` decimal(10,2) DEFAULT NULL,
  `biayafasilitas` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`notagihan`, `namakost`, `hargasewa`, `alamat`, `tanggalmasuk`, `tanggalkeluar`, `lamasewa`, `namalengkap`, `jeniskelamin`, `nohp`, `pekerjaan`, `biayakos`, `biayafasilitas`) VALUES
(169025, 'Valencia', 1500000, 'Condong catur', '2024-06-18', NULL, 3, 'user', 'laki-laki', '081224429692', 'mahasiswa', NULL, NULL),
(462133, 'Omah Bens 2', 1500000, 'Seturan Yogyakarta', '2024-06-18', NULL, 3, 'user', 'laki-laki', '081224429692', 'mahasiswa', NULL, NULL),
(547728, 'Valencia', 1500000, 'Condong catur', '2024-06-18', NULL, 3, 'user', 'laki-laki', '081224429692', 'mahasiswa', NULL, NULL),
(562143, 'Kos hijau', 1650000, 'babarsari', '2024-06-18', NULL, 3, 'dimas guntara', 'laki-laki', '081224429692', 'mahasiswa', NULL, NULL),
(864843, 'Valencia', 1500000, 'Condong catur', '2024-06-18', NULL, 3, 'user', 'laki-laki', '081224429692', 'mahasiswa', NULL, NULL),
(986356, 'Valencia', 0, 'Condong catur', '2024-06-18', NULL, 0, 'user', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Confirm Password` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Pekerjaan` varchar(255) NOT NULL,
  `Foto KTP` varchar(255) NOT NULL,
  `JenisKelamin` varchar(255) NOT NULL,
  `Foto Profil` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `Nama`, `Email`, `Password`, `Confirm Password`, `NamaLengkap`, `Pekerjaan`, `Foto KTP`, `JenisKelamin`, `Foto Profil`, `role`) VALUES
(10, 'owner', 'owner@gmail.com', 'owner', 'owner', 'owner', 'pemilik kost', '../images/UserUserabout.jpg', 'laki-laki', '../images/UserUserabout.jpg', 'owner'),
(11, 'user', 'user@gmail.com', 'user', 'user', 'user', 'mahasiswa', '../images/UserUserabout.jpg', 'laki-laki', '../images/UserUserabout.jpg', 'user'),
(12, 'dimas', 'juniordimas656@gmail.com', 'dimas', 'dimas', 'dimas guntara', 'mahasiswa', '../images/UserIMG_78809.png', 'laki-laki', '../images/Userthumbnail.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD UNIQUE KEY `id_kamar` (`id_kamar`),
  ADD KEY `fk_kamar_kost` (`id_kost`);

--
-- Indeks untuk tabel `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`notagihan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`notagihan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kost`
--
ALTER TABLE `kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `notagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=918554;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `notagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=986357;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `fk_kamar_kost` FOREIGN KEY (`id_kost`) REFERENCES `kost` (`id_kost`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
