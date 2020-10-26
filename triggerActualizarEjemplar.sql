DELIMITER //
CREATE TRIGGER actualizar_ejemplar  AFTER INSERT ON prestamolibro
 
FOR EACH ROW
BEGIN
	update libro
    set num_ejemplar=num_ejemplar-1
	where idLibro=new.idLibro AND num_ejemplar>0;
END;//
 
DELIMITER ;
