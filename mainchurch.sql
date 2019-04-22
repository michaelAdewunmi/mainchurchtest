-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2019 at 12:57 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mainchurch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(25) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `series_id` varchar(60) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `admin_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `user_name`, `surname`, `firstname`, `phone`, `email`, `passwd`, `series_id`, `remember_token`, `expires`, `admin_type`) VALUES
(3, 'root', '', '', '', '', '$2y$10$syHHgu.lgAUcLH/p1bJNRuQcLqwBVDNsL5mYnS3uVL4gs7apT1pni', NULL, NULL, NULL, 'admin'),
(4, 'superadmin', '', '', '', '', '$2y$10$xpZc5KC.aU2XHkcqhuZGFuAnqmtL4Unt8MysOyylceq.19XIyoZpG', 'DJf6u76sLwu3CVpw', '$2y$10$ltxNketjQ7xG.XjwoDIqAOB5TxlUr6QQdzAFqkf6y8UMIKWDHX0Ji', '2018-12-21 15:17:46', 'super'),
(5, 'admin', '', '', '', '', '$2y$10$cdZ3CPS1O7T/BdL6wRrxwe3SrX34SZ1585hwNoYK68ujKXJK6U0hy', NULL, NULL, NULL, 'admin'),
(6, 'chetanw', '', '', '', '', '$2y$10$iJSznl9t/iJmJWW1GcJyS.QJJ/pt8bR.jaixq5eZRzhbmGTW2QMLK', NULL, NULL, NULL, 'admin'),
(7, 'tunji', 'Shoyemi', 'Tunji', '08132628062', 'olatunjishoyemi@gmail.com', '$2y$10$h/KnF0D82pEg1jrOQZ8x9Oc3llwXw8hGvJfhI25Cv56fZJMfg.Egm', NULL, NULL, NULL, 'super');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `f_name`, `l_name`, `gender`, `address`, `city`, `state`, `phone`, `email`, `date_of_birth`, `created_at`, `updated_at`, `user_name`) VALUES
(18, 'Adesola', 'Olusola', 'male', 'Padmavati', 'Ikeja', 'Lagos', '34343432', 'adesola@gmail.com', '1991-06-18', NULL, NULL, ''),
(19, 'Janet', 'atre', 'male', 'Priyadarshini A102, adwa2', 'wad', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1998-05-18', NULL, NULL, ''),
(21, 'baruwa', 'Isola', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '2016-11-24', NULL, NULL, ''),
(23, 'Adebisi', ' Bisi', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1992-02-04', NULL, NULL, ''),
(24, 'Olusola', ' Mendel', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '2016-11-30', NULL, NULL, ''),
(25, 'John', 'Israel', 'male', 'City, view', '', 'Maharashtra', '8875207658', 'john@abc.com', '2017-01-27', NULL, NULL, ''),
(26, 'Maria', 'Anderson', 'female', 'New york city', '', 'Maharashtra', '8856705387', 'chetanshenai9@gmail.com', '2017-01-28', NULL, NULL, ''),
(27, 'Ana', ' Trujillo', 'female', 'Street view', '', 'Maharashtra', '9975658478', 'chetanshenai9@gmail.com', '1992-07-16', NULL, NULL, ''),
(28, 'Thomas', 'Hardy', 'male', '120 Hanover Sq', '', 'Maharashtra', '885115323', 'abc@abc.com', '1985-06-24', NULL, NULL, ''),
(29, 'Christina', 'Berlin', 'female', 'Berguvsvägen 8', '', 'Maharashtra', '9985125366', 'chetanshenai9@gmail.com', '1997-02-12', NULL, NULL, ''),
(30, 'Ann', 'Devon', 'male', '35 King George', '', 'Maharashtra', '8865356988', 'abc@abc.com', '1988-02-09', NULL, NULL, ''),
(31, 'Helen', 'Bennett', 'female', 'Garden House Crowther Way', '', 'Maharashtra', '75207654', 'chetanshenai9@gmail.com', '1983-06-15', NULL, NULL, ''),
(32, 'Annette', 'Roulet', 'female', '1 rue Alsace-Lorraine', '', ' ', '3410005687', 'abc@abc.com', '1992-01-13', NULL, NULL, ''),
(33, 'Yoshi', 'Tannamuri', 'male', '1900 Oak St.', '', 'Maharashtra', '8855647899', 'chetanshenai9@gmail.com', '1994-07-28', NULL, NULL, ''),
(34, 'Carlos', 'González', 'male', 'Barquisimeto', '', 'Maharashtra', '9966447554', 'abc@abc.com', '1997-06-24', NULL, NULL, ''),
(35, 'Fran', ' Wilson', 'male', 'Priyadarshini ', '', 'Maharashtra', '5844775565', 'fran@abc.com', '1997-01-27', NULL, NULL, ''),
(36, 'Jean', ' Fresnière', 'female', '43 rue St. Laurent', '', 'Maharashtra', '9975586123', 'chetanshenai9@gmail.com', '2002-01-28', NULL, NULL, ''),
(37, 'Jose', 'Pavarotti', 'male', '187 Suffolk Ln.', '', 'Maharashtra', '875213654', ' Pavarotti@gmail.com', '1997-02-04', NULL, NULL, ''),
(38, 'Palle', 'Ibsen', 'female', 'Smagsløget 45', '', 'Maharashtra', '9975245588', 'Palle@gmail.com', '1991-06-17', NULL, '2018-01-14 16:11:42', ''),
(39, 'Paula', 'Amusa', 'male', 'Rua do Mercado, 12', '', 'Maharashtra', '659984878', 'abc@gmail.com', '1996-02-06', NULL, NULL, ''),
(40, 'Matti', ' Karttunen', 'female', 'Keskuskatu 45', '', 'Maharashtra', '845555125', 'abc@abc.com', '1984-06-19', NULL, NULL, ''),
(47, 'Christiana ', 'Doe', 'male', 'afa', NULL, 'Maharashtra', '9934678658', 'chetanshenai9@gmail.com', NULL, '2018-11-17 17:26:16', NULL, ''),
(48, 'Selewa ', 'Sowore', 'male', NULL, NULL, ' ', NULL, NULL, NULL, '2018-11-18 05:51:27', NULL, ''),
(49, 'Olatunji', 'Shoyemi', 'male', 'Lagos\r\nLagos', NULL, 'Lagos', '8132628062', 'tunjiup@gmail.com', '2019-01-04', '2019-01-02 10:58:17', NULL, ''),
(50, 'Jos', 'Gadges', 'male', 'Lagos\r\nLagos', NULL, 'Lagos', '8082004888', 'josgadgets@gmail.com', '2018-12-05', '2019-01-02 11:02:37', NULL, ''),
(51, 'TUNJI3', 'SHOYEMI', 'male', 'Lagos', NULL, 'Lagos', '8023787198', 'tunjiup@gmail.com', '2018-12-05', '2019-01-02 11:12:26', '2019-01-02 11:13:46', ''),
(52, 'Sola', 'Isreal', 'male', 'Lagos', NULL, 'Lagos', '8132628062', 'sola@sola.com', '2019-01-03', '2019-01-02 11:55:21', NULL, ''),
(53, 'Ade', 'Oluwasola', 'male', 'Ketu', NULL, 'Ogun', '8132628062', 'tunjiup@gmail.com', '2018-12-05', '2019-01-02 11:56:50', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
