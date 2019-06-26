-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.26-0ubuntu0.18.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5279
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for movies
DROP DATABASE IF EXISTS `movies`;
CREATE DATABASE IF NOT EXISTS `movies` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `movies`;

-- Dumping structure for table movies.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table movies.category: ~9 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `deleted_at`) VALUES
	(1, 'Action UPDATE', NULL),
	(2, 'Comedy', NULL),
	(4, 'Otro', NULL),
	(5, 'nuevaAAAAAAA', NULL),
	(6, 'Horor', NULL),
	(7, 'Alguna Categoria Edit', NULL),
	(8, 'Hororroror', NULL),
	(9, 'Jarda', NULL),
	(10, 'JardaXX', NULL),
	(11, 'Alguna Categoria NUEVA', NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table movies.country
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table movies.country: ~2 rows (approximately)
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`id`, `country_name`, `deleted_at`) VALUES
	(1, 'Bolivia', NULL),
	(2, 'Eslovaquia', NULL),
	(3, 'USA', NULL);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;

-- Dumping structure for table movies.forum
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table movies.forum: ~6 rows (approximately)
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
INSERT INTO `forum` (`id`, `name`, `message`) VALUES
	(1, 'Jerry', 'Hola Jerry'),
	(2, 'Jerry', 'Hola Jerry'),
	(3, 'Jerry', 'Hola Jerry'),
	(4, 'Moriak', 'Muhehe'),
	(5, 'Lucas', 'Hello '),
	(6, 'Karol', 'Ja som karolko'),
	(7, 'Franco', 'Hola estoy en vacaciones');
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;

-- Dumping structure for table movies.movie
CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `description` text,
  `age` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `trailer` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table movies.movie: ~0 rows (approximately)
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;

-- Dumping structure for table movies.movie_category
CREATE TABLE IF NOT EXISTS `movie_category` (
  `movie_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  UNIQUE KEY `movie_id_category_id` (`movie_id`,`category_id`),
  KEY `FK_category` (`category_id`),
  KEY `movie_id` (`movie_id`),
  CONSTRAINT `FK_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_movie` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table movies.movie_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `movie_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `movie_category` ENABLE KEYS */;

-- Dumping structure for table movies.person
CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `description` text,
  CONSTRAINT `FK_country` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
---- arregalar aqui esnerio;
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table movies.person: ~4 rows (approximately)
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`id`, `name`, `lastname`, `age`, `gender`, `country`, `description`, `deleted_at`) VALUES
	(1, 'Mel', 'Gibson', 62, 'Man', 'USA', 'Actor y director', NULL),
	(2, 'Jerry', 'Kapitan', 32, 'Man', 'Slovensko', 'Moriak', '2019-06-11 20:55:39'),
	(3, 'Anjelina', 'Joline', 40, 'Woman', 'USA', 'Bonita', NULL),
	(4, 'Jerry', 'Kapitan', 32, 'Man', 'Slovensko', 'Guapo', NULL);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;

-- Dumping structure for table movies.testCamelCase
CREATE TABLE IF NOT EXISTS `testCamelCase` (
  `CamelCaseColumn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table movies.testCamelCase: ~0 rows (approximately)
/*!40000 ALTER TABLE `testCamelCase` DISABLE KEYS */;
/*!40000 ALTER TABLE `testCamelCase` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
