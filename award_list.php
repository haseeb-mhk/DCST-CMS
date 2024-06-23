<?php
include('includes/connection.php');

$mid_marks = [];
$final_marks = [];
$assignment_marks = [];
$pres_quiz_marks = [];
//$result = mysqli_query($con,'select * from semester');

if(isset($_GET['sub_id'])){
	$sub_id = $_GET['sub_id'];
	$assign_s = mysqli_query($con,"select * from assign_subject where assign_subject_id ='$sub_id' ");
	$a_s = mysqli_fetch_row($assign_s);
	$s_code = $a_s[1];
	$t_id = $a_s[2];
	$s_id = $a_s[3];
	$p_name = $a_s[4];
	$shift = $a_s[5];
	
//	for teacher
	$teacher = mysqli_query($con,"select * from teacher_list where Teacher_Id ='$t_id' ");
	$t = mysqli_fetch_row($teacher);
	$teacher_Name = $t[1];
	
//	for semester
	$semester = mysqli_query($con,"select * from semester where semester_id ='$s_id' ");
	$sem = mysqli_fetch_row($semester);
	$semes = $sem[1];
	$session = $sem[2];
	
//	for subject
	$subject = mysqli_query($con,"select * from subject_list where Sub_Code ='$s_code' ");
	$sub = mysqli_fetch_row($subject);
//	name
//	$ = $sub[1];
	$subject_id = $sub[0];
	$s = $sub[2];
	$s_credit = $sub[3];
	$total = $sub[4];

//	for student list
	$student_list = mysqli_query($con,"select * from stduent_roll_list where Shift = '$shift' and program ='$p_name' and Session = '$session' order by roll asc");
	$totalRows_student_list = mysqli_num_rows($student_list);
	
	
}


if(isset($_POST['btnCSV'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            for ($i = 0; $i < 8; $i++) {
					fgetcsv($csvFile);
					}
            // Parse data from CSV file line by line
//			$k = 1;
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
			    $mid_t= $line[2];
				$final_t = $line[3];
				$ass_marks = $line[4];
				$pres_marks = $line[5];
				array_push($mid_marks,$mid_t);
				array_push($final_marks,$final_t);
				array_push($assignment_marks,$ass_marks);
				array_push($pres_quiz_marks,$pres_marks);
				
             	
            }
            
            // Close opened CSV file
            fclose($csvFile);
//            print_r($mid_marks);
            echo("Data loaded successfully");
        }else{
            echo("please import the file in csv format");
        }
    }else{
        echo("please import the file first");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Award List</title>
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
            <h1>Award List of <?php echo($s)?></h1>
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
	      <div class="col-md-2"></div>
          <div class="col-md-8">
           
              
             

   <table  border="0" class="table table-bordered table-responsive-md" id="table">
  <tr>
       <td colspan="4">
		   <button id="btnExport" type="button" class="btn btn-info"><i class="fa fa-file-csv"></i> Export to CSV</button>
</td>
	  <td colspan="2" >
		  <div class="row" >


    <!-- Import link -->
    <div class="col-md-12 head" >
        <div class="" align="left">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import CSV</a>
        </div>
    </div><br>

    <!-- CSV file upload form -->
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form  method="post" enctype="multipart/form-data">
            <input type="file" name="file" /><br>

            <input type="submit" class="btn btn-primary" name="btnCSV" value="import Records">
        </form>
    </div>


</div>
	  
	  </td>
  </tr>
  
    <form action="award_list_data.php" name="form1" method="post">
    
    <tr>
    	
      
        <td colspan="6" align="center"><p>Department of Computer Science<br>

          University of Swat<br>

			Award List (<?php echo $shift?>)</p></td>
         </tr>
      <tr>
        <td colspan="2">Degree Program</td>
        <td colspan="3"><?php echo $p_name; ?></td>
        <td colspan="">Semester</td>
      </tr>
      <tr>
        <td colspan="2">Course Title</td>
        <td colspan="3"><?php echo $s ?></td>
        <td><?php echo $semes ?></td>
      </tr>
      <tr>
        <td colspan="2">Credit Hours</td>
        <td colspan="3"><?php echo $s_credit ?></td>
        <td>Course-code</td>
      </tr>
      <tr>
        <td colspan="2">Course Teacher</td>
        <td colspan="3"><?php echo $teacher_Name ?></td>
        <td><?php echo $s_code; ?></td>
      </tr>
      <tr>
        <td colspan="2">Total Marks</td>
        <td ><?php echo $total ?></td>
        
      </tr>
  
    
      <tr>
            
            <td>Name</td>
            <td>Rol No</td>
             <td>Mid Term</td>
            <td>Final Term</td>
               <td>Assignment Marks</td>
            <td>Presentaion/Quize</td>
          </tr>
         
		
		
		
		<?php
		$zz=0;
		$i=1;
			$em = " ";
		 while ($row_student_list = mysqli_fetch_array($student_list)){
			 $std_nm=$row_student_list['Name']; 
			 $std_rulls=$row_student_list['roll']; ?>



<?php

if($i==1){ $list[$i] = " $std_nm,$std_rulls,Mid Term,Final Term, Assignment, Presnt/Quize"; }
else     {
 $list[$i] = "$std_nm,$std_rulls,,,,";
}
?>



		 <tr>
           
             <td><?php echo $row_student_list['Name']; ?>
               <input type="hidden" name="Reg_No<?php echo $i; ?>" id="Reg_No<?php echo $i; ?>" value="<?php echo $row_student_list['Registration_No']; ?>"></td>
            <td><?php echo $row_student_list['roll']; ?><input type="hidden" name="Roll_No<?php echo $i; ?>" value="<?php echo $row_student_list['roll']; ?>" size="8" required /></td>
			
            <td><input type="text" name="Mid_Term_Marks<?php echo $i; ?>" value="<?php if(empty($mid_marks)){
	echo($em);
}
			 else{
				 echo($mid_marks[$zz]);}
					   ?>" size="8" id="a<?php echo $zz; ?>" required/> </td>
            <td><input type="text" name="Final_Term_Marks<?php echo $i; ?>" value="<?php if(empty($final_marks)){
	echo($em);
}
			 else{
				 echo($final_marks[$zz]);}
					   ?>" size="8"   id="b<?php echo $zz; ?>" required /></td>
             <td><input type="text" name="Assignment_Marks<?php echo $i; ?>" value=" <?php if(empty($assignment_marks)){
	echo($em);
}
			 else{
				 echo($assignment_marks[$zz]);}
					   ?>" size="8"  id="c<?php echo $zz; ?>" required /> </td>
            <td><input type="text" name="Presentation_Marks<?php echo $i; ?>" value=" <?php if(empty($pres_quiz_marks)){
	echo($em);
}
			 else{
				 echo($pres_quiz_marks[$zz]);}
					   ?>" size="8" id="d<?php echo $zz; ?>" required /> </td>
			
			
          </tr>
          <?php
		  $i++;
		  $zz++;
		   }  ?>
          
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="5"><label for="textfield"></label>
              <input type="hidden" name="total_student" id="total_student" value="<?php echo $totalRows_student_list; ?>">
              <input type="hidden" name="semester" id="semester" value="<?php echo($semes); ?>">
              <input type="hidden" name="shift" id="shift" value="<?php echo($shift); ?>">
               <input type="hidden" name="subject" id="subject" value="<?php echo ($_GET['sub_id']) ?>">
                 <input type="hidden" name="sem_id" id="sem_id" value="<?php echo ($s_id); ?>">
               <input type="submit" name="button" id="button" value="Submit" class="btn btn-primary"></td>
             </tr>
  </form>
