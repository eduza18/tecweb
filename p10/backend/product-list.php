<?php
    use API\Lis\Lis;

    require_once __DIR__.'/API/start.php';

    $Lis = new Lis('marketzone');
    $Lis->list();
    echo $Lis->getResponse();
?>