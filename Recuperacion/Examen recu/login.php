<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form method='POST' action='login.php'>
        Usuario:  <input type='text' name='user'><br>
        Contraseña:  <input type='password' name='pass'><br>
        <input type='submit' name='enviar'/><br/>
    </form>
    <?php
    if(isset($_POST["enviar"])){
        //Almacenamos los datos
        $user=$_POST["user"];
        $pass=$_POST["pass"];

        //Si es la primera vez, se crea
        if(!isset($_COOKIE[$user])){
            setcookie($user,$pass,time()+2*24*60*60);//Caduca en 2 dias
        }else{  
            if($_COOKIE[$user]==$pass){ //Si existe se compara el dato de la cookie con la contraseña
                header ("location:seleccionEjercicio.php");
            }else{
                echo '<script>alert("Contraseña incorrecta");</script>';
            }
        }
    }
    ?>

</body>
</html>