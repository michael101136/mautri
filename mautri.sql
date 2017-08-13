-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2017 a las 18:04:59
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mautri`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_alquiler` ()  BEGIN
SELECT tnicho.id_nicho,tdifunto.fecha_fallecimiento,id_nicho_detalle,tresponsable.idresponsable,tdifunto.id_difunto,nombrepasaje,categoria,nombre_cuartel,numero_nicho,nivel,tdifunto.nombre as tnombre,tdifunto.apellido as tapellido,tresponsable.Dni_responsable,tresponsable.nombre_responsable,tresponsable.apellido_responsable ,fecha_inicio,fecha_final,EstadoA,CONCAT("S/ ",tnicho_detalle.MontoAlquiler) as  MontoAlquiler FROM tnicho INNER JOIN tcuartel ON tnicho.id_cuartel=tcuartel.id_cuartel INNER JOIN tcategoria on tcategoria.id_categoria=tcuartel.id_categoria INNER JOIN pasaje ON pasaje.id_pasaje=tcuartel.id_pasaje INNER JOIN tnicho_detalle ON tnicho_detalle.id_nicho=tnicho.id_nicho INNER JOIN tdifunto ON tnicho_detalle.id_difunto=tdifunto.id_difunto INNER JOIN tresponsable ON tresponsable.idresponsable=tdifunto.idresponsable
where tnicho.estado=1  ORDER BY id_nicho_detalle DESC
;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_DifuntoBaja` ()  BEGIN
SELECT tnicho.id_nicho,tdifunto.fecha_fallecimiento,id_nicho_detalle,tresponsable.idresponsable,tdifunto.id_difunto,nombrepasaje,categoria,nombre_cuartel,numero_nicho,nivel,tdifunto.nombre as tnombre,tdifunto.apellido as tapellido,tresponsable.Dni_responsable,tresponsable.nombre_responsable,tresponsable.apellido_responsable ,fecha_inicio,fecha_final,EstadoA,CONCAT("S/ ",tnicho_detalle.MontoAlquiler) as  MontoAlquiler FROM tnicho INNER JOIN tcuartel ON tnicho.id_cuartel=tcuartel.id_cuartel INNER JOIN tcategoria on tcategoria.id_categoria=tcuartel.id_categoria INNER JOIN pasaje ON pasaje.id_pasaje=tcuartel.id_pasaje INNER JOIN tnicho_detalle ON tnicho_detalle.id_nicho=tnicho.id_nicho INNER JOIN tdifunto ON tnicho_detalle.id_difunto=tdifunto.id_difunto INNER JOIN tresponsable ON tresponsable.idresponsable=tdifunto.idresponsable
where tnicho_detalle.Estado_AD=1  ORDER BY id_nicho_detalle DESC
;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarprecios` (IN `id_cuartel` INT(8), IN `nivel` INT, IN `precio` FLOAT, IN `precioRenovacion` FLOAT)  begin
UPDATE tnicho inner join tcuartel on tcuartel.id_cuartel=tnicho.id_cuartel 
SET tnicho.precio =precio,
	tnicho.precio_renovacion =precioRenovacion
