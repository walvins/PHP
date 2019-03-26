<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $a=0;
    $b=rand(-10,10);
    $c=rand(-10,10);
    /*$a=2;
    $b=4;
    $c=2;   Datos para forzar una sola solucion*/ 
    echo "a= ".$a. "<br>";
    echo "b= ".$b. "<br>";
    echo "c= ".$c. "<br>";
    $disc= (pow($b,2))-(4*$a*$c); //Calculamos el discriminante para ver los casos que pueden surgir
    try{
        if($a==0){
            throw new Exception("No se puede dividir entre 0 ".$e);
        }
   
    try{
        if ($disc<0){
            throw new Exception("La raiz de un negativo no existe ".$e);
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
    }catch(Exception $e){
        echo "Excepcion capturada: ",$e->getMessage(), "\n";
    }   
}catch(Exception $e){
    echo "Excepcion capturada: ",$e->getMessage(), "\n";
}   
        
?>
</body>
</html>