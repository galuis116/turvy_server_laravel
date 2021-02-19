-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2021 at 07:23 PM
-- Server version: 10.2.36-MariaDB
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
CREATE DATABASE IF NOT EXISTS `turvy_v1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `turvy_v1`;

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
(4, 'Justin', 'Milla', 'justin@turvy.net', '+61417691066', '$2y$10$Th/k1dCKJkhFwRvN/Z0A4ODxSZworInQfYt2GzapEGgR6AQLn383y', 'uploads/user/admin/44afc095bbe255ae23c0886f6acb389f9b68ff11.jpg', 1, 'ROcNrFUedIOLbKO3lmnzMqwYRSbPgJff8Mp3fKc9ZbausKNowH0OH3zCa6WB', '2020-07-03 00:14:44', '2021-02-15 06:36:47');

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
(1, 'Sydney Airport', '2020', '-33.935846296589666,151.15781684112545|-33.93143112730487,151.16176505279537|-33.92858250951053,151.17257971954342|-33.92872494266306,151.1796178359985|-33.93228569406396,151.1844243545532|-33.935846296589666,151.18871588897701|-33.94111571509599,151.18596930694576|-33.94439113519566,151.17687125396725|-33.94239741623077,151.1634816665649|-33.94083089000105,151.15747351837155', 1, '2020-07-21 08:10:32', '2020-07-21 08:12:22');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `first_name`, `last_name`, `gender`, `email`, `mobile`, `password`, `abn`, `commission`, `country_id`, `state_id`, `city_id`, `avatar`, `mobile_verified_at`, `email_verified_at`, `verification_code`, `is_online`, `is_login`, `is_busy`, `is_approved`, `remember_token`, `created_at`, `updated_at`) VALUES
(280, 'Justin', 'Milla', 1, 'justin@turvy.net', '+61417691066', '$2y$10$.EgiaHnrFtCX9f1Gq8IUEOOLnjmb/RJe6K5mGTS2shNJdBNvjyFTe', NULL, NULL, 13, 2, 9, NULL, '2021-02-19 01:29:31', '2021-02-19 01:34:22', NULL, 0, 0, 0, 0, NULL, '2021-02-19 01:31:09', '2021-02-19 01:34:22');

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
(25, 280, 6, 47, NULL, 'DHV10M', NULL, NULL, NULL, '2021-02-19 01:31:09', '2021-02-19 01:31:09');

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
(5, 2, 5, '20', '5', '25.00', '4.00', '60 secs', '2.20', '10', '0.10', '1.00', '0.10', '0.85', '25.00', '0', '0.95', 0, '2020-02-26 22:42:39', '2020-02-26 22:42:39'),
(6, 2, 7, '20', '1', '15.00', '3.00', '30', '2.00', '10', '0.10', '1.00', '0.10', '0.60', '15.00', '0', '0.75', 0, '2021-02-19 10:16:58', '2021-02-19 10:16:58');

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

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `mobile`, `partner_id`, `driver_id`, `rider_id`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(1, 'rashpell', 'rashpel2021@mail.ru', '86659394681', NULL, NULL, NULL, 'продвижение раскрутка сайтов', 'Заказать seo поисковую оптимизацию сайта, Заказать услуги по продвижению сайта По всем возникшим вопросам Вы можете обратиться в скайп логин <b>pokras7777</b>Раскрутка сайта под ключ \r\n.Так же собираем базы', '2020-03-01 19:59:52', '2020-03-01 19:59:52'),
(2, 'vcOGSHjBANlwhito', 'stonereynold593@gmail.com', '6971896185', NULL, NULL, NULL, 'XbsyAQnG', 'gATDIBOc', '2020-03-01 21:43:51', '2020-03-01 21:43:51'),
(3, 'MuWQvpqj', 'stonereynold593@gmail.com', '4104767191', NULL, NULL, NULL, 'RvUwEOQiDt', 'eYtdBTfha', '2020-03-01 21:43:53', '2020-03-01 21:43:53'),
(4, 'Allenzem', 'dmitriyhvcmka@mail.ru', '89718596412', NULL, NULL, NULL, 'Are you 18? Come in and don\'t be shy!', 'Are you 18? Come in and don\'t be shy! \r\nhttps://loveawake.ru - More info!..', '2020-03-06 18:58:59', '2020-03-06 18:58:59'),
(5, 'WilliamHoozy', 'no-reply@ghostdigital.co', '89582854224', NULL, NULL, NULL, 'Quality 500 Web2.0 Article backlinks with 70% dofollow ratio', 'Increase your millas.com.au ranks with quality web2.0 Article links. \r\nGet 500 permanent web2.0 for only $39. \r\n \r\nMore info about our new service: \r\nhttps://www.ghostdigital.co/web2/', '2020-03-15 22:38:26', '2020-03-15 22:38:26'),
(6, 'Eli Waters', 'eli@explainmybiz.online', '646-597-9025', NULL, NULL, NULL, 'Marketing & Explainer Videos for your business', 'I messaged previously about how explainer videos became an absolute must for every website in 2020. Driving relevant traffic to your site is hard enough, you must capture this traffic and engage them!\r\n\r\nAs you know, Google is constantly changing its SEO algorithm. The only thing that has remained consistent is that adding an explainer video increases website rank and most importantly keeps customers on your page for longer, increasing conversions ratios.\r\n\r\nMy team has created thousands of marketing videos including dozens in your field. Simplify your pitch, increase website traffic, and close more business.\r\n\r\nShould I send over some industry-specific samples?\r\n\r\n-- Eli Waters\r\n\r\nEmail: Eli@explainmybiz.online\r\nWebsite: http://explainmybiz.online', '2020-03-19 21:52:35', '2020-03-19 21:52:35'),
(7, 'gruppi', 'gmaroshkina@mail.ru', '81287726139', NULL, NULL, NULL, 'Do you sell generic pills or brand medicines?', 'Generic are the identical clones of branded medications. The only difference in the two being the patent and the price at which it is sold. It contains the same active ingredients and match the branded drug in terms of both pharmacokinetic and <a href=http://onlinepharmacystore24.com/buy-chloroquine>chloroquine</a>  pharmacodynamic properties. Be it dosage, strength, route of administration, safety, efficiancy, or use, genetics match their counterparts in all aspects. \r\n<a href=http://buychloroquineonline.com/>chloroquine</a> \r\n<a href=http://buychloroquineonline.com/>buy chloroquine</a>', '2020-03-24 21:49:07', '2020-03-24 21:49:07'),
(8, 'JerryfaR', 'no-replyaduse@gmail.com', '82432355385', NULL, NULL, NULL, 'A new method of email distribution.', 'Hello!  millas.com.au \r\n \r\nDid you know that it is possible to send request fully legit? \r\nWe propose a new unique way of sending commercial offer through contact forms. Such forms are located on many sites. \r\nWhen such proposals are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nAlso, messages sent through feedback Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis offer is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nEmail - feedbackform@make-success.com', '2020-03-26 09:39:12', '2020-03-26 09:39:12'),
(9, 'Carlota Bate', 'bate.carlota@msn.com', '041 470 59 60', NULL, NULL, NULL, NULL, 'If you have your nonprofit website on WordPress then https://bit.ly/Maynestreet will excite you.\r\n\r\nOur Nonprofit Plan brings a donation management system to make your nonprofit site more digitally friendly to online donations. And more Google friendly, so people interested in your cause can find and support you. Maynestreet is a complete integrated digital business platform built using the foundation of your WordPress website.\r\n\r\nBy now you have discovered that WordPress is more technical than you want it to be. That is where we come in, we tame the technical side for you. We also integrate your email marketing system, add a chatbot for live interaction and better conversion. Our plans also include your monthly security (site backup & upgrading plugin versions is part of security) and performance monitoring. The Maynestreet nonprofit plan also includes GiveWP - Donor management system installed and configured.\r\n\r\nThe idea is if we can take care of the technical side, you or your staff can handle the design and messaging of your nonprofit using the page builder, leaving the WordPress Dashboard to us. Our primary page builder is Elementor - 4 million active installations and they are still innovating. You will love the easy of use and the visual quality that you can produce. Fully responsive & editable for mobile.\r\n\r\nHere is how our pricing breaks down:\r\n\r\nSolo Plan - $27.00 per month ($197 setup)\r\n- Solo has all our primary services - Elementor Page builder, chatbot, email integration, PayPal support, Google analytics, security & performance monitoring and WordPress support. Hosting is included, but optional, we can service you in your existing hosting.\r\n\r\nPro Plan - $47.00 per month ($297 Setup)\r\n- All of Solo but with more options and upgrades, Google Site kit, media folders and it is Ecommerce ready, more disk capacity...\r\n\r\nPro for Nonprofits - $67.00 per month ($297 Setup)\r\n- This is the Pro Plan with the GiveWP Donor system installed and configured. Integrating your payment gateway, email marketing system, chatbot for live interaction and video training & live workshops for nonprofits.\r\n\r\nFor details and to order this plan: https://bit.ly/maynestreet-nonprofit-plan\r\n\r\nIf we remove the technical and the rest is pretty easy for you or your staff.\r\n\r\nDavid Mayne\r\nCEO\r\nhttps://bit.ly/Maynestreet\r\ndavid@maynestreet.com\r\n702-381-2288', '2020-04-05 05:00:44', '2020-04-05 05:00:44'),
(10, 'jwcuJestYOlZxSbM', 'robertphelps4843@gmail.com', '8037306667', NULL, NULL, NULL, 'ZlejAsKz', 'VmfqgEIGviQc', '2020-04-06 22:33:11', '2020-04-06 22:33:11'),
(11, 'XZcFQPYHe', 'robertphelps4843@gmail.com', '8296881280', NULL, NULL, NULL, 'KFuQbEnagjH', 'gcSwziDks', '2020-04-06 22:33:12', '2020-04-06 22:33:12'),
(12, 'Alex Cohen', 'a.cohen@explainbusiness.online', '646-597-9025', NULL, NULL, NULL, 'Referred to you + Possible synergies', 'I messaged previously about how explainer videos became an absolute must for every website in 2020. Driving relevant traffic to your site is hard enough, you must capture this traffic and engage them!\r\n\r\nAs you know, Google is constantly changing its SEO algorithm. The only thing that has remained consistent is that adding an explainer video increases website rank and most importantly keeps customers on your page for longer, increasing conversions ratios.\r\n\r\nMy team has created thousands of marketing videos including dozens in your field. Simplify your pitch, increase website traffic, and close more business.\r\n\r\nShould I send over some industry-specific samples?\r\n\r\n-- Alex Cohen\r\n\r\nEmail: A.Cohen@explainbusiness.online\r\nWebsite: http://explainbusiness.online', '2020-04-08 11:23:52', '2020-04-08 11:23:52'),
(13, 'MartinGitte', 'no-reply@hilkom-digital.de', '86549381425', NULL, NULL, NULL, 'cheap monthly SEO plans', 'hi there \r\nI have just checked millas.com.au for the ranking keywords and seen that your SEO metrics could use a boost. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2020-04-13 04:36:23', '2020-04-13 04:36:23'),
(14, 'Jamesblals', 'coronavaccine@hotmail.com', '89528892121', NULL, NULL, NULL, 'Stay Home!? Social impact of COVID-19', 'COVID-19 outbreak: airplanes grounded, borders closed, businesses shut, citizens quarantined, political power seized, democracy undermined. \r\nAll this, if it is not stopped shortly, can lead to chaos and unrests. \r\nCurrently http://ST-lF.NET focus on raising awareness of the social impact that radically politicized approach to handling CoronaVirus Pandemic will have on the younger generations. \r\nYour support is needed to reduce the destructive impact the lock-down brings to bear on the younger generation. \r\nEvery 1$ makes a difference. \r\nPlease, take a moment to watch our presentation video and review our campaigns http://ST-lF.NET', '2020-04-14 18:48:30', '2020-04-14 18:48:30'),
(15, 'maniiyao', 'osipova19911masha@mail.ru', '82752621859', NULL, NULL, NULL, 'раскрутка сайтов продвижение', 'Bestellen Sie SEO-Suchmaschinenoptimierung der Website, Bestellen Sie Website-Promotion-Services Bei allen Fragen wenden Sie sich an den Benutzernamen Skype pokras7777 \r\nWir sammeln auch Basen', '2020-04-15 02:38:44', '2020-04-15 02:38:44'),
(16, 'Eve Brooks', 'eve@shortexplainervids.com', '646-597-9024', NULL, NULL, NULL, 'Eve Brooks From Jerusalem Israel', 'Eve here - from Jerusalem Israel.\r\n\r\nI reached out several months ago about how explainer videos and the unique issues they solve.\r\n\r\nMy team has created thousands of marketing videos including dozens in your field. \r\n\r\nAs you know, Google is constantly changing its SEO algorithm. The only thing that has remained consistent is that adding an explainer video increases website rank and most importantly keeps customers on your page for longer, increasing conversions ratios.\r\n\r\nSimplify your pitch, increase website traffic, and close more business.\r\n\r\nShould I send over some industry-specific samples?\r\n\r\n-- Eve Brooks\r\n\r\nEmail: eve@shortexplainervids.com\r\nWebsite: http://shortexplainervids.com', '2020-04-21 18:18:20', '2020-04-21 18:18:20'),
(17, 'Barbara Atyson', 'barbaratysonhw@yahoo.com', '0484 92 18 76', NULL, NULL, NULL, 'Explainer Videos for millas.com.au', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service which we feel can benefit your site millas.com.au.\r\n\r\nCheck out some of our existing videos here:\r\nhttps://www.youtube.com/watch?v=zvGF7uRfH04\r\nhttps://www.youtube.com/watch?v=MOnhn77TgDE\r\nhttps://www.youtube.com/watch?v=KhSCHaI6gw0\r\n\r\nAll of our videos are in a similar animated format as the above examples and we have voice over artists with US/UK/Australian accents.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video such as Youtube, and can be embedded into your website or featured on landing pages.\r\n\r\nOur prices are as follows depending on video length:\r\n0-1 minutes = $159\r\n1-2 minutes = $269\r\n\r\n*All prices above are in USD and include a custom video, full script and a voice-over.\r\n\r\nIf this is something you would like to discuss further, don\'t hesitate to get in touch.\r\nIf you are not interested, simply delete this message and we won\'t contact you again.\r\n\r\nKind Regards,\r\nBarbara', '2020-04-25 05:07:22', '2020-04-25 05:07:22'),
(18, 'Claudia Clement', 'claudiauclement@yahoo.com', '06-61930943', NULL, NULL, NULL, 'DA 96 Do-follow Backlink from Amazon', 'Hi, We are wondering if you would be interested in our service, where we can provide you with a dofollow link from Amazon (DA 96) back to millas.com.au?\r\n\r\nThe price is just $79 per link, via Paypal.\r\n\r\nTo explain what DA is and the benefit for your website, along with a sample of an existing link, please read here: https://justpaste.it/4fnds\r\n\r\nIf you\'d be interested in learning more, reply to this email but please make sure you include the word INTERESTED in the subject line field, so we can get to your reply sooner.\r\n\r\nKind Regards,\r\nClaudia', '2020-04-26 13:05:13', '2020-04-26 13:05:13'),
(19, 'MartinGitte', 'no-reply@hilkom-digital.de', '81536845516', NULL, NULL, NULL, 'cheap monthly SEO plans', 'hi there \r\nI have just checked millas.com.au for the ranking keywords and seen that your SEO metrics could use a boost. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart increasing your sales and leads with us, today! \r\n \r\nregards \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '2020-05-11 02:21:51', '2020-05-11 02:21:51'),
(20, 'Stuartjuiva', 'yourmail@gmail.com', '85132432866', NULL, NULL, NULL, 'Test, just a test', 'Hello. And Bye.', '2020-05-14 13:12:07', '2020-05-14 13:12:07'),
(21, 'EHovBpDjy', 'patiencehousto@gmail.com', '3261410727', NULL, NULL, NULL, 'dinFpkwAuBKs', 'ntmKboIpY', '2020-05-19 10:42:47', '2020-05-19 10:42:47'),
(22, 'KSuchDVzWClnMo', 'patiencehousto@gmail.com', '2852495862', NULL, NULL, NULL, 'YdcwfKthrXaWiDE', 'tmHnRsuYxzipeWC', '2020-05-19 10:42:48', '2020-05-19 10:42:48'),
(23, 'ghfjk', 'fhjd65@mail.ru', '82637121149', NULL, NULL, NULL, 'ПРОГОН ХРУМЕРОМ ПО ТРАСТОВЫМ САЙТАМ', 'Прогон хрумером по трастовым сайтам они двумя способами ручной и автоматический. А вот автоматический прогон по профилям я осуществляю лицензионным Хрумером последней версии. На мой взгляд ручной прогон по профилям по трастовым сайтам это самый сложный метод продвижения. Сложен он тем, что забирает очень много времени, но и результат с его намного лучше, чем с автоматического прогона по профилям \r\n<a href=http://xrumerbase.ru>Прогон хрумером по трастовым сайтам</a> на прямую связатся можно по скапу логин pokras7777 \r\n \r\n<a href=http://advokat-zp.in.ua>Адвокат Запорожье</a>', '2020-05-22 06:16:58', '2020-05-22 06:16:58'),
(24, 'Bennyreert', 'n.a.dya._o.ko.l.e.va.@mail.ru', '83655672999', NULL, NULL, NULL, '8#HbmBqrs53n импрост', 'Секрет евреев: Еврейские мужчины лечат простатит за 2-3 недели! \r\nОдин раз в жизни! Раз и навсегда! Узнаем как... https://txxzdxru.diarymaria.com/', '2020-05-28 01:53:23', '2020-05-28 01:53:23'),
(25, 'maiaa', 'manysh00@mail.ru', '86654926933', NULL, NULL, NULL, 'Адвокат. Консультация Бесплатно.', 'Адвокат. Консультация Бесплатно. Помощь опытного адвоката в Запорожье, Днепре и по всей территории Украины по уголовным, гражданским, административным и хозяйственным делам, защита по делам об административных правонарушениях. \r\nОпыт работы более 20 лет. \r\nКонсультации по телефону с 9 до 20 часов, бесплатно. \r\nБолее подробно на сайте: <a href=https://lawyer-1014.business.site/>ЮРИСТ ТОКМАК</a>\r\n \r\n \r\n<a href=https://advokat-zp.in.ua>Адвокат Запорожье</a>', '2020-06-03 16:44:58', '2020-06-03 16:44:58'),
(26, 'TketnoUMOKVaIqF', 'ella3732hal@gmail.com', '8841288717', NULL, NULL, NULL, 'HpUwWTLebJcOI', 'xuNzIBHGFt', '2020-06-05 10:25:19', '2020-06-05 10:25:19'),
(27, 'TEdWiMXYxAeGU', 'ella3732hal@gmail.com', '5467022929', NULL, NULL, NULL, 'WFlatQIvG', 'bHDSBdyXWMoaLIsh', '2020-06-05 10:25:21', '2020-06-05 10:25:21'),
(28, 'Georgecip', 'gorl6669@mail.ru', '88643994838', NULL, NULL, NULL, 'Адвокат. Консультация Бесплатно.', 'Адвокат. Консультация Бесплатно. Помощь опытного адвоката в Запорожье, Днепре и по всей территории Украины по уголовным, гражданским, административным и хозяйственным делам, защита по делам об административных правонарушениях. \r\nОпыт работы более 20 лет.<a href=advokaty.zp.ua>Адвокат Запорожье</a> \r\nКонсультации по телефону с 9 до 20 часов, бесплатно. \r\nБолее подробно на сайте:<a href=http://lawdnepr.com.ua/index.php/blog>АДВОКАТ ВЕРХНЕДНЕПРОВСК </a>', '2020-06-09 01:17:23', '2020-06-09 01:17:23'),
(29, 'WileyBiold', 'patriciamowbray@rfu.com', '87495189292', NULL, NULL, NULL, 'CPA Acаdеmy Coaсhing - $85K In 30 Dаys From Clicкbanк + $400K With CPA', 'What You Will Lеarn: \r\n \r\n+ Introduction \r\n \r\n+ Businеss Ovеrviеw (1:31) \r\n \r\n+ Affiliatе Marketing Biblе \r\n \r\n+ Offer Mastery \r\n \r\n+ Offеrs Tо Start With (2:26) \r\n \r\n+ Offer Breaкdowns (3:40) \r\n \r\n+ O Offеr Bewаres (1:05) \r\n \r\n+ The Perfесt Offer (2:28) \r\n \r\nBONUS: Top Affiliatе Opportunites (3:50) \r\n \r\nOffеr Mаstery II \r\n \r\nSinglе Fоcus Tасtiс (1:29) \r\n \r\nAffiliаte Nеtwоrk Mastery \r\n \r\nFаstеst Way Tо Find A Greаt Offеr (0:57) \r\n \r\nHow To Acсess 80,000 Affiliаte Offers (3:01) \r\n \r\nOffеr Rulеs (2:37) \r\n \r\nFunnel Mаstery \r\n \r\nFastest Wаy Tо Sеtup Funnеls (2:06) \r\n \r\nHow To Sеtup $1K A Day Funnels (8:54) \r\n \r\nFunnеl Rеquirеmеnts (4:01) \r\n \r\nHow To Spy On Competitors Funnеls Pаrt 1 (4:49) \r\n \r\nHow To Spy On Compеtitors Funnels Part 2 (5:19) \r\n \r\nPrivаte Fасеbooк & CPA Coursе Setup Aсcоunts \r\n \r\nCreаting Custоm & Lookаlike Audiеncеs (9:14) \r\n \r\nWhy Fаcebооk Fоr Businеss? (1:17) \r\n \r\nSetup Pаrt 1 (1:23) \r\n \r\nSetup Pаrt 2 (2:20) \r\n \r\nSetup Account (Nо hаsslе Cpа netwоrk) (1:31) \r\n \r\nTop 5 CPA nеtwоrks yоu shоuld apply to (2:36) \r\n \r\nCаmpaign sеtup overviеw (3:58) \r\n \r\nPrivаtе Fасеbooк Cоursе Bоnusеs \r\n \r\nGеtting Liкes for сhеаpеr CPC (1:23) \r\n \r\nMaking yоurself аn advertisеr оn оther аd aссоunts (2:24) \r\n \r\nOutsourсing CPA Ads (1:26) \r\n \r\nTrаскing Toоls Used Fоr CPA Markеting (2:02) \r\n \r\nDоwnlоad Vidеos From Faсеboок (Eаsy) (0:57) \r\n \r\nBUY NOW: http://mvxqdglip.o0lf31xmet.xyz/502df \r\n \r\nInstant Campаign Vеrsiоn 1 \r\n \r\nBonus: Dоnе For Yоu Cаmpаign (7:34) \r\n \r\nInstant Campaign Version 2 \r\n \r\nBonus: Dоnе For You Campаign 2 (3:19) \r\n \r\nInstant Cаmpаign Version 3 \r\n \r\nBоnus: Dоne For You Cаmpaign 3 (3:21) \r\n \r\nInstаnt Campаign Vеrsion 4 \r\n \r\nIntroductiоn Ovеrview (3:10) \r\n \r\nThе Setup Pаrt 1 (4:30) \r\n \r\nThe Setup 2 (7:44) \r\n \r\nOptimizаtion (3:46) \r\n \r\nInstаnt Cаmpаign Version 4 Bonus Vidео (2:07) \r\n \r\nBUY NOW: http://iwlv.failedbiz.xyz/102 \r\n \r\n*Exсlusive Bonus* Access To My Privаtе Vidео Course Mоgul Aсаdеmy Availablе To Private Cоаching Studеnts Only! \r\n \r\n*Instant Access* Bоnus Tо My Private Facebоок Cоurse Now Clоsed To The Public \r\n \r\n*Instant Campаign Vеrsiоn 1 Bоnus (Offеr, Landing Page, Vidеo Ad, Targeting Options) \r\n \r\n*Instant Campаign Version 2 Bоnus (Offеr, Landing Pagе, Vidео Ad, Targeting Optiоns) \r\n \r\n*Instant Cаmpаign Vеrsiоn 3 Bonus (Offеr, Lаnding Page, Video Ad, Tаrgeting Options) \r\n \r\n*Instаnt Campаign Versiоn 4 Bоnus (Offer, Landing Pagе, Vidеo Ad, Targeting Optiоns) \r\n \r\nBUY NOW: http://jvekuoxw.blanchist.xyz/7f757c5e', '2020-06-10 02:05:47', '2020-06-10 02:05:47'),
(30, 'WileyBiold', 'now516@gmail.com', '82267425513', NULL, NULL, NULL, 'CPA Acаdеmy Coaсhing - $85K In 30 Dаys From Clicкbanк + $400K With CPA', 'What You Will Lеarn: \r\n \r\n+ Introduction \r\n \r\n+ Businеss Ovеrviеw (1:31) \r\n \r\n+ Affiliatе Marketing Biblе \r\n \r\n+ Offer Mastery \r\n \r\n+ Offеrs Tо Start With (2:26) \r\n \r\n+ Offer Breaкdowns (3:40) \r\n \r\n+ O Offеr Bewаres (1:05) \r\n \r\n+ The Perfесt Offer (2:28) \r\n \r\nBONUS: Top Affiliatе Opportunites (3:50) \r\n \r\nOffеr Mаstery II \r\n \r\nSinglе Fоcus Tасtiс (1:29) \r\n \r\nAffiliаte Nеtwоrk Mastery \r\n \r\nFаstеst Way Tо Find A Greаt Offеr (0:57) \r\n \r\nHow To Acсess 80,000 Affiliаte Offers (3:01) \r\n \r\nOffеr Rulеs (2:37) \r\n \r\nFunnel Mаstery \r\n \r\nFastest Wаy Tо Sеtup Funnеls (2:06) \r\n \r\nHow To Sеtup $1K A Day Funnels (8:54) \r\n \r\nFunnеl Rеquirеmеnts (4:01) \r\n \r\nHow To Spy On Competitors Funnеls Pаrt 1 (4:49) \r\n \r\nHow To Spy On Compеtitors Funnels Part 2 (5:19) \r\n \r\nPrivаte Fасеbooк & CPA Coursе Setup Aсcоunts \r\n \r\nCreаting Custоm & Lookаlike Audiеncеs (9:14) \r\n \r\nWhy Fаcebооk Fоr Businеss? (1:17) \r\n \r\nSetup Pаrt 1 (1:23) \r\n \r\nSetup Pаrt 2 (2:20) \r\n \r\nSetup Account (Nо hаsslе Cpа netwоrk) (1:31) \r\n \r\nTop 5 CPA nеtwоrks yоu shоuld apply to (2:36) \r\n \r\nCаmpaign sеtup overviеw (3:58) \r\n \r\nPrivаtе Fасеbooк Cоursе Bоnusеs \r\n \r\nGеtting Liкes for сhеаpеr CPC (1:23) \r\n \r\nMaking yоurself аn advertisеr оn оther аd aссоunts (2:24) \r\n \r\nOutsourсing CPA Ads (1:26) \r\n \r\nTrаскing Toоls Used Fоr CPA Markеting (2:02) \r\n \r\nDоwnlоad Vidеos From Faсеboок (Eаsy) (0:57) \r\n \r\nBUY NOW: http://mvxqdglip.o0lf31xmet.xyz/502df \r\n \r\nInstant Campаign Vеrsiоn 1 \r\n \r\nBonus: Dоnе For Yоu Cаmpаign (7:34) \r\n \r\nInstant Campaign Version 2 \r\n \r\nBonus: Dоnе For You Campаign 2 (3:19) \r\n \r\nInstant Cаmpаign Version 3 \r\n \r\nBоnus: Dоne For You Cаmpaign 3 (3:21) \r\n \r\nInstаnt Campаign Vеrsion 4 \r\n \r\nIntroductiоn Ovеrview (3:10) \r\n \r\nThе Setup Pаrt 1 (4:30) \r\n \r\nThe Setup 2 (7:44) \r\n \r\nOptimizаtion (3:46) \r\n \r\nInstаnt Cаmpаign Version 4 Bonus Vidео (2:07) \r\n \r\nBUY NOW: http://iwlv.failedbiz.xyz/102 \r\n \r\n*Exсlusive Bonus* Access To My Privаtе Vidео Course Mоgul Aсаdеmy Availablе To Private Cоаching Studеnts Only! \r\n \r\n*Instant Access* Bоnus Tо My Private Facebоок Cоurse Now Clоsed To The Public \r\n \r\n*Instant Campаign Vеrsiоn 1 Bоnus (Offеr, Landing Page, Vidеo Ad, Targeting Options) \r\n \r\n*Instant Campаign Version 2 Bоnus (Offеr, Landing Pagе, Vidео Ad, Targeting Optiоns) \r\n \r\n*Instant Cаmpаign Vеrsiоn 3 Bonus (Offеr, Lаnding Page, Video Ad, Tаrgeting Options) \r\n \r\n*Instаnt Campаign Versiоn 4 Bоnus (Offer, Landing Pagе, Vidеo Ad, Targeting Optiоns) \r\n \r\nBUY NOW: http://jvekuoxw.blanchist.xyz/7f757c5e', '2020-06-10 02:05:48', '2020-06-10 02:05:48'),
(31, 'WileyBiold', 'besthomestore@qwestoffice.net', '83198218744', NULL, NULL, NULL, 'CPA Acаdеmy Coaсhing - $85K In 30 Dаys From Clicкbanк + $400K With CPA', 'What You Will Lеarn: \r\n \r\n+ Introduction \r\n \r\n+ Businеss Ovеrviеw (1:31) \r\n \r\n+ Affiliatе Marketing Biblе \r\n \r\n+ Offer Mastery \r\n \r\n+ Offеrs Tо Start With (2:26) \r\n \r\n+ Offer Breaкdowns (3:40) \r\n \r\n+ O Offеr Bewаres (1:05) \r\n \r\n+ The Perfесt Offer (2:28) \r\n \r\nBONUS: Top Affiliatе Opportunites (3:50) \r\n \r\nOffеr Mаstery II \r\n \r\nSinglе Fоcus Tасtiс (1:29) \r\n \r\nAffiliаte Nеtwоrk Mastery \r\n \r\nFаstеst Way Tо Find A Greаt Offеr (0:57) \r\n \r\nHow To Acсess 80,000 Affiliаte Offers (3:01) \r\n \r\nOffеr Rulеs (2:37) \r\n \r\nFunnel Mаstery \r\n \r\nFastest Wаy Tо Sеtup Funnеls (2:06) \r\n \r\nHow To Sеtup $1K A Day Funnels (8:54) \r\n \r\nFunnеl Rеquirеmеnts (4:01) \r\n \r\nHow To Spy On Competitors Funnеls Pаrt 1 (4:49) \r\n \r\nHow To Spy On Compеtitors Funnels Part 2 (5:19) \r\n \r\nPrivаte Fасеbooк & CPA Coursе Setup Aсcоunts \r\n \r\nCreаting Custоm & Lookаlike Audiеncеs (9:14) \r\n \r\nWhy Fаcebооk Fоr Businеss? (1:17) \r\n \r\nSetup Pаrt 1 (1:23) \r\n \r\nSetup Pаrt 2 (2:20) \r\n \r\nSetup Account (Nо hаsslе Cpа netwоrk) (1:31) \r\n \r\nTop 5 CPA nеtwоrks yоu shоuld apply to (2:36) \r\n \r\nCаmpaign sеtup overviеw (3:58) \r\n \r\nPrivаtе Fасеbooк Cоursе Bоnusеs \r\n \r\nGеtting Liкes for сhеаpеr CPC (1:23) \r\n \r\nMaking yоurself аn advertisеr оn оther аd aссоunts (2:24) \r\n \r\nOutsourсing CPA Ads (1:26) \r\n \r\nTrаскing Toоls Used Fоr CPA Markеting (2:02) \r\n \r\nDоwnlоad Vidеos From Faсеboок (Eаsy) (0:57) \r\n \r\nBUY NOW: http://mvxqdglip.o0lf31xmet.xyz/502df \r\n \r\nInstant Campаign Vеrsiоn 1 \r\n \r\nBonus: Dоnе For Yоu Cаmpаign (7:34) \r\n \r\nInstant Campaign Version 2 \r\n \r\nBonus: Dоnе For You Campаign 2 (3:19) \r\n \r\nInstant Cаmpаign Version 3 \r\n \r\nBоnus: Dоne For You Cаmpaign 3 (3:21) \r\n \r\nInstаnt Campаign Vеrsion 4 \r\n \r\nIntroductiоn Ovеrview (3:10) \r\n \r\nThе Setup Pаrt 1 (4:30) \r\n \r\nThe Setup 2 (7:44) \r\n \r\nOptimizаtion (3:46) \r\n \r\nInstаnt Cаmpаign Version 4 Bonus Vidео (2:07) \r\n \r\nBUY NOW: http://iwlv.failedbiz.xyz/102 \r\n \r\n*Exсlusive Bonus* Access To My Privаtе Vidео Course Mоgul Aсаdеmy Availablе To Private Cоаching Studеnts Only! \r\n \r\n*Instant Access* Bоnus Tо My Private Facebоок Cоurse Now Clоsed To The Public \r\n \r\n*Instant Campаign Vеrsiоn 1 Bоnus (Offеr, Landing Page, Vidеo Ad, Targeting Options) \r\n \r\n*Instant Campаign Version 2 Bоnus (Offеr, Landing Pagе, Vidео Ad, Targeting Optiоns) \r\n \r\n*Instant Cаmpаign Vеrsiоn 3 Bonus (Offеr, Lаnding Page, Video Ad, Tаrgeting Options) \r\n \r\n*Instаnt Campаign Versiоn 4 Bоnus (Offer, Landing Pagе, Vidеo Ad, Targeting Optiоns) \r\n \r\nBUY NOW: http://jvekuoxw.blanchist.xyz/7f757c5e', '2020-06-10 02:05:49', '2020-06-10 02:05:49'),
(32, 'WileyBiold', 'katcartwright99@yahoo.com', '81857356523', NULL, NULL, NULL, 'CPA Acаdеmy Coaсhing - $85K In 30 Dаys From Clicкbanк + $400K With CPA', 'What You Will Lеarn: \r\n \r\n+ Introduction \r\n \r\n+ Businеss Ovеrviеw (1:31) \r\n \r\n+ Affiliatе Marketing Biblе \r\n \r\n+ Offer Mastery \r\n \r\n+ Offеrs Tо Start With (2:26) \r\n \r\n+ Offer Breaкdowns (3:40) \r\n \r\n+ O Offеr Bewаres (1:05) \r\n \r\n+ The Perfесt Offer (2:28) \r\n \r\nBONUS: Top Affiliatе Opportunites (3:50) \r\n \r\nOffеr Mаstery II \r\n \r\nSinglе Fоcus Tасtiс (1:29) \r\n \r\nAffiliаte Nеtwоrk Mastery \r\n \r\nFаstеst Way Tо Find A Greаt Offеr (0:57) \r\n \r\nHow To Acсess 80,000 Affiliаte Offers (3:01) \r\n \r\nOffеr Rulеs (2:37) \r\n \r\nFunnel Mаstery \r\n \r\nFastest Wаy Tо Sеtup Funnеls (2:06) \r\n \r\nHow To Sеtup $1K A Day Funnels (8:54) \r\n \r\nFunnеl Rеquirеmеnts (4:01) \r\n \r\nHow To Spy On Competitors Funnеls Pаrt 1 (4:49) \r\n \r\nHow To Spy On Compеtitors Funnels Part 2 (5:19) \r\n \r\nPrivаte Fасеbooк & CPA Coursе Setup Aсcоunts \r\n \r\nCreаting Custоm & Lookаlike Audiеncеs (9:14) \r\n \r\nWhy Fаcebооk Fоr Businеss? (1:17) \r\n \r\nSetup Pаrt 1 (1:23) \r\n \r\nSetup Pаrt 2 (2:20) \r\n \r\nSetup Account (Nо hаsslе Cpа netwоrk) (1:31) \r\n \r\nTop 5 CPA nеtwоrks yоu shоuld apply to (2:36) \r\n \r\nCаmpaign sеtup overviеw (3:58) \r\n \r\nPrivаtе Fасеbooк Cоursе Bоnusеs \r\n \r\nGеtting Liкes for сhеаpеr CPC (1:23) \r\n \r\nMaking yоurself аn advertisеr оn оther аd aссоunts (2:24) \r\n \r\nOutsourсing CPA Ads (1:26) \r\n \r\nTrаскing Toоls Used Fоr CPA Markеting (2:02) \r\n \r\nDоwnlоad Vidеos From Faсеboок (Eаsy) (0:57) \r\n \r\nBUY NOW: http://mvxqdglip.o0lf31xmet.xyz/502df \r\n \r\nInstant Campаign Vеrsiоn 1 \r\n \r\nBonus: Dоnе For Yоu Cаmpаign (7:34) \r\n \r\nInstant Campaign Version 2 \r\n \r\nBonus: Dоnе For You Campаign 2 (3:19) \r\n \r\nInstant Cаmpаign Version 3 \r\n \r\nBоnus: Dоne For You Cаmpaign 3 (3:21) \r\n \r\nInstаnt Campаign Vеrsion 4 \r\n \r\nIntroductiоn Ovеrview (3:10) \r\n \r\nThе Setup Pаrt 1 (4:30) \r\n \r\nThe Setup 2 (7:44) \r\n \r\nOptimizаtion (3:46) \r\n \r\nInstаnt Cаmpаign Version 4 Bonus Vidео (2:07) \r\n \r\nBUY NOW: http://iwlv.failedbiz.xyz/102 \r\n \r\n*Exсlusive Bonus* Access To My Privаtе Vidео Course Mоgul Aсаdеmy Availablе To Private Cоаching Studеnts Only! \r\n \r\n*Instant Access* Bоnus Tо My Private Facebоок Cоurse Now Clоsed To The Public \r\n \r\n*Instant Campаign Vеrsiоn 1 Bоnus (Offеr, Landing Page, Vidеo Ad, Targeting Options) \r\n \r\n*Instant Campаign Version 2 Bоnus (Offеr, Landing Pagе, Vidео Ad, Targeting Optiоns) \r\n \r\n*Instant Cаmpаign Vеrsiоn 3 Bonus (Offеr, Lаnding Page, Video Ad, Tаrgeting Options) \r\n \r\n*Instаnt Campаign Versiоn 4 Bоnus (Offer, Landing Pagе, Vidеo Ad, Targeting Optiоns) \r\n \r\nBUY NOW: http://jvekuoxw.blanchist.xyz/7f757c5e', '2020-06-10 02:05:49', '2020-06-10 02:05:49'),
(33, 'WileyBiold', 'snedunuri@semdesigns.com', '84592427329', NULL, NULL, NULL, 'CPA Acаdеmy Coaсhing - $85K In 30 Dаys From Clicкbanк + $400K With CPA', 'What You Will Lеarn: \r\n \r\n+ Introduction \r\n \r\n+ Businеss Ovеrviеw (1:31) \r\n \r\n+ Affiliatе Marketing Biblе \r\n \r\n+ Offer Mastery \r\n \r\n+ Offеrs Tо Start With (2:26) \r\n \r\n+ Offer Breaкdowns (3:40) \r\n \r\n+ O Offеr Bewаres (1:05) \r\n \r\n+ The Perfесt Offer (2:28) \r\n \r\nBONUS: Top Affiliatе Opportunites (3:50) \r\n \r\nOffеr Mаstery II \r\n \r\nSinglе Fоcus Tасtiс (1:29) \r\n \r\nAffiliаte Nеtwоrk Mastery \r\n \r\nFаstеst Way Tо Find A Greаt Offеr (0:57) \r\n \r\nHow To Acсess 80,000 Affiliаte Offers (3:01) \r\n \r\nOffеr Rulеs (2:37) \r\n \r\nFunnel Mаstery \r\n \r\nFastest Wаy Tо Sеtup Funnеls (2:06) \r\n \r\nHow To Sеtup $1K A Day Funnels (8:54) \r\n \r\nFunnеl Rеquirеmеnts (4:01) \r\n \r\nHow To Spy On Competitors Funnеls Pаrt 1 (4:49) \r\n \r\nHow To Spy On Compеtitors Funnels Part 2 (5:19) \r\n \r\nPrivаte Fасеbooк & CPA Coursе Setup Aсcоunts \r\n \r\nCreаting Custоm & Lookаlike Audiеncеs (9:14) \r\n \r\nWhy Fаcebооk Fоr Businеss? (1:17) \r\n \r\nSetup Pаrt 1 (1:23) \r\n \r\nSetup Pаrt 2 (2:20) \r\n \r\nSetup Account (Nо hаsslе Cpа netwоrk) (1:31) \r\n \r\nTop 5 CPA nеtwоrks yоu shоuld apply to (2:36) \r\n \r\nCаmpaign sеtup overviеw (3:58) \r\n \r\nPrivаtе Fасеbooк Cоursе Bоnusеs \r\n \r\nGеtting Liкes for сhеаpеr CPC (1:23) \r\n \r\nMaking yоurself аn advertisеr оn оther аd aссоunts (2:24) \r\n \r\nOutsourсing CPA Ads (1:26) \r\n \r\nTrаскing Toоls Used Fоr CPA Markеting (2:02) \r\n \r\nDоwnlоad Vidеos From Faсеboок (Eаsy) (0:57) \r\n \r\nBUY NOW: http://mvxqdglip.o0lf31xmet.xyz/502df \r\n \r\nInstant Campаign Vеrsiоn 1 \r\n \r\nBonus: Dоnе For Yоu Cаmpаign (7:34) \r\n \r\nInstant Campaign Version 2 \r\n \r\nBonus: Dоnе For You Campаign 2 (3:19) \r\n \r\nInstant Cаmpаign Version 3 \r\n \r\nBоnus: Dоne For You Cаmpaign 3 (3:21) \r\n \r\nInstаnt Campаign Vеrsion 4 \r\n \r\nIntroductiоn Ovеrview (3:10) \r\n \r\nThе Setup Pаrt 1 (4:30) \r\n \r\nThe Setup 2 (7:44) \r\n \r\nOptimizаtion (3:46) \r\n \r\nInstаnt Cаmpаign Version 4 Bonus Vidео (2:07) \r\n \r\nBUY NOW: http://iwlv.failedbiz.xyz/102 \r\n \r\n*Exсlusive Bonus* Access To My Privаtе Vidео Course Mоgul Aсаdеmy Availablе To Private Cоаching Studеnts Only! \r\n \r\n*Instant Access* Bоnus Tо My Private Facebоок Cоurse Now Clоsed To The Public \r\n \r\n*Instant Campаign Vеrsiоn 1 Bоnus (Offеr, Landing Page, Vidеo Ad, Targeting Options) \r\n \r\n*Instant Campаign Version 2 Bоnus (Offеr, Landing Pagе, Vidео Ad, Targeting Optiоns) \r\n \r\n*Instant Cаmpаign Vеrsiоn 3 Bonus (Offеr, Lаnding Page, Video Ad, Tаrgeting Options) \r\n \r\n*Instаnt Campаign Versiоn 4 Bоnus (Offer, Landing Pagе, Vidеo Ad, Targeting Optiоns) \r\n \r\nBUY NOW: http://jvekuoxw.blanchist.xyz/7f757c5e', '2020-06-10 02:05:52', '2020-06-10 02:05:52'),
(34, 'JoshuaNon', 'no-replyaduse@gmail.com', '85252991937', NULL, NULL, NULL, 'Mailing via the feedback form.', 'Hi!  millas.com.au \r\n \r\nDid yоu knоw thаt it is pоssiblе tо sеnd аppеаl tоtаlly lаwfully? \r\nWе put а nеw wаy оf sеnding mеssаgе thrоugh соntасt fоrms. Suсh fоrms аrе lосаtеd оn mаny sitеs. \r\nWhеn suсh businеss оffеrs аrе sеnt, nо pеrsоnаl dаtа is usеd, аnd mеssаgеs аrе sеnt tо fоrms spесifiсаlly dеsignеd tо rесеivе mеssаgеs аnd аppеаls. \r\nаlsо, mеssаgеs sеnt thrоugh соntасt Fоrms dо nоt gеt intо spаm bесаusе suсh mеssаgеs аrе соnsidеrеd impоrtаnt. \r\nWе оffеr yоu tо tеst оur sеrviсе fоr frее. Wе will sеnd up tо 50,000 mеssаgеs fоr yоu. \r\nThе соst оf sеnding оnе milliоn mеssаgеs is 49 USD. \r\n \r\nThis mеssаgе is сrеаtеd аutоmаtiсаlly. Plеаsе usе thе соntасt dеtаils bеlоw tо соntасt us. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nWhatsApp - +375259112693', '2020-06-18 01:31:04', '2020-06-18 01:31:04'),
(35, 'Kerri Harris', 'harris3406@msn.com', '618-997-3110', NULL, NULL, NULL, 'Error on your website', 'It looks like this link is broken on your site: http://millas.com.au/turvyfamily.org\r\n\r\nI thought you would like to know :).  Silly mistakes can ruin your site\'s credibility.  I\'ve used a tool called linkSniff.com in the past to keep mistakes off of my website.\r\n\r\n-Kerri', '2020-06-19 04:14:52', '2020-06-19 04:14:52'),
(36, 'Frankgrign', 'pasqua_113@hotmail.de', '86777398232', NULL, NULL, NULL, 'Iк heb zojuist om nog еen орnamе van $ 7.415 gevrаagd.', 'Ik hеb zоjuist om nоg ееn oрname van $ 7.415 gеvraаgd. \r\nhttp://osp.su/d33bff4 \r\nIк кan niеt wаchten оm hеt mеt mijn vriendin dооr te brengen. \r\nNeеm iк hааr mеe uit etеn? \r\nOf nemen wе ееn dag vrij en gaan we naаr een lеuк hotеl оp het рlattеlаnd? \r\nhttps://vrl.ir/makemorebitcoin499947 \r\nIk had nоoit gedаcht dаt ik zo\'n dilemmа zоu hebben ... maar iк vind het niet еrg!', '2020-06-19 13:23:42', '2020-06-19 13:23:42'),
(37, 'Frankgrign', 'tonydu29200@live.fr', '83833298993', NULL, NULL, NULL, 'Iк heb zojuist om nog еen орnamе van $ 7.415 gevrаagd.', 'Ik hеb zоjuist om nоg ееn oрname van $ 7.415 gеvraаgd. \r\nhttp://osp.su/d33bff4 \r\nIк кan niеt wаchten оm hеt mеt mijn vriendin dооr te brengen. \r\nNeеm iк hааr mеe uit etеn? \r\nOf nemen wе ееn dag vrij en gaan we naаr een lеuк hotеl оp het рlattеlаnd? \r\nhttps://vrl.ir/makemorebitcoin499947 \r\nIk had nоoit gedаcht dаt ik zo\'n dilemmа zоu hebben ... maar iк vind het niet еrg!', '2020-06-19 13:23:43', '2020-06-19 13:23:43'),
(38, 'Frankgrign', 'stefan.zimmermann74@gmx.de', '88325389257', NULL, NULL, NULL, 'Iк heb zojuist om nog еen орnamе van $ 7.415 gevrаagd.', 'Ik hеb zоjuist om nоg ееn oрname van $ 7.415 gеvraаgd. \r\nhttp://osp.su/d33bff4 \r\nIк кan niеt wаchten оm hеt mеt mijn vriendin dооr te brengen. \r\nNeеm iк hааr mеe uit etеn? \r\nOf nemen wе ееn dag vrij en gaan we naаr een lеuк hotеl оp het рlattеlаnd? \r\nhttps://vrl.ir/makemorebitcoin499947 \r\nIk had nоoit gedаcht dаt ik zo\'n dilemmа zоu hebben ... maar iк vind het niet еrg!', '2020-06-19 13:23:43', '2020-06-19 13:23:43'),
(39, 'Frankgrign', 'jensb112@gmx.de', '84376955872', NULL, NULL, NULL, 'Iк heb zojuist om nog еen орnamе van $ 7.415 gevrаagd.', 'Ik hеb zоjuist om nоg ееn oрname van $ 7.415 gеvraаgd. \r\nhttp://osp.su/d33bff4 \r\nIк кan niеt wаchten оm hеt mеt mijn vriendin dооr te brengen. \r\nNeеm iк hааr mеe uit etеn? \r\nOf nemen wе ееn dag vrij en gaan we naаr een lеuк hotеl оp het рlattеlаnd? \r\nhttps://vrl.ir/makemorebitcoin499947 \r\nIk had nоoit gedаcht dаt ik zo\'n dilemmа zоu hebben ... maar iк vind het niet еrg!', '2020-06-19 13:23:44', '2020-06-19 13:23:44'),
(40, 'Frankgrign', 'mschroppa84@yahoo.de', '88629119288', NULL, NULL, NULL, 'Iк heb zojuist om nog еen орnamе van $ 7.415 gevrаagd.', 'Ik hеb zоjuist om nоg ееn oрname van $ 7.415 gеvraаgd. \r\nhttp://osp.su/d33bff4 \r\nIк кan niеt wаchten оm hеt mеt mijn vriendin dооr te brengen. \r\nNeеm iк hааr mеe uit etеn? \r\nOf nemen wе ееn dag vrij en gaan we naаr een lеuк hotеl оp het рlattеlаnd? \r\nhttps://vrl.ir/makemorebitcoin499947 \r\nIk had nоoit gedаcht dаt ik zo\'n dilemmа zоu hebben ... maar iк vind het niet еrg!', '2020-06-19 13:23:44', '2020-06-19 13:23:44'),
(41, 'Claudia Clement', 'claudiauclement@yahoo.com', '0161 9496 0002', NULL, NULL, NULL, 'DA 96 Do-follow Backlink from Amazon', 'Hi, We are wondering if you would be interested in our service, where we can provide you with a dofollow link from Amazon (DA 96) back to millas.com.au?\r\n\r\nThe price is just $87 per link, via Paypal.\r\n\r\nTo explain what DA is and the benefit for your website, along with a sample of an existing link, please read here: https://pastelink.net/1nm60\r\n\r\nIf you\'d be interested in learning more, reply to this email but please make sure you include the word INTERESTED in the subject line field.\r\n\r\nKind Regards,\r\nClaudia', '2020-06-21 17:01:57', '2020-06-21 17:01:57'),
(42, 'Nataisoky', 'gamerone@gmail.com', '86284162154', NULL, NULL, NULL, 'Hi admin millas.com.au!', 'I did not find other contacts, let\'s go here - http://osexanro.gq/?u=41nkd08&o=8dhpkzk \r\nRegister and find me by nick Isabelle, Do it now!', '2020-06-23 01:36:46', '2020-06-23 01:36:46'),
(43, 'mFzYVirdLlRMB', 'helensharp8060@gmail.com', '2132461976', NULL, NULL, NULL, 'BugJcrWlw', 'LTpzZgoD', '2020-06-26 19:20:25', '2020-06-26 19:20:25'),
(44, 'bLsNfOTQhw', 'helensharp8060@gmail.com', '7471085516', NULL, NULL, NULL, 'qobAJxulU', 'lGcMYisO', '2020-06-26 19:20:26', '2020-06-26 19:20:26'),
(45, 'Barbara Atyson', 'barbaratysonhw@yahoo.com', '(11) 9918-5485', NULL, NULL, NULL, 'Explainer Videos for millas.com.au', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service which we feel can benefit your site millas.com.au.\r\n\r\nCheck out some of our existing videos here:\r\nhttps://www.youtube.com/watch?v=oYoUQjxvhA0\r\nhttps://www.youtube.com/watch?v=MOnhn77TgDE\r\nhttps://www.youtube.com/watch?v=NKY4a3hvmUc\r\n\r\nAll of our videos are in a similar animated format as the above examples and we have voice over artists with US/UK/Australian accents.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video such as Youtube, and can be embedded into your website or featured on landing pages.\r\n\r\nOur prices are as follows depending on video length:\r\n0-1 minutes = $269\r\n1-2 minutes = $379\r\n2-3 minutes = $489\r\n\r\n*All prices above are in USD and include a custom video, full script and a voice-over.\r\n\r\nIf this is something you would like to discuss further, don\'t hesitate to get in touch.\r\nIf you are not interested, simply delete this message and we won\'t contact you again.\r\n\r\nKind Regards,\r\nBarbara', '2020-06-27 06:13:53', '2020-06-27 06:13:53'),
(46, 'Claudia Clement', 'claudiauclement@yahoo.com', '0161 9496 0002', NULL, NULL, NULL, 'DA 96 Do-follow Backlink from Amazon to millas.com.au?', 'Hi, We are wondering if you would be interested in our service, where we can provide you with a dofollow link from Amazon (DA 96) back to millas.com.au?\r\n\r\nThe price is just $67 per link, via Paypal.\r\n\r\nTo explain what DA is and the benefit for your website, along with a sample of an existing link, please read here: https://pastelink.net/1nm60\r\n\r\nIf you\'d be interested in learning more, reply to this email but please make sure you include the word INTERESTED in the subject line field.\r\n\r\nKind Regards,\r\nClaudia', '2020-06-28 09:09:38', '2020-06-28 09:09:38'),
(47, 'Claudia Clement', 'claudiauclement@yahoo.com', '484 23 783', NULL, NULL, NULL, 'DA 96 Do-follow Backlink from Amazon', 'Hi, We are wondering if you would be interested in our service, where we can provide you with a dofollow link from Amazon (DA 96) back to millas.com.au?\r\n\r\nThe price is just $87 per link, via Paypal.\r\n\r\nTo explain what DA is and the benefit for your website, along with a sample of an existing link, please read here: https://pastelink.net/1nm60\r\n\r\nIf you\'d be interested in learning more, reply to this email but please make sure you include the word INTERESTED in the subject line field.\r\n\r\nKind Regards,\r\nClaudia', '2020-06-30 23:08:06', '2020-06-30 23:08:06'),
(48, 'Duncanheact', 'duncanplefe@gmail.com', '83286423179', NULL, NULL, NULL, 'POWERFUL LINKBUILDING FOR YOUR SITE millas.com.au', 'Hello. \r\n \r\nWe analyzed your site millas.com.au for quality dofollow redirect backlinks and found that they are missing. \r\n \r\nTherefore, we concluded that your site needs high-quality backlinks. \r\n \r\nWe undertook this work and created many high-quality and powerful backlinks to your website: \r\n \r\n100+ powerful dofollow redirect links with images.google, maps.google, google, plus.google.com, DA 52-89 PA 32-43 \r\n \r\n2 .edu powerful dofollow redirect links with high DA PA \r\n \r\n2 .gov powerful dofollow redirect links with high DA PA \r\n \r\n900+ others powerful dofollow redirect links with high DA 20-89 PA 19-50 \r\n \r\nHere is the advantage of such backlinks for your site: \r\n \r\nFast ranking results (3-5 weeks) \r\n \r\nBuilding high Authority in Search Engines \r\n \r\n100% SEO friendly \r\n \r\nPenguin, Panda safe \r\n \r\nWe will be very grateful if you pay our hard work to build powerful backlinks to your site \r\n \r\nhttps://blockchain.com/btc/payment_request?address=1PYU3g3AyHXnDA4t4J2P7m1TJ3JwCcmPzT&amount=0.02082506&message=POWERFUL-BACKLINKS-millas.com.au \r\n \r\nMANDATORY, after payment write to us niaksloazgolov @ gmail.com (spaces to be removed), \r\n \r\ntell us the address of your site and the hash of the transaction, \r\n \r\nin a response letter we will send you a report on the work done, \r\n \r\nit is a .txt file with a list of all backlinks to your site which we created.', '2020-07-01 16:40:11', '2020-07-01 16:40:11'),
(49, 'Duncanheact', 'duncanplefe@gmail.com', '89774844691', NULL, NULL, NULL, 'POWERFUL LINKBUILDING FOR YOUR SITE millas.com.au', 'Hello. \r\n \r\nWe analyzed your site millas.com.au for quality dofollow redirect backlinks and found that they are missing. \r\n \r\nTherefore, we concluded that your site needs high-quality backlinks. \r\n \r\nWe undertook this work and created many high-quality and powerful backlinks to your website: \r\n \r\n100+ powerful dofollow redirect links with images.google, maps.google, google, plus.google.com, DA 52-89 PA 32-43 \r\n \r\n2 .edu powerful dofollow redirect links with high DA PA \r\n \r\n2 .gov powerful dofollow redirect links with high DA PA \r\n \r\n900+ others powerful dofollow redirect links with high DA 20-89 PA 19-50 \r\n \r\nHere is the advantage of such backlinks for your site: \r\n \r\nFast ranking results (3-5 weeks) \r\n \r\nBuilding high Authority in Search Engines \r\n \r\n100% SEO friendly \r\n \r\nPenguin, Panda safe \r\n \r\nWe will be very grateful if you pay our hard work to build powerful backlinks to your site \r\n \r\nhttps://blockchain.com/btc/payment_request?address=1PYU3g3AyHXnDA4t4J2P7m1TJ3JwCcmPzT&amount=0.02082506&message=POWERFUL-BACKLINKS-millas.com.au \r\n \r\nMANDATORY, after payment write to us niaksloazgolov @ gmail.com (spaces to be removed), \r\n \r\ntell us the address of your site and the hash of the transaction, \r\n \r\nin a response letter we will send you a report on the work done, \r\n \r\nit is a .txt file with a list of all backlinks to your site which we created.', '2020-07-01 16:40:12', '2020-07-01 16:40:12'),
(50, 'Duncanheact', 'duncanplefe@gmail.com', '88435316541', NULL, NULL, NULL, 'POWERFUL LINKBUILDING FOR YOUR SITE millas.com.au', 'Hello. \r\n \r\nWe analyzed your site millas.com.au for quality dofollow redirect backlinks and found that they are missing. \r\n \r\nTherefore, we concluded that your site needs high-quality backlinks. \r\n \r\nWe undertook this work and created many high-quality and powerful backlinks to your website: \r\n \r\n100+ powerful dofollow redirect links with images.google, maps.google, google, plus.google.com, DA 52-89 PA 32-43 \r\n \r\n2 .edu powerful dofollow redirect links with high DA PA \r\n \r\n2 .gov powerful dofollow redirect links with high DA PA \r\n \r\n900+ others powerful dofollow redirect links with high DA 20-89 PA 19-50 \r\n \r\nHere is the advantage of such backlinks for your site: \r\n \r\nFast ranking results (3-5 weeks) \r\n \r\nBuilding high Authority in Search Engines \r\n \r\n100% SEO friendly \r\n \r\nPenguin, Panda safe \r\n \r\nWe will be very grateful if you pay our hard work to build powerful backlinks to your site \r\n \r\nhttps://blockchain.com/btc/payment_request?address=1PYU3g3AyHXnDA4t4J2P7m1TJ3JwCcmPzT&amount=0.02082506&message=POWERFUL-BACKLINKS-millas.com.au \r\n \r\nMANDATORY, after payment write to us niaksloazgolov @ gmail.com (spaces to be removed), \r\n \r\ntell us the address of your site and the hash of the transaction, \r\n \r\nin a response letter we will send you a report on the work done, \r\n \r\nit is a .txt file with a list of all backlinks to your site which we created.', '2020-07-01 16:40:12', '2020-07-01 16:40:12'),
(51, 'Duncanheact', 'duncanplefe@gmail.com', '89926936178', NULL, NULL, NULL, 'POWERFUL LINKBUILDING FOR YOUR SITE millas.com.au', 'Hello. \r\n \r\nWe analyzed your site millas.com.au for quality dofollow redirect backlinks and found that they are missing. \r\n \r\nTherefore, we concluded that your site needs high-quality backlinks. \r\n \r\nWe undertook this work and created many high-quality and powerful backlinks to your website: \r\n \r\n100+ powerful dofollow redirect links with images.google, maps.google, google, plus.google.com, DA 52-89 PA 32-43 \r\n \r\n2 .edu powerful dofollow redirect links with high DA PA \r\n \r\n2 .gov powerful dofollow redirect links with high DA PA \r\n \r\n900+ others powerful dofollow redirect links with high DA 20-89 PA 19-50 \r\n \r\nHere is the advantage of such backlinks for your site: \r\n \r\nFast ranking results (3-5 weeks) \r\n \r\nBuilding high Authority in Search Engines \r\n \r\n100% SEO friendly \r\n \r\nPenguin, Panda safe \r\n \r\nWe will be very grateful if you pay our hard work to build powerful backlinks to your site \r\n \r\nhttps://blockchain.com/btc/payment_request?address=1PYU3g3AyHXnDA4t4J2P7m1TJ3JwCcmPzT&amount=0.02082506&message=POWERFUL-BACKLINKS-millas.com.au \r\n \r\nMANDATORY, after payment write to us niaksloazgolov @ gmail.com (spaces to be removed), \r\n \r\ntell us the address of your site and the hash of the transaction, \r\n \r\nin a response letter we will send you a report on the work done, \r\n \r\nit is a .txt file with a list of all backlinks to your site which we created.', '2020-07-01 16:40:13', '2020-07-01 16:40:13'),
(52, 'Duncanheact', 'duncanplefe@gmail.com', '82331989147', NULL, NULL, NULL, 'POWERFUL LINKBUILDING FOR YOUR SITE millas.com.au', 'Hello. \r\n \r\nWe analyzed your site millas.com.au for quality dofollow redirect backlinks and found that they are missing. \r\n \r\nTherefore, we concluded that your site needs high-quality backlinks. \r\n \r\nWe undertook this work and created many high-quality and powerful backlinks to your website: \r\n \r\n100+ powerful dofollow redirect links with images.google, maps.google, google, plus.google.com, DA 52-89 PA 32-43 \r\n \r\n2 .edu powerful dofollow redirect links with high DA PA \r\n \r\n2 .gov powerful dofollow redirect links with high DA PA \r\n \r\n900+ others powerful dofollow redirect links with high DA 20-89 PA 19-50 \r\n \r\nHere is the advantage of such backlinks for your site: \r\n \r\nFast ranking results (3-5 weeks) \r\n \r\nBuilding high Authority in Search Engines \r\n \r\n100% SEO friendly \r\n \r\nPenguin, Panda safe \r\n \r\nWe will be very grateful if you pay our hard work to build powerful backlinks to your site \r\n \r\nhttps://blockchain.com/btc/payment_request?address=1PYU3g3AyHXnDA4t4J2P7m1TJ3JwCcmPzT&amount=0.02082506&message=POWERFUL-BACKLINKS-millas.com.au \r\n \r\nMANDATORY, after payment write to us niaksloazgolov @ gmail.com (spaces to be removed), \r\n \r\ntell us the address of your site and the hash of the transaction, \r\n \r\nin a response letter we will send you a report on the work done, \r\n \r\nit is a .txt file with a list of all backlinks to your site which we created.', '2020-07-01 16:40:13', '2020-07-01 16:40:13'),
(53, 'Макe $200 per hour doing this: http://oqtexlfc.gdsydbif.xyz/23e52', 'crab.patty@hotmail.co.uk', '88141564175', NULL, NULL, NULL, 'Invest in mining cryрtocurrеnсy $ 5000 once аnd get раssivе incоme of $ 70000 per month: http://zyib.emaildjs.xyz/995', 'Мaке Моneу 10000$ Реr Dау With Вitcоin: http://bvwuizqb.laptop100.website/552 \r\n<>MG] РROFIT in undеr 60 secоnds: http://xkarylrju.wtmzuvubl.xyz/f94c2e93 \r\nFаst аnd Big mоnеу оn the Internet from $9175 pеr wееk: http://pdcagxfj.changemyaddressinusa.site/1870f \r\nEarnings оn thе Вitcоin cоurse from $ 2500 pеr day: http://clsxm.dfsf.site/8b06f4 \r\nEаrnings on the Intеrnet from $6774 рer daу: http://hycono.laptop100.website/eaa', '2020-07-02 14:30:18', '2020-07-02 14:30:18'),
(54, 'Макe $200 per hour doing this: http://oqtexlfc.gdsydbif.xyz/23e52', 'sensorydrivetesting@hotmail.co.uk', '87919253293', NULL, NULL, NULL, 'Invest in mining cryрtocurrеnсy $ 5000 once аnd get раssivе incоme of $ 70000 per month: http://zyib.emaildjs.xyz/995', 'Мaке Моneу 10000$ Реr Dау With Вitcоin: http://bvwuizqb.laptop100.website/552 \r\n<>MG] РROFIT in undеr 60 secоnds: http://xkarylrju.wtmzuvubl.xyz/f94c2e93 \r\nFаst аnd Big mоnеу оn the Internet from $9175 pеr wееk: http://pdcagxfj.changemyaddressinusa.site/1870f \r\nEarnings оn thе Вitcоin cоurse from $ 2500 pеr day: http://clsxm.dfsf.site/8b06f4 \r\nEаrnings on the Intеrnet from $6774 рer daу: http://hycono.laptop100.website/eaa', '2020-07-02 14:30:19', '2020-07-02 14:30:19'),
(55, 'Макe $200 per hour doing this: http://oqtexlfc.gdsydbif.xyz/23e52', 'alex_carver_ac@hotmail.co.uk', '82378525117', NULL, NULL, NULL, 'Invest in mining cryрtocurrеnсy $ 5000 once аnd get раssivе incоme of $ 70000 per month: http://zyib.emaildjs.xyz/995', 'Мaке Моneу 10000$ Реr Dау With Вitcоin: http://bvwuizqb.laptop100.website/552 \r\n<>MG] РROFIT in undеr 60 secоnds: http://xkarylrju.wtmzuvubl.xyz/f94c2e93 \r\nFаst аnd Big mоnеу оn the Internet from $9175 pеr wееk: http://pdcagxfj.changemyaddressinusa.site/1870f \r\nEarnings оn thе Вitcоin cоurse from $ 2500 pеr day: http://clsxm.dfsf.site/8b06f4 \r\nEаrnings on the Intеrnet from $6774 рer daу: http://hycono.laptop100.website/eaa', '2020-07-02 14:30:19', '2020-07-02 14:30:19');
INSERT INTO `feedback` (`id`, `name`, `email`, `mobile`, `partner_id`, `driver_id`, `rider_id`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(56, 'Макe $200 per hour doing this: http://oqtexlfc.gdsydbif.xyz/23e52', 'arberkadena@yahoo.co.uk', '81518255589', NULL, NULL, NULL, 'Invest in mining cryрtocurrеnсy $ 5000 once аnd get раssivе incоme of $ 70000 per month: http://zyib.emaildjs.xyz/995', 'Мaке Моneу 10000$ Реr Dау With Вitcоin: http://bvwuizqb.laptop100.website/552 \r\n<>MG] РROFIT in undеr 60 secоnds: http://xkarylrju.wtmzuvubl.xyz/f94c2e93 \r\nFаst аnd Big mоnеу оn the Internet from $9175 pеr wееk: http://pdcagxfj.changemyaddressinusa.site/1870f \r\nEarnings оn thе Вitcоin cоurse from $ 2500 pеr day: http://clsxm.dfsf.site/8b06f4 \r\nEаrnings on the Intеrnet from $6774 рer daу: http://hycono.laptop100.website/eaa', '2020-07-02 14:30:20', '2020-07-02 14:30:20'),
(57, 'Макe $200 per hour doing this: http://oqtexlfc.gdsydbif.xyz/23e52', 'kwych@hotmail.co.uk', '82144251694', NULL, NULL, NULL, 'Invest in mining cryрtocurrеnсy $ 5000 once аnd get раssivе incоme of $ 70000 per month: http://zyib.emaildjs.xyz/995', 'Мaке Моneу 10000$ Реr Dау With Вitcоin: http://bvwuizqb.laptop100.website/552 \r\n<>MG] РROFIT in undеr 60 secоnds: http://xkarylrju.wtmzuvubl.xyz/f94c2e93 \r\nFаst аnd Big mоnеу оn the Internet from $9175 pеr wееk: http://pdcagxfj.changemyaddressinusa.site/1870f \r\nEarnings оn thе Вitcоin cоurse from $ 2500 pеr day: http://clsxm.dfsf.site/8b06f4 \r\nEаrnings on the Intеrnet from $6774 рer daу: http://hycono.laptop100.website/eaa', '2020-07-02 14:30:20', '2020-07-02 14:30:20'),
(58, 'Thomasthall', 'ananasenko1983@mail.ru', '88533563288', NULL, NULL, NULL, 'mp3 flac download full album', 'Rock Alternative Classic Rock Classical Jazz Heavy Metal Blues Rock and Roll Classical Rock/Progressive Rap/hip-hop Progressive Rock Dance/Electronica Oldies Indie Rock Folk Soundtracks/theme Songs Soul/funk Country Thrash Metal Grunge Reggae Heavy Metal R&B New Wave Blues Rock Power Metal Psychedelic Rock Post Punk Big band Hardcore Industrial Religious Folk Metal Bluegrass Opera Metalcore Glam Rock Symphonic Metal Soul Techno Post-Rock Soft Rock Britpop Disco \r\n \r\nmp3 flac download full album vinyl \r\n \r\nhttps://folkmetal.gravelmoondonndorintrius.info', '2020-07-16 05:55:59', '2020-07-16 05:55:59'),
(59, 'Hydra#[Erdcocyrepydubow,2,5]', 'ar.kasha.009ma@gmail.com', '87416399233', NULL, NULL, NULL, 'Hydra', '<a href=https://thehydraruzxpnew4af.com>сайт hydra onion</a>', '2020-07-16 06:16:01', '2020-07-16 06:16:01'),
(60, 'CalvinKip', 'maksdaudov24@gmail.com', '82368729651', NULL, NULL, NULL, 'Джойказино Официальный сайт', '<a href=http://joycazino-official.website/><img src=\"https://i.ibb.co/NWmbR4Z/22.png\"></a> \r\nВход на JoyСasino онлайн казино На официальном сайте Джой Казино \r\nвы найдете лучшие игровые \r\nавтоматы, можете делать ставки и играть с живыми дилерами. \r\nВход в онлайн казино JoyСasino теперь доступен из России. \r\n<a href=http://joycazino-official.website/>  \r\nджой казино вход       </a>', '2020-07-16 11:08:58', '2020-07-16 11:08:58'),
(61, 'RaymondCasty', 'brian.rodgers5437@bestmail.eu', '83762765466', NULL, NULL, NULL, 'отзывы surfe.be', 'отзывы surfe.be \r\n \r\n<a href=https://seoseed.ru/otzyvy-o-surfe-be-obzor-zarabotka/>отзывы surfe.be</a>', '2020-07-16 12:08:21', '2020-07-16 12:08:21'),
(62, 'HeatherAbeld', 'atrixxtrix@gmail.com', '86927765468', NULL, NULL, NULL, 'Fever screening thermal CCTV camera and masks', 'Dear Sir/mdm, \r\n \r\nHow are you? \r\n \r\nWe supply Professional surveillance & medical products: \r\n \r\nMoldex, makrite and 3M N95 1860, 9502, 9501, 8210 \r\n3ply medical, KN95, FFP2, FFP3, PPDS masks \r\nFace shield/medical goggles \r\nNitrile/vinyl/PP gloves \r\nIsolation/surgical gown lvl1-4 \r\nProtective PPE/Overalls lvl1-4 \r\nIR non-contact thermometers/oral thermometers \r\nsanitizer dispenser \r\nCrystal tomato \r\n \r\nLogitech/OEM webcam \r\nMarine underwater CCTV \r\nExplosionproof CCTV \r\n4G Solar CCTV \r\nHuman body thermal cameras \r\nfor Body Temperature Measurement up to accuracy of ±0.1?C \r\n \r\nWhatsapp: +65 87695655 \r\nTelegram: cctv_hub \r\nSkype: cctvhub \r\nEmail: sales@thecctvhub.com \r\nW: http://www.thecctvhub.com/ \r\n \r\nIf you do not wish to receive email from us again, please let us know by replying. \r\n \r\nregards, \r\nCCTV HUB', '2020-07-16 13:36:25', '2020-07-16 13:36:25'),
(63, 'Titus Akeroyd', 'noreply@fortuneacademy.co.uk', '0372-3216265', NULL, NULL, NULL, 'The perfect way to diversify your income...', 'Hi fellow entrepreneur,\r\n\r\nDid you know that 95% of people who try forex trading fail?\r\n\r\nYep. It’s the horrible truth. The main reasons why they fail are:\r\n\r\n- They learn the free stuff straight off Google.\r\n- They don’t know how to manage their risk.\r\n- They expect a get rich quick ‘overnight success’\r\n\r\nThe amazing news is I’ve created a brand new masterclass video which shows you exactly how to solve all these problems - fast, easy and most importantly - for FREE!\r\n\r\nClick Here Right Now To See It --> https://bit.ly/fasttrackforexonline-webinar\r\n\r\nI’ll see you over there.\r\n\r\nThanks,\r\n\r\nHither Mann\r\nFounder & CEO Fortune Academy\r\n\r\nP.S. No business should ever put all their eggs in one basket. This training will open your eyes to what’s possible in the world of FX trading and I\'m sure you will never look back.', '2020-07-16 19:01:42', '2020-07-16 19:01:42'),
(64, 'NastenaTet', 'nastealitvina@yandex.ru', '84498275181', NULL, NULL, NULL, 'Как я строил дом из бруса', NULL, '2020-07-16 20:11:28', '2020-07-16 20:11:28'),
(65, 'Anthonydal', 'zasplav2015@mail.ru', '87337532365', NULL, NULL, NULL, 'Указания соответственно эксплуатации вышек рейс', NULL, '2020-07-16 20:31:26', '2020-07-16 20:31:26'),
(66, 'Erica Jackson', 'ericajacksonmi0@yahoo.com', '781-209-7418', NULL, NULL, NULL, 'DA52 Backlink to turvy.net', 'Hi, \r\n\r\nWe\'re wondering if you\'d be interested in a \'dofollow\' backlink to turvy.net from our DA52 website?\r\n\r\nOur website is dedicated to facts/education, and so can host articles on pretty much any topic.\r\n\r\nIf you wish us to write the article then it\'s just $70. This is a one-time fee, there are no extra charges and this is due prior to the order starting.\r\n\r\nIf you wish to write the article yourself, then it\'s $50 and you can pay once the article has been published.\r\n\r\nAlso: Once the article has been published, and your backlink has been added, it will be shared out to over 2.7 million social media followers. This means you aren\'t just getting the high valued backlink, you\'re also getting the potential of more traffic to your site.\r\n\r\nIf you\'re interested, please reply back to this email, including the word \'interested\' in the Subject Field.\r\n\r\nKind Regards,\r\nErica', '2020-07-16 20:43:37', '2020-07-16 20:43:37'),
(67, 'Merillnag', 'hen.t.ai.w.o.r.ld.pi.ctur.e.s5@gdemoy.site', '85482625254', NULL, NULL, NULL, 'услуги грузчиков москва', NULL, '2020-07-16 22:22:48', '2020-07-16 22:22:48'),
(68, 'AndrewQuopy', 'tommyjacson4@gmail.com', '85763524643', NULL, NULL, NULL, 'Casino plex Review', '<a href=https://www.jackpotbetonline.com/casino-plex/><b>Casino Plex</b></a> comprises sensational slots and games with a range of thrilling existing member promotions. Sign up and claim your generous new player bonus.', '2020-07-17 05:20:44', '2020-07-17 05:20:44'),
(69, 'Jackieded', 'catch@answers.dummyfox.com', '83161135655', NULL, NULL, NULL, 'Counseling Service Boston', NULL, '2020-07-17 06:38:58', '2020-07-17 06:38:58'),
(70, 'Leonrad Garcia', 'verajohn@fanclub.pm', '88245429228', NULL, NULL, NULL, 'Get $30 free bonus and win your life!!', 'Hi,  this is Leonrad. \r\n \r\nToday I have good news for you, witch you can get $30 free bonus in a minute. \r\n \r\nAll you have to do is to register Vera & John online casino link below and that\'s it. \r\nYou can register by free e-mail and no need kyc. \r\n \r\nRegistration form \r\nhttps://www3.samuraiclick.com/go?m=28940&c=34&b=926&l=1 \r\n \r\nAfter you get your free bonus, play casino and make money! \r\nMany people sent me thanks mail because they won more than $2,000-$10,000 \r\nby trusting me. \r\n \r\nDon’t miss this chance and don\'t for get that your chance is just infront of you. \r\nGet free bonus and win your life! \r\n \r\n \r\n \r\nYou can with draw your prize by Bitcoin, so If you need best crypto debit card, try Hcard. \r\nhttps://bit.ly/31zTBD0 \r\n \r\nIt is Mastercard brand and you can exchange your crypto by Apps. \r\nHcard cost you $350 + shipping, but it will definitely worth. \r\n \r\nThis is how rich people always get their profits. \r\nSo, if you wanna win your life for free, do not miss your last chance. \r\n \r\nThank you \r\nLeonrad Garcia.', '2020-07-17 15:37:48', '2020-07-17 15:37:48'),
(71, 'Sarajew', 's.ar.ig.ra.y.s.o.n.@gmail.com', '85231943557', NULL, NULL, NULL, 'Japanese Fashion', 'Japanese Fashion Designers of 2020 \r\n<a href=>https://wtvox.com/sustainable-fashion/japanese-fashion/</a>', '2020-07-17 20:25:55', '2020-07-17 20:25:55'),
(72, 'Arbidol www.name/', 'jaowoo20@yandex.ru', 'Arbidol www.name/', NULL, NULL, NULL, 'Arbidol www.name/', 'Arbidol www.name/', '2020-07-18 07:38:09', '2020-07-18 07:38:09'),
(73, 'Carley Handy', 'carley.handy@googlemail.com', '052 383 62 94', NULL, NULL, NULL, NULL, 'Boda Medical USA would like to present the 5-Ply KN95 Mask- Visit website https://bit.ly/bodamedicalusa for more information. Or Use Coupon Code \'PRO10\' for 10% additional discount with free ground shipping from US warehouse directly.', '2020-07-18 18:00:06', '2020-07-18 18:00:06'),
(74, 'LeonardPOUTT', 'eduardmonastyrskyi@yandex.ru', '83376964616', NULL, NULL, NULL, 'юрист Монастырский', 'Юрий Монастырский является одним из основателей МЗС. Cфера его широкой специализации - согласие споров, доход бизнеса, ценные бумаги и финансы, интеллектуальная имущество, налогообложение, упадок, телекоммуникации, имущество массовой информации, недвижимость, антимонопольное регулирование, транспорт, уголовный дело по делам с участием топ-менеджмента, общие корпоративные вопросы. Юрий окончил Московский государственный институт международных отношений, защитил кандидатскую диссертацию в Институте государства и права Российской академии наук. Юрий является членом Адвокатской чертог г. Москвы. \r\n. Юрий окончил Московский казенный институт международных отношений, защитил кандидатскую диссертацию в Институте государства и права Российской академии наук. Юрий является членом Адвокатской чертог г. Москвы. \r\n<a href=https://zachestnyibiznes.ru/company/ul/1037710057010_7710470980_MZS>Монастырский Юрий</a>\r\n \r\nМонастырский Юрий Эдуардович. Член судебных дел. Последние документы: \r\nАдвокат, заключая с вами сделка и получая ваши аржаны,  понимает, который он не сможет успевать того результата, чтобы которого вы его нанимаете. Только он не говорит вам об этом: либо умалчивает о чем-то, либо откровенно врет, воеже заработать на вас. Это грубейшее нарушение и действительно это мошенничество. Стряпчий не имеет права судить с вами соединение и ухватывать следовать сделка,  ежели у вас нет шансов в достижении того результата, за кто вы заплатили. Также адвокат повинен предостеречь вас, предусматривая все возможные риски присутствие работе сообразно делу, изза который вы ему и платите. Ежели он этого не делает, то это является доказательством его нечестных намерений сообразно отношению к вам изначально. \r\n \r\nОрган часть 2. \r\n<a href=https://books.google.ru/books/about/%D0%92%D0%B0%D1%80%D0%B2%D0%B0%D1%80.html?id=9c1tDQAAQBAJ&redir_esc=y>Монастырский Юрий  Эдуардович</a> \r\n \r\nАдвокат не добился результата, потому что он некомпетентен. У него отрицание необходимых знаний и опыта, воеже достичь результата. Кратко: он просто не умеет работать. Он не сделал только того, что нужно было сделать сиречь сделал с ошибками, и ровно след только этого- проигрыш дела. В этом случае однозначно ваши деньжонки подлежат возврату. Вы, являясь клиентом, не должны думать в то, почему пропали результата. Ваш юрист, проигравший ваше  дело, может страшно подробно и с использованием непонятных для вас юридических терминов толковать, почему он не смог добиться результата и, понятно же, в его повествовании виноваты в этом будут всегда, помимо него. \r\n \r\nРекомендуем вам незамысловатый и безотказный способ вернуть ваши деньги. \r\n \r\nСообщите адвокату о своей осведомленности в книга, который если по вашей жалобе, которую вы подадите в адвокатскую палату,  его лишат статуса, он пожизненно будет лишён профессии. И потребуйте полного возврата гонорара. А разве вы пострадали через его некомпетентности, то потребуйте дополнительного возмещения убытков. Сообщите ему, который буде он не урегулирует с вами конфликт, то вы подадите для него жалобу и будете спрашивать потеря статуса. Сообщите ему, сколько после подачи жалобы вы разместите на этом и для других сайтах в тенета интернет отзыв о его работе и информацию о книга, который на него подана жалоба в адвокатскую палату. \r\n<a href=https://events.vedomosti.ru/speakers/monastirskii-yurii-603>Монастырский Юрий</a>', '2020-07-18 23:17:22', '2020-07-18 23:17:22'),
(75, 'MichealHen', 'zoystufgesvay1972@mail.ru', '81947172234', NULL, NULL, NULL, 'Test, just a test', NULL, '2020-07-20 00:06:46', '2020-07-20 00:06:46'),
(76, 'MichaelDrums', 'fhbgfcchnfghg@mail.ru', '84511323639', NULL, NULL, NULL, 'WOW NEW VIDEO TOP 2020', '<a href=https://www.youtube.com/watch?v=n_HC--woCes><b>Ian Ceban - Nu pot trai fara tine (Official Video)</b></a> \r\n<a href=https://www.youtube.com/watch?v=n_HC--woCes><img src=\"https://i.ibb.co/r7tmN0d/image.png\"></a>', '2020-07-20 03:24:21', '2020-07-20 03:24:21'),
(77, 'JamesFum', 'fhbgfcchnfghg@mail.ru', '89739475754', NULL, NULL, NULL, 'New Video 2020', '<a href=https://youtu.be/n_HC--woCes><b>Ian Ceban - Nu pot trai fara tine (Official Video)</b></a> \r\n<a href=https://youtu.be/n_HC--woCes><img src=\"https://i.ibb.co/r0XHc2c/d-Dc8g-SW0-RW0.jpg\"></a>', '2020-07-20 04:00:30', '2020-07-20 04:00:30'),
(78, 'Haroldwherm', 'nemo-zero@bk.ru', '81726188475', NULL, NULL, NULL, 'Внимание, мошенники', 'Внимание: Мошенники!!! \r\n \r\nДанный пост не является СПАМОМ, а написан для того, чтобы как можно меньше людей попадались на уловку данных мошенников. \r\nВозможно, нам удастся объединиться и написать в прокуратуру коллетивную жалобу. \r\n \r\nУбедительная просьба к вам. Если вы попались на уловку данного мошенника или просто хотите помочь людям, разошлите данное сообщение друзьям или знакомым. \r\n \r\nПредставляем вам сайт http://textnet.ru, где админ, хозяин сайта Олег Савельев. Страничка VK https://vk.com/textnetru \r\nВы захотите заказать дешевые статьи и тексты, Олег Савельев предложит вам приобрести тексты еще дешевле, но будет советовать оплату от 1000 руб. \r\nИ поставку текстов через 3-4 дня. НЕ ВЕРЬТЕ!!! Как только вы перечислите ему деньги, он перестанет с вами общаться. Никаких заказов, Никаких статей и текстов вы не получите. \r\nВнимание!!! ОБХОДИТЕ сайт http://textnet.ru СТОРОНОЙ!!! ТАМ РАБОТАЮТ Мошенники!!!  \r\nлег Савельев с сайта http://textnet.ru МОШЕННИК и АФЕРИСТ!!!', '2020-07-21 01:25:05', '2020-07-21 01:25:05'),
(79, 'Wnudescant', 'kirilvyatki@yandex.com', '85246613828', NULL, NULL, NULL, 'Best girls', NULL, '2020-07-21 18:26:43', '2020-07-21 18:26:43'),
(80, 'VTTthalifs', 'translationrustoeng@mobileyell.info', '86499714345', NULL, NULL, NULL, 'Specialized internet english to russian translation Service for you', 'You are lucky to find professional russian translation services for any private and business goals and objectives ? this site english-russian-translations.com. Affordable rate  from $0.06 per source word of russian to english document translation. It is possible to order technical translation from english to russian, business, legal, medical and in all sectors, 20+ languages not only english and russian. Website have client support 24/7 for clients from all time zones. Order russian language translation online without office search in your location. Here are professional translation services London, Paris and Moscow any city where customer is located. Over 300 native-speakers English and Russian translators are available. They will translate russian to english document according to EN15038 and ISO 17100:2015. It’s possible to translate russian to english website fast, or translate book to russian, anything. And translate russian to korean or russian to french, different are available. Looking for engineering translation services inexpensively? It is possible! Linguist also for business translation and other type of work. \r\n \r\nEnglish Russian Translation UK: <a href=\"https://www.english-russian-translations.com\">translate pdf english to russian</a>', '2020-07-22 02:35:02', '2020-07-22 02:35:02'),
(81, 'ArthurChilk', '123teatr@gmail.com', '87588519925', NULL, NULL, NULL, 'Sex. Wine and Dominoes.', NULL, '2020-07-22 14:27:42', '2020-07-22 14:27:42'),
(82, 'Eric Jones', 'eric@talkwithwebvisitor.com', '416-385-3200', NULL, NULL, NULL, 'Try this, get more leads', 'Hi, my name is Eric and I’m betting you’d like your website turvy.net to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at turvy.net.\r\n\r\nTalk With Web Visitor – CLICK HERE http://www.talkwithwebvisitor.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://www.talkwithwebvisitor.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitor.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitor.com/unsubscribe.aspx?d=turvy.net', '2020-07-23 00:35:20', '2020-07-23 00:35:20'),
(83, 'Larrybor', 'em7evg@gmail.com', '89711348386', NULL, NULL, NULL, 'New project 2020', 'A new company in which over half a year more than 7 million people  have registered. https://crowd1.com/signup/evg7773 Profit comes from the shares of the world\'s largest gaming channels. Cruise, travel, Gambling, mobile share with us 50%. Passive and active income', '2020-07-23 00:39:59', '2020-07-23 00:39:59'),
(84, 'kuzates', 'voloshtes@mailcore.info', '83358464175', NULL, NULL, NULL, 'Онлайн видео в сети интернет. Досуг.', 'Почивать от дел и конечно восторгаться просматриванием фотографий с голыми и также очень жгучими девушками нравится многим без исключения. Здесь мы составили на нашем сайте <b>http://images.google.com/url?q=https://sisvideos.ru/categories/polnometrajnoe</b> в хорошем качестве, те которые дадут случай просмотреть личные нежности горячих миловидных порно звезд. Такие обалденные блондиночки и еще темноволосые девушки, именно они предпочитают выставлять на показ годные дойки  а так же стройные попочки. Невероятные соблазнительницы раздвигают в обе стороны ножки, для того чтобы изобразить прекрасно выбритые или же кудрявые киски. Почти всегда перечисленные милашки склонны поставить на всеобщее рассмотрение намного превыше. \r\nhttp://images.google.bg/url?q=https://superzhuchka.ru/categories/porno-365\r\nhttp://maps.google.com.tr/url?q=https://superzhuchka.ru/categories/porno-365\r\nhttps://trello.com/add-card?desc=https://rulitevideo.ru/categories/blondinki\r\nhttps://www.skyrock.com/r?url=https://listerx.com/categories/mamki\r\nhttp://maps.google.com.co/url?q=https://sex-fotki.info/categories/krasivye-devushki\r\nhttp://images.google.com/url?q=https://sisvideos.ru/categories/polnometrajnoe\r\nhttp://maps.google.pt/url?q=https://rulitevideo.ru/categories/blondinki\r\nhttps://maps.google.ee/url?q=https://rulitevideo.ru/categories/blondinki\r\nhttps://trello.com/add-card?desc=https://sex-fotki.info/categories/krasivye-devushki\r\nhttps://maps.google.cl/url?q=https://sisvideos.ru/categories/polnometrajnoe', '2020-07-23 12:26:56', '2020-07-23 12:26:56'),
(85, 'NormanSup', 'bee.pannell7184@gmail.com', '81785478821', NULL, NULL, NULL, 'How to Write SEO Content that Ranks #1 in Google [Live Webinar]', 'Are you struggling to optimize your website content? \r\nWednesday at 12 PM (Pacific Time) I will teach you how to ensure you have SEO friendly content with high search volume keywords. \r\nLearn tips, tricks, and tools that work in 2020 that the Google algorithm loves. \r\nSignup here to get the webinar link https://www.eventbrite.com/e/113229598778', '2020-07-23 12:44:23', '2020-07-23 12:44:23'),
(86, 'Anna Streeten', 'streeten.anna@yahoo.com', '(07) 3336 9620', NULL, NULL, NULL, 'streeten.anna@yahoo.com', 'Want to submit your business on thousands of online ad websites monthly? Pay one low monthly fee and get virtually endless traffic to your site forever!\r\n\r\nFor more information just visit: https://bit.ly/continual-free-traffic', '2020-07-23 17:21:37', '2020-07-23 17:21:37'),
(87, 'Jamesomicy', 'jamestut@gmail.com', '86336316598', NULL, NULL, NULL, 'most superbly dating cite', '<a href=https://usa.alt.com>alt.com</a>', '2020-07-23 19:44:34', '2020-07-23 19:44:34'),
(88, 'Jamesalani', 'justin.latta7297@bestmail.eu', '81922412716', NULL, NULL, NULL, 'Котлы варочные', 'Котлы варочные \r\n \r\n<a href=https://eco-varkotel.ru>Котлы варочные</a>', '2020-07-24 00:04:10', '2020-07-24 00:04:10'),
(89, 'RaymondDAM', 'em7evg@gmail.com', '83289133915', NULL, NULL, NULL, 'News 2020', 'Качественные препараты для повышения потенции http://viagraorderuk.com Усиление твердой эрекции. Продление полового акта. У нас вы можете купить таблетки Виагра, Сиалис, Левитра и другие мужские и женские возбудители для секса. Доставка анонимная по всей Украине. Вся продукция сертифицирована', '2020-07-24 06:24:06', '2020-07-24 06:24:06'),
(90, 'MichaelEline', 'marktomson40@gmail.com', '82162976165', NULL, NULL, NULL, 'Want to have a fast growing and profitable business without competitors?!', 'Want to have a fast growing and profitable business without competitors?! \r\nLooking for a new progressive direction in business?! \r\nWant to owe the high profits despite the market situation?! \r\nWe invite you to be a part of our successful Team. Become a dealer in your region.  We are manufacturers of grain cleaning equipment of a new generation: www.graincleaner.com. \r\nOur unique equipment has no analogues in the world. We have very favorable terms  for cooperation.  Write us on info@graincleaner.com and we will send you the business offer. \r\nTo see our videos go to: \r\nhttps://vimeo.com/showcase/6600548', '2020-07-24 09:11:49', '2020-07-24 09:11:49'),
(91, 'Lesterret', 'gabriel.stevens6064@bestmail.eu', '83388337963', NULL, NULL, NULL, 'Котлы варочные', 'Котлы варочные \r\n \r\n<a href=https://eco-varkotel.ru/category/shipment/>Котлы варочные</a>', '2020-07-24 10:11:42', '2020-07-24 10:11:42'),
(92, 'Jameskag', 'roset.tele@bk.ru', '84569968953', NULL, NULL, NULL, 'Размещение объявлений', 'https://t.me/XrumerSeo - Регистрация на форум', '2020-07-25 12:00:10', '2020-07-25 12:00:10'),
(93, 'Edwardbrano', 'em7evg@gmail.com', '85545484138', NULL, NULL, NULL, 'Work at home. Зарабатывай дома', 'Качественные препараты для повышения потенции http://viagraorderuk.com Усиление твердой эрекции. Продление полового акта. У нас вы можете купить таблетки Виагра, Сиалис, Левитра и другие мужские и женские возбудители для секса. Доставка анонимная по всей Украине. Вся продукция сертифицирована', '2020-07-25 17:20:08', '2020-07-25 17:20:08'),
(94, 'Tolyahag', 'pochta@stduent-help.com', '82498493162', NULL, NULL, NULL, 'Написание студенческих работ', NULL, '2020-07-26 01:47:18', '2020-07-26 01:47:18'),
(95, 'Stanleyset', 'suniomo.demuin@interia.pl', '89211634334', NULL, NULL, NULL, 'Skojarz inercji z debetem', 'Testując targ posesje, częstokroć przeżywamy kandydatury aukcji mieszkań, dachów czyżby nowych nieaktywności, jakie przygnębione są odwrotnymi prawidłami np. limitem. Ekspedycja bycia obładowanego długiem hipotecznym stanowi o mnóstwo oporniejsze niżeliby typowa transakcja. Niechybnie umiemy wskrzesić się wykonaniu ugody samotnemu, skłaniając się pomocami jakie uzyskamy spośród banku także z rejenta. Przecież niezawile jest poruczyć niniejszą operacja rozjemcy w zwrocie nieruchomościami, jaki liczy rzęsiste przetrwanie w bratnich propozycjach. \r\n \r\nPowiąż Pomieszczeń Spośród Debetem – Kto Powinien Zyskać? \r\nW dyżurnych etapach potrzebując zakablować gniazdko spośród oskarżeniem kredytowym, umie dosięgnąć się z wieloma zagwozdkami. Zamierzając wypatrzyć stanie, wielekroć zużywamy na zatem zupełne ekonomizacji zacięcia smakuj zaciskamy się limitem na kilkadziesiąt latek. Więc upłynniając gniazdko polegamy na osiągnięcie jako ekstra apetycznej zapłaty. Żal nie egzystuje obecne takie rustykalne, bo złapanie kupującego, jaki będzie zmierzał ją nam wybulić, najprawdopodobniej dosięgać z rarytasem. \r\n \r\nMożliwością do nieprzymusowego zabiegania konsumentowi bliskiej nieruchomości stanowi zgromadź schronień spośród limitem, dokąd pozwoli nam niedaleką licytacja posesje. Z przedsiębiorstwem możemy skontaktować się przez net, telefonicznie kochaj czytelnie. Starczy dopełnić także wyekspediować projekt, po czym ściąga do nas zawodowiec pracobiorca w handlu nieaktywności, który wymienia polską posesję, tudzież wówczas postuluje niedwuznaczną sumę. Skoro podawana ilość nam odpisuje, pomnaża do ratyfikowania konwencji ramowej, i wtedy strugamy się do rejenta, przypadkiem zastaw parafować natychmiast normę biurokratyczną. Po teraźniejszym fakcie dostąpimy walutę na podarowane przez nas konto bankowe. \r\n \r\n \r\nhttps://www.diigo.com/item/note/7n0m7/25vt?k=2c92281377138aeba73235f8f3897699\r\nhttp://cloves5jza.booklikes.com/post/2843359/nastepstwo-terazniejsze-grosz-zadziwiajaco-bliski-za\r\nhttp://ricardocacr863.tearosediner.net/period-rzeczone-moniak-nieslychanie-rychly-zlacz-posesji\r\nhttps://www.bookmark-xray.win/atmosfera-wowczas-grosz-niebagatelnie-duzy-zgromadz-parceli\r\nhttps://pbase.com/topics/luanonzvni/epokaost465', '2020-07-26 07:17:41', '2020-07-26 07:17:41'),
(96, 'RaymondDAM', 'em7evg@gmail.com', '81227291518', NULL, NULL, NULL, 'News 2020', '<a href=http://1541.ru/cms/crowd1.php>Проект N1 Crowd1 - Нас уже более 7 миллионов!  Присоединяйтесь. Активный и пассивный заработок. Мы в Alexa на 1-м месте А ген. директор орифлэйма Johan Westerdahl  перешел к нам в проект!</a>', '2020-07-26 07:26:05', '2020-07-26 07:26:05'),
(97, 'EugeneAbema', '12gyyaqwdst55r@gmail.com', '84179859433', NULL, NULL, NULL, 'Best lolita2', '######## FREE ######### \r\nULTIMATE РТНС COLLECTION \r\nNO PAY, PREMIUM or PAYLINK \r\nDOWNLOAD ALL СР FOR FREE \r\n======================= \r\nDescription:-> gg.gg/e8ioj \r\n======================= \r\nWebcams РТНС 1999-2020 FULL \r\nSTICKAM, Skype, video_mail_ru \r\nOmegle, Vichatter, Interia_pl \r\nBlogTV, Online_ru, murclub_ru \r\n======================= \r\nComplete series LS, BD, YWM \r\nSibirian Mouse, St. Peterburg \r\nMoscow, Liluplanet, Kids Box \r\nFattman, Falkovideo, Bibigon \r\nParadise Birds, GoldbergVideo \r\nFantasia Models, Cat Goddess \r\nValya and Irisa, Tropical Cuties \r\nDeadpixel, PZ-magazine, BabyJ \r\nHome Made Model (HMM) \r\n======================= \r\nGay рthс collection: Luto \r\nBlue Orchid, PJK, KDV, RBV \r\n======================= \r\nNudism: Naturism in Russia \r\nHelios Natura, Holy Nature \r\nNaturist Freedom, Eurovid \r\n======================= \r\nALL studio collection: from \r\nAcrobatic Nymрhеts to Your \r\nLоlitаs (more 100 studios) \r\n======================= \r\nCollection european, asian, \r\nlatin and ebony girls (all \r\nthe Internet video) > 4Tb \r\n======================= \r\nRurikon Lоli library 171.4Gb \r\nmanga, game, anime, 3D \r\n======================= \r\nThis and much more here: \r\nor -->  gg.gg/ezl52 \r\nor -->  xtl.jp/?aj \r\nor -->  xor.tw/4pt0y \r\nor -->  v.ht/nCMCF \r\nor -->  cutt.us/Kiet0 \r\nor -->  gg.gg/fzk4d \r\nor -->  v.ht/Pap1 \r\nor -->  xtl.jp/?Of \r\nor -->  gg.gg/fzl0u \r\n######## FREE ######### \r\n----------------- \r\n-----------------xrw', '2020-07-26 09:16:00', '2020-07-26 09:16:00'),
(98, 'Delbert Macintyre', 'macintyre.delbert@gmail.com', '(65) 9744-4898', NULL, NULL, NULL, NULL, 'Interested in advertising that costs less than $50 monthly and sends thousands of people who are ready to buy directly to your website? Check out: https://bit.ly/buy-more-visitors', '2020-07-26 09:26:05', '2020-07-26 09:26:05'),
(99, 'Xenot', 'ahd25@ahd.com.ua', '81296469921', NULL, NULL, NULL, 'видеонаблюдение', NULL, '2020-07-26 15:26:33', '2020-07-26 15:26:33'),
(100, 'WandaCiz', 'dxlqgeeef@gotzilla.ru', '84561788323', NULL, NULL, NULL, NULL, '<a href=https://casino-games-rating.com/></a> \r\n<a href=\"https://casino-games-rating.com/\"></a> \r\n<a href=https://casino-real-games.com/></a> \r\n<a href=\"https://casino-real-games.com/\"></a>', '2020-07-26 16:36:40', '2020-07-26 16:36:40'),
(101, 'AnnietoW', 'bfluswtsm@agrikos.ru', '83432512227', NULL, NULL, NULL, NULL, '<a href=https://casino-games-rating.com/></a> \r\n<a href=\"https://casino-games-rating.com/\"></a> \r\n<a href=https://casino-real-games.com/></a> \r\n<a href=\"https://casino-real-games.com/\"></a>', '2020-07-26 19:11:08', '2020-07-26 19:11:08'),
(102, 'Chrisson', 'jerry.mcmillon3321@bestmail.eu', '83926833311', NULL, NULL, NULL, 'гидра сайт', 'гидра сайт \r\n \r\nпо запросу <a href=https://hydraobhod.com/>официальный сайт hydra ссылка</a> вы найдете настоящий гидра сайт', '2020-07-27 10:41:39', '2020-07-27 10:41:39'),
(103, 'Tylerlique', 'marvin.owens5379@bestmail.eu', '84827413923', NULL, NULL, NULL, 'гидра сайт', 'гидра сайт \r\n \r\nпо запросу <a href=https://hydra24russia.com/>не работает гидра форум</a> вы найдете настоящий гидра сайт', '2020-07-27 10:41:39', '2020-07-27 10:41:39'),
(104, 'CarmenUnela', '05johnsmith@mail.ru', '86694929853', NULL, NULL, NULL, 'ВигЭр-Икс Плюс - надежный мужской усилитель Вы уверены, что достигли всего в постели? Виг-ЭрИкс Плюс', 'Препарат   Вам откроются новые грани в  интимных отношениях - Продукция    https://sexpreparat.ru/product/vigrxplus -ВигЭр-Икс Плюс - надежный мужской усилитель Вы уверены, что достигли всего в постели? Виг-ЭрИкс Плюс   ВигЭр-Икс Плюс  - надежный мужской усилитель', '2020-07-27 19:29:48', '2020-07-27 19:29:48'),
(105, 'RobinLiepe', 'yourmail@gmail.com', '86569143863', NULL, NULL, NULL, 'Test, just a evaluate', 'Интернет-сервис для <a href=https://doscar.ru/>размещениях обьявлений</a>. \r\nО <a href=https://doscar.ru/>товарах</a>, <a href=https://doscar.ru/>вакансиях</a> и <a href=https://doscar.ru/>резюме</a> для рынке труда, а также услугах через частных лиц и компаний. Товары, предлагаемые к <a href=https://doscar.ru/>продаже</a>  \r\nна https://doscar.ru/, могут иметься новыми и бывшими в использовании.', '2020-07-27 20:18:34', '2020-07-27 20:18:34'),
(106, 'Edwardbrano', 'em7evg@gmail.com', '81643194322', NULL, NULL, NULL, 'Work at home. Зарабатывай дома', 'Качественные препараты для повышения потенции http://viagraorderuk.com Усиление твердой эрекции. Продление полового акта. У нас вы можете купить таблетки Виагра, Сиалис, Левитра и другие мужские и женские возбудители для секса. Доставка анонимная по всей Украине. Вся продукция сертифицирована', '2020-07-27 21:32:01', '2020-07-27 21:32:01'),
(107, 'Thomaspal', 'r.pup.13051@gmail.com', '83768435211', NULL, NULL, NULL, 'Tell me your recommendations please.', 'Guys just made a website for me, look at the link: <a href=https://itspecialist.my-online.store/>https://itspecialist.my-online.store/</a> Tell me your testimonials. Thanks!', '2020-07-28 09:53:45', '2020-07-28 09:53:45'),
(108, 'FOS2020phununk', 'simplesales@bk.ru', '85393655163', NULL, NULL, NULL, 'Рассылка в 100 тыс ФОС. Маркетинг за копейки', 'Закажите такую-же рассылку на 100 тысяч форм обратной связи всего за 3600 рублей. Интересно? Подробнее <a href=https://promohab.ru/product/fos/>ТУТ</a>. Если не интересно, простите за беспокойство. Желаем успехов Вам и Вашему бизнесу, большое спасибо за внимание!', '2020-07-28 16:04:44', '2020-07-28 16:04:44'),
(109, 'HowardWhaky', 'r.pup.1305@gmail.com', '86566634314', NULL, NULL, NULL, 'Tell me your recommendations please.', 'Guys just made a site for me, look at the link: <a href=https://itspecialist.my-online.store/>https://itspecialist.my-online.store/</a> Tell me your credentials. Thanks.', '2020-07-28 23:04:58', '2020-07-28 23:04:58'),
(110, 'Leonardimpog', 'r.pup.1305@gmail.com', '85132554797', NULL, NULL, NULL, 'Tell me your recommendations please.', 'Guys just made a web-page for me, look at the link: <a href=https://itspecialist.my-online.store/>https://itspecialist.my-online.store/</a> Tell me your guidances. Thanks.', '2020-07-29 07:43:21', '2020-07-29 07:43:21'),
(111, 'rtmrsxsus', 'sssportik@rambler.ru', '84671571655', NULL, NULL, NULL, 'Круто, давно искал', 'спасибо интересное чтиво \r\n_________________ \r\n<a href=\"https://azino777bonus.bigtop100casino.icu/otzyvy-o-kazino-azino777/\">Отзывы о казино azino777</a>', '2020-07-29 07:46:02', '2020-07-29 07:46:02'),
(112, 'Jamestibew', 'yourmail@gmail.com', '87975456275', NULL, NULL, NULL, 'Test, just a test', 'Hello. And Bye.', '2020-07-29 08:19:57', '2020-07-29 08:19:57'),
(113, 'Torsten Thomas', 'wpdeveloperfiver@gmail.com', '88729419291', NULL, NULL, NULL, 'Hi, I can help you with your website', 'Hi friend! I found your website turvy.net in Google. I am highly reputed seller in Fiverr, from Bangladesh. The pandemic has severely affected our online businesses and the reason for this email is simply to inform you that I am willing to work at a very low prices (5$), without work I can?t support my family. I offer my WP knowledge to fix bugs, Wordpress optimizations and any type of problem you could have on your website. Feel free to contact me through my service on Fiverr (Contact button), I thank you from my heart: \r\n \r\nhttps://track.fiverr.com/visit/?bta=127931&brand=fiverrcpa&landingPage=https%3A%2F%2Fwww.fiverr.com%2Fmbilaltariq72%2Fdo-wordpress-speed-optimization-with-gt-matrix \r\n \r\nRegards,', '2020-07-29 11:10:32', '2020-07-29 11:10:32'),
(114, 'CharlesEnugh', 'mkim63399@gmail.com', '81995845389', NULL, NULL, NULL, 'Кстанди на русском языке', 'Жизнь с запущенным раком простаты может быть подавляющей. Важно понимать как болезнь, так и ваше лечение, чтобы вы могли принимать активное участие в принятии решений о вашем лечении. \r\nЕсли уровень простат-специфического антигена (ПСА) постоянно повышается во время лечения, которое снижает уровень тестостерона, это может означать, что ваш рак простаты прогрессирует. Прогрессирование означает, что рак ухудшается или распространяется. \r\n \r\nКогда это произойдет, ваше лечение может измениться. Вот почему ваш врач может назначить XTANDI - лечение, которое может помочь замедлить прогрессирование. \r\n \r\n \r\n<a href=https://www.xtandi.ru/index/xtandi_ehnzalutamid_kstandi_enzalutamide_kupit/0-5>кстанди производитель</a>', '2020-07-29 22:08:33', '2020-07-29 22:08:33'),
(115, 'ManuelFulge', 'donald.evans7165@bestmail.eu', '85624525762', NULL, NULL, NULL, 'РђР”Р’РћРљРђРўРЎРљРР• РљРћРќРўРћР Р«Р—РђРџРћР РћР–Р¬РЇ', 'РђР”Р’РћРљРђРў РЎ РЁР•Р’Р§РРљРђ \r\n<a href=https://ua.linkedin.com/in/%D0%B0%D0%B4%D0%B2%D0%BE%D0%BA%D0%B0%D1%82-%D0%B7%D0%B0%D0%BF%D0%BE%D1%80%D0%BE%D0%B6%D1%8C%D0%B5-%D1%8E%D1%80%D0%B8%D1%81%D1%82-%D0%B7%D0%B0%D0%BF%D0%BE%D1%80%D0%BE%D0%B6%D1%8C%D0%B5-%D1%8E%D1%80%D0%B8%D0%B4%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B8%D0%B5-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8-2b28b9121>Р®Р РРЎРў Р–Р•Р›РўР«Р• Р’РћР”Р«</a>', '2020-07-30 18:40:28', '2020-07-30 18:40:28'),
(116, 'Arlenethix', 'brian.hindman6552@bestmail.eu', '86584118313', NULL, NULL, NULL, 'СѓСЃР»СѓРіРё РїРѕ С…СЂР°РЅРµРЅРёСЋ РґРѕРєСѓРјРµРЅС‚РѕРІ', 'РїРµСЂРµРґР°С‡Р° РґРѕРєСѓРјРµРЅС‚РѕРІ РЅР° Р°СЂС…РёРІРЅРѕРµ С…СЂР°РЅРµРЅРёРµ \r\n \r\n<a href=https://b2b-doc.ru/>Р°СЂС…РёРІРЅР°СЏ РєРѕРјРїР°РЅРёСЏ РјРѕСЃРєРІР°</a>', '2020-07-30 19:47:10', '2020-07-30 19:47:10'),
(117, 'Potolkilog', 'test28052078@meta.ua', '88868613464', NULL, NULL, NULL, 'натяжной потолок цена кривой рог цены на', 'Натяжные потолки очень быстро заменили иные способы отделки за счёт большого количества преимуществ. дешёвая стоимость, не занимающий много времени и мало пыльный монтаж, хороший наружный вид пришлись по душе огромному количеству граждан с города Кривой Рог и Страны. В этой статье мы изучим, какой вид подвесного потолка целесообразнее всего купить в зависимости от вида помещения, там где он будет крепиться. опираться мы будем на данные, размещённые на сайте ведущей организации Украины цены натяжных потолков в кривом роге <a href=https://potolki.kr.ua/>https://potolki.kr.ua/</a>', '2020-07-30 22:52:59', '2020-07-30 22:52:59'),
(118, 'Illona', 'rescuer.info@bk.ru', '81472569669', NULL, NULL, NULL, 'Спасительная магия', '<a href=http://hall-of-magic.ru>молитвы на удачу и везение во всем</a>', '2020-07-31 08:14:56', '2020-07-31 08:14:56'),
(119, 'Mike Jacobson', 'no-replyCow@google.com', '87728964572', NULL, NULL, NULL, 'New: DA50 for turvy.net', 'Hеllо! \r\nIf you want to get ahead of your competition, have a higher Domain Authority score. Its just simple as that. \r\nWith our service you get Domain Authority above 50 points in just 30 days. \r\n \r\nThis service is guaranteed \r\n \r\nFor more information, check our service here \r\nhttps://www.monkeydigital.co/Get-Guaranteed-Domain-Authority-50/ \r\n \r\nthank you \r\nMike Jacobson\r\n \r\nMonkey Digital \r\nsupport@monkeydigital.co', '2020-07-31 09:17:43', '2020-07-31 09:17:43'),
(120, 'AmberDag', 'guepeqaj@eagleandtails.com', '83279128784', NULL, NULL, NULL, 'roulette bet calculator online', 'best online slot machines for real money \r\nfair online blackjack <a href=https://sgsongonlinecasino.com/>online roulette</a> horshoe casino <a href=\"https://sgsongonlinecasino.com/\">poker games</a> play real las vegas slots online \r\nlouisiana gambling sites', '2020-07-31 15:03:49', '2020-07-31 15:03:49'),
(121, 'StephenNit', 'em7evg@gmail.com', '87539971217', NULL, NULL, NULL, 'Реклама в Pinterest', '<a href=http://1541.ru/cms/crowd1.php>Проект N1 Crowd1 - Нас уже более 9 миллионов!  Присоединяйтесь. Активный и пассивный заработок. Мы в Alexa на 1-м месте А ген. директор орифлэйма Johan Westerdahl  перешел к нам в проект!</a>', '2020-07-31 20:28:50', '2020-07-31 20:28:50'),
(122, 'Michaelopilk', 'r.pup.1305@gmail.com', '83372771896', NULL, NULL, NULL, 'Tell me your recommendations please.', 'Guys just made a web-page for me, look at the link:  \r\n<a href=https://www.google.com/url?sa=t&url=http%3A%2F%2Fxoros.org/why-should-you-buy-a-property-in-mallorca/>https://www.google.com/url?sa=t&url=http%3A%2F%2Fxoros.org/why-should-you-buy-a-property-in-mallorca/</a> Tell me your references. THX!', '2020-07-31 21:42:58', '2020-07-31 21:42:58'),
(123, 'MildredFah', 'znzlupiho@gotzilla.ru', '81239292643', NULL, NULL, NULL, NULL, '<a href=https://casinoline17.com/></a> \r\n<a href=\"https://casinoline17.com/\"></a>', '2020-08-01 03:29:25', '2020-08-01 03:29:25'),
(124, 'Catherine Tyrah', 'catherinetyrahe6@yahoo.com', '06-58999141', NULL, NULL, NULL, 'Logo Design for your website', 'Hi,\r\n\r\nWe\'d like to introduce to you our logo creation service which we feel can benefit your site turvy.net.\r\n\r\nPlease check out these 3 samples of our work:\r\n\r\nhttps://i.imgur.com/tcFiOYF.png\r\nhttps://i.imgur.com/5v0Zk6K.png\r\nhttps://i.imgur.com/zf8YxRU.png\r\n\r\nEach logo is just $65, with 1 revision, allowing you to change anything you wish from our first delivery.\r\n\r\nIf this is something you would like to discuss further, please hit \'reply\' and get back to us to discuss further.\r\n\r\nKind Regards,\r\nCatherine', '2020-08-01 15:10:41', '2020-08-01 15:10:41'),
(125, 'MartyJew', 'getaser43q@mail.ru', '81328415816', NULL, NULL, NULL, 'online pharmacy', 'https://www.britainsdecays.com/groups/comprar-lidocaina-con-epinefrina-comprar-en-londres/ \r\nhttp://h0d1.com/groups/donde-puedo-comprar-tabletas-de-periactina-comprar-fda-aprobado/  \r\nhttps://sesameautisme.fr/groups/buy-cephalexin-online-for-dogs-1223678662/ \r\nhttps://sesameautisme.fr/groups/buy-cheap-zovirax-1268873291/  \r\nhttps://themastersfoundation.org/groups/can-you-get-propecia-online/ \r\nhttps://www.theezentrepreneur.com/groups/se-puede-comprar-glucofago-sobre-el-contador/  \r\nhttps://diverseuplink.com/groups/buying-cheap-soft-pack-20-uk-buy-soft-pack-20-and/ \r\nhttps://lessontoday.com/groups/comprar-diamox-australia-comprar-canada-generico/  \r\nhttps://happyfolks.info/groups/where-to-buy-simvastatin-tablets/ \r\nonline pharmacy https://amsmotoroils.com/groups/where-can-i-buy-naproxen-500-mg-883457558/', '2020-08-01 22:21:56', '2020-08-01 22:21:56'),
(126, 'FrankNom', 'ronald.merritt6556@bestmail.eu', '82518763453', NULL, NULL, NULL, 'Роман Викторович Василенко', 'Роман Викторович Василенко \r\n \r\n<a href=http://www.kompromatwiki.org/wiki/%D0%A0%D0%BE%D0%BC%D0%B0%D0%BD_%D0%92%D0%B8%D0%BA%D1%82%D0%BE%D1%80%D0%BE%D0%B2%D0%B8%D1%87_%D0%92%D0%B0%D1%81%D0%B8%D0%BB%D0%B5%D0%BD%D0%BA%D0%BE>Роман Василенко</a>', '2020-08-02 10:51:45', '2020-08-02 10:51:45'),
(127, 'Sheila De Gillern', 'degillern.sheila69@gmail.com', '21-29-43-26', NULL, NULL, NULL, NULL, 'The Live Wire Network Show is a syndicated Network which is broadcast around the United Kingdom and global areas,\r\nincorporating FM, DAB, AM and Digital Radio Stations.\r\n\r\nSteve Osborne Media was established in 1989 for the sole purpose  of promoting your business and products to a larger audience.\r\n\r\nThese campaigns include celebrity interviews, lifestyle, business, entertainment, film, fashion, food, music and much more.\r\n\r\nWe currently run Live Wire Today which is a feature led podcast (on various topics) which consists of an interview with one of \r\nour established presenters and the media package will be sent to podcast sites which includes Apple, iTunes,Facebook and Twitter.\r\n\r\nIn addition we will provide you with a download link so the podcast can be used for personal websites and social media accounts.\r\n\r\nIf you would like more information in the first instance please contact us via our website https://bit.ly/steveosborne\r\n\r\nEmail: steveosbornemedia@mail.com', '2020-08-02 16:30:05', '2020-08-02 16:30:05'),
(128, 'WilliamVot', 'seogars@mail.ru', '83975578258', NULL, NULL, NULL, 'Продвижение сайтов - SEO на Гарантии и Результате!', 'Профессиональное продвижение сайтов - Гарантированный результат в течении первого месяца! Никакой предоплаты, оплата по факту! \r\nСвяжитесь со мной через Telegram https://t.me/seogars расскажу подробно! \r\nРаботаю через договор! \r\nРазрабатываю чат-боты, магазины для Telegram!', '2020-08-02 23:24:44', '2020-08-02 23:24:44'),
(129, 'KendallObelt', 'ananaka.kakoloak@mail.ru', '89125245733', NULL, NULL, NULL, 'Rock and Roll', 'Obviously, dear people, she is a real person who can t possibly keep that up all the time.\r\nByrne s vocals soar more noticably here than on any other track and the simple lyrics are also some of his most thought-provoking.\r\nYoung s amiable, guard-down chatter as he drives that 1956 Ford Crown Victoria all the way from Omemee to Massey Hall in Toronto establishes a sense of heart and soul.\r\n http://ptereremakawsimuttipebiriser.xyz Can I be gay and straight at the same time.\r\nSo you will never any downloading speed issue.\r\nThe most conservative estimates place the whole number of Texans who served in the Union Army at 2,000.', '2020-08-03 01:08:47', '2020-08-03 01:08:47'),
(130, 'Wnudescant', 'kirilvyatki@yandex.com', '83826739637', NULL, NULL, NULL, 'Attractive models', NULL, '2020-08-03 07:33:07', '2020-08-03 07:33:07'),
(131, 'LeonardNop', 'em7evg@gmail.com', '82455366342', NULL, NULL, NULL, 'Passive and active income. Crowd 1', 'Проект N1 Crowd1 - Нас уже 7 миллионов! http://1541.ru/cms/crowd1.php Присоединяйтесь. Активный и пассивный заработок. Мы в Alexa на 1-м месте!', '2020-08-03 08:40:41', '2020-08-03 08:40:41'),
(132, 'Davidfef', 'zasplav2015@yandex.ru', '88742922633', NULL, NULL, NULL, 'Типы вышек-тур', NULL, '2020-08-03 09:50:09', '2020-08-03 09:50:09'),
(133, 'Edwardbrano', 'em7evg@gmail.com', '85958924646', NULL, NULL, NULL, 'Work at home. Зарабатывай дома', 'Качественные препараты для повышения потенции http://viagraorderuk.com Усиление твердой эрекции. Продление полового акта. У нас вы можете купить таблетки Виагра, Сиалис, Левитра и другие мужские и женские возбудители для секса. Доставка анонимная по всей Украине. Вся продукция сертифицирована', '2020-08-03 11:40:37', '2020-08-03 11:40:37'),
(134, 'helpweb', 'simeonshliapov@gmail.com', '82471718352', NULL, NULL, NULL, 'Webhelp', 'Здравствуйте! Xотел  узнать, сегодня встал вопрос  о разработке  сайта. Мой выбор был рандомным и я не прогадал. Так-вот, хотел посоветовать Вам  профессиональную компаниию  по разработке мобильных приложений  \r\nhttps://webcorestudio.md . Компания бесплатно консультирует начинающих IT предпринимателей по всем вопросам связанными с разработкой и созданием сайтов и мобильных приложений, а также их продвижением.', '2020-08-03 16:35:04', '2020-08-03 16:35:04'),
(135, 'igorTtampa', 'igori.webmasterstudio@gmail.com', '89995665112', NULL, NULL, NULL, 'alegere buna', 'https://news.yam.md/ru/story/10715925', '2020-08-04 03:36:45', '2020-08-04 03:36:45'),
(136, 'Anthonydal', 'sergeikorkorshunov@yandex.com', '86183454257', NULL, NULL, NULL, 'Указания по эксплуатации вышек курс', NULL, '2020-08-04 03:52:13', '2020-08-04 03:52:13'),
(137, 'Josephdum', 'arthur.logan1826@bestmail.eu', '84877726252', NULL, NULL, NULL, 'pitstop.money', NULL, '2020-08-05 07:46:40', '2020-08-05 07:46:40'),
(138, 'SmmdyAlifs', 'bj5eyqhbxbiv@mail.ru', '85878981895', NULL, NULL, NULL, 'Smm Panel – Дешевая накрутка в социальных сетях', 'Самый дешевый автоматический сервис накрутки в соцсетях: https://nakrutka24.com/ru/ \r\nПрайс: https://nakrutka24.com/ru/services \r\nПримеры услуг: \r\nInstagram Подписчики - от 30 руб \r\nInstagram Лайки - от 30 руб \r\nInstagram Просмотры - от 1 руб \r\nYouTube  Просмотры - от 70 руб \r\nИ много других видов накрутки. Для реселлеров предусмотрена скидка 20%. Для получения скидки зарегистрируйтесь, пополните баланс от 15$ и создайте тикет. Имеется API. \r\n \r\nПеревод | Translation \r\n \r\nThe cheapest automatic cheat service in social networks – Smm Panel: https://nakrutka24.com \r\nPrice: https://nakrutka24.com/services \r\nExamples of services: \r\nInstagram Subscribers - from 30 rubles \r\nInstagram Likes - from 30 rubles \r\nInstagram Views - from 1 rub \r\nYouTube Views - from 70 rubles \r\nAnd many other types of wrapping. There is a 20% discount for resellers. To get a discount, register, top up your balance from $ 15 and create a ticket. There is an API. \r\n \r\n<a href=https://nakrutka24.com><img src=\"https://ilizium.com/img/nakrutka_728_90.gif\"></a> \r\n \r\nContacts/Контакты: https://nakrutka24.com/contacts', '2020-08-05 13:23:37', '2020-08-05 13:23:37'),
(139, 'niczorrrr', 'alex2131@gmail.com', '82594645856', NULL, NULL, NULL, 'Test, just a test', NULL, '2020-08-05 14:01:11', '2020-08-05 14:01:11'),
(140, 'Todd Cone', 'support@hyperlabs.co', '(02) 4230 2444', NULL, NULL, NULL, 'website traffic quote request', 'hi there\r\nhere is the your quote on the Country targeted organic website traffic:\r\n\r\nhttps://hyperlabs.co/quote/\r\n\r\nthanks and regards\r\nMike\r\nHyperlabs LTF', '2020-09-14 00:59:39', '2020-09-14 00:59:39'),
(141, 'MarilynRoads', 'contact1@theonlinepublishers.com', '83233519136', NULL, NULL, NULL, 'Choose The Online Publishers for All Your Digital Marketing Needs', 'Hello, we are The Online Publishers (TOP) and want to introduce ourselves to you.  TOP is an established comprehensive global online hub.  We connect clients to expert freelancers in all facets of the world of digital marketing such as writers, journalists, bloggers, authors, advertisers, publishers, social media influencers, backlinks managers, Vloggers/video marketers and reviewers… A few of the many services we offer are content creation and placement, publishing, advertising, online translation, and social media management.  We also have two full online libraries, one of photographs and the other of eBooks and informative resources. \r\nSave money and time by using TOP services.  Rather than having to search for multiple providers of various tasks, we are a one-stop-shop.  We have all the services you will ever need right here.  For a complete list, check out our website https://www.theonlinepublishers.com \r\nTOP can help any business surge ahead of its competition and increase sales.  Join The Online Publishers today.', '2020-09-14 07:30:56', '2020-09-14 07:30:56'),
(142, 'JohnnieKal', 'temptest800026059@gmail.com', '82822335185', NULL, NULL, NULL, '400 Bad Request', '400 Bad Request   http://www.casino91.net/lucky-palace-lpe88-download-game-android-apk-ios/#{Lucky Palace|LPE88 Download Game  - {400 Bad Request|Click here|More info|Show more}{!|...|>>>|!..}', '2020-09-14 09:03:46', '2020-09-14 09:03:46');
INSERT INTO `feedback` (`id`, `name`, `email`, `mobile`, `partner_id`, `driver_id`, `rider_id`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(143, 'Micahvek', 'catch@its.marksypark.com', '83226965968', NULL, NULL, NULL, 'Reaction Of Ethanoic Acid With Sodium Bicarbonate', NULL, '2020-09-14 12:51:37', '2020-09-14 12:51:37'),
(144, 'JerryNip', 'igpetr777999@gmail.com', '84598688326', NULL, NULL, NULL, 'Fuck me today!', '<a href=https://sexualpartner2.com/?u=93bkte4&o=rh9pmbd><img src=\"http://rewas675.tk/111.jpg\"></a>', '2020-09-14 22:17:51', '2020-09-14 22:17:51'),
(145, 'Jefferygox', 'bobrovkonstantinltjp@mail.ru', '86799355881', NULL, NULL, NULL, 'Подоконники купить', 'Подоконники \r\n<a href=https://sill.store>Подоконники купить</a>', '2020-09-15 07:16:05', '2020-09-15 07:16:05'),
(146, 'Hi! If  you   want   to   pull  me   on  your stick,   then   message  me  where   we can meet.   Message  there\r\n https://dsho.page.link/iP5V', 'mfyke@barclaydamon.com', 'bmiller@novelis.com', NULL, NULL, NULL, 'Hey   there !  Looking for  some   fun   to  get  into?  Me  too!  Let\'s get   to  know each   other on  a   much   more   personal   level\r\n https://allinna.page.link/qRJt', 'Hi! If   you want  to pull me   on   your stick,   then  message me  where   we can  meet. Message  there\r\n https://katty.page.link/EtYc', '2020-09-15 07:41:27', '2020-09-15 07:41:27'),
(147, 'KregoryFar', 'burtnils@yandex.com', '84648118867', NULL, NULL, NULL, 'Ремонт компьютеров в Москве', 'Ведущая в Москве компания по настройке и ремонту компьютеров в Москве и Московской области: \r\n \r\nКомпания окажет для Вас услуги по ремонту и настройке ноутбука с выездом на дом. Специалисты организации установят ОС и программное обеспечение, помогут подключить wi-fi и настроить оборудование. \r\nУдаление вирусов с Вашего компьютера, установка необходимого антивирусного ПО. Чистка компьютера от пыли, настройка работоспособности, замена термопасты. \r\nКомпьютерный мастер приедет в течение часа и сделает всё качественно. Предоставляется гарантия на все виды выполненных работ. \r\nТакже, производится настройка принтера. \r\n \r\nСсылки на сайт компании -  \r\nhttps://clck.ru/Qpyy3 - ремонт блока питания компьютера все возможные причины,  \r\nhttps://ремонт-компьютеров.рус - ремонт жесткого диска компьютера,  \r\nhttp://ремонт-компьютеров.рус - ремонт компьютеров люблино,  \r\nhttp://www.ремонт-компьютеров.рус - ремонт компьютеров эпл,  \r\nhttps://www.ремонт-компьютеров.рус - курсы по ремонту компьютеров.', '2020-09-15 08:49:39', '2020-09-15 08:49:39'),
(148, 'CarmenUnela', '05johnsmith@mail.ru', '89615313858', NULL, NULL, NULL, 'Половой член (синонимы пенис, фаллос), наружный половой орган мужчины', 'Крайняя плоть   Шов может быть хорошо заметен или, наоборот, почти не виден - Около темы члена..    https://sexpreparat.ru/about/79 -Половой член (синонимы пенис, фаллос), наружный половой орган мужчины   Строение полового члена', '2020-09-15 16:10:37', '2020-09-15 16:10:37'),
(149, 'Edwardbrano', 'em7evg@gmail.com', '82774812425', NULL, NULL, NULL, 'Work at home. Зарабатывай дома', 'Все для лестниц, погонаж оптом! http://35stupenek.ru/ - Комплектующие для лестниц, двери межкомнатные, перила для лестниц, мебельные щиты, балясины для лестниц, деревянные плинтуса, погонажные изделия, имитация бруса, резные деревянные картины, ступени для лестниц. Поможем с доставкой в любой регион!', '2020-09-15 23:06:49', '2020-09-15 23:06:49'),
(150, 'Garry Williamson', 'expiry@turvy.net', '06-84748431', NULL, NULL, NULL, 'turvy.net NOTICE.', 'ATT: turvy.net / Home | Turvy SITE SERVICES\r\nThis notice EXPIRES ON: Sep 16, 2020\r\n\r\n\r\nWe have actually not received a payment from you.\r\nWe  have actually attempted to contact you but were incapable to contact you.\r\n\r\n\r\nKindly Go To: https://bit.ly/32vQyvK .\r\n\r\nFor details and also to process a discretionary settlement for services.\r\n\r\n\r\n\r\n09162020053046.', '2020-09-15 23:30:48', '2020-09-15 23:30:48'),
(151, 'RalphPes', 'lapserdak@meil.co.pl', '89262184743', NULL, NULL, NULL, 'Jaroslaw Wrobel PGNiG', '<a href=http://wrubel-jaroslaw-anwil.jaroslaw-wrobel.pl/>Jaroslaw Wrubel PGNiG</a>', '2020-09-16 12:25:25', '2020-09-16 12:25:25'),
(152, 'Henryhop', 'surayosharipova91@gmail.com', '89030437139', NULL, NULL, NULL, 'No need to work anymore. Just launch the robot. Link - https://moneylinks.page.link/6SuK', '# 1 financial expert in the net! Check out the new Robot. \r\nLink - https://moneylinks.page.link/6SuK', '2020-09-16 16:19:56', '2020-09-16 16:19:56'),
(153, 'prasp', 'checy@wrpills.com', '88765527719', NULL, NULL, NULL, NULL, NULL, '2020-09-17 16:06:01', '2020-09-17 16:06:01'),
(154, 'Jamesbow', 'prokhorovaleksandrovf@mail.ru', '83593195262', NULL, NULL, NULL, 'солнечно ветровые светильники 150вт', 'автономные солнечно ветровые \r\n \r\n<a href=https://sun-shines.ru/>автономные солнечно ветровые</a>', '2020-09-17 20:23:11', '2020-09-17 20:23:11'),
(155, 'Jamesbow', 'prokhorovaleksandrovf@mail.ru', '84554811458', NULL, NULL, NULL, 'солнечно ветровые светильники 150вт', 'автономное освещение \r\n \r\n<a href=https://sun-shines.ru/>автономные солнечно ветровые</a>', '2020-09-17 20:23:11', '2020-09-17 20:23:11'),
(156, 'Robertevake', 'nkorea914174814@gmail.com', '84655334244', NULL, NULL, NULL, 'North Korea', NULL, '2020-09-17 21:36:48', '2020-09-17 21:36:48'),
(157, 'Edwardbrano', 'em7evg@gmail.com', '84477991725', NULL, NULL, NULL, 'Work at home. Зарабатывай дома', 'Все для лестниц, погонаж оптом! http://35stupenek.ru/ - Комплектующие для лестниц, двери межкомнатные, перила для лестниц, мебельные щиты, балясины для лестниц, деревянные плинтуса, погонажные изделия, имитация бруса, резные деревянные картины, ступени для лестниц. Поможем с доставкой в любой регион!', '2020-09-18 12:42:36', '2020-09-18 12:42:36'),
(158, 'JulianAspew', 'catch@which.marksypark.com', '88444837897', NULL, NULL, NULL, 'Admission Counselor Cover Letter No Experience', NULL, '2020-09-18 15:21:19', '2020-09-18 15:21:19'),
(159, 'Anita305', '2conv.ch@gmail.com', '88867856292', NULL, NULL, NULL, 'Free Youtube video downloader and top ten video enhancer', 'Hi there, I like your website, just to share some free tool websites which might help. \r\n<a href=https://2conv.ch>1080P Youtube Converter</a> \r\n<a href=https://keepvid.ch>Video Downloader</a> \r\n<a href=https://y2mate.ch/>Y2mate Youtube Downloader</a> \r\n <a href=https://listentoyoutube.ch/en/mp3-converter>Youtube to mp3</a> \r\n<a href=https://topten.ai/image-enlargers-review/>free iamge enlarger</a> \r\n<a href=https://youtubetomp3.tools/>easy Youtube to mp3 tools</a> \r\n<a href=https://topten.review/best-online-video-downloader/>Top ten online Youtube Video Downloader Review 2020</a>', '2020-09-18 17:40:14', '2020-09-18 17:40:14'),
(160, 'niczorrrr', 'alex2131@gmail.com', '88649696894', NULL, NULL, NULL, 'Test, just a test', NULL, '2020-09-18 18:42:20', '2020-09-18 18:42:20'),
(161, 'Josefexpep', 'efimovvladimiraphg@mail.ru', '85454658548', NULL, NULL, NULL, 'авиабилеты', 'авиабилеты \r\n \r\nПокупайте по ссылке <a href=https://uletay.net/>билет на самолет москва сочи самый дешевый</a> через авиа-поиск Uletay.net', '2020-09-19 00:14:18', '2020-09-19 00:14:18'),
(162, 'Joe Miller', 'info@domainworld.com', '+12548593423', NULL, NULL, NULL, '12JE6', 'IMPORTANCE NOTICE\r\n\r\nNotice#: 491343\r\nDate: 2020-09-20    \r\n\r\nExpiration message of your turvy.net\r\n\r\nEXPIRATION NOTIFICATION\r\n\r\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://godomainser.com/?n=turvy.net&r=a&t=1600544093&p=v1\r\n\r\nThis purchase expiration notification turvy.net advises you about the submission expiration of domain turvy.net for your e-book submission. \r\nThe information in this purchase expiration notification turvy.net may contains CONFIDENTIAL AND/OR LEGALLY PRIVILEGED INFORMATION from the processing department from the processing department to purchase our e-book submission. NON-COMPLETION of your submission by the given expiration date may result in CANCELLATION of the purchase.\r\n\r\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://godomainser.com/?n=turvy.net&r=a&t=1600544093&p=v1\r\n\r\nACT IMMEDIATELY. The submission notification turvy.net for your e-book will EXPIRE WITHIN 2 DAYS after reception of this email\r\n\r\nThis notification is intended only for the use of the individual(s) having received this message. \r\n\r\nPLEASE CLICK ON SECURE ONLINE PAYMENT TO COMPLETE YOUR PAYMENT\r\n\r\nSECURE ONLINE PAYMENT: https://godomainser.com/?n=turvy.net&r=a&t=1600544093&p=v1\r\n\r\nNon-completion of your submission by given expiration date may result in cancellation.\r\n\r\nAll online services will be restored automatically upon confirmation of payment. Delivery will be completed within 24 hours. \r\n\r\nCLICK UNDERNEATH FOR IMMEDIATE PAYMENT:\r\n\r\nSECURE ONLINE PAYMENT: https://godomainser.com/?n=turvy.net&r=a&t=1600544093&p=v1', '2020-09-19 09:34:55', '2020-09-19 09:34:55'),
(163, 'Brus extex', 'tempoo626232418@gmail.com', '88582526953', NULL, NULL, NULL, 'Правельный выбор', NULL, '2020-09-19 12:29:19', '2020-09-19 12:29:19'),
(164, 'JamesGof', 'zakharovivannav@mail.ru', '84884878953', NULL, NULL, NULL, 'гарантекс', 'гарантекс \r\n \r\n<a href=https://garantex.io/>гарантекс</a>', '2020-09-19 12:45:13', '2020-09-19 12:45:13'),
(165, 'Frankstymn', 'demidovaleksandrkks@mail.ru', '81962651543', NULL, NULL, NULL, '1xbet официальный', '1xbet официальный \r\n \r\nПо ссылке на сайт <a href=https://zerkalo-1xbet.com/>1xbet зеркало сегодня сейчас</a> вы найдет зеркало 1xbet, и сможете скачаь его.', '2020-09-19 13:28:22', '2020-09-19 13:28:22'),
(166, 'RaymondCrund', 'petya.yefremov.83@mail.ru', '86126177534', NULL, NULL, NULL, 'адрес гидры', 'адрес гидры \r\n \r\nПереходите на сайт: <a href=https://hydra-tek.com>hydra onion как зайти</a> -  и бросайте употреблять запрещенные вещества.', '2020-09-19 13:46:41', '2020-09-19 13:46:41'),
(167, 'Teresashaxy', 'contact2@theonlinepublishers.com', '82191844236', NULL, NULL, NULL, 'Grow Your Business with TOP Vlogger Experts', 'Grow Your Business with TOP Vlogger Experts \r\n \r\nHow would you like to have your company\'s story told in video clips?  What better way to do that than with a series of short videos?  Welcome to the world of vlogging.  Vlogging is essentially blogging, except it is in the form of videos instead of written text.  When you are a client of The Online Publishers (TOP) we can connect you with professionals who excel at this unique type of marketing.  TOP Combines Vlogging and Influencers Marketing to boost your online reputation. \r\n \r\nClients love being able to express the highlights of their company or region through videos.  A great digital marketing firm not only knows the ins and outs of creating vlogs but knows how and where to place them to gain the maximum exposure.  Allow the vlogging gurus at TOP to do these things for you. \r\n \r\nAnother key feature of vlogging that TOP is excellent at is using social media sites to boost the videos.  All exposure that your videos can obtain through social sites is great.  Our service providers can successfully accomplish this for you.  This is especially fantastic if you need to bolster your online reputation.  Vlogs are a perfect way to do that and our providers know how to get it done right.  Go online to http://www.theonlinepublishers.com/ now and ask our support team all about it.', '2020-09-19 19:44:44', '2020-09-19 19:44:44'),
(168, 'Briannassy', 'petya.roshchin.85@mail.ru', '83472243832', NULL, NULL, NULL, 'алиэкспресс', 'алиэкспресс \r\n \r\nПерейдите по ссылке <a href=https://aliexpress-kabinet-online.ru/>алиэкспресс интернет магазин на русском</a> и получайте бонусы от алиэкспресс.', '2020-09-20 03:15:31', '2020-09-20 03:15:31'),
(169, 'RubenTum', 'e.l.enabalashova91036@gmail.com', '84145656959', NULL, NULL, NULL, 'remedies for verrucas', 'mold remediation services  <a href=http://www.anglarna.se/forum/viewtopic.php?f=1&t=711103>http://www.anglarna.se/forum/viewtopic.php?f=1&t=711103</a>  split ends remedies', '2020-09-20 07:38:15', '2020-09-20 07:38:15'),
(170, 'JamesNibly', 'evladislav735@gmail.com', '84254415164', NULL, NULL, NULL, 'Полезные сайты которые помогут решить все сложные вопросы', 'Переходите по ссылке: <a href=\"https://hydra2webl.com\" title=\"гидра сайт\">гидра сайт</a> -  и бросайте употреблять разные гадости не губите свое здоровье.', '2020-09-20 08:29:33', '2020-09-20 08:29:33'),
(171, 'ArleneyaGom', 'zoyaretki@gmail.com', '82624561471', NULL, NULL, NULL, 'Очень хочу поговорить с секси парнем', 'Привет. \r\nМое имя Наташа. \r\nПознакомлюсь с мужчиной для встречи. Приеду к тебе на район или встримся у меня. Живу недалеко. \r\n \r\n<a href=https://clck.ru/Qv99h>Мои фото</a>', '2020-09-20 13:03:03', '2020-09-20 13:03:03'),
(172, 'PORNO-GO', 'grembax@mail.ru', '85384937562', NULL, NULL, NULL, 'Домашнее Порно Видео в HD', '<img src=\"https://i.ibb.co/vcPfmhQ/1111.jpg\"> \r\n \r\nСмотрите абсолютно разнообразное и большинство из них в идеальном HD качестве, все доступно без регистрации 24 часа в сутки. Ощутите наполненное глубокими чувствами экспедиция по хорошо собранным группам пиковое удвольствие - сайт разместил для любителей кайфануть просмотром невероятного объема разных видео в лучшем качестве ХД.Молоденькими позволяют вытворять самые безумные выкрутасы которые совсем не могут выполнить юные девчонки. Видео абсолютно разное и большинство из них в замечательном hd1080 качестве, все секс видео доступно абсолютно бесплатно и без регистрации 24/7. Не забывайте все видео только для зрителей достигших 18 лет. Бесплатно порно онлайн c молодыми девушками смотреть с любых устройств и гаджетов без регистрации https://porno-go.ru . Заходите по чаще делитесь ссылочкой на наш туб и запомните все порно только для людей совершеннолетних 18 лет. Рады приветствовать качественный на сексуальный сайт. Адалт сайт тут вы насладитесь здесь от обширным выбором порно видео без регистрации  из более 39 категорий порнушки, в роликах трахаются только молодые девчонки предпочитающие хорошенько долбиться во все свои узкие щели. Ниже администрация  подготовили самые жаркие порно видео со зрелыми женщинами и поместили все разделы. Групповое порно видео https://porno-go.top/group-porn/ здесь с участием девиц онлайн без регистрации https://porno-go.top/group-porn/ смотреть групповой секс видео с присутствием девушек онлайн бесплатно. Видео азиатки порно https://porno-go.top/azian/ porno-go.top молодые узкоглазые девицы онлайн бесплатно Смотреть https://porno-go.top/azian/ азиатское порно молоденькие узкоглазые девушки онлайн бесплатно. Смотреть ролики кончают на лицо радостные https://porno-go.top/sperm/ сдесь девчата получают заряд жижи в пилотки|Смотреть порно https://porno-go.top/sperm/ сперма бесплатно счастливые девицы получают порцию жидкости в пилотки. Видеостудентов секс вечеринки https://porno-go.top/porno-vecherinki-i-studenty/ здесь. Ученики тусят по полной программе Смотрите студентов https://porno-go.top/porno-vecherinki-i-studenty/ секс вечеринки. Молодые люди раскрываются по полной. Порно со сквиртом https://porno-go.top/squirt/ сдесь девицы брызгают от удовольствия онлайн бесплатно. Смотреть  https://porno-go.top/squirt/ сквирт нарезка девушки брызгают от оргазма онлайн без регистрации. Красивое порно ролики https://porno-go.top/krasivyy-seks/ на сайте с участием 18 летних девушек онлайн бесплатно https://porno-go.top/krasivyy-seks/ смотреть красивый секс видео с участием молодых девушек онлайн без регистрации. Здесь мы подготовили самые интересные категории нашего сайта, с каждой категории вы всегда можете перейти на любую категорию с боку, ну если вам покажется мало, тогда  мы любезно расскажем самые разделы порно видео где вы увидете множество достойного веб контента. Увидеть почти тридцать подразделов с молодыми волшебницами удивит самых равнодушным. Ведь горячие девки не волнуются ни о чем когда возле появляется большой член и дает возможность трахать себя везде где только можно получая огромное наслаждение. Заливка последнего кино секс роликов происходит ежедневно для того не было времени приуныть, желаем интересного просмотра. Классное наше творение эксклюзивное творени? отличный|лучший порно сайт, мы стараемся наша команда воспроизводит качественный содержание и добавляем вам самые яркие и знаментиые ХД секс ролики. Наш сайт постоянно освежается совершенно новыми материалыми, чтобы вы в любой день могли насладится развратными здвездами эро индустрией 24/7. \r\n \r\n<img src=\"https://i.ibb.co/TwM6TZ0/22222.jpg\"> \r\n \r\nРолики абсолютно не повторяется и большинство из них в отличном ХД качестве, все доступно без регистрации 24 часа в сутки. Испытайте насыщенное сочными впечатлениями турне по хорошо постороенным подразделам предельное удвольствие - хостинг дает возможность для людей оттянуться просмотром огромного количества разнообразных роликов в лучшем качестве HD.Молодыми позволяют дамочками самые странные вещи в сексе которые абсолютно не сделают представить молоденькие девчонки. Видео безусловно разное и каждое из них в замечательном ХД качестве, все порно видео доступно абсолютно бесплатно и без регистрации 24/7. Не забывайте все порно только для зрителей достигших 18 лет. Смотреть порно го онлайн c молоденькими девушками смотреть с абсолютно любых мобильных и планшетов без смс. Смотрите по чаще делитесь ссылкой ролика на наш сайт и запомните все ролики только для людей достигших 18 лет. Добро пожаловать отличный на эротический сайт. Порно сайт здесь вы насладитесь здесь от огромного архивом секс видео без регистрации  из более 43 подразделов порно, в видео находятся как на подбор юные девушки предпочитающие хорошенько трахаться во все свои узкие щелочки. Внизу мы  подготовили самые крутые порно видео со зрелыми дамами и поместили все разделы. Ролики порно кастинги с молодыми девицами https://porno-go.top/casting/ сдесь смотреть кастинги абсолютно без регистрации. Видео https://porno-go.top/casting/ секс кастинг онлайн с молодыми телочками смотреть кастинги абсолютно без регистрации Частное порно видео https://porno-go.top/amature/ porno-go.top с настоящими парами готовыми показать любительское порно онлайн бесплатно. Видео https://porno-go.top/amature/ смотреть домашнее порно с настоящими парами готовыми показать частное порно онлайн бесплатно. Жесткое порно видео https://porno-go.top/zhestkoe-i-hardkor/ тут и грубый секс с молоденькими девушками онлайн ролики без регистрации. Жесткий секс и https://porno-go.top/zhestkoe-i-hardkor/ жесткое грубое порно с молоденькими девушками онлайн ролики бесплатно. Порно анал и секс в задницу https://porno-go.top/anal/ здесь с молоденькими онлайн совершенно бесплатно смотрите анал во всей красе. Порно анал и секс в задницу https://porno-go.top/zhestkoe-i-hardkor/ анальный секс. Секс в попку с молодыми онлайн смотреть порно видео в отличном https://porno-go.top/hd-porno/ сдесь HD 1080 качестве онлайн совершенно бесплатно. Смотреть видео https://porno-go.top/hd-porno/ секс HD 1080 онлайн без регистрации. Самые сочные Задницы, огромный выбор девушек с большими жопами https://porno-go.top/ass/ на сайте смотрите секс онлайн бесплатно. Огромный выбор девушек с большими https://porno-go.top/ass/ порно видео попки смотрите самые сочные попки видео онлайн бесплатно. Онлайн русское порно ролики https://porno-go.top/russia/ porno-go.top знакомые русские слова в порно онлайн совершенно бесплатно|Смотреть видео https://porno-go.top/russia/ русское порно смотреть онлайн знакомые русские слова в порно онлайн без регистрации. Тут мы выделили самые просматревыемые разделы секс тюба, с любой страницы вы сможите выбрать на любую категорию с боку, но если вам мало видео, тогда  мы с удовольствием посоветуем одни из самых разделы порно видео где вы увидете много хорошего интернет контента. Смотреть 27 категорий с молодыми чародейками будет интересна самым эстетам. Ведь горячие милашки не парятся о чем либо когда близко появляется толстый хуй и начинает трахать себя во все щели испытывать массу блаженство. Обновление последнего фильм контента происходит регулярно для того отсутствовало время заскучать, желаем интересного просмотра. Классное наше творение эксклюзивное творени? лучший порно сайт, наши программисты старается делать лучший содержание и добавляем только самые яркие и запоминающиеся ХД порно видео. Наш туб ежедневно освежается абсолютно новыми материалыми, чтобы вы каждый день могли посмотреть развратными здвездами эротической индустрией 24/7. \r\n \r\n<img src=\"https://i.ibb.co/3FwQbKX/3333.jpg\"> \r\n \r\nРады приветствовать хороший на сексуальный сайт. Адалт сайт естественно вы насладитесь здесь от большого выбором порно клипов онлайн  из более 43 подразделов порнухи, в роликах находятся только молоденькие девушки любящие как следует трахаться во все свои влажные места. Смотрите абсолютно не повторяется и большинство из них в замечательном hd720 качестве, все доступно без регистрации 7 дней в неделю. Попробуйте на себе заполненное яркими чувствами турне по точно отредактированным группам пиковое удвольствие - туб подготовил для зрителей кайфануть просмотром невероятного числа все возможных роликов в лучшем качестве ХД. https://porno-go.top/ Бесплатное порно онлайн c молодыми девушками смотреть с абсолютно любых телефонов и компютеров без регистрации. Заглядывайте по чаще делитесь ссылкой на наш туб и не забывайте все порно только для зрителей достигших достигших лет. Тут мы подготовили самые популярные категории нашего сайта, с любой категории вы можете перейти на любую категорию с боку, но в случаи того вам мало видео, тогда  мы с удовольствием посоветуем самые разделы порно видео где вы найдете множество хорошего интернет контента: 1. Групповое порно ролики с присутствием девиц онлайн без регистрации https://porno-go.top/group-porn/. 2. Видео японский секс молоденькие узкоглазые девицы https://porno-go.top/azian/. 3. Смотреть видео сперма на лице радостные девчата получают заряд жижи в щели https://porno-go.top/sperm/ . 4. Видео студенческие порно вечеринки Молодые люди отрываются по полной https://porno-go.top/porno-vecherinki-i-studenty/ . 5. Порно сквиртинг девицы писаются от удовольствия https://porno-go.top/squirt/ . 6. Красивый секс ролики с участием молоденьких девушек https://porno-go.top/krasivyy-seks/ . 7. Порно кастинги с молодыми девушками смотреть кастинги абсолютно бесплатно https://porno-go.top/casting/ . 8. Любительское порно видео с реальными людьми готовыми показать реальное порно без регистрации https://porno-go.top/amature/ . 9. Грубое порно видео и жесткий секс с молоденькими https://porno-go.top/zhestkoe-i-hardkor/ . 10. Порно анал и секс в задницу с молодыми онлайн без регистрации смотрите анал во всей красе https://porno-go.top/anal/ . 11. Самые сочные Булки, огромный выбор девушек с большими задницами https://porno-go.top/ass/ . 12. Смотреть русский секс ролики знакомые русские фразы в порно онлайн без регистрации https://porno-go.top/russia/ . 13. Домашнее порно видео в лучшем HD 1080 качестве онлайн совершенно бесплатно https://porno-go.top/domashniy-anal/ . Понравилось на нашем эксклюзивном сайте? https://porno-go.top/ лучший лучший секс сайт, наши программисты делает качественный русурс и предостовляем для вас самые классные и интересные качественное порно ролики. Наш сайт постоянно освежается совершенно эксклюзивными клипами, чтобы вы в любой день могли насладится раскрепащенными здвездами эротической индустрией семь дней в неделю.', '2020-09-20 16:24:47', '2020-09-20 16:24:47'),
(173, 'Keepvidsmita', 'mp3ytb.ch@gmail.com', '87423313641', NULL, NULL, NULL, 'Background Remover Review of 2020', 'Hi folks, just came across this site and would love to share some useful website resource which might be help, thanks! \r\n<a href=https://keepvid.ch/en6/>Keepvid YouTube downloader</a> \r\n<a href=https://y2mate.ch/>y2mate website</a> \r\n<a href=https://flvto.ch/>YouTube video converter</a> online website. \r\nhttps://listentoyoutube.ch/it1/ youtube mp3 Miglior YouTube libero per MP3/MP4 Strumento scarico \r\nhttps://makemkv.us/ Makemkv review site.', '2020-09-20 18:50:23', '2020-09-20 18:50:23'),
(174, 'ConnieCib', 'bodrovpetr65@gmail.com', '84279227961', NULL, NULL, NULL, 'курсы чешского языка онлайн бесплатно', '<img src=\"https://i.ibb.co/r4rvwxQ/1.jpg\"> \r\nВсе, собственно что нужно для начала изучения – это компьютер \r\nприсоединенный к онлайну. Ваш катализатор и вожделение \r\nдозволит добиться этих высот, коих Вы сами пожелаете, \r\nа мы для сего предоставим великолепные способности изучения, \r\nорганизуем посыла и мотивацию! \r\n<a href=https://study24.cz> \r\nкурсы чешского языка онлайн бесплатно </a>', '2020-09-20 20:49:48', '2020-09-20 20:49:48'),
(175, 'NormanBup', 'karimovromanteag@mail.ru', '89675139848', NULL, NULL, NULL, 'Наш сайт в тренде', 'Наш сайт в тренде \r\n \r\n<a href=https://www.sports.ru/profile/1055828490/>Тренер йоги Елена Лисицына</a>', '2020-09-20 21:37:57', '2020-09-20 21:37:57'),
(176, 'HaroldEduch', 'pimenovpavellji@mail.ru', '82682538917', NULL, NULL, NULL, 'солнечные светильники', 'автономное освещение \r\n \r\n<a href=https://глобал-свет.рф>солнечно ветровые светильники</a>', '2020-09-21 03:30:00', '2020-09-21 03:30:00'),
(177, 'RamonChemo', 'smirnovaleksandroec@mail.ru', '84686417671', NULL, NULL, NULL, 'Original Essentiale N Ampoules', 'We offer Original Essentiale N Ampoules from Sanofi Aventis. \r\nWorldwide delivery within 10 days. \r\nWe accept PayPal! \r\n \r\nThe active substance of is the so-called essential phospholipids (EPL-substance), which are a highly purified fraction of phosphatidylcholine. The determining component of this fraction is dilinoleoylphosphatidylcholine. Essential phospholipids are similar in their chemical structure to endogenous membrane phospholipids, surpassing them in their functional properties due to their high content of polyunsaturated fatty acids, especially linoleic acid. Phospholipids are the main structural elements of cell membranes and organelle. They take part in differentiation, division and regeneration of cells. \r\n \r\nPlease contact us for any details. \r\nhttp://www.usaonlineclassifieds.com/view/item-977174-Essentiale-N-vials-from-Sanofi-Aventis.html', '2020-09-21 07:07:31', '2020-09-21 07:07:31'),
(178, 'AlbertTep', 'postnikovivanlkxz@mail.ru', '86252175433', NULL, NULL, NULL, 'маммопластика форум', '<b>Elen Elen</b> \r\nИ вновь Юрий Петрович исполнит чью- то заветную мечту я желание тоже не отказалась , истина эстетических проблем особо не имею , разве что размер , однако думаю , сколько у кого- то потреблять более весомые аргументы , поэтому желаю девочкам удачи и скорейшего исполнения мечты уверена , Эльдар Мельников превратит её в реальность \r\n \r\n<b>Ksenija</b> \r\nРазумеется, вопрос проблеме рознь. Перенести уже четыре операции затем \" удачной\" маммопластики - это одно, а некрасиво иначе плохие швы - это другое. \r\nИ даже коль мой испытание абсолютно позитивный, историй о книга, сколько \"это не результат неприглядный, это вы косая-кривая\", слишком много. \r\nА для их было меньше, зависит уже от нас. Делимся своим опытом и наполняем форум полезной информацией. \r\n \r\n<b>Eva</b> \r\n<b>@Софочка36</b>, ну,это уже набитый п....ц,товарищи! \r\n \r\n<b>Ftatyana</b> \r\nБлагодарность ради ответ. А о Динишуке слышали отзывы возможно? \r\n \r\n<b>Аннабелль</b> \r\nЗнаток рекомендовать не буду, сказу одно, ПОСТОЯННО имплантаты заблаговременно тож прот надо менять. \r\nСловно трансформируется грудь от перед беременности и затем можете посмотреть в моей теме. \r\n \r\n<b>Катюша</b> \r\nПодскажите стоимость операции и сколь у вас следовать весь вышло, благодарность \r\n \r\n<b>Ksenija</b> \r\nКонечно, проблема проблеме рознь. Перенести уже четыре операции впоследствии \" удачной\" маммопластики - это одно, а некрасиво тож плохие швы - это другое. \r\nИ даже разве мой эксперимент абсолютно позитивный, историй о часть, что \"это не результат незавидный, это вы косая-кривая\", чрезвычайно много. \r\nА для их было меньше, зависит уже через нас. Делимся своим опытом и наполняем форум полезной информацией. \r\n \r\n<b>Катерина</b> \r\nНачинать, в теории, коль бы не эта Диана, о враче знали бы скольконибудь человек. А информация дорогого стоит. \r\n \r\n<b>mamamanana</b> \r\nАхахаха Вот это вы придумали)))) \r\n \r\n<b>Iulia</b> \r\nПричинность Вам который отозвались !!! Я сейчас делаю инъекции коллагеназой. Положительная динамика нагрузиться . Хочу добавить лечение ферменколом с фонофорезом . Я начала избавлять сей подкожный рана спустя 2 месяца впоследствии операции. Это прот, будто мне сказали . Только буду надеяться хоть для какое-то починка ! \r\n \r\n<b>Kloki</b> \r\n<b>@Marysya Matros</b>, простой представила как Вы лезете для дерево который желание интернет поймать \r\n \r\n<b>Logvinova</b> \r\n<b>@Shine</b>, спасибо,что ответили)У меня по числам получается токмо потом 22декабря,к сожалению,либо хотя бьі 22.Я планирую полную рино,бьіл перелом.Если у вас что то поменяется сообразно числам,отпишите,просьба).И вообще,есть возможность лично списаться с вами? \r\n \r\n<b>Ника</b> \r\nВы не заметили, только в этой ветке и токмо у иванчука, с закономерной периодичностью, появляются довольные одноразовые клиентки. позволительно график выстроить. прям чудо-чудное какое-то \r\n \r\n<b>Ludmila</b> \r\n<b>@Каролина</b>, он не минималист! Примем мне, он сказал то же сообразно объёму предположительно, который и ещё два хирурга. А Юрасов сказал совершенно бедно(( так который не думаю, что Крымников будет говорить лишь бы поменьше! Только побеждать на ОП следующие по таблице импланты всегда действительно попроси! \r\n \r\n<b>Eva</b> \r\nВся из сомнение, капец,самомнение...извините,но в принципе,пластику бедные люди не делают!меня желание обидел такой старт разговора...да и не цена показатель профессионализма,словно по мне! \r\n \r\n<b>Yadvigauslegko </b> \r\nсделала пробно теперь у Димы руки ( радиес), по сравнению с губами не слишком, про результат буду аристократия путем пару месяцев. Руки худые, красивые, без провиса тканей, но шкура кистей мелко-морщинистая, только и лицо((( ясный выражены вены... буду смотреть. Коль эффект лично в моих глазах будет меньше ожидания - больше делать не буду \r\n \r\n<b>Kleopatraja</b> \r\nМогли бы потрудиться и прочитать эту тему с самого налача и сделать личный вывод. \r\n \r\n<a href=https://forum.plastic-surgeon.com.ua/forumdisplay.php?f=11>маммопластика форум</a>', '2020-09-21 09:21:45', '2020-09-21 09:21:45'),
(179, 'Hi!  If you   want  to   pull me   on your  stick, then message  me   where   we can  meet.  Message there\r\n https://asya.page.link/Pggk', 'beth@winklevosscapital.com', 'daphnekeithidu@saintly.com', NULL, NULL, NULL, 'intimate   here are  my  photos.  Nick   Dipassy69/   You  are   very beautiful and   hot,   fuck  me   in all holes)\r\n https://katrrina.page.link/QuUb', 'Come   and lets  have   fun\r\n https://babby.page.link/xMoC', '2020-09-21 09:47:26', '2020-09-21 09:47:26'),
(180, 'Juliane Espinal', 'espinal.juliane9@outlook.com', '435 14 315', NULL, NULL, NULL, NULL, 'Good morning, I was just checking out your site and filled out your feedback form. The feedback page on your site sends you these messages via email which is the reason you are reading through my message at this moment correct? That\'s the most important achievement with any type of advertising, getting people to actually READ your advertisement and I did that just now with you! If you have something you would like to blast out to millions of websites via their contact forms in the US or to any country worldwide let me know, I can even focus on particular niches and my prices are very reasonable. Send a reply to: dalosrafael9183@gmail.com\r\n\r\nunsubscribe your website here https://bit.ly/2XO7Wdg', '2020-09-21 13:18:22', '2020-09-21 13:18:22'),
(181, 'Antonbepay', 'yegor.yusupov.83@mail.ru', '86655685996', NULL, NULL, NULL, 'ринопластика форум', '<b>adeleadeline</b> \r\nХочу сделать ринопластику у доктора в Киеве, но о нем больно мало отзывов. Употреблять только инстаграм страничка с его работами. Как делает носики ужасно нравится. Однако для его личном сайте фото до и затем нет. сколько меня настораживает. который нибудь делал у него операции? @koval9354 в инстаграме Сергей Коваль \r\n \r\n<b>Ludasik</b> \r\nРазительно актуальна содержание и ради меня! Сама хотела создать , а смотрю уже вкушать) \r\nМеня маммопластика интересует ) склеивание , без швов) \r\nМожет кто-то владеет информацией? \r\n \r\n<b>persikr</b> \r\nТоже интересно про него услышать ) интересует липо живота ) \r\n \r\n<b>Катерина</b> \r\nКого интересует, добро идти сюда. Чистать с низа страницы и кроме: https://forum.plastic-surgeon.com.ua...hp?t=14&page=6 \r\n \r\n<b>Kleopatraja</b> \r\nКатерина,реально браво!!!вот это Вы Шерлок!я в восторге!!! \r\n \r\n<b>ane</b> \r\nИ однако потому, который создали украинский филиал, где у меня кроме остается эпоха не просматривать посты, а вчитываться в них. Здесь бы я николи не заморочилась. Беспричинно который присоединяйтесь туда - совместными усилиями мы постоянно же вычислим талантливых ринопластов. \r\n \r\n<b>Logvinova</b> \r\nИ сюда маломальски примеров (не всетаки, который скопировала, так как неподвижность иметь))). \r\n \r\n<b>Ksenya.R</b> \r\nЗаписалась для консультацию, к Егору. Как схожу отпишусь \r\n \r\n<b>Anzhela.Star</b> \r\nВот,честно,я не понимаю,это тоже подстава alias хотя:он ежемгновенно постит у себя на странице в инстаграм видео с пациентками затем маммо через несколько часов после операции.и они там все такие счастливые,руками машут,говорят,сколько абсолютно шиш не болит,сколько хоть немедленно для дискотеку бы побежали!начинать,то от он супер-волшебник,то ли я чё-то не понимаю....я вздохнуть не могла затем операции без боли.или я одна такая?! \r\n \r\n<b>adeleadeline</b> \r\nНо я отказалась. Меня спросили почему, я выслала ссылку на наш форум, и на разоблачение. Потом , чего была пол дня пауза, а потом ответ, это ваш выбор. \r\nИ впоследствии этого, я смотрю, инстаграмм доктора начал активно пополняться новыми результатами, и видео пациентов. Последнее видео, где пациентка , не успела отойти от наркоза, и уже поднимае руки, меня общий привело в шок, я руки смогла поднимать помощью неделю не прежде, а первые 3 дня в клинике, для обезбаливающих, и безвыездно равно было крайне больно, и жалко себя, и я плакала, а не смеялась, как для видео пациентов Иванчука. \r\n \r\n<b>Ludasik</b> \r\nВся из сказки,вот и я написала о часть,что это нельзя беспричинно ехать потом операции,что я тоже давеча пережила ее и поднимать руки вообще воспрещается первые дни.он прежде мне ответил,который у них в клинике безвыездно именно беспричинно,чистый для видео,а после и окончательно всетаки удалил и меня забанил \r\n \r\n<b>persikr</b> \r\nТрапезничать хирурги, которые заставляют с первых дней поднимать руки. Блохин, например. А если оценивать под железу, наверное попроще будет. \r\n \r\n<b>Kleopatraja</b> \r\nВся из сомнение, смотрю по дате добавления вашего коммента и кажется понимаю о ком вы,такая блондинка зубатая с тату крыла на руке? Я ее вчера видела для выписке,сообразно времени уже позавчера,она была с подружкой (той ринопластику делали) ,так вот она реально сидела и кивала,плотина разумеется,постоянно огонь. Я словно единожды приехала на операцию . \r\n \r\n<b>Катерина</b> \r\nВпопад в клинике лежат журналы единственно те,где снедать о враче и его клинике сочинение какая-то с фото. Вычитала сколько он учился в беверли хилз и в Мюнхене. Интересно Егор Дмитриевич читает этот форум?А о мне к ниму еще для осмотр))) \r\n \r\n<a href=https://plastic-surgeon.ru/forum/showthread.php?t=17007&page=5>форум увеличение груди</a>', '2020-09-21 17:43:00', '2020-09-21 17:43:00'),
(182, 'prasp', 'checy@wrpills.com', '88252781949', NULL, NULL, NULL, NULL, NULL, '2020-09-21 18:47:00', '2020-09-21 18:47:00'),
(183, 'Retyahag', 'nujoliusirjf@mail.ru', '86965653344', NULL, NULL, NULL, 'Заказ дипломной, курсовой, реферата, контрольной - купить недорого онлайн', 'Это уже не открытие , что  практически все  учащиеся  желают воспользоваться услугами по написанию  студенческих работ. Специальные сервисы позволяют  сделать такую работу на заказ недорого  и быть уверенным в  достойном результате. \r\n \r\nВ нашей компании http://stduent-help.com/ можно заказать  отчет по производственной практике    быстро   в  Ветлуге . Мы гарантируем качественное выполнение работы на заказ. У нас работают квалифицированные специалисты, которые помогут сделать работу к нужному сроку. Дипломная, курсовая, реферат или  отчет по учебно-ознакомительная практика   будут готовы к нужному сроку. \r\n \r\n<b>Преимущества  сотрудничества  с нами:</b> \r\n- Автор кандидат наук  \r\n-  Уникальность текста до 90% \r\n-  Прохождение плагиата  \r\n-  Юридический договор \r\n-  Длительная гарантия на услуги  \r\n- Полная анонимность  \r\n-  Бесплатные корректировки \r\n-  Личный менеджер \r\n-  Помощь 7 дней в неделю  \r\n \r\n<b>Кроме этого вы можете заказать работу по любому предмету:</b> \r\n Стохастические методы исследования операций  \r\n технология книгопечатания  \r\n Эксплуатация и режимы работы электрооборудования электростанций  \r\n История живописи  \r\n Базы данных  \r\n Лингвоперсонология  \r\n Архитектура встраиваемых систем  \r\n Система психологической помощи в сфере специального образования  \r\n Системы коммутации  \r\n Социальная сфера  \r\n \r\n<b> Информация для связи с нами: </b> \r\nСайт: <a href=http://stduent-help.com/>stduent-help.com</a> \r\nПочта: zakaz@stduent-help.com \r\n \r\nПишите, звоните в любое время! Мы всегда на связи!', '2020-09-21 20:02:14', '2020-09-21 20:02:14'),
(184, 'Elon Musk shared a new online system for earning! Click here for the full article and free system access!  https://tinyurl.com/y3zehk3t', 'il.av.933.9@gmail.com', '85463482553', NULL, NULL, NULL, 'Re:Вам перевод', 'Elon Musk shared a new online system for earning! Click here for the full article and free system access!  https://tinyurl.com/y3s7n7lf', '2020-09-21 22:57:12', '2020-09-21 22:57:12'),
(185, 'RichardSed', 'nshsgdjd@gmail.com', '84366188984', NULL, NULL, NULL, 'financial trading', 'https://clck.ru/Qc6Y7 \r\n \r\nhttps://goo.su/1ZT2 \r\n \r\nHi! Start trading on the financial trading and investment market !!!', '2020-09-22 04:06:24', '2020-09-22 04:06:24'),
(186, 'videoExcam', 'lumelskiy.leopold@mail.ru', '86386578161', NULL, NULL, NULL, 'Видеонаблюдение в Нижнем Новгороде', 'http://video-nn.ru - Видеонаблюдение в Нижнем Новгороде', '2020-09-22 05:36:16', '2020-09-22 05:36:16'),
(187, 'prasp', 'checy@wrpills.com', '87615293558', NULL, NULL, NULL, NULL, NULL, '2020-09-22 06:27:19', '2020-09-22 06:27:19'),
(188, 'Alfreddix', 'kudriavtsevvladimirres@mail.ru', '85289499323', NULL, NULL, NULL, 'автономное освещение', 'солнечно ветровые светильники 150вт \r\n \r\n<a href=https://глобал-свет.рф>солнечно ветровые светильники</a>', '2020-09-22 10:23:58', '2020-09-22 10:23:58'),
(189, 'Socorroskaph', 'za-splav@yandex.com', '84182176984', NULL, NULL, NULL, 'Структура вышки туры', NULL, '2020-09-22 10:45:14', '2020-09-22 10:45:14'),
(190, 'Eric Jones', 'eric@talkwithwebvisitor.com', '416-385-3200', NULL, NULL, NULL, 'Cool website!', 'Cool website!\r\n\r\nMy name’s Eric, and I just found your site - turvy.net - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – after someone like me stumbles across turvy.net, what usually happens?\r\n\r\nIs your site generating leads for your business? \r\n \r\nI’m guessing some, but I also bet you’d like more… studies show that 7 out 10 who land on a site wind up leaving without a trace.\r\n\r\nNot good.\r\n\r\nHere’s a thought – what if there was an easy way for every visitor to “raise their hand” to get a phone call from you INSTANTLY… the second they hit your site and said, “call me now.”\r\n\r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nThat’s why we built out our new SMS Text With Lead feature… because once you’ve captured the visitor’s phone number, you can automatically start a text message (SMS) conversation.\r\n  \r\nThink about the possibilities – even if you don’t close a deal then and there, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nWouldn’t that be cool?\r\n\r\nCLICK HERE http://www.talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\nEric\r\n\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://www.talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=turvy.net', '2020-09-22 14:45:43', '2020-09-22 14:45:43'),
(191, 'JamesGrile', 'an-dani21@mail.ru', '82856422867', NULL, NULL, NULL, 'тинькофф инвестиции отзывы green ru', 'Здравствуйте дорогие друзья\r\n \r\n \r\nRcaLzmKkbORR7MrZsJubMQ6mmZw3hZddph1NwuuRy6P5E62d1h9oy \r\nОсновными финансовыми посредниками на рынке ценных бумаг являются банки и другие финансово-кредитные учреждения (инвестиционные компании и фонды, страховые и трастовые компании и т.д.).\r\nРожанковский: в Таджикистане начали активно появляться финансовые пирамиды.\r\nОднако большие инвестиционные отделы и квалифицированные кадры имеют только крупные банки, у которых инвестиционные операции занимают большой удельный вес в общем объеме активных операций.\r\nОсновную деятельность по выполнению инвестиционных операций осуществляет инвестиционный отдел.\r\nНедостатком этого метода можно назвать возможность недостоверности прогнозов по процентным ставкам. Однако при наличии точных прогнозов этот метод является более эффективным, чем метод ступенчатой структуры.', '2020-09-22 20:48:47', '2020-09-22 20:48:47'),
(192, 'AlfredSnoni', 'senya.vasin.9292@mail.ru', '85548155829', NULL, NULL, NULL, 'Конвейерное оборудование для бизнеса, это реальность или фейк?', NULL, '2020-09-22 21:58:11', '2020-09-22 21:58:11'),
(193, 'PORNOgov', 'sikasova@mail.ru', '83696444126', NULL, NULL, NULL, 'Новинки Секс Видео Съемка в HD', 'Домашнее секс видео в высоком качестве, зацените бесплатно: https://porno-go.top \r\nСо всего мира порно фильмы без регистрации просмотр на https://porno-go.top/uprugie-siski/1615-porno-s-grudastoy-devushkoy-na-dikom-plyazhe.html в HD720 \r\nГорячее секс съемка без границ просмотр на https://porno-go.top/mezhrassovoe/7651-fotograf-lyubit-trahat-puhlyh-devushek.html в HD1080 \r\nЧувственное секс фильмы без регистрации смотреть на https://porno-go.top/brazzers/8417-macheha-zashla-v-tualet-v-samyy-nepodhodyaschiy-moment.html в HD1080 \r\nБезумное порно съемка для взрослых смотреть на https://porno-go.top/azian/4061-molodaya-aziatka-masturbiruet-konchaya-pered-kameroy.html в высоком качестве \r\nИз домашних архивов порно фильмы для всех онлайн на https://porno-go.top/azian/7066-muzhik-napolnil-spermoy-molodenkuyu-aziatskuyu-shlyushku.html в HD1080 \r\nЖесткое порнушка видео в офигенном качестве, смотрите бесплатно: https://porno-go.ru \r\nБезумное порно ролики бесплатно смотреть на https://porno-go.top/amature/3132-snyal-predvaritelnye-laski-so-svoey-shikarnoy-podruzhkoy-na-skrytuyu-kameru..html в HD1080 \r\nСексуальное порно ролики бесплатно онлайн на https://porno-go.top/hd-porno/4895-grubye-notki-seksa-v-krasivom-porno-s-molodoy-blondinkoy.html в высоком качестве \r\nШикарное порно видео без регистрации просмотр на https://porno-go.top/hd-porno/2826-pomeril-sester-pustiv-v-hod-svoy-tolstyy-chlen..html в высоком качестве \r\nСемейное порно видео бесплатно просмотр на https://porno-go.top/anal/10090-paren-trahaet-v-anal-poslushnuyu-podrugu-s-vklyuchennoy-veb-kameroy.html в HD1080 \r\nНежное секс съемка для взрослых онлайн на https://porno-go.top/amature/1894-derbanit-v-popku-francuzhenku.html в HD1080 \r\nНежное порно ролики без границ просмотр на https://porno-go.top/casting/2299-pronzil-huduyu-milashku-tolstym-chlenom-na-kastinge.html в HD720 \r\nНежное порно съемка бесплатно онлайн на https://porno-go.top/hd-porno/1500-zataschil-moloduyu-v-pereulok-i-trahnul.html в HD1080', '2020-09-22 22:37:29', '2020-09-22 22:37:29'),
(194, 'JesusQueem', 'wso.php@mail.ru', '85555562829', NULL, NULL, NULL, 'Куплю ваш сайт | buy your site! tzox', 'Здравствуйте! Готов купить ваш сайт. Контакты:fantom311090@yandex.ru \r\n_________ \r\nHello! Buy your site. Contacts: fantom311090@yandex.ru', '2020-09-22 23:11:37', '2020-09-22 23:11:37'),
(195, 'LeslieEnsum', 'shizko_test@mail.ru', '84859582769', NULL, NULL, NULL, 'Get best in the world treatment production here', 'Looking forward to joy your girlfriend? It is really hard to keep your charm effective. This shop is here to start a new beginning. Next thing you can do is to click to this website.  https://shoptrustup.su/', '2020-09-23 10:46:45', '2020-09-23 10:46:45'),
(196, 'Normanvok', 'ktpbnvcxxxdcv@gmail.com', '85141316582', NULL, NULL, NULL, 'смотреть фильмы онлайн +в хорошем', NULL, '2020-09-23 13:31:44', '2020-09-23 13:31:44'),
(197, 'Elon Musk  shared the secret of how quickly he got rich during quarantine! Click here for the full article and free system access!  https://tinyurl.com/y4rhza5n', 'ilav.9.3.3.9@gmail.com', '89369491375', NULL, NULL, NULL, 'Re:Вам перевод', 'Elon Musk  shared the secret of how quickly he got rich during quarantine! Click here for the full article and free system access!  https://tinyurl.com/y2nzv38j', '2020-09-23 15:13:28', '2020-09-23 15:13:28'),
(198, 'Darrylaccof', 'luzget56@nextfashion.ro', '87654866832', NULL, NULL, NULL, 'Change all of your browser fingerprinting with Antidetect Software', 'Antidetect browser is a software with unique methods that change fingerprints in a natural way and remain undetectable to online tracking services. Easily bypass fingerprinting and skip over sms verification from major big data companies like Google, Facebook, Twitter, Amazon, etc. \r\n \r\nCreate unlimited browser configurations. Each new browser will have non-unique Canvas prints, WebGL, fonts, etc. \r\n \r\nhttps://www.nofingerprinting.com - Download here Because Privacy Matters. Now for a limited time with 10% discount, available only on Nofingerprinting.com. (Use Discount code/Couponon code: 10324O7UFBEKQ24E to get 10% discount for Ivanovation.com)', '2020-09-23 18:37:06', '2020-09-23 18:37:06');
INSERT INTO `feedback` (`id`, `name`, `email`, `mobile`, `partner_id`, `driver_id`, `rider_id`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(199, 'ShaneRob', 'uhbtrpza9ff@gmail.com', '88386143532', NULL, NULL, NULL, 'low-cost nfl jerseys from china with high-pitched hauteur subcontract out nutty shipping', 'Restricted factoring can be a <a href=http://www.kpsearch.com/cheapnikenfljerseys.html>cheap jerseys from china</a>  entertain to today. In the simplification of the virgin rates associated with laptop tackle and also printer directions materials, nfl established save. pick up nfl jerseys affordable on the web. on the other help, nfl jerseys to effect on on grown-up females. nike 2013 nfl uniforms. affordable from suppliers palpable nfl jerseys. reducing espenses charges and also sustaining an admissible trustworthiness nomination spending budget may be complex. Pcs underestimate on slight, nfl spitting metaphor jerseys. most budget-priced nfl jerseys. most of nfl jerseys. seeing that brighten rancid peripherals including laser printers. Furthermore, nfl jerseys mournful cost. disencumber of affect nfl jerseys on the web. replenishing associated with consumable materials including pieces of certificate and also printer guide tubes are for the most interest critical expenditures every single topic branch should reside having. \r\n \r\nClients the phone utilizing all <a href=http://www.kpsearch.com/cheapnikenfljerseys.html>cheap jerseys from china</a>  of the models this garments typewrite supplies. If you are a basic lover associated with put together ingenuity, affordable nfl jerseys handy china and taiwan nike. when may i acquire affordable nfl jerseys on the web. affordable from suppliers nfl jerseys by means of china and taiwan. then you unequivocally is accepted to be agonized on the heroes investment belly garments in conjunction with masculine difference of colours including seeing that red-colored, nfl jerseys affordable jerseys. when to obtain affordable nfl jerseys. affordable nike nfl genuine jerseys. hat nfl. accidental the android the dogs, right nfl hat. affordable ladies nfl jerseys china and taiwan. nike legal nfl hat. charcoal and also natural. All these colors divulge you a hard substructure all in all the correctly designed report within the tank top. \r\n \r\nWith the amount of <a href=http://www.kpsearch.com/cheapnikenfljerseys.html>Wholesale nfl jerseys</a>  alternatives associated with readies pieces to delay the woman\'s obtainable exclusively on on the springe retailers, nfl outfits to converge matured men. affordable authentic nfl jerseys china and taiwan. you may be a enterprise engaging a wonderful treasure. Unite make up of you can\'t model a gargantuan perspicacity, nfl jerseys to don affordable. affordable unsmiling nfl jerseys. nfl 2013 jerseys. effectively because on the web retailers have got most fashionable series associated with lots of thrill objects that were purchased as a antidote for you to consumers on discerning rates. Becomingly, real overwhelm nfl jerseys in china and taiwan. nfl tshirts. nike nfl jerseys china and taiwan paypal. while you handle issues in every directorship picking items, mint nfl jerseys nike. from suppliers nike nfl jerseys china and taiwan. you pass on need to erect a look at a few online retailers to notice the mannered judgements. In realistic factors your spouse exceptional alms is unmistakably hence fault-finding and also outlandish in your invalid what is the greatest you are masterly to guide a living person\'s lift reactions looking at your spouse to create the companion\'s more happy. \r\n \r\nSeeing that <a href=http://www.kpsearch.com/cheapnikenfljerseys.html>cheap nfl jerseys from china</a>  Unsmiling The fatherland (microblogging) gamed within the Winners Puckish in accord with, affordable nfl toy ones jerseys. as a result the pact may be being subtracted from Croatia, nfl jerseys to have in temper affordable. because bust Zhezhi followers, nfl squads jerseys. Do a moonlight skim to the fore of the utilization to their lonely acquired fulfilled having C-, nfl ladies jerseys affordable. anyhow captivating the look of them tour of duty start with his or her hundred m finalized, nfl nike jerseys stitched. although finally non-connected. from suppliers nfl jerseys On the other portion hand, nfl hat to fall ill pygmy ones. D Roth Italian valuables addicted over the extent of you to Eminent The inherent dirt us president Florentino squad other half Poop gone a recent authorized in toto completely identify on the tank ascend, nfl nfl. that creates Dwyane Talk as a help to the termination on the unusual species referred to as twice delight. Swindle a run-out pulverize jointly into the episode to come by the most correct The state jest has been as jet reverend associated with pr Butragueno, legitimate nike nfl jerseys from suppliers. \r\n<a href=http://www.kpsearch.com/cheapnikenfljerseys.html>cheap nike nfl jerseys</a>\r\n<a href=http://www.kpsearch.com/cheapnikenfljerseys.html>cheap nfl jerseys from china</a>\r\n<a href=http://www.kpsearch.com/cheapnikenfljerseys.html>cheap jerseys from china</a>\r\n<a href=http://www.kpsearch.com/cheapnikenfljerseys.html>cheap nfl jerseys china</a>\r\n<a href=http://www.kpsearch.com/cheapnikenfljerseys.html>Wholesale nfl jerseys</a>', '2020-09-23 19:56:07', '2020-09-23 19:56:07'),
(200, 'RaymondDAM', 'em7evg@gmail.com', '83363884959', NULL, NULL, NULL, 'News 2020', '<a href=https://crowd1.com/signup/evg7773>A new company in which over half a year more than 11 million people have registered. Profit comes from the shares of the world\'s largest gaming channels. Passive and active income</a>', '2020-09-24 14:10:26', '2020-09-24 14:10:26'),
(201, 'StephenNit', 'em7evg@gmail.com', '85816497978', NULL, NULL, NULL, 'Реклама и продажи в Pinterest', '<a href=http://1541.ru/cms/reklama.php>Живу в интернет рекламе с 1993 г. Реклама в Adwords, Яндекс Директ, YouTube, Facebook, instagram - Отстой на 99,9%. Pinterest - это СЕРЬЕЗНО для реальных продаж в Etsy, amazon, ebay, shopify и т.д. Цена 500 usd за месяц</a>', '2020-09-24 14:10:28', '2020-09-24 14:10:28'),
(202, 'Mike Archibald', 'no-replyCow@google.com', '84487768214', NULL, NULL, NULL, 'New: DA50 for turvy.net', 'Hi there \r\n \r\nIf you want to get ahead of your competition, have a higher Domain Authority score. Its just simple as that. \r\nWith our service you get Domain Authority above 50 points in just 30 days. \r\n \r\nThis service is guaranteed \r\n \r\nFor more information, check our service here \r\nhttps://www.monkeydigital.co/Get-Guaranteed-Domain-Authority-50/ \r\n \r\nN E W : \r\nDA60 is now available here \r\nhttps://www.monkeydigital.co/product/moz-da60-seo-plan/ \r\n \r\n \r\nthank you \r\nMike Archibald\r\n \r\nMonkey Digital \r\nsupport@monkeydigital.co', '2020-09-24 17:01:35', '2020-09-24 17:01:35'),
(203, 'Larrybor', 'em7evg@gmail.com', '89545237715', NULL, NULL, NULL, 'Watch movies online in good quality', 'Самые свежие новинки кино в хорошем качестве смотри на http://filmozavr.com Watch the latest movies in good quality on http://filmozavr.com', '2020-09-24 20:01:41', '2020-09-24 20:01:41'),
(204, 'Michael Reesin', 'help@reesin.com', '83198893657', NULL, NULL, NULL, 'How To Get More Valuable Leads Without Paid Ads', 'Hi! I\'m Michael, founder of Dynamic Enterprise AG. I use my connections, special deals, and strategies with major media sites to help businesses like yours get seen and get new clients in less stressful yet highly profitable way. \r\n- Get Sales Meetings With Your Ideal Customers \r\n- Increase Your Exposure \r\n- Be Seen Everywhere \r\n- Become The Authority \r\n=> Watch this FREE video to see how you can get all this done for you! \r\nhttps://dynamicenterprise.clientcabin.com/watch/ \r\nThanks \r\nMichael \r\nEmail: micha@reesin.com \r\nhttp://www.reesin.com/ \r\nhttp://www.linkedin.com/in/michael-hehn-5735341a6/', '2020-09-24 20:26:31', '2020-09-24 20:26:31'),
(205, 'Williamtax', 'ziminviacheslavean@mail.ru', '89528973756', NULL, NULL, NULL, 'успех', 'покупка акция лукойл \r\n \r\n<a href=https://www.piter.com/product/investitsiya-na-milliard-kak-uvelichit-pribyl-sokratit-rashody-i-obygrat-uorrena-baffeta>покупка акция Microsoft физическому</a>', '2020-09-24 20:29:01', '2020-09-24 20:29:01'),
(206, 'JamesBag', 'semenovdeniscju@mail.ru', '88687799548', NULL, NULL, NULL, 'сухая стяжка в самаре', 'сухой пол кнауф в самаре \r\n \r\n<a href=https://masterpol63.ru/>сухая стяжка пола в самаре</a>', '2020-09-24 23:53:38', '2020-09-24 23:53:38'),
(207, 'AllenNit', 'rishat.petrov.93@mail.ru', '83331341923', NULL, NULL, NULL, 'куда инвестировать', 'вложение доход \r\n \r\n<a href=https://www.piter.com/product/investitsiya-na-milliard-kak-uvelichit-pribyl-sokratit-rashody-i-obygrat-uorrena-baffeta>покупка акция FB физическому</a>', '2020-09-25 05:36:01', '2020-09-25 05:36:01'),
(208, 'MaryJlag', 'krisburns38399-mail2@yahoo.com', '85495922439', NULL, NULL, NULL, 'Being gay in the 70вЂ™s, 80вЂ™s and even 90вЂ™s was not as acceptable as now.', 'Fort myers gay dating - Find single woman in the US with relations. Casually Chic Speed Dating & Personalized Matchmaking in Los Angeles, California. So youвЂ™re tired of sitting around watching MTVвЂ™s Teen Wolf.  https://searchya.info  The Biggest and Best Horny Gays hardcore site. Whether you\'re looking for dating, love or even just friendship, try somewhere that puts some method into the madness. Best Twink Buddies Help Each Other Out -  Views - p. XVIDEOS Irish gay porn movie and clips xxx Bryce & Shane free.', '2020-09-25 06:14:50', '2020-09-25 06:14:50'),
(209, 'Davianofe', 'bonuscasinolive@gmail.com', '89931949187', NULL, NULL, NULL, 'Как семья? - реальный заработок в интернете с выводом денег', NULL, '2020-09-25 08:39:13', '2020-09-25 08:39:13'),
(210, 'Josephjable', 'bakhtiyar.usov.93@mail.ru', '83413953541', NULL, NULL, NULL, 'куда вкладывать деньги', 'куда вкладывать деньги \r\n \r\n<a href=https://www.piter.com/product/investitsiya-na-milliard-kak-uvelichit-pribyl-sokratit-rashody-i-obygrat-uorrena-baffeta>Инвестициянамиллиард</a>', '2020-09-25 08:41:10', '2020-09-25 08:41:10'),
(211, 'Ronaldvialk', 'barbashovarleit5706@bk.ru', '89632929617', NULL, NULL, NULL, '[url=https://eremolanzara.eu/17353-kvinne-kryssord-wegedowed.php]vakker synonym[/url]', NULL, '2020-09-25 10:39:50', '2020-09-25 10:39:50'),
(212, 'Thomashek', 'sir.maxbo@ya.ru', '82932691849', NULL, NULL, NULL, 'Калибровка прошивок ЭБУ на заказ', 'Наш Калибровщик прошивок ЭБУ \r\n \r\nvk.com/autokursynew \r\n \r\nвыполнит для вас работы по калибровке прошивок автомобилей различных марок, доступно для заказа удаление таких систем как \r\nIMMOoff \r\nDPF \r\nEGR \r\nVSA \r\nTVA \r\nAdBlue \r\nSCR \r\nValvematic \r\nи других систем \r\nтак же доступен тюнинг \r\nSTAGE1 \r\nSTAGE2 \r\nETBIR(POPCORN) \r\nзаказ калибровки прошивки производится через email \r\nmax.autoteams@ya.ru \r\n+7 (902) 010-91-50 \r\nтелеграмм @ECUtun \r\nгруппа в телеграмме https://t.me/chiptuningecu', '2020-09-26 00:48:21', '2020-09-26 00:48:21'),
(213, 'MerillRug', 'h.ent.ai.w.o.r.ld.p.ict.ure.s5@gdemoy.site', '85747724949', NULL, NULL, NULL, 'Детоксикация от алкоголя в наркологической клинике Вывод24', NULL, '2020-09-26 02:05:15', '2020-09-26 02:05:15'),
(214, 'Carolynlucky', 'carolyn77@bk.ru', '84522113513', NULL, NULL, NULL, 'Looking for sex', 'Real Sex Model Meet Rich Daddy! \r\nFor sexual pleasures in real life! \r\nPaid! \r\nFreebies fuck! \r\nhttps://cutt.us/real-model \r\n<a href=https://cutt.us/real-model><img src=\"http://skype.miss-bdsm.mcdir.ru/models/33.jpg\"></a>', '2020-09-26 03:38:30', '2020-09-26 03:38:30'),
(215, 'Alexanderdub', 'yanafilko148@gmail.com', '84758574414', NULL, NULL, NULL, 'Курилка', NULL, '2020-09-26 10:54:31', '2020-09-26 10:54:31'),
(216, 'RaymondDAM', 'em7evg@gmail.com', '89362645553', NULL, NULL, NULL, 'News 2020', 'Примеры продаж на Etsy через Pinterest https://youtu.be/qg-3C_7W1kM после ужасающего падения количества посетителей в месяц', '2020-09-26 11:29:32', '2020-09-26 11:29:32'),
(217, 'StephenNit', 'em7evg@gmail.com', '88783582186', NULL, NULL, NULL, 'Реклама и продажи в Pinterest', 'Примеры продаж на Etsy через Pinterest https://youtu.be/qg-3C_7W1kM после ужасающего падения количества посетителей в месяц', '2020-09-26 11:29:33', '2020-09-26 11:29:33'),
(218, 'СайтвГугл', 'volodaputin28@gmail.com', '87755283783', NULL, NULL, NULL, 'Ваш сайт в Гугл поиске', 'Настроим рекламу в поисковиках Яндекс и Гугл по нужным Вам запросам. Подстроимся под Ваш бюджет. Антикризисные цены. Бесплатная консультация. Подробнее:https://simplesales.top/ Почта:simplesales@inbox.ru. Спасибо за внимание и успехов Вашему бизнесу!', '2020-09-26 12:19:17', '2020-09-26 12:19:17'),
(219, 'Jimmyknism', 'no-replyfoum@gmail.com', '88675183516', NULL, NULL, NULL, 'Delivery of your email messages.', 'Hеllо!  turvy.net \r\n \r\nDid yоu knоw thаt it is pоssiblе tо sеnd businеss prоpоsаl fully lеgаlly? \r\nWе оffеring а nеw lеgаl wаy оf sеnding аppеаl thrоugh fееdbасk fоrms. Suсh fоrms аrе lосаtеd оn mаny sitеs. \r\nWhеn suсh businеss prоpоsаls аrе sеnt, nо pеrsоnаl dаtа is usеd, аnd mеssаgеs аrе sеnt tо fоrms spесifiсаlly dеsignеd tо rесеivе mеssаgеs аnd аppеаls. \r\nаlsо, mеssаgеs sеnt thrоugh соmmuniсаtiоn Fоrms dо nоt gеt intо spаm bесаusе suсh mеssаgеs аrе соnsidеrеd impоrtаnt. \r\nWе оffеr yоu tо tеst оur sеrviсе fоr frее. Wе will sеnd up tо 50,000 mеssаgеs fоr yоu. \r\nThе соst оf sеnding оnе milliоn mеssаgеs is 49 USD. \r\n \r\nThis mеssаgе is сrеаtеd аutоmаtiсаlly. Plеаsе usе thе соntасt dеtаils bеlоw tо соntасt us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693', '2020-09-26 15:20:12', '2020-09-26 15:20:12'),
(220, 'lasifurextes', 'landquaconvires@gmx.com', '85455916725', NULL, NULL, NULL, 'where to purchase lasix in Albuquerque', '<a href=http://lasifurex.com/>how to buy lasix in Cleveland </a> <a href=\"http://lasifurex.com/\">cheap lasix in Philadelphia </a>', '2020-09-26 16:10:23', '2020-09-26 16:10:23'),
(221, 'Larrybor', 'em7evg@gmail.com', '88482163257', NULL, NULL, NULL, 'Watch movies online in good quality', 'Смотрите онлайн фильмы хорошего качества в приятной обстановке и в удобное для вас время на http://filmozavr.com  Watch movies online in good quality, in a pleasant environment, and at any time on http://filmozavr.com', '2020-09-26 16:32:25', '2020-09-26 16:32:25'),
(222, 'JacobBycle', 'vargurtov@yandex.ru', '89363765216', NULL, NULL, NULL, 'Helping The others Realize The Advantages Of knife life', 'However, you’ll choose to purchase the Damascus steel knives which can be of the higher degree of top quality, and never knives which might be marketed as Damascus steel knives but are The truth is, not Damascus steel, but They simply appear like it. \r\n \r\nDamascus steel is characterized by Remarkable hardness and by a watered, streaked look due to the varying carbon amounts of the initial material. From time to time only one bar is welded up from a variety of varieties of steel. The bar is doubled about, welded, redoubled, and rewelded till the assorted layers of steel grow to be intertwined, and it can be then labored out to sort the blade. \r\n \r\nWhat adopted was a century of darkness for Damascus steel. Swords and knives from this steel became anything of the myth – extremely unusual and hard to find. But in the next half of the 20th century, there was a resurgence in level of popularity of Damascus steel. \r\n \r\nLooking damascus steel knives handmade with a wood background, shut-up. Hunting damascus steel knives handmade on the brown wood track record, closeup \r\n \r\nThe Arabs effectively imported the wootz ingots for centuries. Even so, as borders altered, wars ravaged and wootz reserves ran dry, the entire world began to reduce contact With all the masters of this unparalleled steel. \r\n<a href=https://www.kickstarter.com/projects/ferroknifeart/my-friend-hand-forged-damascus-knife-for-everyday-carry?ref=creator_nav>every day carry knives</a> \r\nAs an apart for those gory historical past buffs in existence, the “quenching” or cooling method for ancient Damascus steel blades is fodder for tall tales. Legend has it the quenching approach is in which the blades derived their magical strength. \r\n \r\nThe addition of manganese to VG10 generates a darker color steel, when the inclusion of nickel in VG2 presents a shiny silver tone.  \r\n \r\nThe billet is once more heated and manipulated by folding it, bending it, twisting it, or chopping and restacking it. The creativity while in the manipulation could be the artistry of the process and is restricted only by the imagination of your blacksmith. \r\n \r\nHaving said that, the reality is that many smiths and sellers will offer you Damascus steel of inferior high quality. In These instances, the quantity of levels is reduced, and the price is additionally lower, commonly. And they offer their blades as Damascus steel blades purely due to way it seems. \r\n \r\nLike just about anything, a person has to be mindful (because of-diligence) of what they’re spending their revenue on. A little bit of study will reveal The nice decisions among the negative… \r\n \r\nThe end result can be a extremely reputable Damascus Steel with repeatable and predictable patterns and Homes. \r\n \r\nEven though the steel may are already made in Damascus eventually as well as the sample does fairly resemble damask, It is undoubtedly legitimate Damascus steel grew to become a favorite trade item for town. \r\n \r\nBut most of all, the crucible system offered a means to insert significant carbon written content in a controlled method. Large carbon provides the eager edge and sturdiness, but its existence while in the mixture is almost impossible to regulate. Also very little carbon and also the ensuing things is wrought iron, also tender for these purposes; excessive and you get cast iron, too brittle. \r\n \r\nAs we outlined our custom blade directive in AppServiceProvider which can be Alright, but I will suggest to create a new assistance company on your all custom blade directives and take a look at to stop everything within the AppServiceProvider.', '2020-09-26 22:05:26', '2020-09-26 22:05:26'),
(223, 'Gladysbaree', 'odexbpzl@eagleandtails.com', '89736565591', NULL, NULL, NULL, 'online virtual gambling', 'online gambling sites usa \r\nonline casinos die besten <a href=https://japonlinecasinoslots.com/>gambling</a> casino gamblings internet <a href=\"https://japonlinecasinoslots.com/\">roulette</a> legal us gambling sites \r\nreal money gambling', '2020-09-26 22:59:53', '2020-09-26 22:59:53'),
(224, 'Sol Mulgrave', 'mulgrave.sol@gmail.com', '72 672 20 82', NULL, NULL, NULL, 'COVID-1984: The Scamdemic That Is Being Used to Destroy Your Livelihood and Business', 'This Google doc exposes how this scamdemic is part of a bigger plan to crush your business and keep it closed or semi-operational (with heavy rescritions) while big corporations remain open without consequences. This Covid lie has ruined many peoples lives and businesses and is all done on purpose to bring about the One World Order. It goes much deeper than this but the purpose of this doc is to expose the evil and wickedness that works in the background to ruin peoples lives. So feel free to share this message with friends and family. No need to reply to the email i provided above as its not registered. But this information will tell you everything you need to know. https://docs.google.com/document/d/1ogQqKrmP0Dzga6xvMp5zA6n-WLKx0mp-laETDTVe4Dw/edit', '2020-09-27 02:30:33', '2020-09-27 02:30:33'),
(225, 'DianeTup', 'v.adi.m.dmk.o23@gmail.com', '81131145992', NULL, NULL, NULL, 'FH', 'Классические, модифицированные и необычные… Собраны с*ксуальные позиции, которые приносят удовольствие каждому из партнёров и не требуют особых акробатических навыков. Читать ещё https://female-happiness.com/seks/18/11948-pozy-kotorye-nravyatsya-muzhchinam-opisanie-harakteristiki-lichnye-predpochteniya-i-nyuansy-v-otnosheniyah.html', '2020-09-27 04:15:27', '2020-09-27 04:15:27'),
(226, 'Edwardbrano', 'em7evg@gmail.com', '83774147284', NULL, NULL, NULL, 'Work at home. Зарабатывай дома', 'На сайте http://viagrushka.com.ua можно заказать и купить оригинальную Виагру (Viagra Pfizer) по Киеву и по всей Украине. Для продления интимного акта есть Poxet (Дапоксетин). Также есть и другие возбудители для секса, такие как Левитра (Levitra), Сиалис (Cialis). Дженерики Варденафил. Силденафил. Тадалафил', '2020-09-27 05:31:40', '2020-09-27 05:31:40'),
(227, 'Rebeccaatore', 'zasplav2015@mail.ru', '85688296472', NULL, NULL, NULL, 'Комплектующие и сборка вышек финал', NULL, '2020-09-27 20:18:23', '2020-09-27 20:18:23'),
(228, 'Dimabew', 'pryamitsinatomila@yandex.ru', '83295498457', NULL, NULL, NULL, 'ТУРНИРЫ И ЛОТЕРЕИ ОТ SOL CASINO', NULL, '2020-09-28 09:11:13', '2020-09-28 09:11:13'),
(229, 'BennyNop', 'evseevslavatieg@mail.ru', '83548888141', NULL, NULL, NULL, 'интернет магазин в Узбекистане', 'товары и услуги он лайн в узбекистане \r\n \r\n<a href=https://tovar.uz/>строительные материалы в ташкенте</a>', '2020-09-28 17:51:13', '2020-09-28 17:51:13'),
(230, 'Michaelmug', 'tomilovdimabufm@mail.ru', '84444858247', NULL, NULL, NULL, 'гидра сайт анонимных покупок', 'гидра сайт анонимных покупок \r\n \r\nПривет, вот ссылка <a href=https://hydraxmarket.com>hydra onion закладки</a> -  это гидра сайт официальный.', '2020-09-28 23:13:56', '2020-09-28 23:13:56'),
(231, 'JerryTob', 'arrowhead091@yandex.ru', '84286851463', NULL, NULL, NULL, 'Watch free videos 18+', 'About 500 to 1000 adult videos are uploaded each day! - https://videos-for-jerking.me \r\n<a href=https://videos-for-jerking.me>Watch now on</a> videos-for-jerking.me', '2020-09-29 08:21:35', '2020-09-29 08:21:35'),
(232, 'Chesterpousa', 'damir.markelov.89@mail.ru', '82526348829', NULL, NULL, NULL, 'купить подоконник данке в спб', 'подоконник данке купить \r\n \r\n<a href=https://sill.store>меллер подоконники купить</a>', '2020-09-29 08:23:00', '2020-09-29 08:23:00'),
(233, 'Georgehoubs', 'ibragimovarturmquq@mail.ru', '83731622132', NULL, NULL, NULL, 'ОФОРМЛЕНИЕ И ПОЛУЧЕНИЕ ДОКУМЕНТОВ ДЛЯ ПРИОБРЕТЕНИЯ ГРАЖДАНСТВА УКРАИНЫ', 'ПРИАЗОВСЬКИЙ РАЙОННИЙ СУД ЗАПОРІЗЬКОЇ ОБЛАСТІ \r\n \r\nЛучшие адвокаты. Юридические консультации по телефону бесплатно.  Все виды юридических услуг. Более детально на сатйе: \r\n \r\n \r\n<a href=https://www.google.com/maps/place//data=!4m2!3m1!1s0x40dc60b32886c549:0xd82fcbefa1742bc6?source=g.page.share>юристы в Днепропетровске </a>', '2020-09-29 19:18:24', '2020-09-29 19:18:24'),
(234, 'Sergeytreal', 'se.rge.ynovikov.20.197.7@gmail.com', '83883448198', NULL, NULL, NULL, 'Регистрация', NULL, '2020-09-30 02:11:21', '2020-09-30 02:11:21'),
(235, 'Davidscaks', 'li_nagibi7@mail.ru', '86234787426', NULL, NULL, NULL, 'как правильно пить сода для похудения', NULL, '2020-10-01 06:54:53', '2020-10-01 06:54:53'),
(236, 'BryanDuedy', 'krasnovdenismlwx@mail.ru', '87152722757', NULL, NULL, NULL, 'igor strehl', 'igor strehl \r\n \r\n<a href=http://www.talk-finance.co.uk/international/igor-strehl-andrey-kochetkov-defrauded-austria/>igor strehl</a>', '2020-10-01 09:15:48', '2020-10-01 09:15:48'),
(237, 'Elon Musk  shared the secret of how quickly he got rich during quarantine! Click here for the full article and free system access!  https://tinyurl.com/ya7z46z9', 'al.ek.se.j.l.i.zk.o.@gmail.com', '84546595625', NULL, NULL, NULL, 'Re:Вам перевод', 'On This Morning, Elon Musk  shared the secret of how quickly he got rich  while coronavirus is raging all over the world! \r\nHe already shared this news on social networks and those who believed and tried the platform started writing letters to him. Click here for the full article and free system access!  https://tinyurl.com/ybgonr3x', '2020-10-01 16:11:00', '2020-10-01 16:11:00'),
(238, 'Olen Hopwood', 'hopwood.olen@gmail.com', '(02) 4935 3603', NULL, NULL, NULL, NULL, 'Want completely free advertising for your website? Take a look at this: http://bit.ly/post-free-ads-here', '2020-10-01 16:23:25', '2020-10-01 16:23:25'),
(239, 'Georgealgox', 'dgeni87s@nextfashion.ro', '83588629432', NULL, NULL, NULL, 'HUSQVARNA AUTOMOWER® 450X - Best Luxury Robotic Lawn Mower 2020', 'https://www.dealsinelectronics.com/ - The Husqvarna Automower 450X - Top of the range model in the X-line series from the world leaders in robotic mowing. Smart enough to negotiate the challenges of large and complex lawns – like multiple narrow passages, obstacles, tough terrain and slopes up to 45%. GPS-assisted navigation and a host of features including Automower® Connect make it the intelligent way to keep your lawn green, healthy and perfectly mowed. Is a robot mower designed for medium to large lawns of up to 5,000m² in size. It can handles slopes up to 45%, has built in GPS and mobile phone connectivity. \r\n \r\nGet the best looking lawn on the street in no time when you use the https://www.dealsinelectronics.com/ - Husqvarna 450X Automower Lawnmower! \r\n \r\nThis intelligent device has a set it and forget it operation. The 450X Automower automatically navigates through your yard with ease. It avoids obstacles and cuts your grass to the ideal height. It can also handle narrow passages and tough terrain. \r\n \r\nhttps://www.dealsinelectronics.com/ -  Buy Now Husqvarna Automower 450X  WINNER - \"Best Luxury Robotic Lawn Mower 2020\" available only on DealsInElectronics.com.', '2020-10-02 00:02:28', '2020-10-02 00:02:28'),
(240, 'Georgetwest', 'kulikovaleksandrtwjh@mail.ru', '88479576825', NULL, NULL, NULL, 'Отзывы компания ООО ИКЦ «ПРОГРЕС» ИНН 5903997924', 'Компания ООО ИКЦ «ПРОГРЕС» ИНН 5903997924 построена за счет обмана людей, не качественной работе и вообще подходят ко всему формально. Собственник гражданин РФ Беринцев Михаил Викторович. Увидите объявление где адрес 614068, Пермский край, город Пермь, улица Ленина, дом 89 и/или номер телефона +7 (342) 202-59-49 бегите. \r\nРуководитель Органа по Сертификации: Шостак Максим Сергеевич г. Пермь, ул.Пушкина, дом №1/1. \r\nТСЖ и управляющие компании, не дайте себя обмануть!', '2020-10-02 04:05:00', '2020-10-02 04:05:00'),
(241, 'Vodasmoth', 'starovojtovgeorgij8383@mail.ru', '87424728183', NULL, NULL, NULL, 'Доставка воды на дом', 'Мы развозим питьевую воду как частным, так и юридическим лицам. Наша транспортная служба осуществляет доставку питьевой воды на следующий день после заказа. 	 \r\n \r\n<a href=http://voda-nn.ru>чехол на бутылку 19 литров в нижнем новгороде</a>        \r\nСрочная доставка в день заказа доступна для владельцев клубных карт. Доставка воды происходит во все районы Нижнего Новгорода, в верхнюю и нижнюю части города: <a href=http://voda-nn.ru>voda-nn.ru</a>', '2020-10-02 12:10:51', '2020-10-02 12:10:51'),
(242, 'Hydra#[Erdcocyrepydubow,2,5]', 'arkasha00.9ma@gmail.com', '88389291322', NULL, NULL, NULL, 'Гидра', '<a href=https://www-hydra2wed.com>hydra web</a>', '2020-10-02 15:34:06', '2020-10-02 15:34:06'),
(243, 'Hydra-off-bef', 'arkasha009m.a@gmail.com', '82762166418', NULL, NULL, NULL, 'hydra 2 web', '<a href=https://hydrarmzxpnew4af.com>hydraruzxpnew4af</a>', '2020-10-02 15:34:07', '2020-10-02 15:34:07'),
(244, 'DiksFus', 'fah.igor@yandex.ru', '83333925998', NULL, NULL, NULL, 'Новый рейтинг казино New online casino rating', 'https://jakjon.com/\r\n \r\nНовый рейтинг казино онлайн с быстрой моментальной выплатой и супер большой отдачей. \r\nhttps://jakjon.com/\r\n \r\nNew online casino rating with fast instant payouts and super big returns.', '2020-10-03 21:16:02', '2020-10-03 21:16:02'),
(245, 'Billypoulp', 'valievaleksandrwmmd@mail.ru', '86134816436', NULL, NULL, NULL, 'Отзывы компания ООО ИКЦ «ПРОГРЕС» ИНН 5903997924', 'Компания ООО ИКЦ «ПРОГРЕС» ИНН 5903997924 построена за счет обмана людей, не качественной работе и вообще подходят ко всему формально. Собственник гражданин РФ Беринцев Михаил Викторович. Увидите объявление где адрес 614068, Пермский край, город Пермь, улица Ленина, дом 89 и/или номер телефона +7 (342) 202-59-49 бегите. \r\nРуководитель Органа по Сертификации: Шостак Максим Сергеевич г. Пермь, ул.Пушкина, дом №1/1. \r\nТСЖ и управляющие компании, не дайте себя обмануть!', '2020-10-03 22:06:36', '2020-10-03 22:06:36'),
(246, 'Williamhep', 'truealemtrue@gmail.com', '85115918923', NULL, NULL, NULL, 'https://www.alemprint.ru/', 'https://www.alemprint.ru/uslugi/shirokoformatnaya-pechat \r\nhttp://www.grandprint.su http://www.grandprint.su \r\nhttps://www.alemprint.ru/uslugi/pechat-bannerov \r\nhttps://www.alemprint.ru/uslugi/pechat-na-plenke \r\nhttps://www.alemprint.ru/uslugi/pechat-na-oboyah \r\nhttps://www.alemprint.ru/uslugi/shirokoformatnaya-pechat \r\nhttps://www.alemprint.ru/uslugi/pechat-bannerov \r\nhttps://www.alemprint.ru/uslugi/press-wall \r\nhttps://www.alemprint.ru/uslugi/pechat-na-setke', '2020-10-03 23:05:03', '2020-10-03 23:05:03'),
(247, 'Richardcheah', 'buchanan-1978@bk.ru', '87255434399', NULL, NULL, NULL, 'Мобильный шиномонтаж', '<a href=\"https://notifyturkey63.doodlekit.com/blog/entry/10718876/vulcanizare-mobila-in-chisinau\">https://shinomontaj.md/ro/</a>', '2020-10-04 00:23:01', '2020-10-04 00:23:01'),
(248, 'Marquisecori', 'info@deoleodigitalpublishing.com', '86423556711', NULL, NULL, NULL, 'ARE YOU WINING IN THIS  COVID-19 NEW ECONOMY?', 'HAVE YOU EVER WANTED TO LEARN HOW TO CLOSE 100% OF YOUR CONSULTATIONS & HELP YOUR COMPANY  WIN IN OUR NEW  COVID-19  ECONOMY? \r\n \r\nSEE THE OFFICIAL TRAILER:@ \r\nThe Author site https://www.tonydeoleo.com \r\n \r\n \r\nDownload your E-book Copy Now @ The Author official site: \r\nhttps://www.tonydeoleo.com \r\nAmazon : https://www.amazon.com/dp/195226359X \r\nBarns&Nobles : https://m.barnesandnoble.com/w/closing-100-of-your-fitness-consultations-tony-deoleo/1137240205', '2020-10-04 05:09:09', '2020-10-04 05:09:09'),
(249, 'Aculp', 'naomisholtz7@gmail.com', '86664787756', NULL, NULL, NULL, 'נערות ליווי', 'What a nice comment that makes a lot of sense. I am very interested in this topic and glad to find some information about it here. \r\nIn this website there is also a lot of interesting and useful information: \r\n \r\n<a href=https://www.allstarpca.com/blog/2018/12/31/Changes.aspx>דירות דיסקרטיות בתל אביב</a>', '2020-10-04 05:32:24', '2020-10-04 05:32:24');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `mobile`, `verification_code`, `email_verified_at`, `mobile_verified_at`, `password`, `otp`, `first_name`, `last_name`, `gender`, `avatar`, `partner_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(177, 'justin@millas.com.au', '+61421567346', '8c6ff319f29fd8c17ce32ebdfffa4', '2021-02-19 01:57:21', '2021-02-19 01:56:18', '$2y$10$BfWPGoSyqE.2wEDWR2uKVuDOkYHU8u5s4Yf3OEHZbNydzW1Dlcp3u', NULL, 'John', 'Doe', 1, NULL, 10, 0, NULL, '2021-02-19 01:56:18', '2021-02-19 01:57:21');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

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
