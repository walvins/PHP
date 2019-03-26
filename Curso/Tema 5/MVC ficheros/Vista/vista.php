<?php 
include "..\modelo\modelo.php";
$datos=getDatos();
echo "<html>
		<head>
			<meta charset='utf-8'>
			<title>Datos</title>
			<style type='text/css'>
				table{
		  			border-collapse: collapse; 
					text-align: center;
				}
				td{
					border: black 1px solid;
					text-align: center;
			
				}
				th{
					border: black 1px solid;
					text-align: center;
				}
			</style>
		</head>
<body>";
	echo "<table>";
		echo "<tr><th>Nombre</th><th>Edad</th></tr>";
		echo "<tr>";
		echo "</tr>";
		for($i=0;$i<count($datos);$i++){
			echo "<tr>";
			for($j=0;$j<count($datos[$i]);$j++){
				 echo "<td>",$datos[$i][$j],"</td>";
			}
			echo "</tr>";
		}
	echo "</table>";

echo "</body>";
?>
