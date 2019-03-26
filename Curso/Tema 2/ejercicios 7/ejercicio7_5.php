<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio7_5</title>
</head>

<body>
    <p>Ordena de menor a mayor tres nºs enteros, almacenados en a, b y c.</p>
    <?php
     $a = rand (0,10);
        $b = rand (0,10);
        $c = rand (0,10);
        echo "Primer numero: ". $a."<br>";
        echo "Segundo numero: ". $b."<br>";
        echo "Tercer numero: ". $c."<br>";
    if($a==$b && $a>$c){    //Entiendo que este ejercicio añade los casos que puedan ser iguales
        echo $c. "<". $a. "=". $b;
    }else if ($a==$b && $a<$c){
        echo $a. "=". $b. "<". $c;
    } else if ($a==$c && $a>$b){
        echo $b. "<". $a. "=". $c;
    }else if ($a==$c && $a<$b){
        echo $a. "=". $c. "<". $b;
    }else if($b==$c && $b>$a){
        echo $a. "<". $b. "=". $c;
    }else if ($b==$c && $b<$a){
        echo $b. "=". $c. "<". $a;
    }else if ($a==$b && $a==$c){
        echo $a. "=". $b. "=". $c;
    
    }else{
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
    }
    ?>
</body>

</html>
