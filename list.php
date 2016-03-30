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
$result=$conn->query("SELECT * FROM `cars`");
if ($result)
{
	while ($row=$result->fetch_assoc()){
 ?>
	 <div>
		<h2><?php echo $row["Name"] ?></h2>
		<p>Färg: <?php echo $row["Color"] ?></p>
		<p>Pris: <?php echo $row["Price"] ?></p>
		<a href="details.php?carid=<?php echo $row["Id"] ?>">Köp</a>
	 </div>
     <?php  
	}
}
?>


</body>
</html>

