<?php
$obt_marks=$row_dmc['Obtained_Marks'];
$gp=0;
$grade="";
$rmarks="";

switch($obt_marks)
{
	case 85:
	$gp=4.0;
	$grade="A";
    $rmarks="Excellent";
	break;
	
	case 84:
	$gp=3.9;
	$grade="B";
    $rmarks="Very Good";
	break;
	case 83:
	$gp=3.8;
	$grade="B";
    $rmarks="Very Good";
	break;
	case 82:
	$gp=3.7;
	$grade="B";
    $rmarks="Very Good";
	break;
	case 81:
	$gp=3.6;
	$grade="B";
    $rmarks="Very Good";
	break;
	case 80:
	$gp=3.5;
	$grade="B";
    $rmarks="Very Good";
	break;

	case 79:
	$gp=3.4;
	$grade="B";
    $rmarks="Very Good";
	break;
	case 78:
	$gp=3.4;
	$grade="B";
    $rmarks="Very Good";
	break;
	case 77:
	$gp=3.3;
	$grade="B";
    $rmarks="Very Good";
	break;
	case 76:
	$gp=3.3;
	$grade="B";
    $rmarks="Very Good";
	break;
	case 75:
	$gp=3.2;
	$grade="B";
    $rmarks="Very Good";
	break;
	;
	case 74:
	$gp=3.2;
	$grade="B";
    $rmarks="Very Good";
	break;
	case 73:
	$gp=3.1;
	$grade="B";
    $rmarks="Very Good";
	break;
	case 72:
	$gp=3.0;
	$grade="B";
    $rmarks="Very Good";
	break;
	///////////////////////gread c tofor 71 to 60/////
	case 71:
	$gp=2.9;
	$grade="C";
    $rmarks="Good";
	break;
	case 70:
	$gp=2.8;
	$grade="C";
    $rmarks="Good";
	break;
	case 69:
	$gp=2.7;
	$grade="C";
    $rmarks="Good";
	break;
	case 68:
	$gp=2.6;
	$grade="C";
    $rmarks="Good";
	break;
	case 67:
	$gp=2.5;
	$grade="C";
    $rmarks="Good";
	break;
	case 66:
	$gp=2.5;
	$grade="C";
    $rmarks="Good";
	break;
	case 65:
	$gp=2.4;
	$grade="C";
    $rmarks="Good";
	break;
	case 64:
	$gp=2.4;
	$grade="C";
    $rmarks="Good";
	break;
	case 63:
	$gp=2.3;
	$grade="C";
    $rmarks="Good";
	break;

	case 62:
	$gp=2.2;
	$grade="C";
    $rmarks="Good";
	break;
	case 61:
	$gp=2.1;
	$grade="C";
    $rmarks="Good";
	break;
	case 60:
	$gp=2.0;
	$grade="C";
    $rmarks="Good";
	break;
	/////////////////////////grede d from 60 to 50 ////////////
	case 59:
	$gp=1.9;
	$grade="D";
    $rmarks="Fair";
	break;
	case 58:
	$gp=1.8;
	$grade="D";
    $rmarks="Fair";
	break;
	case 57:
	$gp=1.7;
	$grade="D";
    $rmarks="Fair";
	break;
	case 56:
	$gp=1.6;
	$grade="D";
    $rmarks="Fair";
	break;
	
	case 55:
	$gp=1.5;
	$grade="D";
    $rmarks="Fair";
	break;
	case 54:
	$gp=1.4;
	$grade="D";
    $rmarks="Fair";
	break;
	case 53:
	$gp=1.3;
	$grade="D";
    $rmarks="Fair";
	break;
	case 52:
	$gp=1.2;
	$grade="D";
    $rmarks="Fair";
	break;
	case 51:
	$gp=1.1;
	$grade="D";
    $rmarks="Fair";
	break;
	case 50:
	$gp=1.0;
	$grade="D";
    $rmarks="Fair";
	break;
	default;
	$gp=0.0;
	$grade="F";
    $rmarks="Fail";
	break;

	

}
if($obt_marks<50)
{
$gp=0.0;
	$grade="F";
    $rmarks="Fail";	
}
else if($obt_marks>85)
{

	$gp=4.0;
	$grade="A";
    $rmarks="Excellent";	
}
echo $grade;
if($semester == $_POST['semester'])
{  
if($grade=='F')
{
	$num_sub_fail=$num_sub_fail+1;
	
}
}
$gp=$gp*$row_subj_name['Sub_Cridet'];
$sum_gp=$sum_gp+$gp;

?>