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
            //Insercion
            $link= mysqli_connect("localhost","root","","concesionario");
            $sql="INSERT INTO reservas(email_cliente,id_coche,entrega,devolucion) VALUES('$cliente','$coche','$recogida','$devolucion')";
            if(!mysqli_query($link,$sql)){
                echo "error en el alta <br>";
            }  
            mysqli_close($link);
            session_destroy();
            header("location:login.php");

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

    if(mysqli_num_rows($resultado)===0){
        //Si entra aqui es que no hay reservas, por lo tanto mostrará todos los coches
        $link2= mysqli_connect("localhost","root","","concesionario");
        $sql2="SELECT id, modelo, marca ,precio FROM coches";
        $resultado2=mysqli_query($link2,$sql2);

        if(!$resultado2){
            echo "consulta fallida: ", mysqli_errno($link);
            exit();
        }

        if(mysqli_num_rows($resultado2)){
            $reg=mysqli_fetch_all($resultado2,MYSQLI_NUM);
            $opciones="";
            for ($i=0; $i <count($reg) ; $i++) { 
                $opciones.="<option value='".$reg[$i][0]."'>".$reg[$i][2]." ".$reg[$i][1]." -Precio por dia: ".$reg[$i][3]."</option>";
            }
            mysqli_free_result($resultado2);
            mysqli_close($link2);
            echo"<form method='POST' action='reserva.php'> 
            <label>Vehiculo: <select name='coche'>".$opciones."</select></label><br>   
            <button type='submit' name='enviar'>Confirmar pedido</button>
            </form>";
        }
    }else if(mysqli_num_rows($resultado)){    //mysqli_num_rows devuelve la longitud de todos los datos
            $reg=mysqli_fetch_all($resultado,MYSQLI_NUM);

            for ($i=0; $i <count($reg) ; $i++) { 
                $reg1UNIX=dateUnixPHP($reg[$i][1]); //En el caso de que haya reserva, aqui se almacena el inicio de la reserva
                $reg2UNIX=dateUnixPHP($reg[$i][2]); //En el caso de que haya reserva, aqui se almacena el final de la reserva
    

    if(mysqli_num_rows($resultado)){    //mysqli_num_rows devuelve la longitud de todos los datos
        $reg=mysqli_fetch_all($resultado,MYSQLI_NUM);
        
        for ($i=0; $i <count($reg) ; $i++) { 
            //Para cada coche fila, mirar si puede coger las fechas
            
        }

        mysqli_free_result($resultado);
        mysqli_close($link);

            $resultado=mysqli_query($link,$sql);
        
            if(!$resultado){
                echo "consulta fallida: ", mysqli_errno($link);
                exit();
            }

            if(mysqli_num_rows($resultado)){
                $reg=mysqli_fetch_all($resultado,MYSQLI_NUM);
                $opciones="";
                for ($i=0; $i <count($reg) ; $i++) {
                    for ($j=0; $j <count($cochesNoDisponibles) ; $j++) { 
                        if($cochesNoDisponibles[$j]!=$reg[$i][0]){
                            $opciones.="<option value='".$reg[$i][0]."'>".$reg[$i][2]." ".$reg[$i][1]." -Precio por dia: ".$reg[$i][3]."</option>";
                        }
                    } 
                    
                }
                mysqli_free_result($resultado);
                mysqli_close($link);
                echo"<form method='POST' action='reserva.php'> 
                <label>Vehiculo: <select name='coche'>".$opciones."</select></label><br>   
                <button type='submit' name='enviar'>Confirmar pedido</button>
                </form>";
            }
        
    }

        
        

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