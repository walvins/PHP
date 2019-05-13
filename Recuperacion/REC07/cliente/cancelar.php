<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cancelar resevar</title>
</head>
<body>
    <?php
    session_start();
    $cliente=$_SESSION["dni"];


    //Mostrar las reservas del cliente
    $link= mysqli_connect("localhost","root","","restaurante");

    $sql="SELECT fecha_reserva FROM reservas where dni_cliente='$cliente'";
    $resultado=mysqli_query($link,$sql);
    $reg=mysqli_fetch_all($resultado,MYSQLI_NUM);
    $fechas="";
    for ($i=0; $i <count($reg) ; $i++) { 
        $fechas.="<option value='".$reg[$i][0]."'>".$reg[$i][0]."</option>";
    }
    echo"<form method='POST' action='reserva.php'> 
    <label>Tus reservas: <select name='reserva'>".$fechas."</select></label><br>
    </form>"

    ?>
</body>
</html>