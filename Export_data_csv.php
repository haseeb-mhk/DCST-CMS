<?php
include('includes/connection.php');

$display1 = "block";
$display2 = "none";
if(isset($_POST["btnSub"])){
							 $display1 = "none";
							 $display2 = "block";}


?>

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
            <h1>Export Data to CSV </h1>
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
  
		<form method="post">
	  <div class="row" >
        <div class="col-12">

        <div class="card card-primary card-outline">
			 <div class="card-header">
                <h3 class="card-title">
                 Filters
                </h3>
              </div>
            <div class="card-body">
              

             


              <div class="row">
                <div class="col-6">
                <strong><label for="age">Discipline</label></strong>
                          <br>  
                          <select type="select" class="form-control" id="discipline"   name="disc"  >
                            <option selected>Select Discipline</option>
                            <option > BS</option>
                            <option > MS</option>
                            <option > Ph.D</option>
                          
                            
                          </select>

                </div>
                <div class="col-6">
                <strong><label for="age">Session<span style="color: blue;"></span></label></strong>
                          <select type="select" class="form-control" id="session" name="ses">
                            <option selected>Select Session</option>
                            <option >2022_26</option>
                            <option >2021-25</option>
                            <option >2020-24</option>
                            <option >2019-23</option>
                          </select>

                </div>


              </div><br>
				<div class="container ml-2 ">
				
    <div class="row">
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="full_name" > <label class="form-check-label">Full Name</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="f_name" > <label class="form-check-label">Father Name</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Roll_no" > <label class="form-check-label">Roll No</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Registration_no" > <label class="form-check-label">Registration No</label></div>


    </div>
					<div class="row">
					<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Discipline"  > <label class="form-check-label">Discipline</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="program" > <label class="form-check-label">Program</label></div>
						
						<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Session" > <label class="form-check-label">Session</label></div>
					<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Blood" > <label class="form-check-label">Blood Group</label></div>
					</div>
    <div class="row">

<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Dob" > <label class="form-check-label">DOB</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Cnic" > <label class="form-check-label">CNIC</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Personal_c_no" > <label class="form-check-label">Personal Contact No</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Emergency_c_no" > <label class="form-check-label">Emergency Contact No</label></div>

    </div>
    <div class="row">
    <div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Permanent_address" > <label class="form-check-label">Permanent Address</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Present_address" > <label class="form-check-label">Present Address</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Domicile_District" > <label class="form-check-label">Domicile District</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Province" > <label class="form-check-label">Province</label></div>
</div>
<div class="row">
    <div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Addmission_quota" > <label class="form-check-label">Addmission Qouta</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Gender" > <label class="form-check-label">Gender</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Religion" > <label class="form-check-label">Religion</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Nationality" > <label class="form-check-label">Nationality</label></div>
</div>
					<hr>
					<span><strong><u>Educational Details</u></strong></span>
<hr>
					<div class="row">
    <div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Matric_major" > <label class="form-check-label">SSC Major</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Ssc_ob_marks" > <label class="form-check-label">SSC Obtained Marks</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Ssc_total_marks" > <label class="form-check-label">SSC total Marks</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Ssc_percentage" > <label class="form-check-label">SSC percentages</label></div>

</div>
<div class="row">
	<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Ssc_board" > <label class="form-check-label">SSC Board</label></div>
    <div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Hssc_major" > <label class="form-check-label">HSSC Major</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Hssc_ob_marks" > <label class="form-check-label">HSSC Obtained Marks</label></div>
<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Hssc_total_marks" > <label class="form-check-label">HSSC total Marks</label></div>


<!-- <div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Picture" > <label class="form-check-label">Picture</label></div> -->

