-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 07:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blogId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `blogContent` varchar(240) NOT NULL,
  `category` varchar(20) NOT NULL,
  `userId` int(10) NOT NULL,
  `likes` int(100) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blogId`, `createdDate`, `blogContent`, `category`, `userId`, `likes`, `username`) VALUES
(1, '2021-04-16', 'this is b\'s blog post', 'First Posts', 1, 2, 'b'),
(2, '2021-04-16', 'this is b\'s blog post', 'First Posts', 1, 2, 'b'),
(3, '2021-04-16', 'a', 'a', 0, 0, 'b'),
(4, '2021-04-16', 'a', 'a', 0, 0, 'b'),
(5, '2021-04-16', 'A is posting', 'first post', 0, 9, 'a'),
(6, '2021-04-17', 'this is jarin\'s first post', 'First Posts', 0, 3, 'jarin'),
(7, '2021-04-17', 'POSTING AGAIN', 'php', 0, 0, 'jarin'),
(8, '2021-04-17', 'POSTING AGAIN', 'php', 0, 0, 'jarin'),
(9, '2021-04-17', 'POSTING AGAIN', 'php', 0, 0, 'login');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `commentContent` varchar(120) NOT NULL,
  `userId` int(10) NOT NULL,
  `blogId` int(10) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `commentContent`, `userId`, `blogId`, `username`) VALUES
(1, 'great post', 4, 2, 'b'),
(2, 'awesome post', 4, 2, 'b'),
(3, 'great post', 4, 2, 'b'),
(4, 'awesome post', 4, 2, 'b'),
(5, 'hehy', 0, 2, 'a'),
(6, 'asfasfa', 0, 1, 'a'),
(7, 'asdasda', 0, 3, 'a'),
(8, 'asdasda', 0, 3, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userImage` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `userEmail`, `userPassword`, `userImage`) VALUES
(3, 'a', 'fp.chalhub@fa', 'e2fc714c4727ee9395f324cd2e7f331f', ''),
(0, 'abc', 'abc@abc', '900150983cd24fb0d6963f7d28e17f72', 0x4172726179),
(0, 'abcd', 'abc@abcdef', 'e2fc714c4727ee9395f324cd2e7f331f', ''),
(0, 'abcde', 'abc@abcdefe', 'ab56b4d92b40713acc5af89985d4b786', ''),
(4, 'b', 'fp.chalhub@gmail', '92eb5ffee6ae2fec3ad71c777531578f', ''),
(0, 'def', 'def@def', '4ed9407630eb1000c0f6b63842defa7d', 0x4172726179),
(1, 'felipe', 'fp.chalhub@gmail.com', 'password123', ''),
(0, 'hij', 'hij@hij', 'c35e82e4c0d9825787af27932ca7b64a', 0x4361707475726531322e504e47),
(0, 'jarin', 'jarin@jarin', 'a22f6590aececd4d295202dc6411e36a', 0x4361707475726531302e504e47),
(0, 'login', 'email@email', '6c569aabbf7775ef8fc570e228c16b98', 0x4361707475726531342e504e47),
(2, 'siddesh', 'nambiar.siddesh@gmail.com', 'password123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blogId`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
