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
    //Esto se usará en la mayoria de codigos para autentificar un usuario
if($_SESSION["control"]=="logueado"){
    //Codigo
}else{
    echo "No estas autorizado";
}
    ?>
</body>
</html>