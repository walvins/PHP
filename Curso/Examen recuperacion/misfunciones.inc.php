<?php

//Abrir eñ fichero
function ficheroToArray($fich)
{

    $varfich = fopen($fich, "r");
    $i = 0;
    while (!feof($varfich)) {

        $fila = fgets($varfich);
        $datos = explode("~", $fila);

        for ($j = 0; $j < count($datos); $j++) {
            $tabla[$i][$j] = $datos[$j];
        }
        $i++;
    }

    fflush($varfich);
    fclose($varfich);
    return $tabla;
}

//Mostrar una tabla
function mostrarTabla($t, $cabecera)
{
    echo "<h1 align=center>tabla</h1>";

    echo "<table border=2 align=center>";

    echo "<tr>";
    for ($k = 0; $k < count($cabecera); $k++) {
        echo "<th>", $cabecera[$k], "</th>";

        "</tr>";
    }

    for ($i = 0; $i < count($t); $i++) {
        echo "<tr>";

        for ($j = 0; $j < count($t[0]); $j++) {
            echo "<td>", $t[$i][$j], "</td>";

        }

    }
    echo "</tr> ";
    echo "</table>";
}
