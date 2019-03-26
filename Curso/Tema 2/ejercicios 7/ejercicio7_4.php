<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio7_4</title>
</head>

<body>
    <p>Ordena de menor a mayor tres nºs enteros, almacenados en a, b y c; distintos.</p>
    <?php
        $a = rand (0,10);
        $b = rand (0,10);
        $c = rand (0,10);
        echo "Primer numero: ". $a."<br>";
        echo "Segundo numero: ". $b."<br>";
        echo "Tercer numero: ". $c."<br>";
    if($a>$b && $b>$c){
        echo $c. "<". $b."<".$a;
    } else if ($a>$c && $c>$b){
        echo $b. "<". $c."<".$a;
    }else if ($b>$a && $a>$c){
        echo $c. "<". $a."<".$b;
    }else if ($b>$c && $c>$a){
        echo $a. "<". $c."<".$b;
    }else if ($c>$a && $a>$b){
        echo $b. "<". $a."<".$c;
    }else{
        echo $a. "<". $b."<".$c;
    }
    
    /* 
    Este es el modo de hacerlo anidando los if y else
    if($a>$b){
        if($b>$c){
            echo "a b c: $a - $b - $c";
        } else {
            if($a>$c){
                echo "a c b: $a - $c - $b";
            }else{
                echo "c b a: $c - $a - $b";
            }
        }
    }else {
        if ($b>$c){
            if($a>$c){
             echo "b a c: $b - $a - $c";
            }
        }else {
             echo "b c a": $b - $c - $a";
        }
    }
    
    ?>


</body>

</html>
