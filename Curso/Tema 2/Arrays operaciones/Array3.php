<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Array2</title>
</head>

<body>
    <p>en un array meto 20 numeros y hago:
        El numero a almacenar se ha recogido previamente <br>
        2)Eliminarlo de la lista si existe, si no no esta (con unset)
    </p>

    <?php
    $lista=[2,15,20,21,34,38,39,45,49,60,62,67,68,70,72,74,78,85,87,90];
    echo  "Numeros al empezar: ".count($lista). "<br>";
    //Añadimos un numero al final
    $x=rand (1,100);
    echo "Numero a añadir: $x". "<br>";
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
    echo "<br>";
    $encontrado=0;
    $puesto=0;
    $y=rand(1,100);
    echo "Numero a borrar: $y". "<br>";
        while(($i<count($lista)) and (!$encontrado)){
        if ($lista[$i]==$y){
            $encontrado=1;
            $puesto=$i;
        }
        $i++;
    }
    
    if($encontrado){
        unset($lista[$puesto]);
        for($i=$puesto;$i<count($lista)-1;$i++){
            $lista[$i]=$lista[$i+1]; //Esto mete el puesto siguiente en el puesto anterior
        }   
        unset($lista[count($lista)-1]);
        for ($i=0; $i<count($lista);$i++){
            echo $lista[$i]. ", ";
        }
    }else{
        echo "numero no encontrado";
    }
    
    
    
    ?>
</body>

</html>
