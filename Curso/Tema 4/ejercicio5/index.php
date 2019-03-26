<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="pagA.php"><button type='button' id='A'>A</button></a><br>
    <a href="pagB.php"><button type='button' id='B'>B</button></a><br> 
    <a href="pagC.php"><button type='button' id='C'>C</button></a>
    
    <?php
    session_start();
    //Creacion e inicializacion a 0
    if(!isset($_SESSION["pagA"])){ //Si no existe la sesion se crea
    $_SESSION["pagA"]=0;
    $_SESSION["pagB"]=0;
    $_SESSION["pagC"]=0;
    $_SESSION["proy"]="";
    }else{
        if($_SESSION["proy"]=="A"){
            $_SESSION["pagA"]+=time()-$_SESSION["instA"];
        }
        if($_SESSION["proy"]=="B"){
            $_SESSION["pagB"]+=time()-$_SESSION["instB"];
        }
        if($_SESSION["proy"]=="C"){
            $_SESSION["pagC"]+=time()-$_SESSION["instC"]
        }
    }
    

    
    ?>
</body>
</html>