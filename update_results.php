<?php
include('includes/connection.php');
$roll_number = "";

//$result = mysqli_query($con,'select * from semester');
if(isset($_GET["id"])){
	$roll_number = $_GET["id"];
}
if(isset($_GET['semester_exam_id'])){
	$did = $_GET['semester_exam_id'];
	$del_query = mysqli_query($con,"DELETE FROM `lms`.`semester_exam` WHERE `semester_exam_id` ='$did'");
	if($del_query){
		echo("Data Deleted Successfully");
		header("location:update_results.php");
	}
	else{
		
		echo("Not delete".mysqli_errno($del_query));
	}
//	echo($roll_number);
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Results</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="">
	<nav class=" navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <h2 class="m-0 text-dark">Department of Computer and Software Technology</h2>
      </li>
    
    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user-circle"></i>
           </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="color:red">Log Out</span>
         <div class="dropdown-divider"></div>
        
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div  style="width: 100%">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="manage_semester.php">Home</a></li>
              <li class="breadcrumb-item active"> Result Updation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
			  
			  <div class="col-3"></div>
			  <div class="col-6">
	
         <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Search for records</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Roll No</label>
                    <input type="text" class="form-control" id="teacher_name" placeholder="Enter Roll No " name="Roll_No" value="<?php echo($roll_number) ?>">
                  </div>
					
					
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="adddata">Show records</button>
                </div>
              </form>
            </div> 	
	
	
	
	</div>
			  <div class="col-3"></div>
			  
			  </div>
        
		 <div class="row">
		  
			 <div class="col-12">
			 
			 <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td>


<?php
//error_reporting(E_ERROR);//////////////sls remove if want to find error
$Registration_No = "";
$roll =  "";
$Name =  ""; 
$F_Name =  "";
$Shift =  "";
$Session =  ""; 
$program =  "";
$Password =  "";

							if(isset($_POST['adddata'])) {
							if((!isset($_REQUEST['Roll_No']) || empty($_REQUEST['Roll_No']))) 
								{
									echo ("<font color='red' size='5'>Roll Number is Missing</font>");
								}
						
							else {
								echo ('<table border="1" cellspacing="2" cellpadding="2" align="center">
			  <tr bgcolor="#0099CC" align="center">
					<td>Roll No</td>
					<td>Name</td>
					<td>Semester Id</td>
					<td>Semester</td>
					<td>Subject Id</td>
					<td>Reg No</td>
					<td>Subjec Name</td>
					<td>Mid Term Marks</td>
					<td>Final Term Marks</td>
					<td>Assignment Marks</td>
					<td>Presentation Marks</td>
					<td>Obtained Marks</td>
					<td>Total Marks</td>
					<td>Status</td>
					<td>fail</td>
					<td>17g</td>
					<td>Action</td>
					<td>Delete</td>
					</tr>');
	    $result = mysqli_query($con,'SELECT semester_exam_id, (select Sub_Name from subject_list where Sub_Code=(select Subject_Code from	assign_subject	where assign_subject_id=semester_exam.Subject_Id))as Sub_Name,
								(select Name from stduent_roll_list where roll=semester_exam.Roll_No) as Name,
								Semester_Id, semester, Subject_Id, Reg_No, Roll_No, 
								Mid_Term_Marks, Final_Term_Marks, Assignment_Marks, 
								Presentation_Marks, Obtained_Marks, Total_Marks, Status, if_fail,if_17g 
								FROM semester_exam
								where Roll_No="'.$_REQUEST['Roll_No'].'"');
								
								if(!$result){
	


	    $result = mysqli_query($con,'SELECT semester_exam_id, 
								(select Name from stduent_roll_list where roll=semester_exam.Roll_No) as Name,
								Semester_Id, semester, Subject_Id, Reg_No, Roll_No, 
								Mid_Term_Marks, Final_Term_Marks, Assignment_Marks, 
								Presentation_Marks, Obtained_Marks, Total_Marks, Status, if_fail,if_17g 
								FROM semester_exam
								where Roll_No="'.$_REQUEST['Roll_No'].'"');
								

	while($row = mysqli_fetch_array($result))
	  {
		echo("<tr align='center'>
					<td>$row[Roll_No]</td>
					<td width='8%'>$row[Name]</td>
					<td>$row[Semester_Id]</td>
					<td>$row[semester]</td>
					<td>$row[Subject_Id]</td>
					<td>$row[Reg_No]</td>
					<td align='left'></td>
					<td>$row[Mid_Term_Marks]</td>
					<td>$row[Final_Term_Marks]</td>
					<td>$row[Assignment_Marks]</td>
					<td>$row[Presentation_Marks]</td>
					<td>$row[Obtained_Marks]</td>
					<td>$row[Total_Marks]</td>
					<td>$row[Status]</td>
					<td>$row[if_fail]</td>
					<td>$row[if_17g]</td>"
					);
			echo ("<td> <a href=upd_subject_marks.php?semester_exam_id=$row[semester_exam_id]> Update </a></td>");
echo ("<td> <a href=update_results.php?semester_exam_id=$row[semester_exam_id]> Delete </a></td>");//sls code. i created result_del.php
	?>
    </tr>
<?php
	  }	
									
									
									
									
								}












								
//		(select Sub_Name from subject_list where Sub_Code=(select Subject_Code from assign_subject 
//		where assign_subject_id=semester_exam.Subject_Id))as Sub_Name,
	//	where cateType
	//	where z.sNo=d.Zone ORDER BY d.zone ASC");
	while($row = mysqli_fetch_array($result))
	  {
		echo("<tr align='center'>
					<td>$row[Roll_No]</td>
					<td width='8%'>$row[Name]</td>
					<td>$row[Semester_Id]</td>
					<td>$row[semester]</td>
					<td>$row[Subject_Id]</td>
					<td>$row[Reg_No]</td>
					<td align='left'>$row[Sub_Name]</td>
					<td>$row[Mid_Term_Marks]</td>
					<td>$row[Final_Term_Marks]</td>
					<td>$row[Assignment_Marks]</td>
					<td>$row[Presentation_Marks]</td>
					<td>$row[Obtained_Marks]</td>
					<td>$row[Total_Marks]</td>
					<td>$row[Status]</td>
					<td>$row[if_fail]</td>
					<td>$row[if_17g]</td>"
					);
			echo ("<td> <a href=upd_subject_marks.php?semester_exam_id=$row[semester_exam_id]> Update </a></td>");
echo ("<td> <a href=update_results.php?semester_exam_id=$row[semester_exam_id]> Delete </a></td>");//sls code. i created result_del.php
	?>
    </tr>
<?php
	  }
echo ("</table>");
	
//	mysql_close($connect);
    
							}  
						}
				?>
</td>
  </tr>
</table>
		  
			 </div>
		  </div> 

		  
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
