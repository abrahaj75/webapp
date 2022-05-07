	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!--Scripts	-->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap4.min.js"></script>	
	<script src="../js/bootstrap5.min.js"></script>	
	
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

</html>