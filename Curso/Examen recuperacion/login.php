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
if (!isset($_COOKIE["nombre"])) {
    header("location:registro.php");

} else {
    if (!isset($_POST["enviar"])) {
        if (!empty($_POST["usuario"]) || !empty($_POST["pass"])) {
            if ($_POST["usuario"] == $_COOKIE["usuario"] and $_POST["pass"] == $_COOKIE["pass"]) {
                if ($_COOKIE["rol"] == "proveedor") {
                    header("location:registro.php");
                }
                if ($_COOKIE["rol"] == "administrador") {
                    header("location:backend.php");
                }
            } else {
                echo "Datos incorrectos";
            }
        } else {
            echo "Introduce los dos datos";
        }

    }

    echo "<form method='POST' action='login.php'>
        Usuario:  <input type='text' name='usuario'><br>
        Contraseña:  <input type='password' name='pass'><br>
        <input type='submit' name='enviar'/><br/>
        </form>";
}
?>
</body>
</html>