<?php 
	$logout = check_signin($dbconnect);
	if($logout == "Account"){
		echo '<img src="../images/sunshine.jpg" class="img-fluid rounded mx-auto d-block" alt="sun shine" style="width:55rem;">';
	}
?>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4">
	<div class="foot_wrapper">
	
	</div>
	<!-- Footer Links -->
	<div class="container-fluid text-center text-md-left">

		<!-- Grid row -->
		<div class="row">

			<!-- Grid column -->
			<div class="col-md-6 mt-md-0 mt-3">

				<!-- Content -->
				<h5 class="text-uppercase">Contact Us</h5>
				<p>You can use the links to the right to contact us.</p>

			</div>
			<!-- Grid column -->

			<hr class="clearfix w-100 d-md-none pb-3">

			<!-- Grid column -->
			<div class="col-md-3 mb-md-0 mb-3">

				<!-- Links -->
				<h5 class="text-uppercase">Links</h5>

				<ul class="list-unstyled">
					<li>
						<a href="#"><i class="fab fa-facebook-square fa-lg" style="color:#07216c" ></i></a>  
					</li>
					<li>
						<a href="#"><i class="fab fa-youtube-square fa-lg" style="color:#6e2f17"></i></a>
					</li>
					<li>
						<a href="#"><i class="fab fa-twitter-square fa-lg" style="color:#00acee"></i></a>
					</li>
					<li>
						<a href="#"><i class="fab fa-instagram-square fa-lg" style="color:#c890e9"></i></a>
					</li>
				</ul>

			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-md-3 mb-md-0 mb-3">

			<!-- Links -->
			<h5 class="text-uppercase">Links</h5>

			<ul class="list-unstyled text_link">
				<li>
					<a href="#"><i class="fab fa-pinterest-square fa-lg" style="color:#972f3f"></i></a>
				</li>
				<li>
					<a href="#"><i class="fab fa-google-plus-square fa-lg" style="color:#4285F4"></i></a>
				</li>
				<li>
					<a href="#"><i class="fab fa-linkedin fa-lg" style="color:#0c5578"></i></a>
				</li>
				<li>
					<a href="#"><i class="fab fa-snapchat-square fa-lg" style="color:#FFFC00"></i></a>
				</li>
			</ul>

			</div>
			<!-- Grid column -->

		</div>
		<!-- Grid row -->

	</div>
	<!-- Footer Links -->

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">© 2022 Copyright:
		<span class="text_link" style="color: white;" ><a href="../index.php"> aBrahaj.edu</a></span> All rights reserved.
	</div>
	<!-- Copyright -->
</div>
</footer>
<!-- FOOTER end --> 	

<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--Scripts	-->
<script src="../js/jquery.min.js"></script>

<!-- Optional JavaScript; choose one of the two! -->
    
<!-- Option 1: Separate Popper and Bootstrap JS -->
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap5.min.js"></script>	
<!-- Option 2: Bootstrap Bundle with Popper 
<script src="../js/bootstrap.bundle.min.js"></script>	
-->

<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(){
		/////// Prevent closing from click inside dropdown
		document.querySelectorAll('.dropdown-menu').forEach(function(element){
			element.addEventListener('click', function (e) {
				e.stopPropagation();
			});
		})
	});
	// DOMContentLoaded  end 
</script>

</body>
<!-- BODY end -->
</html>
<!-- HTML closed -->