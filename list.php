<?php 
include 'carsrepository.php';

$mybrands = empty($_GET["mybrand"]) ? array('volvo', 'bmw', 'saap','tesla') : $_GET["mybrand"];//if else
$minprice = empty($_GET["minprice"]) ? 0 : $_GET["minprice"];
$maxprice = empty($_GET["maxprice"]) ? 10000000 : $_GET["maxprice"];
$modellarfran = empty($_GET["modellarfran"]) ? 2001 : $_GET["modellarfran"];
$modellartill = empty($_GET["modellartill"]) ? 2008 : $_GET["modellartill"];

$repository = new CarsRepository();//1the class name

?>
<html>
<body>

<?php include 'header.php';?>
		
	<div class="container">
		<div class="row">
		
			<div class=".col-xs-12 .col-md-8"></div>
				<form method="get" action="">
				<label for="minprice">Pris, från</label>
					<select id="minprice" name="minprice">
						<option value="0">0</option>
						<option value="100000" <?php if($minprice=="100000"){echo('selected="selected"');}?>>100,000</option>
						<option value="400000" <?php if($minprice=="400000"){echo('selected="selected"');}?>>400,000</option>
					</select>
					<label for="modellarfran">Modellår, från</label>
					<select id="modellårfrån" name="modellarfran">
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
					<select id="modellartill" name="modellartill">
						<option value="2001">2001</option>
						<option value="2002" <?php if($modellartill=="2002"){echo('selected="selected"');}?>>2002</option>
						<option value="2003" <?php if($modellartill=="2003"){echo('selected="selected"');}?>>2003</option>
						<option value="2004" <?php if($modellartill=="2004"){echo('selected="selected"');}?>>2004</option>
						<option value="2005" <?php if($modellartill=="2005"){echo('selected="selected"');}?>>2005</option>
						<option value="2006" <?php if($modellartill=="2006"){echo('selected="selected"');}?>>2006</option>
						<option value="2007" <?php if($modellartill=="2007"){echo('selected="selected"');}?>>2007</option>
						<option value="2008" <?php if($modellartill=="2008"){echo('selected="selected"');}?>>2008</option>
						<option value="2009" <?php if($modellartill=="2009"){echo('selected="selected"');}?>>2009</option>
						<option value="2010" <?php if($modellartill=="2010"){echo('selected="selected"');}?>>2010</option>
						<option value="2011" <?php if($modellartill=="2011"){echo('selected="selected"');}?>>2011</option>
						<option value="2012" <?php if($modellartill=="2012"){echo('selected="selected"');}?>>2012</option>
						<option value="2013" <?php if($modellartill=="2013"){echo('selected="selected"');}?>>2013</option>
						<option value="2014" <?php if($modellartill=="2014"){echo('selected="selected"');}?>>2014</option>
						<option value="2015" <?php if($modellartill=="2015"){echo('selected="selected"');}?>>2015</option>
						<option value="2016" <?php if($modellartill=="2016"){echo('selected="selected"');}?>>2016</option>
					</select><br/>
					
						<input type="checkbox"  name="mybrand[]" <?php if (is_array ($mybrands) &&in_array("volvo", $mybrands)) {echo  ('checked="checked"');}?> value="volvo" >volvo</input>
						<input type="checkbox" name="mybrand[]" <?php if (is_array ($mybrands) &&in_array("bmw", $mybrands)) {echo  ('checked="checked"');}?> value="bmw" >bmw</input>
						<input type="checkbox" name="mybrand[]" <?php if (is_array ($mybrands)  &&in_array ("saap", $mybrands)) {echo  ('checked="checked"');}?> value="saap" >saap</input>
						<input type="checkbox" name="mybrand[]" <?php if (is_array ($mybrands)  &&in_array ("tesla", $mybrands)) {echo  ('checked="checked"');}?> value="tesla" >tesla</input>
				
				
				
				
				<button>Sök</button>
					  
					
				
				</form>

					
				

				<?php 
			
				
				$result = $repository->searchCars($minprice,$maxprice,$modellarfran,$modellartill,$mybrands);
				if ($result){
				
						while ($row=$result->fetch_assoc()){
							 ?>
							 <div class="col-sm-4 cw-list-car">
									<img src="<?php echo $row["Name"]?>.jpg "  name="crid" class="img-rounded" width="200" height="200"><br/>
								
									<h2><?php echo $row["Name"] ?></h2>
									<h3>Färg: <?php echo $row["Color"] ?></h3>
									<h4>Pris: <?php echo $row["Price"] ?></h4>
									<h5>Model:<?php echo $row["Model"] ?></h5>
									<a href="details.php?carid=<?php echo $row["Id"] ?>">Köp</a>
								
								
							 </div>
								 <?php  
									
						}
				}
				?>
	
	
	</div>
		</div>

	
	</body>

	</html>		
