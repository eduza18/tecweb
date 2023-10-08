<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen = $_POST['imagen'];

    @$link = new mysqli('localhost', 'root', '8910111213', 'marketzone');	

    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
    }

    // Verifica si estás actualizando un producto existente o insertando uno nuevo
    if (isset($_POST['id'])) {
        // Actualiza un producto existente
        $id_producto = $_POST['id'];
        $sql = "UPDATE productos SET nombre = '{$nombre}', marca = '{$marca}', modelo = '{$modelo}', precio = {$precio}, detalles = '{$detalles}', unidades = {$unidades}, imagen = '{$imagen}' WHERE id = {$id_producto}";
        if ($link->query($sql)) {
            echo 'Producto actualizado con ID: ' . $id_producto;
        } else {
            echo 'El Producto no pudo ser actualizado =(';
        }
    } else {
        // Inserta un nuevo producto
        $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
        if ($link->query($sql)) {
            echo 'Producto insertado con ID: ' . $link->insert_id;
        } else {
            echo 'El Producto no pudo ser insertado =(';
        }
    }

    $link->close();
}
?>
