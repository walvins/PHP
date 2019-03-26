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
    //Tabla de multiplicar
    echo "<table border=\"1\"";
        for($i=1;$i<=10;$i++){
            echo "<tr>";
            echo $i;
            echo "</tr>";
            echo "<tr>";
            echo "<th>".$i."</th>";
            for ($j=1;$j<=10;$j++){
                $multiplicacion= $i*$j;
                echo "<th>".$multiplicacion. "<th>";
            }
            echo "<tr>";
        }
    echo "</table>";
    
   
    ?>
</body>
</html>