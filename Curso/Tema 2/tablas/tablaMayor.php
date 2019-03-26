<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Array tabla</title>
</head>

<body>
    <p>cargar un array de 1000, cada numero debe ser mayor que el anterior</p>
    <?php
    $lista[0]=rand (1,1000);
        for ($i=1;$i<100;$i++){
                $x= rand(1,1000);
                 while ($x<=$lista[$i-1]){
                    $x=rand (1,1000);
                }
                if ((1000-$x)<(100-$i)){
                    echo "lista imposible";
                }else{
                    $lista[$i]=$x;
                }
            } 
        
    ?>
</body>

</html>
