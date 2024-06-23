<?php
include("includes/connection.php");

//if(isset($_POST['submit'])){
//	    $stdname=$_POST['stdName'];
//    $fname=$_POST['fname'];
//    $rollno=$_POST['rollno'];
//    $registrationno=$_POST['Registrationno'];
//    $discipline=$_POST['discipline'];
//    $stdmajor=$_POST['std_major'];
//    	
//    $session=$_POST['session'];
//    $bloodgroup=$_POST['bg'];
//    $dob=$_POST['dob'];
//    $cnic=$_POST['cnic'];
//    $permanent_cno=$_POST['pcno'];
//    $emergency_cno=$_POST['ecno'];
//    $permanent_address=$_POST['peraddress'];
//    $present_address=$_POST['preaddress'];
//    $Domicile_district=$_POST['Ddistrict'];
//    $province=$_POST['province'];
//    $quota=$_POST['quota'];
//    $gender=$_POST['gender'];
//    $religion=$_POST['religion'];
//    $nationality=$_POST['nationality'];
//    $ssc_major=$_POST['ssc_major'];
//    $ssc_ob_marks=$_POST['ssc_ob_marks'];
//    $ssc_t=$_POST['ssc_t'];
//    $ssc_percentage=$_POST['ssc_percentage'];
//    $ssc_board=$_POST['ssc_board'];
//	$hssc_major=$_POST['hssc_major'];
//    $hssc_ob_marks=$_POST['hssc_ob_marks'];
//    $hssc_total_marks=$_POST['hssc_total_marks'];
//    $hssc_percentage=$_POST['hssc_precentage'];
//    $hssc_board=$_POST['hssc_board'];
//    $bs_major=$_POST['bs_major'];
//    $bs_CGPA=$_POST['bs_cgpa'];
//	$bs_college=$_POST['bs_coll'];
//    $bs_g_year=$_POST['bs_g_year'];
//$ms_major=$_POST['ms_major'];
//$ms_CGPA=$_POST['ms_cgpa'];
//$ms_college=$_POST['ms_coll'];
//$ms_g_year=$_POST['ms_g_year'];
//    $photo=$_FILES["photo"]["name"];
//    move_uploaded_file($_FILES["photo"]["tmp_name"],"studentimages/".$_FILES["photo"]["name"]);
//	
//	echo("yes working");
//	
//	echo($stdname." ");
//	echo($fname." ");
//	echo($rollno." ");
//	echo($registrationno." ");
//	echo($discipline." ");
//	echo($stdmajor." ");
//	echo($session." ");
//	echo($bloodgroup." ");
//	echo($cnic." ");
//	echo($permanent_cno." ");
//	echo($emergency_cno." ");
//	echo($dob." ");
//	echo($permanent_address." ");
//	echo($present_address." ");
//	echo($Domicile_district." ");
//	echo($province." ");
//	echo($quota." ");
//	echo($gender." ");
//	echo($religion." ");
//	echo($nationality." ");
////	Educational Details
//	echo($ssc_major." ");
//	echo($ssc_board." ");
//	echo($ssc_ob_marks." ");
//	echo($ssc_t." ");
//	echo($ssc_percentage." ");
//	echo($hssc_major." ");
//	echo($hssc_board." ");
//	echo($hssc_total_marks." ");
//	echo($hssc_ob_marks." ");
//	echo($hssc_percentage." ");
//	echo($bs_major." ");
//	echo($bs_CGPA." ");
//	echo($bs_college." ");
//	echo($bs_g_year." ");
//	echo($ms_major." ");
//	echo($ms_CGPA." ");
//	echo($ms_college." ");
//	echo($ms_g_year." ");
//	
//}


