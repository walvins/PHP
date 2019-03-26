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
        function fichToArray($nomfich,&$tabla){
        $fich=file($nomfich);
        $arrayFich=explode($fich,"~");
        }

        //Buscar los datos
        function buscaDatosFich($dato,$nomfich){
            //pasar a un array auxiliar
            $tabla=file($nomfich);
            $i=0;$encontrado=false;
            while($i<count($tabla) && (!$encontrado)){
                if (strpos($tabla[$i],$dato)){
                    $encontrado=true;
                }else{
                    $i++;
                }
            }

            if($encontrado){
                return $tabla[$i];
            }else{
                return false;
            }
        }

        function arrayToFich($tablap, $nomfichp){
            if(!file.exist($nomfichp)){
                $fiche=fopen($nomfichp,"w");
            }else{
                $fiche=fopen($nomfichp,"a");
            }
            for($i=0;$i<count($tablap);$i++){
                $reg="";
                for($j=0;$j<count($tablap[0]);$j++){
                    $reg=$tablap[$i][$j]."~";
                }
                $reg.=PHP_EOL;
                fwrite($fiche,$reg);
            }
            fclose($fiche);
        }

        function ordenFinch($fich,$camp){

    
            for($j=0;$j<$n;$j++){    
                for ($k=$n-1;$k>$j;$k--){ 
                    if($arrayp[$k][$colump]<$arrayp[$k-1][$colump]){
                    $aux=$arrayp[$k];                   
                    $arrayp[$k]=$arrayp[$k-1];        
                    $arrayp[$k-1]=$aux;                
                    }
                }
            }
        }
    ?>
</body>
</html>