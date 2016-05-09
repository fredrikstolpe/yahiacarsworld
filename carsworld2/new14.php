
<?php include "carsrepository.php";?>
<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="carsworld";

$conn= new mysqli($servername,$username,$password,$dbname);

?>
<html>
<body>
<?php include "header.php";?>
<div class="container">
<form method="get" action="">
	<label for="minprice">från</label>
		<select id="minprice" name="minprice">
	
			<option value="0">0</option>
			<option value="5000" <?php if($minprice=="5000"){echo('selected="selected"');}?>>5000</option>
			<option value="10000" <?php if($minprice=="10000"){echo('selected="selected"');}?>>10000</option>
			<option value="15000" <?php if($minprice=="15000"){echo('selected="selected"');}?>>15000</option>
		</select><br/>
		
	<label for="maxprice">till</label>
		<select id="maxprice" name="maxprice">
		
			<option value="1,000,000">1,000,000</option>
			<option value="800,000" <?php if($maxprice=="800,000"){echo('seleted="selected"');}?>>800000</option>
			<option value="600,000" <?php if($maxprice=="600,000"){echo('seleted="selected"');}?>>600000</option>
		
		
		</select>
	
	


</form>
</body>
</html>