WHERE tcuartel.id_cuartel=id_cuartel and tnicho.nivel=nivel;   
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_alquiler_c` (IN `Dni_responsable` INT(8), IN `nombre_responsable` VARCHAR(200), IN `apellido_responsable` VARCHAR(120), IN `Direccion_responsable` VARCHAR(120), IN `nombre` VARCHAR(120), IN `apellido` VARCHAR(120), IN `fecha_entierro` DATE, IN `id_usuario` INT(11), IN `id_nicho` INT(11), IN `fecha_inicio` DATE, IN `fecha_final` DATE, IN `Detalle_alquiler` VARCHAR(200), IN `MontoAlquiler` FLOAT(8))  begin
DECLARE  fechaHI DATE;
DECLARE  fechaHF DATE;
DECLARE estado int; DECLARE EstadoA int;  DECLARE Estado_AD int;
set estado=1; set EstadoA=1; set Estado_AD=1; 	insert into tresponsable(Dni_responsable,nombre_responsable,apellido_responsable,Direccion_responsable) values (Dni_responsable,nombre_responsable,apellido_responsable,Direccion_responsable);
    SET @ultimoresponsable:=(SELECT MAX(idresponsable) FROM tresponsable);
	insert into tdifunto(nombre,apellido,fecha_fallecimiento,estado,idresponsable,id_usuario) values (nombre,apellido,fecha_fallecimiento,estado,@ultimoresponsable,id_usuario);
	SET @ultimodifunto:=(SELECT MAX(id_difunto) FROM tdifunto);	
    insert into tnicho_detalle(id_difunto,id_nicho,fecha_inicio,fecha_final,EstadoA,Estado_AD,Detalle_alquiler,MontoAlquiler) values (@ultimodifunto,id_nicho,fecha_inicio,fecha_final,EstadoA,Estado_AD,Detalle_alquiler,MontoAlquiler);
	SET @ultimonichodetalle:=(SELECT MAX(id_nicho_detalle) FROM tnicho_detalle);	
    SET fechaHI=fecha_inicio;
    SET fechaHF=fecha_final;
	insert into thistorial(id_nicho_detalle,fechaih,fechafh) values (@ultimonichodetalle,fechaHI,fechaHF);
UPDATE tnicho
SET tnicho.estado =1
WHERE tnicho.id_nicho=id_nicho;  
  
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ControlAlquiler` ()  BEGIN
UPDATE tnicho_detalle set EstadoA='0' where (CURRENT_TIMESTAMP>fecha_final);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ControlAlquilerRenovar` ()  BEGIN
UPDATE tnicho_detalle set EstadoA='1' where (CURRENT_TIMESTAMP<fecha_final);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cuartel_r` ()  BEGIN
SELECT tcuartel.id_cuartel, tcategoria.categoria, pasaje.nombrepasaje,tcuartel.nombre_cuartel FROM tcuartel inner join pasaje on tcuartel.id_pasaje=pasaje.id_pasaje inner join tcategoria on tcuartel.id_categoria=tcategoria.id_categoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_factura` ()  BEGIN
SET @ultimoiddetalle:=(SELECT MAX(tnicho_detalle.id_nicho_detalle) FROM tnicho_detalle);
SELECT nombrepasaje,categoria,nombre_cuartel,numero_nicho,nivel,CONCAT(tdifunto.nombre," ",tdifunto.apellido) as nombre,CONCAT(tresponsable.nombre_responsable," ",tresponsable.apellido_responsable) as responsable,fecha_inicio,fecha_final,EstadoA,CONCAT("S/ ",tnicho_detalle.MontoAlquiler) as  MontoAlquiler FROM tnicho INNER JOIN tcuartel ON tnicho.id_cuartel=tcuartel.id_cuartel INNER JOIN tcategoria on tcategoria.id_categoria=tcuartel.id_categoria INNER JOIN pasaje ON pasaje.id_pasaje=tcuartel.id_pasaje INNER JOIN tnicho_detalle ON tnicho_detalle.id_nicho=tnicho.id_nicho INNER JOIN tdifunto ON tnicho_detalle.id_difunto=tdifunto.id_difunto INNER JOIN tresponsable ON tresponsable.idresponsable=tdifunto.idresponsable where tnicho_detalle.id_nicho_detalle=@ultimoiddetalle;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_gant_r` ()  BEGIN
SELECT duration,id,open,parent,progress,sortorder,DATE_FORMAT(start_date,"%d-%m-%Y") AS start_date,text  FROM gantt_tasks;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_nichos` (IN `id_cuartel` INT(8), IN `nivel` INT(8))  begin SELECT* FROM tnicho
WHERE tnicho.id_cuartel=id_cuartel and tnicho.nivel=nivel;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_nichos_r` ()  BEGIN
SELECT tcuartel.nombre_cuartel,tnicho.numero_nicho,tnicho.nivel from tcuartel inner join tnicho on tcuartel.id_cuartel=tnicho.id_cuartel;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_niveles` (IN `id_cuartel` INT(8))  begin 
    SELECT DISTINCT nivel FROM tnicho 
    WHERE tnicho.id_cuartel=id_cuartel ORDER BY  nivel ASC;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reportecaja` (IN `fecha1` DATE, IN `fecha2` DATE)  BEGIN
