-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2017 at 05:46 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anzo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_desc` text,
  `category_image` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `show_no` varchar(20) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `added_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_desc`, `category_image`, `sort_order`, `show_no`, `status`, `added_date`, `modify_date`) VALUES
(3, 'Signatures', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo ', NULL, 1, NULL, 'active', '2017-10-27 13:05:38', '2017-11-17 07:11:00'),
(4, 'Build It', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo ', NULL, 2, 'yes', 'active', '2017-10-27 13:06:30', '2017-11-19 10:10:17'),
(5, 'Sides + Sweets', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo ', NULL, 3, NULL, 'active', '2017-10-27 13:07:46', '2017-11-17 07:11:30'),
(6, 'Beverages', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo ', NULL, 4, NULL, 'active', '2017-10-27 13:08:25', '2017-11-17 07:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `gallery_name` varchar(255) NOT NULL,
  `gallery_option` varchar(255) DEFAULT NULL,
  `gallery_desc` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `is_home` varchar(20) DEFAULT 'no',
  `added_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gallery_name`, `gallery_option`, `gallery_desc`, `status`, `is_home`, `added_date`, `modify_date`) VALUES
(1, 'Home Page Gallery', 'header_gallery', 'Gallery Description', 'active', 'yes', '2017-11-13 09:46:16', '2017-11-23 11:01:13'),
(2, 'Gallery 2', 'page_gallery', 'Gallery Des', 'active', 'no', '2017-11-17 06:50:25', '2017-11-24 12:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_title` varchar(255) DEFAULT NULL,
  `image_desc` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `added_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image`, `image_title`, `image_desc`, `status`, `added_date`, `modify_date`) VALUES
