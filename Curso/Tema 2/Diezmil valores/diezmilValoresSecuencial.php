<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>secuencia</title>
</head>
<body>
    <?php
    //Hemos creado la lista, y asignado valores aleatorios
    $numeros=array();
    for($i=0;$i<10000;$i++){
        array_push($numeros,rand(1,100000));
    }
    $n=count($numeros);
    foreach ($numeros as $numeros) {
        echo $numeros. "<br>";
    }
    ?>
</body>
</html>