<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ejercicio7_1</title>
</head>
<body>
    <p>Da valor distinto a dos variables, $a y $b; visualízalos e indica cual es el mayor.</p>
    <?php
    
    $a=rand(0,10);
    $b=rand(0,10);
    echo "primer numero: ". $a. "<br>";
    echo "segundo numero: ". $b. "<br>";
    if ($a>$b){
        echo $a. " es el mayor";
    } else {
        if ($a==$b){
          echo "Son iguales";  
        }else{
           echo $b. " es el mayor"; 
        }
    }
    
    ?>
</body>
</html>