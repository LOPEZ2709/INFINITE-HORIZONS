-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2024 a las 03:27:40
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

--
-- Volcado de datos para la tabla `anuncio`
--

INSERT INTO `anuncio` (`titulo_anun`, `img_anun`, `desc_anun`, `fecha_publi_anun`, `estado_anun`, `id_contacto`, `id_anuncio`) VALUES
(0, 'img1.jpg', 'Casa con 3 habitaciones y 2 baños en el centro de ', '2024-01-01', 0, 1, 1),
(0, 'img2.jpg', 'Apartamento de 2 habitaciones cerca de la Sagrada ', '2024-01-02', 0, 2, 2),
(0, 'img3.jpg', 'Terreno de 500m2 en zona residencial.', '2024-01-03', 0, 3, 3),
(0, 'img4.jpg', 'Bar restaurante en el centro histórico de Sevilla.', '2024-01-04', 0, 4, 4),
(0, 'img5.jpg', 'Oficina de 100m2 en el centro de Bilbao.', '2024-01-05', 0, 5, 5),
(0, 'img6.jpg', 'Coche en buen estado, año 2015.', '2024-01-06', 0, 6, 6),
(0, 'img7.jpg', 'Habitación para estudiante, cerca de la universida', '2024-01-07', 0, 7, 7),
(0, 'img8.jpg', 'Moto en perfecto estado, poco uso.', '2024-01-08', 0, 8, 8),
(0, 'img9.jpg', 'Tienda de ropa con clientela fija.', '2024-01-09', 0, 9, 9),
(0, 'img10.jpg', 'Local comercial en zona de alto tráfico.', '2024-01-10', 0, 10, 10),
(0, 'img11.jpg', 'Casa de 4 habitaciones con jardín.', '2024-01-11', 0, 11, 11),
(0, 'img12.jpg', 'Apartamento con vista al mar.', '2024-01-12', 0, 12, 12),
(0, 'img13.jpg', 'Terreno de 1000m2 en zona urbana.', '2024-01-13', 0, 13, 13),
(0, 'img14.jpg', 'Cafetería con 10 años de antigüedad.', '2024-01-14', 0, 14, 14),
(0, 'img15.jpg', 'Oficina en el centro financiero.', '2024-01-15', 0, 15, 15),
(0, 'img16.jpg', 'Coche deportivo, año 2020, poco uso.', '2024-01-16', 0, 16, 16),
(0, 'img17.jpg', 'Habitación para estudiantes, cerca del centro.', '2024-01-17', 0, 17, 17),
(0, 'img18.jpg', 'Moto en buen estado, revisiones al día.', '2024-01-18', 0, 18, 18),
(0, 'img19.jpg', 'Tienda de comestibles con clientela.', '2024-01-19', 0, 19, 19),
(0, 'img20.jpg', 'Local en zona comercial, alto tránsito.', '2024-01-20', 0, 20, 20),
(0, 'img21.jpg', 'Casa moderna con piscina y jardín.', '2024-01-21', 0, 21, 21),
(0, 'img22.jpg', 'Apartamento céntrico, bien comunicado.', '2024-01-22', 0, 22, 22),
(0, 'img23.jpg', 'Terreno edificable en zona residencial.', '2024-01-23', 0, 23, 23),
(0, 'img24.jpg', 'Restaurante con 5 años de operación.', '2024-01-24', 0, 24, 24),
(0, 'img25.jpg', 'Oficina de 200m2 en edificio moderno.', '2024-01-25', 0, 25, 25),
(0, 'img26.jpg', 'Coche clásico restaurado, año 1965.', '2024-01-26', 0, 26, 26),
(0, 'img27.jpg', 'Habitación en piso compartido, zona centro.', '2024-01-27', 0, 27, 27),
(0, 'img28.jpg', 'Moto nueva, menos de 1000 km.', '2024-01-28', 0, 28, 28),
(0, 'img29.jpg', 'Tienda de electrónica con buena ubicación.', '2024-01-29', 0, 29, 29),
(0, 'img30.jpg', 'Local en zona turística, alto tránsito.', '2024-01-30', 0, 30, 30),
(0, 'img31.jpg', 'Casa antigua reformada con patio.', '2024-01-31', 0, 31, 31),
(0, 'img32.jpg', 'Apartamento de lujo en el centro.', '2024-02-01', 0, 32, 32),
(0, 'img33.jpg', 'Terreno para construir, excelente ubicación.', '2024-02-02', 0, 33, 33),
(0, 'img34.jpg', 'Gimnasio equipado, con clientela.', '2024-02-03', 0, 34, 34),
(0, 'img35.jpg', 'Oficina con vistas al parque.', '2024-02-04', 0, 35, 35),
(0, 'img36.jpg', 'Coche familiar, amplio maletero, año 2018.', '2024-02-05', 0, 36, 36),
(0, 'img37.jpg', 'Habitación amueblada, cerca del metro.', '2024-02-06', 0, 37, 37),
(0, 'img38.jpg', 'Moto deportiva, año 2021, pocas millas.', '2024-02-07', 0, 38, 38),
(0, 'img39.jpg', 'Tienda de decoración en zona céntrica.', '2024-02-08', 0, 39, 39),
(0, 'img40.jpg', 'Local amplio, ideal para tienda de ropa.', '2024-02-09', 0, 40, 40),
(0, 'img41.jpg', 'Casa con jardín y piscina en zona residencial.', '2024-02-10', 0, 41, 41),
(0, 'img42.jpg', 'Apartamento moderno en edificio nuevo.', '2024-02-11', 0, 42, 42),
(0, 'img43.jpg', 'Terreno urbano, cerca de servicios.', '2024-02-12', 0, 43, 43),
(0, 'img44.jpg', 'Panadería con clientela fija, excelente ubicación.', '2024-02-13', 0, 44, 44),
(0, 'img45.jpg', 'Oficina moderna en el centro de la ciudad.', '2024-02-14', 0, 45, 45),
(0, 'img46.jpg', 'SUV, año 2019, en perfecto estado.', '2024-02-15', 0, 46, 46),
(0, 'img47.jpg', 'Habitación con baño privado, zona céntrica.', '2024-02-16', 0, 47, 47),
(0, 'img48.jpg', 'Moto de baja cilindrada, ideal para ciudad.', '2024-02-17', 0, 48, 48),
(0, 'img49.jpg', 'Tienda de regalos en zona turística.', '2024-02-18', 0, 49, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(10) NOT NULL,
  `puntuacion` int(50) NOT NULL,
  `id_sitio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id_calificacion`, `puntuacion`, `id_sitio`) VALUES
