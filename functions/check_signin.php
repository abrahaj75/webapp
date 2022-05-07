<?php 
function check_signin($dbconnect){
	if(isset($_SESSION['user_name'])){
		$sql_user_name = $_SESSION['user_name']; 
		$query = mysqli_query($dbconnect, $sql_user_name);
		$userdata = mysqli_fetch_array($query);
		// upper first char ucfirst
		// return ucfirst($userdata['user_name']);
		$user_name = ($userdata['user_name']);
		$first_name = ($userdata['first_name']);
		$last_name = ($userdata['last_name']);
		$full_name = $last_name.$first_name;		
		// return ucfirst($full_name);
		return ucfirst($user_name);
	}
	else if(isset($_SESSION['email_address'])){
		$sql_email_name = $_SESSION['email_address']; 
		$query = mysqli_query($dbconnect, $sql_email_name);
		$userdata = mysqli_fetch_array($query);
		// upper first char ucfirst
		// return ucfirst($userdata['user_name']);
		$user_name = ($userdata['user_name']);
		$first_name = ($userdata['first_name']);
		$last_name = ($userdata['last_name']);
		$full_name = $last_name.$first_name;
		return ucfirst($user_name);
	}
	else{
		return "Account";
	}
	mysqli_close($dbconnect);
}
?>