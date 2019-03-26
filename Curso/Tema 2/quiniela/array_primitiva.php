<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Primitiva</title>
</head>

<body>
    <?php
        $contador=0;
        $primi[0]= rand(1,49);
        
        for ($i=1;$i<6;$i++){
            $anterior=0;
            $numero[$i]=rand(1,45);
            while ($anterior<$i){
                echo $anterior. "<br>";
                echo $i. "<br>";
                if ($numero[$i] == $numero[$anterior]){
                    $numero[$i] =rand(1,45);
                    $anterior=0;
                }else{
                    $anterior++;
                }
            }
        }
    ?>
</body>

</html>
