<?php

use API\Add\Add;

require_once __DIR__.'/API/start.php';

    $Add = new Add('marketzone');
    $Add->add( json_decode( json_encode($_POST) ) );
    echo $Add->getResponse();
?>