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
        echo "<input type='submit' name='Añadir'><br>
        <input type='submit' name='Modificar'><br>
        <input type='submit' name='Borrar'><br>";
        $admin=fopen("clientes.txt","a+");

    ?>
</body>
</html>