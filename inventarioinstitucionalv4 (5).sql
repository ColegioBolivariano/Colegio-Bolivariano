-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2024 a las 05:44:22
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventarioinstitucionalv4`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DATOS_DASHBOARD` ()  BEGIN
	DECLARE
		CARRERAS FLOAT;
	DECLARE
		REGISTROS FLOAT;
	DECLARE
		USUARIOS FLOAT;
	
		
		SET CARRERAS = (select COUNT(*)  from carreras  );
		SET REGISTROS = (select COUNT(*) from inventario );
		SET USUARIOS =(select COUNT(*)  from usuarios pc );

		
	SELECT
	  
		IFNULL(CARRERAS,0) as carreras,
		IFNULL(REGISTROS,0) as registros,
	  IFNULL(USUARIOS,0) as usuarios;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_CARRERAS` ()  SELECT carre_id , carre_descripcion, carre_estado, '' as opciones FROM carreras ORDER BY carre_descripcion$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_INVENTARIO` (IN `carre_id` INT)  SELECT
	i.inv_id, 
	c.carre_descripcion, 
	i.inv_modulo, 
	i.inv_cod_patrimonial, 
	i.inv_denominacion, 
	i.inv_marca, 
	i.inv_modelo, 
	i.inv_serie, 
	i.inv_color, 
	i.inv_estado, 
	i.inv_valor, 
	i.inv_otros, 
	i.inv_observacion,
	'' as opciones,
	i.carre_id,
	i.id_mod_carre,
	mc.descripcion
	
FROM
	inventario i 
	INNER JOIN carreras c 
	ON i.carre_id = c.carre_id
	INNER JOIN moduloscarrera mc 
	ON i.id_mod_carre = mc.id_mod_carre
	
WHERE
	i.carre_id = carre_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_INVENTARIO_ADMIN` ()  NO SQL
SELECT
	i.inv_id, 
	c.carre_descripcion, 
	i.inv_modulo, 
	i.inv_cod_patrimonial, 
	i.inv_denominacion, 
	i.inv_marca, 
	i.inv_modelo, 
	i.inv_serie, 
	i.inv_color, 
	i.inv_estado, 
	i.inv_valor, 
	i.inv_otros, 
	i.inv_observacion,
	'' as opciones,
	i.carre_id,
	i.id_mod_carre,
	mc.descripcion
	
FROM
	inventario i INNER JOIN carreras c
	ON i.carre_id = c.carre_id
	INNER JOIN moduloscarrera mc on
 i.id_mod_carre =  mc.id_mod_carre$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_USUARIOS` ()  SELECT
	u.id_usuario,
	u.nombre_usuario,
	u.apellido_usuario,
	-- CONCAT_WS(' ', usuarios.nombre_usuario,usuarios.apellido_usuario) as nombre, 
	u.usuario, 
	u.clave,
	u.id_perfil_usuario, 
	p.descripcion, 
	u.estado,
	'' as opciones,
	u.carre_id,
	c.carre_descripcion,
	u.dni,
	u.cargo,
	u.dependencia,
	u.correo,
	u.celular,
	u.organo,
	u.ubicacion,
	u.direccion
FROM
	usuarios u
	INNER JOIN perfiles p ON u.id_perfil_usuario = p.id_perfil
	INNER JOIN carreras c on u.carre_id = c.carre_id
		
		ORDER BY u.id_usuario ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_OBTENER_DATA_EMPRESA` ()  SELECT
	empresa.confi_id, 
	empresa.confi_razon, 
	empresa.confi_ruc, 
	empresa.confi_direccion, 
	empresa.confi_correlativo, 
	empresa.config_correo,
	empresa.config_moneda,
	empresa.imagen
FROM
	empresa$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RESUMEN_INVENTARIO` ()  SELECT 
    c.carre_descripcion as carrera, 
    GROUP_CONCAT(DISTINCT i.inv_modulo ORDER BY i.inv_modulo ASC SEPARATOR ', ') as modulo, 
    COUNT(i.carre_id) as contid 
FROM 
    inventario i 
INNER JOIN 
    carreras c on i.carre_id = c.carre_id 
