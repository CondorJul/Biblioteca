CREATE DATABASE Biblioteca;
USE Biblioteca;

create table pais(
	idp int auto_increment,
	pais varchar(50),
    primary key(idp)
);

insert into pais(pais) values('Peru');

create table departamento(
	idd int auto_increment,
    departamento varchar(50),
    idp int not null,
    primary key(idd),
    foreign key(idp) references pais(idp)
);

insert into departamento(departamento, idp) values('Lima', 1);
insert into departamento(departamento, idp) values('Huanuco', 1);
insert into departamento(departamento, idp) values('Junin', 1);
insert into departamento(departamento, idp) values('Pasco', 1);
insert into departamento(departamento, idp) values('Ucayali', 1);


create table provincia(
	idpr int auto_increment,
    provincia varchar(50),
    idd int not null,
    primary key(idpr),
    foreign key(idd) references departamento(idd)
);

/*provinvias de pasco*/
insert into provincia(provincia, idd) values('Pasco', 4);
insert into provincia(provincia, idd) values('Oxapampa', 4);
insert into provincia(provincia, idd) values('Daniel Alcides Carrion', 4);

/*provinvias de huanuco*/
insert into provincia(provincia, idd) values('Ambo', 2);
insert into provincia(provincia, idd) values('Dos de Mayo', 2);
insert into provincia(provincia, idd) values('Huacaybamba', 2);
insert into provincia(provincia, idd) values('Huamalies', 2);
insert into provincia(provincia, idd) values('Huanuco', 2);
insert into provincia(provincia, idd) values('Lauricocha', 2);
insert into provincia(provincia, idd) values('Leoncio Prado', 1);
insert into provincia(provincia, idd) values('Marañon', 2);
insert into provincia(provincia, idd) values('Pachitea', 2);
insert into provincia(provincia, idd) values('Puerto Inca', 2);
insert into provincia(provincia, idd) values('Oxapampa', 2);
insert into provincia(provincia, idd) values('Yarowilca', 2);

create table distrito(
	iddi int auto_increment,
    distrito varchar(100),
    idpr int not null,
    primary key(iddi),
    foreign key(idpr) references provincia(idpr)
);

/*Distrito de DAC*/
insert into distrito(distrito, idpr) values('Chacayan', 3);
insert into distrito(distrito, idpr) values('Goyllarisquizga', 3);
insert into distrito(distrito, idpr) values('Paucar', 3);
insert into distrito(distrito, idpr) values('San Pedro de Pillao', 3);
insert into distrito(distrito, idpr) values('Santa Ana de Tusi', 3);
insert into distrito(distrito, idpr) values('Tapuc', 3);
insert into distrito(distrito, idpr) values('Vilcabamba', 3);
insert into distrito(distrito, idpr) values('Yanahuanca', 3);

/*Distrito de oxampampa*/
insert into distrito(distrito, idpr) values('Chontabamba', 2);
insert into distrito(distrito, idpr) values('Huancabamba', 2);
insert into distrito(distrito, idpr) values('Oxapampa', 2);
insert into distrito(distrito, idpr) values('Palcazu', 2);
insert into distrito(distrito, idpr) values('Pozuzo', 2);
insert into distrito(distrito, idpr) values('Puerto Bermudez', 2);
insert into distrito(distrito, idpr) values('Villa Rica', 2);

/*Distrito de Pasco*/
insert into distrito(distrito, idpr) values('Chaupimarca', 1);
insert into distrito(distrito, idpr) values('Huachon', 1);
insert into distrito(distrito, idpr) values('Huarica', 1);
insert into distrito(distrito, idpr) values('Huayllay', 1);
insert into distrito(distrito, idpr) values('Ninacaca', 1);
insert into distrito(distrito, idpr) values('Pallanchacra', 1);
insert into distrito(distrito, idpr) values('Paucartambo', 1);
insert into distrito(distrito, idpr) values('San Francisco de Asis de Yarusyacan', 1);
insert into distrito(distrito, idpr) values('Simon Bolivar', 1);
insert into distrito(distrito, idpr) values('Ticlacayan', 1);
insert into distrito(distrito, idpr) values('Tinyahuarco', 1);
insert into distrito(distrito, idpr) values('Vicco', 1);
insert into distrito(distrito, idpr) values('Yanacancha', 1);

