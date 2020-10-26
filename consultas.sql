drop trigger actualizar_ejemplar1;

drop trigger actualizar_ejemplar;
select * from prestamolibro;
select * from libro;
select * from autor;
select * from editorial;

insert into autor(nom_autor, nacionalidad) values('Navarrete', 'Peruano');
insert into editorial(nom_editorial, ciudad) values('Pearson Education', 'Peru');

insert into libro(titulo, materia, num_ejemplar, num_paginas, edicion, anno, disponible, descripcion, idAutor, idEditorial) 
values('programacion', 'programacion', 3, 234, '2da', 2000, 'virtual', 'libro....', 1, 1);
insert into libro(titulo, materia, num_ejemplar, num_paginas, edicion, anno, disponible, descripcion, idAutor, idEditorial) 
values('Fisica', 'Ciencias', 2, 540, '1da', 2010, 'fisico', 'libro....', 1, 1);

insert into prestamolibro(fecha_fin, idUsuario, idLibro) values(curdate(), 1, 2);

update prestamolibro set fecha_devolucion=curdate() where idPrestamoL=8;



