<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
        include 'datos.php';
        include 'misfunciones.inc.php';
    ?>

    <h1>Examen recuperación- Temas 1 a 4</h1>
    
    <h2>Inicio de sesión</h2>
    <form method="post" action="">
        <input type="text" name="user" placeholder="Usuario">
        <input type="password" name="pass"  placeholder="Contraseña">
        <br>
        <a href="registro.php" id="registro">¿No estás registrado?</a>
        <input type="submit" value="Iniciar sesión" name="enviar">
    </form>
    
    <?php
        if(isset($_POST["enviar"])){
            if(!empty ($_POST['user']) && !empty ($_POST['pass'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];


                //Comprueba si existe la cookie. Si el usuario no es el de la cookie, no le deja iniciar sesion.
                //Si no existe, la crea con los datos introducidos
                if(!isset($_COOKIE['usuarioLogeado'])){
                    setcookie("usuarioLogeado", $user . "-" . $pass, time() + 365 * 24 * 60 * 60);
                    header('location: aplicacion.php');
                //Si existe, comprueba si los datos introducidos coinciden con los de la cookie
                }else{
                    $existe = comprobarUsuario($user, $pass);
                }

                //Si los datos son correctos
                if($existe){
                    header('location: aplicacion.php');
                //Si no lo son
                }else{
                    echo '<script>alert("El usuario y/o contraseña no son correctos.");</script>';
                }
            }
        }

        
    ?>
</body>
</html>