<?php
    use API\Edit\Edit;
    require_once __DIR__.'/API/start.php';

    $Edit = new Edit('marketzone');
    $Edit->edit( json_decode( json_encode($_POST) ) );
    echo $Edit->getResponse();
?>