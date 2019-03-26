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

if (isset($_POST["Enviar"])) {
    if (!empty($_POST["fecha_recogida"]) || !empty($_POST["fecha_entrega"]) || !empty($_POST["origen"]) || !empty($_POST["destino"]) || !empty($_POST["descripcion"]) || !empty($_POST["requerimientos"]) || !empty($_POST["peso"]) || !empty($_POST["precio_max"])) {
        $usuario = $_SESSION["user"];
        $recogida = $_POST["fecha_recogida"];
        $entrega = $_POST["fecha_entrega"];
        $origen = $_POST["origen"];
        $destino = $_POST["destino"];
        $descripcion = $_POST["descripcion"];
        $requerimientos = $_POST["requerimientos"];
        $peso = $_POST["peso"];
        $precio=$_POST["precio_max"];

        //Conexion con la base de datos
        $link = mysqli_connect("localhost","Alvaro","Alvaro","transporte");

        $sql= "insert into pedidos (id_pedido, cliente, fecha_recogida,	fecha_entrega,	origen,	destino, descripcion,requerimientos, peso, precio_max) values(null,'$usuario','$recogida','$entrega','$origen','$destino','$descripcion','$requerimientos','$peso','$precio')";
        mysqli_query($link, $sql);
        echo ("Ha funcionado");
    }else{
        echo "Has dejado algun campo vacio";
    }

}
;

echo '<fieldset>
            <legend>Nuevo pedido</legend>
        <form method="POST" action="nuevoPedido.php">
            <label>Fecha recogida: <input type="text" value="YYYY-MM-DD" name="fecha_recogida"></label><br>
            <label>Fecha entrega: <input type="text" value="YYYY-MM-DD" name="fecha_entrega"></label><br>
            <label>Origen: <input type="text" name="origen"></label><br>
            <label>Destino: <input type="text" name="destino"></label><br>
            <label>Descripcion: <input type="text" name="descripcion"></label><br>
            <label>Requerimientos: <input type="text" name="requerimientos"></label><br>
            <label>Peso (kg): <input type="number" name="peso"></label><br>
            <label>Precio maximo: <input type="number" name="precio_max"></label><br>
            <button type="submit" name="Enviar">Enviar</Button>
        </form>
    </fieldset>';

?>
</body>

</html>