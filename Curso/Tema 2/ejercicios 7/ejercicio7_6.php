<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio7_6</title>
</head>

<body>
    <p>Genera al azar la longitud de los tres lados (a,b,c) de un triángulo con valores entre 1 y 10; comprueba que efectivamente lo forman, el tipo (equilátero, isósceles o escaleno) y si es rectángulo</p>

    <?php
        $a=rand(1,10);
        $b=rand(1,10);
        $c=rand (1,10);
        echo "primer valor= ". $a. "<br>";
        echo "segundo valor= ". $b. "<br>";
        echo "tercer valor= ". $c. "<br>";
    
        //Primero comprobamos que es un triangulo, si la suma de los lados pequeños no es mayor que la grande no lo es
            if ($a==$b && $a==$c){ //Si tiene tres lados iguales
            echo "Es un triangulo equilatero";
        } else if ($a+$b>$c && $a+$c>$b && $b+$c>$a){ //Sí forma triangulo
                if(pow($a,2)==pow($b,2)+pow($c,2) || //Si cumple esto es rectangulo
                   pow($b,2)==pow($a,2)+pow($c,2) ||
                   pow($c,2)==pow($a,2)+pow($b,2)){
                    echo "Es un triangulo rectangulo";
                }else if ($a==$b || $a==$c || $b==$c){ 
                echo "Es un triangulo isosceles"; 
            } else{
                 echo "Es un triangulo escaleno";
            }
        } else {
            echo "No forma un triangulo";
        }
    ?>

</body>

</html>
