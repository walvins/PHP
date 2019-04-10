<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejerciciob</title>
</head>
<body>
    <?php
    include "misFunciones.inc.php";
    include "datos.php";
    //Listado de los que votan por primera vez el 28 de abril de 2019(que han cumplido 18 entre el 10/04/2001 y el 10 de abril de 1997)
    $primerVoto=array();
    $diadelVoto=dateUnix("28/03/2019","/"); //pasar el dia de votar a UNIX
    $limMaximo=$diadelVoto-(22*365.25*24*60*60);  //Retrocede 22 años en UNIX 
    $limMinimo=$diadelVoto-(18*365.25*24*60*60);  //Retrocede 18 años en UNIX
    for ($i=0; $i <count($datos) ; $i++) { 
        //Si tiene mas de 18 y menos de 22 se almacena en una nueva columna de $primerVoto
        $edad=$datos[$i][2];
        $edadUnix=dateUnix($edad,"/");
        //sus segundos tienen que ser mas de los segundos de 22 años y menos de los segundos de 18 años
        if(($edadUnix<$limMinimo)&&($edadUnix>$limMaximo)){
            $primerVoto[]=array($datos[$i][0],$datos[$i][1],$datos[$i][2],$datos[$i][3],$datos[$i][4]);
        }
    }
    echo "<h1>Listado de los que votan por primera vez el 28 de abril de 2019</h1><br>";
    mostrarTabla($cabecera,$primerVoto);

    ?>
</body>
</html>