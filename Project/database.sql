CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 5.7.16, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.7.16-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actors` (
  `actor_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  PRIMARY KEY (`actor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actors`
--

LOCK TABLES `actors` WRITE;
/*!40000 ALTER TABLE `actors` DISABLE KEYS */;
INSERT INTO `actors` VALUES (1,'Clara','Bow'),(2,'Charles','Rogers'),(3,'Vin','Diesel'),(4,'Jennifer','Lawrence'),(6,'Richard','Dix'),(7,'Irene','Dunne'),(8,'Clark','Gable'),(9,'Claudette','Colbert'),(10,'Paul','Muni'),(11,'Gloria','Holden'),(12,'Gale','Sondergaard'),(13,'Joseph','Schildkraut'),(14,'Laurence','Olivier'),(15,'Joan','Fontaine'),(16,'Humphrey','Bogart'),(17,'Ingrid','Bergman'),(18,'Paul','Henreid'),(19,'William','Wyler'),(20,'Myrna','Loy'),(21,'Fredric','March'),(22,'Dana','Andrews'),(23,'William','Wyler'),(24,'William','Wyler'),(25,'Broderick','Crawford'),(26,'John','Ireland'),(27,'Mercedes','McCambridge'),(28,'Betty','Hutton'),(29,'Cornel','Wilde'),(30,'Charlton','Heston'),(31,'James','Stewart'),(32,'Ernest','Borgnine'),(33,'Betsy','Blair'),(34,'Joe','Mantell'),(35,'Frank','Sutton'),(36,'Leslie','Caron'),(37,'Louis','Jourdan'),(38,'Maurice','Chevalier'),(39,'Natalie','Wood'),(40,'Richard','Beymer'),(41,'Rita','Moreno'),(42,'Audrey','Hepburn'),(43,'Rex','Harrison'),(44,'Stanley','Holloway'),(45,'Sidney','Poitier'),(46,'Rod','Steiger'),(47,'Warren','Oates'),(48,'George','Scott'),(49,'Karl','Malden'),(50,'Paul','Newman'),(51,'Robert','Redford'),(52,'Robert','Shaw'),(53,'Sylvester','Stallone'),(54,'Talia','Shire'),(55,'Burt','Young'),(56,'Carl','Weathers'),(57,'Dustin','Hoffman'),(58,'Meryl','Streep'),(59,'Justin','Henry'),(60,'Candice','Bergen'),(61,'Edward','Fox'),(62,'John','Gielgud'),(63,'Trevor','Howard'),(64,'Klaus','Brandauer'),(65,'Tom','Cruise'),(66,'Valeria','Golino'),(67,'Jodie','Foster'),(68,'Anthony','Hopkins'),(69,'Scott','Glenn'),(70,'Ted','Levine'),(71,'Tom','Hanks'),(72,'Robin','Wright'),(73,'Gary','Sinise'),(74,'Mykelti','Williamson'),(75,'Leonardo','DiCaprio'),(76,'Kate','Winslet'),(77,'Billy','Zane'),(78,'Kathy','Bates'),(79,'Frances','Fisher'),(80,'Victor','Garber'),(81,'Russell','Crowe'),(82,'Joaquin','Phoenix'),(83,'Connie','Nielsen'),(84,'Oliver','Reed'),(85,'Elijah','Wood'),(86,'Ian','McKellen'),(87,'Liv','Tyler'),(88,'Viggo','Mortensen'),(89,'Matt','Damon'),(90,'Jack','Nicholson'),(91,'Mark','Wahlberg'),(92,'Jeremy','Renner'),(93,'Anthony','Mackie'),(94,'Brian','Geraghty'),(95,'Christian','Camargo'),(96,'Ben','Affleck'),(97,'Bryan','Cranston'),(98,'Alan','Arkin'),(99,'Mark','Ruffalo'),(100,'Michael','Keaton'),(101,'Rachel','McAdams'),(102,'Liev','Schreiber'),(103,'Lew','Ayres'),(104,'Louis','Wolheim'),(105,'Diana','Wynyard'),(106,'Clive','Brook'),(107,'William','Powell'),(108,'Luise','Rainer'),(109,'Clark','Gable'),(110,'Vivien','Leigh'),(111,'Greer','Garson'),(112,'Walter','Pidgeon'),(113,'Ray','Milland'),(114,'Jane','Wyman'),(115,'Jean','Simmons'),(116,'John','Laurie'),(117,'Gene','Kelly'),(118,'Oscar','Levant'),(119,'Marlon','Brando'),(120,'Lee','Cobb'),(121,'Jack','Hawkins'),(122,'Alec','Guinness'),(123,'Sessue','Hayakawa'),(124,'William','Holden'),(125,'Jack','Lemmon'),(126,'Shirley','MacLaine'),(127,'Fred','MacMurray'),(128,'Albert','Finney'),(129,'Susannah','York'),(130,'Hugh','Griffith'),(131,'Paul','Scofield'),(132,'Wendy','Hiller'),(133,'Leo','McKern'),(134,'Jon','Voight'),(135,'Al','Pacino'),(136,'James','Caan'),(137,'Richard','Castellano'),(138,'Robert','Duvall'),(139,'Louise','Fletcher'),(140,'William','Redfield'),(141,'Robert','Niro'),(142,'Christopher','Walken'),(143,'John','Savage'),(144,'John','Cazale'),(145,'Ben','Cross'),(146,'Ian','Charlesson'),(147,'Nigel','Havers'),(148,'Cheryl','Campbell'),(149,'Murray','Abraham'),(150,'Tom','Hulce'),(151,'Elizabeth','Berridge'),(152,'Simon','Callow'),(153,'John','Lone'),(154,'Joan','Chen'),(155,'Peter','Toole'),(156,'Kevin','Costner'),(157,'Mary','McDonnell'),(158,'Graham','Greene'),(159,'Liam','Neeson'),(160,'Ben','Kingley'),(161,'Ralph','Fiennes'),(162,'Juliette','Binoche'),(163,'Willem','Dafoe'),(164,'Kevin','Spacey'),(165,'Annette','Bening'),(166,'Thora','Birch'),(167,'Wes','Bentley'),(168,'Renee','Zellweger'),(169,'Catherine','Jones'),(170,'Richard','Gere'),(171,'Sandra','Bullock'),(172,'Don','Cheadle'),(173,'Matt','Dillon'),(174,'Jennifer','Esposito'),(175,'Dev','Patel'),(176,'Freida','Pinto'),(177,'Madhur','Mittal'),(178,'Jean','Dujardin'),(179,'Berenice','Bejo'),(180,'Emma','Stone'),(181,'Edward','Norton'),(182,'Naomi','Watts'),(183,'Charles','King'),(184,'Anita','Page'),(185,'Bessie','Love'),(186,'Greta','Garbo'),(187,'John','Barrymore'),(188,'Wallace','Beery'),(189,'Charles','Laughton'),(190,'Franchot','Tone'),(191,'Jean','Arthur'),(192,'Lionel','Barrymore'),(193,'Maureen','Hara'),(194,'Anna','Lee'),(195,'Donald','Crisp'),(196,'Bing','Crosby'),(197,'Barry','Fitzgerald'),(198,'Rise','Stevens'),(199,'Gregory','Peck'),(200,'Dorothy','McGuire'),(201,'John','Garfield'),(202,'Celeste','Holm'),(203,'Bette','Davis'),(204,'Anne','Baxter'),(205,'George','Sanders'),(206,'Burt','Lancaster'),(207,'Montgomery','Clift'),(208,'Deborah','Kerr'),(209,'Donna','Reed'),(210,'Cantinflas',''),(211,'David','Niven'),(212,'Robert','Newton'),(213,'Haya','Harareet'),(214,'Stephen','Boyd'),(215,'Anthony','Quinn'),(216,'Julie','Andrews'),(217,'Christopher','Plummer'),(218,'Eleanor','Parker'),(219,'Mark','Lester'),(220,'Ron','Moody'),(221,'Shani','Wallis'),(222,'Gene','Hackman'),(223,'Roy','Scheider'),(224,'Fernardo','Rey'),(225,'Woody','Allen'),(226,'Diane','Keaton'),(227,'Tony','Roberts'),(228,'Donald','Sutherland'),(229,'Mary','Moore'),(230,'Judd','Hirsch'),(231,'Debra','Winger'),(232,'Charlie','Sheen'),(233,'Tom','Berenger'),(234,'Morgan','Freeman'),(235,'Jessica','Tandy'),(236,'Dan','Aykroyd'),(237,'Clint','Eastwood'),(238,'Mel','Gibson'),(239,'Sophie','Marceau'),(240,'Patrick','McGoohan'),(241,'Gwyneth','Paltrow'),(242,'Geoffrey','Rush'),(243,'Ed','Harris'),(244,'Jennifer','Connelly'),(245,'Hilary','Swank'),(246,'Tommy','Jones'),(247,'Javier','Bardem'),(248,'Josh','Brolin'),(249,'Colin','Firth'),(250,'Helena','Carter'),(251,'Chiwetel','Ejiofor'),(252,'Michael','Williams'),(253,'Michael','Fassbender');
/*!40000 ALTER TABLE `actors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Silent War'),(2,'Action'),(4,'Pre-Code Western'),(5,'Romance'),(6,'Romantic comedy'),(7,'Biographical'),(8,'Thriller'),(9,'Drama'),(10,'Musical'),(11,'Caper'),(12,'Sports'),(13,'Comedy-drama'),(14,'Historical-drama'),(15,'Fantasy'),(16,'War'),(17,'Pre-Codewar'),(18,'Romance-drama'),(19,'Romance-war'),(20,'Noir'),(21,'Crime-drama'),(22,'adventure-comedy'),(23,'Western'),(24,'Musical-criminal'),(25,'Adventure-drama'),(26,'War-drama'),(27,'Sport-drama');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directors`
--

DROP TABLE IF EXISTS `directors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directors` (
  `director_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  PRIMARY KEY (`director_id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directors`
--

LOCK TABLES `directors` WRITE;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` VALUES (1,'William A.','Wellman'),(2,'James','Wan'),(3,'Bryan','Singer'),(4,'Wesley','Ruggles'),(5,'Frank','Capra'),(6,'William','Dieterle'),(7,'Alfred','Hitchcock'),(8,'Michael','Curtiz'),(9,'William','Wyler'),(10,'Robert','Rossen'),(11,'Cecil','DeMille'),(12,'Delbert','Mann'),(13,'Vincente','Minnelli'),(14,'Robert','Wise'),(15,'Jerome','Robbins'),(16,'George','Cukor'),(17,'Norman','Jewison'),(18,'Franklin','Schaffner'),(19,'George','Hill'),(20,'John','Avildsen'),(21,'Robert','Benton'),(22,'Richard','Attenborough'),(23,'Sydney','Pollack'),(24,'Barry','Levinson'),(25,'Jonathan','Demme'),(26,'Robert','Zemeckis'),(27,'James','Cameron'),(28,'Ridley','Scott'),(29,'Peter','Jackson'),(30,'Martin','Scorsese'),(31,'Kathryn','Bigelow'),(32,'Ben','Affleck'),(33,'Tom','McCarthy'),(34,'Lewis','Milestone'),(35,'Frank','Lloyd'),(36,'Robert','Leonard'),(37,'Victor','Fleming'),(38,'Billy','Wilder'),(39,'Laurence','Olivier'),(40,'Elia','Kazan'),(41,'David','Lean'),(42,'Tony','Richardson'),(43,'Fred','Zinnemann'),(44,'John','Schlesinger'),(45,'Francis','Coppola'),(46,'Milos','Forman'),(47,'Michael','Cimino'),(48,'Hugh','Hudson'),(49,'Bernardo','Bertolucci'),(50,'Kevin','Costner'),(51,'Steven','Spielberg'),(52,'Gerald','Molen'),(53,'Branko','Lustig'),(54,'Anthony','Minghella'),(55,'Sam','Mendes'),(56,'Rob','Marshall'),(57,'Paul','Haggis'),(58,'Danny','Boyle'),(59,'Michael','Hazzanavicius'),(60,'Alejandro','Inarritu'),(61,'John','Lesher'),(62,'Arnon','Milchan'),(63,'James','Skotchdopole'),(64,'Harry','Beaumont'),(65,'Edmund','Goulding'),(66,'Frank','Capra'),(67,'John','Ford'),(68,'Leo','McCarey'),(69,'Joseph','Mankiewicz'),(70,'Michael','Anderson'),(71,'Carol','Reed'),(72,'William','Friedkin'),(73,'Woody','Allen'),(74,'Robert','Redford'),(75,'James','Brooks'),(76,'Oliver','Stone'),(77,'Bruce','Beresford'),(78,'Clint','Eastwood'),(79,'Mel','Gibson'),(80,'John','Madden'),(81,'Ron','Howard'),(82,'Ethan','Coen'),(83,'Joel','Coen'),(84,'Tom','Hooper'),(85,'Steve','McQueen');
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `movie_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  KEY `movie_id_fk` (`movie_id`),
  KEY `renter_id_fk` (`renter_id`),
  CONSTRAINT `movie_id_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  CONSTRAINT `renter_id_fk` FOREIGN KEY (`renter_id`) REFERENCES `renter` (`renter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,1),(17,1),(21,1),(22,1),(45,1),(43,1),(103,1),(31,1),(30,1),(26,1),(35,1),(23,1),(29,1),(28,1),(25,1),(104,1),(36,1),(108,1);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_actors`
--

DROP TABLE IF EXISTS `movie_actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_actors` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  PRIMARY KEY (`movie_id`,`actor_id`),
  KEY `actor_id` (`actor_id`),
  CONSTRAINT `actor_id` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_actors`
--

LOCK TABLES `movie_actors` WRITE;
/*!40000 ALTER TABLE `movie_actors` DISABLE KEYS */;
INSERT INTO `movie_actors` VALUES (1,1),(1,2),(17,6),(17,7),(21,8),(80,8),(21,9),(22,10),(22,11),(22,12),(22,13),(23,14),(55,14),(23,15),(24,16),(25,20),(51,20),(25,21),(25,22),(26,25),(26,26),(26,27),(27,28),(27,29),(27,30),(88,30),(27,31),(81,31),(28,32),(28,33),(28,34),(28,35),(29,36),(56,36),(29,37),(29,38),(30,39),(30,40),(30,41),(31,42),(31,43),(31,44),(32,45),(32,46),(32,47),(33,48),(33,49),(57,49),(34,50),(34,51),(38,51),(34,52),(35,53),(35,54),(35,55),(35,56),(36,57),(39,57),(62,57),(36,58),(38,58),(36,59),(37,60),(37,61),(37,62),(37,63),(38,64),(39,65),(39,66),(40,67),(40,68),(40,69),(40,70),(41,71),(41,72),(41,73),(41,74),(42,75),(45,75),(42,76),(42,77),(42,78),(42,79),(42,80),(43,81),(102,81),(43,82),(43,83),(43,84),(44,85),(44,86),(44,87),(44,88),(45,89),(45,90),(64,90),(96,90),(45,91),(108,92),(108,93),(108,94),(108,95),(47,96),(47,97),(47,98),(48,99),(48,100),(77,100),(48,101),(48,102),(49,103),(49,104),(50,105),(50,106),(51,107),(51,108),(52,109),(52,110),(53,111),(53,112),(82,112),(54,113),(54,114),(55,115),(55,116),(56,117),(56,118),(57,119),(63,119),(57,120),(58,121),(88,121),(58,122),(89,122),(58,123),(58,124),(59,125),(59,126),(96,126),(59,127),(60,128),(60,129),(60,130),(61,131),(61,132),(61,133),(62,134),(63,135),(93,135),(63,136),(63,137),(63,138),(93,138),(64,139),(64,140),(65,141),(93,141),(65,142),(65,143),(65,144),(66,145),(66,146),(66,147),(66,148),(67,149),(67,150),(67,151),(67,152),(68,153),(68,154),(68,155),(89,155),(69,156),(69,157),(69,158),(70,159),(70,160),(70,161),(71,161),(71,162),(71,163),(97,163),(72,164),(72,165),(72,166),(72,167),(73,168),(73,169),(73,170),(74,171),(74,172),(74,173),(74,174),(75,175),(75,176),(75,177),(76,178),(76,179),(77,180),(77,181),(77,182),(78,183),(78,184),(78,185),(79,186),(79,187),(79,188),(80,189),(80,190),(81,191),(81,192),(82,193),(82,194),(82,195),(83,196),(83,197),(83,198),(84,199),(84,200),(84,201),(84,202),(85,203),(85,204),(85,205),(86,206),(86,207),(86,208),(86,209),(87,210),(87,211),(87,212),(88,213),(88,214),(89,215),(90,216),(90,217),(90,218),(91,219),(91,220),(91,221),(92,222),(99,222),(92,223),(92,224),(94,225),(94,226),(94,227),(95,228),(95,229),(95,230),(96,231),(97,232),(97,233),(98,234),(99,234),(103,234),(98,235),(98,236),(99,237),(103,237),(100,238),(100,239),(100,240),(101,241),(101,242),(105,242),(102,243),(102,244),(103,245),(104,246),(104,247),(104,248),(105,249),(105,250),(106,251),(106,252),(106,253);
/*!40000 ALTER TABLE `movie_actors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_directors`
--

DROP TABLE IF EXISTS `movie_directors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_directors` (
  `director_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  PRIMARY KEY (`director_id`,`movie_id`),
  KEY `FK_movie` (`movie_id`),
  CONSTRAINT `FK_director` FOREIGN KEY (`director_id`) REFERENCES `directors` (`director_id`),
  CONSTRAINT `FK_movie` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_directors`
--

LOCK TABLES `movie_directors` WRITE;
/*!40000 ALTER TABLE `movie_directors` DISABLE KEYS */;
INSERT INTO `movie_directors` VALUES (1,1),(4,17),(5,21),(6,22),(7,23),(8,24),(9,25),(10,26),(11,27),(12,28),(13,29),(14,30),(15,30),(16,31),(17,32),(18,33),(19,34),(20,35),(21,36),(22,37),(23,38),(24,39),(25,40),(26,41),(27,42),(28,43),(29,44),(30,45),(32,47),(33,48),(34,49),(35,50),(36,51),(37,52),(9,53),(38,54),(39,55),(13,56),(40,57),(41,58),(38,59),(42,60),(43,61),(44,62),(45,63),(46,64),(47,65),(48,66),(46,67),(49,68),(50,69),(51,70),(52,70),(53,70),(54,71),(55,72),(56,73),(57,74),(58,75),(59,76),(60,77),(61,77),(62,77),(63,77),(64,78),(65,79),(35,80),(66,81),(67,82),(68,83),(40,84),(69,85),(43,86),(70,87),(9,88),(41,89),(14,90),(71,91),(72,92),(45,93),(73,94),(74,95),(75,96),(76,97),(77,98),(78,99),(79,100),(80,101),(81,102),(78,103),(82,104),(83,104),(84,105),(85,106),(31,108);
/*!40000 ALTER TABLE `movie_directors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_renter`
--

DROP TABLE IF EXISTS `movie_renter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_renter` (
  `renter_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `rental_date` date NOT NULL,
  `due_date` date NOT NULL,
  PRIMARY KEY (`renter_id`,`movie_id`),
  KEY `FK_rmovie` (`movie_id`),
  CONSTRAINT `FK_rmovie` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_rrenter` FOREIGN KEY (`renter_id`) REFERENCES `renter` (`renter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_renter`
--

LOCK TABLES `movie_renter` WRITE;
/*!40000 ALTER TABLE `movie_renter` DISABLE KEYS */;
INSERT INTO `movie_renter` VALUES (1,26,'2017-05-04','2017-05-11'),(1,36,'2017-05-04','2017-05-11');
/*!40000 ALTER TABLE `movie_renter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(45) NOT NULL,
  `movie_description` varchar(1000) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `movie_link` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`movie_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'Wings','Jack has a passion for sports cars but always dreams of flying. His neighbor Mary Preston is in love with him but he is in love with another girl named Sylvia Lewis. Unfortunately for him she is in love with ritch David Armstrong. After USA enters Worlds War I, Jack and David train to be pilots in American Expeditionary Corp. They went to fight in france and became friends. Later Mary joined the Women’s Motor Corp so she can be closer to Jack.',1,'1927-08-12','GFRas2-x_OQ'),(17,'Cimarron','The government opens up a territory in Oklahoma for settlement and Cravat claims a free land for himself. He moves his\r\n   family there and soon becomes a leading citizen of Osage. Soon after the town is established he begins to feel confined\r\n    and heads for the Cherokee Strip and leaves his family behind. During this and other absences, his wife Sabra learns to\r\n     take care of herself and becomes important in her own right.',4,'1931-01-26','tw5N0VJIvZA'),(21,'It Happened One Night','Ellie Andrews gets married with aviator King Westley and runs away by with the family yacht. Her father hires a detective to track her down while she tries to go to New York City. In a bus to there she meets newly unemployed journalist Peter Warne. She didn’t have any money and he decided to help her. In return he would get a good story out of it. While traveling together they start to appreciate and understand one another. Soon they fall in love.',6,'1934-02-22','ALmnUBqbhuo'),(22,'The Life of Emile Zola','Cezanne and Zola were buddies at the beginning of their careers. With ups and downs Zola became rich before Cezanne. He got married and made a successful career as an author. Paul Cezanne decided to live in the country away from the city. He is approached by Dreyfus, whose husband was unjustly court martialed and sent to Devil\'s Island because he was accused of disclosing military secrets.',7,'1937-08-11','bTStzVavGpo'),(23,'Rebecca','On Holiday in Monte Carlo, still troubled by the death of his first wife Rebecca, Maxim de Winter meets a young ladyâ€™s companion whom he falls in love with. After a certain amount of time they spend together, they get married. Not long after their honeymoon, after they had returned to his estate in Manderley, Mrs. de Winter gets tired of having to deal with the servants and the housekeeper, Mrs. Danvers.',8,'1940-04-12','CANjLGLrdak'),(24,'Casablanca','During World War II, Europeans sought refuge in America while fleeing from Germans. To get there they would first have to go to Casablanca in order to obtain their Visas. In Casablanca, Rick Blaine, exiled American runs the most popular cafe in town. When a Nazi Major Strasser arrives in Casablanca, police Captain Renault attempts to please him by detaining an underground leader Victor Laszlo. To Rickâ€™s surprise, he arrives with Rickâ€™s one time love Ilsa. They plan to get together again after she had left him in Paris.',9,'1942-11-26','BkL9l7qovsE'),(25,'The Best Years of Our Lives','The story is focused on the social adjustment of three WW II servicemen, each from a different society. Al Stephenson returns to banking, but itâ€™s hard for him to prove his loyalty to his ex-servicemen. Fred Derry is a working man who has problems holding down his job and his marriage. Homer Parrish, who had both of his hands burnt off during the war, in unsure that his fiance still loves him. Each of the veterans face a crisis which are a reflection of experiences of many American soldiers.',9,'1946-11-21','1yc5PugV4mk'),(26,'All the Kings Men','All the Kingâ€™s Men is a story of the rise of Willie Stark, a politician from a rural county. Along the path to become the spotlight, he becomes just as corrupt as those who he fought against during his campaign. The story also follows Jack Burden, a newspaper reporter who first hears of Willie Stark when his editor sends him to meet him. Also included is the romance between him and one of his assistants.',9,'1949-11-08','d45EXGFc7f0'),(27,'The Greatest Show on Earth','The Greatest Show on Earth is a dramatic spectacle of life behind the curtains of the best three-ring circus in the country, Ringling Bros-Barnum and Bailey Circus. Circus manager Brad Barden hires a world famous trapeze artist in order to ensure a full profitable season, which moves his girlfriend Holly from her hard earned spotlight in the same spot. Other plots involve secret past of Buttons the Clown and racketeersâ€™ efforts on the game concessions.',9,'1952-01-10','8GJHCicaOs0'),(28,'Marty','The story follows a 34 year old  socially awkward Bronx butcher Marty, the last of the six children stuck at home with an overbearing Italian mother, facing permanent bachelorhood as he is the only unmarried child. One night his mother sends him to the Stardust Ballroom where he unexpectedly meets a lonely teacher Clara. Suddenly, Martyâ€™s future seems bright.',9,'1955-04-11','b0SwSOvbNeI'),(29,'Gigi','Living in the Belle Epoque era of Paris, Gigi is training to be a highly educated woman who will become a mistress to wealthy men. She is mentored by her grandmother who has raised her together with her aunt Alicia. Both are trying to teach her good manners, however Gigi is resistant. When Gaston, a scion of a wealthy Parisian family becomes aware that Gigi has matured into a woman, her grandmother and aunt urge the pair to act out their roles.',6,'1958-05-15','R3XoLoQE7Ig'),(30,'West Side Story','A musical adaptation of a modern day Romeo and Juliet set on the west side of New York City in which two gangs, the Jets and the Sharks, battle for respect and territory. What is also seen is a love affair between a former gang leader Tony, And Maria, sister of the leader of the other gang. Is the love doomed to failure?',9,'1961-10-18','-tK9tARX83Y'),(31,'My Fair Lady','A musical adaptation of a modern day Romeo and Juliet set on the west side of New York City in which two gangs, the Jets and the Sharks, battle for respect and territory. What is also seen is a love affair between a former gang leader Tony, And Maria, sister of the leader of the other gang. Is the love doomed to failure?',10,'1964-11-09','C0xhzA78u4Q'),(32,'In the Heat of the Night','Virgil Tibbs, a black Philadelphia Homicide detective goes home to see his mother in the south. He is arrested on suspicion of murder by a racist police chief of Mississippi. After he manages to prove his innocence, he joins forces with the chief to find the real killed. Throughout the investigation they go around every social layer of the town in which Tibbs makes both enemies and friends on the hunt for the truth.',9,'1967-08-02','nMj0-fU25dM'),(33,'Patton','The story, the biography of a controversial World War II general George S. Patton in which his genius on the battlefield makes him fear and respect the germans, and he garners misunderstanding and resentment from his allies. He believes that he was a warrior in many of his past lives, a military historian and poet destined to achieve something great in his life, but he is stubborn and uses questionable methods in his ways.',7,'1970-02-04','g-0dTpzNzwo'),(34,'The Sting','The story, the biography of a controversial World War II general George S. Patton in which his genius on the battlefield makes him fear and respect the germans, and he garners misunderstanding and resentment from his allies. He believes that he was a warrior in many of his past lives, a military historian and poet destined to achieve something great in his life, but he is stubborn and uses questionable methods in his ways.',11,'1973-12-25','yCsFsUXFrUo'),(35,'Rocky','The story, the biography of a controversial World War II general George S. Patton in which his genius on the battlefield makes him fear and respect the germans, and he garners misunderstanding and resentment from his allies. He believes that he was a warrior in many of his past lives, a military historian and poet destined to achieve something great in his life, but he is stubborn and uses questionable methods in his ways.',12,'1976-11-21','7RYpJAUMo2M'),(36,'Kramer vs Kramer','On the same day that the up and coming New york advertising executive Ted Kramer lands the biggest get of his career, he finds out that his wife is leaving him, leaving him and his son alone, forcing him to raise his son alone. Tes loses his job but now he can spend more time with this son, strengthening their relationship. His wife, Joanna, later arrives to claim his son through court, and so the fight begins.',9,'1979-12-19','3SP9n13ux1I'),(37,'Gandhi','Biographical drama which presents major life events of Mohandas K. Gandhi, Indian leader beloved by his people who stood up against the rule of the British over his country. At first he is ignored by the British officials, but eventually his cause starts to become renowned and his passive gatherings move India closer to independence.',7,'1982-11-30','ha9MPLGo2YI'),(38,'Out of Africa','Life of a Danish noblewoman and a storyteller Karen Blixen, from 1913 when she married and departed for Kenya until her return to Denmark in 1931. As she struggles to maintain her coffee farm, she strives to maintain her relationship with the locals. She eventually falls in love with one of the locals, but he doesnâ€™t want to complicate his life with marriage. She must eventually choose between love and personal growth.',9,'1985-12-18','2EW2kNCmZZ0'),(39,'Rain Man','Charlie is a hustler who knows his way around and knows how to work with people. He eventually finds out that his father died, and he left him his antique car and something even more important, a institutionalized brother Raymond who he previously had no idea about. They set out on a journey of discovery across the country together.',9,'1988-12-16','mlNwXuHUA8I'),(40,'The Silence of the Lambs','A young FBI agent Clarice Starling is assigned to help find a missing woman in Baltimore, where she will interview a criminally insane inmate Dr. Hannibal lecter who might hold the answers to the solution of the case. But first, The young intelligent FBI trainee has to gain his confidence in order for him to give her any information.',8,'1991-01-30','lQKs169Sl0I'),(41,'Forrest Gump','Though not as smart as the people he meets in his life, Forrest Gump is a simple minded but kind hearted guy who grows up together with his best friend Jenny. He manages to succeed in life through a mixture of luck and destiny and he finds himself present at some of the very important events in the second half of the 20th century. He makes his own conclusion what life is all about.',13,'1994-01-23','uPIEn0M8su0'),(42,'Titanic','A tragical love story doomed by the depths of the Atlantic Ocean. Story follows young Jack Dawson and his relationship with Rose DeWitt Bukater who is on her way to Philadelphia to marry her fiance who she doesnâ€™t love. The ship hits an iceberg and Rose must find Jack as the ship sinks deeper into the freezing water.',5,'1997-11-01','2e-eXJ6HgkQ'),(43,'Gladiator','A dying emperor Marcus Aurelius plans to name his brave and loyal general Maximus as his successor so he could restore the power of the Roman Senate. But the emperorâ€™s power hungry son murder his father and plans to execute the general, but Maximus manages to escape. Later, he returns to Rome as a gladiator, making his way through the battles and winning the masses until he reveals himself. Can Maximus use the new popularity to avenge Marcus and take the throne?',14,'2000-05-01','owK1qxDselE'),(44,'The Lord of the Rings: The Return of The King','Frodo and Sam continue their wait to Mount Doom with the help/hindrance of Gollum. Gandalf and Pippin ride to Minas Tirith so they could defend Gondor. Merry remains with the Rohan fighters. Legolas, Aragorn and GImli seek help from the dead in the Cursed Mountains. All the battles are aimed to distract the Eye of Sauron so Frodo can sneak into Mordor and destroy the ring.',15,'2003-12-01','r5X-hFf6Bwo'),(45,'The Departed','Two just graduated cops from Massachusetts follow the opposite sides of the law. Colin Sullivan has risen through the ranks to become the head of a special department as a detective. He is working to take down a public enemy number one, a kingpin Frank Costello. However, Sullivan is paid by Costello, to whom he gives useful information. Meanwhile, Billy Costigan is an undercover cop who works for Costello, but he is actually spying on him. In a deadly cat and mouse game, they both try to stay undercover without getting discovered.',9,'2006-09-26','SGWvwjZ0eDc'),(47,'Argo','After Iranian militia stormed and took control of the US Embassy in 1979, six Americans successfully get away. After two months, the CIA and the US state department plan to get their people out by pretending to be scouting locations for a new movie called Argo. Mendez, the ex filtration specialist comes up with a story and everything for the movies, and then goes to Iran to lead the six americans out.',14,'2012-08-31','w918Eh3fij0'),(48,'Spotlight','In 2001, a team of journalists is assigned to investigate allegations against a priest accused of molesting children. Led by an editor Walter Robinson, reporters Matt Caroll, Sacha Pfeiffer and Michael Rezendes, they interview victims to try and unseal sensitive information. Their mission is to find proof that there has been a cover-up of sexual abuse in the Roman Catholic Church.',9,'2015-09-03','EwdCIpbTN5g'),(49,'All Quiet on the Western Front','An English language film adapted from a novel written by German author Erich Maria Remarque. The film follows a group of German schoolboys, which were talked into enlisting in the army at the beginning of World War 1 by their school teacher. The whole story is told true the experiences of the young German recruits, displaying the tragedy of war through their eyes. Witnessing death and mutilation around them, the boys stop having any preconceptions about â€œthe enemyâ€ and what is right or wrong, leaving them frustrated. The filmâ€™s main point is not about heroism, but rather about the futility of the concept of war.',17,'1930-04-21','Ciq9ts02ci4'),(50,'Cavalcade','The English life from 1899 until 1933, looked at through the eyes of a middle upper class family, the Marryots. It is also the world ass seen through the eyes of the Bridges, a working class family. Among the events covered in the movie are the sinking of the Titanic, the death of Queen Victoria, the Boer War and the Great War.',18,'1933-04-15','P5hCuJBlGe0'),(51,'The Great Ziegfeld','At the Chicago Worldâ€™s fair in 1893, barker Flo Ziegfeld turns the tables on his neighbor Billings, stealing his girlfriend. This repeats through their lives, as Ziegfield loses and makes many fortunes and puts on bigger, spectacular show. He marries a french revue star Anna Held, but itâ€™s not easy for him to be married to her when he is the man who glorified the American girl.',7,'1936-04-08','h-Rez1xM3yo'),(52,'Gone with the Wind','The tale of Scarlett, a woman which lives during one of the loudest periods in Americaâ€™s history. Story follows her young, innocent days, first love to three husbands, luxury to starvation and poverty, innocence to comprehension of life. Selfish woman who doesnâ€™t admit her feelings for the man she loves and loses him. She has become bitter and hardened and sheâ€™ll do everything. All of her relationships are doomed.',5,'1939-12-15','8mM8iNarcRc'),(53,'Mrs. Miniver','Story of an English middle class family in the beginning of World War II. Clem Miniver, a successful architect and his wife Kay, the person that holds the family together, with two children at home, struggle to survive the first months of the war. Their life is shattered when in September of 1939, England is forced to declare war on Germany. Throughout the movie, every character displays strength in the horrible tragedy and destruction.',19,'1942-06-04','QXXHxxSZZ8A'),(54,'The Lost Weekend','Story follows Don Birnam, unsuccessful writer who is an alcoholic. The only people who tried to keep him sober are his brother Wick and his girlfriend Helen when they decided to try and send him on a little vacation for 10 days in the countryside for the weekend. Don manages to trick them and he sends them away the evening before the trip. His binge drinking that weekend gets him into the drunk ward, and once he gets back home, he contemplates suicide.',20,'1945-11-16','j-tefK9hkuM'),(55,'Hamlet','A tragedy by William Shakespeare, murder and revenge in the royal halls in medieval Denmark. Brotherâ€™s King Claudius poisons the monarch to seize the throne and takes Gertrude as his bride. Hamlet mourns the death of his father and he finds out how his father died. He sets up a play in which he recreates the deed with the help of some actors to make Claudius aware that he knows. Hamlet accidentally kills the counselor Polonius thinking he was Claudius. Claudius sends him away to England.',9,'1948-05-04','b_n9r7NVYwU'),(56,'An American in Paris','Story follows Jerry Mulligan, a painter in Paris who struggles to survive. He is discovered by an influential mistress who is interested in more than just Jerryâ€™s art. Jerry falls in love with Lise, a young French girl who is already engaged. Things become complicated when both Jerry and his friend Henri Baurel start pursuing the same woman. She doesnâ€™t have much time to decide who she should stay with.',10,'1951-11-11','o2WAMZRCbpU'),(57,'On the Waterfront','An ex boxer Terry Malloy who works on the docks for the corrupt union boss Johnny witnesses a murder by two of Johnnyâ€™s thugs, and later he meets the killed manâ€™s sister. He feels responsible for the death of the man. Terry feels like he needs to stand up to his bosses so he could avenge his death. The girl introduces him to Father Barry, who wants him to give information to the courts which would end the racketeering of the Johnny and his thugs.',21,'1954-07-28','uBiewQrpBBA'),(58,'The Bridge on the River Kwai','The situation of the British prisoners during World War II. They are ordered to build a bridge to connect the Burma-Siam rail. They plan to sabotage the bridge but they are told that the bridge should be built because it would represent the British morale. At first they admire the orders of Colonel Nicholson, but they soon realize that itâ€™s not about the morale of the group but about building a monument for himself. They secretly begin a mission in the jungle to blow up the bridge.',16,'1957-10-02','SFMmJMNRv-Q'),(59,'The Apartment','Insurance worker C.C. Bud Baxter lends his apartment to his bosses for use in affairs in order to advance up in the ranks. His boss Jeff D. Sheldrake promotes Bud when he finds out what he is doing. But Bud ends up heartbroken when he finds out that Sheldrakeâ€™s girlfriend is Frank Kubelik, a girl that he likes. He must decide between the advancement of his career and a girl he loves.',6,'1960-06-15','3j9Q6w_3asA'),(60,'Tom Jones','Tom Jones, a bastard abandoned as a baby in mysterious circumstances is brought up by Squire Allworthy. He loves Sophie Western, Squireâ€™s daughter, but he cannot marry her to due to class differences. Villain Blifil tricks the squire into kicking Tom out of the house, and Tom goes forth on a series of adventures.',22,'1963-09-29','C0DDuzX2bjM'),(61,'A Man for All Seasons','The story of Sir Thomas More, who stood up to King Henry VIII. More is a devoted member of the church and a lawyer. More stands by his religious principles and leaves the royal court. He is eventually brought to trial on charges of accepting a bribe from Sir Richard Rich. He is found guilty and beheaded.',7,'1966-12-12','I4ypQ1Rkgd8'),(62,'Midnight Cowboy','Joe Buck quits his job as a dishwasher to travel to a small town in Texas where he plans to make money as a hustler. On arrival he is lured by a crook Enrico Salvatore Rizzo that takes money from him. Joe is broken and homeless and he meets Ratso again who invites him to his apartment. Ratsoâ€™s health is getting worse and he plans to move to Florida where he thinks that he will get healthy. They become friends and plan to go together.',9,'1969-05-25','a2yBydiEJrI'),(63,'The Godfather','Aging leader of an organized crime dynasty transfers control of his empire to his son. Everyone in his family is involved in the mafia. Don is against the use of drugs. Don is shot down and he barely survives. His son starts a mob war against Sollozzo to tear Corleone family apart.',21,'1972-03-15','sY1S34973zA'),(64,'One Flew Over the Cuckoos Nest','McMurphy, a criminal with several assault convictions, ends up in jail again, this time for rape. He convinces the guards that he is mentally insane so he could end up in the psychiatric care and to be sent to hospital. He fits in really well, and he starts to affect the patients positively',13,'1975-11-19','2WSyJgydTsA'),(65,'The Deer Hunter','Three buddies, Steven, Michael and Nick from the town of Clairton work together, hang out in a bar and go deer hunting on weekends. Their life changes soon after all of them get enlisted at the airborne infantry in which they would go to Vietnam. In Vietnam, they are captured by the enemy forces and are forced to play Russian Roulette. They manage to escape but Mike returns home to find that deer hunting changed for him after Vietnam, his friend handicapped and the other friend left in Vietnam.',16,'1978-12-08','3Gqit3zVmyc'),(66,'Chariots of Fire','The story is of two young British competitor sprinters in 1924 Olympics. One of them is Eric, who runs to please God. The other one, Harold, runs to prove himself in the Cambridge society. Harold and Eric go on to achieve fame after winning their races, as businessman and athletic advocates.',14,'1981-03-30','PWle59ZHPIM'),(67,'Amadeus','An incredible story of the life of Wolfgang Amadeus Mozart, told through the eyes of Salieri, an envious peer of Mozart who couldnâ€™t wrap his head around the mastermind that was Mozart. Story follows Mozart from his young age all the way to his death. Salieri became an enemy of God because of his envy towards Mozart.',9,'1984-09-06','yIzhAKtEzY0'),(68,'The Last Emperor','A dramatical history biography of Aisin-Gioro â€œHenryâ€ Pu Yi, the last Emperor of China named at the age of 3, who dies as a gardener in Peking. Through the movie we learn of his childhood, his imprisonment in the forbidden city, his life as the emperor and his release to public life in 1959.',7,'1987-10-23','A4cH6g1wD5g'),(69,'Dances with Wolves','A Civil War soldier Lieutenant John Dunbar who was sent into a remote outpost located in the wilderness stumbles upon a local Sioux tribe in which he is eventually accepted into. They call him â€œDance with Wolvesâ€, and he takes on an important role in the tribe as the army advances towards their plains, when he must make a difficult decision.',23,'1990-10-19','bZJdhq0_Moo'),(70,'Schindlers List','A true story of a German businessman Oskar Schindler, who ran a factory in which 1100 jews were working during the Holocaust. During the German Nazi Reign, he let the jews seek cover inside the factory, for the sake of keeping his factory up and running, and later realizing that he is saving hundreds of innocent lives.',14,'1993-11-30','JdRGC-w9syA'),(71,'The English Patient','Near the end of World War II, a nurse, a thief, a burn victim and a sapper find themselves in each others company. Through flashbacks, we are seeing the life of the burn victim, involving his love for a woman and the choices he made for her which lead to the change of lives of another person in the villa. In the movie, the question of identity is presented.',19,'1996-11-15','Xk_LRcOFT0c'),(72,'American Beauty','A sexually frustrated father Lester Burnham is suffering a mild-life crisis and he is rebelling against his job, wife and his daughter who doesnâ€™t love him. His actions evolve into a dark but comical drama, affecting the life of the others with his behavior but not in a good way.',9,'1999-09-08','3ycmmJ6rxA8'),(73,'Chicago','Nightclub worker Velma Kelly murders her husband and sister after she finds them in bed. Roxie Hart is a wannabe nightclub star which murdered her boyfriend because she came to the conclusion that he wouldnâ€™t make her famous. They find themselves on death row together, still fighting for the fame they always wanted without realizing their life is on the line.',24,'2002-12-10','9EpaMmF9WVU'),(74,'Crash','Movie follows several stories that are interweaving during a period of two days in Los Angeles which involve characters that are inter-related, a police detective with a druggie mother and a thief as a younger brother, two car thieves, an attorney and his wife, a veteran racist cop, a Hollywood director and his wife, a Persian immigrant, a Hispanic locksmith and his younger daughter.',9,'2004-09-10','durNwe9pL0E'),(75,'Slumdog Millionaire','Story of an eighteen year old Jamal Malik, an orphan from the Mumbai slums who is about to answer the final question on an Indian version of Who Wants To Be A Millionaire. On suspicion of cheating, he is desperate to prove his innocence, and he attempts to explain how he got every question to that moment right through the story of his life.',9,'2008-08-30','AIzbwV7on6Q'),(76,'The Artist','In 1927, in Hollywood, George Valentin is enjoying the success of his latest movie, The Russian Affair. A fan of him, Peppy Miller, kisses him in front of the cameras and they end up in the newspaper. She slowly starts rising to fame as an actor while Valentinâ€™s career crumbles after a failed attempting at a silent movie. He is bankrupt, but Peppy never forgot what he did for her.',18,'2011-05-15','ixqr8D7J_Kc'),(77,'Birdman','Riggan Thompson is an actor, a man struggling to mark his place in the world. He played a famous and iconic superhero Birdman in the movie of the same name which achieved big fame. Riggan, trying to build a career out of the movie, he is directing and starring in his own Broadway show. Throughout the film he battles the voice of Birdman so he can pull of the play perfectly despite problems during preview showings.',13,'2014-08-27','uJfLoE6hanc'),(78,'The Broadway Melody','The story is about Harriet Mahoney and Queenie Mahoney coming to Broadway. They have a friend called Eddie Kerns. Eddie offers them a part in his show. Before, Eddie loved Harriet, but after meeting Queenie, he fell in love with her. Queenie was taken by a member of New  York high class, Jock Warriner. Later, she recognizes that  she is just a doll to Jock, and Harriet realizes that Eddie is not in love with her anymore, and what is even worse, he is in love with Queenie.',10,'1929-02-01','OxWVH28E1KY'),(79,'Grand Hotel','A group of seven very different individuals is staying at the same hotel. Every one of them has its own complicated past behind them. The plot is about all of them dealing with each others complex history and unknown future.',9,'1932-04-12','fUhl5o8cJ5g'),(80,'Munity on the Bounty','After the ship called Bounty reaches Tahiti, the crew rebels against the captain because he was to strict. Before reaching Tahiti, they were going through hell with him. Starting point for the ship was Portsmouth, and the crew was able to stand Captain Blighâ€™s behaviour. On Tahiti, they thought that they are in paradise, which is why they rebelled when they should have continue their trip. Officer Christian Fletcher was a leader of a rebellion.',14,'1935-11-08','Ur25pXcI52o'),(81,'You Cant Take It with You','Alice Sycamore is in love with Tony Kirby, her boss. They both work in a company owned by Tonyâ€™s father. After Tony proposes to Alice, they decide to meet their families. The interesting things start to happen when they meet because of their different classes and lifestyles. Kirbies are more into money and business, and Sycamores are more into having fun and making friends.',6,'1938-08-23','0WY9RAroTS0'),(82,'How Green Was My Valley','The plot is seen from the perspective of Huw, the youngest member of the Morgan family that lives in a Welsh. All older members of family work in mines. The job is hard and it is not paid well. However, Gwilym, who is Huwâ€™s father has greater plans for Huw than working in a mine. This ideas cross Huwâ€™s ideas of honoring his father and family.',9,'1941-10-28','Om_mAeQ1GWc'),(83,'Going My Way','Young Chuck Oâ€™Malley had a life full of sports and romance before he realized that his real call is to become a priest in the Roman Catholic clergy. His knowledge about world and society helps him handle church related business. Also it helps him win his older colleague, Father Fitzgibbon.',13,'1944-05-03','ecjzal-wlKQ'),(84,'Gentlemens Agreement','The story follows Philip Green, a highly respected writer who is recruited by a national magazine to write articles on anti-Semitism in America. He doesnâ€™t enjoy writing the series, because heâ€™s not quite sure how to tackle the subject. Then he got an idea: if he pretended to everyone that he was Jewish, he would then experience the racism and prejudice that he should be writing about from his perspective. It didnâ€™t take long before he experienced bigotry. His anger about the way people treat him affected his relationship with Kathy Lucy, his publisherâ€™s niece - the same person that suggested the series in the first place.',18,'1948-02-02','E2eAXa7rNXw'),(85,'All About Eve','Movie description: Aspiring actress Eve Harrington makes her way into the lives of the Broadway star Margo Channing, playwright Lloyd Richards and director Bill Sampson. Everybody, except the critic Addison DeWitt, believes that Eve is a humble, naive and obsessed fan of Margo so they try to help her. But Eve is a cynical and manipulative person that uses the lives of Margo and others to reach her objectives in theater business.',9,'1951-01-15','uHVYTPFgCqE'),(86,'From Here to Eternity','Movie description: The year is 1941. Robert E. Lee Prewitt has requested a transfer to the Army and he ends up at Schofield in Hawaii. Dana Holmes, his new captain, has heard of his boxing ability and wants to get him to represent the company. Prewitt doesnâ€™t want to box anymore, so Captain Holmes orders his assistants to make his life a living hell. Meanwhile Sergeant Warden starts seeing the captainâ€™s wife. Prewâ€™s friend Maggio has a few arguments with Sergeant â€˜Fatsoâ€™ Judson, and Prew falls in love with the social club employee Lorene.',19,'1953-10-19','I7BwIPCX6ZQ'),(87,'Around the World in 80 Days','Englishman Phileas Fogg is challenged to prove his statement that a person can go around the world in 80 days, further boasting that he will bet 20,000 pounds on his success. He believes that all it takes is making sure that all the schedule times are met. Along his journey, he is accompanied by his servant Passepartout. On their journey, they get into a lot of misadventures, and they  are also pursued by a police inspector who goes by the name Fix, who suspects Phileas Fogg of chicanery.',22,'1956-10-17','vjiCO8k6Jhg'),(88,'Ben-Hur','Judah Ben-Hur is a rich Jewish prince and merchant who lives in Jerusalem at the beginning of the 1st century. When Ben-Hur hears about his childhood friend Messala being named the commander of the Roman Garrison of Jerusalem, he is thrilled. At first they are happy to meet after a long time, but Ben-Hur quickly realizes that his friend changed and that he has become an arrogant conqueror. When Judah refuses to give out the names of the Jews who oppose the Roman rule, Messala decides to send him off as a galleon slave to serve as an example to others. Judah manages to survive the galleys and returns to Jerusalem hoping to find his imprisoned mother and sister and seeks revenge against Messala.',25,'1960-01-29','NR1ZHKw09n8'),(89,'Lawrence of Arabia','Arabia and England are in war against the Turkey. T.E. Lawrence, British lieutenant gets an order to visit Arabia in order to serve as an connection between England and Arabia. In order to successfully obey the order, he first needs to find Prince Faisal. Lawrence and Arab Sherif Ali disobey orders from England and on their own risk attack a guarded Turkish port.',14,'1962-12-11','zmr1iSG3RTA'),(90,'The Sound of Music','The story is located in Austria. The year is 1930. A woman called Maria is trying to become a nun, but her attempts usually fail. Navy captain, Georg Von Trapp needs help with his seven children, because his wife died. This is why he decides to write a letter in which he asks the convent to send him someone who can help him. Maria is the one that convent sent. Captain Von Trapp is usually really strict, both at home and on the ship, but when he and children meet Maria, everything gets better. Maria and Captain eventually fall in love, aldo he is engaged and she is still a postulant.',9,'1965-03-29','UY6uw3WpPzY'),(91,'Oliver!','Dickensâ€™ â€œOliver Twistâ€ is seen in a musical way. The classic story stays the same as in the book: Oliver is an orphan. One day he decides to run away from the orphanage. After some time he starts hanging out with the kids that are trained to be pickpockets. Oliver then embraces their lifestyle and even move in with the kids into the house where they lived with their old mentor.',9,'1968-09-27','ImKgBACucAw'),(92,'The French Connection','A plot full of action and car chases pulled through the story of two policemen trying to stop a big drug shipment coming from France. The story makes a comparison based on two different characters. One of which is portrayed as gentleman, yet he is one of the largest drug suppliers in New York. On the other side, we have an alcoholic that is actually an hardworking policeman.',9,'1971-12-27','T76K3RxJY0A'),(93,'The Godfather Part II','Story both continues on the â€œGodfather Iâ€ and comes back through time to tell what happened before. We can see Michael Corleone trying to make family business even wider. He tries to make them successful in both Las Vegas and Cuba, that is in that time (1950s) in the  pre revolution phase. There is also a part of the story that follows Vito Corleone as he is growing up. This part is happening 40 years before the 1950s, giving us a wide time difference in one movie.',21,'1975-05-15','9O1Iy9od7-A'),(94,'Annie Hall','The story follows Jewish stand up comedian, Alvy Singer. He is living in New York and has major issues with women and relationships. He is divorced, two times, but he meets a singer, Annie Hall. Annie is sure that his problems are treatable through a long therapy, in which Alvy finds out a lot about himself and his love for Annie.',6,'1977-04-20','OqVgCfZX-yE'),(95,'Ordinary People','Depressed family of three is trying to continue living after the death of the older son. Calvin, a father of the dead son and his brother, Conrad is desperately trying to keep the family together. It is hard because they are all living in the shade of the recent tragedy. Also, Beth, who is their mother always liked the older brother better than Conrad. That is the problem because Conrad needs help with his depression and suicidal thoughts and it is hard for his mother to be of help.',9,'1981-03-05','UZYHe8IAlto'),(96,'Terms of Endearment','Aurora and her daughter Emma are having problems. Aurora has romantic issues because she is hard to please and Emma is having family problems related to her motherâ€™s inability to keep a normal guy. In the end Aurora starts hanging out with an retired astronaut and we can see that there are a lot of different forms of loving someone.',13,'1984-03-16','FjLFMTIDkIM'),(97,'Platoon','The story is happening during the war between USA and Vietnam. The main character is young Chris Taylor, who quits college to join the military and go to Vietnam. After arriving to Vietnam, he quickly realizes that he is in hell and starts to go through psychological meltdown.',26,'1987-04-24','hGsyEkfjhQk'),(98,'Driving Miss Daisy','An old widow, who can no longer drive is provided with a personal driver by her son. At first she did not like the idea at all, but later as the movie continues we see that she grows a friendly relationship with her driver over the twenty years that are covered in this movie.',9,'1990-01-26','TQ3wXC5jqKE'),(99,'Unforgiven','Little town called Big Whiskey is rather normal town full of people trying to live normal lives. Everything breaks apart when a couple of cowboys kill a prostitute. Other prostitutes are not satisfied with sheriffâ€™s work, so they place a bounty on cowboysâ€™ heads. This brings some bounty hunters to town, one of which is The Schofield Kid.',23,'1992-08-07','ftTX4FoBWlE'),(100,'Braveheart','The story is about scottish rebellion leader, William Wallace, who is rebelling against the English king, Edward the Longshanks. Edward is cruel king and Wallace is trying to free Scotland of his cruelty. Many have joined his march against king, but in the end it finishes bad for them.',26,'1995-09-08','wj0I8xVTV18'),(101,'Shakespeare in Love','Shakespeare is an artist who is struggling in life. He likes to write poems, screenplays and acting. In order to make money that he desperately needs, he sold his next play to two different guys. The biggest problem is that the play is not written yet and what is even worse, he has no inspiration to write it at all. This changes when he meets his ideal women. His inspiration immediately blooms and his able to write one of the most beautiful and famous play.',6,'1999-01-29','gk1rTKB6ZF8'),(102,'A Beautiful Mind','The story is about genius mathematician called John Forbes. His problem is that he is asocial outsider. Later he starts working for a secret service on breaking codes, which changes his life.',7,'2002-02-22','aS_d0Ayjw4o'),(103,'Million Dollar Baby','Maggie Fitzgerald is a boxer, who wants Frankie Dunn to be her trainer. He refuses it because she is a woman. Later he accepts her offer, she becomes a champion and they become good friends. Then Maggie goes through boxing related injury, which complicates everything.',27,'2005-01-14','aS_d0Ayjw4o'),(104,'No Country for Old Men','Llewelyn Moss is a normal guy, living in Texas and making a living by construction working and hunting. One day he comes to the place on which one drug deal went horribly bad, leaving a lot of dead drug dealers and two million dollars in cash. When Moss saw the money, he took it with him and decided not to report it to anyone. This brought him many problems.',8,'2008-01-18','38A__WT3-o0'),(105,'The Kings Speech','Plot is based on a true story of Englandâ€™s Prince Albert. He is about to sit on a throne, but has problems with talking in front of many people. This is why his wife hires speech therapist, Lionel Logue, who helps him overcome his issues. In that process, two of them became good friends.',14,'2011-01-07','pzI4D6dyp_o'),(106,'12 Years a Slave','Solomon Northup is a free black guy, living in New York. One day he gets kidnapped and sold as a slave. That is when his battle for freedom begins. After twelve years of suffering and being bullied by his masters, he is finally able to prove that he is a free man.',9,'2014-01-10','z02Ie8wKKRg'),(108,'The Hurt Locker','An intense story of soldiers who have to do one of the most dangerous jobs in the world and that is disarming bombs in the middle of combat. Two subordinates Sanborn and Eldridge are sent by their new sergeant James in reckless urban combat, not caring about life or death. Men struggle to control their new leader while the city becomes chaos.',16,'2008-09-04','2GxSDZc8etg');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privileges`
--

DROP TABLE IF EXISTS `privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privileges` (
  `privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_desc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privileges`
--

LOCK TABLES `privileges` WRITE;
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` VALUES (1,'Add movies'),(2,'Delete movies'),(3,'Modify user data'),(4,'View movies for rent'),(5,'Rent a movie'),(6,'Write a Review'),(7,'View Profile');
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `renter`
--

DROP TABLE IF EXISTS `renter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `renter` (
  `renter_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `card_no` varchar(19) DEFAULT NULL,
  PRIMARY KEY (`renter_id`),
  UNIQUE KEY `renter_username_uindex` (`username`),
  CONSTRAINT `renter_users_username_fk` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `renter`
--

LOCK TABLES `renter` WRITE;
/*!40000 ALTER TABLE `renter` DISABLE KEYS */;
INSERT INTO `renter` VALUES (1,'AdminEx','Frano','Nolaa','fxn3390@g.rit.edu','4087-8955-5302-3241'),(2,'EditorEx','s','s','s','s'),(3,'UserEx','s','s','s','s');
/*!40000 ALTER TABLE `renter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`review_id`),
  KEY `reviews_movies_movie_id_fk` (`movie_id`),
  CONSTRAINT `reviews_movies_movie_id_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,1,5,'Best movie ever! Lul'),(4,1,2,'ASDasdasd'),(5,1,2,'asdas'),(6,1,1,'SO badlol'),(7,1,1,'ASdasdas'),(8,17,4,'Not bad'),(9,17,1,'Test1'),(10,17,1,'123'),(11,17,1,'Test'),(12,17,2,'Test123'),(13,17,2,'2'),(14,17,3,'3'),(15,21,1,'Test Review 1');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_privileges`
--

DROP TABLE IF EXISTS `role_privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_privileges` (
  `role_id` int(11) DEFAULT NULL,
  `priviledge_id` int(11) DEFAULT NULL,
  KEY `role_privileges_privileges_privilege_id_fk` (`priviledge_id`),
  KEY `role_privileges_roles_role_id_fk` (`role_id`),
  CONSTRAINT `role_privileges_privileges_privilege_id_fk` FOREIGN KEY (`priviledge_id`) REFERENCES `privileges` (`privilege_id`),
  CONSTRAINT `role_privileges_roles_role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_privileges`
--

LOCK TABLES `role_privileges` WRITE;
/*!40000 ALTER TABLE `role_privileges` DISABLE KEYS */;
INSERT INTO `role_privileges` VALUES (1,2),(1,3),(2,5),(2,6),(2,7),(2,4),(3,1);
/*!40000 ALTER TABLE `role_privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin'),(2,'User'),(3,'Editor');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `username` varchar(20) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  KEY `user_roles_users_username_fk` (`username`),
  KEY `user_roles_roles_role_id_fk` (`role_id`),
  CONSTRAINT `user_roles_roles_role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  CONSTRAINT `user_roles_users_username_fk` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES ('AdminEx',1),('AdminEx',2),('AdminEx',3),('UserEx',2),('UserEx',3),('AdminEx',2),('AdminEx',3),('Test',2),('Test',3),('EditorEx',2),('EditorEx',3);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('AdminEx','202cb962ac59075b964b07152d234b70','fxn3390@g.rit.edu'),('EditorEx','202cb962ac59075b964b07152d234b70','fas@sa.cs'),('Test','827ccb0eea8a706c4c34a16891f84e7b','sadas@asd.asdas'),('UserEx','202cb962ac59075b964b07152d234b70','fas@sa.cs');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `watch_later`
--

DROP TABLE IF EXISTS `watch_later`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `watch_later` (
  `movie_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  UNIQUE KEY `table_name_movie_id_uindex` (`movie_id`),
  KEY `watch_later_renter_renter_id_fk` (`renter_id`),
  CONSTRAINT `table_name_movies_movie_id_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  CONSTRAINT `watch_later_renter_renter_id_fk` FOREIGN KEY (`renter_id`) REFERENCES `renter` (`renter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `watch_later`
--

LOCK TABLES `watch_later` WRITE;
/*!40000 ALTER TABLE `watch_later` DISABLE KEYS */;
/*!40000 ALTER TABLE `watch_later` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-04 14:49:48
