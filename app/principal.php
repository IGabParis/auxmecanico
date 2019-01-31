<?php 
  session_start();
  if (isset($_SESSION["usuario"])){
  if($_SESSION['tipo'] == '1') { ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Auxilio Mecánico</title>
	<link rel="stylesheet" type="text/css" href="../view/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="content">
			<center class="title">
				<h3>Auxilio Mecánico</h3>
				<h4>Menú Principal</h4>
			</center>
			<ul style="list-style: none; display: inline-block; margin-bottom: 0 auto; padding: 10px 10px;">
				<li><a href="listado.pedidos.php">Pedidos</a></li>
				<li><a href="listado.camion.php">Camiones</a></li>
				<li><a href="listado.usuarios.php">Usuarios</a></li>
			</ul>
		</div>
		<div class="cerrar">
			<a href="cerrar.sesion.php" class="btn btn-info">Cerrar Sesión</a>
		</div>
	</div>
<script type="text/javascript" src="../view/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
  } else {
      echo '<script language="javascript">alert("Usted no tiene accesos a ésta página, usted no est administrador");</script>
        <script language="javascript">window.location="../index.php"</script>';
  }
  } else {
      echo '<script language="javascript">alert("Usted no tiene accesos a ésta página");</script>
        <script language="javascript">window.location="../index.php"</script>';
  } 
?>