<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="carsworld";

$conn= new mysqli($servername,$username,$password,$dbname);


?>
<html>
<head>
<meta http-equiv="content-type" charset="UTF-8"/>

</head>
<body>

<?php
$stmt = $conn->prepare("SELECT * FROM `cars` WHERE Id = ?");
$stmt->bind_param('i', $Carid);
$stmt->execute();
$result = $stmt->get_result();

if ($result){
	$row=$result->fetch_assoc();
	echo $row["Name"].$row["Color"].$row["Number"].$row["Price"];
}
	

$Email = "yahia@bazooka.com";

if (!filter_var($Email, FILTER_VALIDATE_EMAIL) === true) {
  echo("Sorry, we don't recognize this email.");
} 

	
?>

<form method="GET" action="order.php">
	<input type="text" name="Email"/>
	<button >Submit</button>
	<input type="hidden" name="Carid" value="<?php echo $Carid ?>"/>
</form>
</body>
</html>