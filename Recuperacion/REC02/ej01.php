<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ej01</title>
    <style>
        td{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <!--Elimina un cliente elegido en formulario (sin dejar filas vacías).-->
    <?php
include "datos.php";
include "../misFunciones.inc.php";
if (isset($_POST["enviar"])) {

    if (empty($_POST["dni"])) {
        echo "Debes introducir un DNI";
    } else {
        $dni = $_POST["dni"];
        $fila = busquedaFilaSecuencial($datos, $dni, 0);
        if ($fila == false) {
            echo "No se ha encontrado el DNI";
        } else {
            //LLegados a este punto toca borrarle
            echo "antes: " . count($datos) . "<br>";
            mostrarTabla($cabecera, $datos);
            unset($datos[$fila]);

            //Cambiar indices usando array_values
            $datos = array_values($datos);
            //Mostramos el resultado
            echo "despues" . count($datos) . "<br>";
            mostrarTabla($cabecera, $datos);
            //var_dump($datos);

        }
    }
}
?>

    <h1>Ej01</h1>
    <form method="POST" action="ej01.php">
        <h2>Introduce el dni que quieres borrar</h2>
        <label><input type="text" name="dni"></label>
        <button type="submit" name="enviar">Enviar</button>
    </form>

</body>
</html>