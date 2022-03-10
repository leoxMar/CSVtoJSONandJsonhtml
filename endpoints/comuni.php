<?php

require('../Crud.php');
use Daticomuni\Crud;
header('Content-Type: application/json');

$read = new Crud();
$comuni = $read->readTable('comuni');
echo json_encode($comuni, JSON_INVALID_UTF8_IGNORE);