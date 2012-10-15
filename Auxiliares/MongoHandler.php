<?php
	class MongoHandler	{
	
		public $connection;
		public $db;
		public $collection;
		public $error;
	
		public function conectar($tipo = FALSE){
			$estado = FALSE;
			try{
				$uri = ($tipo) ? 
					"mongodb://".Parametros::$UserMongo.":".Parametros::$Passmongo."@".Parametros::$HostMongo.":".Parametros::$PuertoMongo
				 : "mongodb://localhost";
				$this -> connection = new Mongo($uri, array("persist" => "x"));
				$estado = TRUE;
			}catch(MongoConnectionException $e){
				$this -> error = $e;
			}catch(MongoException $e){
				$this -> error = $e;
			}catch(Exception $e){
				$this -> error = $e;
			}
			return $estado;
		}
	
		public function setDatabase($c)
		{
			$this->db = $this->connection->selectDB($c);
		}
	
		public function setCollection($c)
		{
			$this->collection = $this->db->selectCollection($c);
		}
	
		public function insert($f)
		{
			try{
				$this->collection->insert($f);
				return $this -> collection ." agregado con _ID: ". $f['_id'];
			}catch(MongoException $e){
				return "Error: ". $e;
			}
		}
	
		public function get($f)
		{
			$cursor = $this->collection->find($f);
			$k = array();
			$i = 0;
			while( $cursor->hasNext())
			{
			    $k[$i] = $cursor->getNext();
				$i++;
			}	
			return $k;			
		}
	
		public function update($criterio, $valor)
		{
			$this->collection->update($criterio, $valor);
		}
	
		public function getAll()
		{
			try{
				$cursor = $this->collection->find();
				$k = array();
				$i = 0;
				while( $cursor->hasNext())
				{
				    $k[$i] = $cursor->getNext();
					$i++;
				}	
				return $k;
			}catch(MongoCursorException $e){
				return "error message: ".$e->getMessage()."\n" . "error code: ".$e->getCode()."\n";
			}
		}
	
		public function delete($f, $one = FALSE)
		{
			$c = $this->collection->remove($f, $one);
			return $c;
		}
	
		public function ensureIndex($coleccion, $condicion)
		{
			return $this->collection->ensureIndex($coleccion, $condicion);
		}
	
	}
?>