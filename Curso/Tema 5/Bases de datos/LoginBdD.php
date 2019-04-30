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
$_SESSION["a"]="asd";
if(isset($_POST["Enviar"])){
    if(!empty($_POST["usuario"]) || !empty($_POST["contra"])){
        $usuario=$_POST["usuario"];
        $pass=$_POST["contra"];
        //Conexion
        $link= mysqli_connect("localhost","Alvaro","Alvaro","museo");
        $hast=md5($pass);
        $sql="select * from clientes where id_cliente='$usuario' and Contrasena ='$hast'"; //Aqui es donde se hace el login
        $resultado=mysqli_query($link,$sql);
        if(!$resultado){
            echo "consulta fallida: ", mysqli_errno($link);
            exit();
        }
        if(mysqli_num_rows($resultado)){    //mysqli_num_rows devuelve la longitud de todos los datos
            //login correcto
            /*$reg=mysqli_fetch_array($resultado,MYSQLI_ASSOC);
            $usuario=$reg['id_cliente'];*/
            $_SESSION["user"]=$usuario;
            mysqli_free_result($resultado);
            mysqli_close($link);
            //Redirección
            echo "Bienvenido";
            header ("location:frontend.php");
            exit();
        }
    }else{
        echo "Faltan datos";
    }
}


//Formulario
echo '<form method="POST" action="LoginBdD.php">
<label>ID: <input type="text" name="usuario"> </label><br>
<label>Contraseña: <input type="text" name="contra"> </label><br>
<button type="submit" name="Enviar">Enviar</Button>
</form>';
?>  
</body>
</html>