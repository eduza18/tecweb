<?php
include('database.php');

$search = $_POST['search'];
if(!empty($search)){
    $query = "SELECT * FROM productos WHERE nombre LIKE '$search%' ";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Quey Error'. mysqli_error($connection));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'unidades' => $row['unidades'],
            'modelo' => $row['modelo'],
            'marca' => $row['marca'],
            'imagen' => $row['imagen'],
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

}
?>
