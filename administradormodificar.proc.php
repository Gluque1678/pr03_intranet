<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en bd_pr03_intranet</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'bd_pr03_intranet');
			$sql = "UPDATE tbl_usuario SET email='$_REQUEST[email]', password='$_REQUEST[password]', rol='$_REQUEST[rol]', usuario_actiu=$_REQUEST[usuario_actiu]  WHERE id_usuario=$_REQUEST[id]";

			//echo "consulta resultante=".$sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: administrador.php")
		?>
	</body>
</html>


		
	
		