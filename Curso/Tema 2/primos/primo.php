<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Primo</title>
</head>

<body>
    <?php
    $x= rand(1,1000);
    $div=2; //No se pone 1 porque siempre daría 0
    while (($x % $div !=0)&&($div<$x/2)){
        $div++;
    }
    if ($x % $div ==0){
        echo "El numero $x no es primo";
    }else {echo "El numero $x  es primo";}
    ?>
</body>

</html>
