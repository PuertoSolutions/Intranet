<?php
	require_once('../Auxiliares/Parametros.php');
	require_once('../Auxiliares/MongoHandler.php');
	
	class Usuario{
		private $m;
		public $error = NULL;
		
		public function __construct(){
			$this -> m = new MongoHandler();
			if($this -> m -> conectar(TRUE)){
				$this -> m -> setDatabase(Parametros::$BDmongo);
				$this -> m -> setCollection("Usuarios");				
			}else{
				$this -> error = $this -> m -> error;
			}
		}
		
		public function getUsuarios(){
			return $this -> m -> getAll();
		}
		
		public function getusuario($id, $login = false){
			if($login){
				return $this -> m -> get(array("Nick" => $id));
			}else{
				return $this -> m -> get(array("_id" => new MongoId($id)));
			}			
		}
		
		public function setUsuario($valores){
			$resp = $this -> m -> insert($valores);
			$this -> m -> ensureIndex(array("Nick" => 1), array("unique" => true));
			return $resp;
		}
		
		public function delUsuario($id){
			return $this -> m -> delete(array("_id" => new MongoId($id)));
		}
		
		public function updUsuario($valores, $id){
			return $this -> m -> update(array("_id" => new MongoId($id)), $valor);
		}
	}
?>