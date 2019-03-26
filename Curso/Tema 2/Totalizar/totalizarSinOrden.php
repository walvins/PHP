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

    //Hacer lista de localidades
    /*
    $loc=array();
    $loc[0]=$clientes [0][3];
    for ($i=1; $i<$n;$i++){
        $localidad= $clientes[$i][3];
        $encontrado=0
        $p=count($loc);
        $j=0;
        while ((!$encontrado) and ($j<$p)){
            if $loc($j)==$localidad;
            $encontrado=1;
            if (!encontrado){
                $loc[]=$localidad;
            }
        }
    }*/

    //Hacer un array con las localidades
    $loc[0][0]= $clientes[0][3];
    $loc[0][1]= $clientes[0][4];
    for ($i=1; $i<$n;$i++){
        $localidad= $clientes[$i][3];
        $encontrado=0;
        $p=count($loc);
        $j=0;
        while ((!$encontrado) and ($j<$p)){
            if ($loc($j)==$localidad){
            $encontrado=1;
            }else{
                $j++;
            }
            if (!encontrado){
                $loc[$p][0]=$localidad;
                $loc[$p][1]=$clientes[$i][4];
            }else{
                $loc[$j][1]+=$clientes[$i][4];
            }
        }
    }
    
    //Totalizar
    for ($i=0;$i<count($loc);$i++){
        echo "el total de ". $loc[$i][0]. " es: ". $loc[$i][1]. "euros". "<br>";
    }
    ?>
</body>

</html>
