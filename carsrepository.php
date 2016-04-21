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
	
	function searchCars($minprice, $maxprice,$modellarfran,$modellartill,$mybrands){
		if ($mybrands){
			$in = join(',', array_fill(0, count($mybrands), '?'));
			$select = "SELECT * FROM cars WHERE Price > ? AND Price < ? AND Model > ? AND Model > ? AND name IN ($in) ";
			$select = "SELECT * FROM cars WHERE Price > ? AND Price < ? AND name IN ($in) ";
			$statement =$this->conn->prepare($select);
			$count = count($mybrands);
			if ($count==1) { $statement->bind_param('iiiis',$minprice,$maxprice,$modellarfran,$modellartill,$mybrands[0]);}
			if ($count==2) { $statement->bind_param('iiiiss',$minprice,$maxprice,$modellarfran,$modellartill,$mybrands[0],$mybrands[1]);}
			if ($count==3) { $statement->bind_param('iiiisss',$minprice,$maxprice,$modellarfran,$modellartill,$mybrands[0],$mybrands[1],$mybrands[2]);}
			if ($count==4) { $statement->bind_param('iiiissss',$minprice,$maxprice,$modellarfran,$modellartill,$mybrands[0],$mybrands[1],$mybrands[2],$mybrands[3]);}
			$statement->execute();
			$result = $statement->get_result();
			return $result;
			

		}
	}
	
	function getCar($carid){
		
		$select = "SELECT * FROM cars WHERE Id = ? ";
		$statement = $this->conn->prepare($select);
		$statement->bind_param('i', $carid);
		$statement->execute();
		$result = $statement->get_result();
		return $result;
	}

	function createOrder($carid,$email){//بوست المتغيرات الى الفانكشن
		$stmt=$this->conn->prepare("INSERT INTO `orders` ( `carid`, `email`) VALUES (?,?) ");   
		$stmt->bind_param("is",$carid, $email);
		return $stmt->execute();
	}
	
}

?>