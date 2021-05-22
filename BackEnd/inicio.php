<?php

    header('Content-type:application/json');
    header("Access-Control-Allow-Origin:*");

    $jsonInicio = file_get_contents("datosInicio.json");
    $jsonProceso = file_get_contents("datosProceso.json");
    $jsonTermino = file_get_contents("datosTermino.json");

        $inicio= json_decode($jsonInicio,true);
        $proceso = json_decode($jsonProceso,true);
        $termino = json_decode($jsonTermino,true);

    $aux = array();
        array_push($aux,$iniciado);
        array_push($aux,$proceso);
        array_push($aux,$terminado);
   
    $auxJson = json_encode($aux);
?>