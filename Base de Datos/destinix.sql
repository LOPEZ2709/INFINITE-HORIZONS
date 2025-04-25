-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2025 a las 02:35:29
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
-- Base de datos: `destinix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL,
  `desc_categoria` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `desc_categoria`) VALUES
(1, 'Hotel', 'Alojamiento en hoteles'),
(2, 'Restaurante', 'Servicios de comida y bebida'),
(3, 'Sitio turistico', 'variedad de sitios turiscticos especiales de bogota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `persona_id_persona` int(11) NOT NULL,
  `id_sitio` int(11) DEFAULT NULL,
  `id_hoteles` int(11) DEFAULT NULL,
  `id_restaurante` int(11) DEFAULT NULL,
  `contenido` text NOT NULL,
  `fecha_comentario` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_emp` varchar(50) NOT NULL,
  `direccion_emp` varchar(50) NOT NULL,
  `correo_empresa` varchar(45) NOT NULL,
  `telefono_empresa` int(11) NOT NULL,
  `persona_id_persona` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre_emp`, `direccion_emp`, `correo_empresa`, `telefono_empresa`, `persona_id_persona`, `id_categoria`) VALUES
(1, 'Hotel Destinix', 'Av. Principal 123', 'contacto@hoteldestinix.com', 123456789, 6, 1);

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
(2, 'inactivo2sadasdas'),
(4, 'no verificadoASDASDASDASDASDASD'),
(5, 'pendiente activación'),
(6, 'asdasdasd'),
(7, 'asdasdasda'),
(8, 'Alejandra'),
(9, 'melo'),
(10, 'Kris'),
(13, 'El Belloko  leooo lo ha logrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `id_hoteles` int(11) NOT NULL,
  `titulo_hotel` varchar(45) NOT NULL,
  `img` varchar(45) NOT NULL,
  `descripcion_hotel` varchar(400) NOT NULL,
  `estado_id_estado` int(11) NOT NULL,
  `empresa_id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`id_hoteles`, `titulo_hotel`, `img`, `descripcion_hotel`, `estado_id_estado`, `empresa_id_empresa`) VALUES
