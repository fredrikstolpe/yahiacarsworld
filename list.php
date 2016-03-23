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
		echo "Id: " . $row["Id"]." Name: " . $row["Name"]."Number: " . $row["Number"]."Color: " . $row["Color"]."Price: " . $row["Price"]."<br>";
		echo "<a href='details.php?id=" . $row["Id"] . "'>Köp</a>";
	}
}
?>

<button type="submit" name="mychoice" value="volvo" >buy</button>
<button type="submit" name="mychoice" value="bmw">buy</button>
<button type="submit" name="mychoice" value="saap">buy</button>

</body>
</html>