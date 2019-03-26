<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ejercicio6_1</title>
</head>

<body>
    <p>Crea una página PHP en la que se da valor a dos variables enteras (a y b de valores p.e. 6 y 4) y se halla en las variables “suma”,…,”potencia” y “raíz de a” las respectivas operaciones; finalmente se muestran los resultados. </p>

    <?php
        $a =6;
        $b =4;
        $suma =$a+$b;
        $resta =$a-$b;
        $multiplicacion = $a*$b;
        $division = $a/$b;
        $modulo = $a%$b;
        $potencia = pow($a,$b);
        $raiz = sqrt($a);
        echo $suma, "<br>";
        echo $resta, "<br>";
        echo $multiplicacion, "<br>";
        echo $division, "<br>";
        echo $modulo, "<br>";
        echo $potencia, "<br>";
        echo $raiz, "<br>";
    ?>

</body>

</html>
