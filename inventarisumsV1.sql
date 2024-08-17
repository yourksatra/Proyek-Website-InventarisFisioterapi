-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 01:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farahtest`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `loan` (IN `nama` VARCHAR(100), IN `nim` VARCHAR(15), IN `mk` TEXT, IN `dosen` VARCHAR(100), IN `ruangan` TEXT, IN `tgl` DATE, IN `jam` TIME, IN `kdalat` VARCHAR(5), IN `jmlh` INT(11), IN `telpon` VARCHAR(15), IN `btsWaktu` TIME)   BEGIN
declare kodebaru char(8);
select auto_loan() into kodebaru;
insert into peminjaman values (kodebaru,nama,telpon,nim,mk,dosen,ruangan,tgl,jam, btsWaktu);
insert into alat_terpinjam values (kodebaru, kdalat,jmlh);
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `auto_loan` () RETURNS CHAR(8) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
declare terakhir int;
declare baru char(8);
select ifnull(max(right(kd_pinjam,5)),0) into terakhir from peminjaman;
set baru =concat('INV',right(concat('0000',
cast(terakhir+1 as varchar(8))),8));
return baru;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `alat_terpinjam`
--

CREATE TABLE `alat_terpinjam` (
  `id_pinjam` varchar(8) NOT NULL,
  `id_alat` varchar(5) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `alat_terpinjam`
--
DELIMITER $$
CREATE TRIGGER `stok_alat` AFTER INSERT ON `alat_terpinjam` FOR EACH ROW BEGIN
	UPDATE data_alat SET jmlh_alat=jmlh_alat-NEW.jumlah_pinjam WHERE kd_alat = NEW.id_alat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER DELETE ON `alat_terpinjam` FOR EACH ROW BEGIN
	UPDATE data_alat SET jmlh_alat=jmlh_alat+OLD.jumlah_pinjam WHERE kd_alat = OLD.id_alat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `daftaralat`
-- (See below for the actual view)
--
CREATE TABLE `daftaralat` (
`alat` varchar(100)
,`merk` varchar(100)
,`thn_pembelian` varchar(4)
,`stok` int(11)
,`lokasi` text
,`fungsi` text
,`kondisi` text
);

-- --------------------------------------------------------

--
-- Table structure for table `data_alat`
--

CREATE TABLE `data_alat` (
  `kd_alat` varchar(5) NOT NULL,
  `alat` varchar(100) NOT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `thn_pembelian` varchar(4) NOT NULL,
  `jmlh_alat` int(11) NOT NULL,
  `lokasi` text NOT NULL,
  `kd_kondisi` varchar(1) NOT NULL,
  `kd_fungsi` varchar(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_alat`
--

