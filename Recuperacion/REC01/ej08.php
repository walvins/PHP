<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <?php
include "datos.php";
include "burbuja.php";
//8- Cuántas ciudades distintas hay? Cuáles son?
function agrupacionDatos($datosp,$colp)
{
    
    //Primero ordeno 
    burbuja($datosp,$colp);

    $datoActual = $datosp[0][$colp]; //La primera ciudad
    $arrDatos=array($datosp[0][$colp]);
    for ($i = 1; $i < count($datosp); $i++) {
        if ($datosp[$i][$colp] != $datoActual) {
            $datoActual = $datosp[$i][$colp];
            array_push($arrDatos, $datosp[$i][$colp]);
        }
    }
    return $arrDatos;
}
echo "<h1>Cuántas ciudades distintas hay? Cuáles son? </h1>";
$ciudades=agrupacionDatos($datos, 1);
echo"Ciudades distintas: ".count($ciudades)."<br>";
for ($i=0; $i <count($ciudades) ; $i++) { 
    echo $ciudades[$i]."<br>";
}
?>
</body>
</html>