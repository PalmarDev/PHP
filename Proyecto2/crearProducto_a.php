<?php
// Purpose: Crear un nuevo producto en la base de datos.
extract($_POST);
include("database.php");
isset($_POST['save']);
{
        $query="INSERT INTO productos(nombre, categoria, tipo_producto, usuario_id, unidades_disponibles ) VALUES ('$nombre', '$categoria', '$tipo_producto', '$usuario_id', '$unidades_disponibles')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: mostrar_a.php?status=success");
}
?>