if(isset($_POST['submit'])) {
    // Student table data
//	    $stdname=$_POST['stdName'];
//    $fname=$_POST['fname'];
//    $rollno=$_POST['rollno'];
//    $registrationno=$_POST['Registrationno'];
//    $discipline=$_POST['discipline'];
//    
//    	
//    $session=$_POST['session'];
//    $bloodgroup=$_POST['bg'];
//    $dob=$_POST['dob'];
//    $cnic=$_POST['cnic'];
//    $permanent_cno=$_POST['pcno'];
//    $emergency_cno=$_POST['ecno'];
//    $permanent_address=$_POST['peraddress'];
//    $present_address=$_POST['preaddress'];
//    $Domicile_district=$_POST['Ddistrict'];
//    $province=$_POST['province'];
//    $quota=$_POST['quota'];
//    $gender=$_POST['gender'];
//    $religion=$_POST['religion'];
//    $nationality=$_POST['nationality'];
    $full_name = $_POST['stdName'];
    $f_name = $_POST['fname'];
    $roll_no = $_POST['rollno'];
    $registration_no = $_POST['Registrationno'];
    $discipline = $_POST['discipline'];
	$stdmajor=$_POST['std_major'];
    $session = $_POST['session'];
    $blood = $_POST['bg'];
    $dob = $_POST['dob'];
    $cnic = $_POST['cnic'];
    $personal_c_no = $_POST['pcno'];
    $emergency_c_no = $_POST['ecno'];
    $permanent_address = $_POST['peraddress'];
    $present_address = $_POST['preaddress'];
    $domicile_district = $_POST['Ddistrict'];
    $province = $_POST['province'];
    $addmission_quota = $_POST['quota'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];
    $picture = $_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "studentimages/" . $_FILES["photo"]["name"]);

    // Insert data into Students table
    $insert_student_bd_query = "INSERT INTO students_biodata (full_name, f_name, Roll_no, Registration_no, Discipline, program,Session, Blood, Dob, Cnic, Personal_c_no, Emergency_c_no, Permanent_address, Present_Address, Domicile_District, Province, Addmission_quota, Gender, Religion, Nationality, Picture) 
    VALUES ('$full_name', '$f_name', '$roll_no', '$registration_no', '$discipline','$stdmajor', '$session', '$blood', '$dob', '$cnic', '$personal_c_no', '$emergency_c_no', '$permanent_address', '$present_address', '$domicile_district', '$province', '$addmission_quota', '$gender', '$religion', '$nationality', '$picture')";
    
    $result_student = mysqli_query($con, $insert_student_bd_query);
	if($result_student){
    // Get the last inserted student ID
    $last_inserted_student_id = mysqli_insert_id($con);

    // Education table data
    $metric_major = $_POST['ssc_major'];
    $ssc_ob_marks = $_POST['ssc_ob_marks'];
    $ssc_total_marks = $_POST['ssc_t'];
    $ssc_percentage = $_POST['ssc_percentage'];
    $ssc_board = $_POST['ssc_board'];
    $hssc_major = $_POST['hssc_major'];
    $hssc_ob_marks = $_POST['hssc_ob_marks'];
    $hssc_total_marks = $_POST['hssc_total_marks'];
    $hssc_percentage = $_POST['hssc_precentage'];
    $hssc_board = $_POST['hssc_board'];
    $bs_major = $_POST['bs_major'];
    $bs_cgpa = $_POST['bs_cgpa'];
    $bs_college = $_POST['bs_coll'];
    
    $bs_graduation_year = $_POST['bs_g_year'];
    $ms_major = $_POST['ms_major'];
    $ms_cgpa = $_POST['ms_cgpa'];
    $ms_college = $_POST['ms_coll'];
   
    $ms_graduation_year = $_POST['ms_g_year'];
  

    // Insert data into Education table
    $insert_education_query = "INSERT INTO education_details (student_id, Matric_major, Ssc_ob_marks, Ssc_total_marks, Ssc_percentage, Ssc_board, Hssc_major, Hssc_ob_marks, Hssc_total_marks, Hssc_percentage, Hssc_board, BSc_major, BSc_cgpa, BSc_college, BSc_graduation_year, MSc_major, MSc_cgpa, MSc_college, MSc_graduation_year) 
    VALUES ('$last_inserted_student_id', '$metric_major', '$ssc_ob_marks', '$ssc_total_marks', '$ssc_percentage', '$ssc_board', '$hssc_major', '$hssc_ob_marks', '$hssc_total_marks', '$hssc_percentage', '$hssc_board', '$bs_major', '$bs_cgpa', '$bs_college', '$bs_graduation_year', '$ms_major', '$ms_cgpa', '$ms_college', '$ms_graduation_year')";

		$i_query = mysqli_query($con,$insert_education_query);
		header("location:student_bd_record.php");
	}else{
		
		echo("data not inserted due to :".mysqli_errno($con));
	}
}

?>






<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | BioData</title>
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
            <h1 class="m-0 text-dark">Add Bio data of new Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">BioData</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		  <form  method="post" enctype="multipart/form-data" novalidate>
