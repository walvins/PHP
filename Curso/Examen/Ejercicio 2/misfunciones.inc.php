<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php

    function  ordenaTabla(&$arrayp,$colump){
        for($j=0;$j<count($arrayp);$j++){    
            for ($i=count($arrayp)-1;$i>$j;$i--){ 
                if($arrayp[$i][$colump]<$arrayp[$i-1][$colump]){
                    $aux=$arrayp[$i];                   
                    $arrayp[$i]=$arrayp[$i-1];        
                    $arrayp[$i-1]=$aux;                 
                }
            }
         }
    } 


        //Comentario
        function caducaHoy($fechap,&$caducadop){
            $diaHoy=date();
            $subArray= explode("/",$fechap);
            $dia= $subArray[0];
            $mes= $subArray[1];
            $anio= $subArray[2];
            $fechaCad=date_date_set($anio,$mes,$dia);
            if($fechaCad==$hoy){
                $caducadop=true;
            }
        }
    ?>
</body>
</html>