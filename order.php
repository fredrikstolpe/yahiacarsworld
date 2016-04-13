<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="carsworld";

$conn= new mysqli($servername,$username,$password,$dbname);

$email=$_GET["email"];
$carid=$_GET["carid"];
?>
<html>
<head>
<meta http-equiv="content-type" charset="UTF-8"/>

</head>
<body>
<?php


	if ($email && $carid){
		
		$emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);
		
		if (!$emailIsValid){
			?>
				<h1>Ett fel inträffade!</h1>
				<P>Epostadressen är felaktig</p>
			<?php
			die();
		}
		
		$stmt=$conn->prepare("INSERT INTO `orders` ( `carid`, `email`) VALUES (?,?) ");   
		$stmt->bind_param("is",$carid, $email);
		if (!$stmt->execute()) {
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;

		}
		
	}
			

		$stmt = $conn->prepare("SELECT * FROM `cars` WHERE Id = ? ");
		$stmt->bind_param('i', $carid);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result){
				$row=$result->fetch_assoc();
			
				?>
					<div>
						<h1>Thank You!</h1>
						<h2>Din <?php echo $row["Name"] ?> Kommer Att Levererans Snart.</h2>
					 </div>
				<?php
		
			
		}
		
				?>
					 
					 

</body>
</html>


