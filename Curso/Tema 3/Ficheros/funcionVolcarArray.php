<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?
    function arrayToFich($tablap, $nomfichp){
        if(!file.exist($nomfichp)){
            $fiche=fopen($nomfichp,"w");
        }else{
            $fiche=fopen($nomfichp,"a");
        }
        for($i=0;$i<count($tablap);$i++){
            $reg="";
            for($j=0;$j<count($tablap[0];$j++)){
                $reg=$tablap[$i][$j]."~";
            }
            $reg.=PHP_EOL;
            fwrite($fiche,$reg);
        }
        fclose($fiche);
    }
    ?>
</body>
</html>