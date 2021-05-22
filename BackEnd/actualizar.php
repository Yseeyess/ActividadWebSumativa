<?php
    header('Content-type:application/json');
    header("Access-Control-Allow-Origin:*");
    
    $json=file_get_contents('php://input'); 
    $info = json_decode($json,true);

    $estado = $info[1]["estado"];
    $newEstado = $info[0]["estado"];

    $jsonInicio= file_get_contents("datosInicio.json");
        $inicio= json_decode($jsonInicio,true);
    $jsonProceso = file_get_contents("datosProceso.json");
        $proceso = json_decode($jsonProceso,true);
    $jsonTermino = file_get_contents("datosTermino.json");
        $terminado = json_decode($jsonTermino,true);
   
    switch($estado){
        case 1:
            for($i=0;$i<count($inicio);$i++){
                if($inicio[$i]["titulo"]==$info[1]["titulo"]){
                    if($inicio[$i]["descripcion"]==$info[1]["descripcion"]){
                        switch($newEstado){
                            case 1:
                                $inicio[$i] = $info[0];
                                $aux = json_encode($inicio);
                                $archivo = fopen("datosInicio.json", "w");
                                fwrite($archivo,$aux);
                                break;
                            case 2:
                                array_splice($inicio,$i,1);
                                array_push($proceso,$info[0]);
                                $auxP = json_encode($proceso);
                                $auxI = json_encode($inicio);

                                $archivoP = fopen("datosProceso.json","w");
                                fwrite($archivoP,$auxP);

                                $archivoI = fopen("datosInicio.json","w");
                                fwrite($archivoI,$auxI);

                                break;
                            case 3:
                                array_splice($inicio,$i,1);
                                array_push($termino,$info[0]);

                                $auxT = json_encode($termino);
                                $auxI = json_encode($inicio);

                                $archivoT = fopen("datosTermino.json","w");
                                fwrite($archivoT,$auxT);

                                $archivoI = fopen("datosInicio.json","w");
                                fwrite($archivoI,$auxI);
                                break;
                        }
                    }
                        
                }
            }

        case 2:
            for($i=0;$i<count($proceso);$i++){
                if($proceso[$i]["titulo"]==$info[1]["titulo"]){
                    if($proceso[$i]["descripcion"]==$info[1]["descripcion"]){
                        switch($newEstado){
                            case 1:
                                array_splice($proceso,$i,1);
                                array_push($inicio,$info[0]);
                                $auxP = json_encode($proceso);
                                $auxI = json_encode($inicio);

                                $archivoP = fopen("datosProceso.json","w");
                                fwrite($archivoP,$auxP);

                                $archivoI = fopen("datosInicio.json","w");
                                fwrite($archivoI,$auxI);

                                break;
                            case 2:
                                $proceso[$i] = $info[0];
                                $aux = json_encode($proceso);
                                $archivo = fopen("datosProceso.json", "w");
                                fwrite($archivo,$aux);

                                break;
                            case 3:
                                array_splice($proceso,$i,1);
                                array_push($termino,$info[0]);

                                $auxT = json_encode($termino);
                                $auxP = json_encode($proceso);

                                $archivoT = fopen("datosTermino.json","w");
                                fwrite($archivoT,$auxT);

                                $archivoP = fopen("datosProceso.json","w");
                                fwrite($archivoP,$auxP);
                                break;
                        }
                    }
                        
                }
            }

        default:
            break;
    }
?>