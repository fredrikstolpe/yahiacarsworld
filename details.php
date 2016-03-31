<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="carsworld";

$conn= new mysqli($servername,$username,$password,$dbname);
$carid=$_GET["carid"];

?>
<html>
<head>
<meta http-equiv="content-type" charset="UTF-8"/>

</head>
<body>

<?php
$stmt = $conn->prepare("SELECT * FROM `cars` WHERE Id = ?");
$stmt->bind_param('i', $carid);
$stmt->execute();
$result = $stmt->get_result();

if ($result){
	
	$row=$result->fetch_assoc();
	echo $row["Name"].$row["Color"].$row["Number"].$row["Price"];
}
	
?>

<form method="GET" action="order.php">
	<input type="text" name="email"/>
	<button >Submit</button>
	<input type="hidden" name="carid" value="<?php echo $carid ?>"/>
</form>
</body>
</html>