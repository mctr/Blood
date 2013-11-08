-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Eki 2013, 18:46:51
-- Sunucu sürümü: 5.5.32-0ubuntu0.13.04.1
-- PHP Sürümü: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `Blood`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `password_digest` varchar(128) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `phone_number` varchar(16) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `status` int(2) DEFAULT '2',
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blood_groups`
--

CREATE TABLE IF NOT EXISTS `blood_groups` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blood_makings`
--

CREATE TABLE IF NOT EXISTS `blood_makings` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `donor_id` int(8) NOT NULL,
  `institute_id` int(4) NOT NULL,
  `blood_making_date` date NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `city` varchar(32) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `city_id` int(4) NOT NULL,
  `district` varchar(32) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `donors`
--

CREATE TABLE IF NOT EXISTS `donors` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `tc` int(11) NOT NULL,
  `blood_group_id` int(2) NOT NULL,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `password_digest` varchar(128) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `phone_number` varchar(16) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `gender` varchar(8) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `birthday` date NOT NULL,
  `blood_making_date` date DEFAULT NULL,
  `status` int(2) NOT NULL,
  `city_id` int(4) NOT NULL,
  `district_id` int(4) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`tc`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `donor_requests`
--

CREATE TABLE IF NOT EXISTS `donor_requests` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `donor_id` int(8) NOT NULL,
  `blood_group_id` int(2) NOT NULL,
  `status` int(2) DEFAULT '2',
  `content` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `institutes`
--

CREATE TABLE IF NOT EXISTS `institutes` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `password_digest` varchar(128) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `phone_number` varchar(16) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `status` int(2) DEFAULT '2',
  `role_id` int(2) NOT NULL,
  `city_id` int(4) NOT NULL,
  `district_id` int(4) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `searches`
--

CREATE TABLE IF NOT EXISTS `searches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_group_id` int(2) NOT NULL,
  `institute_id` int(4) DEFAULT '0',
  `city_id` int(4) DEFAULT NULL,
  `district_id` int(4) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
