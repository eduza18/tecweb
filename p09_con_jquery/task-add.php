<?php

include('database.php');

if(isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $unidades = $_POST['unidades'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $detalles = $_POST['detalles'];
    $query = "INSERT into productos(nombre, precio, unidades, modelo, marca, detalles) VALUES('$nombre', '$precio', '$unidades', '$modelo', '$marca', '$detalles')";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query Failed.');
    }
    echo 'Task Added Successfully';
}



?>