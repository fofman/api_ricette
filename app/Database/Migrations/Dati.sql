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

-- Dump dei dati della tabella ricette.categorie: ~7 rows (circa)
INSERT INTO `categorie` (`id`, `nome`) VALUES
	(1, 'Pizza'),
	(2, 'Pasta'),
	(3, 'Carne'),
	(4, 'Pesce'),
	(5, 'Verdure'),
	(6, 'Vegano'),
	(7, 'Dolci');

-- Dump dei dati della tabella ricette.cotture: ~5 rows (circa)
INSERT INTO `cotture` (`id`, `nome`) VALUES
	(1, 'Al forno'),
	(2, 'In padella'),
	(3, 'Al vapore'),
	(4, 'Fritto'),
	(5, 'Bollito');

-- Dump dei dati della tabella ricette.immagini: ~5 rows (circa)
INSERT INTO `immagini` (`id`, `id_ricetta`, `percorso`) VALUES
	(11, 1, 'images/pizza-margherita.jpg'),
	(12, 2, 'images/spaghetti-al-pomodoro.jpg'),
	(13, 3, 'images/pollo-al-forno-con-patate.jpg'),
	(14, 4, 'images/insalata-di-riso-con-verdure.jpg'),
	(15, 5, 'images/tiramisu.jpg');

-- Dump dei dati della tabella ricette.ingredienti: ~10 rows (circa)
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

-- Dump dei dati della tabella ricette.paesi: ~11 rows (circa)
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

-- Dump dei dati della tabella ricette.portate: ~5 rows (circa)
INSERT INTO `portate` (`id`, `nome`) VALUES
	(1, 'Antipasto'),
	(2, 'Primo piatto'),
	(3, 'Secondo piatto'),
	(4, 'Contorno'),
	(5, 'Dolce');

-- Dump dei dati della tabella ricette.ricette: ~6 rows (circa)
INSERT INTO `ricette` (`id`, `titolo`, `tempo_preparazione`, `porzioni`, `testo`, `livello`, `data_aggiunta`) VALUES
	(1, 'Pizza Margherita', 60, 4, 'Impasto per pizza con pomodoro, mozzarella e basilico.', 1, '2024-03-30 21:17:07'),
	(2, 'Spaghetti al pomodoro', 20, 4, 'Spaghetti con salsa di pomodoro fresco e basilico.', 1, '2024-03-30 00:00:00'),
	(3, 'Pollo al forno con patate', 45, 4, 'Pollo marinato e cotto al forno con patate.', 2, '2024-03-30 00:00:00'),
	(4, 'Insalata di riso con verdure', 20, 4, 'Riso venere con verdure grigliate e feta.', 2, '2024-03-30 00:00:00'),
	(5, 'Tiramisù', 30, 6, 'Dolce al caffè con mascarpone e savoiardi.', 3, '2024-03-30 00:00:00'),
	(16, 'Pizza Margherita', 30, 4, 'Impasto per pizza con pomodoro, mozzarella e basilico.', 1, '2024-03-30 21:09:17');

-- Dump dei dati della tabella ricette.ricette_categorie: ~6 rows (circa)
INSERT INTO `ricette_categorie` (`id`, `id_ricetta`, `id_categoria`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 3, 3),
	(4, 4, 6),
	(5, 4, 5),
	(6, 5, 7);

-- Dump dei dati della tabella ricette.ricette_cotture: ~1 rows (circa)
INSERT INTO `ricette_cotture` (`id`, `id_ricetta`, `id_cottura`) VALUES
	(1, 1, 1);

-- Dump dei dati della tabella ricette.ricette_ingredienti: ~11 rows (circa)
INSERT INTO `ricette_ingredienti` (`id`, `id_ricetta`, `id_ingrediente`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 1, 5),
	(6, 1, 6),
	(7, 1, 7),
	(8, 1, 8),
	(9, 4, 4),
	(10, 3, 4),
	(11, 3, 10);

-- Dump dei dati della tabella ricette.ricette_paesi: ~1 rows (circa)
INSERT INTO `ricette_paesi` (`id`, `id_ricetta`, `id_paese`) VALUES
	(1, 1, 1);

-- Dump dei dati della tabella ricette.ricette_portate: ~0 rows (circa)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
