<?php include 'carsrepository.php';?>
<?php 
$mybrands = empty($_GET["mybrand"]) ? array('volvo', 'bmw', 'saap') : $_GET["mybrand"];//if else
$minprice = empty($_GET["minprice"]) ? 0 : $_GET["minprice"];
$maxprice = empty($_GET["maxprice"]) ? 10000000 : $_GET["maxprice"];
$modellarfran = empty($_GET["modellårfrån"]) ? 2001 : $_GET["modellårfrån"];
$modellartill = empty($_GET["modellårtill"]) ? 2008 : $_GET["modellårtill"];

?>

<html>
<body>

<?php include 'header.php';?>
<?php 

$repository = new CarsRepository();//1the class name
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
			<label for="modellårfrån">Modellår, från</label>
			<select id="modellårfrån" name="modellårfrån">
				<option value="2000">2000</option>
				<option value="2001" <?php if($modellarfran=="2001"){echo('selected="selected"');}?>>2001</option>
				<option value="2002" <?php if($modellarfran=="2002"){echo('selected="selected"');}?>>2002</option>
				<option value="2003" <?php if($modellarfran=="2003"){echo('selected="selected"');}?>>2003</option>
				<option value="2004" <?php if($modellarfran=="2004"){echo('selected="selected"');}?>>2004</option>
				<option value="2005" <?php if($modellarfran=="2005"){echo('selected="selected"');}?>>2005</option>
				<option value="2006" <?php if($modellarfran=="2006"){echo('selected="selected"');}?>>2006</option>
				<option value="2007" <?php if($modellarfran=="2007"){echo('selected="selected"');}?>>2007</option>
				<option value="2008" <?php if($modellarfran=="2008"){echo('selected="selected"');}?>>2008</option>
			</select><br/>
		<label for="maxprice">Pris, till</label>
			<select id="maxprice" name="maxprice">
				<option value="1000000">1,000,000</option>
				<option value="600000" <?php if($maxprice=="600000"){echo('selected="selected"');}?>>600,000</option>
			</select>
			
		<label for="modellårtill">modellår,till</label>
			<select id="modellårtill" name="modellårtill">
				<option value="2001">2001</option>
				<option value="2002" <?php if($modellartill=="2002"){echo('selected="selected"');}?>>2002</option>
				<option value="2003" <?php if($modellartill=="2003"){echo('selected="selected"');}?>>2003</option>
				<option value="2004" <?php if($modellartill=="2004"){echo('selected="selected"');}?>>2004</option>
				<option value="2005" <?php if($modellartill=="2005"){echo('selected="selected"');}?>>2005</option>
				<option value="2006" <?php if($modellartill=="2006"){echo('selected="selected"');}?>>2006</option>
				<option value="2007" <?php if($modellartill=="2007"){echo('selected="selected"');}?>>2007</option>
				<option value="2008" <?php if($modellartill=="2008"){echo('selected="selected"');}?>>2008</option>
			</select><br/>
			  <input type="checkbox"  name="mybrand[]" <?php if (is_array ($mybrands) &&in_array("volvo", $mybrands)) {echo  ('checked="checked"');}?> value="volvo" >volvo</input>
				<input type="checkbox" name="mybrand[]" <?php if (is_array ($mybrands) &&in_array("bmw", $mybrands)) {echo  ('checked="checked"');}?> value="bmw" >bmw</input>
			  <input type="checkbox" name="mybrand[]" <?php if (is_array ($mybrands)  &&in_array ("saap", $mybrands)) {echo  ('checked="checked"');}?> value="saap" >saap</input>
		
		
		
		
		<button>Sök</button>
			  
			
		
	</form>
	
		
			
		

	<?php 
	
		
		$result = $repository->searchCars($minprice,$modellarfran,$maxprice,$modellartill,$mybrands);
		if ($result){
		
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
