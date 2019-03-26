<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Primo</title>
</head>

<body>
    <p> Mostrar los 20 primeros primos</p>
    <?php
    $x= 1;
    $cuentaprimos=0;
    //No se pone 1 porque siempre daría 0
    $respuesta="20 primeros primos: ";
    while ($cuentaprimos<20){
        $div=2;
        while (($x % $div !=0)&&($div<$x/2)){
            $div++;
        }
            if (!($x % $div ==0)){
            $respuesta .= $x. ", ";
            $cuentaprimos++;
        }
        $x++;
    }  
    echo $respuesta;
    ?>
</body>

</html>
