<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    //Funcion ordenar burbuja
    function ordenaBur(&$arrayp,$colump){ 
        for($j=0;$j<$n;$j++){    //Cuenta para ver cuantas veces pasa
            //Esto es un recorrido
            for ($i=$n-1;$i>$j;$i--){ 
                if($arrayp[$i][$colump]<$arrayp[$i-1][$colump]){//Comparamos con el siguiente puesto
                $aux=$arrayp[$i];                   //Guardamos el primer dato para no perderlo
                $arrayp[$i]=$arrayp[$i-1];        //Ponemos el del segundo puesto en el primero
                $arrayp[$i-1]=$aux;                 //Ponemos el que estaba guardado en el segundo
                }
            }
        }
    }

   //funcion intercambio dos numeros
   function intercambio(&$ap,&$bp){
       $aux= $ap;
       $ap=$bp;
       $bp=$aux;
   }
    //Funcion orden por seleccion
    function ordenaSel(&$tablap,$colp,$opcionp){
        if ($opcionp=="asc"){
            for($i=0;$i<count($tablap)-1;$i++){
                for ($j=$i+1;$j<count($tablap);$j++){
                    if($tablap[$i][$colp]>$tablap[$j][$colp]){
                        intercambio($tablap[$i],$tablap[$j]);
                    }
                }
            }
        }else{
            for($i=0;$i<count($tablap)-1;$i++){
                for ($j=$i+1;$j<count($tablap);$j++){
                    if($tablap[$i][$colp]<$tablap[$j][$colp]){
                        intercambio($tablap[$i],$tablap[$j]);
                    }
                }
            }
        }
    }

    //Funcion sacar edad
    function edad($nacp){
        $subArray= explode("/",$nacp);
        $dia= $subArray[0];
        $mes= $subArray[1];
        $anio= $subArray[2];
        $hoy= time();
        $segundos= mktime(0,0,0,$mes,$dia,$anio);
        $diff= $hoy-$segundos;
        $diff= floor($diff/60/60/24/365.25);
        echo "Edad: ".$diff;
        }

    //Funcion que quita todos los espacios en blanco, TODOS
    function quitarBlancos(&$textop){
        $n= strlen($textop); //Cuenta los caracteres
        $textaux="";
        for($i=0;$i<$n;$i++){
            if ($textop [$i]!=" "){
                $textaux .= $textop[$i];
            }
        }
        $textop=$textaux;
    }

    //Funcion palindromo 
    function palindromo($frase){  //Funciona tanto con letras como con numeros
        include "quitarBlancos.php";
        //1º Quitar espacios
        quitarBlancos($frase);
        //2º Pasar todo a minusculas
        $frase=strtolower($frase);

        //3º quitar acentos y quitar espacios laterales
        $frase=str_replace("á","a", $frase);
        $frase=str_replace("é","e", $frase);
        $frase=str_replace("í","i", $frase);
        $frase=str_replace("ó","o", $frase);
        $frase=str_replace("ú","u", $frase);
        $frase= trim($frase);
        
        $fraseInv= strrev($frase);

        if ($frase==$fraseInv){
            echo "Es un palindromo";
        }else {
            echo "No es un palindromo";
        }
    }

    //Mostrar tabla
    function mostrarTabla($tablap,$cabecerap){
        if(count($cabecerap)==count($tablap[0])){
            echo "<table border=\"1\"";
            for($x=0;$x<count($tablap);$x++){                    
                echo "<tr>";
                for ($y=0;$y<5;$y++){
                    echo "<th>".$cabecerap[$x]."</th>";
                echo "<th>".$tablap[$x][$y]."</th>";
                
                }
                echo "</tr>";
            }
            echo "</table>";
            
        }else{
            return  "No coinciden, algo falla";
        }
        
    }

    //Tabla de multiplicar
    function multipli(){
        for($i=1;$i<=10;$i++){
            echo $i."<br>";
            for ($j=1;$j<=10;$j++){
                $multiplicacion= $x*$y;
                echo $multiplicacion. " ";
            }
        }
    }
    ?>
</body>
</html>