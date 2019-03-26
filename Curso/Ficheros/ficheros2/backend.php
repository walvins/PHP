<html>
		<head>
			<title>
			
			</title>
		</head>

		<body>
			<?php
			$datos=ficheroToArray("datos.txt");
		
			//este he pasado la contraseña que obteni al encontrarle
			//sino se podria hacer pasando el array 
				session_start();
				$password=$_SESSION["pass"];
				$user=$_SESSION["usuario"];
			if(isset($_POST['Alta'])){
				if(empty($_POST["usuario"])){
											
							echo "debes escribir el usuario<br>";
			
				}if(empty($_POST["pass"])){
							echo "debes escribir la contraseña<br>";
				}if(empty($_POST["rol"])){
							echo "debes escribir el rol<br>";
				}else{
						//comprobar si el usuario existe
						$existe=false;
						$usuario=$_POST["usuario"];
						
							$i=0;
						while(!$existe and $i<count($datos)){
							if($datos[$i][0]==$usuario){
								echo "ese usuario ya existe<br>";
								$existe=true;
							}else{
								$i++;
							}
						}
						if(!$existe){
							$pass=$_POST["pass"];
							$rol=$_POST["rol"];
							if($rol=="admin" or $rol=="cliente"){
								echo $usuario." ".$pass." ".$rol."<br>";
								//añadir aqui
								$varfich=fopen("datos.txt","a");
								$linea=$usuario."~".$pass."~".$rol."~";
								if(strpos($linea,PHP_EOL)){
									fputs($varfich,$linea);
								}else{
									fputs($varfich,PHP_EOL .$linea);
								}
								fflush($varfich);
								fclose($varfich);
							}else{
								echo "el rol debe ser cliente o admin";
								
							}
						}
					
			
				}
			}
			if(isset($_POST['eliminar'])){
			
				if(empty($_POST["nombres"])){
					echo "debes seleccionar un nombre";
				}else{
					$nombre=$_POST['nombres'];
					echo $nombre;
					$varfichAux=fopen("fichAux.txt", "w");
					for($i=0;$i<count($datos); $i++){
							if($datos[$i][0]==$nombre and $datos[$i][2]=="admin"){
								echo "no se pueden borrar administradores";
								$linea=$datos[$i][0]."~".$datos[$i][1]."~".$datos[$i][2]."~";
								if($i==0){
										fputs($varfichAux,$linea);
										}else{
										fputs($varfichAux, PHP_EOL .$linea);
									}
							}else{
								$nuevoPrimero=false;
								if($datos[$i][0]==$nombre){
									echo "eliminado";
									if($i==0){
										$nuevoPrimero=true;
									}
								}else{
									$linea=$datos[$i][0]."~".$datos[$i][1]."~".$datos[$i][2]."~";
									
									if($i==0 or $nuevoPrimero){
										
										fputs($varfichAux,$linea);
										$nuevoPrimero=false;
									}else{
										fputs($varfichAux, PHP_EOL .$linea);
									}
								
								}
					}
				}
						fflush($varfichAux);
						fclose($varfichAux);
						unlink("datos.txt");
						rename("fichAux.txt","datos.txt");
				}
				
			}
			if(isset($_POST['modificar'])){
				if(empty($_POST["nombres"])){
					echo "debes seleccionar un nombre";
				}else{
					if(empty($_POST["usuarioMod"])){
												
								echo "debes escribir el usuario<br>";
				
					}if(empty($_POST["passMod"])){
								echo "debes escribir la contraseña<br>";
					}if(empty($_POST["rolMod"])){
								echo "debes escribir el rol<br>";
					}else{
							//comprobar si el usuario existe
							//pasar todos menos el seleccionado y appened el nuevo
						$nombre=$_POST['nombres'];
						$varfichAux=fopen("fichAux.txt", "w");
						for($i=0;$i<count($datos); $i++){
								if($datos[$i][0]==$nombre){
								echo "modificado";
								if($i==0){
										$nuevoPrimero=true;
									}
								}else{
									$linea=$datos[$i][0]."~".$datos[$i][1]."~".$datos[$i][2]."~";
									
									if($i==0 or $nuevoPrimero){
										
										fputs($varfichAux,$linea);
										$nuevoPrimero=false;
									}else{
										fputs($varfichAux, PHP_EOL .$linea);
									}
								
								}
					}
					$usuarioMod=$_POST["usuarioMod"];
					$passMod=$_POST["passMod"];
					$rolMod=$_POST["rolMod"];
					$linea=$usuarioMod."~".$passMod."~".$rolMod."~";
					fputs($varfichAux, PHP_EOL .$linea);
					fflush($varfichAux);
					fclose($varfichAux);
					unlink("datos.txt");
					rename("fichAux.txt","datos.txt");
				}
			}
		}
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
				
			?>
	<form action="backend.php" method="POST">
	 <h2>admin</h2>
	 <label>Usuario: <input type="text" name="usuario" /></label><br>
	 <label>password: <input type="text" name="pass" /></label><br>
	 <label>Rol: <input type="text" name="rol" /></label><br>
	 <input type="submit" name="Alta" value="Alta" /><br>
	 
	  <label>Idioma: <select name="nombres" size="count($datos)" />
                    <option value="0" >----selecciona un usuario</option>
                 <?php
                     for($i=0;$i<count($datos);$i++){
						echo"	<option value=".$datos[$i][0]." >".$datos[$i][0]."</option>";
                   
					 }
					?>
					</select>
	             </label><br>
				
	  <input type="submit" name="eliminar" value="eliminar" />
	   <input type="submit" name="modificar" value="modificar" />
	   <div style= <?php if(isset($_POST['modificar'])){echo "display: block";
	   }else{
		   echo "display: none";
	   }?>>
			<label>Usuario: <input type="text" name="usuarioMod" /></label><br>
		 <label>Password: <input type="text" name="passMod" /></label><br>
		 <label>Rol: <input type="text" name="rolMod" /></label><br>
		 </div>
			 </body>

	 </form>
		</body>


</html>