<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="carsworld";

$conn= new mysqli($servername,$username,$password,$dbname);

?>
<?php include 'header.php';?>

<div class="container">
	<?php 
	$result=$conn->query("SELECT * FROM `cars`");
	if ($result)
	{
		while ($row=$result->fetch_assoc()){
	 ?>
		 <div class="col-sm-4">
			<h2><?php echo $row["Name"] ?></h2>
			<p>Färg: <?php echo $row["Color"] ?></p>
			<p>Pris: <?php echo $row["Price"] ?></p>
			<a href="details.php?carid=<?php echo $row["Id"] ?>">Köp</a>
		 </div>
		 <?php  
		}
	}
	?>
</div>

</body>
</html>

