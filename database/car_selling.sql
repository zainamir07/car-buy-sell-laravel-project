-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 01:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_selling`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', 1, '2022-12-20 14:11:17', '2022-12-20 14:11:59'),
(2, 'Honda', 1, '2022-12-20 14:15:38', '2022-12-20 14:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `car_features`
--

CREATE TABLE `car_features` (
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `feature_list_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abs` tinyint(1) DEFAULT NULL,
  `airBags` tinyint(1) DEFAULT NULL,
  `airConditioning` tinyint(1) DEFAULT NULL,
  `alloyRims` tinyint(1) DEFAULT NULL,
  `fmRadio` tinyint(1) DEFAULT NULL,
  `cdPlayer` tinyint(1) DEFAULT NULL,
  `cassettePlayer` tinyint(1) DEFAULT NULL,
  `coolBox` tinyint(1) DEFAULT NULL,
  `cruiseControl` tinyint(1) DEFAULT NULL,
  `climateControl` tinyint(1) DEFAULT NULL,
  `dvdPlayer` tinyint(1) DEFAULT NULL,
  `frontSpeakers` tinyint(1) DEFAULT NULL,
  `frontCamera` tinyint(1) DEFAULT NULL,
  `heatedSeats` tinyint(1) DEFAULT NULL,
  `immobilizerKey` tinyint(1) DEFAULT NULL,
  `keylessEntry` tinyint(1) DEFAULT NULL,
  `navigationSystem` tinyint(1) DEFAULT NULL,
  `powerLocks` tinyint(1) DEFAULT NULL,
  `powerMirrors` tinyint(1) DEFAULT NULL,
  `powerSteering` tinyint(1) DEFAULT NULL,
  `powerWindows` tinyint(1) DEFAULT NULL,
  `rearSeatEntertainment` tinyint(1) DEFAULT NULL,
  `rearAcVents` tinyint(1) DEFAULT NULL,
  `rearSpeakers` tinyint(1) DEFAULT NULL,
  `rearCamera` tinyint(1) DEFAULT NULL,
  `sunRoof` tinyint(1) DEFAULT NULL,
  `steeringSwitches` tinyint(1) DEFAULT NULL,
  `USBCable` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_features`
--

