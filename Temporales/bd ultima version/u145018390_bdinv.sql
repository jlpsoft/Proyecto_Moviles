
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-04-2016 a las 18:12:41
-- Versión del servidor: 10.0.20-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u145018390_bdinv`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`u145018390_root`@`localhost` PROCEDURE `deleteEmployee`(IN id int(10))
BEGIN
	DELETE FROM employee WHERE id=id;
END$$

CREATE DEFINER=`u145018390_root`@`localhost` PROCEDURE `deleteProduct`(IN id int(10))
BEGIN
	DELETE FROM product WHERE id=id;
END$$

CREATE DEFINER=`u145018390_root`@`localhost` PROCEDURE `insertBrand`(IN name varchar(50))
BEGIN
	INSERT INTO brand VALUES(NULL,name);
END$$

CREATE DEFINER=`u145018390_root`@`localhost` PROCEDURE `insertCategory`(IN description varchar(50))
BEGIN
	INSERT INTO category VALUES(NULL,description);
END$$

CREATE DEFINER=`u145018390_root`@`localhost` PROCEDURE `insertColor`(IN name varchar(50))
BEGIN
	INSERT INTO color VALUES(NULL,name);
END$$

CREATE DEFINER=`u145018390_root`@`localhost` PROCEDURE `insertEmployee`(IN name varchar(50),IN lastname varchar(50),IN email varchar(80),IN username varchar(20),IN password varchar(20),IN dni char(8),IN dateborn date,IN datestart date,IN city varchar(50),IN idFkLogin int(10),IN idFkRole int(10))
BEGIN
	INSERT INTO employee VALUES(NULL,name,lastname,email,username,password,dni,dateborn,datestart,city,idFkLogin,idFkRole);
END$$

CREATE DEFINER=`u145018390_root`@`localhost` PROCEDURE `insertProduct`(IN name varchar(50),IN price float,IN stock int(10),IN idFkBrand int(10),IN idFkSize int(10),IN idFkColor int(10))
BEGIN
	INSERT INTO product VALUES(NULL,name,price,stock,idFkCategory,idFkBrand,idFkSize,idFkColor);
END$$

CREATE DEFINER=`u145018390_root`@`localhost` PROCEDURE `insertRole`(IN description varchar(50))
BEGIN
	INSERT INTO role VALUES(NULL,description);
END$$

CREATE DEFINER=`u145018390_root`@`localhost` PROCEDURE `insertSize`(IN name varchar(3))
BEGIN
	INSERT INTO size VALUES(NULL,name);
END$$

CREATE DEFINER=`u145018390_root`@`localhost` PROCEDURE `insertTransaction`(IN typetransaction varchar(20),IN idFkEmployee int(10),IN idFkProduct int(10), IN amountOfUnits int(10))
BEGIN
	INSERT INTO transaction VALUES(NULL,typetransaction,(select NOW()),amountOfUnits,idFkEmployee,idFkProduct);
	UPDATE product SET stock=IF(STRCMP('INGRESO',typetransaction),stock+amountOfUnits,stock-amountOfUnits)
	WHERE id=idFkProduct;
END$$

CREATE DEFINER=`u145018390_root`@`localhost` PROCEDURE `updateBrand`(IN id int(10),IN name varchar(50))
BEGIN
	UPDATE `brand` SET `name`=name
	WHERE `id`=id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'ADIDAS'),
(2, 'NIKE'),
(3, 'REEBOK'),
(4, 'GUESS'),
(5, 'PUMA'),
(6, 'CALVIN KLEIN'),
(7, 'LACOSTE'),
(8, 'DIOR'),
(9, 'QUILSILVER'),
(10, 'GAP'),
(11, 'ROXY'),
(12, 'CHANEL'),
(13, 'LA MARTINA'),
(14, 'GUCCI'),
(15, 'FRANKLIN MARSHALL'),
(16, 'ABERCROMBIE & FITCH'),
(17, 'NEW ERA FITS'),
(18, 'RALPH LAUREN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `description`) VALUES
(1, 'Polo'),
(2, 'Pantalón'),
(3, 'Zapatillas'),
(4, 'Sandalias'),
(5, 'Zapatos'),
(6, 'Camiseta'),
(7, 'Medias'),
(8, 'Gorro'),
(9, 'Rodilleras'),
(10, 'Chandal'),
(11, 'Bikini'),
(12, 'Bermuda'),
(13, 'Pantaloneta'),
(14, 'Boxer'),
(15, 'Top'),
(16, 'Bañador'),
(17, 'Guantes'),
(18, 'Sudadera'),
(19, 'Ballerinas'),
(20, 'Gafas de Sol'),
(21, 'Jersey'),
(22, 'Mallas'),
(23, 'Chubasquero'),
(24, 'Parkas'),
(25, 'Chaqueta'),
(26, 'Casadora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'PERSONALIZADO'),
(2, 'BLANCO'),
(3, 'NEGRO'),
(4, 'PLOMO'),
(5, 'AZUL'),
(6, 'ROJO'),
(7, 'ROSADO'),
(8, 'AMARILLO'),
(9, 'VERDE'),
(10, 'MORADO'),
(11, 'CELESTE'),
(12, 'TURQUESA'),
(13, 'MARRÓN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dni` char(8) NOT NULL,
  `dateborn` date NOT NULL,
  `datestart` date NOT NULL,
  `city` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `address` varchar(50) NOT NULL,
  `idFkRole` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `username` (`username`),
  KEY `employee_ibfk_2` (`idFkRole`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`id`, `name`, `lastname`, `email`, `username`, `password`, `dni`, `dateborn`, `datestart`, `city`, `active`, `address`, `idFkRole`) VALUES
