<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Array tabla</title>
</head>

<body>
    <p>cargar un array de 1000, parte2: cada numero debe ser mayor que el anterior</p>
    <?php
    $lista[0]=rand (1,1000);
        for ($i=1;$i<100;$i++){
            $repe=true;
            while ($repe){
                $x= rand(1,1000);
                $repe=false;
                //for ($j=0; $j<$i; $j++){
                $j=0;
                while (($j<$i) && (!$repe)){
                    if ($lista[$j]==$x){
                        $repe =true;
                    }
                    $j++;
                }
            }
            $lista[$i]=$x;
        }      
    ?>
</body>

</html>
