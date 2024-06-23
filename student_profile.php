<?php
include("includes/connection.php");
$display_b_m = "none";
$display_m_m = "none";
if(isset($_GET['R_ID'])){
	$S_id = $_GET['R_ID'];
$student_bd_query = mysqli_query($con,"select * from students_biodata where student_id='$S_id'");
$r = mysqli_fetch_row($student_bd_query);
	if($r){
		 $stdname=$r[1];
    $fname=$r[2];
    $rollno=$r[3];
    $registrationno=$r[4];
	$discipline=$r[5];	
	$program=$r[6];	
		 $session=$r[7];
    $bloodgrou=$r[8];
    $dob=$r[9];
    $cnic=$r[10];
    $permanent_cno=$r[11];
    $emergency_cno=$r[12];
    $permanent_address=$r[13];
    $present_address=$r[14];
    $Domicile_district=$r[15];
    $province= $r[16];
    $quota=$r[17];
    $gender=$r[18];
    $religion=$r[19];
    $nationality=$r[20];
$Image_url = $r[21];
		$folder = "studentimages/";
    $completeImageURL = $folder . $Image_url;




	

	}

$student_education_details = mysqli_query($con,"select * from education_details where student_id = '$S_id'");
	$r_e = mysqli_fetch_row($student_education_details);
	if($r_e){
//		
		$ssc_major = $r_e[2];
		$ssc_ob = $r_e[3];
		$ssc_t = $r_e[4];
		$ssc_per = $r_e[5];
		$ssc_board= $r_e[6];
		$hssc_major = $r_e[7];
		$hssc_ob = $r_e[8];
		$hssc_t = $r_e[9];
		$hssc_per = $r_e[10];
		$hssc_board= $r_e[11];
		$bs_major = $r_e[12];
		$bs_cgpa = $r_e[13];
		$bs_g_year = $r_e[15];
		$bs_coll = $r_e[14];
		$ms_major = $r_e[16];
		$ms_cgpa = $r_e[17];
		$ms_g_year = $r_e[19];
		$ms_coll = $r_e[18];
		if(!empty($bs_major)){
			$display_b_m = "block";
		}
		if(!empty($ms_major)){
			$display_m_m = "block";
		}
	}
	else{
		echo("error:".mysqli_errno($student_education_details));
	}
	
}




//$student_bd_query = "select * from students_biodata where student_id='$S_id'";




?>






