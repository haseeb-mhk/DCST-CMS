

<?php
include('includes/connection.php');
$roll_no = $_GET['id'];
$gender = $_GET['gender'];


$Std_detail_query = mysqli_query($con, "select * from stduent_roll_list where roll = '$roll_no' ");
$row_std_detail_query = mysqli_fetch_row($Std_detail_query);
if($row_std_detail_query){
	$reg_no = $row_std_detail_query[0];
	$roll = $row_std_detail_query[1];
	$name = $row_std_detail_query[2];
	$father_name = $row_std_detail_query[3];
	$Shift = $row_std_detail_query[4];
	$Session = $row_std_detail_query[5];
	$program = $row_std_detail_query[6];

}



?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Clearance</title>
	<?php include "includes/links.php"?>
	
	 <style>
        @media print {
            .print-bg {
                -webkit-print-color-adjust: exact; /* For Chrome and Safari */
                background-color: black !important;
                color: white !important;
                font-family: 'Old English Five';
                font-size: 20px;
                text-decoration-color: white;
                display: inline-block;
            }
			 table.print-table {
                margin: 0 ; /* Center the table horizontally */
            }
			  @media print {
            .print-table2 th {
                background-color: black;
                text-decoration-color:white;
            }
        }
    </style>
	
</head>
<body>

	
	<div class="container">
	
	<div class="row">
		<div class="col-1"></div>
		
		
		<div class="col-10">
			
			
			
			<table width="100%" style="margin-left: 30px;margin-top: 20px">
			
				
			
			<tbody>
				
				<tr>
				<td align="center">
					
					<img src="includes/images/download.png" alt="" width="100" height="100" />
					
					
					</td>
					<td align="left">
					<span style="font-size: 40px;font-family:  'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';margin-left: 120px;font-weight: ;" > University of Swat</span><br> 
	
			   <span style="font-size: 19px;font-family:  'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';margin-left: 130px;font-weight: ;" > Swat, Khyber Pakhtunkhwa, Pakistan </span><br> 
	
					
					</td>
				
				
				</tr>
				
			
				
				
				</tbody>
			
			
			</table><br>


			
			<table width="100%" border="0" cellspacing="0" style="margin-left: 40px;" class="">
  		<th rowspan="5" width="20%"></th>
  		<tr >
  			<td colspan="2" style="line-height:1.5em; font-weight: bold;"> <div class="print-bg" style="background-color: black; color: white; font-family: 'Old English Five'; font-size: 22px; text-decoration-color: white; display: inline-block;">
    CLEARANCE FOR FINAL TRANSCRIPT
</div>

  		</td>	
  		<td width="25%"></td>
  		</tr>

  	</table><br>
<table class="print-table">
			<tbody>
	<tr>
				<td>
		<span style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; font-size: large; font-size: 20px;text-align: justify;line-height: 2">

				<strong><u>STUDENT PROFILE / ADMISSION DETAILS:</u> </strong>
				<br>

				Student Name: &nbsp;&nbsp;<span style="text-decoration: underline;display: inline-block;"><?php echo $name; ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Father’s Name:  &nbsp;&nbsp;<span style="text-decoration: underline;display: inline-block;"><?php echo $father_name; ?></span> <br>

Date of Birth: _________________________________ &nbsp;&nbsp;Gender: ___________________&nbsp; &nbsp;CGPA: ____________________ <br>

Program: ____________________________&nbsp;&nbsp;&nbsp; Discipline: __________________________________________________ <br>

Session: __________________&nbsp;&nbsp; Class No: ___________________ &nbsp;&nbsp;Registration No: _________________________<br>

Department / Institute / School: ___________________________________________________________________ <br>

Present Address: ______________________________________________________________________________________<br>
 
Reason of Clearance: 1) Final Transcript &nbsp;<div style="width: 20px; height: 20px; border: 2px solid black; display: inline-block;"></div>&nbsp;&nbsp;&nbsp;
     2) If other Please Mention:<br>
________________ <strong>The applicant is required to made clearance from the following: </strong><br></span>
		</td>
				</tr>
	
	</tbody>
			
			
			</table>
				<table border="1" width="100%" style="text-align: center" class="print-table2">
					<thead class="print-table2-head">
					<th width="10%">S#</th>
					<th width="40%">Department</th>
					<th width="30%">Signature</th>
					<th width="30%">Seal</th>
					
					
					</thead>
					<tr>
					<td width="10%">1</td>
					<td width="40%">Central Library</td>
					<td width="30%"></td>
					<td width="30%"></td>
					
					</tr>
					<tr>
					<td width="10%">2</td>
					<td width="40%">Chief Proctor</td>
					<td width="30%"></td>
					<td width="30%"></td>
					
					</tr>
					<tr>
					<td width="10%">3</td>
					<td width="40%">Computer Laboratory</td>
					<td width="30%"></td>
					<td width="30%"></td>
					
					</tr><tr>
					<td width="10%">4</td>
					<td width="40%">Treasurer</td>
					<td width="30%"></td>
					<td width="30%"></td>
					
					</tr>
					<tr>
					<td width="10%">5</td>
					<td width="40%">Admin Officer (Transport)</td>
					<td width="30%"></td>
					<td width="30%"></td>
					
					</tr>
					<tr>
					<td width="10%">6</td>
					<td width="40%">Centralized Resource Lab</td>
					<td width="30%"></td>
					<td width="30%"></td>
					
					</tr>
					<tr>
					<td width="10%">7</td>
					<td width="40%">Hostel Warden <sub> <strong>(for Female Only)</strong></sub></td>
					<td width="30%"></td>
					<td width="30%"></td>
					
					</tr>
					<tr>
					<td width="10%">8</td>
					<td width="40%">Public Library</td>
					<td width="30%"></td>
					<td width="30%"></td>
					
					</tr>
				
					<tr>
					<td width="10%">9</td>
					<td width="40%">Head of Department</td>
					<td width="30%"></td>
					<td width="30%"></td>
					
					</tr>
					<tr>
					<td width="10%">10</td>
					<td width="40%">Provost/ ID Card Clearance</td>
					<td width="30%"></td>
					<td width="30%"></td>
					
					</tr>
					<tr>
					<td width="10%"></td>
					<td width="40%">Alumni Fee (Rs. 200)</td>
					<td width="30%"></td>
					<td width="30%"></td>
					
					</tr>
				<tbody
				
					   </table>
				</table><br>
			<table class="print-table" width="100%">
			
			<tbody>
				<tr>
				<td>
					<span style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; font-size: large; font-size: 18px;text-align: justify;line-height: 2">

				<strong style="margin-left: 400px">	Student’s Signature: ___________________________    </strong>    <br>
 <strong> Mobile No: _________________________________________________ FOR OFFICE USE ONLY:</strong> <br>

It is certified that Mr/Miss: ______________________________S/D/O
 ___________________________________________ <br>
enrolled under Registration No: ___________________in 
program_____________________________ session____________________ has completed his/her<br>
 degree requirements.  _________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     ______________________________ 

					
				</span><br>
					
					<span style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; font-size: large; font-size: 18px;text-align: justify;line-height: 2;font-weight: bold">
					Dealing Assistant / Clerk <span style="margin-left: 250px">Head / In-charge of the Department</span>				
					
					</td>
				
				</tr>
				
				</tbody>
			</table>
		
		</div>
		
		<div class="col-1"></div>
		
		
		</div>
	
	
	
	</div>
	
	


</body>
</html>

                                                                                              