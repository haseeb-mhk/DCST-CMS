<?php

include("includes/connection.php");

include('getGradePointValue.php');
$failer=0;




  

////////////////////////////pesonal informaion////////////
$colname_personal_info=$_POST['roll_no'];
$query_personal_info = "SELECT * FROM stduent_roll_list WHERE roll = '$colname_personal_info'";
$personal_info = mysqli_query($con,$query_personal_info) or die(mysqli_error());
$row_personal_info = mysqli_fetch_assoc($personal_info);
$totalRows_personal_info = mysqli_num_rows($personal_info);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Detail Marks Sheet</title>
	
	<?php include "includes/links.php"?>
<style type="text/css">
.bg

{

}
.dmc {
/*	background-image: url(bg.jpg);*/
	background-repeat: no-repeat;	
	width:800px;
	height:px;
	padding-top:100px;
	azimuth:center;
	margin-left:40px;
	page-break-after:always;
}
.dmc_top
{
	width:100%;
	float:left;	
}
.dmc_body
{
	width:100%;
	margin-top:1px;
	float:left;
	font-family: "Times New Roman", Times, serif;
}
.dmc_bottom
{
	width:100%;
	margin-top:1px;
	float:left;
	font-family:"cursive";
}
.myclass{
width:100%;
	margin-top:1px;
	float:left;
	font-family:"cursive";
}
.dmc_bottom2
{
	width:100%;
	margin-top:2px;
	margin-bottom:30px;
	float:left;
	font-family:"Arial", Helvetica, sans-serif;
}

</style>

<style type="text/css">
.NATScheduleTable {
	margin: 0px; padding: 0px; width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 8px; vertical-align: top;
}
.NATScheduleTable tr {
	
}
.NATScheduleTable th {
	color: rgb(255, 255, 255); font-weight: bold; background-color: rgb(255, 102, 0);
}
.NATScheduleTable td {
	height: 1px; text-align: left; vertical-align: middle;
	border:1px;
	border-bottom-color:#00C;
	border-style:double;
	border-width:1px;
	font-family: cursive;
}
.NATScheduleTable #bold {
	font-weight: bold;
}

.dmcborder {
	height: 25px; text-align: center; vertical-align: middle; font-family :cursive;
font-size: 10px;
	border:1px;
	border-bottom-color:#00C;
	border-style:double;
	border-width:1px;
}
</style>
</head>

<body class="bg">
<div class="row" width>
<!--	<div class="col-"></div>-->
	<div class="col-lg-12">
	
		