<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Home</title>
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
            <h1 class="m-0 text-dark">Profile</h1>
			 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


    <div class="row">
      <div class="col-lg-4">
        <div class="card card-primary card-outline mb-4">
          <div class="card-body text-center">
            <img src="<?php echo($completeImageURL)?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px; height: 210px">
            <h5 class="my-3"><?php echo($stdname)   ?></h5>
         
			  
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <p class="mb-0">Roll No</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0"><?php echo($rollno)  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <p class="mb-0">Registration No</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0"><?php echo($registrationno)  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <p class="mb-0">Discipline</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0"><?php echo($discipline)  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <p class="mb-0">Program</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0"><?php echo($program)  ?></p>
              </div>
            </div>  
			  <hr>
			  <div class="row">
              <div class="col-sm-6">
                <p class="mb-0">Session</p>
              </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0"><?php echo($session)  ?></p>
              </div>
            </div>
			  
          </div>
        </div>
      </div>
      <div class="col-lg-8">
		 
        <div class="card card-primary card-outline mb-4">
          <div class="card-body">
			   <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Father Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($fname)  ?></p>
              </div>
            </div>
			  <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Blood Group</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($bloodgrou)  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date of Birth</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($dob)  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">CNIC</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($cnic)  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Domicile District</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($Domicile_district)  ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Province</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($province)  ?></p>
              </div>
            </div>  
			  <hr>
			  <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Addmission Qouta </p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($quota)  ?></p>
              </div>
            </div>
			  <hr>
			     <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender </p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($gender)  ?></p>
              </div>
            </div>
			  <hr>
			    <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Religion </p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($religion)  ?></p>
              </div>
            </div>
			  <hr>
			    <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nationality  </p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($nationality)  ?></p>
              </div>
            </div>
          </div>
        </div>
       
      </div>
		
    </div>
		
		  
		   <div class="row">
     
      <div class="col-lg-12">
		 
        <div class="card card-primary card-outline mb-4">
			  <div class="card-header">
                <h3 class="card-title">
                Address Details
                </h3>
              </div>
          <div class="card-body">
			   <div class="row">
              <div class="col-sm-2">
                <p class="mb-0">Permanent Address</p>
              </div>
              <div class="col-sm-4">
                <p class="text-muted mb-0"><?php echo($permanent_address)  ?></p>
              </div>
				     <div class="col-sm-2">
                <p class="mb-0">Present Address</p>
              </div>
              <div class="col-sm-4">
                <p class="text-muted mb-0"><?php echo($present_address)  ?></p>
              </div>
            </div>
		
          </div>
        </div>
       
      </div>
		
    </div>
		  
		  
		   <div class="row">
     
      <div class="col-lg-12">
		 
        <div class="card card-primary card-outline mb-4">
			  <div class="card-header">
                <h3 class="card-title">
                Contact  Details
                </h3>
              </div>
          <div class="card-body">
			   <div class="row">
              <div class="col-sm-2">
                <p class="mb-0">Personal Phone No:</p>
              </div>
              <div class="col-sm-4">
                <p class="text-muted mb-0"><?php echo($permanent_cno)  ?></p>
              </div>
				     <div class="col-sm-2">
                <p class="mb-0">Emergency Phone No:</p>
              </div>
              <div class="col-sm-4">
                <p class="text-muted mb-0"><?php echo($emergency_cno)  ?></p>
              </div>
            </div>
		
          </div>
        </div>
       
      </div>
		
    </div>
		    <div class="row">
     
      <div class="col-lg-12">
		 
        <div class="card card-primary card-outline mb-4">
			  <div class="card-header">
                <h3 class="card-title">
                Educational  Details
                </h3>
              </div>
          <div class="card-body">
			 <h5 style="color: red;border-bottom: 2px solid black"> Matric  </h5>
			   <div class="row">
              <div class="col-sm-2">
                <p class="mb-0">Major:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($ssc_major);  ?></p>
              </div>
				     <div class="col-sm-2">
                <p class="mb-0">Obtained Marks:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($ssc_ob)  ?></p>
              </div>
				   
				     <div class="col-sm-2">
                <p class="mb-0">Total Marks:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($ssc_t)  ?></p>
              </div>
            </div>
			  <hr>
			    <div class="row">
              <div class="col-sm-2">
                <p class="mb-0">percentage %:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($ssc_per);  ?></p>
              </div>
				     <div class="col-sm-2">
                <p class="mb-0">Board:</p>
              </div>
              <div class="col-sm-4">
                <p class="text-muted mb-0"><?php echo($ssc_board)  ?></p>
              </div>
			
            </div>
		
			  <hr>
			   <h5 style="color: red;border-bottom: 2px solid black"> Intermediate  </h5>
			   <div class="row">
              <div class="col-sm-2">
                <p class="mb-0">Major:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($hssc_major);  ?></p>
              </div>
				     <div class="col-sm-2">
                <p class="mb-0">Obtained Marks:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($hssc_ob)  ?></p>
              </div>
				   
				     <div class="col-sm-2">
                <p class="mb-0">Total Marks:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($hssc_t)  ?></p>
              </div>
            </div>
			  <hr>
			    <div class="row">
              <div class="col-sm-2">
                <p class="mb-0">percentage %:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($hssc_per);  ?></p>
              </div>
				     <div class="col-sm-2">
                <p class="mb-0">Board:</p>
              </div>
              <div class="col-sm-4">
                <p class="text-muted mb-0"><?php echo($hssc_board)  ?></p>
              </div>
			
            </div>
			  
			  <div class="bacehlor" style="display: <?php echo($display_b_m) ?>">
			   <hr>
			  
			   <h5 style="color: red;border-bottom: 2px solid black"> Bachelor's  </h5>
			   <div class="row">
              <div class="col-sm-2">
                <p class="mb-0">Major:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($bs_major);  ?></p>
              </div>
				     <div class="col-sm-2">
                <p class="mb-0">CGPA:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($bs_cgpa)  ?></p>
              </div>
				   
				     <div class="col-sm-2">
                <p class="mb-0">College/University:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($bs_coll)  ?></p>
              </div>
            </div>
			  
			  	  <hr>
			    <div class="row">
              
				     <div class="col-sm-2">
                <p class="mb-0">Graduation Year:</p>
              </div>
              <div class="col-sm-4">
                <p class="text-muted mb-0"><?php echo($emergency_cno)  ?></p>
              </div>
			
            </div>
				  </div>
			  <div class="master" style="display: <?php echo($display_m_m) ?>">
			  <hr>
			    <h5 style="color: red;border-bottom: 2px solid black"> Master's  </h5>
			   <div class="row">
              <div class="col-sm-2">
                <p class="mb-0">Major:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($ms_major);  ?></p>
              </div>
				     <div class="col-sm-2">
                <p class="mb-0">CGPA:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($ms_cgpa)  ?></p>
              </div>
				   
				     <div class="col-sm-2">
                <p class="mb-0">College/University:</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0"><?php echo($ms_coll)  ?></p>
              </div>
            </div>
			  
			  	  <hr>
			    <div class="row">
              
				     <div class="col-sm-2">
                <p class="mb-0">Graduation Year:</p>
              </div>
              <div class="col-sm-4">
                <p class="text-muted mb-0"><?php echo($ms_g_year)  ?></p>
              </div>
			
            </div>
			  
			  </div>
          </div>
        </div>
       
      </div>
		
    </div>
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
	 

	
</body>
</html>
