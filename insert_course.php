<?php
include("includes/connection.php");
$display = "block";
$display2 = "none";
$sub_c = "";
	$sub_n = "";
	$sub_cr = "";
	$sub_tm = "";

if(isset($_POST['btnsub'])){
	
	$s_c = $_POST["subject_code"];
	$s_n = $_POST["subject_name"];
	$s_cr = $_POST["subject_credits"];
	$t_m = $_POST["Total_Marks"];
	
	$insert = mysqli_query($con,"insert into subject_list(Sub_Code,Sub_Name,Sub_Cridet,Sub_Total_Marks)
	Values('$s_c','$s_n','$s_cr','$t_m')");
	if($insert){
		
		echo "data inserted successfully";
	}
	else{
		
		echo("not inserted");
		echo(mysqli_errno($con));
	}
	
	
}

//selecting data through id 
if(isset($_GET["UID"])){
	$Uid = $_GET["UID"];
	$select_subject = mysqli_query($con,"select * from subject_list where Id  = '$Uid'");
	$row_select_query = mysqli_fetch_row($select_subject);
	$sub_c = $row_select_query[1];
	$sub_n = $row_select_query[2];
	$sub_cr = $row_select_query[3];
	$sub_tm = $row_select_query[4];
	$display ="none";
	$display2 ="block";
	
}
if(isset($_POST["btnupd"])){
	$s_c = $_POST["subject_code"];
	$s_n = $_POST["subject_name"];
	$s_cr = $_POST["subject_credits"];
	$t_m = $_POST["Total_Marks"];
	$upd_query = mysqli_query($con,"update subject_list set Sub_Code = '$s_c',Sub_Name = '$s_n',Sub_Cridet = '$s_cr',Sub_Total_Marks = '$t_m' where Id = '$Uid' ");
	if($upd_query){
		header("location:insert_course.php");
		
	}
	else{
		echo(mysqli_errno($con));
	}
}



?>
   
   
   
   <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Courses</title>
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
            <h1 class="m-0 text-dark">Add New Courses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Course</li>
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
                <h3 class="card-title">Insert course details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Subject code</label>
                    <input type="text" class="form-control" id="subject_code" placeholder="Enter subject code" name="subject_code" value="<?php echo($sub_c) ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Subject Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Subject name" name="subject_name"  value="<?php echo($sub_n) ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Subject Credits</label>
                    <input type="number" class="form-control" id="subject_credits" placeholder="Enter subject credits" name="subject_credits"  value="<?php echo($sub_cr) ?>">
                  </div>
					
					 <div class="form-group">
                    <label for="exampleInputEmail1">Subject total marks</label>
                    <input type="number" class="form-control" id="subject_credits" placeholder="Enter Total Marks" name="Total_Marks"  value="<?php echo($sub_tm) ?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnsub" style="display: <?php echo($display)?>">Submit</button>
                  <button type="submit" class="btn btn-success" name="btnupd"  style="display: <?php echo($display2)?>" >Update</button>
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
