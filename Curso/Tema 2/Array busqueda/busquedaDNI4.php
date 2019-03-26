<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>4</title>
</head>

<body>
    <?php
    //Busqueda ordenada y repetidas
        $clientes= array(array(11111111,"Martinez Rodrigez, Raul","05/11/1991","Soria",2397),
                     array(44444444,"Goxiola Gatxez, Patxi","06/06/1986","Murcia",6666),
                     array(22222222,"Perez Lopez, Maria","31/08/1997","Valladolid",10000),
                     array(66666666,"Martin Sardon, Eva","16/05/1990","Vitoria",210),
                     array(33333333,"Garcia Alcalde, Manuel","17/02/1980","Valladolid",3566),
                     array(55555555,"Maldonado Peña, Susana","28/01/1975","Burgos",1500)
                    );
    $n= count($clientes);//Guardamos el numero de elementos para ser mas comodo de manejar
    $busqueda="Valladolid";
    
     //Primero ordenamos POR LOCALIDAD
     for($j=1;$j<$n;$j++){    //Cuenta para ver cuantas veces pasa
        //Esto es un recorrido
        for ($i=0;$i<$n-1;$i++){ 
            if($clientes[$i][3]>$clientes[$i+1][3]){//Comparamos con el siguiente puesto
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
    
    
    
    for ($r=0; $r<$n && $clientes[$r][3]<$busqueda;$r++){
        if($busqueda==$clientes[$r][3]){
            echo "Cliente que vive en $busqueda: ";
        for($t=0;$t<5;$t++){
            echo $clientes[$r][$t]. ", ";
            
        }
            echo "<br>";
        }
    }
    
    ?>

</body>

</html>
