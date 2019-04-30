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
    <form method="POST" action="login.php">
    <fieldset>
    <legend>LOGIN</legend>
    <label>Introduce el correo: <input type="text" name="user" size=40></label><br>
    <label id="psw">Contraseña: <input type="pass" name="pass" size=50></label><br>
    <button type="submit" name="enviar">Comprobar correo</button>
    </fieldset>
    </form>

    <?php
        if(isset($_POST["enviar"])){
            if(empty($_POST["user"])){
                echo '<script>alert("Introduce el email");</script>';
            }else if((!empty($_POST["user"]))&&(empty($_POST["pass"]))){

            }
        }
        ?>
</body>
</html>