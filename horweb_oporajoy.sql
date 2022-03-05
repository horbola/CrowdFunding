-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 09:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horweb_oporajoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `holding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` int(11) DEFAULT NULL,
  `upazilla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `type`, `user_id`, `holding`, `road`, `post_code`, `upazilla`, `district`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'permanent', 1, 'Khamar Bari', 'Bahore', 1229, 'Chatkhil', 'Chatkhil', 18, '2021-08-04 22:17:09', '2022-02-08 05:53:49'),
(2, 'current', 1, 'Khamar Bari', 'Bahore', 1229, 'Chatkhil', 'Noakhali', 18, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 'permanent', 2, 'Khamar Bari', 'Bahore', 1229, 'Chatkhil', 'Noakhali', 18, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 'current', 2, 'Khamar Bari', 'Bahore', 1229, 'Chatkhil', 'Noakhali', 18, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 'permanent', 3, 'Khamar Bari', 'Bahore', 1229, 'Chatkhil', 'Noakhali', 18, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 'current', 3, 'Khamar Bari', 'Bahore', 1229, 'Chatkhil', 'Noakhali', 18, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 'permanent', 4, 'Khamar Bari', 'Bahore', 1229, 'Chatkhil', 'Noakhali', 18, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 'current', 4, 'Khamar Bari', 'Bahore', 1229, 'Chatkhil', 'Noakhali', 18, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 'permanent', 5, 'Khamar Bari', 'Bahore', 1229, 'Chatkhil', 'Noakhali', 18, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(10, 'current', 5, 'Khamar Bari', 'Bahore', 1229, 'Chatkhil', 'Noakhali', 18, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(11, 'current', 6, 'House 24', '10', 3507, 'Dhaka North City Corporation', 'Noakhali', 18, '2022-02-08 03:49:18', '2022-02-08 03:49:18'),
(12, 'permanent', 6, 'khamar bari', 'bahore', 3870, 'Chatkhil', 'Noakhali', 18, '2022-02-08 03:49:18', '2022-02-08 03:49:18'),
(13, 'current', 7, 'Khanmar Bari/ Abul Hossen', 'Bahore', 3508, 'Chatkhil', 'Noakhali', 18, '2022-02-08 04:08:02', '2022-02-08 04:08:02'),
(14, 'permanent', 7, 'Khanmar Bari/ Abul Hossen', 'Bahore', 3508, 'Chatkhil', 'Chatkhil', 18, '2022-02-08 04:08:02', '2022-02-08 04:08:50'),
(15, 'current', 8, 'House 24', '10', 3870, 'Dhaka North City Corporation', 'Noakhali', 18, '2022-02-08 08:36:52', '2022-02-08 08:36:52'),
(16, 'permanent', 8, 'khamar bari', 'bahore', 3870, 'Chatkhil', 'Noakhali', 18, '2022-02-08 10:56:47', '2022-02-08 10:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `campaign_id`, `image_path`, `video_path`, `created_at`, `updated_at`) VALUES
(1, 1, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 1, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 1, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 1, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 2, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 2, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 2, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 2, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 3, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(10, 3, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(11, 3, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(12, 3, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(13, 4, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(14, 4, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(15, 4, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(16, 4, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(17, 5, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(18, 5, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(19, 5, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(20, 5, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(22, 6, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(23, 6, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(24, 6, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(25, 6, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(26, 7, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(27, 7, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(28, 7, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(29, 7, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(30, 8, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(31, 8, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(32, 8, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(33, 8, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(34, 9, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(35, 9, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(36, 9, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(37, 9, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(38, 10, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(39, 10, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(40, 10, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(41, 10, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(42, 11, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(43, 11, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(44, 11, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(45, 11, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(46, 12, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(47, 12, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(48, 12, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(49, 12, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(50, 13, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(51, 13, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(52, 13, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(53, 13, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(54, 14, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(55, 14, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(56, 14, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(57, 14, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(58, 15, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(59, 15, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(60, 15, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(61, 15, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(62, 16, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(63, 16, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(64, 16, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(65, 16, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(66, 17, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(67, 17, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(68, 17, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(69, 17, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(70, 18, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(71, 18, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(72, 18, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(73, 18, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(74, 19, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(75, 19, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(76, 19, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(77, 19, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(78, 20, '/uploads/campaign/full/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(79, 20, '/uploads/campaign/full/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(80, 20, '/uploads/campaign/full/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(81, 20, '/uploads/campaign/full/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(82, 21, '/uploads/campaign/full/1644314110kjfdo-b5.jpg', NULL, '2022-02-08 03:55:10', '2022-02-08 03:55:10'),
(83, 21, '/uploads/campaign/full/1644314110tey9v-b6.jpg', NULL, '2022-02-08 03:55:10', '2022-02-08 03:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_swift_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_swift_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_number` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `user_id`, `bank_name`, `bank_swift_code`, `branch_name`, `branch_swift_code`, `owner_name`, `owner_nid`, `acc_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bank Asia', '0987780870978', 'Chatkhil', '0987780870978', 'Saif Khan Faysal', '1990751105700003', 987780870978, 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 2, 'Bank Asia', '0987780870978', 'Chatkhil', '0987780870978', 'Mujahidul Islam Rony', '1990751105700003', 987780870978, 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 3, 'Bank Asia', '0987780870978', 'Chatkhil', '0987780870978', 'Sabbir Uddin Khan', '1990751105700003', 987780870978, 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 4, 'Bank Asia', '0987780870978', 'Chatkhil', '0987780870978', 'Arafat Irin Pinky', '1990751105700003', 987780870978, 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 5, 'Bank Asia', '0987780870978', 'Chatkhil', '0987780870978', 'Afroza Parvin Fancy', '1990751105700003', 987780870978, 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `is_picked` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goal` decimal(8,2) NOT NULL,
  `end_method` tinyint(4) NOT NULL DEFAULT 1,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `min_amount` decimal(8,2) DEFAULT NULL,
  `max_amount` decimal(8,2) DEFAULT NULL,
  `recommended_amount` decimal(8,2) DEFAULT NULL,
  `amount_prefilled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `category_id`, `is_picked`, `title`, `slug`, `short_description`, `description`, `feature_image`, `feature_video`, `goal`, `end_method`, `start_date`, `end_date`, `min_amount`, `max_amount`, `recommended_amount`, `amount_prefilled`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 1, 1, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 1, 1, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 1, 1, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 3, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 2, 1, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 4, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 2, 2, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 2, 2, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 2, 3, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 3, 3, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(10, 3, 4, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(11, 3, 4, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(12, 3, 5, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(13, 4, 5, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(14, 4, 6, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(15, 4, 6, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 1, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(16, 4, 7, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 0, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(17, 5, 7, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 0, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(18, 5, 8, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 0, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(19, 5, 8, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 0, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(20, 5, 8, 0, 'a campaign', 'a-campaign', 'this is a campaign', 'this is a campaign for help', '/uploads/campaign/full/16321297892m53y-bg1.jpg', '', '100000.00', 0, '2021-01-01', '2022-03-30', '10.00', '100000.00', '500.00', '10,50,100,500,1000', 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(21, 6, 3, 0, 'My pet is sick', 'my-pet-is-sick', 'My pet is seriously sick. Please help it.', '<p>i\'\\ve have onloy jone pet. and it\'s dyieng. please help it.<br></p><div><img id=\"1\" src=\"/uploads/descrip/full/1644314207jfptp-ab1.jpg\" alt=\"image\"></div>', '/uploads/campaign/full/1644314110ok8ak-b6.jpg', NULL, '60000.00', 0, '2022-02-08', '2022-02-10', '10.00', '60000.00', '500.00', '10, 50, 100, 500, 1000', 1, '2022-02-08 03:55:10', '2022-02-08 04:19:30'),
(22, 6, 1, 0, 'I\'m loosing my leg', 'im-loosing-my-leg', 'i dont wanna loose leg. please help me.', '', '/uploads/campaign/full/16443206579014q-pic-1.jpg', NULL, '80000.00', 1, '2022-02-08', '2022-02-23', '10.00', '80000.00', '500.00', '10, 50, 100, 500, 1000', 0, '2022-02-08 05:44:17', '2022-02-08 05:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_in_home` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_image`, `category_icon`, `show_in_home`, `created_at`, `updated_at`) VALUES
(1, 'Medical', 'medical', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-hospital-symbol', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 'Education', 'education', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-book', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 'Animals', 'animals', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-github-alt', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 'Creative', 'creative', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-lightbulb-alt', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 'Food & Hunger', 'food&hunger', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-gift', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 'Environment', 'environment', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-cloud-moon-rain', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 'Woman & Children', 'woman&children', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-house-user', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 'Memorial', 'memorial', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-envelope-heart', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 'Volunteer', 'volunteer', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-book-reader', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(10, 'Nonprofit', 'nonprofit', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-0-plus', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(11, 'Comunity Development', 'comunity-development', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-caret-right', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(12, 'Others', 'others', '/uploads/category/1633427296yxfzh-bg01_8.jpg', 'uil-list-ul', 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `campaign_id`, `parent_id`, `body`, `is_enabled`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 'this is a parent comment', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 1, 1, 1, 'this is a reply', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 1, 1, 1, 'this is a reply', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 1, 1, 0, 'this is a parent comment', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 1, 1, 4, 'this is a reply', 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nicename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `iso3` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `numcode` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `region_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `sub_region_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sub_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_decimals` int(11) DEFAULT NULL,
  `phonecode` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eea` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `nicename`, `full_name`, `flag`, `capital`, `citizenship`, `iso`, `iso3`, `numcode`, `region_code`, `sub_region_code`, `currency`, `currency_code`, `currency_sub_unit`, `currency_symbol`, `currency_decimals`, `phonecode`, `eea`, `created_at`, `updated_at`) VALUES
(1, 'AFGHANISTAN', 'Afghanistan', NULL, NULL, NULL, NULL, 'AF', 'AFG', '4', '', '', NULL, NULL, NULL, NULL, NULL, '93', 0, NULL, NULL),
(2, 'ALBANIA', 'Albania', NULL, NULL, NULL, NULL, 'AL', 'ALB', '8', '', '', NULL, NULL, NULL, NULL, NULL, '355', 0, NULL, NULL),
(3, 'ALGERIA', 'Algeria', NULL, NULL, NULL, NULL, 'DZ', 'DZA', '12', '', '', NULL, NULL, NULL, NULL, NULL, '213', 0, NULL, NULL),
(4, 'AMERICAN SAMOA', 'American Samoa', NULL, NULL, NULL, NULL, 'AS', 'ASM', '16', '', '', NULL, NULL, NULL, NULL, NULL, '1684', 0, NULL, NULL),
(5, 'ANDORRA', 'Andorra', NULL, NULL, NULL, NULL, 'AD', 'AND', '20', '', '', NULL, NULL, NULL, NULL, NULL, '376', 0, NULL, NULL),
(6, 'ANGOLA', 'Angola', NULL, NULL, NULL, NULL, 'AO', 'AGO', '24', '', '', NULL, NULL, NULL, NULL, NULL, '244', 0, NULL, NULL),
(7, 'ANGUILLA', 'Anguilla', NULL, NULL, NULL, NULL, 'AI', 'AIA', '660', '', '', NULL, NULL, NULL, NULL, NULL, '1264', 0, NULL, NULL),
(8, 'ANTARCTICA', 'Antarctica', NULL, NULL, NULL, NULL, 'AQ', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL),
(9, 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', NULL, NULL, NULL, NULL, 'AG', 'ATG', '28', '', '', NULL, NULL, NULL, NULL, NULL, '1268', 0, NULL, NULL),
(10, 'ARGENTINA', 'Argentina', NULL, NULL, NULL, NULL, 'AR', 'ARG', '32', '', '', NULL, NULL, NULL, NULL, NULL, '54', 0, NULL, NULL),
(11, 'ARMENIA', 'Armenia', NULL, NULL, NULL, NULL, 'AM', 'ARM', '51', '', '', NULL, NULL, NULL, NULL, NULL, '374', 0, NULL, NULL),
(12, 'ARUBA', 'Aruba', NULL, NULL, NULL, NULL, 'AW', 'ABW', '533', '', '', NULL, NULL, NULL, NULL, NULL, '297', 0, NULL, NULL),
(13, 'AUSTRALIA', 'Australia', NULL, NULL, NULL, NULL, 'AU', 'AUS', '36', '', '', NULL, NULL, NULL, NULL, NULL, '61', 0, NULL, NULL),
(14, 'AUSTRIA', 'Austria', NULL, NULL, NULL, NULL, 'AT', 'AUT', '40', '', '', NULL, NULL, NULL, NULL, NULL, '43', 0, NULL, NULL),
(15, 'AZERBAIJAN', 'Azerbaijan', NULL, NULL, NULL, NULL, 'AZ', 'AZE', '31', '', '', NULL, NULL, NULL, NULL, NULL, '994', 0, NULL, NULL),
(16, 'BAHAMAS', 'Bahamas', NULL, NULL, NULL, NULL, 'BS', 'BHS', '44', '', '', NULL, NULL, NULL, NULL, NULL, '1242', 0, NULL, NULL),
(17, 'BAHRAIN', 'Bahrain', NULL, NULL, NULL, NULL, 'BH', 'BHR', '48', '', '', NULL, NULL, NULL, NULL, NULL, '973', 0, NULL, NULL),
(18, 'BANGLADESH', 'Bangladesh', NULL, NULL, NULL, NULL, 'BD', 'BGD', '50', '', '', NULL, NULL, NULL, NULL, NULL, '880', 0, NULL, NULL),
(19, 'BARBADOS', 'Barbados', NULL, NULL, NULL, NULL, 'BB', 'BRB', '52', '', '', NULL, NULL, NULL, NULL, NULL, '1246', 0, NULL, NULL),
(20, 'BELARUS', 'Belarus', NULL, NULL, NULL, NULL, 'BY', 'BLR', '112', '', '', NULL, NULL, NULL, NULL, NULL, '375', 0, NULL, NULL),
(21, 'BELGIUM', 'Belgium', NULL, NULL, NULL, NULL, 'BE', 'BEL', '56', '', '', NULL, NULL, NULL, NULL, NULL, '32', 0, NULL, NULL),
(22, 'BELIZE', 'Belize', NULL, NULL, NULL, NULL, 'BZ', 'BLZ', '84', '', '', NULL, NULL, NULL, NULL, NULL, '501', 0, NULL, NULL),
(23, 'BENIN', 'Benin', NULL, NULL, NULL, NULL, 'BJ', 'BEN', '204', '', '', NULL, NULL, NULL, NULL, NULL, '229', 0, NULL, NULL),
(24, 'BERMUDA', 'Bermuda', NULL, NULL, NULL, NULL, 'BM', 'BMU', '60', '', '', NULL, NULL, NULL, NULL, NULL, '1441', 0, NULL, NULL),
(25, 'BHUTAN', 'Bhutan', NULL, NULL, NULL, NULL, 'BT', 'BTN', '64', '', '', NULL, NULL, NULL, NULL, NULL, '975', 0, NULL, NULL),
(26, 'BOLIVIA', 'Bolivia', NULL, NULL, NULL, NULL, 'BO', 'BOL', '68', '', '', NULL, NULL, NULL, NULL, NULL, '591', 0, NULL, NULL),
(27, 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', NULL, NULL, NULL, NULL, 'BA', 'BIH', '70', '', '', NULL, NULL, NULL, NULL, NULL, '387', 0, NULL, NULL),
(28, 'BOTSWANA', 'Botswana', NULL, NULL, NULL, NULL, 'BW', 'BWA', '72', '', '', NULL, NULL, NULL, NULL, NULL, '267', 0, NULL, NULL),
(29, 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, NULL, NULL, 'BV', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL),
(30, 'BRAZIL', 'Brazil', NULL, NULL, NULL, NULL, 'BR', 'BRA', '76', '', '', NULL, NULL, NULL, NULL, NULL, '55', 0, NULL, NULL),
(31, 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, NULL, NULL, 'IO', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '246', 0, NULL, NULL),
(32, 'BRUNEI DARUSSALAM', 'Brunei Darussalam', NULL, NULL, NULL, NULL, 'BN', 'BRN', '96', '', '', NULL, NULL, NULL, NULL, NULL, '673', 0, NULL, NULL),
(33, 'BULGARIA', 'Bulgaria', NULL, NULL, NULL, NULL, 'BG', 'BGR', '100', '', '', NULL, NULL, NULL, NULL, NULL, '359', 0, NULL, NULL),
(34, 'BURKINA FASO', 'Burkina Faso', NULL, NULL, NULL, NULL, 'BF', 'BFA', '854', '', '', NULL, NULL, NULL, NULL, NULL, '226', 0, NULL, NULL),
(35, 'BURUNDI', 'Burundi', NULL, NULL, NULL, NULL, 'BI', 'BDI', '108', '', '', NULL, NULL, NULL, NULL, NULL, '257', 0, NULL, NULL),
(36, 'CAMBODIA', 'Cambodia', NULL, NULL, NULL, NULL, 'KH', 'KHM', '116', '', '', NULL, NULL, NULL, NULL, NULL, '855', 0, NULL, NULL),
(37, 'CAMEROON', 'Cameroon', NULL, NULL, NULL, NULL, 'CM', 'CMR', '120', '', '', NULL, NULL, NULL, NULL, NULL, '237', 0, NULL, NULL),
(38, 'CANADA', 'Canada', NULL, NULL, NULL, NULL, 'CA', 'CAN', '124', '', '', NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL),
(39, 'CAPE VERDE', 'Cape Verde', NULL, NULL, NULL, NULL, 'CV', 'CPV', '132', '', '', NULL, NULL, NULL, NULL, NULL, '238', 0, NULL, NULL),
(40, 'CAYMAN ISLANDS', 'Cayman Islands', NULL, NULL, NULL, NULL, 'KY', 'CYM', '136', '', '', NULL, NULL, NULL, NULL, NULL, '1345', 0, NULL, NULL),
(41, 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', NULL, NULL, NULL, NULL, 'CF', 'CAF', '140', '', '', NULL, NULL, NULL, NULL, NULL, '236', 0, NULL, NULL),
(42, 'CHAD', 'Chad', NULL, NULL, NULL, NULL, 'TD', 'TCD', '148', '', '', NULL, NULL, NULL, NULL, NULL, '235', 0, NULL, NULL),
(43, 'CHILE', 'Chile', NULL, NULL, NULL, NULL, 'CL', 'CHL', '152', '', '', NULL, NULL, NULL, NULL, NULL, '56', 0, NULL, NULL),
(44, 'CHINA', 'China', NULL, NULL, NULL, NULL, 'CN', 'CHN', '156', '', '', NULL, NULL, NULL, NULL, NULL, '86', 0, NULL, NULL),
(45, 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, NULL, NULL, 'CX', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '61', 0, NULL, NULL),
(46, 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, NULL, NULL, 'CC', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '672', 0, NULL, NULL),
(47, 'COLOMBIA', 'Colombia', NULL, NULL, NULL, NULL, 'CO', 'COL', '170', '', '', NULL, NULL, NULL, NULL, NULL, '57', 0, NULL, NULL),
(48, 'COMOROS', 'Comoros', NULL, NULL, NULL, NULL, 'KM', 'COM', '174', '', '', NULL, NULL, NULL, NULL, NULL, '269', 0, NULL, NULL),
(49, 'CONGO', 'Congo', NULL, NULL, NULL, NULL, 'CG', 'COG', '178', '', '', NULL, NULL, NULL, NULL, NULL, '242', 0, NULL, NULL),
(50, 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', NULL, NULL, NULL, NULL, 'CD', 'COD', '180', '', '', NULL, NULL, NULL, NULL, NULL, '242', 0, NULL, NULL),
(51, 'COOK ISLANDS', 'Cook Islands', NULL, NULL, NULL, NULL, 'CK', 'COK', '184', '', '', NULL, NULL, NULL, NULL, NULL, '682', 0, NULL, NULL),
(52, 'COSTA RICA', 'Costa Rica', NULL, NULL, NULL, NULL, 'CR', 'CRI', '188', '', '', NULL, NULL, NULL, NULL, NULL, '506', 0, NULL, NULL),
(53, 'COTE D\'IVOIRE', 'Cote D\'Ivoire', NULL, NULL, NULL, NULL, 'CI', 'CIV', '384', '', '', NULL, NULL, NULL, NULL, NULL, '225', 0, NULL, NULL),
(54, 'CROATIA', 'Croatia', NULL, NULL, NULL, NULL, 'HR', 'HRV', '191', '', '', NULL, NULL, NULL, NULL, NULL, '385', 0, NULL, NULL),
(55, 'CUBA', 'Cuba', NULL, NULL, NULL, NULL, 'CU', 'CUB', '192', '', '', NULL, NULL, NULL, NULL, NULL, '53', 0, NULL, NULL),
(56, 'CYPRUS', 'Cyprus', NULL, NULL, NULL, NULL, 'CY', 'CYP', '196', '', '', NULL, NULL, NULL, NULL, NULL, '357', 0, NULL, NULL),
(57, 'CZECH REPUBLIC', 'Czech Republic', NULL, NULL, NULL, NULL, 'CZ', 'CZE', '203', '', '', NULL, NULL, NULL, NULL, NULL, '420', 0, NULL, NULL),
(58, 'DENMARK', 'Denmark', NULL, NULL, NULL, NULL, 'DK', 'DNK', '208', '', '', NULL, NULL, NULL, NULL, NULL, '45', 0, NULL, NULL),
(59, 'DJIBOUTI', 'Djibouti', NULL, NULL, NULL, NULL, 'DJ', 'DJI', '262', '', '', NULL, NULL, NULL, NULL, NULL, '253', 0, NULL, NULL),
(60, 'DOMINICA', 'Dominica', NULL, NULL, NULL, NULL, 'DM', 'DMA', '212', '', '', NULL, NULL, NULL, NULL, NULL, '1767', 0, NULL, NULL),
(61, 'DOMINICAN REPUBLIC', 'Dominican Republic', NULL, NULL, NULL, NULL, 'DO', 'DOM', '214', '', '', NULL, NULL, NULL, NULL, NULL, '1809', 0, NULL, NULL),
(62, 'ECUADOR', 'Ecuador', NULL, NULL, NULL, NULL, 'EC', 'ECU', '218', '', '', NULL, NULL, NULL, NULL, NULL, '593', 0, NULL, NULL),
(63, 'EGYPT', 'Egypt', NULL, NULL, NULL, NULL, 'EG', 'EGY', '818', '', '', NULL, NULL, NULL, NULL, NULL, '20', 0, NULL, NULL),
(64, 'EL SALVADOR', 'El Salvador', NULL, NULL, NULL, NULL, 'SV', 'SLV', '222', '', '', NULL, NULL, NULL, NULL, NULL, '503', 0, NULL, NULL),
(65, 'EQUATORIAL GUINEA', 'Equatorial Guinea', NULL, NULL, NULL, NULL, 'GQ', 'GNQ', '226', '', '', NULL, NULL, NULL, NULL, NULL, '240', 0, NULL, NULL),
(66, 'ERITREA', 'Eritrea', NULL, NULL, NULL, NULL, 'ER', 'ERI', '232', '', '', NULL, NULL, NULL, NULL, NULL, '291', 0, NULL, NULL),
(67, 'ESTONIA', 'Estonia', NULL, NULL, NULL, NULL, 'EE', 'EST', '233', '', '', NULL, NULL, NULL, NULL, NULL, '372', 0, NULL, NULL),
(68, 'ETHIOPIA', 'Ethiopia', NULL, NULL, NULL, NULL, 'ET', 'ETH', '231', '', '', NULL, NULL, NULL, NULL, NULL, '251', 0, NULL, NULL),
(69, 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', NULL, NULL, NULL, NULL, 'FK', 'FLK', '238', '', '', NULL, NULL, NULL, NULL, NULL, '500', 0, NULL, NULL),
(70, 'FAROE ISLANDS', 'Faroe Islands', NULL, NULL, NULL, NULL, 'FO', 'FRO', '234', '', '', NULL, NULL, NULL, NULL, NULL, '298', 0, NULL, NULL),
(71, 'FIJI', 'Fiji', NULL, NULL, NULL, NULL, 'FJ', 'FJI', '242', '', '', NULL, NULL, NULL, NULL, NULL, '679', 0, NULL, NULL),
(72, 'FINLAND', 'Finland', NULL, NULL, NULL, NULL, 'FI', 'FIN', '246', '', '', NULL, NULL, NULL, NULL, NULL, '358', 0, NULL, NULL),
(73, 'FRANCE', 'France', NULL, NULL, NULL, NULL, 'FR', 'FRA', '250', '', '', NULL, NULL, NULL, NULL, NULL, '33', 0, NULL, NULL),
(74, 'FRENCH GUIANA', 'French Guiana', NULL, NULL, NULL, NULL, 'GF', 'GUF', '254', '', '', NULL, NULL, NULL, NULL, NULL, '594', 0, NULL, NULL),
(75, 'FRENCH POLYNESIA', 'French Polynesia', NULL, NULL, NULL, NULL, 'PF', 'PYF', '258', '', '', NULL, NULL, NULL, NULL, NULL, '689', 0, NULL, NULL),
(76, 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, NULL, NULL, 'TF', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL),
(77, 'GABON', 'Gabon', NULL, NULL, NULL, NULL, 'GA', 'GAB', '266', '', '', NULL, NULL, NULL, NULL, NULL, '241', 0, NULL, NULL),
(78, 'GAMBIA', 'Gambia', NULL, NULL, NULL, NULL, 'GM', 'GMB', '270', '', '', NULL, NULL, NULL, NULL, NULL, '220', 0, NULL, NULL),
(79, 'GEORGIA', 'Georgia', NULL, NULL, NULL, NULL, 'GE', 'GEO', '268', '', '', NULL, NULL, NULL, NULL, NULL, '995', 0, NULL, NULL),
(80, 'GERMANY', 'Germany', NULL, NULL, NULL, NULL, 'DE', 'DEU', '276', '', '', NULL, NULL, NULL, NULL, NULL, '49', 0, NULL, NULL),
(81, 'GHANA', 'Ghana', NULL, NULL, NULL, NULL, 'GH', 'GHA', '288', '', '', NULL, NULL, NULL, NULL, NULL, '233', 0, NULL, NULL),
(82, 'GIBRALTAR', 'Gibraltar', NULL, NULL, NULL, NULL, 'GI', 'GIB', '292', '', '', NULL, NULL, NULL, NULL, NULL, '350', 0, NULL, NULL),
(83, 'GREECE', 'Greece', NULL, NULL, NULL, NULL, 'GR', 'GRC', '300', '', '', NULL, NULL, NULL, NULL, NULL, '30', 0, NULL, NULL),
(84, 'GREENLAND', 'Greenland', NULL, NULL, NULL, NULL, 'GL', 'GRL', '304', '', '', NULL, NULL, NULL, NULL, NULL, '299', 0, NULL, NULL),
(85, 'GRENADA', 'Grenada', NULL, NULL, NULL, NULL, 'GD', 'GRD', '308', '', '', NULL, NULL, NULL, NULL, NULL, '1473', 0, NULL, NULL),
(86, 'GUADELOUPE', 'Guadeloupe', NULL, NULL, NULL, NULL, 'GP', 'GLP', '312', '', '', NULL, NULL, NULL, NULL, NULL, '590', 0, NULL, NULL),
(87, 'GUAM', 'Guam', NULL, NULL, NULL, NULL, 'GU', 'GUM', '316', '', '', NULL, NULL, NULL, NULL, NULL, '1671', 0, NULL, NULL),
(88, 'GUATEMALA', 'Guatemala', NULL, NULL, NULL, NULL, 'GT', 'GTM', '320', '', '', NULL, NULL, NULL, NULL, NULL, '502', 0, NULL, NULL),
(89, 'GUINEA', 'Guinea', NULL, NULL, NULL, NULL, 'GN', 'GIN', '324', '', '', NULL, NULL, NULL, NULL, NULL, '224', 0, NULL, NULL),
(90, 'GUINEA-BISSAU', 'Guinea-Bissau', NULL, NULL, NULL, NULL, 'GW', 'GNB', '624', '', '', NULL, NULL, NULL, NULL, NULL, '245', 0, NULL, NULL),
(91, 'GUYANA', 'Guyana', NULL, NULL, NULL, NULL, 'GY', 'GUY', '328', '', '', NULL, NULL, NULL, NULL, NULL, '592', 0, NULL, NULL),
(92, 'HAITI', 'Haiti', NULL, NULL, NULL, NULL, 'HT', 'HTI', '332', '', '', NULL, NULL, NULL, NULL, NULL, '509', 0, NULL, NULL),
(93, 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, NULL, NULL, 'HM', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL),
(94, 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', NULL, NULL, NULL, NULL, 'VA', 'VAT', '336', '', '', NULL, NULL, NULL, NULL, NULL, '39', 0, NULL, NULL),
(95, 'HONDURAS', 'Honduras', NULL, NULL, NULL, NULL, 'HN', 'HND', '340', '', '', NULL, NULL, NULL, NULL, NULL, '504', 0, NULL, NULL),
(96, 'HONG KONG', 'Hong Kong', NULL, NULL, NULL, NULL, 'HK', 'HKG', '344', '', '', NULL, NULL, NULL, NULL, NULL, '852', 0, NULL, NULL),
(97, 'HUNGARY', 'Hungary', NULL, NULL, NULL, NULL, 'HU', 'HUN', '348', '', '', NULL, NULL, NULL, NULL, NULL, '36', 0, NULL, NULL),
(98, 'ICELAND', 'Iceland', NULL, NULL, NULL, NULL, 'IS', 'ISL', '352', '', '', NULL, NULL, NULL, NULL, NULL, '354', 0, NULL, NULL),
(99, 'INDIA', 'India', NULL, NULL, NULL, NULL, 'IN', 'IND', '356', '', '', NULL, NULL, NULL, NULL, NULL, '91', 0, NULL, NULL),
(100, 'INDONESIA', 'Indonesia', NULL, NULL, NULL, NULL, 'ID', 'IDN', '360', '', '', NULL, NULL, NULL, NULL, NULL, '62', 0, NULL, NULL),
(101, 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', NULL, NULL, NULL, NULL, 'IR', 'IRN', '364', '', '', NULL, NULL, NULL, NULL, NULL, '98', 0, NULL, NULL),
(102, 'IRAQ', 'Iraq', NULL, NULL, NULL, NULL, 'IQ', 'IRQ', '368', '', '', NULL, NULL, NULL, NULL, NULL, '964', 0, NULL, NULL),
(103, 'IRELAND', 'Ireland', NULL, NULL, NULL, NULL, 'IE', 'IRL', '372', '', '', NULL, NULL, NULL, NULL, NULL, '353', 0, NULL, NULL),
(104, 'ISRAEL', 'Israel', NULL, NULL, NULL, NULL, 'IL', 'ISR', '376', '', '', NULL, NULL, NULL, NULL, NULL, '972', 0, NULL, NULL),
(105, 'ITALY', 'Italy', NULL, NULL, NULL, NULL, 'IT', 'ITA', '380', '', '', NULL, NULL, NULL, NULL, NULL, '39', 0, NULL, NULL),
(106, 'JAMAICA', 'Jamaica', NULL, NULL, NULL, NULL, 'JM', 'JAM', '388', '', '', NULL, NULL, NULL, NULL, NULL, '1876', 0, NULL, NULL),
(107, 'JAPAN', 'Japan', NULL, NULL, NULL, NULL, 'JP', 'JPN', '392', '', '', NULL, NULL, NULL, NULL, NULL, '81', 0, NULL, NULL),
(108, 'JORDAN', 'Jordan', NULL, NULL, NULL, NULL, 'JO', 'JOR', '400', '', '', NULL, NULL, NULL, NULL, NULL, '962', 0, NULL, NULL),
(109, 'KAZAKHSTAN', 'Kazakhstan', NULL, NULL, NULL, NULL, 'KZ', 'KAZ', '398', '', '', NULL, NULL, NULL, NULL, NULL, '7', 0, NULL, NULL),
(110, 'KENYA', 'Kenya', NULL, NULL, NULL, NULL, 'KE', 'KEN', '404', '', '', NULL, NULL, NULL, NULL, NULL, '254', 0, NULL, NULL),
(111, 'KIRIBATI', 'Kiribati', NULL, NULL, NULL, NULL, 'KI', 'KIR', '296', '', '', NULL, NULL, NULL, NULL, NULL, '686', 0, NULL, NULL),
(112, 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', NULL, NULL, NULL, NULL, 'KP', 'PRK', '408', '', '', NULL, NULL, NULL, NULL, NULL, '850', 0, NULL, NULL),
(113, 'KOREA, REPUBLIC OF', 'Korea, Republic of', NULL, NULL, NULL, NULL, 'KR', 'KOR', '410', '', '', NULL, NULL, NULL, NULL, NULL, '82', 0, NULL, NULL),
(114, 'KUWAIT', 'Kuwait', NULL, NULL, NULL, NULL, 'KW', 'KWT', '414', '', '', NULL, NULL, NULL, NULL, NULL, '965', 0, NULL, NULL),
(115, 'KYRGYZSTAN', 'Kyrgyzstan', NULL, NULL, NULL, NULL, 'KG', 'KGZ', '417', '', '', NULL, NULL, NULL, NULL, NULL, '996', 0, NULL, NULL),
(116, 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', NULL, NULL, NULL, NULL, 'LA', 'LAO', '418', '', '', NULL, NULL, NULL, NULL, NULL, '856', 0, NULL, NULL),
(117, 'LATVIA', 'Latvia', NULL, NULL, NULL, NULL, 'LV', 'LVA', '428', '', '', NULL, NULL, NULL, NULL, NULL, '371', 0, NULL, NULL),
(118, 'LEBANON', 'Lebanon', NULL, NULL, NULL, NULL, 'LB', 'LBN', '422', '', '', NULL, NULL, NULL, NULL, NULL, '961', 0, NULL, NULL),
(119, 'LESOTHO', 'Lesotho', NULL, NULL, NULL, NULL, 'LS', 'LSO', '426', '', '', NULL, NULL, NULL, NULL, NULL, '266', 0, NULL, NULL),
(120, 'LIBERIA', 'Liberia', NULL, NULL, NULL, NULL, 'LR', 'LBR', '430', '', '', NULL, NULL, NULL, NULL, NULL, '231', 0, NULL, NULL),
(121, 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', NULL, NULL, NULL, NULL, 'LY', 'LBY', '434', '', '', NULL, NULL, NULL, NULL, NULL, '218', 0, NULL, NULL),
(122, 'LIECHTENSTEIN', 'Liechtenstein', NULL, NULL, NULL, NULL, 'LI', 'LIE', '438', '', '', NULL, NULL, NULL, NULL, NULL, '423', 0, NULL, NULL),
(123, 'LITHUANIA', 'Lithuania', NULL, NULL, NULL, NULL, 'LT', 'LTU', '440', '', '', NULL, NULL, NULL, NULL, NULL, '370', 0, NULL, NULL),
(124, 'LUXEMBOURG', 'Luxembourg', NULL, NULL, NULL, NULL, 'LU', 'LUX', '442', '', '', NULL, NULL, NULL, NULL, NULL, '352', 0, NULL, NULL),
(125, 'MACAO', 'Macao', NULL, NULL, NULL, NULL, 'MO', 'MAC', '446', '', '', NULL, NULL, NULL, NULL, NULL, '853', 0, NULL, NULL),
(126, 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', NULL, NULL, NULL, NULL, 'MK', 'MKD', '807', '', '', NULL, NULL, NULL, NULL, NULL, '389', 0, NULL, NULL),
(127, 'MADAGASCAR', 'Madagascar', NULL, NULL, NULL, NULL, 'MG', 'MDG', '450', '', '', NULL, NULL, NULL, NULL, NULL, '261', 0, NULL, NULL),
(128, 'MALAWI', 'Malawi', NULL, NULL, NULL, NULL, 'MW', 'MWI', '454', '', '', NULL, NULL, NULL, NULL, NULL, '265', 0, NULL, NULL),
(129, 'MALAYSIA', 'Malaysia', NULL, NULL, NULL, NULL, 'MY', 'MYS', '458', '', '', NULL, NULL, NULL, NULL, NULL, '60', 0, NULL, NULL),
(130, 'MALDIVES', 'Maldives', NULL, NULL, NULL, NULL, 'MV', 'MDV', '462', '', '', NULL, NULL, NULL, NULL, NULL, '960', 0, NULL, NULL),
(131, 'MALI', 'Mali', NULL, NULL, NULL, NULL, 'ML', 'MLI', '466', '', '', NULL, NULL, NULL, NULL, NULL, '223', 0, NULL, NULL),
(132, 'MALTA', 'Malta', NULL, NULL, NULL, NULL, 'MT', 'MLT', '470', '', '', NULL, NULL, NULL, NULL, NULL, '356', 0, NULL, NULL),
(133, 'MARSHALL ISLANDS', 'Marshall Islands', NULL, NULL, NULL, NULL, 'MH', 'MHL', '584', '', '', NULL, NULL, NULL, NULL, NULL, '692', 0, NULL, NULL),
(134, 'MARTINIQUE', 'Martinique', NULL, NULL, NULL, NULL, 'MQ', 'MTQ', '474', '', '', NULL, NULL, NULL, NULL, NULL, '596', 0, NULL, NULL),
(135, 'MAURITANIA', 'Mauritania', NULL, NULL, NULL, NULL, 'MR', 'MRT', '478', '', '', NULL, NULL, NULL, NULL, NULL, '222', 0, NULL, NULL),
(136, 'MAURITIUS', 'Mauritius', NULL, NULL, NULL, NULL, 'MU', 'MUS', '480', '', '', NULL, NULL, NULL, NULL, NULL, '230', 0, NULL, NULL),
(137, 'MAYOTTE', 'Mayotte', NULL, NULL, NULL, NULL, 'YT', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '269', 0, NULL, NULL),
(138, 'MEXICO', 'Mexico', NULL, NULL, NULL, NULL, 'MX', 'MEX', '484', '', '', NULL, NULL, NULL, NULL, NULL, '52', 0, NULL, NULL),
(139, 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', NULL, NULL, NULL, NULL, 'FM', 'FSM', '583', '', '', NULL, NULL, NULL, NULL, NULL, '691', 0, NULL, NULL),
(140, 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', NULL, NULL, NULL, NULL, 'MD', 'MDA', '498', '', '', NULL, NULL, NULL, NULL, NULL, '373', 0, NULL, NULL),
(141, 'MONACO', 'Monaco', NULL, NULL, NULL, NULL, 'MC', 'MCO', '492', '', '', NULL, NULL, NULL, NULL, NULL, '377', 0, NULL, NULL),
(142, 'MONGOLIA', 'Mongolia', NULL, NULL, NULL, NULL, 'MN', 'MNG', '496', '', '', NULL, NULL, NULL, NULL, NULL, '976', 0, NULL, NULL),
(143, 'MONTSERRAT', 'Montserrat', NULL, NULL, NULL, NULL, 'MS', 'MSR', '500', '', '', NULL, NULL, NULL, NULL, NULL, '1664', 0, NULL, NULL),
(144, 'MOROCCO', 'Morocco', NULL, NULL, NULL, NULL, 'MA', 'MAR', '504', '', '', NULL, NULL, NULL, NULL, NULL, '212', 0, NULL, NULL),
(145, 'MOZAMBIQUE', 'Mozambique', NULL, NULL, NULL, NULL, 'MZ', 'MOZ', '508', '', '', NULL, NULL, NULL, NULL, NULL, '258', 0, NULL, NULL),
(146, 'MYANMAR', 'Myanmar', NULL, NULL, NULL, NULL, 'MM', 'MMR', '104', '', '', NULL, NULL, NULL, NULL, NULL, '95', 0, NULL, NULL),
(147, 'NAMIBIA', 'Namibia', NULL, NULL, NULL, NULL, 'NA', 'NAM', '516', '', '', NULL, NULL, NULL, NULL, NULL, '264', 0, NULL, NULL),
(148, 'NAURU', 'Nauru', NULL, NULL, NULL, NULL, 'NR', 'NRU', '520', '', '', NULL, NULL, NULL, NULL, NULL, '674', 0, NULL, NULL),
(149, 'NEPAL', 'Nepal', NULL, NULL, NULL, NULL, 'NP', 'NPL', '524', '', '', NULL, NULL, NULL, NULL, NULL, '977', 0, NULL, NULL),
(150, 'NETHERLANDS', 'Netherlands', NULL, NULL, NULL, NULL, 'NL', 'NLD', '528', '', '', NULL, NULL, NULL, NULL, NULL, '31', 0, NULL, NULL),
(151, 'NETHERLANDS ANTILLES', 'Netherlands Antilles', NULL, NULL, NULL, NULL, 'AN', 'ANT', '530', '', '', NULL, NULL, NULL, NULL, NULL, '599', 0, NULL, NULL),
(152, 'NEW CALEDONIA', 'New Caledonia', NULL, NULL, NULL, NULL, 'NC', 'NCL', '540', '', '', NULL, NULL, NULL, NULL, NULL, '687', 0, NULL, NULL),
(153, 'NEW ZEALAND', 'New Zealand', NULL, NULL, NULL, NULL, 'NZ', 'NZL', '554', '', '', NULL, NULL, NULL, NULL, NULL, '64', 0, NULL, NULL),
(154, 'NICARAGUA', 'Nicaragua', NULL, NULL, NULL, NULL, 'NI', 'NIC', '558', '', '', NULL, NULL, NULL, NULL, NULL, '505', 0, NULL, NULL),
(155, 'NIGER', 'Niger', NULL, NULL, NULL, NULL, 'NE', 'NER', '562', '', '', NULL, NULL, NULL, NULL, NULL, '227', 0, NULL, NULL),
(156, 'NIGERIA', 'Nigeria', NULL, NULL, NULL, NULL, 'NG', 'NGA', '566', '', '', NULL, NULL, NULL, NULL, NULL, '234', 0, NULL, NULL),
(157, 'NIUE', 'Niue', NULL, NULL, NULL, NULL, 'NU', 'NIU', '570', '', '', NULL, NULL, NULL, NULL, NULL, '683', 0, NULL, NULL),
(158, 'NORFOLK ISLAND', 'Norfolk Island', NULL, NULL, NULL, NULL, 'NF', 'NFK', '574', '', '', NULL, NULL, NULL, NULL, NULL, '672', 0, NULL, NULL),
(159, 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', NULL, NULL, NULL, NULL, 'MP', 'MNP', '580', '', '', NULL, NULL, NULL, NULL, NULL, '1670', 0, NULL, NULL),
(160, 'NORWAY', 'Norway', NULL, NULL, NULL, NULL, 'NO', 'NOR', '578', '', '', NULL, NULL, NULL, NULL, NULL, '47', 0, NULL, NULL),
(161, 'OMAN', 'Oman', NULL, NULL, NULL, NULL, 'OM', 'OMN', '512', '', '', NULL, NULL, NULL, NULL, NULL, '968', 0, NULL, NULL),
(162, 'PAKISTAN', 'Pakistan', NULL, NULL, NULL, NULL, 'PK', 'PAK', '586', '', '', NULL, NULL, NULL, NULL, NULL, '92', 0, NULL, NULL),
(163, 'PALAU', 'Palau', NULL, NULL, NULL, NULL, 'PW', 'PLW', '585', '', '', NULL, NULL, NULL, NULL, NULL, '680', 0, NULL, NULL),
(164, 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, NULL, NULL, 'PS', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '970', 0, NULL, NULL),
(165, 'PANAMA', 'Panama', NULL, NULL, NULL, NULL, 'PA', 'PAN', '591', '', '', NULL, NULL, NULL, NULL, NULL, '507', 0, NULL, NULL),
(166, 'PAPUA NEW GUINEA', 'Papua New Guinea', NULL, NULL, NULL, NULL, 'PG', 'PNG', '598', '', '', NULL, NULL, NULL, NULL, NULL, '675', 0, NULL, NULL),
(167, 'PARAGUAY', 'Paraguay', NULL, NULL, NULL, NULL, 'PY', 'PRY', '600', '', '', NULL, NULL, NULL, NULL, NULL, '595', 0, NULL, NULL),
(168, 'PERU', 'Peru', NULL, NULL, NULL, NULL, 'PE', 'PER', '604', '', '', NULL, NULL, NULL, NULL, NULL, '51', 0, NULL, NULL),
(169, 'PHILIPPINES', 'Philippines', NULL, NULL, NULL, NULL, 'PH', 'PHL', '608', '', '', NULL, NULL, NULL, NULL, NULL, '63', 0, NULL, NULL),
(170, 'PITCAIRN', 'Pitcairn', NULL, NULL, NULL, NULL, 'PN', 'PCN', '612', '', '', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL),
(171, 'POLAND', 'Poland', NULL, NULL, NULL, NULL, 'PL', 'POL', '616', '', '', NULL, NULL, NULL, NULL, NULL, '48', 0, NULL, NULL),
(172, 'PORTUGAL', 'Portugal', NULL, NULL, NULL, NULL, 'PT', 'PRT', '620', '', '', NULL, NULL, NULL, NULL, NULL, '351', 0, NULL, NULL),
(173, 'PUERTO RICO', 'Puerto Rico', NULL, NULL, NULL, NULL, 'PR', 'PRI', '630', '', '', NULL, NULL, NULL, NULL, NULL, '1787', 0, NULL, NULL),
(174, 'QATAR', 'Qatar', NULL, NULL, NULL, NULL, 'QA', 'QAT', '634', '', '', NULL, NULL, NULL, NULL, NULL, '974', 0, NULL, NULL),
(175, 'REUNION', 'Reunion', NULL, NULL, NULL, NULL, 'RE', 'REU', '638', '', '', NULL, NULL, NULL, NULL, NULL, '262', 0, NULL, NULL),
(176, 'ROMANIA', 'Romania', NULL, NULL, NULL, NULL, 'RO', 'ROM', '642', '', '', NULL, NULL, NULL, NULL, NULL, '40', 0, NULL, NULL),
(177, 'RUSSIAN FEDERATION', 'Russian Federation', NULL, NULL, NULL, NULL, 'RU', 'RUS', '643', '', '', NULL, NULL, NULL, NULL, NULL, '70', 0, NULL, NULL),
(178, 'RWANDA', 'Rwanda', NULL, NULL, NULL, NULL, 'RW', 'RWA', '646', '', '', NULL, NULL, NULL, NULL, NULL, '250', 0, NULL, NULL),
(179, 'SAINT HELENA', 'Saint Helena', NULL, NULL, NULL, NULL, 'SH', 'SHN', '654', '', '', NULL, NULL, NULL, NULL, NULL, '290', 0, NULL, NULL),
(180, 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', NULL, NULL, NULL, NULL, 'KN', 'KNA', '659', '', '', NULL, NULL, NULL, NULL, NULL, '1869', 0, NULL, NULL),
(181, 'SAINT LUCIA', 'Saint Lucia', NULL, NULL, NULL, NULL, 'LC', 'LCA', '662', '', '', NULL, NULL, NULL, NULL, NULL, '1758', 0, NULL, NULL),
(182, 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', NULL, NULL, NULL, NULL, 'PM', 'SPM', '666', '', '', NULL, NULL, NULL, NULL, NULL, '508', 0, NULL, NULL),
(183, 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', NULL, NULL, NULL, NULL, 'VC', 'VCT', '670', '', '', NULL, NULL, NULL, NULL, NULL, '1784', 0, NULL, NULL),
(184, 'SAMOA', 'Samoa', NULL, NULL, NULL, NULL, 'WS', 'WSM', '882', '', '', NULL, NULL, NULL, NULL, NULL, '684', 0, NULL, NULL),
(185, 'SAN MARINO', 'San Marino', NULL, NULL, NULL, NULL, 'SM', 'SMR', '674', '', '', NULL, NULL, NULL, NULL, NULL, '378', 0, NULL, NULL),
(186, 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', NULL, NULL, NULL, NULL, 'ST', 'STP', '678', '', '', NULL, NULL, NULL, NULL, NULL, '239', 0, NULL, NULL),
(187, 'SAUDI ARABIA', 'Saudi Arabia', NULL, NULL, NULL, NULL, 'SA', 'SAU', '682', '', '', NULL, NULL, NULL, NULL, NULL, '966', 0, NULL, NULL),
(188, 'SENEGAL', 'Senegal', NULL, NULL, NULL, NULL, 'SN', 'SEN', '686', '', '', NULL, NULL, NULL, NULL, NULL, '221', 0, NULL, NULL),
(189, 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, NULL, NULL, 'CS', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '381', 0, NULL, NULL),
(190, 'SEYCHELLES', 'Seychelles', NULL, NULL, NULL, NULL, 'SC', 'SYC', '690', '', '', NULL, NULL, NULL, NULL, NULL, '248', 0, NULL, NULL),
(191, 'SIERRA LEONE', 'Sierra Leone', NULL, NULL, NULL, NULL, 'SL', 'SLE', '694', '', '', NULL, NULL, NULL, NULL, NULL, '232', 0, NULL, NULL),
(192, 'SINGAPORE', 'Singapore', NULL, NULL, NULL, NULL, 'SG', 'SGP', '702', '', '', NULL, NULL, NULL, NULL, NULL, '65', 0, NULL, NULL),
(193, 'SLOVAKIA', 'Slovakia', NULL, NULL, NULL, NULL, 'SK', 'SVK', '703', '', '', NULL, NULL, NULL, NULL, NULL, '421', 0, NULL, NULL),
(194, 'SLOVENIA', 'Slovenia', NULL, NULL, NULL, NULL, 'SI', 'SVN', '705', '', '', NULL, NULL, NULL, NULL, NULL, '386', 0, NULL, NULL),
(195, 'SOLOMON ISLANDS', 'Solomon Islands', NULL, NULL, NULL, NULL, 'SB', 'SLB', '90', '', '', NULL, NULL, NULL, NULL, NULL, '677', 0, NULL, NULL),
(196, 'SOMALIA', 'Somalia', NULL, NULL, NULL, NULL, 'SO', 'SOM', '706', '', '', NULL, NULL, NULL, NULL, NULL, '252', 0, NULL, NULL),
(197, 'SOUTH AFRICA', 'South Africa', NULL, NULL, NULL, NULL, 'ZA', 'ZAF', '710', '', '', NULL, NULL, NULL, NULL, NULL, '27', 0, NULL, NULL),
(198, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, NULL, NULL, 'GS', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL),
(199, 'SPAIN', 'Spain', NULL, NULL, NULL, NULL, 'ES', 'ESP', '724', '', '', NULL, NULL, NULL, NULL, NULL, '34', 0, NULL, NULL),
(200, 'SRI LANKA', 'Sri Lanka', NULL, NULL, NULL, NULL, 'LK', 'LKA', '144', '', '', NULL, NULL, NULL, NULL, NULL, '94', 0, NULL, NULL),
(201, 'SUDAN', 'Sudan', NULL, NULL, NULL, NULL, 'SD', 'SDN', '736', '', '', NULL, NULL, NULL, NULL, NULL, '249', 0, NULL, NULL),
(202, 'SURINAME', 'Suriname', NULL, NULL, NULL, NULL, 'SR', 'SUR', '740', '', '', NULL, NULL, NULL, NULL, NULL, '597', 0, NULL, NULL),
(203, 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', NULL, NULL, NULL, NULL, 'SJ', 'SJM', '744', '', '', NULL, NULL, NULL, NULL, NULL, '47', 0, NULL, NULL),
(204, 'SWAZILAND', 'Swaziland', NULL, NULL, NULL, NULL, 'SZ', 'SWZ', '748', '', '', NULL, NULL, NULL, NULL, NULL, '268', 0, NULL, NULL),
(205, 'SWEDEN', 'Sweden', NULL, NULL, NULL, NULL, 'SE', 'SWE', '752', '', '', NULL, NULL, NULL, NULL, NULL, '46', 0, NULL, NULL),
(206, 'SWITZERLAND', 'Switzerland', NULL, NULL, NULL, NULL, 'CH', 'CHE', '756', '', '', NULL, NULL, NULL, NULL, NULL, '41', 0, NULL, NULL),
(207, 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', NULL, NULL, NULL, NULL, 'SY', 'SYR', '760', '', '', NULL, NULL, NULL, NULL, NULL, '963', 0, NULL, NULL),
(208, 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', NULL, NULL, NULL, NULL, 'TW', 'TWN', '158', '', '', NULL, NULL, NULL, NULL, NULL, '886', 0, NULL, NULL),
(209, 'TAJIKISTAN', 'Tajikistan', NULL, NULL, NULL, NULL, 'TJ', 'TJK', '762', '', '', NULL, NULL, NULL, NULL, NULL, '992', 0, NULL, NULL),
(210, 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', NULL, NULL, NULL, NULL, 'TZ', 'TZA', '834', '', '', NULL, NULL, NULL, NULL, NULL, '255', 0, NULL, NULL),
(211, 'THAILAND', 'Thailand', NULL, NULL, NULL, NULL, 'TH', 'THA', '764', '', '', NULL, NULL, NULL, NULL, NULL, '66', 0, NULL, NULL),
(212, 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, NULL, NULL, 'TL', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '670', 0, NULL, NULL),
(213, 'TOGO', 'Togo', NULL, NULL, NULL, NULL, 'TG', 'TGO', '768', '', '', NULL, NULL, NULL, NULL, NULL, '228', 0, NULL, NULL),
(214, 'TOKELAU', 'Tokelau', NULL, NULL, NULL, NULL, 'TK', 'TKL', '772', '', '', NULL, NULL, NULL, NULL, NULL, '690', 0, NULL, NULL),
(215, 'TONGA', 'Tonga', NULL, NULL, NULL, NULL, 'TO', 'TON', '776', '', '', NULL, NULL, NULL, NULL, NULL, '676', 0, NULL, NULL),
(216, 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', NULL, NULL, NULL, NULL, 'TT', 'TTO', '780', '', '', NULL, NULL, NULL, NULL, NULL, '1868', 0, NULL, NULL),
(217, 'TUNISIA', 'Tunisia', NULL, NULL, NULL, NULL, 'TN', 'TUN', '788', '', '', NULL, NULL, NULL, NULL, NULL, '216', 0, NULL, NULL),
(218, 'TURKEY', 'Turkey', NULL, NULL, NULL, NULL, 'TR', 'TUR', '792', '', '', NULL, NULL, NULL, NULL, NULL, '90', 0, NULL, NULL),
(219, 'TURKMENISTAN', 'Turkmenistan', NULL, NULL, NULL, NULL, 'TM', 'TKM', '795', '', '', NULL, NULL, NULL, NULL, NULL, '7370', 0, NULL, NULL),
(220, 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', NULL, NULL, NULL, NULL, 'TC', 'TCA', '796', '', '', NULL, NULL, NULL, NULL, NULL, '1649', 0, NULL, NULL),
(221, 'TUVALU', 'Tuvalu', NULL, NULL, NULL, NULL, 'TV', 'TUV', '798', '', '', NULL, NULL, NULL, NULL, NULL, '688', 0, NULL, NULL),
(222, 'UGANDA', 'Uganda', NULL, NULL, NULL, NULL, 'UG', 'UGA', '800', '', '', NULL, NULL, NULL, NULL, NULL, '256', 0, NULL, NULL),
(223, 'UKRAINE', 'Ukraine', NULL, NULL, NULL, NULL, 'UA', 'UKR', '804', '', '', NULL, NULL, NULL, NULL, NULL, '380', 0, NULL, NULL),
(224, 'UNITED ARAB EMIRATES', 'United Arab Emirates', NULL, NULL, NULL, NULL, 'AE', 'ARE', '784', '', '', NULL, NULL, NULL, NULL, NULL, '971', 0, NULL, NULL),
(225, 'UNITED KINGDOM', 'United Kingdom', NULL, NULL, NULL, NULL, 'GB', 'GBR', '826', '', '', NULL, NULL, NULL, NULL, NULL, '44', 0, NULL, NULL),
(226, 'UNITED STATES', 'United States', NULL, NULL, NULL, NULL, 'US', 'USA', '840', '', '', NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL),
(227, 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, NULL, NULL, 'UM', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL),
(228, 'URUGUAY', 'Uruguay', NULL, NULL, NULL, NULL, 'UY', 'URY', '858', '', '', NULL, NULL, NULL, NULL, NULL, '598', 0, NULL, NULL),
(229, 'UZBEKISTAN', 'Uzbekistan', NULL, NULL, NULL, NULL, 'UZ', 'UZB', '860', '', '', NULL, NULL, NULL, NULL, NULL, '998', 0, NULL, NULL),
(230, 'VANUATU', 'Vanuatu', NULL, NULL, NULL, NULL, 'VU', 'VUT', '548', '', '', NULL, NULL, NULL, NULL, NULL, '678', 0, NULL, NULL),
(231, 'VENEZUELA', 'Venezuela', NULL, NULL, NULL, NULL, 'VE', 'VEN', '862', '', '', NULL, NULL, NULL, NULL, NULL, '58', 0, NULL, NULL),
(232, 'VIET NAM', 'Viet Nam', NULL, NULL, NULL, NULL, 'VN', 'VNM', '704', '', '', NULL, NULL, NULL, NULL, NULL, '84', 0, NULL, NULL),
(233, 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', NULL, NULL, NULL, NULL, 'VG', 'VGB', '92', '', '', NULL, NULL, NULL, NULL, NULL, '1284', 0, NULL, NULL),
(234, 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', NULL, NULL, NULL, NULL, 'VI', 'VIR', '850', '', '', NULL, NULL, NULL, NULL, NULL, '1340', 0, NULL, NULL),
(235, 'WALLIS AND FUTUNA', 'Wallis and Futuna', NULL, NULL, NULL, NULL, 'WF', 'WLF', '876', '', '', NULL, NULL, NULL, NULL, NULL, '681', 0, NULL, NULL),
(236, 'WESTERN SAHARA', 'Western Sahara', NULL, NULL, NULL, NULL, 'EH', 'ESH', '732', '', '', NULL, NULL, NULL, NULL, NULL, '212', 0, NULL, NULL),
(237, 'YEMEN', 'Yemen', NULL, NULL, NULL, NULL, 'YE', 'YEM', '887', '', '', NULL, NULL, NULL, NULL, NULL, '967', 0, NULL, NULL),
(238, 'ZAMBIA', 'Zambia', NULL, NULL, NULL, NULL, 'ZM', 'ZMB', '894', '', '', NULL, NULL, NULL, NULL, NULL, '260', 0, NULL, NULL),
(239, 'ZIMBABWE', 'Zimbabwe', NULL, NULL, NULL, NULL, 'ZW', 'ZWE', '716', '', '', NULL, NULL, NULL, NULL, NULL, '263', 0, NULL, NULL),
(240, 'SERBIA', 'Serbia', NULL, NULL, NULL, NULL, 'RS', 'SRB', '688', '', '', NULL, NULL, NULL, NULL, NULL, '381', 0, NULL, NULL),
(241, 'ASIA PACIFIC REGION', 'Asia / Pacific Region', NULL, NULL, NULL, NULL, 'AP', '0', '0', '', '', NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL),
(242, 'MONTENEGRO', 'Montenegro', NULL, NULL, NULL, NULL, 'ME', 'MNE', '499', '', '', NULL, NULL, NULL, NULL, NULL, '382', 0, NULL, NULL),
(243, 'ALAND ISLANDS', 'Aland Islands', NULL, NULL, NULL, NULL, 'AX', 'ALA', '248', '', '', NULL, NULL, NULL, NULL, NULL, '358', 0, NULL, NULL),
(244, 'BONAIRE, SINT EUSTATIUS AND SABA', 'Bonaire, Sint Eustatius and Saba', NULL, NULL, NULL, NULL, 'BQ', 'BES', '535', '', '', NULL, NULL, NULL, NULL, NULL, '599', 0, NULL, NULL),
(245, 'CURACAO', 'Curacao', NULL, NULL, NULL, NULL, 'CW', 'CUW', '531', '', '', NULL, NULL, NULL, NULL, NULL, '599', 0, NULL, NULL),
(246, 'GUERNSEY', 'Guernsey', NULL, NULL, NULL, NULL, 'GG', 'GGY', '831', '', '', NULL, NULL, NULL, NULL, NULL, '44', 0, NULL, NULL),
(247, 'ISLE OF MAN', 'Isle of Man', NULL, NULL, NULL, NULL, 'IM', 'IMN', '833', '', '', NULL, NULL, NULL, NULL, NULL, '44', 0, NULL, NULL),
(248, 'JERSEY', 'Jersey', NULL, NULL, NULL, NULL, 'JE', 'JEY', '832', '', '', NULL, NULL, NULL, NULL, NULL, '44', 0, NULL, NULL),
(249, 'KOSOVO', 'Kosovo', NULL, NULL, NULL, NULL, 'XK', '---', '0', '', '', NULL, NULL, NULL, NULL, NULL, '381', 0, NULL, NULL),
(250, 'SAINT BARTHELEMY', 'Saint Barthelemy', NULL, NULL, NULL, NULL, 'BL', 'BLM', '652', '', '', NULL, NULL, NULL, NULL, NULL, '590', 0, NULL, NULL),
(251, 'SAINT MARTIN', 'Saint Martin', NULL, NULL, NULL, NULL, 'MF', 'MAF', '663', '', '', NULL, NULL, NULL, NULL, NULL, '590', 0, NULL, NULL),
(252, 'SINT MAARTEN', 'Sint Maarten', NULL, NULL, NULL, NULL, 'SX', 'SXM', '534', '', '', NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL),
(253, 'SOUTH SUDAN', 'South Sudan', NULL, NULL, NULL, NULL, 'SS', 'SSD', '728', '', '', NULL, NULL, NULL, NULL, NULL, '211', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `des_imgs`
--

CREATE TABLE `des_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `des_imgs`
--

