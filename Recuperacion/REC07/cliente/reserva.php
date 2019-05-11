<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva</title>
</head> 
<body>
    <?php
    include "../../misFunciones.inc.php";
    //Parte de la reserva
    session_start();
        if(isset($_POST["enviar"])){
            $plato1=$_POST["plato1"];
            $plato2=$_POST["plato2"];
            $postre=$_POST["postre"];
            $bebida=$_POST["bebida"];
            $fecha=$_POST["fecha"];
            $cliente=$_SESSION["dni"];

            //Comprobar que ese dia no hay mas de 10 reservas
            $link= mysqli_connect("localhost","root","","restaurante");
            $sql="SELECT count(id_reserva) FROM reservas where fecha_reserva='$fecha'";
            $resultado=mysqli_query($link, $sql);

            $reg=mysqli_fetch_array($resultado,MYSQLI_NUM);
            if($reg[0]>10){
                echo "Lo sentimos, las reservas para este dia estan llenas";
            }
            mysqli_free_result($resultado);     //Preguntar si esto es necesario cada vez que hacemos consulta o solo al final
            mysqli_close($link);

            //Comprobar si el cliente ya tiene alguna reserva
            /*$link= mysqli_connect("localhost","root","","restaurante");
            $sql="SELECT dni_cliente FROM reservas where dni_cliente='$cliente' AND fecha_reserva='$fecha'";

            $resultado=mysqli_query($link, $sql);

            if($resultado){
                echo "El cliente ya tiene una reserva este dia";
                exit();
            }

            $reg=mysqli_fetch_array($resultado,MYSQLI_NUM);

            mysqli_free_result($resultado);     //Preguntar si esto es necesario cada vez que hacemos consulta o solo al final
            mysqli_close($link);*/

            //Comprobar que la fecha es de aqui a una semana NOTA: la fecha que devielve option es formato año-mes-dia
            list($anyo,$mes,$dia)=explode("-",$fecha);
            $fechaUNIX=mktime(0,0,0,$mes,$dia,$anyo);    //mktime para a milisegundos
            
            $hoy=date('d/m/Y');
            $hoy=dateUnix($hoy,"/");
            $mañana=$hoy+(24*60*60);
            $unaSemana=$hoy+(7*24*60*60);
            if(($fechaUNIX<$mañana)||($fechaUNIX>$unaSemana)){
                echo "<script>alert('La reserva solo puede desde mañana hasta maximo de 7 dias')</script>";
            }else{
                //Si estamos aqui es que podemos hacer la reserva(Si el cliente no tiene reserva)
                $link= mysqli_connect("localhost","root","","restaurante");
                $sql= "INSERT INTO reservas(dni_cliente, plato1,plato2,postre,bebida,fecha_reserva)VALUES('$cliente','$plato1','$plato2','$postre','$bebida','$fecha')";
                mysqli_query($link,$sql);  
                mysqli_close($link);
            }
        }

    ?>

    <?php
    //Parte de sacar los datos de la base y meterlos en un select
    $link= mysqli_connect("localhost","root","","restaurante");

    $sql="SELECT descripcion, tipo FROM carta";

    $resultado=mysqli_query($link,$sql);

    if(!$resultado){
        echo "consulta fallida: ", mysqli_errno($link);
        exit();
    }
    
    $reg=mysqli_fetch_all($resultado,MYSQLI_NUM);
    
    $opciones_plato1="";
    $opciones_plato2="";
    $opciones_postre="";
    $opciones_bebida="";
    for ($i=0; $i <count($reg) ; $i++) { 
        //echo $reg[$i][0]." ".$reg[$i][1]."<br>";
        if($reg[$i][1]=="plato1"){
            $opciones_plato1.="<option value='".$reg[$i][0]."'>".$reg[$i][0]."</option>";
        }
        if($reg[$i][1]=="plato2"){
            $opciones_plato2.="<option value='".$reg[$i][0]."'>".$reg[$i][0]."</option>";
        }
        if($reg[$i][1]=="postre"){
            $opciones_postre.="<option value='".$reg[$i][0]."'>".$reg[$i][0]."</option>";
        }
        if($reg[$i][1]=="bebida"){
            $opciones_bebida.="<option value='".$reg[$i][0]."'>".$reg[$i][0]."</option>";
        }
    }
    echo"<form method='POST' action='reserva.php'> 
    <label>Primer plato: <select name='plato1'>".$opciones_plato1."</select></label><br>
    <label>Segundo plato: <select name='plato2'>".$opciones_plato2."</select></label><br>
    <label>Postre: <select name='postre'>".$opciones_postre."</select></label><br>
    <label>Bebida: <select name='bebida'>".$opciones_bebida."</select></label><br>
    <label>Dia de la reserva:<input type='date' name='fecha'></label><br>       
    <button type='submit' name='enviar'>Confirmar pedido</button>
    </form>";

    mysqli_free_result($resultado);
    mysqli_close($link);

    ?>
</body>
</html>