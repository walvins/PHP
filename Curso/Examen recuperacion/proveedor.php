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
include "misfunciones.inc.php";
if (!isset($_POST["enviar"])) {
    $codigo = $_POST["cod"];
    $unidades = $_POST["unidades"];
    $fecha = $_POST["fecha"];

    //Comprobar que existe el codigo

    $datos_almacen = fichToArray("almacen.txt");

    for ($i = 0; $i < $datos_almacen . length(); $i++) {
        if ($codigo == $datos_almacen[i][0]) {
            $codigoCorrecto = $codigo;
        } else {
            echo "Codigo de producto incorrecto";
        }
    }

    $entrega = array($codigoCorrecto, $unidades, $fecha);

    //Pasar el array al fichero
    function arrayToFich($tabla, $fich)
    {
        if (!file_exists($fich)) {
            $varfich = fopen($fich, "w");
        } else {
            $varfich = fopen($fich, "a");
        }
        for ($i = 0; $i < count($tabla); $i++) {
            if ($i == count($tabla) - 1) {
                $linea = ($tabla[$i][0] . "~" . $tabla[$i][1] . "~" . $tabla[$i][2] . "~" . $tabla[$i][3] . "~" . $tabla[$i][4]);
                fputs($varfich, $linea);
            } else {
                $linea = ($tabla[$i][0] . "~" . $tabla[$i][1] . "~" . $tabla[$i][2] . "~" . $tabla[$i][3] . "~" . $tabla[$i][4]);
                fputs($varfich, $linea . PHP_EOL);
            }

        }
        fflush($varfich);
        fclose($varfich);
    }
    arrayToFich($entrega, "entradas.txt");
}
?>

        <form method='POST' action='proveedor.php'>
            Codigo pieza:  <input type='text' name='cod'><br>
            Unidades:  <input type='number' name='unidades'><br>
            fecha:  <input type='date' name='fecha'><br>
            <input type='submit' name='enviar'/><br/>
        </form>
</body>
</html>