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
        class producto{
            public $nombre;
            public $precio;
            protected $estado;
            protected function set_estado_producto($estado){
                $this->estado=$estado;
            }
            function __construct(){
                $this->set_estado_producto("en uso");
            }
        }
    ?>
</body>
</html>