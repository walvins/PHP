<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mostrar</title>
</head>
<body>
    <?php
    //Validacion
    $error=0;
    if (isset($_POST["enviar"])){  
        //Esto es para mirar que no esta vacio
        if(empty($_POST["apenom"]) or empty($_POST["nac"]) or empty($_POST["prov"]) or empty($_POST["sexo"]) or empty($_POST["estado"])){
            echo "Hay datos vacios";
            $error=1;
            echo "<meta http-equiv='Refresh' content='1;URL=formularios1.html'/>";
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
            echo "<meta http-equiv='Refresh' content='1;URL=formularios1.html'/>";
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