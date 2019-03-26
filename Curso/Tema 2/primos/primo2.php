<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Primo</title>
</head>

<body>
    <p> Mostrar los 1000 primeros primos</p>
    <?php
    $x= 1;
    //No se pone 1 porque siempre daría 0
    $respuesta="Primos: ";
    for ($x=1; $x<=1000; $x++){
         $div=2;
    while (($x % $div !=0)&&($div<$x/2)){
        $div++;
    }
        if (!($x % $div ==0)){
        $respuesta .= $x. ", ";
    }
        }
    echo $respuesta;
    ?>
</body>

</html>
