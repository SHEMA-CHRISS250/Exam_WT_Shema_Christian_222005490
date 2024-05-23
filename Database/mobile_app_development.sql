-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 07:45 AM
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
-- Database: `mobile_app_development`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `CertificateID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `DateOfCertificate` date DEFAULT NULL,
  `CertificateName` varchar(100) DEFAULT NULL,
  `IssuerName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`CertificateID`, `UserID`, `CourseID`, `DateOfCertificate`, `CertificateName`, `IssuerName`) VALUES
(4, 1, 1, '2024-05-14', 'A1 diploma', 'NIYONSHUTI Jean Pierre');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ContactID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `SubmissionDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactID`, `Name`, `Email`, `Message`, `SubmissionDate`) VALUES
(1, 'Jean Pierre NIYONSHUTI', 'jeanpierreniyonshuti71@gmail.com', 'hello', '2024-05-16 12:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `InstructorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseName`, `Description`, `InstructorID`) VALUES
(1, '2024-05-16', 'obsavation project', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `DiscID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `DiscussionTopic` varchar(255) DEFAULT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `CourseRelatedQuestions` text DEFAULT NULL,
  `Replies` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`DiscID`, `UserID`, `CourseID`, `DiscussionTopic`, `TimeStamp`, `CourseRelatedQuestions`, `Replies`) VALUES
(1, 1, 1, '2024-05-16', '2024-05-12 16:34:23', 'quiz', 'no'),
(3, 1, 1, 'Javascript ', '2024-05-16 06:24:32', 'quiz', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `EnrollmentID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `EnrollmentDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`EnrollmentID`, `UserID`, `CourseID`, `EnrollmentDate`) VALUES
(1, 1, 1, '2024-05-12 15:59:21'),
(2, 1, 1, '2024-05-16 06:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `FeedbackContent` text DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedID`, `UserID`, `CourseID`, `FeedbackContent`, `Rating`, `TimeStamp`) VALUES
(1, 1, 1, 'completed ', 15, '2024-05-16 07:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `InstructorID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`InstructorID`, `FirstName`, `LastName`, `Email`, `PhoneNumber`) VALUES
(1, 'Jean Pierre', 'NIYONSHUTI', 'jeanpierreniyonshuti71@gmail.com', '0786407580');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_app_development_resources`
--

CREATE TABLE `mobile_app_development_resources` (
  `ResourceID` int(11) NOT NULL,
  `ResourceType` varchar(50) NOT NULL,
  `ResourceName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobile_app_development_resources`
--

INSERT INTO `mobile_app_development_resources` (`ResourceID`, `ResourceType`, `ResourceName`, `Description`, `URL`, `CourseID`) VALUES
(1, 'conversation ', '', 'A comprehensive tutorial on building mobile apps with React Native.', 'https://example.com/react-native-tutorial', 1),
(2, 'conversation ', '', 'A comprehensive tutorial on building mobile apps with React Native.', 'https://example.com/react-native-tutorial', 1),
(3, 'conversation ', 'greating and conversation with you ', 'Submition CAT of Web Technology ', 'https://example.com/react-native-tutorial', 1),
(5, 'conversation ', 'greating and conversation with you ', 'submition', 'https://example.com/react-native-tutorial', 1);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `ProgresID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `CompletionStatus` enum('Completed','In Progress') DEFAULT NULL,
  `PercentageOfCourse` decimal(5,2) DEFAULT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `QuizID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `QuizTitle` varchar(255) DEFAULT NULL,
  `Question` text DEFAULT NULL,
  `CorrectAnswers` text DEFAULT NULL,
  `MaximumScore` int(11) DEFAULT NULL,
  `PassingScore` int(11) DEFAULT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`QuizID`, `UserID`, `QuizTitle`, `Question`, `CorrectAnswers`, `MaximumScore`, `PassingScore`, `TimeStamp`) VALUES
(1, 1, 'Mathemathics', 'solve the equation:2x+12=10', 'a)12 b)10', 2, 5, '2024-05-12 15:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `PhoneNumber`, `Email`, `Password`) VALUES
(1, 'Jean Pierre', 'NIYONSHUTI', '0786407569', 'jeanpierreniyonshuti71@gmail.com', '1234'),
(2, 'Jean Pierre', 'NIYONSHUTI', '0786407569', 'niyoyonshutij.p1234@gmail.com', '1234'),
(3, 'Jean Pierre', 'NIYONSHUTI', '0786407569', 'jeanpierreniyonshuti71@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`CertificateID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `InstructorID` (`InstructorID`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`DiscID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`EnrollmentID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`InstructorID`);

--
-- Indexes for table `mobile_app_development_resources`
--
ALTER TABLE `mobile_app_development_resources`
  ADD PRIMARY KEY (`ResourceID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`ProgresID`) USING BTREE,
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`QuizID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `CertificateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `DiscID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `EnrollmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `InstructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mobile_app_development_resources`
--
ALTER TABLE `mobile_app_development_resources`
  MODIFY `ResourceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `QuizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `certificate_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`InstructorID`) REFERENCES `instructor` (`InstructorID`);

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `discussion_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `mobile_app_development_resources`
--
ALTER TABLE `mobile_app_development_resources`
  ADD CONSTRAINT `mobile_app_development_resources_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`ProgresID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
