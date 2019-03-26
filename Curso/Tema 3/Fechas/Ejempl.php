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
        $fecha="20/12/1995";
        $d=explode("/",$fecha)[0];
        $m=explode("/",$fecha)[1];
        $y=explode("/",$fecha)[2];
        $nac=mktime(17,20,15,$m,$d,$y);    //Hasta aqui cuenta cuanto ha pasado desde el 1 de enero de 1970 hasta la fecha
        $rip=$nac+85*365.25*24*60*60;
        $fecharip= date("d/m/y",$rip);
        echo $fecharip;
    ?>
</body>
</html>