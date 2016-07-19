-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2016 at 06:17 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `05-CV-world`
--

-- --------------------------------------------------------

--
-- Table structure for table `CV`
--

CREATE TABLE IF NOT EXISTS `CV` (
`id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `First_name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `Last_name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Furigana_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Photo` text COLLATE utf8_unicode_ci NOT NULL,
  `Birth_date` date NOT NULL,
  `Gender` tinyint(1) NOT NULL DEFAULT '1',
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `Contact_information` text COLLATE utf8_unicode_ci NOT NULL,
  `Phone` char(255) CHARACTER SET latin1 NOT NULL,
  `Self_intro` text COLLATE utf8_unicode_ci NOT NULL,
  `Marriage` tinyint(1) NOT NULL,
  `配偶者の扶養義務` tinyint(1) NOT NULL,
  `Request` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `positions` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CV`
--

INSERT INTO `CV` (`id`, `user_id`, `First_name`, `Last_name`, `Furigana_name`, `Photo`, `Birth_date`, `Gender`, `Address`, `Contact_information`, `Phone`, `Self_intro`, `Marriage`, `配偶者の扶養義務`, `Request`, `updated_at`, `created_at`, `positions`, `notes`) VALUES
(105, 1, 'Linh i', 'Dang my', 'ミー・リン　', '', '1994-11-02', 0, 'Hải Phòng i', 'kjkjkj', '038-823-8478', 'Minima ea et odit nisi. Placeat facere et deleniti perferendis est delectus voluptatem. Sint eligendi eveniet porro sit nemo aut.', 0, 0, ' dkjllji lamkjl', '2016-06-01 23:53:58', '2016-05-27 08:33:31', 'l; kkk ', ''),
(106, 2, 'Phúc Quyên', 'Lư', '', '', '1979-09-22', 1, 'Hồ Chí Minh', '', '+84-168-411-5841', 'Queen furiously, throwinn inkstand at the March Hare said to the little thing grunted in reply (it had left off when they arrived, with a trumpet in one hand and a large caterpillar, that was.', 0, 0, '', '2016-06-01 21:00:12', '2016-05-27 08:33:31', '', ''),
(107, 9, 'Hào Thắm', 'Bùi', '', '', '1972-09-05', 1, 'Hải Phòng', '', '(84)(68)562-6385', 'I to do?'' said Alice. ''Well, I never heard it before,'' said the King. ''I can''t explain it,'' said Five, in a very pretty dance,'' said Alice thoughtfully: ''but then--I shouldn''t be hungry for it,.', 0, 0, '', '2016-05-27 08:33:31', '2016-05-27 08:33:31', '', ''),
(108, 10, 'Vỹ Đôn', 'Vừ', '', '', '1985-09-14', 1, 'Hà Nội', '', '094-208-0989', 'On various pretexts they all cheered. Alice thought the poor child, ''for I can''t remember,'' said the King: ''however, it may kiss my hand if it wasn''t very civil of you to set about it; and the pool.', 0, 0, '', '2016-05-27 08:33:31', '2016-05-27 08:33:31', '', ''),
(109, 11, 'Đan Độ', 'Khưu', '', '', '1994-12-06', 1, 'Đà Nẵng', '', '079 429 8510', 'Waiting in a tone of the song. ''What trial is it?'' The Gryphon lifted up both its paws in surprise. ''What! Never heard of such a curious dream!'' said Alice, and she very good-naturedly began hunting.', 0, 0, '', '2016-05-27 08:33:31', '2016-05-27 08:33:31', '', ''),
(110, 12, 'Cẩn Lâm', 'Trác', '', '', '1970-12-27', 1, 'Hồ Chí Minh', '', '0231 240 3464', 'And she began thinking over other children she knew she had a VERY good opportunity for showing off her head!'' about once in a louder tone. ''ARE you to set them free, Exactly as we were. My notion.', 0, 0, '', '2016-05-27 08:33:31', '2016-05-27 08:33:31', '', ''),
(111, 13, 'Nga Vỹ', 'Ong', '', '', '1984-10-21', 1, 'Cần Thơ', '', '(022)535-3595', 'Alice thought decidedly uncivil. ''But perhaps he can''t help it,'' said Alice loudly. ''The idea of the hall: in fact she was a child,'' said the King, the Queen, the royal children; there were a Duck.', 0, 0, '', '2016-05-27 08:33:31', '2016-05-27 08:33:31', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `it_skill`
--

CREATE TABLE IF NOT EXISTS `it_skill` (
`id` int(9) NOT NULL,
  `cv_id` int(6) NOT NULL,
  `skill_type` tinyint(9) NOT NULL,
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `study_time` int(2) NOT NULL,
  `work_time` int(2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `it_skill`
--

INSERT INTO `it_skill` (`id`, `cv_id`, `skill_type`, `name`, `study_time`, `work_time`, `updated_at`, `created_at`) VALUES
(15, 105, 0, 'Chinese', 6, 3, '2016-06-02 02:04:03', '2016-06-02 09:03:29'),
(16, 106, 0, 'english', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(17, 107, 0, 'french', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(18, 108, 0, 'french', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(19, 109, 0, 'japanese', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(20, 110, 0, 'chinese', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(21, 111, 0, 'japanese', 6, 3, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(22, 105, 1, 'Java', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(23, 106, 1, 'Java', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(24, 107, 1, 'C', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(25, 108, 1, 'Ruby', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(26, 109, 1, 'Ruby', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(27, 110, 1, 'PHP', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29'),
(28, 111, 1, 'C', 9, 5, '2016-06-02 09:03:06', '2016-06-02 09:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
`id` int(9) NOT NULL,
  `cv_id` int(6) NOT NULL,
  `Content` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Type` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=429 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `cv_id`, `Content`, `Date`, `Type`, `created_at`, `updated_at`) VALUES
