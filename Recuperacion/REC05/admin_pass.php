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
            $pass=$_POST["pass"];
            $hash= md5($pass);

            $link= mysqli_connect("localhost","root","","museo");
     
     
            $sql="SELECT pass FROM guias ";

            $resultado=mysqli_query($link,$sql);
            if(!$resultado){
                echo "consulta fallida: ", mysqli_errno($link);
                exit();
            }

            if(mysqli_num_rows($resultado){
                $reg=mysqli_fetch_array($resultado,MYSQLI_NUM);
                if($reg[0]==$hash){
                    mysqli_free_result($resultado);
                     mysqli_close($link);
                     
                     //Redirección
                         header("location:backend.php");
                         exit();
                }
            }
        }
    ?>
    <form>
    <label>Contraseña <input type="pass"  name="pass"></label>
    <button type="submit" name="Enviar">Enviar</button>
    </form>
</body>
</html>