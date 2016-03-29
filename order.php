<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="carsworld";

$conn= new mysqli($servername,$username,$password,$dbname);

$mail=$_GET["mail"];
$carid=$_GET["carid"];
?>
<html>
<head>
<meta http-equiv="content-type" charset="UTF-8"/>

</head>
<body>
<?php
/*
$stmt = $conn->prepare("INSERT * FROM `orders` WHERE Id = ?");
$stmt->bind_param('i', $carid);
$stmt->execute();
$result = $stmt->get_result();

if ($mail){
	$query=$result->fetch_assoc();
	echo $row["Email"];
	
}
*/
	if ($mail && $carid){
		$stmt=$conn->prepare("INSERT INTO `orders` ( `Carid`, `Email`) VALUES (?,?) ");   
		$stmt->bind_param("is",$carid, $mail);
		if (!$stmt->execute()) {
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

		}
		
	}
			

		$mail=$_GET["mail"];
		$carid=$_GET["carid"];
		$stmt = $conn->prepare("SELECT * FROM `orders` WHERE carid = ? ");
		$stmt->bind_param('i', $carid);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result){
				
			
				?>
					<div>
						<h1><?php echo "Thank You!"?></h1>
						<p> <?php echo "Din ".$row["Name"]."Kommer Att Levererans Snart"?></p>
						
						
					 </div>
				<?php
		
			
		}
		
				?>
					 
					 
					 
					 
				
			
		


				



Create order in order table

Show thanks message

</body>
</html>