(1, 'ELDER', 'ALMORIN TORREJON', 'ealmorin@gmail.com', 'EALMORIN', 'intelcore2duo', '07195806', '1982-04-05', '1951-09-28', 'LORETO', 0, 'Calle Piura 336 - Punchana - Maynas', 1),
(2, 'SEGUNDO ÓSCAR', 'ÁLVAREZ ROMERO', 'salvarez@gmail.com', 'SALVAREZ', 'intelcore2duo', '07639874', '1992-03-25', '1964-01-17', 'LIBERTAD', 0, 'Av.España872-3 -Trujillo', 2),
(3, 'ERROL', 'APONTE GUERRERO', 'eaponte@gmail.com', 'EAPONTE', 'intelcore2duo', '18095992', '1985-03-06', '1963-06-26', 'PIURA', 0, 'Av. San Ramon s/n Urb. El Chipe', 2),
(4, 'LUZ GLORIA ', 'AQUINO MOSQUERA', 'laquino@gmail.com', 'LAQUINO', 'intelcore2duo', '07227131', '1989-02-14', '1964-05-17', 'JUNIN', 0, 'Jr. Loreto 363 - Huancayo', 2),
(5, 'RICARDO ANTONIO ', 'ARBAÑIL RIVADENEIRA', 'rarbañil@gmail.com', 'RARBANIL', 'intelcore2duo', '07581065', '1987-12-06', '1963-10-10', 'MOQUEGUA', 0, 'Av. Balta s/n - cruce con Calle Tacna', 2),
(6, 'ISAAC', 'ARCE PÉREZ', 'iarce@gmail.com', 'IARCE', 'intelcore2duo', '07185045', '1988-07-07', '1960-05-31', 'CITY-NO', 0, 'Carretera Yurimaguas Nº 408 Banda Shilcayo - Tarap', 2),
(7, 'JOSÉ PABLO', 'CASTRO LOPEZ', 'jcastro@gmail.com', 'JCASTRO', 'intelcore2duo', '10281383', '1988-06-06', '1963-10-14', 'PIURA', 0, 'Urb. Leoncio elias Arbolera F11', 2),
(8, 'SANTOS', 'CCORAHUA AYTE', 'sccorahua@gmail.com', 'SCCORAHUA', 'intelcore2duo', '09605223', '1986-04-01', '1962-11-21', 'APURIMAC', 0, 'Plaza de Armas Tamburco s/n - Abancay', 2),
(9, ' JOSÉ CARLOS ', 'ECHE LLENQUE', 'jeche@gmail.com', 'JECHE', 'intelcore2duo', '09863166', '1984-10-20', '1960-01-05', 'CITY-NO', 0, 'Av. Ricardo Angulo 695 - San isidro', 2),
(10, 'SANTIAGO', 'ELIZALDE DIOSES', 'selizalde@gmail.com', 'SELIZALDE', 'intelcore2duo', '18032436', '1984-12-27', '1962-12-22', 'TUMBES', 0, 'Av. Tupac Amaru 128 - Tumbes', 2),
(11, 'JESUS MANUEL', 'ESPINOZA LUGO', 'jespinoza@gmail.com', 'JESPINOZA', 'intelcore2duo', '06475266', '1985-01-04', '1962-12-11', 'HUANUCO', 0, 'Jr. Junin 415 - Huanuco', 2),
(12, 'ROGER ADRÍAN', 'ESPINOZA PARADO', 'respinoza@gmail.com', 'RESPINOZA', 'intelcore2duo', '07880663', '1985-02-26', '1963-07-07', 'AYACUCHO', 0, 'Jr. Callao 122 - Huamanga', 2),
(13, 'GIOVANA GICELLY', 'FALCON RUÍZ', 'gfalcon@gmail.com', 'GFALCON', 'intelcore2duo', '06147942', '1990-04-08', '1962-09-12', 'BARRANCO', 0, 'Av. Petit Thouars 4698 - Miraflores', 2),
(14, 'MIGUEL ÁNGEL', 'FERRER RECARTE', 'mferrer@gmail.com', 'MFERRER', 'intelcore2duo', '05200501', '1979-10-25', '1937-08-24', 'CITY.NO', 0, 'Av. San Borja Sur 407 - San Borja', 2),
(15, 'DOMINGO FRANCISCO ', 'FIGUEROA CORTEZ', 'dfigueroa@gmail.com', 'DFIGUEROA', 'intelcore2duo', '07258710', '1991-09-09', '1960-10-13', 'TUMBES', 0, 'Av. Mariscal Castilla 957 - Tumbes', 2),
(16, ' EMERSON', 'FLORES FLORES', 'eflores@gmail.com', 'EFLORES', 'intelcore2duo', '07180571', '1978-02-02', '1954-06-02', 'AMAZONAS', 0, 'Heroes del Cenepa 668 - Bagua - Amazonas', 2),
(17, 'CARLOS', 'FLORES ZAMBRANO', 'cflores@gmail.com', 'CFLORES', 'intelcore2duo', '10553983', '1981-10-26', '1969-09-01', 'LIMA', 0, 'Mz. D lote 21 Urb Sr. De Los Milagros - SMP', 2),
(18, 'WASHINGTON GABINO ', 'GAMBOA VELAZCO', 'wgamboa@gmail.com', 'WGAMBOA', 'intelcore2duo', '06682306', '1993-01-01', '1969-05-19', 'MADRE DE DIOS', 0, 'Fiztcarald 265 - Tambopat', 2),
(19, 'BEBERLI', 'GONZALES DE OLIVEIRA', 'bgonzales@gmail.com', 'BGONZALES', 'intelcore2duo', '07223843', '1990-08-06', '1965-05-10', 'LORETO', 0, 'Cornejo Portugal 2319 - Belen - Iquitos', 2),
(20, 'LUIS', 'GONZALES GUAYAN', 'lgonzales@gmail.com', 'LGONZALES', 'intelcore2duo', '07189721', '1979-07-30', '1940-09-08', 'UCAYALI', 0, 'Av. Primavera 2da Etapa Mz 11 lote 1', 2),
(21, 'ELENIZ KARIN', 'GUILLEN ALVARO', 'eguillen@gmail.com', 'EGUILLEN', 'intelcore2duo', '07237360', '1990-07-08', '1969-09-01', 'ICA', 0, 'Av. Cutervo 920 - Ica', 2),
(22, 'PABLO ERNESTO ', 'HERRERA ROSALES', 'pherrera@gmail.com', 'PHERRERA', 'intelcore2duo', '07212628', '1987-07-07', '1955-11-07', 'MOQUEGUA', 0, 'Calle Ancash No 109 - Moquegua', 2),
(23, 'MARIO', 'HUAMAN SURCO', 'mhuaman@gmail.com', 'MHUAMAN', 'intelcore2duo', '08471154', '1984-09-06', '1954-09-05', 'MADRE DE DIOS', 0, 'Jr. Las ponas a15 - Tambopata', 2),
(24, 'MARÍA CRISTINA ', 'HUAMANCHUMO LEYTON', 'mhuamanchumo@gmail.com', 'MHUAMANCHUMO', 'intelcore2duo', '07256252', '1986-11-12', '1958-03-23', 'LAMBAYEQUE', 0, 'Calle Balta 412 - Pimentel - Chiclayo', 2),
(25, 'MANUEL', 'LARA LANDÍVAR', 'mlara@gmail.com', 'MLARA', 'intelcore2duo', '07247805', '1989-03-04', '1969-08-17', 'TACNA', 0, 'Calle Argentina 640 - Urb Villa Hermosa', 2),
(26, 'LUIS EDGARDO ', 'LEÓN LEÓN', 'lleon@gmail.com', 'LLEON', 'intelcore2duo', '10146729', '1980-06-05', '1967-09-26', 'CAJAMARCA', 0, 'Urb. La alameda Santa Teresa de Journet ', 2),
(27, 'ROBERT CLODOALDO ', 'LÓPEZ VALVERDE', 'rlopez@gmail.com', 'RLOPEZ', 'intelcore2duo', '06080192', '1986-05-11', '1967-01-19', 'JUNIN', 0, 'Jr. Loreto 363 - Huancayo', 2),
(28, 'ROCÍO ZOILA', 'LÓPEZ VERA', 'rolopez@gmail.com', 'ROLOPEZ', 'intelcore2duo', '10147652', '1989-06-20', '1969-05-28', 'CITY-NO', 0, 'Av. San Borja Sur 406 - San Borja', 2),
(29, 'JUAN ALEXIS', 'LUQUE UCHUCHOQUE', 'jluque@gmail.com', 'JLUQUE', 'intelcore2duo', '07185074', '1989-06-12', '1949-06-08', 'AREQUIPA', 0, 'Av. Unión 200 - Urb. César Vallejo - Paucarpata', 2),
(30, 'MARÍA DEL ROSARIO', 'MACARLUPÚ ESCOLÁSTICO', 'mmacarlupu@gmail.com', 'MMACARLUPU', 'intelcore2duo', '07230626', '1984-12-26', '1956-04-14', 'LIMA', 0, 'Jr. Tacna 540 - Huancayo', 2),
(31, 'JOSE ALFONSO', 'MARON VASQUEZ', 'jmaron@gmail.com', 'JMARON', 'intelcore2duo', '07183831', '1991-01-20', '1967-01-15', 'PUNO', 0, 'Urb. Villa del lago H22 - Puno', 2),
(32, 'PUBLIO ALEJANDRO', 'MEDINA ABANTO', 'pmedina@gmail.com', 'PMEDINA', 'intelcore2duo', '07181148', '1990-01-21', '1965-10-23', 'CAJAMARCA', 0, 'Jr. Jaime de Martines 208 - Bambamarca', 2),
(33, 'MÓNICA MAGDALENA', 'MENDIOLA CHAVEZ', 'mmendiola@gmail.com', 'MMENDIOLA', 'intelcore2duo', '07190463', '1986-03-24', '1962-12-02', 'MIRAFLORES', 0, 'Ernesto Cardenas 123 Dpto 201 - Surco', 2),
(34, 'FREDY LUIS', 'MONZÓN TORRES', 'fmonzon@gmail.com', 'FMONZON', 'intelcore2duo', '06792769', '1981-10-18', '1969-09-12', 'AREQUIPA', 0, 'Av. Kennedy cdra 16 s/n Paucarpata', 2),
(35, 'CARLOS WALTER', 'NACARINO RODRIGUEZ', 'cnacarino@gmail.com', 'CNACARINO', 'intelcore2duo', '10144756', '1985-01-03', '1966-04-03', 'SUR', 0, 'Calle Colón Nº 122 Urb. Alas del Sur', 2),
(36, 'EDGAR AMERICO', 'OLIVERA MAROCHO', 'eolivera@gmail.com', 'EOLIVERA', 'intelcore2duo', '07231957', '1986-11-05', '1965-04-02', 'CITY-NO', 0, 'Choquechaca 285 - Cusco', 2),
(37, 'ROCKY', 'PADILLA RUIZ', 'rpadilla@gmail.com', 'RPADILLA', 'intelcore2duo', '06218990', '1992-03-17', '1964-01-28', 'UCAYALI', 0, 'Jr. Salaverry 660 - Pucallpa', 2),
(38, 'JOSE RONALD', 'PALOMINO ARONI', 'jpalomino@gmail.com', 'JPALOMINO', 'intelcore2duo', '08215991', '1983-03-11', '1959-05-08', 'ICA', 0, 'Av. Cutervo 920 - Ica', 2),
(39, 'FIDEL CIRILO', 'PALOMINO MORALES', 'fpalomino@gmail.com', 'FPALOMINO', 'intelcore2duo', '07938442', '1990-01-13', '1965-11-03', 'AYACUCHO', 0, 'Av. Independencia 604 - Huamanga', 2),
(40, 'CARLOS ANTONIO', 'PAREDES ARANDA', 'cparedes@gmail.com', 'CPAREDES', 'intelcore2duo', '07220191', '1986-11-13', '1965-03-22', 'ANCASH', 0, 'Jr. Villanueva 1017 - Huaraz', 2),
(41, 'ROLANDO', 'PAREDES GAMONAL', 'rparedes@gmail.com', 'RPAREDES', 'intelcore2duo', '07212762', '1984-05-15', '1958-09-21', 'ICA', 0, 'Urb. San Miguel E-145 - Ica', 2),
(42, 'JUAN CARLOS ', 'PINTO MALAGA', 'jpinto@gmail.com', 'JPINTO', 'intelcore2duo', '23715129', '1986-02-03', '1964-11-21', 'AREQUIPA', 0, 'Av. Ricardo Palma 324 - Paucarpata - arequipa', 2),
(43, 'FREDDY YORIQUE', 'ROJAS ARANGO', 'frojas@gmail.com', 'FROJAS', 'intelcore2duo', '09296121', '1990-08-09', '1960-06-07', 'ANCASH', 0, 'Urb. Bella Mar Mz M3 lote 7 ', 2),
(44, 'MODESTO', 'ROQUE ATENCIO', 'mroque@gmail.com', 'MROQUE', 'intelcore2duo', '10360268', '1978-02-10', '1954-05-22', 'PASCO', 0, 'Edificio Estatal No 2 San Juan Pampa', 2),
(45, 'JUAN HUGO', 'RUIZ SOTO', 'jruiz@gmail.com', 'JRUIZ', 'intelcore2duo', '10146468', '1984-12-18', '1968-10-18', 'NORTE', 0, 'Mz. 252 lote 3 Zona inustrial - Piura', 2),
(46, 'LUIS VÍCTOR', 'SALAZAR SEGURA', 'lsalazar@gmail.com', 'LSALAZAR', 'intelcore2duo', '07189370', '1982-10-16', '1965-09-26', 'LIMA METROP', 0, 'Jr. Cailloma 124 - Lima', 2),
(47, 'JOSÉ MARIA', ' SONO CABRERA', 'jsono@gmail.com', 'JSONO', 'intelcore2duo', '07251250', '1981-10-12', '1951-02-26', 'LAMBAYEQUE', 0, 'Av. Juan Tomis Stack 975 - Chiclayo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `stock` int(10) NOT NULL,
  `idFkCategory` int(10) NOT NULL,
  `idFkBrand` int(10) NOT NULL,
  `idFkSize` int(10) NOT NULL,
  `idFkColor` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_ibfk_1` (`idFkBrand`),
  KEY `product_ibfk_2` (`idFkCategory`),
  KEY `product_ibfk_3` (`idFkSize`),
  KEY `product_ibfk_4` (`idFkColor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `stock`, `idFkCategory`, `idFkBrand`, `idFkSize`, `idFkColor`) VALUES