</div>
					<div class="row">
						<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Hssc_percentage" > <label class="form-check-label">HSSC percentages</label></div>
					<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="Hssc_board" > <label class="form-check-label">HSSC Board</label></div>
						
					
					</div>
					
					<div class="row" id="bachelors">
						<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="BSc_major" > <label class="form-check-label">Bs Major</label></div>
						<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="BSc_cgpa" > <label class="form-check-label">Bs cgpa</label></div>
						<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="BSc_college" > <label class="form-check-label">Bs college</label></div>
					<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="BSc_graduation_year" > <label class="form-check-label">Bs Graduation Year</label></div>
						
					
					</div><div class="row" id="master">
					<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="MSc_major" > <label class="form-check-label">Ms Major</label></div>
						<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="MSc_cgpa" > <label class="form-check-label">Ms cgpa</label></div>
						<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="MSc_college" > <label class="form-check-label">Ms college</label></div>
					<div class="col-3"> <input type="checkbox" class="form-check-input"  name="selected_fields[]" value="MSc_graduation_year" > <label class="form-check-label">Ms Graduation Year</label></div>
						
					
					</div>
    <!-- Add more fields as needed -->
    <br/><input type="submit" class="btn btn-outline-success" name="btnSub" value="Submit">
				
				</div>


            </div>
          </div>


        </div>
    </div>
		
		
    <div class="row" style="display: <?php echo($display2) ?>" >
        <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-body">
             
              <!-- Table with stripped rows -->
              <table id="example1" class="table table-bordered table-striped">
				  
                <thead>
                      <tr>
                        <?php  
                         if(isset($_POST["btnSub"])){
							 $display1 = "none";
							 $display2 = "block";
                            // Get selected fields from the form
                            $selectedFields = $_POST["selected_fields"];
                            $disc = $_POST["disc"];
                            $ses = $_POST["ses"];
                            
                            // Build the SQL query based on the selected fields
                          $sql = "SELECT " . implode(", ", $selectedFields) . 
           " FROM students_biodata INNER JOIN education_details ON students_biodata.student_id = education_details.student_id" .
           " WHERE students_biodata.Discipline='$disc' AND students_biodata.Session = '$ses'";
    $result = mysqli_query($con, $sql);
                            if ($result) {
                            //     Output table headers based on the selected fields
                               foreach ($selectedFields as $field) {
                                //    echo "<th>" . $field . "</th>";
                               
                               
                       
                      
                        
                        ?>
						<th><?php echo "$field" ?></th>
						
                       <?php } ?>
                      </tr> 
                     
                    </thead> 
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) {
           
           
         ?>
                          <tr>
                             <?php  foreach ($selectedFields as $field) {?>
                
                <td><?php echo($row[$field]) ?> </td>
           <?php } ?>   

                          </tr>   
                       
                    <?php } }}?>
                    </tbody>
                 <tfoot>
				  <tr>
					 <?php
					   $sql = "SELECT " . implode(", ", $selectedFields) . 
           " FROM students_biodata INNER JOIN education_details ON students_biodata.student_id = education_details.student_id" .
           " WHERE students_biodata.Discipline='$disc' AND students_biodata.Session = '$ses'";
    $result = mysqli_query($con, $sql);
                            $result = mysqli_query($con, $sql);
                            if ($result) {
                            //     Output table headers based on the selected fields
                               foreach ($selectedFields as $field) {
                                //    echo "<th>" . $field . "</th>";
                               
                               
                       
                      
                        
                        ?>
						<th><?php echo "$field" ?></th>
						
                       <?php } }?>
					  
					 
					 
					 </tr>
				  
				  </tfoot>
              </table>
              <button id="btnExportToCsv" type="button" class="btn btn-success">Export to CSV</button>
              <!-- End Table with stripped rows -->

            </div>
  </div>
	
        </div>


    </div>
</form>
     
	 
		
		
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
<script>


class TableCSVExporter {
    constructor (table, includeHeaders = true) {
        this.table = table;
        this.rows = Array.from(table.querySelectorAll("tr"));

        if (!includeHeaders && this.rows[0].querySelectorAll("th").length) {
            this.rows.shift();
        }
    }

    convertToCSV () {
        const lines = [];
        const numCols = this._findLongestRowLength();

        for (const row of this.rows) {
            let line = "";

            for (let i = 0; i < numCols; i++) {
                if (row.children[i] !== undefined) {
                    line += TableCSVExporter.parseCell(row.children[i]);
                }

                line += (i !== (numCols - 1)) ? "," : "";
            }

            lines.push(line);
        }

        return lines.join("\n");
    }

    _findLongestRowLength () {
        return this.rows.reduce((l, row) => row.childElementCount > l ? row.childElementCount : l, 0);
    }

    static parseCell (tableCell) {
        let parsedValue = tableCell.textContent;

        // Replace all double quotes with two double quotes
        parsedValue = parsedValue.replace(/"/g, `""`);

        // If value contains comma, new-line or double-quote, enclose in double quotes
        parsedValue = /[",\n]/.test(parsedValue) ? `"${parsedValue}"` : parsedValue;

        return parsedValue;
    }
}

        const dataTable = document.getElementById("example1");
        const btnExportToCsv = document.getElementById("btnExportToCsv");

        btnExportToCsv.addEventListener("click", () => {
            const exporter = new TableCSVExporter(dataTable);
            const csvOutput = exporter.convertToCSV();
            const csvBlob = new Blob([csvOutput], { type: "text/csv" });
            const blobUrl = URL.createObjectURL(csvBlob);
            const anchorElement = document.createElement("a");

            anchorElement.href = blobUrl;
            anchorElement.download = "BioData_<?php echo($disc."_".$ses)?>.csv";
            anchorElement.click();

            setTimeout(() => {
                URL.revokeObjectURL(blobUrl);
            }, 500);
        });
    </script>
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
</body>
</html>
