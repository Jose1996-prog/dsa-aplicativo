-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-11-2024 a las 19:15:20
-- Versión del servidor: 10.11.9-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u337956361_saludambiental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_cambio_climatico`
--

CREATE TABLE `asistencia_cambio_climatico` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `encargado_visita` varchar(100) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `dimension` varchar(50) DEFAULT NULL,
  `componente` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `institucion` varchar(100) DEFAULT NULL,
  `rep_institucional` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `correo_elec` varchar(100) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `persona_entrevistada` varchar(100) DEFAULT NULL,
  `cargo_del_entrevistado` varchar(100) DEFAULT NULL,
  `telefono_del_entrevistado` double DEFAULT NULL,
  `correo_elec_entrevistado` varchar(100) DEFAULT NULL,
  `objetivo_de_la_visita` varchar(200) DEFAULT NULL,
  `desarrollo` varchar(1000) DEFAULT NULL,
  `compromisos` varchar(1000) DEFAULT NULL,
  `nombre_funcionario_entidad` varchar(100) DEFAULT NULL,
  `cargo_funcionario_entidad` varchar(50) DEFAULT NULL,
  `nombre_funcionario_departamento` varchar(100) DEFAULT NULL,
  `cargo_funcionario_departamento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asistencia_cambio_climatico`
--

INSERT INTO `asistencia_cambio_climatico` (`id`, `fecha`, `encargado_visita`, `cargo`, `dimension`, `componente`, `municipio`, `institucion`, `rep_institucional`, `direccion`, `correo_elec`, `telefono`, `persona_entrevistada`, `cargo_del_entrevistado`, `telefono_del_entrevistado`, `correo_elec_entrevistado`, `objetivo_de_la_visita`, `desarrollo`, `compromisos`, `nombre_funcionario_entidad`, `cargo_funcionario_entidad`, `nombre_funcionario_departamento`, `cargo_funcionario_departamento`) VALUES
(1, '2024-10-15', 'Jose Arrieta', 'Administrador', '', 'Entrevistador', 'Buenavista', 'Alcaldia de Buenavista', 'Jose Nicolas Arrieta', 'Carrera 15A #36-40', 'alcaldia@buenavista-sucre.gov.co', 3658784, '', '', 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_produccion_limpia`
--

CREATE TABLE `asistencia_produccion_limpia` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `encargado_visita` varchar(100) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `dimension` varchar(50) DEFAULT NULL,
  `componente` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `institucion` varchar(100) DEFAULT NULL,
  `rep_institucional` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `correo_elec` varchar(100) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `persona_entrevistada` varchar(100) DEFAULT NULL,
  `cargo_del_entrevistado` varchar(100) DEFAULT NULL,
  `telefono_del_entrevistado` double DEFAULT NULL,
  `correo_elec_entrevistado` varchar(100) DEFAULT NULL,
  `objetivo_de_la_visita` varchar(200) DEFAULT NULL,
  `desarrollo` varchar(1000) DEFAULT NULL,
  `compromisos` varchar(1000) DEFAULT NULL,
  `nombre_funcionario_entidad` varchar(100) DEFAULT NULL,
  `cargo_funcionario_entidad` varchar(50) DEFAULT NULL,
  `nombre_funcionario_departamento` varchar(100) DEFAULT NULL,
  `cargo_funcionario_departamento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asistencia_produccion_limpia`
--

