-- Students/teachers Database dump

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `updater`
--
CREATE DATABASE IF NOT EXISTS `updater` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `updater`;

-- --------------------------------------------------------

--
-- Table structure for table `loginattempts`
--

CREATE TABLE `loginattempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` char(23) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `c1lock` tinyint(4) DEFAULT NULL,
  `c2lock` tinyint(4) DEFAULT NULL,
  `c3lock` tinyint(4) DEFAULT NULL,
  `c4lock` tinyint(4) DEFAULT NULL,
  `c5lock` tinyint(4) DEFAULT NULL,
  `c6lock` tinyint(4) DEFAULT NULL,
  `c7lock` tinyint(4) DEFAULT NULL,
  `c8lock` tinyint(4) DEFAULT NULL,
  `c9lock` tinyint(4) DEFAULT NULL,
  `c10lock` tinyint(4) DEFAULT NULL,
  `c11lock` tinyint(4) DEFAULT NULL,
  `c12lock` tinyint(4) DEFAULT NULL,
  `c13lock` tinyint(4) DEFAULT NULL,
  `c14lock` tinyint(4) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `last_name` tinytext NOT NULL,
  `first_name` tinytext NOT NULL,
  `c1_teacher` tinytext,
  `c1_course` tinytext,
  `c1_grade` tinytext,
  `c1_feedback` text,
  `c2_teacher` tinytext,
  `c2_course` tinytext,
  `c2_grade` tinytext,
  `c2_feedback` text,
  `c3_teacher` tinytext,
  `c3_course` tinytext,
  `c3_grade` tinytext,
  `c3_feedback` text,
  `c4_teacher` tinytext,
  `c4_course` tinytext,
  `c4_grade` tinytext,
  `c4_feedback` text,
  `c5_teacher` tinytext,
  `c5_course` tinytext,
  `c5_grade` tinytext,
  `c5_feedback` text,
  `c6_teacher` tinytext,
  `c6_course` tinytext,
  `c6_grade` tinytext,
  `c6_feedback` text,
  `c7_teacher` tinytext,
  `c7_course` tinytext,
  `c7_grade` tinytext,
  `c7_feeback` text,
  `c8_teacher` tinytext,
  `c8_course` tinytext,
  `c8_grade` tinytext,
  `c8_feeback` text,
  `c9_teacher` tinytext,
  `c9_course` tinytext,
  `c9_grade` tinytext,
  `c9_feeback` text,
  `c10_teacher` tinytext,
  `c10_course` tinytext,
  `c10_grade` tinytext,
  `c10_feedback` text,
  `c11_teacher` tinytext,
  `c11_course` tinytext,
  `c11_grade` tinytext,
  `c11_feedback` text,
  `c12_teacher` tinytext,
  `c12_course` tinytext,
  `c12_grade` tinytext,
  `c12_feedback` text,
  `c13_teacher` tinytext,
  `c13_course` tinytext,
  `c13_grade` tinytext,
  `c13_feedback` text,
  `c14_teacher` tinytext,
  `c14_course` tinytext,
  `c14_grade` tinytext,
  `c14_feedback` text,
  `c1_updated` varchar(100) DEFAULT NULL,
  `c2_updated` varchar(100) DEFAULT NULL,
  `c3_updated` varchar(100) DEFAULT NULL,
  `c4_updated` varchar(100) DEFAULT NULL,
  `c5_updated` varchar(100) DEFAULT NULL,
  `c6_updated` varchar(100) DEFAULT NULL,
  `c7_updated` varchar(100) DEFAULT NULL,
  `c8_updated` varchar(100) DEFAULT NULL,
  `c9_updated` varchar(100) DEFAULT NULL,
  `c10_updated` varchar(100) DEFAULT NULL,
  `c11_updated` varchar(100) DEFAULT NULL,
  `c12_updated` varchar(100) DEFAULT NULL,
  `c13_updated` varchar(100) DEFAULT NULL,
  `c14_updated` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `ID` tinytext NOT NULL,
  `TITLE` tinytext NOT NULL,
  `CONTENT` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginattempts`
--
ALTER TABLE `loginattempts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `web`
--
ALTER TABLE `web` ADD FULLTEXT KEY `CONTENT` (`CONTENT`);
ALTER TABLE `web` ADD FULLTEXT KEY `CONTENT_2` (`CONTENT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginattempts`
--
ALTER TABLE `loginattempts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2413;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
