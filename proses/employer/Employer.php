<?php  
	
	require_once ('./config/Conexion.php');
	/**
	* Class Employer
	*/
	class Employer {
		
		private $IDEmployer;
		private $DNI;
		private $Name;
		private $Lastname;
		private $Email;
		private $Address;
		private $Birth;
		private $Status;
		private $created_by;
		private $updated_by;

		const TABLA = "Employer";

		/*
		* Getters
		*/
		public function getID(){
			return $this->IDEmployer;
		}
		public function getDNI(){
			return $this->DNI;
		}
		public function getName(){
			return $this->Name;
		}
		public function getLastname(){
			return $this->Lastname;
		}
		public function getEmail(){
			return $this->Email;
		}
		public function getAddress(){
			return $this->Address;
		}
		public function getBirth(){
			return $this->Birth;
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
		/*
		* Getters
		*/
		public function setID($IDEmployer){
			$this->IDEmployer=$IDEmployer;
		}
		public function setDNI($DNI){
			$this->DNI=$DNI;
		}
		public function setName($Name){
			$this->Name=$Name;
		}
		public function setLastName($Lastname){
			$this->Lastname=$Lastname;
		}
		public function setEmail($Email){
			$this->Email=$Email;
		}
		public function setAddress($Address){
			$this->Address=$Address;
		}
		public function setBirth($Birth){
			$this->Birth=$Birth;
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

		public function __construct($DNI,$Name,$Lastname,$Email,$Address,$Birth,$Status,$created_by,$updated_by,$IDEmployer=null)
		{
			$this->IDEmployer=$IDEmployer;
			$this->DNI=$DNI;
			$this->Name=$Name;
			$this->Lastname=$Lastname;
			$this->Email=$Email;
			$this->Address=$Address;
			$this->Birth=$Birth;
			$this->Status=$Status;
			$this->created_by=$created_by;
			$this->updated_by=$updated_by;
		}

		public static function saveEmployer(){
			$mysql_con = new Conexion();

			if ($this->IDEmployer) {//Si recibe ID se modifica
				$query = $mysql_con->prepare('UPDATE ' . self::TABLA . ' SET DNI = :DNI,Name= :Name,Lastname = :Lastname,Address = :Address, Birth = :Birth,updated_by = :updated_by WHERE IDEmployer = :IDEmployer');
				$query->bindParam(':DNI',$this->DNI);
				$query->bindParam(':Name',$this->Name);
				$query->bindParam(':Lastname',$this->Lastname);
				$query->bindParam(':Address',$this->Address);
				$query->bindParam(':Birth',$this->Birth);
				$query->bindParam(':updated_by',$this->updated_by);
				$query->bindParam(':IDEmployer',$this->IDEmployer);
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

		public static function getAll(){
			$mysql_con = new Conexion();

			$query = $mysql_con->prepare('SELECT IDEmployer,DNI,Name,Lastname,Address,Birth,Status FROM '.self::TABLA. ' ORDER BY IDEmployer ASC');
			$query->execute();
			$data = $query->fetchAll();
			return $data;
		}
	}
?>