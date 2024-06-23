

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | BioData</title>
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
            <h1>Create Google Form </h1>
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
    
		
<div class="row">
<div class="col-md-12 ">

	<br>

  <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5><hr>
                 <strong> Create Google Form Accordingly... </strong>	
	  <hr>
	  1. Full name &emsp;
	  2. Father Name &emsp;
	  3. Roll No &emsp;
	  4. Registration No &emsp;
	  5. Discipline &emsp;
	  6. Program &emsp;
	  7. Session &emsp;
	  8. Blood Group &emsp;
	  9. CNIC 
	  10. Personal Contact No &emsp;
	  11. Emergency Contact NO &emsp;
	  12. DOB &emsp;
	  13. Permanent Address &emsp;
	  14. Present Address &emsp;
	  15. Domicile District &emsp;
	  16. Province &emsp;
	  17. Addmission Quota &emsp;
	  18. Gender &emsp;
	  19. Religion &emsp; 
	  20. Nationality &emsp;
	  21. Upload Picture &emsp;
<!--	  Educational Details-->
	  22.Matric Major&emsp;
	  23. Matric Obtained Marks &emsp;
	  24. Matric total Marks &emsp;
	  25. Matric percentage &emsp;
	  26. Matric Board &emsp;
	  27. Fsc Major &emsp;
	  29. Fsc Obtained Marks &emsp;
	  30. Fsc Total Marks &emsp;
	  31. Fsc Percentage &emsp;
	  32. Fsc Board &emsp;
	  <hr>
	 <strong style="color: red">"if you want to create form for student of bachelor', then the above field will be enough but if you want to create form for collection of Bio Data of students that are in Master's then Add the below fields in the form".</strong> 
	  <hr>
	  
	  33. BS Major &emsp;
	  34. BS CGPA &emsp;
	  35. BS College &emsp;
	  36. BS Graduation Year &emsp;
	  <hr>
	  <strong style="color: red">
	  
	  "If you want to Create form for the Collection of Bio Data of students that are in Ph.D the add the below fields in the form".
	  </strong><hr>
	  33. MS Major &emsp;
	  34. MS CGPA &emsp;
	  35. MS College &emsp;
	  36. MS Graduation Year &emsp;
	  
	</div>


 <a href="https://docs.google.com/forms/u/0/" class="btn btn-success" target="_blank" ><i class="plus"></i> Click Here to Create Google Form</a>
</div>



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
