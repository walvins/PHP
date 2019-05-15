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
    session_start();

    //Reserva
    if(isset($_POST["enviar"])){
        if(!empty($_POST["coche"])&&!empty($_POST["recogida"])&& !empty($_POST["devolucion"])){
            $cliente=$_SESSION["mail"];
            $coche=$_POST["coche"];
            $recogida=$_SESSION["recogida"];
            $devolucion=$_SESSION["devolucion"];

        }
    }


    //Formulario sacando los datos de los coches que puede reservar
    $link= mysqli_connect("localhost","root","","concesionario");

    $sql="SELECT id_coche,entrega,devolucion from reservas ";

    $resultado=mysqli_query($link,$sql);

    if(!$resultado){
        echo "consulta fallida: ", mysqli_errno($link);
        exit();
    }
    

    if(mysqli_num_rows($resultado)){    //mysqli_num_rows devuelve la longitud de todos los datos
        $reg=mysqli_fetch_all($resultado,MYSQLI_NUM);
        
        //$usuario=$reg['id_cliente'];
        
        mysqli_free_result($resultado);
        mysqli_close($link);

        header("location:elegir_fecha.php");
        exit();
        

    }
    /*$reg=mysqli_fetch_all($resultado,MYSQLI_NUM);
    
    $opciones="";
    
    for ($i=0; $i <count($reg) ; $i++) { 
        //echo $reg[$i][0]." ".$reg[$i][1]."<br>";
        $opciones.="<option value='".$reg[$i][0]."'>".$reg[$i][2]." ".$reg[$i][1]." -Precio por dia: ".$reg[$i][3]."</option>";
        
        
    }
    echo"<form method='POST' action='reserva.php'> 
    <label>Vehiculo: <select name='coche'>".$opciones."</select></label><br>   
    <button type='submit' name='enviar'>Confirmar pedido</button>
    </form>";
    */
    mysqli_free_result($resultado);
    mysqli_close($link);
    ?>

    
</body>
</html>