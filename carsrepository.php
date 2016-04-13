<?php 

class CarsRepository{

	private $conn;

	function __construct() {
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="carsworld";

		$this->conn = new mysqli($servername,$username,$password,$dbname);
   }

   function __destruct() {
       $this->conn->close();
   }
	
	function test(){
		echo "hello";
	}

	function getAllCars(){
		$select = "SELECT * FROM cars ";
		$statement = $this->conn->prepare($select);
		$statement->execute();
		$result = $statement->get_result();
		return $result;
	}
	
	function getCar($carid){
		
		$select = "SELECT * FROM cars WHERE Id = ? ";
		$statement = $this->conn->prepare($select);
		$statement->bind_param('i', $carid);
		$statement->execute();
		$result = $statement->get_result();
		return $result;
	}
	
}

?>