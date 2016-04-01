<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="carsworld";

$conn= new mysqli($servername,$username,$password,$dbname);
$crid=$_GET["crid"];
?>
<?php include 'header.php';?>
			
<div class="container">
	<?php 
	$result=$conn->query("SELECT * FROM `cars`" );
	if ($result)
	{
		while ($row=$result->fetch_assoc()){
	 ?>
		 <div class="col-sm-4 cw-list-car" >
			<h2><?php echo $row["Name"] ?></h2>
			<p>Färg: <?php echo $row["Color"] ?></p>
			<p>Pris: <?php echo $row["Price"] ?></p>
			
			<a href="details.php?carid=<?php echo $row["Id"] ?>">Köp</a>
		 </div>
		 <?php  
		}
	}
	?>
			<img src="bmw.jpg" name="crid" value="bmw" class="img-rounded"  width="100" height="100"></br>
			<img src="volvo.jpg" name="crid" value="volvo" class="img-rounded"  width="100" height="100"></br>
			<img src="saap.jpg" name="crid" value="saap" class="img-rounded"  width="100" height="100"></br>
			
</div>

</body>
</html>

