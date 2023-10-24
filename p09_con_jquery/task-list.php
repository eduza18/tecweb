<?php

include('database.php');

$query = "SELECT * from productos";
$result = mysqli_query($connection, $query);

if(!$result){
    die('Query Failed'.mysqli_error($connection));
}
$json = array();
while($row = mysqli_fetch_array($result)){
    $json[] = array(
        'nombre' => $row['nombre'],
        'precio' => $row['precio'],
        'unidades' => $row['unidades'],
        'modelo' => $row['modelo'],
        'marca' => $row['marca'],
        'detalles' => $row['detalles'],

    );

}
$jsonstring = json_encode($json);
echo $jsonstring;

?>