/*Distrito de ambo*/
insert into distrito(distrito, idpr) values('Ambo', 1);
insert into distrito(distrito, idpr) values('Cayna', 1);
insert into distrito(distrito, idpr) values('Colpas', 1);
insert into distrito(distrito, idpr) values('Conchamarca', 1);
insert into distrito(distrito, idpr) values('Huacar', 1);
insert into distrito(distrito, idpr) values('San Francisco', 1);
insert into distrito(distrito, idpr) values('San Rafael', 1);
insert into distrito(distrito, idpr) values('Tomay Kichwa', 1);

/*Distrito de dos de mayo*/
insert into distrito(distrito, idpr) values('Chuquis', 2);
insert into distrito(distrito, idpr) values('La Union', 2);
insert into distrito(distrito, idpr) values('Marias', 2);
insert into distrito(distrito, idpr) values('Pachas', 2);
insert into distrito(distrito, idpr) values('Quivilla', 2);
insert into distrito(distrito, idpr) values('Ripan', 2);
insert into distrito(distrito, idpr) values('Shunqui', 2);
insert into distrito(distrito, idpr) values('Sillapata', 2);
insert into distrito(distrito, idpr) values('Yanas', 2);


create table usuario(
	idUsuario INT auto_increment,
    cod_matricula varchar(10) null unique,
    dni varchar(8) not null unique unique,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    rol varchar(50) not null,
    email varchar(100) not null,
    contrasena varchar(200) not null,
    fech_nacimiento date not null,
    sexo varchar(50) not null,
    direccion varchar(200)not null,
    celular varchar(9) null,
    primary key(idUsuario)
);

create table editorial(
	idEditorial int auto_increment,
    nom_editorial varchar(100) not null,
    ciudad varchar(50) null,
    primary key(idEditorial)
);
	
create table autor(
	idAutor int auto_increment,
    nom_autor varchar(100) not null,
    nacionalidad varchar(50) not null,
    primary key(idAutor)
);

create table libro(
	idLibro int auto_increment,
    titulo varchar(200) not null,
    materia varchar(100) null,
    num_ejemplar int not null,
    num_paginas int not null,
    edicion varchar(50) not null,
    anno int not null,
    disponible varchar(100) not null,
    descripcion varchar(500),
    imagen longblob,
    tipoimg varchar(50),
    archivo longblob,
    tipoarchivo varchar(50),
    idAutor int not null,
    idEditorial int not null,
    primary key(idLibro),
    foreign key(idAutor) references autor(idAutor),
    foreign key(idEditorial) references editorial(idEditorial)
);

create table prestamoLibro(
	idPrestamoL int auto_increment,
    fecha_inicio timestamp default current_timestamp not null,
    fecha_fin datetime not null,
    fecha_devolucion datetime null,
    idUsuario int not null,
    idLibro int not null,
    primary key(idPrestamoL),
    foreign key(idUsuario) references usuario(idUsuario),
    foreign key(idLibro) references Libro(idLibro)
);

create table tesis(
	idTesis int auto_increment,
    titulo varchar(500) not null,
    tesista varchar(100) not null,
    facultad varchar(50) not null,
    carrera varchar(50) not null,
    num_paginas int,
    anno date,
    disponible varchar(100),
    imagen longblob,
    archivo mediumblob,
    primary key(idTesis)
);

create table prestamoTesis(
	idPrestamoT int auto_increment,
    fecha_inicio timestamp default current_timestamp not null,
    fecha_fin date not null,
    fecha_devolucion date null,
    idUsuario int not null,
    idTesis int not null,
    primary key(idPrestamoT),
    foreign key(idUsuario) references usuario(idUsuario),
    foreign key(idTesis) references tesis(idTesis)
);
