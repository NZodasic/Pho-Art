-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 07:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `id_ctdonhang` int(11) NOT NULL,
  `madathang` varchar(50) NOT NULL,
  `makh` varchar(100) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `soluong` tinyint(4) DEFAULT NULL,
  `giamgia` int(11) DEFAULT NULL,
  `giatien` int(11) DEFAULT NULL,
  `tongtien` int(11) DEFAULT NULL,
  `trangthai` varchar(100) NOT NULL,
  `ngaydat` datetime DEFAULT current_timestamp(),
  `id_dathang` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`id_ctdonhang`, `madathang`, `makh`, `id_sanpham`, `tensp`, `soluong`, `giamgia`, `giatien`, `tongtien`, `trangthai`, `ngaydat`, `id_dathang`, `id_kh`) VALUES
(0, 'MDH131', 'MAKH131', 10, 'Ống Tiêm Đút Thuốc Thú Cưng 1', 1, NULL, 20000, 20000, 'đang xử lý', '2023-11-05 21:02:44', 0, 0),
(0, 'MDH16', 'MAKH16', 10, 'Ống Tiêm Đút Thuốc Thú Cưng 1', 2, NULL, 40000, 40000, 'giao thành công', '2023-04-03 13:46:06', 0, 0),
(0, 'MDH21', 'MAKH21', 7, 'Soup Whiskas Vị Cá Biển – 85gr', 1, NULL, 13000, 13000, 'giao thành công', '2023-04-03 15:46:10', 0, 0),
(0, 'MDH253', 'MAKH253', 25, 'Balo phi hành gia', 1, NULL, 50000, 50000, 'đang xử lý', '2023-04-03 13:51:53', 0, 0),
(0, 'MDH350', 'MAKH350', 1, 'Thức Ăn Cho Chó Trưởng Thành Giống Lớn – Eminent Adult Large Breed – 500g', 3, NULL, 216000, 255000, 'đang xử lý', '2023-04-28 08:23:20', 0, 0),
(0, 'MDH350', 'MAKH350', 7, 'Soup Whiskas Vị Cá Biển – 85gr', 3, NULL, 39000, 255000, 'đang xử lý', '2023-04-28 08:23:20', 0, 0),
(0, 'MDH411', 'MAKH411', 7, 'Soup Whiskas Vị Cá Biển – 85gr', 2, NULL, 26000, 26000, 'đang xử lý', '2023-11-27 10:10:38', 0, 0),
(0, 'MDH457', 'MAKH457', 7, 'Soup Whiskas Vị Cá Biển – 85gr', 1, NULL, 13000, 1063000, 'giao thành công', '2023-04-28 08:27:59', 0, 0),
(0, 'MDH457', 'MAKH457', 40, 'Ba Lô Phi Thuyền Nhiều Màu Sắc', 3, NULL, 1050000, 1063000, 'giao thành công', '2023-04-28 08:27:59', 0, 0),
(0, 'MDH617', 'MAKH617', 1, 'Thức Ăn Cho Chó Trưởng Thành Giống Lớn – Eminent Adult Large Breed – 400g', 1, NULL, 62000, 62000, 'đang xử lý', '2023-12-25 22:45:14', 0, 0),
(0, 'MDH749', 'MAKH749', 6, 'Bánh Gặm Cho Chó – Smoked Beefy Dental Bone -14g', 1, NULL, 12000, 12000, 'đang xử lý', '2023-04-22 14:36:29', 0, 0),
(0, 'MDH762', 'MAKH762', 3, 'Soup Cho Chó Pedigree Vị Gan Nướng 130gr', 7, NULL, 126000, 126000, 'đang xử lý', '2023-10-17 10:04:25', 0, 0),
(0, 'MDH954', 'MAKH954', 7, 'Soup Whiskas Vị Cá Biển – 85gr', 1, NULL, 13000, 13000, 'đang xử lý', '2023-05-21 22:09:23', 0, 0),
(0, 'MDH970', 'MAKH970', 6, 'Bánh Gặm Cho Chó – Smoked Beefy Dental Bone -14g', 1, NULL, 12000, 38000, 'đã xử lý', '2023-04-03 13:40:15', 0, 0),
(0, 'MDH970', 'MAKH970', 7, 'Soup Whiskas Vị Cá Biển – 85gr', 2, NULL, 26000, 38000, 'đã xử lý', '2023-04-03 13:40:15', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dangki`
--

CREATE TABLE `dangki` (
  `id_dangki` int(11) NOT NULL,
  `hoten` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `matkhau` varchar(100) DEFAULT NULL,
  `id_phanquyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dangki`
--

INSERT INTO `dangki` (`id_dangki`, `hoten`, `email`, `matkhau`, `id_phanquyen`) VALUES
(1, 'admin', '', 'ff9830c42660c1dd1942844f8069b74a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten_danhmuc`) VALUES
(1, 'sản phẩm cho chó'),
(2, 'sản phẩm cho mèo'),
(3, 'tất cả sản phẩm'),
(4, 'con giống'),
(5, 'nổi bật');

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `id_dathang` int(11) NOT NULL,
  `madathang` varchar(50) NOT NULL,
  `makh` varchar(100) NOT NULL,
  `trangthai` varchar(100) DEFAULT NULL,
  `tongtien` int(11) NOT NULL,
  `ngaydathang` datetime DEFAULT current_timestamp(),
  `giaohang` varchar(10) NOT NULL,
  `id_kh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`id_dathang`, `madathang`, `makh`, `trangthai`, `tongtien`, `ngaydathang`, `giaohang`, `id_kh`) VALUES
(0, 'MDH131', 'MAKH131', 'đang xử lý', 20000, '2023-11-05 21:02:44', 'COD', 0),
(0, 'MDH16', 'MAKH16', 'giao thành công', 40000, '2023-04-03 13:46:06', 'COD', 0),
(0, 'MDH21', 'MAKH21', 'giao thành công', 13000, '2023-04-03 15:46:10', 'MOMO', 0),
(0, 'MDH253', 'MAKH253', 'đang xử lý', 50000, '2023-04-03 13:51:53', 'COD', 0),
(0, 'MDH350', 'MAKH350', 'đang xử lý', 255000, '2023-04-28 08:23:20', 'MOMO', 0),
(0, 'MDH399', 'MAKH399', 'đang xử lý', 12000, '2023-12-25 17:05:25', 'MOMO', 0),
(0, 'MDH411', 'MAKH411', 'đang xử lý', 26000, '2023-11-27 10:10:38', 'MOMO', 0),
(0, 'MDH457', 'MAKH457', 'giao thành công', 1063000, '2023-04-28 08:27:59', 'MOMO', 0),
(0, 'MDH617', 'MAKH617', 'đang xử lý', 62000, '2023-12-25 22:45:14', 'MOMO', 0),
(0, 'MDH749', 'MAKH749', 'đang xử lý', 12000, '2023-04-22 14:36:29', 'MOMO', 0),
(0, 'MDH762', 'MAKH762', 'đang xử lý', 126000, '2023-10-17 10:04:25', 'MOMO', 0),
(0, 'MDH796', 'MAKH796', 'đang xử lý', 12000, '2023-12-25 17:04:55', 'MOMO', 0),
(0, 'MDH954', 'MAKH954', 'đang xử lý', 13000, '2023-05-21 22:09:23', 'MOMO', 0),
(0, 'MDH970', 'MAKH970', 'đã xử lý', 38000, '2023-04-03 13:40:15', 'COD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` varchar(100) NOT NULL,
  `tenkh` varchar(100) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `id_kh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `email`, `sdt`, `id_kh`) VALUES
('MAKH617', 'Nguyễn Võ Chí Dũng', '18 Kha Vạn Cân Huyện Bảo Lạc Cao Bằng', '', 905855829, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `id_phanquyen` int(11) NOT NULL,
  `tenquyen` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phanquyen`
