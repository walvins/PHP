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

    echo " <form method='POST'>
    Apellidos, nombre <input type='text' name='apenom' placeholder='Apellido1 Apellido2, Nombre' value="<?php if ($error==0) echo $_REQUEST ['apenom']; ?>" ><br>

    Fecha de nacimiento <input type='text' name='nac' placeholder= 'dd/mm/aaaa' value="<?php if ($error==0) echo $_REQUEST ['nac']; ?>" ><br>

    Provincia de nacimiento <input type='text' name='prov' value="<?php if ($error==0) echo $_REQUEST ['prov']; ?>"><br>


    </select><br>
    Observaciones: <br/> <textarea rows="10" cols="40" name="obs" value="<?php if($error==0) echo $_REQUEST ['obs']; ?>"></textarea><br/> 
    <input type="submit" name="enviar"/><br/>

</form>"
    //Validacion
    $error=0;
    if (isset($_POST["enviar"])){  
        //Esto es para mirar que no esta vacio
        if(empty($_POST["apenom"]) or empty($_POST["nac"]) or empty($_POST["prov"]) or empty($_POST["sexo"]) or empty($_POST["estado"])){
            echo "Hay datos vacios";
            $error=1;
            echo "<meta http-equiv='Refresh' content='1;URL=formularios3.php'/>";
        }

        //Vamos a la fecha
        $fecha= $_POST["nac"];
        $f=explode("/",$fecha); 
        $d=$f[0];
        $m=$f[1]; 
        $a=$f[2];
        if(!checkdate($m,$d,$a)){
            echo "Error en formado y/o lógica de fecha";
            $error=1;
        }
        if(time()-mktime(0,0,0,$m,$d,$a)<18*365.25*24*60*60){
            echo "Error, eres menos de edad";
            $error=1;
            echo "<meta http-equiv='Refresh' content='1; URL=formularios3.php'/>";
        }
    }
    if ($error==0){
        foreach($_POST as $campo => $respuesta){
            echo "$campo :".$respuesta."<br>" ;
            $$campo=$respuesta;
        }
}   
     ?>
</body>
</html>