<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Array1</title>
</head>

<body>
    <p>en un array meto 20 numeros y hago:
        1)añadir un nuevo numero al final.
        a) Puede repetirse
        b) No repetido
    </p>

    <?php
    $lista=[2,15,20,21,34,38,39,45,49,60,62,67,68,70,72,74,78,85,87,90];
    echo  "Numeros al empezar: ".count($lista). "<br>";
    //Añadimos un numero al final
    $lista[20]=rand(1,100);
    for ($i=0; $i<count($lista);$i++){
        echo $lista[$i]. ", ";
    }
    
    //No repetido
     
    ?>
</body>

</html>
