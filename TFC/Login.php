<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Css\login.css">
    <link rel="stylesheet" href="Css\registro.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<?php
session_start();

    if(isset($_POST["Enviar"])){
        if(!empty($_POST["user"] && !empty($_POST["pass"]))){
            //DNI del usuario
            $user=$_POST["user"];
            //Contraseña
            $pass=md5($_POST["pass"]);

            //Conexion
            $link=mysqli_connect("localhost","root","","drug_reminder");
            $sql= "SELECT Pass FROM usuarios WHERE DNI='$user'"; //Devolver la contraseña
            $resultado=mysqli_query($link,$sql);

            if(!$resultado){
                //No funciona
                echo "consulta fallida: ", mysqli_errno($link);
            }

            if(mysqli_num_rows($resultado)>0){
                $reg=mysqli_fetch_array($resultado,MYSQLI_NUM);
                if($reg[0]==$pass){
                    mysqli_free_result($resultado);
                    mysqli_close($link);
                    header("location:saludo.html");
                    exit();
                }else{
                    header("location:Login.php?fail_pass=true");
                }
            }
        }else{
            echo "faltan datos";
        };
    }
?>
    <div class="box-login">
    <form class="login" action="Login.php" method="post">
        <img id="logo" src="imagenes/logo.jpg" alt="logo">
        <h1>Iniciar Sesión</h1>
        <input type="text" name="user" placeholder="DNI">
        <input type="password" name="pass" placeholder="Contraseña">
        <?php
            if(isset($_GET["fail_pass"]) && $_GET["fail_pass"]=='true'){
                echo'<div style="color:red">Contraseña incorrecta</div>';
            }
        ?>
        <input type="submit" name="Enviar" value="Login">
        <button  class="other" >He olvidado la contraseña</button><br>
        <button class="other" type="button" onclick="CambiaPagina()">¿No tienes cuenta? Regístrate</button>
    </form>
    </div>
    
    
    <div class="box-registro">
    <form class="sign_in" action="Registro.php" method="post">
        <img id="logo" src="imagenes/logo.jpg" alt="logo">
        <h1>Registro</h1>
        <!--Usuario-->
        <div class="campo">
        <label for="user">DNI</label>
        <input type="text" name="user" placeholder="DNI">
        </div>
        <!--Contraseña + comprobador -->
        <div class="campo">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" placeholder="Contraseña">
        <label for="pass2">Vuelva a introducir la contraseña</label>
        <input type="password" name="pass" placeholder="Contraseña">
        </div>
        <!-- Nombre y Apellidos -->
        <div class="campo">
        <label for="nombre">Nombre y apellido</label>
        <input type="text" name="nombre" placeholder="Raul Perez Martin">
        </div>
        <!--Correo electronico + comprobador-->
        <div class="campo">
        <label for="correo"> Correo electronico</label>
        <input type="text" name="correo" placeholder="emailDeEjemplo@gmail.com">
        </div>

        <!--Telefono + comprobador-->
        <div class="campo">
        <label for="tlfn">Telefono</label>
        <input type="text" name="Telefono" placeholder="Telefono">
        </div>
        <input type="submit" name="Enviar" value="Login">
        <a href="https://www.youtube.com/watch?v=-byTiKtOrH4&list=RD2vuSCv_vCIk&index=2">Ya tengo una cuenta</a>
    </form>
    </div>

    <script>
        $(".box-registro").hide();
        function CambiaPagina(){
            $(".box-login").hide(1000);
            $(".box-registro").show(1000);
        }
    </script>
</body>
</html>