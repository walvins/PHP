<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    //Busqueda sin orden y sin repetir
        $clientes= array(array(11111111,"Martinez Rodrigez, Raul","05/11/1991","Soria",2397),
                     array(44444444,"Goxiola Gatxez, Patxi","06/06/1986","Murcia",6666),
                     array(22222222,"Perez Lopez, Maria","31/08/1997","Burgos",10000),
                     array(66666666,"Martin Sardon, Eva","16/05/1990","Vitoria",210),
                     array(33333333,"Garcia Alcalde, Manuel","17/02/1980","Valladolid",3566),
                     array(55555555,"Maldonado Peña, Susana","28/01/1975","Burgos",1500)
                    );
    $n= count($clientes);//Guardamos el numero de elementos para ser mas comodo de manejar
    $busqueda=44444444;
    $i=0;
    while($clientes[$i][0] != $busqueda){
        $i++;
    }
    echo "Datos del cliente con DNI $busqueda:";
        for($y=0;$y<5;$y++){
            echo $clientes[$i][$y]. ", ";
        }
    
    ?>

</body>

</html>
