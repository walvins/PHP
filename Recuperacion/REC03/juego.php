<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MasterMind</title>
</head>
<body>
    <?php
        function generarNumero(){
            $cifra[0]=rand(0,9);
            $contador=0;

            for ($i=1; $i <4 ; $i++) { 
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
        $numAdivinar=generarNumero();

        for ($i=0; $i <count($numAdivinar) ; $i++) { 
            echo $numAdivinar[$i]."-";
        }

    ?>
</body>
</html>