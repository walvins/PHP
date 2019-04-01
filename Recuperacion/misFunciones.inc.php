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
    for ($j = 0; $j < count($datosp); $j++) {
        for ($i = count($datosp) - 1; $i > $j; $i--) {
            if ($datosp[$i][$columnap] < $datosp[$i - 1][$columnap]) {
                $aux = $datosp[$i];
                $datosp[$i] = $datosp[$i - 1];
                $datosp[$i - 1] = $aux;
            }
        }
    }
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

//Pasar array a fichero, no es una funcion general
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
            
        }
        fputs($varfich,$linea);
        /*
        if($i==count($arrayp)-1){
            $linea=($arrayp[$i][0]."~".$arrayp[$i][1]."~".$arrayp[$i][2]."~".$arrayp[$i][3]); //Añadir o quitar indices dependiendo las columnas
            fputs($varfich,$linea);
        }else{
            $linea=($arrayp[$i][0]."~".$arrayp[$i][1]."~".$arrayp[$i][2]."~".$arrayp[$i][3]);
            fputs($varfich,$linea);

        }
        */
    }
    fflush($varfich);
    fclose($varfich);
}

//Borrar todo el contenido de un fichero
function borrarTexto($ficherop){
    $arch="";
    $arch = fopen ("players.txt", "w+");
    fwrite($arch, "");
    fclose($arch);
}

//Funcion de la fecha de hoy formato dia/mes/año
function hoy(){
    date_default_timezone_set('Europe/Madrid');
    $hoy=date('d/m/Y');
    return $hoy;
}