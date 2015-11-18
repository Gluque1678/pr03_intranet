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
			$sql = "SELECT * FROM tbl_usuario WHERE id_usuario=$_REQUEST[id]";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql que devuelve el producto en cuestión
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				$prod=mysqli_fetch_array($datos);
				?>
				<form name="formulario1" action="administradormodificar.proc.php" method="get">
				<input type="hidden" name="id" value="<?php echo $prod['id_usuario']; ?>">
				Nombre de Usuario:<br/>
				<input type="text" name="Email" size="25" maxlength="25" value="<?php echo $prod['email']; ?>"><br><br/>
				Contraseña:<br/>
				<textarea name="password" cols="26" rows="5"><?php echo $prod['password']; ?></textarea><br><br/>
				Rol:<br/>
				<input type="text" name="Rol" size="25" maxlength="8" value="<?php echo $prod['rol']; ?>"><br/>
				<br>
				<!--Usuario activo-->
				
				<input name="" type="checkbox" />Usuario Activo
				<br></br>
				<input type="submit" value="Guardar">
				</form>
				<?php
			} else {
				echo "Usuario con id=$_REQUEST[id] no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
		<a href="administrador.php">Volver</a>
	</body>
</html>