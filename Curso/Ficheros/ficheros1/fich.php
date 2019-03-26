<html>
		<head>
			<title>
			
			</title>
		</head>

		<body>
			<?php
			include "clientes.php";
	
	//funcion que pasa de array a  fichero	
		function arrayToFich($tabla,$fich){
			if(!file_exists($fich)){
				$varfich=fopen($fich, "w");
			}
			else{
				$varfich=fopen($fich,"a");
			}
			for($i=0;$i<count($tabla);$i++){
				
				// $reg="";
				// for($j=0;$j<count($tabla[$i]);$j++){
					// $reg.=$tabla[$i][$j]."~";
				// }
				// $reg.=PHP_EOL;
					if($i==count($tabla)-1){
						$linea=($tabla[$i][0]."~".$tabla[$i][1]."~".$tabla[$i][2]."~".$tabla[$i][3]."~".$tabla[$i][4]);
						fputs($varfich,$linea);
					}else{
						$linea=($tabla[$i][0]."~".$tabla[$i][1]."~".$tabla[$i][2]."~".$tabla[$i][3]."~".$tabla[$i][4]);
						fputs($varfich,$linea . PHP_EOL);
					}
			
				}
				fflush($varfich);
				fclose($varfich);
			}
			
			//Para meterlo
			//arrayToFich($clientes,"datos.txt");
			
			//funcion que pasa de fichero a array
			
			function fichToArray(&$tabla,$fich){
				
				$varfich=fopen($fich,"r");
				$i=0;
				while(!feof($varfich)){
					
					$fila=fgets($varfich);
					$datos=explode("~",$fila);
					
				
					for($j=0;$j<count($datos);$j++)
						{	
						$tabla[$i][$j]=$datos[$j];
						}
						$i++;
					}
				
					fflush($varfich);
					fclose($varfich);
			
			}
			fichToArray($cli,"datos.txt");
			
			function ficheroToArray($fich){
				
				$varfich=fopen($fich,"r");
				$i=0;
				while(!feof($varfich)){
					
					$fila=fgets($varfich);
					$datos=explode("~",$fila);
					
				
					for($j=0;$j<count($datos);$j++)
						{	
						$tabla[$i][$j]=$datos[$j];
						}
						$i++;
					}
				
					fflush($varfich);
					fclose($varfich);
					return $tabla;
			}
			//$cli=ficheroToArray("datos.txt");
			
			
			
			function mostrarTabla($t,$cabecera){
				echo "<h1 align=center>tabla</h1>";
					
					
					echo "<table border=2 align=center>";
					
					echo "<tr>";
					for($k=0; $k<count($cabecera); $k++){
						echo "<th>", $cabecera[$k] ,"</th>";
						
					"	</tr>";
					}
					//recorrer arrays
				for ($i=0; $i<count($t); $i++){
					echo "<tr>";
					
					for($j=0; $j<count($t[0]); $j++){
						echo "<td>", $t[$i][$j],"</td>";
					
					}
					
				}echo  "</tr> ";
			echo "</table>";
		}
		$cab=array("DNI","NOMBRE","FECHA DE NACIMIENTO","LOCALIDAD","sueldo");
		mostrarTabla($cli,$cab);
			//print_r($datos);
			
			//function buscarDatosFich
				//se puede hacer con array aux recorriendolo y comprobando si en esa fila esta con strpos
			
				function buscarDatosFich($buscar,$fich){
					$varfich=fopen($fich,"r");
					$i=0;
					$pos=0;
					$encontrado=false;
					while(!feof($varfich) and !$encontrado){
					$fila=fgets($varfich);
					$dato=explode("~",$fila)[0];
						if($dato==$buscar){
							$pos=$i;
							$datosEncontrado=$fila;
							$encontrado=true;
						}else{
							$i++;
							$encontrado=false;
						}
					}
					if($encontrado){
						echo "encontrado $datosEncontrado <br>";
						//me queda mostrar la fila
					}else{
						echo "no se encontraron<br>";
					}
						
					
				}
				$dni=71506079;
				buscarDatosFich($dni,"datos.txt");
				
				
				//ordena un fichero buscar ordenar array
				$separador="~";
				 function ordenarFich($fich,$pos,$separador){
					 //pasamos a una tabla el ficher
					 $varfich=fopen($fich,"r");
						$i=0;
						while(!feof($varfich)){
							
							$fila=fgets($varfich);
							$datos=explode($separador,$fila);
							
						
							for($j=0;$j<count($datos);$j++)
								{	
								$tabla[$i][$j]=$datos[$j];
								}
								$i++;
							}
						
							fflush($varfich);
							fclose($varfich);
							
					//ordenamos la tabla	
						 $n=count($tabla);
						for($i=$n-1;$i>0;$i--){
							for ($j=0; $j<$n-1;$j++)
								if($tabla[$j][$pos]>$tabla[$j+1][$pos]){
									$aux=$tabla[$i];
												$tabla[$i]=$tabla[$j];
												$tabla[$j]=$aux;
									
									}
							}
						
					//pasamos la tabla al fichero
						$varfichAux=fopen("fichAux.txt", "w");
						for($i=0;$i<count($tabla);$i++){
								$linea=($tabla[$i][0]."~".$tabla[$i][1]."~".$tabla[$i][2]."~".$tabla[$i][3]."~".$tabla[$i][4]);
								if(!strpos($linea,PHP_EOL)){
									fputs($varfichAux,$linea.PHP_EOL);
								}else if(strpos($linea,PHP_EOL) and $i==count($tabla)-1){
										$linea=str_replace(PHP_EOL, '',$linea);
										fputs($varfichAux,$linea);
								}else{
									fputs($varfichAux,$linea);
								}
						}
						fflush($varfichAux);
						fclose($varfichAux);
						
				 }
			ordenarFich("datos.txt",0,$separador);
				
				
			?>
		
		</body>


</html>