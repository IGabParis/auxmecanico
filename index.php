<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Auxilio Mecánico</title>
	<link rel="stylesheet" type="text/css" href="./view/css/bootstrap.min.css">
</head>
<body>
	<div class="main">
		<center class="title">
			<h3>Auxilio Mecánico</h3>
		</center>
		<div class="container">
			<div class="link col-md-12">
				<a href="./app/agregar.usuario.php" class="permlink btn btn-info">Registrarse</a>
			</div>
			<hr>
			<form class="form" action="./app/autenticar.php" method="post">
				<div class="form-group col-md-6">
				<label>Usuario</label>
				<input type="text" name="usuario" required class="form-control ">
				</div>
				<div class="form-group col-md-6">
				<label>Clave</label>
				<input type="password" name="clave" required class="form-control col-md-6">
				</div>
				<div class="form-group col-md-6">
				<input type="submit" name="submit" value="Ingresar" class="btn btn-primary">
				</div>
				</div>
			</form>
		</div>
	</div>
<script type="text/javascript" src="./view/js/bootstrap.min.js"></script>
</body>
</html>