<?php
	$servername = "localhost"; // server name
	$dbusername = "root"; // db user name
	$dbpassword = "";		// db user password
	$dbname 	= "abrahaj";		// db name 

	$dbconnect = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	
	if(!$dbconnect){
		die("Connection error: " . mysqli_connect_error());
	}
	date_default_timezone_set("America/New_York");
?>