SELECT nombrepasaje,categoria,nombre_cuartel,numero_nicho,nivel,CONCAT(tdifunto.nombre," ",tdifunto.apellido) as nombre,CONCAT(tresponsable.nombre_responsable," ",tresponsable.apellido_responsable) as responsable,fecha_inicio,fecha_final,EstadoA,tnicho_detalle.MontoAlquiler as  MontoAlquiler FROM tnicho INNER JOIN tcuartel ON tnicho.id_cuartel=tcuartel.id_cuartel INNER JOIN tcategoria on tcategoria.id_categoria=tcuartel.id_categoria INNER JOIN pasaje ON pasaje.id_pasaje=tcuartel.id_pasaje INNER JOIN tnicho_detalle ON tnicho_detalle.id_nicho=tnicho.id_nicho INNER JOIN tdifunto ON tnicho_detalle.id_difunto=tdifunto.id_difunto INNER JOIN tresponsable ON tresponsable.idresponsable=tdifunto.idresponsable where tnicho_detalle.fecha_inicio BETWEEN fecha1 and fecha2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reportenichosdisponibles` ()  BEGIN
select pasaje.nombrepasaje,tcategoria.categoria, tcuartel.nombre_cuartel, tnicho.numero_nicho, tnicho.nivel from tnicho inner join tcuartel on tcuartel.id_cuartel=tnicho.id_cuartel inner join pasaje on tcuartel.id_pasaje=pasaje.id_pasaje inner join tcategoria on tcategoria.id_categoria=tcuartel.id_categoria where tnicho.estado=0 LIMIT 1000;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reportevencidos` ()  BEGIN
select tcuartel.nombre_cuartel,tnicho.numero_nicho, concat(tdifunto.nombre,' ',tdifunto.apellido)as nombre, tnicho_detalle.fecha_inicio, tnicho_detalle.fecha_final, concat('VENCIDO') as Estado from tnicho_detalle inner join tnicho on tnicho.id_nicho=tnicho_detalle.id_nicho inner join tcuartel on tcuartel.id_cuartel=tnicho.id_cuartel inner join tdifunto on tdifunto.id_difunto=tnicho_detalle.id_difunto where tnicho_detalle.EstadoA=0 ORDER BY(tcuartel.nombre_cuartel) DESC
;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarios` ()  begin 
    SELECT* FROM usuarios;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarios_u` (IN `id_user` VARCHAR(120), IN `nombres` VARCHAR(200), IN `apellidos` VARCHAR(200), IN `email` VARCHAR(120), IN `tipo_usuario` VARCHAR(120))  begin 
    UPDATE usuarios SET nombres=nombres,apellidos=apellidos,email=email,tipo_usuario=tipo_usuario 
    WHERE id_usuario=id_user;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario_c` (IN `nombres` VARCHAR(200), IN `apellidos` VARCHAR(200), IN `email` VARCHAR(120), IN `password` VARCHAR(120), IN `tipo_usuario` VARCHAR(120))  begin
	insert into usuarios(nombres,apellidos,email,password,tipo_usuario,photo) values (nombres,apellidos,email,password,tipo_usuario,'');
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tipo_usuario` varchar(100) NOT NULL,
  `photo` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellidos`, `email`, `password`, `tipo_usuario`, `photo`) VALUES
(41, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrador', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
