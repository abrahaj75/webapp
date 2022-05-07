<?php
	$username = check_signin($dbconnect);
?>
<nav class="navbar navbar-expand-lg">
	<div class="container-fluid">
		<a class="navbar-brand" href="../index.php">
			<img class="logo" src="images/logo-full.png">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
		</button>
		<!-- start page title -->
		<div class="row" style="margin-right: 3.7rem;">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<div class="page-title-right">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0 nav_menu">				
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle navbar_menu_link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php echo $username; ?>
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">						
									<?php 							
										if($username == "Account"){
											// echo '<li><a class="dropdown-item" href="#">Raiting Form</a></li>';
											// echo '<li><a class="dropdown-item" href="#">Raiting List</a></li>';
										}							
										if($username == "Abrahaj"){
											echo '<li><a class="dropdown-item" href="../rateForm.php"></i>Raiting Form </a></li>';
											echo '<li><a class="dropdown-item" href="../rateList.php"></i>Raiting List </a></li>';
										}
										if($username != "Abrahaj" && $username != "Account"){
											echo '<li><a class="dropdown-item" href="../rateForm.php"></i>Raiting Form </a></li>';
										}
									?>						
									<li>
										<?php //if(!isset($_SESSION["user_name"]) && !isset($_SESSION["email_address"])){
											if($username == 'Account'){
												echo '<a class="dropdown-item" href="../account/signin.php"><i class="far fa-sign-in-alt menu_icons"></i>Sign In / <i class="far fa-registered menu_icons"></i>Register</a>';
											}
											else {
												echo '<a class="dropdown-item" href="../account/signout.php"><i class="far fa-sign-out-alt menu_icons"></i>Sign out</a>'; 	
											}
										?>	
									</li>
								</ul>			
							</li>
						</ul>	
					</div>
				</div>
			</div>
		</div>
		<!-- end page title -->		
	</div>
</nav>