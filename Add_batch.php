<?php
include('includes/connection.php');
$display = "block";
$display2 = "none";
$batch ="";
	$program =" Select Discipline";

$result = mysqli_query($con,'select * from batches');
$count = mysqli_num_rows($result);
//echo($count);


if(isset($_POST['btnsub'])){
	
//	echo " yes working";
 $batch = mysqli_real_escape_string($con, $_POST['txtbatch']);
    $program = mysqli_real_escape_string($con, $_POST["program"]);
//	$insertion = mysqli_query($con,"INSERT INTO `batches`( `session`, `Discipline`) VALUES ('$batch','$program')");
	 $insertion = mysqli_query($con,"insert into batches(session,Discipline) values ('$batch', '$program')");
	header("location:batch_list.php");
	
	
}


if(isset($_GET['R_ID'])){
	
	$update_id = $_GET['R_ID'];
	$display2 = "block";
	$display = "none";
	
	$select_query = mysqli_query($con,"Select * from batches where batch_id = '$update_id'");
	$row_select_query = mysqli_fetch_row($select_query);
	$batch = $row_select_query[1];
	$program = $row_select_query[2];
	
}
if(isset($_POST['btnupd'])){
	 $batch = mysqli_real_escape_string($con, $_POST['txtbatch']);
    $program = mysqli_real_escape_string($con, $_POST["program"]);
$update_query = mysqli_query($con,"UPDATE `batches` SET `session`='$batch',`Discipline`='$program' WHERE batch_id = '$update_id'");
	if($update_query){
		echo("data updated successfully");
		header("location:batch_list.php");
	}
	
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Add batch</title>
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
 <br>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     	<div class="row">
			  <div class="col-lg-3"></div>
					
					   <div class="col-lg-6">
			  
				   <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"> Add New Batch</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                  <label>Enter batch (e.g: 2021-25)</label>
              <input type="text" class="form form-control" name="txtbatch" placeholder="Enter batch in the above format" value="<?php echo($batch) ?>">
                </div>
                  <div class="form-group">
                  <label>Discipline</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="program">
                    <option selected="selected"><?php echo($program)?></option>
                    <option>Bachelor</option>
                    <option>Master</option>
                  
                  </select>
                </div>
            
					
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success" name="btnsub" style="display: <?php echo($display)?>">Submit</button>
                  <button type="submit" class="btn btn-success" name="btnupd" style="display: <?php echo($display2)?>">Update</button>
                </div>
              </form>
            </div>
				   
			  </div>
			  <div class="col-lg-3"></div>
			
				
      </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	  
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar --><br>

</div>
<!-- ./wrapper -->
	</div>
	
 <?php include("includes/footer.php") ?>

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
