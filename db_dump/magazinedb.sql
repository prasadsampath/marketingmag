-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 15, 2016 at 08:24 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazinedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_name`) VALUES
(1, 'information technology'),
(2, 'MIT'),
(3, 'Bio Chemistry'),
(4, 'Mathematics'),
(5, 'Agriculture'),
(6, 'marine engineering'),
(7, 'Game Development'),
(9, 'Drama'),
(10, 'Robotics'),
(11, 'Politics'),
(12, 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `faculty` int(11) NOT NULL,
  `fPath` text NOT NULL,
  `imgPath` text NOT NULL,
  `selected` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `fName`, `uid`, `faculty`, `fPath`, `imgPath`, `selected`) VALUES
(1, 'Tutorsync-changes.docx', 15, 2, '../uploads/user-15-fac-2-Tutorsync-changes.docx', '../uploads/user-15-fac-2-images01.png', 1),
(2, 'CW_COMP1640.docx', 15, 2, '../uploads/user-15-fac-2-CW_COMP1640.docx', '../uploads/user-15-fac-2-girl-using-computer.jpg', 0),
(5, 'CW_COMP1640.docx', 17, 2, '../uploads/user-17-fac-2-CW_COMP1640.docx', '../uploads/user-17-fac-2-images01.png', 1),
(6, 'CW_COMP1640.docx', 16, 1, '../uploads/user-16-fac-1-CW_COMP1640.docx', '../uploads/user-16-fac-1-images01.png', 1),
(7, 'Tutorsync-changes.docx', 24, 1, '../uploads/user-24-fac-1-Tutorsync-changes.docx', '../uploads/user-24-fac-1-project-management-procrastination.jpg', 0),
(8, 'Tutorsync-changes.docx', 30, 1, '../uploads/user-30-fac-1-Tutorsync-changes.docx', '../uploads/user-30-fac-1-images01.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `faculty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `uid`, `faculty`) VALUES
(3, 15, 2),
(4, 15, 2),
(5, 16, 1),
(6, 16, 1),
(7, 17, 2),
(8, 16, 1),
(9, 24, 1),
(10, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `isLoggedIn` int(1) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `token` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `email`, `password`, `isLoggedIn`, `faculty`, `user_role`, `token`) VALUES
(15, 'stu', 'stu@gmail.com', 'a8f5f167f44f4964e6c998dee827110c', 0, '2', '4', ''),
(16, 'sam', 'sam@gmail.com', 'a8f5f167f44f4964e6c998dee827110c', 0, '1', '4', ''),
(17, 'prasad', 'hewage18@gmail.com', 'a8f5f167f44f4964e6c998dee827110c', 0, '2', '4', ''),
(18, 'Amanda', 'amanda@gmail.com', 'a8f5f167f44f4964e6c998dee827110c', 0, '4', '4', ''),
(19, 'anthony', 'anthony@gmail.com', 'a8f5f167f44f4964e6c998dee827110c', 0, '1', '4', ''),
(20, 'ann', 'ann@gmail.com', 'a8f5f167f44f4964e6c998dee827110c', 0, '5', '4', ''),
(23, 'stuwert', 'stuwert@gmail.com', 'a8f5f167f44f4964e6c998dee827110c', 0, '4', '4', ''),
(24, 'asd', 'asd1@gmail.com', 'a8f5f167f44f4964e6c998dee827110c', 0, '1', '4', ''),
(29, 'sampa', 'sampa@gmail.com', 'a8f5f167f44f4964e6c998dee827110c', 0, '3', '4', ''),
(30, 'john', 'john@gmail.com', 'e99a18c428cb38d5f260853678922e03', 0, '1', '4', ''),
(31, 'smith', 'smith@gmail.com', 'e99a18c428cb38d5f260853678922e03', 0, '1', '3', ''),
(32, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0, '1', '1', ''),
(33, 'manager', 'manager@gmail.com', 'e99a18c428cb38d5f260853678922e03', 0, '1', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `roles`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'coordinator'),
(4, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
