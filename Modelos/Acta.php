<?php
	require_once('../Auxiliares/Parametros.php');
	require_once('../Auxiliares/MongoHandler.php');
	
	class Acta{
		private $m;
		public $error;
		
		public function __construct(){
			$this -> m = new MongoHandler();
			if($this -> m -> conectar(TRUE)){
				$this -> m -> setDatabase(Parametros::$BDmongo);
				$this -> m -> setCollection("Actas");				
			}else{
				$this -> error = $this -> m -> error;
			}
		}
		
		public function getActas(){
			return $this -> m -> getAll();
		}
		
		public function getActa($id){
			require_once('Usuario.php');
			$u = new Usuario();
			$actas = $this -> m -> get(array("_id" => new MongoId($id)));
			$asistentes = array();
			foreach ($actas[0]['Asistentes'] as $value) {
				$nick = $u -> getUsuario($value);				
				array_push($asistentes, (count($nick) == 0) ? "" : $nick[0]['Nick']);
			}
			$actas[0]['Asistentes'] = $asistentes;
			return $actas;
		}
		
		public function setActa($valores){
			$resp = $this -> m -> insert($valores);
			return $resp;
		}
		
		public function delActa($id){
			return $this -> m -> delete(array("_id" => new MongoId($id)));
		}
		
		public function updActa($valores, $id){
			return $this -> m -> update(array("_id" => new MongoId($id)), $valores);
		}
	}
?>