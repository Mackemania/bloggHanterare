-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 05 okt 2017 kl 10:07
-- Serverversion: 10.1.19-MariaDB
-- PHP-version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `bloggportal`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `anondata_comment`
--

CREATE TABLE `anondata_comment` (
  `anonData_CommentID` int(5) NOT NULL,
  `IP` varchar(15) NOT NULL,
  `OS` varchar(30) NOT NULL,
  `commentID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `blogg`
--

CREATE TABLE `blogg` (
  `bloggID` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(140) DEFAULT NULL,
  `CSS` varchar(30) DEFAULT NULL,
  `permission` int(1) DEFAULT NULL,
  `IP` varchar(15) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `comment`
--

CREATE TABLE `comment` (
  `commentID` int(5) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `editDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `textFile` varchar(30) NOT NULL,
  `userID` int(5) NOT NULL,
  `postID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `post`
--

CREATE TABLE `post` (
  `postID` int(5) NOT NULL,
  `title` varchar(15) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `editDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `textFile` varchar(30) NOT NULL,
  `userID` int(5) NOT NULL,
  `bloggID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `userID` int(5) NOT NULL,
  `eMail` varchar(50) NOT NULL,
  `alias` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fName` varchar(30) DEFAULT NULL,
  `eName` varchar(30) DEFAULT NULL,
  `fDate` varchar(10) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL,
  `IP` varchar(15) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `anondata_comment`
--
ALTER TABLE `anondata_comment`
  ADD PRIMARY KEY (`anonData_CommentID`),
  ADD KEY `commentID` (`commentID`);

--
-- Index för tabell `blogg`
--
ALTER TABLE `blogg`
  ADD PRIMARY KEY (`bloggID`),
  ADD KEY `userID` (`userID`);

--
-- Index för tabell `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `postID` (`postID`);

--
-- Index för tabell `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bloggID` (`bloggID`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `alias` (`alias`),
  ADD UNIQUE KEY `eMail` (`eMail`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `anondata_comment`
--
ALTER TABLE `anondata_comment`
  MODIFY `anonData_CommentID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `blogg`
--
ALTER TABLE `blogg`
  MODIFY `bloggID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `anondata_comment`
--
ALTER TABLE `anondata_comment`
  ADD CONSTRAINT `anondata_comment_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comment` (`commentID`);

--
-- Restriktioner för tabell `blogg`
--
ALTER TABLE `blogg`
  ADD CONSTRAINT `blogg_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Restriktioner för tabell `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`);

--
-- Restriktioner för tabell `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`bloggID`) REFERENCES `blogg` (`bloggID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
