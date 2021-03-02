-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2021 at 08:40 AM
-- Server version: 10.2.37-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turvy_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `avatar`, `is_approved`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', '+61417691066', '$2y$10$UR1wF1Yz2Ksi3LIe8F0aEe5USwiQAQIIQuqHrig8PfX/9dUAWzGoy', 'uploads/user/admin/7ed0ee3d99d6a45db3a71a3d72c85449a0846510.JPG', 1, '4agowYnFNYudpEpK3Vcvgx1NKR8KHaCT63TcgYDyAONchOuK2RRFsp1fOvxz', '2020-02-23 13:27:23', '2020-02-23 15:31:54'),
(2, 'Fang', 'Hua teng', 'fanghuateng@admin.com', '+86457852126', '$2y$10$kjP6uwZk52f6KpFmWIDuBueS8ODa/7qscp0etPYO9qyLUQRmIDSSe', 'uploads/user/admin/82d8eccd83551880a20bbbdd4a458ee04fcef77c.png', 1, NULL, '2020-02-27 21:00:10', '2020-02-27 21:00:10'),
(3, 'Huateng', 'Fang', 'fanghuatemg0621@gmail.com', '+86186040514068', '$2y$10$meIfD1w.dhZWtozrOZ9AKuI447tDrHPNv91fOsnxyXrvOXyQw6PUO', 'uploads/user/admin/9dd246162f315c8b1a01dabd7e3230202a4fcc4a.png', 1, NULL, '2020-02-29 04:38:59', '2020-02-29 05:34:21'),
(4, 'Justin', 'Milla', 'justin@turvy.net', '+61417691066', '$2y$10$Th/k1dCKJkhFwRvN/Z0A4ODxSZworInQfYt2GzapEGgR6AQLn383y', 'uploads/user/admin/44afc095bbe255ae23c0886f6acb389f9b68ff11.jpg', 1, '9BelANVhq448sk4ayFqDb6WdBLCvFl6qKAHyE8wq4aRWqBacAXWNIM4LdIdw', '2020-07-03 00:14:44', '2021-02-15 06:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `picture`, `description`, `url`, `is_publish`, `created_at`, `updated_at`) VALUES
(1, 'uploads/ad/58b8c08f3a92ba30f047819c63720952c64ef01b.png', 'New website for removalist. Why don\'t you try it?', 'remoovit.net', 1, '2020-02-29 05:03:18', '2020-03-01 21:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinates` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `name`, `zipcode`, `coordinates`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sydney Airport', '2020', '-33.935846296589666,151.15781684112545|-33.93143112730487,151.16176505279537|-33.92858250951053,151.17257971954342|-33.92872494266306,151.1796178359985|-33.93228569406396,151.1844243545532|-33.935846296589666,151.19111914825436|-33.94111571509599,151.18596930694576|-33.94439113519566,151.17687125396725|-33.94239741623077,151.1634816665649|-33.94083089000105,151.15747351837155', 1, '2020-07-21 08:10:32', '2021-02-27 07:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `airport_prices`
--

CREATE TABLE `airport_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `airport_id` int(10) UNSIGNED NOT NULL,
  `destination_id` int(10) UNSIGNED NOT NULL,
  `servicetype_id` int(10) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `number_tolls` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `rider_id` int(10) UNSIGNED DEFAULT NULL,
  `rider_country_id` int(10) UNSIGNED DEFAULT NULL,
  `rider_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_current` tinyint(1) NOT NULL DEFAULT 0,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `origin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicetype_id` int(10) UNSIGNED DEFAULT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `coupon_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `is_manual` tinyint(1) NOT NULL DEFAULT 1,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `arrival_time` timestamp NULL DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cancelreasons`
--

CREATE TABLE `cancelreasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancelreasons`
--

INSERT INTO `cancelreasons` (`id`, `reason`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'Driver delay', 15.00, '2020-03-01 20:55:31', '2020-03-01 20:55:31'),
(2, 'No Show', 15.00, '2020-03-01 20:56:02', '2020-03-01 20:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 'Canberra', '2020-02-23 15:43:08', '2020-02-23 15:43:08'),
(2, 13, 2, 'Sydney', '2020-02-23 15:43:33', '2020-02-23 15:43:33'),
(3, 13, 3, 'Darwin', '2020-02-23 15:44:03', '2020-02-23 15:44:03'),
(4, 13, 4, 'Brisbane', '2020-02-23 15:44:31', '2020-02-23 15:44:31'),
(5, 13, 5, 'Adelaide', '2020-02-23 15:44:55', '2020-02-23 15:44:55'),
(6, 13, 6, 'Hobart', '2020-02-23 15:45:16', '2020-02-23 15:45:16'),
(7, 13, 7, 'Melbourne', '2020-02-23 15:45:37', '2020-02-23 15:45:37'),
(8, 13, 8, 'Perth', '2020-02-23 16:18:13', '2020-02-23 16:18:13'),
(9, 13, 2, 'Wollongong', '2020-02-23 21:37:23', '2020-02-23 21:37:23'),
(10, 13, 2, 'Newcastle', '2020-02-23 21:38:38', '2020-02-23 21:38:38'),
(11, 13, 2, 'Central Coast', '2020-02-23 21:39:34', '2020-02-23 21:39:34'),
(12, 13, 2, 'Maitland', '2020-02-23 21:40:12', '2020-02-23 21:40:12'),
(13, 13, 2, 'Albury', '2020-02-23 21:42:40', '2020-02-23 21:42:40'),
(14, 13, 2, 'Armidale', '2020-02-23 21:43:19', '2020-02-23 21:43:19'),
(15, 13, 2, 'Bathurst', '2020-02-23 21:43:48', '2020-02-23 21:43:48'),
(16, 13, 2, 'Dubbo', '2020-02-23 21:46:02', '2020-02-23 21:46:02'),
(17, 13, 2, 'Orange', '2020-02-23 21:46:39', '2020-02-23 21:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `rider_id` int(10) UNSIGNED DEFAULT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `partner_id` int(10) UNSIGNED DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nicename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonecode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `nicename`, `iso`, `iso3`, `numcode`, `phonecode`, `created_at`, `updated_at`) VALUES
(1, 'AFGHANISTAN', 'Afghanistan', 'AF', 'AFG', '4', '93', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(2, 'ALBANIA', 'Albania', 'AL', 'ALB', '8', '355', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(3, 'ALGERIA', 'Algeria', 'DZ', 'DZA', '12', '213', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(4, 'AMERICAN SAMOA', 'American Samoa', 'AS', 'ASM', '16', '1684', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(5, 'ANDORRA', 'Andorra', 'AD', 'AND', '20', '376', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(6, 'ANGOLA', 'Angola', 'AO', 'AGO', '24', '244', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(7, 'ANGUILLA', 'Anguilla', 'AI', 'AIA', '660', '1264', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(9, 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'AG', 'ATG', '28', '1268', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(10, 'ARGENTINA', 'Argentina', 'AR', 'ARG', '32', '54', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(11, 'ARMENIA', 'Armenia', 'AM', 'ARM', '51', '374', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(12, 'ARUBA', 'Aruba', 'AW', 'ABW', '533', '297', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(13, 'AUSTRALIA', 'Australia', 'AU', 'AUS', '36', '61', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(14, 'AUSTRIA', 'Austria', 'AT', 'AUT', '40', '43', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(15, 'AZERBAIJAN', 'Azerbaijan', 'AZ', 'AZE', '31', '994', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(16, 'BAHAMAS', 'Bahamas', 'BS', 'BHS', '44', '1242', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(17, 'BAHRAIN', 'Bahrain', 'BH', 'BHR', '48', '973', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(18, 'BANGLADESH', 'Bangladesh', 'BD', 'BGD', '50', '880', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(19, 'BARBADOS', 'Barbados', 'BB', 'BRB', '52', '1246', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(20, 'BELARUS', 'Belarus', 'BY', 'BLR', '112', '375', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(21, 'BELGIUM', 'Belgium', 'BE', 'BEL', '56', '32', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(22, 'BELIZE', 'Belize', 'BZ', 'BLZ', '84', '501', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(23, 'BENIN', 'Benin', 'BJ', 'BEN', '204', '229', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(24, 'BERMUDA', 'Bermuda', 'BM', 'BMU', '60', '1441', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(25, 'BHUTAN', 'Bhutan', 'BT', 'BTN', '64', '975', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(26, 'BOLIVIA', 'Bolivia', 'BO', 'BOL', '68', '591', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(27, 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BA', 'BIH', '70', '387', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(28, 'BOTSWANA', 'Botswana', 'BW', 'BWA', '72', '267', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(29, 'BOUVET ISLAND', 'Bouvet Island', 'BV', NULL, NULL, '0', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(30, 'BRAZIL', 'Brazil', 'BR', 'BRA', '76', '55', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(31, 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', 'IO', NULL, NULL, '246', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(32, 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BN', 'BRN', '96', '673', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(33, 'BULGARIA', 'Bulgaria', 'BG', 'BGR', '100', '359', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(34, 'BURKINA FASO', 'Burkina Faso', 'BF', 'BFA', '854', '226', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(35, 'BURUNDI', 'Burundi', 'BI', 'BDI', '108', '257', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(36, 'CAMBODIA', 'Cambodia', 'KH', 'KHM', '116', '855', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(37, 'CAMEROON', 'Cameroon', 'CM', 'CMR', '120', '237', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(38, 'CANADA', 'Canada', 'CA', 'CAN', '124', '1', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(39, 'CAPE VERDE', 'Cape Verde', 'CV', 'CPV', '132', '238', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(40, 'CAYMAN ISLANDS', 'Cayman Islands', 'KY', 'CYM', '136', '1345', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(41, 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CF', 'CAF', '140', '236', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(42, 'CHAD', 'Chad', 'TD', 'TCD', '148', '235', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(43, 'CHILE', 'Chile', 'CL', 'CHL', '152', '56', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(44, 'CHINA', 'China', 'CN', 'CHN', '156', '86', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(45, 'CHRISTMAS ISLAND', 'Christmas Island', 'CX', NULL, NULL, '61', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(46, 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', 'CC', NULL, NULL, '672', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(47, 'COLOMBIA', 'Colombia', 'CO', 'COL', '170', '57', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(48, 'COMOROS', 'Comoros', 'KM', 'COM', '174', '269', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(49, 'CONGO', 'Congo', 'CG', 'COG', '178', '242', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(50, 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'CD', 'COD', '180', '242', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(51, 'COOK ISLANDS', 'Cook Islands', 'CK', 'COK', '184', '682', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(52, 'COSTA RICA', 'Costa Rica', 'CR', 'CRI', '188', '506', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(53, 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CI', 'CIV', '384', '225', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(54, 'CROATIA', 'Croatia', 'HR', 'HRV', '191', '385', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(55, 'CUBA', 'Cuba', 'CU', 'CUB', '192', '53', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(56, 'CYPRUS', 'Cyprus', 'CY', 'CYP', '196', '357', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(57, 'CZECH REPUBLIC', 'Czech Republic', 'CZ', 'CZE', '203', '420', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(58, 'DENMARK', 'Denmark', 'DK', 'DNK', '208', '45', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(59, 'DJIBOUTI', 'Djibouti', 'DJ', 'DJI', '262', '253', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(60, 'DOMINICA', 'Dominica', 'DM', 'DMA', '212', '1767', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(61, 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DO', 'DOM', '214', '1809', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(62, 'ECUADOR', 'Ecuador', 'EC', 'ECU', '218', '593', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(63, 'EGYPT', 'Egypt', 'EG', 'EGY', '818', '20', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(64, 'EL SALVADOR', 'El Salvador', 'SV', 'SLV', '222', '503', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(65, 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GQ', 'GNQ', '226', '240', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(66, 'ERITREA', 'Eritrea', 'ER', 'ERI', '232', '291', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(67, 'ESTONIA', 'Estonia', 'EE', 'EST', '233', '372', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(68, 'ETHIOPIA', 'Ethiopia', 'ET', 'ETH', '231', '251', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(69, 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FK', 'FLK', '238', '500', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(70, 'FAROE ISLANDS', 'Faroe Islands', 'FO', 'FRO', '234', '298', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(71, 'FIJI', 'Fiji', 'FJ', 'FJI', '242', '679', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(72, 'FINLAND', 'Finland', 'FI', 'FIN', '246', '358', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(73, 'FRANCE', 'France', 'FR', 'FRA', '250', '33', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(74, 'FRENCH GUIANA', 'French Guiana', 'GF', 'GUF', '254', '594', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(75, 'FRENCH POLYNESIA', 'French Polynesia', 'PF', 'PYF', '258', '689', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(76, 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', 'TF', NULL, NULL, '0', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(77, 'GABON', 'Gabon', 'GA', 'GAB', '266', '241', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(78, 'GAMBIA', 'Gambia', 'GM', 'GMB', '270', '220', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(79, 'GEORGIA', 'Georgia', 'GE', 'GEO', '268', '995', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(80, 'GERMANY', 'Germany', 'DE', 'DEU', '276', '49', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(81, 'GHANA', 'Ghana', 'GH', 'GHA', '288', '233', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(82, 'GIBRALTAR', 'Gibraltar', 'GI', 'GIB', '292', '350', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(83, 'GREECE', 'Greece', 'GR', 'GRC', '300', '30', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(84, 'GREENLAND', 'Greenland', 'GL', 'GRL', '304', '299', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(85, 'GRENADA', 'Grenada', 'GD', 'GRD', '308', '1473', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(86, 'GUADELOUPE', 'Guadeloupe', 'GP', 'GLP', '312', '590', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(87, 'GUAM', 'Guam', 'GU', 'GUM', '316', '1671', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(88, 'GUATEMALA', 'Guatemala', 'GT', 'GTM', '320', '502', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(89, 'GUINEA', 'Guinea', 'GN', 'GIN', '324', '224', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(90, 'GUINEA-BISSAU', 'Guinea-Bissau', 'GW', 'GNB', '624', '245', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(91, 'GUYANA', 'Guyana', 'GY', 'GUY', '328', '592', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(92, 'HAITI', 'Haiti', 'HT', 'HTI', '332', '509', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(93, 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', 'HM', NULL, NULL, '0', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(94, 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VA', 'VAT', '336', '39', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(95, 'HONDURAS', 'Honduras', 'HN', 'HND', '340', '504', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(96, 'HONG KONG', 'Hong Kong', 'HK', 'HKG', '344', '852', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(97, 'HUNGARY', 'Hungary', 'HU', 'HUN', '348', '36', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(98, 'ICELAND', 'Iceland', 'IS', 'ISL', '352', '354', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(99, 'INDIA', 'India', 'IN', 'IND', '356', '91', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(100, 'INDONESIA', 'Indonesia', 'ID', 'IDN', '360', '62', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(101, 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IR', 'IRN', '364', '98', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(102, 'IRAQ', 'Iraq', 'IQ', 'IRQ', '368', '964', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(103, 'IRELAND', 'Ireland', 'IE', 'IRL', '372', '353', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(104, 'ISRAEL', 'Israel', 'IL', 'ISR', '376', '972', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(105, 'ITALY', 'Italy', 'IT', 'ITA', '380', '39', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(106, 'JAMAICA', 'Jamaica', 'JM', 'JAM', '388', '1876', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(107, 'JAPAN', 'Japan', 'JP', 'JPN', '392', '81', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(108, 'JORDAN', 'Jordan', 'JO', 'JOR', '400', '962', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(109, 'KAZAKHSTAN', 'Kazakhstan', 'KZ', 'KAZ', '398', '7', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(110, 'KENYA', 'Kenya', 'KE', 'KEN', '404', '254', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(111, 'KIRIBATI', 'Kiribati', 'KI', 'KIR', '296', '686', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(112, 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'KP', 'PRK', '408', '850', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(113, 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KR', 'KOR', '410', '82', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(114, 'KUWAIT', 'Kuwait', 'KW', 'KWT', '414', '965', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(115, 'KYRGYZSTAN', 'Kyrgyzstan', 'KG', 'KGZ', '417', '996', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(116, 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LA', 'LAO', '418', '856', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(117, 'LATVIA', 'Latvia', 'LV', 'LVA', '428', '371', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(118, 'LEBANON', 'Lebanon', 'LB', 'LBN', '422', '961', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(119, 'LESOTHO', 'Lesotho', 'LS', 'LSO', '426', '266', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(120, 'LIBERIA', 'Liberia', 'LR', 'LBR', '430', '231', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(121, 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LY', 'LBY', '434', '218', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(122, 'LIECHTENSTEIN', 'Liechtenstein', 'LI', 'LIE', '438', '423', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(123, 'LITHUANIA', 'Lithuania', 'LT', 'LTU', '440', '370', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(124, 'LUXEMBOURG', 'Luxembourg', 'LU', 'LUX', '442', '352', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(125, 'MACAO', 'Macao', 'MO', 'MAC', '446', '853', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(126, 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MK', 'MKD', '807', '389', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(127, 'MADAGASCAR', 'Madagascar', 'MG', 'MDG', '450', '261', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(128, 'MALAWI', 'Malawi', 'MW', 'MWI', '454', '265', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(129, 'MALAYSIA', 'Malaysia', 'MY', 'MYS', '458', '60', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(130, 'MALDIVES', 'Maldives', 'MV', 'MDV', '462', '960', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(131, 'MALI', 'Mali', 'ML', 'MLI', '466', '223', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(132, 'MALTA', 'Malta', 'MT', 'MLT', '470', '356', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(133, 'MARSHALL ISLANDS', 'Marshall Islands', 'MH', 'MHL', '584', '692', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(134, 'MARTINIQUE', 'Martinique', 'MQ', 'MTQ', '474', '596', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(135, 'MAURITANIA', 'Mauritania', 'MR', 'MRT', '478', '222', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(136, 'MAURITIUS', 'Mauritius', 'MU', 'MUS', '480', '230', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(137, 'MAYOTTE', 'Mayotte', 'YT', NULL, NULL, '269', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(138, 'MEXICO', 'Mexico', 'MX', 'MEX', '484', '52', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(139, 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FM', 'FSM', '583', '691', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(140, 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MD', 'MDA', '498', '373', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(141, 'MONACO', 'Monaco', 'MC', 'MCO', '492', '377', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(142, 'MONGOLIA', 'Mongolia', 'MN', 'MNG', '496', '976', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(143, 'MONTSERRAT', 'Montserrat', 'MS', 'MSR', '500', '1664', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(144, 'MOROCCO', 'Morocco', 'MA', 'MAR', '504', '212', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(145, 'MOZAMBIQUE', 'Mozambique', 'MZ', 'MOZ', '508', '258', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(146, 'MYANMAR', 'Myanmar', 'MM', 'MMR', '104', '95', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(147, 'NAMIBIA', 'Namibia', 'NA', 'NAM', '516', '264', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(148, 'NAURU', 'Nauru', 'NR', 'NRU', '520', '674', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(149, 'NEPAL', 'Nepal', 'NP', 'NPL', '524', '977', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(150, 'NETHERLANDS', 'Netherlands', 'NL', 'NLD', '528', '31', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(151, 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'AN', 'ANT', '530', '599', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(152, 'NEW CALEDONIA', 'New Caledonia', 'NC', 'NCL', '540', '687', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(153, 'NEW ZEALAND', 'New Zealand', 'NZ', 'NZL', '554', '64', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(154, 'NICARAGUA', 'Nicaragua', 'NI', 'NIC', '558', '505', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(155, 'NIGER', 'Niger', 'NE', 'NER', '562', '227', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(156, 'NIGERIA', 'Nigeria', 'NG', 'NGA', '566', '234', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(157, 'NIUE', 'Niue', 'NU', 'NIU', '570', '683', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(158, 'NORFOLK ISLAND', 'Norfolk Island', 'NF', 'NFK', '574', '672', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(159, 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MP', 'MNP', '580', '1670', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(160, 'NORWAY', 'Norway', 'NO', 'NOR', '578', '47', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(161, 'OMAN', 'Oman', 'OM', 'OMN', '512', '968', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(162, 'PAKISTAN', 'Pakistan', 'PK', 'PAK', '586', '92', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(163, 'PALAU', 'Palau', 'PW', 'PLW', '585', '680', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(164, 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', 'PS', NULL, NULL, '970', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(165, 'PANAMA', 'Panama', 'PA', 'PAN', '591', '507', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(166, 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PG', 'PNG', '598', '675', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(167, 'PARAGUAY', 'Paraguay', 'PY', 'PRY', '600', '595', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(168, 'PERU', 'Peru', 'PE', 'PER', '604', '51', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(169, 'PHILIPPINES', 'Philippines', 'PH', 'PHL', '608', '63', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(170, 'PITCAIRN', 'Pitcairn', 'PN', 'PCN', '612', '0', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(171, 'POLAND', 'Poland', 'PL', 'POL', '616', '48', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(172, 'PORTUGAL', 'Portugal', 'PT', 'PRT', '620', '351', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(173, 'PUERTO RICO', 'Puerto Rico', 'PR', 'PRI', '630', '1787', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(174, 'QATAR', 'Qatar', 'QA', 'QAT', '634', '974', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(175, 'REUNION', 'Reunion', 'RE', 'REU', '638', '262', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(176, 'ROMANIA', 'Romania', 'RO', 'ROM', '642', '40', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(177, 'RUSSIAN FEDERATION', 'Russian Federation', 'RU', 'RUS', '643', '70', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(178, 'RWANDA', 'Rwanda', 'RW', 'RWA', '646', '250', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(179, 'SAINT HELENA', 'Saint Helena', 'SH', 'SHN', '654', '290', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(180, 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KN', 'KNA', '659', '1869', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(181, 'SAINT LUCIA', 'Saint Lucia', 'LC', 'LCA', '662', '1758', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(182, 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'PM', 'SPM', '666', '508', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(183, 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VC', 'VCT', '670', '1784', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(184, 'SAMOA', 'Samoa', 'WS', 'WSM', '882', '684', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(185, 'SAN MARINO', 'San Marino', 'SM', 'SMR', '674', '378', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(186, 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'ST', 'STP', '678', '239', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(187, 'SAUDI ARABIA', 'Saudi Arabia', 'SA', 'SAU', '682', '966', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(188, 'SENEGAL', 'Senegal', 'SN', 'SEN', '686', '221', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(189, 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', 'CS', NULL, NULL, '381', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(190, 'SEYCHELLES', 'Seychelles', 'SC', 'SYC', '690', '248', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(191, 'SIERRA LEONE', 'Sierra Leone', 'SL', 'SLE', '694', '232', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(192, 'SINGAPORE', 'Singapore', 'SG', 'SGP', '702', '65', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(193, 'SLOVAKIA', 'Slovakia', 'SK', 'SVK', '703', '421', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(194, 'SLOVENIA', 'Slovenia', 'SI', 'SVN', '705', '386', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(195, 'SOLOMON ISLANDS', 'Solomon Islands', 'SB', 'SLB', '90', '677', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(196, 'SOMALIA', 'Somalia', 'SO', 'SOM', '706', '252', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(197, 'SOUTH AFRICA', 'South Africa', 'ZA', 'ZAF', '710', '27', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(198, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', 'GS', NULL, NULL, '0', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(199, 'SPAIN', 'Spain', 'ES', 'ESP', '724', '34', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(200, 'SRI LANKA', 'Sri Lanka', 'LK', 'LKA', '144', '94', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(201, 'SUDAN', 'Sudan', 'SD', 'SDN', '736', '249', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(202, 'SURINAME', 'Suriname', 'SR', 'SUR', '740', '597', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(203, 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJ', 'SJM', '744', '47', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(204, 'SWAZILAND', 'Swaziland', 'SZ', 'SWZ', '748', '268', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(205, 'SWEDEN', 'Sweden', 'SE', 'SWE', '752', '46', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(206, 'SWITZERLAND', 'Switzerland', 'CH', 'CHE', '756', '41', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(207, 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SY', 'SYR', '760', '963', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(208, 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TW', 'TWN', '158', '886', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(209, 'TAJIKISTAN', 'Tajikistan', 'TJ', 'TJK', '762', '992', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(210, 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZ', 'TZA', '834', '255', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(211, 'THAILAND', 'Thailand', 'TH', 'THA', '764', '66', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(212, 'TIMOR-LESTE', 'Timor-Leste', 'TL', NULL, NULL, '670', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(213, 'TOGO', 'Togo', 'TG', 'TGO', '768', '228', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(214, 'TOKELAU', 'Tokelau', 'TK', 'TKL', '772', '690', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(215, 'TONGA', 'Tonga', 'TO', 'TON', '776', '676', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(216, 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TT', 'TTO', '780', '1868', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(217, 'TUNISIA', 'Tunisia', 'TN', 'TUN', '788', '216', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(218, 'TURKEY', 'Turkey', 'TR', 'TUR', '792', '90', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(219, 'TURKMENISTAN', 'Turkmenistan', 'TM', 'TKM', '795', '7370', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(220, 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TC', 'TCA', '796', '1649', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(221, 'TUVALU', 'Tuvalu', 'TV', 'TUV', '798', '688', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(222, 'UGANDA', 'Uganda', 'UG', 'UGA', '800', '256', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(223, 'UKRAINE', 'Ukraine', 'UA', 'UKR', '804', '380', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(224, 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'AE', 'ARE', '784', '971', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(225, 'UNITED KINGDOM', 'United Kingdom', 'GB', 'GBR', '826', '44', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(226, 'UNITED STATES', 'United States', 'US', 'USA', '840', '1', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(227, 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', 'UM', NULL, NULL, '1', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(228, 'URUGUAY', 'Uruguay', 'UY', 'URY', '858', '598', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(229, 'UZBEKISTAN', 'Uzbekistan', 'UZ', 'UZB', '860', '998', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(230, 'VANUATU', 'Vanuatu', 'VU', 'VUT', '548', '678', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(231, 'VENEZUELA', 'Venezuela', 'VE', 'VEN', '862', '58', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(232, 'VIET NAM', 'Viet Nam', 'VN', 'VNM', '704', '84', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(233, 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VG', 'VGB', '92', '1284', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(234, 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VI', 'VIR', '850', '1340', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(235, 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WF', 'WLF', '876', '681', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(236, 'WESTERN SAHARA', 'Western Sahara', 'EH', 'ESH', '732', '212', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(237, 'YEMEN', 'Yemen', 'YE', 'YEM', '887', '967', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(238, 'ZAMBIA', 'Zambia', 'ZM', 'ZMB', '894', '260', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(239, 'ZIMBABWE', 'Zimbabwe', 'ZW', 'ZWE', '716', '263', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(240, 'SERBIA', 'Serbia', 'RS', 'SRB', '688', '381', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(241, 'ASIA PACIFIC REGION', 'Asia / Pacific Region', 'AP', '0', '0', '0', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(242, 'MONTENEGRO', 'Montenegro', 'ME', 'MNE', '499', '382', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(243, 'ALAND ISLANDS', 'Aland Islands', 'AX', 'ALA', '248', '358', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(244, 'BONAIRE, SINT EUSTATIUS AND SABA', 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', '535', '599', '2020-02-23 13:27:23', '2020-02-23 13:27:23'),
(245, 'CURACAO', 'Curacao', 'CW', 'CUW', '531', '599', '2020-02-23 13:27:24', '2020-02-23 13:27:24'),
(246, 'GUERNSEY', 'Guernsey', 'GG', 'GGY', '831', '44', '2020-02-23 13:27:24', '2020-02-23 13:27:24'),
(247, 'ISLE OF MAN', 'Isle of Man', 'IM', 'IMN', '833', '44', '2020-02-23 13:27:24', '2020-02-23 13:27:24'),
(248, 'JERSEY', 'Jersey', 'JE', 'JEY', '832', '44', '2020-02-23 13:27:24', '2020-02-23 13:27:24'),
(249, 'KOSOVO', 'Kosovo', 'XK', '---', '0', '381', '2020-02-23 13:27:24', '2020-02-23 13:27:24'),
(250, 'SAINT BARTHELEMY', 'Saint Barthelemy', 'BL', 'BLM', '652', '590', '2020-02-23 13:27:24', '2020-02-23 13:27:24'),
(251, 'SAINT MARTIN', 'Saint Martin', 'MF', 'MAF', '663', '590', '2020-02-23 13:27:24', '2020-02-23 13:27:24'),
(252, 'SINT MAARTEN', 'Sint Maarten', 'SX', 'SXM', '534', '1', '2020-02-23 13:27:24', '2020-02-23 13:27:24'),
(253, 'SOUTH SUDAN', 'South Sudan', 'SS', 'SSD', '728', '211', '2020-02-23 13:27:24', '2020-02-23 13:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `started_at` date NOT NULL,
  `expired_at` date NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usetotal` int(10) UNSIGNED NOT NULL,
  `usecustomer` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Australian Dollar (AUD)', '$', '0.69', 1, '2020-02-23 12:29:44', '2020-02-23 15:35:30'),
(2, 'United States Dollar (USD)', '$', '0.69', 1, '2020-02-23 12:35:33', '2020-02-23 15:35:33'),
(3, 'New Zealand Dollar (NZD)', '$', '1.04', 1, '2020-02-23 12:36:01', '2020-02-23 15:35:35'),
(4, 'European Euro (EUR)', '€', '1.04', 1, '2020-02-23 12:37:39', '2020-02-23 15:35:37'),
(5, 'British Pound (GBP)', '£', '0.52', 1, '2020-02-23 12:38:22', '2020-02-23 15:35:39'),
(6, 'Chinese Yuan Renminbi (CNY)', '¥', '4.70', 1, '2020-02-23 12:39:27', '2020-02-23 15:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double(15,8) DEFAULT 0.00000000,
  `longitude` double(15,8) DEFAULT 0.00000000,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `zipcode`, `latitude`, `longitude`, `status`, `created_at`, `updated_at`) VALUES
(3, 'International Terminal 1, Departure Plaza, Mascot NSW, Australia', '2020', -33.93656510, 151.16625090, 0, '2020-02-25 22:09:49', '2020-02-25 22:09:49'),
(4, 'Domestic Terminal 2, Keith Smith Avenue, Mascot NSW, Australia', '2020', -33.93428010, 151.17933850, 0, '2020-02-25 22:10:31', '2020-02-25 22:10:31'),
(5, 'Domestic Terminal 3, Keith Smith Avenue, Mascot NSW, Australia', '2020', -33.93212190, 151.17873790, 0, '2020-02-25 22:10:48', '2020-02-25 22:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `distances`
--

CREATE TABLE `distances` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distances`
--

INSERT INTO `distances` (`id`, `name`, `unit`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kilometres', 'KM', 1, '2020-02-23 13:14:42', '2020-02-23 15:35:47'),
(2, 'Miles', 'Miles', 1, '2020-02-23 13:17:57', '2020-02-23 15:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Proof of Registration - NSW', 1, '2020-02-26 15:09:35', '2020-02-26 17:41:17'),
(2, 'Third Party Property Damage or Comprehensive Vehicle Insurance (Certificate of Currency) - NSW', 1, '2020-02-26 15:10:03', '2020-02-26 17:41:20'),
(3, 'Current annual Certificate of Roadworthiness from an Authorised Inspection Scheme station (Pink Slip) - NSW', 1, '2020-02-26 15:10:34', '2020-02-26 17:41:23'),
(4, 'Full NSW Drivers Licence (Back) - NSW', 1, '2020-02-26 15:12:56', '2020-02-26 17:41:25'),
(5, 'Current NSW Driving Record. Issued within last 30 days - NSW', 1, '2020-02-26 15:13:32', '2020-02-26 17:41:28'),
(6, 'Full NSW Drivers Licence (Front) with a Passenger Transport Licence Code (PTLC). No less than 12 months old - NSW', 1, '2020-02-26 15:35:53', '2020-02-26 17:41:30'),
(7, 'Identity proof (passport, birth or citizenship certificate) - NSW', 1, '2020-02-26 15:36:31', '2020-02-26 17:41:33'),
(8, 'VEVO Visa Confirmation - NSW', 1, '2020-02-26 15:37:03', '2020-02-26 17:41:35'),
(9, 'Valid police criminal background check (within last 3 months) - NSW', 1, '2020-02-26 15:37:52', '2020-02-26 17:41:38'),
(10, 'Bank account details (BSB, account number)', 1, '2020-02-26 15:38:27', '2020-02-26 17:41:41'),
(11, 'Australia Business Number (ABN)', 1, '2020-02-26 15:39:09', '2020-02-26 17:46:35'),
(12, 'Vehicle models 2010 and above are acceptable - VIC', 1, '2020-02-26 16:03:40', '2020-02-26 17:46:30'),
(13, 'Compulsory third party (CTP) insurance, and have at least third-party property damage insurance - VIC', 1, '2020-02-26 16:04:11', '2020-02-26 17:46:24'),
(14, 'Hire Car License certificate issued by the TSC if the car is a private car - VIC', 1, '2020-02-26 16:04:41', '2020-02-26 17:46:19'),
(15, 'Current annual certificate of roadworthiness (Not required if car manufacturing year is 2018) - VIC', 1, '2020-02-26 16:05:18', '2020-02-26 17:46:13'),
(16, 'Current Victorian driver licence (Front) (full Australian or New Zealand driver licence for six months or more) - VIC', 1, '2020-02-26 16:06:12', '2020-02-26 17:46:07'),
(17, 'Identity Proof (Passport, Birth certificate, citizenship certificate,immigration card) - VIC', 1, '2020-02-26 17:07:21', '2020-02-26 17:46:02'),
(18, 'Driver Accreditation Certificate - VIC', 1, '2020-02-26 17:07:46', '2020-02-26 17:45:55'),
(19, 'Vehicle Registration - NT', 1, '2020-02-26 17:09:31', '2020-02-26 17:45:49'),
(20, 'Vehicle Insurance certificate - NT', 1, '2020-02-26 17:10:18', '2020-02-26 17:45:43'),
(21, 'Commercial Vehicle License - NT', 1, '2020-02-26 17:12:12', '2020-02-26 17:45:36'),
(22, 'Valid full NT driver license (Front) with H Endorsement - NT', 1, '2020-02-26 17:13:43', '2020-02-26 17:45:26'),
(23, 'Valid full NT driver license (Back) - NT', 1, '2020-02-26 17:14:14', '2020-02-26 17:43:31'),
(24, 'Commercial Passenger Vehicle ID card - NT', 1, '2020-02-26 17:14:42', '2020-02-26 17:43:27'),
(25, 'Portrait identification photo - NT', 1, '2020-02-26 17:15:30', '2020-02-26 17:43:23'),
(26, 'Identity proof - for Australian or New Zealand citizens: passport, birth certificate or citizenship certificate - NT', 1, '2020-02-26 17:16:10', '2020-02-26 17:43:19'),
(27, 'For all other nationalities: VEVO visa confirmation PLUS either IMMI Card or Travel Document - NT', 1, '2020-02-26 17:16:42', '2020-02-26 17:43:15'),
(28, 'Vehicle Registration - models 2010 and above are acceptable - TAS', 1, '2020-02-26 17:18:04', '2020-02-26 17:43:12'),
(29, 'Compulsory third party (CTP) insurance - TAS', 1, '2020-02-26 17:21:40', '2020-02-26 17:43:08'),
(30, 'Third-party property damage insurance - TAS', 1, '2020-02-26 17:22:13', '2020-02-26 17:43:04'),
(31, 'Current Tasmanian driver licence (full Australian or New Zealand driver licence for 12 months or more, and over 21 years of Age) - TAS', 1, '2020-02-26 17:23:05', '2020-02-26 17:43:00'),
(32, 'Identity Proof (Passport, Birth certificate, citizenship certificate,immigration card). - TAS', 1, '2020-02-26 17:23:33', '2020-02-26 17:42:55'),
(33, 'Vehicle models 2010 and above are acceptable - WA', 1, '2020-02-26 17:25:02', '2020-02-26 17:42:51'),
(34, 'Insurance policy (at least third party property) - WA', 1, '2020-02-26 17:25:28', '2020-02-26 17:42:45'),
(35, 'PTV(Passenger Transport Vehicle) authorisation - WA', 1, '2020-02-26 17:26:58', '2020-02-26 17:42:41'),
(36, 'Registered with 3F Motor Injury Insurance in Western Australia', 1, '2020-02-26 17:27:30', '2020-02-26 17:42:38'),
(37, 'WA full driver\'s licence (Front) with F or T extension (include approval letter if not printed on licence) - WA', 1, '2020-02-26 17:28:55', '2020-02-26 17:42:33'),
(38, 'WA full driver\'s licence (Back)', 1, '2020-02-26 17:29:09', '2020-02-26 17:42:29'),
(39, 'Identity proof (passport, birth or citizenship certificate) - WA', 1, '2020-02-26 17:29:37', '2020-02-26 17:42:24'),
(40, 'Vehicle models 2010 and above are acceptable - QLD', 1, '2020-02-26 17:36:54', '2020-02-26 17:42:19'),
(41, 'Insurance policy (compulsory third party (CTP) insurance, and have at least third-party property damage insurance) - QLD', 1, '2020-02-26 17:37:28', '2020-02-26 17:42:13'),
(42, 'Booked Hire Service License - QLD', 1, '2020-02-26 17:37:54', '2020-02-26 17:42:09'),
(43, 'Certificate of Inspection - QLD', 1, '2020-02-26 17:38:21', '2020-02-26 17:42:05'),
(44, 'Passenger Transport/Taxi Driver Authorisation or an Interim Transport Authority - QLD', 1, '2020-02-26 17:39:05', '2020-02-26 17:42:00'),
(45, 'Full Driver License (Front) - QLD', 1, '2020-02-26 17:40:27', '2020-02-26 17:41:56'),
(46, 'Full Driver License (Back) - QLD', 1, '2020-02-26 17:40:40', '2020-02-26 17:41:52'),
(47, 'Identity proof (passport, birth or citizenship certificate) - QLD', 1, '2020-02-26 17:41:04', '2020-02-26 17:41:48'),
(48, 'Vehicle models 2010 and above are acceptable - ACT', 1, '2020-02-26 17:47:20', '2020-02-26 17:52:04'),
(49, 'Vehicle Registration - ACT', 1, '2020-02-26 17:47:45', '2020-02-26 17:51:59'),
(50, 'Insurance policy (Comprehensive/Third Party) - ACT', 1, '2020-02-26 17:48:18', '2020-02-26 17:51:53'),
(51, 'Ride Share Vehicle Licence - ACT', 1, '2020-02-26 17:48:47', '2020-02-26 17:51:48'),
(52, 'Roadworthy inspection certificate - ACT', 1, '2020-02-26 17:49:15', '2020-02-26 17:51:42'),
(53, 'Public Vehicle Driver’s Licence (with a D-condition) - ACT', 1, '2020-02-26 17:49:52', '2020-02-26 17:51:36'),
(54, 'Working with Vulnerable People Registration - ACT', 1, '2020-02-26 17:50:14', '2020-02-26 17:51:30'),
(55, 'Identity proof (passport, birth or citizenship certificate) - ACT', 1, '2020-02-26 17:50:40', '2020-02-26 17:51:23'),
(56, 'Rideshare Driver Accreditation - ACT', 1, '2020-02-26 17:51:06', '2020-02-26 17:51:17'),
(57, 'Vehicle registration certificate with CTP insurance class 48 or class 7 - SA', 1, '2020-02-26 17:56:22', '2020-02-26 18:03:35'),
(58, 'Certificate of Currency for the vehicle sd insurance - SA', 1, '2020-02-26 17:56:52', '2020-02-26 18:03:30'),
(59, 'Vehicle inspection report (pink slip) - SA', 1, '2020-02-26 17:58:04', '2020-02-26 18:03:24'),
(60, 'Full SA drivers licence (Front) (not less than 6 months old) - SA', 1, '2020-02-26 17:59:02', '2020-02-26 18:03:16'),
(61, 'Full SA drivers licence (Back) (not less than 6 months old) - SA', 1, '2020-02-26 17:59:31', '2020-02-26 18:03:10'),
(62, 'Driver accreditation with SP category - SA', 1, '2020-02-26 18:00:03', '2020-02-26 18:03:03'),
(63, 'Operator Accreditation for Rideshare - SA', 1, '2020-02-26 18:00:39', '2020-02-26 18:02:58'),
(64, 'Portrait identification photo - SA', 1, '2020-02-26 18:01:04', '2020-02-26 18:02:52'),
(65, 'Identity proof (passport, birth or citizenship certificate) - SA', 1, '2020-02-26 18:01:33', '2020-02-26 18:02:46'),
(66, 'IMMI Card & Travel Document (if not Australian citizen or permanent resident) - SA', 1, '2020-02-26 18:02:00', '2020-02-26 18:02:40'),
(67, 'VEVO visa confirmation - SA', 1, '2020-02-26 18:02:23', '2020-02-26 18:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `document_states`
--

CREATE TABLE `document_states` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `document_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_states`
--

INSERT INTO `document_states` (`id`, `state_id`, `document_ids`, `created_at`, `updated_at`) VALUES
(1, 1, '10,11,48,49,50,51,52,53,54,55,56', '2020-02-26 18:04:57', '2020-02-26 18:04:57'),
(2, 2, '1,2,3,4,5,6,7,8,9,10,11', '2020-02-26 18:05:22', '2020-02-26 18:05:22'),
(3, 3, '10,11,19,20,21,22,23,24,25,26,27', '2020-02-26 18:06:08', '2020-02-26 18:06:08'),
(4, 4, '10,11,40,41,42,43,44,45,46,47', '2020-02-26 18:06:46', '2020-02-26 18:06:46'),
(5, 5, '10,11,57,58,59,60,61,62,63,64,65,66,67', '2020-02-26 18:07:44', '2020-02-26 18:07:44'),
(6, 6, '10,11,28,29,30,31,32', '2020-02-26 18:08:12', '2020-02-26 18:08:12'),
(7, 7, '10,11,12,13,14,15,16,17,18', '2020-02-26 18:11:18', '2020-02-26 18:11:18'),
(8, 8, '10,11,33,34,35,36,37,38,39', '2020-02-26 18:12:03', '2020-02-26 18:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `state_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0,
  `is_login` tinyint(1) NOT NULL DEFAULT 0,
  `is_busy` tinyint(1) NOT NULL DEFAULT 0,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `first_name`, `last_name`, `gender`, `email`, `mobile`, `password`, `abn`, `commission`, `country_id`, `state_id`, `city_id`, `avatar`, `mobile_verified_at`, `email_verified_at`, `verification_code`, `is_online`, `is_login`, `is_busy`, `is_approved`, `remember_token`, `created_at`, `updated_at`, `ip_address`) VALUES
(280, 'Justin', 'Milla', 1, 'justin@turvy.net', '+61417691066', '$2y$10$HnJ9pWvExHAgurtfYysD4eFmrJHQ.FN9x92xgEUki4pWeRTO29eyC', NULL, '20', 13, 2, 9, NULL, '2021-02-19 01:29:31', '2021-02-19 01:34:22', NULL, 0, 0, 0, 0, NULL, '2021-02-19 01:31:09', '2021-02-28 00:35:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_address_details`
--

CREATE TABLE `driver_address_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_banks`
--

CREATE TABLE `driver_banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `bsb_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_documents`
--

CREATE TABLE `driver_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `document_id` int(10) UNSIGNED NOT NULL,
  `document_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiredate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_loyalties`
--

CREATE TABLE `driver_loyalties` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trips_per_day` int(11) NOT NULL,
  `available_days_per_week` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_notes`
--

CREATE TABLE `driver_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_notes`
--

INSERT INTO `driver_notes` (`id`, `created_at`, `updated_at`, `admin_id`, `driver_id`, `note`) VALUES
(2, '2020-11-22 09:17:37', '2020-11-22 09:17:37', 1, 4, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.');

-- --------------------------------------------------------

--
-- Table structure for table `driver_ratings`
--

CREATE TABLE `driver_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `rider_id` int(10) UNSIGNED DEFAULT NULL,
  `rating` double(2,1) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_vehicles`
--

CREATE TABLE `driver_vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `make_id` int(10) UNSIGNED DEFAULT NULL,
  `model_id` int(10) UNSIGNED DEFAULT NULL,
  `servicetype_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_vehicles`
--

INSERT INTO `driver_vehicles` (`id`, `driver_id`, `make_id`, `model_id`, `servicetype_id`, `plate`, `color`, `year`, `front_photo`, `created_at`, `updated_at`) VALUES
(25, 280, 6, 7, '4,5,6,7', 'DHV10M', 'Mineral Silver', '2016', NULL, '2021-02-19 01:31:09', '2021-02-28 00:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `fares`
--

CREATE TABLE `fares` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `servicetype_id` int(10) UNSIGNED NOT NULL,
  `company_commission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_ride_distance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_ride_distance_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_waiting_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waiting_price_per_minute` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_surge_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nsw_gtl_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nsw_ctp_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_ride_minute` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_ride_minute` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fares`
--

INSERT INTO `fares` (`id`, `state_id`, `servicetype_id`, `company_commission`, `base_ride_distance`, `base_ride_distance_charge`, `price_per_unit`, `fee_waiting_time`, `waiting_price_per_minute`, `gst_charge`, `fuel_surge_charge`, `nsw_gtl_charge`, `nsw_ctp_charge`, `booking_charge`, `cancel_charge`, `free_ride_minute`, `price_per_ride_minute`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '20', '4', '15.00', '3.00', '0', '2.00', '10', '0.10', '1.00', '0.10', '0.75', '15.00', '0', '0.90', 0, '2020-02-26 20:00:49', '2020-02-26 20:40:29'),
(2, 2, 2, '20', '4', '15.00', '1.95', '0', '2.00', '10', '0.10', '1.00', '0.10', '0.60', '15.00', '0', '0.75', 0, '2020-02-26 20:44:33', '2020-02-26 20:44:33'),
(3, 2, 3, '20', '4', '15.00', '2.60', '0', '2.00', '10', '0.10', '1.00', '0.10', '0.80', '15.00', '0', '0.85', 0, '2020-02-26 22:35:49', '2020-02-26 22:35:49'),
(4, 2, 4, '20', '5', '25.00', '4.00', '60 secs', '2.20', '10', '0.10', '1.00', '0.10', '0.85', '25.00', '0', '0.95', 0, '2020-02-26 22:40:13', '2020-02-26 22:45:34'),
(5, 2, 5, '20', '5', '25.00', '4.00', '60 secs', '2.20', '10', '0.10', '1.00', '0.10', '0.85', '25.00', '0', '0.95', 0, '2020-02-26 22:42:39', '2020-02-26 22:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_id` int(10) UNSIGNED DEFAULT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `rider_id` int(10) UNSIGNED DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homepages`
--

CREATE TABLE `homepages` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charity_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charity_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workflow_title1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workflow_description1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workflow_title2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workflow_description2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workflow_title3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workflow_description3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workflow_title4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workflow_description4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_caption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `help` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepages`
--

INSERT INTO `homepages` (`id`, `banner_image`, `banner_title`, `banner_description`, `charity_title`, `charity_description`, `workflow_title1`, `workflow_description1`, `workflow_title2`, `workflow_description2`, `workflow_title3`, `workflow_description3`, `workflow_title4`, `workflow_description4`, `footer_caption`, `footer_email`, `footer_address`, `facebook`, `twitter`, `google`, `instagram`, `pinterest`, `linkedin`, `about_image`, `about_title`, `about_description`, `policy`, `terms`, `help`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'We are all in together to find a cure', '<p>Donating to the causes you care about not only benefits the charities themselves, but it can also be deeply rewarding for you too. Millions of people give to charity on a regular basis to support causes they believe in, as well as for the positive effect it has on their own lives. So why is giving to charity so gratifying? Donating to charity is a major mood-booster. The knowledge that you&rsquo;re helping others is hugely empowering and, in turn, can make you feel happier and more fulfilled. Research has identified a link between making a donation to charity and increased activity in the area of the brain that registers pleasure - proving that as the old adage goes, it really is far better to give than to receive. Why we give, a feeling of social conscience was the most widely-given reason to give to charity. Whatever type of charity work they supported, 96% said they felt they had a moral duty to use what they had to help others, a sentiment very much rooted in their personal values and principles. Having the power to improve the lives of others is, to many people, a privilege, and one that comes with its own sense of obligation. Acting on these powerful feelings of responsibility is a great way to reinforce our own personal values and feel like we&rsquo;re living in a way that is true to our own ethical beliefs. Your own charitable donations can inspire your nearest and dearest to give to causes important to them, and could even bring about a family-wide effort to back a charity or charities that have special significance to you as a group. Family giving creates a bond, helping to bolster relationships through a shared goal and raising more money than could otherwise be possible through individual donations. Chances are, many of your family members are already giving to charity, so working together could help you to make even more of a positive impact. We can help your family to set up a family CAF Charitable Trust to make coordinating your donations simple and sustainable.</p>', 'Book in Just 2 Tabs', 'All you need is an email address and phone number to register with Turvy. In cities where Turvy operates, use your rider app or browser to request a ride. Choose the car type you prefer. When a nearby driver-partner accepts your request, your app displays an estimated time of arrival of driver-partner heading to your pickup location.', 'Get a Driver', 'Your app notifies you when the driver-partner is about to arrive. Your app also provides info about the driver-partner with whom you will ride, including first name, vehicle type, vehicle colour and license plate number.', 'Track Your Driver', 'Your trip ends when you arrive at your destination and exit the vehicle. Your fare will be calculated automatically and charged to the payment method like PayPal or Credit Card you’ve linked to your Turvy account.', 'Arrive Safely', 'Immediately after a trip ends, your app will ask you to rate your driver from 1 to 5 Stars. Driver-partners are also invited to rate riders. Turvy’s feedback system is designed to foster a community of respect and accountability for everyone. You can also give your driver a compliment or add a tip in the app.', NULL, 'admin@turvy.net', 'Sydney-Australia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Introduction</p>\r\n\r\n<p>When you use Turvy, you trust us with your information. We are committed to keeping that trust. That starts with helping you understand our privacy practices.</p>\r\n\r\n<p>This policy describes the information we collect, how it is used and shared, and your choices regarding this information. We recommend that you read this along with our <a href=\"https://privacy.uber.com/#faq\">Privacy FAQs</a>, which highlight key points about our privacy practices.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Effective Date</strong>: April 1, 2020</p>\r\n\r\n<p>Data Collections and Uses</p>\r\n\r\n<p>Scope</p>\r\n\r\n<p>SUMMARY</p>\r\n\r\n<p>This policy applies to any users of Turvy&rsquo;s services anywhere in the world, including any users of Turvy&rsquo;s apps, websites, features or other services.</p>\r\n\r\n<p>This policy applies to any users of the services of Turvy or its affiliates anywhere in the world, and to anyone else who contacts Turvy or otherwise submits information to Turvy unless noted below. <strong>This includes those who use Turvy or its affiliates&#39; services to</strong>:</p>\r\n\r\n<ul>\r\n	<li>Request or receive transportation (riders)</li>\r\n	<li>Provide transportation individually or through partner transportation companies (driver-partners)</li>\r\n	<li>Request deliveries of food or other items (delivery recipients)</li>\r\n	<li>Provide delivery services (delivery partners)</li>\r\n	<li>Any other user of Turvy&#39;s services (including apps, websites and API), and anyone else who contacts Turvy or otherwise submits information to Turvy.</li>\r\n</ul>\r\n\r\n<p>The Information We Collect</p>\r\n\r\n<p>SUMMARY</p>\r\n\r\n<p>Turvy collects:</p>\r\n\r\n<ul>\r\n	<li>Information that you provide to Turvy, such as when you create your Turvy account.</li>\r\n	<li>Information created when you use our services, such as location, usage and device information.</li>\r\n	<li>Information from other sources, such as Turvy partners and third parties that use Turvy&rsquo;s API.</li>\r\n</ul>\r\n\r\n<p>Turvy collects the following categories of information:</p>\r\n\r\n<ol>\r\n	<li><strong>Information you provide</strong></li>\r\n</ol>\r\n\r\n<p>This includes information submitted when you:</p>\r\n\r\n<ul>\r\n	<li>Create or update your Turvy account, which depending on your location and the Turvy services you use may include your name, email, phone number, login name and password, address, payment or banking information, government identification numbers, birth date, and photo</li>\r\n	<li>Submit information about your vehicle or insurance (for driver-partners)</li>\r\n	<li>Consent to a background check (for driver-partners where permitted by law)</li>\r\n	<li>Request services through a Turvy app or website</li>\r\n	<li>Contact Turvy, including for customer support</li>\r\n	<li>Contact other Turvy users through our services</li>\r\n	<li>Complete surveys sent to you by Turvy or on behalf of Turvy</li>\r\n	<li>Enable features that require Turvy&#39;s access to your address book or calendar</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li><strong>Information created when you use our services</strong></li>\r\n</ol>\r\n\r\n<p>This includes:</p>\r\n\r\n<ul>\r\n	<li><strong>Location Information</strong></li>\r\n</ul>\r\n\r\n<p>Depending on the Turvy services that you use, and your app settings or device permissions, Turvy may collect your precise or approximate location information as determined through data such as GPS, IP address and Wi-Fi.</p>\r\n\r\n<ul>\r\n	<li>If you are a driver or delivery partner, Turvy collects location information when the Turvy app is running in the foreground (app open and on-screen) or background (app open but not on screen) of your device.</li>\r\n	<li>If you are a rider, Turvy may collect location information when the Turvy app is running in the foreground. In certain regions, Turvy may also collect this information when the Turvy app is running in the background of your device if this collection is enabled through your app settings or device permissions.</li>\r\n	<li>Riders and delivery recipients may use the Turvy app without enabling Turvy to collect their location information. However, this may affect the functionality available on your Turvy app. For example, if you do not enable Turvy to collect your location information, you will have to manually enter your pickup address. In addition, location information will be collected from the driver partner during your trip, even if you have not enabled Turvy to collect your location information.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Transaction Information</strong></li>\r\n</ul>\r\n\r\n<p>We collect transaction details related to your use of our services, including the type of services you requested or provided, date and time the service was provided, amount charged, distance travelled, and other related transaction details. Additionally, if someone uses your promotion code, we may associate your name with that person.</p>\r\n\r\n<ul>\r\n	<li><strong>Usage and Preference Information</strong></li>\r\n</ul>\r\n\r\n<p>We collect information about how you interact with our services, preferences expressed, and settings are chosen. In some cases, we do this through the use of cookies, pixel tags, and similar technologies that create and maintain unique identifiers. To learn more about these technologies, please see our <a href=\"https://www.turvy.net/legal/privacy/cookies\">Cookie Statement</a>.</p>\r\n\r\n<ul>\r\n	<li><strong>Device Information</strong></li>\r\n</ul>\r\n\r\n<p>We may collect information about the devices you use to access our services, including the hardware models, operating systems and versions, software, file names and versions, preferred languages, unique device identifiers, advertising identifiers, serial numbers, device motion information, and mobile network information.</p>\r\n\r\n<ul>\r\n	<li><strong>Log Information</strong></li>\r\n</ul>\r\n\r\n<p>When you interact with our services, we collect server logs, which may include information like device IP address, access dates and times, app features or pages viewed, app crashes and other system activity, type of browser, and the third-party site or service you were using before interacting with our services.</p>\r\n\r\n<ul>\r\n	<li><strong>Calls and text messages</strong></li>\r\n</ul>\r\n\r\n<p>We enable users to call or text each other through Turvy apps. For example, in some countries, we enable driver-partners and riders, and delivery partners and recipients, to call or text each other without disclosing their telephone numbers. To provide this service, Turvy receives some information regarding the calls or texts, including the date and time of the call/text, and the content of the text messages. Turvy may also use this information for customer support services (including to resolve disputes between users), for safety and security purposes, and for analytics.</p>\r\n\r\n<ul>\r\n	<li><strong>Address book and calendar information</strong></li>\r\n</ul>\r\n\r\n<p>If you permit the Turvy app to access the address book on your device, we may collect names and contact information from your address book to facilitate social interactions through our services and for other purposes described in this policy or at the time of consent or collection. If you permit the Turvy app to access the calendar on your device, we collect calendar information such as event title and description, your response (Yes, No, Maybe), date and time, location, and a number of attendees.</p>\r\n\r\n<ol>\r\n	<li><strong>Information from other sources</strong></li>\r\n</ol>\r\n\r\n<p>These may include:</p>\r\n\r\n<ul>\r\n	<li>Users providing feedback, such as ratings or compliments</li>\r\n	<li>Turvy business partners through which you create or access your Turvy accounts, such as payment providers, social media services, on-demand music services, or apps or websites who use Turvy&#39;s APIs or whose API Turvy uses</li>\r\n	<li>Insurance providers (if you are a driver or delivery partner)</li>\r\n	<li>Financial services providers (if you are a driver or delivery partner)</li>\r\n	<li>Partner transportation companies (if you are a driver-partner who uses our services through an account associated with such a company)</li>\r\n	<li>The owner of a Turvy for Business or Turvy Family profile that you use</li>\r\n	<li>Publicly available sources</li>\r\n	<li>Marketing service providers</li>\r\n</ul>\r\n\r\n<p>Turvy may combine the information collected from these sources with other information in its possession.</p>\r\n\r\n<p>How We Use Your Information</p>\r\n\r\n<p>SUMMARY</p>\r\n\r\n<p>Turvy collects and uses the information to enable reliable and convenient transportation, delivery and other products and services. We also use the information we collect:</p>\r\n\r\n<ul>\r\n	<li>To enhance the safety and security of our users and services</li>\r\n	<li>For customer support</li>\r\n	<li>For research and development</li>\r\n	<li>To enable communications to or between users</li>\r\n	<li>To provide promotions or contests</li>\r\n	<li>In connection with legal proceedings</li>\r\n</ul>\r\n\r\n<p>Turvy does not sell or share your personal information to third parties for third-party direct marketing purposes.</p>\r\n\r\n<p>Turvy uses the information it collects for purposes including:</p>\r\n\r\n<ol>\r\n	<li><strong>Providing services and features</strong></li>\r\n</ol>\r\n\r\n<p>Turvy uses the information we collect to provide, personalize, maintain and improve our products and services. <strong>This includes using the information to</strong>:</p>\r\n\r\n<ul>\r\n	<li>Enable transportation, deliveries, and other services</li>\r\n	<li>Process or facilitate payments for those services</li>\r\n	<li>Offer, obtain, provide or facilitate insurance or financing solutions in connection with our services</li>\r\n	<li>Enable features that allow you to share information with other people, such as when you submit a compliment about a driver-partner, refer a friend to Turvy, split fares, or share your ETA</li>\r\n	<li>Enable features to personalize your Turvy account, such as creating bookmarks for your favourite places</li>\r\n	<li>Perform internal operations necessary to provide our services, including to troubleshoot software bugs and operational problems, to conduct data analysis, testing, and research, and to monitor and analyse usage and activity trends</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li><strong>Safety and security</strong></li>\r\n</ol>\r\n\r\n<p>We use your data to help maintain the safety, security and integrity of our services. For example, we collect information from driver-partners&#39; devices to identify unsafe driving behaviours such as speeding or harsh braking and acceleration and to raise awareness among driver partners regarding such behaviours. This also includes, for example, our <a href=\"https://newsroom.turv.net/securityselfies/\">Real-Time ID Check</a> feature, which prompts driver-partners to share a selfie before going online. This helps ensure that the driver-partner using the app matches the Turvy account we have on file, preventing fraud and helping to protect other users.</p>\r\n\r\n<ol>\r\n	<li><strong>Customer support</strong></li>\r\n</ol>\r\n\r\n<p>Turvy uses the information we collect (including recordings of customer support calls after notice to you and with your consent) to assist you when you contact our customer support services, including to:</p>\r\n\r\n<ul>\r\n	<li>Direct your questions to the appropriate customer support person</li>\r\n	<li>Investigate and address your concerns</li>\r\n	<li>Monitor and improve our customer support responses</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li><strong>Research and development</strong></li>\r\n</ol>\r\n\r\n<p>We may use the information we collect for testing, research, analysis and product development. This allows us to improve and enhance the safety and security of our services, develop new features and products, and facilitate insurance and finance solutions in connection with our services.</p>\r\n\r\n<ol>\r\n	<li><strong>Communications among users</strong></li>\r\n</ol>\r\n\r\n<p>Turvy uses the information we collect to enable communications between our users. For example, a driver-partner may text or call a rider to confirm a pickup location, or a restaurant or delivery partner may call a delivery recipient with information about their order.</p>\r\n\r\n<ol>\r\n	<li><strong>Communications from Turvy</strong></li>\r\n</ol>\r\n\r\n<p>Turvy may use the information we collect to communicate with you about products, services, promotions, studies, surveys, news, updates and events. Turvy may also use the information to promote and process contests and sweepstakes, fulfil any related awards and serve you relevant ads and content about our services and those of our business partners. Turvy may also use the information to inform you about elections, ballots, referenda and other political and policy processes that relate to our services.</p>\r\n\r\n<ol>\r\n	<li><strong>Legal proceedings and requirements</strong></li>\r\n</ol>\r\n\r\n<p>We may use the information we collect to investigate or address claims or disputes relating to your use of Turvy&#39;s services, or as otherwise allowed by applicable law.</p>\r\n\r\n<p>Cookies and Third-Party Technologies</p>\r\n\r\n<p>SUMMARY</p>\r\n\r\n<p>Turvy and its partners use cookies and other identification technologies on our apps, websites, emails, and online ads for purposes described in this policy.</p>\r\n\r\n<p>Cookies are small text files that are stored on your browser or device by websites, apps, online media, and advertisements. <strong>Turvy uses cookies and similar technologies for purposes such as</strong>:</p>\r\n\r\n<ul>\r\n	<li>Authenticating users</li>\r\n	<li>Remembering user preferences and settings</li>\r\n	<li>Determining the popularity of content</li>\r\n	<li>Delivering and measuring the effectiveness of advertising campaigns</li>\r\n	<li>Analysing site traffic and trends, and generally understanding the online behaviours and interests of people who interact with our services</li>\r\n</ul>\r\n\r\n<p>We may also allow others to provide audience measurement and analytics services for us, to serve advertisements on our behalf across the Internet, and to track and report on the performance of those advertisements. These entities may use cookies, web beacons, SDKs, and other technologies to identify your device when you visit our site and use our services, as well as when you visit other online sites and services.</p>\r\n\r\n<p>Please see our <a href=\"https://www.turvy.net/legal/privacy/cookies\">Cookie Statement</a> for more information regarding the use of cookies and other technologies described in this section, including regarding your choices relating to such technologies.</p>\r\n\r\n<p>Information Sharing and Disclosure</p>\r\n\r\n<p>SUMMARY</p>\r\n\r\n<p>Some of Turvy&rsquo;s products, services and features require that we share information with other users or at your request. We may also share your information with our affiliates, subsidiaries and business partners, or for legal reasons or in the event of a dispute.</p>\r\n\r\n<p>Turvy may share the information we collect:</p>\r\n\r\n<ol>\r\n	<li><strong>With other users</strong></li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>For example, if you are a rider, we may share your first name, average rider rating given by driver-partners, and pickup and/or drop-off locations with driver-partners.</li>\r\n	<li>If you are a driver or delivery partner, we may share information with your rider(s) including your name and photo; your vehicle makes, model, colour, license plate, and vehicle photo; your location; your average rating provided by riders; and contact information (depending upon applicable laws). If you choose to complete a driver profile, we may also share any information associated with that profile, including information that you submit and compliments that past riders have submitted about you. The rider/delivery recipient will also receive a receipt containing information such as a breakdown of amounts charged, your first name, photo, a map of the route you took, and other transaction details.</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li><strong>At your request</strong></li>\r\n</ol>\r\n\r\n<p>This includes sharing your information with:</p>\r\n\r\n<ul>\r\n	<li>Other people at your request. For example, we may share your ETA and location with a friend at your request, or your trip information when you split a fare with a friend.</li>\r\n	<li>Turvy business partners. For example, if you requested a service through a partnership or promotional offering made by a third party, Turvy may share your information with those third parties. This may include, for example, other apps or websites that integrate with our APIs or services, or those with an API or service with which we integrate, or business partners with whom Turvy may partner with to deliver a promotion, a contest or a specialized service.</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li><strong>With the general public when you submit content to a public forum</strong></li>\r\n</ol>\r\n\r\n<p>We love hearing from our users -- including through public forums such as Turvy blogs, social media, and certain features on our network. When you communicate with us through those channels, your communications may be viewable by the public.</p>\r\n\r\n<ol>\r\n	<li><strong>With the owner of Turvy accounts that you may use</strong></li>\r\n</ol>\r\n\r\n<p>If you use a profile associated with another party we may share your trip information with the owner of that profile.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>This occurs, for example, if you are</strong>:</p>\r\n\r\n<ul>\r\n	<li>A rider using your employer&#39;s Turvy for Business profile</li>\r\n	<li>A driver-partner using an account owned by a partner transportation company</li>\r\n	<li>A rider who takes a trip arranged by a friend or under a Family Profile</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li><strong>With Turvy subsidiaries and affiliates</strong></li>\r\n</ol>\r\n\r\n<p>We share information with our subsidiaries and affiliates to help us provide our services or conduct data processing on our behalf. For example, Turvy may process or store information in the United States on behalf of its international subsidiaries and affiliates.</p>\r\n\r\n<ol>\r\n	<li><strong>With Turvy service providers and business partners</strong></li>\r\n</ol>\r\n\r\n<p>Turvy may provide information to its vendors, consultants, marketing partners, research firms, and other service providers or business partners. For example, Turvy may provide information to such parties to help facilitate insurance coverage, to conduct surveys on our behalf, and to process payments for our services.</p>\r\n\r\n<ol>\r\n	<li><strong>For legal reasons or in the event of a dispute</strong></li>\r\n</ol>\r\n\r\n<p>Turvy may share your information if we believe it is required by applicable law, regulation, operating agreement, legal process or governmental request.</p>\r\n\r\n<ul>\r\n	<li>This includes sharing your information with law enforcement officials, government authorities, or other third parties as necessary to enforce our Terms of Service, user agreements, or other policies, to protect Turvy&#39;s rights or property or the rights or property of others, or in the event of a claim or dispute relating to your use of our services. If you use another person&#39;s credit card, we may be required by law to share information with that credit card holder, including trip information.</li>\r\n	<li>This also includes sharing your information with others in connection with, or during negotiations of, any merger, sale of company assets, consolidation or restructuring, financing, or acquisition of all or a portion of our business by or into another company.</li>\r\n</ul>\r\n\r\n<p>Please see Turvy&#39;s Guidelines for Law Enforcement Authorities for more information.</p>\r\n\r\n<ol>\r\n	<li><strong>With your consent</strong></li>\r\n</ol>\r\n\r\n<p>Turvy may share your information other than as described in this policy if we notify you and you consent to the sharing.</p>\r\n\r\n<p>Information Retention and Deletion</p>\r\n\r\n<p>SUMMARY</p>\r\n\r\n<p>Turvy retains your information while your account remains active unless you request deletion of your information or account. In some cases, we may retain certain information about you as required by law or other purposes as described in this section even if you delete your account.</p>\r\n\r\n<p>Turvy retains your information while your account remains active unless you ask us to delete your information or your account. Subject to the exceptions described below, Turvy deletes or anonymizes your information upon request.</p>\r\n\r\n<p>Subject to applicable law, Turvy may retain information after account deletion:</p>\r\n\r\n<ol>\r\n	<li>If there is an unresolved issue relating to your accounts, such as an outstanding credit on your account or an unresolved claim or dispute;</li>\r\n	<li>If we are required to by applicable law; and/or in aggregated and/or anonymized form.</li>\r\n	<li>Turvy may also retain certain information if necessary for its legitimate business interests, such as fraud prevention and enhancing users&#39; safety and security. For example, if Turvy shuts down a user&#39;s account because of unsafe behaviour or security incidents, Turvy may retain certain information about that account to prevent that user from opening a new Turvy account in the future.</li>\r\n</ol>\r\n\r\n<p>Choice And Transparency</p>\r\n\r\n<p>SUMMARY</p>\r\n\r\n<p>Turvy provides means for you to see and control the information that Turvy collects, including through:</p>\r\n\r\n<ul>\r\n	<li>In-app privacy settings</li>\r\n	<li>Device permissions</li>\r\n	<li>In-app rating pages</li>\r\n	<li>Marketing opt-outs</li>\r\n</ul>\r\n\r\n<p><strong>Privacy Settings</strong></p>\r\n\r\n<p>The Privacy Settings menu in the Turvy rider app gives users the ability to set or update their location and contacts sharing preferences, and their preferences for receiving mobile notifications from Turvy. Riders can also delete their Turvy account from the Privacy Settings menu.</p>\r\n\r\n<p><strong>Device Permissions</strong></p>\r\n\r\n<p>Most mobile platforms (iOS, Android, etc.) have defined certain types of device data that apps cannot access without your consent. And these platforms have different permission systems for obtaining your consent. The iOS platform will alert you the first time the Turvy app wants permission to access certain types of data and will let you consent (or not consent) to that request. Android devices will notify you of the permissions that the Turvy app seeks before you first use the app, and your use of the app constitutes your consent.</p>\r\n\r\n<p><strong>Rating Look-Up</strong></p>\r\n\r\n<p>After every trip, driver-partners and riders are able to rate each other, as well as give feedback on how the trip went. This two-way system holds everyone accountable for their behaviour. Accountability helps create a respectful, safe environment for both driver-partners and riders. Your rider rating is available in the main menu of the Turvy rider app. Your driver-partner rating is available in the Rating tab of the Turvy Partner app.</p>\r\n\r\n<p><strong>Accessing and Correcting Your Information</strong></p>\r\n\r\n<p>You can edit the name, phone number and email address associated with your account through the Settings menu in Turvy&#39;s apps. You can also lookup your trips, orders and deliveries history in the Turvy apps.</p>\r\n\r\n<p><strong>Marketing Opt-Outs</strong></p>\r\n\r\n<p>You may opt-out of receiving promotional emails from Turvy <a href=\"https://www.turvy.net/unsubscribe/\">here</a>. You may also opt-out of receiving emails and other messages from Turvy by following the instructions in those messages. Please note that if you are opt-out, we may still send you non-promotional messages, such as receipts for your rides or information about your account.</p>\r\n\r\n<p>Updates to This Policy</p>\r\n\r\n<p>SUMMARY</p>\r\n\r\n<p>We may occasionally update this policy. If you use our services after an update, you consent to the updated policy.</p>\r\n\r\n<p>We may occasionally update this policy. If we make significant changes, we will notify you of the changes through the Turvy apps or through others means, such as email. To the extent permitted under applicable law, by using our services after such notice, you consent to our updates to this policy.</p>\r\n\r\n<p>We encourage you to periodically review this policy for the latest information on our privacy practices. We will also make prior versions of our privacy policies available for review</p>', NULL, NULL, '2020-02-23 17:40:49', '2020-04-01 13:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_emails`
--

CREATE TABLE `invoice_emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `rider_id` int(10) UNSIGNED DEFAULT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `lat` double(15,8) NOT NULL,
  `lng` double(15,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(189, '2014_10_12_100000_create_password_resets_table', 1),
(190, '2020_01_02_100714_create_currencies_table', 1),
(191, '2020_01_02_103158_create_distances_table', 1),
(192, '2020_01_03_035412_create_countries_table', 1),
(193, '2020_01_03_104521_create_states_table', 1),
(194, '2020_01_03_164406_create_cities_table', 1),
(195, '2020_01_04_044650_create_admins_table', 1),
(196, '2020_01_04_044708_create_drivers_table', 1),
(197, '2020_01_04_044728_create_partners_table', 1),
(198, '2020_01_04_174654_create_users_table', 1),
(199, '2020_01_04_175506_create_vehicle_makes_table', 1),
(200, '2020_01_05_044756_create_vehicle_types_table', 1),
(201, '2020_01_05_083140_create_vehicle_models_table', 1),
(202, '2020_01_15_191211_create_vehicle_ride_types_table', 1),
(203, '2020_01_17_014926_create_fares_table', 1),
(204, '2020_01_18_030427_create_peaktimes_table', 1),
(205, '2020_01_18_045755_create_nighttimes_table', 1),
(206, '2020_01_20_011325_create_driver_vehicles_table', 1),
(207, '2020_01_20_142557_create_partner_contacts_table', 1),
(208, '2020_01_20_173446_create_partner_banks_table', 1),
(209, '2020_01_21_031138_create_documents_table', 1),
(210, '2020_01_21_033329_create_document_states_table', 1),
(211, '2020_01_21_090946_create_homepages_table', 1),
(212, '2020_01_22_131742_create_comments_table', 1),
(213, '2020_01_23_005303_create_payments_table', 1),
(214, '2020_01_23_007841_create_coupons_table', 1),
(215, '2020_01_23_014313_create_appointments_table', 1),
(216, '2020_01_23_042023_create_payment_requests_table', 1),
(217, '2020_01_23_060840_create_feedback_table', 1),
(218, '2020_01_23_083758_create_driver_address_details_table', 1),
(219, '2020_01_23_091728_create_driver_documents_table', 1),
(220, '2020_01_23_094740_create_driver_banks_table', 1),
(221, '2020_01_27_023539_create_locations_table', 1),
(222, '2020_01_27_035557_create_sos_contacts_table', 1),
(223, '2020_01_27_035643_create_sos_requests_table', 1),
(224, '2020_01_27_054249_create_ads_table', 1),
(225, '2020_01_29_162659_create_notifications_table', 1),
(226, '2020_02_01_085308_create_driver_ratings_table', 1),
(227, '2020_02_01_085403_create_rider_ratings_table', 1),
(228, '2020_02_01_134856_create_transactions_table', 1),
(229, '2020_02_01_141844_create_settings_table', 1),
(230, '2020_02_01_193450_create_cancelreasons_table', 1),
(231, '2020_02_02_035630_create_signup_emails_table', 1),
(232, '2020_02_02_044216_create_invoice_emails_table', 1),
(233, '2020_02_11_091557_create_permission_tables', 1),
(234, '2020_02_12_101125_create_rider_rewards_table', 1),
(235, '2020_02_12_101244_create_driver_loyalties_table', 1),
(236, '2020_11_20_191013_create_driver_notes_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Admin', 1),
(2, 'App\\Admin', 3),
(3, 'App\\Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nighttimes`
--

CREATE TABLE `nighttimes` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `starttime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endtime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charges_type_id` int(10) UNSIGNED NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `user_type` int(10) UNSIGNED NOT NULL,
  `receiver_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `heading`, `content`, `url`, `image`, `type`, `user_type`, `receiver_ids`, `created_at`, `updated_at`) VALUES
(1, 'Remoovit Webiste has launched soon.', 'We are planning to launch Remoovit website within 2 weeks.', NULL, NULL, 1, 2, '2,3,4', '2020-11-22 09:51:41', '2020-11-22 09:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `state_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `first_name`, `last_name`, `gender`, `username`, `email`, `mobile`, `password`, `organization`, `url`, `avatar`, `country_id`, `state_id`, `city_id`, `address`, `zipcode`, `description`, `email_verified_at`, `mobile_verified_at`, `is_approved`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Huang', 'XiaoXuan', 1, 'huangxiaoxuan', 'huangxiaoxuan0621@gmail.com', '17093529589', '$2y$10$Sa2uPd4SbNIpzVVnV2ObbeGrWlUrU1oiKaN5HWerZ0Jmg6MtEpiKK', 'D-Origami', 'd-origami.com', 'uploads/user/partner/14501093c2a53ee701e59c27f9918d067ea9623d.jpg', 13, 2, 4, NULL, NULL, 'test', NULL, NULL, 0, NULL, '2020-02-26 05:46:45', '2020-02-26 05:46:45'),
(8, 'Justin', 'Milla', 1, 'justin', 'admin@turvy.net', '+61417691066', '$2y$10$wk.PUZspn4fNOElEy73ggutv9Xi8ZcALnK3JRZh0L5I3vKI7aTkOa', 'Prostate Cancer', 'turvyfamily.org', 'uploads/user/partner/3fb37aefeb5e0846f979332cd96c29db8bc99f23.png', 13, 2, 2, NULL, NULL, 'Help', NULL, NULL, 1, NULL, '2020-03-01 20:28:51', '2020-03-01 20:29:04'),
(9, 'Justin', 'Milla', 1, 'admin', 'admin@turvy.net', '+61417691066', '$2y$10$IZkiEkuhFdZTx78XFjpdieLy8D9pKHlNBGquCk2U/bNGwuAJXI4zi', 'Children\'s Hospital', 'turvyfamily.org', 'uploads/user/partner/141e0b58d02b888acc31955b92804129ea7f9cb3.png', 13, 2, 2, NULL, NULL, 'Need help', NULL, NULL, 1, NULL, '2020-03-03 20:55:14', '2020-07-03 00:10:59'),
(10, 'Justin', 'Milla', 1, 'Breast', 'admin@turvy.net', '+61417691066', '$2y$10$h62Dkgt5Pb6l37v/Tcc19OfYcw5B1wsgAMP/FgcNgQOpxyGTj36qW', 'Breast Cancer', 'turvyfamily.org', 'uploads/user/partner/d3b273af35c3a95a203d2fce55c9562f70dee021.png', 13, 2, 2, NULL, NULL, 'Help', NULL, NULL, 1, NULL, '2020-03-03 20:59:24', '2020-03-03 20:59:42'),
(11, 'Justin', 'Milla', 1, 'jkmilla', 'admin@turvy.net', '+61417691066', '$2y$10$01PeGBS.R.G7hQbv/l6.letnJHcwnGDiCf.m//p0lWMo8OZEZ4g26', 'Heart', 'turvyfamily.org', 'uploads/user/partner/850fa7bf8155462ac184145da5b0004c7ef403b9.png', 13, 2, 9, NULL, NULL, 'Help', NULL, NULL, 1, NULL, '2020-04-01 13:36:56', '2020-04-01 13:39:40'),
(12, 'Justin', 'Milla', 1, 'jkmilla1', 'admin@turvy.net', '+61417691066', '$2y$10$gGKyMTe3k13c7jQNfHLwT.Ly.IiQer09bOhtOuo4EH8ZbZe4RxAHu', 'Alzheimer\'s and Dementia', 'turvyfamily.org', 'uploads/user/partner/1eb776ad5650ab997bddfcf63b58481509d49adf.png', 13, 2, 9, NULL, NULL, 'Help', NULL, NULL, 1, NULL, '2020-04-01 13:43:23', '2020-04-01 13:43:55'),
(13, 'Justin', 'Milla', 1, 'jkmilla2', 'admin@turvy.net', '+61417691066', '$2y$10$RkqQRLcKW2rwgFDi0w.if.kNFGRIhBH5G0ZkqGo/UfnziKf8RXhXW', 'Leukemia', 'turvyfamily.org', 'uploads/user/partner/5c4e400910d3bebeb2823fb5f3884b99cebd9f82.png', 13, 2, 9, NULL, NULL, 'Help', NULL, NULL, 1, NULL, '2020-04-01 13:46:23', '2020-04-01 13:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `partner_banks`
--

CREATE TABLE `partner_banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bsb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner_contacts`
--

CREATE TABLE `partner_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(10) UNSIGNED NOT NULL,
  `skype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dribble` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@turvy.net', '$2y$10$fbxBWHKes9b9UNJC1VJA8ecn59YH81wFmCm16Ulpy3Gl.sH1tHvzm', '2020-03-10 18:59:48'),
('admin@5starsplus.net', '$2y$10$0VI7EDyk50DNZzUGf0uGZupDb1SBRELSLEHgSg62FCOgJoHI9qacS', '2020-07-28 12:33:34'),
('justin@millas.com.au', '$2y$10$WT0GuiZNyhi1jMzME/zEwO/FA50aVqSBi0JVAEF0FQ64rHy3NMRrm', '2021-02-19 02:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', 'uploads/payment/c29a4167f892826f8b8853978d3812d9ee48dda3.jpg', 0, '2020-02-23 13:19:44', '2020-11-22 08:41:13'),
(2, 'Credit Card', 'uploads/payment/b1049ae6e7a90f3f8383e463930f91eaf12bd2e8.png', 0, '2020-02-23 13:19:58', '2020-11-22 08:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `payment_requests`
--

CREATE TABLE `payment_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `rider_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `appointment_id` int(10) UNSIGNED DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peaktimes`
--

CREATE TABLE `peaktimes` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_one_starttime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_one_endtime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_two_starttime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_two_endtime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charges_type_id` int(10) UNSIGNED NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'role-management', 'admin', 0, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(2, 'role-list', 'admin', 1, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(3, 'role-create', 'admin', 1, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(4, 'role-edit', 'admin', 1, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(5, 'role-delete', 'admin', 1, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(6, 'advertise-management', 'admin', 0, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(7, 'advertise-list', 'admin', 6, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(8, 'advertise-create', 'admin', 6, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(9, 'advertise-edit', 'admin', 6, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(10, 'advertise-delete', 'admin', 6, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(11, 'airport-management', 'admin', 0, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(12, 'airport-list', 'admin', 11, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(13, 'airport-create', 'admin', 11, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(14, 'airport-edit', 'admin', 11, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(15, 'airport-delete', 'admin', 11, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(16, 'airport-pricing-management', 'admin', 0, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(17, 'airportpricing-list', 'admin', 16, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(18, 'airportpricing-create', 'admin', 16, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(19, 'airportpricing-edit', 'admin', 16, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(20, 'airportpricing-delete', 'admin', 16, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(21, 'currency-management', 'admin', 0, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(22, 'currency-list', 'admin', 21, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(23, 'currency-create', 'admin', 21, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(24, 'currency-edit', 'admin', 21, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(25, 'currency-delete', 'admin', 21, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(26, 'distance-management', 'admin', 0, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(27, 'distance-list', 'admin', 26, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(28, 'distance-create', 'admin', 26, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(29, 'distance-edit', 'admin', 26, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(30, 'distance-delete', 'admin', 26, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(31, 'payment-method-management', 'admin', 0, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(32, 'payment-list', 'admin', 31, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(33, 'payment-create', 'admin', 31, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(34, 'payment-edit', 'admin', 31, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(35, 'payment-delete', 'admin', 31, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(36, 'booking-management', 'admin', 0, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(37, 'booking-list', 'admin', 36, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(38, 'booking-create', 'admin', 36, '2020-02-29 03:05:30', '2020-02-29 03:05:30'),
(39, 'cancel-reason-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(40, 'cancelreason-list', 'admin', 39, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(41, 'cancelreason-create', 'admin', 39, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(42, 'cancelreason-edit', 'admin', 39, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(43, 'cancelreason-delete', 'admin', 39, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(44, 'charge-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(45, 'charge-list', 'admin', 44, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(46, 'charge-create', 'admin', 44, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(47, 'charge-edit', 'admin', 44, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(48, 'charge-delete', 'admin', 44, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(49, 'peaktime-charge-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(50, 'peaktime-list', 'admin', 49, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(51, 'peaktime-create', 'admin', 49, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(52, 'peaktime-edit', 'admin', 49, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(53, 'peaktime-delete', 'admin', 49, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(54, 'nighttime-charge-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(55, 'nighttime-list', 'admin', 54, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(56, 'nighttime-create', 'admin', 54, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(57, 'nighttime-edit', 'admin', 54, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(58, 'nighttime-delete', 'admin', 54, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(59, 'cms-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(60, 'banner', 'admin', 59, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(61, 'charity', 'admin', 59, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(62, 'about', 'admin', 59, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(63, 'home', 'admin', 59, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(64, 'policy', 'admin', 59, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(65, 'social', 'admin', 59, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(66, 'terms', 'admin', 59, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(67, 'comment-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(68, 'comment-list', 'admin', 67, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(69, 'comment-create', 'admin', 67, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(70, 'comment-edit', 'admin', 67, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(71, 'comment-delete', 'admin', 67, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(72, 'coupon-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(73, 'coupon-list', 'admin', 72, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(74, 'coupon-create', 'admin', 72, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(75, 'coupon-edit', 'admin', 72, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(76, 'coupon-delete', 'admin', 72, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(77, 'airport-destination-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(78, 'destination-list', 'admin', 77, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(79, 'destination-create', 'admin', 77, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(80, 'destination-edit', 'admin', 77, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(81, 'destination-delete', 'admin', 77, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(82, 'document-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(83, 'document-list', 'admin', 82, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(84, 'document-create', 'admin', 82, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(85, 'document-edit', 'admin', 82, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(86, 'document-delete', 'admin', 82, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(87, 'document-state-relation-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(88, 'documentstate-list', 'admin', 87, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(89, 'documentstate-create', 'admin', 87, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(90, 'documentstate-edit', 'admin', 87, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(91, 'documentstate-delete', 'admin', 87, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(92, 'driver-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(93, 'driver-list', 'admin', 92, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(94, 'driver-create', 'admin', 92, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(95, 'driver-edit', 'admin', 92, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(96, 'driver-delete', 'admin', 92, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(97, 'email-template-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(98, 'signup', 'admin', 97, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(99, 'invoice', 'admin', 97, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(100, 'feedback-management', 'admin', 0, '2020-02-29 03:05:31', '2020-02-29 03:05:31'),
(101, 'feedback-list', 'admin', 100, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(102, 'feedback-delete', 'admin', 100, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(103, 'vehicle-make-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(104, 'vehiclemake-list', 'admin', 103, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(105, 'vehiclemake-create', 'admin', 103, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(106, 'vehiclemake-edit', 'admin', 103, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(107, 'vehiclemake-delete', 'admin', 103, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(108, 'vehicle-model-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(109, 'vehiclemodel-list', 'admin', 108, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(110, 'vehiclemodel-create', 'admin', 108, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(111, 'vehiclemodel-edit', 'admin', 108, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(112, 'vehiclemodel-delete', 'admin', 108, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(113, 'vehicle-type-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(114, 'vehicletype-list', 'admin', 113, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(115, 'vehicletype-create', 'admin', 113, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(116, 'vehicletype-edit', 'admin', 113, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(117, 'vehicletype-delete', 'admin', 113, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(118, 'ride-type-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(119, 'ridetype-list', 'admin', 118, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(120, 'ridetype-create', 'admin', 118, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(121, 'ridetype-edit', 'admin', 118, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(122, 'ridetype-delete', 'admin', 118, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(123, 'notification-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(124, 'notification-list', 'admin', 123, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(125, 'notification-create', 'admin', 123, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(126, 'partner-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(127, 'partner-list', 'admin', 126, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(128, 'partner-create', 'admin', 126, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(129, 'partner-edit', 'admin', 126, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(130, 'partner-delete', 'admin', 126, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(131, 'rider-reward-point-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(132, 'riderreward-list', 'admin', 131, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(133, 'riderreward-create', 'admin', 131, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(134, 'riderreward-edit', 'admin', 131, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(135, 'riderreward-delete', 'admin', 131, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(136, 'driver-loyalty-point-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(137, 'driverloyalty-list', 'admin', 136, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(138, 'driverloyalty-create', 'admin', 136, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(139, 'driverloyalty-edit', 'admin', 136, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(140, 'driverloyalty-delete', 'admin', 136, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(141, 'queue-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(142, 'queue-list', 'admin', 141, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(143, 'queue-delete', 'admin', 141, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(144, 'driver-rating-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(145, 'driverrating-list', 'admin', 144, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(146, 'driverrating-approve', 'admin', 144, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(147, 'rider-rating-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(148, 'riderrating-list', 'admin', 147, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(149, 'riderrating-approve', 'admin', 147, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(150, 'country-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(151, 'country-list', 'admin', 150, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(152, 'country-create', 'admin', 150, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(153, 'country-edit', 'admin', 150, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(154, 'country-delete', 'admin', 150, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(155, 'state-management', 'admin', 0, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(156, 'state-list', 'admin', 155, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(157, 'state-create', 'admin', 155, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(158, 'state-edit', 'admin', 155, '2020-02-29 03:05:32', '2020-02-29 03:05:32'),
(159, 'state-delete', 'admin', 155, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(160, 'city-management', 'admin', 0, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(161, 'city-list', 'admin', 160, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(162, 'city-create', 'admin', 160, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(163, 'city-edit', 'admin', 160, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(164, 'city-delete', 'admin', 160, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(165, 'ride-management', 'admin', 0, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(166, 'activeride-list', 'admin', 165, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(167, 'activeride-edit', 'admin', 165, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(168, 'completedride-list', 'admin', 165, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(169, 'rider-management', 'admin', 0, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(170, 'rider-list', 'admin', 169, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(171, 'rider-create', 'admin', 169, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(172, 'rider-edit', 'admin', 169, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(173, 'rider-delete', 'admin', 169, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(174, 'settings-management', 'admin', 0, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(175, 'settings', 'admin', 174, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(176, 'sos-contact-management', 'admin', 0, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(177, 'soscontact-list', 'admin', 176, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(178, 'soscontact-create', 'admin', 176, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(179, 'soscontact-edit', 'admin', 176, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(180, 'soscontact-delete', 'admin', 176, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(181, 'sos-request-management', 'admin', 0, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(182, 'sosrequest-list', 'admin', 181, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(183, 'sosrequest-delete', 'admin', 181, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(184, 'mapview-management', 'admin', 0, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(185, 'usermap', 'admin', 184, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(186, 'drivermap', 'admin', 184, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(187, 'driverairport', 'admin', 184, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(188, 'heatmap', 'admin', 184, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(189, 'super-admin-management', 'admin', 0, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(190, 'superadmin-list', 'admin', 189, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(191, 'superadmin-create', 'admin', 189, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(192, 'superadmin-edit', 'admin', 189, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(193, 'superadmin-delete', 'admin', 189, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(194, 'sub-admin-management', 'admin', 0, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(195, 'subadmin-list', 'admin', 194, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(196, 'subadmin-create', 'admin', 194, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(197, 'subadmin-edit', 'admin', 194, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(198, 'subadmin-delete', 'admin', 194, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(199, 'transaction-management', 'admin', 0, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(200, 'transaction-list', 'admin', 199, '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(201, 'driver-note-delete', 'admin', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `queues`
--

CREATE TABLE `queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `airport_id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `priority_time` datetime NOT NULL,
  `enterance_time` datetime NOT NULL,
  `last_sync` datetime NOT NULL,
  `leave_time` datetime DEFAULT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `is_alive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rider_cancelreasons`
--

CREATE TABLE `rider_cancelreasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rider_ratings`
--

CREATE TABLE `rider_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `rider_id` int(10) UNSIGNED NOT NULL,
  `rating` double(2,1) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rider_rewards`
--

CREATE TABLE `rider_rewards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_amount` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rider_rewards`
--

INSERT INTO `rider_rewards` (`id`, `name`, `start_amount`, `point`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Rider\'s Reward Point', 15, 4, 1, '2020-03-12 19:19:59', '2020-03-12 19:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `ride_requests`
--

CREATE TABLE `ride_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2020-02-29 03:05:33', '2020-02-29 03:05:33'),
(2, 'fanghuatemg0621@gmail.com', 'admin', '2020-02-29 04:38:59', '2020-02-29 04:38:59'),
(3, 'justin@turvy.net', 'admin', '2020-07-03 00:14:43', '2020-07-03 00:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(18, 3),
(19, 1),
(19, 3),
(20, 1),
(20, 3),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 3),
(26, 1),
(26, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(31, 3),
(32, 1),
(32, 3),
(33, 1),
(33, 3),
(34, 1),
(34, 3),
(35, 1),
(35, 3),
(36, 1),
(36, 3),
(37, 1),
(37, 3),
(38, 1),
(38, 3),
(39, 1),
(39, 3),
(40, 1),
(40, 3),
(41, 1),
(41, 3),
(42, 1),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(45, 3),
(46, 1),
(46, 3),
(47, 1),
(47, 3),
(48, 1),
(48, 3),
(49, 1),
(49, 3),
(50, 1),
(50, 3),
(51, 1),
(51, 3),
(52, 1),
(52, 3),
(53, 1),
(53, 3),
(54, 1),
(54, 3),
(55, 1),
(55, 3),
(56, 1),
(56, 3),
(57, 1),
(57, 3),
(58, 1),
(58, 3),
(59, 1),
(59, 3),
(60, 1),
(60, 3),
(61, 1),
(61, 3),
(62, 1),
(62, 3),
(63, 1),
(63, 3),
(64, 1),
(64, 3),
(65, 1),
(65, 3),
(66, 1),
(66, 3),
(67, 1),
(67, 3),
(68, 1),
(68, 3),
(69, 1),
(69, 3),
(70, 1),
(70, 3),
(71, 1),
(71, 3),
(72, 1),
(72, 3),
(73, 1),
(73, 3),
(74, 1),
(74, 3),
(75, 1),
(75, 3),
(76, 1),
(76, 3),
(77, 1),
(77, 3),
(78, 1),
(78, 3),
(79, 1),
(79, 3),
(80, 1),
(80, 3),
(81, 1),
(81, 3),
(82, 1),
(82, 3),
(83, 1),
(83, 3),
(84, 1),
(84, 3),
(85, 1),
(85, 3),
(86, 1),
(86, 3),
(87, 1),
(87, 3),
(88, 1),
(88, 3),
(89, 1),
(89, 3),
(90, 1),
(90, 3),
(91, 1),
(91, 3),
(92, 1),
(92, 3),
(93, 1),
(93, 3),
(94, 1),
(94, 3),
(95, 1),
(95, 3),
(96, 1),
(96, 3),
(97, 1),
(97, 3),
(98, 1),
(98, 3),
(99, 1),
(99, 3),
(100, 1),
(100, 3),
(101, 1),
(101, 3),
(102, 1),
(102, 3),
(103, 1),
(103, 3),
(104, 1),
(104, 3),
(105, 1),
(105, 3),
(106, 1),
(106, 3),
(107, 1),
(107, 3),
(108, 1),
(108, 3),
(109, 1),
(109, 3),
(110, 1),
(110, 3),
(111, 1),
(111, 3),
(112, 1),
(112, 3),
(113, 1),
(113, 3),
(114, 1),
(114, 3),
(115, 1),
(115, 3),
(116, 1),
(116, 3),
(117, 1),
(117, 3),
(118, 1),
(118, 3),
(119, 1),
(119, 3),
(120, 1),
(120, 3),
(121, 1),
(121, 3),
(122, 1),
(122, 3),
(123, 1),
(123, 3),
(124, 1),
(124, 3),
(125, 1),
(125, 3),
(126, 1),
(126, 3),
(127, 1),
(127, 3),
(128, 1),
(128, 3),
(129, 1),
(129, 3),
(130, 1),
(130, 3),
(131, 1),
(131, 3),
(132, 1),
(132, 3),
(133, 1),
(133, 3),
(134, 1),
(134, 3),
(135, 1),
(135, 3),
(136, 1),
(136, 3),
(137, 1),
(137, 3),
(138, 1),
(138, 3),
(139, 1),
(139, 3),
(140, 1),
(140, 3),
(141, 1),
(141, 3),
(142, 1),
(142, 3),
(143, 1),
(143, 3),
(144, 1),
(144, 3),
(145, 1),
(145, 3),
(146, 1),
(146, 3),
(147, 1),
(147, 3),
(148, 1),
(148, 3),
(149, 1),
(149, 3),
(150, 1),
(150, 3),
(151, 1),
(151, 3),
(152, 1),
(152, 3),
(153, 1),
(153, 3),
(154, 1),
(154, 3),
(155, 1),
(155, 3),
(156, 1),
(156, 3),
(157, 1),
(157, 3),
(158, 1),
(158, 3),
(159, 1),
(159, 3),
(160, 1),
(160, 3),
(161, 1),
(161, 3),
(162, 1),
(162, 3),
(163, 1),
(163, 3),
(164, 1),
(164, 3),
(165, 1),
(165, 3),
(166, 1),
(166, 3),
(167, 1),
(167, 3),
(168, 1),
(168, 3),
(169, 1),
(169, 3),
(170, 1),
(170, 3),
(171, 1),
(171, 3),
(172, 1),
(172, 3),
(173, 1),
(173, 3),
(174, 1),
(174, 3),
(175, 1),
(175, 3),
(176, 1),
(176, 3),
(177, 1),
(177, 3),
(178, 1),
(178, 3),
(179, 1),
(179, 3),
(180, 1),
(180, 3),
(181, 1),
(181, 3),
(182, 1),
(182, 3),
(183, 1),
(183, 3),
(184, 1),
(184, 3),
(185, 1),
(185, 3),
(186, 1),
(186, 3),
(187, 1),
(187, 3),
(188, 1),
(188, 3),
(189, 1),
(189, 3),
(190, 1),
(190, 3),
(191, 1),
(191, 3),
(192, 1),
(192, 3),
(193, 1),
(193, 3),
(194, 1),
(194, 3),
(195, 1),
(195, 3),
(196, 1),
(196, 3),
(197, 1),
(197, 3),
(198, 1),
(198, 3),
(199, 1),
(199, 3),
(200, 1),
(200, 3),
(201, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Turvy', '2020-02-25 00:35:52', '2020-02-25 00:35:52'),
(2, 'driver_timeout', '15', '2020-02-25 00:35:52', '2020-03-12 21:01:47'),
(3, 'search_radius', '2', '2020-02-25 00:35:52', '2020-02-25 00:35:52'),
(4, 'paypal_client_id', NULL, '2020-02-25 00:35:52', '2020-02-25 00:35:52'),
(5, 'paypal_secret', NULL, '2020-02-25 00:35:52', '2020-02-25 00:35:52'),
(6, 'twilio_sid', NULL, '2020-02-25 00:35:52', '2020-02-25 00:35:52'),
(7, 'twilio_token', NULL, '2020-02-25 00:35:52', '2020-02-25 00:35:52'),
(8, 'twilio_from', NULL, '2020-02-25 00:35:52', '2020-02-25 00:35:52'),
(9, 'google_api_key', 'AIzaSyAqe131029l6anIFzR1hcgJ6XN-iqDwcSw', '2020-02-25 00:35:52', '2020-07-02 23:39:45'),
(10, 'fcm_server_key', NULL, '2020-02-25 00:35:52', '2020-02-25 00:35:52'),
(11, 'fcm_sender_id', NULL, '2020-02-25 00:35:52', '2020-02-25 00:35:52'),
(12, 'admin_email_address', 'admin@turvy.net', '2020-02-25 00:35:52', '2020-02-25 00:35:52'),
(13, 'support_email_address', 'support@turvy.net', '2020-02-25 00:35:52', '2020-02-25 00:35:52'),
(14, 'site_logo', 'uploads/logo/9c87b131c17f229fa75c56a1ab1cd76d9df89349.png', '2020-02-26 22:50:25', '2020-02-26 22:50:25'),
(15, 'site_favicon', 'uploads/logo/38d9d37814617bad92b58ec8ea5cf428afe5e925.png', '2020-02-26 22:50:43', '2020-02-26 22:50:43'),
(16, 'site_footer_logo', 'uploads/logo/223996999dd8b57d3e5a8af73650da74663b6edd.png', '2020-02-26 22:51:28', '2020-02-26 22:51:28'),
(17, 'email_logo', 'uploads/logo/c05e2b959f11af69e8ea8d05f8cc1764371dddf2.png', '2020-02-26 22:51:47', '2020-02-26 22:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `signup_emails`
--

CREATE TABLE `signup_emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sos_contacts`
--

CREATE TABLE `sos_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sos_contacts`
--

INSERT INTO `sos_contacts` (`id`, `name`, `number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Police', '000', 1, '2020-07-03 00:16:48', '2020-07-03 00:17:54'),
(2, 'Turvy Help', '+61417691066', 1, '2020-07-03 00:17:29', '2020-07-03 00:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `sos_requests`
--

CREATE TABLE `sos_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `rider_id` int(10) UNSIGNED DEFAULT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `sos_number` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `currency_id` int(10) UNSIGNED DEFAULT NULL,
  `distance_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `fullname`, `country_id`, `currency_id`, `distance_id`, `created_at`, `updated_at`) VALUES
(1, 'ACT', 'Australian Capital Territory', 13, 1, 1, '2020-02-23 15:36:48', '2020-02-23 15:36:48'),
(2, 'NSW', 'New South Wales', 13, 1, 1, '2020-02-23 15:37:22', '2020-02-23 15:37:22'),
(3, 'NT', 'Northern Territory', 13, 1, 1, '2020-02-23 15:38:47', '2020-02-23 15:38:47'),
(4, 'QLD', 'Queensland', 13, 1, 1, '2020-02-23 15:39:14', '2020-02-23 15:39:14'),
(5, 'SA', 'South Australia', 13, 1, 1, '2020-02-23 15:39:53', '2020-02-23 15:39:53'),
(6, 'TAS', 'Tasmania', 13, 1, 1, '2020-02-23 15:41:05', '2020-02-23 15:41:05'),
(7, 'VIC', 'Victoria', 13, 1, 1, '2020-02-23 15:41:33', '2020-02-23 15:41:33'),
(8, 'WA', 'Western Australia', 13, 1, 1, '2020-02-23 15:42:05', '2020-02-23 15:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` int(10) UNSIGNED NOT NULL,
  `receiver` int(10) UNSIGNED NOT NULL,
  `amount` double(10,2) NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `mobile`, `verification_code`, `email_verified_at`, `mobile_verified_at`, `password`, `otp`, `first_name`, `last_name`, `gender`, `avatar`, `partner_id`, `status`, `remember_token`, `created_at`, `updated_at`, `ip_address`) VALUES
(188, 'justin@millas.com.au', '+61421567346', 'dffc23698af9db9475eaa8a773024', '2021-02-25 10:34:01', '2021-02-25 22:28:04', '$2y$10$hjRd9VHMs0/Xo42fhM6LNetiuo7ooSppk/UHk6UKGIdgCRC.stzCu', NULL, 'Nina', 'Johnson', 2, 'uploads/user/rider/3aafb35d667d90fd45f08ac47e08a02244cbea12.jpg', 9, 1, NULL, '2021-02-25 22:28:04', '2021-02-26 16:56:43', '14.137.84.136'),
(189, 'babb.sarah@yahoo.com', '85706353199459469696', 'cdd55c6ae00d0535faa5ff45b141d', NULL, '2021-02-27 09:54:34', '$2y$10$mrTlIGytIoWP60ooP3Jv1uL1zt0fECx71hsShxLPbFfNlOJgJJopa', NULL, 'QsXRaLBS', 'ZvWVRbzdJmC', 1, NULL, 13, 0, NULL, '2021-02-27 09:54:34', '2021-02-27 09:54:34', '71.15.91.208'),
(190, 'goddesstomboy@yahoo.com', '42555552009147862963', 'd6568d07826b06720a1d3c1944497', NULL, '2021-02-27 13:37:16', '$2y$10$Gwd4vNrEt6W7p4QH9KmUnOgZ0w0.QU/knXndAj/LdGybVEz26y8j2', NULL, 'ljymfUrZwGzbaPv', 'hYTsgZzDopruA', 1, NULL, 13, 0, NULL, '2021-02-27 13:37:16', '2021-02-27 13:37:16', '171.242.37.151');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_makes`
--

CREATE TABLE `vehicle_makes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_makes`
--

INSERT INTO `vehicle_makes` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Acura', 'uploads/vehicle/makes/cb1848d3b0bd7d005b6b2e88b997e69744b2864d.jpg', 1, '2020-02-23 14:11:06', '2020-02-23 14:41:53'),
(2, 'Alfa Romeo', 'uploads/vehicle/makes/8d0d013d2cf156211704c094669467a156655c4a.jpg', 1, '2020-02-23 14:11:43', '2020-02-23 14:41:57'),
(3, 'Aston Martin', 'uploads/vehicle/makes/b8688e64983cbb008626b7f996b6e24b687fff5d.jpg', 1, '2020-02-23 14:12:06', '2020-02-23 14:42:00'),
(4, 'Audi', 'uploads/vehicle/makes/11a43187a5d76e8ccdbe5680b074c66fe148b167.jpg', 1, '2020-02-23 14:12:28', '2020-02-23 14:42:04'),
(5, 'Bentley', 'uploads/vehicle/makes/c515a06d145bc9bd9b758306302703a9754c07e2.jpg', 1, '2020-02-23 14:12:48', '2020-02-23 14:42:07'),
(6, 'BMW', 'uploads/vehicle/makes/edbcf8a62db7336def6f6b6c2263301ae3597650.jpg', 1, '2020-02-23 14:13:08', '2020-02-23 14:42:11'),
(7, 'Buick', 'uploads/vehicle/makes/a404d9da46c9e8f0eef9b0e0c9637da3481ebd2f.jpg', 1, '2020-02-23 14:13:27', '2020-02-23 14:42:13'),
(8, 'Cadilac', 'uploads/vehicle/makes/f886a24eba2964bc056da69b6644f5d49b2ebe24.jpg', 1, '2020-02-23 14:13:48', '2020-02-23 14:42:17'),
(9, 'Chrysler', 'uploads/vehicle/makes/10abc09071e5ef71cdb56dd269ebd292c91474b0.jpg', 1, '2020-02-23 14:14:14', '2020-02-23 14:42:22'),
(10, 'Citroen', 'uploads/vehicle/makes/ebb56a74cb626416e4bdd3c9686222fa5b712c22.jpg', 1, '2020-02-23 14:14:33', '2020-02-23 14:42:25'),
(11, 'DeLorean', 'uploads/vehicle/makes/dd06d17bc6174f8ffe66e2b3c3435c5bd513c56c.jpg', 1, '2020-02-23 14:14:56', '2020-02-23 14:46:19'),
(12, 'Dodge', 'uploads/vehicle/makes/c51d037be58b3b094868a070c5ee26283c0401d6.jpg', 1, '2020-02-23 14:15:17', '2020-02-23 14:46:14'),
(13, 'Ferrari', 'uploads/vehicle/makes/4547eb03e88c23aea2b894d0edd372ca8b8499f9.jpg', 1, '2020-02-23 14:15:43', '2020-02-23 14:46:09'),
(14, 'Fiat', 'uploads/vehicle/makes/aed45a19f0d76b8d552eae667f34a2ca1439463d.jpg', 1, '2020-02-23 14:16:01', '2020-02-23 14:46:03'),
(15, 'Ford', 'uploads/vehicle/makes/05648971e44ad295211c4dcabeb8bfd4222c541a.jpg', 1, '2020-02-23 14:16:23', '2020-02-23 14:45:36'),
(16, 'Geely', 'uploads/vehicle/makes/ab75bcbd0d4ab0c70db43d3f5189b00533cdd2da.jpg', 1, '2020-02-23 14:16:44', '2020-02-23 14:45:29'),
(19, 'GM', 'uploads/vehicle/makes/ccd2114123d2828a3da15a9aad59d67b33489bd1.jpg', 1, '2020-02-23 14:28:00', '2020-02-23 14:45:25'),
(20, 'GMC', 'uploads/vehicle/makes/28fc22337067b0716c01b9ff691f3028677c562a.jpg', 1, '2020-02-23 14:28:17', '2020-02-23 14:45:20'),
(21, 'Holden', 'uploads/vehicle/makes/bff6180c85147298e91c06578f049ef0dcc0d219.jpg', 1, '2020-02-23 14:28:40', '2020-02-23 14:45:14'),
(22, 'Honda', 'uploads/vehicle/makes/df9301f02b5728f774eaad34f14345717993b2c1.jpg', 1, '2020-02-23 14:29:16', '2020-02-23 14:45:10'),
(23, 'Hyundai', 'uploads/vehicle/makes/a6258c5f64b0e735104eb9d76dddb000402f8944.jpg', 1, '2020-02-23 14:29:38', '2020-02-23 14:45:05'),
(24, 'Infiniti', 'uploads/vehicle/makes/12a59533e71fac154f3d4aa59a2b3d4c90a091c7.jpg', 1, '2020-02-23 14:30:00', '2020-02-23 14:44:59'),
(25, 'Isuzu', 'uploads/vehicle/makes/7e846373753f5087dc39caf330c7800e0762ca71.png', 1, '2020-02-23 14:30:24', '2020-02-23 14:44:55'),
(26, 'Jaguar', 'uploads/vehicle/makes/a353771d15d6dfeba8d91eacdc04bedfb5041ede.jpg', 1, '2020-02-23 14:30:48', '2020-02-23 14:44:50'),
(27, 'Jeep', 'uploads/vehicle/makes/c5aca43c993efea67f46b4a31c9a7e770097f09b.jpg', 1, '2020-02-23 14:31:10', '2020-02-23 14:44:46'),
(28, 'Kia', 'uploads/vehicle/makes/f34f07f2cc266452e8191bec3b5c1c9f89667bbc.jpg', 1, '2020-02-23 14:31:30', '2020-02-23 14:44:41'),
(29, 'Lamborghini', 'uploads/vehicle/makes/66ea4d1170a8d9cff28ba2d730e02a47249fb333.jpg', 1, '2020-02-23 14:31:53', '2020-02-23 14:44:36'),
(30, 'Lancia', 'uploads/vehicle/makes/4bdd062db65c668bb657a471197cb34a538a8109.jpg', 1, '2020-02-23 14:32:12', '2020-02-23 14:44:31'),
(31, 'Land Rover', 'uploads/vehicle/makes/017cfa738df37947c3db8eb3674ab8f3d3193287.jpg', 1, '2020-02-23 14:32:31', '2020-02-23 14:44:27'),
(32, 'Lexus', 'uploads/vehicle/makes/d8b893fffad349e027625320f2a64d0bd9328f03.jpg', 1, '2020-02-23 14:32:51', '2020-02-23 14:44:22'),
(33, 'Maserati', 'uploads/vehicle/makes/82e73352db58f869f6b191d435d1b97c1000a969.jpg', 1, '2020-02-23 14:34:07', '2020-02-23 14:44:18'),
(34, 'Mazda', 'uploads/vehicle/makes/ce82e1892b0faa0424b8daca81b4b0b591a2b9a7.jpg', 1, '2020-02-23 14:34:34', '2020-02-23 14:44:14'),
(35, 'Mercedes Benz', 'uploads/vehicle/makes/9d913121725ebecdd1dd5eb2b8ab7c2e8dbb9d48.jpg', 1, '2020-02-23 14:34:53', '2020-02-23 14:44:09'),
(36, 'Mitsubishi', 'uploads/vehicle/makes/f7c33169a1acf47153f44532104c4da42680f9db.jpg', 1, '2020-02-23 14:35:15', '2020-02-23 14:44:04'),
(37, 'Nissan', 'uploads/vehicle/makes/703543476fe7ed3ea4020069b5efdf511fff92db.jpg', 1, '2020-02-23 14:35:38', '2020-02-23 14:43:59'),
(38, 'Pagani', 'uploads/vehicle/makes/e206ee3e3962f8ed16b4cc023dea67800b06895a.jpg', 1, '2020-02-23 14:36:03', '2020-02-23 14:43:53'),
(39, 'Peugeot', 'uploads/vehicle/makes/faba5e2561f100a250e592cf90716c736bc4485c.jpg', 1, '2020-02-23 14:36:24', '2020-02-23 14:43:48'),
(40, 'Polaris', 'uploads/vehicle/makes/cd3bb01131062f499ecc88c880a754f8fb7fc463.jpg', 1, '2020-02-23 14:36:48', '2020-02-23 14:43:43'),
(41, 'Porsche', 'uploads/vehicle/makes/6fae7a77933561840eb610a2bb4790f14a287f16.jpg', 1, '2020-02-23 14:37:09', '2020-02-23 14:43:38'),
(42, 'Ram', 'uploads/vehicle/makes/9315cde07df68dfa5a7f9a2fb8923eb02e124e06.jpg', 1, '2020-02-23 14:37:31', '2020-02-23 14:43:34'),
(43, 'Range Rover', 'uploads/vehicle/makes/8e7130c4ed6cb144e20f5c1afee086f8e99af90d.png', 1, '2020-02-23 14:37:57', '2020-02-23 14:43:29'),
(44, 'Renault', 'uploads/vehicle/makes/8c88d7254d2e4288d9aeb32551f58b938da29d53.jpg', 1, '2020-02-23 14:38:20', '2020-02-23 14:43:24'),
(45, 'Rolls Royce', 'uploads/vehicle/makes/b850928dbec080a612b5ecfd755ba185d2a51151.jpg', 1, '2020-02-23 14:38:42', '2020-02-23 14:43:18'),
(46, 'Saab', 'uploads/vehicle/makes/55ca725b38a0173aac848e507c15de8e304b9118.jpg', 1, '2020-02-23 14:39:03', '2020-02-23 14:43:12'),
(47, 'Subaru', 'uploads/vehicle/makes/0718e5b2af24f67dac64ae48ae5c5f5bff63d79e.jpg', 1, '2020-02-23 14:39:25', '2020-02-23 14:43:07'),
(48, 'Suzuki', 'uploads/vehicle/makes/c2f0e89da5809904a8d2dba55114f20825a2d5d3.jpg', 1, '2020-02-23 14:39:52', '2020-02-23 14:43:02'),
(49, 'Tata', 'uploads/vehicle/makes/4ad66f983968d0360b7075f6d305201482584475.jpg', 1, '2020-02-23 14:40:13', '2020-02-23 14:42:56'),
(50, 'Tesla', 'uploads/vehicle/makes/00dc4ed87c35be5846f7b72e675166cd1793f9d9.jpg', 1, '2020-02-23 14:40:35', '2020-02-23 14:42:51'),
(51, 'Toyota', 'uploads/vehicle/makes/e8311967ec66cab4aaf2801e92e346d07646c3e7.jpg', 1, '2020-02-23 14:41:00', '2020-02-23 14:42:46'),
(52, 'Volsks Wagen', 'uploads/vehicle/makes/a04fbf13a1878eb375bdcc09cd237d131a931ad8.jpg', 1, '2020-02-23 14:41:21', '2020-02-23 14:42:41'),
(53, 'Volvo', 'uploads/vehicle/makes/e5517615fdef50402c48268ef348bf0c2cf42c36.jpg', 1, '2020-02-23 14:41:41', '2020-02-23 14:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_models`
--

CREATE TABLE `vehicle_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicetype_id` int(10) UNSIGNED NOT NULL,
  `make_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_models`
--

INSERT INTO `vehicle_models` (`id`, `name`, `servicetype_id`, `make_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Calais', 4, 21, 1, '2020-02-23 14:50:29', '2020-02-23 14:53:34'),
(2, 'SQ7', 4, 4, 1, '2020-02-23 14:55:52', '2020-02-23 15:02:38'),
(3, 'GLE 63 S', 4, 35, 1, '2020-02-23 14:56:37', '2020-02-23 15:02:27'),
(4, 'X6 xDRIVE 30d', 4, 6, 1, '2020-02-23 14:57:12', '2020-02-23 15:02:43'),
(5, 'XC90 T6 R-Design', 4, 53, 1, '2020-02-23 14:57:39', '2020-02-23 15:02:55'),
(6, 'Sport SDV6 SE', 4, 43, 1, '2020-02-23 14:58:10', '2020-02-23 15:02:36'),
(7, '2018 Velar', 4, 43, 1, '2020-02-23 14:58:49', '2020-02-23 15:02:19'),
(8, 'AMG GLE 43', 4, 35, 1, '2020-02-23 14:59:31', '2020-02-23 15:02:22'),
(9, 'Maybach S-Class Saloon', 4, 35, 1, '2020-02-23 15:00:23', '2020-02-23 15:02:33'),
(10, 'Caprice V', 4, 21, 1, '2020-02-23 15:00:52', '2020-02-23 15:02:24'),
(11, 'LS600h', 4, 32, 1, '2020-02-23 15:01:20', '2020-02-23 15:02:30'),
(12, 'XJ', 4, 26, 1, '2020-02-23 15:01:56', '2020-02-23 15:02:50'),
(13, 'Model S', 4, 50, 1, '2020-02-23 15:06:08', '2020-02-23 15:10:50'),
(14, 'Model 3', 4, 50, 1, '2020-02-23 15:06:42', '2020-02-23 15:10:46'),
(15, 'Model X', 4, 50, 1, '2020-02-23 15:07:13', '2020-02-23 15:10:53'),
(16, 'Model Y', 4, 50, 1, '2020-02-23 15:09:18', '2020-02-23 15:11:00'),
(17, 'MDX Sport Hybrid', 5, 1, 1, '2020-02-23 15:17:15', '2020-02-23 15:25:32'),
(18, 'RAPIDE S', 5, 3, 1, '2020-02-23 15:17:53', '2020-02-23 15:25:44'),
(19, 'Q5', 5, 4, 1, '2020-02-23 15:18:39', '2020-02-23 15:25:39'),
(21, 'Q7', 5, 4, 1, '2020-02-23 15:27:19', '2020-02-24 03:42:32'),
(23, 'Sorento', 3, 28, 1, '2020-02-29 18:21:39', '2020-02-29 18:37:27'),
(24, 'Carnival', 3, 28, 1, '2020-02-29 18:24:04', '2020-02-29 18:37:17'),
(25, 'iMax', 3, 23, 1, '2020-02-29 18:30:05', '2020-02-29 18:37:20'),
(26, 'X-TRAIL', 1, 37, 1, '2020-02-29 18:32:55', '2020-02-29 18:37:36'),
(27, 'PATHFINDER', 3, 37, 1, '2020-02-29 18:37:55', '2020-02-29 18:39:33'),
(28, 'Patrol', 3, 37, 1, '2020-02-29 18:39:20', '2020-02-29 18:39:38'),
(29, 'Pajero', 3, 36, 1, '2020-03-01 01:05:35', '2020-03-01 01:39:14'),
(30, 'Pajero Sport', 3, 36, 1, '2020-03-01 01:08:21', '2020-03-01 01:39:19'),
(31, 'Outlander', 3, 36, 1, '2020-03-01 01:09:43', '2020-03-01 01:39:08'),
(32, 'Eclipse Cross', 2, 36, 1, '2020-03-01 01:12:18', '2020-03-01 01:38:58'),
(33, 'S-Class', 4, 35, 1, '2020-03-01 01:32:28', '2020-03-01 01:39:30'),
(34, 'Levante S', 4, 33, 1, '2020-03-01 01:36:27', '2020-03-01 01:39:01'),
(35, 'Quattroporte', 5, 33, 1, '2020-03-01 01:38:49', '2020-03-01 01:39:24'),
(36, 'Sportage', 2, 28, 1, '2020-03-01 14:34:03', '2020-03-02 16:02:32'),
(37, 'Sportage Platinum', 1, 28, 1, '2020-03-01 14:34:35', '2020-03-02 16:02:39'),
(39, 'CX-30', 2, 34, 1, '2020-03-02 16:07:53', '2020-03-02 16:21:20'),
(40, 'CX-5', 2, 34, 1, '2020-03-02 16:09:12', '2020-03-02 16:21:24'),
(41, 'CX-8', 3, 34, 1, '2020-03-02 16:10:29', '2020-03-02 16:21:30'),
(42, 'CX-9', 3, 34, 1, '2020-03-02 16:11:36', '2020-03-02 16:21:46'),
(43, 'CX-7', 2, 34, 1, '2020-03-02 16:12:00', '2020-03-02 16:21:27'),
(44, 'F-Pace', 4, 26, 1, '2020-03-05 19:15:35', '2020-03-05 19:16:34'),
(45, 'RX 350', 5, 32, 1, '2020-03-05 19:16:10', '2020-03-05 19:16:25'),
(46, 'GLS 350', 6, 35, 1, '2020-03-09 17:52:35', '2020-03-09 17:52:54'),
(47, 'X7', 6, 6, 1, '2020-03-09 19:32:50', '2020-03-09 19:33:38'),
(48, 'X4', 5, 6, 1, '2020-03-14 22:22:57', '2020-03-14 22:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_ride_types`
--

CREATE TABLE `vehicle_ride_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceType_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_ride_types`
--

INSERT INTO `vehicle_ride_types` (`id`, `name`, `serviceType_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EX', 4, 1, '2020-02-23 15:29:52', '2020-02-23 16:18:52'),
(2, 'LUX', 5, 1, '2020-02-23 15:30:09', '2020-03-09 18:33:35'),
(4, 'STD', 2, 1, '2020-02-23 16:19:32', '2020-02-24 03:41:56'),
(5, 'FM', 1, 1, '2020-02-23 16:19:52', '2020-02-24 03:42:00'),
(6, 'SV', 3, 1, '2020-02-23 16:20:18', '2020-02-24 03:42:03'),
(7, 'EX Pro', 6, 1, '2020-03-09 17:53:54', '2020-03-09 17:55:15'),
(8, 'TurvyPET', 7, 1, '2021-02-04 07:30:00', '2021-02-04 07:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_seat` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `name`, `description`, `image`, `number_seat`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TurvyFM', 'TurvyFM is for parents with children who require baby-seat. \r\nThese guaranty you and your family a safer and secure ride to your destination. A convenient way to travel every day.', 'uploads/vehicle/types/44d03c1a42ae10f878d35a4f89c571e6dadcb187.png', 4, 1, '2020-02-23 13:33:28', '2020-02-23 14:01:24'),
(2, 'TurvySTD', 'TurvySTD is our standard and cheaper transport, minus the hassle of waiting and haggling for price. \r\nA convenient way to travel every day', 'uploads/vehicle/types/30497974f8cb3a7cbed0460f4984f8f383e7227b.png', 4, 1, '2020-02-23 13:36:50', '2020-02-23 14:01:29'),
(3, 'TurvySV', 'TurvySV is our six seaters for families or groups of six people, also for a person with excess luggage. \r\n A convenient way to travel everyday', 'uploads/vehicle/types/9dcd6cabd96fe7fdaa30a9c4bd0811f9a5e63ef6.png', 6, 1, '2020-02-23 13:46:22', '2020-02-23 14:01:32'),
(4, 'TurvyEX', 'TurvyEX is our Executive transport. All vehicles are top-ends SUV\'s and Long Wheelbase cars with  professional drivers', 'uploads/vehicle/types/2c978cda5643e4f71dc78eb8014c84085063f912.png', 6, 1, '2020-02-23 13:49:06', '2020-03-09 18:56:15'),
(5, 'TurvyLUX', 'TurvyLUX is our Luxury transport. All vehicles are top-ends SUV\'s and Long Wheelbase cars with  professional drivers', 'uploads/vehicle/types/fb93b559db5dd673c744d248eac88ad8b30d55a7.png', 6, 1, '2020-02-23 13:57:27', '2020-03-09 18:35:19'),
(6, 'TurvyEX Pro', 'Turvy EX Pro is our Executive and luxury SUV for families, friends or groups of seven going to an event', 'uploads/vehicle/types/e94203767ca504040ab571ab71e4f0b734286e03.png', 7, 1, '2020-03-09 17:51:10', '2020-03-09 17:51:32'),
(7, 'TurvyPET', 'Turvy Pet is for family including their animal companion', 'uploads/vehicle/types/9718ddfd041e1e604f86a7c5e2176249ab2314a8.png', 4, 1, '2021-02-04 07:27:45', '2021-02-04 07:32:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `airports_name_unique` (`name`);

--
-- Indexes for table `airport_prices`
--
ALTER TABLE `airport_prices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `airport_prices_package_name_unique` (`package_name`),
  ADD KEY `airport_prices_airport_id_foreign` (`airport_id`),
  ADD KEY `airport_prices_destination_id_foreign` (`destination_id`),
  ADD KEY `airport_prices_servicetype_id_foreign` (`servicetype_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_rider_id_foreign` (`rider_id`),
  ADD KEY `appointments_rider_country_id_foreign` (`rider_country_id`),
  ADD KEY `appointments_servicetype_id_foreign` (`servicetype_id`),
  ADD KEY `appointments_driver_id_foreign` (`driver_id`),
  ADD KEY `appointments_coupon_id_foreign` (`coupon_id`),
  ADD KEY `appointments_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `cancelreasons`
--
ALTER TABLE `cancelreasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_rider_id_foreign` (`rider_id`),
  ADD KEY `comments_driver_id_foreign` (`driver_id`),
  ADD KEY `comments_partner_id_foreign` (`partner_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`),
  ADD UNIQUE KEY `countries_iso_unique` (`iso`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `destinations_name_unique` (`name`);

--
-- Indexes for table `distances`
--
ALTER TABLE `distances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_states`
--
ALTER TABLE `document_states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_states_state_id_foreign` (`state_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drivers_email_unique` (`email`),
  ADD UNIQUE KEY `drivers_mobile_unique` (`mobile`),
  ADD KEY `drivers_country_id_foreign` (`country_id`),
  ADD KEY `drivers_state_id_foreign` (`state_id`),
  ADD KEY `drivers_city_id_foreign` (`city_id`);

--
-- Indexes for table `driver_address_details`
--
ALTER TABLE `driver_address_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_address_details_driver_id_foreign` (`driver_id`);

--
-- Indexes for table `driver_banks`
--
ALTER TABLE `driver_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_banks_driver_id_foreign` (`driver_id`);

--
-- Indexes for table `driver_documents`
--
ALTER TABLE `driver_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_documents_driver_id_foreign` (`driver_id`),
  ADD KEY `driver_documents_document_id_foreign` (`document_id`);

--
-- Indexes for table `driver_loyalties`
--
ALTER TABLE `driver_loyalties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_notes`
--
ALTER TABLE `driver_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_ratings`
--
ALTER TABLE `driver_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_ratings_driver_id_foreign` (`driver_id`),
  ADD KEY `driver_ratings_rider_id_foreign` (`rider_id`);

--
-- Indexes for table `driver_vehicles`
--
ALTER TABLE `driver_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_vehicles_driver_id_foreign` (`driver_id`),
  ADD KEY `driver_vehicles_make_id_foreign` (`make_id`),
  ADD KEY `driver_vehicles_model_id_foreign` (`model_id`);

--
-- Indexes for table `fares`
--
ALTER TABLE `fares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fares_state_id_foreign` (`state_id`),
  ADD KEY `fares_servicetype_id_foreign` (`servicetype_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_partner_id_foreign` (`partner_id`),
  ADD KEY `feedback_driver_id_foreign` (`driver_id`),
  ADD KEY `feedback_rider_id_foreign` (`rider_id`);

--
-- Indexes for table `homepages`
--
ALTER TABLE `homepages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_emails`
--
ALTER TABLE `invoice_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_rider_id_foreign` (`rider_id`),
  ADD KEY `locations_driver_id_foreign` (`driver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nighttimes`
--
ALTER TABLE `nighttimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nighttimes_state_id_foreign` (`state_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `partners_username_unique` (`username`) USING BTREE,
  ADD KEY `partners_country_id_foreign` (`country_id`),
  ADD KEY `partners_state_id_foreign` (`state_id`),
  ADD KEY `partners_city_id_foreign` (`city_id`);

--
-- Indexes for table `partner_banks`
--
ALTER TABLE `partner_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_banks_partner_id_foreign` (`partner_id`);

--
-- Indexes for table `partner_contacts`
--
ALTER TABLE `partner_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_contacts_partner_id_foreign` (`partner_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_requests`
--
ALTER TABLE `payment_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_requests_driver_id_foreign` (`driver_id`),
  ADD KEY `payment_requests_rider_id_foreign` (`rider_id`),
  ADD KEY `payment_requests_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `payment_requests_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `peaktimes`
--
ALTER TABLE `peaktimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peaktimes_state_id_foreign` (`state_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queues`
--
ALTER TABLE `queues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queues_airport_id_foreign` (`airport_id`),
  ADD KEY `queues_driver_id_foreign` (`driver_id`),
  ADD KEY `queues_request_id_foreign` (`request_id`);

--
-- Indexes for table `rider_cancelreasons`
--
ALTER TABLE `rider_cancelreasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rider_ratings`
--
ALTER TABLE `rider_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rider_ratings_driver_id_foreign` (`driver_id`),
  ADD KEY `rider_ratings_rider_id_foreign` (`rider_id`);

--
-- Indexes for table `rider_rewards`
--
ALTER TABLE `rider_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride_requests`
--
ALTER TABLE `ride_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup_emails`
--
ALTER TABLE `signup_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sos_contacts`
--
ALTER TABLE `sos_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sos_requests`
--
ALTER TABLE `sos_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sos_requests_rider_id_foreign` (`rider_id`),
  ADD KEY `sos_requests_driver_id_foreign` (`driver_id`),
  ADD KEY `sos_requests_sos_number_foreign` (`sos_number`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `states_name_unique` (`name`),
  ADD UNIQUE KEY `states_fullname_unique` (`fullname`),
  ADD KEY `states_country_id_foreign` (`country_id`),
  ADD KEY `states_currency_id_foreign` (`currency_id`),
  ADD KEY `states_distance_id_foreign` (`distance_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_request_id_foreign` (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD KEY `users_partner_id_foreign` (`partner_id`);

--
-- Indexes for table `vehicle_makes`
--
ALTER TABLE `vehicle_makes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_makes_name_unique` (`name`);

--
-- Indexes for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_models_name_unique` (`name`),
  ADD KEY `vehicle_models_servicetype_id_foreign` (`servicetype_id`),
  ADD KEY `vehicle_models_make_id_foreign` (`make_id`);

--
-- Indexes for table `vehicle_ride_types`
--
ALTER TABLE `vehicle_ride_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_ride_types_name_unique` (`name`),
  ADD KEY `vehicle_ride_types_servicetype_id_foreign` (`serviceType_id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicle_types_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airport_prices`
--
ALTER TABLE `airport_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cancelreasons`
--
ALTER TABLE `cancelreasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `distances`
--
ALTER TABLE `distances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `document_states`
--
ALTER TABLE `document_states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `driver_address_details`
--
ALTER TABLE `driver_address_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver_banks`
--
ALTER TABLE `driver_banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_documents`
--
ALTER TABLE `driver_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_loyalties`
--
ALTER TABLE `driver_loyalties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_notes`
--
ALTER TABLE `driver_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver_ratings`
--
ALTER TABLE `driver_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_vehicles`
--
ALTER TABLE `driver_vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `fares`
--
ALTER TABLE `fares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `homepages`
--
ALTER TABLE `homepages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_emails`
--
ALTER TABLE `invoice_emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `nighttimes`
--
ALTER TABLE `nighttimes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `partner_banks`
--
ALTER TABLE `partner_banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partner_contacts`
--
ALTER TABLE `partner_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_requests`
--
ALTER TABLE `payment_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peaktimes`
--
ALTER TABLE `peaktimes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `queues`
--
ALTER TABLE `queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rider_cancelreasons`
--
ALTER TABLE `rider_cancelreasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rider_ratings`
--
ALTER TABLE `rider_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rider_rewards`
--
ALTER TABLE `rider_rewards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ride_requests`
--
ALTER TABLE `ride_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `signup_emails`
--
ALTER TABLE `signup_emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sos_contacts`
--
ALTER TABLE `sos_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sos_requests`
--
ALTER TABLE `sos_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `vehicle_makes`
--
ALTER TABLE `vehicle_makes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `vehicle_ride_types`
--
ALTER TABLE `vehicle_ride_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `airport_prices`
--
ALTER TABLE `airport_prices`
  ADD CONSTRAINT `airport_prices_airport_id_foreign` FOREIGN KEY (`airport_id`) REFERENCES `airports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `airport_prices_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `airport_prices_servicetype_id_foreign` FOREIGN KEY (`servicetype_id`) REFERENCES `vehicle_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `appointments_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `appointments_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `appointments_rider_country_id_foreign` FOREIGN KEY (`rider_country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `appointments_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `appointments_servicetype_id_foreign` FOREIGN KEY (`servicetype_id`) REFERENCES `vehicle_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `document_states`
--
ALTER TABLE `document_states`
  ADD CONSTRAINT `document_states_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `drivers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `drivers_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `driver_address_details`
--
ALTER TABLE `driver_address_details`
  ADD CONSTRAINT `driver_address_details_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `driver_banks`
--
ALTER TABLE `driver_banks`
  ADD CONSTRAINT `driver_banks_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `driver_documents`
--
ALTER TABLE `driver_documents`
  ADD CONSTRAINT `driver_documents_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `driver_documents_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `driver_ratings`
--
ALTER TABLE `driver_ratings`
  ADD CONSTRAINT `driver_ratings_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `driver_ratings_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `driver_vehicles`
--
ALTER TABLE `driver_vehicles`
  ADD CONSTRAINT `driver_vehicles_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `driver_vehicles_make_id_foreign` FOREIGN KEY (`make_id`) REFERENCES `vehicle_makes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `driver_vehicles_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `vehicle_models` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `fares`
--
ALTER TABLE `fares`
  ADD CONSTRAINT `fares_servicetype_id_foreign` FOREIGN KEY (`servicetype_id`) REFERENCES `vehicle_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fares_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `locations_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nighttimes`
--
ALTER TABLE `nighttimes`
  ADD CONSTRAINT `nighttimes_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `partners_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `partners_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `partner_banks`
--
ALTER TABLE `partner_banks`
  ADD CONSTRAINT `partner_banks_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partner_contacts`
--
ALTER TABLE `partner_contacts`
  ADD CONSTRAINT `partner_contacts_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_requests`
--
ALTER TABLE `payment_requests`
  ADD CONSTRAINT `payment_requests_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payment_requests_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payment_requests_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payment_requests_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `peaktimes`
--
ALTER TABLE `peaktimes`
  ADD CONSTRAINT `peaktimes_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `queues`
--
ALTER TABLE `queues`
  ADD CONSTRAINT `queues_airport_id_foreign` FOREIGN KEY (`airport_id`) REFERENCES `airports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `queues_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `queues_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `ride_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rider_ratings`
--
ALTER TABLE `rider_ratings`
  ADD CONSTRAINT `rider_ratings_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `rider_ratings_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sos_requests`
--
ALTER TABLE `sos_requests`
  ADD CONSTRAINT `sos_requests_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sos_requests_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sos_requests_sos_number_foreign` FOREIGN KEY (`sos_number`) REFERENCES `sos_contacts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `states_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `states_distance_id_foreign` FOREIGN KEY (`distance_id`) REFERENCES `distances` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `payment_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  ADD CONSTRAINT `vehicle_models_make_id_foreign` FOREIGN KEY (`make_id`) REFERENCES `vehicle_makes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicle_models_servicetype_id_foreign` FOREIGN KEY (`servicetype_id`) REFERENCES `vehicle_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicle_ride_types`
--
ALTER TABLE `vehicle_ride_types`
  ADD CONSTRAINT `vehicle_ride_types_servicetype_id_foreign` FOREIGN KEY (`serviceType_id`) REFERENCES `vehicle_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
