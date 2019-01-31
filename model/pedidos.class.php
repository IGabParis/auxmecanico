<?php

include_once("../conexion.php");

class Pedidos{
    //constructor
 	var $conex;
 	function Pedidos(){
 		$this->conex=new Conectar;	
 	}
    
    function insertar($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO pedido (id_usuario, lugar, descripcion, dificultad, remolque, peso, estado, id_camion) 
			VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."','".$campos[6]."', '".$campos[7]."');");
		}
	}

	function insertar_membresia($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO membresia (id_usuario, valor) 
			VALUES ('".$campos[0]."','".$campos[1]."');");
		}
	}
    
    function listar(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT A.*, B.nombre, B.apellido, C.placa, C.tipo FROM pedido A 
				INNER JOIN usuario B on A.id_usuario = B.id
				INNER JOIN camion C on A.id_camion = c.id ORDER BY A.id DESC;");
		}
	}

	function listar_membresia($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM membresia WHERE id_usuario='".$id."';");
		}
	}
    
    function buscar($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario WHERE id='".$id."';");
		}
	}

	function cambiar_estado($campos){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "UPDATE pedido SET 
				estado = '".$campos[0]."'
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