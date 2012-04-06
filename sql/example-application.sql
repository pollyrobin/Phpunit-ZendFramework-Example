DROP DATABASE IF EXISTS `phpunitexample`;

CREATE DATABASE `phpunitexample`;

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(90) DEFAULT NULL,
  `text` text,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `blog` WRITE;

INSERT INTO `blog` (`id`, `title`, `text`, `date_created`)
VALUES
	(1,'Woei!','blaat','2007-04-01'),
	(3,'Woei!','one plus one usually equals 2 ','2007-04-01');

UNLOCK TABLES;
