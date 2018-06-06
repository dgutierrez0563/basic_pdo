<?php  

	require_once 'Conexion.php';
	//require_once 'singleConection.php';
	/**
	* USER
	*/
	class User
	{

		private $IDUser;
		private $IDEmployer;	
		private $UserName;
		private $Password;
		private $Role;
		private $Status;
		private $created_by;
		private $updated_by;

		const TABLA = "user";

		/**
		* Getters
		*/
		public function getId(){
			return $this->IDUser;
		}
		public function getIDEmployer(){
			return $this->IDEmployer;
		}
		public function getUserName(){
			return $this->UserName;
		}
		public function getPassword(){
			return $this->Password;
		}
		public function getRole(){
			return $this->Role;
		}
		public function getStatus(){
			return $this->Status;
		}
		public function getCreatedBy(){
			return $this->created_by;
		}
		public function getUpdatedBy(){
			return $this->updated_by;
		}
		/**
		* Setters
		*/
		public function setIDEmployer($IDEmployer){
			$this->IDEmployer=$IDEmployer;
		}
		public function setUserName($UserName){
			$this->UserName=$UserName;
		}
		public function setPassword($Password){
			$this->Password=$Password;
		}
		public function setRole($Role){
			$this->Role=$Role;
		}
		public function setStatus($Status){
			$this->Status=$Status;
		}
		public function setCreatedBy($created_by){
			$this->created_by=$created_by;
		}
		public function setUpdatedBy($updated_by){
			$this->updated_by=$updated_by;
		}

		public function __construct($IDEmployer,$UserName,$Password,$Role,$Status,$created_by,$updated_by,$IDUser=null)
		{
			$this->IDEmployer=$IDEmployer;
			$this->UserName=$UserName;
			$this->Password=$Password;
			$this->Role=$Role;
			$this->IDUser=$IDUser;
		}

		public function saveUser(){
			$mysql_con = new Conexion();			

			if ($this->IDUser) {//Si recibe ID se modifica
				$query = $mysql_con->prepare('UPDATE ' . self::TABLA . ' SET IDEmployer= :IDEmployer,UserName = :UserName,Role = :Role, updated_by = :updated_by WHERE IDUser = :IDUser');
				$query->bindParam(':IDEmployer',$this->IDEmployer);
				$query->bindParam(':UserName',$this->UserName);
				$query->bindParam(':Role',$this->Role);
				$query->bindParam(':updated_by',$this->updated_by);
				$query->bindParam(':IDUser',$this->IDUser);
				$query->execute();
			}else{ //INSERT DATA porque no se recibe id
				$query = $mysql_con->prepare('INSERT INTO ' .self::TABLA . ' (IDEmployer,UserName,Password,Role,created_by,updated_by) VALUES(:IDEmployer,:UserName,:Password,:Role,:created_by,:updated_by)');
				$query->bindParam(':IDEmployer',$this->IDEmployer);
				$query->bindParam(':UserName',$this->UserName);
				$query->bindParam(':Password',$this->Password);
				$query->bindParam(':Role',$this->Role);
				$query->bindParam(':created_by',$this->created_by);
				$query->bindParam(':updated_by',$this->updated_by);
				$query->execute();
				$this->IDUser = $mysql_con->lastInsertId();
			}
			$mysql_con=null;
		}
		public static function searchIDUser($IDUser){
			$mysql_con = new Conexion();
			$query = $mysql_con->prepare('SELECT IDEmployer,UserName,Role FROM ' .self::TABLA. ' WHERE IDUser = :IDUser');
			$query->bindParam(':IDUser',$IDUser);
			$query->execute();

			$data = $query->fetch();

			if($data){
				return new self($data['IDEmployer'],$data['UserName'],$data['Role'],$IDUser);
			}else{
				return false;
			}
		}
		public static function searchUserName($UserName){
			$mysql_con = new Conexion();
			//self::$instance_conect_aux = new self();
			//$mysql_con = singleConection();
			//getInstanceAux
			$query = $mysql_con->prepare("SELECT IDEmployer,UserName,Role FROM user WHERE UserName LIKE '%$UserName%'");
			$query->bindParam(':UserName',$UserName);
			$query->execute();

			$data = $query->fetchAll();
			return $data;
			// if($data){
			// 	//return new self($data['NombreUsuario'],$data['Apellido'],$data['Correo'],$NombreUsuario);
			// 	//return new self($data);
			// 	// while ($data) {
			// 	// 	return new self($data['NombreUsuario'],$data['Apellido'],$data['Correo'],$NombreUsuario);
			// 	// }
			// 	return $data;
			// }else{
			// 	return false;
			// }

		}
		public static function getAll(){
			$mysql_con = new Conexion();
			$query = $mysql_con->prepare('SELECT IDUser,IDEmployer,UserName,Role,Status FROM '.self::TABLA. ' ORDER BY IDUser ASC');
			$query->execute();
			$data = $query->fetchAll();
			return $data;
		}
		public static function changeStatus($type){
			$mysql_con = new Conexion();

			if ($this->IDUser) {
				if ($type=0) {
					$Status="Disabled";
					$query = $mysql_con->prepare('UPDATE ' . self::TABLA . ' SET Status= :Status WHERE IDUser = :IDUser');
					$query->bindParam(':Status',$this->Status);
					$query->bindParam(':IDUser',$this->IDUser);
					$query->execute();
				} elseif($type=1) {
					$Status="Enabled";
					$query = $mysql_con->prepare('UPDATE ' . self::TABLA . ' SET Status= :Status WHERE IDUser = :IDUser');
					$query->bindParam(':Status',$this->Status);
					$query->bindParam(':IDUser',$this->IDUser);
					$query->execute();
				}				

			} else {
				# code...
			}
			
		}
	}
?>