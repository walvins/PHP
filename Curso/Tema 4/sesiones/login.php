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
    if(isset($_POST['enviar'])){
        echo "<meta http-equiv='Refresh' content='1;URL=sesionSeguridad.php'/>";
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