<?PHP
	include 'conexion.php';
    $query = 'SELECT * FROM EDITORIAL';
    $resul = $conexion->query($query);
    while ($row = $resul->fetch_array() ) {
        ?>
        <option value= "<?php echo $row['nom_editorial'] ?>" >
            <?php echo $row['nom_editorial']; ?>
        </option>
        <?php
    }
    mysql_close($conexion);
?>