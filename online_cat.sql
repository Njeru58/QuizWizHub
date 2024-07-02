-- MySQL dump 10.13  Distrib 8.0.37, for Win64 (x86_64)
--
-- Host: localhost    Database: online_cat
-- ------------------------------------------------------
-- Server version	8.0.37


--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ;


--
-- Dumping data for table `admins`
--

INSERT INTO `admins` VALUES (1,'noxx56','$2y$10$wr39kRH2g9fhQ9a6J8K9HOEDxDLUN6ul2dXRWxlL8hoO089UjKsZO','kababa@gmail.com'),(2,'dr.noxx','$2y$10$Bgb7tdE1JWeFdc1dC1RXluJ236hSO9yJmMIqvObsw0v7Q0IArKPp.','drnoxx@gmail.com'),(3,'dr.kababa','$2y$10$GoMnXkPM4Qe2zYOUTCrpEuXFNuOpN8I6HshmUWRhrURwWEF2Z2fsC','drkababa@gmail.com'),(4,'dr.njeru','$2y$10$QWkeMuu2u9J37GOR7HzqkOFR3J2fNsDP2c06l93NvGIknGFoD.AqS','admin1@gmail.com');


--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` text,
  `answers` text,
  `correct_answer` text,
  `duration` int NOT NULL DEFAULT '0',
  `submitted_answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


--
-- Dumping data for table `question`
--

INSERT INTO `question` VALUES (41,'2.	What is the binary representation of the decimal number 27?','A. 11010;\r\nB. 10011;\r\nC. 11100;\r\nD. 10101\r\n','B. 10011',0,NULL),(42,'3.	What is the result of the binary addition: 1011 + 0101?','a) 11000;\r\nb) 11110;\r\nc) 10000;\r\nd) 11100\r\n','d) 11100',0,NULL),(43,'4.	Convert the hexadecimal number A5 to binary.','a) 10100101;\r\nb) 11001010;\r\nc) 10010101;\r\nd) 10101010\r\n','a) 10100101',0,NULL),(44,'5.	What is the purpose of Karnaugh maps in logic minimization?','a) To simplify complex Boolean expressions;\r\nb) To maximize logic circuit complexity;\r\nc) To minimize the number of logic gates;\r\nd) To generate truth tables\r\n','a) To simplify complex Boolean expressions',0,NULL),(45,'6.	What is the function of a 555 timer?','a) It counts binary digits;\r\nb) It generates pulses and oscillations;\r\nc) It performs arithmetic operations;\r\nd) It converts analog signals to digital signals\r\n',' b) It generates pulses and oscillations',3600,NULL);


--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(20) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school` varchar(100) NOT NULL,
  `year_of_study` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registration_number` (`registration_number`),
  UNIQUE KEY `email` (`email`)
);


--
-- Dumping data for table `students`
--


INSERT INTO `students` VALUES (18,'student1','$2y$10$hQ.6UnvW12Go6dNhyutNb.oj66495zckvE.Xmm0/8w.yjXN.radSG','student1@gmail.com','School8',3,'2024-05-16 06:11:57'),(19,'sc209/108/21','$2y$10$TdbbfhEFVeSsOw2CXf/IXuBuuP4Zt4FAMdTyib2GwBfYDOk2sYH6K','student2@gmail.com','School1',3,'2024-05-20 12:30:56');



--
-- Table structure for table `test_results`
--

DROP TABLE IF EXISTS `test_results`;

CREATE TABLE `test_results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `marks_scored` int NOT NULL,
  PRIMARY KEY (`id`)
);


--
-- Dumping data for table `test_results`
--



INSERT INTO `test_results` VALUES (9,'student1','student1@gmail.com',3),(10,'sc209/108/21','student2@gmail.com',2),(11,'student1','student1@gmail.com',2);
