/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `title`, `alias`)
VALUES
	(1,'Brazil','brazil');

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table country_states
# ------------------------------------------------------------

DROP TABLE IF EXISTS `country_states`;

CREATE TABLE `country_states` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL,
  `country_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `country_states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `country_states` WRITE;
/*!40000 ALTER TABLE `country_states` DISABLE KEYS */;

INSERT INTO `country_states` (`id`, `title`, `alias`, `country_id`)
VALUES
	(1,'Acre','acre',1),
	(2,'Alagoas','alagoas',1),
	(3,'Amapá','amapa',1),
	(4,'Amazonas','amazonas',1),
	(5,'Bahia','bahia',1),
	(6,'Ceará','ceara',1),
	(7,'Distrito Federal','distrito-federal',1),
	(8,'Espírito Santo','espirito-santo',1),
	(9,'Goiás','goias',1),
	(10,'Maranhão','maranhao',1),
	(11,'Mato Grosso','mato-grosso',1),
	(12,'Mato Grosso do Sul','mato-grosso-do-sul',1),
	(13,'Minas Gerais','minas-gerais',1),
	(14,'Pará','para',1),
	(15,'Paraíba','paraiba',1),
	(16,'Paraná','parana',1),
	(17,'Pernambuco','pernambuco',1),
	(18,'Piauí','piaui',1),
	(19,'Rio de Janeiro','rio-de-janeiro',1),
	(20,'Rio Grande do Norte','rio-grande-do-norte',1),
	(21,'Rio Grande do Sul','rio-grande-do-sul',1),
	(22,'Rondônia','rondonia',1),
	(23,'Roraima','roraima',1),
	(24,'Santa Catarina','santa-catarina',1),
	(25,'São Paulo','sao-paulo',1),
	(26,'Sergipe','sergipe',1),
	(27,'Tocantins','tocantins',1);

/*!40000 ALTER TABLE `country_states` ENABLE KEYS */;
UNLOCK TABLES;


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
