<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ejercicio 6_4</title>
</head>
<body>
   <p>Conocido el radio de un círculo (r), halla su perímetro y superficie. Utiliza la constante PI (3.141592)</p> 
   <?php
    define ("pi",3.141592);
    $radio=rand(1,10); //usar random para obtener un valor y almacenarlo en radio
    $peri= 2*pi*$radio; //Formula de perimetro y la almacenamos
    $super= pi*(pow($radio,2)); //Formula de superficie y la almacenamos
    echo "radio: ", $radio, "<br>";
    echo $peri, "<br>";
    echo $super;
    ?>
</body>
</html>