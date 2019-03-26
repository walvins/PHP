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
    $x=5;
    $y=2;

    function sumaResta($x2, $y2, &$suma, &$resta){ //Suma y resta los pasamos por referencia, lo que implica que los valores de abajo tomen el valor
        $suma=$x2+$y2;
        $resta=$x2-$y2;
        return ;
    }
    sumaResta($x,$y,$s,$r); //Aqui es donde $s y $r cogen los valores de la funcion de antes
    echo "La suma: $s <br>";
    echo "La resta: $r <br>";

    //Otra forma
    function sumaResta2($x2, $y2){
        $op[]=$x2+$y2;
        $op[]=$x2-$y2;
        return $op ;
    }
    $operacion=sumaResta2($x, $y);
    echo "La suma: $operacion[0] <br>";
    echo "La resta: $operacion[1] <br>";

    //Otra forma 2
    function sumaResta3($x2, $y2){
        $suma=$x2+$y2;
        $resta=$x2-$y2;
        return $suma."╠╣".$resta;
    }
        echo sumaResta3($x,$y)."<br>";
        $operacion=explode("╠╣",sumaResta3($x,$y));
        echo "suma: $operacion[0]<br>";
        echo "resta: $operacion[1]<br>";
    ?>
</body>
</html>