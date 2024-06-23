<?php 
include("includes/connection.php");

	$i=$_POST['total_student'];
	$as=1;
	$semester=$_POST['semester'];
	$sub_id=$_POST['subject'];
	$semes_id=$_POST['sem_id'];
	$shift=$_POST['shift'];
	
	
	while($as<=$i)
	{
		
		$reg_no= $_POST['Reg_No'.$as];
		$r_no = $_POST['Roll_No'.$as];
		$m_t_m = $_POST['Mid_Term_Marks'.$as];
		$f_t_m = $_POST['Final_Term_Marks'.$as];
		$ass_m = $_POST['Assignment_Marks'.$as];
		$pres_m =$_POST['Presentation_Marks'.$as];
		$total=(int)$m_t_m+(int)$f_t_m+(int)$ass_m+(int)$pres_m;
		if($total<50)
		{
		$status="Fail";	
		}
		else
		{
		$status="Pass";		
		}
		$max="100";
		$check= mysqli_query($con,"select * from semester_exam where Roll_No = '$r_no' and Semester_Id = '$semes_id' and Subject_Id = '$sub_id' ");
		$check_num= mysqli_num_rows($check);
		if($check_num>0){
			$row = mysqli_fetch_row($check);
			$semes_E_id = $row[0];
			
			
//	$Result1 = mysqli_query($con,"INSERT INTO semester_exam (Semester_Id,semester, Subject_Id, Reg_No, Roll_No, Mid_Term_Marks, Final_Term_Marks, Assignment_Marks, Presentation_Marks, Obtained_Marks, Total_Marks, Status) values('$semes_id','$semester','$sub_id','$reg_no', '$r_no','$m_t_m','$f_t_m', '$ass_m','$pres_m','$total','$max','$status') ")	;
		$upd = mysqli_query($con, "UPDATE `semester_exam` SET `Semester_Id`='$semes_id',`semester`='$semester',`Subject_Id`='$sub_id',`Reg_No`='$reg_no',`Roll_No`='$r_no',`Mid_Term_Marks`='$m_t_m',`Final_Term_Marks`='$f_t_m',`Assignment_Marks`='$ass_m',`Presentation_Marks`='$pres_m',`Obtained_Marks`='$total',`Total_Marks`='$max',`Status`='$status' WHERE semester_exam_id = $semes_E_id"
		);
		
		
  
		}
		else{
	$Result1 = mysqli_query($con,"INSERT INTO semester_exam (Semester_Id,semester, Subject_Id, Reg_No, Roll_No, Mid_Term_Marks, Final_Term_Marks, Assignment_Marks, Presentation_Marks, Obtained_Marks, Total_Marks, Status) values('$semes_id','$semester','$sub_id','$reg_no', '$r_no','$m_t_m','$f_t_m', '$ass_m','$pres_m','$total','$max','$status') ")	;
		
		}
		$as++;
	} /////////////////end loop//////////////////
	
	 $redirect="assign_semester_subj_list.php?sem_id=".$_POST['sem_id']."&shift=$shift";
   header("Location: ". $redirect );

?>