</table>
                      

				  
              
              <!-- /.card-body -->
            
            <!-- /.card -->

          </div>
         
	      <div class="col-md-2"></div>
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
	<script type="text/javascript">
	class csvExport {
  constructor(table, header = true) {
    this.table = table;
    this.rows = Array.from(table.querySelectorAll("tr"));
    if (!header && this.rows[0].querySelectorAll("th").length) {
      this.rows.shift();
    }
    // console.log(this.rows);
    // console.log(this._longestRow());
  }

  exportCsv() {
    const lines = [];
    const ncols = this._longestRow();
    for (const row of this.rows) {
      let line = "";
      for (let i = 0; i < ncols; i++) {
        if (row.children[i] !== undefined) {
          line += csvExport.safeData(row.children[i]);
        }
        line += i !== ncols - 1 ? "," : "";
      }
      lines.push(line);
    }
    //console.log(lines);
    return lines.join("\n");
  }
  _longestRow() {
    return this.rows.reduce((length, row) => (row.childElementCount > length ? row.childElementCount : length), 0);
  }
  static safeData(td) {
    let data = td.textContent;
    //Replace all double quote to two double quotes
    data = data.replace(/"/g, `""`);
    //Replace , and \n to double quotes
    data = /[",\n"]/.test(data) ? `"${data}"` : data;
    return data;
  }
}

const btnExport = document.querySelector("#btnExport");
const tableElement = document.querySelector("#table");

btnExport.addEventListener("click", () => {
  const obj = new csvExport(tableElement);
  const csvData = obj.exportCsv();
  const blob = new Blob([csvData], { type: "text/csv" });
  const url = URL.createObjectURL(blob);
  const a = document.createElement("a");
  a.href = url;
  a.download = "award_list of <?php echo($s) ?> semester<?php echo($semes)?> <?php echo($session)?> .csv";
  a.click();

  setTimeout(() => {
    URL.revokeObjectURL(url);
  }, 500);
});
		
		
		
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
