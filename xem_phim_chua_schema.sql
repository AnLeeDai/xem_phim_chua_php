-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2024 at 05:40 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xem_phim_chua_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Drama'),
(4, 'Sci-Fi'),
(5, 'Romance'),
(6, 'hehe'),
(7, 'hehe'),
(8, 'them lai the loai');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `banner` text,
  `description` text,
  `release_date` date DEFAULT NULL,
  `genre_id` int NOT NULL,
  `price` int NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `download_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `banner`, `description`, `release_date`, `genre_id`, `price`, `video_url`, `download_url`) VALUES
(1, 'Movie A', '/imgs/poster-placeholder.png', 'An action-packed adventure.', '2023-01-01', 1, 50, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(2, 'Movie B', '/imgs/poster-placeholder.png', 'A hilarious comedy to relax.', '2023-02-10', 2, 40, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(3, 'Movie C', '/imgs/poster-placeholder.png', 'A heartwarming drama.', '2023-03-05', 3, 30, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(4, 'Movie D', '/imgs/poster-placeholder.png', 'An epic sci-fi journey.', '2023-04-10', 4, 60, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(5, 'Movie E', '/imgs/poster-placeholder.png', 'A love story for all ages.', '2023-05-15', 5, 45, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(6, 'Movie F', '/imgs/poster-placeholder.png', 'Action sequel with more thrills.', '2023-06-01', 1, 55, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(7, 'Movie G', '/imgs/poster-placeholder.png', 'Comedy sequel to make you laugh.', '2023-07-07', 2, 35, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(8, 'Movie H', '/imgs/poster-placeholder.png', 'Dramatic story based on true events.', '2023-08-20', 3, 40, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(9, 'Movie I', '/imgs/poster-placeholder.png', 'Sci-fi extravaganza.', '2023-09-10', 4, 65, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(10, 'Movie J', '/imgs/poster-placeholder.png', 'Romantic comedy blend.', '2023-10-01', 2, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(11, 'Movie 1', '/imgs/poster-placeholder.png', 'Description 1', '2023-01-01', 1, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(12, 'Movie 2', '/imgs/poster-placeholder.png', 'Description 2', '2023-01-02', 1, 40, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(13, 'Movie 3', '/imgs/poster-placeholder.png', 'Description 3', '2023-01-03', 2, 30, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(14, 'Movie 4', '/imgs/poster-placeholder.png', 'Description 4', '2023-01-04', 2, 60, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(15, 'Movie 5', '/imgs/poster-placeholder.png', 'Description 5', '2023-01-05', 3, 45, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(16, 'Movie 6', '/imgs/poster-placeholder.png', 'Description 6', '2023-01-06', 3, 55, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(17, 'Movie 7', '/imgs/poster-placeholder.png', 'Description 7', '2023-01-07', 4, 35, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(18, 'Movie 8', '/imgs/poster-placeholder.png', 'Description 8', '2023-01-08', 4, 50, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(19, 'Movie 9', '/imgs/poster-placeholder.png', 'Description 9', '2023-01-09', 5, 60, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(20, 'Movie 10', '/imgs/poster-placeholder.png', 'Description 10', '2023-01-10', 5, 40, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(21, 'Movie 11', '/imgs/poster-placeholder.png', 'Description 11', '2023-01-11', 1, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(22, 'Movie 12', '/imgs/poster-placeholder.png', 'Description 12', '2023-01-12', 1, 30, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(23, 'Movie 13', '/imgs/poster-placeholder.png', 'Description 13', '2023-01-13', 2, 45, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(24, 'Movie 14', '/imgs/poster-placeholder.png', 'Description 14', '2023-01-14', 2, 35, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(25, 'Movie 15', '/imgs/poster-placeholder.png', 'Description 15', '2023-01-15', 3, 55, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(26, 'Movie 16', '/imgs/poster-placeholder.png', 'Description 16', '2023-01-16', 3, 60, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(27, 'Movie 17', '/imgs/poster-placeholder.png', 'Description 17', '2023-01-17', 4, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(28, 'Movie 18', '/imgs/poster-placeholder.png', 'Description 18', '2023-01-18', 4, 45, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(29, 'Movie 19', '/imgs/poster-placeholder.png', 'Description 19', '2023-01-19', 5, 35, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(30, 'Movie 20', '/imgs/poster-placeholder.png', 'Description 20', '2023-01-20', 5, 40, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(31, 'Movie 21', '/imgs/poster-placeholder.png', 'Description 21', '2023-01-21', 1, 50, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(32, 'Movie 22', '/imgs/poster-placeholder.png', 'Description 22', '2023-01-22', 1, 40, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(33, 'Movie 23', '/imgs/poster-placeholder.png', 'Description 23', '2023-01-23', 2, 30, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(34, 'Movie 24', '/imgs/poster-placeholder.png', 'Description 24', '2023-01-24', 2, 60, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(35, 'Movie 25', '/imgs/poster-placeholder.png', 'Description 25', '2023-01-25', 3, 45, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(36, 'Movie 26', '/imgs/poster-placeholder.png', 'Description 26', '2023-01-26', 3, 55, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(37, 'Movie 27', '/imgs/poster-placeholder.png', 'Description 27', '2023-01-27', 4, 35, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(38, 'Movie 28', '/imgs/poster-placeholder.png', 'Description 28', '2023-01-28', 4, 50, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(39, 'Movie 29', '/imgs/poster-placeholder.png', 'Description 29', '2023-01-29', 5, 60, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(40, 'Movie 30', '/imgs/poster-placeholder.png', 'Description 30', '2023-01-30', 5, 40, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(41, 'Movie 31', '/imgs/poster-placeholder.png', 'Description 31', '2023-01-31', 1, 50, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(43, 'Movie 33', '/imgs/poster-placeholder.png', 'Description 33', '2023-02-02', 2, 30, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(44, 'Movie 34', '/imgs/poster-placeholder.png', 'Description 34', '2023-02-03', 2, 60, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(45, 'Movie 35', '/imgs/poster-placeholder.png', 'Description 35', '2023-02-04', 3, 45, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(46, 'Movie 36', '/imgs/poster-placeholder.png', 'Description 36', '2023-02-05', 3, 55, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(47, 'Movie 37', '/imgs/poster-placeholder.png', 'Description 37', '2023-02-06', 4, 35, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(48, 'Movie 38', '/imgs/poster-placeholder.png', 'Description 38', '2023-02-07', 4, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(49, 'Movie 39', '/imgs/poster-placeholder.png', 'Description 39', '2023-02-08', 5, 60, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(50, 'Movie 40', '/imgs/poster-placeholder.png', 'Description 40', '2023-02-09', 5, 40, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(51, 'Movie 41', '/imgs/poster-placeholder.png', 'Description 41', '2023-02-10', 1, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(52, 'Movie 42', '/imgs/poster-placeholder.png', 'Description 42', '2023-02-11', 1, 30, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(53, 'Movie 43', '/imgs/poster-placeholder.png', 'Description 43', '2023-02-12', 2, 45, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(54, 'Movie 44', '/imgs/poster-placeholder.png', 'Description 44', '2023-02-13', 2, 35, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(55, 'Movie 45', '/imgs/poster-placeholder.png', 'Description 45', '2023-02-14', 3, 55, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(56, 'Movie 46', '/imgs/poster-placeholder.png', 'Description 46', '2023-02-15', 3, 60, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(57, 'Movie 47', '/imgs/poster-placeholder.png', 'Description 47', '2023-02-16', 4, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(58, 'Movie 48', '/imgs/poster-placeholder.png', 'Description 48', '2023-02-17', 4, 45, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(59, 'Movie 49', '/imgs/poster-placeholder.png', 'Description 49', '2023-02-18', 5, 35, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(60, 'Movie 50', '/imgs/poster-placeholder.png', 'Description 50', '2023-02-19', 5, 40, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(61, 'Movie 51', '/imgs/poster-placeholder.png', 'Description 51', '2023-02-20', 1, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(62, 'Movie 52', '/imgs/poster-placeholder.png', 'Description 52', '2023-02-21', 1, 40, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(63, 'Movie 53', '/imgs/poster-placeholder.png', 'Description 53', '2023-02-22', 2, 30, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(64, 'Movie 54', '/imgs/poster-placeholder.png', 'Description 54', '2023-02-23', 2, 60, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(65, 'Movie 55', '/imgs/poster-placeholder.png', 'Description 55', '2023-02-24', 3, 45, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(66, 'Movie 56', '/imgs/poster-placeholder.png', 'Description 56', '2023-02-25', 3, 55, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(67, 'Movie 57', '/imgs/poster-placeholder.png', 'Description 57', '2023-02-26', 4, 35, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(68, 'Movie 58', '/imgs/poster-placeholder.png', 'Description 58', '2023-02-27', 4, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(69, 'Movie 59', '/imgs/poster-placeholder.png', 'Description 59', '2023-02-28', 5, 60, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(70, 'Movie 60', '/imgs/poster-placeholder.png', 'Description 60', '2023-03-01', 5, 40, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(71, 'Movie 61', '/imgs/poster-placeholder.png', 'Description 61', '2023-03-02', 1, 50, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(72, 'Movie 62', '/imgs/poster-placeholder.png', 'Description 62', '2023-03-03', 1, 30, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(73, 'Movie 63', '/imgs/poster-placeholder.png', 'Description 63', '2023-03-04', 2, 45, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(74, 'Movie 64', '/imgs/poster-placeholder.png', 'Description 64', '2023-03-05', 2, 35, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(75, 'Movie 65', '/imgs/poster-placeholder.png', 'Description 65', '2023-03-06', 3, 55, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(76, 'Movie 66', '/imgs/poster-placeholder.png', 'Description 66', '2023-03-07', 3, 60, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(77, 'Movie 67', '/imgs/poster-placeholder.png', 'Description 67', '2023-03-08', 4, 50, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(78, 'Movie 68', '/imgs/poster-placeholder.png', 'Description 68', '2023-03-09', 4, 45, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(79, 'Movie 69', '/imgs/poster-placeholder.png', 'Description 69', '2023-03-10', 5, 35, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(80, 'Movie 70', '/imgs/poster-placeholder.png', 'Description 70', '2023-03-11', 5, 40, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(81, 'Movie 71', '/imgs/poster-placeholder.png', 'Description 71', '2023-03-12', 1, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(82, 'Movie 72', '/imgs/poster-placeholder.png', 'Description 72', '2023-03-13', 1, 40, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(83, 'Movie 73', '/imgs/poster-placeholder.png', 'Description 73', '2023-03-14', 2, 30, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(84, 'Movie 74', '/imgs/poster-placeholder.png', 'Description 74', '2023-03-15', 2, 60, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(85, 'Movie 75', '/imgs/poster-placeholder.png', 'Description 75', '2023-03-16', 3, 45, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(86, 'Movie 76', '/imgs/poster-placeholder.png', 'Description 76', '2023-03-17', 3, 55, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(87, 'Movie 77', '/imgs/poster-placeholder.png', 'Description 77', '2023-03-18', 4, 35, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(88, 'Movie 78', '/imgs/poster-placeholder.png', 'Description 78', '2023-03-19', 4, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(89, 'Movie 79', '/imgs/poster-placeholder.png', 'Description 79', '2023-03-20', 5, 60, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(90, 'Movie 80', '/imgs/poster-placeholder.png', 'Description 80', '2023-03-21', 5, 40, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(91, 'Movie 81', '/imgs/poster-placeholder.png', 'Description 81', '2023-03-22', 1, 50, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(92, 'Movie 82', '/imgs/poster-placeholder.png', 'Description 82', '2023-03-23', 1, 30, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(93, 'Movie 83', '/imgs/poster-placeholder.png', 'Description 83', '2023-03-24', 2, 45, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(94, 'Movie 84', '/imgs/poster-placeholder.png', 'Description 84', '2023-03-25', 2, 35, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(95, 'Movie 85', '/imgs/poster-placeholder.png', 'Description 85', '2023-03-26', 3, 55, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(96, 'Movie 86', '/imgs/poster-placeholder.png', 'Description 86', '2023-03-27', 3, 60, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(97, 'Movie 87', '/imgs/poster-placeholder.png', 'Description 87', '2023-03-28', 4, 50, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(98, 'Movie 88', '/imgs/poster-placeholder.png', 'Description 88', '2023-03-29', 4, 45, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(99, 'Movie 89', '/imgs/poster-placeholder.png', 'Description 89', '2023-03-30', 5, 35, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(100, 'Movie 90', '/imgs/poster-placeholder.png', 'Description 90', '2023-03-31', 5, 40, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(101, 'Movie 91', '/imgs/poster-placeholder.png', 'Description 91', '2023-04-01', 1, 50, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(102, 'Movie 92', '/imgs/poster-placeholder.png', 'Description 92', '2023-04-02', 1, 40, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(103, 'Movie 93', '/imgs/poster-placeholder.png', 'Description 93', '2023-04-03', 2, 30, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(104, 'Movie 94', '/imgs/poster-placeholder.png', 'Description 94', '2023-04-04', 2, 60, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(105, 'Movie 95', '/imgs/poster-placeholder.png', 'Description 95', '2023-04-05', 3, 45, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(106, 'Movie 96', '/imgs/poster-placeholder.png', 'Description 96', '2023-04-06', 3, 55, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(107, 'Movie 97', '/imgs/poster-placeholder.png', 'Description 97', '2023-04-07', 4, 35, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(108, 'Movie 98', '/imgs/poster-placeholder.png', 'Description 98', '2023-04-08', 4, 50, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(109, 'Movie 99', '/imgs/poster-placeholder.png', 'Description 99', '2023-04-09', 5, 60, '/vids/tim_duoc_nhau_kho_the_nao.mp4', '/vids/tim_duoc_nhau_kho_the_nao.mp4'),
(110, 'Movie 100', 'imgs/1734101647-20241207_113422.jpg', 'Description 100', '2023-04-10', 5, 40, '/vids/ngoi_nha_hanh_phuc.mp4', '/vids/ngoi_nha_hanh_phuc.mp4'),
(119, 'New movie', 'imgs/1734111594-Untitled.png', 'cas', '2024-12-03', 3, 5000, 'vids/1734101061-you_anh_you_only.mp4', 'vids/1734101061-you_anh_you_only.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int NOT NULL,
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `purchase_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `movie_id`, `purchase_date`) VALUES
(1, 1, 1, '2024-12-12 20:06:14'),
(2, 2, 2, '2024-12-12 20:06:14'),
(3, 4, 5, '2024-12-12 20:06:14'),
(4, 5, 9, '2024-12-12 20:06:14'),
(5, 1, 10, '2024-12-12 20:06:14'),
(6, 5, 4, '2024-12-12 20:06:53'),
(7, 5, 6, '2024-12-12 20:14:30'),
(8, 5, 5, '2024-12-12 20:14:47'),
(9, 5, 7, '2024-12-12 20:14:48'),
(10, 5, 1, '2024-12-12 20:14:50'),
(11, 5, 2, '2024-12-12 20:14:50'),
(12, 5, 3, '2024-12-12 20:14:51'),
(13, 5, 8, '2024-12-12 20:14:51'),
(14, 6, 4, '2024-12-12 20:28:56'),
(15, 6, 110, '2024-12-12 20:28:57'),
(16, 8, 110, '2024-12-13 04:38:35'),
(17, 8, 108, '2024-12-13 04:40:27'),
(18, 8, 94, '2024-12-13 04:53:25'),
(19, 6, 106, '2024-12-13 07:22:31'),
(20, 6, 108, '2024-12-13 10:21:51'),
(26, 6, 104, '2024-12-13 14:32:57'),
(28, 6, 119, '2024-12-13 14:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int NOT NULL,
  `user_id` int NOT NULL,
  `amount` int NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `user_id`, `amount`, `status`, `created_at`) VALUES
