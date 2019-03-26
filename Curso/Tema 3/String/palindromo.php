<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- Dábale arroz a la zorra el Abad-->
    <?php
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

    //Metodo del profe
    function palindromoProf($frase){
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
        
        $n=strlen($frase);
        $pal=true;
        $i=0; $j=$n-1;
        while (($pal==true)&& ($i<$j)){
            if ($frase[$i] != $frase[$j]){
                $pal=false;
            }else{
                $i++;
                $j--;
            }
        }
        if($pal==true){
            echo "Es un palindromo";
        }else {
            echo "No es un palindromo";
        }    
    }
$frase="Dábale arroz a la zorra el Abad";
palindromo($frase);
    
    ?>
</body>
</html>