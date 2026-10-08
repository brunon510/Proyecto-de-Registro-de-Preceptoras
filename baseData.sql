create database moduloIncrip;
use moduloIncrip;
Create table rol (
  id_rol INT primary KEY,
  nombre varchar(50) not null
);

Create table usuario (
  id_usuario INT primary KEY,
  nombre varchar(100) not null,
  apellido varchar(100) not null,
  email varchar(150) not null unique,
  password_hash varchar(255) not null,
  id_rol INT NOT NULL,
  activo boolean default true,
  Foreign key (id_rol) references rol(id_rol)
);

INSERT INTO rol(id_rol, nombre) values
(1, 'admin'),
(2, 'prece');

insert into usuario (id_usuario, nombre, apellido, email, password_hash, id_rol, activo) VAlues
(1,'maria', 'gonzales', 'preceptoria@cen.edu.ar', '$2y$10$abcdefghijklmnopqrstuvn42QIGbPshTUplpNADqiG6QZKntab/C', 2, 1);


UPDATE usuario 
SET password_hash = '$2y$10$FcH.G0YTZPqTja4WAWIA6OncY29zvRwYX5aNfQs6GzI9O.glYEl0.' 
WHERE email = 'preceptoria@cen.edu.ar';