GROUP BY 
    c.carre_descripcion$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `carre_id` int(11) NOT NULL,
  `carre_descripcion` varchar(255) DEFAULT NULL,
  `carre_estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`carre_id`, `carre_descripcion`, `carre_estado`) VALUES
(1, 'Direccion', 'Activo'),
(2, 'Subdireccion', 'Activo'),
(3, 'Secretaria', 'Activo'),
(4, 'Almacen', 'Activo'),
(5, 'Deportes y Musica', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `confi_id` int(25) NOT NULL,
  `confi_razon` varchar(255) DEFAULT NULL,
  `confi_ruc` varchar(40) DEFAULT NULL,
  `confi_direccion` varchar(255) DEFAULT NULL,
  `confi_correlativo` varchar(8) DEFAULT NULL,
  `config_correo` varchar(50) DEFAULT NULL,
  `config_celular` varchar(50) DEFAULT NULL,
  `config_moneda` varchar(3) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`confi_id`, `confi_razon`, `confi_ruc`, `confi_direccion`, `confi_correlativo`, `config_correo`, `config_celular`, `config_moneda`, `imagen`) VALUES
(1, 'Colegio Bolivariano 56008', '1020304050', 'Av. San Felipe SN', '0000000', 'ColBolivariano@gmail.com', '922804671', 'und', '6434f416872f0_145.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `inv_id` int(11) NOT NULL,
  `carre_id` int(11) NOT NULL,
  `inv_modulo` varchar(25) NOT NULL,
  `inv_item` varchar(10) DEFAULT NULL,
  `inv_cod_patrimonial` varchar(255) DEFAULT NULL,
  `inv_denominacion` varchar(255) DEFAULT NULL,
  `inv_marca` varchar(255) DEFAULT NULL,
  `inv_modelo` varchar(255) DEFAULT NULL,
  `inv_serie` varchar(255) DEFAULT NULL,
  `inv_color` varchar(255) DEFAULT NULL,
  `inv_estado` varchar(255) DEFAULT NULL,
  `inv_valor` varchar(255) DEFAULT NULL,
  `inv_otros` varchar(255) DEFAULT NULL,
  `inv_observacion` varchar(255) DEFAULT NULL,
  `inv_fecha` datetime DEFAULT NULL,
  `id_mod_carre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`inv_id`, `carre_id`, `inv_modulo`, `inv_item`, `inv_cod_patrimonial`, `inv_denominacion`, `inv_marca`, `inv_modelo`, `inv_serie`, `inv_color`, `inv_estado`, `inv_valor`, `inv_otros`, `inv_observacion`, `inv_fecha`, `id_mod_carre`) VALUES
(1, 1, 'Biblioteca', '', '746408300003', 'COMPUTADORA', 'MAR', 'moel', 'CND03903VC', 'PLOMO', 'BUENO', 'va', 'OTR', 'OBS', NULL, 2),
(2, 1, 'Biblioteca', NULL, '544545', 'dfgfgdg', 'm', 'm', 'se', 'co', 'buen', 'v', 'OOOO', 'DFGFDGDFGDFG', '2023-04-11 16:08:11', 2),
(7, 1, 'Equipos Tecnologicos', NULL, '34234234', 'dsfsdf', 'mm', 'mo', 'se', 'negro', 'bueno', 'v', 'SDF', 'SDFSDFSDFSDF', '2023-04-19 11:36:51', 1),
(8, 2, 'Equipos De Musica', NULL, '544545asd', 'sdasd', 'asd', 'aaa', 'aa', 'ss', 'ss', 'vvv', 'ASD', 'ASDASDASD', '2023-04-19 13:01:02', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `modulo` varchar(255) DEFAULT NULL,
  `padre_id` int(25) DEFAULT NULL,
  `vista` varchar(11) DEFAULT NULL,
  `icon_menu` varchar(50) DEFAULT NULL,
  `orden` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `modulo`, `padre_id`, `vista`, `icon_menu`, `orden`) VALUES
