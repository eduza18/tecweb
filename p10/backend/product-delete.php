<?php
    use API\Delete\Delete;
    require_once __DIR__.'/API/start.php';

    $Delete = new Delete('marketzone');
    $Delete->delete( $_POST['id'] );
    echo $Delete->getResponse();
?>