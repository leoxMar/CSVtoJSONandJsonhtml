<?php

require('../Crud.php');
use Daticomuni\Crud;
header('Content-Type: application/json');

$read = new Crud();
$province = $read->readTable('province');
echo json_encode($province, JSON_INVALID_UTF8_IGNORE);