<?php
include('includes/connection.php');

if(isset($_POST['btnSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $fullname   = $line[1];
                $fathername  = $line[2];
                $Rollno  = $line[3];
                $regno = $line[4];
                $Discipline = $line[5];
                $program = $line[6];
                $sess = $line[7];
                $bg = $line[8];
//                
                $cnic = $line[9];
                $personalcno = $line[10];
                $emergencycno = $line[11];
				$dob = $line[12];
                $peraddress = $line[13];
                $preaddress = $line[14];
                $domiciledist = $line[15];
                $province = $line[16];
                $quota = $line[17];
                $gender = $line[18];
                $religion = $line[19];
				 $nationality = $line[20];
				$photo = $line[21];
//               
                $matricmajor = $line[22];
                $matric_ob_marks = $line[23];
                $matric_t_marks = $line[24];
                $matric_percentage = $line[25];
                $matric_board = $line[26];
                $hssc_major = $line[27];
                $hssc_ob_marks = $line[28];
                $hssc_t_marks = $line[29];
                $hssc_percentage = $line[30];
                $hssc_board = $line[31];
				$bs_major = isset($line[32]) ? $line[32] : null;
				$bs_cgpa = isset($line[33]) ? $line[33] : null;
				$bs_college = isset($line[34]) ? $line[34] : null;
				$bs_graduation_year = isset($line[35]) ? $line[35] : null;
				$ms_major = isset($line[36]) ? $line[36] : null;
				$ms_cgpa = isset($line[37]) ? $line[37] : null;
				$ms_college = isset($line[38]) ? $line[38] : null;
				$ms_graduation_year = isset($line[39]) ? $line[39] : null;
				

//                
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT * FROM students_biodata WHERE Roll_no = '$Rollno'";
                $prevResult = $con->query($prevQuery);
 
                if($prevResult->num_rows > 0){
					$row = mysqli_fetch_row($prevResult);
					$id = $row[0];
					echo($id);
//					echo($id."this is an id of student whose rollno is ".$Rollno);
                    // Update member data in the database
//					echo("Data exist duplication will occur");
                    $upd_s_bd = mysqli_query($con,"UPDATE `students_biodata` SET `full_name`='$fullname',`f_name`='$fathername',`Roll_no`='$Rollno',`Registration_no`='$regno',`Discipline`='$Discipline',`Session`='$sess',`Blood`='$bg',`Dob`='$dob',`Cnic`='$cnic',`Personal_c_no`='$personalcno',`Emergency_c_no`='$emergencycno',`Permanent_address`='$peraddress',`Present_Address`='$preaddress',`Domicile_District`='$domiciledist',`Province`='$province',`Addmission_quota`='$quota',`Gender`='$gender',`Religion`='$religion',`Nationality`='$nationality',`Picture`='$photo' WHERE Roll_no = '$Rollno'");
					if($upd_s_bd){
//						echo("Data Updated successfully Now updating the education details also.......");
						$update_ed_d = mysqli_query($con,"UPDATE `education_details` SET student_id='$id',`Matric_major`='$matricmajor',`Ssc_ob_marks`='$matric_ob_marks',`Ssc_total_marks`='$matric_t_marks',`Ssc_percentage`='$matric_percentage',`Ssc_board`='$matric_board',`Hssc_major`='$hssc_major',`Hssc_ob_marks`='$hssc_ob_marks',`Hssc_total_marks`='$hssc_t_marks',`Hssc_percentage`='$hssc_percentage',`Hssc_board`='$hssc_board' ,`BSc_major`='$bs_major',`BSc_cgpa`='$bs_cgpa',`BSc_college`='$bs_college',`BSc_graduation_year`='$bs_graduation_year',`MSc_major`='$ms_major',`MSc_cgpa`='$ms_cgpa',`MSc_college`='$ms_college',`MSc_graduation_year`='$ms_graduation_year' WHERE student_id = '$id'");
						
//						$update_ed_d = mysqli_query($con,"UPDATE `education_details` SET `Matric_major`='$matricmajor',`Ssc_ob_marks`='$matric_ob_marks',`Ssc_total_marks`='$matric_t_marks',`Ssc_percentage`='$matric_percentage',`Ssc_board`='$matric_board',`Hssc_major`='$hssc_major',`Hssc_ob_marks`='$hssc_ob_marks',`Hssc_total_marks`='$hssc_t_marks',`Hssc_percentage`='$hssc_percentage',`Hssc_board`='$hssc_board' WHERE student_id = '$id'");
					}
					
                }else{
					echo("Data not exist Insertion will be occur");
//                    // Insert member data in the database
						
                  $insertion_s_bd = mysqli_query($con,"INSERT INTO `students_biodata`( `full_name`, `f_name`, `Roll_no`, `Registration_no`, `Discipline`, `program`, `Session`, `Blood`, `Dob`, `Cnic`, `Personal_c_no`, `Emergency_c_no`, `Permanent_address`, `Present_Address`, `Domicile_District`, `Province`, `Addmission_quota`, `Gender`, `Religion`, `Nationality`, `Picture`) VALUES ('$fullname','$fathername','$Rollno','$regno','$Discipline','$program','$sess','$bg','$dob','$cnic','$personalcno','$emergencycno','$peraddress','$preaddress','$domiciledist','$province','$quota','$gender','$religion','$nationality','$photo')");
					if($insertion_s_bd){
						$last_inserted_student_id = mysqli_insert_id($con);
						
						$insertion_e_d = mysqli_query($con,"INSERT INTO `education_details`(student_id,`Matric_major`, `Ssc_ob_marks`, `Ssc_total_marks`, `Ssc_percentage`, `Ssc_board`, `Hssc_major`, `Hssc_ob_marks`, `Hssc_total_marks`, `Hssc_percentage`, `Hssc_board`, `BSc_major`, `BSc_cgpa`, `BSc_college`, `BSc_graduation_year`, `MSc_major`, `MSc_cgpa`, `MSc_college`, `MSc_graduation_year`) VALUES ('$last_inserted_student_id','$matric_board','$matric_ob_marks','$matric_t_marks','$matric_percentage','$matric_board','$hssc_major','$hssc_ob_marks','$hssc_t_marks','$hssc_percentage','$hssc_board','$bs_major','$bs_cgpa','$bs_college','$bs_graduation_year','$ms_major','$ms_cgpa','$ms_college','$ms_graduation_year')");
					}
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
//            $qstring = '?status=succ';
        }else{
//            $qstring = '?status=err';
        }
    }else{
//        $qstring = '?status=invalid_file';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Bio Data</title>
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
            <h1><i class="icon fas fa-file-csv"></i>Import Data from CSV </h1>
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

  <div class="alert alert-info  alert-dismissible">
                  
                  <h5> Important Note! </h5><hr>
	 This CSV File will be the Google Spread Sheet of the google Form which you generated for the purpose of Collecting Bio Data. If you want to create google form goto<strong> "Create Google Form From Side Bar." <br>
</strong><hr>
	  Follow the below steps when you want to Import CSV file<br>
	  <ul>
	  <li>1. Goto Google form spread sheet then move the cursor to links, an image will appear then click on <strong>Link</strong> the Url will be Change into a shorten URL. Repeat it for all links.</li>
	  <li> 2.Download the google form Spread Sheet in <strong>".CSV "</strong>Format.</li>
	  <li>  3.Download the folders where the Pictures from Form Responses are store. It will be in your Google Drive.</li>
		  <li>
		   4. Copy all the Images to the <strong>dcst_lms/studentimages</strong> folder then, click on the below <strong>Import</strong> Button and submit.
		  </li>
	  </ul>
	    
	
	  <hr>
	  <div class="row">


    <!-- Import link -->
    <div class="col-md-12 head">
        <div class="float-left">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
        </div>
    </div>
		  
    <!-- CSV file upload form -->
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form  method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="btnSubmit" value="Submit">
        </form>
    </div>


</div>
	    </div>


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
	<script>
	function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>
</body>
</html>