(1, 5, 1),
(2, 4, 2),
(3, 4, 3),
(4, 5, 4),
(5, 5, 5),
(6, 4, 6),
(7, 5, 7),
(8, 4, 8),
(9, 4, 9),
(10, 5, 10),
(11, 4, 11),
(12, 5, 12),
(13, 4, 13),
(14, 4, 14),
(15, 5, 15),
(16, 4, 16),
(17, 4, 17),
(18, 5, 18),
(19, 4, 19),
(20, 4, 20),
(21, 5, 21),
(22, 5, 22),
(23, 5, 23),
(24, 4, 24),
(25, 4, 25),
(26, 5, 26),
(27, 4, 27),
(28, 4, 28),
(29, 5, 29),
(30, 5, 30),
(31, 5, 31),
(32, 4, 32),
(33, 5, 33),
(34, 4, 34),
(35, 5, 35),
(36, 5, 36),
(37, 4, 37),
(38, 4, 38),
(39, 5, 39),
(40, 4, 40),
(41, 5, 41),
(42, 5, 42),
(43, 5, 43),
(44, 4, 44),
(45, 5, 45),
(46, 4, 46),
(47, 4, 47),
(48, 4, 48),
(49, 4, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(10) NOT NULL,
  `nombre_cate` varchar(50) NOT NULL,
  `desc_cate` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_cate`, `desc_cate`) VALUES
(1, 'Hoteles', 'Establecimientos que ofrecen alojamiento y servicios adicionales a los huéspedes.'),
(2, 'Restaurantes', 'Lugares donde se sirven comidas y bebidas a los clientes.'),
(3, 'Parques temáticos', 'Espacios recreativos con diversas atracciones y entretenimiento.'),
(4, 'Museos', 'Instituciones dedicadas a la conservación y exposición de objetos de interés cultural, histórico o científico.'),
(5, 'Playas', 'Zonas de la costa con arena o piedras, donde la gente puede disfrutar del mar.'),
(6, 'Montañas', 'Grandes elevaciones naturales del terreno, ideales para actividades al aire libre.'),
(7, 'Zoológicos', 'Parques que exhiben animales vivos para la educación y entretenimiento del público.'),
(8, 'Acuarios', 'Instalaciones que albergan y exhiben organismos acuáticos.'),
(9, 'Teatros', 'Edificios o espacios dedicados a la presentación de obras escénicas.'),
(10, 'Centros comerciales', 'Grandes complejos que albergan tiendas, restaurantes y otras facilidades de entretenimiento.'),
(11, 'Spa y bienestar', 'Establecimientos que ofrecen tratamientos de relajación y cuidado personal.'),
(12, 'Parques naturales', 'Áreas protegidas que conservan la biodiversidad y permiten el contacto con la naturaleza.'),
(13, 'Monumentos históricos', 'Estructuras o lugares de importancia histórica.'),
(14, 'Casinos', 'Establecimientos donde se realizan juegos de azar.'),
(15, 'Bares y discotecas', 'Lugares donde se sirven bebidas alcohólicas y se ofrece entretenimiento nocturno.'),
(16, 'Cines', 'Salas dedicadas a la proyección de películas.'),
(17, 'Eventos deportivos', 'Actividades y competiciones relacionadas con diferentes deportes.'),
(18, 'Ferias y festivales', 'Eventos públicos donde se realizan diversas actividades de entretenimiento.'),
(19, 'Excursiones y tours', 'Actividades organizadas para explorar y conocer lugares turísticos.'),
(20, 'Parques acuáticos', 'Instalaciones con diversas atracciones y actividades relacionadas con el agua.'),
(21, 'Centros de convenciones', 'Instalaciones destinadas a la realización de eventos y reuniones empresariales.'),
(22, 'Campos de golf', 'Espacios diseñados para la práctica del golf.'),
(23, 'Atracciones culturales', 'Lugares o eventos que ofrecen una experiencia cultural.'),
(24, 'Miradores', 'Puntos elevados desde donde se pueden apreciar vistas panorámicas.'),
(25, 'Senderismo', 'Rutas y caminos para realizar caminatas al aire libre.'),
(26, 'Deportes acuáticos', 'Actividades deportivas que se realizan en el agua.'),
(27, 'Centros de esquí', 'Establecimientos que ofrecen instalaciones y servicios para la práctica del esquí.'),
(28, 'Mercados y bazares', 'Lugares donde se venden una variedad de productos, a menudo al aire libre.'),
(29, 'Actividades infantiles', 'Lugares y eventos diseñados especialmente para niños.'),
(30, 'Vinos y bodegas', 'Lugares donde se producen y se pueden degustar vinos.'),
(31, 'Excursiones de aventura', 'Actividades al aire libre que implican un desafío o una experiencia intensa.'),
(32, 'Alojamientos rurales', 'Establecimientos de hospedaje situados en zonas rurales.'),
(33, 'Jardines botánicos', 'Espacios dedicados a la conservación y exhibición de diversas especies de plantas.'),
(34, 'Planetarios', 'Instalaciones dedicadas a la divulgación de la astronomía.'),
(35, 'Tours gastronómicos', 'Recorridos organizados para degustar y conocer la gastronomía local.'),
(36, 'Balnearios', 'Establecimientos donde se ofrecen baños termales y otros tratamientos de salud y bienestar.'),
(37, 'Galerías de arte', 'Espacios que exhiben obras de arte para su contemplación y venta.'),
(38, 'Rutas enológicas', 'Itinerarios para conocer y degustar vinos de diferentes bodegas.'),
(39, 'Estaciones de trenes turísticos', 'Puntos de partida de trenes diseñados para el turismo.'),
(40, 'Parques urbanos', 'Áreas verdes dentro de ciudades, destinadas al esparcimiento y recreación.'),
(41, 'Cámaras oscuras', 'Dispositivos ópticos que proyectan una imagen invertida del entorno exterior.'),
(42, 'Paseos en globo', 'Actividades que consisten en vuelos en globo aerostático.'),
(43, 'Paseos a caballo', 'Actividades de montar a caballo por rutas naturales.'),
(44, 'Rutas ciclistas', 'Itinerarios especialmente diseñados para recorrer en bicicleta.'),
(45, 'Aventuras en jeep', 'Recorridos en vehículos todoterreno por rutas aventureras.'),
(46, 'Observación de aves', 'Actividades dedicadas a la identificación y estudio de aves en su hábitat natural.'),
(47, 'Viajes en barco', 'Excursiones en diferentes tipos de embarcaciones.'),
(48, 'Cuevas y cavernas', 'Formaciones subterráneas naturales que se pueden explorar.'),
(49, 'Villas y mansiones históricas', 'Residencias de importancia histórica que se pueden visitar.');

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
(1, 'Juan', 'García', 600123456, 'juan.garcia@empresa.com', 'Viajes García'),
(2, 'María', 'López', 600234567, 'maria.lopez@viajesmaria.com', 'Viajes María'),
(3, 'Carlos', 'Martínez', 600345678, 'carlos.martinez@turismocarlos.com', 'Turismo Carlos'),
(4, 'Ana', 'González', 600456789, 'ana.gonzalez@anatravel.com', 'Ana Travel'),
(5, 'Pedro', 'Rodríguez', 600567890, 'pedro.rodriguez@pedroviajes.com', 'Pedro Viajes'),
(6, 'Laura', 'Fernández', 600678901, 'laura.fernandez@viajesfernandez.com', 'Viajes Fernández'),
(7, 'David', 'Sánchez', 600789012, 'david.sanchez@davidturismo.com', 'David Turismo'),
(8, 'Lucía', 'Pérez', 600890123, 'lucia.perez@luciahoteles.com', 'Lucía Hoteles'),
(9, 'Miguel', 'Hernández', 600901234, 'miguel.hernandez@migueltours.com', 'Miguel Tours'),
(10, 'Sara', 'Ramírez', 601012345, 'sara.ramirez@saraviajes.com', 'Sara Viajes'),
(11, 'Jorge', 'Torres', 601123456, 'jorge.torres@jorgetours.com', 'Jorge Tours'),
(12, 'Elena', 'Díaz', 601234567, 'elena.diaz@elenatravel.com', 'Elena Travel'),
(13, 'Luis', 'Ruiz', 601345678, 'luis.ruiz@luisviajes.com', 'Luis Viajes'),
(14, 'Carmen', 'Morales', 601456789, 'carmen.morales@carmenhoteles.com', 'Carmen Hoteles'),
(15, 'Francisco', 'Ortega', 601567890, 'francisco.ortega@franciscotours.com', 'Francisco Tours'),
(16, 'Patricia', 'Delgado', 601678901, 'patricia.delgado@patriciaviajes.com', 'Patricia Viajes'),
(17, 'Jesús', 'Castillo', 601789012, 'jesus.castillo@jesusturismo.com', 'Jesús Turismo'),
(18, 'Marta', 'Giménez', 601890123, 'marta.gimenez@martaviajes.com', 'Marta Viajes'),
(19, 'Roberto', 'Ramos', 601901234, 'roberto.ramos@robertotours.com', 'Roberto Tours'),
(20, 'Ángela', 'Romero', 602012345, 'angela.romero@angelaturismo.com', 'Ángela Turismo'),
(21, 'Sergio', 'Gil', 602123456, 'sergio.gil@sergioviajes.com', 'Sergio Viajes'),
(22, 'Eva', 'Molina', 602234567, 'eva.molina@evaviajes.com', 'Eva Viajes'),
(23, 'Raúl', 'Navarro', 602345678, 'raul.navarro@raultours.com', 'Raúl Tours'),
(24, 'Cristina', 'Domínguez', 602456789, 'cristina.dominguez@cristinahoteles.com', 'Cristina Hoteles'),
(25, 'Fernando', 'Vázquez', 602567890, 'fernando.vazquez@fernandoturismo.com', 'Fernando Turismo'),
(26, 'Beatriz', 'Rivas', 602678901, 'beatriz.rivas@beatrizviajes.com', 'Beatriz Viajes'),
(27, 'Antonio', 'Suárez', 602789012, 'antonio.suarez@antoniosviajes.com', 'Antonio Viajes'),
(28, 'Isabel', 'Pascual', 602890123, 'isabel.pascual@isabelturismo.com', 'Isabel Turismo'),
(29, 'Manuel', 'Crespo', 602901234, 'manuel.crespo@manuelviajes.com', 'Manuel Viajes'),
(30, 'Rosa', 'Núñez', 603012345, 'rosa.nunez@rosaviajes.com', 'Rosa Viajes'),
(31, 'Alejandro', 'Ibáñez', 603123456, 'alejandro.ibanez@alejandroturismo.com', 'Alejandro Turismo'),
(32, 'Claudia', 'Santos', 603234567, 'claudia.santos@claudiaviajes.com', 'Claudia Viajes'),
(33, 'Andrés', 'Méndez', 603345678, 'andres.mendez@andrestours.com', 'Andrés Tours'),
(34, 'Natalia', 'García', 603456789, 'natalia.garcia@nataliahhoteles.com', 'Natalia Hoteles'),
(35, 'Héctor', 'Muñoz', 603567890, 'hector.munoz@hectorturismo.com', 'Héctor Turismo'),
(36, 'Verónica', 'Cabrera', 603678901, 'veronica.cabrera@veronicaviajes.com', 'Verónica Viajes'),
(37, 'Gonzalo', 'Campos', 603789012, 'gonzalo.campos@gonzalotours.com', 'Gonzalo Tours'),
(38, 'Silvia', 'Lara', 603890123, 'silvia.lara@silviaturismo.com', 'Silvia Turismo'),
(39, 'Pablo', 'Serrano', 603901234, 'pablo.serrano@pablotours.com', 'Pablo Tours'),
(40, 'Inés', 'Vidal', 604012345, 'ines.vidal@inesviajes.com', 'Inés Viajes'),
(41, 'Rubén', 'Vega', 604123456, 'ruben.vega@rubenturismo.com', 'Rubén Turismo'),
(42, 'Gloria', 'Campos', 604234567, 'gloria.campos@gloriaviajes.com', 'Gloria Viajes'),
(43, 'Alberto', 'Aguilar', 604345678, 'alberto.aguilar@albertoturismo.com', 'Alberto Turismo'),
(44, 'Sandra', 'Parra', 604456789, 'sandra.parra@sandraviajes.com', 'Sandra Viajes'),
(45, 'Víctor', 'Blanco', 604567890, 'victor.blanco@victortours.com', 'Víctor Tours'),
(46, 'Carolina', 'Moya', 604678901, 'carolina.moya@carolinaturismo.com', 'Carolina Turismo'),
(47, 'Álvaro', 'Soler', 604789012, 'alvaro.soler@alvaroviajes.com', 'Álvaro Viajes'),
(48, 'Adriana', 'Paredes', 604890123, 'adriana.paredes@adrianaviajes.com', 'Adriana Viajes'),
(49, 'Fátima', 'Carrasco', 604901234, 'fatima.carrasco@fatimaturismo.com', 'Fátima Turismo');

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

--
-- Volcado de datos para la tabla `datos_empresa`
--

INSERT INTO `datos_empresa` (`id_dat_emp`, `correo_emp`, `telefono_emp`, `id_empresa`, `id_contacto`) VALUES
(1, 'info@viajesgarcia.com', 910123456, 1, 1),
(2, 'contacto@viajesmaria.com', 910234567, 2, 2),
(3, 'info@turismocarlos.com', 910345678, 3, 3),
(4, 'contacto@anatravel.com', 910456789, 4, 4),
(5, 'info@pedroviajes.com', 910567890, 5, 5),
(6, 'contacto@viajesfernandez.com', 910678901, 6, 6),
(7, 'info@davidturismo.com', 910789012, 7, 7),
(8, 'contacto@luciahoteles.com', 910890123, 8, 8),
(9, 'info@migueltours.com', 910901234, 9, 9),
(10, 'contacto@saraviajes.com', 911012345, 10, 10),
(11, 'info@jorgetours.com', 911123456, 11, 11),
(12, 'contacto@elenatravel.com', 911234567, 12, 12),
(13, 'info@luisviajes.com', 911345678, 13, 13),
(14, 'contacto@carmenhoteles.com', 911456789, 14, 14),
(15, 'info@franciscotours.com', 911567890, 15, 15),
(16, 'contacto@patriciaviajes.com', 911678901, 16, 16),
(17, 'info@jesusturismo.com', 911789012, 17, 17),
(18, 'contacto@martaviajes.com', 911890123, 18, 18),
(19, 'info@robertotours.com', 911901234, 19, 19),
(20, 'contacto@angelaturismo.com', 912012345, 20, 20),
(21, 'info@sergioviajes.com', 912123456, 21, 21),
(22, 'contacto@evaviajes.com', 912234567, 22, 22),
(23, 'info@raultours.com', 912345678, 23, 23),
(24, 'contacto@cristinahoteles.com', 912456789, 24, 24),
(25, 'info@fernandoturismo.com', 912567890, 25, 25),
(26, 'contacto@beatrizviajes.com', 912678901, 26, 26),
(27, 'info@antoniosviajes.com', 912789012, 27, 27),
(28, 'contacto@isabelturismo.com', 912890123, 28, 28),
(29, 'info@manuelviajes.com', 912901234, 29, 29),
(30, 'contacto@rosaviajes.com', 913012345, 30, 30),
(31, 'info@alejandroturismo.com', 913123456, 31, 31),
(32, 'contacto@claudiaviajes.com', 913234567, 32, 32),
(33, 'info@andrestours.com', 913345678, 33, 33),
(34, 'contacto@nataliahhoteles.com', 913456789, 34, 34),
(35, 'info@hectorturismo.com', 913567890, 35, 35),
(36, 'contacto@veronicaviajes.com', 913678901, 36, 36),
(37, 'info@gonzalotours.com', 913789012, 37, 37),
(38, 'contacto@silviaturismo.com', 913890123, 38, 38),
(39, 'info@pablotours.com', 913901234, 39, 39),
(40, 'contacto@inesviajes.com', 914012345, 40, 40),
(41, 'info@rubenturismo.com', 914123456, 41, 41),
(42, 'contacto@gloriaviajes.com', 914234567, 42, 42),
(43, 'info@albertoturismo.com', 914345678, 43, 43),
(44, 'contacto@sandraviajes.com', 914456789, 44, 44),
(45, 'info@victortours.com', 914567890, 45, 45),
(46, 'contacto@carolinaturismo.com', 914678901, 46, 46),
(47, 'info@alvaroviajes.com', 914789012, 47, 47),
(48, 'contacto@adrianaviajes.com', 914890123, 48, 48),
(49, 'info@fatimaturismo.com', 914901234, 49, 49);

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

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre_emp`, `direccion_emp`, `categoria_servicio`, `metodo_pago`, `id_categoria`) VALUES
(1, 'Viajes García', 'Calle Mayor, 10, Madrid', 'Agencia de viajes', 0, 1),
(2, 'Viajes María', 'Avenida Diagonal, 50, Barcelona', 'Agencia de viajes', 0, 2),
(3, 'Turismo Carlos', 'Calle Colón, 20, Valencia', 'Agencia de viajes', 0, 3),
(4, 'Ana Travel', 'Calle Gran Vía, 15, Madrid', 'Agencia de viajes', 0, 4),
(5, 'Pedro Viajes', 'Calle Alcalá, 30, Madrid', 'Agencia de viajes', 0, 5),
(6, 'Viajes Fernández', 'Calle Balmes, 45, Barcelona', 'Agencia de viajes', 0, 6),
(7, 'David Turismo', 'Calle Fuencarral, 55, Madrid', 'Agencia de viajes', 0, 7),
(8, 'Lucía Hoteles', 'Calle del Carmen, 60, Valencia', 'Hoteles', 0, 8),
(9, 'Miguel Tours', 'Calle Princesa, 65, Madrid', 'Agencia de viajes', 0, 9),
(10, 'Sara Viajes', 'Calle Serrano, 70, Madrid', 'Agencia de viajes', 0, 10),
(11, 'Jorge Tours', 'Calle Velázquez, 75, Madrid', 'Agencia de viajes', 0, 11),
(12, 'Elena Travel', 'Calle San Vicente, 80, Valencia', 'Agencia de viajes', 0, 12),
(13, 'Luis Viajes', 'Calle Goya, 85, Madrid', 'Agencia de viajes', 0, 13),
(14, 'Carmen Hoteles', 'Calle Atocha, 90, Madrid', 'Hoteles', 0, 14),
(15, 'Francisco Tours', 'Calle Ibiza, 95, Madrid', 'Agencia de viajes', 0, 15),
(16, 'Patricia Viajes', 'Calle Castellana, 100, Madrid', 'Agencia de viajes', 0, 16),
(17, 'Jesús Turismo', 'Calle Claudio Coello, 105, Madrid', 'Agencia de viajes', 0, 17),
(18, 'Marta Viajes', 'Calle Orense, 110, Madrid', 'Agencia de viajes', 0, 18),
(19, 'Roberto Tours', 'Calle Goya, 115, Madrid', 'Agencia de viajes', 0, 19),
(20, 'Ángela Turismo', 'Calle Hermosilla, 120, Madrid', 'Agencia de viajes', 0, 20),
(21, 'Sergio Viajes', 'Calle Jorge Juan, 125, Madrid', 'Agencia de viajes', 0, 21),
(22, 'Eva Viajes', 'Calle Alcalá, 130, Madrid', 'Agencia de viajes', 0, 22),
(23, 'Raúl Tours', 'Calle Serrano, 135, Madrid', 'Agencia de viajes', 0, 23),
(24, 'Cristina Hoteles', 'Calle Lagasca, 140, Madrid', 'Hoteles', 0, 24),
(25, 'Fernando Turismo', 'Calle Goya, 145, Madrid', 'Agencia de viajes', 0, 25),
(26, 'Beatriz Viajes', 'Calle Príncipe de Vergara, 150, Madrid', 'Agencia de viajes', 0, 26),
(27, 'Antonio Viajes', 'Calle Velázquez, 155, Madrid', 'Agencia de viajes', 0, 27),
(28, 'Isabel Turismo', 'Calle Castellana, 160, Madrid', 'Agencia de viajes', 0, 28),
(29, 'Manuel Viajes', 'Calle Hermosilla, 165, Madrid', 'Agencia de viajes', 0, 29),
(30, 'Rosa Viajes', 'Calle Claudio Coello, 170, Madrid', 'Agencia de viajes', 0, 30),
(31, 'Alejandro Turismo', 'Calle Jorge Juan, 175, Madrid', 'Agencia de viajes', 0, 31),
(32, 'Claudia Viajes', 'Calle Serrano, 180, Madrid', 'Agencia de viajes', 0, 32),
(33, 'Andrés Tours', 'Calle Castellana, 185, Madrid', 'Agencia de viajes', 0, 33),
(34, 'Natalia Hoteles', 'Calle Orense, 190, Madrid', 'Hoteles', 0, 34),
(35, 'Héctor Turismo', 'Calle Goya, 195, Madrid', 'Agencia de viajes', 0, 35),
(36, 'Verónica Viajes', 'Calle Velázquez, 200, Madrid', 'Agencia de viajes', 0, 36),
(37, 'Gonzalo Tours', 'Calle Castellana, 205, Madrid', 'Agencia de viajes', 0, 37),
(38, 'Silvia Turismo', 'Calle Jorge Juan, 210, Madrid', 'Agencia de viajes', 0, 38),
(39, 'Pablo Tours', 'Calle Serrano, 215, Madrid', 'Agencia de viajes', 0, 39),
(40, 'Inés Viajes', 'Calle Lagasca, 220, Madrid', 'Agencia de viajes', 0, 40),
(41, 'Rubén Turismo', 'Calle Claudio Coello, 225, Madrid', 'Agencia de viajes', 0, 41),
(42, 'Gloria Viajes', 'Calle Orense, 230, Madrid', 'Agencia de viajes', 0, 42),
(43, 'Alberto Turismo', 'Calle Serrano, 235, Madrid', 'Agencia de viajes', 0, 43),
(44, 'Sandra Viajes', 'Calle Goya, 240, Madrid', 'Agencia de viajes', 0, 44),
(45, 'Víctor Tours', 'Calle Velázquez, 245, Madrid', 'Agencia de viajes', 0, 45),
(46, 'Carolina Turismo', 'Calle Castellana, 250, Madrid', 'Agencia de viajes', 0, 46),
(47, 'Álvaro Viajes', 'Calle Hermosilla, 255, Madrid', 'Agencia de viajes', 0, 47),
(48, 'Adriana Viajes', 'Calle Jorge Juan, 260, Madrid', 'Agencia de viajes', 0, 48),
(49, 'Fátima Turismo', 'Calle Serrano, 265, Madrid', 'Agencia de viajes', 0, 49);

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
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Pendiente'),
(4, 'Aprobado'),
(5, 'Rechazado'),
(6, 'Cancelado'),
(7, 'Completado'),
(8, 'En proceso'),
(9, 'En revisión'),
(10, 'Suspendido'),
(11, 'Archivado'),
(12, 'Expirado'),
(13, 'Requiere atención'),
(14, 'En espera'),
(15, 'Pausado'),
(16, 'En curso'),
(17, 'Anulado'),
(18, 'Confirmado'),
(19, 'Finalizado'),
(20, 'En progreso'),
(21, 'Resuelto'),
(22, 'No resuelto'),
(23, 'En disputa'),
(24, 'Aplazado'),
(25, 'Retrasado'),
(26, 'Procesando'),
(27, 'Asignado'),
(28, 'No asignado'),
(29, 'Publicado'),
(30, 'No publicado'),
(31, 'Autorizado'),
(32, 'No autorizado'),
(33, 'Verificado'),
(34, 'No verificado'),
(35, 'Aceptado'),
(36, 'No aceptado'),
(37, 'Enviado'),
(38, 'No enviado'),
(39, 'Revisado'),
(40, 'No revisado'),
(41, 'Notificado'),
(42, 'No notificado'),
(43, 'Visto'),
(44, 'No visto'),
(45, 'Procesado'),
(46, 'No procesado'),
(47, 'Registrado'),
(48, 'No registrado'),
(49, 'Listo');

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

