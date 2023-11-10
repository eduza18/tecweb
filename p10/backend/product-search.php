<?php
    use API\Lis\Lis;
    require_once __DIR__.'/API/start.php';

    $buscar = new Lis('marketzone');
    $buscar->search( $_GET['search'] );
    echo $buscar->getResponse();
?>