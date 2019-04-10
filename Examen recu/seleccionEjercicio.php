<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST" action="seleccionEjercicio.php">
        <h1>Elige el ejercicio</h1>
        <select name="ejercicio">
            <option>ejercicioa</option> 
            <option>ejerciciob</option>
            <option>ejercicioc</option>
            <option>ejerciciod</option>
            <option>ejercicioe</option>
          </select>
        <button type="submit" name="enviar">Enviar</button>
    </form>

<?php
    if(isset($_POST["enviar"])){
        $ejer=$_POST["ejercicio"];
        if($ejer=="ejercicioa"){
            header ("location:ejercicioa.php");
        }
        if($ejer=="ejerciciob"){
            header ("location:ejerciciob.php");
        }
        if($ejer=="ejercicioc"){
            header ("location:ejercicioc.php");
        }
        if($ejer=="ejerciciod"){
            header ("location:ejerciciod.php");
        }
        if($ejer=="ejercicioe"){
            header ("location:ejercicioe.php");
        }
    }
?>
</body>
</html>