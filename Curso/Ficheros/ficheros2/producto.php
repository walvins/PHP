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
		echo "Bienvenido ". $user;
			
				
			?>
	
		</body>


</html>