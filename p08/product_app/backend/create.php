<?php
    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if (!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JSON A OBJETO
        $jsonOBJ = json_decode($producto);

        $conn = new mysqli('localhost', 'root', '8910111213', 'marketzone');

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sdiisss", $jsonOBJ->nombre, $jsonOBJ->precio, $jsonOBJ->unidades, $jsonOBJ->modelo, $jsonOBJ->marca, $jsonOBJ->detalles, $jsonOBJ->imagen);

        if ($stmt->execute()) {
            echo '[SERVIDOR] Producto agregado con éxito';
        } else {
            echo '[SERVIDOR] Error al agregar el producto: ' . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
?>
