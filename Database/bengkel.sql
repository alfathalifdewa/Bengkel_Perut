-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 06:30 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `jk`, `email`, `no_hp`) VALUES
('admin', 'admin', 'Admin GansDut', '', 'admin1@gmail.com', '+6289217211');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `password`, `nama`, `jk`, `email`, `alamat`, `no_hp`) VALUES
('farid', 'farid', 'Farid Afif', 'Perempuan', 'tukangbubur@gmail.com', 'Boyong', '+628912731212'),
('ily', 'ily2523', 'Alfathalif Dewa', 'Laki-laki', 'alfathalifdewa@gmail.com', 'Bogor', '+62891722212'),
('rvlfbrn', 'rivalgans', 'Rival Febrian', 'Laki-laki', 'rivalgans@gmail.com', 'Jauh', '089638876892');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id_makanan` varchar(11) NOT NULL,
  `nama_makanan` varchar(60) NOT NULL,
  `harga` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `username`, `id_makanan`, `nama_makanan`, `harga`, `jumlah`, `subtotal`) VALUES
(1, 'farid', '12313', 'Sate Ayam Bumbu Kacang', 20000, 1, 20000),
(2, 'ily', '1232321', 'Ayam Geprek', 15000, 2, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_beli` varchar(11) NOT NULL,
  `tgl_beli` varchar(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `jasa_kirim` varchar(11) NOT NULL,
  `total_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `id_beli`, `tgl_beli`, `nama`, `no_hp`, `alamat`, `jasa_kirim`, `total_pesanan`) VALUES
(1, 'MKGUILJZXLK', '27-11-2019', 'Alfathalif Dewa', '+62891722212', 'Bogor', 'BPREG', 50000),
(2, '4KXZ0NGS4WI', '27-11-2019', 'Alfathalif Dewa', '+62891722212', 'Bogor', 'BPEXPRESS', 97000),
(5, 'EVZE9CQCR05', '27-11-2019', 'Farid Afif', '+628912731212', 'Boyong', 'BPEXPRESS', 1256000),
(6, 'U2QR7DV88AT', '29-11-2019', 'Alfathalif Dewa', '+62891722212', 'Bogor', 'BPEXPRESS', 38000),
(7, '8W1EWLKA6E1', '14-01-2020', 'Farid Afif', '08283232178', 'Bojong', 'BPEXPRESS', 44000),
(8, 'PEIWE43SNWI', '14-01-2020', 'Farid Afif', '+628912731212', 'Boyong', 'BPREG', 2006000),
(9, 'QGXRJYTRM8D', '22-01-2020', 'Farid Afif', '08913271222', 'Boyong', 'BPREG', 26000);

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` varchar(11) NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `harga`, `deskripsi`, `gambar`) VALUES
('123121', 'Nasi Goreng Spesial', 19000, 'Nasi Goreng Dengan Telur Mata Sapi Dan Ayam Kalkun', 'nasi_goreng.jfif'),
('12313', 'Sate Ayam Bumbu Kacang', 20000, '1 Porsi Berisi 15 Tusuk Sate,Sambal Dan Bumbu Kacang Yang Terpisah.', 'sate.jfif'),
('1232321', 'Ayam Geprek', 15000, 'Pedasnya Nikmat', 'ayam_geprek.jfif'),
('127772', 'Soto Mie Ayam', 21000, 'Kuah Soto,Kaldu,Mie,Risol,Ayam,Tomat', 'soto.jfif'),
('14588', 'Kepiting Saus Pedas', 25000, 'Kepiting Hasil Tangkapan Nelayan Dalam Negeri', 'kepiting_saus_pdng.jfif'),
('1930199', 'Ikan Bakar Lalapan', 13000, 'Cocok Untuk Makanan Keluarga', 'ikan_bakar.jfif'),
('2312', 'Indomie Rebus', 5000, 'Teman Keluarga', 'mie_rebus.jfif'),
('313211', 'Mujair Panggang Madu', 24000, 'Ikan Mujair Bakar Yang Dibumbui Dengan Madu Murni', 'mujaer1.jpg'),
('321111', 'Bebek Goreng Madura', 19000, 'Bebek Goreng Khas Madura', 'picture-1483498746.jpg'),
('32123121', 'Nasi Pecel Peyek Kacang', 13000, 'Pecel + Peyek Ikan Teri', 'pecel.jpg'),
('4323423', 'Soto Ayam', 10000, 'DSaad', 'soto.jpg'),
('4422321', 'Kangkung Saus Tiram(Saori)', 10000, 'Saori Saos Tiram', 'kangkung_saori.jpg'),
('9031281', 'Mie Ayam Goreng', 8000, 'Mie Burung Dara.... Enaknya Nyambung Terus', 'mie_goreng.jfif'),
('90320', 'Kwetiaw Goreng', 13000, 'Kwetiaw Goreng', 'kwetiau.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_beli` varchar(11) NOT NULL,
  `id_makanan` varchar(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_beli`, `id_makanan`, `harga`, `jumlah`, `subtotal`) VALUES
(47, 'MKGUILJZXLK', '123121', 19000, 1, 19000),
(48, 'MKGUILJZXLK', '14588', 25000, 1, 25000),
(49, '4KXZ0NGS4WI', '12313', 20000, 3, 60000),
(50, '4KXZ0NGS4WI', '1930199', 13000, 1, 13000),
(51, '4KXZ0NGS4WI', '2312', 5000, 1, 5000),
(52, '4KXZ0NGS4WI', '90320', 13000, 1, 13000),
(56, 'EVZE9CQCR05', '14588', 25000, 50, 1250000),
(57, 'U2QR7DV88AT', '123121', 19000, 1, 19000),
(58, 'U2QR7DV88AT', '32123121', 13000, 1, 13000),
(59, '8W1EWLKA6E1', '123121', 19000, 2, 38000),
(60, 'PEIWE43SNWI', '12313', 20000, 100, 2000000),
(61, 'QGXRJYTRM8D', '12313', 20000, 1, 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