(1, 'Tablero Principal', 0, 'dashboard.php', 'fas fa-tachometer-alt', '0'),
(11, 'Datos Institucionales', 0, 'configuracion.php', 'fas fa-landmark', '1'),
(12, 'Usuarios', 14, 'usuario.php', 'far fa-user', '10'),
(13, 'Modulos y Perfiles', 14, 'modulos_perfiles.php', 'fas fa-tablet-alt', '11'),
(14, 'Mantenimiento', 0, NULL, 'fas fa-cogs', '9'),
(48, 'Movimientos', 0, '', 'fa fa-exchange-alt', '2'),
(49, 'Areas', 48, 'areas.php', 'fas fa-check-circle nav-icon', '3'),
(50, 'Inventario', 48, 'inventario.php', 'fas fa-check-circle nav-icon', '5'),
(51, 'Reporte Admin', 48, 'reportes.php', 'fas fa-check-circle nav-icon', '7'),
(52, 'Reportes', 48, 'report_usu.php', 'fas fa-check-circle nav-icon', '6'),
(53, 'Inventario Admin', 48, 'invent_admin.php', 'fas fa-check-circle nav-icon', '8'),
(54, 'Modulos', 48, 'moduloscarrera.php', 'fas fa-check-circle nav-icon', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moduloscarrera`
--

CREATE TABLE `moduloscarrera` (
  `id_mod_carre` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `moduloscarrera`
--

INSERT INTO `moduloscarrera` (`id_mod_carre`, `descripcion`, `estado`) VALUES
(1, 'Equipos Tecnologicos', '1'),
(2, 'Biblioteca', '1'),
(3, 'Muebles', '1'),
(4, 'Equipos De Musica', '1');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion`, `estado`) VALUES
(1, 'Administrador', 1),
(2, 'Usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_modulo`
--

CREATE TABLE `perfil_modulo` (
  `idperfil_modulo` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `vista_inicio` tinyint(4) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `perfil_modulo`
--

INSERT INTO `perfil_modulo` (`idperfil_modulo`, `id_perfil`, `id_modulo`, `vista_inicio`, `estado`) VALUES
(174, 1, 13, 0, 1),
(494, 1, 1, 1, 1),
(495, 1, 11, 0, 1),
(496, 1, 49, 0, 1),
(497, 1, 48, 0, 1),
(498, 1, 50, 0, 1),
(499, 1, 52, 0, 1),
(500, 1, 51, 0, 1),
(501, 1, 53, 0, 1),
(502, 1, 12, 0, 1),
(503, 1, 14, 0, 1),
(504, 1, 54, 0, 1),
(505, 2, 50, 1, 1),
(506, 2, 48, 0, 1),
(507, 2, 52, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `apellido_usuario` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` text NOT NULL,
  `id_perfil_usuario` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `carre_id` int(11) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `dependencia` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `organo` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `usuario`, `clave`, `id_perfil_usuario`, `estado`, `carre_id`, `dni`, `cargo`, `dependencia`, `correo`, `celular`, `organo`, `ubicacion`, `direccion`) VALUES
(1, 'Franco', 'Champi Mamani', 'Franco', '$2a$07$azybxcags23425sdg23sdeWdBD5K/WLuiEyQ3M9yIJwhDvhbblzKK', 1, 1, 1, '76140203', 'asist', 'de', 'frg6@', '914990682', 'or', 'u', 'dd'),
(4, 'Gualberto', 'Ccoa Quispe', 'Gualberto', '$2a$07$azybxcags23425sdg23sdeRvgCxvDmLqgrZKPgRg0GoTVc.pRZ4/m', 2, 1, 2, '34343', 'asit', 'fdepe', 'prtt@gmail.com', '3434', 'or', 'ubbbbb', '5 de febrer');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`carre_id`) USING BTREE;

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`confi_id`) USING BTREE;

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`inv_id`) USING BTREE,
  ADD KEY `carre_id` (`carre_id`) USING BTREE;

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `moduloscarrera`
--
ALTER TABLE `moduloscarrera`
  ADD PRIMARY KEY (`id_mod_carre`) USING BTREE;

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`) USING BTREE;

--
-- Indices de la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  ADD PRIMARY KEY (`idperfil_modulo`) USING BTREE,
  ADD KEY `id_perfil` (`id_perfil`) USING BTREE,
  ADD KEY `id_modulo` (`id_modulo`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`) USING BTREE,
  ADD KEY `id_perfil_usuario` (`id_perfil_usuario`) USING BTREE,
  ADD KEY `carre_id` (`carre_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `carre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `confi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `moduloscarrera`
--
ALTER TABLE `moduloscarrera`
  MODIFY `id_mod_carre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  MODIFY `idperfil_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`carre_id`) REFERENCES `carreras` (`carre_id`);

--
-- Filtros para la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  ADD CONSTRAINT `perfil_modulo_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`),
  ADD CONSTRAINT `perfil_modulo_ibfk_2` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_perfil_usuario`) REFERENCES `perfiles` (`id_perfil`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`carre_id`) REFERENCES `carreras` (`carre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
