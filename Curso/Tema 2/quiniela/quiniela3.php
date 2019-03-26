<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>quiniela3</title>
</head>

<body>
    <?php
        for ($i=1; $i<=14;$i++){
            $a =rand (1,3);
            if($a==3){
            echo "partido ". $i."= ". "x". "<br>";
            }else{
                echo "partido ". $i."= ". $a. "<br>";}
        }
    ?>
</body>

</html>
