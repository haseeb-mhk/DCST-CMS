<?php
include('includes/connection.php');

if(isset($_GET['did'])){
	$did = $_GET['did'];
	$selec_q = mysqli_query($con,"Select * from assign_subject where assign_subject_id = '$did'");
	$fetch_row = mysqli_fetch_row($selec_q);
	$as_id = $fetch_row[0];
	$s_id = $fetch_row[3];
$q = mysqli_query($con,"delete from semester_exam where Subject_Id = '$as_id' and Semester_Id = '$s_id'");
	if($q){
		$d_a_s = mysqli_query($con,"delete from assign_subject where assign_subject_id = '$did'");
		header("location:assign_course_list.php");
	}
	else{
		echo("not delete. There is an error in the queries");
		echo(mysqli_errno($con));
	}
	
	
	
	
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Current assign subject List</title>
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
            <h1>Assigned Subject List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="manage_semester.php">Home</a></li>
              <li class="breadcrumb-item active">Assign Subject List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
  

          
         	    <div class="row">
			  <div class="col-lg-3"></div>
			   <div class="col-lg-6">
			  
				   <div class="card card-primary" id="form1">
              <div class="card-header">
                <h3 class="card-title"> Enter Semester Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                     <label> Semester</label>
                  <select class="form-control select2 "  style="width: 100%;" data-dropdown-css-class="select2-purple" name="sem">
                    <option selected="selected">Select Session</option>
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
                     <label> Session</label>
                  <select class="form-control select2 "  style="width: 100%;" data-dropdown-css-class="select2-purple" name="batch">
                    <option selected=" selected">Session</option>
                    <option value="2010-14">2010-14 </option>
                  <option value="2011-15">2011-15</option>
                  <option value="2012-16">2012-16</option>
                  <option value="2013-17">2013-17</option>
				  <option value="2014-18">2014-18</option>
                  <option value="2015-19">2015-19</option>
                  <option value="2016-20">2016-20</option>
                  <option value="2017-21">2017-21</option>
                  <option value="2018-22">2018-22</option>
                  <option value="2019-23">2019-23 </option>
                  <option value="2020-24">2020-24 </option>
                  <option value="2021-25">2021-25 </option>
				  <option value="2022-26">2022-26 </option>
                  <option value=""></option>
                  <option value="2017-19">2017-19</option>
                  <option value="2018-20">2018-20</option>
                  <option value="2019-21">2019-21</option>
                  <option value="2020-22">2020-22</option>
                  <option value="2021-23">2021-23</option>
                  <option value="2022-24">2022-24</option>
                  <option value="2023-25">2023-25</option>
                  </select>
                  </div>
                  <div class="form-group">
                     <label>Program Name</label>
                  <select class="form-control select2 "  style="width: 100%;" data-dropdown-css-class="select2-purple" name="program">
                    <option selected="selected">Select program</option>
                    <option>BCS</option>
                    <option>BS-IT</option>
                    <option>SE</option>
                    <option>MS-CS</option>
                    <option>PHD-CS</option>
                    <option>MCS</option>
                  </select>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
					<div class="row">
					
					<div class="col-2">
						
						<div class="col-6">
						<button type="submit" class="btn btn-success" name="btnsearch" >Search</button>
						</div>
					
					
					</div>
                  
                  
                </div>
              </form>
            </div>
				   
			  </div>
				   <div class="col-lg-3"></div>
			  </div>
          
       
			

		
				<?php
if(isset($_POST['btnsearch'])){
	
	$sem = $_POST['sem'];
	$batch = $_POST['batch'];
	$program = $_POST['program'];
	$select = mysqli_query($con,"select * from semester where semester = '$sem' and session = '$batch' and Program_Name = '$program'");
//	print_r($select);
	$sem_row = mysqli_fetch_row($select);
	if($sem_row){
		$semester_id = $sem_row[0];
		$assign_subjects = mysqli_query($con,"select * from assign_subject where Semester_Id = '$semester_id'");
		echo '			
		<table id="example1" class="table table-bordered table-striped" style = "margin-right=20px">
                  <thead>
                  <tr>
                    <th>Assign Subject Id</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Semester </th>
                    <th> Session</th>
                    <th>Program</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>';
	while ($row = mysqli_fetch_array($assign_subjects)) { 
	$sub_code = $row["Subject_Code"];
		$query = mysqli_query($con,"Select * from subject_list where Sub_Code = '$sub_code'");
		$sub_name = mysqli_fetch_row($query);
		
		 		
		echo' <tr>
                    <td>'.$row["assign_subject_id"].' 
					  </td>
                    <td>  '.$row["Subject_Code"].'  </td>
                    <td>  '.$sub_name[2].'  </td>
                    <td>'.$sem_row[1].'</td>
                    <td> '.$sem_row[2].'</td>
                    <td>'.$row["Program_Name"].'</td>
                    <td>'.$row["Status"].'</td>';
       echo("<td><a href=view_award_list.php?sub_id=$row[assign_subject_id]&sem_id=$row[Semester_Id]&sub_cod=$row[Subject_Code] class='btn btn-info'>View AL</a></td>");            
		echo("<td><a href=update_a_subject.php?uid=$row[assign_subject_id] class='btn btn-success'>Edit</a></td>");
                   echo(" <td><a href=assign_course_list.php?did=$row[assign_subject_id] class='btn btn-danger' >Delete</a></td>
                  </tr>");
	}
		
		echo '
		</tbody>
                  <tfoot>
                  <tr>
                   <th>Assign Subject Id</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Semester </th>
                    <th> Session</th>
                    <th>Program</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </tfoot>
                </table>
				
		';
	}
	else{
	echo(mysqli_errno($sem_row));
	}
}
		
	?>			
				
				
		
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2023 <a href="http:uswat.edu.pk">University of Swat</a>.</strong> Department of Computer and Software Technology
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
