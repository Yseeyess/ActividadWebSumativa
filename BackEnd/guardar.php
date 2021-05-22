<?php
    header('Content-type:application/json');
    header("Access-Control-Allow-Origin:*");

    $json=file_get_contents('php://input'); 
    $str = trim($json,"[]");
    $info = json_decode($str,true);
    $aux = json_decode($json,true);
    $estado = $aux[0]["estado"];

    switch($estado){
        case 1:
            $jsonData=file_get_contents("datosInicio.json");
            if(empty($jsonData)==1){
                $archivo = fopen("datosInicio.json", "w");
                fwrite($archivo,$json);
                break;
            }else{
                $arrayData=json_decode($jsonData);
                array_push($arrayData,$info);
                $jsonData = json_encode($arrayData);
                    $archivo = fopen("datosInicio.json", "w");
                    fwrite($archivo,$jsonData); 
                    break;
            }

        case 2:
            $jsonData=file_get_contents("datosProceso.json");
            if(empty($jsonData)==1){
                $archivo = fopen("datosProceso.json", "w");
                fwrite($archivo,$json);
                break;
            }else{
                $arrayData=json_decode($jsonData);
                array_push($arrayData,$info);
                $jsonData = json_encode($arrayData);
                    $archivo = fopen("datosProceso.json", "w");
                    fwrite($archivo,$jsonData); 
                    break;
            }

        case 3:
            $jsonData=file_get_contents("datosTermino.json");
            if(empty($jsonData)==1){
                $archivo = fopen("datosTermino.json","w");
                fwrite($archivo,$json);
                break;
            }else{
                $arrayData=json_decode($jsonData);
                array_push($arrayData,$info);
                $jsonData = json_encode($arrayData);
                    $archivo = fopen("datosTermino.json", "w");
                    fwrite($archivo,$jsonData); 
                    break;
            }
        
        default:
            break;
    }
?>