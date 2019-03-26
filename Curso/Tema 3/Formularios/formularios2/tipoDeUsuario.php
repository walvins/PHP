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
    $clientes2= array(array(71291368,"aaaaaa","Martinez Rodrigez, Raul","10/11/2000","Soria",2397),
    array(58469257,"bbbbbb","Goxiola Gatxez, Patxi","06/06/1986","Murcia",6666),
    array(48596258,"cccccc","Perez Lopez, Maria","31/08/1997","Burgos",10000),
    array(85478124,"dddddd","Martin Sardon, Eva","16/05/1990","Vitoria",210),
    array(84569871,"eeeeee","Garcia Alcalde, Manuel","17/02/1980","Valladolid",3566),
    array(54001204,"ffffff","Maldonado Peña, Susana","28/01/1975","Burgos",1500)
   );
   $i=0;
   $encontrado=false;
   $usuario=[];
    while($encontrado!=true && $i<count($clientes2)){
        if($_POST["dni"]==$clientes2[$i][0]){
            $encontrado=true;
            $usuario=$clientes2[$i];
        }
        $i++;
    }
    if($encontrado==true){
        if($_POST["pass"]==$usuario[1]){
            //Proceder a las fechas
            $f=explode("/",$usuario[3]);
            $d=$f[0];
            $m=$f[1];
            $a=$f[2];
            if(checkdate($m,$d,$a)==false){
                echo "La fecha tiene fallos de logica";
            }

            //Nota: Problema con linkeo a los otros archivos php
            if(time()-mktime(0,0,0,$m,$d,$a)<18*365.25*24*60*60){
                echo "<meta http-equiv='Refresh' content='1;URL=frontend_menor.html'/>";
            } else if (time()-mktime(0,0,0,$m,$d,$a)>65*365.25*24*60*60){
                echo "<meta http-equiv='Refresh' content='1;URL=frontend_jubilado.html'/>";
            }else{
                echo "<meta http-equiv='Refresh' content='1;URL=frontend_activo.html'/>";
            }

        }else{
            echo "<meta http-equiv='Refresh' content='1;URL=login.html'/>";
        }
    }else{
        echo "<meta http-equiv='Refresh' content='1;URL=login.html'/>";
    }
    

    ?>
</body>
</html>