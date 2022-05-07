<?php
session_start();
// connection to the database
	include("functions/dbconnection.php");
	// check whether user logged in or not
	include ("functions/check_signin.php");
	
	// check whether user logged in or not
	// include ("functions/signin_data.php");
	
// TEMPLATES @header, @body	
	include("templates/header.php");
// @body
	include("templates/topNavbar.php");
	
	$group_members = $group_number = $project_title = $judge_name = $comments = $developing_avg = $accomplished_avg = "";
?>
	
<!--BODY CONTENT-->
<div class="main-content" style="background: #b3cccc;">
	<div class="page-content">
		<div class="container-fluid">
			<!-- start page title -->
			<div class="row justify-content-center">
				<div class="col-6">
					<div class="page-title-box d-flex align-items-center justify-content-between">
						<h4 class="mb-0 font-size-18">Judges Rating</h4>						
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row justify-content-center">
				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<form method="POST">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="group_members">Group Members :</label>
											<input id="productname" name="group_members" type="number" min="1" step="1" class="form-control" required>
										</div>
										<div class="form-group">
											<label for="group_number">Group Number :</label>
											<input id="productname" name="group_number" type="text" class="form-control" required>
										</div>
										<div class="form-group">
											<label for="project_title">Project Title :</label>											
											<select class="form-control" name="project_title" required >
												<option value="">Select Project Title</option>
												
												<?php // copied from getBrands.php
												$get_major_title="select * from major";
												$run_major_title =  mysqli_query($dbconnect, $get_major_title);

												while($row_major_title = mysqli_fetch_assoc($run_major_title)){		
													// localname     [fetch from db]
													$major_id = $row_major_title["major_id"]; // gets id from table
													$major_title = $row_major_title["major_title"]; // gets title from table

													echo "<option value='$major_id'>$major_title</option>";
												}
												?>
											</select>
										</div>
										<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
											<thead class="thead-light">
												<th></th>
												<th scope="col">Developing (0-10)</th>
												<th scope="col">Accomplished (10-15)</th>
											</thead>
											<tbody>
												<tr>
													<td>Articulate requirements</td>
													<td><input id="manufacturerbrand" name="developing_1" type="number" min="1" step="1" max="10" class="form-control" required></td>
													<td><input id="manufacturerbrand" name="accomplished_1" type="number" min="10" step="1" max="15" class="form-control" required></td>
												</tr>
												<tr>
													<td>Choose appropriate tools and methods for each task</td>
													<td><input id="manufacturerbrand" name="developing_2" type="number" min="1" step="1" max="10" class="form-control" required></td>
													<td><input id="manufacturerbrand" name="accomplished_2" type="number" min="10" step="1" max="15" class="form-control" required></td>
												</tr>
												<tr>
													<td>Give clear and coherent orat presentation</td>
													<td><input id="manufacturerbrand" name="developing_3" type="number" min="1" step="1" max="10" class="form-control" required></td>
													<td><input id="manufacturerbrand" name="accomplished_3" type="number" min="10" step="1" max="15" class="form-control" required></td>
												</tr>

												 <tr>
													<td>Function well as a team</td>
													<td><input id="manufacturerbrand" name="developing_4" type="number" min="1" step="1" max="10" class="form-control" required></td>
													<td><input id="manufacturerbrand" name="accomplished_4" type="number" min="10" step="1" max="15" class="form-control" required></td>
												</tr>
												
											</tbody>                                                        
										</table>
										<div class="form-group">
											<label for="judge_name">Judge's Name :</label>											
											<input id="productname" name="judge_name" type="text" class="form-control" required>
										</div>
										<div class="form-group">
											<label for="comments">Comments :</label>
											<textarea class="form-control" id="productname" name="comments" rows="5" required ></textarea>
										</div>
									</div>
								</div>
								<button type="submit" name="submit" class="btn btn-primary mr-1 waves-effect waves-light">Send</button>
								<button type="submit" class="btn btn-secondary waves-effect">Cancel</button>
							</form>
						</div>
						<?php  
							if(isset($_POST['submit'])){
								$group_members = $_POST['group_members'];
								$group_number = $_POST['group_number'];
								$project_title = $_POST['project_title'];
								$judge_name = $_POST['judge_name'];
								$comments = $_POST['comments'];

								$developing_1 = $_POST['developing_1'];
								$developing_2 = $_POST['developing_2'];
								$developing_3 = $_POST['developing_3'];
								$developing_4 = $_POST['developing_4'];

								$developing_avg =  ($developing_1 + $developing_2 + $developing_3 + $developing_4)/4;

								$accomplished_1 = $_POST['accomplished_1'];
								$accomplished_2 = $_POST['accomplished_2'];
								$accomplished_3 = $_POST['accomplished_3'];
								$accomplished_4 = $_POST['accomplished_4'];

								$accomplished_avg =  ($accomplished_1 + $accomplished_2 + $accomplished_3 + $accomplished_4)/4;
								
								$sql =mysqli_query($dbconnect,"INSERT INTO judge_rate (group_members, group_number, project_title, judge_name, comments, developing_avg, accomplished_avg)
											VALUES('$group_members', '$group_number', '$project_title', '$judge_name', '$comments', '$developing_avg', '$accomplished_avg')");
							?>
							<div class="row">
								 <div class="col-sm-9">
									<div class="card-box">
										<div class="card-body ">
											<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
												<thead class="thead-light">
													<th></th>
													<th scope="col">Developing(0-10)</th>
													<th scope="col">Accomplished(10-15)</th>
												</thead>
												<tbody>
													<tr>
														<td>Total</td>
														<td><?php echo $developing_avg; ?></td>
														<td><?php echo $accomplished_avg; ?></td>
													</tr>
												</tbody>
											</table>
										 </div>
									 </div>
								 </div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="card-box">
										<div class="card-body ">
											<div class="alert alert-success">
												<strong>Well done!</strong>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php 
						}	
						?>
					</div>
				</div>
			</div>
			<!-- end row -->
		</div> <!-- container-fluid -->
	</div>
	<!-- End Page-content -->
</div>



<!--BODY CONTENT end -->
<?php 
	include("templates/footer.php");
?>