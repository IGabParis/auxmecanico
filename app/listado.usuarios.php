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
				<h4>Usuarios</h4>
			</center>
			<a href="agregar.usuario.php" class="btn btn-info">Agregar Usuario</a>
			<hr>
			<?php 
			include '../model/usuario.class.php';
			$objeto = new Usuarios;
			$consulta = $objeto->listar_usuario();
			if ($consulta){
			 ?>
			
			<table class="table table-stripped table-responsive">
				<thead>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Tipo de Usuario</th>
					<th>Mora ($)</th>
					<th>Membresia</th>
					<th>Acción</th>
				</thead>
				<tbody>
				<?php while ($atributo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
				<tr>
					<td><?php echo $atributo['usuario']; ?></td>
					<td><?php echo $atributo['nombre'].' '.$atributo['apellido']; ?></td>
					<td><?php if ($atributo['tipo'] == '1'){
						echo 'Administrador';
					} else {
						echo 'Usuario';
					} ?></td>
					<td><?php if ($atributo['tipo'] == '1') {
						echo 'No aplica';
					} else {
						echo $atributo['mora'];
					}?></td>
					<td><?php echo $atributo['valor']; ?></td>
					<td><a href="editar.mora.php?id=<?php echo $atributo['id'] ?>" class="label label-primary">Editar Mora de Usuario</a></td>
				</tr>
				<?php } ?>
			</tbody>
			</table>
			<?php } ?>
			<hr>
			<?php 
			$consulta2 = $objeto->listar_usuario_admin('1');
			if ($consulta2){
			 ?>
			
			<table class="table table-stripped table-responsive">
				<thead>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Tipo de Usuario</th>
				</thead>
				<tbody>
				<?php while ($atributo2 = mysqli_fetch_array($consulta2, MYSQLI_ASSOC)){ ?>
				<tr>
					<td><?php echo $atributo2['usuario']; ?></td>
					<td><?php echo $atributo2['nombre'].' '.$atributo2['apellido']; ?></td>
					<td><?php if ($atributo2['tipo'] == '1'){
						echo 'Administrador';
					} else {
						echo 'Usuario';
					} ?></td>
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