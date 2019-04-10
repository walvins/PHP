<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ejercicioC</title>
</head>
<body>
    <?php
    include "datos.php";
    include "misFunciones.inc.php";
    //Listado de votantes de una provincia
    ?>

    <form method="POST" action="ejercicioc.php">
        <h1>Elige tu provincia</h1>
        <select name="provincia">
            <option>Burgos</option> 
            <option >Avila</option>
            <option >Caceres</option>
          </select>
        <button type="submit" name="enviar">Enviar</button>
    </form>

    <?php
        if(isset($_POST["enviar"])){
            $votantes=array();
            $provincia=$_POST["provincia"];
            $diadelVoto=dateUnix("28/03/2019","/"); //pasar el dia de votar a UNIX
            $mayorEdad=$diadelVoto-(18*365.25*24*60*60);  //Retrocede 18 años en UNIX
            echo "segundos meyor edad: $mayorEdad <br>";
            for ($i=0; $i<count($datos) ; $i++) { 
                //Condiciones: misma provincia, mayores de edad
                $edad= $datos[$i][2];
                $edadUnix=dateUnix($edad,"/");  //Pasar la edad de la persona a unix
                echo $edad ." Segundos: $edadUnix <br>";
                //Condiciones: misma provincia, mayores de edad
                if(($_POST["provincia"]==$datos[$i][3])){
                    if(($edadUnix<$mayorEdad)){
                        //Almacenarlo
                        $votantes[]=array($datos[$i][0],$datos[$i][1],$datos[$i][2],$datos[$i][3],$datos[$i][4]);
                    }
                }
            }

            mostrarTabla($cabecera,$votantes);
        }
    ?>
</body>
</html>