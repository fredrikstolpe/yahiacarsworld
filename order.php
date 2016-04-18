<?php include 'carsrepository.php'; ?>
<?php 

$email=$_GET["email"];
$carid=$_GET["carid"];

$repository = new CarsRepository();

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
					$result = $repository->createOrder($carid,$email);
					$result = $repository->getCar($carid);
					if ($result){
							$row=$result->fetch_assoc();
				
	?>
					<div>
						<h1>Thank You!</h1>
						<h2>Din <?php echo $row["Name"] ?> Kommer Att Levererans Snart.</h2>
					 </div>
	<?php
		
				
				}	
			}
	?>
		
		

		
					 
					 

</body>
</html>


