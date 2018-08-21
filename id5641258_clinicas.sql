-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-08-2018 a las 23:50:16
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id5641258_clinicas`
--
CREATE DATABASE IF NOT EXISTS id5641258_clinicas;
USE id5641258_clinicas;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `nombres`, `titulo`, `descripcion`, `imagen`) VALUES
(1, 'Cardiología', 'Cardiólogos', '¿Necesitas un Cardiologo(a)?', 'Rama de la medicina encargada del estudio, diagnóstico y tratamiento de las enfermedades del corazón.', 'Cardiologia.png'),
(2, 'Dermatología', 'Dermatólogos', '¿Necesitas un Dermatologo(a)?', 'Especialidad médica encargada del estudio de la estructura y función de la piel.', 'Dermatologia.png'),
(3, 'Ginecología', 'Ginecólogos', '¿Necesitas un Ginecologo(a)?', 'Parte de la medicina que se ocupa del aparato genital femenino y sus enfermedades.', 'Ginecologia.png'),
(4, 'Medicina General', 'Médicos', '¿Necesitas un Médico General?', 'Encargada de mantener la salud en todos los aspectos, estudiando el cuerpo humano en forma global.', 'General.png'),
(5, 'Odontogía', 'Odontólogos', '¿Necesitas un Odontologo(a)?', 'Ciencia de la salud encargada tratamiento y prevención de las enfermedades de los dientes.', 'Odontologia.png'),
(6, 'Otorrinolaringología', 'Otorrinolaringólogos', '¿Necesitas un Otorrinolaringologo(a)?', 'Especialidad médica que se encarga del estudio del oído, de las vías respiratorias superiores e inferiores.', 'Otorrino.png'),
(7, 'Pediatría', 'Pediatras', '¿Necesitas un Pediatra?', 'Parte de la medicina que se ocupa del estudio del crecimiento y el desarrollo de los niños hasta la adolescencia.', 'Pediatria.png'),
(8, 'Psicología', 'Psicólogos', '¿Necesitas un Psicologo?', 'La Psicología es la ciencia que estudia la conducta humana, así como los procesos mentales.', 'Psicologia.png'),
(9, 'Oftalmología', 'Oftalmólogos', '¿Necesitas un Oftalmólogo?', 'Parte de la medicina que estudia el ojo y se ocupa de sus enfermedades.', 'Oftalmologia.png'),
(10, 'Ortopedía', 'Ortopedas', '¿Necesitas un Ortopeda?', 'Especialidad médica que trata lesiones y enfermedades del sistema musculo esquelético del cuerpo humano.', 'Ortopedia.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id_registro` int(100) NOT NULL,
  `nombre_clinica` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `especialidad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `horario` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `latitud` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitud` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default.jpg',
  `destino` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'imagenkodaxweb/'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id_registro`, `nombre_clinica`, `nombre`, `correo`, `contrasena`, `especialidad`, `direccion`, `horario`, `telefono`, `latitud`, `longitud`, `foto`, `destino`) VALUES
(10, 'Clinica', 'Delmy Cruz', 'correo@yahoo.es', '$2y$10$dnt5eGe4zw7MAgpzJ949Keliw0H8yXvnBWUOQlvbMYIMBeR8web0m', '4', 'danli el paraiso', '9:00', 77889944, '13.8641876991395', '-86.55900029853365', 'default.jpg', 'imagenkodaxweb/'),
(13, 'Clinica # 2', 'Dell Cruz', 'd@yahoo.com', '$2y$10$8OXZAkjGR2OaEowK86qzeOalHQT0I54CIaAiiiEtjLjugOCQxW4kC', '7', 'El Paraiso', 'Lunes  a Viernes 24 horas', 96047917, '0.0', '0.0', 'default.jpg', 'imagenkodaxweb/'),
(14, 'Danlí', 'Katling Jolibeth Jimenez', 'jimenez@gmail.com', '$2y$10$/ya.aA/w7t4976hfW6z1guYFSeYFh39OLX9HyJuSDhDqG/zKEiCfK', '2', 'Colonia Cofradia, Danli', 'Lunes  a Viernes de 8:00 am a ', 96581840, '14.047699808817145', '-86.56069805098014', 'dsc_9181.jpg', 'imagenkodaxweb/dsc_9181.jpg'),
(15, 'nombre clinica2', 'nombre medico', 'correo@live.es', '$2y$10$GtfWlAyMSfsb1AT5uZaSV.rgYkdD0QzkEwylWIbhfKNLkLiPKmNee', '3', 'El Paraiso', '9:00', 77777777, '14.559936725364652', '-87.64902196372071', 'call-of-duty-black-ops-21.jpg', 'imagenkodaxweb/mancha_de_sangre_png_by_theonlytheexeption-d55virp.png'),
(16, 'Clínica Tu Necesidad', 'Ossiris Cruz', 'ossirisq@yahoo.com', '$2y$10$.0TPaqWT5l9AKfT3cTLkPOEV0r9hgYh8k11cGcsIxmqvtIwlpLSFi', '9', 'El Paraiso', 'Lunes a Viernes 12 horas', 96047917, '14.127389851612413', '-86.77300800733809', 'IMG-20170812-WA0004.jpg', 'imagenkodaxweb/img-20170812-wa0004.jpg'),
(17, 'KytDye', 'Keytling Jimenez', 'keyt@gmail.com', '$2y$10$P4ZN/J2vlWvCUa4/.ZyuhOenxAQoj0e4teFUj0e9/EOOv7hAud0ge', '7', 'Colonia Cofradia, Danli', 'Lunes  a Viernes de 8:00 am a ', 96867388, '14.043209760140122', '-86.57009525364231', 'default.jpg', 'imagenkodaxweb/'),
(18, 'hhhhhhhhh', 'hhhhhhhhh', 'keyt@gmail.com', '$2y$10$4zlyxS2FEAJFypTTCTJzQewtwoH0sUy8gdMqOet3fmf6agOIBNUc6', '2', 'Colonia Cofradia, Danli', 'Lunes  a Viernes de 8:00 am a ', 96581840, '14.03671439096457', '-86.57009004568738', 'default.jpg', 'imagenkodaxweb/'),
(19, 'Trojes', 'Joustin Bustillo', 'joustin@gmail.com', '$2y$10$5IX06ePh/60gkB2wxRZYOelEYJJVI6eo0E4QpLZPIDAr9Bs9Tch66', '2', 'B° El Centro, Trojes', 'Lunes  a Viernes de 8:00 am a ', 96867388, '13.987710972677117', '-86.39498907124022', 'zona-10-alquilo-clinicas-medicas_63dc56067b_3.jpg', 'imagenkodaxweb/zona-10-alquilo-clinicas-medicas_63dc56067b_3.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_registro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id_registro` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
