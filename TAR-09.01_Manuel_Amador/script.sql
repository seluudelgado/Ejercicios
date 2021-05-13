CREATE DATABASE usuarios;

CREATE table usuarios(
	nombre varchar(100) not null,
    correo varchar(100) not null  primary key,
    pass varchar(100) not null
);
INSERT into  usuarios values ('Manuel','manu@gmail.com','12345');
INSERT into  usuarios values ('Oscar','oscar@gmail.com','12345');
INSERT into  usuarios values ('Selu','selu@gmail.com','12345');