<div class="dmc" style="">



  <div class="dmc_top">
  <table  border="0" width="100%">
	  
      <tr >
       <th >
				<img  src="includes/images/download.png" width="100px" height="100px" alt="image not found">
			</th>
				
				<th style="text-align: left; font-family: 'Old English Text MT', serif;"  >
				
				<h1 style="margin-left: 40px;font-size: 50px"> University of Swat</h1>
					<h4 style="margin-left: 80px">Khyber Pakhtunkhwa, Pakistan</h4>
				
				
				</th>
      </tr><br />

      <tr >
        <tr align="center" style="border-bottom: 2px solid black">
				<td colspan="16">
					
						<h6 style="font-weight: bolder; "> Department of Computer and Software Technology</h6>
					<h6> <b>Email:</b> dcst@uswat.edu.pk | <b>Phone:</b> 0946613082</h6>
						<h6 style="font-weight: bolder">
					
					<?php 
			$degree=$row_personal_info['program']; 
		if($degree=='BCS')
		{
			echo "BS Computer Science";
		}
			else if($degree=='SE')
		{
		echo "BS Software Engineering";

		}
		else
		{
		echo "BS Information Technology";
		}
		
		
		
		?>
					</h6>
				<h6 style="font-weight: bolder"> TRANSCRIPT</h6>
					
				

				</td>
				
				</tr>
      </tr>
      
    </table>
  <table class="NATScheduleTable" border="0" width="100%">
	  
      <tr>
        <td>Registration No</td>
        <td><?php echo $row_personal_info['Registration_No']; ?></td>
        <td>Roll No</td>
        <td><?php echo $row_personal_info['roll']; ?></td>
      </tr>
      <tr >
        <td>Name</td>
        <td><?php echo $row_personal_info['Name']; ?></td>
        <td>Father Name</td>
        <td><?php echo $row_personal_info['F_Name']; ?></td>
      </tr>
      <tr>
        <td>Progarm</td>
        <td><?php 
			$degree=$row_personal_info['program']; 
		if($degree=='BCS')
		{
			echo "BS-CS";
		}
			else if($degree=='SE')
		{
		echo "BS-SE";

		}
		else
		{
		echo $row_personal_info['program'];
		}
		
		
		
		?></td>
        <td>Session</td>
        <td><?php echo $row_personal_info['Session']; ?></td>
      </tr>
    </table>
  
  </div>
  <div class="dmc_body">
   <table width="100%"  border="1">
        <tr   align="center" style="font-size: 8px;font-weight: bold" >
       
          <td width="9.5%" >Semester</td>
          <td width="8.5%">Corse Code</td>
          <td width="32%">Title</td>
          <td width="9%">Credit Hours</td>
          <td width="9%">GP</td>
          <td width="9%">Grade</td>
          <td width="10%">Obtained Marks / if_fail</td>
          <td width="10%">GPA</td>
          
        </tr>
		</table>
  <?php 
  $cgpa=0;
  $incr=0;
  $semester=1;
  $probation=0;
  
  	$totCredits = 0;
	$totGradepoints = 0;
	$gplo = 0;

  
  
  while($semester <= $_POST['semester'])
  {
	  
	  
	  $colname_dmc = $_POST['roll_no'];
  

//mysql_select_db($database_lms, $lms);
$query_dmc = "SELECT * FROM semester_exam WHERE Roll_No=".$colname_dmc." AND semester=".$semester."";
$dmc = mysqli_query($con,$query_dmc) or die(mysqli_error());
$row_dmc = mysqli_fetch_assoc($dmc);
$totalRows_dmc = mysqli_num_rows($dmc);

	  
	  ?>
      <table width="100%"  border="0">
        
  <tr>
    <td class="dmcborder" width="10%"><?php echo $semester."<br>"; 
	if ($semester%2!=0)
	{echo"Fall Semester"; }
	else {echo "Spring Semester";}?></td>
    <td colspan="4"><table  width="100%">
      
        <?php
		
		$sum_gp=0;
		$sum_cr=0;
		$gpa=0;
		$num_sub=0;
		$num_sub_fail=0;
		


		
		 do { ?>
        <?php
		$num_sub=$num_sub+1;
		///////////////////////subject code ////////////////
$colname_subject_code = $row_dmc['Subject_Id'];
//mysql_select_db($database_lms, $lms);
$query_subject_code ="SELECT Subject_Code FROM assign_subject WHERE assign_subject_id = '$colname_subject_code'"; 
$subject_code = mysqli_query($con,$query_subject_code) or die(mysqli_error());
$row_subject_code = mysqli_fetch_assoc($subject_code);
$totalRows_subject_code = mysqli_num_rows($subject_code);
/////////////////////end//////////////////////
////////////////////////subject informaion//////////
$colname_subj_name = $row_subject_code['Subject_Code'];
//mysql_select_db($database_lms, $lms);
$query_subj_name = "SELECT * FROM subject_list WHERE Sub_Code = '$colname_subj_name'"; 

$subj_name = mysqli_query($con,$query_subj_name) or die(mysqli_error());


$row_subj_name       = mysqli_fetch_assoc($subj_name);
$totalRows_subj_name = mysqli_num_rows($subj_name);

	if($row_subj_name['Sub_Cridet']==0 && ($row_subj_name['Sub_Name']=="Mathematics-I" || "Mathematics-II") && $row_dmc['Obtained_Marks']==0 ){
//		from here the maths 1 and maths 2 will be skipped
	}else{
		
		?>
          <tr class="NATScheduleTable">
            
         <font size="10px">
           
            <td style width="9%"><?php echo $row_subj_name['Sub_Code']; ?></td>
            <td width="35%"><?php echo $row_subj_name['Sub_Name'];  ?></td>
            <td width="10%"><?php echo $row_subj_name['Sub_Cridet'];
			$sum_cr= $sum_cr+$row_subj_name['Sub_Cridet'];
			?>
			</td>
             <td width="10%">
			 <?php if($row_dmc['Obtained_Marks']>49) {
				 
				 $gplo = getGradePointValue($row_dmc['Obtained_Marks'],$row_subj_name['Sub_Cridet']); 
			
			echo $gplo;			}else{echo '0';} 
			   
			   if($row_dmc['Obtained_Marks']>49) {
			   $totGradepoints   = ($totGradepoints +  $gplo); 
			   }
			 $totCredits       = $totCredits + $row_subj_name['Sub_Cridet'];	
			
			 ?>
			 </td>
			 
			
            <td width="10%"><?php
			 include("grade.php"); 
				?></td>
            <td width="11%"><?php echo $row_dmc['Obtained_Marks']; ?> &nbsp;&nbsp;&nbsp; <sup>(<?php echo $row_dmc['if_fail']; ?>)</sup>
			<?php 
			 $failer=$failer+(int)$row_dmc['if_fail']; 
				?>
			</td>
           
          </font>
          </tr>
          <?php
                  
			      
	}

		  } while ($row_dmc = mysqli_fetch_assoc($dmc)); ?>
      </table></td>
    <td width="10%" class="dmcborder"><?php
		
		
			$gpa=$sum_gp/$sum_cr;
		////////////////////rounding////////////
$cgpa=$cgpa+$gpa;
$cgpa_probation=$cgpa/$semester;


echo round($gpa, 2);
if($_POST['roll_no']>=120000)
		{
if($cgpa_probation < 2 && $semester >=1)
{
  $probation=$probation + 1;
}
		} 
		else
		{ 
if($cgpa_probation < 2 && $semester >1)
{
  $probation=$probation + 1;
}
		}
			
		
//echo floor_dec($gpa,3,"."); 

		
		///////////////////////end rounding
		
		//echo $gpa;
		
		 ?> </td>
  </tr>
</table>

  
  
    
   
      <?php
	$semester++;
  }
	  	  ?>
      </div>
  <div class="dmc_bottom"><table width="100%" class="NATScheduleTable" border="0">
      <tr><td>
