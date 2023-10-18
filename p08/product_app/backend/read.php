<?php
include_once __DIR__.'/database.php';
$data = array();
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    if ($stmt = $conexion->prepare("SELECT * FROM productos WHERE nombre LIKE ?")) {
        $param = "%$nombre%";
        $stmt->bind_param("s", $param);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $product = array();
                foreach ($row as $key => $value) {
                    $product[$key] = utf8_encode($value);
                }
                $data[] = $product;
            }
            $result->free();
        } else {
            die('Query Error: ' . $stmt->error);
        }
        $stmt->close();
    }
    $conexion->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
echo json_encode($data, JSON_PRETTY_PRINT);
?>



