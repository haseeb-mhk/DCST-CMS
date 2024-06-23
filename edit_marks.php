<?php
include('includes/connection.php');

if(isset($_GET['a'])){
	
	$s_exam_id = $_GET['a'];
	
	$select  = mysqli_query($con,"Select * from semester_exam where semester_exam_id = '$s_exam_id'");
	
	if($select){
		
		echo("Data laoded");
		
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
            <h1 class="m-0 text-dark">Edit Marks</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Marks</li>
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
                <h3 class="card-title">Edit Marks</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Semester Id</label>
                    <input type="text" class="form-control" id="" name="semester_id" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">semester</label>
                    <input type="text" class="form-control" id=""  name="semester" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Subject_Id</label>
                    <input type="text" class="form-control" id="" name="subject_id" value="">
                  </div>
					<div class="form-group">
                    <label for="exampleInputEmail1">Registration No</label>
                    <input type="text" class="form-control" id="" name="registration_no" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Roll No</label>
                    <input type="text" class="form-control" id=""  name="roll_no" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mid Marks</label>
                    <input type="text" class="form-control" id="" name="mid_marks" value="">
                  </div> 
					<div class="form-group">
                    <label for="exampleInputEmail1">Final Marks </label>
                    <input type="text" class="form-control" id="" name="final_marks" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Assignment Marks</label>
                    <input type="text" class="form-control" id=""  name="assignment_marks" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Presentation Marks</label>
                    <input type="text" class="form-control" id="" name="presentation_marks" value="">
                  </div>
					<div class="form-group">
                    <label for="exampleInputEmail1"> Obtained Marks</label>
                    <input type="text" class="form-control" id="" name="obtained_marks" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Total Marks</label>
                    <input type="text" class="form-control" id=""  name="total_marks" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input type="text" class="form-control" id="" name="status" value="">
                  </div>
					
					
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnupd">Update Records</button>
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
