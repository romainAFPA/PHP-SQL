<?php
    include('_connection.php'); //Connection to database
    $sql1 = "SELECT * FROM `signes` WHERE `element`='eau'";
    $sql2 = "INSERT IGNORE INTO `signes` (`name`,`element`,`date`,`description`)  
            VALUES ('toto','metal','01 janvier-31 décembre','Le signe du buffle')";
            /*WHERE NOT EXISTS (SELECT * FROM `signes` WHERE `name`='toto')";*/ /*test: cette ligne ne fonctionne pas*/
    $sql3 = "UPDATE `signes` SET `name`='toto' WHERE `name`='Buffle'";

    $connection->beginTransaction();
    
        $records = $connection->prepare($sql1);
        $records->execute();

        $resultats = $connection->prepare($sql2);
        $resultats->execute();

        $records1 = $connection->prepare($sql3);
        $records1->execute();

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
    /*var_dump($out);*/
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="_fichier.css">
		<title>exercice 8b</title>
	</head>
	<body>
		<?php 
            echo $out; //display all 
        ?>
	</body>
</html>
