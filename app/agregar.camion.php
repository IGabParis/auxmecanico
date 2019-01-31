<?php 
  session_start(); 
  if (isset($_SESSION["usuario"])){
  if($_SESSION['tipo'] == '1') {

  $id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Auxilio Mecánico</title>
	<link rel="stylesheet" type="text/css" href="../view/css/bootstrap.min.css">
</head>
<body>
	<div class="wrap">
		<div class="content">
			<div class="title">
				<h2>Auxilio Mecánico Agregar Camion</h2>
			</div>
			<form class="formulario" action="insertar.camion.php" method="post">
				<div class="form-group col-md-6">
				<label>Placa</label>
				<input type="text" name="placa" class="form-control">
				</div>
				<div class="form-group col-md-6">
				<label>Tipo de Camión</label>
				<select name="tipo" class="form-control">
					<option value="1">Minitaller Movil</option>
					<option value="2">Minigrúa</option>
					<option value="3">Gran Grua</option>
					<option value="4">Gran Grua con Taller</option>
				</select>
				</div>
				<input type="submit" name="submit" class="btn btn-primary" value="Registrar">
			</form>
		</div>
	</div>
<script type="text/javascript" src="../view/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
  } else {
      echo '<script language="javascript">alert("Usted no tiene accesos a ésta página, usted no est administrador");</script>
        <script language="javascript">window.location="principal.php"</script>';
  }
  } else {
      echo '<script language="javascript">alert("Usted no tiene accesos a ésta página");</script>
        <script language="javascript">window.location="principal.php"</script>';
  } 
?>