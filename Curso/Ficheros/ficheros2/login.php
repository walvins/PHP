<html>
		<head>
			<title>
			
			</title>
		</head>

		<body>
		
			<?php
		
				session_start();
				
			if(isset($_POST['Enviar'])){
			
					if(empty($_POST["usuario"])){
										
						echo "debes escribir el usuario";
					}if(empty($_POST["pass"])){
						echo "debes escribir la contraseña";
					}else{
						$pass=$_POST["pass"];
						$usuario=$_POST["usuario"];
						$datos=ficheroToArray("datos.txt");
						$i=0;
						$encontrado=false;
						while($i<count($datos) and !$encontrado){
							if($datos[$i][0]==$usuario and $datos[$i][1]==$pass){
								$rol=$datos[$i][2];
							
								$encontrado=true;
								}else{
								$i++;
							}
						
						}if(!$encontrado){
							echo "no existe ese usuario";
						}else{
							$_SESSION["usuario"]=$usuario;
							$_SESSION["pass"]=$pass;
							if($rol=="admin"){
								$_SESSION["rol"]=$rol;
								echo "eres admin";
								header("Refresh:3; url=backend.php");
							}else if($rol=="cliente"){
								$_SESSION["rol"]=$rol;
								echo "eres cliente";
								header("Refresh:3; url=producto.php");
							}
							
							//header("Refresh:3; url=pass.php");
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
	<form action="login.php" method="POST">
	 <h2>LOGUEO</h2>
	 <label>Usuario: <input type="text" name="usuario" /></label><br>
	 <label>Password: <input type="text" name="pass" /></label><br>
	

	 <input type="submit" name="Enviar" />
		 </body>

	 </form>
		</body>


</html>