<!--		   student details row-->
			  <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                 Student Details
                </h3>
              </div>
				 
              <div class="card-body pad table-responsive">
            
              
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label for="studentno">Full Name</label>
                          <input type="text" class="form-control" id="stdName" name="stdName" placeholder="Enter Full Name" value="" required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="names">Father Name</label>
                          <input type="text" class="form-control" id="F_name" name="fname" placeholder="Enter Father Name"  value=""  required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="age">Roll No</label>
                          <input type="text" class="form-control" id="Roll_no" name="rollno" placeholder="Enter Roll No"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="" required>
                        </div>
                        <div class="form-group col-md-3">
							<label for="age">Registration No</label>
                          <input type="text" class="form-control" id="R_no" name="Registrationno" placeholder="Enter R.No" required  value=""  >

                        </div>
                      </div><br>
    <div class="row">
                        <div class="form-group col-md-3">
                          <label for="age">Discipline</label>
                          <select type="select" class="form-control" id="discipline" name="discipline" required>
                            <option selected disabled >Select Discipline</option>
							  <option > BS</option>
                            <option >MS</option>
                            <option >Ph.D</option>
                            
                          </select>
                        </div>
						<div class="form-group col-md-3">
    <label for="age">Major</label>
    <select  class="form-control" id="std_major" name="std_major" required>
        <option disabled selected>Select major</option>
        <option value="CS">CS</option>
        <option value="IT">IT</option>
        <option value="SE">SE</option>
    </select>
</div>

                        <div class="form-group col-md-3">
                          <label for="age">Session<span style="color: blue;"></span></label>
                          <select type="select" class="form-control" id="session" name="session" required>
                            <option selected disabled>Select Session</option>
                            
							   <?php 
//	$discipline = "Bachelor's";
	$select_batches = mysqli_query($con,"select * from batches where Discipline = 'Bachelor'");
					  while($row_batches = mysqli_fetch_array($select_batches)){
					  
					  ?>
					  <option ><?php echo($row_batches['session']) ?> </option>
					  <?php } ?>

                  <option value="">MS</option>
                 
					  <?php 
//	$discipline = "Bachelor's";
	$select_batches = mysqli_query($con,"select * from batches where Discipline = 'Master'");
					  while($row_batches = mysqli_fetch_array($select_batches)){
					  
					  ?>
					  <option><?php echo($row_batches['session']) ?> </option>
					  <?php } ?>
             
							  
							  
                          </select>
                        </div>
                        <div class="form-group col-md-3">
							
							 <label for="age">Blood Group</label>
                          <select type="select" class="form-control" id="class" name="bg" >
                            <option selected disabled>Select Blood Group</option>
                            <option > A+</option>
                            <option >A-</option>
                            
                            <option >B+</option>
                            <option >B-</option>
                            <option >AB+</option>
                            <option >AB-</option>
                            <option >O+</option>
                            <option >O-</option>
                            
                          </select>
                       
                        </div>
						 
</div>
						<br>

						<div class="row">
						 <div class="form-group col-md-3">
                          <label for="age">CNIC</label>
                          <input type="text" class="form-control" id="Roll_no" name="cnic" placeholder="Enter CNIC" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="" required>
                        </div> <div class="form-group col-md-3">
                          <label for="age">Personal Contact No</label>
                          <input type="text" class="form-control" id="Roll_no" name="pcno" placeholder="Enter Permanent No" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="" required >
                        </div>
                        <div class="form-group col-md-3">
							<label for="age">Emergency Contact No</label>
                          <input type="text" class="form-control" id="R_no" name="ecno" placeholder="Enter Emergency No " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="" >

                        </div>
							 <div class="form-group col-md-3">
                          <label for="age">Date of Birth</label>
                          <input type="date" class="form-control" id="Dob" name="dob" placeholder="Enter Roll No" value="" required>
                        </div>
                      </div><br>


						<div class="row">
						 <div class="form-group col-md-4">
                          <label for="age">permanent Address</label>
							 <textarea id="peraddress" name="peraddress" placeholder="Enter permanent Address" class="form-control" required></textarea>

                        </div> <div class="form-group col-md-4">
                          
								<input type="checkbox" id="checkBox"  onclick="FillAddressInput()" alt="same as permanent" title="same as permanent"> 
							<label for="age">Present Address</label>
						 <textarea name="preaddress" placeholder="Enter present Address" class="form-control" id="preaddress" required ></textarea>
                        </div>
                       <div class="form-group col-md-4">
							<label for="exampleInputFile">Student Photo</label>
                          <div class="input-group">
                            <div  class="custom-file">
                              <input type="file" class="" name="photo" id="photo" >
                            </div>
                          </div>

                        </div>
                      </div>
