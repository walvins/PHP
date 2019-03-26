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
    include "burbuja.php";

        function totalCiudades($datosp){
            $total=0;
            for ($i=0; $i <count($datosp) ; $i++) { 
                for ($j=2; $j <count($datosp[$i]) ; $j++) {
                    $total+=$datosp[$i][$j];
                }
            }
            echo "Total de dinero: $total €";
        }

        function cadaCiudad($datosp){
            burbuja($datosp,1);
            $total=0;
            $mensaje="Sueldos por ciudad: <br>";
            for ($i=0; $i <count($datosp) ; $i++) { 
                if($datosp[$i][1]==$datosp[$i+1][1]){
                    for ($j=2; $j <count($datosp[$i]) ; $j++) { 
                        $total+=$datosp[$i][$j];
                    }
                if($datosp[$i][1]!=$datosp[$i+1][1]){
                    $mensaje .= $datosp[$i][1]."- ".$total."<br>";
                    $total=0;
                }
                    
                }
            }
        }

    echo"<h1>Totaliza el saldo de cada ciudad, todas y cada una, todo el año. </h1>";
    totalCiudades($datos);
    cadaCiudad($datos);
        
    ?>
</body>
</html>