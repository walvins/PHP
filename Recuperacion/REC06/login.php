<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<?php
    session_start();
    if(isset($_POST["Enviar"])){
        if(!empty($_POST["name"])|| !empty($_POST["pass"])){
            $usuario=$_POST["user"];
            $pass=$_POST["pass"];

            //Conexion con la base de datos
            $link= mysqli_connect("localhost","alvaro","alvaro","telebank");

            //Pasamos la contraseña a md5
            $hast=md5($pass);

            $sql="select * from clientes where Codigo='$usuario' and contraseña='$hast'";
            
            $resultado=mysqli_query($link,$sql);
            if(!$resultado){
                echo "consulta fallida: ", mysqli_errno($link);
                exit();
            }

            if(mysqli_num_rows($resultado)){    //mysqli_num_rows devuelve la longitud de todos los datos
                //login correcto
                $reg=mysqli_fetch_array($resultado,MYSQLI_ASSOC);
                //$usuario=$reg['id_cliente'];
                $_SESSION["user"]=$usuario;
               
                //Redirección
                if($reg["rol"]=="admin"){
                    header("location:backend.php");
                }
                if($reg["rol"]=="cliente"){
                   header("location:cliente.php");
                }
                mysqli_free_result($resultado);
                mysqli_close($link);
            }
        }else{
            echo "faltan datos";
        }
    }
?>



<form method="POST" action="login.php">
<label>Codigo de cliente: <input type="text" name="user"> </label><br>
<label>Contraseña: <input type="password" name="pass"> </label><br>
<button type="submit" name="Enviar">Enviar</button>
<form>
</body>
</html>