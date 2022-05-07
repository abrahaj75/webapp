<?php 
session_start();
	// Destroy all session
	if(session_destroy()){
		// Redirection to home page
		header("Location: /index.php");
	}
?>