(1, 'Hotel Destinix', 'hotel.jpg', 'Un hotel de lujo con vista al mar.', 0, 1),
(2, 'DASDASD', '', 'DASAD', 2, 1),
(3, 'LEO', 'hotel2.jpg', 'SADASD', 2, 1),
(4, 'asdasdasd', '33860894418_cbc353dd66_b.jpg', 'asdasd', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itinerario`
--

CREATE TABLE `itinerario` (
  `id_itinerario` int(11) NOT NULL,
  `persona_id_persona` int(11) NOT NULL,
  `id_sitio` int(11) DEFAULT NULL,
  `id_hoteles` int(11) DEFAULT NULL,
  `id_restaurante` int(11) DEFAULT NULL,
  `fecha_itinerario` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `estado_id_estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `itinerario`
--

INSERT INTO `itinerario` (`id_itinerario`, `persona_id_persona`, `id_sitio`, `id_hoteles`, `id_restaurante`, `fecha_itinerario`, `hora_inicio`, `hora_fin`, `descripcion`, `estado_id_estado`) VALUES
(9, 6, NULL, 1, NULL, '2025-02-05', '07:41:00', '19:36:00', 'diego', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre_usu` varchar(50) NOT NULL,
  `apellido_usu` varchar(50) NOT NULL,
  `tipo_documento` varchar(45) NOT NULL,
  `documento` int(11) NOT NULL,
  `email_usu` varchar(70) NOT NULL,
  `telefono_usu` varchar(11) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `id_estado` int(11) NOT NULL DEFAULT 4,
  `token` varchar(100) DEFAULT NULL,
  `id_seguridad` int(11) NOT NULL,
  `rol_idRol` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre_usu`, `apellido_usu`, `tipo_documento`, `documento`, `email_usu`, `telefono_usu`, `genero`, `localidad`, `fecha_nacimiento`, `contraseña`, `id_estado`, `token`, `id_seguridad`, `rol_idRol`, `img`) VALUES
(1, 'leonardo', 'Beltran', 'cc', 1011221332, 'leonardo06@gmail.com', '3123123123', 'hombre', 'san cristobal', '2004-04-06', '11111', 0, '123', 11, 2, ''),
(6, 'diego', 'lopez', 'CC', 1021671180, 'diego.lopezm0405@gmail.com', '3155056916', 'masculino', 'San Cristobal', '1996-11-13', '$2y$10$VAaGwtBxHhk1qQOVsLl6he4yW7IU3h53Yd0CnrHx.kHsorRPSzHFy', 0, NULL, 11, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `fecha_reserva` datetime NOT NULL,
  `fecha_visita` date NOT NULL,
  `cantidad_personas` int(11) NOT NULL,
  `restaurante_id` int(11) DEFAULT NULL,
  `sitio_id` int(11) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `estado_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id_restaurante` int(11) NOT NULL,
  `titulo_restaurante` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `desc_restaurantes` varchar(400) NOT NULL,
  `estado_id_estado` int(11) NOT NULL,
  `empresa_id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id_restaurante`, `titulo_restaurante`, `img`, `desc_restaurantes`, `estado_id_estado`, `empresa_id_empresa`) VALUES
(1, 'La Parrilla del Sol', 'logo.jpg', 'Especialistas en carnes a la brasa con un ambiente', 2, 1),
(2, 'Mariscos El Puerto', 'logo1-jpg', 'Deléitate con los mejores mariscos frescos frente ', 2, 1),
(3, 'Pizzería Napoli', 'comida.jpg', 'Auténtica pizza italiana horneada en horno de leña', 2, 1),
(4, 'Café Luna', 'comida.jpg', 'Cafetería con gran variedad de cafés y postres cas', 2, 1),
(5, 'Sushi House', 'comida.jpg', 'Experiencia japonesa con sushi fresco y ramen arte', 2, 1),
(6, 'El Rincón Mexicano', 'comida.jpg', 'Tacos, enchiladas y margaritas en un ambiente trad', 2, 1),
(7, 'Burgers & Beer', 'comida.jpg', 'Hamburguesas artesanales acompañadas de una selecc', 2, 1),
(8, 'Veggie Delight', 'veggie_delight.jpg', 'Opción vegetariana y vegana con ingredientes orgán', 2, 1),
(9, 'Asador Don Pepe', 'comida.jpg', 'Carnes premium y vinos selectos en un ambiente ele', 2, 1),
(10, 'Pasta e Vino', 'comida.jpg', 'Pastas y vinos italianos con recetas tradicionales', 2, 1),
(11, 'Churrasquería Gaúcha', 'comida.jpg', 'Rodizio brasileño con cortes de carne al estilo tr', 2, 1),
(12, 'Cevichería del Pacífico', 'comida.jpg', 'Ceviches frescos con el auténtico sabor de la cost', 2, 1),
(13, 'La Brasserie', 'comida.jpg', 'Restaurante francés con un toque moderno y sofisti', 2, 1),
(14, 'Tapas & Vinos', 'tapas_vinos.jpg', 'Auténticas tapas españolas y vinos importados.', 2, 1),
(15, 'El Fogón Criollo', 'fogon_criollo.jpg', 'Comida típica con sabores auténticos y tradicional', 2, 1),
(21, 'Bistro París', 'bistro_paris.jpg', 'Cocina francesa con un toque moderno y elegante.', 2, 1),
(22, 'La Cava del Vino', 'cava_vino.jpg', 'Selección exclusiva de vinos y tapas gourmet.', 2, 1),
(23, 'Asador Don Pedro', 'asador_don_pedro.jpg', 'Las mejores carnes maduradas y a la parrilla.', 2, 1),
(24, 'Green Vegan', 'green_vegan.jpg', 'Opciones 100% veganas y saludables para todos.', 2, 1),
(25, 'Fusión Asiática', 'fusion_asiatica.jpg', 'Comida asiática con fusiones innovadoras y exquisi', 2, 1),
(26, 'ASDASDAS', 'LOGODES.png', 'ASDASD', 2, 1),
(27, 'asdasdasd', 'icono1.png', 'asdasdas', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `Tipo_Rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `Tipo_Rol`) VALUES
(1, 'cliente'),
(2, 'administrador'),
(3, 'anunciante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE `seguridad` (
  `id_seguridad` int(11) NOT NULL,
  `email_usu` varchar(70) NOT NULL,
  `contra_usu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguridad`
--

INSERT INTO `seguridad` (`id_seguridad`, `email_usu`, `contra_usu`) VALUES
(11, 'diego.lopezm0405@gmail.com', '$2y$10$VAaGwtBxHhk1qQOVsLl6he4yW7IU3h53Yd0CnrHx.kHsorRPSzHFy');

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
  `persona_id_persona` int(10) NOT NULL,
  `estado_id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sitio_turistico`
--

INSERT INTO `sitio_turistico` (`id_sitio`, `nombre_sitio`, `img_sitio`, `ubicacion_sitio`, `desc_sitio`, `persona_id_persona`, `estado_id_estado`) VALUES
(13, 'leonardo BELTRAN', 'icono1.png', 'leo', 'alto', 1, 2),
(14, 'asdasdasd', 'hotel.jpg', 'asdasd', 'asdasd', 1, 2),
(15, 'asaaaaaaaaaaaaaaaaa', '', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 1, 2),
(16, 'asdasdas', 'icono1.png', 'asdasd', 'asdasd', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_calificacion`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `persona_id_persona` (`persona_id_persona`),
  ADD KEY `id_sitio` (`id_sitio`),
  ADD KEY `id_hoteles` (`id_hoteles`),
  ADD KEY `id_restaurante` (`id_restaurante`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `fk_empresa_categoria_idx` (`id_categoria`),
  ADD KEY `fk_empresa_persona_idx` (`persona_id_persona`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id_hoteles`),
  ADD KEY `fk_hoteles_estado_idx` (`estado_id_estado`),
  ADD KEY `fk_hoteles_empresa_idx` (`empresa_id_empresa`);

--
-- Indices de la tabla `itinerario`
--
ALTER TABLE `itinerario`
  ADD PRIMARY KEY (`id_itinerario`),
  ADD KEY `persona_id_persona` (`persona_id_persona`),
  ADD KEY `id_sitio` (`id_sitio`),
  ADD KEY `id_hoteles` (`id_hoteles`),
  ADD KEY `id_restaurante` (`id_restaurante`),
  ADD KEY `estado_id_estado` (`estado_id_estado`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `fk_persona_estado_idx` (`id_estado`),
  ADD KEY `fk_persona_seguridad_idx` (`id_seguridad`),
  ADD KEY `fk_persona_rol_idx` (`rol_idRol`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_reserva_restaurante` (`restaurante_id`),
  ADD KEY `fk_reserva_sitio` (`sitio_id`),
  ADD KEY `fk_reserva_hotel` (`hotel_id`),
  ADD KEY `fk_reserva_estado` (`estado_id`),
  ADD KEY `fk_reserva_empresa` (`empresa_id`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id_restaurante`),
  ADD KEY `fk_restaurantes_estado_idx` (`estado_id_estado`),
  ADD KEY `fk_restaurantes_empresa_idx` (`empresa_id_empresa`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

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
  ADD KEY `fk_sitio_turistico_persona1_idx` (`persona_id_persona`),
  ADD KEY `fk_sitio_turistico_estado1_idx` (`estado_id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  MODIFY `id_hoteles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `itinerario`
--
ALTER TABLE `itinerario`
  MODIFY `id_itinerario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id_restaurante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  MODIFY `id_seguridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sitio_turistico`
--
ALTER TABLE `sitio_turistico`
  MODIFY `id_sitio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_sitio`) REFERENCES `sitio_turistico` (`id_sitio`) ON DELETE SET NULL,
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`id_hoteles`) REFERENCES `hoteles` (`id_hoteles`) ON DELETE SET NULL,
  ADD CONSTRAINT `comentarios_ibfk_4` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id_restaurante`) ON DELETE SET NULL;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_empresa_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_empresa_persona` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD CONSTRAINT `fk_hoteles_empresa` FOREIGN KEY (`empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `fk_hoteles_estado` FOREIGN KEY (`estado_id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `itinerario`
--
ALTER TABLE `itinerario`
  ADD CONSTRAINT `itinerario_ibfk_1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE,
  ADD CONSTRAINT `itinerario_ibfk_3` FOREIGN KEY (`id_sitio`) REFERENCES `sitio_turistico` (`id_sitio`) ON DELETE SET NULL,
  ADD CONSTRAINT `itinerario_ibfk_4` FOREIGN KEY (`id_hoteles`) REFERENCES `hoteles` (`id_hoteles`) ON DELETE SET NULL,
  ADD CONSTRAINT `itinerario_ibfk_5` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id_restaurante`) ON DELETE SET NULL,
  ADD CONSTRAINT `itinerario_ibfk_6` FOREIGN KEY (`estado_id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_rol` FOREIGN KEY (`rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_seguridad` FOREIGN KEY (`id_seguridad`) REFERENCES `seguridad` (`id_seguridad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `fk_reserva_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fk_reserva_hotel` FOREIGN KEY (`hotel_id`) REFERENCES `hoteles` (`id_hoteles`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_reserva_restaurante` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id_restaurante`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_reserva_sitio` FOREIGN KEY (`sitio_id`) REFERENCES `sitio_turistico` (`id_sitio`) ON DELETE SET NULL;

--
-- Filtros para la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD CONSTRAINT `fk_restaurantes_empresa` FOREIGN KEY (`empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `fk_restaurantes_estado` FOREIGN KEY (`estado_id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `sitio_turistico`
--
ALTER TABLE `sitio_turistico`
  ADD CONSTRAINT `fk_sitio_turistico_estado1` FOREIGN KEY (`estado_id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sitio_turistico_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
