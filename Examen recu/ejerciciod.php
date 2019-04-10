<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EjercicioD</title>
</head>
<body>
    <?php
    include "datos.php";
    include "misFunciones.inc.php";
        //Listado de provincias que tienen poblacion por encima de la media (Supongo que de todas las provincias)

        //1)Sacar la media de todas las provincias(Como cada fila del array es el dato de una persona, el total de personas será la media)
        $media=count($datos);
        $encimaMedia="";
        //Ordenamos por provincia
        $datos=burbuja($datos,3);

        
        $datoActual = $datos[0][3]; //La primera provincia
        for ($i = 1; $i < count($datos); $i++) {
            $contador=1;
            if ($datos[$i][3] != $datoActual) { //Si la provincia es distinta a la que esta actualmente almacenada, será sustituida, antes de esto se comprueba el contador y si está por encima de la media almacenará esa provincia
                if($contador>$media){
                    $encimaMedia.= $datoActual.", ";
                }
                $datoActual = $datos[$i][3];
            }else{  //Si es la misma provincia, incrementa el contador de poblacion,
                $contador++;
            }
        }

        echo "Provincias por encima de la media: $encimaMedia";
    ?>
</body>
</html>