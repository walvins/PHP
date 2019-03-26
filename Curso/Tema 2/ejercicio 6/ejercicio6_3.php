<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ejercicio6_3</title>
</head>

<body>
    <p>Comprueba el resultado de la expresión: $a = 8+($b=4)</p>
    <p>Resultado esperado: $a=12</p>
    <p>Resultado real:</p>
    <?php
        $a=8+($b=4);
        echo $a;
    ?>
    
</body>

</html>
