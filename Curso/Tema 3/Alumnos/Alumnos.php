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
    $clase=array(array(34345678,"Piñeiro Perez, Pablo",5,3,4),
    array(56487542,"Ramirez Rodrigez, Raul ",9,4,6),
    array(71291368,"Martin Narganes, Alvaro ",5,9,3),
    array(87546958,"Perez Garcia, Maria",4,6,8));
    $cabecera=array("DNI","Apellidos y nombre","1º Evaluación","2º Evaluación","3º Evaluación");
    //1a) Que alumno tiene la mejor nota en una evaluación
    function mayorNota($clasep,$cabecerap,$evap){
        $j=0;
        
        //El valor que pasamos de la evaluacion no corresponde a la posicion del array, asi que asignamos la dirección nosotros
        if($evap==1){        
            $j=2;
        }
        if ($evap==2){
            $j=3;
        }
        if ($evap==3){
            $j=4;
        }

        $mejorNota=(int)0;  //Asignamos la mejor nota por

        for($i=0;$i<count($clasep);$i++){   //Cambiamos la nota si es mayor
            if($mejorNota<$clasep[$i][$j]){
                $mejorNota=$clasep[$i][$j]; //Asigna el valor nuevo
                $mejorAlumno= $clasep[$i];  //Asigna los datos de ese alumno
            }
        }
        echo "Datos del alumno con la mejor nota de la evaluación:<br> ";
        for ($i=0;$i<count($mejorAlumno); $i++){
            echo $cabecerap[$i]. ": ".$mejorAlumno[$i]."<br> ";
        }
        echo "<br>";
    }
    //mayorNota($clase,$cabecera,2);

    //1b) Que alumno tiene la mayor media
    function mayorMedia($clasep,$cabecerap){
        $mejorNota=0;
        for ($i=0;$i<count($clasep);$i++){
            $media= ($clasep[$i][2]+$clasep[$i][3]+$clasep[$i][4])/3;
            if($media>$mejorNota){
                $mejorNota=$media;
                $mejorAlumno=$clasep[$i];
            }
        }
        echo "Datos del alumno con la mejor media del curso:<br> ";
        for ($i=0;$i<count($mejorAlumno); $i++){
            echo $cabecerap[$i]. ": ".$mejorAlumno[$i]."<br> ";
        }
        echo "<br>";
    }
    //mayorMedia($clase,$cabecera);

    //Peor evaluacion:
    function peorEvaluación($clasep){
        $mediaEva=0;
        $mediaEva2=0;
        $mediaEva3=0;
        foreach ($clasep as $v1) {
            $mediaEva+= $v1[2];
            $mediaEva=$mediaEva/count($clasep);
            $mediaEva2+= $v1[3];
            $mediaEva2=$mediaEva2/count($clasep);
            if($mediaEva2<$mediaEva){
                $mediaEva=$mediaEva2;
            }
            $mediaEva3+= $v1[4];
            $mediaEva3=$mediaEva3/count($clasep);
            if ($mediaEva3<$mediaEva){
                $mediaEva=$mediaEva3;
            }
        }
        echo "La media de la pero evaluación es: ".$mediaEva;
    }
    //peorEvaluación($clase);

    //Notas de un alumno pasando el dni
    function alumnoNotas($clasep,$dnip){
        $i=0;
        while($clasep[$i][0] != $dnip){
            $i++;
        }
        echo "Notas del Alumno con DNI $dnip: <br>";
        echo "Primera evaluación: ".$clasep[$i][2]. "<br> Segunda evaluación: ". $clasep[$i][3]."<br> Tercera evaluación: ".$clasep[$i][4];
    }
    //alumnoNotas($clase,71291368);

    //Ordenar la tabla por nota media de curso. 
    function ordenMedia($clasep){
        for ($i=0;$i<count($clasep);$i++){
            $media= ($clasep[$i][2]+$clasep[$i][3]+$clasep[$i][4])/3;
            $clasep[$i][]=$media;
        }
        /*foreach ($clasep as $valor) {
            echo "<br>";
            foreach ($valor as $elemento){
                echo $elemento." ";
            }
        }
        */
        for($j=0;$j<count($clasep);$j++){    //Cuenta para ver cuantas veces pasa
            //Esto es un recorrido
            for ($i=count($clasep)-1;$i>$j;$i--){ 
                if($clasep[$i][5]<$clasep[$i-1][5]){//Comparamos con el siguiente puesto
                $aux=$clasep[$i];                   //Guardamos el primer dato para no perderlo
                $clasep[$i]=$clasep[$i-1];        //Ponemos el del segundo puesto en el primero
                $clasep[$i-1]=$aux;                 //Ponemos el que estaba guardado en el segundo
                }
            }
        }
        echo "<table border=\"1\"";
        for($x=0;$x<count($clasep);$x++){                     //Recorremos para ir asignando valores en la tabla
            echo "<tr>";
            for ($y=0;$y<6;$y++){
            echo "<th>".$clasep[$x][$y]."</th>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ordenMedia($clase);
    ?>
</body>
</html>