CREATE DATABASE  IF NOT EXISTS `rrhh` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `rrhh`;
-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: rrhh
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas` (
  `idareas` int NOT NULL COMMENT 'Identificador de Area',
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre del area de la empresa',
  PRIMARY KEY (`idareas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado_rol`
--

DROP TABLE IF EXISTS `empleado_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleado_rol` (
  `empleado_id` int NOT NULL COMMENT 'Identificador del empleado',
  `rol_id` int NOT NULL COMMENT 'Identificador de rol',
  PRIMARY KEY (`empleado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado_rol`
--

LOCK TABLES `empleado_rol` WRITE;
/*!40000 ALTER TABLE `empleado_rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleados` (
  `id` int NOT NULL COMMENT 'Identificador del empleado',
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre completo del Empleado, Campo tipo Text. solo debe permitir letras con o sin tilde y espacios. No se admiten Caracteres especiales ni numeros. Obligatorio',
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Correo electronico del empleado. Campo de tipo Text|Email. solo permite una estructura de correo. Obligatorio',
  `sexo` char(1) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Campo de tipo Radio Button. m para Masculino. F para Femenino. Obligatorio',
  `area_id` int NOT NULL COMMENT 'Area de la empresa a la que pertenece el empleado. Campo select. Obligatorio',
  `boletin` int NOT NULL COMMENT '1 para Recibir boletin, 0 para no recibir boletin Campo de tipo Checkbok. Opcional',
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Se describe la experiencia del empleado. Campo de Tipo textarea. Obligatorio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Pedro Naveda','naveda.pedro@gmail.com','M',2,1,'Muy Buena');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL COMMENT 'Identificador del rol',
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre del rol',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-31  1:08:20
