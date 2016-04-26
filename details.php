<?php 



$carid=$_GET["carid"];

?>
<?php include 'header.php';?>
<?php include 'carsrepository.php';?>

	<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	 <div class="col-xs-4">
 </div>
		
		
			<?php
				$repository = new CarsRepository();
				$result = $repository->getCar($carid);
	
				if ($result){
			
				$row=$result->fetch_assoc();
			?>
				<div class="col-sm-12 cw-list-car" >
					<img src="<?php echo $row["Name"] ?>.jpg" name="crid" class="img-rounded"  width="200" height="200"><br/>
					<h2><?php echo $row["Name"] ?></h2>
					<h3>Färg: <?php echo $row["Color"] ?></h3>
					<h4>Pris: <?php echo $row["Price"] ?></h4>
					<h5>Model: <?php echo $row["Model"] ?></h5>
				</div> 

				<?php
		}	
				?>
				
	<form method="GET" action="order.php">
	<input name="email" type="text" class="form-control" placeholder="Enter email address...">
	<button  class="btn btn-primary">sköpa</button>
	<input type="hidden" name="carid" value="<?php echo $carid ?>"/><?php //code explain?>
	</form>

</div>
</div>

</body>
</html>