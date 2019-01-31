
<?php

  include '../model/pedidos.class.php';
  include '../model/usuario.class.php';
  include '../model/camiones.class.php';

  $id = $_POST['id'];
  $lugar = $_POST['lugar'];
  $reparacion = $_POST['reparacion'];
  $remolque = $_POST['remolque'];
  $descripcion = $_POST['descripcion'];
  $servicio = $_POST['servicio'];
  $peso = $_POST['peso'];
  $mora = 0;
  $minitaller= '';
  $remol_t = '';
  $repa_t = '';
  $plaquita = '';

  $objeto = new Pedidos;
  $usuario = new Usuarios;
  $camion = new Camiones;

  $user = $usuario->listar_usuario_id($id);
    while ($usr = mysqli_fetch_array($user, MYSQLI_ASSOC)){
      $mora = $usr['mora'];
      $reparaciones = $usr['reparaciones'];
      $remolques = $usr['remolques'];
    }
        
  if ($servicio == '1'){
    if ($mora > '1'){
     echo '<script language="javascript">alert("No se puede registrar el pedido, usted tiene una mora superior a 200 y un plan Economic.");</script>
           <script language="javascript">window.location="agregar.pedido.php"</script>';
    } else if ($reparacion == '2' || $remolque == '1'){
      echo '<script language="javascript">alert("No se puede registrar el pedido, usted ha solicitado un servicio que no entra dentro de los parámetros del Plan Economic (Reparación ompleja o Remolque)");</script>
        <script language="javascript">window.location="agregar.pedido.php"</script>';
    } else if ($reparaciones >= 5) {
      echo '<script language="javascript">alert("No se puede registrar el pedido, ya cumplió con la cantidad de reparaciones disponibles para el Plan Economic (5)");</script>
        <script language="javascript">window.location="agregar.pedido.php"</script>';
    } else if ($mora == '0'  && $reparacion == '1' && $remolque == '2' && $peso >= '1' && $reparaciones < 5) {
      $camn = $camion->listar_minitaller('1');
      $cmn = mysqli_fetch_array($camn, MYSQLI_ASSOC);
      $minitaller = $cmn['id'];
      $plaquita = $cmn['placa'];
      $remo_t = $remolques + 0;
      $repa_t = $reparaciones + 1;
      $membresia_con = $objeto->listar_membresia($id);
      if(mysqli_num_rows($membresia_con)>0) {
        $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
        $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
        echo '<script language="javascript">alert("Pedido registrado, por favor espere el MiniTaller Placa '.$plaquita.' para atender su pedido.");</script>
          <script language="javascript">window.location="../index.php"</script>';
      } else {
        $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
        $objeto->insertar_membresia(array($id,$servicio));
        $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
        echo '<script language="javascript">alert("Pedido registrado, por favor espere el MiniTaller Placa '.$plaquita.' para atender su pedido.");</script>
          <script language="javascript">window.location="../index.php"</script>';
      }
    } 
  } else if ($servicio == '2'){
    if ($mora > '200'){
     echo '<script language="javascript">alert("No se puede registrar el pedido, usted tiene una mora superior a 200 y un plan Classic.");</script>
      <script language="javascript">window.location="agregar.pedido.php"</script>';
    } else if ($remolques >= 5){
      echo '<script language="javascript">alert("No se puede registrar el pedido, ya cumplió con la cantidad de remolques disponibles para el Plan Classic (5)");</script>
        <script language="javascript">window.location="agregar.pedido.php"</script>';
    } else if ($mora <= '200'  && $reparacion == '1' && $remolque == '2' && $peso >= '1' && $remolques < 5){
      $camn = $camion->listar_minitaller('1');
      $cmn = mysqli_fetch_array($camn, MYSQLI_ASSOC);
      $minitaller = $cmn['id'];
      $plaquita = $cmn['placa'];
      $remo_t = $remolques + 1;
      $repa_t = $reparaciones + 1;
      $membresia_con = $objeto->listar_membresia($id);
      if(mysqli_num_rows($membresia_con)>0) {
        $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
        $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
        echo '<script language="javascript">alert("Pedido registrado, por favor espere el MiniTaller Placa '.$plaquita.' para atender su pedido.");</script>
          <script language="javascript">window.location="../index.php"</script>';
      } else {
        $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
        $objeto->insertar_membresia(array($id,$servicio));
        $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
        echo '<script language="javascript">alert("Pedido registrado, por favor espere el MiniTaller Placa '.$plaquita.' para atender su pedido.");</script>
          <script language="javascript">window.location="../index.php"</script>';
      }
      } else if ($mora <= '200'  && $reparacion == '2' && $remolque == '2' && $peso >= '1' && $remolques < 5) {
        $camn = $camion->listar_minitaller('4');
        $cmn = mysqli_fetch_array($camn, MYSQLI_ASSOC);
        $minitaller = $cmn['id'];
        $plaquita = $cmn['placa'];
        $remo_t = $remolques + 1;
        $repa_t = $reparaciones + 1;
        $membresia_con = $objeto->listar_membresia($id);
        if(mysqli_num_rows($membresia_con)>0) {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Grua con Taller Placa '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
        } else {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar_membresia(array($id,$servicio));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Grua Con Taller Placa '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
      }
      } else if ($mora <= '200'  && $reparacion == '1' && $remolque == '1' && $peso == '1' && $remolques < 5) {
        $camn = $camion->listar_minitaller('2');
        $cmn = mysqli_fetch_array($camn, MYSQLI_ASSOC);
        $minitaller = $cmn['id'];
        $plaquita = $cmn['placa'];
        $remo_t = $remolques + 0;
        $repa_t = $reparaciones + 1;
        $membresia_con = $objeto->listar_membresia($id);
        if(mysqli_num_rows($membresia_con)>0) {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Mini Grua '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
        } else {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar_membresia(array($id,$servicio));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Mini Grua Placa '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
      }
    } else if ($mora <= '200'  && $reparacion == '2' && $remolque == '1' && $peso >= '1' && $remolques < 5){
        $camn = $camion->listar_minitaller('4');
        $cmn = mysqli_fetch_array($camn, MYSQLI_ASSOC);
        $minitaller = $cmn['id'];
        $plaquita = $cmn['placa'];
        $remo_t = $remolques + 0;
        $repa_t = $reparaciones + 1;
        $membresia_con = $objeto->listar_membresia($id);
        if(mysqli_num_rows($membresia_con)>0) {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Gran Grua con Taller '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
        } else {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar_membresia(array($id,$servicio));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Gran Grua con Taller Placa '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
      }
    } 

  } else if ($servicio == '3'){
    if ($reparacion == '1' && $remolque == '2' && $peso >= '1' ){
      $camn = $camion->listar_minitaller('1');
      $cmn = mysqli_fetch_array($camn, MYSQLI_ASSOC);
      $minitaller = $cmn['id'];
      $plaquita = $cmn['placa'];
      $remo_t = $remolques + 1;
      $repa_t = $reparaciones + 1;
      $membresia_con = $objeto->listar_membresia($id);
      if(mysqli_num_rows($membresia_con)>0) {
        $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
        $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
        echo '<script language="javascript">alert("Pedido registrado, por favor espere el MiniTaller Placa '.$plaquita.' para atender su pedido.");</script>
         <script language="javascript">window.location="../index.php"</script>';
      } else {
        $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
        $objeto->insertar_membresia(array($id,$servicio));
        $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
        echo '<script language="javascript">alert("Pedido registrado, por favor espere el MiniTaller Placa '.$plaquita.' para atender su pedido.");</script>
          <script language="javascript">window.location="../index.php"</script>';
      }
      } else if ($reparacion == '2' && $remolque == '2' && $peso >= '1') {
        $camn = $camion->listar_minitaller('4');
        $cmn = mysqli_fetch_array($camn, MYSQLI_ASSOC);
        $minitaller = $cmn['id'];
        $plaquita = $cmn['placa'];
        $remo_t = $remolques + 1;
        $repa_t = $reparaciones + 1;
        $membresia_con = $objeto->listar_membresia($id);
        if(mysqli_num_rows($membresia_con)>0) {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Grua con Taller Placa '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
        } else {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar_membresia(array($id,$servicio));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Grua Con Taller Placa '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
      }
      } else if ($reparacion == '1' && $remolque == '1' && $peso == '1') {
        $camn = $camion->listar_minitaller('2');
        $cmn = mysqli_fetch_array($camn, MYSQLI_ASSOC);
        $minitaller = $cmn['id'];
        $plaquita = $cmn['placa'];
        $remo_t = $remolques + 0;
        $repa_t = $reparaciones + 1;
        $membresia_con = $objeto->listar_membresia($id);
        if(mysqli_num_rows($membresia_con)>0) {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Mini Grua '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
        } else {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar_membresia(array($id,$servicio));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Mini Grua Placa '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
      }
    } else if ($reparacion == '1' && $remolque == '1' && $peso == '2') {
        $camn = $camion->listar_minitaller('3');
        $cmn = mysqli_fetch_array($camn, MYSQLI_ASSOC);
        $minitaller = $cmn['id'];
        $plaquita = $cmn['placa'];
        $remo_t = $remolques + 0;
        $repa_t = $reparaciones + 1;
        $membresia_con = $objeto->listar_membresia($id);
        if(mysqli_num_rows($membresia_con)>0) {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Gran Grua '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
        } else {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar_membresia(array($id,$servicio));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Gran Grua Placa '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
      }
      } else if ($reparacion == '2' && $remolque == '1' && $peso >= '1'){
        $camn = $camion->listar_minitaller('4');
        $cmn = mysqli_fetch_array($camn, MYSQLI_ASSOC);
        $minitaller = $cmn['id'];
        $plaquita = $cmn['placa'];
        $remo_t = $remolques + 0;
        $repa_t = $reparaciones + 1;
        $membresia_con = $objeto->listar_membresia($id);
        if(mysqli_num_rows($membresia_con)>0) {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Gran Grua con Taller '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
        } else {
          $usuario->cambiar_re_usuarios(array($remo_t, $repa_t,$mora, $id));
          $objeto->insertar_membresia(array($id,$servicio));
          $objeto->insertar(array($id,$lugar,$descripcion,$reparacion,$remolque,$peso,1,$minitaller, $remo_t, $repa_t));
          echo '<script language="javascript">alert("Pedido registrado, por favor espere el Gran Grua con Taller Placa '.$plaquita.' para atender su pedido.");</script>
            <script language="javascript">window.location="../index.php"</script>';
      }
    }
} 


?>
  