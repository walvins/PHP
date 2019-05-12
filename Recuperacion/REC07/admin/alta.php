<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo alta</title>
</head>
<body>
    <?php
        if(isset($_POST["enviar"])){
            if(!empty($_POST['dni'])&&!empty($_POST['pass'])&&!empty($_POST['nombre'])&&!empty($_POST['fecha'])&&!empty($_POST['tfn'])&&!empty($_POST['localidad'])&&!empty($_POST['tipo'])){
                $dni = $_POST["dni"];
                $pass = $_POST["pass"];
                $hash =md5($pass);
                $nombre = $_POST["nombre"];
                $fecha = $_POST["fecha"];
                $tfn=$_POST["tfn"];
                $localidad=$_POST["localidad"];
                $tipo=$_POST["tipo"];

                $link= mysqli_connect("localhost","root","","restaurante");
                $sql="";

            }
        }
    ?>

    <form method='POST' action='alta.php'>
    <legend>Datos del transportista</legend>
    <fieldset> 
        <label>DNI<input type='text' name='dni'></label><br>
        <label>Contraseña<input type='text' name='pass'></label><br>
        <label>Nombre<input type='text' name='nombre'></label><br>
        <label>Fecha de nacimiento<input type='date' name='fecha'><label><br>
        <label>Telefono<input type='number' name='tfn'></label><br>
        <label>Localidad<input type='text' name='localidad'></label><br>
        <label>Tipo<input type='text' name='tipo'></label><br>
        <button type="submit" name="enviar"></button>
    </fieldset>
    </form>
</body>
</html>