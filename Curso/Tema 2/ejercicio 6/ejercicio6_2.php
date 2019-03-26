<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ejercicio6_2</title>
</head>

<body>
    <p>2. Evalúa primero mentalmente y luego en PHP, si $a= 5 siempre inicialmente,las siguientes expresiones:</p>
    <ul>
        <li>$b = 3*(++$a)</li>
        <?php
             $a=5;
             $b= 3*(++$a); //Deberia valer $b=18
             echo  "resultado: ",$b;
        ?>
        <li>$b = 4 – ($a--)</li>
        <?php
          $a=5;
          $b = 4–($a--);//Deberia valer (que no indica false)
          echo  "resultado: ",$b;
        ?>

        <li>$a .= “martes”</li>
        <?php
            $a=5;
            $a .= “martes”; //Deberia salir 5martes
            echo "resultado: ", $a;
        ?>

        <li>$a .= $a</li>
        <?php
            $a =5;
            $a .= $a; //Deberia salir 55
            echo "resultado: ", $a;
        ?>
        <li>$a -= $a</li>
        <?php
            $a =5;
            $a -= $a //Deberia salir 0
            echo "resultado: ", $a;
        ?>
        <li>$a /= $a</li>
        <?php
            $a =5;
            $a /= $a //Deberia salir 1
            echo "resultado: ", $a;
        ?>
    </ul>


</body>

</html>
