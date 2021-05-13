CREATE DATABASE IF NOT EXISTS usuarios;

USE usuarios;

/*-----------------*/
/* CREACION TABLAS */
/*-----------------*/


	
CREATE TABLE IF NOT EXISTS personal
(
	dni varchar(9) PRIMARY KEY,
	nombre varchar(30) NOT NULL,
	apellidos varchar(30) NOT NULL,
	fechaNac varchar(10) NOT NULL,
	correo varchar(30) NOT NULL,
	telefono varchar(12) NOT NULL,
	movil varchar(12) NOT NULL,
	nExp varchar(14) NOT NULL,
	nota decimal(4,2)NOT NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	
/*-----------------*/	
/*INTRODUCIR DATOS*/
/*-----------------*/

INSERT INTO personal (dni, nombre, apellidos, fechaNac, correo, telefono, movil, nExp, nota) VALUES
('60933468M', 'Juan', 'Perez', '23/12/1964','uno@uno.es', '924222222', '624222222', '123',7),
('31581852T', 'Pedro', 'Gonzalez', '23/02/1979','dos@dos.es', '924223322', '624223322', '281',5),
('15217474F', 'Jacinta', 'Fonseca', '23/12/2005','tres@tres.es', '924222233', '624222233', '1234',7);

