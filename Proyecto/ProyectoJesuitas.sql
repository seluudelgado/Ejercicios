--
-- Base de datos: Jesuitas
--
DROP DATABASE IF EXISTS ProyJesuitas;
CREATE DATABASE IF NOT EXISTS ProyJesuitas DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

--
-- Estructura de tabla para la tabla lugares
--

CREATE TABLE lugares(
  IdLugar smallint UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Nombre varchar(50) UNIQUE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO lugares(Nombre) VALUES
('Madrid'),
('Sicilia'),
('China'),
('Rusia'),
('Chicago'),
('Barcelona');


--
-- Estructura de tabla para la tabla jesuitas
--

CREATE TABLE maquinas(
  IdJesuita smallint UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Ip char(11) NOT NULL UNIQUE,
  IdLugar smallint UNSIGNED NOT NULL,
  NombreAlumno varchar(50),
  Firma varchar(200),
  Password varchar(255),
  constraint fk_idlugar_maquinas
		foreign key (IdLugar) references lugares(IdLugar)
			on delete restrict
			on update cascade
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla visitas
--

CREATE TABLE visitas(
  IdJesuita SMALLINT UNSIGNED NOT NULL,
  IdLugar SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY(IdJesuita, IdLugar),
  constraint fk_idjesuita
		foreign key (IdJesuita) references maquinas(IdJesuita)
			on delete cascade
			on update cascade,
  constraint fk_idlugar_visitas
		foreign key (IdLugar) references lugares(IdLugar)
			on delete cascade
			on update cascade
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla administrador
--

CREATE TABLE administrador(
  IpAdministrador char(11) NOT NULL PRIMARY KEY,
  Password varchar(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT into administrador VALUES ('1.1.1.1', '$2y$10$y1dVACufRhqaHuDdl6ydUuXsd2Q7kLjlETM8c8VOal/H6z4fOH42u');



CREATE TABLE Jesuita(
    IdJesuita smallint UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    Nombre varchar(50),
    Firma varchar(200)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE UNIQUE INDEX NJesuita ON Jesuita (Nombre);

CREATE TABLE informacion_J(
  IdInformacion smallint UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  IdJesuita smallint UNSIGNED NOT NULL,
  Inform varchar(200),
  constraint fk_idjesuitas_informacion
      foreign key (IdJesuita) references Jesuita(IdJesuita)
          on delete cascade
          on update cascade
)ENGINE=InnoDB DEFAULT CHARSET=utf8;




