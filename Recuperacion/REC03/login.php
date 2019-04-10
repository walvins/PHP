<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <style>
        td{
            border:2px solid black;
        }
        div{
            border:2px red dashed;
            position:absolute;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        include "../misFunciones.inc.php";
    ?>

    <form method="POST" action="login.php">
        <label>Usuario: <input type="text" name="user"></label><br>
        <label>Contraseña: <input type="text" name="pass"></label><br>
        <button type="submit" name="enviar">Jugar</button>
    </form>

    <p>¿Nuevo usuario? Registrate</p>
    <form method="POST" action="login.php">
    <button type="submit" name="registrar">Registrarse</button>
    </form>

    <?php
        if(isset($_POST["enviar"])){
            if((empty($_POST["user"]))||(empty($_POST["pass"])) ){
                echo '<script>alert("Introduce todos los datos para loguearte");</script>';
            }else{
                $user=$_POST["user"];
                $pass=$_POST["pass"];
                $texto="players.txt";
                $usuarios=ficheroToArray($texto);
                //var_dump ($usuarios);
                $fila=busquedaFilaSecuencial($usuarios,$user,0);
                
                if($fila===false){
                    echo '<script>alert("No se ha encontrado el usuario");</script>';
                }else{
                    if($usuarios[$fila][1]!=$pass){
                        echo '<script>alert("Contraseña incorrecta");</script>';
                    }else{
                        $_SESSION['usuario']=$user;
                        header ("location:juego.php");
                    }
                }
            }
        }
        if(isset($_POST["registrar"])){
            header("location:alta.php");
        }
    ?>

    <div>
        <h1>top 5 de la semana</h1>
        <?php
        $cabecera=array("usuario","intentos","fecha");
        $usuarios=ficheroToArray("players.txt");
        $arrayTop=array();

        //Idea: convertir todas las fechas a unix, burbujear, coger las unix de la ultima semana, reconvertir a la fecha normal, mostrar

        //Convertir a unix
        for ($i=0; $i <count($usuarios) ; $i++) { 
            $usuarios[$i][3]=dateUnix($usuarios[$i][3],"/");
        }

        //Burbujear
        $usuarios=burbuja($usuarios,3);

        //Guardar los de los ultimos 7 dias en unix
        //Hace 7 dias en unix:
        $semanaAtras=time()-(7*24*60*60);

        for ($i=0; $i <count($usuarios) ; $i++) { 
            if($usuarios[$i][3]>$semanaAtras)
        }

        mostrarTabla($cabecera,$usuarios);
        ?>
    <div>
</body>
</html>
