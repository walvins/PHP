<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <?php
    include "datos.php";
    include "burbuja.php";
    $dni="92342334H";
        function busquedaBinaria($datosp,$dnip){
            burbuja($datosp,0);

            $izq=0;
            $der=count($datosp)-1;
            $n=-1;
            while($izq < $der ){  
                $medio=($izq+$der)/2;
                if ($datosp[$medio][0]==$dnip){     
                    $n=$medio;   
                }elseif ($datosp[$medio][0] < $dnip){ 
                    $izq = $medio; 
                }elseif ($datosp[$medio][0] > $dnip){ 
                    $der = $medio;  
                }
            }      
            return $n;
              


        }
        
    $posicion=busquedaBinaria($datos, $dni);

    if ($posicion > -1){
     echo " El DNi esta en la posición $posicion "; 
    }else{
       echo " No se encontró el DNI $dni";     
    }
?>
    
</body>
</html>