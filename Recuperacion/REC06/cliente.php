<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente</title>
</head>
<body>
<?php
    session_start();
    //Nueva transferencia
    if(isset($_POST["transferencia"])){
        header("location:trnasferencia.php");
    }

    //Consulta
    if(isset($_POST["consulta"])){
        $usuario=$_SESSION["user"];

        $link= mysqli_connect("localhost","alvaro","alvaro","telebank");
        $sql="select * from movimientos where cod_enviante='$usuario'";
        $resultado=mysqli_query($link,$sql);

        $consulta=mysqli_num_rows($resultado);
        echo $consulta;
    }
?>

<form method="POST" action="cliente.php">
<button type="submit" name="tranferencia">Nueva transferencia</button>
<button type="submit" name="consulta">Consultar movimientos</button>
<form>
</body>
</html>