<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="carsworld";

$conn= new mysqli($servername,$username,$password,$dbname);
$cars = array ("volvo","bmw","saap");
$mychoice=$_POST["mychoice"];
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
		<a href="details.php?id=<?php echo $row["Id"] ?>">Köp</a>
	</div>
<?php
	}
}
?>

<button type="submit" name="mychoice" value="volvo" >buy</button>
<button type="submit" name="mychoice" value="bmw">buy</button>
<button type="submit" name="mychoice" value="saap">buy</button>

</body>
</html>