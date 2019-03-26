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
    function ordenFinch($fich,$camp){
        $aux=file($fich);
        $i=0;$encontrado=false;
        while($i<count($tabla) && (!$encontrado)){
            if (strpos($tabla[$i],$dato)){
                $encontrado=1
            }else{
                $i++;
            }
        }

        for($j=0;$j<$n;$j++){    
            for ($k=$n-1;$k>$j;$k--){ 
                if($arrayp[$k][$colump]<$arrayp[$k-1][$colump]){
                $aux=$arrayp[$k];                   
                $arrayp[$k]=$arrayp[$k-1];        
                $arrayp[$k-1]=$aux;                
                }
            }
        }
    }
    ?>
</body>
</html>