INSERT INTO `car_features` (`feature_id`, `feature_list_id`, `abs`, `airBags`, `airConditioning`, `alloyRims`, `fmRadio`, `cdPlayer`, `cassettePlayer`, `coolBox`, `cruiseControl`, `climateControl`, `dvdPlayer`, `frontSpeakers`, `frontCamera`, `heatedSeats`, `immobilizerKey`, `keylessEntry`, `navigationSystem`, `powerLocks`, `powerMirrors`, `powerSteering`, `powerWindows`, `rearSeatEntertainment`, `rearAcVents`, `rearSpeakers`, `rearCamera`, `sunRoof`, `steeringSwitches`, `USBCable`, `created_at`, `updated_at`) VALUES
(8, '5', 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-21 03:33:38', '2022-12-21 03:33:38'),
(10, '7', 1, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-21 07:18:16', '2022-12-21 07:18:16'),
(11, '8', 1, NULL, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, 1, 1, NULL, 1, NULL, '2022-12-22 02:08:19', '2022-12-22 03:01:07'),
(13, '10', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 04:58:09', '2022-12-22 04:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_ascii` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `population` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color_name`, `created_at`, `updated_at`) VALUES
(1, 'Blue', '2022-12-20 14:29:16', '2022-12-20 14:30:34'),
(2, 'White', '2022-12-20 14:30:47', '2022-12-20 14:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `listing_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_model_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_car_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_register_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_car_mileage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_car_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_exterior_color` bigint(20) UNSIGNED NOT NULL,
  `listing_car_category` enum('B','S','R') COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_car_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_car_engineType` enum('Petrol','Diesel','LPG','CNG','Hybrid','Electric') COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_car_engineCapacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_car_transmission` enum('Automatic','Manual') COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_car_assembly` enum('Local','Imported') COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_car_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_car_whatsApp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_car_authorId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`listing_id`, `listing_city`, `listing_model_year`, `listing_company_name`, `listing_car_model`, `listing_register_province`, `listing_car_mileage`, `listing_car_price`, `listing_exterior_color`, `listing_car_category`, `listing_car_description`, `listing_car_engineType`, `listing_car_engineCapacity`, `listing_slug`, `listing_car_transmission`, `listing_car_assembly`, `listing_car_contact`, `listing_car_whatsApp`, `listing_car_authorId`, `listing_status`, `created_at`, `updated_at`) VALUES
(5, '2', '2022', '2', '157', 'Punjab', '123456', '12345', 2, 'R', 'Dummy', 'Petrol', '1234', 'civic-2022-for-sale-in-karachi-1671711713', 'Manual', 'Local', '2345678', '12345', '2', 0, '2022-12-21 03:33:38', '2022-12-22 07:21:53'),
(7, '2', '2022', '2', '157', 'Sindh', '200000', '5000000', 1, 'R', 'dummy', 'Petrol', '4000', 'civic-2022-for-sale-in-karachi-1671700324', 'Manual', 'Local', '03350055003', '03350055003', '2', 1, '2022-12-21 07:18:16', '2022-12-22 07:14:58'),
(8, '12', '2022', '1', '1', 'Unregistered', '123456', '12345345', 1, 'S', 'Dummy Dummy Dummy Dummy Dummy Dummy Dummy Dummy Dummy Dummy Dummy Dummy', 'Petrol', '1234', 'toyota-camry-2022-for-sale-in-jhang-1671703601', 'Manual', 'Local', '2345678', '12345', '2', 1, '2022-12-22 02:08:19', '2022-12-22 05:06:41'),
(10, '8', '2022', '1', '1', 'Unregistered', '123456', '12345', 1, 'S', 'Dummy', 'Petrol', '1234', 'toyota-camry-2022-for-sale-in-quetta-1671711331', 'Manual', 'Local', '2345678', '12345', '1', 1, '2022-12-22 04:58:09', '2022-12-22 07:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `listing_images`
--

CREATE TABLE `listing_images` (
  `images_id` bigint(20) UNSIGNED NOT NULL,
  `images_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images_list_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_images`
--

INSERT INTO `listing_images` (`images_id`, `images_path`, `images_list_id`, `created_at`, `updated_at`) VALUES
(25, '5_1_.png', 5, '2022-12-21 03:33:38', '2022-12-21 03:33:38'),
(32, '7_2_.png', 7, '2022-12-21 07:18:16', '2022-12-21 07:18:16'),
(33, '7_3_.jpg', 7, '2022-12-21 07:18:16', '2022-12-21 07:18:16'),
(37, '8_4_.png', 8, '2022-12-22 02:08:20', '2022-12-22 02:08:20'),
(38, '7_1_.jpg', 7, '2022-12-22 04:12:04', '2022-12-22 04:12:04'),
(51, '8_1_.1671702180.jpg', 8, '2022-12-22 04:43:00', '2022-12-22 04:43:00'),
(52, '8_2_.1671702180.jpg', 8, '2022-12-22 04:43:00', '2022-12-22 04:43:00'),
(58, '10_2_.png', 10, '2022-12-22 04:58:09', '2022-12-22 04:58:09'),
(59, '10_3_.jpg', 10, '2022-12-22 04:58:09', '2022-12-22 04:58:09'),
(62, '8_1_.1671703602.jpg', 8, '2022-12-22 05:06:42', '2022-12-22 05:06:42'),
(67, '5_1_.1671711713.jpg', 5, '2022-12-22 07:21:54', '2022-12-22 07:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_12_20_155857_create_users_table', 2),
(10, '2022_12_15_142549_create_cities_table', 3),
(11, '2022_12_17_061336_create_brands_table', 4),
(12, '2022_12_17_072234_create_colors_table', 5),
(14, '2022_12_15_123247_create_listings_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_brand_name` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`model_id`, `model_name`, `model_brand_name`, `created_at`, `updated_at`) VALUES
(1, 'Toyota Camry', 1, NULL, NULL),
(2, 'Toyota Corolla Altis', 1, NULL, NULL),
(3, 'Toyota Vios', 1, NULL, NULL),
(4, 'Toyota Wigo', 1, NULL, NULL),
(5, 'Toyota Yaris', 1, NULL, NULL),
(6, 'Toyota FJ Cruiser', 1, NULL, NULL),
(7, 'Toyota Fortuner', 1, NULL, NULL),
(8, 'Toyota Rush', 1, NULL, NULL),
(9, 'Toyota Prado', 1, NULL, NULL),
(10, 'Toyota Rav4', 1, NULL, NULL),
(11, 'Toyota Land Cruiser', 1, NULL, NULL),
(12, 'Toyota Avanza', 1, NULL, NULL),
(13, 'Toyota Avanza Veloz', 1, NULL, NULL),
(14, 'Toyota Innova', 1, NULL, NULL),
(15, 'Toyota Wish', 1, NULL, NULL),
(16, 'Toyota Alphard', 1, NULL, NULL),
(17, 'Toyota Previa', 1, NULL, NULL),
(18, 'Toyota Hiace', 1, NULL, NULL),
(19, 'Toyota Hilux', 1, NULL, NULL),
(20, 'Toyota FT-86 G Sports Concept', 1, NULL, NULL),
(21, 'Toyota FT-CH Concept', 1, NULL, NULL),
(22, 'Toyota Prius C concept', 1, NULL, NULL),
(23, 'Toyota Sports EV Twin', 1, NULL, NULL),
(24, 'Toyota Yaris HSD Concept', 1, NULL, NULL),
(25, 'Toyota FT-1', 1, NULL, NULL),
(26, 'Toyota Sequoia', 1, NULL, NULL),
(27, 'Toyota Avensis', 1, NULL, NULL),
(28, 'Toyota bB', 1, NULL, NULL),
(29, 'Toyota Comfort', 1, NULL, NULL),
(30, 'Toyota Porte', 1, NULL, NULL),
(31, 'Toyota Sienna', 1, NULL, NULL),
(32, 'Toyota Noah', 1, NULL, NULL),
(33, 'Toyota Ipsum', 1, NULL, NULL),
(34, 'Toyota Tacoma', 1, NULL, NULL),
(35, 'Toyota Prius', 1, NULL, NULL),
(36, 'Toyota 86', 1, NULL, NULL),
(37, 'Toyota Aygo', 1, NULL, NULL),
(38, 'Toyota Brevis', 1, NULL, NULL),
(39, 'Toyota Aurion', 1, NULL, NULL),
(40, 'Toyota Allion', 1, NULL, NULL),
(41, 'Toyota Etios', 1, NULL, NULL),
(42, 'Toyota ist', 1, NULL, NULL),
(43, 'Toyota Mark X', 1, NULL, NULL),
(44, 'Toyota Avalon', 1, NULL, NULL),
(45, 'Toyota Crown', 1, NULL, NULL),
(46, 'Toyota Belta', 1, NULL, NULL),
(47, 'Toyota Auris', 1, NULL, NULL),
(48, 'Toyota Vitz', 1, NULL, NULL),
(49, 'Toyota Matrix', 1, NULL, NULL),
(50, 'Toyota Century', 1, NULL, NULL),
(51, 'Toyota Highlander', 1, NULL, NULL),
(52, 'Toyota iQ', 1, NULL, NULL),
(53, 'Toyota Premio', 1, NULL, NULL),
(54, 'Toyota Vios Exclusive 2016', 1, NULL, NULL),
(55, 'Toyota Land Cruiser 200', 1, NULL, NULL),
(56, 'Toyota Venza', 1, NULL, NULL),
(57, 'Toyota Tundra', 1, NULL, NULL),
(58, 'Toyota Condor', 1, NULL, NULL),
(59, 'Toyota Isis', 1, NULL, NULL),
(60, 'Toyota Ractis', 1, NULL, NULL),
(61, 'Toyota Raum', 1, NULL, NULL),
(62, 'Toyota Sienta', 1, NULL, NULL),
(63, 'Toyota Verso', 1, NULL, NULL),
(64, 'Toyota Calya (also called Daihatsu Sigra)', 1, NULL, NULL),
(65, 'Toyota Coaster', 1, NULL, NULL),
(66, 'Toyota Prius C', 1, NULL, NULL),
(67, 'Toyota Sai', 1, NULL, NULL),
(68, 'Toyota Sera (1990-1995)', 1, NULL, NULL),
(69, 'Toyota Paseo (1991-1999)', 1, NULL, NULL),
(70, 'Toyota Tercel (1978-1999)', 1, NULL, NULL),
(71, 'Toyota Starlet (1973-1999)', 1, NULL, NULL),
(72, 'Toyota Celica', 1, NULL, NULL),
(73, 'Toyota Supra', 1, NULL, NULL),
(74, 'Toyota Prius Plug-in Hybrid', 1, NULL, NULL),
(75, 'Toyota RSC', 1, NULL, NULL),
(76, 'Toyota Celica XX', 1, NULL, NULL),
(77, 'Toyota QuickDelivery', 1, NULL, NULL),
(78, 'Toyota Hilux Surf', 1, NULL, NULL),
(79, 'Toyota Probox', 1, NULL, NULL),
(80, 'Toyota Origin', 1, NULL, NULL),
(81, 'Toyota TS010', 1, NULL, NULL),
(82, 'Toyota Stout', 1, NULL, NULL),
(83, 'Toyota Starlet Glanza', 1, NULL, NULL),
(84, 'Toyota Succeed', 1, NULL, NULL),
(85, 'Toyota Carina ED', 1, NULL, NULL),
(86, 'Toyota Crown Comfort LPG', 1, NULL, NULL),
(87, 'Toyota SA', 1, NULL, NULL),
(88, 'Toyota Crown Comfort', 1, NULL, NULL),
(89, 'Toyota Mega Cruiser', 1, NULL, NULL),
(90, 'Toyota Soarer', 1, NULL, NULL),
(91, 'Toyota Chaser', 1, NULL, NULL),
(92, 'Toyota Vanguard', 1, NULL, NULL),
(93, 'Toyota Mark X ZiO', 1, NULL, NULL),
(94, 'Toyota Land Cruiser Prado', 1, NULL, NULL),
(95, 'Toyota TownAce', 1, NULL, NULL),
(96, 'Toyota Vista', 1, NULL, NULL),
(97, 'Toyota Motor Triathlon Race Car', 1, NULL, NULL),
(98, 'Toyota Gaia', 1, NULL, NULL),
(99, 'Toyota GT-One', 1, NULL, NULL),
(100, 'Toyota Starlet GT Turbo', 1, NULL, NULL),
(101, 'Toyota Crown Majesta', 1, NULL, NULL),
(102, 'Toyota Celica GT-Four', 1, NULL, NULL),
(103, 'Toyota Cresta', 1, NULL, NULL),
(104, 'Toyota Pod', 1, NULL, NULL),
(105, 'Toyota Carina', 1, NULL, NULL),
(106, 'Toyota MR2', 1, NULL, NULL),
(107, 'Toyota FT-HS', 1, NULL, NULL),
(108, 'Toyota AE85', 1, NULL, NULL),
(109, 'Toyota G1', 1, NULL, NULL),
(110, 'Toyota Trekker', 1, NULL, NULL),
(111, 'Toyota Opa', 1, NULL, NULL),
(112, 'Toyota Sprinter', 1, NULL, NULL),
(113, 'Toyota Revo', 1, NULL, NULL),
(114, 'Toyota RAV4 EV', 1, NULL, NULL),
(115, 'Toyota Yaris Verso', 1, NULL, NULL),
(116, 'Toyota Corona', 1, NULL, NULL),
(117, 'Toyota Publica', 1, NULL, NULL),
(118, 'Toyota Carina', 1, NULL, NULL),
(119, 'Toyota Corona EXiV', 1, NULL, NULL),
(120, 'Toyota Classic', 1, NULL, NULL),
(121, 'Toyota i-unit', 1, NULL, NULL),
(122, 'Toyota 2000GT', 1, NULL, NULL),
(123, 'Toyota T100', 1, NULL, NULL),
(124, 'Toyota Kijang', 1, NULL, NULL),
(125, 'Toyota Platz', 1, NULL, NULL),
(126, 'Toyota Grand Hiace', 1, NULL, NULL),
(127, 'Toyota Camry TS-01', 1, NULL, NULL),
(128, 'Toyota eCom', 1, NULL, NULL),
(129, 'Toyota Progrès', 1, NULL, NULL),
(130, 'Toyota Corolla', 1, NULL, NULL),
(131, 'Toyota Voltz', 1, NULL, NULL),
(132, 'Toyota Carina II', 1, NULL, NULL),
(133, 'Toyota Hybrid X', 1, NULL, NULL),
(134, 'Toyota LiteAce', 1, NULL, NULL),
(135, 'Toyota 4500GT', 1, NULL, NULL),
(136, 'Toyota Corolla Verso', 1, NULL, NULL),
(137, 'Toyota Mark II Blit', 1, NULL, NULL),
(138, 'Toyota Limo', 1, NULL, NULL),
(139, 'Toyota Verossa', 1, NULL, NULL),
(140, 'Toyota FTX', 1, NULL, NULL),
(141, 'Toyota Sportivo Coupe', 1, NULL, NULL),
(142, 'Toyota AA', 1, NULL, NULL),
(143, 'Toyota Dyna', 1, NULL, NULL),
(144, 'Toyota Regius', 1, NULL, NULL),
(145, 'Toyota Camry Solara', 1, NULL, NULL),
(146, 'Toyota Camry Hybrid', 1, NULL, NULL),
(147, 'Toyota Curren', 1, NULL, NULL),
(148, 'Toyota MasterAce', 1, NULL, NULL),
(149, 'Toyota Sports 800', 1, NULL, NULL),
(150, 'Toyota 4Runner', 1, NULL, NULL),
(151, 'Toyota Caldina', 1, NULL, NULL),
(152, 'Toyota Granvia', 1, NULL, NULL),
(153, 'Toyota Cressida', 1, NULL, NULL),
(154, 'Toyota Prius v', 1, NULL, NULL),
(155, 'Toyota Mark II', 1, NULL, NULL),
(156, 'Toyota WiLL', 1, NULL, NULL),
(157, 'Civic', 2, '2022-12-17 13:26:20', '2022-12-17 13:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `city_ascii` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `iso2` varchar(255) DEFAULT NULL,
  `iso3` varchar(255) DEFAULT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `capital` varchar(255) DEFAULT NULL,
  `population` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cities`
--

INSERT INTO `tbl_cities` (`id`, `city`, `city_ascii`, `lat`, `lng`, `country`, `iso2`, `iso3`, `admin_name`, `capital`, `population`, `created_at`, `updated_at`) VALUES
(2, 'Karachi', 'Karachi', '24.860735', '67.001137', 'Pakistan', 'PK', 'PAK', 'Sindh', 'admin', '12130000', NULL, NULL),
(3, 'Gilgit', 'Gilgit', '35.616741', '74.643730', 'Pakistan', 'PK', 'PAK', 'Gilgit-Baltistan', 'minor', '216760', NULL, NULL),
(4, 'Chaman', 'Chaman', '30.925051', '66.446320', 'Pakistan', 'PK', 'PAK', 'Balochist?n', '', '88568', NULL, NULL),
(5, 'Turbat', 'Turbat', '26.0081', '63.0383', 'Pakistan', 'PK', 'PAK', 'Balochist?n', '', '147791', NULL, NULL),
(6, 'Islamabad', 'Islamabad', '33.6844', '73.0479', 'Pakistan', 'PK', 'PAK', 'Isl?m?b?d', 'primary', '780000', NULL, NULL),
(7, 'Zhob', 'Zhob', '31.3497', '69.4665', 'Pakistan', 'PK', 'PAK', 'Balochist?n', 'minor', '88356', NULL, NULL),
(8, 'Quetta', 'Quetta', '30.1798', '66.9750', 'Pakistan', 'PK', 'PAK', 'Balochist?n', 'admin', '768000', NULL, NULL),
(9, 'Hyderabad', 'Hyderabad', '25.3960', '68.3578', 'Pakistan', 'PK', 'PAK', 'Sindh', '', '1459000', NULL, NULL),
(10, 'Mardan', 'Mardan', '34.1989', '72.0231', 'Pakistan', 'PK', 'PAK', 'Khyber Pakhtunkhwa', 'minor', '300424', NULL, NULL),
(11, 'Saidu', 'Saidu', '34.7492', '72.3563', 'Pakistan', 'PK', 'PAK', 'Khyber Pakhtunkhwa', 'minor', '1860310', NULL, NULL),
(12, 'Jhang', 'Jhang', '31.2781', '72.3317', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '341210', NULL, NULL),
(13, 'Kasur', 'Kasur', '31.1179', '74.4408', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '290643', NULL, NULL),
(14, 'Lahore', 'Lahore', '31.5204', '74.3587', 'Pakistan', 'PK', 'PAK', 'Punjab', 'admin', '6577000', NULL, NULL),
(15, 'Nawabshah', 'Nawabshah', '26.2447', '68.3935', 'Pakistan', 'PK', 'PAK', 'Sindh', 'minor', '229504', NULL, NULL),
(16, 'Chiniot', 'Chiniot', '31.7292', '72.9822', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '201781', NULL, NULL),
(17, 'Bannu', 'Bannu', '32.9910', '70.6455', 'Pakistan', 'PK', 'PAK', 'Khyber Pakhtunkhwa', 'minor', '622419', NULL, NULL),
(18, 'Sadiqabad', 'Sadiqabad', '28.3111', '70.1261', 'Pakistan', 'PK', 'PAK', 'Punjab', '', '189876', NULL, NULL),
(19, 'Sukkur', 'Sukkur', '27.7244', '68.8228', 'Pakistan', 'PK', 'PAK', 'Sindh', 'minor', '417767', NULL, NULL),
(20, 'Peshawar', 'Peshawar', '34.0151', '71.5249', 'Pakistan', 'PK', 'PAK', 'Khyber Pakhtunkhwa', 'admin', '1303000', NULL, NULL),
(21, 'Bahawalpur', 'Bahawalpur', '29.3544', '71.6911', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '552607', NULL, NULL),
(22, 'Sargodha', 'Sargodha', '32.0740', '72.6861', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '542603', NULL, NULL),
(23, 'Dera Ismail Khan', 'Dera Ismail Khan', '31.8626', '70.9019', 'Pakistan', 'PK', 'PAK', 'Khyber Pakhtunkhwa', 'minor', '101616', NULL, NULL),
(24, 'Kundian', 'Kundian', '32.4525', '71.4834', 'Pakistan', 'PK', 'PAK', 'Punjab', '', '35406', NULL, NULL),
(25, 'Gwadar', 'Gwadar', '25.2460', '62.2861', 'Pakistan', 'PK', 'PAK', 'Balochist?n', 'minor', '51901', NULL, NULL),
(26, 'Parachinar', 'Parachinar', '33.9011', '70.0860', 'Pakistan', 'PK', 'PAK', 'Federally Administered Tribal Areas', '', '55685', NULL, NULL),
(27, 'Larkana', 'Larkana', '27.5570', '68.2028', 'Pakistan', 'PK', 'PAK', 'Sindh', 'minor', '364033', NULL, NULL),
(28, 'Kohat', 'Kohat', '33.5889', '71.4429', 'Pakistan', 'PK', 'PAK', 'Khyber Pakhtunkhwa', 'minor', '343027', NULL, NULL),
(29, 'Rahim Yar Khan', 'Rahim Yar Khan', '28.4212', '70.2989', 'Pakistan', 'PK', 'PAK', 'Punjab', '', '353203', NULL, NULL),
(30, 'Mirpur Khas', 'Mirpur Khas', '25.5065', '69.0136', 'Pakistan', 'PK', 'PAK', 'Sindh', 'minor', '356435', NULL, NULL),
(31, 'Dera Ghazi Khan', 'Dera Ghazi Khan', '30.0489', '70.6455', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '236093', NULL, NULL),
(32, 'Gujranwala', 'Gujranwala', '32.1877', '74.1945', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '1513000', NULL, NULL),
(33, 'Rawalpindi', 'Rawalpindi', '33.601921', '73.038078\r\n', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '1858000', NULL, NULL),
(34, 'Gujrat', 'Gujrat', '32.583279', '74.067177', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '301506', NULL, NULL),
(35, 'Sialkot', 'Sialkot', '32.520020', '74.560043', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '477396', NULL, NULL),
(36, 'Mansehra', 'Mansehra', '33.720001', '73.059998', 'Pakistan', 'PK', 'PAK', 'Khyber Pakhtunkhwa', 'minor', '66486', NULL, NULL),
(37, 'Abbottabad', 'Abbottabad', '34.149502', '73.199501', 'Pakistan', 'PK', 'PAK', 'Khyber Pakhtunkhwa', 'minor', '1183647', NULL, NULL),
(38, 'Multan', 'Multan', '30.157457', '71.524918', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '1522000', NULL, NULL),
(39, 'Sheikhu Pura', 'Sheikhu Pura', '31.7167', '73.9850', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '361303', NULL, NULL),
(40, 'Sahiwal', 'Sahiwal', '30.6682', '73.1114', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '235695', NULL, NULL),
(41, 'Okara', 'Okara', '30.8138', '73.4534', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '223648', NULL, NULL),
(42, 'Faisalabad', 'Faisalabad', '31.4504', '73.1350', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '2617000', NULL, NULL),
(43, 'Gujarkhan', 'Gujarkhan', '33.2616', '73.3058', 'Pakistan', 'PK', 'PAK', 'Punjab', 'minor', '2617000', NULL, NULL),
(44, 'Swat', 'Swat', '35.2227', '72.4258', 'Pakistan', 'PK', 'PAK', 'Khyber Pakhtunkhwa', 'admin', '12130000', NULL, NULL),
(45, 'Skardu', 'Skardu', '35.3247', '75.5510', 'Pakistan', 'PK', 'PAK', 'Gilgit Baltistan', 'admin', '12130000', NULL, NULL),
(46, 'Malam Jabba', 'Malam Jabba', '34.7999', '72.5722', 'Pakistan', 'PK', 'PAK', 'Khyber Pakhtunkhwa', 'minor', '216760', NULL, NULL),
(47, 'Muzaffrabad', '', '', '', 'Pakistan', 'PK', 'PAK', 'AJK', '', '', NULL, NULL),
(48, 'Bagh', '', '', '', 'Pakistan', 'PK', 'PAK', 'AJK', '', '', NULL, NULL),
(49, 'Rawalakot', '', '', '', 'Pakistan', 'PK', 'PAK', 'AJK', '', '', NULL, '2022-12-16 14:29:04'),
(50, 'Mirpur', '', '', '', 'Pakistan', 'PK', 'PAK', 'AJK', '', '', NULL, '2022-12-16 23:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `address`, `password`, `image`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zain Amir', 'zainamir532@gmail.com', NULL, NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, NULL, NULL, '2022-12-20 12:57:34', '2022-12-20 12:57:34'),
(2, 'User1', 'user1@gmail.com', '1345789', 'Rawalpindi', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, NULL, NULL, '2022-12-20 12:59:08', '2022-12-22 07:18:37'),
(4, 'User3', 'user3@gmail.com', NULL, NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1, NULL, NULL, '2022-12-20 13:04:06', '2022-12-20 13:04:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `car_features`
--
ALTER TABLE `car_features`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`listing_id`),
  ADD KEY `listings_listing_exterior_color_foreign` (`listing_exterior_color`);

--
-- Indexes for table `listing_images`
--
ALTER TABLE `listing_images`
  ADD PRIMARY KEY (`images_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`model_id`),
  ADD KEY `models_model_brand_name_foreign` (`model_brand_name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car_features`
--
ALTER TABLE `car_features`
  MODIFY `feature_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `listing_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `listing_images`
--
ALTER TABLE `listing_images`
  MODIFY `images_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `model_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_listing_exterior_color_foreign` FOREIGN KEY (`listing_exterior_color`) REFERENCES `colors` (`color_id`);

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_model_brand_name_foreign` FOREIGN KEY (`model_brand_name`) REFERENCES `brands` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
