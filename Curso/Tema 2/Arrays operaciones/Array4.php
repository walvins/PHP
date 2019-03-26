<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Array4</title>
</head>

<body>
    <p>
        3)El numero contenido se inserta en el puesto que le correspoda respetando el orden.
    </p>

    <?php
    $lista=[2,15,20,21,34,38,39,45,49,60,62,67,68,70,72,74,78,85,87,90];
    echo  "Numeros al empezar: ".count($lista). "<br>";
    //Añadimos un numero al final
    $x=rand (1,100);
    $encontrado=0;
    $i=0;
    // 1) Buscamos, si encuentra se va a poner en true $encontrado
    while(($i<count($lista) and (!$encontrado) and ($lista [$i]<$x))){
        if ($lista[$i]==$x){
            $encontrado=1;
        }
        $i++;
    }
    //De las opciones del While separamos
    //Si se ha encontrado:
    if ($encontrado){
        echo "No se admiten repetidos";
    }else{ 
        if ($i==count($lista)){ //Es mayor que todos los que estan
             $lista[]=$x;   //Añadirle al finl, por algo es el mas grande
                for ($i=0; $i<count($lista);$i++){
                echo $lista[$i]. ", "; 
                }
        }else{  //La que queda,abrir hueco para el nuevo, se le inserta donde le corresponde
            $lista[]=$lista[count($lista)-1];//Primero se crea el nuevo huevo  y se mete el que era el ultimo numero
            for($j=count($lista)-2;$j>$i;$j--){
                $lista[$j]=$lista[$j-1];
            }
        $lista[$i]=$x;
            for ($i=0; $i<count($lista);$i++){
                echo $lista[$i]. ", ";
        }
    }
    ?>
</body>
</html>