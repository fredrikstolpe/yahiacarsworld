<?php 

include 'carsrepository.php';
include 'utils.php';

$email=$_GET["email"];
$carid=$_GET["carid"];

$repository = new CarsRepository();
$utils = new Utils();

?>

<html>
<head>
<meta http-equiv="content-type" charset="UTF-8"/>

</head>
<body>
<div class=".container-fluid">
<?php
	
	if (!$utils->emailIsValid($email)){
		?>
			<h1>Ett fel inträffade!</h1>
			<P>Epostadressen är felaktig</p>
		<?php
			die();				
	}
	else if ($carid){
		$repository->createOrder($carid,$email);
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
</div>
</body>
</html>


