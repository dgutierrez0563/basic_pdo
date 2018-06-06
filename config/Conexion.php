<?php  
		require_once ('data.php');
	/**
	*  Class conection for db pero con metodologia singleton de una instancia
	*/
	class Conexion extends PDO
	{
		private $db_type=X_TYPE;
		private $host=X_HOST;
		private $db_name=X_DBNAME;
		private $user=X_USER;
		private $pass=X_PASS;
		private static $instance_conect_aux = null;
		
		/*
		* constructor for class
		*/
		public function __construct()
		{
			try {				
				$instance_conect_aux=parent::__construct($this->db_type.':host='.$this->host.';dbname='.$this->db_name,$this->user,$this->pass);
			} catch (PDOException $e) {
				echo "Error with conection!\nDetail: ".$e->getMessage();
				exit;
			}
		}

		// public function __construct()
		// {
		// 	try {				
		// 		//parent::__construct($this->db_type.':host='.$this->host.';dbname='.$this->db_name,$this->user,$this->pass);
		// 		//parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
		// 		self::$instance_conect_aux = new PDO($this->db_type.':host='.$this->host.';dbname='.$this->db_name,$this->user,$this->pass);
		// 	} catch (PDOException $e) {
		// 		echo "Error with conection!\nDetail: ".$e->getMessage();
		// 		exit;
		// 	}
		// }
		public static function getInstanceAux(){
			if(!self::$instance_conect_aux){
				new self;
			}
			return self::$instance_conect_aux;
		 }

		public static function closeInstanceAux(){
		 	self::$instance_conect_aux=null;
		 }
	}
?>