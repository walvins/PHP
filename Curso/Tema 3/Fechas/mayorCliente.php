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
     $clientes= array(array(71291368,"Martinez Rodrigez, Raul","05/11/1991","Soria",2397),
     array(58469257,"Goxiola Gatxez, Patxi","06/06/1986","Murcia",6666),
     array(48596258,"Perez Lopez, Maria","31/08/1997","Burgos",10000),
     array(85478124,"Martin Sardon, Eva","16/05/1990","Vitoria",210),
     array(84569871,"Garcia Alcalde, Manuel","17/02/1980","Valladolid",3566),
     array(54001204,"Maldonado Peña, Susana","28/01/1975","Burgos",1500)
    );
    $n=count($clientes);
    $mayor=
    for($i=0;$i<$n;$i++){
        $fecha= explode("/",$clientes[$i][2]);
        $dia= $fecha[0];
        $mes= $fecha[1];
        $anio= $fecha[2];
        $segundos=mktime(0,0,0$mes,$dia,$anio);

    }
    ?>
</body>
</html>

