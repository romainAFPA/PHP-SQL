<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="_fichier.css">
		<title>exercice 6</title>
	</head>
	<body>
		<?php
			include('_connection.php'); //Connection to database
			$sql = "SELECT * FROM `signes` WHERE `element`=:element AND `name` LIKE :string ";
			$element ='eau';
			$string = '%er%';
			
			$resultats = $connection->prepare($sql); //send request to sql server and get results
			$resultats->bindParam(':element', $element, PDO::PARAM_STR);
			$resultats->bindValue(':string', $string, PDO::PARAM_STR);
			$resultats->execute();
			//$records = $resultats-> fetchAll(); //fetch results in associative-array
			
			$out = "<br/>";
			$out .= "<table>
						<tr>
						<th>Signe</th>
						<th>Element</th>
						<th>Date</th>
						<th>Description</th>
						</tr>";
			foreach($resultats as $rows)
			{
				$out .= "<tr>";
				$out .= "<td>".$rows['name']."</td>";
				$out .= "<td>".$rows['element']."</td>";
				$out .= "<td>".$rows['date']."</td>";
				$out .= "<td>".$rows['description']."</td>";
				$out .= "</tr>";
			}
			$out .= "</table>";
			echo $out; //display all
			/*var_dump($out);*/
		?>
	</body>
</html>