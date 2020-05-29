-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2020 a las 07:22:56
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soporte_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes`
--

CREATE TABLE `bienes` (
  `num_bien` int(10) NOT NULL,
  `descrip_bien` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_material_bien` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `color_bien` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `condicion_bien` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_tipo_equipo` int(10) NOT NULL,
  `ci_usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cod_marca` int(10) NOT NULL,
  `modelo_bien` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bienes`
--

INSERT INTO `bienes` (`num_bien`, `descrip_bien`, `tipo_material_bien`, `color_bien`, `condicion_bien`, `cod_tipo_equipo`, `ci_usuario`, `cod_marca`, `modelo_bien`, `estado`) VALUES
(0, 'asdfg', 'lkjhgf', 'asdfg', 'Regular', 303, '10969461', 101, '', 0),
(111, 'Computador todo en uno', 'plastico', 'negro', 'Bueno', 303, '16198808', 101, '', 0),
(112, 'Mini lapto ', 'plastico', 'blanco', 'Bueno', 303, '10969461', 202, '377-11', 0),
(1113, 'Lapto ', 'plastico', 'Verde', 'Regular', 303, '10969461', 202, 'qwe33', 0),
(1234, 'ejuhfuhf', 'plastico', 'verde', 'Regular', 303, '16198808', 101, '', 0),
(2121, 'Computador todo en uno', 'plastico', 'blanco', 'Bueno', 303, '24426616', 101, 'asdasd2525', 1),
(2323, 'laptop asd', 'plastico', 'negra', 'Bueno', 303, '10969461', 100, 'p2343', 1),
(11111, 'equipo de mesa', 'plastico', 'blanco', 'Bueno', 303, '16198809', 106, 'ksdjksdjk', 1),
(21315, 'laptop asd', 'plastico', 'blanco', 'Bueno', 303, '16198808', 101, '', 0),
(23465, 'laptop i5', 'Plastico', 'negro', 'Regular', 304, '25470091', 103, 'p3300', 1),
(25678, 'laptop php', 'plastico', 'blanco', 'Regular', 304, '10969461', 101, 'asdasd', 1),
(27890, 'asdfghjkl', 'uyt', 'asdfgh', 'Bueno', 303, '25470091', 101, 'OIUYTEWSA', 1),
(123444, 'adelaida', 'plastico', 'blanco', 'Bueno', 303, '10969461', 103, '', 1),
(123456, 'qweqwe', 'qweqwe', 'qweqe', 'Bueno', 303, '10969461', 101, '', 0),
(124367, 'Mouse Laser', 'Plastico', 'Gris', 'Bueno', 308, '25470091', 100, 'M0S3KL', 0),
(202020, 'laptop php', 'plastico', 'negra', 'Bueno', 303, '10969461', 101, '', 0),
(232324, 'laptop php', 'plastico', 'negra', 'Bueno', 305, '10969461', 101, 'laptop hp lite', 0),
(8765432, 'jhgfds', 'blanco', 'rojo', 'Bueno', 303, '16198808', 202, '', 1),
(78906432, 'mini laptop procesador atom', 'plastico', 'negro', 'Bueno', 303, '25470091', 109, 'sk-101212', 1),
(2147483647, 'weghe', 'ñ', 'gfd', 'Dañado', 304, '25470091', 101, 'dfgn', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `cod_componente` int(10) NOT NULL,
  `nom_componente` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_componente` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`cod_componente`, `nom_componente`, `tipo_componente`) VALUES
(1, 'Disco Duro', 'Hardware'),
(2, 'Procesador', 'Hardware'),
(3, 'Sistema Operativo', 'Software'),
(4, 'Memoria Ram', 'Hardware'),
(5, 'fuente de poder', 'Hardware');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes-equipo`
--

CREATE TABLE `componentes-equipo` (
  `num_bien` int(10) NOT NULL,
  `serial_componente` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_equipo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia`
--

CREATE TABLE `dependencia` (
  `cod_dependencia` int(10) NOT NULL,
  `nom_dependencia` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `responsable_dep` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dependencia`
--

INSERT INTO `dependencia` (`cod_dependencia`, `nom_dependencia`, `responsable_dep`, `estado`) VALUES
(101, 'Coordinación de Telematicas', 'Alfred tejeria', 1),
(102, 'Decanato', 'maziad el zahuare', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_tecnico`
--

CREATE TABLE `informe_tecnico` (
  `cod_IT` int(10) NOT NULL,
  `descrip_IT` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_IT` date NOT NULL,
  `num_orden` int(10) NOT NULL,
  `estado` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `informe_tecnico`
--

INSERT INTO `informe_tecnico` (`cod_IT`, `descrip_IT`, `fecha_IT`, `num_orden`, `estado`) VALUES
(1, 'avast 7.5??', '2020-05-28', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `cod_marca` int(10) NOT NULL,
  `marca` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`cod_marca`, `marca`) VALUES
(100, 'Microsoft'),
(101, 'vit'),
(102, 'accer'),
(103, 'compaq'),
(104, 'intel'),
(105, 'toshiba'),
(106, 'sony'),
(107, 'assus'),
(109, 'soneview'),
(202, 'hp'),
(87656, 'samsung');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombres_mail` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `correo_mail` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `asunto_mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje_mail` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_mail` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombres_mail`, `correo_mail`, `asunto_mail`, `mensaje_mail`, `fecha_mail`) VALUES
(1, 'pedrito lopez', 'pedrito_lopez@gmail.com', 'este es el asunto señor', 'este es el mensaje que les quiero enviar.', '2018-07-05 00:00:00'),
(2, 'pedrito lopez', 'pedrito_lopez@gmail.com', 'este es el asunto señor', 'este es el mensaje que les quiero enviar.', '2018-07-05 00:00:00'),
(3, 'becky', 'berquis_785@hotmail.com', 'me quiero graduar', 'no se que hago aqui', '2018-07-09 00:00:00'),
(4, 'fefe', 'fefe_nono@gmail.com', 'bzrp', 'esta es una pruebaaa', '2020-05-28 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `cod_modelo` int(10) NOT NULL,
  `modelo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_marca` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `num_orden` int(10) NOT NULL,
  `num_equipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descrip_orden` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `fecha_asignacion_t` date NOT NULL,
  `feccha_cierre` date NOT NULL,
  `cod_tipo_solicitud` int(10) NOT NULL,
  `ci_solicitante` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ci_tecnico` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_orden` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `respuesta_solic` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_resp` date NOT NULL,
  `comentario_final` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`num_orden`, `num_equipo`, `descrip_orden`, `fecha_solicitud`, `fecha_asignacion_t`, `feccha_cierre`, `cod_tipo_solicitud`, `ci_solicitante`, `ci_tecnico`, `estatus_orden`, `respuesta_solic`, `fecha_resp`, `comentario_final`, `estado`) VALUES
(2, '111', 'no enciende', '2018-04-16', '2018-04-17', '0000-00-00', 110, '16198808', '10969461', 'En proceso', '', '0000-00-00', '', 1),
(4, '112', 'necesito instalar Borland C++', '2018-04-17', '2018-06-16', '2018-07-11', 110, '10969461', '10969461', 'Cerrada', '', '0000-00-00', '', 1),
(5, '112', 'requiero una actualizacion de mi antivirus', '2018-04-17', '2018-06-16', '0000-00-00', 111, '10969461', '10969461', 'Cerrada', '', '0000-00-00', '', 1),
(13, '232324', 'no enciende', '2018-06-12', '2018-07-05', '0000-00-00', 112, '10969461', '10969461', 'Cerrada', '', '0000-00-00', '', 1),
(14, '2121', 'no enciende', '2018-06-16', '2018-06-16', '0000-00-00', 112, '24426616', '10969461', 'Asignada', '', '0000-00-00', '', 1),
(15, '2121', 'laptop asd', '2018-06-16', '2018-06-16', '0000-00-00', 112, '24426616', '10969461', 'Asignada', '', '0000-00-00', '', 1),
(16, '2121', 'no me abre las paginas Bancarias', '2018-06-16', '2018-06-16', '0000-00-00', 111, '24426616', '10969461', 'Asignada', '', '0000-00-00', '', 1),
(17, '2121', 'esta es una orden de prueba', '2018-06-29', '2018-06-29', '0000-00-00', 110, '24426616', '10969461', 'Asignada', '', '0000-00-00', '', 1),
(18, '25678', 'esta es una descripcion editada DE UNA ORDEN', '2018-06-30', '2018-07-05', '0000-00-00', 110, '10969461', '10969461', 'En proceso', '', '0000-00-00', '', 1),
(19, '2323', 'asdasdasdasd', '2018-06-30', '0000-00-00', '0000-00-00', 112, '10969461', '2222222', 'En espera', '', '0000-00-00', '', 1),
(20, '23465', 'No arranca la segunda unidad HDD', '2018-07-05', '2018-07-11', '2018-07-11', 110, '25470091', '10969461', 'Cerrada', 'Persiste la falla con el HDD de mi unidad.', '2018-07-11', 'Realice nuevamente una nueva orden.', 1),
(21, '2121', 'no enciende', '2018-07-08', '2018-07-08', '0000-00-00', 111, '24426616', '10969461', 'En proceso', '', '0000-00-00', '', 1),
(23, '2121', 'no enciende', '2018-07-11', '2018-07-11', '0000-00-00', 113, '24426616', '10969461', 'En proceso', '', '0000-00-00', '', 1),
(24, '2121', 'Hola', '2018-07-16', '2018-07-16', '0000-00-00', 111, '24426616', '10969461', 'Asignada', '', '0000-00-00', '', 1),
(25, '11111', 'quierom que vengan a instalar call of dutty', '2020-05-19', '2020-05-19', '0000-00-00', 110, '16198809', '10969461', 'Asignada', '', '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `secuencia` int(10) NOT NULL,
  `componente` int(10) NOT NULL,
  `marca` int(10) NOT NULL,
  `informe` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`secuencia`, `componente`, `marca`, `informe`) VALUES
(25, 5, 110, 0),
(25, 5, 110, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partes_componentes`
--

CREATE TABLE `partes_componentes` (
  `serial_compo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `capacidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descrip_compo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_compo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `obser_compo` text COLLATE utf8_spanish_ci NOT NULL,
  `cod_componente` int(10) NOT NULL,
  `cod_marca` int(10) NOT NULL,
  `modelo` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `partes_componentes`
--

INSERT INTO `partes_componentes` (`serial_compo`, `capacidad`, `descrip_compo`, `estatus_compo`, `obser_compo`, `cod_componente`, `cod_marca`, `modelo`) VALUES
('0', '600 mhz', 'sdms,d,sdm,', 'Dañado', 'dlsdñsd', 2, 107, 'sldñsdlsdd'),
('12567355', '2 GB', 'este es mi 3do componente', 'Bueno', 'este es otro componente', 4, 102, 'asdasd'),
('24116', '4 GB', 'este es mi 2do componente', 'Bueno', 'este es mi 2do componente', 4, 87656, 'f55d2'),
('25606', '4GB', 'Memoria Ram Ddr3 8GB', 'Bueno', 'Memeria RAM Ddr3', 2, 87656, 'cat235'),
('2560678', '1 TB', 'Disco Duro SATA 1 TB', 'Bueno', 'Disco Duro SATA', 1, 87656, 'vx35-1'),
('324156', '320 GB', 'este es mi 1er componente', 'Bueno', 'changeee', 1, 87656, '34efd'),
('89', '4.3', 'sadsd', 'Bueno', 'sadsd', 2, 105, 'dsfdf'),
('999', '600 mhz', 'sda', 'Dañado', 'sdsd', 5, 87656, 'sdsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_componente`
--

CREATE TABLE `tipo_componente` (
  `cod_tipo` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `nom_tipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_componente`
--

INSERT INTO `tipo_componente` (`cod_tipo`, `nom_tipo`) VALUES
('Hardware', 'Hardware'),
('Software', 'Software'),
('Hardware', 'Hardware'),
('Software', 'Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE `tipo_equipo` (
  `cod_tipo_equipo` int(10) NOT NULL,
  `tipo_de_equipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_equipo`
--

INSERT INTO `tipo_equipo` (`cod_tipo_equipo`, `tipo_de_equipo`) VALUES
(303, 'computador'),
(304, 'mobiliario'),
(305, 'redes'),
(306, 'telefonia'),
(307, 'Material de Oficina'),
(308, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo-componente`
--

CREATE TABLE `tipo_equipo-componente` (
  `cod_tipo_equipo` int(10) NOT NULL,
  `cod_componente` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_equipo-componente`
--

INSERT INTO `tipo_equipo-componente` (`cod_tipo_equipo`, `cod_componente`) VALUES
(303, 1),
(303, 1),
(303, 1),
(303, 1),
(303, 2),
(303, 2),
(303, 2),
(303, 2),
(303, 4),
(303, 4),
(303, 4),
(303, 4),
(303, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_orden`
--

CREATE TABLE `tipo_orden` (
  `cod_tipo_orden` int(10) NOT NULL,
  `tipo_orden` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_orden`
--

INSERT INTO `tipo_orden` (`cod_tipo_orden`, `tipo_orden`, `cantidad`) VALUES
(110, 'Instalacion de equipos o programas', 10),
(111, 'Actualización de antivirus', 8),
(112, 'Reparación de equipos', 5),
(113, 'Mantenimiento', 2),
(114, 'Asesoria Tecnica', 0),
(115, 'Redes', 0),
(116, 'Configuracion de equipos o programas', 0),
(117, 'Otro', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `cod_tipo_u` int(10) NOT NULL,
  `tipo_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_u` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`cod_tipo_u`, `tipo_usuario`, `nivel_u`) VALUES
(1, 'general', 1),
(2, 'tecnico', 2),
(3, 'Administrador', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ci_usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nom_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ape_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_dependencia` int(10) NOT NULL,
  `cod_tipo_usuario` int(10) NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `request_token` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ci_usuario`, `nom_usuario`, `ape_usuario`, `cargo`, `correo_usuario`, `cod_dependencia`, `cod_tipo_usuario`, `password`, `estado`, `token`, `request_token`, `created_at`) VALUES
('10969461', 'Emiro', 'Acosta', 'tecnico', 'emirojesus01@gmail.com', 102, 2, 'qwert', 1, '', NULL, '2018-07-01 20:25:13'),
('123456', 'fefe', 'ñoño', 'tecnico', 'fefe_nono@gmail.com', 102, 1, '369369', 1, 'b39162a3c1aab6451fdcc9c4265cbe6ab5f97ea3', NULL, '2020-05-28 05:01:43'),
('16198808', 'reina', 'zavala', 'docente', 'reina.zavala@gmail.com', 101, 3, '1234', 1, '', NULL, '2018-07-01 20:25:13'),
('16198809', 'reina', 'zavala', 'coordinadora', 'reina.zavala@gmail.com', 101, 1, '1234', 1, '2855cd066c78f8320a3fa1bd0d19727bc52f49be', NULL, '2018-07-11 12:44:35'),
('2222222', 'tecprede', 'prede', 'tecnico', 'tech@gmail.com', 102, 2, 'predeterminado', 0, '', NULL, '2018-07-01 20:25:13'),
('24426616', 'Berquismaria', 'Sanchez', 'Desarrollador Web', 'berquissanchezu@gmail.com', 101, 3, 'charlesalejandro', 1, 'd9622129c28b0a4d531fd37e5a77dcbb5168c3ff', '2018-07-11 13:10:57', '2018-07-01 20:25:13'),
('25470091', 'Enderson', 'Acosta', 'Licenciado en Computacion', 'endersona24@gmail.com', 101, 1, '123456', 1, '56ca92c3e8893bbeb1af4e0f472f38f764d73d39', '2018-07-04 20:14:13', '2018-07-02 05:11:10'),
('333333', 'Pedro Pablo', 'Perez', 'tecnico', 'perezpe@gmail.com', 101, 1, '123456', 1, '9fbc46220d62605dd417914c26a4fe742e781ac0', NULL, '2020-05-20 04:40:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bienes`
--
ALTER TABLE `bienes`
  ADD PRIMARY KEY (`num_bien`),
  ADD KEY `ci_usuario` (`ci_usuario`),
  ADD KEY `cod_tipo_equipo` (`cod_tipo_equipo`),
  ADD KEY `cod_marca` (`cod_marca`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`cod_componente`);

--
-- Indices de la tabla `componentes-equipo`
--
ALTER TABLE `componentes-equipo`
  ADD KEY `componente` (`serial_componente`),
  ADD KEY `equipo` (`num_bien`);

--
-- Indices de la tabla `dependencia`
--
ALTER TABLE `dependencia`
  ADD PRIMARY KEY (`cod_dependencia`);

--
-- Indices de la tabla `informe_tecnico`
--
ALTER TABLE `informe_tecnico`
  ADD PRIMARY KEY (`cod_IT`),
  ADD KEY `num_orden` (`num_orden`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`cod_marca`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`cod_modelo`),
  ADD KEY `cod_marca` (`cod_marca`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`num_orden`),
  ADD KEY `ci_tecnico` (`ci_tecnico`),
  ADD KEY `ci_solicitante` (`ci_solicitante`),
  ADD KEY `cod_tipo_solicitud` (`cod_tipo_solicitud`);

--
-- Indices de la tabla `partes_componentes`
--
ALTER TABLE `partes_componentes`
  ADD PRIMARY KEY (`serial_compo`),
  ADD KEY `cod_componente` (`cod_componente`),
  ADD KEY `cod_marca` (`cod_marca`);

--
-- Indices de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  ADD PRIMARY KEY (`cod_tipo_equipo`);

--
-- Indices de la tabla `tipo_equipo-componente`
--
ALTER TABLE `tipo_equipo-componente`
  ADD KEY `cod_tipo_equipo` (`cod_tipo_equipo`,`cod_componente`),
  ADD KEY `cod_componente` (`cod_componente`);

--
-- Indices de la tabla `tipo_orden`
--
ALTER TABLE `tipo_orden`
  ADD PRIMARY KEY (`cod_tipo_orden`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`cod_tipo_u`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ci_usuario`),
  ADD KEY `cod_dependencia` (`cod_dependencia`),
  ADD KEY `cod_tipo_usuario` (`cod_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `informe_tecnico`
--
ALTER TABLE `informe_tecnico`
  MODIFY `cod_IT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bienes`
--
ALTER TABLE `bienes`
  ADD CONSTRAINT `bienes_ibfk_1` FOREIGN KEY (`ci_usuario`) REFERENCES `usuario` (`ci_usuario`),
  ADD CONSTRAINT `bienes_ibfk_2` FOREIGN KEY (`cod_tipo_equipo`) REFERENCES `tipo_equipo` (`cod_tipo_equipo`),
  ADD CONSTRAINT `bienes_ibfk_3` FOREIGN KEY (`cod_marca`) REFERENCES `marca` (`cod_marca`);

--
-- Filtros para la tabla `componentes-equipo`
--
ALTER TABLE `componentes-equipo`
  ADD CONSTRAINT `componentes` FOREIGN KEY (`serial_componente`) REFERENCES `partes_componentes` (`serial_compo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo` FOREIGN KEY (`num_bien`) REFERENCES `bienes` (`num_bien`);

--
-- Filtros para la tabla `informe_tecnico`
--
ALTER TABLE `informe_tecnico`
  ADD CONSTRAINT `informe_tecnico_ibfk_1` FOREIGN KEY (`num_orden`) REFERENCES `orden` (`num_orden`);

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`cod_marca`) REFERENCES `marca` (`cod_marca`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`cod_tipo_solicitud`) REFERENCES `tipo_orden` (`cod_tipo_orden`),
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`ci_solicitante`) REFERENCES `usuario` (`ci_usuario`),
  ADD CONSTRAINT `orden_ibfk_3` FOREIGN KEY (`ci_tecnico`) REFERENCES `usuario` (`ci_usuario`);

--
-- Filtros para la tabla `partes_componentes`
--
ALTER TABLE `partes_componentes`
  ADD CONSTRAINT `partes_componentes_ibfk_1` FOREIGN KEY (`cod_componente`) REFERENCES `componentes` (`cod_componente`),
  ADD CONSTRAINT `partes_componentes_ibfk_2` FOREIGN KEY (`cod_marca`) REFERENCES `marca` (`cod_marca`);

--
-- Filtros para la tabla `tipo_equipo-componente`
--
ALTER TABLE `tipo_equipo-componente`
  ADD CONSTRAINT `tipo_equipo-componente_ibfk_1` FOREIGN KEY (`cod_componente`) REFERENCES `componentes` (`cod_componente`),
  ADD CONSTRAINT `tipo_equipo-componente_ibfk_2` FOREIGN KEY (`cod_tipo_equipo`) REFERENCES `tipo_equipo` (`cod_tipo_equipo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_dependencia`) REFERENCES `dependencia` (`cod_dependencia`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`cod_tipo_usuario`) REFERENCES `tipo_usuario` (`cod_tipo_u`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
