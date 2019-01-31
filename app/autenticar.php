<?php

include("../model/usuario.class.php");

$login=trim($_POST['usuario']); //carga la variable que contiene el valor nombre de usuario del administrador
$contrasena=trim($_POST['clave']); //carga la variable que contiene el valor clave del administrador

$objeto=new Usuarios;
$consulta=$objeto->validar(array($login,$contrasena));

if($consulta) {

    if ($atributo=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
            
            session_start();
            $_SESSION['usuario'] = $login;
            $_SESSION['tipo'] = $atributo['tipo'];
            $_SESSION['id'] = $atributo['id'];
            if ($_SESSION['tipo'] == '1'){
                print "<script language='JavaScript'>window.location = './principal.php'</script>";
            } else if ($_SESSION['tipo'] == '2'){
                print "<script language='JavaScript'>window.location = './agregar.pedido.php'</script>";
            }

     }else{    
        echo '<script language="javascript">alert("Disculpe, no coinciden los datos con los que se encuentran en la base de datos.")</script>
            <script language="javascript">window.location="../index.php"</script>';
    }

}

else{
    echo '<script language="javascript">alert("Disculpe, no coinciden los datos con los que se encuentran en la base de datos.")</script>
            <script language="javascript">window.location="../index.php"</script>';
}

?>