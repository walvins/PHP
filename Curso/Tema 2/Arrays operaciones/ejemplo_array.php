<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Array</title>
</head>

<body>
    <p> Asi se hace un array</p>
    <?php
    //Ejercicio, 5 pares, nombre telefono, mostramos fila a fila
    $datos= array ("raul",111111111,"maria",222222222,"sergio",333333333,"pedro",444444444, "laura",555555555);
    $n=count($datos);
    /*
    echo "la agenda tiene $n datos registrados <br>" ;
    //Listado de la agenda
    for ($i=0; $i<$n; $i+=2){
        echo ($i/2)+1 .": $datos[$i]"."--".$datos[$i+1]."<br>";
    }
    */
    
    //Inverso
    /*    for ($i=0; $i<$n; $i+=2){
        echo ($i/2)+1 .": ". $datos[$n-1-$i-1]."--".$datos[$n-1-$i-1+1]."<br>";
    }
    */
     /*for ($i=$n; $i>=0; $i=($i-3+1)){
        echo "datos: $datos[$i]"."--".$datos[$i+1]."<br>";
    }*/
    
    //Array de array, esto separa el array en filas y columnas
    $datos= array (array("raul",111111111),
                   array("maria",222222222,"12/09/1995"),
                   array("sergio",333333333),
                   array("pedro", 444444444), 
                   array("laura",555555555));
    /*
    echo "La 3º persona es: ", $datos[2][0], ". Su telefono es: ", $datos[2][1], "<br>";
    echo "En la agenda hay: ", count($datos), " personas (lineas)", "<br>"; //Cuenta las filas
    echo "de ",$datos[2][0], " conozco ", count ($datos [2])," datos", "<br>"; //Cuenta las columnas
    */
    //$i va a barrer filas y $j columnas
    $nf= count ($datos);
    //$nc= count ($datos[0]);
    for ($i=0;$i<$nf; $i++){  //Mientras $i sea menos que el numero de filas va pasando de fila
        for ($j=0;$j<count($datos[$i]);$j++){//Va pasando de columnas
            echo " fila $i, columna $j- ", $datos[$i][$j]," ;";
        } 
        echo "<br>";
    }
    ?>
</body>

</html>
