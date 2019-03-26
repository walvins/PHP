<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quiniela</title>
</head>

<body>
    <h2>Numeros de la quiniela:</h2>
    <?php
    do{
    $numero=rand(0,49);
    
    $numero2=rand(0,49);
  
    $numero3=rand(0,49);

    $numero4=rand(0,49);

    $numero5=rand(0,49);

    $numero6=rand(0,49);
   
    } while ($numero==$numero2 || $numero==$numero3 || $numero==$numero4 || $numero==$numero5
             || $numero==$numero6 || $numero2==$numero3 ||$numero2==$numero4 || $numero2==$numero5 || $numero2==$numero6 || $numero3==$numero4 || $numero3==$numero5 || $numero3==$numero6 || $numero4==$numero5 || $numero4==$numero6 || $numero5==$numero6);
    echo "primer numero: ", $numero, "<br>";
    echo "primer numero: ", $numero2, "<br>";
    echo "primer numero: ", $numero3, "<br>";
    echo "primer numero: ", $numero4, "<br>";
    echo "primer numero: ", $numero5, "<br>";
    echo "primer numero: ", $numero6, "<br>";
    ?>
</body>

</html>
