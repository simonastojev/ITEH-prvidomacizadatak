CREATE DATABASE /*!32312 IF NOT EXISTS*/`katalog` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `katalog`;
/*Table structure for table `vrste porudzbina`*/
DROP TABLE IF EXISTS `vrste_porudzbina`;

CREATE TABLE `vrste_porudzbina` (
  `id_vrste` int(10) NOT NULL,
  `naziv_vrste` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_vrste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert  into `vrste_porudzbina`(`id_vrste`,`naziv_vrste`) values 
(1,'Nije u izradi'),
(2,'U izradi'),
(3,'Otkazana'),
(4,'Zavrsena izrada - priprema za isporuku'),
(5,'Pristigla');


/*Table structure for table `porudzbine`*/

DROP TABLE IF EXISTS `porudzbine`;

CREATE TABLE `porudzbine` (
  `id_porudzbine` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `tip_porudzbine` int(11) NOT NULL,
  `datum_porucivanja` datetime NOT NULL,
  `id_vrste` int(11) NOT NULL,
  PRIMARY KEY (`id_predstave`),
  KEY `id_vrste` (`id_vrste`),
  CONSTRAINT `porudzbine_ibfk_1` FOREIGN KEY (`id_vrste`) REFERENCES `vrste_poorudzbina` (`id_vrste`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


insert  into `porudzbine`(`id_porudzbine`,`naziv`,`cena`,`tip_porudzbine`,`datum_porucivanja`,`id_vrste`) values 
(4,'Happy Birthday',250,1,'12.1.2019.',2);

insert  into `porudzbine`(`id_porudzbine`,`naziv`,`cena`,`tip_porudzbine`,`datum_porucivanja`,`id_vrste`) values 
(5,'Graduation!',400,2,'20.9.2018.',3);
