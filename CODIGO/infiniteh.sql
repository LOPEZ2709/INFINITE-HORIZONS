-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2024 a las 01:48:08
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
  `contra_usu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `contra_usu` varchar(20) NOT NULL,
  `documento` int(15) NOT NULL,
  `id_seguridad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  MODIFY `id_seguridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
