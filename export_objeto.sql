-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `Objeto`
--

DROP TABLE IF EXISTS `Objeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Objeto` (
  `idObjeto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `calidad` varchar(2) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idObjeto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Objeto`
--

LOCK TABLES `Objeto` WRITE;
/*!40000 ALTER TABLE `Objeto` DISABLE KEYS */;
INSERT INTO `Objeto` VALUES (1,'Apple Mac Pro (2019)','El Apple Mac Pro (2019) es una potente computadora de escritorio diseñada para profesionales creativos y de la industria tecnol?','..\\src\\img\\item\\Apple Mac Pro 2019','L',7000),(2,'Apple Pro Display XD','El Apple Pro Display XDR es un monitor de alta gam','..\\src\\img\\item\\Apple Pro Display XDR','L',5750),(3,'Apple iMac Retina 5K','El Apple iMac Retina 5K es una computadora todo en uno que cuenta con una pantalla de 27 pulgadas con una resolución de 5K, lo qu','..\\src\\img\\item\\Apple Pro Display XDR','L',2650),(4,'Apple MacBook Pro 14','El Apple MacBook Pro 14 (2021) es una computadora ','..\\src\\img\\item\\Apple MacBoock Pro 14 2021','L',2300),(5,'Apple iMac 24\" (2021','El Apple iMac 24\" (2021) es una computadora todo e','..\\src\\img\\item\\Apple iMac 24 2021','L',1500),(6,'Apple MacBook Pro 13','El MacBook Pro 13 M1 (2020) es una versión actuali','..\\src\\img\\item\\Apple MacBook Pro 13 M1 2020','L',1500),(7,'Apple iPad Pro 12.9 ','El Apple iPad Pro 12.9 (2021) es una tableta de al','..\\src\\img\\item\\Apple MacBook Pro 13 M1 2020','L',1275),(8,'Apple Mac Mini (2020','El Apple Mac Mini (2020) es una computadora de esc','..\\src\\img\\item\\Apple Mac Mini 2020','L',1275),(9,'Apple MacBook Air (2','El MacBook Air (2020) es una computadora portátil ','..\\src\\img\\item\\Apple macbook air 2020','L',1150),(10,'Apple iPad Pro 11 (2','El Apple iPad Pro 11 (2021) es una tableta de alta','..\\src\\img\\item\\Apple iPad Pro 11 2021','E',950),(11,'Apple iPhone 13','El iPhone 13 es el último modelo de smartphone de ','..\\src\\img\\item\\Apple iPhone 13','E',800),(12,'Apple iPad Air (2020','El Apple iPad Air (2020) es una tablet de alta gam','..\\src\\img\\item\\Apple iPad Air 2020','E',700),(13,'Apple iPhone 13 Mini','El iPhone 13 Mini es un smartphone de la marca App','..\\src\\img\\item\\Apple iPhone 13 Mini','E',700),(14,'Apple AirPods Max','Los Apple AirPods Max son unos auriculares inalámb','..\\src\\img\\item\\Apple AirPods Max','E',650),(15,'Apple iPhone SE (202','Apple iPhone SE (2022) un chip supersónico. Un eno','..\\src\\img\\item\\Apple iPhone SE (2022)','E',500),(16,'iPod Touch 7th Gener','El iPod Touch de séptima generación Product (RED) ','..\\src\\img\\item\\iPod Touch 7th Generation Product ','SR',230),(17,'Apple AirPods 3','Los Apple AirPods 3 son auriculares inalámbricos q','..\\src\\img\\item\\Apple AirPods 3','SR',210),(18,'Apple TV 4K (2nd Gen','El Apple TV 4K (2da generación) es un dispositivo ','..\\src\\img\\item\\Apple TV 4K (2nd Generation)','SR',200),(19,'Magic Keyboard with ','El Magic Keyboard con Keypad es un teclado inalámb','..\\src\\img\\item\\Magic Keyboard with Keypad','SR',150),(20,'Apple Pencil 2','El Apple Pencil 2 es un lápiz óptico diseñado espe','..\\src\\img\\item\\Apple Pencil 2','SR',150),(21,'Apple Magic Trackpad','El Apple Magic Trackpad 3 es un dispositivo de ent','..\\src\\img\\item\\Apple Magic Trackpad 3','SR',150),(22,'Apple HomePod mini','El Apple HomePod mini es un altavoz inteligente co','..\\src\\img\\item\\Apple HomePod mini','R',115),(23,'Apple 140W USB-C Pow','El Apple 140W USB-C Power Adapter es un adaptador ','..\\src\\img\\item\\Apple 140W USB-C Power Adapter','R',115),(24,'Magic Mouse 3','El Magic Mouse 3 es un ratón inalámbrico de alta p','..\\src\\img\\item\\Magic Mouse 3','R',95),(25,'iPhone Leather Walle','La iPhone Leather Wallet with MagSafe es una carte','..\\src\\img\\item\\iPhone Leather Wallet with MagSafe','R',70),(26,'30W USB-C Power Adap','El iPhone Leather Wallet with MagSafe es un acceso','..\\src\\img\\item\\30W USB-C Power Adapter','R',60),(27,'Apple Store Gift Car','La Apple Store Gift Card de $50 es una tarjeta de ','..\\src\\img\\item\\Apple Store Gift Card $50','R',50),(28,'Apple MagSafe Charge','El Apple MagSafe Charger es un cargador inalámbric','..\\src\\img\\item\\Apple MagSafe Charger','R',50),(29,'Anker 7-in-1 USB-C H','El Anker 7-in-1 USB-C Hub es un concentrador de pu','..\\src\\img\\item\\Anker 7-in-1 USB-C Hub','C',35),(30,'Twelve South Mac Sce','La Twelve South Mac Scented Candle es una vela per','..\\src\\img\\item\\Twelve South Mac Scented Candle','C',35),(31,'Apple AirTag','El Apple AirTag es un pequeño dispositivo de segui','..\\src\\img\\item\\Apple AirTag','C',35),(32,'Apple EarPods with L','Los Apple EarPods with Lightning Connector son uno','..\\src\\img\\item\\Apple EarPods with Lightning Conne','C',25),(33,'Apple 20W USB-C Powe','El Apple 20W USB-C Power Adapter es un cargador de','..\\src\\img\\item\\Apple 20W USB-C Power Adapter','C',25),(34,'Apple USB-C to USB A','El Apple USB-C to USB Adapter es un adaptador que ','..\\src\\img\\item\\Apple USB-C to USB Adapter','C',20),(35,'Apple Dongle (Lightn','El Apple Dongle (Lightning to Jack) es un adaptado','..\\src\\img\\item\\Apple Dongle (Lightning to Jack)','C',10),(36,'Apple Pencil Replace','Los Apple Pencil Replacement Tips son puntas de re','..\\src\\img\\item\\Apple Pencil Replacement Tips','C',10),(37,'Portable Apple Watch','El Portable Apple Watch Charger es un cargador por','..\\src\\img\\item\\Portable Apple Watch Charger','MC',5),(38,'Leather AirtTag Case','El Leather AirTag Case Keychain es un estuche de c','..\\src\\img\\item\\Leather AirtTag Case Keychain','MC',3),(39,'Apple Retro Logo Sti','El Apple Retro Logo Sticker es una pegatina con el','..\\src\\img\\item\\Apple Retro Logo Sticker','MC',2),(40,'Apple Pencil Grip','El Apple Pencil Grip es un accesorio diseñado para','..\\src\\img\\item\\Apple Pencil Grip','MC',1),(41,'AirPods Case','El AirPods Case es un estuche diseñado específicam','..\\src\\img\\item\\AirPods Case','MC',1),(42,'iPhone 11 Silicone C','La iPhone 11 Silicone Case es una funda diseñada e','..\\src\\img\\item\\iPhone 11 Silicone Case','MC',1);
/*!40000 ALTER TABLE `Objeto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-14 13:34:30
