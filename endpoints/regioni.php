<?php

require('../Crud.php');
use Daticomuni\Crud;
header('Content-Type: application/json');

$read = new Crud();
$regioni = $read->readTable('regioni');

echo json_encode($regioni, JSON_INVALID_UTF8_IGNORE);