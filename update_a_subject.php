<?php include("includes/connection.php");
$a_subject_name = "select Subject Name";
	$a_s_teacher_name = "select Teacher Name";
	$a_s_semester = "Select Semester";
		$a_s_session = "";
		$a_s_program ="Select Program";
$a_s_status = "Select Status";
$a_s_shift = "Select Shift";
$status = 'Active';
$subjects = mysqli_query($con, "select * from subject_list");
$teachers = mysqli_query($con, "select * from teacher_list"); 
$semes = mysqli_query($con, "select * from semester where Status = '$status'"); 


//updation end
//offered new semester End

//offered Subject in new semester

//for updation of assign_subject
//
if(isset($_GET['uid'])){
	$a_s_uid = $_GET['uid'];
	$display = 'block';
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
if(isset($_POST['btnsubject_upd'])){
	$a_s_uid = $_GET['uid'];
		$sub_code = $_POST['subject_code'];
	$teacher_id = $_POST['teacher_id'];
	$semester_id = $_POST['semester_id'];
	$porgram_n = $_POST['_program'];
	$sh = $_POST['shift'];
	$update_status = $_POST['update_status'];
//	echo($sub_code);
//	echo($porgram_n);
	$update_query_a_s = mysqli_query($con,"UPDATE `assign_subject` SET `Subject_Code`='$sub_code',`Teacher_Id`='$teacher_id',`Semester_Id`='$semester_id',`Program_Name`='$porgram_n',`Shift`='$sh',`Status`='$update_status' WHERE assign_subject_id = '$a_s_uid'");
	if($update_query_a_s){
		
		header("location:assign_course_list.php");
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
			  <div class="col-lg-3"></div>
			   <div class="col-lg-6">
			  
				   <div class="card card-secondary"  id="form2">
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
					  
                    <option selected="selected" value="<?php echo($a_s_code) ?>"><?php echo($a_subject_name);  ?></option>
					  <?php 
					  while ($row = mysqli_fetch_array($subjects)) {
					  ?>	  
                
                    <option value="<?php echo($row['Sub_Code'])?>" ><?php echo $row["Sub_Name"]; ?></option>
					  <?php } ?>
                    </select>
                </div>
                  <div class="form-group">
                  <label>Teacher</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="teacher_id">
                    <option selected="selected" value="<?php echo($a_s_teacher) ?>"> <?php echo($a_s_teacher_name) ?></option>
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
                    <option  value="<?php echo($a_s_semester_id)?>" selected><?php echo $a_s_semester." "; echo($a_s_program)." Session "; echo($a_s_session);?></option>
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
                    <option selected="selected"><?php echo($a_s_program)  ?></option>
                  <option>BCS</option>
                    <option>IT</option>
                    <option>SE</option>
                    <option>MSCS</option>
                    
                  </select>
                </div>
					
					<div class="form-group">
                  <label>Shift</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="shift">
                    <option selected="selected"><?php echo($a_s_shift) ?></option>
                    <option>Morning</option>
                    <option>Evening</option>
                   
                   
                  </select>
                </div>
					 <div class="form-group" style="display: <?php echo($display2)?>">
                     <label>Status</label>
                  <select class="form-control select2 "  style="width: 100%;" data-dropdown-css-class="select2-purple" name="update_status">
                    <option selected="selected"><?php echo($a_s_status )?></option>
                    <option>Active</option>
                    <option>InActive</option>
                   
                  </select>
                  </div> 
					
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                 
                  <button type="submit" class="btn btn-success" name="btnsubject_upd">Update</button>
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
