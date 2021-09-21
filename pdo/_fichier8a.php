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
			$sql1 = "SELECT * FROM `signes` WHERE `element`='eau'";
			$sql3 = "SELECT * FROM `signes` WHERE `element`='feu'";
			$sql2 = "INSERT INTO `signes` (`name`,`element`,`date`,`description`)  
					VALUES ('buffle','metal','01 janvier-31 décembre','Le signe du buffle')";
			
			$connection->beginTransaction();  //1er methode
			$resultats = $connection->query($sql);
			$resultats = $connection->query($sql2);    

			$records = $resultats->fetchAll(); //fetch results in associative-array
			$connection->commit();

			$out = "<br/>";
			$out .= "<table>
						<tr>
						<th>Signe</th>
						<th>Element</th>
						<th>Date</th>
						<th>Description</th>
						</tr>";
			foreach($records as $rows)
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