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
        session_start();
        include "../misFunciones.inc.php";
    ?>

    <form method="POST" action="login.php">
        <label>Usuario: <input type="text" name="user"></label><br>
        <label>Contraseña: <input type="text" name="pass"></label><br>
        <button type="submit" name="enviar">Jugar</button>
    </form>

    <?php
        if(isset($_POST["enviar"])){
            if((empty($_POST["user"]))||(empty($_POST["pass"])) ){
                echo '<script>alert("Introduce todos los datos para loguearte");</script>';
            }else{
                $user=$_POST["user"];
                $pass=$_POST["pass"];
                $texto="players.txt";
                $usuarios=ficheroToArray($texto);
                var_dump ($usuarios);
                $fila=busquedaFilaSecuencial($usuarios,$user,0);
                
                if($fila===false){
                    echo '<script>alert("No se ha encontrado el usuario");</script>';
                }else{
                    if($usuarios[$fila][1]!=$pass){
                        echo '<script>alert("Contraseña incorrecta");</script>';
                    }else{
                        header ("location:juego.php");
                    }
                }
            }
        }
    ?>
</body>
</html>
