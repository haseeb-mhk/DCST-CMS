<?php
include('includes/connection.php');




$colname_subject_list = "-1";
if (isset($_GET['sem_id'])) {
  $colname_subject_list = $_GET['sem_id'];
}
$subject=$_GET['sub_id'];
$query_subject_list = "SELECT semester, session, Program_Name FROM semester WHERE semester_id = '$colname_subject_list'";
$subject_list = mysqli_query($con,$query_subject_list);
$row_subject_list = mysqli_fetch_assoc($subject_list);
//$totalRows_subject_list = mysql_num_rows($subject_list);

////////////////////////////////select studetn on session and program base//////////////////////////////
$csession=$row_subject_list['session'];
$colname_student_list=$row_subject_list['Program_Name'];
$query_student_list = "SELECT stduent_roll_list.*, 	semester_exam.* FROM stduent_roll_list,semester_exam WHERE ((stduent_roll_list.program ='$colname_student_list' AND stduent_roll_list.Session='$csession') AND (stduent_roll_list.roll=semester_exam.Roll_No AND semester_exam.Subject_Id='$subject'))";
$student_list = mysqli_query($con,$query_student_list);
//$row_student_list = mysqli_fetch_assoc($student_list);
//$totalRows_student_list = mysql_num_rows($student_list);
////////////////////////end//////////////////////////////

////////////////////subject Information////////////
 $colname_subjct_name = $_GET['sub_cod'];

$query_subjct_name = "SELECT * FROM subject_list WHERE Sub_Code = '$colname_subjct_name'";
$subjct_name = mysqli_query($con,$query_subjct_name);
$row_subjct_name = mysqli_fetch_assoc($subjct_name);

//$totalRows_subjct_name = mysql_num_rows($subjct_name);


///////////////////end/////////////////////////////
///////////////////teacher id/////////////////
$colname_techer_id = $_GET['sub_id'];

$query_techer_id ="SELECT * FROM assign_subject WHERE assign_subject_id = '$colname_techer_id'";
$techer_id = mysqli_query($con, $query_techer_id);
$row_techer_id = mysqli_fetch_assoc($techer_id);
//$totalRows_techer_id = mysql_num_rows($techer_id);


////////////end/////////////////////////////////
////////////////teacher Name///////
 $colname_techer_name = $row_techer_id['Teacher_Id'];

$query_techer_name = "SELECT * FROM teacher_list WHERE Teacher_Id = '$colname_techer_name'";
							
$techer_name = mysqli_query($con,$query_techer_name); 
$row_techer_name = mysqli_fetch_assoc($techer_name);
//$totalRows_techer_name = mysql_num_rows($techer_name);


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Semesters List</title>
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

	
	
	 <style>
      table,
      th,
      td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
      }
    </style>
	</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
	<?php include('includes/header.php') ?>
 <?php include('includes/sidepanel.php')?>
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Award List of <?php echo $row_subjct_name['Sub_Name']?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Award List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
<div class="row">
	      
          <div class="col-sm-12">
           
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  
                  <tr align="center">
                   <th colspan="9">
					  Department of Computer Science<br>
						Univeristy of Swat<br>
						Award list
					  
					  </th>
                  </tr>
					 <tr>
        <td colspan="2">Degree Program</td>
        <td colspan="5"><?php echo $colname_student_list; ?></td>
        <td colspan="2">Semester</td>
      </tr>
      <tr>
        <td colspan="2">Course Title</td>
        <td colspan="5"><?php echo $row_subjct_name['Sub_Name']; ?></td>
        <td colspan="2"><?php echo $row_subject_list['semester']; ?></td>
      </tr>
      <tr>
        <td colspan="2">Credit Hours</td>
        <td colspan="5"><?php echo $row_subjct_name['Sub_Cridet']; ?></td>
        <td colspan="2">Course-code</td>
      </tr>
      <tr>
        <td colspan="2">Course Teacher</td>
        <td colspan="5"><?php echo $row_techer_name['Teacher_Name']; ?></td>
        <td colspan="2"><?php echo $row_subjct_name['Sub_Code']; ?></td>
      </tr>
      <tr>
        <td colspan="3">Total Marks</td>
        <td colspan="6"><?php echo $row_subjct_name['Sub_Total_Marks']; ?></td>
        
      </tr>
					
				  </table>
				   <table id="example1" class="table table-bordered table-striped">
					<thead>
					   
					   	<tr>
            <th>Rol No</th>
            <th>Name</th>
            
             <th>Mid Term</th>
            <th>Final Term</th>
               <th>Assignment Marks</th>
            <th>Presentaion/Quize</th>
            <th>Total Obtained Marks</th>
            <th>Status</th>
            <th>Edit</th>
          </tr>
					
					</thead>
                  <tbody>
						<?php
	
		 while ($row_student_list2 = mysqli_fetch_array($student_list)){
			
			 ?>
<tr>
           <td><?php echo $row_student_list2['roll']; ?></td>
             <td><?php echo $row_student_list2['Name']; ?></td>
             <td><?php echo $row_student_list2['Mid_Term_Marks']; ?></td>
            <td><?php echo $row_student_list2['Final_Term_Marks']; ?></td>
             <td><?php echo $row_student_list2['Assignment_Marks']; ?></td>
            <td><?php echo $row_student_list2['Presentation_Marks']; ?></td>
             <td><?php echo $row_student_list2['Obtained_Marks']; ?></td>
            <td><?php echo $row_student_list2['Status']; ?></td>
            <td><a href="upd_subject_marks.php?semester_exam_id=<?php echo $row_student_list2['semester_exam_id']; ?>" class="btn btn-success">Edit</a></td>
            
          </tr>
          <?php
		  
		   }  ?>
					
					</tbody>
					   <tfoot>
					   
					   	<tr>
            <th>Rol No</th>
            <th>Name</th>
            
             <th>Mid Term</th>
            <th>Final Term</th>
               <th>Assignment Marks</th>
            <th>Presentaion/Quize</th>
            <th>Total Obtained Marks</th>
            <th>Status</th>
            <th>Edit</th>
          </tr>
					   </tfoot>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
             

   
                      

				  
              
              <!-- /.card-body -->
            
            <!-- /.card -->

          </div>
         
	   
        </div>         

         
          </section>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

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
