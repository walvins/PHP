<?php
    session_start();

    echo "<form method='POST'><select  name='producto' type='text'";
    $usuario=$_SESSION["user"];
    $link= mysqli_connect("localhost","Alvaro","Alvaro","tienda");

    //Preparar SQL
    $sql="select * from productos";
    $reg=mysqli_query($link,$sql);
    while($reg==mysqli_fetch_array($reg)){
        echo "<option value='".$reg['id_producto']."'>".$reg['id_producto'].": ".$reg['descripcion']."</option>";
    }
    echo "</select> 
    cantidad<input type='number'>
    <input type='submit'></form>";
    

?>