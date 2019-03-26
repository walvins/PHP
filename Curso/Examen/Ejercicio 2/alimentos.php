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
    include "misfunciones.inc.php";
        $banco=array(array(5,"patatas",259,"14/03/2019","Lugo"),
        array(2,"melones",300,"25/10/2018","Badajoz"),
        array(6,"platanos",485,"12/12/2019","Valladolid"),
        array(5,"patatas",259,"14/03/2019","Lugo"),
        array(1,"peras",545,"03/11/2018","Barcelona"),
        array(2,"melones",300,"25/10/2018","Badajoz")
       );

       //Contamos por si se usa en el futuro
       $n= count($banco);

       //Ordenar por codigo
       function ordenaBur(&$arrayp,$colump){ 
            for($j=0;$j<count($arrayp);$j++){    //Cuenta para ver cuantas veces pasa
                //Esto es un recorrido
                for ($i=count($arrayp)-1;$i>$j;$i--){ 
                    if($arrayp[$i][$colump]<$arrayp[$i-1][$colump]){//Comparamos con el siguiente puesto
                    $aux=$arrayp[$i];                   //Guardamos el primer dato para no perderlo
                    $arrayp[$i]=$arrayp[$i-1];        //Ponemos el del segundo puesto en el primero
                    $arrayp[$i-1]=$aux;                 //Ponemos el que estaba guardado en el segundo
                    }
                }
            }
        } 
        $añadir=array(37,"patatas",259, "14/03/2019","Lugo");
        $banco[]=$añadir;
        ordenaBur($banco,0);
        for ($i=0;$i<$n;$i++){
            for($j=0;$j<5;$j++){
                echo $banco[$i][$j]. "  ";
            }
            echo"<br>";
        }


        //3- Producto que mas se recoge
        function masRecogido($arrayp){
            $max=0;
            for($x=0;$x<count($arrayp);$x++){
                $aportaciones=0;
                $busqueda= $arrayp[$x][0];
                for($y=0;$y<count($arrayp) && $arrayp[$y][0];$y++){
                    if ($busqueda==$arrayp[$y][0]){
                        $aportaciones++;
                    }
                }
                if ($max<$aportaciones){
                    $max= $arrayp[$x];
                }
            }
            echo "datos del producto con mas aportaciones: ";
            for ($a=0;$a<count($arrayp);$a++){
                echo $max[$a]. " ";
            }
        }
        masRecogido($banco);

        //Cantidad media
        function cantMedia($arrayp){
           for($x=0;$x<count($arrayp);$x++) {
               $cantidad= 0;
               for($y=$x;$y<count($arrayp);$y++){
                   if($arrayp[$x][0]==$arrayp[$y][0]){
                    $cantidad += $arrayp[$y][2];
                   }
               }
               echo"Cantidad media de ".$arrayp[$x][1]." : " .$cantidad. "<br>";
           }
        }
        cantMedia($banco);

    ?>
</body>
</html>