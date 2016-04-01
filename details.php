<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="carsworld";

$conn= new mysqli($servername,$username,$password,$dbname);
$carid=$_GET["carid"];

?>
<?php include 'header.php';?>
<div class="container">
	<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	 <div class="col-xs-4">
 </div>
		<?php
		$stmt = $conn->prepare("SELECT * FROM `cars` WHERE Id = ?");
		$stmt->bind_param('i', $carid);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result){
			
			$row=$result->fetch_assoc();
			?>
				<h2><?php echo $row["Name"] ?></h2>
				<p>Färg: <?php echo $row["Color"] ?></p>
				<p>Pris: <?php echo $row["Price"] ?></p>
			 <?php
		}
		?>
		<form method="GET" action="order.php">
			<input name="email" type="text" class="form-control" placeholder="Enter email address...">
			<button  class="btn btn-primary">sköpa</button>
			<input type="hidden" name="carid" value="<?php echo $carid ?>"/>
		</form>

	</div>
</div>

</body>
</html>