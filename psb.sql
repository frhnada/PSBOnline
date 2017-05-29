-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2017 at 04:47 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `calonsantri`
--

CREATE TABLE IF NOT EXISTS `calonsantri` (
  `noPendaftaran` varchar(20) CHARACTER SET utf8 NOT NULL,
  `gel_CalonSantri` int(11) NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 NOT NULL,
  `NamaLengkap` varchar(50) CHARACTER SET utf8 NOT NULL,
  `NamaPanggilan` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Jenis_Kelamin` varchar(10) CHARACTER SET utf8 NOT NULL,
  `TempatLahir` varchar(15) CHARACTER SET utf8 NOT NULL,
  `TanggalLahir` date NOT NULL,
  `Anak_Ke` int(2) NOT NULL,
  `Jml_Saudara_Kandung` int(2) DEFAULT NULL,
  `Jml_Saudara_Tiri` int(2) DEFAULT NULL,
  `Jml_Saudara_Angkat` int(2) DEFAULT NULL,
  `Anak_Yatim_Piatu` varchar(15) CHARACTER SET utf8 NOT NULL,
  `Bahasa` varchar(35) CHARACTER SET utf8 NOT NULL,
  `Alamat` varchar(100) CHARACTER SET utf8 NOT NULL,
  `No_telp` int(12) DEFAULT NULL,
  `Alamat_Saudara_Solo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Golongan_Darah` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Penyakit_Pernah_Diderita` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Kelainan_Jasmani` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `Lulusan_Dari` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Diterima_Univ` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Fakultas` varchar(5) CHARACTER SET utf8 NOT NULL,
  `Jurusan` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`noPendaftaran`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(25, 1494995106, '::1', 'qctirov0'),
(26, 1494995120, '::1', 'bqsc5k9v');

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE IF NOT EXISTS `gelombang` (
  `gel_id` int(11) NOT NULL AUTO_INCREMENT,
  `gel_ta` year(4) NOT NULL,
  `gel_kode` int(10) NOT NULL,
  `gel_nama` varchar(128) NOT NULL,
  `gel_tanggal_mulai` date NOT NULL,
  `gel_tanggal_selesai` date NOT NULL,
  `gel_keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`gel_id`, `gel_ta`, `gel_kode`, `gel_nama`, `gel_tanggal_mulai`, `gel_tanggal_selesai`, `gel_keterangan`) VALUES
(1, 2017, 1701, '1', '2017-05-01', '2017-05-10', NULL),
(4, 2017, 1702, 'Gelombang 3', '2017-05-15', '2017-05-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_text` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  KEY `link_id` (`link_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`link_id`, `link_text`, `link_url`) VALUES
(6, 'FaceBook', 'http://facebook.com'),
(7, 'Twitter', 'http://twitter.com'),
(8, 'Google', 'google.com');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_judul` text NOT NULL,
  `post_link` text NOT NULL,
  `post_isi` longtext,
  `post_user` int(11) DEFAULT NULL,
  `post_tanggal` date DEFAULT NULL,
  KEY `post_id` (`post_id`),
  KEY `post_user` (`post_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_judul`, `post_link`, `post_isi`, `post_user`, `post_tanggal`) VALUES
(3, 'Visi dan Misi PPM Roudlotul Jannah', 'visi-dan-misi-ppm-roudlotul-jannah', '<p><strong>Visi :</strong></p>\r\n<p style="padding-left: 30px;">Mendidik santriwan santriwati menjadi da&rsquo;i daiyah yang profesional, berakhlakul karimah, mandiri dan bermanfaat bagi masyarakat bangsa dan Negara.</p>\r\n<p><strong>Misi :</strong></p>\r\n<ol>\r\n<li>Meningkatkan Kompetensensi,dedikasi,loyalitas,dan kepatuhan terhadap ajaran Islam dan perundang-undangan yang berlaku</li>\r\n<li>Menanamkan nilai-nilai kejujuran, amanat, hemat, beretos kerja tinggi, kerukunan, kekompakan dan kerjasama yang baik</li>\r\n<li>Membekali santriwan santriwati menjadi sarjana berintelektual dan religius</li>\r\n</ol>', 1, '2017-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `reset_pass`
--

CREATE TABLE IF NOT EXISTS `reset_pass` (
  `reset_id` int(11) NOT NULL AUTO_INCREMENT,
  `reset_users` int(11) DEFAULT NULL,
  `reset_link` varchar(255) DEFAULT NULL,
  `reset_input` datetime DEFAULT NULL,
  `reset_expired` datetime DEFAULT NULL,
  KEY `reset_id` (`reset_id`),
  KEY `reset_users` (`reset_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('71e9de00226a0a4eacff034132a8009f', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 1494995105, 'a:2:{s:5:"login";s:88:"9DT7Yup1XPaBLLxYEwIzwLl6fmsUFiGdqyWBM5juEpyAK924Sy88Qx50x8gDTSQloyrsMuOT9OvJz6NQ8NQArw==";s:7:"user_id";s:88:"2HZSaZaePKR0vqQtznyjPr1c9RDg3yHqvlaIqXQHorqgKzqfKc1sgL47o88oKb71ePZHrzzyUslG6vNDUzYyig==";}');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_nama` char(128) DEFAULT NULL,
  `setting_value` varchar(255) DEFAULT NULL,
  UNIQUE KEY `UNIQUE` (`setting_nama`),
  KEY `setting_id` (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_nama`, `setting_value`) VALUES
(1, 'web_judul', 'Penerimaan Santri Baru'),
(2, 'sekolah_nama', 'PPM Roudlotul Jannah'),
(3, 'sekolah_alamat', 'Jl.Porong Rt 3 Rw 3 Kelurahan Pucang Sawit Kecamatan  Jebres Kota Surakarta'),
(4, 'sekolah_telpon', '(0271) 669269'),
(5, 'sekolah_email', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(128) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pangkat` enum('admin','user') NOT NULL DEFAULT 'user',
  `user_nama` varchar(128) DEFAULT NULL,
  `user_tanggal` date DEFAULT NULL,
  `user_keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UNIQUE` (`user_username`,`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_email`, `user_pangkat`, `user_nama`, `user_tanggal`, `user_keterangan`) VALUES
(1, 'admin', '0c7540eb7e65b553ec1ba6b20de79608', 'admin@localhost.com', 'admin', 'Nama Saya Admin', '2014-08-05', 'Password = admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_user` FOREIGN KEY (`post_user`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `reset_pass`
--
ALTER TABLE `reset_pass`
  ADD CONSTRAINT `reset_users` FOREIGN KEY (`reset_users`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
