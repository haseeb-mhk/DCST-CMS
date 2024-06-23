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
  <title>Home | Reference Letter</title>
	<?php include "includes/links.php"?>
	
	
	
</head>
<body>
<div id="container" align="center">
	
	<div class="row">
		
		
		<div class="col-12" style="border: 2px solid black" >
		
	
        <table style="width: 100%;margin-left: 30px" border=0 width="100" >
    <tbody border=0>
        <tr>
          <td align="right" ><img src="includes/images/download.png" alt="" width="100" height="100" style="margin-top: 15px" /></td>
          <td align="left">
			  <span style="font-size: 40px;font-family:  'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';margin-left: 120px;font-weight: ;" > University of Swat</span><br> 
	
			   <span style="font-size: 19px;font-family:  'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';margin-left: 130px;font-weight: ;" > Swat, Khyber Pakhtunkhwa, Pakistan </span><br> 
	
			  

            </td>
         <!-- <td width=20% align=center ><img src="images/cs.png" alt="" width="140" height="115" /></td> -->
        </tr >
    </tbody>
</table >

<table style="width: 100%" border=0>
   
        
       
</table>
  <h4 align="center">
  	
  	</h4>
  	<br>
  	<table width="100%" border="0" cellspacing="0" style="margin-top: 0px;">
  		<th rowspan="5" width="10%"></th>
  		<tr >
  			<td colspan="2" style="text-align:justify;  padding 0px;"> <span style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; font-size: large; font-size: 20px;text-align: justify;line-height: 2">

				<strong><u>STUDENT PROFILE / ADMISSION DETAILS:</u> </strong>
				<br>

				Student Name: _____________________________  Father’s Name: ___________________________ <br>

Date of Birth: ____________________________ Gender: ____________ CGPA: __________________ <br>

Program: _________________________________ Discipline: ___________________________________ <br>

Session: ______________ Class No: _____________________ Registration No: ________________<br>

Department / Institute / School: _______________________________________________________ <br>

Present Address: _________________________________________________________________________<br>
 
Reason of Clearance: 1) Final Transcript &nbsp;<div style="width: 20px; height: 20px; border: 2px solid black; display: inline-block;"></div>&nbsp;&nbsp;&nbsp;
     2) If other Please Mention:<br>
________________ <strong>The applicant is required to made clearance from the following: </strong><br></span>
	
				<table border="1" width="80%" style="text-align: center" >
					<thead>
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
					<td width="10%">1</td>
					<td width="40%">Central Library</td>
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
				<span style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; font-size: large; font-size: 18px;text-align: justify;line-height: 2">

				<strong style="margin-left: 300px">	Student’s Signature: ___________________________    </strong>    <br>
 <strong> Mobile No: ______________________________________ FOR OFFICE USE ONLY:</strong> <br>

It is certified that Mr/Miss: ______________________________S/D/O<br>
 __________________________  enrolled under Registration No: ___________________in <br>
program_____________________________ session____________________ has completed his/her<br>
 degree requirements.  _________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     ______________________________ 

					
				</span><br>

<span style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; font-size: large; font-size: 18px;text-align: justify;line-height: 2;font-weight: bold">
					Dealing Assistant / Clerk <span style="margin-left: 150px">Head / In-charge of the Department</span>				
				
				</span>
  		</td>	
  		<td width="10%"></td>
  		</tr>

  	</table>
  	<br>
<br>
<br>

  	


		
		
		</div>
	
		
		
		
		</div>
	


</div>

<script type="text/javascript">
<!--
//-->
</script>
<?php //if(isset($_GET['added']) || isset($_GET['addnew'])) echo '<script type="text/javascript"> document.getElementById("rollno").focus(); </script>'; ?>


</body>
</html>

                                                                                              