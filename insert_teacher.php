<?php
include('includes/connection.php');
$display = "block";
$display2 = "none";
$teach_name = "";
	$teach_email = "";
	$teach_password = "";
if(isset($_POST["btnsub"])){
	$t_n = $_POST["teacher_name"];
	$t_e = $_POST["teacher_email"];
	$t_p = $_POST["teacher_password"];
	$roll = "lecturer";
	
	$insert_query = mysqli_query($con,"insert into teacher_list (`Teacher_Name`, `uos_email`, `uos_password`, `Roll`) value('$t_n','$t_e','$t_p','$roll')");
	if($insert_query){
		echo("Record inserted successfully");
	}
	else{
	echo("record not inserted".mysqli_errno($insert_query));
	}
	
}
if(isset($_GET["UID"])){
	$uid =$_GET["UID"];
	$select_teacher = mysqli_query($con,"select * from teacher_list where Teacher_Id = '$uid'");
	$row_select_teacher = mysqli_fetch_row($select_teacher);
	$teach_name = $row_select_teacher[1];
	$teach_email = $row_select_teacher[2];
	$teach_password = $row_select_teacher[3];
	$display = "none";
	$display2 = "block";
	
}
if(isset($_POST["btnupd"])){
	$t_n = $_POST["teacher_name"];
	$t_e = $_POST["teacher_email"];
	$t_p = $_POST["teacher_password"];
	$roll = "lecturer";
	$upd = mysqli_query($con,"UPDATE `teacher_list` SET `Teacher_Name`='$t_n',`uos_email`='$t_e',`uos_password`='$t_p',`Roll`='$roll' WHERE Teacher_Id = '$uid'");
	if($upd){
		
		echo("data updated successfully");
	}else{
		echo("data not updated yet".mysqli_errno($upd));
	}
}



?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Teachers</title>
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
            <h1 class="m-0 text-dark">Add New Teacher</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add new Teacher</li>
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
			  
			  <div class="col-3"></div>
			  <div class="col-6">
	
         <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Insert New Teacher</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher Name</label>
                    <input type="text" class="form-control" id="teacher_name" placeholder="Enter Teacher Name" name="teacher_name" value="<?php echo($teach_name); ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Teacher Email" name="teacher_email" value="<?php echo($teach_email); ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" id="teacher_password" placeholder="Enter Password" name="teacher_password" value="<?php echo($teach_password); ?>">
                  </div>
					
					
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnsub" style="display: <?php echo($display)?>">Insert</button>
                  <button type="submit" class="btn btn-success" name="btnupd" style="display: <?php echo($display2)?>">Update</button>
                </div>
              </form>
            </div> 	
	
	
	
	</div>
			  <div class="col-3"></div>
			  
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
