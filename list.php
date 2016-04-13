<?php include 'carsrepository.php';?>
<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="carsworld";

$conn= new mysqli($servername,$username,$password,$dbname);

$mybrands = empty($_GET["mybrand"]) ? array('volvo', 'bmw', 'saap') : $_GET["mybrand"];
$minprice = empty($_GET["minprice"]) ? 0 : $_GET["minprice"];
$maxprice = empty($_GET["maxprice"]) ? 10000000 : $_GET["maxprice"];

?>
<html >
<body>
<?php include 'header.php';?>
<?php 
$repository = new CarsRepository();

$result = $repository->getCar(1);

$result = $repository->getAllCars();
if ($result)
{
	while ($row=$result->fetch_assoc()){
		echo $row["Name"];
	}
}
	?>

			
<div class="container">
	<form method="get" action="">
		<label for="minprice">Pris, från</label>
		<select id="minprice" name="minprice">
			<option value="0">0</option>
			<option value="100000" <?php if($minprice=="100000"){echo('selected="selected"');}?>>100,000</option>
			<option value="400000" <?php if($minprice=="400000"){echo('selected="selected"');}?>>400,000</option>
		</select>
		<label for="maxprice">Pris, till</label>
		<select id="maxprice" name="maxprice">
			<option value="1000000">1,000,000</option>
			<option value="600000" <?php if($maxprice=="600000"){echo('selected="selected"');}?>>600,000</option>
		</select><br/>
			
			  <input type="checkbox"  name="mybrand[]" <?php if (is_array ($mybrands) &&in_array("volvo", $mybrands)) {echo  ('checked="checked"');}?> value="volvo" >volvo</input>
				<input type="checkbox" name="mybrand[]" <?php if (is_array ($mybrands) &&in_array("bmw", $mybrands)) {echo  ('checked="checked"');}?> value="bmw" >bmw</input>
			  <input type="checkbox" name="mybrand[]" <?php if (is_array ($mybrands)  &&in_array ("saap", $mybrands)) {echo  ('checked="checked"');}?> value="saap" >saap</input>
			  <button>Sök</button>
			  
			
		
	</form>
	
		
			
		

				<?php 
	
			
	
		if ($mybrands){
			$in = join(',', array_fill(0, count($mybrands), '?'));
			$select = "SELECT * FROM cars WHERE Price > ? AND Price < ? AND name IN ($in) ";
			
			$minprice = empty($_GET["minprice"]) ? 0 : $_GET["minprice"];
			$maxprice = empty($_GET["maxprice"]) ? 10000000 : $_GET["maxprice"];
			
			$statement = $conn->prepare($select);
			$count = count($mybrands);
			if ($count==1) { $statement->bind_param('iis',$minprice,$maxprice,$mybrands[0]);}
			if ($count==2) { $statement->bind_param('iiss',$minprice,$maxprice, $mybrands[0],$mybrands[1]);}
			if ($count==3) { $statement->bind_param('iisss',$minprice,$maxprice, $mybrands[0],$mybrands[1],$mybrands[2]);}
			if ($count==4) { $statement->bind_param('iissss',$minprice,$maxprice, $mybrands[0],$mybrands[1],$mybrands[2],$mybrands[3]);}
			$statement->execute();
			$result = $statement->get_result();

		}
		/*else {

			//"SELECT * FROM `cars` where name in ('volvo', 'bmw','saap')";
			
			$minprice = empty($_GET["minprice"]) ? 0 : $_GET["minprice"];
			$maxprice = empty($_GET["maxprice"]) ? 10000000 : $_GET["maxprice"];
			
			$stmt = $conn->prepare("SELECT * FROM `cars` WHERE Price > ? AND Price < ?");
			$stmt->bind_param('ii', $minprice, $maxprice);
			$stmt->execute();
			$result = $stmt->get_result();

		
		}
			*/
	
	
	if ($result)
	{
		while ($row=$result->fetch_assoc()){
	 ?>
	 <div class="col-sm-4 cw-list-car" >
			<img src="<?php echo $row["Name"] ?>.jpg" name="crid" class="img-rounded"  width="200" height="200"><br/>
			<div class="col-xs-6 .col-sm-3" >
			<h2><?php echo $row["Name"] ?></h2>
			<h3>Färg: <?php echo $row["Color"] ?></h3>
			<h4>Pris: <?php echo $row["Price"] ?></h4>
			<a href="details.php?carid=<?php echo $row["Id"] ?>">Köp</a>
		</div>
	 </div>
		 <?php  
		}
	}
	?>
</div>
	
	</body>

	</html>		
