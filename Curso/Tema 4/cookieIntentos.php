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
    //Crear cookie que si no nos reconoce crea cookie y si nos conoce saluda y dice cuanto lleva

        if(!isset($_COOKIE["nombre"])){
            if (isset($_POST['enviar'])){
                $valor= $_POST['nombre'];
                setcookie("nombre",$valor, time()+30*24*3600);
            }else{
                echo "<form method='POST' action='cookieIntentos.php'>
                    <label>Nombre del usuario: <input type='text' name='nombre'> </label>
                    <input type='submit' value='enviar' name='enviar'>
                  </form>";
            }
           
           
        }else{
            echo "Hola ". $_COOKIE["nombre"]."hace ".($time-$fecha). "segundos que no entras";
        }
    ?>
</body>
</html>