<br>
 <div class="row">
                        <div class="form-group col-md-3">
                          <label for="parentname">Domicile District</label>
                         <select type="select" class="form-control" id="relation" name="Ddistrict" >
                            <option selected disabled>Select domicile District</option>
                            <option >Swat</option>
                            <option >Shangla</option>
                            <option >Buner</option>
                            <option >Upper Dir </option>
                            <option >mardan</option>
                            <option >other</option>
                          </select>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="relation">Province</label>
                          <select type="select" class="form-control" id="relation" name="province">
                            <option selected>Select Province</option>
                            <option >Khyber pukhton khwa</option>
                            <option >Balochistan</option>
                            <option >sindh</option>
                            <option >punjab</option>
                            <option >Gilgit Baltistan</option>
                   
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="age">Addmission Quota</label>
                         <select type="select" class="form-control" id="relation" name="quota">
                            <option selected>Select Addmission quota</option>
                            <option >Self</option>
                            <option >Open Merit</option>
                            <option >University Employee Children Quota</option>
                            <option >Disable Quota</option>
                            <option >Ex-FATA Quota</option>
                            <option >Afghan/Foreign Students Quota</option>
                            <option >Provinces/AJK Quota</option>
                            <option >Army Serving Personnel Quota</option>
                            <option >Shuhada Quota</option>
                            <option >Northern Areas and Chitral Quota</option>
                            <option > Overseas Employee Sons Quota</option>
                            <option >Sports Quota</option>
                            <option >Minority</option>
                            <option >None</option>
                   
                          </select>
                        </div>
                        
                      </div>
  <div class="row" style="">
                        <div class="form-group col-md-3">
                          <label for="parentname">Gender</label>
                         <select type="select" class="form-control" id="relation" name="gender">
                            <option selected>Select Gender</option>
                            <option >Male</option>
                            <option >Female</option>
                            <option >other</option>
                           
                          </select>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="relation">Religion</label>
                          <select type="select" class="form-control" id="relation" name="religion" >
                            <option selected>Select Religion</option>
                            <option >Islam</option>
                            <option >crystan</option>
                            <option >jew</option>
                            <option >other</option>
                   
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="age"> Nationality</label>
                         <select type="select" class="form-control" id="relation" name="nationality" >
                            <option selected>Select Nationality</option>
                            <option >Pakistan</option>
                            <option >Us</option>
                            <option >Afghanistan</option>
                            <option >other</option>
                   
                          </select>
                        </div>
                        
                      </div><br>
                  
                 
                 
              </div>
              <!-- /.card -->
            </div>
          </div>
			  </div>
