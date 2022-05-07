<?php 
	session_start();
	include("../functions/dbconnection.php");
	include("../templates/header.php");
	include("../templates/rowTopNavbar.php");
	
	if(isset($_SESSION["user_name"]) && isset($_SESSION["email_address"])){
		header("location: /index.php");
		die;
	}	
	// contain entered values in the form
	// $user_name = $first_name = $last_name = $phone_number = $email_address = $password = $confirm_password = $validation_code = '';
	$user_name = $first_name = $last_name = $email_address = $password = $confirm_password = '';
	
	// showing errors in the form
	// $errors=array('user_name'=>'', 'first_name'=>'', 'last_name'=>'', 'phone_number'=>'', 'email_address'=>'', 'password'=>'', 'confirm_password'=>'', 'validation_code'=>'');
	$errors=array('user_name'=>'', 'first_name'=>'', 'last_name'=>'', 'email_address'=>'', 'password'=>'', 'confirm_password'=>'');
		
	// if($_SERVER['REQUEST_METHOD'] === "post"){
	if (isset($_POST['register'])) { // button name of register
		$user_name = mysqli_real_escape_string($dbconnect, $_POST['user_name']);		
		$first_name = mysqli_real_escape_string($dbconnect, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($dbconnect, $_POST['last_name']);
		$email_address = mysqli_real_escape_string($dbconnect, $_POST['email_address']);	
		$password = mysqli_real_escape_string($dbconnect, $_POST['password']);
		$confirm_password = mysqli_real_escape_string($dbconnect, $_POST['confirm_password']);			
		// $validation_code = mysqli_real_escape_string($dbconnect, $_POST['validation_code']);
		
		// username validation	
		if(empty($user_name)) {
		$errors['user_name'] = 'Enter your username';
		}
		else{
			if(strlen($user_name) < 3 || strlen($user_name) > 20){
				$errors['user_name'] = 'Between 3 - 20 characters';
			}
			else if(!preg_match('/^[a-zA-Z0-9]*$/', $user_name)){
				$errors['user_name'] = 'Letters and numbers only';
			}				
		// else if(preg_match('/^(?=.*[0-9])(?=.*[a-z])^[a-z0-9]{4,16}+$/', $user_name)){
			// $errors['user_name'] = 'Username contains 4 numbers only';
		// }			
		else if(is_numeric($user_name)){
			$errors['user_name'] = 'Username contains max 4 numbers only';
		}
		
	}
		// first name validation
		if(empty($first_name)){ 
			$errors['first_name'] = "Enter your first name";
		}
		else{
			if(strlen($first_name) < 2 ){
				$errors['first_name'] = 'First name must be at least 2 letters';
			}
			if(!preg_match('/^[a-zA-Z]*$/', $first_name)){
				$errors['first_name'] = "First name must be alphabets only";
			}
		}
		// last name validation
		if(empty($last_name)){ 
			$errors['last_name'] = "Enter your last name";
		}
		else{
			if(!preg_match('/^[a-zA-Z-" "]*$/', $last_name)){
				$errors['last_name'] = "Last name must be alphabets and whitespace only";
			}
		}
		// email_address validation
		if(empty($email_address)){ 
			$errors['email_address'] = "Enter your email address";
		}else{
			if(!filter_var($email_address, FILTER_VALIDATE_EMAIL)){
				$errors['email_address'] = "Invalid email address";
			}
		}
		// Password validation
		if(empty($password)){
			$errors['password'] = 'Enter your password';			
		}
		else{
			if(strlen($password) < 3 || strlen($password) > 20){
				$errors['password'] = 'Password must be between 8 and 20 characters';
			}
			else if(!preg_match('#[a-z]+#', $password) && !preg_match('#[A-Z]+#', $password) && !preg_match('#[0-9]+#', $password) && !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password)){
				$errors['password'] = 'Password must be at least 1 lowercase, 1 uppercase, 1 number, 1 special character';
			}
			else if(!preg_match('#[a-z]+#', $password) && !preg_match('#[A-Z]+#', $password) && !preg_match('#[0-9]+#', $password)){
				$errors['password'] = 'Password must be at least 1 lowercase, 1 uppercase, 1 number';
			}
			else if(!preg_match('#[a-z]+#', $password) && !preg_match('#[A-Z]+#', $password) && !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password)){
				$errors['password'] = 'Password must be at least 1 lowercase, 1 uppercase, 1 special character';
			}
			else if(!preg_match('#[a-z]+#', $password) && !preg_match('#[0-9]+#', $password) && !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password)){
				$errors['password'] = 'Password must be at least 1 lowercase, 1 number, 1 special character';
			}			
			else if(!preg_match('#[a-z]+#', $password) && !preg_match('#[A-Z]+#', $password)){
				$errors['password'] = 'Password must be at least 1 lowercase, 1 uppercase';
			}
			else if(!preg_match('#[a-z]+#', $password) && !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password)){
				$errors['password'] = 'Password must be at least 1 lowercase, 1 special character';
			}
			else if(!preg_match('#[A-Z]+#', $password) && !preg_match('#[0-9]+#', $password) && !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password)){
				$errors['password'] = 'Password must be at least 1 uppercase, 1 number, 1 special character';
			}			
			else if(!preg_match('#[A-Z]+#', $password) && !preg_match('#[0-9]+#', $password)){
				$errors['password'] = 'Password must be at least 1 uppercase, 1 number';
			}			
			else if(!preg_match('#[A-Z]+#', $password) && !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password)){
				$errors['password'] = 'Password must be at least 1 uppercase, 1 special character';
			}			
			else if(!preg_match('#[0-9]+#', $password) && !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password)){
				$errors['password'] = 'Password must be at least 1 number, 1 special character';
			}			
			else if(!preg_match('#[a-z]+#', $password)){
				$errors['password'] = 'Password must be at least 1 lowercase';
			}
			else if(!preg_match('#[A-Z]+#', $password)){
				$errors['password'] = 'Password must be at least 1 uppercase';
			}
			else if(!preg_match('#[0-9]+#', $password)){
				$errors['password'] = 'Password must be at least 1 number';
			}
			else if(!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password)){
				$errors['password'] = 'Password must be at least 1 special character';
			}
		}
		// Re-password comfirmation
		if(empty($confirm_password)){			
			$errors['confirm_password'] = 'Confirm your password';			
		}
		else{
			if($confirm_password !== $password){
				$errors['confirm_password'] = 'Password did not match';
			}
		}
			
		// check user exist in the system
		$sql_user_name = "SELECT * FROM users WHERE user_name='$user_name'";
		$sql_email_address = "SELECT * FROM users WHERE email_address='$email_address'";
		
		$result_user_name = mysqli_query($dbconnect, $sql_user_name);
		$result_email_address = mysqli_query($dbconnect, $sql_email_address);

		if (mysqli_num_rows($result_user_name) > 0) {
			$errors['user_name'] = 'Username has already been taken';	
		}
		if(mysqli_num_rows($result_email_address) > 0){
			$errors['email_address'] = "Email address is already in the system";		
		}			
		
		// register into the database if there is no errors
		if(!array_filter($errors)){
			// password encrypted 
			$password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
			
			// save to database			
			$insert_user = "insert into users (user_name, first_name, last_name, email_address, password) 
					values('$user_name', '$first_name', '$last_name', '$email_address', '$password')";
		
			$result = mysqli_query($dbconnect, $insert_user);
			
			// register informs to the user
			if($result){
				echo '<script>alert("You have registered successfuly.")</script>';
				echo '<script>window.open("/index.php", "_self")</script>';			
				echo '<script>window.close();</script>';
			}			
		}	
		mysqli_close($dbconnect);
	}
