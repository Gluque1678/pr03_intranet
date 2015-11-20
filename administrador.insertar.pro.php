

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'bd_pr03_intranet');
			$sql = "INSERT INTO tbl_usuario (id_usuario, email, password, rol, usuario_actiu) VALUES ($_REQUEST[id_usuario], $_REQUEST[Email], $_REQUEST[Password], $_REQUEST[rol], $_REQUEST[Usuario_actiu])";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: administrador.php")
		?>
	</body>
</html>