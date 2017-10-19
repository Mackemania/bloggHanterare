-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1

-- Tid vid skapande: 19 okt 2017 kl 13:23

-- Serverversion: 10.1.19-MariaDB
-- PHP-version: 7.0.13


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `blog`
--

-- --------------------------------------------------------

DROP TABLE commentversion;
DROP TABLE postversion;
DROP TABLE permission;
DROP TABLE flag;
DROP TABLE suspension;
DROP TABLE comment;
DROP TABLE post;
DROP TABLE blog;
DROP TABLE css;
DROP TABLE user;

-- --------------------------------------------------------

--
-- Tabellstruktur `blog`
--

CREATE TABLE `blog` (
  `blogID` int(11) NOT NULL,
  `blogTitle` varchar(30) NOT NULL,
  `blogDescription` varchar(140) DEFAULT NULL,
  `permissionStatus` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(11) NOT NULL,
  `css` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `blog`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `OS` varchar(30) NOT NULL,
  `IP` varchar(15) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `source` varchar(50) NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `commentversion`
--

CREATE TABLE `commentversion` (
  `commentVersion` int(11) NOT NULL,
  `oldID` int(11) NOT NULL,
  `newID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `css`
--

CREATE TABLE `css` (
  `cssID` int(11) NOT NULL,
  `source` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `css`
--

INSERT INTO `css` (`cssID`, `source`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Tabellstruktur `flag`
--

CREATE TABLE `flag` (
  `reportID` int(11) NOT NULL,
  `reportDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `checked` tinyint(1) DEFAULT NULL,
  `OS` varchar(30) DEFAULT NULL,
  `reason` varchar(140) DEFAULT NULL,
  `IP` varchar(15) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `blogID` int(11) DEFAULT NULL,
  `commentID` int(11) DEFAULT NULL,
  `postID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `permission`
--

CREATE TABLE `permission` (
  `permissionID` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `blogID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `postTitle` varchar(30) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `source` varchar(30) NOT NULL,
  `userID` int(11) NOT NULL,
  `blogID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `post`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `postversion`
--

CREATE TABLE `postversion` (
  `postVersion` int(11) NOT NULL,
  `oldID` int(11) NOT NULL,
  `newID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `suspension`
--

CREATE TABLE `suspension` (
  `suspensionID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `alias` varchar(30) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `eMail` varchar(50) NOT NULL,
  `birthDate` varchar(10) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `suspended` varchar(10) DEFAULT NULL,
  `aboutMe` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `user`
--

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `css` (`css`);

--
-- Index för tabell `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `postID` (`postID`);

--
-- Index för tabell `commentversion`
--
ALTER TABLE `commentversion`
  ADD PRIMARY KEY (`commentVersion`),
  ADD KEY `oldID` (`oldID`),
  ADD KEY `newID` (`newID`);

--
-- Index för tabell `css`
--
ALTER TABLE `css`
  ADD PRIMARY KEY (`cssID`);

--
-- Index för tabell `flag`
--
ALTER TABLE `flag`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `blogID` (`blogID`),
  ADD KEY `commentID` (`commentID`),
  ADD KEY `postID` (`postID`);

--
-- Index för tabell `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permissionID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `blogID` (`blogID`);

--
-- Index för tabell `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `blogID` (`blogID`);

--
-- Index för tabell `postversion`
--
ALTER TABLE `postversion`
  ADD PRIMARY KEY (`postVersion`),
  ADD KEY `oldID` (`oldID`),
  ADD KEY `newID` (`newID`);

--
-- Index för tabell `suspension`
--
ALTER TABLE `suspension`
  ADD PRIMARY KEY (`suspensionID`),
  ADD KEY `userID` (`userID`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `blog`
--
ALTER TABLE `blog`
  MODIFY `blogID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `commentversion`
--
ALTER TABLE `commentversion`
  MODIFY `commentVersion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `css`
--
ALTER TABLE `css`
  MODIFY `cssID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `flag`
--
ALTER TABLE `flag`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `permission`
--
ALTER TABLE `permission`
  MODIFY `permissionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `postversion`
--
ALTER TABLE `postversion`
  MODIFY `postVersion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `suspension`
--
ALTER TABLE `suspension`
  MODIFY `suspensionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`css`) REFERENCES `css` (`cssID`);

--
-- Restriktioner för tabell `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`);

--
-- Restriktioner för tabell `commentversion`
--
ALTER TABLE `commentversion`
  ADD CONSTRAINT `commentversion_ibfk_1` FOREIGN KEY (`oldID`) REFERENCES `comment` (`commentID`),
  ADD CONSTRAINT `commentversion_ibfk_2` FOREIGN KEY (`newID`) REFERENCES `comment` (`commentID`);

--
-- Restriktioner för tabell `flag`
--
ALTER TABLE `flag`
  ADD CONSTRAINT `flag_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `flag_ibfk_2` FOREIGN KEY (`blogID`) REFERENCES `blog` (`blogID`),
  ADD CONSTRAINT `flag_ibfk_3` FOREIGN KEY (`commentID`) REFERENCES `comment` (`commentID`),
  ADD CONSTRAINT `flag_ibfk_4` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`);

--
-- Restriktioner för tabell `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `permission_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `permission_ibfk_2` FOREIGN KEY (`blogID`) REFERENCES `blog` (`blogID`);

--
-- Restriktioner för tabell `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`blogID`) REFERENCES `blog` (`blogID`);

--
-- Restriktioner för tabell `postversion`
--
ALTER TABLE `postversion`
  ADD CONSTRAINT `postversion_ibfk_1` FOREIGN KEY (`oldID`) REFERENCES `post` (`postID`),
  ADD CONSTRAINT `postversion_ibfk_2` FOREIGN KEY (`newID`) REFERENCES `post` (`postID`);

--
-- Restriktioner för tabell `suspension`
--
ALTER TABLE `suspension`
  ADD CONSTRAINT `suspension_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
