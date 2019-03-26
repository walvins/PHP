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
        include "tabla.php";
        //Funcion que ordena por burbuja
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
       

       $clientes= array(array(71291368,"Martinez Rodrigez, Raul","05/11/1991","Soria",2397),
       array(58469257,"Goxiola Gatxez, Patxi","06/06/1986","Murcia",6666),
       array(48596258,"Perez Lopez, Maria","31/08/1997","Burgos",10000),
       array(85478124,"Martin Sardon, Eva","16/05/1990","Vitoria",210),
       array(84569871,"Garcia Alcalde, Manuel","17/02/1980","Valladolid",3566),
       array(54001204,"Maldonado Peña, Susana","28/01/1975","Burgos",1500)
      );
      ordenaSel($clientes,0,"asc");
        $cabecera= array("DNI","Apellidos y nombre","fecha","Localidad","Cuota");
        mostrarTabla($clientes, $cabecera);

    ?>
</body>
</html>