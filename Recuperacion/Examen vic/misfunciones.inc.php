<?php
    function comprobarUsuario($user, $pass){
        $existe = false;
        //Comprueba si los datos coinciden con los guardados en la cookie
        $usuarioCookie = $_COOKIE['usuarioLogeado'];
        $userCookie = explode("-", $_COOKIE['usuarioLogeado'])[0];
        $passCookie = explode("-", $_COOKIE['usuarioLogeado'])[1];

        if($user == $userCookie && $pass == $passCookie){
            $existe = true;
        }

        return $existe;
    }


    //Ordena el array por provincias, y cada provincia por localidad
    function ordenarProvincias($censo){
        $censoOrdenado=$censo;
        $intercambio=true;
        $j = 1;
        //
        $n = count($censo);

        //Mientras haya intercambio o no llegue al final
        while ($intercambio || $j <= $n) {
            $intercambio = false;
            for ($i = $n - 1; $i > 0; $i--) {
                //Si la provincia es menor que la anterior
                if ($censoOrdenado[$i][4] < $censoOrdenado[$i - 1][4]) {
                    //Intercambio
                    $aux = $censoOrdenado[$i];
                    $censoOrdenado[$i] = $censoOrdenado[$i - 1];
                    $censoOrdenado[$i - 1] = $aux;
                    $intercambio = true;
                //Si la provincia es igual y la localidad es menor que la anterior
                }else if($censoOrdenado[$i][4] == $censoOrdenado[$i - 1][4] && $censoOrdenado[$i][3] < $censoOrdenado[$i - 1][3]){
                    //Intercambio
                    $aux = $censoOrdenado[$i];
                    $censoOrdenado[$i] = $censoOrdenado[$i - 1];
                    $censoOrdenado[$i - 1] = $aux;
                    $intercambio = true;
                }
            }
            $j++;
        }
        return $censoOrdenado;
    }


    //Función que recoge los votantes que hayan cumplido la mayoría de edad en los últimos 4 años.
    function guardarNuevosVotantes($censo){
        $listaNuevos=[];
        $fechaVotar = mktime(0, 0, 0, 4, 28, 2019);

        for($i=0; $i<count($censo); $i++){
            $fechaNac = explode("-", $censo[$i][2]);
            $nacimientoMk = mktime(0, 0, 0, $fechaNac[1], $fechaNac[2], $fechaNac[0]);

            //mktime está en segundos; años = mktime/60/60/24/30/12
            $edad = ($fechaVotar - $nacimientoMk)/60/60/24/30/12;

            //Si la edad es entre 18 y 22 años
            if($edad>=18 && $edad<=22){
                //Guarda en la lista al votante
                $listaNuevos[]=$censo[$i];
            }
        }

        return $listaNuevos;
    }

    function guardarVotantesProvincia($censo, $provincia){
        $votantesProv=[];

        for($i=0; $i<count($censo); $i++){
            //Si coincide su provincia con la dada
            if($censo[$i][4]==$provincia){
                $votantesProv[]=$censo[$i];
            }
        }

        return $votantesProv;
    }


    function listarProvincias($censo){
        //Array asociativo con los nombres de las provincias
        $provincias = [];
        
        for($i=0; $i<count($censo); $i++){
            //Si no existe la provincia, la crea
            if(!isset($provincias[$censo[$i][4]])){
                //Para cada provincia, guarda la población. Cuando se crea, se inicializa a 1
                $provincias[$censo[$i][4]]= 1;
            //Cada vez que encuentra un votante de dicha provincia (estando ya creada), incrementa el 
            //número de población
            }else{
                $provincias[$censo[$i][4]]++; 
            }
        }
        
        return $provincias;
    }


    function poblacionMediaProvincias($provincias){
        //Recoge el array asociativo de provincias con la población de cada 
        //provincia, y hace la media de población

        $poblacionTotal=0;

        //Recoge la población de cada provincia y la suma al total
        foreach($provincias as $provincia ) { 
            $poblacionTotal += $provincia; 
        }

        //Divide el total entre el número de provincias
        $poblacionMedia = $poblacionTotal/count($provincias);

        return $poblacionMedia;
    }

    function poblacionEncimaMedia($provincias, $media){
        //Array para guardar las provincias con población por encima de la media
        $encimaMedia = [];
        //Para cada provincia
        foreach($provincias as $provincia=>$poblacion) { 
            //Si su población está por encima de la media
            if($poblacion>$media){
                $encimaMedia[]=array($provincia, $poblacion);
            } 
        }

        return $encimaMedia;
    }


    function listarLocalidades($censo){
        //Array asociativo con las localidades. Guarda el numero de votantes jóvenes y el número
        //de votantes totales de cada localidad
        $loc = [];
        $fechaVotar = mktime(0, 0, 0, 4, 28, 2019);


        for($i=0; $i<count($censo); $i++){
            //Fecha de nacimiento del votante
            $fechaNac = explode("-", $censo[$i][2]);
            $nacimientoMk = mktime(0, 0, 0, $fechaNac[1], $fechaNac[2], $fechaNac[0]);
            //Edad del votante
            $edad = ($fechaVotar - $nacimientoMk)/60/60/24/30/12;
            
            //Para cada localidad, guarda la población joven y la total. Cuando se crea, se inicializa a 0
            //si el votante no es joven y a 1 si lo es.

            //Si no existe la localidad, la crea
            if(!isset($loc[$censo[$i][3]])){
                //Si es joven
                if($edad>=18 && $edad<=35){
                    //1 votante joven y 1 votante
                    $loc[$censo[$i][3]]= array(1, 1);
                //Si no es joven
                }else{
                    //0 votantes jóvenes y 1 votante
                    $loc[$censo[$i][3]]= array(0, 1);
                }
            //Cada vez que encuentra un votante de dicha localidad (estando ya creada), incrementa el 
            //número de población
            }else{
                //Si es joven
                if($edad>=18 && $edad<=35){
                    //+1 votante joven
                    $loc[$censo[$i][3]][0]++;
                    //+1 votante
                    $loc[$censo[$i][3]][1]++;
                //Si no es joven
                }else{
                    //+1 votante
                    $loc[$censo[$i][3]][1]++;
                }
            }
        }
        return $loc;
    }


    //Función que devuelve la localidad con mayor porcentaje de votantes jóvenes
    function localidadMasJovenes($localidades){
        $porcentajeJovenes = array("", 0);

        foreach($localidades as $localidad=>$poblacion){
            //Calcula el porcentaje
            $porcentaje = ($poblacion[0]/$poblacion[1])*100;
            //Si es mayor al guardado
            if($porcentajeJovenes[1] < $porcentaje){
                $porcentajeJovenes[0] = $localidad;
                $porcentajeJovenes[1] = $porcentaje;
            }
        }
        return $porcentajeJovenes;
    }
?>