(40, 8, 300000, 'approved', '2024-12-13 09:55:26'),
(41, 8, 300000, 'approved', '2024-12-13 10:02:51'),
(42, 6, 20000, 'approved', '2024-12-13 10:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int NOT NULL,
  `user_id` int NOT NULL,
  `amount` int NOT NULL,
  `transaction_type` enum('deposit','purchase') NOT NULL,
  `transaction_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `user_id`, `amount`, `transaction_type`, `transaction_date`) VALUES
(1, 1, 100, 'deposit', '2024-12-12 20:06:14'),
(2, 2, 50, 'deposit', '2024-12-12 20:06:14'),
(3, 3, 30, 'deposit', '2024-12-12 20:06:14'),
(4, 4, 60, 'deposit', '2024-12-12 20:06:14'),
(5, 5, 200, 'deposit', '2024-12-12 20:06:14'),
(6, 1, 50, 'purchase', '2024-12-12 20:06:14'),
(7, 2, 40, 'purchase', '2024-12-12 20:06:14'),
(8, 4, 60, 'purchase', '2024-12-12 20:06:14'),
(9, 5, 45, 'purchase', '2024-12-12 20:06:14'),
(10, 1, 30, 'purchase', '2024-12-12 20:06:14'),
(11, 5, 55, 'purchase', '2024-12-12 20:14:30'),
(12, 5, 45, 'purchase', '2024-12-12 20:14:47'),
(13, 5, 35, 'purchase', '2024-12-12 20:14:48'),
(14, 5, 50, 'purchase', '2024-12-12 20:14:50'),
(15, 5, 40, 'purchase', '2024-12-12 20:14:50'),
(16, 5, 30, 'purchase', '2024-12-12 20:14:51'),
(17, 5, 40, 'purchase', '2024-12-12 20:14:51'),
(18, 6, 60, 'purchase', '2024-12-12 20:28:56'),
(19, 6, 40, 'purchase', '2024-12-12 20:28:57'),
(20, 8, 40, 'purchase', '2024-12-13 04:38:35'),
(21, 8, 50, 'purchase', '2024-12-13 04:40:27'),
(22, 8, 35, 'purchase', '2024-12-13 04:53:25'),
(23, 6, 50000, 'deposit', '2024-12-13 06:46:10'),
(24, 6, 50000, 'deposit', '2024-12-13 06:46:32'),
(25, 6, 50000, 'deposit', '2024-12-13 06:46:39'),
(26, 6, 50000, 'deposit', '2024-12-13 06:46:40'),
(27, 6, 55, 'purchase', '2024-12-13 07:22:31'),
(28, 6, 50, 'purchase', '2024-12-13 10:21:51'),
(29, 6, 1000, 'purchase', '2024-12-13 11:20:55'),
(30, 6, 1000, 'purchase', '2024-12-13 11:26:12'),
(31, 6, 1000, 'purchase', '2024-12-13 11:28:28'),
(32, 6, 1231, 'purchase', '2024-12-13 11:32:03'),
(33, 6, 1000, 'purchase', '2024-12-13 11:33:04'),
(34, 6, 60, 'purchase', '2024-12-13 14:32:57'),
(35, 6, 5000, 'purchase', '2024-12-13 14:34:45'),
(36, 6, 5000, 'purchase', '2024-12-13 14:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `coin_balance` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `email`, `coin_balance`, `created_at`, `role`) VALUES
(1, 'alice', 'hashed_pass_alice', 'alice@example.com', 100, '2024-12-12 20:06:14', 0),
(2, 'bob', 'hashed_pass_bob', 'bob@example.com', 200, '2024-12-12 20:06:14', 0),
(3, 'charlie', 'hashed_pass_charlie', 'charlie@example.com', 50, '2024-12-12 20:06:14', 1),
(4, 'david', 'hashed_pass_david', 'david@example.com', 300, '2024-12-12 20:06:14', 0),
(5, 'eve', 'hashed_pass_eve', 'eve@example.com', 205, '2024-12-12 20:06:14', 0),
(6, 'Lê Đại An 3', '$2y$10$opGjcSMg9O2waAtT/6f9w.vRY6DMprnXGI7EKjbS0SFEcAnVvEduC', 'ledaian22@gmail.com', 84804, '2024-12-12 20:17:20', 1),
(8, 'user', '$2y$10$Rpuj4iELPk8jU37bDmZaJ.ZTj5fJk4.eTc9B.SJYLUai1r4XZf/fG', 'test@user.com', 3000465, '2024-12-13 04:38:02', 1),
(10, 'admin', '$2y$10$xkFFfVnYvPRapgw4lu1K/e/QSn5FnUd9D/GQ25MX2VO8n.dZ/KHuK', 'admin@mail.com', 100, '2024-12-13 07:52:37', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `fk_movies_genres` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `fk_purchases_movies` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_purchases_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transactions_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
