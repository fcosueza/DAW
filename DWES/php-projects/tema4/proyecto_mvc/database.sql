-- Adminer 4.8.1 MySQL 8.0.32-0ubuntu0.22.04.2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `dwes04` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dwes04`;

DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE `favoritos` (
  `producto_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`producto_id`,`usuario_id`),
  KEY `fk_favoritos_productos_idx` (`producto_id`),
  KEY `fk_favoritos_usuarios1_idx` (`usuario_id`),
  CONSTRAINT `fk_favoritos_productos` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `fk_favoritos_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cod` varchar(45) NOT NULL,
  `descripcion` tinytext,
  `precio` float NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cod_UNIQUE` (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `productos` (`id`, `cod`, `descripcion`, `precio`, `stock`) VALUES
(1,	'A01',	NULL,	10.2,	15),
(3,	'A02',	'Desc A02',	10.2,	15),
(6,	'B01',	'Desc B01',	18.5,	20),
(7,	'B02',	'Desc B02',	54.6,	12),
(8,	'B03',	'Desc B03',	91.8,	13),
(9,	'B04',	'Desc B04',	16.8,	20),
(10,	'B05',	'Desc B05',	18.3,	19),
(11,	'B06',	'Desc B06',	17.1,	10),
(12,	'B07',	'Desc B07',	83.4,	10),
(13,	'B08',	'Desc B08',	15.5,	14),
(14,	'B09',	'Desc B09',	18.6,	10);

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1,	'usuario1',	'af0f5915ae015bec7ffdc65810d8b37de053018c93cf06c55cc83393a35be01d'),
(2,	'usuario2',	'b704177028d7fdf6d2bc01cd5677099ebac54bf6e98ce1a5953be9bfa31eea56');

