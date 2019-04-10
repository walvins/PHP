<?php
//Muestra la tabla
function mostrarTabla($cabecerap, $datosp)
{
    echo "<table><tr>";
    for ($i = 0; $i < count($cabecerap); $i++) {
        echo "<td>" . $cabecerap[$i] . "</td>" . " ";
    }
    echo "</tr><br>";
    for ($i = 0; $i < count($datosp); $i++) { //Para coger cada array de datos en una fila distinta
        echo "<tr>";
        for ($j = 0; $j < count($datosp[$i]); $j++) { //Aqui los datos son los mismos que en columnas
            echo "<td>" . $datosp[$i][$j] . "</td>" . " ";
        }
        echo "</tr>";
    }
    echo "</table>";
}

//Burbuja
function burbuja($datosp, $columnap)
{
    $ordenado=$datosp;
    for ($j = 0; $j < count($ordenado); $j++) {
        for ($i = count($ordenado) - 1; $i > $j; $i--) {
            if ($ordenado[$i][$columnap] < $ordenado[$i - 1][$columnap]) {
                $aux = $ordenado[$i];
                $ordenado[$i] = $ordenado[$i - 1];
                $ordenado[$i - 1] = $aux;
            }
        }
    }

    return $ordenado;
}


//Funcion pasar UNIX a date CHECKED
function unixDate($segundosp){
    $fecha=date("d/m/Y",$segundosp);
    return $fecha;
}

//Pasar date a unix CHECKED
function dateUnix($fechap,$separador){
    list($dia,$mes,$anyo)=explode($separador,$fechap);//Teniendo una fecha en formato "d/m/y, lo separa"
    $fechaUNIX=mktime(0,0,0,$mes,$dia,$anyo);    //mktime para a segundos
    return $fechaUNIX;
}


?>