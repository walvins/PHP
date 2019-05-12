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
        if(!empty($_POST["user"])&& !empty($_POST["pass"])){
            $dni=$_POST["user"];
            $pass=$_POST["pass"];
            //dni=pass
            //Conexion con la base de datos
            $link= mysqli_connect("localhost","root","","restaurante");

            //Pasamos la contraseña a md5
            $hash=md5($pass);

            $sql="SELECT * FROM clientes WHERE DNI='$dni' AND Pass='$hash'";
            
            
            $resultado=mysqli_query($link,$sql);
            
            if(!$resultado){
                echo "consulta fallida: ", mysqli_errno($link);
                //exit();
            }
            
            if(mysqli_num_rows($resultado)){    //mysqli_num_rows devuelve la longitud de todos los datos
                //login correcto
                $reg=mysqli_fetch_array($resultado,MYSQLI_NUM);
                
                //$usuario=$reg['id_cliente'];
                
                $_SESSION["dni"]=$reg[0];

                mysqli_free_result($resultado);
                mysqli_close($link);
                
                //Redirección
                if($reg[6]=="admin"){
                    header("location:admin/backend.php");
                    exit();
                }
                if($reg[6]=="cliente"){
                   header("location:cliente/opciones.html");
                   exit();
                }

            }
        }else{
            echo "faltan datos";
        }
    }
?>



<form method="POST" action="login.php">
<label>DNI: <input type="text" name="user"> </label><br>
<label>Contraseña: <input type="password" name="pass"> </label><br>
<button type="submit" name="Enviar">Enviar</button>
<form>
</body>
</html>