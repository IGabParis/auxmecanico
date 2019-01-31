
<?php

  include '../model/camiones.class.php';

  $placa = $_POST['placa'];
  $tipo = $_POST['tipo'];

  $objeto = new Camiones;

  $con_usuario = $objeto->listar_pl($placa);
  if(mysqli_num_rows($con_usuario)>0) {
    echo '
    <script language="javascript">alert("El camión ya se encuentra en la base de datos");</script>
    <script language="javascript">window.location="agregar.camion.php"</script>';
  } else{
      if ($objeto->insertar(array($placa,$tipo))) {
        echo '
                 <script language="javascript">alert("Camion registrado");</script>
                <script language="javascript">window.location="principal.php"</script>';
      } else {
        echo '
                 <script language="javascript">alert("No se puede registrar el camion");</script>
                <script language="javascript">window.location="agregar.camoin.php"</script>';
      }
    } 


?>
  