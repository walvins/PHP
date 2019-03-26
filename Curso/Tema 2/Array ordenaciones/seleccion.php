<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Banco</title>
</head>

<body>
    <?php
     $clientes= array(array(71291368,"Martinez Rodrigez, Raul","05/11/1991","Soria",2397),
                     array(58469257,"Goxiola Gatxez, Patxi","06/06/1986","Murcia",6666),
                     array(48596258,"Perez Lopez, Maria","31/08/1997","Burgos",10000),
                     array(85478124,"Martin Sardon, Eva","16/05/1990","Vitoria",210),
                     array(84569871,"Garcia Alcalde, Manuel","17/02/1980","Valladolid",3566),
                     array(54001204,"Maldonado Peña, Susana","28/01/1975","Burgos",1500)
                    );
    $n= count($clientes);//Guardamos el numero de elementos para ser mas comodo de manejar
    
    for($i=0;$i<$n-1;$i++){                      //Bucle para fijar el puesto a rifar
        for($j=$i+1;$j<$n;$j++){                 //Bucle para comparar con los siguientes
            if ($clientes[$j][0]<$clientes[$i][0]){          //Hay intercambio?
                $aux=$clientes[$j];
                $clientes[$j]=$clientes[$i];
                $clientes[$i]=$aux;
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
    echo "</table>"
    ?>
</body>

</html>
