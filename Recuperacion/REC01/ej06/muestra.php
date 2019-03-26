<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar</title>
</head>
<body>
    <?php
include "../datos.php";
include "../../misFunciones.inc.php";


$dni = $_POST["dni"];

if (empty($dni)) {
    echo "No has introducido ningun dni <br>
        <a href='formulario.html'><input type='button' value='Regresar'></a>";
} else {
    $fila=busquedaFilaSecuencial($datos, $dni, 0);
    if($fila==false){
    echo "No se ha encontrado el DNI <br>
        <a href='formulario.html'><input type='button' value='Regresar'></a>"; 
    }else{
        echo "<h1>Datos del DNI $dni :</h1><br>";
        for ($j=1; $j <count($datos[$fila]) ; $j++) { 
            echo $cabecera[$j].": ".$datos[$fila][$j]."<br>";
        }
    }
}

?>
</body>
</html>