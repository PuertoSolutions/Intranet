<?php
	require_once('../Auxiliares/Parametros.php');
	require_once('../Auxiliares/MongoHandler.php');
	
	class Cliente{
		private $m;
		public $error = NULL;
		
		public function __construct(){
			$this -> m = new MongoHandler();
			if($this -> m -> conectar(TRUE)){
				$this -> m -> setDatabase(Parametros::$BDmongo);
				$this -> m -> setCollection("Clientes");				
			}else{
				$this -> error = $this -> m -> error;
			}
		}
		
		public function getClientes(){
			return $this -> m -> getAll();
		}
		
		public function getCliente($id){
			return $this -> m -> get(array("_id" => new MongoId($id)));			
		}
		
		public function setCliente($valores){
			$resp = $this -> m -> insert($valores);
			$this -> m -> ensureIndex(array("Cliente" => 1), array("unique" => true));
			return $resp;
		}
		
		public function delCliente($id){
			return $this -> m -> delete(array("_id" => new MongoId($id)));
		}
		
		public function updCliente($valores, $id){
			return $this -> m -> update(array("_id" => new MongoId($id)), $valores);
		}
	}
?>