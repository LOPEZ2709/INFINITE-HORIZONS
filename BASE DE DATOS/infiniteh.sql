-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2024 a las 04:26:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infiniteh`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_usu` (IN `idusu` INT(10), IN `nombreusu` VARCHAR(50), IN `apellidousu` VARCHAR(50), IN `telefonousu` INT(10), IN `emailusu` VARCHAR(70), IN `fecharegi` DATE, IN `estadousu` VARCHAR(50), IN `generousu` VARCHAR(50), IN `localidadusu` VARCHAR(50), IN `fechausu` DATE, IN `idestado` INT(10), IN `idcalificacion` INT(10), IN `contrausu` VARCHAR(200), IN `documentousu` INT(15), IN `idseguridad` INT(10), IN `accion` CHAR(1))   BEGIN
    CASE accion
        WHEN 'i' THEN
            INSERT INTO usuario (nombre_usu, contra_usu, telefono_usu, email_usu, fecha_registro, estado, genero, localidad, fecha_nacimiento,contra_usu,documento, id_seguridad, id_estado)
            VALUES (nombreusu, apellidousu, telefonousu, emailusu, fecharegi, estadousu, generousu, localidadusu, fechausu, idestado, idcalificacion, contrausu, documentousu, idseguridad);
        WHEN 'a' THEN
           UPDATE usuario
SET nombre_usu = nombreusu,
    apellido_usu = apellidousu,
    telefono_usu = telefonousu,
    email_usu = emailusu,
    fecha_registro = fecharegi,
    estado = estadousu,
    genero = generousu,
    localidad = localidadusu,
    fecha_nacimiento = fechausu,
    contra_usu = contrausu,
    documento = documentousu,
    id_seguridad = idseguridad,
    id_estado = idestado
WHERE id_usuario = idusu;
        WHEN 'e' THEN
            DELETE FROM usuario
            WHERE id_usuario = idusu;
        ELSE
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Acción inválida, elija i (insertar), a (actualizar) o e (eliminar)';
    END CASE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `usu_admin` varchar(50) NOT NULL,
  `contra_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `usu_admin`, `contra_admin`) VALUES
(2, 'ADMINIFHT', '$2y$10$1gEGlpkT/saF7zqYadgrue0TXLnFo2Kx1o7w3kHXsa6oLyIW4Wuzi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

CREATE TABLE `anuncio` (
  `titulo_anun` int(10) NOT NULL,
  `img_anun` varchar(50) NOT NULL,
  `desc_anun` varchar(50) NOT NULL,
  `fecha_publi_anun` date NOT NULL,
  `estado_anun` float NOT NULL,
  `id_contacto` int(10) NOT NULL,
  `id_anuncio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `anuncio`
--

INSERT INTO `anuncio` (`titulo_anun`, `img_anun`, `desc_anun`, `fecha_publi_anun`, `estado_anun`, `id_contacto`, `id_anuncio`) VALUES
(12345, 'img_66fb175bd4495.jpg', '23456', '2024-09-18', 0, 1, 2),
(12345, 'img_66fb175bd4495.jpg', '23456', '2024-09-18', 0, 1, 3),
(12345, 'img_66fb175bd4495.jpg', '23456', '2024-09-18', 0, 1, 4),
(12345, 'img_66fb175bd4495.jpg', '23456', '2024-09-18', 0, 1, 5),
(0, 'img_66fb175cae0f9.jpg', 'logo', '2024-09-08', 0, 1, 6),
(0, 'img_66fb172f7c135.jpg', 'modelo', '2024-09-12', 0, 1, 7),
(0, 'img_66fb172f7c135.jpg', 'modelo', '2024-09-12', 0, 1, 8),
(0, 'img_66fb172f7c135.jpg', 'modelo', '2024-09-12', 0, 1, 9),
(0, 'img_66fb172fdab6e.jpg', 'locota', '2024-09-02', 0, 1, 10),
(0, 'img_66fb1295ae7c0.png', 'mi amor', '2024-09-18', 0, 1, 11),
(0, 'img_66fb1378cf5d0.jpg', '1', '2024-09-09', 0, 1, 12),
(21345678, 'img_66fb175c31029.jpg', '12345678u', '2024-09-01', 0, 1, 13),
(0, 'img_66fb175c31029.jpg', '12345', '2024-09-12', 0, 1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(11) NOT NULL,
  `puntuacion` int(50) NOT NULL,
  `id_sitio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(10) NOT NULL,
  `nombre_cate` varchar(50) NOT NULL,
  `desc_cate` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(10) NOT NULL,
  `nombre_con` varchar(50) NOT NULL,
  `apellido_con` varchar(50) NOT NULL,
  `telefono_con` int(10) NOT NULL,
  `correo_con` varchar(50) NOT NULL,
  `nombre_emp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `nombre_con`, `apellido_con`, `telefono_con`, `correo_con`, `nombre_emp`) VALUES
