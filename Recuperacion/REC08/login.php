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
    if(isset($_POST["Enviar_mail"])){
        if(!empty($_POST["user"])){
            $mail=$_POST["user"];
            //dni=pass
            //Conexion con la base de datos
            $link= mysqli_connect("localhost","root","","concesionario");
            //Pasamos la contraseña a md5
            $sql="SELECT * FROM clientes WHERE email='$mail'";
            $resultado=mysqli_query($link,$sql);
            
            if(!$resultado){
                echo "consulta fallida: ", mysqli_errno($link);
                //exit();
            }
            
            if(mysqli_num_rows($resultado)){    //mysqli_num_rows devuelve la longitud de todos los datos
                //login correcto
                $reg=mysqli_fetch_array($resultado,MYSQLI_NUM);
                
                //$usuario=$reg['id_cliente'];
                
                $_SESSION["mail"]=$reg[0];
                mysqli_free_result($resultado);
                mysqli_close($link);

                header("location:login2.php");
                exit();
                

            }
        }else{
            echo "faltan datos";
        }
    }
    echo'<form method="POST" action="login.php">
    <label>email: <input type="text" name="user"> </label><br>
    
    <button type="submit" name="Enviar_mail">Enviar</button>
    <form>';
?>




</body>
</html>