<?php
include("includes/connection.php");


if(isset($_GET['semester_exam_id'])){
	
//	echo("id is getted from the url");
	$s_e_id = $_GET["semester_exam_id"];
	$query = mysqli_query($con,"select * from semester_exam where semester_exam_id = '$s_e_id' ");
	$row_Recordset1 = mysqli_fetch_assoc($query);
}
if(isset($_POST["btnUpd"])){
//	echo("yes working");
	$s_id =  $_POST['Semester_Id'];
	$sem = $_POST['semester'];
	$sub_id = $_POST['Subject_Id'];
	$reg_no = $_POST['Reg_No'];
	$roll_no = $_POST['Roll_No'];
	$mid_m = $_POST['Mid_Term_Marks'];
	$final_m = $_POST['Final_Term_Marks'];
	$assignmet_m = $_POST['Assignment_Marks'];
	$pres_m = $_POST['Presentation_Marks'];
	$obt_m = (int)$mid_m+(int)$final_m+(int)$assignmet_m+(int)$pres_m;
	$total_m = $_POST['Total_Marks'];
//	$total_m=
	$status = $_POST['Status'];
	$if_fail = $_POST['if_fail'];
	$if_g = $_POST['if_17g'];
	
	$updateSQL = "UPDATE semester_exam SET Semester_Id='$s_id', semester='$sem', Subject_Id='$sub_id', Reg_No='$reg_no', Roll_No='$roll_no', Mid_Term_Marks='$mid_m', Final_Term_Marks='$final_m', Assignment_Marks='$assignmet_m', Presentation_Marks='$pres_m', Obtained_Marks='$obt_m', Total_Marks='$total_m', Status='$status', if_fail='$if_fail' , if_17g='$if_g' WHERE semester_exam_id=$s_e_id";
                       
//  mysql_select_db($database_connect, $connect);
  $Result1 = mysqli_query($con,$updateSQL) or die(mysqli_error());
	header("location:update_results.php?id=".$roll_no);
	
	
	
}



?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Results</title>
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
            <h1 class="m-0 text-dark">Update Course Results</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Results</li>
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
                <h3 class="card-title">Update Marks</h3>
              </div>
              <!-- /.card-header -->
             <form action="" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Semester_exam_id:</td>
      <td><?php echo $row_Recordset1['semester_exam_id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Semester_Id:</td>
      <td><input type="text" name="Semester_Id" value="<?php echo htmlentities($row_Recordset1['Semester_Id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Semester:</td>
      <td><input type="text" name="semester" value="<?php echo htmlentities($row_Recordset1['semester'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Subject_Id:</td>
      <td><input type="text" name="Subject_Id" value="<?php echo htmlentities($row_Recordset1['Subject_Id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Reg_No:</td>
      <td><input type="text" name="Reg_No" value="<?php echo htmlentities($row_Recordset1['Reg_No'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Roll_No:</td>
      <td><input type="text" name="Roll_No" value="<?php echo htmlentities($row_Recordset1['Roll_No'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mid_Term_Marks:</td>
      <td><input type="text" name="Mid_Term_Marks" id="Mid_Term_Marks" onchange='loader()' value="<?php echo htmlentities($row_Recordset1['Mid_Term_Marks'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Final_Term_Marks:</td>
      <td><input type="text" name="Final_Term_Marks" id="Final_Term_Marks" onchange='loader()'  value="<?php echo htmlentities($row_Recordset1['Final_Term_Marks'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Assignment_Marks:</td>
      <td><input type="text" name="Assignment_Marks" id="Assignment_Marks" onchange='loader()'  value="<?php echo htmlentities($row_Recordset1['Assignment_Marks'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Presentation_Marks:</td>
      <td><input type="text" name="Presentation_Marks" id="Presentation_Marks" onchange='loader()'  value="<?php echo htmlentities($row_Recordset1['Presentation_Marks'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Obtained_Marks:</td>
      <td><input type="text"  name="Obtained_Marks" id="Obtained_Marks" value="<?php echo htmlentities($row_Recordset1['Obtained_Marks'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Total_Marks:</td>
      <td><input type="text" name="Total_Marks" value="<?php echo htmlentities($row_Recordset1['Total_Marks'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Status:</td>
      <td><input type="text" name="Status" id="Status"  value="<?php echo htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
	 <tr valign="baseline">
      <td nowrap="nowrap" align="right">if_fail:</td>
      <td><input type="text" name="if_fail" id='if_fail' value="<?php echo htmlentities($row_Recordset1['if_fail'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
	 <tr valign="baseline">
      <td nowrap="nowrap" align="right">if_17g:</td>
      <td><input type="text" name="if_17g" id='if_17g' value="<?php echo htmlentities($row_Recordset1['if_17g'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
	
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record"  class="btn btn-success" name="btnUpd" /> 
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="semester_exam_id" value="<?php echo $row_Recordset1['semester_exam_id']; ?>" />
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
