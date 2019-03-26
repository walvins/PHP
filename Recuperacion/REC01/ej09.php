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
    

        function mejorCliente($datosp,$cabecerap,$ciudadp,$mesp){
            //Sacamos el mes
            $numeroMes=0;
            $masDinero=-1;
            $dniMejor="";
            for ($i=2; $i <count($cabecerap) ; $i++) { 
                if($cabecerap[$i]==$mesp){
                    $numeroMes=$i;
                }
            }

            for ($i=0; $i <count($datosp) ; $i++) { 
                //Miramos si coincide el nombre de la ciudad
                if($datosp[$i][1]==$ciudadp){
                    //Miramos si tiene mejor sueldo en el mes que elegimos
                    if($datosp[$i][$numeroMes]>$masDinero);
                    $masDinero=$datosp[$i][$numeroMes];
                    $dniMejor=$datosp[$i][0];
                }
            }
            echo "Mejor cliente de $ciudadp en el mes de $mesp : <br>
                    $dniMejor - $masDinero €";

        }

        $ciudad="Soria";
        $mes="Mayo";
        echo"<h1>Mejor cliente de una determinada ciudad en un determinado mes.  </h1>";
        mejorCliente($datos,$cabecera,$ciudad,$mes);
    ?>
</body>
</html>