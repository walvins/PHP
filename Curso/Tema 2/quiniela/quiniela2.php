<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quiniiela</title>
</head>

<body>
    <?php
    $n1= rand(1,45);
    do {
        $n2=rand (1,45);
    } while ($n1==$n2);
    
    do {
    $n3=rand (1,45);
    
    } while ($n3==$n2 || $n3==$n1);
    do {
    $n4=rand (1,45);
    } while ($n4==$n2 ||$n4==$n1 ||$n4==$n3 );
    do {
    $n5=rand (1,45);
    } while ($n5==$n2 ||$n5==$n4 ||$n5==$n3 ||$n5==$n1 );
    do {
    $n6=rand (1,45);
    } while ($n6==$n2 ||$n6==$n4 ||$n6==$n3 ||$n5==$n1 ||$n6==$n5 );
    echo "primer numero: ", $n1, "<br>";
    echo "primer numero: ", $n2, "<br>";
    echo "primer numero: ", $n3, "<br>";
    echo "primer numero: ", $n4, "<br>";
    echo "primer numero: ", $n5, "<br>";
    echo "primer numero: ", $n6, "<br>";
    ?>
</body>

</html>
