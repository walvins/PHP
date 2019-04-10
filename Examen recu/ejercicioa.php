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
    include "datos.php";
    include "misFunciones.inc.php";

    for ($j = 0; $j < count($datos); $j++) {
        for ($z = count($datos) - 1; $z > $j; $z--) {
            if ($datos[$z][4] < $datos[$z - 1][4]) {
                $aux = $datos[$z];
                $datos[$z] = $datos[$z - 1];
                $datos[$z - 1] = $aux;
            }
        }
        for ($i = count($datos) - 1; $i > $j; $i--) {
            if ($datos[$i][3] < $datos[$i - 1][3]) {
                $aux = $datos[$i];
                $datos[$i] = $datos[$i - 1];
                $datos[$i - 1] = $aux;
            }
        }
    }
    mostrarTabla($cabecera,$datos)
    ?>
</body>
</html>