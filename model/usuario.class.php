<?php

include_once("../conexion.php");

class Usuarios{
    //constructor
 	var $conex;
 	function Usuarios(){
 		$this->conex=new Conectar;	
 	}
    
	function validar($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario WHERE usuario='".$campos[0]."' AND contrasenia='".$campos[1]."';");
		}
	}
    
    function insertar($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO usuario (tipo,nombre,apellido,usuario,contrasenia,mora) 
			VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."');");
		}
	}
    
    function listar($tipo){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario WHERE tipo='".$tipo."' ORDER BY id DESC;");
		}
	}

	function listar_usuario(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT A.*, B.valor FROM usuario A INNER JOIN membresia B ON A.id = B.id_usuario ORDER BY id DESC;");
		}
	}

	function listar_usuario_admin($us){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario WHERE tipo = '".$us."';");
		}
	}

	function listar_us($us){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT usuario FROM usuario WHERE usuario = '".$us."';");
		}
	}
    
    function buscar($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario WHERE id='".$id."';");
		}
	}

	function listar_usuario_id($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario WHERE id='".$id."';");
		}
	}

	function cambiar_re_usuarios($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE usuario SET 
				remolques = '".$campos[0]."',
				reparaciones = '".$campos[1]."',
				mora = '".$campos[2]."'
				WHERE id = '".$campos[3]."' ;");
		}
	}
	function cambiar_mora($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE usuario SET 
				mora = '".$campos[0]."'
				WHERE id = '".$campos[1]."' ;");
		}
	}

	function eliminar($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "DELETE FROM usuario WHERE id='$id';");
		}
	}
    
}

?>