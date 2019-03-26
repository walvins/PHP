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
    if(!isset($_SESSION["contador"])){
        $_SESSION["contador"]=0;
    }
    $fichero=fopen("fichUsers.txt","r");
    if(isset($_POST['enviar'])){
            while (!feof($fichero)){
                $linea=fgets($fichero);
                $arrLinea=explode("~",$linea);
                if($_POST["dni"]==$arrLinea[0]){
                    while ($_SESSION["contador"]<=3){
                        if($_POST["pass"]!=$arrLinea[1]){
                            $_SESSION["contador"]++;
                        }else{
                            $_SESSION["contador"]=0;
                            if($arrLinea[2]=="admin"){
                            header("location:admin.php");
                            exit();
                            }
                            if($arrLinea[2]=="gerente"){
                                header("location:gerente.php");
                                exit();
                            }
                            if($arrLinea[2]=="cliente"){
                                header("location:cliente.php");
                                exit();
                            }

                        }
                    
                    }
                }else{
                    header("location:login.php");
                }
            }

        fclose($fichero);
        if($_SESSION["contador"]>3){
            echo "Te hemos enviado un correo y cambiado la contraseña por una aleatoria";
        }
    }else{
        echo"<form method='POST' action='login.php'>
        DNI:  <input type='text' name='dni'><br>
        Contraseña:  <input type='password' name='pass'><br>
        <input type='submit' name='enviar'/><br/>
        </form>";
    }
    ?>
    
</body>
</html>