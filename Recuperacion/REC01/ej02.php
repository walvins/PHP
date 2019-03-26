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
            //2-Ordena ascendentemente por una determinada columna (DNI)
            function ordenarAsc($cabecerap,$datosp){
                //Burbuja
                for($j=0;$j<count($datosp);$j++){    
                    for ($i=count($datosp)-1;$i>$j;$i--){ 
                        if($datosp[$i][0]<$datosp[$i-1][0]){
                        $aux=$datosp[$i];                   
                        $datosp[$i]=$datosp[$i-1];  
                        $datosp[$i-1]=$aux;          
                        }
                    }
                }
    
                //Mostrar
                echo "<table><tr>";
                for ($i=0; $i <count($cabecerap) ; $i++) { 
                    echo "<td>".$cabecerap[$i]."</td>"." ";
                }
                echo "</tr><br>";
                for ($i=0; $i <count($datosp) ; $i++) {     //Para coger cada array de datos en una fila distinta
                    echo "<tr>";
                    for ($j=0; $j <count($datosp[$i]) ; $j++) { //Aqui los datos son los mismos que en columnas
                        echo "<td>".$datosp[$i][$j]."</td>"." ";
                    }
                    echo"</tr><br>";
                }
                echo"</table>";
            }
    
            echo "<h1>Ordenar tabla por DNI</h1>";
            ordenarAsc($cabecera,$datos);
    ?>
</body>
</html>