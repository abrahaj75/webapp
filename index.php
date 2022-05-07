<?php
session_start();
// connection to the database
	include("functions/dbconnection.php");
	// check whether user logged in or not
	include ("functions/check_signin.php");
	
// TEMPLATES @header, @body	
	include("templates/header.php");
// @body
	include("templates/topNavbar.php");
	

// <!--BODY CONTENT-->

	$user = check_signin($dbconnect);
	if($user != "Account"){ 
		echo '<img src="images/welcome.jpg" class="mx-auto d-block" style="width: 50rem;" alt="welcome">';
	}			
?>






<!--BODY CONTENT end -->
<?php 
	include("templates/footer.php");
?>