<?php
    session_start();
    $usuario=$_SESSION["user"];
    $link= mysqli_connect("localhost","Alvaro","Alvaro","tienda");

    //Preparar SQL
    $sql="select * from ventas where id_clientes=".$usuario;

    //Ejecucion
    $resultado=mysqli_query($link,$sql);

    //Extraccion
    while($row=mysqli_fetch_array($resultado)){
        //Procesar
        //var_dump($reg);
        //list($id_venta, $id_producto, $id_cliente, $cantidad, $fecha, $observaciones)=$row; ---- Esto es una opcion
        foreach ($row as $campo => $dato) {
            $$campo=$dato;
        }
        if($rol=="admin"){
            echo "ADMIN";
        }
        if($rol=="cliente"){
            echo "CLIENTE"
        }
            /*echo "venta: $id_ventas, producto: $id_producto, cliente: $id_clientes, cantidad: $cantidad, fecha: $fecha,  observaciones: $observaciones";*/
    }
?>