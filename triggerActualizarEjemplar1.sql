DELIMITER //
CREATE TRIGGER actualizar_ejemplar1  AFTER update ON prestamolibro
 
FOR EACH ROW
BEGIN
	update libro
    set num_ejemplar=num_ejemplar+1
	where idLibro=new.idLibro;
END;//
 
DELIMITER ;