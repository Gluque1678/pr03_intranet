<!--<?php
//se continúa la sesión
session_start();

//se comprueba si la variable mensaje devuelto de reservar.php está instanciada.
//Si se ha devuelto, es que el insert ha sido correcto.
if(isset($_REQUEST['mensaje'])){
  //se comprueba si no está vacía
  if(!empty($_REQUEST['mensaje'])){
    //se guarda el contenido en la siguiente variable
    $mensaje = $_REQUEST['mensaje'];
    //se muestra un mensaje en un alert javascript
    echo "<script type='text/javascript'>alert('$mensaje')</script>";
    //destruimos la variable para evitar el alert al recargar la web
    unset($mensaje);
  }
}

//si no está instanciada la sesión
if(!isset($_SESSION['sUser'])){
  //comprueba si está vacia la sesión
  if(empty($_SESSION['sUser'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
}

//conexión a la base de datos o mensaje en caso de error
$conexion = mysqli_connect('localhost','root','','bd_pr03_intranet') or die ('No se ha podido conectar'. mysql_error());

//Sentencia para mostrar todos los materiales de la tabla tbl_material
$sql = "SELECT tbl_material.id_material, tbl_tipo_material.tipo, tbl_material.descripcion, tbl_material.disponible, tbl_material.incidencia, tbl_material.descripcion_incidencia
        FROM tbl_material
        INNER JOIN tbl_tipo_material ON tbl_tipo_material.id_tipo_material = tbl_material.id_tipo_material";
      /*  INNER JOIN tbl_usuario on tbl_usuario.id_usuario = tbl_reservas.id_usuario*/ /*tbl_usuario.email*/

//comprobación si está instanciada la variable opciones (viene de un select de filtrado en el formulario de cabecera)
if(isset($_REQUEST['opciones'])){
  //si los valores son mayores de 0,
  if ($_REQUEST['opciones']>0) {
    //se añadirá a la consulta según: 0 - Aulas, 1 - Material informático
    $sql .= " WHERE tbl_material.id_tipo_material = ".$_REQUEST['opciones'];
  }
}
?>-->


<!--INICIO WEB -->
<!DOCTYPE html>
<html>
  <head>
      <title>Oxford Intranet</title>
      <meta lang="es">
      <meta charset="utf-8">
      <meta name="author" content="Felipe, Xavi, Germán">
      <meta name="description" content="Proyecto3_intranet">
      <link rel="icon" type="image/png" href="img/icon.png">
      <link rel="stylesheet" type="text/css" href="css/estilo1.css" media="screen" />
      <script type="text/javascript" src="js/funcion.js"></script>
  </head>
    <body>

<a name="top">
        <!--BARRA NEGRA SUPERIOR -->
      <div id="barraNegra">
        <div id="barraLogin">
          <ul id="listaLogin">
            <li id="identificate">Hola <?php echo $_SESSION['sUser']?> </li>
            <li><a href="php/salir.php"><img src="img/exit.png" alt="Salir" title="Salir" /></a></li>
          </ul>
        </div>
      </div>

        <!--BARRA DE MENÚ -->
      <header>
        <section id="cabecera">
          <figure>
            <a href="index.php"><img src="img/logo.png"/></a>
          </figure>
          <nav>
            <ul>
              <a href="main.php"><li>INICIO</li></a>
              <a href="reserva.php"><li>RESERVAS</li></a>
            </ul>
          </nav>
        </section>
      </header>
      <div id="barraNegraDatos">
         <div id="barraOpciones ">

                            
        	</section>

        </main>

    </body>
</html>


!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Ejemplo de formularios con datos en BD</title>
      <!-- full d'estils per a fer servir fonts d'icons -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/estilo1.css" media="screen" />
      <style>
        a {color: blue;}
      </style>
  </head>
  <body>
    <?php
      //realizamos la conexión con mysql
      $con = mysqli_connect('localhost', 'root', '', 'bd_pr03_intranet');

      //como la sentencia SIEMPRE va a buscar todos los registros de la tabla usuario, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
      $sql = "SELECT * FROM tbl_usuario ORDER BY id_usuario ASC";



      //mostramos la consulta para ver por pantalla si es lo que esperábamos o no
      //echo "$sql<br/>";

      //lanzamos la sentencia sql
      $datos = mysqli_query($con, $sql);

      ?>
      <table border>
        <tr>
          <th>Alta Usuarios</th>
          <th>Contraseña Usuarios</th>
          <th>Modificacion de Usuarios</th>
          
        </tr>

        <?php

        //recorremos los resultados y los mostramos por pantalla
        //la función substr devuelve parte de una cadena. A partir del segundo parámetro (aquí 0) devuelve tantos carácteres como el tercer parámetro (aquí 25)
        while ($prod = mysqli_fetch_array($datos)){
          
          
         echo "<td>";

          echo "<a href='administradorver.php?id=$prod[id_usuario]'>$prod[email]</a>";
          echo "</td><td>" . substr($prod['password'], 0, 25) . "</td><td>$prod[rol]</td><td>$prod[usuario_actiu]</td><td>";
          
          //enlace a la página que modifica el producto pasándole la id (clave primaria)
          if($prod['usuario_actiu']==1){
            
            echo  "<a href='administradormodificar.php?id=$prod[id_usuario]'><i class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar'></i></a>";
          }


          //enlace a la página que elimina el producto pasándole la id (clave primaria)
          if($prod['usuario_actiu']==1){
            echo "<a href='administradoreliminar.php?id=$prod[id_usuario]'><i class='fa fa-trash fa-2x fa-pull-left fa-border' title='borrar'></i></a>";
          }

          //enlace a la página que modifica el producto (poniendo el campo pro_actiu a 0 o a 1, lo activa o lo desactiva) pasándole la id (clave primaria)
          if($prod['usuario_actiu']==1){
            echo "<a href='administradoractivar_desactivar.proc.php?id=$prod[id_usuario]'><i class='fa fa-eye-slash fa-2x fa-pull-left fa-border' title='desactivar'></i></a>";
          } else {
            echo "</td><td><a href='administradoractivar_desactivar.proc.php?id=$prod[id_usuario]'><i class='fa fa-eye fa-2x fa-pull-left fa-border' title='activar'></i></a>";
          }

          echo "</a></td></tr>";
        }

        ?>

      </table>

      <a href="administradorinsertar.php"><i class='fa fa-plus-square fa-2x fa-pull-left fa-border'></i></a>

        


        <?php
      //cerramos la conexión con la base de datos
      mysqli_close($con);
    ?>
  </body>
</html>