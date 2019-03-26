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

if (isset($_POST["enviar"])) {
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $matricula = $_POST["matricula"];
    $email = $_POST["email"];
    $tfn = $_POST["tfn"];
    $pass = $_POST["pass"];
    $hast = md5($pass);
    $activo = $_POST["activo"];
    $carga = $_POST["carg_max"];
    //IMAGENES  GUARDAR PARA EL EXAMEN
    $target_dir = "imagenes/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["imagen"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    //Aqui termina la subida de la imagen a la carpeta
    
    //CONEXION
    $link = mysqli_connect("localhost", "Alvaro", "Alvaro", "transporte");
    $sql= "insert into vehiculos (matricula, carga_max, imagen)values('$matricula','$carga','".$_FILES["imagen"]["name"]."')";
    mysqli_query($link, $sql);

    $sql2="insert into transportistas (	dni_transp, nombre,	matricula,	email, tlf,	password, activo) values('$dni','$nombre','$matricula','$email','$tfn','$hast','$activo')";
    mysqli_query($link, $sql2);
}

echo "<form method='POST' action='Administrador.php' enctype='multipart/form-data'>
            <fieldset>
            <legend>Datos del transportista</legend>
            <label>DNI<input type='text' name='dni'></label><br>
            <label>Nombre<input type='text' name='nombre'></label><br>
            <label>Matricula<input type='text' name='matricula'></label><br>
            <label>Email<input type='text' name='email'></label><br>
            <label>Telefono<input type='number' name='tfn'></label><br>
            <label>Contraseña<input type='text' name='pass'></label><br>
            <label>Activo<input type='number' name='activo'></label><br>
            </fieldset>
            <fieldset>
            <legend>Datos del vehiculo</legend>
            <label>Carga maxima<input type='number' name='carg_max'></label><br>
            <label>Imagen<input type='file' name='imagen'></label><br>
            </fieldset>
            <button type='submit' name='enviar'>Enviar</button>
        </form>"
?>
</body>
</html>