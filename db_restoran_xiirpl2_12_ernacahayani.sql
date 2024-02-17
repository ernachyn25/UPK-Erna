-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2019 at 04:37 PM
-- Server version: 5.5.25a
-- PHP Version: 5.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_restoran_xiirpl2_12_ernacahayani`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `del_tb_meja`(IN `a` VARCHAR(10))
    NO SQL
delete from tb_meja where id_meja=a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_tb_menu`(IN `a` VARCHAR(10))
    NO SQL
delete from tb_menu where id_menu=a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_tb_pelanggan`(IN `a` VARCHAR(10))
    NO SQL
delete from tb_pelanggan where id_pelanggan=a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_tb_pesanan`(IN `a` VARCHAR(10))
    NO SQL
delete from tb_pesanan where id_pesanan=a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_tb_transaksi`(IN `a` VARCHAR(10))
    NO SQL
delete from tb_transaksi where id_transaksi=a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_tb_user`(IN `a` VARCHAR(10))
    NO SQL
delete from tb_user where id_user=a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `in_tb_meja`(IN `a` VARCHAR(10), IN `b` VARCHAR(50), IN `c` VARCHAR(100), IN `d` VARCHAR(30))
    NO SQL
insert into tb_meja values (a,b,c,d)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `in_tb_menu`(IN `id_menu` VARCHAR(10), IN `nama_menu` VARCHAR(100), IN `harga` VARCHAR(50))
    NO SQL
insert into tb_menu values (a,b,c)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `in_tb_pelanggan`(IN `a` VARCHAR(10), IN `b` VARCHAR(100), IN `c` ENUM('L','P'), IN `d` VARCHAR(13), IN `e` VARCHAR(100))
    NO SQL
insert into tb_pelanggan values (a,b,c,d,e)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `in_tb_pesanan`(IN `a` VARCHAR(10), IN `b` VARCHAR(10), IN `c` VARCHAR(10), IN `d` VARCHAR(30), IN `e` VARCHAR(50))
    NO SQL
insert into tb_pesanan values (a,b,c,d,e)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `in_tb_transaksi`(IN `a` VARCHAR(10), IN `b` VARCHAR(10), IN `c` VARCHAR(30), IN `d` VARCHAR(100), IN `e` VARCHAR(50), IN `f` VARCHAR(30), IN `g` TIMESTAMP)
    NO SQL
insert into tb_transaksi values (a,b,c,d,e,f,g)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `in_tb_user`(IN `a` VARCHAR(10), IN `b` VARCHAR(100), IN `c` VARCHAR(50), IN `d` VARCHAR(50), IN `e` ENUM('administrator','waiter','kasir','owner'))
    NO SQL
insert into tb_user values (a,b,c,d,e)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `up_tb_meja`(IN `a` VARCHAR(10), IN `b` VARCHAR(50), IN `c` VARCHAR(100), IN `d` INT(30))
    NO SQL
update tb_meja set no_meja=b, nama_menu=c, jumlah=d where id_meja=a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `up_tb_menu`(IN `a` VARCHAR(10), IN `b` VARCHAR(100), IN `c` VARCHAR(50))
    NO SQL
update tb_menu set nama_menu=b, harga=c where id_menu=a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `up_tb_pelanggan`(IN `a` VARCHAR(10), IN `b` VARCHAR(100), IN `c` ENUM('L','P'), IN `d` VARCHAR(13), IN `e` VARCHAR(100))
    NO SQL
update tb_pelanggan set nama_pelanggan=b, jenis_kelamin=c, no_hp=d, alamat=e where id_pelanggan=a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `up_tb_pesanan`(IN `a` VARCHAR(10), IN `b` VARCHAR(10), IN `c` VARCHAR(10), IN `d` VARCHAR(30), IN `e` VARCHAR(50))
    NO SQL
update tb_pesanan set id_menu=b, id_pelanggan=c, jumlah=d, no_meja=e where id_pesanan=a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `up_tb_transaksi`(IN `a` VARCHAR(10), IN `b` VARCHAR(10), IN `c` VARCHAR(30), IN `d` VARCHAR(100), IN `e` VARCHAR(50), IN `f` VARCHAR(30), IN `g` TIMESTAMP)
    NO SQL
