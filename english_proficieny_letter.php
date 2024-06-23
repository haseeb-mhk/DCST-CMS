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
  <title>Home | EPL</title>
	<?php include "includes/links.php"?>
	<style>
	 @media print {
            hr.custom-hr {
                height: 2px;
                background-color: black;
            }
        }
	
	</style>
	
	
</head>
<body>
<div id="container">
	<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10" style="padding: 10px">
	
		
		
		<div id="contents" class="content" style="border: 15px double black;padding: 50px">
        <table style="width: 100%" border=0>
    <tbody border=0>
        <tr>
          <td width=20% align=center><img src="includes/images/download.png" alt="" width="170" height="170" /></td>
          <td align="right">
              <span style="font-family: EngrvrsOldEng BT; font-size: 40px; text-transform: uppercase; font-weight: bold;">University of Swat</span><br> 
			  <span style="font-family: Cambria; font-size: inherit; text-transform: none; font-weight: bold;font-size: 25px;width: 100%">Department of Computer and Software Technology</span><br>
			 <span  style="font-family: Cambria, serif;font-size: 20px"> <a href="https://uswat.edu.pk/" style="text-decoration: underline">www.uswat.edu.pk</a></span>
                <br>
			 <span  style="font-family: Cambria, serif;font-size: 20px">Email: <a href="mailto:dcst@uswat.edu.pk" style="text-decoration: underline">dcst@uswat.edu.pk</a></span><br>

			  <span  style="font-family: Cambria, serif;font-size: 20px">Phone: 0946-920845</span>

            </td>
         <!-- <td width=20% align=center ><img src="images/cs.png" alt="" width="140" height="115" /></td> -->
        </tr >
    </tbody>
</table >
<hr style="height: 2px; background-color: black" class="custom-hr">
<table style="width: 100%" border=0>
    <tr>
        
        <td align="right" style="padding-top:2px; padding-right:6px; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">Dated:<?php echo date("d/m/Y"); ?></td>
    </tr>
</table>
  <h4 align="center">
  	<table width="100%" border="0" cellspacing="0" style="margin-top: 15px;" class="">
  		<th rowspan="5" width="20%"></th>
  		<tr >
  			<td colspan="2" style=" font-weight: bold"> <span style="font-family: Old English Five; font-size: x-large; "><u>TO WHOM IT MAY CONCERN</u><br></span>
  		</td>	
  		<td width="25%"></td>
  		</tr>

  	</table>
  	</h4>
  	<br>
  	<table width="100%" border="0" cellspacing="0" style="margin-top: 15px;">
  		<th rowspan="5" width="10%"></th>
  		<tr >
  			<td colspan="2" style="text-align:justify; line-height: 2; padding 10px;"> <span style="font-family: Old English Five; font-size: large; font-size: 20.5px ">It is certify that <b><?php if($gender=='Male') echo 'Mr'; else echo 'Miss'; ?>. <?php echo $name;?> </b>  <?php if($gender=='Male') echo 'S/O'; else echo 'D/O'; ?>  <b><?php echo $father_name?></b> remained a regular student of BS-<?php if($program == "BCS"){echo("Computer Science");} elseif($program=="BS_IT"){echo("Information Technology");} else{echo("Software Engineering");}?><i> (4 years degree program)</i> at the Department of Computer and Software Technology, University of Swat having Roll.No. <?php echo $roll ?> and University Registration No. <?php echo($reg_no)?>, Session <?php echo($Session) ?>.<b> Furthermore, <?php if($gender=='Male') echo 'he'; else echo 'she'; ?> remained hardworking and obedient student bearing good moral conduct.</b>
				<br>

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; According to the University of Swat <b style="line-height:1.5em;">Statutes/Rules/Bye-Laws</b> pertaining to BS-<?php if($program == "BCS"){echo("Computer Science");} elseif($program=="BS_IT"){echo("Information Technology");} else{echo("Software Engineering");}?>,<b style="line-height:1.5em;"> English is the medium of instruction and examination </b> for all subjects. 
				<br>
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This certificate is being issued on request of the student.
</span>
  		</td>	
  		<td width="10%"></td>
  		</tr>

  	</table>
  	<br>

  	  	<table width="100%" border="0" cellspacing="0" style="margin-top: 15px;" class="" >
  		<th rowspan="5" width="20%"></th>
  		<tr style="font-weight: bold">
  			<td colspan="2" style="line-height:1.5em;"> <span style="font-family: Old English Five; font-size: x-large; "><u></u><br></span>
  		</td>	
  		<td  align=left style="">
			
		<div style="margin-left: 500px">
			<span style="font-family: Old English Five; font-size: large;" >CHAIRMAN<br> Department of C &amp; S T <br> University of Swat </span>
			</div>
			</td>
  		</tr>

  	</table>
	<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
  </div>
  <p>&nbsp;</p><br>

		</div>
	<div class="col-md-1"></div>
	
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

                                                                                              