(5, 1, '1e4b3d71-35df-452b-a997-0f7be7853779.jpg', 'Gallery Image', 'Gallery Image', 'active', '2017-11-23 06:32:46', '0000-00-00 00:00:00'),
(6, 1, 'db6990a0-ca83-4214-bdbe-522a3fdd5744.jpg', 'Gallery Image 1', 'Gallery Image 1', 'active', '2017-11-23 06:35:10', '0000-00-00 00:00:00'),
(7, 2, 'f591234f-067e-4830-9be1-52a236b582c2.jpg', 'Gallery Image', '', 'active', '2017-11-23 11:08:38', '0000-00-00 00:00:00'),
(8, 2, 'ca061a08-70d6-4e71-a696-6f1ab4c4c236.jpg', 'Gallery Image', '', 'active', '2017-11-23 11:08:59', '0000-00-00 00:00:00'),
(9, 2, 'd5847891-d9f4-46cb-9a52-ddaa6f239650.jpg', 'Gallery Image', '', 'active', '2017-11-23 11:09:14', '0000-00-00 00:00:00'),
(10, 2, 'b52b9475-ed4a-4a6b-b8d2-1f8464a6e57e.jpg', 'Gallery Image', '', 'active', '2017-11-23 11:09:28', '0000-00-00 00:00:00'),
(11, 2, 'f2136e22-7701-47bd-adfa-b8a20189f83d.jpg', 'Gallery Image', '', 'active', '2017-11-23 11:09:45', '0000-00-00 00:00:00'),
(12, 2, 'acef9cdc-440a-4591-85aa-4265133803d1.jpg', 'Gallery Image', '', 'active', '2017-11-23 11:09:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_desc` text,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `added_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `sub_category_id`, `product_title`, `product_image`, `product_desc`, `sort_order`, `status`, `added_date`, `modify_date`) VALUES
(2, 3, 4, 'LOREM IPSUM DOLOR', '45a6be42-24ab-4f45-b44d-6068c2acb535.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-10-31 08:12:23', '2017-11-24 09:37:35'),
(3, 3, 4, 'LOREM IPSUM DOLOR', '96889015-c75a-4403-86a4-2dccde51239a.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 09:31:00', '2017-11-17 10:40:59'),
(4, 3, 4, 'LOREM IPSUM DOLOR', 'b2b561d5-5aa6-437d-a71c-967e04e37996.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 09:32:09', '2017-11-17 10:41:09'),
(5, 3, 6, 'LOREM IPSUM DOLOR', 'adeda495-0408-4c17-b7b1-a46d0f2c33f6.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 09:41:08', '2017-11-17 10:40:21'),
(6, 3, 5, 'LOREM IPSUM DOLOR', '3152a16d-655f-4b90-aa7c-4f0d4de308d2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 10:41:45', '2017-11-24 09:34:14'),
(7, 3, 7, 'LOREM IPSUM DOLOR', 'fdca4c7d-799b-43ad-819e-adf41dc5ee7a.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.\r\n\r\n', NULL, 'active', '2017-11-17 10:46:57', '2017-11-24 11:38:05'),
(8, 3, 7, 'LOREM IPSUM DOLOR', '39e7c149-5a49-491c-864f-aa67de06fe37.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 10:46:57', '2017-11-24 09:33:44'),
(9, 3, 7, 'LOREM IPSUM DOLOR', '04a33f50-5f2c-4858-a5b0-78edffa8d4e8.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 10:46:57', '2017-11-24 09:33:59'),
(10, 3, 5, 'LOREM IPSUM DOLOR', 'c2486f23-d50b-47c4-9af3-5e922d353199.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 10:41:45', '2017-11-24 09:34:38'),
(11, 3, 5, 'LOREM IPSUM DOLOR', '11a8d4e5-4db0-410c-a862-1f5034ccb740.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 10:41:45', '2017-11-24 09:34:58'),
(12, 3, 6, 'LOREM IPSUM DOLOR', 'adeda495-0408-4c17-b7b1-a46d0f2c33f6.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 09:41:08', '2017-11-17 10:40:21'),
(13, 3, 6, 'LOREM IPSUM DOLOR', 'adeda495-0408-4c17-b7b1-a46d0f2c33f6.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 09:41:08', '2017-11-17 10:40:21'),
(14, 4, 8, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(15, 4, 8, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(16, 4, 8, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(17, 4, 8, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(18, 4, 9, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(19, 4, 9, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(20, 4, 9, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(21, 4, 9, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(22, 4, 10, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(23, 4, 10, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(24, 4, 10, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(25, 4, 10, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(26, 4, 11, 'LOREM IPSUM DOLOR', 'd6b101be-987f-4130-b1c8-c32e77ea95a5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '2017-11-24 11:23:22'),
(30, 4, 12, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(31, 4, 12, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(32, 4, 12, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(33, 4, 12, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(34, 5, 13, 'LOREM IPSUM DOLOR', '0ea62418-4bb8-443e-b933-a5d312c7b908.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '2017-11-24 10:11:40'),
(35, 5, 13, 'LOREM IPSUM DOLOR', 'f3b11ce8-faca-4f4a-99fb-68f82771ad77.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '2017-11-24 10:11:53'),
(36, 5, 13, 'LOREM IPSUM DOLOR', 'd50b991b-0a5c-4f80-a63f-91b2aced225d.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '2017-11-24 10:12:03'),
(37, 5, 13, 'LOREM IPSUM DOLOR', 'e8723166-eeff-409a-962d-2b85a343290c.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '2017-11-24 10:12:09'),
(38, 5, 14, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(39, 5, 14, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(40, 5, 14, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(41, 5, 14, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(42, 6, 15, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(43, 6, 15, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(44, 6, 15, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(45, 6, 15, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(46, 6, 16, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(47, 6, 16, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(48, 6, 16, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00'),
(49, 6, 16, 'LOREM IPSUM DOLOR', 'a9a347d4-8804-45be-b099-026c0a9b70ca.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', NULL, 'active', '2017-11-17 13:19:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job_category_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `job_state` varchar(255) DEFAULT NULL,
  `job_city` varchar(255) DEFAULT NULL,
  `job_description` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `added_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_category_id`, `job_title`, `job_type`, `job_state`, `job_city`, `job_description`, `status`, `added_date`, `modify_date`) VALUES
(1, 2, 'Job 1', 'Full Time', 'Florida', 'Florida', 'This is a test description .', 'active', '0000-00-00 00:00:00', '2017-11-09 14:35:52'),
(2, 2, 'Job 2', 'Part Time', 'Florida', 'Florida', 'Test Description', 'active', '2017-11-09 14:52:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `added_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `cat_name`, `added_date`, `modify_date`) VALUES
(1, 'Job Category', '2017-11-09 00:00:00', NULL),
(2, 'Job category 2', '2017-11-09 13:30:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_header_image` varchar(255) DEFAULT NULL,
  `selected_module` varchar(255) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `module_sort_order` varchar(20) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_descriptions` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `added_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_slug`, `page_header_image`, `selected_module`, `module_id`, `module_sort_order`, `meta_title`, `meta_descriptions`, `meta_keywords`, `status`, `added_date`, `modify_date`) VALUES
(1, 'Our Story', 'history', 'f27516d6-5b22-4c37-95f7-aef352a9367f.jpg', 'gallery', 2, NULL, 'Our Story', 'Our Story', 'Our Story', 'active', '2017-10-31 14:20:27', '2017-11-23 10:53:40'),
(2, 'Locations', 'location', '35f30eb3-a5ec-45ef-9ced-37bb8f11ecff.jpg', 'stores', NULL, NULL, 'Locations', 'Locations', 'Locations', 'active', '2017-11-08 13:37:37', '2017-11-23 11:42:31'),
(3, 'Join Us', 'career', '', 'job', NULL, NULL, 'Join Us', 'Join Us', 'Join Us', 'active', '2017-11-23 12:59:44', '2017-11-24 12:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `page_sections`
--

CREATE TABLE `page_sections` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `section_text` text,
  `section_index` int(11) DEFAULT '0',
  `added_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_sections`
--

INSERT INTO `page_sections` (`id`, `page_id`, `section_title`, `section_text`, `section_index`, `added_date`, `modify_date`) VALUES
(28, 1, 'Our History', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n', 0, '2017-11-23 10:53:40', '2017-11-23 10:53:40'),
(29, 1, 'Our Mission', '<p><strong>Lorem ipsum dolorLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</strong></p>\r\n\r\n<p><strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</strong></p>\r\n\r\n<p><strong>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</strong></p>\r\n\r\n<p><strong>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</strong></p>\r\n\r\n<p><strong>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</strong></p>\r\n', 0, '2017-11-23 10:53:41', '2017-11-23 10:53:41'),
(32, 3, 'Our Values', '<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</li>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</li>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</li>\r\n</ul>\r\n', 0, '2017-11-24 12:51:05', '2017-11-24 12:51:05'),
(33, 3, 'CAREERS', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud commodo consequat. Duis aute irure dolor in.</p>\r\n', 0, '2017-11-24 12:51:05', '2017-11-24 12:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `help_phone` varchar(255) DEFAULT NULL,
  `help_phone_1` varchar(255) DEFAULT NULL,
  `help_email` varchar(255) DEFAULT NULL,
  `fb_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `app_url` varchar(255) DEFAULT NULL,
  `order_online_url` varchar(255) DEFAULT NULL,
  `added_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `help_phone`, `help_phone_1`, `help_email`, `fb_url`, `twitter_url`, `instagram_url`, `linkedin_url`, `app_url`, `order_online_url`, `added_date`, `modify_date`) VALUES
(1, '+1 555-555-5555', '+1 555-555-555', 'hello@anzo.com', '', '', '', '', '', 'https://www.google.com', '0000-00-00 00:00:00', '2017-11-23 06:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `desktop_image` varchar(255) DEFAULT NULL,
  `mobile_image` varchar(255) DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `image_index` int(11) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `added_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image_title`, `desktop_image`, `mobile_image`, `image_link`, `image_index`, `status`, `added_date`, `modify_date`) VALUES
(5, 'Test Slide', 'cbe24fa2-b032-4534-baac-2f6fffbd2fb0.jpg', '279b92d3-a4a2-43d3-99e1-0d4548dfb037.jpeg', 'google.com', NULL, 'active', '2017-10-27 09:05:26', '2017-10-27 09:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `store_locations`
--

CREATE TABLE `store_locations` (
  `id` int(11) NOT NULL,
  `store_title` varchar(255) NOT NULL,
  `store_city` varchar(255) DEFAULT NULL,
  `store_country` varchar(20) DEFAULT NULL,
  `store_address` varchar(255) DEFAULT NULL,
  `store_pin` varchar(255) DEFAULT NULL,
  `store_image` varchar(255) DEFAULT NULL,
  `store_lat` varchar(255) DEFAULT NULL,
  `store_lon` varchar(255) DEFAULT NULL,
  `store_phone` varchar(20) DEFAULT NULL,
  `store_open_days_from` varchar(255) DEFAULT NULL,
  `store_open_days_to` varchar(20) DEFAULT NULL,
  `store_open_time_from` varchar(255) DEFAULT NULL,
  `store_open_time_to` varchar(20) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `added_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_locations`
--

INSERT INTO `store_locations` (`id`, `store_title`, `store_city`, `store_country`, `store_address`, `store_pin`, `store_image`, `store_lat`, `store_lon`, `store_phone`, `store_open_days_from`, `store_open_days_to`, `store_open_time_from`, `store_open_time_to`, `status`, `added_date`, `modify_date`) VALUES
(1, 'BOYNTON BEACH TOWN CENTER ', 'FLORIDA', 'United States', '970 N Congress Avenue ', 'Boynton Beach, FL 33426', 'fcf9ce25-b54b-4fa2-9e28-aafa18de7213.jpg', '26.536505', '-80.0922557', '561-877-8310', '', '', '', '', 'active', '2017-11-07 06:31:02', '2017-11-23 12:40:38'),
(2, 'BOYNTON BEACH TOWN CENTER', 'Myami', 'United States', '970 N Congress Avenue Boynton Beach', 'FL 33426', '', '26.536505', '-80.0922557', '561-877-8310', '', '', '', '', 'active', '2017-11-23 11:45:40', '2017-11-24 07:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `store_location_days_times`
--

CREATE TABLE `store_location_days_times` (
  `id` int(11) NOT NULL,
  `store_location_id` int(11) NOT NULL,
  `from_open_day` varchar(255) DEFAULT NULL,
  `to_open_day` varchar(255) DEFAULT NULL,
  `from_open_time` varchar(255) DEFAULT NULL,
  `to_open_time` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_location_days_times`
--

INSERT INTO `store_location_days_times` (`id`, `store_location_id`, `from_open_day`, `to_open_day`, `from_open_time`, `to_open_time`, `status`, `added_date`) VALUES
(18, 1, 'Monday', 'Wednesday', '10:00 AM', '07:00 PM', 'active', '2017-11-23 12:40:38'),
(19, 1, 'Thursday', 'Sunday', '12:00 PM', '06:00 PM', 'active', '2017-11-23 12:40:38'),
(21, 2, 'Monday', 'Sunday', '11:00 AM', '09:00 PM', 'active', '2017-11-24 07:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `added_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `added_date`, `modify_date`) VALUES
(1, 'test@test.com', '2017-11-06 00:00:00', NULL),
(2, 'test2@test.com', '2017-11-07 00:00:00', NULL),
(3, 'hello@hello.com', '2017-11-23 07:30:55', NULL),
(4, 'hello2@hello.com', '2017-11-23 07:57:27', NULL),
(5, 'hello3@hello.com', '2017-11-23 08:04:47', NULL),
(6, 'hello4@hello.com', '2017-11-23 08:05:24', NULL),
(7, 'helloh@hello.com', '2017-11-23 08:05:37', NULL),
(8, 'h@h.co', '2017-11-23 08:10:02', NULL),
(9, 'admin@admin.com', '2017-11-24 06:06:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_title` varchar(255) NOT NULL,
  `sub_category_desc` text,
  `sub_category_image` varchar(255) DEFAULT NULL,
  `layout_style` varchar(255) DEFAULT NULL,
  `layout_col` varchar(20) DEFAULT NULL,
  `show_no` varchar(20) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `added_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_title`, `sub_category_desc`, `sub_category_image`, `layout_style`, `layout_col`, `show_no`, `sort_order`, `status`, `added_date`, `modify_date`) VALUES
(4, 3, 'Baked Bowls', 'Baked Bowls descriptions', '', 'circular', 'three_col', NULL, 1, 'active', '2017-10-27 13:11:30', '2017-11-24 08:54:30'),
(5, 3, 'Salads', 'Salads Descriptions', '', 'rectangle', 'three_col', NULL, 3, 'active', '2017-10-27 13:12:36', '2017-11-24 08:57:38'),
(6, 3, 'WARM BOWLS', 'WARM BOWLS WARM BOWLS', '', 'circular', 'three_col', NULL, 2, 'active', '2017-11-17 07:14:43', '2017-11-24 08:57:23'),
(7, 3, 'WRAPS', 'WRAPS', '', 'rectangle', 'three_col', NULL, 4, 'active', '2017-11-17 07:16:22', '2017-11-24 08:57:47'),
(8, 4, 'Base', 'Select up to two', '', 'circular', 'four_col', NULL, NULL, 'active', '2017-11-17 13:13:48', '2017-11-24 11:04:21'),
(9, 4, 'PROTEIN ', 'Select one', '', 'circular', 'four_col', NULL, NULL, 'active', '2017-11-17 13:14:33', '2017-11-24 11:05:02'),
(10, 4, 'Spreads and Warm Sauces ', 'Select up to three', '', 'circular', 'three_col', NULL, NULL, 'active', '2017-11-17 13:15:09', '2017-11-24 11:05:39'),
(11, 4, 'Toppings and Crunch', '', '', 'rectangle', 'two_col', NULL, NULL, 'active', '2017-11-17 13:15:34', '2017-11-24 13:30:49'),
(12, 4, 'DRESSINGS', 'Select one', '', 'circular', 'three_col', NULL, NULL, 'active', '2017-11-17 13:16:08', '2017-11-24 11:17:34'),
(13, 5, 'SIDES', 'SIDES', '', 'rectangle', 'two_col', NULL, NULL, 'active', '2017-11-17 14:45:44', '2017-11-24 10:04:47'),
(14, 5, 'SWEETS', 'SWEETS', '', 'circular', 'three_col', NULL, NULL, 'active', '2017-11-17 14:46:17', '2017-11-24 10:48:24'),
(15, 6, 'CATEGORY 1', 'CATEGORY 1', '', 'circular', 'four_col', NULL, NULL, 'active', '2017-11-17 15:04:26', '2017-11-24 10:33:38'),
(16, 6, 'CATEGORY 2', 'CATEGORY 2', '', 'circular', 'three_col', NULL, NULL, 'active', '2017-11-17 15:04:44', '2017-11-24 10:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `profile_pic` text,
  `user_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `user_role_id` int(11) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(500) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `user_short_description` text,
  `user_description` text,
  `user_added_date` datetime DEFAULT NULL,
  `user_modified_date` datetime DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `profile_pic`, `user_status`, `user_role_id`, `address`, `phone`, `city`, `state`, `country_id`, `zip_code`, `user_short_description`, `user_description`, `user_added_date`, `user_modified_date`, `last_login_date`, `last_login_ip`) VALUES
(1, 'admin@admin.com', '$2y$10$vjYHsrw0iIVQ6ZWq8o2gqOG59I/MjlhabYpPyrmRpUZGuy1AvIB0.', 'Admin', 'User', NULL, 'Active', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-26 00:00:00', '2017-10-26 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_role_id` int(11) NOT NULL,
  `user_role_name` varchar(255) NOT NULL,
  `user_role_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `user_role_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_role_id`, `user_role_name`, `user_role_status`, `user_role_description`) VALUES
(1, 'Admin', 'Active', 'Super Admin'),
(2, 'Practitioner', 'Active', 'Sub Admin'),
(3, 'Customer', 'Active', 'Users');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_sections`
--
ALTER TABLE `page_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_locations`
--
ALTER TABLE `store_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_location_days_times`
--
ALTER TABLE `store_location_days_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `page_sections`
--
ALTER TABLE `page_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `store_locations`
--
ALTER TABLE `store_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `store_location_days_times`
--
ALTER TABLE `store_location_days_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
