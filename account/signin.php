<?php 
	session_start();
	require("../functions/dbconnection.php");
	include("../templates/header.php");
	include("../templates/rowTopNavbar.php");
	
	// if(isset($_SESSION["user_name"]) && isset($_SESSION["email_address"])){
		// header("location: /index.php");
		// mysqli_close($dbconnect);
	// }
	
	$userName_emailAddress = $password = '';
	
	// showing errors
	$errors=array('userName_emailAddress'=>'', 'password'=>'');
	
	if(isset($_POST['signin'])){	
		$userName_emailAddress = mysqli_real_escape_string($dbconnect, $_POST['userName_emailAddress']);		
		$password = mysqli_real_escape_string($dbconnect, $_POST['password']);		
		
		if(empty($userName_emailAddress)){
			$errors['userName_emailAddress'] = "Enter your username or email address.";
		}
		else if(empty($password)){
			$errors['password'] = "Enter your password.";
		}
		
		// test login user = demo1, pass = qQ2@
		// test login user = agron, pass = aA1!
		
		else{
			// $email = "SELECT email_address, password FROM users WHERE email_address = '".$userName_emailAddress."'
					// AND password = PASSWORD('$password')";
			$username_check = "select * from users where user_name = '$userName_emailAddress' ";
			$email_check = "select * from users where email_address = '$userName_emailAddress' ";
			
			$username_result = mysqli_query($dbconnect, $username_check);
			$email_result = mysqli_query($dbconnect, $email_check);
			
			if(mysqli_num_rows($username_result) > 0){
				while($row_username = mysqli_fetch_array($username_result)){
					if(password_verify($password, $row_username["password"])){
						// return true;
						$_SESSION["user_name"] = $username_check;
						header("location: /index.php");
					}
					else{
						// return false;
						$errors['password'] = 'Username and password do not match.';			
					}
				}
			}
			else if(mysqli_num_rows($email_result) > 0){
				while($row_email = mysqli_fetch_array($email_result)){
					if(password_verify($password, $row_email["password"])){
						// return true;
						$_SESSION["email_address"] = $email_check;
						header("location: /index.php");
					}
					else{
						// return false;
						$errors['password'] = 'Email and password do not match.';			
					}
				}
			}
			else{
				$errors['password'] = "Invalid username or email address.";
			}		
		}	
		mysqli_close($dbconnect);
	}
	
?>

<style>
	<?php include("../styles/form.css"); ?>
</style>
<!-- Registration Form  -->
<form class="col-lg-6 offset-lg-3 justify-content-center signin_form" action="signin.php" method="post">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="d-flex justify-content-center form_title">
					<h3>Sign In to Your Account</h3>
				</div>
				<hr class="mb-3">
				
				<!-- <label for="userName_emailAddress">Username or Email Address: </label> -->
				<input class="form-control" type="text" name="userName_emailAddress" value="<?php echo htmlspecialchars ($userName_emailAddress);?>" placeholder="Username or Email Address..."/>				
				<div class="red-text"><?php echo $errors['userName_emailAddress']; ?> </div>
				
				</br>
				<!-- <label for="password">Password: </label> -->
				<input class="form-control" type="password" name="password" value="<?php echo htmlspecialchars ($password);?>" placeholder="Password..."/>
				<div class="red-text"><?php echo $errors['password']; ?> </div>	
				
				</br>
				<div class="form-group">
					<div class="form-check checkbox">
						<input class="form-check-input" style="float: left;" type="checkbox" id="gridCheck">
						<label class="form-check-label checkbox_text" for="gridCheck">Remember me</label>
						<a href="#" class="text_link_blue" style="float: right;">Forgot your password?</a>
					</div>
				</div>
				
				<!-- BUTTONS -->
				<div class="d-flex justify-content-center">
					<button class="btn-submit" type="submit" name="signin" >Sign in</button>
				</div>
				
				<div class="separator">Don’t Have an Account?</div><br/>
				<div class="d-flex justify-content-center">
					<a href="signup.php"><button type="button" class="btn btn-secondary btn-cancel">Register</button></a>
				</div>
			</div>
		</div>		
	</div>
</form>

<?php 
	// jquery, closed HTML
	include_once("../templates/jquery.php");
?>