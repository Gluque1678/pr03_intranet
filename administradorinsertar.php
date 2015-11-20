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

			//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			$sql = "SELECT * FROM tbl_usuario ORDER BY id_usuario ASC";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			?>
		
		<form action="administradorinsertarpro.php" method="GET">
			
			Usuario Email:</br>
			<input type="text" name="email" size="20" maxlength="25"><br/>
			Contraseña:<br/>
			<input type="pass" name="password" size="20" maxlength="25"><br/>
			Rol:<br/>
			<input type="text" name="rol" size="20" maxlength="25"><br/>
			</br>
			<!--Usuario activo-->
			Usuario Activo	
			<input name="" type="checkbox" /><br></br>
				
			<?php
				
				while ($tipo = mysqli_fetch_array($datos)) {echo "<option value='$tipo[id_usuario]'><'$tipo[email]'><'$tipo[rol]'><'$tipo[usuario_actiu]'></option>";


				}										
				

			?>
			</select><br/><br/>
			<input type="submit" value="Enviar">
		</form>
		<br/><br/>
		<a href="administrador.php">Volver</a>
	</body>
</html>