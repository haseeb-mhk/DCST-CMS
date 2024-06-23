<?php 
include("includes/connection.php");
$status = "Active";
$current_Semesters = mysqli_query($con, "select * from semester where Status ='$status' "); 

if (!empty($_GET["sem_id"])) {
	$sem_id = $_GET['sem_id'];
	$sh = $_GET['shift'];
//	echo($sem_id);
//	echo " I get the id now what to do! ";
//getting assign subject in current semester
    $assign_subjects = mysqli_query($con, "select * from assign_subject where Semester_Id='$sem_id' and Shift = '$sh'");
//$row= mysqli_fetch_assoc($assign_subjects);
	//    $r2=mysqli_num_rows($assign_subjects);
//		echo($r2);
	

//Getting semester
$semester = mysqli_query($con,"select * from semester where semester_id ='$sem_id'"); 
	$sem_r = mysqli_fetch_row($semester);
	$sem_Name=$sem_r[1];
	$batch = $sem_r[2];
	$p_name = $sem_r[3];

}
	
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Award Lists</title>
	<?php include "includes/links.php"?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include "includes/header.php"?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
	 <?php include "includes/sidepanel.php"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Semester Wise Award Lists</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Award Lists</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
       
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-12 connectedSortable">

<div class="row">
	      <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Award List for Current Semesters <?php echo($sem_Name)?> of <?php echo($p_name." ". $batch)  ?>   </h3>
              </div>
              <div class="card-body">
               <div class="card">
              <div class="card-header">
                

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                   <thead>
                    <tr>
                      <th style="width: 10px">S.No#</th>
                      <th>Semester Wise  Lists</th>
                    </tr>
                  </thead>
                  <tbody>
					  
					<?php 
	$i = 1;
	while($row = mysqli_fetch_array($assign_subjects)){ 	
	
			$subject_code = $row['Subject_Code'];
		
		$subject = mysqli_query($con,"Select * from subject_list where Sub_Code = '$subject_code' ");
	$s_r = mysqli_fetch_row($subject);
$Sub_Name = $s_r[2];		  
					  ?>  
                    <tr>
                      <td><?php echo($i) ?></td>
                      <td>  <a href="award_list.php?sub_id=<?php echo $row['assign_subject_id']?>">
					  Award list for subject <?php echo ($Sub_Name); ?> 
					  of <?php echo $row['Program_Name']; ?>
					   <?php echo $row['Shift']; ?></a></td>  
						
					
                    </tr>
                  <?php

$i = $i+1;
} ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
				  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
         
	      <div class="col-md-2"></div>
        </div>         

         
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php include "includes/footer.php"?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
