-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: destinix
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calificacion` (
  `id_calificacion` varchar(45) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  PRIMARY KEY (`id_calificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion`
--

LOCK TABLES `calificacion` WRITE;
/*!40000 ALTER TABLE `calificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `calificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cate` varchar(50) NOT NULL,
  `desc_cate` varchar(120) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_emp` varchar(50) NOT NULL,
  `direccion_emp` varchar(50) NOT NULL,
  `correo_empresa` varchar(45) NOT NULL,
  `telefono_empresa` int(11) NOT NULL,
  `persona_id_persona` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_empresa`),
  KEY `fk_empresa_categoria_idx` (`id_categoria`),
  KEY `fk_empresa_persona_idx` (`persona_id_persona`),
  CONSTRAINT `fk_empresa_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `fk_empresa_persona` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `desc_estado` varchar(40) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoteles`
--

DROP TABLE IF EXISTS `hoteles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoteles` (
  `id_hoteles` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_hotel` varchar(45) NOT NULL,
  `img` varchar(45) NOT NULL,
  `descripcion_hotel` varchar(400) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `calificacion_id_calificacion` varchar(45) NOT NULL,
  `estado_id_estado` int(11) NOT NULL,
  `empresa_id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_hoteles`),
  KEY `fk_hoteles_calificacion_idx` (`calificacion_id_calificacion`),
  KEY `fk_hoteles_estado_idx` (`estado_id_estado`),
  KEY `fk_hoteles_empresa_idx` (`empresa_id_empresa`),
  CONSTRAINT `fk_hoteles_calificacion` FOREIGN KEY (`calificacion_id_calificacion`) REFERENCES `calificacion` (`id_calificacion`),
  CONSTRAINT `fk_hoteles_empresa` FOREIGN KEY (`empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`),
  CONSTRAINT `fk_hoteles_estado` FOREIGN KEY (`estado_id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoteles`
--

LOCK TABLES `hoteles` WRITE;
/*!40000 ALTER TABLE `hoteles` DISABLE KEYS */;
/*!40000 ALTER TABLE `hoteles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usu` varchar(50) NOT NULL,
  `apellido_usu` varchar(50) NOT NULL,
  `tipo_documento` varchar(45) NOT NULL,
  `documento` int(11) NOT NULL,
  `email_usu` varchar(70) NOT NULL,
  `telefono_usu` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_seguridad` int(11) NOT NULL,
  `rol_idRol` int(11) NOT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `fk_persona_estado_idx` (`id_estado`),
  KEY `fk_persona_seguridad_idx` (`id_seguridad`),
  KEY `fk_persona_rol_idx` (`rol_idRol`),
  CONSTRAINT `fk_persona_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_persona_rol` FOREIGN KEY (`rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_seguridad` FOREIGN KEY (`id_seguridad`) REFERENCES `seguridad` (`id_seguridad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_reserva`
--

DROP TABLE IF EXISTS `persona_reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona_reserva` (
  `id_reserva` int(11) NOT NULL,
  `persona_id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`,`persona_id_persona`),
  KEY `fk_persona_reserva_persona` (`persona_id_persona`),
  CONSTRAINT `fk_persona_reserva_persona` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`),
  CONSTRAINT `fk_persona_reserva_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_reserva`
--

LOCK TABLES `persona_reserva` WRITE;
/*!40000 ALTER TABLE `persona_reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona_reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `estado_res` varchar(1) NOT NULL,
  `fecha_res` date NOT NULL,
  `desc_res` varchar(300) NOT NULL,
  `metodo_pago` float NOT NULL,
  PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurantes`
--

DROP TABLE IF EXISTS `restaurantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurantes` (
  `id_restaurante` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_restaurante` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `desc_restaurantes` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado_id_estado` int(11) NOT NULL,
  `empresa_id_empresa` int(11) NOT NULL,
  `calificacion_id_calificacion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_restaurante`),
  KEY `fk_restaurantes_estado_idx` (`estado_id_estado`),
  KEY `fk_restaurantes_empresa_idx` (`empresa_id_empresa`),
  KEY `fk_restaurantes_calificacion_idx` (`calificacion_id_calificacion`),
  CONSTRAINT `fk_restaurantes_calificacion` FOREIGN KEY (`calificacion_id_calificacion`) REFERENCES `calificacion` (`id_calificacion`),
  CONSTRAINT `fk_restaurantes_empresa` FOREIGN KEY (`empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`),
  CONSTRAINT `fk_restaurantes_estado` FOREIGN KEY (`estado_id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurantes`
--

LOCK TABLES `restaurantes` WRITE;
/*!40000 ALTER TABLE `restaurantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_Rol` varchar(45) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguridad`
--

DROP TABLE IF EXISTS `seguridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seguridad` (
  `id_seguridad` int(11) NOT NULL AUTO_INCREMENT,
  `email_usu` varchar(70) NOT NULL,
  `contra_usu` varchar(20) NOT NULL,
  PRIMARY KEY (`id_seguridad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguridad`
--

LOCK TABLES `seguridad` WRITE;
/*!40000 ALTER TABLE `seguridad` DISABLE KEYS */;
/*!40000 ALTER TABLE `seguridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sitio_turistico`
--

DROP TABLE IF EXISTS `sitio_turistico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sitio_turistico` (
  `id_sitio` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_sitio` varchar(50) NOT NULL,
  `img_sitio` varchar(50) NOT NULL,
  `ubicacion_sitio` varchar(50) NOT NULL,
  `desc_sitio` varchar(500) NOT NULL,
  `persona_id_persona` int(10) NOT NULL,
  `estado_id_estado` int(11) NOT NULL,
  `calificacion_id_calificacion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_sitio`),
  KEY `fk_sitio_turistico_persona1_idx` (`persona_id_persona`),
  KEY `fk_sitio_turistico_estado1_idx` (`estado_id_estado`),
  KEY `fk_sitio_turistico_calificacion1_idx` (`calificacion_id_calificacion`),
  CONSTRAINT `fk_sitio_turistico_calificacion1` FOREIGN KEY (`calificacion_id_calificacion`) REFERENCES `calificacion` (`id_calificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sitio_turistico_estado1` FOREIGN KEY (`estado_id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sitio_turistico_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sitio_turistico`
--

LOCK TABLES `sitio_turistico` WRITE;
/*!40000 ALTER TABLE `sitio_turistico` DISABLE KEYS */;
/*!40000 ALTER TABLE `sitio_turistico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-05 18:47:02
