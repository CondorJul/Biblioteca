<?PHP
	include 'conexion.php';
    $query = 'SELECT * FROM AUTOR';
    $resul = $conexion->query($query);
    while ($row = $resul->fetch_array() ) {
        ?>
        <option value= "<?php echo $row['nom_autor'] ?>" >
            <?php echo $row['nom_autor']; ?>
        </option>
        <?php
    }
    mysql_close($conexion);
?>