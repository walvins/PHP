<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ejercicio7_2</title>
</head>
<body>
    <p>Da cualquier valor a dos variables, $a y $b, y muestra el menor de ellas o informa que son iguales.</p>
    <?php
    
    $a=rand(0,10);
    $b=rand(0,10);
    echo "primer numero: ". $a. "<br>";
    echo "segundo numero: ". $b. "<br>";
    if ($a>$b){
        echo $b. " es el menor";
    } else {
        if ($a==$b){
          echo "Son iguales";  
        }else{
           echo $a. " es el menor"; 
        }
    }
    
    ?>
</body>
</html>