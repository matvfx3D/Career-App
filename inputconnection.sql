-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 01:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inputconnection`
--

-- --------------------------------------------------------

--
-- Table structure for table `minput`
--

CREATE TABLE `minput` (
  `sTrack` varchar(100) NOT NULL,
  `sFactor1` varchar(100) NOT NULL,
  `sFactorRate1` int(100) NOT NULL,
  `sFactor2` varchar(100) NOT NULL,
  `sFactorRate2` int(100) NOT NULL,
  `sFactor3` varchar(100) NOT NULL,
  `sFactorRate3` int(100) NOT NULL,
  `sSkill1` varchar(100) NOT NULL,
  `sSkillRate1` int(100) NOT NULL,
  `sSkill2` varchar(100) NOT NULL,
  `sSkillRate2` int(100) NOT NULL,
  `sSkill3` varchar(100) NOT NULL,
  `sSkillRate3` int(100) NOT NULL,
  `sSkill4` varchar(100) NOT NULL,
  `sSkillRate4` int(100) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `minput`
--

INSERT INTO `minput` (`sTrack`, `sFactor1`, `sFactorRate1`, `sFactor2`, `sFactorRate2`, `sFactor3`, `sFactorRate3`, `sSkill1`, `sSkillRate1`, `sSkill2`, `sSkillRate2`, `sSkill3`, `sSkillRate3`, `sSkill4`, `sSkillRate4`, `Date`) VALUES
('STEM', 'Medical interest', 90, 'Medical knowledge', 90, 'Presence of math', 90, 'Critical thinking', 100, 'Mathematical knowledge', 100, 'Communication', 100, 'Presentation', 100, '2024-03-06 16:19:21'),
('GAS', 'Financial', 70, 'Uncertain passion', 70, 'Teaching', 70, 'Creative thinking ', 100, 'Critical thinking ', 100, 'Cognitive thinking ', 100, 'Problem-solving ', 100, '2024-03-06 16:26:21'),
('ABM', 'Numbers interest', 88, 'Financial', 85, 'Job availability', 99, 'Problem-solving', 85, 'Analysis', 70, 'Adaptability', 90, 'Critical thinking', 88, '2024-03-06 16:54:59'),
('TVL - ICT', 'Technological interest', 100, 'Technologically proficient', 100, 'Demand', 100, 'Problem-solving', 100, 'Logical thinking', 100, 'Analysis', 100, 'Networking', 100, '2024-03-06 17:05:25'),
('STEM', 'Medical interest', 100, 'High salary', 100, 'Public service', 100, 'Critical thinking', 100, 'Leadership', 100, 'Communication', 100, 'Adaptability', 100, '2024-03-06 17:14:48'),
('STEM', 'Financial', 100, '-', 0, '-', 0, 'Accounting', 100, '-', 0, '-', 0, '-', 0, '2024-03-06 17:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `moutput`
--

CREATE TABLE `moutput` (
  `sCourse` varchar(100) NOT NULL,
  `Similar_Courses` varchar(200) NOT NULL,
  `Accuracy` int(100) NOT NULL,
  `F1-Score` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moutput`
--

INSERT INTO `moutput` (`sCourse`, `Similar_Courses`, `Accuracy`, `F1-Score`, `Date`) VALUES
('Biology', 'Biology, Nursing, Computer Science, Meteorology, Chemistry', 1, 1, '2024-03-06 16:19:23'),
('Nursing', 'Nursing, Computer Science, Social Work, Agri Tech, Secondary Education - Science', 1, 1, '2024-03-06 16:26:23'),
('Computer Science', 'Computer Science, Management, Information Technology, Chemistry, Accountancy', 1, 1, '2024-03-06 16:55:02'),
('Information Technology', 'Information Technology, Computer Science, Fisheries, Chemistry, Computer science', 1, 1, '2024-03-06 17:05:27'),
('Nursing', 'Nursing, Computer Science, Entrepreneurship, Biology, Chemistry', 1, 1, '2024-03-06 17:14:49'),
('Biology', 'Biology, Computer Science, Information Technology, -, Nursing', 1, 1, '2024-03-06 17:17:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
