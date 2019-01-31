
<?php 
    session_start(); 
  if (isset($_SESSION["usuario"])){
  if($_SESSION['tipo'] == '1') {

  $id = $_SESSION['id'];
  include("../model/usuario.class.php");
  $id=$_REQUEST['id'];
  $objeto=new Usuarios;
  $consulta=$objeto->buscar($id);
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
      <center class="title">
        <h4>Auxilio Mecánico - Editar Mora</h4>
      </center>
      <?php 
       while ($atributo=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
      <form class="formulario" action="confirmar.mora.php" method="post">
        <div class="form-group col-md-6">
        <label>Usuario</label>
        <input type="text" name="usuario" class="form-control" value="<?php echo $atributo['usuario']; ?>">
        <input type="hidden" name="id" class="form-control" value="<?php echo $atributo['id']; ?>">
        </div>
        <label>Mora</label>
        <div class="form-group col-md-6">
          <input type="number" name="mora" class="form-control" value="<?php echo $atributo['mora']; ?>">
        </div>
        <div class="form-group col-md-6">
        <input type="submit" name="submit" class="btn btn-primary" value="Editar">
        </div>
      </form>
      <?php 
          }
      ?>
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