INSERT INTO `asistencia_produccion_limpia` (`id`, `fecha`, `encargado_visita`, `cargo`, `dimension`, `componente`, `municipio`, `institucion`, `rep_institucional`, `direccion`, `correo_elec`, `telefono`, `persona_entrevistada`, `cargo_del_entrevistado`, `telefono_del_entrevistado`, `correo_elec_entrevistado`, `objetivo_de_la_visita`, `desarrollo`, `compromisos`, `nombre_funcionario_entidad`, `cargo_funcionario_entidad`, `nombre_funcionario_departamento`, `cargo_funcionario_departamento`) VALUES
(1, '2024-10-15', 'Jose Arrieta Acosta', 'Ingeniero de Sistemas', 'Salud ambiental de sucre', 'Evaluador de procedimientos', 'Betulia', 'Secretaria de salud de Sucre', 'Oscar Florez', 'Carrera 15A #36-40', 'Sec.Salud.sucre@gobernacion.gov', 28145667, '', '', 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ins_agua`
--

CREATE TABLE `ins_agua` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `numero_de_inscripcion` varchar(50) DEFAULT NULL,
  `tipo_de_establecimiento` varchar(50) DEFAULT NULL,
  `nombre_comercial_del_objeto` varchar(100) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `lugar_del_establecimiento` varchar(50) DEFAULT NULL,
  `otro` varchar(2) DEFAULT NULL,
  `cual` varchar(100) DEFAULT NULL,
  `direccion_establecimiento` varchar(100) DEFAULT NULL,
  `telefono_establecimiento` double DEFAULT NULL,
  `tipo_de_persona` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) DEFAULT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `documento_de_identificacion` varchar(3) DEFAULT NULL,
  `numero_de_documento` varchar(30) DEFAULT NULL,
  `direccion_de_notificacion` varchar(100) DEFAULT NULL,
  `telefonos` double DEFAULT NULL,
  `correo_electronico_propietario` varchar(100) DEFAULT NULL,
  `el_establecimiento_inspeccionado_por_entidad_salud` varchar(2) DEFAULT NULL,
  `fecha_de_ultima_inspeccion` varchar(20) DEFAULT NULL,
  `ultimo_concepto_sanitario` varchar(100) DEFAULT NULL,
  `establecimiento_inspeccionado_entidad_territorial_salud` varchar(2) DEFAULT NULL,
  `fecha_de_ultima_inspeccion_2` varchar(20) DEFAULT NULL,
  `ultimo_concepto_sanitario_emitio` varchar(100) DEFAULT NULL,
  `dia_laboral_1` varchar(40) DEFAULT NULL,
  `dia_laboral_2` varchar(40) DEFAULT NULL,
  `hora_laboral_1` time DEFAULT NULL,
  `hora_laboral_2` time DEFAULT NULL,
  `dia_laboral_3` varchar(45) DEFAULT NULL,
  `dia_laboral_4` varchar(45) DEFAULT NULL,
  `hora_laboral_3` time DEFAULT NULL,
  `hora_laboral_4` time DEFAULT NULL,
  `nombre_2` varchar(50) DEFAULT NULL,
  `cedula` double DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `nombre_3` varchar(50) DEFAULT NULL,
  `cedula_2` double DEFAULT NULL,
  `cargo_2` varchar(50) DEFAULT NULL,
  `telefono_2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ins_alimentos`
--

CREATE TABLE `ins_alimentos` (
  `id` int(11) NOT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `codigo_divipola_departamento` int(11) DEFAULT NULL,
  `codigo_divipola_municipio` varchar(50) DEFAULT NULL,
  `numero_inscripcion` varchar(100) DEFAULT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `nombre_comercial` varchar(100) DEFAULT NULL,
  `tipo_documento_de_identificacion` varchar(3) DEFAULT NULL,
  `numero_identificacion_tributaria` double DEFAULT NULL,
  `nombre_establecimiento_de_comercio` varchar(50) DEFAULT NULL,
  `nombre_propietario_del_establecimiento` varchar(50) DEFAULT NULL,
  `tipo_documento_per_natural` varchar(3) DEFAULT NULL,
  `numero_de_documento` double DEFAULT NULL,
  `direccion_ubicacion_del_establecimiento` varchar(100) DEFAULT NULL,
  `zona` varchar(10) DEFAULT NULL,
  `barrio` varchar(50) DEFAULT NULL,
  `vereda` varchar(50) DEFAULT NULL,
  `lugar_de_establecimiento` varchar(40) DEFAULT NULL,
  `otro` varchar(2) DEFAULT NULL,
  `cual` varchar(50) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `fax` double DEFAULT NULL,
  `celular` double DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `direccion_de_notificacion_fisica` varchar(100) DEFAULT NULL,
  `direccion_de_notificacion_electronica` varchar(100) DEFAULT NULL,
  `autoriza_la_notificacion_electronica` varchar(2) DEFAULT NULL,
  `municipio_de_direccion_de_notificacion` varchar(50) DEFAULT NULL,
  `departamento_de_direccion_de_notificacion` varchar(50) DEFAULT NULL,
  `preparacion_alimentos` varchar(50) DEFAULT NULL,
  `comedores` varchar(50) DEFAULT NULL,
  `expendio_de_alimentos` varchar(50) DEFAULT NULL,
  `grandes_superficies` varchar(50) DEFAULT NULL,
  `ensamble_de_alimentos` varchar(50) DEFAULT NULL,
  `almacenamiento` varchar(50) DEFAULT NULL,
  `venta_en_via_publica` varchar(50) DEFAULT NULL,
  `expendio_de_bebidas_alcoholicas` varchar(50) DEFAULT NULL,
  `plaza_de_mercado` varchar(50) DEFAULT NULL,
  `establecimiento_inspeccionado_entidad_territorial_salud` varchar(2) DEFAULT NULL,
  `fecha_de_ultima_inspeccion` varchar(50) DEFAULT NULL,
  `ultimo_concepto_sanitario_emitio` varchar(100) DEFAULT NULL,
  `funcionario_que_realiza_la_inspeccion` varchar(100) DEFAULT NULL,
  `observaciones_por_autoridad_sanitaria` varchar(500) DEFAULT NULL,
  `observaciones_por_responsable_de_la_inscripcion` varchar(500) DEFAULT NULL,
  `entregado_por_nombre_completo` varchar(50) DEFAULT NULL,
  `entregado_por_cedula` double DEFAULT NULL,
  `en_calidad_de_responsable` varchar(100) DEFAULT NULL,
  `recibido_por_nombre_completo` varchar(50) DEFAULT NULL,
  `recibido_por_cedula` double DEFAULT NULL,
  `en_calidad_de_funcionario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ins_saneamiento`
--

CREATE TABLE `ins_saneamiento` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `numero_de_inscripcion` varchar(50) DEFAULT NULL,
  `tipo_de_establecimiento` varchar(50) DEFAULT NULL,
  `nombre_comercial_del_objeto` varchar(100) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `lugar_del_establecimiento` varchar(50) DEFAULT NULL,
  `otro` varchar(2) DEFAULT NULL,
  `cual` varchar(100) DEFAULT NULL,
  `direccion_establecimiento` varchar(100) DEFAULT NULL,
  `telefono_establecimiento` double DEFAULT NULL,
  `tipo_de_persona` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) DEFAULT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `documento_de_identificacion` varchar(3) DEFAULT NULL,
  `numero_de_documento` varchar(30) DEFAULT NULL,
  `direccion_de_notificacion` varchar(100) DEFAULT NULL,
  `telefonos` double DEFAULT NULL,
  `correo_electronico_propietario` varchar(100) DEFAULT NULL,
  `el_establecimiento_inspeccionado_por_entidad_salud` varchar(2) DEFAULT NULL,
  `fecha_de_ultima_inspeccion` varchar(20) DEFAULT NULL,
  `ultimo_concepto_sanitario` varchar(100) DEFAULT NULL,
  `establecimiento_inspeccionado_entidad_territorial_salud` varchar(2) DEFAULT NULL,
  `fecha_de_ultima_inspeccion_2` varchar(20) DEFAULT NULL,
  `ultimo_concepto_sanitario_emitio` varchar(100) DEFAULT NULL,
  `dia_laboral_1` varchar(40) DEFAULT NULL,
  `dia_laboral_2` varchar(40) DEFAULT NULL,
  `hora_laboral_1` time DEFAULT NULL,
  `hora_laboral_2` time DEFAULT NULL,
  `dia_laboral_3` varchar(45) DEFAULT NULL,
  `dia_laboral_4` varchar(45) DEFAULT NULL,
  `hora_laboral_3` time DEFAULT NULL,
  `hora_laboral_4` time DEFAULT NULL,
  `nombre_2` varchar(50) DEFAULT NULL,
  `cedula` double DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `nombre_3` varchar(50) DEFAULT NULL,
  `cedula_2` double DEFAULT NULL,
  `cargo_2` varchar(50) DEFAULT NULL,
  `telefono_2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ins_sustancias_quimicas`
--

CREATE TABLE `ins_sustancias_quimicas` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `numero_de_inscripcion` varchar(50) DEFAULT NULL,
  `tipo_de_establecimiento` varchar(50) DEFAULT NULL,
  `nombre_comercial_del_objeto` varchar(100) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `lugar_del_establecimiento` varchar(50) DEFAULT NULL,
  `otro` varchar(2) DEFAULT NULL,
  `cual` varchar(100) DEFAULT NULL,
  `direccion_establecimiento` varchar(100) DEFAULT NULL,
  `telefono_establecimiento` double DEFAULT NULL,
  `tipo_de_persona` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) DEFAULT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `documento_de_identificacion` varchar(3) DEFAULT NULL,
  `numero_de_documento` varchar(30) DEFAULT NULL,
  `direccion_de_notificacion` varchar(100) DEFAULT NULL,
  `telefonos` double DEFAULT NULL,
  `correo_electronico_propietario` varchar(100) DEFAULT NULL,
  `el_establecimiento_inspeccionado_por_entidad_salud` varchar(2) DEFAULT NULL,
  `fecha_de_ultima_inspeccion` varchar(20) DEFAULT NULL,
  `ultimo_concepto_sanitario` varchar(100) DEFAULT NULL,
  `establecimiento_inspeccionado_entidad_territorial_salud` varchar(2) DEFAULT NULL,
  `fecha_de_ultima_inspeccion_2` varchar(20) DEFAULT NULL,
  `ultimo_concepto_sanitario_emitio` varchar(100) DEFAULT NULL,
  `dia_laboral_1` varchar(40) DEFAULT NULL,
  `dia_laboral_2` varchar(40) DEFAULT NULL,
  `hora_laboral_1` time DEFAULT NULL,
  `hora_laboral_2` time DEFAULT NULL,
  `dia_laboral_3` varchar(45) DEFAULT NULL,
  `dia_laboral_4` varchar(45) DEFAULT NULL,
  `hora_laboral_3` time DEFAULT NULL,
  `hora_laboral_4` time DEFAULT NULL,
  `nombre_2` varchar(50) DEFAULT NULL,
  `cedula` double DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `nombre_3` varchar(50) DEFAULT NULL,
  `cedula_2` double DEFAULT NULL,
  `cargo_2` varchar(50) DEFAULT NULL,
  `telefono_2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ins_veo`
--

CREATE TABLE `ins_veo` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `numero_de_inscripcion` varchar(50) DEFAULT NULL,
  `tipo_de_establecimiento` varchar(50) DEFAULT NULL,
  `nombre_comercial_del_objeto` varchar(100) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `lugar_del_establecimiento` varchar(50) DEFAULT NULL,
  `otro` varchar(2) DEFAULT NULL,
  `cual` varchar(100) DEFAULT NULL,
  `direccion_establecimiento` varchar(100) DEFAULT NULL,
  `telefono_establecimiento` double DEFAULT NULL,
  `tipo_de_persona` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) DEFAULT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `documento_de_identificacion` varchar(3) DEFAULT NULL,
  `numero_de_documento` varchar(30) DEFAULT NULL,
  `direccion_de_notificacion` varchar(100) DEFAULT NULL,
  `telefonos` double DEFAULT NULL,
  `correo_electronico_propietario` varchar(100) DEFAULT NULL,
  `el_establecimiento_inspeccionado_por_entidad_salud` varchar(2) DEFAULT NULL,
  `fecha_de_ultima_inspeccion` varchar(20) DEFAULT NULL,
  `ultimo_concepto_sanitario` varchar(100) DEFAULT NULL,
  `establecimiento_inspeccionado_entidad_territorial_salud` varchar(2) DEFAULT NULL,
  `fecha_de_ultima_inspeccion_2` varchar(20) DEFAULT NULL,
  `ultimo_concepto_sanitario_emitio` varchar(100) DEFAULT NULL,
  `dia_laboral_1` varchar(40) DEFAULT NULL,
  `dia_laboral_2` varchar(40) DEFAULT NULL,
  `hora_laboral_1` time DEFAULT NULL,
  `hora_laboral_2` time DEFAULT NULL,
  `dia_laboral_3` varchar(45) DEFAULT NULL,
  `dia_laboral_4` varchar(45) DEFAULT NULL,
  `hora_laboral_3` time DEFAULT NULL,
  `hora_laboral_4` time DEFAULT NULL,
  `nombre_2` varchar(50) DEFAULT NULL,
  `cedula` double DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `nombre_3` varchar(50) DEFAULT NULL,
  `cedula_2` double DEFAULT NULL,
  `cargo_2` varchar(50) DEFAULT NULL,
  `telefono_2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ins_zoonosis`
--

CREATE TABLE `ins_zoonosis` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `numero_de_inscripcion` varchar(50) DEFAULT NULL,
  `tipo_de_establecimiento` varchar(50) DEFAULT NULL,
  `nombre_comercial_del_objeto` varchar(100) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `lugar_del_establecimiento` varchar(50) DEFAULT NULL,
  `otro` varchar(2) DEFAULT NULL,
  `cual` varchar(100) DEFAULT NULL,
  `direccion_establecimiento` varchar(100) DEFAULT NULL,
  `telefono_establecimiento` double DEFAULT NULL,
  `tipo_de_persona` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) DEFAULT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `documento_de_identificacion` varchar(3) DEFAULT NULL,
  `numero_de_documento` varchar(30) DEFAULT NULL,
  `direccion_de_notificacion` varchar(100) DEFAULT NULL,
  `telefonos` double DEFAULT NULL,
  `correo_electronico_propietario` varchar(100) DEFAULT NULL,
  `el_establecimiento_inspeccionado_por_entidad_salud` varchar(2) DEFAULT NULL,
  `fecha_de_ultima_inspeccion` varchar(20) DEFAULT NULL,
  `ultimo_concepto_sanitario` varchar(100) DEFAULT NULL,
  `establecimiento_inspeccionado_entidad_territorial_salud` varchar(2) DEFAULT NULL,
  `fecha_de_ultima_inspeccion_2` varchar(20) DEFAULT NULL,
  `ultimo_concepto_sanitario_emitio` varchar(100) DEFAULT NULL,
  `dia_laboral_1` varchar(40) DEFAULT NULL,
  `dia_laboral_2` varchar(40) DEFAULT NULL,
  `hora_laboral_1` time DEFAULT NULL,
  `hora_laboral_2` time DEFAULT NULL,
  `dia_laboral_3` varchar(45) DEFAULT NULL,
  `dia_laboral_4` varchar(45) DEFAULT NULL,
  `hora_laboral_3` time DEFAULT NULL,
  `hora_laboral_4` time DEFAULT NULL,
  `nombre_2` varchar(50) DEFAULT NULL,
  `cedula` double DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `nombre_3` varchar(50) DEFAULT NULL,
  `cedula_2` double DEFAULT NULL,
  `cargo_2` varchar(50) DEFAULT NULL,
  `telefono_2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ivc_agua`
--

CREATE TABLE `ivc_agua` (
  `item` int(11) NOT NULL,
  `municipio` varchar(30) DEFAULT NULL,
  `fecha_de_visita` varchar(30) DEFAULT NULL,
  `razon_social` varchar(30) DEFAULT NULL,
  `nit_rut_cc` varchar(30) DEFAULT NULL,
  `representante_legal` varchar(30) DEFAULT NULL,
  `documento` varchar(30) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `e_mail` varchar(40) DEFAULT NULL,
  `irabapp` double DEFAULT NULL,
  `nivel_de_riesgo` varchar(30) DEFAULT NULL,
  `bpspp` double DEFAULT NULL,
  `nivel_de_riesgo_2` varchar(30) DEFAULT NULL,
  `quien_realizo_la_visita` varchar(30) DEFAULT NULL,
  `autocontrol` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ivc_agua`
--

INSERT INTO `ivc_agua` (`item`, `municipio`, `fecha_de_visita`, `razon_social`, `nit_rut_cc`, `representante_legal`, `documento`, `telefono`, `e_mail`, `irabapp`, `nivel_de_riesgo`, `bpspp`, `nivel_de_riesgo_2`, `quien_realizo_la_visita`, `autocontrol`) VALUES
(1, 'Corozal', '2024-10-22', 'Veolia Sabana', '830058148-2', 'FABIO ERNESTO ARAQUE DE ÁVILA', 'Documentacion del Sr. Fabio Er', '2771111', 'co.informacion.adesa@veolia.com', 10, 'jhgbvhjgv', 20, 'SIN RIESGO', 'Jose Arrieta Acosta', 'No hubo'),
(5, 'Buenavista', '2024-11-12', 'SERVAF S.A E.S.P', '800.169.470-7', 'José David Garzón Riveros', '98564789', '28456', 'Jose.David@gmail.com', 50, 'RIESGO MEDIO', 50, 'RIESGO MEDIO', 'Jose Arrieta', 'No existe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ivc_alimentos`
--

CREATE TABLE `ivc_alimentos` (
  `id` int(11) NOT NULL,
  `nombre_del_tecnico_saneamiento` varchar(100) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `nombre_de_establecimiento` varchar(50) DEFAULT NULL,
  `nombre_del_representante_legal` varchar(100) DEFAULT NULL,
  `identificacion_cedula_y_o_nit` double DEFAULT NULL,
  `direccion_del_establecimiento` varchar(100) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `categoria_establecimiento` varchar(100) DEFAULT NULL,
  `seleccione_el_tipo_de_establecimiento` varchar(150) DEFAULT NULL,
  `fecha_de_visita_actual` date DEFAULT NULL,
  `concepto_sanitario` varchar(100) DEFAULT NULL,
  `porcentaje_de_cumplimiento` double DEFAULT NULL,
  `motivo_de_la_visita` varchar(150) DEFAULT NULL,
  `verificacion_de_rotulado` varchar(2) DEFAULT NULL,
  `numero_de_rotulados_realizados` int(11) DEFAULT NULL,
  `establecimiento_cuenta_con_la_documentacion_si_no` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ivc_alimentos`
--

INSERT INTO `ivc_alimentos` (`id`, `nombre_del_tecnico_saneamiento`, `municipio`, `nombre_de_establecimiento`, `nombre_del_representante_legal`, `identificacion_cedula_y_o_nit`, `direccion_del_establecimiento`, `area`, `telefono`, `correo_electronico`, `categoria_establecimiento`, `seleccione_el_tipo_de_establecimiento`, `fecha_de_visita_actual`, `concepto_sanitario`, `porcentaje_de_cumplimiento`, `motivo_de_la_visita`, `verificacion_de_rotulado`, `numero_de_rotulados_realizados`, `establecimiento_cuenta_con_la_documentacion_si_no`) VALUES
(2, 'Jose Arrieta', 'Since', 'Punto frio el Nevado de Ruiz', 'Jonathan Romero', 1053801555, 'Carrera 28B #45-12', 'Rural', 2814660, 'Jonathan-romero@hotmail.com', 'Expendio de bebidas alcholicas', 'Puntos frios', '2024-10-11', 'Desfavorable', 90, 'Programacion', 'Si', 2, 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ivc_entorno`
--

CREATE TABLE `ivc_entorno` (
  `id` int(11) NOT NULL,
  `nombres_tecnico_de_saneamiento` varchar(150) DEFAULT NULL,
  `municipio` varchar(20) DEFAULT NULL,
  `mes_actividades_a_reportar` varchar(20) DEFAULT NULL,
  `formato_caracterizacion_a_reportar` varchar(50) DEFAULT NULL,
  `fecha_de_la_visita_vivienda` date DEFAULT NULL,
  `tipo_de_vivienda` varchar(30) DEFAULT NULL,
  `nombre_cabeza_de_hogar` varchar(100) DEFAULT NULL,
  `n_habitantes_por_vivienda` int(11) DEFAULT NULL,
  `direccion_vivienda` varchar(100) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `viviendo_construida_lugar_seguro_101` varchar(30) DEFAULT NULL,
  `vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102` varchar(30) DEFAULT NULL,
  `uso_de_combustible_103` varchar(30) DEFAULT NULL,
  `cocina_separada_los_banos_y_habitaciones_104` varchar(30) DEFAULT NULL,
  `cuenta_iluminacion_ventilacion_105` varchar(30) DEFAULT NULL,
  `cuenta_agua_tratada_201` varchar(30) DEFAULT NULL,
  `vivie_agua_consumir_recipientes_tapados_elevados_piso_202` varchar(30) DEFAULT NULL,
  `los_recipientes_almacenar_agua_limpio_203` varchar(30) DEFAULT NULL,
  `estado_almacenamiento_agua_204` varchar(30) DEFAULT NULL,
  `vivienda_cuenta_servicios_bano_301` varchar(30) DEFAULT NULL,
  `cuenta_con_letrina_302` varchar(30) DEFAULT NULL,
  `banos_estan_limpio_303` varchar(30) DEFAULT NULL,
  `aguas_residuales_drenan_canales_tuberias_305` varchar(30) DEFAULT NULL,
  `recipientes_adecuadamente_ubicados_con_tapa_401` varchar(30) DEFAULT NULL,
  `vivienda_esta_aseada_402` varchar(30) DEFAULT NULL,
  `separan_los_residuo_403` varchar(30) DEFAULT NULL,
  `basureros_cerca_de_la_vivienda_404` varchar(30) DEFAULT NULL,
  `presencia_plagas_en_vivienda_501` varchar(30) DEFAULT NULL,
  `vivienda_realiza_jornada_recojer_inservibles_502` varchar(30) DEFAULT NULL,
  `vivienda_construida_materiales_impiden_entrada_plagas_503` varchar(30) DEFAULT NULL,
  `productos_quimicos_almacenados_rotulados_504` varchar(30) DEFAULT NULL,
  `cocina_esta_limpia_602` varchar(30) DEFAULT NULL,
  `espacios_dialogo_normas_convivencia_conflictos_vivien_701` varchar(30) DEFAULT NULL,
  `actividades_comunitarias_proyecto_viviendas_saludables_702` varchar(30) DEFAULT NULL,
  `utilizan_plan_economia_familiar_703` varchar(30) DEFAULT NULL,
  `fecha_de_visita_institucion` date DEFAULT NULL,
  `tipo_de_institucion_educativa` varchar(30) DEFAULT NULL,
  `nombre_institucion_educativa` varchar(30) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `direccion_institucion` varchar(100) DEFAULT NULL,
  `nombre_del_rector` varchar(100) DEFAULT NULL,
  `n_de_cedula_de_ciudadania` double DEFAULT NULL,
  `n_de_estudiantes_en_la_institucion` double DEFAULT NULL,
  `institucion_construida_lugar_seguro_101` varchar(30) DEFAULT NULL,
  `institcion_paredes_techos_no_tienen_huecos_ni_grietas_102` varchar(30) DEFAULT NULL,
  `uso_de_combustible_en_el_comedor_escolar_103` varchar(30) DEFAULT NULL,
  `comedor_escolar_esta_separado_de_los_banos_y_salones_104` varchar(30) DEFAULT NULL,
  `institucion_cuenta_con_iluminacion_ventilacion_105` varchar(30) DEFAULT NULL,
  `cuenta_con_agua_tratada_201` varchar(30) DEFAULT NULL,
  `inst_agua_consumir_recipientes_tapados_elevados_piso_202` varchar(30) DEFAULT NULL,
  `recipientes_para_almacenar_el_agua_estan_limpios_203` varchar(30) DEFAULT NULL,
  `estado_del_almacenamiento_del_agua_204` varchar(30) DEFAULT NULL,
  `institucion_cuenta_con_servicios_de_bano_301` varchar(30) DEFAULT NULL,
  `banos_estan_limpios_303` varchar(30) DEFAULT NULL,
  `aguas_residuales_drenan_por_canales_o_tuberias_305` varchar(30) DEFAULT NULL,
  `recipientes_residuos_ubicados_recipiente_tapa_401` varchar(30) DEFAULT NULL,
  `institucion_esta_aseada_402` varchar(30) DEFAULT NULL,
  `institucion_separa_los_residuos_403` varchar(30) DEFAULT NULL,
  `basureros_cerca_de_la_institucion_404` varchar(30) DEFAULT NULL,
  `presencia_de_plagas_en_la_institucion__roedores_insectos_501` varchar(30) DEFAULT NULL,
  `institucion_realiza_jornada_para_recoger_inservibles_502` varchar(30) DEFAULT NULL,
  `productos_quimicos_utilizados_bien_almacenados_rotulados_504` varchar(30) DEFAULT NULL,
  `alimentos_del_comedor_estan_bien_manipulados_601` varchar(30) DEFAULT NULL,
  `cocina_del_comedor_esta_limpia_602` varchar(30) DEFAULT NULL,
  `espacios_dialogo_normas_convivencia_conflictos_inst_701` varchar(30) DEFAULT NULL,
  `actividades_comunitarias_proyecto_escuelas_saludables_702` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ivc_entorno`
--

INSERT INTO `ivc_entorno` (`id`, `nombres_tecnico_de_saneamiento`, `municipio`, `mes_actividades_a_reportar`, `formato_caracterizacion_a_reportar`, `fecha_de_la_visita_vivienda`, `tipo_de_vivienda`, `nombre_cabeza_de_hogar`, `n_habitantes_por_vivienda`, `direccion_vivienda`, `telefono`, `viviendo_construida_lugar_seguro_101`, `vivienda_paredes_techos_no_tienen_huecos_ni_grietas_102`, `uso_de_combustible_103`, `cocina_separada_los_banos_y_habitaciones_104`, `cuenta_iluminacion_ventilacion_105`, `cuenta_agua_tratada_201`, `vivie_agua_consumir_recipientes_tapados_elevados_piso_202`, `los_recipientes_almacenar_agua_limpio_203`, `estado_almacenamiento_agua_204`, `vivienda_cuenta_servicios_bano_301`, `cuenta_con_letrina_302`, `banos_estan_limpio_303`, `aguas_residuales_drenan_canales_tuberias_305`, `recipientes_adecuadamente_ubicados_con_tapa_401`, `vivienda_esta_aseada_402`, `separan_los_residuo_403`, `basureros_cerca_de_la_vivienda_404`, `presencia_plagas_en_vivienda_501`, `vivienda_realiza_jornada_recojer_inservibles_502`, `vivienda_construida_materiales_impiden_entrada_plagas_503`, `productos_quimicos_almacenados_rotulados_504`, `cocina_esta_limpia_602`, `espacios_dialogo_normas_convivencia_conflictos_vivien_701`, `actividades_comunitarias_proyecto_viviendas_saludables_702`, `utilizan_plan_economia_familiar_703`, `fecha_de_visita_institucion`, `tipo_de_institucion_educativa`, `nombre_institucion_educativa`, `nit`, `direccion_institucion`, `nombre_del_rector`, `n_de_cedula_de_ciudadania`, `n_de_estudiantes_en_la_institucion`, `institucion_construida_lugar_seguro_101`, `institcion_paredes_techos_no_tienen_huecos_ni_grietas_102`, `uso_de_combustible_en_el_comedor_escolar_103`, `comedor_escolar_esta_separado_de_los_banos_y_salones_104`, `institucion_cuenta_con_iluminacion_ventilacion_105`, `cuenta_con_agua_tratada_201`, `inst_agua_consumir_recipientes_tapados_elevados_piso_202`, `recipientes_para_almacenar_el_agua_estan_limpios_203`, `estado_del_almacenamiento_del_agua_204`, `institucion_cuenta_con_servicios_de_bano_301`, `banos_estan_limpios_303`, `aguas_residuales_drenan_por_canales_o_tuberias_305`, `recipientes_residuos_ubicados_recipiente_tapa_401`, `institucion_esta_aseada_402`, `institucion_separa_los_residuos_403`, `basureros_cerca_de_la_institucion_404`, `presencia_de_plagas_en_la_institucion__roedores_insectos_501`, `institucion_realiza_jornada_para_recoger_inservibles_502`, `productos_quimicos_utilizados_bien_almacenados_rotulados_504`, `alimentos_del_comedor_estan_bien_manipulados_601`, `cocina_del_comedor_esta_limpia_602`, `espacios_dialogo_normas_convivencia_conflictos_inst_701`, `actividades_comunitarias_proyecto_escuelas_saludables_702`) VALUES
(2, 'JOSE ARRIETA', 'Buenavista', 'Octubre', 'FORMATO DE CARACTERIZACION DE VIVIENDAS', '2024-10-15', 'Urbana', 'Johana del Castillo', 3, 'Carrera 15A #36-40', 28456578, 'SIN RIEGO (VERDE)', 'SIN RIESGO (VERDE)', 'SIN RIESGO (VERDE)', 'SIN RIESGO (VERDE)', 'SIN RIESGO (VERDE)', '', '', '', 'Sucre', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2024-10-15', 'Urbana', '', '0', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ivc_saneamiento`
--

CREATE TABLE `ivc_saneamiento` (
  `id` int(11) NOT NULL,
  `nombre_del_tecnico_saneamiento` varchar(100) DEFAULT NULL,
  `municipio` varchar(30) DEFAULT NULL,
  `categoria_establecimiento` varchar(50) DEFAULT NULL,
  `tipo_de_establecimiento` varchar(100) DEFAULT NULL,
  `motivo_de_la_visita` varchar(100) DEFAULT NULL,
  `fecha_visita_actual` date DEFAULT NULL,
  `nombre_del_establecimiento` varchar(100) DEFAULT NULL,
  `direccion_del_establecimiento` varchar(100) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `tipo_de_persona` varchar(20) DEFAULT NULL,
  `nombre_del_representante_legal` varchar(100) DEFAULT NULL,
  `identificacion_cedula` double DEFAULT NULL,
  `nit_del_establecimiento` varchar(2) DEFAULT NULL,
  `digite_el_nit` varchar(20) DEFAULT NULL,
  `porcentaje_de_cumplimiento` float DEFAULT NULL,
  `concepto_sanitario` varchar(50) DEFAULT NULL,
  `numero_de_visita` varchar(20) DEFAULT NULL,
  `establecimiento_cuenta_con_la_documentacion` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ivc_saneamiento`
--

INSERT INTO `ivc_saneamiento` (`id`, `nombre_del_tecnico_saneamiento`, `municipio`, `categoria_establecimiento`, `tipo_de_establecimiento`, `motivo_de_la_visita`, `fecha_visita_actual`, `nombre_del_establecimiento`, `direccion_del_establecimiento`, `area`, `telefono`, `correo`, `tipo_de_persona`, `nombre_del_representante_legal`, `identificacion_cedula`, `nit_del_establecimiento`, `digite_el_nit`, `porcentaje_de_cumplimiento`, `concepto_sanitario`, `numero_de_visita`, `establecimiento_cuenta_con_la_documentacion`) VALUES
(2, 'carlos', 'Chalan', 'Comercial', '', 'Programacion', '2024-11-12', '', '', 'Rural', 0, '', 'Natural', '', 0, 'Si', '0', 0, 'Favorable (95 al 100%)', 'Visita 1', 'Si'),
(3, 'Jose Arrieta', 'El Roble', 'Comercial', 'Establecimiento de mercadeo', 'Programacion', '2024-10-02', 'D1', 'Carrera 15A #36-40', 'Rural', 0, 'cacerescamilo572@gmail.com', 'Juridica', 'Nelson Roman', 9874562145, 'Si', '459465745', 60, 'Favorable (95 al 100%)', 'Visita 1', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ivc_sustancias_quimicas`
--

CREATE TABLE `ivc_sustancias_quimicas` (
  `id` int(11) NOT NULL,
  `tecnico_saneamiento` varchar(50) DEFAULT NULL,
  `fecha_visita` date DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `tipo_de_establecimiento` varchar(100) DEFAULT NULL,
  `nombre_del_establecimiento` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo` varchar(80) DEFAULT NULL,
  `area` varchar(10) DEFAULT NULL,
  `nombre_del_representante_legal` varchar(100) DEFAULT NULL,
  `cedula` double DEFAULT NULL,
  `nit` double DEFAULT NULL,
  `tipo_de_persona` varchar(30) DEFAULT NULL,
  `documentacion` varchar(2) DEFAULT NULL,
  `motivo_de_la_visita` varchar(50) DEFAULT NULL,
  `cumplimiento_porcentaje` float DEFAULT NULL,
  `concepto_sanitario` varchar(50) DEFAULT NULL,
  `numero_visitas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ivc_sustancias_quimicas`
--

INSERT INTO `ivc_sustancias_quimicas` (`id`, `tecnico_saneamiento`, `fecha_visita`, `municipio`, `categoria`, `tipo_de_establecimiento`, `nombre_del_establecimiento`, `direccion`, `telefono`, `correo`, `area`, `nombre_del_representante_legal`, `cedula`, `nit`, `tipo_de_persona`, `documentacion`, `motivo_de_la_visita`, `cumplimiento_porcentaje`, `concepto_sanitario`, `numero_visitas`) VALUES
(1, 'Jose M. Acosta', '2024-11-15', 'Sincelejo', 'Servicios', 'PELUQUERIA', 'Peluqueria Miriam', 'Carrera 15A #36-40', '28145567', 'peluqueria.miriam@gmail.com', 'Urbana', 'Miriam Rojas', 987445762, 312354687, 'Natural', 'Si', 'Programacion', 0, 'Favorable (95 al 100%)', 'Visita 1'),
(3, 'Jose Arrieta', '2024-10-15', 'Los Palmitos', 'Fabricas', 'Productos Lacteos', 'Coolechera Los Palmitos', 'Carrera 15A #36-40', '28145567', 'coolechera-los-palmitos@hotmail.com', 'Rural', 'Jonathan Romero', 0, NULL, 'Natural', 'Si', 'Programacion', 0, 'Favorable (95 al 100%)', 'Visita 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ivc_veo`
--

CREATE TABLE `ivc_veo` (
  `id` int(11) NOT NULL,
  `nombre_del_tecnico_saneamiento` varchar(100) DEFAULT NULL,
  `fecha_visita` date DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `categoria_establecimiento` varchar(50) DEFAULT NULL,
  `tipo_de_establecimiento` varchar(50) DEFAULT NULL,
  `nombre_del_establecimiento` varchar(100) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `nombre_del_representante_legal` varchar(100) DEFAULT NULL,
  `cedula` double DEFAULT NULL,
  `nit` double DEFAULT NULL,
  `tipo_de_persona` varchar(50) DEFAULT NULL,
  `cuenta_con_la_documentacion` varchar(50) DEFAULT NULL,
  `motivo_de_la_visita` varchar(50) DEFAULT NULL,
  `porcentaje_de_cumplimiento` float DEFAULT NULL,
  `concepto_sanitario` varchar(50) DEFAULT NULL,
  `visitas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ivc_veo`
--

INSERT INTO `ivc_veo` (`id`, `nombre_del_tecnico_saneamiento`, `fecha_visita`, `municipio`, `categoria_establecimiento`, `tipo_de_establecimiento`, `nombre_del_establecimiento`, `direccion`, `telefono`, `correo`, `area`, `nombre_del_representante_legal`, `cedula`, `nit`, `tipo_de_persona`, `cuenta_con_la_documentacion`, `motivo_de_la_visita`, `porcentaje_de_cumplimiento`, `concepto_sanitario`, `visitas`) VALUES
(3, 'Jose Arrieta', '2024-10-15', 'Buenavista', 'Expendedores de plaguicidas', 'Venda de quimicos organofosforados', 'Toxinas y plaguicidas, Buenavista', 'Carrera 15A #36-40', '320584698', 'Toxinas&plaguicidas-Buenavista.hotmail.com', 'Rural', 'Jonathan Roman', 0, 0, 'Natural', 'Si', 'Programacion', 0, 'Favorable (95 al 100%)', 'Visita 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ivc_zoonosis`
--

CREATE TABLE `ivc_zoonosis` (
  `id` int(11) NOT NULL,
  `codigo` int(11) DEFAULT NULL,
  `municipio` varchar(30) DEFAULT NULL,
  `numero_de_inscripcion` double DEFAULT NULL,
  `nombre_del_establecimiento` varchar(100) DEFAULT NULL,
  `nombre_del_propietario` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `tipo_de_establecimiento` varchar(50) DEFAULT NULL,
  `consultorio_veter` varchar(1) DEFAULT NULL,
  `clinicas_veter` varchar(1) DEFAULT NULL,
  `guarderia_veter` varchar(1) DEFAULT NULL,
  `agropecuarias` varchar(1) DEFAULT NULL,
  `venta_de_alimentos_concentrado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ivc_zoonosis`
--

INSERT INTO `ivc_zoonosis` (`id`, `codigo`, `municipio`, `numero_de_inscripcion`, `nombre_del_establecimiento`, `nombre_del_propietario`, `direccion`, `tipo_de_establecimiento`, `consultorio_veter`, `clinicas_veter`, `guarderia_veter`, `agropecuarias`, `venta_de_alimentos_concentrado`) VALUES
(2, 355, 'Since', 2015487, 'Agropecuaria Pecas', 'Camilo Romero Caceres', 'Carrera 40A #30-04', 'AGROPECUARIA', '', '', '', 'X', 'X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_agua`
--

CREATE TABLE `users_agua` (
  `id` int(11) NOT NULL,
  `usuario` varchar(5) DEFAULT NULL,
  `contrasenha` int(11) DEFAULT NULL,
  `agua` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_agua`
--

INSERT INTO `users_agua` (`id`, `usuario`, `contrasenha`, `agua`) VALUES
(1, 'admin', 1023, 'agua'),
(2, 'agua', 4567, 'agua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_alimentos`
--

CREATE TABLE `users_alimentos` (
  `id` int(11) NOT NULL,
  `usuario` varchar(5) DEFAULT NULL,
  `contrasenha` int(4) DEFAULT NULL,
  `alimentos` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_alimentos`
--

INSERT INTO `users_alimentos` (`id`, `usuario`, `contrasenha`, `alimentos`) VALUES
(1, 'admin', 1023, 'alimentos'),
(2, 'alime', 2389, 'alimentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_climatico`
--

CREATE TABLE `users_climatico` (
  `id` int(11) NOT NULL,
  `usuario` varchar(5) DEFAULT NULL,
  `contrasenha` int(4) DEFAULT NULL,
  `climatico` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_climatico`
--

INSERT INTO `users_climatico` (`id`, `usuario`, `contrasenha`, `climatico`) VALUES
(1, 'admin', 1023, 'climatico'),
(2, 'clima', 2975, 'climatico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_entorno`
--

CREATE TABLE `users_entorno` (
  `id` int(11) NOT NULL,
  `usuario` varchar(5) DEFAULT NULL,
  `contrasenha` int(4) DEFAULT NULL,
  `entorno` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_entorno`
--

INSERT INTO `users_entorno` (`id`, `usuario`, `contrasenha`, `entorno`) VALUES
(1, 'admin', 1023, 'entorno'),
(2, 'entor', 6842, 'entorno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_produccion`
--

CREATE TABLE `users_produccion` (
  `id` int(11) NOT NULL,
  `usuario` varchar(5) DEFAULT NULL,
  `contrasenha` int(4) DEFAULT NULL,
  `produccion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_produccion`
--

INSERT INTO `users_produccion` (`id`, `usuario`, `contrasenha`, `produccion`) VALUES
(1, 'admin', 1023, 'produccion'),
(2, 'produ', 1486, 'produccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_saneamiento`
--

CREATE TABLE `users_saneamiento` (
  `id` int(11) NOT NULL,
  `usuario` varchar(5) DEFAULT NULL,
  `contrasenha` int(4) DEFAULT NULL,
  `saneamiento` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_saneamiento`
--

INSERT INTO `users_saneamiento` (`id`, `usuario`, `contrasenha`, `saneamiento`) VALUES
(1, 'admin', 1023, 'saneamiento'),
(2, 'sanea', 9132, 'saneamiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_sustancias`
--

CREATE TABLE `users_sustancias` (
  `id` int(11) NOT NULL,
  `usuario` varchar(5) DEFAULT NULL,
  `contrasenha` int(4) DEFAULT NULL,
  `sustancias` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_sustancias`
--

INSERT INTO `users_sustancias` (`id`, `usuario`, `contrasenha`, `sustancias`) VALUES
(1, 'admin', 1023, 'sustancias'),
(2, 'susta', 8745, 'sustancias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_veo`
--

CREATE TABLE `users_veo` (
  `id` int(11) NOT NULL,
  `usuario` varchar(5) DEFAULT NULL,
  `contrasenha` int(4) DEFAULT NULL,
  `veo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_veo`
--

INSERT INTO `users_veo` (`id`, `usuario`, `contrasenha`, `veo`) VALUES
(1, 'admin', 1023, 'veo'),
(2, 'veo', 4578, 'veo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_zoonosis`
--

CREATE TABLE `users_zoonosis` (
  `id` int(11) NOT NULL,
  `usuario` varchar(5) DEFAULT NULL,
  `contrasenha` int(4) DEFAULT NULL,
  `zoonosis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_zoonosis`
--

INSERT INTO `users_zoonosis` (`id`, `usuario`, `contrasenha`, `zoonosis`) VALUES
(1, 'admin', 1023, 'zoonosis'),
(2, 'zoono', 5910, 'zoonosis');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia_cambio_climatico`
--
ALTER TABLE `asistencia_cambio_climatico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asistencia_produccion_limpia`
--
ALTER TABLE `asistencia_produccion_limpia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ins_agua`
--
ALTER TABLE `ins_agua`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ins_alimentos`
--
ALTER TABLE `ins_alimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ins_saneamiento`
--
ALTER TABLE `ins_saneamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ins_sustancias_quimicas`
--
ALTER TABLE `ins_sustancias_quimicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ins_veo`
--
ALTER TABLE `ins_veo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ins_zoonosis`
--
ALTER TABLE `ins_zoonosis`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ivc_agua`
--
ALTER TABLE `ivc_agua`
  ADD PRIMARY KEY (`item`);

--
-- Indices de la tabla `ivc_alimentos`
--
ALTER TABLE `ivc_alimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ivc_entorno`
--
ALTER TABLE `ivc_entorno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ivc_saneamiento`
--
ALTER TABLE `ivc_saneamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ivc_sustancias_quimicas`
--
ALTER TABLE `ivc_sustancias_quimicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ivc_veo`
--
ALTER TABLE `ivc_veo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ivc_zoonosis`
--
ALTER TABLE `ivc_zoonosis`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_agua`
--
ALTER TABLE `users_agua`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_alimentos`
--
ALTER TABLE `users_alimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_climatico`
--
ALTER TABLE `users_climatico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_entorno`
--
ALTER TABLE `users_entorno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_produccion`
--
ALTER TABLE `users_produccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_saneamiento`
--
ALTER TABLE `users_saneamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_sustancias`
--
ALTER TABLE `users_sustancias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_veo`
--
ALTER TABLE `users_veo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_zoonosis`
--
ALTER TABLE `users_zoonosis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia_cambio_climatico`
--
ALTER TABLE `asistencia_cambio_climatico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `asistencia_produccion_limpia`
--
ALTER TABLE `asistencia_produccion_limpia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ins_agua`
--
ALTER TABLE `ins_agua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ins_alimentos`
--
ALTER TABLE `ins_alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ins_saneamiento`
--
ALTER TABLE `ins_saneamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ins_sustancias_quimicas`
--
ALTER TABLE `ins_sustancias_quimicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ins_veo`
--
ALTER TABLE `ins_veo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ins_zoonosis`
--
ALTER TABLE `ins_zoonosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ivc_agua`
--
ALTER TABLE `ivc_agua`
  MODIFY `item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ivc_alimentos`
--
ALTER TABLE `ivc_alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ivc_entorno`
--
ALTER TABLE `ivc_entorno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ivc_saneamiento`
--
ALTER TABLE `ivc_saneamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ivc_sustancias_quimicas`
--
ALTER TABLE `ivc_sustancias_quimicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ivc_veo`
--
ALTER TABLE `ivc_veo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ivc_zoonosis`
--
ALTER TABLE `ivc_zoonosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
