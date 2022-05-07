<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("location:auth-login.php");   
} 
include("include/db.php");

?>

<!doctype html>
<html lang="en">

    
<head>
        
        <meta charset="utf-8" />
        <title>Judges Rating List </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logo/favicon.ico">


          <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

        <?php include("include/header.php") ?>  

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <?php include("include/leftbar.php") ?>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Judges Rating List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Judges Rating All List</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="width: 70px;">#</th>
                                                        <th scope="col">Group Members</th>
                                                        
                                                        <th scope="col">Group Number</th>
                                                        <th scope="col">Project Title</th>
                                                        <th scope="col">Developing Average</th>
                                                        <th scope="col">Accomplished Average</th>
                                                        <th scope="col">Judge Name</th>
                                                        <th scope="col">Comments</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php                                                         
                                                        $user_list=mysqli_query($db,"SELECT * FROM `judge_rate`  ORDER BY id DESC");
                                                       
                                                        while($user_row = mysqli_fetch_array($user_list))
                                                        {
                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $user_row['id'];   ?> </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="#" class="text-dark"><?php echo $user_row['group_members'] ?></a></h5>
                                                        </td>
                                                        
                                                        <td><?php echo $user_row['group_number'];   ?></td>
                                                        <td><?php echo $user_row['project_title'];   ?></td>
                                                        <td><?php echo $user_row['dev_avg'];   ?></td>
                                                        <td><?php echo $user_row['acc_avg'];   ?></td>
                                                        <td><?php echo $user_row['judge_name'];   ?></td>
                                                        <td><?php echo $user_row['comments'];   ?></td>
                                                        
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <?php include("include/footer.php") ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

      
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

          <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

         <!-- App js -->
         <script src="assets/js/pages/datatables.init.js"></script> 
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>
        


        <script type="text/javascript">
        $(document).on('click','.status_checks',function(){
              var status = ($(this).hasClass("btn-success")) ? '0' : '1';
              var msg = (status=='0')? 'Deactivate' : 'Activate';
              if(confirm("Are you sure to "+ msg)){
                var current_element = $(this);
                url = "ajax/ajax_appointment_list.php";
                $.ajax({
                  type:"POST",
                  url: url,
                  data: {id:$(current_element).attr('data'),status:status},
                  success: function(data)
                  {   
                    location.reload();
                  }
                });
              }      
            });
        </script>



        
    </body>

</html>
