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
    // function mostrarTabla($tablap, $cabecerap)
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
    
    ?>
</body>
</html>