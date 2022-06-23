-- MySQL dump 10.17  Distrib 10.3.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: tap59726_web
-- ------------------------------------------------------
-- Server version	10.3.24-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `tap59726_web`
--


--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES ('kientran.hvtc@gmail.com');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `feeship` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `shipping_method` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,4,'Trần Trung Kiên','kientran.hvtc@gmail.com','0965556525','Hà Nội','Bắc Từ Liêm','Cổ Nhuế 1','232 Pham Van Dong','abc',0,4000,1,1),(2,1,2,'Trần Trung Kiên','kientran.hvtc@gmail.com','0965556525','Hà Nội','Bắc Từ Liêm','Cổ Nhuế 1','232 Pham Van Dong','',0,2000,1,2),(3,1,3,'','','','','','','','',0,3000,1,2),(4,1,3,'','','','','','','','',0,3000,1,0),(5,1,3,'','','','','','','','',0,3000,1,0),(6,1,3,'','','','','','','','',0,3000,1,0),(7,1,3,'','','','','','','','',0,3000,1,0),(8,1,3,'','','','','','','','',0,3000,1,0),(9,1,3,'','','','','','','','',0,3000,1,0),(10,1,1,'Test','tgea@gmail.com','09123124','','','','','',0,1000,1,0),(11,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(12,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(13,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(14,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(15,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(16,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(17,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(18,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(19,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(20,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(21,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(22,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(23,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(24,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(25,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(26,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(27,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0),(28,1,2,'Nguyễn Hoàng Nam','namnguyenhoang0110@gmail.com','0375719256','Hải Phòng','Ngô Quyền','Máy Tơ','','',0,2000,1,0);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'TAPUS PVC CARD','Danh thiếp điện tử TAPUS cá nhân hóa tùy chỉnh thông tin','1000',NULL),(2,'YOUR TAPUS','Danh thiếp điện tử TAPUS cá nhân hóa tùy chỉnh thiết kế và thông tin','0',NULL),(3,'STICKUS','Danh thiếp điện tử TAPUS dạng sticker nhỏ gọn và thuận tiện','0',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `url` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'kientran','551999','1','kientran','Trần Trung Kiên','Tôi là lập trình viên','https://www.facebook.com/kientran.hvtc','#','#','0965556525','/images/avatar/kientran.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-14 18:35:32

