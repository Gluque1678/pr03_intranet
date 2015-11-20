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

			//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
			$sql = "DELETE FROM tbl_usuario WHERE id_usuario=$_REQUEST[id]";
			$sql1 = "DELETE FROM tbl_reservas WHERE id_usuario=$_REQUEST[id]";
					
			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";


			//lanzamos la sentencia sql aqui borrara la tabla reservas si le damos a eliminar
			$datos = mysqli_query($con, $sql1);
			
			if(mysqli_affected_rows($con)==1){
				header("location:administrador.php");
				//echo "Usuarios con id=$_REQUEST[id] eliminado!";
			} elseif(mysqli_affected_rows($con)==0){
				echo "No se ha eliminado ningún usuario por que no existe en la BD";
			} else {
				echo "Ha pasado algo raro";
			}


			//lanzamos la sentencia sql aqui borrara el usuario si le damos a eliminar
			$datos = mysqli_query($con, $sql);
			
			if(mysqli_affected_rows($con)==1){
				header("location:administrador.php");
				//echo "Usuarios con id=$_REQUEST[id] eliminado!";
			} elseif(mysqli_affected_rows($con)==0){
				echo "No se ha eliminado ningún usuario por que no existe en la BD";
			} else {
				echo "Ha pasado algo raro";
			}

			
			

			

		?>
		<br/><br/>
		<a href="administrador">Volver</a>
	</body>
</html>