	<?php 
	function Conectarse()
	{ 
		if (!($link=mysqli_connect('localhost', 'root', '123456', 'tramitesvzla')))
		{ 

			echo "Error conectando a la base de datos."; 

			exit(); 

		} 
		return $link; 

	} 

	?>