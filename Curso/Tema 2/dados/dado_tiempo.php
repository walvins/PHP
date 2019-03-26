<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dado segundo</title>
</head>

<body>
    <p>Cuantas veces se tira un dado en X segundos</p>
    <?php
    $c1=0;
    $c2=0;
    $c3=0;
    $c4=0;
    $c5=0;
    $c6=0;
    $n=0;
    $tiempo=time(); //Ponemos el contador
    while ((time()-$tiempo)<5){
        $n++;
        $d= rand(1,6);
        switch ($d){
            case $d==1: $c1++;
                break;
             case $d==2: $c2++;
                break;
             case $d==3: $c3++;
                break;
             case $d==4: $c4++;
                break;
             case $d==5: $c5++;
                break;
             case $d==6: $c6++;
                break;
        }        
    }
        echo "Numero de tiradas: $n". "<br>";
        echo "La cara 1 ha salido $c1 veces, con una probabilidad de ". (($c1/$n)*100)."%". "<br>";
        echo "La cara 2 ha salido $c2 veces , con una probabilidad de ". (($c2/$n)*100)."%". "<br>";
        echo "La cara 3 ha salido $c3 veces, con una probabilidad de ". (($c3/$n)*100)."%". "<br>";
        echo "La cara 4 ha salido $c4 veces, con una probabilidad de ". (($c4/$n)*100)."%". "<br>";
        echo "La cara 5 ha salido $c5 veces, con una probabilidad de ". (($c5/$n)*100)."%". "<br>";
        echo "La cara 6 ha salido $c6 veces, con una probabilidad de ". (($c6/$n)*100)."%". "<br>";
        
    ?>
</body>

</html>
