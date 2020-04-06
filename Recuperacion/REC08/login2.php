<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pass</title>
</head>
<body>
<?php
    session_start();
    if(isset($_SESSION["intentos"])){
        $intentos=$_SESSION["intentos"];
    }else{
        $intentos=0;
    }
    $mail=$_SESSION["mail"];

    //Para cuando se olvida la contraseña
    if(isset($_POST["olvidado"])){
        $link= mysqli_connect("localhost","root","","concesionario");
        $sql="SELECT pass FROM clientes WHERE email='$mail'";   
        $resultado=mysqli_query($link,$sql);
   
        if(!$resultado){
                echo "consulta fallida: ", mysqli_errno($link);
                //exit();
        }
            
        if(mysqli_num_rows($resultado)){    
            //login correcto
            $reg=mysqli_fetch_array($resultado,MYSQLI_NUM);
            $mensaje="Su contraseña es: ".$reg[0];
            mysqli_free_result($resultado);
            mysqli_close($link);

            mail($mail,"Contraseña concesionario",$mensaje);
            header("location:login.php");
            exit();              
        }
       
    }

    //Para enviar los datos
    if(isset($_POST["Enviar"])){
        if(!empty($_POST["user"])&& !empty($_POST["pass"])){
            $pass=$_POST["pass"];
            $hash=md5($pass);
            $link= mysqli_connect("localhost","root","","concesionario");
            $sql="SELECT * FROM clientes WHERE email='$mail' and pass='$hash'";   
            $resultado=mysqli_query($link,$sql);

            if(!$resultado){
                echo "consulta fallida: ", mysqli_errno($link);
                $intento++;
                if($intento==3){
                    $intento=0;
                    $_SESSION["intentos"]=$intento;
                    header("location:login.php");
                }
                //exit();
            }
            
            if(mysqli_num_rows($resultado)){    //mysqli_num_rows devuelve la longitud de todos los datos
                //login correcto
                $reg=mysqli_fetch_array($resultado,MYSQLI_NUM);
                
                //$usuario=$reg['id_cliente'];
                
                mysqli_free_result($resultado);
                mysqli_close($link);

                header("location:elegir_fecha.php");
                exit();
            }
        }else{
            echo "faltan datos";
        }
    }

    echo'<form method="POST" action="login2.php">
    <label>email: <input type="text" name="user" value="'.$mail.'"> </label><br>
    <label>Contraseña: <input type="pass" name="pass"></label><br>
    <button type="submit" name="Enviar">Enviar</button>
    <button type="submit" name="olvidado">He olvidado la contraseña</button>
    <form>';
?>
    
</body>
</html>