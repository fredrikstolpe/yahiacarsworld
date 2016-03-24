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
$query = "SELECT * FROM `cars` WHERE `Id`= " . $carid;
echo $query;
$result = $conn->query($query);

if ($result){
	$row=$result->fetch_assoc();
	echo $row["Name"];	
}
	
?>	
</body>
</html>