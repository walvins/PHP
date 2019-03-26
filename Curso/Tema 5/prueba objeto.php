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
        class persona{
            public static $nombre;
            public static $apellido;
            public  static $edad;
        }

        $objeto= new persona("Alvaro","Martin",11);

        echo $objeto::$nombre;
    ?>
</body>
</html>