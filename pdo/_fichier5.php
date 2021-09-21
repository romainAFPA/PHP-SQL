<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="_fichier.css">
		<title>exercice 5</title>
	</head>
	<body>
		<?php
			include('_connection.php'); //Connection to database
			$tab = ['feu','terre','air','eau','metal'];
			$sql = "SELECT * FROM `signes`";
			$name ='';
			$element ='';
			$date = '';
			$resultats = $connection->prepare($sql); //send request to sql server and get results
			$resultats -> execute(array(':name'=>$name,':element'=>$element,':date'=>$date));
			$records = $resultats-> fetchAll(); //fetch results in associative-array

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
				for($i=0;$i<5;$i++)
				{
					if($tab[$i]===$rows['element']) $out .= "<td class=".$tab[$i].">".$rows['element']."</td>";
				}
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