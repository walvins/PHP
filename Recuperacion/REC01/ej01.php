<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio1</title>
    <style>
        td{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <?php
        include "datos.php";
        
        //1- Muestra la tabla
        function mostrarTabla($cabecerap,$datosp){
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
                echo"</tr>";
            }
            echo"</table>";
        }
        
        echo "<h1>Mostrar tabla</h1>";
        mostrarTabla($cabecera,$datos);



        //6- Localiza secuencialmente los datos de un DNI. 
        
        function busquedaSecuencial($datosp,$cabecerap,$dnip){
            $encontrado=false;
            $i=0;
            while($encontrado!=true){
                if($datosp[$i][0]==$dnip){
                    $encontrado=true;
                    echo "datos de $dnip : <br>";
                    for ($j=0; $j <count($datosp[0])-1 ; $j++) { 
                        echo $cabecerap[$j+1].": ".$datosp[$i][$j+1]."<br>";
                    }
                }
            $i++;
            }
        }

        echo "<h1>Datos del DNI 16003214A</h1>";
        busquedaSecuencial($datos,$cabecera,"16003214A");

    ?>
</body>
</html>