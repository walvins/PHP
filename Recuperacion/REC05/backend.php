<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <h1>Ingresos entre dos fechas</h1>
    <?php
    include "../misFunciones.inc.php";
    if(isset($_POST"enviar")){
        $fecha1=$_POST["fecha1"];
        $fecha2=$_POST["fecha2"];
        $guia=$_SESSION["user"];

        $link= mysqli_connect("localhost","root","","museo");
        $sql="SELECT id_guia FROM reservas WHERE  fecha_visita BETWEEN  $fecha1 AND $fecha2 ";

        $resultado=mysqli_query($link,$sql);

        if(!$resultado){
            echo "consulta fallida: ", mysqli_errno($link);
            exit();
        }

                 
        if(mysqli_num_rows($resultado){
            $reg=mysqli_fetch_all($resultado,MYSQLI_NUM);

            $precio=0;
            for ($i=0; $i <count($reg) ; $i++) { 
                $link2= mysqli_connect("localhost","root","","museo");
                $sql2="SELECT precio FROM guias WHERE email_guia==$reg[0]";

                $resultado=mysqli_query($link,$sql);
            }
        }


    }
    ?>

    <form>
    <label><input type="date" name="fecha1"></label>
    <label><input type="date" name="fecha2"></label>
    <button type="button" name="enviar"></button>
    </form>
</div>
</body>
</html>