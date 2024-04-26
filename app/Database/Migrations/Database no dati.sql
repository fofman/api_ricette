-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.32-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database ricette
CREATE DATABASE IF NOT EXISTS `ricette` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ricette`;

-- Dump della struttura di tabella ricette.categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ricette.cotture
CREATE TABLE IF NOT EXISTS `cotture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ricette.immagini
CREATE TABLE IF NOT EXISTS `immagini` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ricetta` int(11) DEFAULT NULL,
  `percorso` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ricetta` (`id_ricetta`),
  CONSTRAINT `immagini_ibfk_1` FOREIGN KEY (`id_ricetta`) REFERENCES `ricette` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ricette.ingredienti
CREATE TABLE IF NOT EXISTS `ingredienti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descrizione` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ricette.paesi
CREATE TABLE IF NOT EXISTS `paesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ricette.portate
CREATE TABLE IF NOT EXISTS `portate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ricette.ricette
CREATE TABLE IF NOT EXISTS `ricette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(255) NOT NULL,
  `tempo_preparazione` int(11) DEFAULT NULL,
  `porzioni` int(11) DEFAULT NULL,
  `testo` text DEFAULT NULL,
  `livello` int(11) DEFAULT NULL,
  `data_aggiunta` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ricette.ricette_categorie
CREATE TABLE IF NOT EXISTS `ricette_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ricetta` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ricetta` (`id_ricetta`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `ricette_categorie_ibfk_1` FOREIGN KEY (`id_ricetta`) REFERENCES `ricette` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ricette_categorie_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ricette.ricette_cotture
CREATE TABLE IF NOT EXISTS `ricette_cotture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ricetta` int(11) DEFAULT NULL,
  `id_cottura` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ricetta` (`id_ricetta`),
  KEY `id_cottura` (`id_cottura`),
  CONSTRAINT `ricette_cotture_ibfk_1` FOREIGN KEY (`id_ricetta`) REFERENCES `ricette` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ricette_cotture_ibfk_2` FOREIGN KEY (`id_cottura`) REFERENCES `cotture` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ricette.ricette_ingredienti
CREATE TABLE IF NOT EXISTS `ricette_ingredienti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ricetta` int(11) DEFAULT NULL,
  `id_ingrediente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ricetta` (`id_ricetta`),
  KEY `id_ingrediente` (`id_ingrediente`),
  CONSTRAINT `ricette_ingredienti_ibfk_1` FOREIGN KEY (`id_ricetta`) REFERENCES `ricette` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ricette_ingredienti_ibfk_2` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredienti` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ricette.ricette_paesi
CREATE TABLE IF NOT EXISTS `ricette_paesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ricetta` int(11) DEFAULT NULL,
  `id_paese` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ricetta` (`id_ricetta`),
  KEY `id_paese` (`id_paese`),
  CONSTRAINT `ricette_paesi_ibfk_1` FOREIGN KEY (`id_ricetta`) REFERENCES `ricette` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ricette_paesi_ibfk_2` FOREIGN KEY (`id_paese`) REFERENCES `paesi` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ricette.ricette_portate
CREATE TABLE IF NOT EXISTS `ricette_portate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ricetta` int(11) DEFAULT NULL,
  `id_portata` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ricetta` (`id_ricetta`),
  KEY `id_portata` (`id_portata`),
  CONSTRAINT `ricette_portate_ibfk_1` FOREIGN KEY (`id_ricetta`) REFERENCES `ricette` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ricette_portate_ibfk_2` FOREIGN KEY (`id_portata`) REFERENCES `portate` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