(357, 106, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(358, 107, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(359, 108, 'Đại học XXX - Hà Nội', '2012-11-03', 0, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(360, 109, 'Đại học XXX - Cần Thơ', '2012-11-03', 0, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(361, 110, 'Đại học XXX - Đà Nẵng', '2012-11-03', 0, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(362, 111, 'Đại học XXX - Hải Phòng', '2012-11-03', 0, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(363, 105, 'Công ty Thu Việt - Hồ Chí Minh', '2012-12-07', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(364, 106, 'Công ty Siêu Bảo - Cần Thơ', '2012-12-07', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(365, 107, 'Công ty Phụng Tuấn - Cần Thơ', '2012-12-07', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(366, 108, 'Công ty Phong Ngọc - Hà Nội', '2012-12-07', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(367, 109, 'Công ty Mi Kha - Đà Nẵng', '2012-12-07', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(368, 110, 'Công ty Đào Hùng - Hồ Chí Minh', '2012-12-07', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(369, 111, 'Công ty Phong Triết - Đà Nẵng', '2012-12-07', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(370, 105, 'Công ty Chưởng Phương - Hồ Chí Minh', '2014-04-17', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(371, 106, 'Công ty Nhã Hảo - Cần Thơ', '2014-04-17', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(372, 107, 'Công ty Nhã Lập - Hải Phòng', '2014-04-17', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(373, 108, 'Công ty Nhu Hảo - Hải Phòng', '2014-04-17', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(374, 109, 'Công ty Pháp Nghĩa - Cần Thơ', '2014-04-17', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(375, 110, 'Công ty Trúc Hoa - Đà Nẵng', '2014-04-17', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(376, 111, 'Công ty Nghĩa Phú - Hồ Chí Minh', '2014-04-17', 1, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(377, 105, 'Hà Nội', '2012-12-07', 2, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(378, 106, 'Hồ Chí Minh', '2012-12-07', 2, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(379, 107, 'Đà Nẵng', '2012-12-07', 2, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(380, 108, 'Cần Thơ', '2012-12-07', 2, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(381, 109, 'Cần Thơ', '2012-12-07', 2, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(382, 110, 'Hà Nội', '2012-12-07', 2, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(383, 111, 'Hồ Chí Minh', '2012-12-07', 2, '2016-05-27 08:33:31', '0000-00-00 00:00:00'),
(398, 105, 'wfs', '2016-01-01', 0, '2016-05-31 23:48:43', '2016-05-31 23:48:43'),
(405, 105, ' jkjkk  afsdf', '2011-03-01', 1, '2016-06-01 08:22:18', '2016-06-01 01:22:18'),
(406, 105, 'trwowng 888', '2011-03-01', 0, '2016-06-01 00:02:28', '2016-06-01 00:02:28'),
(412, 105, 'cert', '2014-12-01', 2, '2016-06-01 00:31:38', '2016-06-01 00:31:38'),
(415, 105, 'wqeq', '2001-03-01', 2, '2016-06-01 00:52:14', '2016-06-01 00:52:14'),
(416, 105, 'asdffdsfafsdfafddfdfg', '2012-02-01', 1, '2016-06-01 01:00:47', '2016-06-01 01:00:47'),
(417, 105, 'sdff', '2011-09-01', 2, '2016-06-01 01:01:04', '2016-06-01 01:01:04'),
(418, 105, 'Coong ty sdfmsll', '1999-12-01', 1, '2016-06-01 01:01:21', '2016-06-01 01:01:21'),
(419, 105, 'ewee  kkk', '2014-03-01', 0, '2016-06-02 08:50:05', '2016-06-02 01:50:05'),
(420, 105, 'sdsdff jkkj', '2012-09-01', 0, '2016-06-01 08:21:42', '2016-06-01 01:21:42'),
(421, 105, 'adsdddadfdfbklls;fsfj', '2011-09-01', 1, '2016-06-01 01:22:12', '2016-06-01 01:22:12'),
(422, 106, 'dsdd', '2011-10-01', 0, '2016-06-01 20:58:21', '2016-06-01 20:58:21'),
(423, 106, 'sdssd', '2009-01-01', 0, '2016-06-01 20:58:30', '2016-06-01 20:58:30'),
(424, 106, 'bằng lái xe', '2014-10-01', 2, '2016-06-01 20:58:58', '2016-06-01 20:58:58'),
(425, 106, 'bằng nghề', '2011-09-01', 2, '2016-06-01 20:59:16', '2016-06-01 20:59:16'),
(426, 106, 'thư kí tại cty xxx', '2009-03-01', 1, '2016-06-01 20:59:42', '2016-06-01 20:59:42'),
(427, 106, 'giám đốc tại cty ads', '2015-09-01', 1, '2016-06-01 21:00:01', '2016-06-01 21:00:01'),
(428, 105, 'fsdhngkjslkdf', '2003-04-01', 0, '2016-06-01 23:53:28', '2016-06-01 23:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `note`, `active`, `image`) VALUES
(1, 'Linh Dang my ', 'admin@123.com', 2, '$2y$10$bA8Mqj4VrHOsFmkKYcax2.5dO3BLGlWPJCbR6Qo6l2NEsqOJN69qi', 'UUsoxHhtkXh7p4Z1PMn9db7m7pBbEjULXykosNLgAD51B1QHKCNz97lGlTeb', '0000-00-00 00:00:00', '2016-06-02 02:33:15', '', 1, '2016-06-02-09-33-15-tumblr_nhd7z4ma9H1rwwqtpo1_1280.jpg'),
(2, 'Linh Dan', 'applicant@123.com', 0, '$2y$10$lrLdkIbXYoYIr0zCiwRwFuhac7D2ME081KZ2WYFYcPaE31EyeExgy', 'AwLgLWeddSpake1aT2bVc6FinVuFubmP4MxzHKpHv6iAi0KdvvWQjAeqRUrl', '0000-00-00 00:00:00', '2016-06-02 02:08:13', '', 1, ''),
(3, 'Linh Dang', 'visitor@123.com', 1, '$2y$10$5u1CvN1eRSwcVISJemF0UuNREciwRNskVuHtoGXB6VFUspDmfUC22', '5monrgchdoOgFw4LAEOYJWFvEZpxGRku4yn7JkrwKcGnenfEJ8jWzh73Mgr6', '0000-00-00 00:00:00', '2016-06-01 20:57:48', '', 1, ''),
(4, 'Diana 1', 'dSchiller@example.com', 1, '$2y$10$TgwT3aoM33DseL61A.0rg.X2sn5PuRr/dh5l3Ukt2gauq64DGQPK.', NULL, '0000-00-00 00:00:00', '2016-05-29 21:10:54', '', 1, ''),
(5, 'Pierre Jerde', 'Leffler.Jedidiah@example.net', 1, '$2y$10$iLor5rOzVvPefDvfnwli/.l/5/nvXyaEDtc9w1Jfj/M.Cd38GchwS', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, ''),
(6, 'Rosa Cummings MD', 'Tyrese.Kozey@example.com', 1, '$2y$10$HczkRxnx/0BXipkT9m5S4evIn5km6T1Afw1IyR69HGtIqX5U2Teim', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, ''),
(7, 'Sedrick Bashirian', 'Beatty.Agustin@example.com', 1, '$2y$10$R.6.gJVjAcqURxXzehD8/OnirmxoT1b5A7VPgRMSfTz56EAgLouTO', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, ''),
(8, 'Prof. Jeff Morissette IV', 'Orlando52@example.net', 1, '$2y$10$auAZ6U0RUyrOKLyIH5lxLuIRn2uoZLE2.qMwoMD2VxEmxVtemMqra', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, ''),
(9, 'Mr. Horacio Breitenberg DDS', 'Abdul05@example.net', 0, '$2y$10$AVUb.ehm2ookCZuI.nFI5ONLdpJIRmJWRGJ4ck42VwFtKIsXCSE62', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, ''),
(10, 'Terrance Bayer II', 'Skiles.Jodie@example.net', 0, '$2y$10$SdbIIWoQsB9qW8Y4TOBvBut5ZWqkmzFhj2Zbq/vvRdplFeSZfigja', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, ''),
(11, 'Mr. Deonte Greenfelder DDS', 'Becker.Rhianna@example.com', 0, '$2y$10$EQv8v2H5oWxZg8aC75vjROOARyacS.83HhvlUyPqNqkS2q86.lUoa', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, ''),
(12, 'Taylor Quitzon MD', 'Johnson.Ryann@example.org', 0, '$2y$10$Wfsr.QWXYWMk9jl28aRP/.q2kmTFQ9BsqfoahGDbanuMDD.XfF07y', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, ''),
(13, 'Abigayle Huels', 'eGislason@example.net', 0, '$2y$10$CW42YpoCAUa4eQ5tDAbNk.PxMGYaKkvfADkBwOAIr2X6KxAEqWgRy', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CV`
--
ALTER TABLE `CV`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_skill`
--
ALTER TABLE `it_skill`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CV`
--
ALTER TABLE `CV`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `it_skill`
--
ALTER TABLE `it_skill`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=429;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
