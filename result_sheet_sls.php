<?php
include("includes/connection.php");
include('getGradePointValue.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Detail Marks Sheet</title>
<style type="text/css">
.bg

{
margin-top:-35px;
}
.dmc {
	<!--background-image: url(bg.jpg);-->
	background-repeat: no-repeat;	
	width:670px;
	
	azimuth:center;
	margin-left:40px;
<!--	page-break-after:always; -->
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
	margin: 0px; padding: 0px; width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px; vertical-align: top;
	 border-collapse: collapse;
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
<br/><br />
<br />
	

	<center>
	    <table width="971" border="0" class="print">
      
  <tr>
    <th colspan="2" align="center"><img src="includes/images/download.png" width="124" height="112" /></th><th class="hi" colspan="4" align="center"><h3><strong>Department Of Computer Science & Software Technology</strong></h3>
      <h3 align="center"> DRAFT UN-SIGNED RESULT</h3>
     </th></tr><tr>
    <th width="100" scope="col">&nbsp;</th>
    <th width="174" scope="col" align="right">&nbsp;</th>
    <th width="390" scope="col">Program: <?php echo($_POST['program']) ?>
	</th>
    <th width="289" scope="col" align="left"><span class="heading_title"> Session:<?php echo($_POST['session'])?></span></th>
    <th width="289" scope="col" align="left"><span class="heading_title"> Shift:<?php echo($_POST['sh'])?></span></th>
		  
  
  </tr>
</table>
 <table width="100%" class="NATScheduleTable print" border="0" style=''  >
    


<?php

$session_of=$_POST['session'];
//		echo($session_of);
$program_of=$_POST['program'];
//		echo($program_of);
$shift= $_POST['sh'];
//		echo($shift);

//		if($shift == 'Open Merit'){
//			$shift = "Morning";
//		}
//		else if($shift == 'Self Finance'){
//			$shift = "Evening";
//		}
//		else{
//			$shift=$_POST['shift'];
//		}
	
?>





<?php
$std_roll_sls[0]=0;
$std_roll_num=0;

//mysql_select_db("lms", $lms);
$result = mysqli_query($con,"SELECT * FROM stduent_roll_list where `SESSION`='$session_of' && `program`='$program_of' and Shift = '$shift' order by roll asc");
while($row = mysqli_fetch_array($result))
{
$std_roll_num++;
$std_roll_sls[$std_roll_num]=$row['roll'];
}

?>








<br>



<?php

for($t_s=1;$t_s<=$std_roll_num;$t_s++){


		 if($t_s==1){ ?>
		 <tr>
		 
		 <?php } ?>


		 
  
		 
		 
<?php
////////////////////////////pesonal informaion////////////
$total_fail_subject=0;
$total_fail_subject1=0;
$total_17g='no';
$total_17g_sub=0;
$colname_personal_info=$std_roll_sls[$t_s];
//mysql_select_db($database_lms, $lms);
$query_personal_info = "SELECT * FROM stduent_roll_list WHERE roll = '$colname_personal_info'"; 
$personal_info = mysqli_query($con,$query_personal_info) or die(mysqli_error());
$row_personal_info = mysqli_fetch_assoc($personal_info);
$totalRows_personal_info = mysqli_num_rows($personal_info);


?>


<body class="bg" >
<div class="dmc">

<?php 

?>

  <div class="dmc_top">
  
      <!--<td>Registration No</td> <td><?php echo $row_personal_info['Registration_No']; ?></td>-->
		
        
		
		
		<!--<td>Father Name</td>
        <td><?php echo $row_personal_info['F_Name']; ?></td>
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
      </tr>-->
    
	
	
  
  </div>
  <div class="dmc_body">
  
         
		 <?php if($t_s==1){ ?>
          <th>Roll_no</th>
          <th>Name</th>
		  
		   <?php 
		   
		   for($tot_sem=1; $tot_sem<=$_POST['semester'];$tot_sem++){ ?>
		   <th>gpa <?php echo $tot_sem; ?></th>
		   <th>cgpa</th>
		   <?php } ?>
<th>status</th>		   
<th>FC</th>		   
<!--<th>17g</th>-->		   
		  </tr>
<?php } ?>		  
		  
		  <tr>
		  <td><?php echo $row_personal_info['roll']; ?></td>
      
        <td><?php echo $row_personal_info['Name']; ?></td>
        
  
          <!--<th width="10%" >Semester</th>
          <th width="9%">Corse Code</th>
          <th width="31%">Title</th>
          <th width="9%">Credit Hours</th>
          <th width="9%">GP</th>
          <th width="9%">Grade</th>
          <th width="10%">Obtained Marks / if_fail</th>-->
          
          
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
	  
	  
	  //$colname_dmc = $_POST['roll_no'];
	  $colname_dmc = $std_roll_sls[$t_s];
  

//mysql_select_db($database_lms, $lms);
//	  mentioned the shift also fucking man hhhhhhhhh
$query_dmc = "SELECT * FROM semester_exam WHERE Roll_No='$colname_dmc' AND semester='$semester'";
$dmc = mysqli_query($con, $query_dmc) or die(mysqli_error($con));
$row_dmc = mysqli_fetch_assoc($dmc);
$totalRows_dmc = mysqli_num_rows($dmc);

	  
	  ?>
   
        
  
    <!--<td class="dmcborder" width="10%"><?php echo $semester; 
	if ($semester%2!=0)
	{echo"Fall Semester"; }
	else {echo "Spring Semester";}?></td>-->
    
      
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
$query_subject_code = "SELECT Subject_Code FROM assign_subject WHERE assign_subject_id = '$colname_subject_code'";
$subject_code = mysqli_query($con,$query_subject_code) or die(mysqli_error());
$row_subject_code = mysqli_fetch_assoc($subject_code);
			
$totalRows_subject_code = mysqli_num_rows($subject_code);
/////////////////////end//////////////////////
////////////////////////subject informaion//////////
$colname_subj_name = $row_subject_code['Subject_Code'];
//mysql_select_db($database_lms, $lms);
$query_subj_name = "SELECT * FROM subject_list WHERE Sub_Code = '$colname_subj_name'";

$subj_name = mysqli_query($con,$query_subj_name) or die(mysqli_error($subj_name));


$row_subj_name       = mysqli_fetch_assoc($subj_name);
$totalRows_subj_name = mysqli_num_rows($subj_name);

	
		
		?>
          
     <!--       <td style width="9%"><?php echo $row_subj_name['Sub_Code']; ?></td>
            <td width="35%"><?php echo $row_subj_name['Sub_Name'];  ?></td>
            <?php echo $row_subj_name['Sub_Cridet'];
			?> -->
			<?php
			$sum_cr= $sum_cr+$row_subj_name['Sub_Cridet'];
			?>
			<?php  $gplo = getGradePointValue($row_dmc['Obtained_Marks'],$row_subj_name['Sub_Cridet']); ?>
			 
             <?php  $totGradepoints   = ($totGradepoints +  $gplo); 
			  $totCredits       = $totCredits + $row_subj_name['Sub_Cridet'];	
			
			 ?>
			 
			
            <?php include("grade_sls.php"); ?>
            <!--<?php echo $row_dmc['Obtained_Marks']; ?> &nbsp;&nbsp;&nbsp; <sup>(<?php echo $row_dmc['if_fail']; ?>)</sup>-->
           
		   <?php

		   if($row_dmc['if_fail']){
		   $total_fail_subject++; 
		   $total_fail_subject1=$total_fail_subject1+$row_dmc['if_fail']; 
		    
		   
		   
		   
		   }

		   if($row_dmc['if_17g']){
           $total_17g='yes';
		   $total_17g_sub++;
		   }

		   ?>
         
          <?php
                  
			      
                  		  

		  } while ($row_dmc = mysqli_fetch_assoc($dmc)); ?>
     
    <td ><?php
		
		
			$gpa=$sum_gp/$sum_cr;
		////////////////////rounding////////////
$cgpa=$cgpa+$gpa;
$cgpa_probation=$cgpa/$semester;


echo round($gpa, 2);
if($std_roll_sls[$t_s]>=120000)
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

		 
		                                                                                 <td>
																						 	<?php  echo round($totGradepoints/($totCredits),2); ?> 
																						 </td>


  
  
    
   
      <?php
	$semester++;
  }
	  	  ?>
		  
	<!--         --------------------------------------------------------------------------------------------------------            -->	 
	<!--         --------------------------------------------------------------------------------------------------------            -->	 
	<!--         --------------------------------------------------------------------------------------------------------            -->	 
	<!--         --------------------------------------------------------------------------------------------------------            -->	 
	<!--         --------------------------------------------------------------------------------------------------------            -->	 
	<!--         --------------------------------------------------------------------------------------------------------            -->	 
	<!--         --------------------------------------------------------------------------------------------------------            -->




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


if($total_fail_subject1>6){
	echo "Dropped";
}else{ 	echo "Promoted";
}

}
		//echo $num_sub_fail;

//echo $num_sub_fail;

//echo floor_dec($gpa,3,"."); 

		
		///////////////////////end rounding
		
		//echo $gpa;
		
		 ?>

</td>

<td>
<?php
echo $total_fail_subject1;
?>
</td>


<!--<td>
<?php
echo $total_17g;
echo ' ';
echo $total_17g_sub;
?>
</td>
-->

		  
		  
      </div>
     
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
</div>
</body>



<?php } //for end ?>


	</tr> </table>

















   <div class="myclass">
<table align="right" class = "print" >
<tr>
<td height="1">
</td>
</tr>
<tr>
<td ><font size="1px" align="bottom">
<align=""><b>Printed By: Muhammad Taqweem </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p></font>
</td>
</tr>
</table>

</center>
<font  size="1px" align="bottom" class="print">
      
<p>Note: This is draft result and the final result will be declared once receives from the Controller of Examinations &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	  Dated  : <?php echo date("d-m-Y"); ?> </p>	  
	  <code>Errors and omissions are subject to subsequent rectification</code>
	</font>
</div>




<div class="dmc_bottom" class = "print"><font  size="1px" align="bottom">
<b>

uos-lms.ml
</b>

<b>M.S</b>
</font></div>









</html>
