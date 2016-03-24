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

if ($mail){
	$query="INSERT INTO `orders`(`E-mail`) VALUES ('".$mail."')";
	//$result=$conn->query();
	echo $query;
	}

?>

Create order in order table

Show thanks message

</body>
</html>