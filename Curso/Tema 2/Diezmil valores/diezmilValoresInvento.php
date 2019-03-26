<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invento</title>
</head>
<body>
    <?php
    //Hemos creado la lista, y asignado valores aleatorios
    $numeros=array();
    for($i=0;$i<10000;$i++){
        array_push($numeros,rand(1,100000));
    }
    $n=count($numeros);


    //Ordenamos
    for($i=0; $i<$n;$i++){
        for($j=$n-1;$j>$i;$j--){
            if($numeros[$j]<$numeros[$j-1]){
                $aux= $numeros[$j];
                $numeros[$j]=$numeros[$j-1];
                $numeros[$j-1]=$aux;
            }
        }
    }
    foreach ($numeros as $numeros) {
        echo $numeros. "<br>";
    }
    //Generamos un numero
    $generador=rand(1,100000);
    echo "Numero a buscar: $generador";
    //Ponemos los limites
    $pI=0;
    $pF=$n;

    while ($numeros[$pF]!=$generador){        //Mientras no coincida el numero tope con el numero dado, se repite
        $avance=$pF/10;
        $encontrado=false;
        while(!$encontrado){
            $acumulador=0;
            if($generador>$numeros[$acumulador]){
                $acumulador +=$avance;
            }else{
                $pF=$acumulador;
                $encontrado=true;
            }
        }
    }
    echo "el numero $generador esta en la posicion $pf";
    ?>
</body>
</html>