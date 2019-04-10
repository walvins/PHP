<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ejercicioE</title>
</head>
<body>
    <?php
    include "datos.php";
    include "misFunciones.inc.php";

    //Localidad con mayor porcentaje de votantes jovenes entre su población(de 18 a 35)

    //Ordenar por localidad
    $datos=burbuja($datos,4);
    mostrarTabla($cabecera,$datos);
    $jovenes=-1;
    $contador=0;
    $localidadMasJoven="";
    //Fechas jovenes
    $diadelVoto=dateUnix("28/03/2019","/"); //pasar el dia de votar a UNIX
    $limMaximo=$diadelVoto-(35*365.25*24*60*60);  //Retrocede 35 años en UNIX 
    $mayorEdad=$diadelVoto-(18*365.25*24*60*60);  //Retrocede 18 años en UNIX


    $datoActual = $datos[0][4]; //La primera localidad
        for ($i = 1; $i < count($datos); $i++) {
            if ($datos[$i][4] != $datoActual) { 
                if($contador>$jovenes){ //Si el contador es mas alto que los jovenes que habia en otra localidad
                    $jovenes=$contador;
                    $localidadMasJoven=$datoActual;
                }
                $datoActual = $datos[$i][4];//Almacenamos la nueva localidad
                $contador=0;    //Reiniciamos el contador
            }else{  //Si es la misma provincia, se comprueba si es joven, si lo es incrementa el contador de poblacion joven
                $edad=$datos[$i][2];
                $edadUnix=dateUnix($edad,"/");
                if(($edadUnix<$mayorEdad)&&($edadUnix>$limMaximo)){
                $contador++;
                }
            }
        }

    echo "Localidad con votantes mas jovenes: ".$localidadMasJoven;
    ?>
</body>
</html>