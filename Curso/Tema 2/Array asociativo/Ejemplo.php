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
        $capital=array("España"=>"Madrid","Francia"=>"Paris","Italia"=>"Roma");
        echo "Capital de España: ". $capital["España"]."<br>";
        $n=count($capital);
        /*
        for ($i=0;$i<$n;$i++){
            echo "Capital ",$i+1,":",$capital[$i];
        }
        Esto no funciona porque los subindices no son numericos */
        
        //SOLUCION, usar foreach
        foreach($capital as $ciudad){
            echo $ciudad. "<br>";
        }
    ?>
</body>
</html>