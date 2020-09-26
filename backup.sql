-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: main
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20200916072052','2020-09-17 19:41:25',722),('DoctrineMigrations\\Version20200916202401','2020-09-17 19:41:27',9641),('DoctrineMigrations\\Version20200917173608','2020-09-17 19:41:36',3443),('DoctrineMigrations\\Version20200917175421','2020-09-17 19:54:27',891),('DoctrineMigrations\\Version20200917175726','2020-09-17 19:57:29',1275),('DoctrineMigrations\\Version20200917193708','2020-09-17 21:37:35',403),('DoctrineMigrations\\Version20200917194035','2020-09-17 21:40:42',1540),('DoctrineMigrations\\Version20200917195302','2020-09-17 21:53:07',659),('DoctrineMigrations\\Version20200920085935','2020-09-20 10:59:53',938),('DoctrineMigrations\\Version20200920091836','2020-09-20 11:24:25',526),('DoctrineMigrations\\Version20200920101001','2020-09-20 12:10:07',777),('DoctrineMigrations\\Version20200921083955','2020-09-23 11:52:12',1046),('DoctrineMigrations\\Version20200921141249','2020-09-23 11:52:13',2620),('DoctrineMigrations\\Version20200921141632','2020-09-23 11:52:16',3423);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dog`
--

DROP TABLE IF EXISTS `dog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `breed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` int NOT NULL,
  `age` int NOT NULL,
  `ready` tinyint(1) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_812C397D7E3C61F9` (`owner_id`),
  CONSTRAINT `FK_812C397D7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dog`
--

