
--
-- Estructura de tabla para la tabla `brand`
--
CREATE TABLE `brand` (
  `id`          int(10)           NOT NULL        PRIMARY KEY  AUTO_INCREMENT,
  `name`        varchar(50)       NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `category`
--
CREATE TABLE `category` (
  `id`            int(10)         NOT NULL     PRIMARY KEY AUTO_INCREMENT, 
  `description`   varchar(50)     NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id`          int(10)           NOT NULL      PRIMARY KEY   AUTO_INCREMENT,
  `name`        varchar(50)       NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `employee`
--
CREATE TABLE `employee` (
  `id`          int(10)         NOT NULL    PRIMARY KEY   AUTO_INCREMENT,
  `name`        varchar(50)     NOT NULL,
  `lastname`    varchar(50)     NOT NULL,
  `email`       varchar(80)     NOT NULL,
  `username`    varchar(20)     NOT NULL,
  `password`    varchar(20)     NOT NULL,
  `dni`         char(8)         NOT NULL,
  `dateborn`    date            NOT NULL,
  `datestart`   date            NOT NULL,
  `city`        varchar(50)     NOT NULL,
  `active`		boolean			NOT NULL,
  `address`     varchar(50)     NOT NULL,
  `idFkRole`    int(10)         NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `product`
--
CREATE TABLE `product` (
  `id`            int(10)         NOT NULL    PRIMARY KEY   AUTO_INCREMENT,
  `name`          varchar(50)     NOT NULL,
  `price`         float           NOT NULL,
  `stock`         int(10)         NOT NULL,
  `idFkCategory`  int(10)         NOT NULL,
  `idFkBrand`     int(10)         NOT NULL,
  `idFkSize`      int(10)         NOT NULL,
  `idFkColor`     int(10)         NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `role`
--
CREATE TABLE `role` (
  `id`            int(10)         NOT NULL    PRIMARY KEY AUTO_INCREMENT,
  `description`   varchar(50)     NOT NULL,
  `pay`		  	  float
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `size`
--

CREATE TABLE `size` (
  `id`            int(10)         NOT NULL    PRIMARY KEY AUTO_INCREMENT,
  `name`          varchar(3)      NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE `transaction` (
  `id`                  int(10)          NOT NULL   PRIMARY KEY   AUTO_INCREMENT,
  `typetransaction`     varchar(20)      NOT NULL,
  `datetransaction`     date             NOT NULL,
  `amountOfUnits`		int(10)			 NOT NULL,
  `idFkEmployee`        int(10)          NOT NULL,
  `idFkProduct`         int(10)          NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indices de la tabla `employee`
--
ALTER TABLE `employee`
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `username`(`username`),
  ADD KEY `employee_ibfk_2` (`idFkRole`);

-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD KEY `product_ibfk_1` (`idFkBrand`),
  ADD KEY `product_ibfk_2` (`idFkCategory`),
  ADD KEY `product_ibfk_3` (`idFkSize`),
  ADD KEY `product_ibfk_4` (`idFkColor`);

--
-- Indices de la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD KEY `transaction_ibfk_1` (`idFkEmployee`),
  ADD KEY `transaction_ibfk_2` (`idFkProduct`);



--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`idFkRole`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idFkBrand`) REFERENCES `brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`idFkCategory`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`idFkSize`) REFERENCES `size` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`idFkColor`) REFERENCES `color` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`idFkEmployee`) REFERENCES `employee`  (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`idFkProduct`) REFERENCES `product`    (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ****************************************************************************************************************
                                                   -- DATA
-- ****************************************************************************************************************
INSERT INTO `brand`(`id`, `name`)VALUES
(NULL,'ADIDAS'),
(NULL,'NIKE'),
(NULL,'REEBOK'),
(NULL,'GUESS'),
(NULL,'PUMA'),
(NULL,'CALVIN KLEIN'),
(NULL,'LACOSTE'),
(NULL,'DIOR'),
(NULL,'QUILSILVER'),
(NULL,'GAP'),
(NULL,'ROXY'),
(NULL,'CHANEL'),
(NULL,'LA MARTINA'),
(NULL,'GUCCI'),
(NULL,'FRANKLIN MARSHALL'),
(NULL,'ABERCROMBIE & FITCH'),
(NULL,'NEW ERA FITS'),
(NULL,'RALPH LAUREN');

INSERT INTO `category` (`id`, `description`) VALUES
(NULL, 'Polo'),
(NULL, 'Pantalón'),
(NULL, 'Zapatillas'),
(NULL, 'Sandalias'),
(NULL, 'Zapatos'),
(NULL, 'Camiseta'),
(NULL, 'Medias'),
(NULL, 'Gorro'),
(NULL, 'Rodilleras'),
(NULL, 'Chandal'),
(NULL, 'Bikini'),
(NULL, 'Bermuda'),
(NULL, 'Pantaloneta'),
(NULL, 'Boxer'),
(NULL, 'Top'),
(NULL, 'Bañador'),
(NULL, 'Guantes'),
(NULL, 'Sudadera'),
(NULL, 'Ballerinas'),
(NULL, 'Gafas de Sol'),
(NULL, 'Jersey'),
(NULL, 'Mallas'),
(NULL, 'Chubasquero'),
(NULL, 'Parkas'),
(NULL, 'Chaqueta'),
(NULL, 'Casadora');

INSERT INTO `color` (`id`, `name`) VALUES
(NULL, 'PERSONALIZADO'),
(NULL, 'BLANCO'),
(NULL, 'NEGRO'),
(NULL, 'PLOMO'),
(NULL, 'AZUL'),
(NULL, 'ROJO'),
(NULL, 'ROSADO'),
(NULL, 'AMARILLO'),
(NULL, 'VERDE'),
(NULL, 'MORADO'),
(NULL, 'CELESTE'),
(NULL, 'TURQUESA'),
(NULL, 'MARRÓN');

INSERT INTO `size` (`id`, `name`) VALUES
(NULL, 'S'),
(NULL, 'M'),
(NULL, 'L'),
(NULL, 'XL'),
(NULL, '38'),
(NULL, '40'),
(NULL, '42'),
(NULL, '44');

INSERT INTO `role` (`id`, `description`, `pay`) VALUES
(NULL, 'ADMINISTRADOR', 5000),
(NULL, 'USUARIO', 1200);

INSERT INTO `employee` (`id`, `name`, `lastname`,`email`,`username`,`password`,`dni`, `dateborn`, `datestart`, `city`, `address`, `idFkRole`) VALUES
(NULL, 'ELDER', 'ALMORIN TORREJON','ealmorin@gmail.com', 'EALMORIN', 'intelcore2duo', '07195806', '1982-04-05', '1951-09-28', 'LORETO', 'Calle Piura 336 - Punchana - Maynas', 1),
(NULL, 'SEGUNDO ÓSCAR', 'ÁLVAREZ ROMERO','salvarez@gmail.com', 'SALVAREZ', 'intelcore2duo', '07639874', '1992-03-25', '1964-01-17', 'LIBERTAD', 'Av.España872-3 -Trujillo', 2),
(NULL, 'ERROL', 'APONTE GUERRERO','eaponte@gmail.com','EAPONTE', 'intelcore2duo', '18095992', '1985-03-06', '1963-06-26', 'PIURA', 'Av. San Ramon s/n Urb. El Chipe', 2),
(NULL, 'LUZ GLORIA ', 'AQUINO MOSQUERA','laquino@gmail.com', 'LAQUINO', 'intelcore2duo', '07227131', '1989-02-14', '1964-05-17', 'JUNIN', 'Jr. Loreto 363 - Huancayo', 2),
(NULL, 'RICARDO ANTONIO ', 'ARBAÑIL RIVADENEIRA','rarbañil@gmail.com', 'RARBANIL', 'intelcore2duo','07581065', '1987-12-06', '1963-10-10', 'MOQUEGUA', 'Av. Balta s/n - cruce con Calle Tacna', 2),
(NULL, 'ISAAC', 'ARCE PÉREZ','iarce@gmail.com', 'IARCE', 'intelcore2duo', '07185045', '1988-07-07', '1960-05-31', 'CITY-NO', 'Carretera Yurimaguas Nº 408 Banda Shilcayo - Tarap', 2),
(NULL, 'JOSÉ PABLO', 'CASTRO LOPEZ', 'jcastro@gmail.com', 'JCASTRO', 'intelcore2duo','10281383', '1988-06-06', '1963-10-14', 'PIURA', 'Urb. Leoncio elias Arbolera F11', 2),
(NULL, 'SANTOS', 'CCORAHUA AYTE','sccorahua@gmail.com', 'SCCORAHUA', 'intelcore2duo', '09605223', '1986-04-01', '1962-11-21', 'APURIMAC', 'Plaza de Armas Tamburco s/n - Abancay', 2),
(NULL, ' JOSÉ CARLOS ', 'ECHE LLENQUE', 'jeche@gmail.com', 'JECHE', 'intelcore2duo','09863166', '1984-10-20', '1960-01-05', 'CITY-NO', 'Av. Ricardo Angulo 695 - San isidro', 2),
(NULL, 'SANTIAGO', 'ELIZALDE DIOSES','selizalde@gmail.com', 'SELIZALDE', 'intelcore2duo', '18032436', '1984-12-27', '1962-12-22', 'TUMBES', 'Av. Tupac Amaru 128 - Tumbes', 2),
(NULL, 'JESUS MANUEL', 'ESPINOZA LUGO', 'jespinoza@gmail.com', 'JESPINOZA', 'intelcore2duo','06475266', '1985-01-04', '1962-12-11', 'HUANUCO', 'Jr. Junin 415 - Huanuco', 2),
(NULL, 'ROGER ADRÍAN', 'ESPINOZA PARADO','respinoza@gmail.com', 'RESPINOZA', 'intelcore2duo', '07880663', '1985-02-26', '1963-07-07', 'AYACUCHO', 'Jr. Callao 122 - Huamanga', 2),
(NULL, 'GIOVANA GICELLY', 'FALCON RUÍZ','gfalcon@gmail.com', 'GFALCON', 'intelcore2duo', '06147942', '1990-04-08', '1962-09-12', 'BARRANCO', 'Av. Petit Thouars 4698 - Miraflores', 2),
(NULL, 'MIGUEL ÁNGEL', 'FERRER RECARTE','mferrer@gmail.com', 'MFERRER', 'intelcore2duo', '05200501', '1979-10-25', '1937-08-24', 'CITY.NO', 'Av. San Borja Sur 407 - San Borja', 2),
(NULL, 'DOMINGO FRANCISCO ', 'FIGUEROA CORTEZ','dfigueroa@gmail.com', 'DFIGUEROA', 'intelcore2duo', '07258710', '1991-09-09', '1960-10-13', 'TUMBES', 'Av. Mariscal Castilla 957 - Tumbes', 2),
(NULL, ' EMERSON', 'FLORES FLORES','eflores@gmail.com', 'EFLORES', 'intelcore2duo','07180571', '1978-02-02', '1954-06-02', 'AMAZONAS', 'Heroes del Cenepa 668 - Bagua - Amazonas', 2),
(NULL, 'CARLOS', 'FLORES ZAMBRANO','cflores@gmail.com', 'CFLORES', 'intelcore2duo', '10553983', '1981-10-26', '1969-09-01', 'LIMA', 'Mz. D lote 21 Urb Sr. De Los Milagros - SMP', 2),
(NULL, 'WASHINGTON GABINO ', 'GAMBOA VELAZCO','wgamboa@gmail.com', 'WGAMBOA', 'intelcore2duo', '06682306', '1993-01-01', '1969-05-19', 'MADRE DE DIOS', 'Fiztcarald 265 - Tambopat', 2),
(NULL, 'BEBERLI', 'GONZALES DE OLIVEIRA', 'bgonzales@gmail.com', 'BGONZALES', 'intelcore2duo','07223843', '1990-08-06', '1965-05-10', 'LORETO', 'Cornejo Portugal 2319 - Belen - Iquitos', 2),
(NULL, 'LUIS', 'GONZALES GUAYAN', 'lgonzales@gmail.com', 'LGONZALES', 'intelcore2duo','07189721', '1979-07-30', '1940-09-08', 'UCAYALI', 'Av. Primavera 2da Etapa Mz 11 lote 1', 2),
(NULL, 'ELENIZ KARIN', 'GUILLEN ALVARO','eguillen@gmail.com', 'EGUILLEN', 'intelcore2duo', '07237360', '1990-07-08', '1969-09-01', 'ICA', 'Av. Cutervo 920 - Ica', 2),
(NULL, 'PABLO ERNESTO ', 'HERRERA ROSALES','pherrera@gmail.com', 'PHERRERA', 'intelcore2duo', '07212628', '1987-07-07', '1955-11-07', 'MOQUEGUA', 'Calle Ancash No 109 - Moquegua', 2),
(NULL, 'MARIO', 'HUAMAN SURCO','mhuaman@gmail.com', 'MHUAMAN', 'intelcore2duo', '08471154', '1984-09-06', '1954-09-05', 'MADRE DE DIOS', 'Jr. Las ponas a15 - Tambopata', 2),
(NULL, 'MARÍA CRISTINA ', 'HUAMANCHUMO LEYTON','mhuamanchumo@gmail.com', 'MHUAMANCHUMO', 'intelcore2duo', '07256252', '1986-11-12', '1958-03-23', 'LAMBAYEQUE', 'Calle Balta 412 - Pimentel - Chiclayo', 2),
(NULL, 'MANUEL', 'LARA LANDÍVAR', 'mlara@gmail.com', 'MLARA', 'intelcore2duo','07247805', '1989-03-04', '1969-08-17', 'TACNA', 'Calle Argentina 640 - Urb Villa Hermosa', 2),
(NULL, 'LUIS EDGARDO ', 'LEÓN LEÓN', 'lleon@gmail.com', 'LLEON', 'intelcore2duo','10146729', '1980-06-05', '1967-09-26', 'CAJAMARCA', 'Urb. La alameda Santa Teresa de Journet ', 2),
(NULL, 'ROBERT CLODOALDO ', 'LÓPEZ VALVERDE','rlopez@gmail.com', 'RLOPEZ', 'intelcore2duo', '06080192', '1986-05-11', '1967-01-19', 'JUNIN', 'Jr. Loreto 363 - Huancayo', 2),
(NULL, 'ROCÍO ZOILA', 'LÓPEZ VERA', 'rolopez@gmail.com', 'ROLOPEZ', 'intelcore2duo','10147652', '1989-06-20', '1969-05-28', 'CITY-NO', 'Av. San Borja Sur 406 - San Borja', 2),
(NULL, 'JUAN ALEXIS', 'LUQUE UCHUCHOQUE', 'jluque@gmail.com', 'JLUQUE', 'intelcore2duo','07185074', '1989-06-12', '1949-06-08', 'AREQUIPA', 'Av. Unión 200 - Urb. César Vallejo - Paucarpata', 2),
(NULL, 'MARÍA DEL ROSARIO', 'MACARLUPÚ ESCOLÁSTICO','mmacarlupu@gmail.com', 'MMACARLUPU', 'intelcore2duo', '07230626', '1984-12-26', '1956-04-14', 'LIMA', 'Jr. Tacna 540 - Huancayo', 2),
(NULL, 'JOSE ALFONSO', 'MARON VASQUEZ', 'jmaron@gmail.com', 'JMARON', 'intelcore2duo','07183831', '1991-01-20', '1967-01-15', 'PUNO', 'Urb. Villa del lago H22 - Puno', 2),
(NULL, 'PUBLIO ALEJANDRO', 'MEDINA ABANTO', 'pmedina@gmail.com', 'PMEDINA', 'intelcore2duo','07181148', '1990-01-21', '1965-10-23', 'CAJAMARCA', 'Jr. Jaime de Martines 208 - Bambamarca', 2),
(NULL, 'MÓNICA MAGDALENA', 'MENDIOLA CHAVEZ','mmendiola@gmail.com', 'MMENDIOLA', 'intelcore2duo', '07190463', '1986-03-24', '1962-12-02', 'MIRAFLORES', 'Ernesto Cardenas 123 Dpto 201 - Surco', 2),
(NULL, 'FREDY LUIS', 'MONZÓN TORRES', 'fmonzon@gmail.com', 'FMONZON', 'intelcore2duo','06792769', '1981-10-18', '1969-09-12', 'AREQUIPA', 'Av. Kennedy cdra 16 s/n Paucarpata', 2),
(NULL, 'CARLOS WALTER', 'NACARINO RODRIGUEZ','cnacarino@gmail.com', 'CNACARINO', 'intelcore2duo', '10144756', '1985-01-03', '1966-04-03', 'SUR', 'Calle Colón Nº 122 Urb. Alas del Sur', 2),
(NULL, 'EDGAR AMERICO', 'OLIVERA MAROCHO','eolivera@gmail.com', 'EOLIVERA', 'intelcore2duo', '07231957', '1986-11-05', '1965-04-02', 'CITY-NO', 'Choquechaca 285 - Cusco', 2),
(NULL, 'ROCKY', 'PADILLA RUIZ', 'rpadilla@gmail.com', 'RPADILLA', 'intelcore2duo','06218990', '1992-03-17', '1964-01-28', 'UCAYALI', 'Jr. Salaverry 660 - Pucallpa', 2),
(NULL, 'JOSE RONALD', 'PALOMINO ARONI','jpalomino@gmail.com', 'JPALOMINO', 'intelcore2duo', '08215991', '1983-03-11', '1959-05-08', 'ICA', 'Av. Cutervo 920 - Ica', 2),
(NULL, 'FIDEL CIRILO', 'PALOMINO MORALES','fpalomino@gmail.com', 'FPALOMINO', 'intelcore2duo', '07938442', '1990-01-13', '1965-11-03', 'AYACUCHO', 'Av. Independencia 604 - Huamanga', 2),
(NULL, 'CARLOS ANTONIO', 'PAREDES ARANDA','cparedes@gmail.com', 'CPAREDES', 'intelcore2duo','07220191', '1986-11-13', '1965-03-22', 'ANCASH', 'Jr. Villanueva 1017 - Huaraz', 2),
(NULL, 'ROLANDO', 'PAREDES GAMONAL','rparedes@gmail.com', 'RPAREDES', 'intelcore2duo', '07212762', '1984-05-15', '1958-09-21', 'ICA', 'Urb. San Miguel E-145 - Ica', 2),
(NULL, 'JUAN CARLOS ', 'PINTO MALAGA', 'jpinto@gmail.com', 'JPINTO', 'intelcore2duo','23715129', '1986-02-03', '1964-11-21', 'AREQUIPA', 'Av. Ricardo Palma 324 - Paucarpata - arequipa', 2),
(NULL, 'FREDDY YORIQUE', 'ROJAS ARANGO','frojas@gmail.com', 'FROJAS', 'intelcore2duo','09296121', '1990-08-09', '1960-06-07', 'ANCASH', 'Urb. Bella Mar Mz M3 lote 7 ', 2),
(NULL, 'MODESTO', 'ROQUE ATENCIO', 'mroque@gmail.com', 'MROQUE', 'intelcore2duo','10360268', '1978-02-10', '1954-05-22', 'PASCO', 'Edificio Estatal No 2 San Juan Pampa', 2),
(NULL, 'JUAN HUGO', 'RUIZ SOTO','jruiz@gmail.com', 'JRUIZ', 'intelcore2duo', '10146468', '1984-12-18', '1968-10-18', 'NORTE', 'Mz. 252 lote 3 Zona inustrial - Piura', 2),
(NULL, 'LUIS VÍCTOR', 'SALAZAR SEGURA','lsalazar@gmail.com', 'LSALAZAR', 'intelcore2duo', '07189370', '1982-10-16', '1965-09-26', 'LIMA METROP', 'Jr. Cailloma 124 - Lima', 2),
(NULL, 'JOSÉ MARIA', ' SONO CABRERA', 'jsono@gmail.com', 'JSONO', 'intelcore2duo','07251250', '1981-10-12', '1951-02-26', 'LAMBAYEQUE', 'Av. Juan Tomis Stack 975 - Chiclayo', 2);


INSERT INTO `product` (`id`,`name`,`price`,`stock`,`idFkcategory`,`idfkBrand`,`idFkSize`,`idFkColor`)VALUES
(NULL,'POLO ESTAMPADO DRAGON','85.5','2000','1','1','1','2'),
(NULL,'POLO ESTAMPADO DRAGON','105','5000','1','1','2','2'),
(NULL,'POLO ESTAMPADO DRAGON','89.5','1000','1','1','3','4'),
(NULL,'POLO ESTAMPADO DRAGON','70','2100','1','1','4','4'),
(NULL,'POLO ESTAMPADO MACHU PICCHU','60','3500','1','7','1','2'),
(NULL,'POLO ESTAMPADO MACHU PICCHU','60','6300','1','7','4','4'),
(NULL,'POLO ESTAMPADO MACHU PICCHU','60','4200','1','7','3','4'),
(NULL,'ZAPATILLAS ROJAS CON FRANJAS BLANCAS','150','500','3','1','6','6'),
(NULL,'ZAPATILLAS ROJAS CON FRANJAS BLANCAS','160','700','3','3','6','6'),
(NULL,'ZAPATILLAS ROJAS CON FRANJAS BLANCAS','140','200','3','5','7','6'),
(NULL,'ZAPATILLAS ROJAS CON FRANJAS BLANCAS','160','200','3','2','7','6'),
(NULL,'ZAPATILLAS AZULES CON FRANJAS BLANCAS','140','500','3','3','7','5'),
(NULL,'ZAPATILLAS AZULES CON FRANJAS BLANCAS','130','800','3','2','5','5'),
(NULL,'ZAPATILLAS AZULES CON FRANJAS BLANCAS','120','300','3','5','8','5'),
(NULL,'ZAPATILLAS AZULES CON FRANJAS BLANCAS','160','150','3','5','8','5'),
(NULL,'BERMUDA','100','300','12','9','1','4'),
(NULL,'BERMUDA','90','500','12','9','2','5'),
(NULL,'BERMUDA MOTIVO PLAYA','95','800','12','9','3','1'),
(NULL,'BERMUDA MOTIVO PLAYA','56','400','12','13','4','1'),
(NULL,'BERMUDA','90','300','12','13','1','7'),
(NULL,'CHÁNDAL MUJER','160','100','10','1','1','2'),
(NULL,'CHÁNDAL MUJER FOCALIZADO','150','200','10','1','3','9'),
(NULL,'CHÁNDAL MUJER','160','350','10','2','3','6'),
(NULL,'CHÁNDAL MUJER GRIS RAYAS NARANJAS','210','480','10','2','4','4'),
(NULL,'CHÁNDAL MUJER ROSADO','160','180','10','2','1','7'),
(NULL,'MEDIAS HOMBRE TALONERAS TALLA STANDAR','12','2000','7','1','1','1'),
(NULL,'MEDIAS MUJER TALONERAS TALLA STANDAR','10','3500','7','1','1','1'),
(NULL,'MEDIAS HOMBRE TALONERAS TALLA STANDAR','8','4800','7','2','1','1'),
(NULL,'MEDIAS MUJER TALONERAS TALLA STANDAR','8','5200','7','2','1','1'),
(NULL,'GORRO VERANO MALLA','25','950','8','1','1','3'),
(NULL,'SANDALIAS HOMBRE','28','1000','4','9','7','5'),
(NULL,'SANDALIAS MUJER','35','1500','4','9','5','7');
-- ****************************************************************************************************************
                                             -- STORE PROCEDURE
-- ****************************************************************************************************************
DELIMITER //
CREATE PROCEDURE insertBrand(IN name varchar(50))
BEGIN
	INSERT INTO brand VALUES(NULL,name);
END//
DELIMITER //
CREATE PROCEDURE insertCategory(IN description varchar(50))
BEGIN
	INSERT INTO category VALUES(NULL,description);
END//
DELIMITER //
CREATE PROCEDURE insertColor(IN name varchar(50))
BEGIN
	INSERT INTO color VALUES(NULL,name);
END//
DELIMITER //
CREATE PROCEDURE insertEmployee(IN name varchar(50),IN lastname varchar(50),IN email varchar(80),IN username varchar(20),IN password varchar(20),IN dni char(8),IN dateborn date,IN datestart date,IN city varchar(50),IN idFkLogin int(10),IN idFkRole int(10))
BEGIN
	INSERT INTO employee VALUES(NULL,name,lastname,email,username,password,dni,dateborn,datestart,city,idFkLogin,idFkRole);
END//

DELIMITER //
CREATE PROCEDURE insertProduct(IN name varchar(50),IN price float,IN stock int(10),IN idFkBrand int(10),IN idFkSize int(10),IN idFkColor int(10))
BEGIN
	INSERT INTO product VALUES(NULL,name,price,stock,idFkCategory,idFkBrand,idFkSize,idFkColor);
END//
DELIMITER //
CREATE PROCEDURE insertRole(IN description varchar(50))
BEGIN
	INSERT INTO role VALUES(NULL,description);
END//
DELIMITER //
CREATE PROCEDURE insertSize(IN name varchar(3))
BEGIN
	INSERT INTO size VALUES(NULL,name);
END//
DELIMITER //
CREATE PROCEDURE insertTransaction(IN typetransaction varchar(20),IN idFkEmployee int(10),IN idFkProduct int(10), IN amountOfUnits int(10))
BEGIN
	INSERT INTO transaction VALUES(NULL,typetransaction,(select NOW()),amountOfUnits,idFkEmployee,idFkProduct);
	UPDATE product SET stock=IF(STRCMP('INGRESO',typetransaction),stock+amountOfUnits,stock-amountOfUnits)
	WHERE id=idFkProduct;
END//
DELIMITER //
CREATE PROCEDURE updateBrand(IN id int(10),IN name varchar(50))
BEGIN
	UPDATE `brand` SET `name`=name
	WHERE `id`=id;
END//
DELIMITER //
CREATE PROCEDURE deleteEmployee(IN id int(10))
BEGIN
	DELETE FROM employee WHERE id=id;
END//
DELIMITER //
CREATE PROCEDURE deleteProduct(IN id int(10))
BEGIN
	DELETE FROM product WHERE id=id;
END//


-- CALL insertProduct('Polo estampado Sarita Colonia','52.0','2300','1','1','1','1');
