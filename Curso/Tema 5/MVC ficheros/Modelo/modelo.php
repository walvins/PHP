<?php
// Incluir la lógica de la vista
function getDatos(){
	$conexion=fopen ("../Datos/datos.txt","a+");
	$datos;
	while (!feof($conexion)){
		$text = fgets($conexion);
		if(!empty($text)){
			list($n,$e)=explode("~",$text);
		}
		$datos[]=array($n,$e);
	}
	fclose($conexion);
	return $datos;
}
?>
