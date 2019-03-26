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
    function edad($nacp){
    $subArray= explode("/",$nacp);
    $dia= $subArray[0];
    $mes= $subArray[1];
    $anio= $subArray[2];
    $hoy= time();
    $segundos= mktime(0,0,0,$mes,$dia,$anio);
    $diff= $hoy-$segundos;
    $diff= floor($diff/60/60/24/365.25);
    echo "Edad: ".$diff;
    
    }
    $nacimiento="20/10/1997";
    edad($nacimiento);
    ?>
</body>
</html>