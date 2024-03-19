-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2020 at 04:08 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidiropoulos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `page` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `page`) VALUES
(1, 'Σκύλοι', 'skuloi'),
(2, 'Γάτες', 'gates'),
(3, 'Ψάρια', 'psaria'),
(4, 'Πουλιά', 'poulia'),
(5, 'Ερπετά', 'erpeta'),
(6, 'Μικρά Ζώα', 'mikra');

-- --------------------------------------------------------

--
-- Table structure for table `ordert`
--

DROP TABLE IF EXISTS `ordert`;
CREATE TABLE IF NOT EXISTS `ordert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `prod_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordert`
--

INSERT INTO `ordert` (`id`, `order_id`, `user_id`, `prod_id`, `qty`, `date`, `total_cost`, `status`) VALUES
(54, 1, 1, 1, 4, '2020-03-25', '68.80', 'Κατατέθηκε'),
(55, 1, 1, 2, 6, '2020-03-25', '18.00', 'Κατατέθηκε'),
(56, 1, 1, 3, 4, '2020-03-25', '17.84', 'Κατατέθηκε'),
(57, 1, 1, 4, 1, '2020-03-25', '32.99', 'Κατατέθηκε'),
(58, 2, 1, 1, 4, '2020-03-25', '68.80', 'Κατατέθηκε'),
(59, 2, 1, 2, 4, '2020-03-25', '12.00', 'Κατατέθηκε'),
(60, 2, 1, 3, 4, '2020-03-25', '17.84', 'Κατατέθηκε'),
(61, 2, 1, 4, 1, '2020-03-25', '32.99', 'Κατατέθηκε'),
(62, 3, 1, 1, 1, '2020-04-29', '17.20', 'Κατατέθηκε'),
(63, 3, 1, 2, 2, '2020-04-29', '6.00', 'Κατατέθηκε'),
(64, 3, 1, 3, 7, '2020-04-29', '31.22', 'Κατατέθηκε'),
(65, 4, 3, 1, 1, '2020-04-30', '17.20', 'Κατατέθηκε'),
(66, 4, 3, 2, 3, '2020-04-30', '9.00', 'Κατατέθηκε'),
(67, 4, 3, 3, 4, '2020-04-30', '17.84', 'Κατατέθηκε'),
(68, 5, 20, 1, 4, '2020-04-30', '68.80', 'Κατατέθηκε'),
(69, 5, 20, 2, 4, '2020-04-30', '12.00', 'Κατατέθηκε'),
(70, 5, 20, 3, 6, '2020-04-30', '26.76', 'Κατατέθηκε'),
(71, 5, 20, 4, 3, '2020-04-30', '98.97', 'Κατατέθηκε'),
(72, 6, 20, 1, 5, '2020-04-30', '86.00', 'Κατατέθηκε'),
(73, 6, 20, 2, 4, '2020-04-30', '12.00', 'Κατατέθηκε'),
(74, 6, 20, 3, 7, '2020-04-30', '31.22', 'Κατατέθηκε'),
(75, 6, 20, 4, 4, '2020-04-30', '131.96', 'Κατατέθηκε'),
(76, 6, 20, 6, 2, '2020-04-30', '7.98', 'Κατατέθηκε'),
(77, 6, 20, 5, 2, '2020-04-30', '12.40', 'Κατατέθηκε'),
(78, 7, 3, 1, 5, '2020-04-30', '86.00', 'Κατατέθηκε'),
(79, 7, 3, 2, 6, '2020-04-30', '18.00', 'Κατατέθηκε'),
(80, 7, 3, 3, 9, '2020-04-30', '40.14', 'Κατατέθηκε'),
(81, 7, 3, 4, 5, '2020-04-30', '164.95', 'Κατατέθηκε'),
(82, 7, 3, 6, 3, '2020-04-30', '11.97', 'Κατατέθηκε'),
(83, 7, 3, 5, 3, '2020-04-30', '18.60', 'Κατατέθηκε'),
(84, 8, 21, 5, 2, '2020-05-10', '12.40', 'Κατατέθηκε'),
(85, 8, 21, 3, 1, '2020-05-10', '4.46', 'Κατατέθηκε'),
(86, 8, 21, 6, 1, '2020-05-10', '3.99', 'Κατατέθηκε'),
(87, 8, 21, 4, 1, '2020-05-10', '32.99', 'Κατατέθηκε'),
(88, 8, 21, 2, 1, '2020-05-10', '3.00', 'Κατατέθηκε'),
(89, 8, 21, 1, 1, '2020-05-10', '17.20', 'Κατατέθηκε');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `categoryId`, `description`, `image`, `stock`, `price`) VALUES
(1, 'Κρεββάτι πουφ Woofmoda μπλε Νο1', 1, 'Kρεββάτι πουφ με ενσωματωμένο μαξιλάρι από βαμβακερό δροσερό ύφασμα. Πλένεται στο πλυντήριο στους 30 βαθμούς.Ελληνικής βιοτεχνίας. ', 'images/products/skuloi/stroma_skulou.jpg', 4, '17.20'),
(2, 'Χτένα σκύλου 16cm', 1, 'Χτένα σκύλου 16cm μήκος. Απλή και οικονομική. Με διπλό πάχος λεπίδων.', 'images/products/skuloi/xtena_skulou.jpg', 50, '3.00'),
(3, 'Παιχνίδι φωλιά χαμστερ HAPPY PET NATURE', 6, 'Παιχνίδι φωλιά χαμστερ HAPPY PET NATURE, σε διάσταση: 27cm X 17cm .', 'images/products/mikra/hamster_wood.jpg', 6, '4.46'),
(4, 'Ενυδρείο cube με φίλτρο και διακόσμηση.', 3, 'νυδρείο cube με φίλτρο & διακόσμηση στα μεγάλα του μεγέθη, Ελληνικής κατασκευής. Ιδανικό για το σαλόνι, το υπνοδωμάτιο ή την κουζίνα του σπιτιού σας.', 'images/products/psaria/enudreio_fish.jpg', 3, '32.99'),
(5, 'Τροφή για καναρίνια Manitoba Τ1 χωρίς μπισκότο.', 4, 'Manitoba Τ1 τροφή για καναρίνια χωρίς μπισκότο 2,5kg  ', 'images/products/poulia/trofi_kanarini.jpg', 100, '6.20'),
(6, 'Παιχνίδι γάτας crocodile της PETINTEREST', 2, 'Παιχνίδι γάτας crocodile της PETINTEREST με silver vine\r\n                    Μπορεί το catnip να είναι ελκυστικό για τις γάτες, αλλά το silver vine είναι διπλάσια ελκυστικό άρα πολύ πιο ισχυρό.', '	\r\nimages/products/gates/crocodile_cat.jpg', 100, '3.99');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `address` varchar(30) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `mobile`, `email`, `password`, `role`, `address`, `birthday`) VALUES
(1, 'Κωνσταντίνος', 'Σιδηρόπουλος', '6986303159', 'con0390@gmail.com', '123!@#', 'admin', NULL, '1990-03-21'),
(3, 'Αλέξης', 'Σιδηρόπουλος', '6981234567', 'alex@gmail.com', '1234', 'user', NULL, NULL),
(20, 'Κυριακή', 'Σιδηροπούλου', '6941245121', 'keresi@gmail.com', '1234', 'user', 'Βελουχιώτη 36Β', '1970-02-04'),
(21, 'Stanislav', 'Mezievski', '6975124312', 'crowgr@gmail.com', '1234', 'user', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordert`
--
ALTER TABLE `ordert`
  ADD CONSTRAINT `ordert_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordert_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
