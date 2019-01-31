<?php 

  include '../model/pedidos.class.php';

  $estado = $_POST['estado'];
  $id = $_POST['id'];

  $objeto = new Pedidos;

      if ($objeto->cambiar_estado(array($estado,$id))) {
        echo '
                <script language="javascript">alert("Estado editado");</script>
                <script language="javascript">window.location="listado.pedidos.php"</script>';
      } else {
        echo '
                 <script language="javascript">alert("No se puede registrar el cambio");</script>
                <script language="javascript">window.location="listado.pedidos.php"</script>';
      }

 ?>