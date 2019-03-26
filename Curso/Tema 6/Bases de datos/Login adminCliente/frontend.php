<?php
    session_start();
    $usuario=$_SESSION["user"];
    $link= mysqli_connect("localhost","Alvaro","Alvaro","tienda");

    $sql="select * from usuarios";
    $reg=mysqli_query($link,$sql);

    echo "<select>Acción <option>Modificar</option><option>Baja</option>"

    
?>