--
-- Volcado de datos para la tabla `itinerario`
--

INSERT INTO `itinerario` (`id_itinerario`, `nombre_iti`, `fechas`, `desc_iti`, `id_usu`) VALUES
(1, 'Escapada a la Costa Brava', '2024-05-01', 'Un recorrido por las playas y calas más hermosas de la Costa Brava.', 1),
(2, 'Ruta por los Pirineos', '2024-06-10', 'Excursión a través de los pintorescos paisajes montañosos de los Pirineos.', 2),
(3, 'Tour por Andalucía', '2024-07-20', 'Descubre las ciudades históricas y la cultura de Andalucía.', 3),
(4, 'Visita a Barcelona', '2024-08-01', 'Explora los principales atractivos turísticos y culturales de Barcelona.', 4),
(5, 'Aventura en los Alpes', '2024-09-05', 'Senderismo y actividades en los Alpes suizos.', 5),
(6, 'Vacaciones en la Riviera Maya', '2024-10-15', 'Relájate en las playas paradisíacas de la Riviera Maya.', 6),
(7, 'Exploración en Nueva York', '2024-11-01', 'Un recorrido por los icónicos lugares de la ciudad de Nueva York.', 7),
(8, 'Escapada a Roma', '2024-12-05', 'Visita los monumentos históricos y disfruta de la gastronomía de Roma.', 8),
(9, 'Aventura en Costa Rica', '2025-01-15', 'Disfruta de la biodiversidad y paisajes exóticos de Costa Rica.', 9),
(10, 'Cultural en Tokio', '2025-02-01', 'Sumérgete en la vibrante cultura y tecnología de Tokio.', 10),
(11, 'Relajación en Bali', '2025-03-10', 'Una semana de descanso y aventura en las playas de Bali.', 11),
(12, 'Safari en Kenia', '2025-04-05', 'Observa la vida salvaje en los parques nacionales de Kenia.', 12),
(13, 'Recorrido por París', '2025-05-01', 'Visita los museos y monumentos emblemáticos de la ciudad de París.', 13),
(14, 'Tour en Londres', '2025-06-10', 'Explora la historia y cultura de Londres con visitas guiadas.', 14),
(15, 'Escapada a Ámsterdam', '2025-07-20', 'Descubre los canales y museos de Ámsterdam.', 15),
(16, 'Aventura en Sydney', '2025-08-01', 'Disfruta de las playas y la vida urbana de Sydney.', 16),
(17, 'Exploración en Buenos Aires', '2025-09-05', 'Conoce la rica cultura y gastronomía de Buenos Aires.', 17),
(18, 'Vacaciones en la Toscana', '2025-10-15', 'Recorre los viñedos y ciudades históricas de la Toscana.', 18),
(19, 'Ruta por Escocia', '2025-11-01', 'Explora los paisajes y castillos de Escocia.', 19),
(20, 'Cultural en Seúl', '2025-12-05', 'Conoce la cultura y tecnología de la vibrante ciudad de Seúl.', 20),
(21, 'Escapada a Praga', '2026-01-15', 'Descubre la belleza y la historia de Praga.', 21),
(22, 'Aventura en Ciudad del Cabo', '2026-02-01', 'Explora la vibrante cultura y paisajes de Ciudad del Cabo.', 22),
(23, 'Relajación en Phuket', '2026-03-10', 'Una semana de descanso en las playas de Phuket.', 23),
(24, 'Safari en Tanzania', '2026-04-05', 'Disfruta de la vida salvaje y paisajes de Tanzania.', 24),
(25, 'Recorrido por Lisboa', '2026-05-01', 'Explora los barrios y la historia de Lisboa.', 25),
(26, 'Tour en Dubrovnik', '2026-06-10', 'Descubre la histórica ciudad costera de Dubrovnik.', 26),
(27, 'Escapada a San Petersburgo', '2026-07-20', 'Visita los palacios y canales de San Petersburgo.', 27),
(28, 'Aventura en Quito', '2026-08-01', 'Explora la capital de Ecuador y sus alrededores.', 28),
(29, 'Exploración en Lima', '2026-09-05', 'Conoce la historia y gastronomía de Lima.', 29),
(30, 'Vacaciones en Cancún', '2026-10-15', 'Relájate en las playas y resorts de Cancún.', 30),
(31, 'Cultural en Los Ángeles', '2026-11-01', 'Descubre los principales atractivos culturales y turísticos de Los Ángeles.', 31),
(32, 'Relajación en Maui', '2026-12-05', 'Disfruta de las playas y paisajes naturales de Maui.', 32),
(33, 'Aventura en Hong Kong', '2027-01-15', 'Explora la vibrante ciudad y su entorno en Hong Kong.', 33),
(34, 'Escapada a Viena', '2027-02-01', 'Descubre la historia y cultura de Viena.', 34),
(35, 'Safari en Sudáfrica', '2027-03-10', 'Observa la fauna salvaje en Sudáfrica.', 35),
(36, 'Recorrido por Dublín', '2027-04-05', 'Conoce la historia y la cultura de Dublín.', 36),
(37, 'Tour en Edimburgo', '2027-05-01', 'Visita los castillos y museos de Edimburgo.', 37),
(38, 'Vacaciones en Fiyi', '2027-06-10', 'Relájate en las playas y resorts de Fiyi.', 38),
(39, 'Exploración en Río de Janeiro', '2027-07-20', 'Descubre la cultura y playas de Río de Janeiro.', 39),
(40, 'Aventura en Viena', '2027-08-01', 'Recorrido por los museos y palacios de Viena.', 40),
(41, 'Cultural en Lisboa', '2027-09-05', 'Explora la arquitectura y cultura de Lisboa.', 41),
(42, 'Relajación en Islas Maldivas', '2027-10-15', 'Disfruta de las playas y resorts en las Islas Maldivas.', 42),
(43, 'Escapada a Copenhague', '2027-11-01', 'Descubre la cultura y la historia de Copenhague.', 43),
(44, 'Tour en Múnich', '2027-12-05', 'Conoce la historia y la cultura de Múnich.', 44),
(45, 'Aventura en Reykjavik', '2028-01-15', 'Explora los paisajes naturales y volcanes de Islandia.', 45),
(46, 'Relajación en Bora Bora', '2028-02-01', 'Descansa en las playas de Bora Bora.', 46),
(47, 'Safari en Botswana', '2028-03-10', 'Descubre la vida salvaje en Botswana.', 47),
(48, 'Escapada a San Sebastián', '2028-04-05', 'Disfruta de la gastronomía y playas de San Sebastián.', 48),
(49, 'Cultural en Toronto', '2028-05-01', 'Explora los principales atractivos turísticos y culturales de Toronto.', 49);

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

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `estado_res`, `fecha_res`, `desc_res`, `metodo_pago`) VALUES
(1, 'C', '2024-05-01', 'Reserva para una habitación en el Hotel Sol y Mar.', 0),
(2, 'P', '2024-05-03', 'Reserva para un tour por la Costa Brava.', 0),
(3, 'C', '2024-05-10', 'Reserva para una cena en el restaurante La Bella.', 0),
(4, 'C', '2024-06-01', 'Reserva de vuelo a Barcelona.', 0),
(5, 'E', '2024-06-05', 'Reserva para alquiler de coche en Madrid.', 0),
(6, 'C', '2024-07-01', 'Reserva para un paquete turístico en la Riviera Maya.', 0),
(7, 'C', '2024-07-15', 'Reserva para una excursión en los Pirineos.', 0),
(8, 'P', '2024-08-01', 'Reserva para una habitación en el Hotel Barcelona Center.', 0),
(9, 'C', '2024-08-10', 'Reserva para un tour gastronómico en Madrid.', 0),
(10, 'C', '2024-09-01', 'Reserva para un crucero por el Mediterráneo.', 0),
(11, 'C', '2024-09-10', 'Reserva para una visita guiada a la Alhambra.', 0),
(12, 'E', '2024-10-01', 'Reserva para un safari en Kenia.', 0),
(13, 'C', '2024-10-15', 'Reserva para un hotel en Nueva York.', 0),
(14, 'P', '2024-11-01', 'Reserva para una cena en el restaurante El Gourmet.', 0),
(15, 'C', '2024-11-05', 'Reserva para un tour cultural en Roma.', 0),
(16, 'C', '2024-12-01', 'Reserva para un vuelo a Londres.', 0),
(17, 'E', '2024-12-10', 'Reserva para una semana en un resort en Bali.', 0),
(18, 'C', '2025-01-05', 'Reserva para una excursión en la Toscana.', 0),
(19, 'P', '2025-01-15', 'Reserva para un paquete turístico en Australia.', 0),
(20, 'C', '2025-02-01', 'Reserva para un tour por la ciudad de Tokio.', 0),
(21, 'E', '2025-02-10', 'Reserva para una habitación en el Hotel Sunset en Fiyi.', 0),
(22, 'C', '2025-03-01', 'Reserva para un tour por Buenos Aires.', 0),
(23, 'C', '2025-03-10', 'Reserva para un crucero por el Caribe.', 0),
(24, 'P', '2025-04-01', 'Reserva para una excursión en Ciudad del Cabo.', 0),
(25, 'C', '2025-04-15', 'Reserva para una habitación en un resort en Cancún.', 0),
(26, 'E', '2025-05-01', 'Reserva para un tour en Praga.', 0),
(27, 'C', '2025-05-10', 'Reserva para un safari en Sudáfrica.', 0),
(28, 'P', '2025-06-01', 'Reserva para un paquete turístico en Roma.', 0),
(29, 'C', '2025-06-15', 'Reserva para una cena en el restaurante El Mediterráneo.', 0),
(30, 'C', '2025-07-01', 'Reserva para un vuelo a Dubái.', 0),
(31, 'C', '2025-07-10', 'Reserva para una habitación en el Hotel Royal en Londres.', 0),
(32, 'E', '2025-08-01', 'Reserva para un tour en Hong Kong.', 0),
(33, 'C', '2025-08-15', 'Reserva para un viaje a las Islas Maldivas.', 0),
(34, 'P', '2025-09-01', 'Reserva para una habitación en el Hotel Zen en Bali.', 0),
(35, 'C', '2025-09-10', 'Reserva para un tour cultural en Seúl.', 0),
(36, 'C', '2025-10-01', 'Reserva para un crucero por Asia.', 0),
(37, 'E', '2025-10-15', 'Reserva para una estancia en un resort en Cancún.', 0),
(38, 'C', '2025-11-01', 'Reserva para una excursión en Nairobi.', 0),
(39, 'P', '2025-11-10', 'Reserva para una cena en el restaurante Asia Gourmet.', 0),
(40, 'C', '2025-12-01', 'Reserva para un tour en Buenos Aires.', 0),
(41, 'E', '2025-12-10', 'Reserva para una habitación en el Hotel Plaza en Nueva York.', 0),
(42, 'C', '2026-01-01', 'Reserva para un viaje en tren por Europa.', 0),
(43, 'C', '2026-01-15', 'Reserva para una visita a los viñedos en la Toscana.', 0),
(44, 'P', '2026-02-01', 'Reserva para una habitación en el Hotel Grand en Los Ángeles.', 0),
(45, 'C', '2026-02-10', 'Reserva para una excursión en el Parque Nacional de Yellowstone.', 0),
(46, 'E', '2026-03-01', 'Reserva para una estancia en un resort en Bora Bora.', 0),
(47, 'C', '2026-03-15', 'Reserva para un tour en Tokio.', 0),
(48, 'P', '2026-04-01', 'Reserva para un paquete turístico en Río de Janeiro.', 0),
(49, 'C', '2026-04-10', 'Reserva para una cena en el restaurante El Gourmet.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE `seguridad` (
  `id_seguridad` int(10) NOT NULL,
  `email_usu` varchar(60) NOT NULL,
  `correo_usu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguridad`
--

INSERT INTO `seguridad` (`id_seguridad`, `email_usu`, `correo_usu`) VALUES
(1, 'usuario1@example.com', 'usuario1@example.com'),
(2, 'usuario2@example.com', 'usuario2@example.com'),
(3, 'usuario3@example.com', 'usuario3@example.com'),
(4, 'usuario4@example.com', 'usuario4@example.com'),
(5, 'usuario5@example.com', 'usuario5@example.com'),
(6, 'usuario6@example.com', 'usuario6@example.com'),
(7, 'usuario7@example.com', 'usuario7@example.com'),
(8, 'usuario8@example.com', 'usuario8@example.com'),
(9, 'usuario9@example.com', 'usuario9@example.com'),
(10, 'usuario10@example.com', 'usuario10@example.com'),
(11, 'usuario11@example.com', 'usuario11@example.com'),
(12, 'usuario12@example.com', 'usuario12@example.com'),
(13, 'usuario13@example.com', 'usuario13@example.com'),
(14, 'usuario14@example.com', 'usuario14@example.com'),
(15, 'usuario15@example.com', 'usuario15@example.com'),
(16, 'usuario16@example.com', 'usuario16@example.com'),
(17, 'usuario17@example.com', 'usuario17@example.com'),
(18, 'usuario18@example.com', 'usuario18@example.com'),
(19, 'usuario19@example.com', 'usuario19@example.com'),
(20, 'usuario20@example.com', 'usuario20@example.com'),
(21, 'usuario21@example.com', 'usuario21@example.com'),
(22, 'usuario22@example.com', 'usuario22@example.com'),
(23, 'usuario23@example.com', 'usuario23@example.com'),
(24, 'usuario24@example.com', 'usuario24@example.com'),
(25, 'usuario25@example.com', 'usuario25@example.com'),
(26, 'usuario26@example.com', 'usuario26@example.com'),
(27, 'usuario27@example.com', 'usuario27@example.com'),
(28, 'usuario28@example.com', 'usuario28@example.com'),
(29, 'usuario29@example.com', 'usuario29@example.com'),
(30, 'usuario30@example.com', 'usuario30@example.com'),
(31, 'usuario31@example.com', 'usuario31@example.com'),
(32, 'usuario32@example.com', 'usuario32@example.com'),
(33, 'usuario33@example.com', 'usuario33@example.com'),
(34, 'usuario34@example.com', 'usuario34@example.com'),
(35, 'usuario35@example.com', 'usuario35@example.com'),
(36, 'usuario36@example.com', 'usuario36@example.com'),
(37, 'usuario37@example.com', 'usuario37@example.com'),
(38, 'usuario38@example.com', 'usuario38@example.com'),
(39, 'usuario39@example.com', 'usuario39@example.com'),
(40, 'usuario40@example.com', 'usuario40@example.com'),
(41, 'usuario41@example.com', 'usuario41@example.com'),
(42, 'usuario42@example.com', 'usuario42@example.com'),
(43, 'usuario43@example.com', 'usuario43@example.com'),
(44, 'usuario44@example.com', 'usuario44@example.com'),
(45, 'usuario45@example.com', 'usuario45@example.com'),
(46, 'usuario46@example.com', 'usuario46@example.com'),
(47, 'usuario47@example.com', 'usuario47@example.com'),
(48, 'usuario48@example.com', 'usuario48@example.com'),
(49, 'usuario49@example.com', 'usuario49@example.com');

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

--
-- Volcado de datos para la tabla `sitio_turistico`
--

INSERT INTO `sitio_turistico` (`id_sitio`, `nombre_sitio`, `img_sitio`, `ubicacion_sitio`, `desc_sitio`, `id_empresa`) VALUES
(1, 'Playa de la Concha', 'img1.jpg', 'San Sebastián', 'Una de las playas más famosas y hermosas de España.', 1),
(2, 'Parque Güell', 'img2.jpg', 'Barcelona', 'Un parque diseñado por Antoni Gaudí, conocido por sus coloridos mosaicos.', 2),
(3, 'La Alhambra', 'img3.jpg', 'Granada', 'Un palacio y fortaleza de la dinastía nazarí, Patrimonio de la Humanidad.', 3),
(4, 'Torre Eiffel', 'img4.jpg', 'París', 'El icónico símbolo de la ciudad de París, con impresionantes vistas.', 4),
(5, 'Machu Picchu', 'img5.jpg', 'Perú', 'La antigua ciudad inca situada en los Andes, famosa por su arquitectura y paisaje.', 5),
(6, 'Gran Cañón', 'img6.jpg', 'Arizona, EE.UU.', 'Un impresionante cañón tallado por el río Colorado, conocido por sus vistas espectaculares.', 6),
(7, 'Sagrada Familia', 'img7.jpg', 'Barcelona', 'Una basílica diseñada por Antoni Gaudí, aún en construcción.', 7),
(8, 'Taj Mahal', 'img8.jpg', 'Agra, India', 'Un mausoleo de mármol blanco, considerado una de las siete maravillas del mundo.', 8),
(9, 'Sydney Opera House', 'img9.jpg', 'Sídney', 'Un centro de artes escénicas famoso por su arquitectura única.', 9),
(10, 'Coliseo', 'img10.jpg', 'Roma', 'Un antiguo anfiteatro romano conocido por sus gladiadores y eventos espectaculares.', 10),
(11, 'Santorini', 'img11.jpg', 'Grecia', 'Una isla volcánica famosa por sus casas blancas y vistas al mar.', 11),
(12, 'Islas Maldivas', 'img12.jpg', 'Océano Índico', 'Un archipiélago conocido por sus playas de arena blanca y aguas cristalinas.', 12),
(13, 'Salar de Uyuni', 'img13.jpg', 'Bolivia', 'El mayor desierto de sal del mundo, famoso por su paisaje surrealista.', 13),
(14, 'Castillo de Neuschwanstein', 'img14.jpg', 'Alemania', 'Un castillo de cuento de hadas que inspiró el castillo de Disney.', 14),
(15, 'Venecia', 'img15.jpg', 'Italia', 'Una ciudad conocida por sus canales y arquitectura histórica.', 15),
(16, 'Muro de Berlín', 'img16.jpg', 'Berlín', 'Un monumento histórico que divide la ciudad durante la Guerra Fría.', 16),
(17, 'Monte Fuji', 'img17.jpg', 'Japón', 'Un volcán icónico y símbolo de Japón, famoso por su simetría.', 17),
(18, 'Petra', 'img18.jpg', 'Jordania', 'Una antigua ciudad nabatea esculpida en la roca roja, conocida por su fachada rosa.', 18),
(19, 'Times Square', 'img19.jpg', 'Nueva York', 'Un vibrante centro de entretenimiento y comercio en Manhattan.', 19),
(20, 'Burj Khalifa', 'img20.jpg', 'Dubái', 'El rascacielos más alto del mundo, ofreciendo vistas panorámicas de la ciudad.', 20),
(21, 'Playa del Carmen', 'img21.jpg', 'México', 'Una popular playa caribeña conocida por su vibrante vida nocturna y actividades acuáticas.', 21),
(22, 'Meteora', 'img22.jpg', 'Grecia', 'Monasterios situados en lo alto de formaciones rocosas impresionantes.', 22),
(23, 'Gran Muralla China', 'img23.jpg', 'China', 'Una de las maravillas arquitectónicas más grandes del mundo, extendiéndose a lo largo de China.', 23),
(24, 'Muir Woods', 'img24.jpg', 'California, EE.UU.', 'Un parque nacional conocido por sus impresionantes secuoyas.', 24),
(25, 'Eiffel Tower', 'img25.jpg', 'París', 'El icónico símbolo de París con impresionantes vistas de la ciudad.', 25),
(26, 'Kinkaku-ji', 'img26.jpg', 'Kioto, Japón', 'El Pabellón Dorado, un templo budista cubierto de oro.', 26),
(27, 'Giza Pyramids', 'img27.jpg', 'Egipto', 'Las antiguas pirámides de Giza, incluido el Gran Esfinge.', 27),
(28, 'Niagara Falls', 'img28.jpg', 'Canadá/EE.UU.', 'Una impresionante cascada en la frontera entre Canadá y EE.UU.', 28),
(29, 'Bora Bora', 'img29.jpg', 'Polinesia Francesa', 'Una isla tropical conocida por sus lujosos resorts sobre el agua.', 29),
(30, 'Alcatraz', 'img30.jpg', 'San Francisco, EE.UU.', 'Una famosa prisión ubicada en una isla en la bahía de San Francisco.', 30),
(31, 'Salar de Atacama', 'img31.jpg', 'Chile', 'Un desierto de sal con un paisaje árido y lagunas coloridas.', 31),
(32, 'Santuario de Machu Picchu', 'img32.jpg', 'Perú', 'Una antigua ciudad inca en las montañas andinas.', 32),
(33, 'Río Amazonas', 'img33.jpg', 'Sudamérica', 'El mayor río del mundo por volumen de agua y biodiversidad.', 33),
(34, 'Dubai Marina', 'img34.jpg', 'Dubái', 'Un distrito moderno con rascacielos y una vibrante vida nocturna.', 34),
(35, 'Acropolis of Athens', 'img35.jpg', 'Atenas, Grecia', 'Una antigua ciudadela con monumentos históricos como el Partenón.', 35),
(36, 'Machu Picchu', 'img36.jpg', 'Perú', 'La antigua ciudad inca de Machu Picchu, conocida por su impresionante arquitectura.', 36),
(37, 'Vatican City', 'img37.jpg', 'Roma', 'La sede de la Iglesia Católica y el hogar de la Basílica de San Pedro.', 37),
(38, 'Giza Pyramids', 'img38.jpg', 'Egipto', 'Las pirámides más antiguas y emblemáticas del mundo.', 38),
(39, 'Ayers Rock', 'img39.jpg', 'Australia', 'Un monolito gigante en el desierto, conocido por sus cambios de color.', 39),
(40, 'Victoria Falls', 'img40.jpg', 'Zambia/Zimbabwe', 'Una de las cascadas más grandes y espectaculares del mundo.', 40),
(41, 'Temple of Heaven', 'img41.jpg', 'Pekín, China', 'Un templo histórico conocido por su arquitectura y significado cultural.', 41),
(42, 'Bali', 'img42.jpg', 'Indonesia', 'Una isla conocida por sus playas, templos y cultura vibrante.', 42),
(43, 'Great Barrier Reef', 'img43.jpg', 'Australia', 'El mayor sistema de arrecifes de coral del mundo.', 43),
(44, 'Cinque Terre', 'img44.jpg', 'Italia', 'Cinco pintorescos pueblos costeros en la Riviera Italiana.', 44),
(45, 'Great Wall of China', 'img45.jpg', 'China', 'Una extensa muralla que se extiende a través del norte de China.', 45),
(46, 'Stonehenge', 'img46.jpg', 'Reino Unido', 'Un antiguo monumento megalítico en Wiltshire.', 46),
(47, 'Louvre Museum', 'img47.jpg', 'París', 'Uno de los museos más grandes y famosos del mundo, hogar de la Mona Lisa.', 47),
(48, 'Eiffel Tower', 'img48.jpg', 'París', 'El icónico monumento parisino conocido por sus vistas panorámicas.', 48),
(49, 'Niagara Falls', 'img49.jpg', 'Canadá/EE.UU.', 'Una serie de impresionantes cascadas en la frontera entre Canadá y EE.UU.', 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nombre_usu` varchar(50) NOT NULL,
  `apellido_usu` varchar(50) NOT NULL,
  `telefono_usu` int(10) NOT NULL,
  `correo_usu` varchar(70) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_seguridad` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usu`, `apellido_usu`, `telefono_usu`, `correo_usu`, `fecha_registro`, `estado`, `genero`, `localidad`, `fecha_nacimiento`, `id_seguridad`, `id_estado`) VALUES
(1, 'Juan', 'Pérez', 600123456, 'juan.perez@example.com', '2024-01-01', 'activo', 'Masculino', 'Madrid', '1990-01-15', 1, 1),
(2, 'Ana', 'García', 600234567, 'ana.garcia@example.com', '2024-01-02', 'activo', 'Femenino', 'Barcelona', '1985-05-20', 2, 2),
(3, 'Carlos', 'Martínez', 600345678, 'carlos.martinez@example.com', '2024-01-03', 'activo', 'Masculino', 'Valencia', '1992-07-25', 3, 3),
(4, 'Laura', 'López', 600456789, 'laura.lopez@example.com', '2024-01-04', 'activo', 'Femenino', 'Sevilla', '1988-09-30', 4, 4),
(5, 'Miguel', 'Fernández', 600567890, 'miguel.fernandez@example.com', '2024-01-05', 'activo', 'Masculino', 'Bilbao', '1995-03-12', 5, 5),
(6, 'Isabel', 'Gómez', 600678901, 'isabel.gomez@example.com', '2024-01-06', 'activo', 'Femenino', 'Granada', '1991-06-18', 6, 6),
(7, 'Francisco', 'Hernández', 600789012, 'francisco.hernandez@example.com', '2024-01-07', 'activo', 'Masculino', 'Murcia', '1987-11-23', 7, 7),
(8, 'Cristina', 'Ramírez', 600890123, 'cristina.ramirez@example.com', '2024-01-08', 'activo', 'Femenino', 'Alicante', '1993-12-02', 8, 8),
(9, 'José', 'Jiménez', 600901234, 'jose.jimenez@example.com', '2024-01-09', 'activo', 'Masculino', 'Toledo', '1986-10-11', 9, 9),
(10, 'María', 'Moreno', 600012345, 'maria.moreno@example.com', '2024-01-10', 'activo', 'Femenino', 'Córdoba', '1994-04-07', 10, 10),
(11, 'Antonio', 'Muñoz', 600123456, 'antonio.munoz@example.com', '2024-01-11', 'activo', 'Masculino', 'Salamanca', '1989-08-16', 11, 11),
(12, 'Elena', 'Cruz', 600234567, 'elena.cruz@example.com', '2024-01-12', 'activo', 'Femenino', 'Segovia', '1992-12-30', 12, 12),
(13, 'Luis', 'Vázquez', 600345678, 'luis.vazquez@example.com', '2024-01-13', 'activo', 'Masculino', 'Zaragoza', '1987-07-22', 13, 13),
(14, 'Sandra', 'Morales', 600456789, 'sandra.morales@example.com', '2024-01-14', 'activo', 'Femenino', 'Gijón', '1990-09-03', 14, 14),
(15, 'David', 'Sánchez', 600567890, 'david.sanchez@example.com', '2024-01-15', 'activo', 'Masculino', 'Oviedo', '1985-11-19', 15, 15),
(16, 'Marina', 'Torres', 600678901, 'marina.torres@example.com', '2024-01-16', 'activo', 'Femenino', 'Palma', '1991-02-25', 16, 16),
(17, 'Javier', 'Paniagua', 600789012, 'javier.paniagua@example.com', '2024-01-17', 'activo', 'Masculino', 'A Coruña', '1993-06-07', 17, 17),
(18, 'Patricia', 'Cano', 600890123, 'patricia.cano@example.com', '2024-01-18', 'activo', 'Femenino', 'Logroño', '1989-10-14', 18, 18),
(19, 'Ángel', 'Marín', 600901234, 'angel.marin@example.com', '2024-01-19', 'activo', 'Masculino', 'Valladolid', '1990-04-23', 19, 19),
(20, 'Rosa', 'Navarro', 600012345, 'rosa.navarro@example.com', '2024-01-20', 'activo', 'Femenino', 'Albacete', '1988-08-08', 20, 20),
(21, 'Jorge', 'Morales', 600123456, 'jorge.morales@example.com', '2024-01-21', 'activo', 'Masculino', 'Almería', '1992-11-11', 21, 21),
(22, 'Inés', 'Pérez', 600234567, 'ines.perez@example.com', '2024-01-22', 'activo', 'Femenino', 'Badajoz', '1994-05-12', 22, 22),
(23, 'Ricardo', 'Gómez', 600345678, 'ricardo.gomez@example.com', '2024-01-23', 'activo', 'Masculino', 'Soria', '1986-02-27', 23, 23),
(24, 'Marta', 'Jiménez', 600456789, 'marta.jimenez@example.com', '2024-01-24', 'activo', 'Femenino', 'La Rioja', '1993-07-04', 24, 24),
(25, 'Sergio', 'Hernández', 600567890, 'sergio.hernandez@example.com', '2024-01-25', 'activo', 'Masculino', 'Huesca', '1989-09-17', 25, 25),
(26, 'Laura', 'Vázquez', 600678901, 'laura.vazquez@example.com', '2024-01-26', 'activo', 'Femenino', 'Teruel', '1991-01-23', 26, 26),
(27, 'Óscar', 'Romero', 600789012, 'oscar.romero@example.com', '2024-01-27', 'activo', 'Masculino', 'Jaén', '1995-03-11', 27, 27),
(28, 'Beatriz', 'Fernández', 600890123, 'beatriz.fernandez@example.com', '2024-01-28', 'activo', 'Femenino', 'Gibraltar', '1988-11-02', 28, 28),
(29, 'Juan Carlos', 'López', 600901234, 'juancarlos.lopez@example.com', '2024-01-29', 'activo', 'Masculino', 'Melilla', '1992-04-14', 29, 29),
(30, 'Ana María', 'Méndez', 600012345, 'anamaria.mendez@example.com', '2024-01-30', 'activo', 'Femenino', 'Ceuta', '1987-12-20', 30, 30),
(31, 'Rafael', 'García', 600123456, 'rafael.garcia@example.com', '2024-01-31', 'activo', 'Masculino', 'Albacete', '1993-08-15', 31, 31),
(32, 'Juana', 'Sánchez', 600234567, 'juana.sanchez@example.com', '2024-02-01', 'activo', 'Femenino', 'Badajoz', '1990-05-25', 32, 32),
(33, 'José Luis', 'Ramírez', 600345678, 'jose.luis.ramirez@example.com', '2024-02-02', 'activo', 'Masculino', 'Soria', '1986-06-12', 33, 33),
(34, 'Carmen', 'Torres', 600456789, 'carmen.torres@example.com', '2024-02-03', 'activo', 'Femenino', 'Granada', '1992-09-19', 34, 34),
(35, 'Javier', 'Moreno', 600567890, 'javier.moreno@example.com', '2024-02-04', 'activo', 'Masculino', 'Segovia', '1989-10-07', 35, 35),
(36, 'Mónica', 'Cruz', 600678901, 'monica.cruz@example.com', '2024-02-05', 'activo', 'Femenino', 'Murcia', '1991-03-18', 36, 36),
(37, 'Álvaro', 'Gómez', 600789012, 'alvaro.gomez@example.com', '2024-02-06', 'activo', 'Masculino', 'Barcelona', '1985-07-29', 37, 37),
(38, 'Patricia', 'García', 600890123, 'patricia.garcia@example.com', '2024-02-07', 'activo', 'Femenino', 'Valencia', '1993-02-11', 38, 38),
(39, 'Roberto', 'López', 600901234, 'roberto.lopez@example.com', '2024-02-08', 'activo', 'Masculino', 'Bilbao', '1987-06-22', 39, 39),
(40, 'Nerea', 'Jiménez', 600012345, 'nerea.jimenez@example.com', '2024-02-09', 'activo', 'Femenino', 'Sevilla', '1995-05-05', 40, 40),
(41, 'Daniel', 'Morales', 600123456, 'daniel.morales@example.com', '2024-02-10', 'activo', 'Masculino', 'Alicante', '1989-11-12', 41, 41),
(42, 'Sara', 'Romero', 600234567, 'sara.romero@example.com', '2024-02-11', 'activo', 'Femenino', 'Toledo', '1992-04-07', 42, 42),
(43, 'Alejandro', 'Sánchez', 600345678, 'alejandro.sanchez@example.com', '2024-02-12', 'activo', 'Masculino', 'Madrid', '1991-06-25', 43, 43),
(44, 'Claudia', 'Hernández', 600456789, 'claudia.hernandez@example.com', '2024-02-13', 'activo', 'Femenino', 'Granada', '1986-09-19', 44, 44),
(45, 'Antonio', 'Moreno', 600567890, 'antonio.moreno@example.com', '2024-02-14', 'activo', 'Masculino', 'Zaragoza', '1994-01-31', 45, 45),
(46, 'Natalia', 'Méndez', 600678901, 'natalia.mendez@example.com', '2024-02-15', 'activo', 'Femenino', 'Gijón', '1988-03-14', 46, 46),
(47, 'Fernando', 'Pérez', 600789012, 'fernando.perez@example.com', '2024-02-16', 'activo', 'Masculino', 'Oviedo', '1990-12-03', 47, 47),
(48, 'María José', 'Torres', 600890123, 'mariajose.torres@example.com', '2024-02-17', 'activo', 'Femenino', 'Bilbao', '1993-07-15', 48, 48),
(49, 'Francisco Javier', 'García', 600901234, 'francisco.javier.garcia@example.com', '2024-02-18', 'activo', 'Masculino', 'Valencia', '1985-11-01', 49, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_itinerario`
--

CREATE TABLE `usuario_itinerario` (
  `id_usuario` int(10) NOT NULL,
  `id_itinerario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_itinerario`
--

INSERT INTO `usuario_itinerario` (`id_usuario`, `id_itinerario`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(4, 12),
(5, 13),
(5, 14),
(5, 15),
(6, 16),
(6, 17),
(6, 18),
(7, 19),
(7, 20),
(7, 21),
(8, 22),
(8, 23),
(8, 24),
(9, 25),
(9, 26),
(9, 27),
(10, 28),
(10, 29),
(10, 30),
(11, 31),
(11, 32),
(11, 33),
(12, 34),
(12, 35),
(12, 36),
(13, 37),
(13, 38),
(13, 39),
(14, 40),
(14, 41),
(14, 42),
(15, 43),
(15, 44),
(15, 45),
(16, 46),
(16, 47),
(16, 48),
(17, 1),
(17, 2),
(17, 49),
(18, 3),
(18, 4),
(18, 5),
(19, 6),
(19, 7),
(19, 8),
(20, 9),
(20, 10),
(20, 11),
(21, 12),
(21, 13),
(21, 14),
(22, 15),
(22, 16),
(22, 17),
(23, 18),
(23, 19),
(23, 20),
(24, 21),
(24, 22),
(24, 23),
(25, 24),
(25, 25),
(25, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_reserva`
--

CREATE TABLE `usuario_reserva` (
  `id_usuario` int(10) NOT NULL,
  `id_reserva` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_reserva`
--

INSERT INTO `usuario_reserva` (`id_usuario`, `id_reserva`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(4, 12),
(5, 13),
(5, 14),
(5, 15),
(6, 16),
(6, 17),
(6, 18),
(7, 19),
(7, 20),
(7, 21),
(8, 22),
(8, 23),
(8, 24),
(9, 25),
(9, 26),
(9, 27),
(10, 28),
(10, 29),
(10, 30),
(11, 31),
(11, 32),
(11, 33),
(12, 34),
(12, 35),
(12, 36),
(13, 37),
(13, 38),
(13, 39),
(14, 40),
(14, 41),
(14, 42),
(15, 43),
(15, 44),
(15, 45),
(16, 46),
(16, 47),
(16, 48),
(17, 1),
(17, 2),
(17, 49),
(18, 3),
(18, 4),
(18, 5),
(19, 6),
(19, 7),
(19, 8),
(20, 9),
(20, 10),
(20, 11),
(21, 12),
(21, 13),
(21, 14),
(22, 15),
(22, 16),
(22, 17);

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
  ADD KEY `id_seguridad` (`id_seguridad`,`id_estado`),
  ADD KEY `id_estado` (`id_estado`);

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
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_sitio`) REFERENCES `sitio_turistico` (`id_sitio`);

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
-- Filtros para la tabla `itinerario`
--
ALTER TABLE `itinerario`
  ADD CONSTRAINT `itinerario_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `sitio_turistico`
--
ALTER TABLE `sitio_turistico`
  ADD CONSTRAINT `sitio_turistico_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_seguridad`) REFERENCES `seguridad` (`id_seguridad`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

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
