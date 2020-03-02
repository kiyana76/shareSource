-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 25, 2020 at 10:30 AM
-- Server version: 5.7.28
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
-- Database: `jozveh_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `First_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Last_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Filed_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_filed`
--

DROP TABLE IF EXISTS `course_filed`;
CREATE TABLE IF NOT EXISTS `course_filed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_id` int(11) NOT NULL,
  `Course_id` int(11) NOT NULL,
  `Filed_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `course_filed`
--

INSERT INTO `course_filed` (`id`, `Group_id`, `Course_id`, `Filed_name`) VALUES
(1, 1, 1, 'مهندسی کامپیوتر'),
(2, 1, 2, 'مهندسی عمران'),
(3, 1, 3, 'آمار'),
(4, 1, 4, 'مهندسی برق'),
(5, 1, 5, 'مهندسی صنایع'),
(6, 1, 6, 'مهندسی مکانیک'),
(7, 2, 1, 'مدیریت مالی'),
(8, 2, 2, 'حسابداری'),
(9, 2, 3, 'مدیریت بازرگانی'),
(10, 2, 4, 'مدیریت صنعتی'),
(11, 2, 5, 'مدیریت فرهنگی هنری'),
(12, 2, 6, 'حقوق'),
(13, 2, 7, 'روانشناسی'),
(14, 2, 8, 'مدیریت جهانگردی'),
(15, 3, 1, 'هنر ها تجسمی'),
(16, 3, 2, 'ارتباط تصویری'),
(17, 3, 3, 'معماری'),
(18, 3, 5, 'معماری داخلی'),
(19, 3, 4, 'نقاشی'),
(20, 3, 6, 'طراحی پارچه و لباس'),
(21, 3, 7, 'هنر اسلامی'),
(22, 4, 1, 'علوم پایه');

-- --------------------------------------------------------

--
-- Table structure for table `course_group`
--

DROP TABLE IF EXISTS `course_group`;
CREATE TABLE IF NOT EXISTS `course_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `course_group`
--

INSERT INTO `course_group` (`id`, `course_name`) VALUES
(1, 'فنی و مهندسی'),
(2, 'علوم انسانی'),
(3, 'هنر و معماری'),
(4, 'علوم پایه');

-- --------------------------------------------------------

--
-- Table structure for table `download_details`
--

DROP TABLE IF EXISTS `download_details`;
CREATE TABLE IF NOT EXISTS `download_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `User_id` int(10) NOT NULL,
  `Source_id` int(10) NOT NULL,
  `Download_Date` varchar(250) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10039 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `download_details`
--

INSERT INTO `download_details` (`id`, `User_id`, `Source_id`, `Download_Date`) VALUES
(10000, 1, 2, 'اضثایا'),
(10001, 8, 32, '2020-02-09 12:01:45am'),
(10002, 8, 32, '2020-02-09 12:01:50am'),
(10003, 8, 32, '2020-02-09 12:01:51am'),
(10004, 8, 32, '2020-02-09 12:01:51am'),
(10005, 8, 32, '2020-02-09 12:02:07am'),
(10006, 8, 32, '2020-02-09 12:03:07am'),
(10007, 8, 32, '2020-02-09 12:03:07am'),
(10008, 8, 32, '2020-02-09 12:03:08am'),
(10009, 8, 32, '2020-02-09 12:03:08am'),
(10010, 8, 32, '2020-02-09 12:03:08am'),
(10011, 8, 32, '2020-02-09 12:03:08am'),
(10012, 8, 32, '2020-02-09 12:03:08am'),
(10013, 8, 32, '2020-02-09 12:03:09am'),
(10014, 8, 32, '2020-02-09 12:03:09am'),
(10015, 8, 32, '2020-02-09 12:04:34am'),
(10016, 8, 32, '2020-02-09 12:04:35am'),
(10017, 8, 32, '2020-02-09 12:04:35am'),
(10018, 8, 32, '2020-02-09 12:04:35am'),
(10019, 8, 32, '2020-02-09 12:04:36am'),
(10020, 8, 32, '2020-02-09 12:04:36am'),
(10021, 8, 32, '2020-02-09 12:06:56am'),
(10022, 8, 37, '2020-02-09 06:26:32pm'),
(10023, 8, 25, '2020-02-09 06:28:28pm'),
(10024, 8, 35, '2020-02-09 06:31:30pm'),
(10025, 8, 27, '2020-02-09 06:33:37pm'),
(10026, 8, 27, '2020-02-09 06:33:56pm'),
(10027, 8, 27, '2020-02-09 06:34:58pm'),
(10028, 8, 27, '2020-02-09 06:36:08pm'),
(10029, 11, 58, '2020-02-10 02:21:24pm'),
(10030, 11, 58, '2020-02-10 02:21:27pm'),
(10031, 11, 57, '2020-02-10 02:25:25pm'),
(10032, 11, 52, '2020-02-10 05:15:16pm'),
(10033, 13, 60, '2020-02-11 10:18:05pm'),
(10034, 13, 52, '2020-02-11 10:18:12pm'),
(10035, 13, 34, '2020-02-11 10:18:18pm'),
(10036, 13, 61, '2020-02-11 10:19:34pm'),
(10037, 14, 45, '2020-02-15 10:59:35pm'),
(10038, 11, 58, '2020-02-17 09:10:27am');

