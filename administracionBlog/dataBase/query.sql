create database cooperativaSantaRosaPatutan;

use cooperativaSantaRosaPatutan;

create table cooperativaSantaRosaPatutan.usuarios(
id int auto_increment primary key,
usuario varchar(50) not null,
contraseña varchar(50) not null,
cedula varchar(50) not null,
nombre1 varchar(50) not null,
nombre2 varchar(50),
apellido1 varchar(50) not null,
apellido2 varchar(50),
correo varchar(100),
telefono varchar(50)
);

create table cooperativasantarosapatutan.noticias (
id int auto_increment primary key,
titulo varchar(1000) not null,
descripcion varchar(10000) not null,
id_usuarioIngreso int not null,
id_usuarioElimina int, 
fechaIngreso datetime not null,
ultimaEdicion datetime not null,
fechaEliminado datetime,
destacado boolean not null,
eliminado boolean not null,
clicks int not null,
portadaRuta varchar(1000) not null,
FOREIGN KEY (id_usuarioIngreso) REFERENCES cooperativasantarosapatutan.usuarios(id),
FOREIGN KEY (id_usuarioElimina) REFERENCES cooperativasantarosapatutan.usuarios(id)
);

create table cooperativasantarosapatutan.docuemntos(
id int auto_increment primary key,
rutaImagen varchar(100),
nombreImagen varchar(100),
id_noticia int not null,
FOREIGN KEY (id_noticia) REFERENCES cooperativasantarosapatutan.noticias(id)
);

/*
create table cooperativasantarosapatutan.noticiasDocuemntos(
id int auto_increment primary key,
id_noticia int not null,
id_documento int not null,
FOREIGN KEY (id_noticia) REFERENCES cooperativasantarosapatutan.noticias(id),
FOREIGN KEY (id_documento) REFERENCES cooperativasantarosapatutan.docuemntos(id)
);*/

insert into cooperativasantarosapatutan.usuarios value (
1, 'admin', '123456', '17171717', 'admin1', 'admin2', 'admin3', 'admin4', 'correo', 'telefono' 
);

INSERT INTO cooperativasantarosapatutan.noticias VALUES (
3, 'titulo', 'descripcion', 1, NULL, '2021-09-09 10 10:10:10', '2021-09-09 10 10:10:10', 
NULL, false, false, 2);

INSERT INTO cooperativasantarosapatutan.docuemntos VALUES (
1, 'ruta', 'nombre');

INSERT INTO cooperativasantarosapatutan.noticiasdocuemntos VALUES (
1, 1, 1);