(1, 'sdfv', 'defrgt', 3456, 'defr', 'dfrgt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_empresa`
--

CREATE TABLE `datos_empresa` (
  `id_dat_emp` int(10) NOT NULL,
  `correo_emp` varchar(50) NOT NULL,
  `telefono_emp` int(30) NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `id_contacto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(10) NOT NULL,
  `nombre_emp` varchar(50) NOT NULL,
  `direccion_emp` varchar(50) NOT NULL,
  `categoria_servicio` varchar(50) NOT NULL,
  `metodo_pago` float NOT NULL,
  `id_categoria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `desc_estado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `desc_estado`) VALUES
(22, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itinerario`
--

CREATE TABLE `itinerario` (
  `id_itinerario` int(10) NOT NULL,
  `nombre_iti` varchar(50) NOT NULL,
  `fechas` date NOT NULL,
  `desc_iti` varchar(300) NOT NULL,
  `id_usu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(10) NOT NULL,
  `estado_res` varchar(1) NOT NULL,
  `fecha_res` date NOT NULL,
  `desc_res` varchar(300) NOT NULL,
  `metodo_pago` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE `seguridad` (
  `id_seguridad` int(11) NOT NULL,
  `email_usu` varchar(70) NOT NULL,
  `contra_usu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguridad`
--

INSERT INTO `seguridad` (`id_seguridad`, `email_usu`, `contra_usu`) VALUES
(18, 'diego.lopezm0405@gmail.com', '$2y$10$h2AtEU.pNEZ9uZfjM32z2OpLZghJj5e7LRkKxDiZLno8UzqSeapQ6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_turistico`
--

CREATE TABLE `sitio_turistico` (
  `id_sitio` int(10) NOT NULL,
  `nombre_sitio` varchar(50) NOT NULL,
  `img_sitio` varchar(50) NOT NULL,
  `ubicacion_sitio` varchar(50) NOT NULL,
  `desc_sitio` varchar(500) NOT NULL,
  `id_empresa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nombre_usu` varchar(50) NOT NULL,
  `apellido_usu` varchar(50) NOT NULL,
  `telefono_usu` int(10) NOT NULL,
  `email_usu` varchar(70) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_calificacion` int(10) NOT NULL,
  `contra_usu` varchar(200) NOT NULL,
  `documento` int(15) NOT NULL,
  `id_seguridad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usu`, `apellido_usu`, `telefono_usu`, `email_usu`, `fecha_registro`, `estado`, `genero`, `localidad`, `fecha_nacimiento`, `id_estado`, `id_calificacion`, `contra_usu`, `documento`, `id_seguridad`) VALUES
(19, 'diego', 'lopez', 2147483647, 'diego.lopezm0405@gmail.com', '2024-09-30', 'activo', 'masculino', 'Bogota', '2006-05-04', 22, 0, '$2y$10$h2AtEU.pNEZ9uZfjM32z2OpLZghJj5e7LRkKxDiZLno8UzqSeapQ6', 1021671180, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_itinerario`
--

CREATE TABLE `usuario_itinerario` (
  `id_usuario` int(10) NOT NULL,
  `id_itinerario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_reserva`
--

CREATE TABLE `usuario_reserva` (
  `id_usuario` int(10) NOT NULL,
  `id_reserva` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id_anuncio`),
  ADD KEY `id_contacto` (`id_contacto`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `id_sitio` (`id_sitio`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `datos_empresa`
--
ALTER TABLE `datos_empresa`
  ADD PRIMARY KEY (`id_dat_emp`),
  ADD UNIQUE KEY `id_empresa` (`id_empresa`,`id_contacto`),
  ADD KEY `id_empresa_2` (`id_empresa`,`id_contacto`),
  ADD KEY `id_contacto` (`id_contacto`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `itinerario`
--
ALTER TABLE `itinerario`
  ADD PRIMARY KEY (`id_itinerario`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  ADD PRIMARY KEY (`id_seguridad`);

--
-- Indices de la tabla `sitio_turistico`
--
ALTER TABLE `sitio_turistico`
  ADD PRIMARY KEY (`id_sitio`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_seguridad` (`id_estado`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_calificacion` (`id_calificacion`),
  ADD KEY `id_seguridad_2` (`id_seguridad`);

--
-- Indices de la tabla `usuario_itinerario`
--
ALTER TABLE `usuario_itinerario`
  ADD PRIMARY KEY (`id_usuario`,`id_itinerario`),
  ADD KEY `id_usuario` (`id_usuario`,`id_itinerario`),
  ADD KEY `id_usuario_2` (`id_usuario`,`id_itinerario`),
  ADD KEY `id_itinerario` (`id_itinerario`);

--
-- Indices de la tabla `usuario_reserva`
--
ALTER TABLE `usuario_reserva`
  ADD PRIMARY KEY (`id_usuario`,`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`,`id_reserva`),
  ADD KEY `id_reserva` (`id_reserva`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `id_anuncio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datos_empresa`
--
ALTER TABLE `datos_empresa`
  MODIFY `id_dat_emp` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `itinerario`
--
ALTER TABLE `itinerario`
  MODIFY `id_itinerario` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  MODIFY `id_seguridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `sitio_turistico`
--
ALTER TABLE `sitio_turistico`
  MODIFY `id_sitio` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `anuncio_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `contacto` (`id_contacto`);

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_sitio`) REFERENCES `sitio_turistico` (`id_sitio`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`id_calificacion`) REFERENCES `usuario` (`id_calificacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_empresa`
--
ALTER TABLE `datos_empresa`
  ADD CONSTRAINT `datos_empresa_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `contacto` (`id_contacto`),
  ADD CONSTRAINT `datos_empresa_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `sitio_turistico`
--
ALTER TABLE `sitio_turistico`
  ADD CONSTRAINT `sitio_turistico_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_seguridad`) REFERENCES `seguridad` (`id_seguridad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_itinerario`
--
ALTER TABLE `usuario_itinerario`
  ADD CONSTRAINT `usuario_itinerario_ibfk_1` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerario` (`id_itinerario`),
  ADD CONSTRAINT `usuario_itinerario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario_reserva`
--
ALTER TABLE `usuario_reserva`
  ADD CONSTRAINT `usuario_reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_reserva_ibfk_2` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
