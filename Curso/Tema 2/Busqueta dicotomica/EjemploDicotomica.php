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
        $lista= array("DNI","Apellidos y nombre","Fecha nacimiento","Localidad","Sueldo");
        $clientes= array(array(71291368,"Martinez Rodrigez, Raul","05/11/1991","Soria",2397),
        array(58469257,"Goxiola Gatxez, Patxi","06/06/1986","Murcia",6666),
        array(48596258,"Perez Lopez, Maria","31/08/1997","Burgos",10000),
        array(85478124,"Martin Sardon, Eva","16/05/1990","Vitoria",210),
        array(84569871,"Garcia Alcalde, Manuel","17/02/1980","Valladolid",3566),
        array(54001204,"Maldonado Peña, Susana","28/01/1975","Burgos",1500)
       );

        //Primero ordenamos
        $n= count($clientes);//Guardamos el numero de elementos para ser mas comodo de manejar
        $intercambio= 1;
        $contador=1;
       while ($intercambio){
            $intercambio=0;
            //Esto es un recorrido
            for ($i=0;$i<$n-$contador;$i++){ //Si en vez de poner $n-1 ponemos $n-$j recortas camino
                if($clientes[$i][0]>$clientes[$i+1][0]){//Comparamos con el siguiente puesto
                $aux=$clientes[$i];                   //Guardamos el primer dato para no perderlo
                $clientes[$i]=$clientes[$i+1];        //Ponemos el del segundo puesto en el primero
                $clientes[$i+1]=$aux;                 //Ponemos el que estaba guardado en el segundo
                $intercambio=1;
                }
            }
           $contador++;
        }
        echo "<table border=\"1\"";
        for($x=0;$x<$n;$x++){                     //Recorremos para ir asignando valores en la tabla
            echo "<tr>";
            for ($y=0;$y<5;$y++){
            echo "<th>".$clientes[$x][$y]."</th>";
            }
            echo "</tr>";
        }
        echo "</table>";


        //Pasamos a buscar
        $dnibus=48596258 ;//Meter aqui el dni a buscar
        $encontrado=false;
        $posiIni=0;  //Posicion inicial de busqueda
        $pf=$n-1;   //Posición final de busqueda

        while((!$encontrado)&&($pf-$posiIni>1)){
            $pm= (int) ($posiIni+$pf)/2;        //Posicion media entre los intervalos de inicio y fin
            if($dnibus==$clientes[$pm][0]){     //Si el dni esta en la fila media significa que esta encontrado
                $encontrado=true;
                $filaEncontrado= $pm;
            }else{                              
                if($dnibus<$clientes[$pm][0]){   //Si el valor de la linea es mayor al dni, ponemos la posicion final en la del medio para repetir
                    $pf=$pm;
                }else{
                    $posiIni=$pm;
                }
            }
        }
        if($dnibus==$clientes[$n-1][0]){    //Modo rapido de que salga el ultimo
            $filaEncontrado= $n-1;
            $encontrado=true;
        }
        if($dnibus==$clientes[0][0]){   //Modo rapido de sacar el primero
            $filaEncontrado= 0;
            $encontrado=true;
        }
        if($encontrado){
            echo "Datos del $dnibus: <br>";
            for ($j=0;$j<count($clientes[$filaEncontrado]);$j++){
                echo $lista[$j].": ". $clientes[$filaEncontrado][$j]."<br>";
            }
        }else{
            echo "No esta";
        }

    //Nota: Cuando los dni tengan un resultado par no va a encontrar el primero, si es impar si que lo encuentra
    ?>
</body>
</html>