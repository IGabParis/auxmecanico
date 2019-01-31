
<?php

  include '../model/usuario.class.php';

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $usuario = $_POST['usuario'];
  $tipo = $_POST['tipo'];
  $clave = $_POST['clave'];

  $objeto = new Usuarios;

  $con_usuario = $objeto->listar_us($usuario);
  if(mysqli_num_rows($con_usuario)>0) {
    echo '
    <script language="javascript">alert("El usuario ya se encuentra en la base de datos");</script>
    <script language="javascript">window.location="agregar.usuario.php"</script>';
  } else{
      if ($objeto->insertar(array($tipo, $nombre, $apellido, $usuario,$clave,0))) {
        echo '
                 <script language="javascript">alert("Usuario registrado, puede ingresar a nuestro sistema");</script>
                <script language="javascript">window.location="../index.php"</script>';
      } else {
        echo '
                 <script language="javascript">alert("No se puede registrar el usuario");</script>
                <script language="javascript">window.location="agregar.usuario.php"</script>';
      }
    } 


?>
  