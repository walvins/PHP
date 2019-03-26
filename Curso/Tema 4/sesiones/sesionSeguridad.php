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
      $_SESSION["usuario"]=$_POST["dni"];
      
      
      if($_SESSION["control"]=="logueado"){
        //Codigo
    }else{
      header("Location: http://www.google.es ");
        echo "No estas autorizado";
    }
    ?>
</body>
</html>