(1, 'POLO ESTAMPADO DRAGON', 85.5, 2000, 1, 1, 1, 2),
(2, 'POLO ESTAMPADO DRAGON', 105, 5000, 1, 1, 2, 2),
(3, 'POLO ESTAMPADO DRAGON', 89.5, 1000, 1, 1, 3, 4),
(4, 'POLO ESTAMPADO DRAGON', 70, 2100, 1, 1, 4, 4),
(5, 'POLO ESTAMPADO MACHU PICCHU', 60, 3500, 1, 7, 1, 2),
(6, 'POLO ESTAMPADO MACHU PICCHU', 60, 6300, 1, 7, 4, 4),
(7, 'POLO ESTAMPADO MACHU PICCHU', 60, 4200, 1, 7, 3, 4),
(8, 'ZAPATILLAS ROJAS CON FRANJAS BLANCAS', 150, 500, 3, 1, 6, 6),
(9, 'ZAPATILLAS ROJAS CON FRANJAS BLANCAS', 160, 700, 3, 3, 6, 6),
(10, 'ZAPATILLAS ROJAS CON FRANJAS BLANCAS', 140, 200, 3, 5, 7, 6),
(11, 'ZAPATILLAS ROJAS CON FRANJAS BLANCAS', 160, 200, 3, 2, 7, 6),
(12, 'ZAPATILLAS AZULES CON FRANJAS BLANCAS', 140, 500, 3, 3, 7, 5),
(13, 'ZAPATILLAS AZULES CON FRANJAS BLANCAS', 130, 800, 3, 2, 5, 5),
(14, 'ZAPATILLAS AZULES CON FRANJAS BLANCAS', 120, 300, 3, 5, 8, 5),
(15, 'ZAPATILLAS AZULES CON FRANJAS BLANCAS', 160, 150, 3, 5, 8, 5),
(16, 'BERMUDA', 100, 300, 12, 9, 1, 4),
(17, 'BERMUDA', 90, 500, 12, 9, 2, 5),
(18, 'BERMUDA MOTIVO PLAYA', 95, 800, 12, 9, 3, 1),
(19, 'BERMUDA MOTIVO PLAYA', 56, 400, 12, 13, 4, 1),
(20, 'BERMUDA', 90, 300, 12, 13, 1, 7),
(21, 'CHÁNDAL MUJER', 160, 100, 10, 1, 1, 2),
(22, 'CHÁNDAL MUJER FOCALIZADO', 150, 200, 10, 1, 3, 9),
(23, 'CHÁNDAL MUJER', 160, 350, 10, 2, 3, 6),
(24, 'CHÁNDAL MUJER GRIS RAYAS NARANJAS', 210, 480, 10, 2, 4, 4),
(25, 'CHÁNDAL MUJER ROSADO', 160, 180, 10, 2, 1, 7),
(26, 'MEDIAS HOMBRE TALONERAS TALLA STANDAR', 12, 2000, 7, 1, 1, 1),
(27, 'MEDIAS MUJER TALONERAS TALLA STANDAR', 10, 3500, 7, 1, 1, 1),
(28, 'MEDIAS HOMBRE TALONERAS TALLA STANDAR', 8, 4800, 7, 2, 1, 1),
(29, 'MEDIAS MUJER TALONERAS TALLA STANDAR', 8, 5200, 7, 2, 1, 1),
(30, 'GORRO VERANO MALLA', 25, 950, 8, 1, 1, 3),
(31, 'SANDALIAS HOMBRE', 28, 1000, 4, 9, 7, 5),
(32, 'SANDALIAS MUJER', 35, 1500, 4, 9, 5, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `pay` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `description`, `pay`) VALUES
(1, 'ADMINISTRADOR', 5000),
(2, 'USUARIO', 1200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, '38'),
(6, '40'),
(7, '42'),
(8, '44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `typetransaction` varchar(20) NOT NULL,
  `datetransaction` date NOT NULL,
  `amountOfUnits` int(10) NOT NULL,
  `idFkEmployee` int(10) NOT NULL,
  `idFkProduct` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_ibfk_1` (`idFkEmployee`),
  KEY `transaction_ibfk_2` (`idFkProduct`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
