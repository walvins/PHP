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
        if(!isset($_COOKIE["nombre"])){
         if(isset($_POST['enviar'])){
            if (!empty($_POST["usuario"]) || !empty($_POST["pass"])){
                setcookie("usuario",$_POST["usuario"] );
                setcookie("pass",$_POST["pass"]);
                setcookie("rol",$_POST["rol"]);
               
            }
         }
        
        echo "<form method='POST' action='registro.php'>
        Usuario:  <input type='text' name='usuario'><br>
        Contraseña:  <input type='password' name='pass'><br>
        Rol (proveedor o administrador):  <input type='text' name='rol'><br>
        <input type='submit' name='enviar'/><br/>
        </form>";
        }
        else{
            header("location:login.php");
        }
    ?>

</body>
</html>