
<?php
include('includes/connection.php');


$sem_Id = $_GET['sem_id'];
$semester = $_GET['semester'];
$program = $_GET['program'];
$batch = $_GET['batch'];
$shift = $_GET['shift'];
$subject_id_s = [];
$subject_credits = [];

if(isset($_GET['sem_id'])){
//	selecting the subjects offered in the given semester
	$assign_sub = mysqli_query($con,"SELECT * FROM assign_subject WHERE Semester_Id ='$sem_Id' and Shift = '$shift'");
//selecting the students record enroll in the given program, session and shift
	$student_list = mysqli_query($con,"Select * from stduent_roll_list WHERE program  = '$program' and Session = '$batch' and  Shift = '$shift' order by roll asc");
	$student_list3 = mysqli_query($con,"Select * from stduent_roll_list WHERE program  = '$program' and Session = '$batch' and  Shift = '$shift' order by roll asc");
	$row_student_list = mysqli_fetch_assoc($student_list3);
	

}


////////////////////////end//////////////////////////////
?>
<style type="text/css">
<!--
.hi {
	font-family: Courier New, Courier, monospace;
}
.hi {
	font-family: Comic Sans MS, cursive;
}
.hi {
	font-family: Lucida Sans Unicode, Lucida Grande, sans-serif;
}
.hi p strong {
	font-family: Courier New, Courier, monospace;
}
.hi p strong {
	font-family: Palatino Linotype, Book Antiqua, Palatino, serif;
}
.hcolor {
	color: #C0C0C0;
}
.hi h3 strong {
	font-family: Algerian;
}
-->
</style>



       <table width="971" border="0" class="print">
      
  <tr>
    <th colspan="2" align="center"><img src="includes/images/download.png" width="124" height="112" /></th><th class="hi" colspan="4" align="center"><h3><strong>Department Of Computer Science & Software Technology</strong></h3>
      <h3 align="center"> DRAFT UN-SIGNED RESULT</h3>
      <p align="center"><strong> SEMESTER:</strong> <strong><?php echo($semester)?></strong></p></th></tr><tr>
    <th width="100" scope="col">&nbsp;</th>
    <th width="174" scope="col" align="right">&nbsp;</th>
    <th width="390" scope="col">Programe:BS
	
	(<?php echo($program)?>)</th>
    <th width="289" scope="col" align="left"><span class="heading_title"> Session:<?php echo($batch)?></span></th>
		   <th width="289" scope="col" align="left"><span class="heading_title"> Shift:<?php echo($shift)?></span></th>
  
  </tr>
</table>
               
<table width="100%" border="0" class="print	">
  
  <tr>
    <td valign="top" ><table border="1">
<!--		heading of the table-->
     <tr bgcolor="#CCCCCC">
     <td width="105" > <div align="center">Roll No</div></td>
     <td width="180"> <div align="center">Name</div></td>
         
</td>
		<?php 
	$a = 0;
		  $num_subject_with_credits = 0;
	while($a_subjects = mysqli_fetch_array($assign_sub)){
		array_push($subject_id_s,$a_subjects['assign_subject_id']);
		$sub_code  = $a_subjects['Subject_Code'];
		$q = mysqli_query($con, "Select * from subject_list where Sub_Code = '$sub_code'");
		$sub_name = mysqli_fetch_row($q);
		if($sub_name[3]!=0){
			$num_subject_with_credits = $num_subject_with_credits + 1;
		}
		array_push($subject_credits,$sub_name[3]);
	     ?>
		<td>
	<?php echo($sub_name[2]) ?>
	 </td>
	   <td width="150"><div align="center"> Grade / GP </div></td>
        <?php 
	$a++;
	}?>
         <td width="83"> <div align="center">Obt Mrks</div></td>
	      <td width="83"> <div align="center">%</div></td><!--sls coded -->
		  <td width="50"><div align="center">GPA</div></td>
          <td width="101"><div align="center">Status</div></td>
<!--          <td width="101"><div align="center">CGPA</div></td>-->
        </tr>
	<?php //print_r($subject_id_s) ?>
	<?php 
	
	while ($row_std = mysqli_fetch_array($student_list)){
		$roll_n = $row_std['roll'];

	
	?>
     <tr>
	
	<td><?php echo($row_std['roll']) ?></td>
	<td><?php echo($row_std['Name']) ?></td>
	
<?php 
		 $c = 0;
		$gpa = 0;
		$sum_gp = 0;
		$num_sub = 0;
		$num_sub_fail = 0;
			$t_ob_marks = 0;
		$sum_cr = 0;
		$probation = 0;
		$total_subject  = count($subject_id_s);
//		print_r(count($subject_id_s));
		while($c < count($subject_id_s)){
			$a_s_id = $subject_id_s[$c];
//			$a_S_query = mysqli_query($con,"Select * from assign_subject where assign_subject_id = '$a_s_id'");
//			$row_a_S_query = mysqli_fetch_row($a_S_query);
//			$subject_code_as = $row_a_S_query[1];
//			$subject_as = mysqli_query($con,"select * from subject_list where Sub_Code = '$subject_code_as'");
//			$row_subject_As = mysqli_fetch_row($subject_as);
//			$as_Cridets = $row_subject_As[3];
			$query_result = mysqli_query($con, "SELECT * FROM semester_exam
 WHERE Subject_Id ='$a_s_id' AND Roll_No='$roll_n'");
			$row_result = mysqli_fetch_assoc($query_result);
			
			
		 ?>
	<td> <?php echo $row_result['Obtained_Marks'];
			if($subject_credits[$c] == 0){
				$t_ob_marks  = $t_ob_marks;
			}
			else{
		$t_ob_marks = $t_ob_marks + $row_result['Obtained_Marks']; 
			}
		?></td>
	<td>
		 <?php 
			   $sum_cr = $sum_cr + $subject_credits[$c];
		include('grade1.php');
		?>
		 
		 </td>
	<?php 
		
			 $c = $c + 1;
		} ?>
	
		 <td><?php 
		echo($t_ob_marks);
			 
			 ?></td>
		 <td><?php 
		echo round($t_ob_marks*100/($num_subject_with_credits*100), 1); 
			 ?>%</td>
		 <td> <?php 
		$gpa = $sum_gp /$sum_cr;
		if($gpa<2){
			$probation = $probation+1;
		}
		echo(round($gpa,2));
		?></td>
		 <td>
		 <?php 
//		include("dmct.php");
		$avg_sub = $total_subject/2;
		if($probation ==0){
			echo("Promoted");
		}
		else if($probation==1){
		if($num_sub_fail >$avg_sub){
		echo "S-Rpt (NP)\n";
			
		echo("F-S: ".$num_sub_fail);
			}
		else{
			echo "Promoted\n";
			echo "(Probation)";
		}
		}
			 ?>
		 
		 
		 </td>
		 
		 
	</tr>     
		<?php 
	}
	 ?>
         

		 
      </table>
      <p></p>
      <p>PRINTED BY: <br>
      MUHAMMAD TAQWEEM														</p></td>
  </tr>
  
</table>
                   











