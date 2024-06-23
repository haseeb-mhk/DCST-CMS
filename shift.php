<?php 
include("includes/connection.php");
$sem_id = $_GET['sem_id'];
$source = $_GET['source'];

if(isset($_POST["btnsub"])){
	$shift = $_POST["shift"];
	
	if($source=="insert_semester_wise_AL.php"){
	header('location:assign_semester_subj_list.php?sem_id='.$sem_id.'&shift='.$shift);
}
else if($source=="view_current_semester_result.php"){
	$sem_Id = $_GET['sem_id'];
$semester = $_GET['semester'];
$program = $_GET['program'];
$batch = $_GET['batch'];
	header('location:result_sheet.php?sem_id='.$sem_Id.'&semester='.$semester.'&program='.$program.'&batch='.$batch.'&shift='.$shift);
}
else{
	header('location:view_assign_subject_list.php?sem_id='.$sem_id.'&shift='.$shift);
}
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
			  
			  <div class="col-3"></div>
			  <div class="col-6">
	
         <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Select Shift</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                  <label>Shift</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="shift">
                    <option selected="selected">Select Shift</option>
                    <option>Morning</option>
                    <option>Evening</option>
                   
                   
                  </select>
                </div>
					
					
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                 <button type="submit" class="btn btn-primary" name="btnsub">Submit</button>
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
