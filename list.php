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

$result=$conn->query("SELECT * FROM cars");
if ($result)
{
	while ($row=$result->fetch_assoc()){
		echo $row["Name"];
	}
}
?>

<button type="submit">buy</button>

</body>
</html>