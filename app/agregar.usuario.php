<?php 
  session_start(); 
?>

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
			<center class="title col-md-12">
				<h3>Auxilio Mecánico</h3>
				<h4>Agregar Usuario</h4>
			</center>
			<form class="form" action="insertar.usuario.php" method="post">
				<div class="form-group">
				<label>Nombre</label>
				<input type="text" name="nombre" class="form-control">
				</div>
				<div class="form-group">
				<label>Apellido</label>
				<input type="text" name="apellido" class="form-control">
				</div>
				<div class="form-group">
				<label>Usuario</label>
				<input type="text" name="usuario" class="form-control">
				</div>
				<div class="form-group">
				<label>Tipo de Usuario</label>
				<select name="tipo" class="form-control">
					<?php if ($_SESSION['tipo'] == '1') { ?>
					<option value="1">Administrador</option>
					<option value="2">Usuario</option>
					<?php } else { ?>
					<option value="2">Usuario</option>
					<?php } ?>
				</select>
				</div>
				<div class="form-group">
				<label>Clave</label>
				<input type="password" name="clave" class="form-control">
				</div>
				<div class="form-group">
				<input type="submit" name="submit" value="Registrar" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
<script type="text/javascript" src="../view/js/bootstrap.min.js"></script>
</body>
</html>
