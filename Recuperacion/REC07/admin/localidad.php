<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facturar por localidad</title>
</head>
<body>
    <?php
        //Sacar los dni de las reservas
        $link= mysqli_connect("localhost","root","","restaurante");
        $sql="SELECT dni_cliente, plato1, plato2, postre, bebida FROM reservas";  
        $resultado=mysqli_query($link,$sql);
        if(!$resultado){
            echo "consulta fallida: ", mysqli_errno($link);
            //exit();
        }

        if(mysqli_num_rows($resultado)){    
            $datosReserva=mysqli_fetch_all($resultado,MYSQLI_NUM);
            $clientesFacturas=array();
            $factura=0;
            for ($i=0; $i <count($datosReserva) ; $i++) { 
                for ($x=0; $x <count($datosReserva[$i]) ; $x++) { 
                    $link2= mysqli_connect("localhost","root","","restaurante");
                    $sql2="SELECT id_producto, precio FROM carta";  
                    $resultado2=mysqli_query($link,$sql);

                    if(!$resultado2){
                        echo "consulta fallida: ", mysqli_errno($link);
                        //exit();
                    }

                    if(mysqli_num_rows($resultado2)){
                        $datosCarta=mysqli_fetch_all($resultado2,MYSQLI_NUM);
                        for ($j=0; $j <count($datosCarta) ; $j++) { 
                            if($datosReserva[$i][x]==$datosCarta[$j][0]){
                                $factura+=$datosCarta[$j][1];
                            }
                        }
                    }
                    mysqli_free_result($resultado2);
                    mysqli_close($link2); 
                }
            $clientesFacturas[]=array($datosReserva[$i][0],$factura);
            $factura=0;
            }
        }

    ?>
</body>
</html>