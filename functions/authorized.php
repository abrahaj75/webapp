<?php
	include ("../functions/dbconnection.php");
	
	function authorized($dbconnect){
		
		if(isset($_SESSION['user_id'])){
			
			$id=$_SESSION['user_id'];
			$query="select * from user where user_id = '$id' limit 1";
			
			$result = mysqli_query($dbconnect, $query);
			
			if($result && mysqli_num_rows($result) > 0){
				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
			}
		}
	}
	// redirect to login
	header("Location: ../account/signin.php");
	// header('location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']); 
	// exit;
	
	die;	
?>