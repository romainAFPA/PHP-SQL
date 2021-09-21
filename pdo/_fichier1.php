<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="_fichier.css">
		<title>exercice 1</title>
	</head>
	<body>
		<?php
			include('_connection.php'); //Connection to database
			$sql = "SELECT COUNT(*) AS `nombre` FROM `signes`";
			$resultats = $connection->query($sql);   // send request to sql server
			$records = $resultats-> fetch(PDO::FETCH_ASSOC); //fetch results
			$out = "<br/>";
			$out .= "Nombre d'enregistrement de la table: ".$records['nombre']; //Display exercice 1. Fetch_ASSOC
			echo $out;
			/*var_dump($records);*/
		?>
	</body>
</html>