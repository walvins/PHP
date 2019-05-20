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
            $clientesFacturas=array();  
            $datosReserva=mysqli_fetch_all($resultado,MYSQLI_NUM);
            

            $link2= mysqli_connect("localhost","root","","restaurante");
            $sql2="SELECT id_producto, precio FROM carta";  
            $resultado2=mysqli_query($link2,$sql2);

            if(!$resultado2){
                echo "consulta fallida: ", mysqli_errno($link);
                //exit();
            }
            
            if(mysqli_num_rows($resultado2)){
            $datosCarta=mysqli_fetch_all($resultado2,MYSQLI_NUM);

                for ($i=0; $i <count($datosReserva) ; $i++) { 
                    $factura=0;
                    for ($j=1; $j <count($datosReserva[$i]) ; $j++) { 
                        for ($x=0; $x <count($datosCarta) ; $x++) { 
                            if($datosReserva[$i][$j]==$datosCarta[$x][0]){
                                $factura+=$datosCarta[$x][1];
                            }
                        }
                    }
                    $clientesFacturas[]=array($datosReserva[$i][0],$factura);
                }
            }
        }
        //Ya tenemos en clientes el dni con la factura
        
    ?>
</body>
</html>