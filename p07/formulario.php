<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        ol, ul { 
            list-style-type: none;
        }
    </style>
    <title>Formulario de Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>

    <?php
    if (isset($_GET['id'])) {
        $producto_id = $_GET['id'];
        // Realiza la conexión a la base de datos y consulta el producto con el ID especificado.
        $link = new mysqli('localhost', 'root', '8910111213', 'marketzone');
        
        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error);
        }

        $sql = "SELECT * FROM productos WHERE id = $producto_id";
        $result = $link->query($sql);

        if ($result && $result->num_rows > 0) {
            $producto = $result->fetch_assoc();
        } else {
            die('Producto no encontrado');
        }

        $link->close();
    }
    ?>

    <form id="miFormulario" action="set_producto_v2.php" method="post">
        <fieldset>
            <legend>Editar Producto:</legend>
            <input type="hidden" name="id" value="<?= $producto_id ?>">

            <ul>
                <li><label>Nombre:</label> <input type="text" name="nombre" value="<?= $producto['nombre'] ?>"></li>
                <li><label>Marca:</label> <input type="text" name="marca" value="<?= $producto['marca'] ?>"></li>
                <li><label>Modelo:</label> <input type="text" name="modelo" value="<?= $producto['modelo'] ?>"></li>
                <li><label>Precio:</label> <input type="text" name="precio" value="<?= $producto['precio'] ?>"></li>
                <li><label>Unidades:</label> <input type="text" name="unidades" value="<?= $producto['unidades'] ?>"></li>
                <li><label>Detalles:</label> <textarea name="detalles"><?= $producto['detalles'] ?></textarea></li>
                <li><label>Imagen:</label> <input type="text" name="imagen" value="<?= $producto['imagen'] ?>"></li>
            </ul>
        </fieldset>
        <p>
            <input type="submit" value="Guardar Cambios">
        </p>
    </form>
</body>
</html>
