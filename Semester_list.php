<?php
include('includes/connection.php');


$result = mysqli_query($con,'select * from semester');
if(isset($_GET['DID'])){
    $did = $_GET['DID'];
	      $delete_semester = mysqli_query($con, "Delete FROM `semester` WHERE semester_id = '$did'");
    
    if($delete_semester){
   		$check_assign_sub = mysqli_query($con,"Select * from assign_subject where Semester_Id = '$did'");
		while($row = mysqli_fetch_array($check_assign_sub)){
			$a_s_id = $row[0];
			$Delete_marks = mysqli_query($con,"Delete from semester_exam where Semester_Id = '$did' and Subject_Id = '$a_s_id'");
			if($Delete_marks){
				$Delete_assign_sub = mysqli_query($con,"Delete from assign_subject where Semester_Id = '$did'");
//			echo("Data deleted successfully");
				header("location:Semester_list.php");
			}
			
	
			
		}
    } else {
        echo(mysqli_error($con));
    }
}

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
            <h1>Semester List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="manage_semester.php">Manage Semester</a></li>
              <li class="breadcrumb-item active">Semester List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Semester id</th>
                    <th>Semester</th>
                    <th>Session</th>
                    <th>Program Name</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
	<?php while ($row = mysqli_fetch_array($result)) { 
		
		  ?>				  
                  <tr>
                    <td><?php echo $row["semester_id"]; ?></td>
                    <td> <?php echo $row["semester"]; ?> </td>
                    <td><?php echo $row["session"]; ?></td>
                    <td> <?php echo $row["Program_Name"]; ?></td>
                    <td><?php echo $row["Status"]; ?></td>
                    <td><a href="manage_semester.php?SID=<?php  echo $row["semester_id"];  ?>" class="btn btn-success">Edit</a></td>  
					  <td><a href="Semester_list.php?DID=<?php  echo $row["semester_id"];  ?>" class="btn btn-danger">Delete</a></td>
                  </tr>
<?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Semester id</th>
                    <th>Semester</th>
                    <th>Session</th>
                    <th>Program Name</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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
