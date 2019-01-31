<?php

include_once("../conexion.php");

class Camiones{
    //constructor
 	var $conex;
 	function Camiones(){
 		$this->conex=new Conectar;	
 	}
    
    function insertar($campos){
		if($this->conex->con()==true){
			return mysqli_query($this->conex->con(), "INSERT INTO camion (placa,tipo) 
			VALUES ('".$campos[0]."','".$campos[1]."');");
		}
	}
    
    function listar(){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM camion ORDER BY id DESC;");
		}
	}

	function listar_pl($us){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT placa FROM camion WHERE placa = '".$us."';");
		}
	}

	function listar_pedidos($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT COUNT(id_camion) AS cantidad FROM pedido WHERE id_camion = '".$id."' AND estado = '1' ;");
		}
	}

	function listar_minitaller($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM camion WHERE tipo = '".$id."';");
		}
	}
    
    function buscar($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "SELECT * FROM usuario WHERE id='".$id."';");
		}
	}

	function eliminar($id){
		if($this->conex->con()==true) {
			return mysqli_query($this->conex->con(), "DELETE FROM usuario WHERE id='$id';");
		}
	}
    
}

?>