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
        include "../misFunciones.inc.php";
        session_start();

        //Reserva
        if(isset($_POST["enviar"])){
            if(!empty($_POST["recogida"])&& !empty($_POST["devolucion"])){
                $cliente=$_SESSION["mail"];
                $recogida=$_POST["recogida"];
                $devolucion=$_POST["devolucion"];
    
                //1º Que la reserva se hace entre 2 y 15 dias
                list($anyo_recogida,$mes_recogida,$dia_recogida)=explode("-",$recogida);
                $fechaUNIX_recogida=mktime(0,0,0,$mes_recogida,$dia_recogida,$anyo_recogida);    //mktime para a milisegundos
                $hoy=date('d/m/Y');
                $hoy=dateUnix($hoy,"/");
                $dosDias=$hoy+(2*24*60*60);
                $quinceDias=$hoy+(15*24*60*60);
    
                if(($fechaUNIX_recogida<$dosDias)||($fechaUNIX_recogida>$quinceDias)){
                    echo "<script>alert('La reserva tiene que tener una antelacion de minimo 2 dias y maximo 15 dias')</script>";
                }else{
                    //2º Que la devolucion no excede los 30 dias
                    list($anyo_devolucion,$mes_devolucion,$dia_devolucion)=explode("-",$devolucion);
                    $fechaUNIX_devolucion=mktime(0,0,0,$mes_devolucion,$dia_devolucion,$anyo_devolucion);
                    $tope=$fechaUNIX_recogida+(30*60*60);
                    if($fechaUNIX_devolucion>$tope){
                        echo "<script>alert('La reserva solo puede durar 30 dias maximo')</script>";
                    }else{
                        //3º Que el cliente no tenga ya reservas ese dia
                        $link= mysqli_connect("localhost","root","","concesionario");
                        $sql="SELECT email_cliente FROM reservas WHERE email='$mail' and entrega='$recogida'";  
                        $resultado=mysqli_query($link,$sql);

                        if(!$resultado){
                            echo "consulta fallida: ", mysqli_errno($link);
                        }
                        if(mysqli_num_rows($resultado)){    //mysqli_num_rows devuelve la longitud de todos los datos
                            $reg=mysqli_fetch_array($resultado,MYSQLI_NUM);
                            mysqli_free_result($resultado);
                            mysqli_close($link);

                            if($reg[0]==$cliente){
                                echo "<script>alert('Usted ya tiene reservado un coche ese dia')</script>";
                            }else{
                                $_SESSION["recogida"]=$recogida;
                                $_SESSION["devolucion"]=$devolucion;
                                header("location:reserva.php");
                                exit();
                            }
                            
                        }
                    }
                }
            }
        }

        echo"<form method='POST' action='elegir_fecha.php'>
        <label>Fecha recogida: <input type='date' name='recogida'></input></label><br>
        <label>Fecha devolución: <input type='date' name='devolucion'></input></label><br>
        <button type='submit' name='enviar'>Confirmar Fecha</button></form>"
    ?>
</body>
</html>