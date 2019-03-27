<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MasterMind</title>
</head>
<body>
    <?php
        include "../misFunciones.inc.php";
        session_start();
        
        if(empty($_SESSION['generado'])){
        $_SESSION['generado'] = generarNumero();
        }
        if(isset( $_SESSION['generado'])){
        $numAdivinar = $_SESSION['generado'];
        }
        
        //Guardar el numero en una sesion para usar en otro momento
        for ($i=0; $i <count($numAdivinar) ; $i++) { 
            echo $numAdivinar[$i];
        }
    ?>
        <h1>MAsterMind</h1>
        <form method="POST" action="juego.php">
        <label>Introduce un numero de 4 cifras DISTINTAS <input type="text" name="numElegido" pattern="[0-9]{4}"></label><br>
        <button type="submit" name="enviar">Prueba suerte</button>
        </form>

    <?php
        if(isset($_POST["enviar"])){
            if(empty($_POST["numElegido"])){
                echo '<script>alert("Introduce los numeros")</script>';
            }else{
                //Coger el numero (En forma de string), pasarlo a array
                $numElegido=$_POST["numElegido"];
                $numElegido=str_split($numElegido);
                
                //Comprobar que no se repiten las cifras
                $repe=cifraRepetida($numElegido);
                if($repe==true){
                    echo '<script>alert("SE REPITEN")</script>';
                }

                //Motor del juego
                $herido=heridos($numAdivinar,$numElegido);
                $muerto=muertos($numAdivinar,$numElegido);
                $intentos=0;

                
                echo"<br>";
                echo "Heridos: ".$herido."<br>";
                echo "Muertos: ".$muerto;
            }
        }


    //Funciones
    function cifraRepetida($numerop){
        $repetida=false;
        $i=0;
        for ($i=0; $i <count($numerop)-1 ; $i++) { 
            for ($j=$i+1; $j <count($numerop) ; $j++) { 
                if($numerop[$i]==$numerop[$j]){
                    $repetida=true;
                }
            }
        }
        return $repetida;
    }

    function heridos($num1p,$num2p){    //Recordar que los parametros son arrays
        $punto=0;
        for ($i=0; $i <count($num1p) ; $i++) { 
            for ($j=0; $j <count($num2p) ; $j++) { 
                if($num1p[$i]==$num2p[$j] && $num1p[$i]==$num2p[$i]){
                    $punto++;
                }
            }
        }
        return $punto;
    }

    function muertos($num1p,$num2p){
        $punto=0;
        for ($i=0; $i <count($num1p) ; $i++) { 
            if($num1p[$i]==$num2p[$i]){
                $punto++;
            }
        }
        return $punto;
    }
    ?>
</body>
</html>