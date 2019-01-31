<?php 

  include '../model/usuario.class.php';

  $mora = $_POST['mora'];
  $id = $_POST['id'];

  $objeto = new Usuarios;

      if ($objeto->cambiar_mora(array($mora,$id))) {
        echo '
                <script language="javascript">alert("Mora de usuario editada");</script>
                <script language="javascript">window.location="listado.usuarios.php"</script>';
      } else {
        echo '
                 <script language="javascript">alert("No se puede registrar el cambio");</script>
                <script language="javascript">window.location="listado.usuarios.php"</script>';
      }

 ?>