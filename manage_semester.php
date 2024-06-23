<?php include("includes/connection.php");

	
$status = 'Active';
$subjects = mysqli_query($con, "select * from subject_list"); 
$teachers = mysqli_query($con, "select * from teacher_list"); 
$semes = mysqli_query($con, "select * from semester where Status = '$status'"); 

//for offered new semester
$s_name ="select semester";
	$s_batch ="select batch ";
	$s_program ="select program";
	$s_status =" ";

//insertion
if(isset($_POST['btnsem'])){
	
	
$status = 'Active';
	$sem = $_POST['sem'];
	$batch = $_POST['batch'];
	$program = $_POST['program'];
	$query = mysqli_query($con, "Insert into semester (semester,session,Program_Name,Status) 
	values ('$sem','$batch','$program','$status') ");
	header("location:manage_semester.php");
}
//insertion Ends
//updation 
$display = 'none';
$display2 = 'none';
//Getting the data by semester id for updation

if(isset($_GET['SID'])){
	$sid= $_GET['SID'];
	$display = 'block';
	$display2 = 'none';
	$s = mysqli_query($con,"select * from semester where semester_id = '$sid'");
	$r = mysqli_fetch_row($s);
	$s_name = $r[1];
	$s_batch = $r[2];
	$s_program = $r[3];
	$s_status = $r[4];
}
//updating the data according to the semester id 
if(isset($_POST['btnupd'])){
	
	$sem = $_POST['sem'];
	$batch = $_POST['batch'];
	$program = $_POST['program'];
	$status = $_POST['status'];
	$up = mysqli_query($con, "Update semester set semester='$sem',session='$batch',Program_Name='$program',Status='$status' where semester_id='$sid'");
	if($up){
		
//		echo('Data updated successfully');
		header("location:Semester_list.php");
		
	}
	else{
		echo(mysqli_error($up));
	}
}
//updation end
//offered new semester End

//offered Subject in new semester
if(isset($_POST['btnsubject'])){
	$sub_code = $_POST['subject_code'];
	$teacher_id = $_POST['teacher_id'];
	$semester_id = $_POST['semester_id'];
	$porgram_n = $_POST['_program'];
	$sh = $_POST['shift'];
	$query2 = mysqli_query($con, "Insert into assign_subject (Subject_Code,Teacher_Id,Semester_Id,Program_Name,Shift) 
	values ('$sub_code','$teacher_id','$semester_id','$porgram_n','$sh') " );
	if($query2){
		echo("query execute successfully");
	}
	else{
		echo(mysqli_error($query));
	}
}
//for updation of assign_subject
//
if(isset($_GET['uid'])){
	$a_s_uid = $_GET['uid'];
	$display2 = 'block';
	$a_s_upd_query = mysqli_query($con,"select * from assign_subject where assign_subject_id = '$a_s_uid'");
 $a_s_row = mysqli_fetch_row($a_s_upd_query);
	if($a_s_row){
	$a_s_code=$a_s_row[1]; 
	$a_s_teacher=$a_s_row[2]; 
	$a_s_semester_id=$a_s_row[3]; 
	$a_s_program=$a_s_row[4]; 
	$a_s_shift = $a_s_row[5];
	$a_s_status = $a_s_row[6];
		$query_a_s_subject = mysqli_query($con,"Select * from subject_list where Sub_Code='$a_s_code'");
		$row_query_a_s_subject = mysqli_fetch_row($query_a_s_subject);
		$a_subject_name = $row_query_a_s_subject[2];
		$query_a_teacher = mysqli_query($con,"Select * from teacher_list where Teacher_Id = '$a_s_teacher'");
		$row_query_a_s_teacher = mysqli_fetch_row($query_a_teacher);
		$a_s_teacher_name = $row_query_a_s_teacher[1];
		$query_a_s_semester = mysqli_query($con,"Select * from semester where semester_id = '$a_s_semester_id'");
		$row_query_a_s_semester = mysqli_fetch_row($query_a_s_semester);
		$a_s_semester_id = $row_query_a_s_semester[0];
		$a_s_semester = $row_query_a_s_semester[1];
		$a_s_session = $row_query_a_s_semester[2];
		$a_s_program = $row_query_a_s_semester[3];
		
	}
	
	
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Semesters</title>
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
            <h1 class="m-0 text-dark">Manage Semester</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Manages Semesters</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<hr style="border: 1px solid black">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          
          <section class="col-lg-12 connectedSortable">
			  
			  <div class="row">
			   <div class="col-lg-4">
			  
			    <button type="button" class="btn btn-block btn-outline-primary " id = "btn">offered New Semester</button>
				 
			  </div>
			   <div class="col-lg-4">
			  
			    <button type="button" class="btn btn-block btn-outline-secondary" id="btn2">offered subject in new Semester</button>
			  </div> 
				 
				   <div class="col-lg-4">
					   <a href="Semester_list.php" class="btn btn-block btn-outline-warning">Semester List</a>

			  
			  </div>
			  </div>
<br>

         	    <div class="row">
			  <div class="col-lg-3"></div>
			   <div class="col-lg-6">
			  
				   <div class="card card-primary" style="display: <?php echo($display) ?>" id="form1">
              <div class="card-header">
                <h3 class="card-title"> Offered New Semester</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                     <label> Semester</label>
                  <select class="form-control select2 "  style="width: 100%;" data-dropdown-css-class="select2-purple" name="sem">
                    <option selected="selected"><?php echo($s_name)?></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                  </select>
                  </div>
                  <div class="form-group">
                     <label> Batch</label>
                  <select class="form-control select2 "  style="width: 100%;" data-dropdown-css-class="select2-purple" name="batch">
                    <option selected=" selected"><?php echo($s_batch)?></option>

					  <?php 
//	$discipline = "Bachelor's";
	$select_batches = mysqli_query($con,"select * from batches where Discipline = 'Bachelor'");
					  while($row_batches = mysqli_fetch_array($select_batches)){
					  
					  ?>
					  <option ><?php echo($row_batches['session']) ?> </option>
					  <?php } ?>

                  <option value="">MS</option>
                 
					  <?php 
//	$discipline = "Bachelor's";
	$select_batches = mysqli_query($con,"select * from batches where Discipline = 'Master'");
					  while($row_batches = mysqli_fetch_array($select_batches)){
					  
					  ?>
					  <option><?php echo($row_batches['session']) ?> </option>
					  <?php } ?>
            
                  </select>
                  </div>
                  <div class="form-group">
                     <label>Program Name</label>
                  <select class="form-control select2 "  style="width: 100%;" data-dropdown-css-class="select2-purple" name="program">
                    <option selected="selected"><?php echo($s_program)?></option>
                    <option>BCS</option>
                    <option>BS-IT</option>
                    <option>SE</option>
                    <option>MS-CS</option>
                    <option>PHD-CS</option>
                    <option>MCS</option>
                  </select>
                  </div>
 <div class="form-group" style="display: <?php echo($display)?>">
                     <label>Status</label>
                  <select class="form-control select2 "  style="width: 100%;" data-dropdown-css-class="select2-purple" name="status">
                    <option selected="selected"><?php echo($s_status)?></option>
                    <option>Active</option>
                    <option>InActive</option>
                   
                  </select>
                  </div>                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
					<div class="row">
					
					<div class="col-2">
						<button type="submit" class="btn btn-primary" name="btnsem" >Submit</button>
						</div>
						<div class="col-6">
						<button type="submit" class="btn btn-success" name="btnupd" style="display: <?php echo($display)?>">Update</button>
						</div>
					
					
					</div>
                  
                  
                </div>
              </form>
            </div>
				   
			  </div>
				   <div class="col-lg-3"></div>
			  </div>
			  <div class="row">
			  <div class="col-lg-3"></div>
			   <div class="col-lg-6">
			  
				   <div class="card card-secondary" style="display: <?php echo($display2)?>" id="form2">
              <div class="card-header">
                <h3 class="card-title"> offered Subject in New Semester</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                  <label>Subject Name</label>
				  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="subject_code">
					  
                    <option selected="selected">Select subject </option>
					  <?php 
					  while ($row = mysqli_fetch_array($subjects)) {
					  ?>	  
                
                    <option value="<?php echo($row['Sub_Code'])?>" >
						<?php echo ($row["Sub_Name"]." | Cr.H: (".$row["Sub_Cridet"].")");?> </option>
					  <?php } ?>
                    </select>
                </div>
                  <div class="form-group">
                  <label>Teacher</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="teacher_id">
                    <option selected="selected">Select Teacher</option>
                      <?php 
					  while ($row2 = mysqli_fetch_array($teachers)) {
					  ?>	  
                
                    <option  value="<?php echo($row2['Teacher_Id'])?>"><?php echo $row2["Teacher_Name"]; ?></option>
					  <?php } ?>
                  </select>
                </div>
					 <div class="form-group">
                  <label>
						 Semester</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="semester_id">
                    <option selected>Select Semester</option>
                      <?php 
					  while ($row3 = mysqli_fetch_array($semes)) {
					  ?>	  
                
                    <option  value="<?php echo($row3['semester_id'])?>"><?php echo $row3["semester"]." "; echo($row3['Program_Name'])." Session "; echo($row3['session']);?></option>
					  <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Program Name</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="_program">
                    <option selected="selected">Select Program </option>
                  <option>BCS</option>
                    <option>IT</option>
                    <option>SE</option>
                    <option>MCS</option>
                    
                  </select>
                </div>
					
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
                  <button type="submit" class="btn btn-secondary" name="btnsubject">Submit</button>
                 
                </div>
              </form>
            </div>
				   
			  </div>
				   <div class="col-lg-3"></div>
			  </div>
			  <div class="row">
			  <div class="col-lg-3"></div>
			   <div class="col-lg-6">
			  
				   <div class="card card-success" style="display: none" id="form3">
              <div class="card-header">
                <h3 class="card-title"> Assign Subject to teacher</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                  <label>Teacher Name</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option selected="selected">Select Teacher</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                  <div class="form-group">
                  <label>Assign Subject</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option selected="selected">Assign subject</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
               
					
					<div class="form-group">
                  <label>Shift</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option selected="selected">Select Shift</option>
                    <option>Morning</option>
                    <option>Evening</option>
                    <option>Both</option>
                   
                  </select>
                </div>
					
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>
				   
			  </div>
				   <div class="col-lg-3"></div>
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
	<script type="text/javascript">
	
	
const btn = document.getElementById('btn');
const btn2 = document.getElementById('btn2');
const btn3 = document.getElementById('btn3');
const form1 = document.getElementById('form1');
const form2 = document.getElementById('form2');
const form3 = document.getElementById('form3');
btn.addEventListener('click', () => {
  

  if (form1.style.display === 'none') {
    // 👇️ this SHOWS the form
	  form2.style.display='none'
	  form3.style.display='none'
    form1.style.display = 'block';
  } else {
    // 👇️ this HIDES the form
	form3.style.display = 'none'
	form2.style.display = 'none'
    form1.style.display = 'none';
  }
});
	
		
		
		
btn2.addEventListener('click', () => {
  

  if (form2.style.display === 'none') {
    // 👇️ this SHOWS the form
    form1.style.display = 'none';
    form3.style.display = 'none';
    form2.style.display = 'block';
  } else {
    // 👇️ this HIDES the form
    form1.style.display = 'none';
    form2.style.display = 'none';
    form3.style.display = 'none';
  }
});
		
btn3.addEventListener('click', () => {
  

  if (form3.style.display === 'none') {
    // 👇️ this SHOWS the form
    form1.style.display = 'none';
    form3.style.display = 'block';
    form2.style.display = 'none';
  } else {
    // 👇️ this HIDES the form
    form1.style.display = 'none';
    form2.style.display = 'none';
    form3.style.display = 'none';
  }
});
	</script>
</body>
</html>
