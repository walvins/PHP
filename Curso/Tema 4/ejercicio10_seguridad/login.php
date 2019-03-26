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
    $fichero=fopen("fich.txt","a");
    if(isset($_POST['enviar'])){
        
        while(!feof($fichero)){
            $linea=fget($fichero);
            $arrayLinea=explode("~", $fichero);
            if($_POST[])
        }
    }else{
        echo"<form method='POST' action='login.php'>
        DNI:  <input type='text' name='dni'><br>
        Contraseña:  <input type='password' name='pass'><br>
        <input type='submit' name='enviar'/><br/>
        </form>";
    }
    ?>
    
</body>
</html>