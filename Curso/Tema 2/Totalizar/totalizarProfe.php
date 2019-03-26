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
                     array(44444444,"Goxiola Gatxez, Patxi","06/06/1986","Vitoria",6666),
                     array(22222222,"Perez Lopez, Maria","31/08/1997","Burgos",10000),
                     array(66666666,"Martin Sardon, Eva","16/05/1990","Murcia",210),
                     array(33333333,"Garcia Alcalde, Manuel","17/02/1980","Vitoria",3566),
                     array(55555555,"Maldonado Peña, Susana","28/01/1975","Burgos",1500)
                    );
    $n= count($clientes);//Guardamos el numero de elementos para ser mas comodo de manejar

      //Aplicamos burbuja
      for($j=0;$j<$n;$j++){    //Cuenta para ver cuantas veces pasa
        //Esto es un recorrido
        for ($i=$n-1;$i>$j;$i--){ 
            if($clientes[$i][3]<$clientes[$i-1][3]){//Comparamos con el siguiente puesto
            $aux=$clientes[$i];                   //Guardamos el primer dato para no perderlo
            $clientes[$i]=$clientes[$i-1];        //Ponemos el del segundo puesto en el primero
            $clientes[$i-1]=$aux;                 //Ponemos el que estaba guardado en el segundo
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
    
    for($i=1; $i<$n;$i++){
        $localidad=$clientes[$i][3];
        if (!isset($loc[$localidad])){
            $loc[$localidad]= $clientes[$i][4];
        }else{
            $loc[$localidad]+= $clientes[$i][4];
        }
    }
    foreach($loc  as $saldototal){
        echo "Total  $saldototal euros". "<br>";
    }
       
    ?>
</body>

</html>
