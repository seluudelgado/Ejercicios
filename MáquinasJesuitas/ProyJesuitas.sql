--
-- Base de datos: Jesuitas
--
DROP DATABASE IF EXISTS ProyJesuitas;
CREATE DATABASE IF NOT EXISTS ProyJesuitas DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla jesuitas
--

CREATE TABLE maquinas (
  Ip char(11) NOT NULL,
  Lugar varchar(50) NOT NULL,
  IdJesuita smallint UNSIGNED NOT NULL,
  NombreAlumno varchar(50),
  Firma varchar(200),
  Password varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE maquinas ADD INDEX(IdJesuita);

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO maquinas (Ip, Lugar) VALUES
('10.3.43.1', 'Roma'),
('10.3.43.10', 'Azpeitia'),
('10.3.43.11', 'Monserrat'),
('10.3.43.12', 'China'),
('10.3.43.13', 'Goa'),
('10.3.43.14', 'Shanchuan'),
('10.3.43.15', 'Molucas'),
('10.3.43.17', 'Cuquiarachi'),
('10.3.43.18', 'Ensenada'),
('10.3.43.19', 'Guadalupe'),
('10.3.43.2', 'Loyola'),
('10.3.43.20', 'Papúa'),
('10.3.43.23', 'Rosarito'),
('10.3.43.24', 'Rio Grande del Sur'),
('10.3.43.3', 'Manresa'),
('10.3.43.4', 'Malacca'),
('10.3.43.9', 'Jerusalen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE visitas (
  IdVisita smallint UNSIGNED NOT NULL,
  IdJesuita smallint UNSIGNED NOT NULL,
  IpLugar char(11) NOT NULL,
  FechaHora date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- CREATE INDEX idx_idjesuita ON `visitas` (IdJesuita);
-- CREATE INDEX idx_iplugar ON `visitas` (IpLugar); 
--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO visitas (IdVisita, IdJesuita, IpLugar, FechaHora) VALUES
(2, 17, '10.3.43.17', '2021-04-28 12:13:05'),
(3, 8, '10.3.43.14', '2021-04-28 12:24:41'),
(5, 5, '10.3.43.14', '2021-04-28 12:30:27'),
(6, 9, '10.3.43.14', '2021-04-28 12:33:17'),
(7, 17, '10.3.43.24', '2021-04-28 12:34:03'),
(8, 15, '10.3.43.14', '2021-04-28 12:35:00'),
(9, 15, '10.3.43.15', '2021-04-28 12:36:46'),
(11, 18, '10.3.43.17', '2021-04-28 12:37:31'),
(15, 15, '10.3.43.15', '2021-04-28 12:39:32'),
(16, 15, '10.3.43.15', '2021-04-28 12:39:34'),
(17, 15, '10.3.43.15', '2021-04-28 12:39:38');


--
-- Indices de la tabla maquinas
--
ALTER TABLE maquinas
  ADD PRIMARY KEY (Ip);

--
-- Indices de la tabla visitas
--
ALTER TABLE visitas
  ADD PRIMARY KEY (IdVisita),
  ADD KEY FK_VisitaMaquinasID (IdJesuita),
  ADD KEY FK_VisitaMaquinasIP (IpLugar);




--
-- AUTO_INCREMENT de la tabla visitas
--
ALTER TABLE visitas
  MODIFY IdVisita smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

