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
    $encontrado=0;
    $fichero=fopen("clientes.txt","r");
    $encontrado=0;
    while(!feof($fichero) and ($encontrado)){
        $reg=fread($firecho);
        list($dnil,$pass, $tipo)=explode("~", $reg);
        if(($dnil==$dni)and ($contra==$pass)){
            
        }
    }
    ?>
</body>
</html>