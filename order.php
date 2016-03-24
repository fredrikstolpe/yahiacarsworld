<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="carsworld";

$conn= new mysqli($servername,$username,$password,$dbname);

$mail=$_GET["mail"];
?>
<html>
<head>
<meta http-equiv="content-type" charset="UTF-8"/>

</head>
<body>
<?php

	
$mail=$_GET["mail"];

$stmt = $conn->prepare("INSERT * FROM `orders` WHERE Id = ?");
$stmt->bind_param('i', $carid);
$stmt->execute();
$result = $stmt->get_result();

if ($mail){
	$query=$result->fetch_assoc();
	echo $row["Email"];	
}
?>


Create order in order table

Show thanks message

</body>
</html>


