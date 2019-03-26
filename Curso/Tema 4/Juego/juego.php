<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Juego</title>
</head>
<body>
    <?php
    session_start();
        $num= rand(1 , 100);
    if(!isset($_SESSION["intentos"])){
        $_SESSION["intentos"]=0;

    }
    $numero=$_POST["numero"];
    $encontrado=false;
    while($encontrado!=true){
        if($numero!=$num){
            echo "<meta http-equiv='Refresh' content='1;URL=juego.html'/>";
            $encontrado=false;
            $_SESSION["intentos"]++;
        }else{
            $encontrado=true;
        }
    }   

    ?>
</body>
</html>