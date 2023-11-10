<?php

use API\Lis\Lis;

require_once __DIR__.'/API/start.php';

$single = new Lis('marketzone');
$single->single($_POST['id']);
echo $single->getResponse();