-- --------------------------------------------------------

--
-- Table structure for table `normal_user`
--

DROP TABLE IF EXISTS `normal_user`;
CREATE TABLE IF NOT EXISTS `normal_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `First_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Last_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Filed_id` int(11) DEFAULT NULL,
  `Group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `normal_user`
--

INSERT INTO `normal_user` (`id`, `email`, `First_name`, `Last_name`, `pass`, `Filed_id`, `Group_id`) VALUES
(1, 'a.kh.damghani@gmail.com', 'ali', 'khorsi damghani', '132', 1, 0),
(2, 'lamaso77@yahoo.com', 'mmd', 'damghani', '456', NULL, 0),
(3, 'ali@gmail.com', 'reza', 'rezaii', '123456', NULL, 0),
(4, 'ali.mmd.ali@gmail.com', 'ho3in', 'ho3ini', '741', NULL, 0),
(5, 'a', 'a', 'a', 'a', NULL, 0),
(6, 'dami@gmail.com', '132761918', 'damghani', '132761918', 3, 1),
(7, 'kia@yahoo.com', '159a', 'kiyaee', '159a', 3, 3),
(8, 'kiyana76@gmail.com', 'kiyana1376', 'Ú©ÛŒØ§ÛŒÛŒ', 'kiyana1376', 1, 1),
(11, 'katkat@gmail.com', 'katayoon', 'kiayee', '132761918', 2, 1),
(10, 'kiyana@jwnskj.com', 'kiyana', 'kiaya', 'katkat', 6, 3),
(12, 'Kiaee1345@gmail.com', 'kiki', 'kia', '12345', 1, 1),
(13, 'kiyana@gmail.com', 'کیانا', 'کیایی', 'kiyana1376', 1, 1),
(14, 'kiyaee45@gmail.com', 'ناصر', 'کیایی', '1234', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `seconder_user`
--

DROP TABLE IF EXISTS `seconder_user`;
CREATE TABLE IF NOT EXISTS `seconder_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `First_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Last_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Admin_id` int(11) DEFAULT NULL,
  `Filed_id` int(11) DEFAULT NULL,
  `Group_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `seconder_user`
--

INSERT INTO `seconder_user` (`id`, `email`, `First_name`, `Last_name`, `pass`, `Admin_id`, `Filed_id`, `Group_id`) VALUES
(1, 'katkat@gmail.com', 'katayoon', 'kiayee', '132761918', NULL, 2, 1),
(2, 'katkat@gmail.com', 'katayoon', 'kiayee', '132761918', NULL, 2, 1),
(7, 'a.kh.damghani@gmail.com', 'ali', 'khorsi', '132', NULL, 1, 0),
(4, 'kia@yahoo.com', '159a', 'kiyaee', '159a', NULL, 3, 3),
(5, 'kiyana@jwnskj.com', 'kiyana', 'kiaya', 'katkat', NULL, 6, 3),
(6, 'a.kh.damghani@gmail.com', 'ali', 'khorsi', '132', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

DROP TABLE IF EXISTS `source`;
CREATE TABLE IF NOT EXISTS `source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `Filed_id` int(11) NOT NULL,
  `Group_id` int(11) NOT NULL,
  `Seconder_id` int(11) DEFAULT NULL,
  `Upload_data` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `source_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `Source_author_name` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `Source_type` int(11) NOT NULL,
  `Donload_count` bigint(20) NOT NULL,
  `Rate` float NOT NULL,
  `validity` int(11) NOT NULL,
  `Download_Link` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `Download_img` varchar(250) COLLATE utf8_persian_ci DEFAULT NULL,
  `Rate_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`id`, `User_id`, `Filed_id`, `Group_id`, `Seconder_id`, `Upload_data`, `source_name`, `Source_author_name`, `Source_type`, `Donload_count`, `Rate`, `validity`, `Download_Link`, `Download_img`, `Rate_count`) VALUES
(64, 11, 1, 1, NULL, '2020-02-17 09:34:18am', 'page rank', 'katayoonkiayee', 3, 0, 0, 0, 'upload/nemone_soal/49893055.rar', 'upload/nemone_soal_img/892960258.png', 0),
(63, 14, 6, 2, NULL, '2020-02-15 11:08:03pm', 'حقوق جزای عمومی 1', 'ناصرکیایی', 1, 0, 0, 0, 'upload/jozve/401168184.pdf', 'upload/jozve_img/102636599.jpg', 0),
(62, 14, 6, 2, NULL, '2020-02-15 11:06:46pm', 'حقوق جزای عمومی 1', 'ناصرکیایی', 1, 0, 0, 0, 'upload/jozve/557338230.pdf', 'upload/jozve_img/363491149.jpg', 0),
(23, 1, 5, 2, 5, '2020-02-03 11:50:48pm', 'زبان ', 'alikhorsi damghani', 1, 0, 10, 1, 'upload/jozve/695778415.rar', 'upload/jozve_img/126421509.png', 2),
(26, 1, 1, 3, 5, '2020-02-04 12:26:18am', 'زبان ', 'alikhorsi damghani', 3, 6, 1, 1, 'upload/nemone_soal/80676097.pdf', 'upload/nemone_soal_img/509211822.png', 1),
(25, 1, 1, 1, 5, '2020-02-04 12:18:05am', 'پایگاه داده', 'alikhorsi damghani', 2, 1, 3.5, 1, 'upload/ketab/901288187.pdf', 'upload/ketab_img/269079882.png', 2),
(27, 1, 1, 3, 5, '2020-02-04 12:28:07am', 'زبان ', 'alikhorsi damghani', 3, 15, 0, 1, 'upload/nemone_soal/178673654.pdf', 'upload/nemone_soal_img/783538444.png', 0),
(30, 1, 1, 2, 5, '2020-02-04 12:52:39am', 'زبان ', 'alikhorsi damghani', 4, 0, 0, 1, 'upload/konkor/600763664.rar', 'upload/konkor_img/82491021.JPG', 0),
(31, 1, 1, 2, 1, '2020-02-04 12:53:14am', 'زبان ', 'alikhorsi damghani', 4, 0, 0, 1, 'upload/konkor/80088733.rar', 'upload/konkor_img/544313882.JPG', 0),
(32, 1, 1, 2, 1, '2020-02-04 12:53:40am', 'زبان ', 'alikhorsi damghani', 4, 28, 0.294118, 1, 'upload/konkor/730146924.rar', 'upload/konkor_img/819084068.JPG', 17),
(33, 1, 1, 2, 1, '2020-02-04 12:53:55am', 'زبان ', 'alikhorsi damghani', 4, 25, 2, 1, 'upload/konkor/274138220.rar', 'upload/konkor_img/803387116.JPG', 1),
(34, 1, 1, 2, 1, '2020-02-04 12:54:11am', 'زبان ', 'alikhorsi damghani', 5, 1, 1.25, 1, 'upload/konkor/922176211.rar', 'upload/konkor_img/963305166.JPG', 4),
(35, 1, 1, 2, 1, '2020-02-04 01:08:11am', 'زبان ', 'alikhorsi damghani', 5, 1, 0, 1, 'upload/konkor/157724543.rar', 'upload/konkor_img/97712618.JPG', 1),
(36, 1, 1, 2, 5, '2020-02-05 01:48:34pm', 'تاریخ', 'alikhorsi damghani', 1, 3, 1.66667, 1, 'upload/jozve/585178445.rar', 'upload/jozve_img/567666529.png', 3),
(37, 1, 1, 2, 5, '2020-02-05 01:50:44pm', 'تاریخ', 'alikhorsi damghani', 1, 3, 3, 1, 'upload/jozve/6060287.rar', 'upload/jozve_img/914560181.png', 1),
(42, 11, 1, 4, 1, '2020-02-10 12:47:49am', 'فصل اول ریاضی 2', 'katayoonkiayee', 1, 0, 0, 1, 'upload/jozve/446525972.pdf', 'upload/jozve_img/370958290.jpg', 0),
(43, 11, 1, 4, 1, '2020-02-10 01:09:11am', 'فصل 4 ریاضی 2', 'katayoonkiayee', 1, 0, 0, 1, 'upload/jozve/907896992.pdf', 'upload/jozve_img/672809956.jpg', 0),
(44, 11, 1, 4, 1, '2020-02-10 01:09:46am', 'فصل 5 ریاضی 2', 'katayoonkiayee', 1, 0, 0, 1, 'upload/jozve/615180073.pdf', 'upload/jozve_img/513197920.jpg', 0),
(45, 11, 1, 1, 1, '2020-02-10 01:15:53am', 'کامپایلر-تحلیل معنایی', 'katayoonkiayee', 1, 1, 3.5, 1, 'upload/jozve/860803448.pdf', 'upload/jozve_img/205635227.jpg', 2),
(46, 11, 1, 1, 1, '2020-02-10 01:16:33am', 'کامپایلر-تحلیل نحوی', 'katayoonkiayee', 1, 0, 0, 1, 'upload/jozve/339707616.pdf', 'upload/jozve_img/368174749.jpg', 0),
(47, 11, 1, 1, 1, '2020-02-10 01:16:58am', 'کامپایلر-تحلیل لغوی', 'katayoonkiayee', 1, 0, 0, 1, 'upload/jozve/321697952.pdf', 'upload/jozve_img/775860814.jpg', 0),
(48, 11, 1, 1, 1, '2020-02-10 01:20:15am', 'زبان تخصصی', 'katayoonkiayee', 1, 0, 0, 1, 'upload/jozve/662392250.pdf', 'upload/jozve_img/700950257.jpg', 0),
(49, 11, 1, 1, 1, '2020-02-10 01:22:46am', 'پایگاه داده', 'katayoonkiayee', 3, 0, 0, 1, 'upload/nemone_soal/262449714.pdf', 'upload/nemone_soal_img/744826149.jpg', 0),
(50, 11, 1, 1, 1, '2020-02-10 01:24:13am', 'کامپایلر', 'katayoonkiayee', 3, 0, 0, 1, 'upload/nemone_soal/196424404.pdf', 'upload/nemone_soal_img/482520000.jpg', 0),
(51, 11, 1, 1, 1, '2020-02-10 01:26:11am', 'مدار منطقی', 'katayoonkiayee', 3, 0, 0, 1, 'upload/nemone_soal/Midterm_92931.png', 'upload/nemone_soal_img/430288216.png', 0),
(52, 11, 1, 1, 1, '2020-02-10 01:26:48am', 'مدار منطقی', 'katayoonkiayee', 3, 2, 0, 1, 'upload/nemone_soal/317635568.rar', 'upload/nemone_soal_img/744798333.png', 0),
(53, 11, 1, 1, 1, '2020-02-10 01:29:19am', 'پایگاه داده', 'katayoonkiayee', 2, 0, 0, 1, 'upload/ketab/718942277.pdf', 'upload/ketab_img/921693375.jpg', 0),
(54, 11, 1, 1, 1, '2020-02-10 01:31:28am', 'بازیابی اطلاعات', 'katayoonkiayee', 2, 0, 0, 1, 'upload/ketab/162592016.pdf', 'upload/ketab_img/140793372.png', 0),
(55, 11, 1, 1, 1, '2020-02-10 01:33:35am', 'concepts_of_programming_languages_10th_edition', 'katayoonkiayee', 2, 0, 3, 1, 'upload/ketab/694905465.pdf', 'upload/ketab_img/821557192.jpg', 1),
(56, 11, 1, 1, 1, '2020-02-10 01:35:30am', 'شبکه های کامپیوتری', 'katayoonkiayee', 4, 0, 0, 1, 'upload/video/652724701.mp4', 'upload/video_img/384055898.jpg', 0),
(57, 11, 1, 1, 1, '2020-02-10 01:36:56am', 'آموزش جاوا اسکیریپت-جلسه اول', 'katayoonkiayee', 4, 1, 3, 1, 'upload/video/282331406.mp4', 'upload/video_img/521103109.jpg', 1),
(58, 11, 6, 2, NULL, '2020-02-10 01:41:16am', 'حقوق تجارت 1', 'katayoonkiayee', 1, 2, 2.5, 0, 'upload/jozve/560618162.pdf', 'upload/jozve_img/553319909.jpg', 2),
(59, 11, 6, 2, NULL, '2020-02-10 01:44:40am', 'حقوق تجارت 2', 'katayoonkiayee', 3, 0, 0, 0, 'upload/nemone_soal/643890015.pdf', 'upload/nemone_soal_img/640721524.jpg', 0),
(60, 11, 1, 1, NULL, '2020-02-10 05:20:47pm', 'کامپایلر', 'katayoonkiayee', 1, 1, 0, 0, 'upload/jozve/247663735.pdf', 'upload/jozve_img/748483558.jpg', 0);

--
-- Triggers `source`
--
DROP TRIGGER IF EXISTS `T_import_to_others_table`;
DELIMITER $$
CREATE TRIGGER `T_import_to_others_table` AFTER INSERT ON `source` FOR EACH ROW IF (NEW.Source_type = 1)
THEN
INSERT INTO `source_jozveh` (`Source_id`,`year`,`term`,`Master_name`) VALUES (NEW.id, 1300 , 0 , 'non');

ELSEIF (NEW.Source_type = 2)
THEN
INSERT INTO `source_book` (`Source_id`,`Publishers`,`Edit`,`Athor`) VALUES (NEW.id , 'non' , 0 , 'non');

ELSEIF (NEW.Source_type = 3)
THEN
INSERT INTO `source_example` (`Source_id`,`year`,`term`,`Master_name`) 
VALUES (NEW.id, 1300 , 0 , 'non');

ELSEIF (NEW.Source_type = 4)
THEN
INSERT INTO `source_educational_film`
(`Source_id`,`Master_name`,`Course_Length`) 
VALUES (NEW.id , 'non' , 0);

ELSEIF (NEW.Source_type = 5)
THEN
INSERT INTO `source_entrance_exam`
(`Source_id` ,`year`) 
VALUES (NEW.id , 1300);

END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `source_book`
--

DROP TABLE IF EXISTS `source_book`;
CREATE TABLE IF NOT EXISTS `source_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Publishers` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Edit` int(11) NOT NULL,
  `Athor` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Source_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `source_book`
--

INSERT INTO `source_book` (`id`, `Publishers`, `Edit`, `Athor`, `Source_id`) VALUES
(3, 'non', 0, 'non', 38),
(2, 'فارسی', 10, 'رانکوهی', 25),
(4, '***', 3, 'رانکوهی', 53),
(5, '***', 2009, 'aaaa', 54),
(6, '***', 10, 'sebesta', 55);

-- --------------------------------------------------------

--
-- Table structure for table `source_educational_film`
--

DROP TABLE IF EXISTS `source_educational_film`;
CREATE TABLE IF NOT EXISTS `source_educational_film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Master_name` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `Course_Length` float NOT NULL,
  `Source_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `source_educational_film`
--

INSERT INTO `source_educational_film` (`id`, `Master_name`, `Course_Length`, `Source_id`) VALUES
(4, 'non', 0, 30),
(5, 'non', 0, 31),
(6, 'non', 0, 32),
(7, 'non', 0, 33),
(8, 'حسنی', 1, 56),
(9, 'لقمان آوند', 2, 57);

-- --------------------------------------------------------

--
-- Table structure for table `source_entrance_exam`
--

DROP TABLE IF EXISTS `source_entrance_exam`;
CREATE TABLE IF NOT EXISTS `source_entrance_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `Source_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `source_entrance_exam`
--

INSERT INTO `source_entrance_exam` (`id`, `year`, `Source_id`) VALUES
(1, 1395, 34),
(2, 1395, 35);

-- --------------------------------------------------------

--
-- Table structure for table `source_example`
--

DROP TABLE IF EXISTS `source_example`;
CREATE TABLE IF NOT EXISTS `source_example` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `Master_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Source_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `source_example`
--

INSERT INTO `source_example` (`id`, `year`, `term`, `Master_name`, `Source_id`) VALUES
(1, 1300, 0, 'non', 21),
(2, 1398, 1, 'مهوش', 26),
(3, 1398, 1, 'مهوش', 27),
(4, 1300, 0, 'non', 39),
(5, 1397, 2, 'فهیمه ملکوتی', 49),
(6, 1396, 1, 'علی سلطانی', 50),
(7, 1395, 1, 'عرشی زاده', 51),
(8, 1395, 1, 'عرشی زاده', 52),
(9, 1394, 2, 'پیام نور', 59),
(10, 1397, 1, 'فاطمه غظیم زاده', 64);

-- --------------------------------------------------------

--
-- Table structure for table `source_jozveh`
--

DROP TABLE IF EXISTS `source_jozveh`;
CREATE TABLE IF NOT EXISTS `source_jozveh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `Master_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Source_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `source_jozveh`
--

INSERT INTO `source_jozveh` (`id`, `year`, `term`, `Master_name`, `Source_id`) VALUES
(1, 1398, 2, 'عظیم زاده', 1),
(2, 1376, 1, 'khademi', 7),
(3, 1396, 1, 'rezvanian', 6),
(4, 1396, 1, 'hoseini', 9),
(5, 1397, 1, 'lalle', 10),
(6, 1396, 1, 'fahim', 11),
(7, 1300, 0, 'non', 20),
(10, 1396, 1, 'ترجندی', 36),
(9, 1390, 2, 'مهوش', 23),
(11, 1396, 1, 'ترجندی', 37),
(14, 1394, 2, 'خدیجه حسینی', 42),
(15, 1394, 2, 'خدیجه حسینی', 43),
(16, 1394, 2, 'خدیجه حسینی', 44),
(17, 1396, 2, 'علی سلطانی', 45),
(18, 1396, 2, 'علی سلطانی', 46),
(19, 1396, 2, 'علی سلطانی', 47),
(20, 1397, 1, 'مینوفام', 48),
(21, 1398, 1, 'دکنر گلچین', 58),
(22, 1395, 1, 'علی سلطانی', 60),
(23, 1392, 1, 'فخرالدین عباس زاده', 62),
(24, 1392, 1, 'فخرالدین عباس زاده', 63);

-- --------------------------------------------------------

--
-- Table structure for table `source_type`
--

DROP TABLE IF EXISTS `source_type`;
CREATE TABLE IF NOT EXISTS `source_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Source_name` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
