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
        mysqli_free_result($resultado);
        mysqli_close($link);
        mysqli_free_result($resultado2);
        mysqli_close($link2);
        //Ya tenemos en clientesFacturas el dni con la factura
        print_r($clientesFacturas);
        echo "<br>";

        //Pasamos a los clientes
        $link= mysqli_connect("localhost","root","","restaurante");
        $sql="SELECT DNI, Localidad FROM clientes ORDER BY Localidad";
        $resultado=$resultado=mysqli_query($link,$sql);

        if(!$resultado){
            echo "consulta fallida: ", mysqli_errno($link);
            //exit();
        }

        if(mysqli_num_rows($resultado)){
            $provinciaFactura=array();//Guardar aqui la provincia con la factura
            $datosCliente=mysqli_fetch_all($resultado,MYSQLI_NUM);
            print_r($datosCliente);
            echo "<br>";
            for ($i=0; $i <count($clientesFacturas) ; $i++) { 
                for ($j=0; $j <count($datosCliente) ; $j++) { 
                    if($clientesFacturas[$i][0]==$datosCliente[$j][0]){
                        echo "Cliente: ".$clientesFacturas[$i][0]." Localidad: ".$datosCliente[$j][1]." Factura: ".$clientesFacturas[$i][1]."<br>";//Hasta aqui bien
                        if(empty($provinciaFactura)){
                            $provinciaFactura[]=array($datosCliente[$j][1],$clientesFacturas[$i][1]);
                        }else{
                            $localidadActual=$datosCliente[$j][1];
                            while($localidadActual!=$datosCliente[$j][1]){
                                
                            }
                        }
                    }
                }
            }
        }

        print_r($provinciaFactura);
    ?>
</body>
</html>