<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <?php
    include "datos.php";
    include "../misFunciones.inc.php";
    //Recogemos los datos
    $dni=$_POST["dni"];$ciudad=$_POST["Ciudad"];$enero=$_POST["Enero"];$febrero=$_POST["Febrero"];$marzo=$_POST["Marzo"];$abril=$_POST["Abril"];$mayo=$_POST["Mayo"];$junio=$_POST["Junio"];$julio=$_POST["Julio"];$agosto=$_POST["Agosto"];$septiembre=$_POST["Septiembre"];$octubre=$_POST["Octubre"];$noviembre=$_POST["Noviembre"];$diciembre=$_POST["Diciembre"];

    $nuevoCliente = array($dni,$ciudad,$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre);

    //Ordenamos
    burbuja($datos,0);

    //Hacer mas adelante con binario
    $encontrado=false;
    $i=0;
        while($encontrado!=true){
            if($nuevoCliente[$i]<){

            }else{
            $i++;
            }
        }

    ?>


<h1>Ej02</h1>
    <form method="POST" action="ej03.php">
        <h2>Introduce el nuevo cliente</h2>
        <label>DNI: <input type="text" name="dni"></label><br>
        <label>Ciudad: <input type="text" name="Ciudad"></label><br>
        <label>Enero: <input type="text" name="Enero"></label><br>
        <label>Febrero: <input type="text" name="Febrero"></label><br>
        <label>Marzo: <input type="text" name="Marzo"></label><br>
        <label>Abril: <input type="text" name="Abril"></label><br>
        <label>Mayo: <input type="text" name="Mayo"></label><br>
        <label>Junio: <input type="text" name="Junio"></label><br>
        <label>Julio: <input type="text" name="Julio"></label><br>
        <label>Agosto: <input type="text" name="Agosto"></label><br>
        <label>Septiembre: <input type="text" name="Septiembre"></label><br>
        <label>Octubre: <input type="text" name="Octubre"></label><br>
        <label>Noviembre: <input type="text" name="Noviembre"></label><br>
        <label>Diciembre: <input type="text" name="Diciembre"></label><br>
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>