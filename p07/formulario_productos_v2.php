<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registro del producto</title>
    <style type="text/css">
        ol,
        ul {
            list-style-type: none;
        }
    </style>
    <script type="text/javascript">
        function validarFormulario() {
            var nombre = document.getElementById('nombre_producto').value;
            var marca = document.getElementById('marca_producto').value;
            var modelo = document.getElementById('modelo_producto').value;
            var precio = parseFloat(document.getElementById('precio').value);
            var detalles = document.getElementById('detalles_producto').value;
            var unidades = parseInt(document.getElementById('unidades').value);
            var imagen = document.getElementById('imagen').value;
            var eliminado = parseInt(document.getElementById('eliminado').value);

            if (nombre.trim() === "" || nombre.length > 100) {
                alert("El nombre es requerido y debe tener 100 caracteres o menos.");
                return false;
            }

            if (marca.trim() === "") {
                alert("Selecciona una marca válida.");
                return false;
            }

            if (modelo.trim() === "" || modelo.length > 25 || !/^[a-zA-Z0-9\s]+$/.test(modelo)) {
                alert("El modelo es requerido y debe ser alfanumérico con 25 caracteres o menos.");
                return false;
            }

            if (isNaN(precio) || precio <= 99.99) {
                alert("El precio es requerido y debe ser mayor a 99.99.");
                return false;
            }

            if (detalles.length > 250) {
                alert("Los detalles no deben tener más de 250 caracteres.");
                return false;
            }

            if (isNaN(unidades) || unidades < 0) {
                alert("Las unidades son requeridas y deben ser un número mayor o igual a 0.");
                return false;
            }

            if (eliminado !== 0 && eliminado !== 1) {
                alert("El campo 'Eliminado' debe ser 0 o 1.");
                return false;
            }

            if (imagen.trim() === "") {
                document.getElementById('imagen').value = 'img/imagen_por_defecto.png';
            }

            return true;
        }
    </script>
</head>

<body>
    <h1>Registro del producto</h1>

    <form id="formularioTenis"
        action="http://localhost/tecnologiasweb/practicas/p06/set_producto_v2.php" method="post"
        onsubmit="return validarFormulario();">

        <h2>Datos del producto</h2>

        <fieldset>
            <legend>Información del Producto</legend>

            <ul>
                <li><label for="nombre_producto">Nombre del Producto:</label> <input type="text" name="nombre_producto"
                        id="nombre_producto"></li>
                <li><label for="marca_producto">Marca:</label> <input type="text" name="marca_producto"
                        id="marca_producto"></li>
                <li><label for="modelo_producto">Modelo:</label> <input type="text" name="modelo_producto"
                        id="modelo_producto"></li>
                <li><label for="precio">Precio:</label> <input type="text" name="precio" id="precio"></li>
                <li><label for="detalles_producto">Detalles del Producto:</label><br><textarea
                        name="detalles_producto" rows="4" cols="60" id="detalles_producto"
                        placeholder="No más de 300 caracteres de longitud"></textarea></li>
                <li><label for="unidades">Unidades Disponibles:</label> <input type="text" name="unidades"
                        id="unidades"></li>
                <li><label for="imagen">URL de la Imagen del Producto (opcional):</label> <input type="text"
                        name="imagen" id="imagen"></li>
                        <li><label for="eliminado">Eliminado (0 o 1):</label> <input type="text" name="eliminado"
                            id="eliminado"></li>
            </ul>
        </fieldset>

        <p>
            <input type="submit" value="Enviar información">
            <input type="reset">
        </p>

    </form>
</body>

</html>