LOCK TABLES `dog` WRITE;
/*!40000 ALTER TABLE `dog` DISABLE KEYS */;
INSERT INTO `dog` VALUES (6,'Afghan Hound','https://www.zooplus.co.uk/magazine/wp-content/uploads/2019/01/Afghan-hound-UK-768x512.jpg','The Valley Bulldog is a mixed breed dog–a cross between the Boxer and English Bulldog breeds.',1,5,1,'Putchi','F',NULL),(7,'Bulldog','https://s3.envato.com/files/143442200/2014_298_002_021.jpg','The Bulldog was originally used to drive cattle to market and to compete in a bloody sport called bullbaiting.',2,6,0,'Vodka','M',NULL),(8,'Chihuahua','https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/27134650/Chihuahua-standing-in-three-quarter-view.jpg','The Chihuahua dog breed‘s charms include their small size, big personality, and variety in coat types and colors.',1,7,1,'Lina','F',NULL),(9,'Dalmatian','https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12234026/Dalmatian-On-White-01.jpg','\'Best known as the star of Disney’s 101 Dalmatians, this sleek and athletic Dalmatian dog breed has a history that goes back several hundred years.',2,8,1,'Blood','M',NULL),(10,'Siberian Husky','https://www.purina-arabia.com/sites/default/files/SiberianHusky_400x378.jpg','The Siberian Husky dog breed has a beautiful, thick coat that comes in a multitude of colors and markings.',2,6,1,'Ivar','F',NULL),(11,'Labrador Retriever','https://www.purina.com.sg/wp-content/uploads/2013/11/LabradorRetrievers_2502.jpeg','The Labrador Retriever was bred to be both a friendly companion and a useful working dog breed.',1,7,0,'Max','M',NULL),(12,'string','string','string',1,0,1,'string','string',NULL),(13,'Caniche','https://lh3.googleusercontent.com/proxy/RyX3M2cScT0mGCon26kULNtn49HZSR-M8dIEgqo_F7PH3APrsTJz-hXA_-3ODaT7wY1Nt8WWD3han9iQs6dzuzx2KSZSwqBdirzv6nnkN8-gV0WfXk5q27Jpw1wuOwDaa6qZgImbsKMp2T8CPjvqlWisTZq3xPmu_1_ytSr_uMNwLrI_DLf0XS6J4A','zabooor',1,3,1,'Alex','M','Kram'),(14,'Berger','https://lh3.googleusercontent.com/proxy/RyX3M2cScT0mGCon26kULNtn49HZSR-M8dIEgqo_F7PH3APrsTJz-hXA_-3ODaT7wY1Nt8WWD3han9iQs6dzuzx2KSZSwqBdirzv6nnkN8-gV0WfXk5q27Jpw1wuOwDaa6qZgImbsKMp2T8CPjvqlWisTZq3xPmu_1_ytSr_uMNwLrI_DLf0XS6J4A','berg mbareg',1,5,0,'Dog1','M','Marsa'),(15,'dog2','https://lh3.googleusercontent.com/proxy/RyX3M2cScT0mGCon26kULNtn49HZSR-M8dIEgqo_F7PH3APrsTJz-hXA_-3ODaT7wY1Nt8WWD3han9iQs6dzuzx2KSZSwqBdirzv6nnkN8-gV0WfXk5q27Jpw1wuOwDaa6qZgImbsKMp2T8CPjvqlWisTZq3xPmu_1_ytSr_uMNwLrI_DLf0XS6J4A','dog2',1,2,1,'Dog2','M','dog2'),(16,'Caniche','https://lh3.googleusercontent.com/proxy/RyX3M2cScT0mGCon26kULNtn49HZSR-M8dIEgqo_F7PH3APrsTJz-hXA_-3ODaT7wY1Nt8WWD3han9iQs6dzuzx2KSZSwqBdirzv6nnkN8-gV0WfXk5q27Jpw1wuOwDaa6qZgImbsKMp2T8CPjvqlWisTZq3xPmu_1_ytSr_uMNwLrI_DLf0XS6J4A','zabooor',1,3,1,'dog3','M','Kram'),(17,'ProperBreedDof','https://lh3.googleusercontent.com/proxy/RyX3M2cScT0mGCon26kULNtn49HZSR-M8dIEgqo_F7PH3APrsTJz-hXA_-3ODaT7wY1Nt8WWD3han9iQs6dzuzx2KSZSwqBdirzv6nnkN8-gV0WfXk5q27Jpw1wuOwDaa6qZgImbsKMp2T8CPjvqlWisTZq3xPmu_1_ytSr_uMNwLrI_DLf0XS6J4A','dogdgodgod',1,2,1,'ProperdogName','M','Kram'),(18,'hruheuh','https://lh3.googleusercontent.com/proxy/RyX3M2cScT0mGCon26kULNtn49HZSR-M8dIEgqo_F7PH3APrsTJz-hXA_-3ODaT7wY1Nt8WWD3han9iQs6dzuzx2KSZSwqBdirzv6nnkN8-gV0WfXk5q27Jpw1wuOwDaa6qZgImbsKMp2T8CPjvqlWisTZq3xPmu_1_ytSr_uMNwLrI_DLf0XS6J4A','iozjgozjoze',1,2,1,'puta','M','efzef'),(19,'ezfez','https://lh3.googleusercontent.com/proxy/RyX3M2cScT0mGCon26kULNtn49HZSR-M8dIEgqo_F7PH3APrsTJz-hXA_-3ODaT7wY1Nt8WWD3han9iQs6dzuzx2KSZSwqBdirzv6nnkN8-gV0WfXk5q27Jpw1wuOwDaa6qZgImbsKMp2T8CPjvqlWisTZq3xPmu_1_ytSr_uMNwLrI_DLf0XS6J4A','efr',1,2,0,'dog','M','ezefz'),(20,'pit','https://lh3.googleusercontent.com/proxy/RyX3M2cScT0mGCon26kULNtn49HZSR-M8dIEgqo_F7PH3APrsTJz-hXA_-3ODaT7wY1Nt8WWD3han9iQs6dzuzx2KSZSwqBdirzv6nnkN8-gV0WfXk5q27Jpw1wuOwDaa6qZgImbsKMp2T8CPjvqlWisTZq3xPmu_1_ytSr_uMNwLrI_DLf0XS6J4A','pitpit',1,3,1,'drogo','M','khkihk'),(21,'always','https://lh3.googleusercontent.com/proxy/RyX3M2cScT0mGCon26kULNtn49HZSR-M8dIEgqo_F7PH3APrsTJz-hXA_-3ODaT7wY1Nt8WWD3han9iQs6dzuzx2KSZSwqBdirzv6nnkN8-gV0WfXk5q27Jpw1wuOwDaa6qZgImbsKMp2T8CPjvqlWisTZq3xPmu_1_ytSr_uMNwLrI_DLf0XS6J4A','wins',1,2,1,'love','M','');
/*!40000 ALTER TABLE `dog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://icon-library.com/images/default-user-icon/default-user-icon-4.jpg',
  `socials` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649444F97DD` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'mohammedjelidi05@gmail.com','[]','$argon2id$v=19$m=65536,t=4,p=1$xVpyQwUPwdmd9XWLuzuV9g$V4/D0uF6WAm74LvtWIz5zCMMR07GYrcMyJIDcICU6gY','mohammedjelidi1','28249424','https://icon-library.com/images/default-user-icon/default-user-icon-4.jpg','a:3:{i:0;s:30:\"https://facebook.com/medjelidi\";i:1;s:31:\"https://instagram.com/medjelidi\";i:2;s:29:\"https://twitter.com/medjelidi\";}','Kram'),(2,'hama00711@hotmail.fr','[]','$argon2id$v=19$m=65536,t=4,p=1$sJIxXqHgJC4vzCQMBVLDBg$taPNtqsKCbX8zBqh1AtR4oHdomWTE7HTayxun6r1b+s','hama00712','22111111','https://icon-library.com/images/default-user-icon/default-user-icon-4.jpg','a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}',NULL),(10,'hamzasnoussi@gmail.com','[]','$argon2id$v=19$m=65536,t=4,p=1$2ynZlM9qjCTFlirdwXmPSw$Zz1J1LJGtDHzibYD1aqVaJMkS/37a/P00xxxEHGM3hU','hamzasnoussi','28248616','https://icon-library.com/images/default-user-icon/default-user-icon-4.jpg',NULL,NULL),(11,'aziz@gmail.com','[]','12345678','aziz00711','23000000','https://icon-library.com/images/default-user-icon/default-user-icon-4.jpg','a:3:{i:0;s:0:\"\";i:1;s:18:\"instagram.com/aziz\";i:2;s:17:\"twitter.com/@aziz\";}',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-23 13:31:37
