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
	<div class="container">
		<div class="content">
			<center class="title">
				<h3>Auxilio Mecánico</h3>
				<h4>Pedidos</h4>
			</center>
			<hr>
			<?php 
			include '../model/pedidos.class.php';
			$objeto = new Pedidos;
			$consulta = $objeto->listar();
			if ($consulta){
			 ?>
			
			<table class="table table-stripped table-responsive">
				<thead>
					<th>Usuario</th>
					<th>Lugar</th>
					<th>Camión Asignado</th>
					<th>Remolque</th>
					<th>Reparación</th>
					<th>Peso</th>
					<th>Estado</th>
					<th>Acciones</th>
				</thead>
				<tbody>
				<?php while ($atributo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
				<tr>
					<td><?php echo $atributo['nombre'].' '.$atributo['apellido']; ?></td>
					<td><?php echo $atributo['lugar']; ?></td>
					<td><?php echo $atributo['placa']; ?></td>
					<td><?php if ($atributo['remolque'] == '1') {
						echo 'Si';
					} else if ($atributo['remolque'] == '2') {
						echo 'No';
					} ?></td>
					<td><?php if ($atributo['dificultad'] == '1') {
						echo 'Simple';
					} else if ($atributo['dificultad'] == '2') {
						echo 'Compleja';
					} ?></td>
					<td><?php if ($atributo['peso'] == '1') {
						echo 'Menos de 3T';
					} else if ($atributo['peso'] == '2') {
						echo 'Mas de 3T';
					} ?></td>
					<td><?php if ($atributo['estado'] == '1') {
						echo 'Pendiente';
					} else if ($atributo['estado'] == '2') {
						echo 'Completado';
					} else if ($atributo['estado'] == '3')
					{
						echo 'Cancelado';
					}?></td>
					<td class="col-md-3">
						<form class="form" action="confirmar.estado.pedido.php" method="post">
							<div class="form-group col-md-7">
							<select name="estado" class="form-control">
								<option value="1">Pendiente</option>
								<option value="2">Completado</option>
								<option value="3">Cancelado</option>
							</select>
							</div>
							<div class="form-group col-md-4">
							<input type="hidden" name="id" value="<?php echo $atributo['id']; ?>">
							<input type="submit" name="submit" value="Editar Estado" class="btn btn-success">
							</div>
						</form>
					</td> 
				</tr>
				<?php } ?>
			</tbody>
			</table>
			<?php } ?>
		</div>
				<div class="cerrar">
			<a href="principal.php" class="btn btn-info">Regresar</a>
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