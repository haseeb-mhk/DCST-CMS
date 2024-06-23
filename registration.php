<?php   
include("includes/connection.php");
$reg = "";
	$roll_n = "";
	$std_name = "";
	$std_fname = "";
	$shift_std = " Select Shift";
	$session_std = "";
	$program_std = "Select Program";
$display = 'block';
$display2 = 'none';
if(isset($_POST['btnSub'])){
$reg_no = $_POST['Registration'];
	$roll_no = $_POST['roll'];
	$stdname = $_POST['Name'];
	$fname = $_POST['F_Name'];
	$shift = $_POST['Shift'];
	$seesion = $_POST['Session'];
	$program = $_POST['program'];
	$Password = "uos12345";
//	echo($name);
	$query = mysqli_query($con, "INSERT INTO stduent_roll_list (Registration_No, roll, Name,F_Name,Shift,Session,program,Password) VALUES ('$reg_no', '$roll_no', '$stdname','$fname','$shift','$seesion','$program','$Password')");

         
		if($query){
		echo ("<font color='red' size='5'>Record added</font>");
	}else{
		echo ("<font color='red' size='5'>Record Not inserted</font>");
		echo(mysqli_errno($con));
	}
	
}
if(isset($_GET['R_ID'])){
//	echo "updation id is here for serving the functionality of updation";
	$Rid = $_GET['R_ID'];
	$select_query = mysqli_query($con,"select * from stduent_roll_list where roll = '$Rid'");
	$row_d = mysqli_fetch_row($select_query);
	$reg = $row_d[0];
	$roll_n = $row_d[1];
	$std_name = $row_d[2];
	$std_fname = $row_d[3];
	$shift_std = $row_d[4];
	$session_std = $row_d[5];
	$program_std = $row_d[6];
	$display2 = 'block';
	$display = 'none';
}
if(isset($_POST['btnupd'])){
	$reg_no = $_POST['Registration'];
	$roll_no = $_POST['roll'];
	$stdname = $_POST['Name'];
	$fname = $_POST['F_Name'];
	$shift = $_POST['Shift'];
	$seesion = $_POST['Session'];
	$program = $_POST['program'];
	$Password = "uos12345";

	$upd = mysqli_query($con, "UPDATE stduent_roll_list SET Registration_No = '$reg_no', roll = '$roll_no', Name = '$stdname', F_Name = '$fname', Shift = '$shift', Session = '$seesion', program = '$program', Password = '$Password' where roll = '$Rid' ");

    if ($upd) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . mysqli_error($upd	);
    }


//	$upd = mysqli_query($con,"update stduent_roll_list set Registration_No = '$reg_no',roll = '$roll_no',Name = '$std_name',F_Name = '$fname',Shift = '$shift',Session= '$seesion',program = '$program',Password = '$Password'");
//	if($upd){
//		echo("Record updated successfully");
//	}
//	else{
//		echo(mysqli_errno($con));	
//	}
	
}



?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Students</title>
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
            <h1 class="m-0 text-dark">Add New Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	  <hr>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		  
		  
<div class="row">

	 <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-exclamation-triangle"></i>
                  Upload new csv by browsing to file and clicking on Upload
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
				  
				   <a href="save.csv" class="btn btn-danger float-right"> Download File Format </a>
           <div id="container">
<div id="form">

<?php

include ('includes/connection.php'); //Connect to Database

//$deleterecords = "TRUNCATE TABLE tablename"; //empty the table of its current records
//mysqli_query($deleterecords);

//Upload File
if (isset($_POST['submit'])) {
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
		
	}

	//Import uploaded file to Database
	$handle = fopen($_FILES['filename']['tmp_name'], "r");
//	skip the first line
	fgetcsv($handle);

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	$rol = $data[1];
		$select_Q = mysqli_query($con,"Select * from stduent_roll_list where roll = '$rol'");
		$check = mysqli_num_rows($select_Q);
		if($check > 0){
			echo "Data already exist in Database";
		}
		else{
		$import="INSERT into stduent_roll_list(Registration_No, roll, Name, F_Name, Shift, Session, program, Password) 
				values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')";

		mysqli_query($con,$import) or die(mysqli_error());
		}
	}

	fclose($handle);

	print "Import done";

	//view upload form
}else {

	
	print "<form enctype='multipart/form-data' action='' method='post'>";

//	print "File name to import:<br />\n";

	print "<input size='50' type='file' name='filename' class= 'btn btn-secondary'><br />\n <br />";

	print "<input type='submit' name='submit' value='Upload' class= 'btn btn-success'></form>";

}

?>

</div>
</div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
	

    <!-- Import link -->
<!--
    <div class="col-md-12 head">
        <div class="note-float-left">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import CSV</a>
        </div>
    </div>
-->
    <!-- CSV file upload form -->
<!--
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form action="importData.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="btnSubmit" value="Import">
        </form>
    </div>
-->


</div>
		  
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
                <h3 class="card-title">Students_Registration</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Registration No</label>
                    <input type="text" class="form-control" id="subject_code" placeholder="Enter Registration No" name="Registration" value="<?php echo($reg) ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Roll No</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Roll No" name="roll" value="<?php echo($roll_n) ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control"  placeholder="Enter Name" name="Name" value="<?php echo($std_name) ?>" required>
                  </div>
					
					 <div class="form-group">
                    <label for="exampleInputEmail1">Father Name</label>
                    <input type="text" class="form-control" id="subject_credits" placeholder="Enter Father Name" name="F_Name" value="<?php echo($std_fname) ?>" required>
                  </div>
					<div class="form-group">
                    <label for="exampleInputEmail1">Session (e.g: 2021-25)</label>
                    <input type="text" class="form-control" id="subject_credits" placeholder="Enter Session" name="Session" value="<?php echo($session_std) ?>" required>
                  </div>
					 <div class="form-group">
                     <label>Program </label>
                  <select class="form-control select2 "  style="width: 100%;" data-dropdown-css-class="select2-purple" name="program" required>
                    <option selected="selected"><?php echo($program_std) ?></option>
                    <option>BCS</option>
                    <option>BS-IT</option>
                    <option>SE</option>
                  
                  </select>
                  </div>
						<div class="form-group">
                  <label>Shift</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="Shift" required>
                    <option selected="selected"><?php echo($shift_std) ?></option>
                    <option>Morning</option>
                    <option>Evening</option>
                    
                   
                  </select>
                </div>
					
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnSub" style="display: <?php echo($display)?>">Submit</button>
                  <button type="submit" class="btn btn-success" name="btnupd"  style="display: <?php echo($display2)?>">Update</button>
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
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>
	
</body>
</html>
