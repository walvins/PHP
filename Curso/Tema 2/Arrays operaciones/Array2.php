<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Array2</title>
</head>

<body>
    <p>en un array meto 20 numeros y hago:
        1)añadir un nuevo numero al final.
        b) No repetido
    </p>

    <?php
    $lista=[2,15,20,21,34,38,39,45,49,60,62,67,68,70,72,74,78,85,87,90];
    echo  "Numeros al empezar: ".count($lista). "<br>";
    //Añadimos un numero al final
    $x=rand (1,100);
    $repe=0;
    $i=0;
    /* el for funciona, pero queremos que pare al llegar al numero que se repite 
    for ($i=0; $i<count($lista);$i++){
        if ($lista[$i]==$x){
            $repe=1;
        }    
    }*/
    while(($i<count($lista)) and (!$repe)){
        if ($lista[$i]==$x){
            $repe=1;
        }
        $i++;
    }  
    //Al usar el while para si se repite
        if($repe){
            echo "No se añade, el numero ya está incluido en el puesto $i" ;
        }else{
            $lista[]=$x;
            for ($i=0; $i<count($lista);$i++){
            echo $lista[$i]. ", ";
    }
        }
    ?>
</body>

</html>
