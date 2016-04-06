-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2013 at 03:56 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2013escuela`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nit` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `fechan` date NOT NULL,
  `folio` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `nit`, `telefono`, `fechan`, `folio`, `curso`, `estado`) VALUES
(17, 'DIEGO', 'MARTINEZ', '123333', '667873', '1978-05-07', '45678', '7', 's'),
(18, ' JORGE', 'VASQUEZ J.', '1128059636', '6679159', '2013-09-19', '10203', '11', 's'),
(19, 'MINDA', 'HERNANDEZ SALVADOR', '1244973778', '6678176', '2013-09-19', '82837', '11', 's'),
(20, 'FABIOLA', 'HERNANDEZ', '233948', '6637749 - 17728839', '2013-09-19', '388477', '1', 's'),
(21, 'OSCAR', 'GUITIERREZ', '28839948', '7738998', '2013-09-19', '388499', '1', 's'),
(22, 'FABIAN', 'GARCIAS', '3949948', '2223333', '2013-09-19', '1212', '1', 's'),
(23, 'TERESA', 'JULIO JULIO', '6578399', '66782776', '2013-09-19', '987', '11', 's'),
(24, 'CESAR ANDRES', 'GARCIAS LOPEZ', '2345564', '6673847', '2013-09-19', '4567', '1', 's'),
(25, 'ANDRES', 'LOPEZ', '9887887', '6671836 - 413 8763 7789', '2013-09-19', '1234', '11', 's');

-- --------------------------------------------------------

--
-- Table structure for table `salones`
--

CREATE TABLE IF NOT EXISTS `salones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `salones`
--

INSERT INTO `salones` (`id`, `nombre`, `curso`, `estado`) VALUES
(1, 'A1 Matematicas', 'Curso de Matematicas', 's'),
(2, 'A2 Matematicas', 'Curso de Matematicas', 's'),
(3, 'B1 Ciencias', 'Curso de Ciencias', 's'),
(4, 'B2 Ciencias', 'Curso de Ciencias', 's'),
(5, 'C1 Programacion', 'Programacion en PHP', 's'),
(6, 'C2 Programacion', 'Programacion PHP', 's'),
(7, 'D1 Manualidades', 'Manualidades Basicas', 's'),
(11, 'Temporal', 'Temporal', 's');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ced` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `usu` varchar(255) NOT NULL,
  `con` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`ced`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ced`, `estado`, `nom`, `usu`, `con`, `tipo`) VALUES
('1128059636', 's', 'Jorge Vasquez', 'jlvasquez', 'america', 'a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
