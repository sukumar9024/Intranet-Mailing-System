-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 07:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mail`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `recipient_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` varchar(50) DEFAULT 'sent',
  `attachments` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `sender_email`, `recipient_email`, `subject`, `body`, `status`, `attachments`, `timestamp`) VALUES
(1, 'akshay@gmail.com', 'akshay@gmail.com', 'Test', 'Hello', 'sent', '', '2023-11-20 04:30:34'),
(2, 'akshay@gmail.com', 'ranjith@gmail.com', 'Test', 'Hello', 'sent', '', '2023-11-20 04:31:31'),
(3, 'akshay@gmail.com', 'ranjith@gmail.com', 'Test-2', 'Time in IST', 'sent', '', '2023-11-20 09:03:32'),
(4, 'jana@gmail.com', 'ranjith@gmail.com', 'I am Ranjith', 'Hello Bro', 'sent', '', '2023-11-20 09:57:35'),
(5, 'akshay@gmail.com', 'jana@gmail.com', 'CN Lab', 'This message is sent from me', 'sent', '', '2023-11-20 09:57:54'),
(6, 'jana@gmail.com', 'akshay@gmail.com', 'hello', '44', 'sent', '', '2023-11-20 10:00:21'),
(7, 'akshay@gmail.com', 'jana@gmail.com', '545', '546rheafjndajlfamdf', 'sent', '', '2023-11-20 10:01:42'),
(8, 'akshay@gmail.com', 'jana@gmail.com', 'qw0qur0q', 'ekemak;ffma', 'sent', '', '2023-11-20 10:09:41'),
(9, 'sukumarchintham9024@gmail.com', 'akshay@gmail.com', 'Attachment_test-1', 'File Image', 'sent', '', '2023-11-20 14:53:31'),
(10, 'akshay@gmail.com', 'akshay@gmail.com', 'Reciets Test', 'Hello THere', 'sent', '', '2023-11-20 16:13:26'),
(11, 'sukumarchintham9024@gmail.com', 'akshay@gmail.com', 'receits test', 'Hello', 'sent', '', '2023-11-20 16:15:59'),
(12, 'sukumarchintham9024@gmail.com', 'akshay@gmail.com', 'Attachment_test-2', 'Image', 'sent', '', '2023-11-20 16:30:31'),
(13, 'sukumarchintham9024@gmail.com', 'akshay@gmail.com', 'Attachment_test-4', 'Image', 'sent', 'C:\\xampp\\htdocs\\php-signup-login-main/../php-signup-login-main/attachments655b8bc1adba8_AI1.png', '2023-11-20 16:39:29'),
(14, 'sukumarchintham9024@gmail.com', 'akshay@gmail.com', 'Attachment_test-5', 'Image', 'sent', 'C:\\xampp\\htdocs\\php-signup-login-main/../php-signup-login-main/attachments655b8d26e7d3a_AI1.png', '2023-11-20 16:45:26'),
(15, 'sukumarchintham9024@gmail.com', 'akshay@gmail.com', 'Attachment_test-5', 'Image', 'sent', 'C:\\xampp\\htdocs\\php-signup-login-main/../php-signup-login-main/attachments655b8ec491823_AI1.png', '2023-11-20 16:52:20'),
(16, 'sukumarchintham9024@gmail.com', 'akshay@gmail.com', 'Attachment_test-6', 'Image', 'sent', 'C:\\xampp\\htdocs\\php-signup-login-main/../php-signup-login-main/attachments/655b93b66ec7b_th.jpeg', '2023-11-20 17:13:26'),
(17, 'akshay@gmail.com', 'sukumarchintham9024@gmail.com', '1234', 'kfslfm', 'sent', 'C:\\xampp\\htdocs\\php-signup-login-main/../php-signup-login-main/attachments/655b98380b217_2020-12-05.png', '2023-11-20 17:32:40'),
(18, 'sukumarchintham9024@gmail.com', 'akshay@gmail.com', 'Final-Test Attachment', 'Hello Image', 'sent', 'C:\\xampp\\htdocs\\php-signup-login-main/../php-signup-login-main/attachments/655ce10539115_chatbot.png', '2023-11-21 16:55:33'),
(19, 'sukumarchintham9024@gmail.com', 'akshay@gmail.com', 'Body ', '<?php\\r\\nsession_start();\\r\\n\\r\\nif ($_SERVER[\\\"REQUEST_METHOD\\\"] === \\\"POST\\\") {\\r\\n    $mysqli = require __DIR__ . \\\"/database1.php\\\";\\r\\n\\r\\n    // Check if the user is logged in\\r\\n    if (!isset($_SESSION[\\\"email\\\"])) {\\r\\n        // Redirect to the login page or handle unauthorized access\\r\\n        header(\\\"Location: login.php\\\");\\r\\n        exit;\\r\\n    }\\r\\n\\r\\n    // Get sender email from the session\\r\\n    $senderEmail = $_SESSION[\\\"email\\\"];\\r\\n\\r\\n    // Get other form data\\r\\n    $recipientEmail = $mysqli->real_escape_string($_POST[\\\"recipient\\\"]);\\r\\n    $subject = $mysqli->real_escape_string($_POST[\\\"subject\\\"]);\\r\\n    $body = $mysqli->real_escape_string($_POST[\\\"body\\\"]);\\r\\n\\r\\n    // Get the timestamp from the system\\r\\n    date_default_timezone_set(\\\"Asia/Kolkata\\\");\\r\\n    $timestamp = date(\\\"Y-m-d H:i:s\\\");\\r\\n\\r\\n    // Variables for handling attachments\\r\\n    $targetFilePath = null;\\r\\n\\r\\n    // Check if the form was submitted with a file\\r\\n    if (isset($_FILES[\\\"attachment\\\"]) && $_FILES[\\\"attachment\\\"][\\\"error\\\"] === UPLOAD_ERR_OK) {\\r\\n        // Specify the target directory for file uploads (htdocs/attachments)\\r\\n        $targetDirectory = __DIR__ . \\\"/../php-signup-login-main/attachments/\\\";\\r\\n\\r\\n        // Create the target directory if it doesn\\\'t exist\\r\\n        if (!file_exists($targetDirectory)) {\\r\\n            mkdir($targetDirectory, 0777, true);\\r\\n        }\\r\\n\\r\\n        // Generate a unique filename to avoid overwriting existing files\\r\\n        $filename = uniqid() . \\\"_\\\" . basename($_FILES[\\\"attachment\\\"][\\\"name\\\"]);\\r\\n        $targetFilePath = $targetDirectory . $filename;\\r\\n\\r\\n        // Move the uploaded file to the target directory\\r\\n        if (!move_uploaded_file($_FILES[\\\"attachment\\\"][\\\"tmp_name\\\"], $targetFilePath)) {\\r\\n            echo \\\"Error uploading file.\\\";\\r\\n            exit;\\r\\n        }\\r\\n    }\\r\\n\\r\\n    // Insert data into the database\\r\\n    $insertSql = \\\"INSERT INTO emails (sender_email, recipient_email, subject, body, status, attachments, timestamp) \\r\\n                  VALUES (?, ?, ?, ?, \\\'sent\\\', ?, ?)\\\";\\r\\n\\r\\n    $stmt = $mysqli->prepare($insertSql);\\r\\n    $stmt->bind_param(\\\"ssssss\\\", $senderEmail, $recipientEmail, $subject, $body, $targetFilePath, $timestamp);\\r\\n    \\r\\n    // Execute the prepared statement\\r\\n    $stmt->execute();\\r\\n    $stmt->close();\\r\\n\\r\\n    // Redirect to a success page or do further processing\\r\\n    header(\\\"Location: allmails.php\\\");\\r\\n    exit;\\r\\n}\\r\\n?>\\r\\n', 'sent', NULL, '2023-11-21 17:16:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
