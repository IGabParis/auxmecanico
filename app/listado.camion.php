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
				<h4>Camiones</h4>
			</center>
			<a href="agregar.camion.php" class="btn btn-info">Agregar Camión</a>
			<hr>
			<?php 
			include '../model/camiones.class.php';
			$objeto = new Camiones;
			$consulta = $objeto->listar();
			if ($consulta){
			 ?>
			
			<table class="table table-stripped table-responsive">
				<thead>
					<th>Placa</th>
					<th>Tipo de Camión</th>
					<th>Pedidos</th>
				</thead>
				<tbody>
				<?php while ($atributo = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
				<tr>
					<td><?php echo $atributo['placa']; ?></td>
					<td><?php
					if ($atributo['tipo'] == '2'){
						echo 'Mini Grúa';
					}  else if ($atributo['tipo'] == '1') {
						echo 'Mini Taller';
					} else if ($atributo['tipo'] == '3'){
						echo 'Gran Grúa';
					} else {
						echo 'Gran Grua con taller';
					} ?></td>
					<?php 
					$consulta2 = $objeto->listar_pedidos($atributo['id']);
					$atributo2 = mysqli_fetch_array($consulta2, MYSQLI_ASSOC);
					?>
					<td><?php echo $atributo2['cantidad']; ?></td>
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