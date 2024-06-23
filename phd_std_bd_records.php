<?php
include('includes/connection.php');


$result = mysqli_query($con,'select * from students_biodata where Discipline = "Ph.D"  order by Roll_no DESC');
$count = mysqli_num_rows($result);
//echo($count);
if(isset($_GET['DID'])){
	$did = $_GET['DID'];
$q = mysqli_query($con,"delete from students_biodata where student_id = '$did'");
	
header("location:student_bd_record.php");	
	
	
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | student List</title>
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
            <h1> Ph.D Students records</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="manage_semester.php">Home</a></li>
              <li class="breadcrumb-item active">Biodata</li>
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
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Roll No</th>
                    <th> Name</th>
                    <th> Father Name</th>
                   
                    <th>Session</th>
                    <th>Program</th>
                    <th>View</th>
					  <th>Edit</th>
                    
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
	<?php
	$i = 1;
	while ($row = mysqli_fetch_array($result)) { 
		
		  ?>				  
                  <tr>
                    <td><?php echo($i++) ?></td>
                    <td> <?php echo $row["Roll_no"]; ?> </td>
                    <td><?php echo $row["full_name"]; ?></td>
                    <td> <?php echo $row["f_name"]; ?></td>
                    <td><?php echo $row["Session"]; ?></td>
                    
                    <td><?php echo $row["program"]; ?></td>
                    <td><a href="student_profile.php?R_ID=<?php echo($row['student_id']) ?>" class="btn btn-info btn-sm">View</a></td>
					  <td><a href="edit_bd.php?R_ID=<?php echo($row['student_id']) ?>" class="btn btn-success btn-sm">Edit</a></td>
					  <td><a href="student_bd_record.php?DID=<?php echo($row['student_id']) ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure to delete it?')">Delete</a></td>
                  </tr>
<?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                       <th>S.No</th>
                    <th>Roll No</th>
                    <th> Name</th>
                    <th> Father Name</th>
                   
                    <th>Session</th>
                    <th>Program</th>
                    <th>View</th>
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
