<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <style>
    body{
        display:flex;
        justify-content:center;
        align-items:center;   
    }

    form{
        margin-top:50px;
    }

    input{
        padding:2px;
        margin: 5px;
    }

    #psw{
        display:none;
    }
    </style>
</head>
<body>
<?php
         session_start();
         if(isset($_POST["Enviar"])){
             if(!empty($_POST["name"])){
                 $usuario=$_POST["user"];
     
                 //Conexion con la base de datos
                 $link= mysqli_connect("localhost","root","","museo");
     
     
                 $sql="SELECT email_guia FROM guias WHERE usuario='$usuario' ";
                 
                 echo $hast;
                 $resultado=mysqli_query($link,$sql);
                 if(!$resultado){
                     echo "consulta fallida: ", mysqli_errno($link);
                     exit();
                 }
                 
                 if(mysqli_num_rows($resultado)===0){ //es un visitante
                        header("location:cliente.php");
                        exit();
                 }else{    //mysqli_num_rows devuelve la longitud de todos los datos
                     //login correcto
                     $reg=mysqli_fetch_array($resultado,MYSQLI_NUM);
                
                     $_SESSION["user"]=$reg[0];
     
                     mysqli_free_result($resultado);
                     mysqli_close($link);
                     
                     //Redirección
                         header("location:admin_pass.php");
                         exit();

                     
     
                 }
             }else{
                 echo "faltan datos";
             }
         }
        }
        ?>
    <form method="POST" action="login.php">
    <fieldset>
    <legend>LOGIN</legend>
    <label>Introduce el correo: <input type="text" name="user" size=40></label><br>
    <button type="submit" name="enviar">Comprobar correo</button>
    </fieldset>
    </form>

    
</body>
</html>