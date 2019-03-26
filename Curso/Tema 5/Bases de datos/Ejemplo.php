<?php
//Trabajar con bases de datos 
//$link= mysqli_connect(HOST,user,pass,database); or die "error de conexion"
$link= mysqli_connect("localhost","Alvaro","Alvaro","tienda");
if(!$link){
    echo "error en la conexion", mysqli_connect_error();
    exit();
}
//Sentencias sql
$sql="select * from clientes";
$resultado=mysqli_query($link,$sql);
//mysql_fetch_array: trocea fila a fila la tabla
while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
    //list($id_user,$pass,$apsnom)=$row; 
    foreach ($row as $campo => $dato) {
        $$campo=$dato;
        echo $campo.": ".$dato."<br>";
    }
}

mysqli_free_result($resultado);
mysqli_close($link);
?>