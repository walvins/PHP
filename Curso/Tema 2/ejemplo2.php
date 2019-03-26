<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ejemplo2</title>
</head>

<body>
    <?php
    $var =28;
    echo isset($var),"<br>"; 
    
    echo "Empty: ",empty($var),"<br>"; 
    
   // unset ($var); //Con esto te cargas totalmente la variable
    
    $var="";
    
    echo isset($var),"<br>";
    
    echo "Empty: ",empty($var),"<br>"; //Dará true porque no tiene nada $var
    
    echo $var,"<br>";
    
    
    ?>

</body>

</html>
