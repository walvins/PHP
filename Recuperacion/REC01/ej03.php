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
            //3- Calcula el saldo medio de los clientes de una determinada ciudad 
            function saldoMedio($datosp, $ciudadp){
                $mensaje="Sueldos medios en $ciudadp: <br>";
                for ($i=0; $i <count($datosp) ; $i++) { 
                    if($datosp[$i][1]==$ciudadp){
                        $dni= $datosp[$i][0];
                        $mensaje .= "DNI:".$dni."- ";
                        $medio=($datosp[$i][2]+$datosp[$i][3]+$datosp[$i][4]+$datosp[$i][5]+$datosp[$i][6]+$datosp[$i][7]+$datosp[$i][8]+$datosp[$i][9]+$datosp[$i][10]+$datosp[$i][11]+$datosp[$i][12]+$datosp[$i][13])/12;
                        $mensaje .= $medio. " € <br>";
                    }
                }
                echo $mensaje;
            }
    
            echo "<h1>Saldo medio de los clientes de Soria</h1>";
            saldoMedio($datos,"Soria");
    ?>
</body>
</html>