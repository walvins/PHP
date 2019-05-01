<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    if(isset($_POST["enviar"])){
        if(!empty($_POST["cuenta"])||!empty($_POST["cantidad"])||!empty($_POST["benef"])){
            $cuenta=$_POST["cuenta"];
            $beneficiario=$_POST["benef"];
            $cantidad=$_post["cantidad"];
            $usuario=$_SESSION["user"];

            //comprobar que no se pasa de los 5000 euros diarios
            if(isset($_SESSION["maximo"])){
                $maximo=$_SESSION["maximo"]+$cantidad;
                if($maximo>5000){
                    echo "Ya has superado el limite diario";
                }else{
                    $_SESSION["maximo"]=$maximo;    
                }
            }else{
                $_SESSION["maximo"]=$cantidad;
            }
            
            $link= mysqli_connect("localhost","alvaro","alvaro","telebank");
            $sql="select saldo from cuentas where cod_cli='$usuario' and cod_cuenta='$cuenta'";


        }else{
            echo "faltan datos"
        }
    }
?>

<form method="POST" action="transferencia.php">
<label>Cuenta de donde se va a extraer: <input type="text" name="cuenta"> </label><br>
<label>Cuenta del beneficiario: <input type="text" name="benef"> </label><br>
<label>Cantidad: <input type="number" name="cantidad"> </label><br>
<button type="submit" name="Enviar">Enviar</button>
<form>
</html>