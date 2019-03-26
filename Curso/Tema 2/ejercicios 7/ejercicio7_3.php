<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio7_3</title>
</head>
<body>
    <p>Dados los coeficientes de una ecuación de 2º grado, sobre tres variables a, b y c,
halla todas las posibles soluciones. 
</p>

<?php
    $a=rand(-10,10);
    $b=rand(-10,10);
    $c=rand(-10,10);
    /*$a=2;
    $b=4;
    $c=2;   Datos para forzar una sola solucion*/ 
    echo "a= ".$a. "<br>";
    echo "b= ".$b. "<br>";
    echo "c= ".$c. "<br>";
    $disc= (pow($b,2))-(4*$a*$c); //Calculamos el discriminante para ver los casos que pueden surgir
        if($a==0){
            echo "No se puede dividir entre 0"; //Al dar valor 0 a $a no se puede dividir
        } else if ($disc<0){
            echo "La raiz de un negativo no existe"; 
        } else {
            if ($disc==0){
                $sol= -$b/(2*$a);
                echo "Solución: ". $sol;
            } else {
                $sol1= (-$b+sqrt($disc))/(2*$a);
                $sol2= (-$b-sqrt($disc))/(2*$a);
                echo "Primer valor: ".$sol1. "<br>";
                echo "Segundo valor: ".$sol2;
                
            }
            
        }
    
    
?>
</body>
</html>