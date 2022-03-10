<?php

header('Content-Type: application/json');

$cartella = '../files/';
$nomeFile = $cartella.'Elenco-comuni-italiani.csv';

$file = fopen($nomeFile, 'r');
$comuni=[];


$i = 0;
while(!feof($file)){

    $riga = fgets($file);

    if(!empty($riga) && $i > 3){

        $riga_array = explode(';', $riga);
        $comuni[]=[
            'nome' => $riga_array[5],
            'regione' => $riga_array[10],
            'provincia' => $riga_array[11]
        ];
    }
    $i++;
} 
fclose($file);
echo json_encode($comuni, JSON_INVALID_UTF8_IGNORE);