INSERT INTO `des_imgs` (`id`, `campaign_id`, `image_path`, `video_path`, `created_at`, `updated_at`) VALUES
(1, 21, '/uploads/descrip/full/1644314207jfptp-ab1.jpg', NULL, '2022-02-08 03:56:47', '2022-02-08 03:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `campaign_id`, `text`, `image_path`, `video_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 1, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 1, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 1, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 2, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 2, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 2, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 2, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 3, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(10, 3, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(11, 3, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(12, 3, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(13, 4, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(14, 4, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(15, 4, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(16, 4, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(17, 5, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(18, 5, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(19, 5, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(20, 5, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(22, 6, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(23, 6, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(24, 6, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(25, 6, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(26, 7, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(27, 7, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(28, 7, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(29, 7, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(30, 8, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(31, 8, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(32, 8, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(33, 8, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(34, 9, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(35, 9, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(36, 9, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(37, 9, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(38, 10, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(39, 10, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(40, 10, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(41, 10, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(42, 11, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(43, 11, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(44, 11, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(45, 11, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(46, 12, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(47, 12, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(48, 12, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(49, 12, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(50, 13, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(51, 13, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(52, 13, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(53, 13, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(54, 14, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(55, 14, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(56, 14, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(57, 14, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(58, 15, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(59, 15, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(60, 15, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(61, 15, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(62, 16, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(63, 16, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(64, 16, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(65, 16, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(66, 17, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(67, 17, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(68, 17, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(69, 17, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(70, 18, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(71, 18, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(72, 18, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(73, 18, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(74, 19, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(75, 19, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(76, 19, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(77, 19, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(78, 20, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(79, 20, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(80, 20, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(81, 20, 'this is some document text for this campaign', '/uploads/documents/163194204903wlm-03_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(82, 21, NULL, '/uploads/documents/16443141104shrz-b6.jpg', NULL, '2022-02-08 03:55:10', '2022-02-08 03:55:10'),
(83, 21, NULL, '/uploads/documents/1644314110jw2ua-b7.jpg', NULL, '2022-02-08 03:55:10', '2022-02-08 03:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `anonymous` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Open',
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `user_id`, `anonymous`, `campaign_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Open', 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 1, 'Open', 4, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 1, 'Open', 5, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 1, 'Open', 7, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 1, 'Open', 9, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 1, 'Open', 11, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 1, 'Open', 13, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 1, 'Open', 15, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 1, 'Open', 17, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(10, 1, 'Open', 19, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(11, 8, 'Open', 21, '2022-02-08 08:36:55', '2022-02-08 08:36:55');

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
-- Table structure for table `investigations`
--

CREATE TABLE `investigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `text_report` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investigations`
--

INSERT INTO `investigations` (`id`, `user_id`, `campaign_id`, `text_report`, `image_report`, `video_report`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'this some investigation description for this campaign', '', '', 'no', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 1, 2, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 1, 3, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 1, 4, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 1, 5, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 1, 6, 'this some investigation description for this campaign', '', '', 'no', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 1, 7, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 1, 8, 'this some investigation description for this campaign', '', '', 'no', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 1, 9, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(11, 1, 11, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(13, 1, 13, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(14, 1, 14, 'this some investigation description for this campaign', '', '', 'no', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(15, 1, 15, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(16, 1, 16, 'this some investigation description for this campaign', '', '', 'no', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(17, 1, 17, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(18, 1, 18, 'this some investigation description for this campaign', '', '', 'no', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(19, 1, 19, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(20, 1, 20, 'this some investigation description for this campaign', '', '', 'yes', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(21, 7, 21, 'investigated', NULL, NULL, 'yes', '2022-02-08 04:18:39', '2022-02-08 04:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `campaign_id`, `created_at`, `updated_at`) VALUES
(5, 1, 5, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 1, 6, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 1, 7, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 1, 8, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 1, 9, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(10, 1, 10, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(11, 2, 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(12, 2, 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(13, 2, 3, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(14, 2, 4, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(15, 2, 5, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(16, 2, 6, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(17, 2, 7, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(18, 2, 8, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(19, 2, 9, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(20, 2, 10, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(21, 3, 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(22, 3, 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(23, 3, 3, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(24, 3, 4, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(25, 3, 5, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(26, 3, 6, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(27, 3, 7, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(28, 3, 8, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(29, 3, 9, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(30, 3, 10, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(31, 4, 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(32, 4, 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(33, 4, 3, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(34, 4, 4, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(35, 4, 5, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(36, 4, 6, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(37, 4, 7, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(38, 4, 8, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(39, 4, 9, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(40, 4, 10, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(41, 5, 1, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(42, 5, 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(43, 5, 3, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(44, 5, 4, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(45, 5, 5, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(46, 5, 6, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(47, 5, 7, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(48, 5, 8, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(49, 5, 9, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(50, 5, 10, '2021-08-04 22:17:09', '2021-08-04 22:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `like_for_comments`
--

CREATE TABLE `like_for_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000008_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_23_070833_create_countries_table', 1),
(5, '2021_07_30_111430_create_permissions_table', 1),
(6, '2021_07_30_111517_create_roles_table', 1),
(7, '2021_07_30_133118_create_users_roles_table', 1),
(8, '2021_07_30_133154_create_roles_permissions_table', 1),
(9, '2021_07_30_153333_create_users_permissions_table', 1),
(10, '2021_08_01_052117_create_campaigns_table', 1),
(11, '2021_08_02_043456_create_categories_table', 1),
(12, '2021_08_06_043549_create_donations_table', 1),
(13, '2021_08_06_060441_create_payments_table', 1),
(14, '2021_08_06_064102_create_banks_table', 1),
(15, '2021_08_06_064210_create_mobile_banks_table', 1),
(16, '2021_08_06_102751_create_addresses_table', 1),
(17, '2021_08_09_061859_create_views_table', 1),
(18, '2021_08_11_145424_create_likes_table', 1),
(19, '2021_08_11_150609_create_shares_table', 1),
(20, '2021_08_16_133636_create_investigations_table', 1),
(21, '2021_08_21_031959_create_comments_table', 1),
(22, '2021_08_25_090713_create_documents_table', 1),
(23, '2021_09_18_090929_create_updates_table', 1),
(24, '2021_09_19_063104_create_albums_table', 1),
(25, '2021_09_20_111922_create_update_items_table', 1),
(26, '2021_10_15_094418_create_user_extras_table', 1),
(27, '2021_10_26_105457_create_withdraw_requests_table', 1),
(28, '2021_10_26_105614_create_withdraw_request_items_table', 1),
(29, '2021_10_26_135850_create_withdraw_payments_table', 1),
(30, '2021_12_24_064410_create_like_for_comments_table', 1),
(31, '2022_01_09_065016_create_des_imgs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_banks`
--

CREATE TABLE `mobile_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobile_banks`
--

INSERT INTO `mobile_banks` (`id`, `user_id`, `brand_name`, `mobile_number`, `owner_name`, `owner_nid`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bkash', '0987780870978', 'Saif Khan Faysal', '1990751105700003', 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 2, 'Bkash', '0987780870978', 'Mujahidul Islam Rony', '1990751105700003', 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 3, 'Bkash', '0987780870978', 'Sabbir Uddin Khan', '1990751105700003', 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 4, 'Bkash', '0987780870978', 'Arafat Irin Pinky', '1990751105700003', 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 5, 'Bkash', '0987780870978', 'Afroza Parvin Fancy', '1990751105700003', 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donation_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `donation_id`, `amount`, `currency`, `trans_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 50000, 'BDT', '101', 'Processing', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 2, 50000, 'BDT', '102', 'Processing', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 3, 50000, 'BDT', '103', 'Processing', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 4, 50000, 'BDT', '104', 'Processing', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 5, 50000, 'BDT', '105', 'Processing', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 6, 50000, 'BDT', '106', 'Processing', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 7, 50000, 'BDT', '107', 'Processing', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 8, 50000, 'BDT', '108', 'Processing', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 9, 50000, 'BDT', '109', 'Processing', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(10, 10, 50000, 'BDT', '110', 'Processing', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(11, 11, 50, 'BDT', '62028007acc22', 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `shared_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `user_id`, `campaign_id`, `shared_link`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 1, 2, '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 1, 3, '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 2, 1, '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 2, 2, '', '2021-08-04 22:17:09', '2021-08-04 22:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `descrip` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `campaign_id`, `descrip`, `created_at`, `updated_at`) VALUES
(1, 1, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 2, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 3, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 4, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 5, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 6, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 7, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 8, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 9, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(10, 10, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(11, 11, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(12, 12, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(13, 13, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(14, 14, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(15, 15, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(16, 16, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(17, 17, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(18, 18, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(19, 19, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(20, 20, 'here will be put some description for this campaign', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(21, 21, 'my pet was injured at only one let before, because of which, it\'s diying now. but today it going to loose it\'s the only other leg also.', '2022-02-08 03:59:07', '2022-02-08 03:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `update_items`
--

CREATE TABLE `update_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `update_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `update_items`
--

INSERT INTO `update_items` (`id`, `update_id`, `image_path`, `video_path`, `created_at`, `updated_at`) VALUES
(1, 1, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 1, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 1, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 1, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 2, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 2, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 2, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 2, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 3, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(10, 3, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(11, 3, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(12, 3, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(13, 4, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(14, 4, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(15, 4, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(16, 4, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(17, 5, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(18, 5, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(19, 5, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(20, 5, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(22, 6, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(23, 6, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(24, 6, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(25, 6, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(26, 7, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(27, 7, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(28, 7, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(29, 7, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(30, 8, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(31, 8, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(32, 8, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(33, 8, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(34, 9, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(35, 9, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(36, 9, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(37, 9, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(38, 10, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(39, 10, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(40, 10, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(41, 10, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(42, 11, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(43, 11, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(44, 11, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(45, 11, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(46, 12, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(47, 12, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(48, 12, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(49, 12, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(50, 13, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(51, 13, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(52, 13, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(53, 13, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(54, 14, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(55, 14, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(56, 14, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(57, 14, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(58, 15, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(59, 15, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(60, 15, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(61, 15, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(62, 16, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(63, 16, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(64, 16, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(65, 16, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(66, 17, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(67, 17, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(68, 17, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(69, 17, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(70, 18, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(71, 18, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(72, 18, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(73, 18, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(74, 19, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(75, 19, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(76, 19, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(77, 19, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(78, 20, '/uploads/updates/16321297892m53y-bg1_1.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(79, 20, '/uploads/updates/16321297892m53y-bg1_2.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(80, 20, '/uploads/updates/16321297892m53y-bg1_3.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(81, 20, '/uploads/updates/16321297892m53y-bg1_4.jpg', '', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(82, 21, '/uploads/updates/16443143473nmbi-ab2.jpg', NULL, '2022-02-08 03:59:08', '2022-02-08 03:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `fb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_expires_at` datetime DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_volunteer` tinyint(4) NOT NULL DEFAULT 0,
  `is_special` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No Information about the fundraiser is provided',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `fb_id`, `google_id`, `password`, `two_factor_code`, `two_factor_expires_at`, `active_status`, `is_volunteer`, `is_special`, `is_admin`, `is_super`, `photo`, `gender`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Saif Khan Faysal', 'saifkhanfaysall@gmail.com', '2022-02-08 04:04:42', NULL, NULL, '$2y$10$e/mHTOSLxSeTGzhePQdHaeNjOykVnjpS0CQo7OS7c06Cw63vAK/pK', NULL, NULL, 1, 0, 0, 1, 1, '/uploads/avatar/16323014866lxdr-auroracoin_1.png', 'male', 'No Information about the fundraiser is provided', '0qxg4LWwB3RTqLxgRJmPxCHreNTPxrHpWAPDNNcAL6Y5pyZNNjilf6UnL7re', '2021-08-04 22:17:09', '2022-02-08 04:04:42'),
(2, 'Mujahidul Islam Rony', 'rolena2z@gmail.com', NULL, NULL, NULL, '$2y$10$2oZxv5x/S0P2q27IyshFfOwOGYGwqaWKaadmPC8Ky/cp14oOOefVO', NULL, NULL, 1, 0, 0, 1, 0, '/uploads/avatar/16323014866lxdr-auroracoin_2.png', 'male', 'No Information about the fundraiser is provided', NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 'Sabbir Uddin Khan', 'sabbiruddinpavel@gmail.com', NULL, NULL, NULL, '$2y$10$kstPPjAl7eCXFqad5lCSUem/lf9/hRj5YySO6Sbesxf00gozplicy', NULL, NULL, 1, 0, 0, 0, 0, '/uploads/avatar/16323014866lxdr-auroracoin_3.png', 'male', 'No Information about the fundraiser is provided', NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 'Arafat Irin Pinky', 'pinky@gmail.com', NULL, NULL, NULL, '$2y$10$mgrPfYfYhY3SRTnAiDhY6O9/DOhwGMKBp4v.hKcNS99yLS.2ldeHO', NULL, NULL, 1, 0, 0, 0, 0, '/uploads/avatar/16323014866lxdr-auroracoin_4.png', 'female', 'No Information about the fundraiser is provided', NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 'Afroza Parvin Fancy', 'fancy@gmail.com', NULL, NULL, NULL, '$2y$10$x3TAjwMILxUrFWT9Tce/He/0K4uF2S9zCyXG0z56woKuttV.M3JWi', NULL, NULL, 1, 0, 0, 0, 0, '/uploads/avatar/16323014866lxdr-auroracoin_5.png', 'female', 'No Information about the fundraiser is provided', NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 'saif camp', 'saifcamp@gmail.com', '2022-02-08 03:46:47', NULL, NULL, '$2y$10$LGMBBuNN4bJJropECA0I8uVtcU8kurkjLWi5tTh9FAbeqvJiUTA7q', NULL, NULL, 1, 0, 0, 0, 0, '/uploads/avatar/16443137697rwum-b5.jpg', 'male', 'No Information about the fundraiser is provided', '1gKPD99vG5ZAFYOP6ho6gX5KCJPTqncqJ59DUU8AZwvb3KOC7ozNx3223S5Q', '2022-02-08 03:46:24', '2022-02-08 03:49:29'),
(7, 'saif inv', 'saifinv@gmail.com', '2022-02-08 04:06:52', NULL, NULL, '$2y$10$qlro5JERdQjmlGnYiLQqzuSButMUSltxP6k8lYCCq3ZwL/wr9/iYa', NULL, NULL, 1, 4, 0, 0, 0, NULL, 'male', 'No Information about the fundraiser is provided', 'JkH4vfHmXVGCKtNTbrN7z31zPyNEav5Vok0FWGRjRjU3Muw2pj6jRksx80V1', '2022-02-08 04:06:10', '2022-02-08 11:01:35'),
(8, 'saif donor', 'saifdonor@gmail.com', '2022-02-08 15:14:55', NULL, NULL, '$2y$10$pIqr3w50XMXvzIPbhjStIe.TbVtvOTB62AXpWYrWycx7hMjsXFaZa', NULL, NULL, 1, 2, 0, 0, 0, NULL, 'male', 'asdfasdfasdf', '4XqBY7lVmsBdwpYAb4DEmTySV4a02KHdvP5MUtw9S65vvr94OzvSaZvgjvhy', '2022-02-08 08:35:47', '2022-02-08 10:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_extras`
--

CREATE TABLE `user_extras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` bigint(20) DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `careof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `careof_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_extras`
--

INSERT INTO `user_extras` (`id`, `user_id`, `birth_date`, `phone`, `nid`, `facebook`, `twitter`, `careof`, `careof_phone`, `created_at`, `updated_at`) VALUES
(1, 1, '1990-05-30', '01873334000', 0, 'http://www.facebook.com/saif.khan.faysall', 'https://www.twitter.com', 'father of Saif Khan Faysal', '01873334000', '2021-08-04 22:17:09', '2022-02-08 05:53:49'),
(2, 2, '1990-05-30', '01873334000', 199075110570000032, 'http://www.facebook.com/saif.khan.faysall', 'https://www.twitter.com', 'father of Mujahidul Islam Rony', '01873334000', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 3, '1990-05-30', '01873334000', 199075110570000033, 'http://www.facebook.com/saif.khan.faysall', 'https://www.twitter.com', 'father of Sabbir Uddin Khan', '01873334000', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 4, '1990-05-30', '01873334000', 199075110570000034, 'http://www.facebook.com/saif.khan.faysall', 'https://www.twitter.com', 'father of Arafat Irin Pinky', '01873334000', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 5, '1990-05-30', '01873334000', 199075110570000035, 'http://www.facebook.com/saif.khan.faysall', 'https://www.twitter.com', 'father of Afroza Parvin Fancy', '01873334000', '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 6, '1990-05-30', '01914764834', 1990751105700000310, 'www.facebook.com/saif.khan.faysall', 'www.twitter.com/saif.khan.faysall', 'Abul Hossen', '01873334000', '2022-02-08 03:46:24', '2022-02-08 03:49:18'),
(7, 7, '2010-01-08', '9999999999', 199075110570000014, 'www.facebook.com/saif.khan.faysall', 'www.twitter.com/saif.khan.faysall', 'Abul Hossen', '9999999999', '2022-02-08 04:06:10', '2022-02-08 04:14:02'),
(8, 8, '2022-02-09', '01914764834', 1990751105700, 'www.facebook.com/saif.khan.faysall', 'www.twitter.com/saif.khan.faysall', 'Abul Hossen', '01873334000', '2022-02-08 08:35:47', '2022-02-08 10:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `user_id`, `campaign_id`, `created_at`, `updated_at`) VALUES
(5, 1, 5, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 1, 7, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(9, 1, 9, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(12, 2, 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(13, 2, 3, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(14, 2, 4, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(15, 2, 5, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(17, 2, 7, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(19, 2, 9, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(22, 3, 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(23, 3, 3, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(24, 3, 4, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(25, 3, 5, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(27, 3, 7, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(29, 3, 9, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(32, 4, 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(33, 4, 3, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(34, 4, 4, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(35, 4, 5, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(37, 4, 7, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(39, 4, 9, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(42, 5, 2, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(43, 5, 3, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(44, 5, 4, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(45, 5, 5, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(47, 5, 7, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(49, 5, 9, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(50, 1, 21, '2022-02-08 04:19:33', '2022-02-08 04:19:33'),
(51, 8, 21, '2022-02-08 08:36:12', '2022-02-08 08:36:12'),
(52, 7, 21, '2022-02-08 09:07:48', '2022-02-08 09:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_payments`
--

CREATE TABLE `withdraw_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_request_id` bigint(20) UNSIGNED NOT NULL,
  `payment_meth_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_meth_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` double NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_payments`
--

INSERT INTO `withdraw_payments` (`id`, `withdraw_request_id`, `payment_meth_type`, `payment_meth_id`, `amount`, `currency`, `trans_id`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 1, 30000, 'BDT', '101', '2021-08-04 22:17:09', '2021-08-04 22:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_requests`
--

CREATE TABLE `withdraw_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_cancelled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_requests`
--

INSERT INTO `withdraw_requests` (`id`, `user_id`, `is_cancelled`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 1, 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 2, 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 3, 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 4, 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 5, 0, '2021-08-04 22:17:09', '2021-08-04 22:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_request_items`
--

CREATE TABLE `withdraw_request_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_request_id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `requested_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `currently_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `block_msg` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_request_items`
--

INSERT INTO `withdraw_request_items` (`id`, `withdraw_request_id`, `campaign_id`, `requested_amount`, `paid_amount`, `status`, `currently_blocked`, `block_msg`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '30000.00', '30000.00', 2, 0, NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(2, 1, 4, '30000.00', '30000.00', 2, 0, NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(3, 2, 2, '10000.00', '0.00', 1, 0, NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(4, 2, 4, '10000.00', '0.00', 1, 0, NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(5, 3, 7, '30000.00', '0.00', 1, 0, NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(6, 4, 9, '30000.00', '0.00', 1, 0, NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(7, 5, 13, '30000.00', '0.00', 1, 0, NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09'),
(8, 6, 17, '30000.00', '0.00', 1, 0, NULL, '2021-08-04 22:17:09', '2021-08-04 22:17:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `des_imgs`
--
ALTER TABLE `des_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `investigations`
--
ALTER TABLE `investigations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `investigations_campaign_id_unique` (`campaign_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_for_comments`
--
ALTER TABLE `like_for_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_banks`
--
ALTER TABLE `mobile_banks`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_items`
--
ALTER TABLE `update_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_extras`
--
ALTER TABLE `user_extras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_extras_nid_unique` (`nid`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_payments`
--
ALTER TABLE `withdraw_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_request_items`
--
ALTER TABLE `withdraw_request_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `des_imgs`
--
ALTER TABLE `des_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investigations`
--
ALTER TABLE `investigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `like_for_comments`
--
ALTER TABLE `like_for_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mobile_banks`
--
ALTER TABLE `mobile_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `update_items`
--
ALTER TABLE `update_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_permissions`
--
ALTER TABLE `users_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_extras`
--
ALTER TABLE `user_extras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `withdraw_payments`
--
ALTER TABLE `withdraw_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `withdraw_request_items`
--
ALTER TABLE `withdraw_request_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
