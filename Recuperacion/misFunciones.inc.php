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

//Busqueda secuencial
/*
$datosp - tabla en la que se va a buscar
$datop - dato que se busca
$col - columna por la que busco
Devuelve false si no lo encuentra y si lo encuentra devuelve la fila en la que esta
*/
function busquedaFilaSecuencial($datosp, $datop, $colp)
{
    $encontrado = false;
    $i = 0;
    while (($encontrado != true) && ($i < count($datosp))) {
        if ($datosp[$i][$colp] == $datop) {
            $encontrado = true;
        } else {
            $i++;
        }
    }
    if (!$encontrado) {
        return false;
    } else {
        return $i;
    }

}

//Ordenar datos SI ESTA ORDENADO
function agrupacionDatos($datosp, $colp)
{

    $datoActual = $datosp[0][$colp]; //La primera ciudad
    $arrDatos = array($datosp[0][$colp]);
    for ($i = 1; $i < count($datosp); $i++) {
        if ($datosp[$i][$colp] != $datoActual) {
            $datoActual = $datosp[$i][$colp];
            array_push($arrDatos, $datosp[$i][$colp]);
        }
    }
    return $arrDatos;
}

//Generar un numero aleatorio
function generarNumero($cifrap){
    $cifra[0]=rand(0,9);
    $contador=0;

    for ($i=1; $i <$cifrap ; $i++) { 
        $anterior=0;
        $cifra[$i]=rand(0,9);
        while($anterior<$i){
            if($cifra[$i]==$cifra[$anterior]){
                $cifra[$i]=rand(0,9);
                $anterior=0;
            }else{
                $anterior++;
            }
        }
    }
    return $cifra;
}

//Pasar fichero a array
function ficheroToArray($fich){
				
    $varfich=fopen($fich,"r");
    $i=0;
    while(!feof($varfich)){
        
        $fila=fgets($varfich);
        $datos=explode("~",$fila);
        
    
        for($j=0;$j<count($datos);$j++)
            {	
            $tabla[$i][$j]=$datos[$j];
            }
            $i++;
        }
    
        fflush($varfich);
        fclose($varfich);
        return $tabla;
}

//Pasar array a fichero,
function arrayToFichero($arrayp,$ficherop){
    if(!file_exists($ficherop)){
        $varfich=fopen($ficherop, "w");
    }
    else{
        $varfich=fopen($ficherop,"a");
    }
    for($i=0;$i<count($arrayp);$i++){
        $linea="";
        for($j=0;$j<count($arrayp[0]);$j++){
            if ($j!=count($arrayp[0])-1){
                $linea.=$arrayp[$i][$j]."~";
            }else{
                $linea.=$arrayp[$i][$j];
            }
            if($arrayp[$i]==count($arrayp)){
                $linea.=$arrayp[$i][$j];
            }
        }
        fputs($varfich,$linea);
    }
    fflush($varfich);
    fclose($varfich);
}

//Borrar todo el contenido de un fichero CHECKED
function borrarTexto($ficherop){
    $arch="";
    $arch = fopen ("players.txt", "w+");
    fwrite($arch, "");
    fclose($arch);
}


//Añadir una linea al final de un fichero CHECKED
function nuevaLinea($ficherop,$textop){
    $fp = fopen($ficherop, 'a'); //Abrimos el archivo con solo escritura ("a") para asegurar que va al final
    fwrite($fp, $textop);    
    fclose($fp);
}


//Funcion de la fecha de hoy formato dia/mes/año
function hoy(){
    date_default_timezone_set('Europe/Madrid');
    $hoy=dateUnix(date('d/m/Y'));
    return $hoy;
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

//Pasar date a unix pero en formato año,mes,dia
function dateUnixPHP($fechap){
    list($anyo,$mes,$dia)=explode("-",$fechap);//Teniendo una fecha en formato "y/m/d, lo separa"
    $fechaUNIX=mktime(0,0,0,$mes,$dia,$anyo);    //mktime pasa a segundos
    return $fechaUNIX;
}
//Funcion edad CHECKED
function edad($fechaNac,$separador){
    list($dia,$mes,$anyo)=explode($separador,$fechaNac);
    $diaHoy=date("d");$mesHoy=date("m");$anyoHoy=date("Y");
    $anyos=$anyoHoy-$anyo;
    if(($mesHoy<$mes)||(($mesHoy==$mes)&&($diaHoy<$dia))){
        $anyos=$anyos-1;
    }
    return $anyos;
}
