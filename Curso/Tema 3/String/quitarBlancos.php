<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!--
        Funcion que elimine los espacios de un string tanto izquierda, como derecha, como medios(TODOS)
    -->
    <?php
    function quitarBlancos(&$textop){
        $n= strlen($textop); //Cuenta los caracteres
        $textaux="";
        for($i=0;$i<$n;$i++){
            if ($textop [$i]!=" "){
                $textaux .= $textop[$i];
            }
        }
        $textop=$textaux;
        
    }
    
    ?>
</body>
</html>