Status
</td>
<td><?php
		
		//$gpa=$sum_gp/$sum_cr;
		////////////////////rounding////////////

//echo $num_sub;    
$total_sub=$num_sub/2;

if($num_sub_fail > $total_sub)
{
	//echo $num_sub_fail;
echo "Semester Repeat (Not Promoted)";	
}
else if($probation==1)
{if($semester>8)
echo "Completed";
 else
	echo "Promoted / First Probation";
}

else if($probation ==2)
{
	echo "Promoted / Last Probation";
}
else if($probation >2)
{
	echo "Dropped";
}
else
{
if($degree=="MCS" && $semester>4)
echo "Completed";
	else if($semester>8)
echo "Completed" ;
else
	echo "Promoted";
}
		//echo $num_sub_fail;

//echo $num_sub_fail;

//echo floor_dec($gpa,3,"."); 

		
		///////////////////////end rounding
		
		//echo $gpa;
		
		 ?>

</td>


        <td >  <strong>CGPA</strong></td>
		 
        <td>
		<?php //echo $totGradepoints; echo "and"; echo $totCredits;  ?>
 
		
		<?php if($failer>6){ echo "Dropped"; }else{ echo round($totGradepoints/($totCredits),2);  } ?>
		
		</td> 
	
		
      </tr>
	  

    </table></div>
    
     <div class="dmc_bottom"><table width="100%" class="NATScheduleTable" border="0">
      
    </table></div> 
	
	
    <div class="myclass">
<table align="right" >
<tr>

</tr>
<tr>
<td ><font size="1px" align="bottom">
<p align="right"><b>Printed On:</b> </p>
<p align="right" margin-left="10px" style="margin-top: -10px"><?php 
	$currentDate = date('Y-m-d');
	$currentTime = date('H:i:s');
echo $currentDate." | ".$currentTime;
?> </p>
<p><align="right">  <b>. </b></p></font>
</td>
</tr>
	<tr>
<td ><font size="1px" align="bottom" >
<p align="right"><b>Verified BY:</b> </p>
<p align="right" margin-left="10px" style="margin-top: -10px">Semester Coordinator </p>
<p><align="right">  <b>. </b></p></font>
</td>
</tr>
</table>
<font  size="1px" align="bottom">
<span>      
<p ><b> Note:</b> UNVERIFIED RESULT (subject to verification and final result by the controller of examinations) </p>
	  </span>
	  <p style="font-family :cursive;margin-top: -10px">Errors and omissions are subject to subsequent rectification. 
         <Br>Not valid for legal purpose </p>
	</font>
		<font  size="1px" align="bottom" >
      
<p style="padding-top: 20px"><b>Prepared By:</b>
	<br />
Muhammad Taqweem</p>
	  
	</font>
	
	
	
	
	
	  
	  

</table>
  </div>
</div>

	
	</div>
<!--	<div class="col-1"></div>-->
	
	</div>	

	
	
</body>
</html>


