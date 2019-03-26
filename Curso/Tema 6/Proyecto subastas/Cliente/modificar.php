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
    if(isset($_POST["enviar"])){
        $usuario=$_SESSION["user"];
        $link = mysqli_connect("localhost","Alvaro","Alvaro","transporte");
        
        if(!empty($_POST["email"])){
            $sql="update clientes where dni=$usuario";
            

        }

        if(!empty($_POST["tlf"])){
            $sql="update clientes where dni=$usuario";
        }

        if(!empty($_POST["pass"])){
            $sql="update clientes where dni=$usuario";
        }
    }

    ?>
    <p>Introduce los datos que quieras cabiar</p>
    <fieldset>
    <form method="POST" action="Cliente.html">
            <label>email: <input type="text" name="email"></label><br>
            <label>Telefono: <input type="text" name="tlf"></label><br>
            <label>Contraseña: <input type="text" name="pass"></label><br>
            <button type="submit" name="enviar">Enviar</button>
    </form>
    </fieldset>
</body>
</html>