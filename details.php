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

$carid=$_GET["id"];

$stmt = $conn->prepare("SELECT * FROM `cars` WHERE Id = ?");
$stmt->bind_param('i', $carid);
$stmt->execute();
$result = $stmt->get_result();

if ($result){
	$row=$result->fetch_assoc();
	echo $row["Name"];	
}
	
?>	
</body>
</html>