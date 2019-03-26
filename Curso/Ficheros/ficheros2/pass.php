<html>
		<head>
			<title>
			
			</title>
		</head>

		<body>
			<?php
			//este he pasado la contraseña que obteni al encontrarle
			//sino se podria hacer pasando el array 
				session_start();
				$password=$_SESSION["pass"];
				$user=$_SESSION["usuario"];
			if(isset($_POST['Enviar'])){
					if(empty($_POST["pass"])){
						echo "debes escribir la contraseña";
					}else{
						$pass=$_POST["pass"];
						if($pass==$password){
						 echo "logueo correcto";
						}else{
							echo "logueo incorrecto";
						}
					}
					
			
			}
			
			
				
			?>
	<form action="pass.php" method="POST">
	 <h2>pass</h2>
	 <label>password: <input type="text" name="pass" /></label><br>


	 <input type="submit" name="Enviar" />
		 </body>

	 </form>
		</body>


</html>