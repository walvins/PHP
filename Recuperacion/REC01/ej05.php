<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <?php
    include "datos.php";
            //5-Mes de mejor saldo medio. 

            function mejorMesMedio($datosp, $cabecerap){
                $mensaje= "Mes con mejor sueldo medio: <br>";
                $mayor=0;
                $aux=2;
                $vuelta=0;
                $medio=0;
                $calculo=0;
                while($vuelta<12){
                    for ($i=0; $i <count($datosp) ; $i++) { 
                        $calculo += $datosp[$i][$aux];
                        $mes= $cabecerap[$aux];
                        $medio=$i+1;
                    }
    
                    $calculo= $calculo/$medio;
                    if($calculo>$mayor){
                        $mayor=$calculo;
                        $mejorMes=$mes;
                    }
                    $vuelta++;
                    $aux++;
                    $calculo=0; 
                }
    
                $mensaje.= $mejorMes. " - ". $mayor."€";
                echo $mensaje;
            }
    
            echo "<h1>Mes con mejor saldo medio</h1>";
            mejorMesMedio($datos, $cabecera);
    ?>
</body>
</html>