INSERT INTO `data_alat` (`kd_alat`, `alat`, `merk`, `thn_pembelian`, `jmlh_alat`, `lokasi`, `kd_kondisi`, `kd_fungsi`, `status`) VALUES
('A0001', 'SWD', 'Enraf ', '2002', 1, 'Klinik ', '1', 'I', 0),
('A0002', 'TENS', 'Dyanatron', '2002', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0003', 'Parafin Bath', 'Enraff ', '2002', 1, ' Laboratorium Lantai 4', '1', 'I', 0),
('A0004', 'SWD', 'Cosmogama', '2005', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0005', 'TENS', ' Endomed 582 ', '2005', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0006', 'Ultrasound', ' Ultax ', '2005', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0007', 'Ultrasound', 'Dr. Morthon', '2005', 1, ' Laboratorium Lantai 4', '0', 'I', 0),
('A0008', 'Ultrasound', 'D2 ditter', '2005', 1, ' Laboratorium Lantai 4', '0', 'I', 0),
('A0009', 'Ultrasound', 'Liven', '2005', 1, ' Laboratorium Lantai 4', '1', 'I', 0),
('A0010', 'UltraViolet', 'Enraff Endolamp 474', '2005', 1, ' Laboratorium Lantai 4', '3', 'I', 0),
('A0011', 'Laser', 'Enraff Endolaser 476 ', '2005', 1, ' Laboratorium Lantai 4', '1', 'I', 0),
('A0012', 'Spirometri Kuning', '220', '2008', 1, ' Laboratorium Lantai 3', '1', 'A', 0),
('A0013', 'Spirometri biru', 'My Life JYDF 2 ', '2008', 1, ' Laboratorium Lantai 3', '1', 'A', 0),
('A0014', 'KWD', '-', '2008', 1, ' Laboratorium Lantai 4', '0', 'I', 0),
('A0015', 'High Vitalion ', '-', '2010', 1, ' Laboratorium Lantai 4', '1', 'I', 0),
('A0016', 'Sorisa Aesthetic', 'MC 01', '2010', 1, ' Laboratorium Lantai 4', '1', 'I', 0),
('A0017', 'IPL Aesthetic', 'Spektra Light ', '2010', 1, ' Laboratorium Lantai 4', '0', 'I', 0),
('A0018', 'Laser Aesthetic', 'ND Yag', '2010', 1, ' Laboratorium Lantai 4', '0', 'I', 0),
('A0019', 'US butterfly Aesthetic ', '-', '2010', 1, ' Laboratorium Lantai 4', '1', 'I', 0),
('A0020', 'Beauty Master', 'Beauty Master', '2010', 1, ' Laboratorium Lantai 4', '1', 'I', 0),
('A0021', 'ES', '-', '2010', 1, ' Laboratorium Lantai 4', '1', 'I', 0),
('A0022', 'Duo peel', '-', '2010', 1, ' Laboratorium Lantai 4', '1', 'I', 0),
('A0023', 'Cold Magnifying Lamp', '-', '2010', 1, ' Laboratorium Lantai 4', '1', 'I', 0),
('A0024', 'Steamer Wajah vapour Ozone', 'Takeda 777', '2010', 1, ' Laboratorium Lantai 4', '1', 'I', 0),
('A0025', 'Static Cycle', '-', '2010', 1, 'Gymna', '0', 'I', 0),
('A0026', 'Standing Frame ', '-', '2010', 0, 'Gymna', '1', 'A', 0),
('A0027', 'Papan Keseimbangan', '-', '2010', 1, 'Gymna', '1', 'A', 0),
('A0028', 'Traksi', 'Chatanoga ', '2010', 1, 'Gymna', '0', 'I', 0),
('A0029', 'Hand Grip', '-', '2012', 1, ' Laboratorium Lantai 4', '1', 'A', 0),
('A0030', 'leg Dinamometer', '-', '2012', 1, ' Laboratorium Lantai 4', '1', 'A', 0),
('A0031', 'EKG', 'My Life ME 801 A', '2012', 1, ' Laboratorium Lantai 3', '1', 'A', 0),
('A0032', 'EMG', 'Noraxon', '2015', 1, 'Kantor', '1', 'A', 0),
('A0033', 'Nebulizer', 'Comfort 2990 T', '2015', 1, 'Laboratorium Lantai 3', '1', 'I', 0),
('A0034', 'TENS ', 'Chatanoga', '2016', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0035', 'Infra Red Duduk', 'Infra Phil', '2017', 2, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0036', 'Infra Red Standing', 'Corona', '2017', 2, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0037', 'Infra Red Standing Kumparan', 'Lokal', '2017', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0038', 'MWD', 'Good PL 800M', '2017', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0039', 'TENS Combo US', 'Gymna', '2017', 2, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0040', 'TreadMill', '-', '2017', 1, 'Gymna', '1', 'X', 0),
('A0041', 'Alat Fitness', '-', '2017', 1, 'Gymna', '0', 'X', 0),
('A0042', 'SWD', 'BTL', '2018', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0043', 'TENS', 'BTL', '2018', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0044', 'Parafin Bath', 'BTL', '2018', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0045', 'Nebulizer', 'Omron', '2018', 1, 'Laboratorium Lantai 3', '1', 'I', 0),
('A0046', 'Barbel', 'Kattler', '2018', 2, 'Laboratorium Lantai 3', '1', 'A', 0),
('A0047', 'Bola Bobath', 'Kettler', '2018', 1, 'Klinik', '1', 'A', 0),
('A0048', 'Bola Bobath', 'Kettler', '2018', 1, 'Gymna', '0', 'A', 0),
('A0049', 'Bosu Ball', 'Kettler', '2018', 1, 'Klinik', '1', 'A', 0),
('A0050', 'Quadriceps Bench', '-', '2018', 1, 'Gymna', '0', 'X', 0),
('A0051', 'Kursi Roda', 'Sella', '2018', 2, 'Gymna', '0', 'Y', 0),
('A0052', 'Kruk', '-', '2018', 4, '-', '2', 'X', 0),
('A0053', 'Parafin Bath', 'Beuer', '2019', 2, 'Laboratorium Lantai 4 dan Klinik', '1', 'I', 0),
('A0054', 'Manekin Rangka', 'Hong Lian', '2020', 2, 'Laboratorium Lantai 4', '0', 'A', 0),
('A0055', 'Manekin Rangka', 'Hong Lian', '2020', 1, 'Laboratorium Lantai 4', '1', 'A', 0),
('A0056', 'Manekin Kulit', 'Hong Lian', '2020', 1, 'Kantor', '1', 'A', 0),
('A0057', 'RJP', '-', '2020', 1, 'Laboratorium Lantai 3', '1', 'A', 0),
('A0058', 'Manekin Paru', 'Dr. Medicine', '2020', 1, 'Laboratorium Lantai 3', '1', 'A', 0),
('A0059', 'Manekin Payudara', 'Dr. Medicine', '2020', 1, 'Laboratorium Lantai 3', '1', 'A', 0),
('A0060', 'Manekin Alat Kelamin Wanita', 'Dr. Medicine', '2020', 1, 'Laboratorium Lantai 3', '1', 'A', 0),
('A0061', 'Manekin Alat Kelamin Pria', 'Dr. Medicine', '2020', 1, 'Laboratorium Lantai 3', '1', 'A', 0),
('A0062', 'Manekin Otot', 'Dr. Medicine', '2020', 1, 'Laboratorium Lantai 3', '1', 'A', 0),
('A0063', 'Manekin Paru & Jantung', 'Dr. Medicine', '2020', 1, 'Laboratorium Lantai 3', '1', 'A', 0),
('A0064', 'Human Anatomy', 'Dr. Medicine', '2020', 1, 'Laboratorium Lantai 3', '1', 'A', 0),
('A0065', 'Baby Pediatri', '-', '2020', 3, 'Kantor', '1', 'X', 0),
('A0066', 'SWD', 'Fisio Med', '2021', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0067', 'EKG Combo Spirometri', 'BTL', '2021', 1, 'Laboratorium Lantai 3', '1', 'A', 0),
('A0068', 'Saturasi Oksigen', 'Beuer', '2021', 1, 'Laboratorium Lantai 3', '1', 'A', 0),
('A0069', 'Tensimeter Manual', '-', '-', 10, '-', '1', 'A', 0),
('A0070', 'Tensimeter Digital', '-', '-', 1, '-', '1', 'A', 0),
('A0071', 'Stetoskop', '-', '-', 10, '-', '1', 'A', 0),
('A0072', 'Bed Periksa', '-', '-', 5, 'Laboratorium 3.11, Laboratorium 4.12, Laboratorium 3.10, Klinik, Gymna ', '1', 'A', 0),
('A0073', 'Matras', '-', '-', 3, 'Gymna ', '1', 'A', 0),
('A0074', 'Bed Praktek', 'Lokal Jati', '-', 28, 'Laboratorium 3.11 , Laboratorium 4.12, Laboratorium 3.10, Klinik, Gymna ', '1', 'A', 0),
('A0075', 'Dolphin Massage', '-', '-', 1, 'Laboratorium Lantai 4', '1', 'I', 0),
('A0076', 'Stool', '-', '-', 30, 'Laboratorium Lantai 4', '1', 'Y', 0),
('A0077', 'Stool', '-', '-', 15, 'Laboratorium Lantai 3', '1', 'Y', 0),
('A0078', 'Guling Boobath', '-', '-', 1, 'Laboratorium Lantai 3', '1', 'Y', 0),
('A0079', 'Kursi stainles', '-', '-', 100, 'Laboratorium Lantai 3 & Lantai 4 ', '1', 'Y', 0),
('A0080', 'Kompor Elektrik', '-', '-', 0, 'Laboratorium Lantai 4 ', '0', 'Y', 0),
('A0081', 'Panci', '-', '-', 0, 'Laboratorium Lantai 4 ', '0', 'Y', 0),
('A0082', 'Kulkas', 'Samsung', '-', 1, 'Laboratorium Lantai 4 ', '1', 'Y', 0),
('A0083', 'Almari Tv', '-', '-', 1, 'Laboratorium Lantai 4 ', '1', 'Y', 0),
('A0084', 'Rak Jemur', '-', '-', 1, 'Laboratorium Lantai 4 ', '1', 'Y', 0),
('A0085', 'Guling Praktek', '-', '2023', 24, '-', '1', 'Y', 0),
('A0086', 'Bantal Praktek ', '-', '2023', 24, '-', '1', 'Y', 0),
('A0087', 'Penlight', 'Puremed 111', '2023', 2, 'Laboratorium 3.11', '1', 'Y', 0),
('A0088', 'Penlight', 'Puremed 111', '2023', 1, 'Laboratorium 4.12', '1', 'Y', 0),
('A0089', 'Snellen Chart', '-', '2023', 2, 'Laboratorium 4.12', '1', 'Y', 0),
('A0090', 'Snellen Chart', '-', '2023', 1, 'Laboratorium 3.11', '1', 'Y', 0),
('A0091', 'Timbangan Berat badan', '-', '2023', 1, 'Laboratorium 3.11', '1', 'Y', 0),
('A0092', 'Timbangan Berat badan', '-', '2023', 1, 'Laboratorium 3.10', '1', 'Y', 0),
('A0093', 'Timbangan Berat badan', '-', '2023', 1, 'Laboratorium 4.12', '1', 'Y', 0),
('A0094', 'Timbangan Berat badan', '-', '2023', 1, 'Laboratorium 4.7', '1', 'Y', 0),
('A0095', 'Timbangan Berat badan', '-', '2023', 1, 'Gymna', '1', 'Y', 0),
('A0096', 'Timbangan Berat badan', '-', '2023', 1, 'Klinik', '1', 'Y', 0),
('A0097', 'Timbangan Berat badan', '-', '2023', 0, 'Inventaris', '1', 'Y', 0),
('A0098', 'Cone', '-', '2023', 5, ' Laboratorium 4.12', '1', 'Y', 0),
('A0099', 'Spring Grips 4.5 mm', 'Kettler', '2023', 1, ' Laboratorium 3.11', '1', 'Y', 0),
('A0100', 'Adjustable Spring Grip', 'Kettler', '2023', 1, ' Laboratorium 3.11', '1', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_alat`
--

CREATE TABLE `f_alat` (
  `kd_fungsi` varchar(1) NOT NULL,
  `fungsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_alat`
--

INSERT INTO `f_alat` (`kd_fungsi`, `fungsi`) VALUES
('A', 'ASSESSMENT'),
('I', 'INTERVENSI'),
('X', 'ASSESSMENT & INTERVENSI'),
('Y', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_alat`
--

CREATE TABLE `kondisi_alat` (
  `kd_kondisi` varchar(1) NOT NULL,
  `kondisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kondisi_alat`
--

INSERT INTO `kondisi_alat` (`kd_kondisi`, `kondisi`) VALUES
('0', 'Rusak'),
('1', 'Berfungsi'),
('2', '-'),
('3', 'Berfungsi (Tidak Bisa Dikalibrasi)');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kd_pinjam` varchar(8) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Telpon` varchar(15) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `matakuliah` text NOT NULL,
  `dosen` varchar(100) NOT NULL,
  `ruangan` text NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `jam_peminjaman` time NOT NULL,
  `jam_pengembalian` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `kd_pinjam` varchar(8) NOT NULL,
  `alat` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampilpeminjaman`
-- (See below for the actual view)
--
CREATE TABLE `tampilpeminjaman` (
`kd_pinjam` varchar(8)
,`Nama` varchar(100)
,`Telpon` varchar(15)
,`nim` varchar(15)
,`matakuliah` text
,`dosen` varchar(100)
,`ruangan` text
,`tgl_pinjam` date
,`jam_peminjaman` time
,`jam_pengembalian` time
,`alat` varchar(100)
,`merk` varchar(100)
,`jumlah_pinjam` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sop`
--

CREATE TABLE `tb_sop` (
  `id_sop` varchar(5) NOT NULL,
  `alat` varchar(100) NOT NULL,
  `sop` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sop`
--

INSERT INTO `tb_sop` (`id_sop`, `alat`, `sop`) VALUES
('BED', 'BED PASIEN ELEKTRIK', '1. Tancapkan steker bed elektrik pada Stop Kontak.<br>2. Pencet tombol ON pada bed elektrik.<br>3. Sesuaikan tinggi bed dengan tinggi terapis dengan menekan tombol naik pada remote.<br>4. Sesuaikan bagian kepala bed dengan menarik tuas gaspring keatas.<br>5. Sesuaikan bagian kaki bed dengan menekan tombol pada remote.<br>6. Apabila bed sudah tidak digunakan matikan bed dan cabut steker.\r\n'),
('GYM', 'HOME GYM 4 SISI', '1. Posisi pasien duduk tegak pada sisi gym yang dibutuhkan.<br>2. Atur beban pada alat gym sesuai dengan kebutuhan.<br>3. Arahkan pasien untuk menarik tuas pada sisi yang diinginkan.<br>4. Usahakan posisi duduk pasien tetap tegak.<br>5. Lakukan pengulangan sesuai dengan keburuhan pasien.<br>6. Kembalikan beban pada asalnya.\r\n'),
('IR', 'INFRA RED', '1. Hubungkan Kabel dengan Steker<br>2. Hidupkan alat.<br>3. Atur waktu durasi 5-15menit (tergantung kondisi pasien).<br>4. Setelah 5 menit cek apakah ada keringat, bila ada di lap dengan tissue atau handuk.<br>5. Menanyakan pada pasien apakah ada keluhan subyektif (pusing,terlalu panas,mual).<br>6. Setelah selesai cabut kabel dari steker\r\n'),
('KRO', 'KURSI RODA', '1. Kunci kursi roda dengan menggerakkan.<br> panel kunci yang ada pada roda kedua kursi roda.<br>2. Dudukkan pasien dengan posisi bersandar.<br>3. Naikkan kaki pasien pada alas kaki kursi roda.<br>4. Buka kunci pengait.<br>5. Dorong kursi roda tersebut\r\n'),
('KRUK', 'KRUK', '1. Ambil salah satu ataupun sepasang kruk.<br>2. Posisi pasien berdiri.<br>3. Tempatkan bantalan kruk pada bagian bawah ketiak.<br>4. Langkahkan kaki yang sakit bersamaan dengan salah satu kruk yang bersebrangan dengan kaki yang sakit.<br>5. Ulangi langkah nomer 4 untuk kaki yang sehat, begitu seterusnya.<br>6. Kembalikan kruk ketempat semula\r\n'),
('MWD', 'MICROWAVE DIATHERMY', '1. Hubungkan kabel dengan steker<br>2. Nyalakan alat MWD.<br>3. Pre pemanasan alat 5-10 menit.<br>4. Fisioterapis melakukan cek alat apakah sudah terasa hangat.<br>5. Tempat nyaman dan rileks.<br>6. Area terapi bebas dari pakaian, implant metallic, pacemaker.<br>7. Jarak electrode ke pasien 5-10  cm.<br>8. Atur durasi 10-15 menit & spacing 5-10 cm.<br>9. Intensitas: sesuai toleransi pasien.<br>10. Menjelaskan pada pasien yang akan di rasakan pasien (hangat).<br>11. Setelah selesai jauhkan alat.<br>12. Matikan alat dan bereskan.\r\n'),
('NB', 'NEBULIZER', '1. Hubungkan kabel dengan steker<br>2. Petugas menempatkan alat.<br>3. Isi nebulizer dengan aquades sesuai takaran.<br>4. Pastikan alat dapat berfungsi dengan baik.<br>5. Masukkan obat sesuai dosis.<br>6. Pasang masker pada pasien.<br>7. Hidupkan nebulizer dan minta pasien nafas dalam.<br>8. Matikan nebulizer setelah cairan habis.\r\n'),
('PK', 'PAPAN KESEIMBANGAN', '1. Posisikan pasien duduk diatas papan keseimbangan secara tegak.<br>2. Kedua kaki pasien menapak pada lantai.<br>3.Posisi terapis dibelakang pasien dengan menjaga anak tetap duduk dengan tegak.<br>4. Terapis menggerakkan papan keseimbangan kekanan dan kekiri.<br>5. Anak diminta menjaga keseimbangan agar tidak jatuh.<br>6. Gerakan diulang sesuai dengan kebutuhan pasien.<br>7. Apabila sudah selesai kembalikan peralatan pada posisi semula.\r\n'),
('QB', 'QUADRICEPS BENCH', '1. Posisikan pasien duduk tegak pada quadriceps bench, bila kurang memungkinkan tempat duduk dapat diatur sedemikian rupa.<br>2. Posisikan tangan pasien pada peganagn quadriceps bench.<br>3. Atur beban yang sesuai dengan kebutuhan pasien.<br>4. Instruksikan kaki pasien yang sakit untuk berada dibelakang bantalan pegangan beban.<br>5. Minta pasien untuk menggerakkan kaki yang sakit lurus dan tekuk .<br>6. Lakukan pengulangan sesuai dengan dosisi pasien.<br>7. Kembalikan peralatan seperti semula.'),
('SWD', 'SHORT WAVE DIATHERMY', '1. Memasang kabel pada steker<br>2. Hidupkan alat.<br>3. Petugas Fisioterapi memasang electrode yang sesuai.<br>4. Petugas Fisioterapi mengecek alat apakah terasa hangat (pre pemanasan 5-10 menit).<br>5. Petugas Fisioterapi mengecek arus dengan lampu neon (sudah masuk/belum).<br>6. Petugas Fisioterapi memeriksa pasien dalam kondisi nyaman dan rilek di tempat tidur.<br>7. Petugas Fisioterapi memastikan area terapi bebas dari pakaian, implant metallic, pacemaker.<br>8. Petugas Fisioterapi memberikan alas handuk pada area yang akan dipasang electrode.<br>9. Petugas Fisioterapi mengatur durasi selama 10-15 menit dan spacing antar electrode 5-10 cm.<br>10. Apabila sudah selesai matikan alat\r\n'),
('TRB', 'TRAKSI BED', '1. Tancapkan steker alat treadmill pada stop kontak.<br>2. Hidupkan bed traksi dengan menekan tombol ON/OFF dibagian depan mesin.<br>3. Posisikan pasien tidur terlentang dengan posisi kaki ditekuk pada penyangga.<br>4. Ikatkan tali pengaman pada area yang ingin dilakukan traksi.<br>5. Kaitkan tali pengaman dengan tali yang ada pada mesin traksi.<br>6. Atur penggunaan traksi meliputi tarikan, release tali, waktu pemakaian.<br>7. Apabila keadaan darurat pasien dapat menekan tombol darurat pada bagian traksi.<br>8. Setelah selesai digunakan, tekan tombol stop kemudian matikan traksi.<br>9. Cabut steker dari stop kontak.\r\n'),
('TRD', 'TREADMILL', '1. Tancapkan steker alat treadmill pada stop kontak.<br>2. Hidupkan treadmill dengan menekan tombol ON/OFF dibagian depan mesin.<br>3. Posisikan pasien berdiri diatas lintasan treadmill dengan berpegangan pada pegangan treadmill.<br>4. Tekan tombol strart pada treadmill.<br>5. Atur kecepatan sesuai dengan kebutuhan pasien.<br>6. Apabila keadaan darurat pasien dapat menekan tombol darurat berwarna merah yang ada pada treadmill.<br>7. Setelah selesai digunakan, tekan tombol stop kemudian matikan treadmill.<br>8. Cabut steker dari stop kontak.\r\n'),
('TRI', 'TRIPOT', '1. Ambil tripot.<br>2. Posisi pasien berdiri.<br>3. Tempatkan tripot pada sisi yang sehat.<br>4. Genggam pegangan pada tripot.<br>5. Langkahkan kaki yang sakit bersamaan dengan tripot.<br>6. Setelah itu langkahkan kaki yang sehat.<br>7. Ulangi gerakan tersebut pada saat berjalan.<br>8. Kembalikan tripot apabila selesai digunakan\r\n'),
('TTB', 'TILTING TABLE', '1. Posisikan pasien tidur terlentang dengan posisi kaki lurus.<br>2. Ikatkan tali pengaman pada bagian kaki, perut dan badan pasien.<br>3. Secara perlahan gerakkan bed tilting sampai pada posisi berdiri tegak.<br>4. Kunci bed tilting supaya tidak kembali pada posisi tidur.<br>5. Berikan batas waktu sesuai dengan kebutuhan pasien.<br>6. Apabila sudah selesai digunakan, lepas ikatan pada pasien dan kembalikan bed tilting pada posisi tidur.\r\n'),
('WALKR', 'WALKER', '1. Ambil Walker.<br>2. Posisi pasien duduk dan walker berada didepan pasien.<br>3. Pasien berada ditengah walker.<br>4. Genggam pegangan pada walker.<br>5. Berdirikan pasien dengan cara pasien menggenggam walker kemudian berdiri.<br>6. Angkat walker dan langkahkan kaki yang sakit bersamaan dengan jatuhnya walker ketanah.<br>7. Setelah itu langkahkan kaki yang sehat.<br>8. Ulangi gerakan tersebut pada saat berjalan.<br>9. Kembalikan walker apabila selesai digunakan\r\n');

-- --------------------------------------------------------

--
-- Structure for view `daftaralat`
--
DROP TABLE IF EXISTS `daftaralat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftaralat`  AS SELECT `d`.`alat` AS `alat`, `d`.`merk` AS `merk`, `d`.`thn_pembelian` AS `thn_pembelian`, `d`.`jmlh_alat` AS `stok`, `d`.`lokasi` AS `lokasi`, `f`.`fungsi` AS `fungsi`, `k`.`kondisi` AS `kondisi` FROM ((`data_alat` `d` join `f_alat` `f` on(`d`.`kd_fungsi` = `f`.`kd_fungsi`)) join `kondisi_alat` `k` on(`d`.`kd_kondisi` = `k`.`kd_kondisi`)) ;

-- --------------------------------------------------------

--
-- Structure for view `tampilpeminjaman`
--
DROP TABLE IF EXISTS `tampilpeminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampilpeminjaman`  AS SELECT `n`.`kd_pinjam` AS `kd_pinjam`, `n`.`Nama` AS `Nama`, `n`.`Telpon` AS `Telpon`, `n`.`nim` AS `nim`, `n`.`matakuliah` AS `matakuliah`, `n`.`dosen` AS `dosen`, `n`.`ruangan` AS `ruangan`, `n`.`tgl_pinjam` AS `tgl_pinjam`, `n`.`jam_peminjaman` AS `jam_peminjaman`, `n`.`jam_pengembalian` AS `jam_pengembalian`, `d`.`alat` AS `alat`, `d`.`merk` AS `merk`, `i`.`jumlah_pinjam` AS `jumlah_pinjam` FROM ((`peminjaman` `n` join `alat_terpinjam` `i` on(`n`.`kd_pinjam` = `i`.`id_pinjam`)) join `data_alat` `d` on(`i`.`id_alat` = `d`.`kd_alat`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_terpinjam`
--
ALTER TABLE `alat_terpinjam`
  ADD KEY `id_pinjam` (`id_pinjam`),
  ADD KEY `id_alat` (`id_alat`);

--
-- Indexes for table `data_alat`
--
ALTER TABLE `data_alat`
  ADD PRIMARY KEY (`kd_alat`),
  ADD KEY `kd_kondisi` (`kd_kondisi`),
  ADD KEY `kd_fungsi` (`kd_fungsi`);

--
-- Indexes for table `f_alat`
--
ALTER TABLE `f_alat`
  ADD PRIMARY KEY (`kd_fungsi`);

--
-- Indexes for table `kondisi_alat`
--
ALTER TABLE `kondisi_alat`
  ADD PRIMARY KEY (`kd_kondisi`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kd_pinjam`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD KEY `kd_pinjam` (`kd_pinjam`);

--
-- Indexes for table `tb_sop`
--
ALTER TABLE `tb_sop`
  ADD PRIMARY KEY (`id_sop`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alat_terpinjam`
--
ALTER TABLE `alat_terpinjam`
  ADD CONSTRAINT `alat_terpinjam_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`kd_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alat_terpinjam_ibfk_2` FOREIGN KEY (`id_alat`) REFERENCES `data_alat` (`kd_alat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_alat`
--
ALTER TABLE `data_alat`
  ADD CONSTRAINT `data_alat_ibfk_1` FOREIGN KEY (`kd_fungsi`) REFERENCES `f_alat` (`kd_fungsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_alat_ibfk_2` FOREIGN KEY (`kd_kondisi`) REFERENCES `kondisi_alat` (`kd_kondisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`kd_pinjam`) REFERENCES `peminjaman` (`kd_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
