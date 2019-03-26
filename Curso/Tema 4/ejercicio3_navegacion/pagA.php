<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="index.php"><button type='button' id='index'>index</button></a><br>
    <a href="pagB.php"><button type='button' id='B'>B</button></a><br> 
    <a href="pagC.php"><button type='button' id='C'>C</button></a><br>
    
    <?php
    session_start(); //Esto se pone siempre para coger la sesion
    
    if($_SESSION["pagAnt"]!="pagA.php"){
    $_SESSION["pagA"]++;
    $_SESSION["pagAnt"]="pagA.php";
    }
    echo "<br>Contador: ".$_SESSION["pagA"];
    ?>
</body>
</html>