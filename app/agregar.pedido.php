<?php 
  session_start();
  if (isset($_SESSION["usuario"])){
  if($_SESSION['tipo'] == '2') {

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
		<div class="container">
			<center class="title">
				<h3>Auxilio Mecánico</h3>
				<h4>Agregar Pedido</h4>
			</center>
			<form class="form" action="insertar.pedido.php" method="post">
				<div class="form-group">
				<label>Lugar</label>
				<input type="text" name="lugar" class="form-control">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				</div>
				<div class="form-group">
				<label>Tipo de Reparación</label>
				<select name="reparacion" class="form-control">
					<option value="1">Simple</option>
					<option value="2">Compleja</option>
				</select>
				</div>
				<div class="form-group">
				<label>¿Requiere remolque?</label>
				<select name="remolque" class="form-control">
					<option value="1">Si</option>
					<option value="2">No</option>
				</select>
				</div>
				<div class="form-group">
				<label>Peso Aproximado</label>
				<select name="peso" class="form-control">
					<option value="1">Menos de 3 Toneladas</option>
					<option value="2">Más de 3 Toneladas</option>
				</select>
				</div>
				<div class="form-group">
				<label>Describa problema</label>
				<input type="text" name="descripcion" class="form-control">
				</div>
				<div class="form-group">
				<label>Tipo de Plan</label>
				<?php 
				include '../model/pedidos.class.php';
				$objeto = new Pedidos;
				$consulta = $objeto->listar_membresia($id);
				if(mysqli_num_rows($consulta)>0 ) {
					while ($atributo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
				 ?>
				<input type="text" name="servicio" class="form-control" value="<?php
				if ($atributo['valor'] == '1') {
					echo 'Economic';
				} else if ($atributo['valor'] == '2') {
					echo 'Clasic';
				} else if ($atributo['valor'] == '3') {
					echo 'Platinum';
				} ?>">
				<?php }
				} else { ?>
				<select name="servicio" class="form-control">
					<option value="1">Economic (200$ - Hasta 5 reparaciones al año sin remolques ni reparaciones complejas.)</option>
					<option value="2">Classic (350$ - Reparaciones ilimitadas y hasta 5 remolques al año.)</option>
					<option value="3">Platinum (600$ - Permite una ilimitada cantidad de servicios.)</option>
				</select>
				<?php } ?>
				</div>
				<div class="form-group">
				<input type="submit" name="submit" value="Enviar" class="btn btn-primary">
				</div>
			</form>
			<div class="cerrar">
				<a href="cerrar.sesion.php" class="btn btn-warning">Cerrar Sesión</a>
			</div>
		</div>
	</div>
<script type="text/javascript" src="../view/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
  } else {
      echo '<script language="javascript">alert("Usted no tiene accesos a ésta página, usted no est administrador");</script>
        <script language="javascript">window.location="../login.php"</script>';
  }
  } else {
      echo '<script language="javascript">alert("Usted no tiene accesos a ésta página");</script>
        <script language="javascript">window.location="../login.php"</script>';
  } 
?>