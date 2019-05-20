<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">
        h1{
            text-align: center;
        }

        h2{
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
        include 'datos.php';
        include 'misfunciones.inc.php';
    ?>

    <h1>Examen recuperación- Temas 1 a 4</h1>

    <h2>Apartado 1</h2>
    <div id="apartado1">
        <h3>Listado ordenado por provincias, ordenando tambien sus localidades</h3>
        <?php
            //Apartado 1
            $listaOrden = ordenarProvincias($censo);
            $cadena = '<table border="1"><tr><th>DNI</th><th>Apellidos, Nombre</th><th>Fecha nacimiento</th><th>Localidad</th><th>Provincia</th><tr>';

            foreach($listaOrden as $votante){
                $cadena .= '<tr><td>' . $votante[0] .'</td><td>' . $votante[1] .'</td><td>' . $votante[2] .'</td><td>' . $votante[3] .'</td><td>' . $votante[4] .'</td></tr>';
            }

            $cadena .= '</table>';

            echo $cadena;
        ?>
    </div>

    <h2>Apartado 2</h2>
    <div id="apartado2">
        <h3>Listado de los votantes novicios</h3>
        <?php
            //Apartado 2
            $nuevosVotantes = guardarNuevosVotantes($censo);

            $cadena = '<table border="1"><tr><th>DNI</th><th>Apellidos, Nombre</th><th>Fecha nacimiento</th><th>Localidad</th><th>Provincia</th><tr>';

            foreach($nuevosVotantes as $votante){
                $cadena .= '<tr><td>' . $votante[0] .'</td><td>' . $votante[1] .'</td><td>' . $votante[2] .'</td><td>' . $votante[3] .'</td><td>' . $votante[4] .'</td></tr>';
            }

            $cadena .= '</table>';

            echo $cadena;
        ?>
    </div>

    <h2>Apartado 3</h2>
    <div id="apartado3">
        <h3>Listado de votantes de una provincia dada</h3>
        <form method="post" action="">
            <select name="provincias">
                <?php
                    $listadoProvincias = listarProvincias($censo);

                    foreach($listadoProvincias as $provincia=>$poblacion){
                        echo '<option>' . $provincia .'</option>';
                    }
                ?>
            </select>
            <input type="submit" name="elegir" value="elegir">
        </form>

        <div id="votantesProvincia">
            <?php
                //Apartado 3
                if(isset($_POST["elegir"])){
                    if(!empty ($_POST['provincias'])){
                        $provincia = $_POST['provincias'];

                        $votantesProvincia = guardarVotantesProvincia($censo, $provincia);
                        $cadena = '<table border="1"><tr><th>DNI</th><th>Apellidos, Nombre</th><th>Fecha nacimiento</th><th>Localidad</th><th>Provincia</th><tr>';

                        foreach($votantesProvincia as $votante){
                            $cadena .= '<tr><td>' . $votante[0] .'</td><td>' . $votante[1] .'</td><td>' . $votante[2] .'</td><td>' . $votante[3] .'</td><td>' . $votante[4] .'</td></tr>';
                        }

                        $cadena .= '</table>';

                        echo $cadena;
                    }
                }
            ?>
        </div>

    <h2>Apartado 4</h2>
    <div id="apartado4">
        <h3>Listado de provincias con población por encima de la media</h3>
        <?php
            //Apartado 4
            $media = poblacionMediaProvincias($listadoProvincias);
            $encimaMedia = poblacionEncimaMedia($listadoProvincias, $media);

            $cadena = '<table border="1"><tr><th>Provincia</th><th>Poblacion</th><tr>';

            foreach($encimaMedia as $provincia){
                $cadena .= '<tr><td>' . $provincia[0] .'</td><td>' . $provincia[1] .'</td></tr>';
            }

            $cadena .= '</table>';

            echo $cadena;
        ?>
    </div>

    <h2>Apartado 5</h2>
    <div id="apartado5">
        <h3>Localidad con mayor porcentaje de jóvenes (entre 18 y 35 años)</h3>
        <?php
            //Apartado 5
            $localidades = listarLocalidades($censo);

            $cadena = '<table border="1"><tr><th>Localidad</th><th>Jovenes</th><th>Total</th><tr>';

            foreach($localidades as $localidad=>$poblacion){
                $cadena .= '<tr><td>' . $localidad .'</td><td>' . $poblacion[0] .'</td><td>' . $poblacion[1] .'</td></tr>';
            }

            $cadena .= '</table>';

            echo $cadena;


            $masJovenes = localidadMasJovenes($localidades);

            $cadena2 = '<table border="1"><tr><th>Localidad</th><th>Porcentaje</th><tr>';
            $cadena2 .= '<tr><td>' . $masJovenes[0] .'</td><td>' . $masJovenes[1] .'%</td></tr>';

            $cadena2 .= '</table>';

            echo $cadena2;
        ?>
    </div>
</body>
</html>