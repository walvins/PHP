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
            //4-Mes de máximo saldo

            function mejorMes($datosp,$cabecerap){
                $mensaje="Mes con mejor sueldo: <br>";
                $mayor=0;
                for ($i=0; $i < count($datosp) ; $i++) { 
                    for ($j=0; $j <12 ; $j++) {  //Cojo directamente 12, por los 12 meses
                        if($datosp[$i][$j+2]>$mayor){
                            $mayor=$datosp[$i][$j+2];
                            $mes=$cabecerap[$j+2];
                        }
                    }
                }
    
                $mensaje.= $mes. " - ". $mayor."€";
                echo $mensaje;
            }
    
            echo "<h1>Mes con el mayor saldo</h1>";
            mejorMes($datos,$cabecera);
    ?>
</body>
</html>