--

INSERT INTO `phanquyen` (`id_phanquyen`, `tenquyen`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensp` varchar(100) DEFAULT NULL,
  `anhsp` varchar(255) DEFAULT NULL,
  `giasp` int(11) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `discount` decimal(2,1) DEFAULT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `tensp`, `anhsp`, `giasp`, `mota`, `discount`, `id_danhmuc`) VALUES
(0, 'Thức ăn cho chó con dạng hạt khô Pedigree - Vị gà, trứng & sữa 1.3kg', './upload/UserInfo6.PNG', 100000, '<p>adsf</p>\r\n', NULL, 4),
(1, 'Thức Ăn Cho Chó Trưởng Thành Giống Lớn – Eminent Adult Large Breed – 400g', './upload/Eminent.jpg', 62000, '', 0.0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`id_ctdonhang`,`madathang`,`makh`,`id_sanpham`,`id_dathang`,`id_kh`),
  ADD KEY `fk_ctiddh` (`id_dathang`);

--
-- Indexes for table `dangki`
--
ALTER TABLE `dangki`
  ADD PRIMARY KEY (`id_dangki`),
  ADD KEY `fk_dk` (`id_phanquyen`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`id_dathang`,`madathang`,`makh`,`id_kh`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`,`id_kh`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`id_phanquyen`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `fk_customer` (`id_danhmuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dangki`
--
ALTER TABLE `dangki`
  MODIFY `id_dangki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD CONSTRAINT `fk_ctiddh` FOREIGN KEY (`id_dathang`) REFERENCES `dathang` (`id_dathang`);

--
-- Constraints for table `dangki`
--
ALTER TABLE `dangki`
  ADD CONSTRAINT `fk_dk` FOREIGN KEY (`id_phanquyen`) REFERENCES `phanquyen` (`id_phanquyen`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
