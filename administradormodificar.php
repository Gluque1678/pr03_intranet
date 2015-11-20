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
				<input type="text" name="email" size="25" maxlength="25" value="<?php echo $prod['email']; ?>"><br><br/>
				Contraseña:<br/>
				<input type="text" name="password" size="25" maxlength="25" value="<?php echo $prod['password']; ?>"><br><br/>
				Rol:<br/>
				<input type="text" name="rol" size="25" maxlength="15" value="<?php echo $prod['rol']; ?>"><br/>
				<br>
				<!--Usuario activo-->
				
				<input  name= "usuario_actiu" type="checkbox" />Usuario Activo
				<br></br>
				<?php
					//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
					$sql = "SELECT * FROM tbl_usuario ORDER BY email";
					//lanzamos la sentencia sql que devuelve todos los tipos de producto
					$tipos = mysqli_query($con, $sql);

					while ($tipo=mysqli_fetch_array($tipos)){
						echo "<option value='$tipo[id_usuario]'";

						if($tipo['id_usuario']==$prod['id_usuario']){
							echo " selected";
						}

						echo ">$tipo[email]";
						echo ">$tipo[password]";
						echo ">$tipo[rol]";
						echo ">$tipo[usuario_actiu]</option>";
						
					}
					
					

				?>
				</select><br/><br/>
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



















