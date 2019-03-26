<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    //Busqueda sin orden y sin repetir
        $clientes= array(array(11111111,"Martinez Rodrigez, Raul","05/11/1991","Murcia",2397),
                     array(44444444,"Goxiola Gatxez, Patxi","06/06/1986","Murcia",6666),
                     array(22222222,"Perez Lopez, Maria","31/08/1997","Burgos",10000),
                     array(66666666,"Martin Sardon, Eva","16/05/1990","Burgos",210),
                     array(33333333,"Garcia Alcalde, Manuel","17/02/1980","Vitoria",3566),
                     array(55555555,"Maldonado Peña, Susana","28/01/1975","Zamora",1500)
                    );
    $n= count($clientes);//Guardamos el numero de elementos para ser mas comodo de manejar
    
    /*
    //Primero ordenamos por localidad
    for($i=0;$i<$n-1;$i++){                      //Bucle para fijar el puesto a rifar
        for($j=$i+1;$j<$n;$j++){                 //Bucle para comparar con los siguientes
            if ($clientes[$j][3]<$clientes[$i][3]){          //Hay intercambio?
                $aux=$clientes[$j];
                $clientes[$j]=$clientes[$i];
                $clientes[$i]=$aux;
            }
        }   
    }
    
    //Esta tabla muestra los datos ya ordenados
    echo "<table border=\"1\"";
    for($x=0;$x<$n;$x++){                     //Recorremos para ir asignando valores en la tabla
        echo "<tr>";
        for ($y=0;$y<5;$y++){
        echo "<th>".$clientes[$x][$y]."</th>";
        }
        echo "</tr>";
    }
    echo "</table>";
      
    
    //Pasamos a sumar las cuotas por cada localidad
    for ($a=0;$a<$n-1;$a++){ //Recorremos cada elemento
        if($clientes[$a][3]==$clientes[$a+1][3]){
            $proviCuota=array(array($clientes[$a][3],($clientes[$a][4]+$clientes[$a+1][4])));
        }
    }
    echo "<table border=\"1\"";
    for($i2=0;$i2<count($proviCuota);$i2++){                     //Recorremos para ir asignando valores en la tabla
        echo "<tr>";
        for ($y2=0;$y2<5;$y2++){
        echo "<th>". $proviCuota[$i2][$y2]."</th>";
        }
        echo "</tr>";
    }
    echo "</table>";

    //Solo muestra el ultimo, buscar como almacenar todas las provincias
    */

    //SOLUCION
    $igual= true;
    $i=0;   //Contador filas array
    $acumulador=$clientes[0][4];
    while($i<$n-1){
        if($clientes[$i][3]==$clientes[$i+1][3]){
            $acumulador += $clientes[$i+1][4];
        }else{
            echo "Total de ".$clientes[$i][3]. " es: ". $acumulador. "euros". "<br>";    
            $acumulador=$clientes[$i+1][4];
        }
        $i++;
    }
    echo "Total de ".$clientes[$i][3]. " es: ". $acumulador. "euros". "<br>";
    ?>
</body>

</html>