<!--			  student educational details row-->
			  <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                Students Educational Details
                </h3>
              </div>
				 
              <div class="card-body pad table-responsive">
                  
                      <span style="color: brown"><h5>Matric</h5></span>
                      <div class="row">
                        <div class="form-group col-md-3 ">
                          <label for="phone1">major</label>
                          <select type="select" class="form-control" id="country" name="ssc_major" >
                            <option selected>Select SSC Major</option>
                            <option >Science</option>
                            <option >Art/Humanites</option>
                            <option >others</option>
                           
                            
                          </select>
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="district">Obtained marks</label>
                         
                          <input type="text" class="form-control" id="Roll_no" name="ssc_ob_marks" placeholder="Enter SSC obtained Marks" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="" >
                      
                        </div>
						  <div class="form-group col-md-3 ">
                          <label for="district">Total Marks </label>
                         
                          <input type="text" class="form-control" id="" name="ssc_t"
								 placeholder="Enter SSC total Marks" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="">
                      
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="">Percentage</label>
                          <input type="text" class="form-control" id="" name="ssc_percentage"    placeholder="%age" value="" >
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="">Board</label>
                          <select type="select" class="form-control"  name="ssc_board" >
                            <option selected>Select SSc Board</option>
                            <option >BISE swat</option>
                            <option >BISE peshawar</option>
                            <option >others</option>
                           
                            
                          </select>
                        </div>
                      </div>
				    <hr>
                      <span style="color: brown"><h5>Intermediate</h5></span>
				  <div class="row">
                        <div class="form-group col-md-3 ">
                          <label for="phone1">major</label>
                          <select type="select" class="form-control"  name="hssc_major" >
                            <option selected>Select hssc major</option>
                            <option >Medical</option>
                            <option >Engineering</option>
                            <option>Computer Science</option>
                            <option>Art/Humanites</option>
                            <option >others</option>
                           
                            
                          </select>
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="district">Obtained marks</label>
                         
                          <input type="text" class="form-control" id="Roll_no" name="hssc_ob_marks" placeholder="Enter HSSC obtained Marks" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value=""  >
                      
                        </div>
						  <div class="form-group col-md-3 ">
                          <label for="district">Total</label>
                         
                          <input type="text" class="form-control" id="Roll_no" name="hssc_total_marks" placeholder="Enter HSSC total Marks" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value=""  >
                      
                        </div>
                        <div class="form-group col-md-3 ">
                          <label >Percentage</label>
                          <input type="text" class="form-control" name="hssc_precentage" placeholder="%age" value="" >
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="">Board</label>
                          <select type="select" class="form-control"  name="hssc_board" >
                            <option selected>Select hssc board</option>
                            <option >BISE swat</option>
                            <option >BISE peshawar</option>
                            <option >others</option>
                           
                            
                          </select>
                        </div>
                      </div>
				  <div id="bachelors">
				   <hr>
                      <span style="color: brown"><h5>Bachelor's</h5></span>
				  <div class="row">
                        <div class="form-group col-md-3 ">
                          <label for="phone1">major</label>
                         <input type="text" class="form-control" name="bs_major" value="" placeholder="Enter Bachelor's major">
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="district"> CGPA</label>
                         
                          <input type="text" class="form-control" id="bs_cgpa" name="bs_cgpa" placeholder="Enter BS CGPA " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value=""  >
                      
                        </div>
						  <div class="form-group col-md-3 ">
                          <label for="district">College/ University</label>
                         
                          <input type="text" class="form-control" id="bs_coll" name="bs_coll"  value="" placeholder="Enter Graduation college"  >
                      
                        </div>
                        <div class="form-group col-md-3 ">
                          <label >Graduation year</label>
                          <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="bs_g_year" placeholder="Enter Graduation Year" value="" >
                        </div>
                       
                      </div>
					  </div>
						
						<div id="master">
						 <hr>
                      <span style="color: brown"><h5>Master's</h5></span>
				  <div class="row">
                        <div class="form-group col-md-3 ">
                          <label for="phone1">major</label>
                         <input type="text" class="form-control" name="ms_major" value="" placeholder="Enter Master's major">
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="district"> CGPA</label>
                         
                          <input type="text" class="form-control" id="ms_cgpa" name="ms_cgpa" placeholder="Enter Master's CGPA " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value=""  >
                      
                        </div>
						  <div class="form-group col-md-3 ">
                          <label for="district">College/ University</label>
                         
                          <input type="text" class="form-control" id="ms_coll" name="ms_coll"  value="" placeholder="Enter MS Graduation college"  >
                      
                        </div>
                        <div class="form-group col-md-3 ">
                          <label >Graduation year</label>
                          <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="ms_g_year" placeholder="Enter Graduation Year" value="" >
                        </div>
                       
                      </div>
							</div>
				 </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="submit" class="btn btn-primary"  style="visibility: block">Submit</button> 
						 <button type="submit" name="btnupd" class="btn btn-success"  style="visibility:none">Update</button>
                    </div>
                 
                 
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        
   
</form> 
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
<!--	   javascript code for form extension-->
	<script>
  // Function to show or hide fields based on selected discipline
  function toggleFields() {
    var selectedDiscipline = document.getElementById("discipline").value;
    var bachelorFields = document.getElementById("bachelors");
    var masterFields = document.getElementById("master");
    
    // Hide all fields
    bachelorFields.style.display = "none";
    masterFields.style.display = "none";

    // Show fields based on selected discipline
    if ( selectedDiscipline === "MS" ) {
      bachelorFields.style.display = "block";
    }
	  else if(selectedDiscipline == "Ph.D"){
		 bachelorFields.style.display = "block"; 
		 masterFields.style.display = "block"; 
	  }
  }

  // Attach event listener to the select element
  document.getElementById("discipline").addEventListener("change", toggleFields);
  
  // Call toggleFields initially to set initial state based on selected option
  toggleFields();
</script>
<script type="text/javascript">
	function FillAddressInput(){
		let checkBox= document.getElementById('checkBox');
       let peraddress = document.getElementById("peraddress");
       let preaddress = document.getElementById("preaddress");
		if (checkBox.checked == true)
        {
        
       let perval = peraddress.value;
			
       preaddress.value = perval;
	}
		else{
			  preaddress.value = "";
		}
}
	
	
	</script>
	 

	
</body>
</html>
