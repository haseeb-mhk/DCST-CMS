<?php


  

////////////////////////////pesonal informaion////////////
$colname_personal_info=$row_student_list['roll'];
//mysql_select_db($database_lms, );
$query_personal_info = "SELECT * FROM stduent_roll_list WHERE roll = '$colname_personal_info'";
$personal_info = mysqli_query($con,$query_personal_info) or die(mysqli_error());
$row_personal_info = mysqli_fetch_assoc($personal_info);
$totalRows_personal_info = mysqli_num_rows($personal_info);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.bg

{

}
.dmc {
	background-image: url();
	background-repeat: no-repeat;
	<?php ?>	
	width:670px;
	height:px;
	padding-top:180px;
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
	margin-top:10px;
	float:left;
}
.dmc_bottom
{
	width:100%;
	margin-top:20px;
	float:left;
	font-family:"Arial", Helvetica, sans-serif;
}

.dmc_bottom2
{
	width:100%;
	margin-top:10px;
	margin-bottom:20px;
	float:left;
	font-family:"Arial", Helvetica, sans-serif;
}

</style>

<style type="text/css">
.NATScheduleTable {
	margin: 0px; padding: 0px; width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 12px; vertical-align: top;
}
.NATScheduleTable tr {
	
}
.NATScheduleTable th {
	color: rgb(255, 255, 255); font-weight: bold; background-color: rgb(255, 102, 0);
}
.NATScheduleTable td {
	height: 25px; text-align: center; vertical-align: middle;
	border:1px;
	border-bottom-color:#00C;
	border-style:double;
	border-width:1px;
}
.NATScheduleTable #bold {
	font-weight: bold;
}

.dmcborder {
	height: 25px; text-align: center; vertical-align: middle;
	border:1px;
	border-bottom-color:#00C;
	border-style:double;
	border-width:1px;
}
</style>
</head>

<body class="bg">

  
  
  <?php 
  $cgpa=0;
  $incr=0;
  $semester=1;
  $probation=0;
  while($semester <= $row_result['semester'])
  {
	  
	  
	  $colname_dmc = $row_student_list['roll'];
  

//mysql_select_db($database_lms, $lms);
$query_dmc = "SELECT * FROM semester_exam WHERE Roll_No='$colname_dmc' AND semester='$semester'";
$dmc = mysqli_query($con,$query_dmc) or die(mysqli_error());
$row_dmc = mysqli_fetch_assoc($dmc);
$totalRows_dmc = mysqli_num_rows($dmc);

	  
	  ?>
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
$query_subject_code = "SELECT * FROM assign_subject WHERE assign_subject_id = '$colname_subject_code'";
$subject_code = mysqli_query($con,$query_subject_code) or die(mysqli_error());
$row_subject_code = mysqli_fetch_assoc($subject_code);
$totalRows_subject_code = mysqli_num_rows($subject_code);
/////////////////////end//////////////////////
////////////////////////subject informaion//////////
$colname_subj_name = $row_subject_code['Subject_Code'];
////mysql_select_db($database_lms, $lms);
$query_subj_name = "SELECT * FROM subject_list WHERE Sub_Code = '$colname_subj_name'";
$subj_name = mysqli_query($con,$query_subj_name) or die(mysqli_error());
$row_subj_name = mysqli_fetch_assoc($subj_name);
$totalRows_subj_name = mysqli_num_rows($subj_name);
		
		?>
          
            
         
           
            <?php 
			 $row_subj_name['Sub_Name']; 
	?>
            <?php 
			 $row_subj_name['Sub_Cridet']; 
				  $sum_cr= $sum_cr+$row_subj_name['Sub_Cridet'];
	?>
           
		   
		   
            <?php include("gradef.php"); ?>


            <?php  $row_dmc['Obtained_Marks']; ?>
           
          
          
          <?php } while ($row_dmc = mysqli_fetch_assoc($dmc)); ?>
      <?php
		
		
		
		$gpa=$sum_gp/1;
		////////////////////rounding////////////
$cgpa=$cgpa+$gpa;
$cgpa_probation=$cgpa/$semester;


 round($gpa, 2);
 if($row_student_list['roll']>=120000)
		{
if($cgpa_probation < 2 && $semester >=1)
{
  $probation=$probation + 1;
}
		} 
		else
		{ 
		
		if($cgpa_probation < 2 && $semester >=2)
{
  $probation=$probation + 1;
}
			
		}
		
//echo floor_dec($gpa,3,"."); 

		
		///////////////////////end rounding
		
		//echo $gpa;
		
		 ?> 
  


  
  
    
   
      <?php
	$semester++;
  }	  ?>
  









  
  
  
  
  
  
  
  
  
  
  
  









  
  
  
  
  
  
  
  <?php
		
		//$gpa=$sum_gp/$sum_cr;
		////////////////////rounding////////////

//echo $num_sub;    
$total_sub=$num_sub/2;

	
if($num_sub_fail > $total_sub)
{
	//echo $num_sub_fail;
echo "S-Rpt (NP)";	
}
else if($probation==1)
{
	echo "Pro / FP";
}

else if($probation ==2)
{
	echo "Pro / LP";
}
else if($probation >2)
{
	echo "Dropped";
}
else
{
	
	
 
	echo "Pro";///////////////////////////////////////////////////////////////////////////////////////////
}
		//echo $num_sub_fail;

//echo floor_dec($gpa,3,"."); 

		
		///////////////////////end rounding
		
		//echo $gpa;
		
if($num_sub_fail>0){ //sls code
		echo "<br> F-S: "; //sls code
		echo $num_sub_fail;
		}//sls code
		
	?>
     
</body>
</html>

 
		
		</td>
		
	   
    
</div>
</body>

<?php //sls big code end copy from dmc.php ?>



 

