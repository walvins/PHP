<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>3</title>
</head>

<body>
    <?php
    //Busqueda ordenada y sin repetir
    
    //Creacion del array
        $clientes= array(array(11111111,"Martinez Rodrigez, Raul","05/11/1991","Soria",2397),
                     array(44444444,"Goxiola Gatxez, Patxi","06/06/1986","Murcia",6666),
                     array(22222222,"Perez Lopez, Maria","31/08/1997","Burgos",10000),
                     array(66666666,"Martin Sardon, Eva","16/05/1990","Vitoria",210),
                     array(33333333,"Garcia Alcalde, Manuel","17/02/1980","Valladolid",3566),
                     array(55555555,"Maldonado Peña, Susana","28/01/1975","Burgos",1500)
                    );
    
    
    
    
    //Variables que usaremos
    $n= count($clientes);//Guardamos el numero de elementos para ser mas comodo de manejar
    $busqueda=44444444;
    $r=0;
    
    
    
    
    //Primero ordenamos
     for($j=1;$j<$n;$j++){    //Cuenta para ver cuantas veces pasa
        //Esto es un recorrido
        for ($i=0;$i<$n-1;$i++){ 
            if($clientes[$i][0]>$clientes[$i+1][0]){//Comparamos con el siguiente puesto
            $aux=$clientes[$i];                   //Guardamos el primer dato para no perderlo
            $clientes[$i]=$clientes[$i+1];        //Ponemos el del segundo puesto en el primero
            $clientes[$i+1]=$aux;                 //Ponemos el que estaba guardado en el segundo
            }
        }
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
    //Hasta aqui es para ordenar la tabla por el dni

    
    
    
    //Ahora realizamos la busqueda
    while($clientes[$r][0] != $busqueda){
        $r++;
    }
    echo "Datos del cliente con DNI $busqueda:";
        for($y=0;$y<5;$y++){
            echo $clientes[$r][$y]. ", ";
        }
    
    ?>

</body>

</html>