update tb_transaksi set id_menu=b, jumlah=c, nama_menu=d, harga=e, bayar=f, tanggal=g where id_transaksi=a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `up_tb_user`(IN `a` VARCHAR(10), IN `b` VARCHAR(100), IN `c` VARCHAR(50), IN `d` VARCHAR(50), IN `e` ENUM('administrator','waiter','kasir','owner'))
    NO SQL
update tb_user set nama_user=b, username=c, password=d, level=e  where id_user=a$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_meja`
--

CREATE TABLE IF NOT EXISTS `tb_meja` (
  `id_meja` varchar(10) NOT NULL,
  `no_meja` varchar(50) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_meja`
--

INSERT INTO `tb_meja` (`id_meja`, `no_meja`, `nama_menu`, `jumlah`) VALUES
('1', '3', 'Sowak', '3'),
('2', '1', 'siwak', '1'),
('3', '2', 'Float Manggo', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id_menu` varchar(10) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `harga`) VALUES
('MN003', 'Float Manggo', '5000'),
('MN004', 'Jus mangga', '7000'),
('MN005', 'Seafood', '50000'),
('MN01', 'Nasi Goreng', '25000'),
('MN02', 'siwak', '20000'),
('MN03', 'Roti Bakar', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
('PL01', 'reguler', 'L', '086543287543', 'Amsterdam'),
('PL02', 'reguler', 'P', '087654345234', 'Busan'),
('PL03', 'reguler', 'L', '081390532754', 'Kairo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE IF NOT EXISTS `tb_pesanan` (
  `id_pesanan` varchar(10) NOT NULL,
  `id_menu` varchar(10) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `no_meja` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_menu`, `id_pelanggan`, `jumlah`, `no_meja`, `tanggal`) VALUES
('PS01', 'MN01', 'PL01', '3', '2', '2019-04-30 05:14:02'),
('PS02', 'MN02', 'PL02', '2', '1', '2019-04-25 16:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_menu` varchar(10) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `bayar` varchar(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_menu`, `jumlah`, `nama_menu`, `harga`, `bayar`, `tanggal`) VALUES
('TR01', 'MN02', '2', 'siwak', '20000', '50000', '2019-04-15 07:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('administrator','waiter','kasir','owner') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('US01', 'erna', 'admin', '2501', 'administrator'),
('US02', 'erca', 'waiter', '123', 'waiter'),
('US03', 'ernac', 'kasir', '1234', 'kasir'),
('US04', 'ernaa', 'owner', '12345', 'owner');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_all`
--
CREATE TABLE IF NOT EXISTS `v_all` (
`id_menu` varchar(10)
,`nama_menu` varchar(100)
,`harga` varchar(50)
,`id_pesanan` varchar(10)
,`idm` varchar(10)
,`idp` varchar(10)
,`tanggal` timestamp
,`jumlah` varchar(30)
,`nmeja` varchar(50)
,`id_pelanggan` varchar(10)
,`nama_pelanggan` varchar(100)
,`jenis_kelamin` enum('L','P')
,`no_hp` varchar(13)
,`alamat` varchar(100)
);
-- --------------------------------------------------------

--
-- Structure for view `v_all`
--
DROP TABLE IF EXISTS `v_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_all` AS select `tb_menu`.`id_menu` AS `id_menu`,`tb_menu`.`nama_menu` AS `nama_menu`,`tb_menu`.`harga` AS `harga`,`tb_pesanan`.`id_pesanan` AS `id_pesanan`,`tb_pesanan`.`id_menu` AS `idm`,`tb_pesanan`.`id_pelanggan` AS `idp`,`tb_pesanan`.`tanggal` AS `tanggal`,`tb_pesanan`.`jumlah` AS `jumlah`,`tb_pesanan`.`no_meja` AS `nmeja`,`tb_pelanggan`.`id_pelanggan` AS `id_pelanggan`,`tb_pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`tb_pelanggan`.`jenis_kelamin` AS `jenis_kelamin`,`tb_pelanggan`.`no_hp` AS `no_hp`,`tb_pelanggan`.`alamat` AS `alamat` from ((`tb_menu` join `tb_pesanan`) join `tb_pelanggan`) where ((`tb_menu`.`id_menu` = `tb_pesanan`.`id_menu`) and (`tb_pesanan`.`id_pelanggan` = `tb_pelanggan`.`id_pelanggan`));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         