?>

<style>
	<?php include("../styles/form.css"); ?>
</style>
<!-- Registration Form  -->
<form class="col-lg-6 offset-lg-3 justify-content-center signin_form" action="signup.php" method="post">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="d-flex justify-content-center form_title">
					<h3>Create an Account</h3>
				</div>
				<hr class="mb-3">
				<!--<label for="user_name">Username: </label>-->
				<input class="form-control" type="text" name="user_name" value="<?php echo htmlspecialchars ($user_name);?>" placeholder="Username..."/>				
				<div class="red-text"><?php echo $errors['user_name']; ?></div>
			
				<!--<label for="first_name">First Name: </label>-->
				<input class="form-control" type="text" name="first_name" value="<?php echo htmlspecialchars ($first_name);?>" placeholder="First name..."/>
				<div class="red-text"><?php echo $errors['first_name']; ?></div>
				
				<!--<label for="last_name">Last Name: </label>-->
				<input class="form-control" type="text" name="last_name" value="<?php echo htmlspecialchars ($last_name);?>" placeholder="Last name..."/>
				<div class="red-text"><?php echo $errors['last_name']; ?></div>
			
				<!--<label for="email_address">Email Address: </label>-->
				<input class="form-control" type="email" name="email_address" value="<?php echo htmlspecialchars ($email_address);?>" placeholder="Email address..."/>
				<div class="red-text"><?php echo $errors['email_address']; ?></div>
			
				<!--<label for="password">Password: </label>-->
				<input class="form-control" type="text" name="password" value="<?php echo htmlspecialchars ($password);?>" placeholder="Password..."/>
				<div class="red-text"><?php echo $errors['password']; ?></div>
			
				<!--<label for="confirm_password">Confirm Password: </label>-->
				<input class="form-control" type="password" name="confirm_password" value="<?php echo htmlspecialchars ($confirm_password);?>" placeholder="Confirm password..."/>
				<div class="red-text"><?php echo $errors['confirm_password']; ?></div>
			
				<br/>
				
				<!-- BUTTONS -->	
				<span>By signing in to aBrahaj Inc, you're agreeing to our <a href="#" class="text_link_blue">Terms of Use</a> and <a href="#" class="text_link_blue">Privacy Policy.</a></span>
				</br></br>
				<button type="submit" name="register" class="btn-default btn-submit" >Register<br></button>
				<span style="float: right;">Already Have an Account? &emsp; <a href="signin.php" class="text_link_blue">Sign In</a></span> 
			</div>
		</div>		
	</div>
</form>

<?php 
	// jquery, closed HTML
	include_once("../templates/jquery.php");
?>