<?php
function burbuja(&$datosp,$col){
    for($j=0;$j<count($datosp);$j++){    
        for ($i=count($datosp)-1;$i>$j;$i--){ 
            if($datosp[$i][$col]<$datosp[$i-1][$col]){
            $aux=$datosp[$i];                   
            $datosp[$i]=$datosp[$i-1];  
            $datosp[$i-1]=$aux;          
            }
        }
    }
}

?>