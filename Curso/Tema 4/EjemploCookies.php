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
        //Creacion de cookies: setCookie(NombreCookie, contenido, "fecha"cadicudad)
        setcookie("Ciudad","Burgos", time()+30*24*3600);

        //Borrar cookie: Crearla hacia el pasado
        setcookie("Ciudad","Burgos", time()-10);

        //Leer cookie: $_COOKIE
        $_COOKIE["Ciudad"]; //Si existe

        isset($_COOKIE["Ciudad"]);// Para asegurarse de que existe esa cookie

        //Que se suele hacer: Si no existe la primera vez, se crea
        if(!isset($_COOKIE["ciudad"])){
            setcookie("ciudad","Burgos",time()+30*24*3600);
        }else{
            //Instrucciones
        }
    ?>
</body>
</html>