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

-- Dump dei dati della tabella ricette.categorie: ~7 rows (circa)
DELETE FROM `categorie`;
INSERT INTO `categorie` (`id`, `nome`) VALUES
	(1, 'Pizza'),
	(2, 'Pasta'),
	(3, 'Carne'),
	(4, 'Pesce'),
	(5, 'Verdure'),
	(6, 'Vegano'),
	(7, 'Dolci');

-- Dump della struttura di tabella ricette.cotture
CREATE TABLE IF NOT EXISTS `cotture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ricette.cotture: ~5 rows (circa)
DELETE FROM `cotture`;
INSERT INTO `cotture` (`id`, `nome`) VALUES
	(1, 'Al forno'),
	(2, 'In padella'),
	(3, 'Al vapore'),
	(4, 'Fritto'),
	(5, 'Bollito');

-- Dump della struttura di tabella ricette.immagini
CREATE TABLE IF NOT EXISTS `immagini` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ricetta` int(11) DEFAULT NULL,
  `percorso` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ricetta` (`id_ricetta`),
  CONSTRAINT `immagini_ibfk_1` FOREIGN KEY (`id_ricetta`) REFERENCES `ricette` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ricette.immagini: ~5 rows (circa)
DELETE FROM `immagini`;
INSERT INTO `immagini` (`id`, `id_ricetta`, `percorso`) VALUES
	(11, 1, 'images/pizza-margherita.jpg'),
	(12, 2, 'images/spaghetti-al-pomodoro.jpg'),
	(13, 3, 'images/pollo-al-forno-con-patate.jpg'),
	(14, 4, 'images/insalata-di-riso-con-verdure.jpg'),
	(15, 5, 'images/tiramisu.jpg');

-- Dump della struttura di tabella ricette.ingredienti
CREATE TABLE IF NOT EXISTS `ingredienti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descrizione` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ricette.ingredienti: ~10 rows (circa)
DELETE FROM `ingredienti`;
INSERT INTO `ingredienti` (`id`, `nome`, `descrizione`) VALUES
	(1, 'Farina', 'Farina di grano tenero tipo 00'),
	(2, 'Acqua', 'Acqua naturale'),
	(3, 'Lievito di birra', 'Lievito di birra fresco'),
	(4, 'Sale', 'Sale marino fino'),
	(5, 'Olio extravergine d\'oliva', 'Olio extravergine d\'oliva'),
	(6, 'Pomodori', 'Pomodori pelati a cubetti'),
	(7, 'Mozzarella', 'Mozzarella fior di latte'),
	(8, 'Basilico', 'Foglie di basilico fresco'),
	(9, 'Pepe nero', 'Pepe nero macinato'),
	(10, 'Pollo', 'Pollo intero');

-- Dump della struttura di tabella ricette.paesi
CREATE TABLE IF NOT EXISTS `paesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ricette.paesi: ~11 rows (circa)
DELETE FROM `paesi`;
INSERT INTO `paesi` (`id`, `nome`) VALUES
	(1, 'Italia'),
	(2, 'Francia'),
	(3, 'Spagna'),
	(4, 'Germania'),
	(5, 'Giappone'),
	(6, 'Cina'),
	(7, 'Stati Uniti d\'America'),
	(8, 'Messico'),
	(9, 'Brasile'),
	(10, 'India'),
	(12, 'Portogallo');

-- Dump della struttura di tabella ricette.portate
CREATE TABLE IF NOT EXISTS `portate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ricette.portate: ~5 rows (circa)
DELETE FROM `portate`;
INSERT INTO `portate` (`id`, `nome`) VALUES
	(1, 'Antipasto'),
	(2, 'Primo piatto'),
	(3, 'Secondo piatto'),
	(4, 'Contorno'),
	(5, 'Dolce');

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

-- Dump dei dati della tabella ricette.ricette: ~6 rows (circa)
DELETE FROM `ricette`;
INSERT INTO `ricette` (`id`, `titolo`, `tempo_preparazione`, `porzioni`, `testo`, `livello`, `data_aggiunta`) VALUES
	(1, 'Pizza Margherita', 60, 4, 'Impasto per pizza con pomodoro, mozzarella e basilico.', 1, '2024-03-30 21:17:07'),
	(2, 'Spaghetti al pomodoro', 20, 4, 'Spaghetti con salsa di pomodoro fresco e basilico.', 1, '2024-03-30 00:00:00'),
	(3, 'Pollo al forno con patate', 45, 4, 'Pollo marinato e cotto al forno con patate.', 2, '2024-03-30 00:00:00'),
	(4, 'Insalata di riso con verdure', 20, 4, 'Riso venere con verdure grigliate e feta.', 2, '2024-03-30 00:00:00'),
	(5, 'Tiramisù', 30, 6, 'Dolce al caffè con mascarpone e savoiardi.', 3, '2024-03-30 00:00:00'),
	(16, 'Pizza Margherita', 30, 4, 'Impasto per pizza con pomodoro, mozzarella e basilico.', 1, '2024-03-30 21:09:17');

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

-- Dump dei dati della tabella ricette.ricette_categorie: ~6 rows (circa)
DELETE FROM `ricette_categorie`;
INSERT INTO `ricette_categorie` (`id`, `id_ricetta`, `id_categoria`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 3, 3),
	(4, 4, 6),
	(5, 4, 5),
	(6, 5, 7);

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

-- Dump dei dati della tabella ricette.ricette_cotture: ~1 rows (circa)
DELETE FROM `ricette_cotture`;
INSERT INTO `ricette_cotture` (`id`, `id_ricetta`, `id_cottura`) VALUES
	(1, 1, 1);

-- Dump della struttura di tabella ricette.ricette_ingredienti
CREATE TABLE IF NOT EXISTS `ricette_ingredienti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ricetta` int(11) DEFAULT NULL,
  `id_ingrediente` int(11) DEFAULT NULL,
  `quantitativo` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ricetta` (`id_ricetta`),
  KEY `id_ingrediente` (`id_ingrediente`),
  CONSTRAINT `ricette_ingredienti_ibfk_1` FOREIGN KEY (`id_ricetta`) REFERENCES `ricette` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ricette_ingredienti_ibfk_2` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredienti` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ricette.ricette_ingredienti: ~11 rows (circa)
DELETE FROM `ricette_ingredienti`;
INSERT INTO `ricette_ingredienti` (`id`, `id_ricetta`, `id_ingrediente`, `quantitativo`) VALUES
	(1, 1, 1, 1),
	(2, 1, 2, 1),
	(3, 1, 3, 1),
	(4, 1, 4, 1),
	(5, 1, 5, 1),
	(6, 1, 6, 1),
	(7, 1, 7, 1),
	(8, 1, 8, 1),
	(9, 4, 4, 1),
	(10, 3, 4, 1),
	(11, 3, 10, 1);

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

-- Dump dei dati della tabella ricette.ricette_paesi: ~1 rows (circa)
DELETE FROM `ricette_paesi`;
INSERT INTO `ricette_paesi` (`id`, `id_ricetta`, `id_paese`) VALUES
	(1, 1, 1);

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

-- Dump dei dati della tabella ricette.ricette_portate: ~0 rows (circa)
DELETE FROM `ricette_portate`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
