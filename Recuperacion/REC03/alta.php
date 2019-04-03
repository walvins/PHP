<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta</title>
</head>
<body>
    <form method="POST" action="alta.php">
        <Fieldset>
            <label>Nombre de usuario <input type="text" name="user"></label><br>
            <label>Contraseña <input type="text" name="pass"></label><br>
            <button type="submit" name="enviar">Enviar</button>
        </Fieldset>
    </form>
    <?php
        include "../misFunciones.inc.php";
        if(isset($_POST["enviar"])){
            $user=$_POST["user"];
            $pass=$_POST["pass"];
            $texto="players.txt";
            $hoy=hoy();
            $nuevoUser=array($user,$pass,"0",$hoy);
            $usuarios=ficheroToArray($texto);
            $fila=busquedaFilaSecuencial($usuarios,$user,0);
            echo $fila;
            if($fila!==false){
                echo '<script>alert("El usuario ya existe");</script>';                
            }else{
                array_push($usuarios,$nuevoUser);
                borrarTexto($texto);
                arrayToFichero($usuarios,$texto);
            }

        }
    ?>
</body>
</html>