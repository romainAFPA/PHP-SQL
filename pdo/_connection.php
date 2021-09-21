<?php
	$param_host = 'localhost';
	$param_port = '3306';
	$param_dbname = 'zodiaque';
	$param_user = 'root';
	$param_pass = '';
	$param_dsn = "mysql:host=$param_host; port=$param_port; dbname=$param_dbname; charset=utf8";
	

	// create connexion & Check connection
    try 
	{
		$connection = new PDO($param_dsn, $param_user, $param_pass); //create connexion
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
        echo "Connected successfully"; //if successfull
    } 
    catch(PDOException $e) 
	{
		echo "Connection failed: " . $e->getMessage(); //if not successfull
		die(''); //stop the program 
	}
?>