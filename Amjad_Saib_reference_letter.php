<?php
include('includes/connection.php');
$roll_no = $_GET['id'];
$gender = $_GET['gender'];
$teacher = $_GET['t_name'];


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
  <title>Home | Refernce letter</title>
	<?php include "includes/links.php"?>
	
	
	
</head>
<body>
<div id="container">
	<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10" style="padding: 10px">
	
		
		
		<div id="contents" class="content" style="border: 1px solid black">
        <table style="width: 100%" border=0>
    <tbody border=0>
		<tr> 
			<img src="includes/images/top.png" width="100%" height="70px">
		</tr>
        <tr>
          <td width=20% align=center><img src="includes/images/download.png" alt="" width="130" height="130" /></td>
          <td align="center" style="">
			    <span style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, 'sans-serif'; text-transform: none; font-weight: bold;font-size: 22px;width: 100%;letter-spacing: 1px;word-spacing: 3px;" >Department of Computer and Software Technology</span><br>
			  <span style="font-size: 50px;font-family:'Old English Text MT', serif;" > University of Swat</span><br>
			<strong><span style="font-family: new Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; text-transform: none; font-weight:bolder;font-size: 20px;width: 100%;">Address: Mian Campus, Charbagh, Khyber Pakhtunkhwa, Pakistan</span></strong><br>
			   <span  style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';font-size: 16px;font-weight: bold;">Web: <a href="https://uswat.edu.pk/" style="text-decoration: underline">www.uswat.edu.pk</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      Email: <a href="mailto:dcst@uswat.edu.pk" style="text-decoration: underline">dcst@uswat.edu.pk</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ph: 0946-920845</span>
            </td>
			 <td width=20% align=center><img src="includes/images/dcst.png" alt="" width="130" height="130" /></td>
         <!-- <td width=20% align=center ><img src="images/cs.png" alt="" width="140" height="115" /></td> -->
        </tr>
    </tbody>
</table >

			<img src="includes/images/top.png" width="100%" height="20px">
		


  <h4 align="center">
  	<table width="100%" border="0" cellspacing="0" style="margin-top: 15px;" class="">
  		<th rowspan="5" width="20%"></th><br>


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
  			<td colspan="2" style="text-align:justify; padding 10px;"> <span style="font-family:Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'; font-size: large; font-size: 20.5px ">It is my plesure to write a few words in favor of  <b><?php if($gender=='Male') echo 'Mr'; else echo 'Miss'; ?>. <?php echo $name;?> </b>  <?php if($gender=='Male') echo 'S/O'; else echo 'D/O'; ?>  <b><?php echo $father_name?></b> who is known to me as student of BS-<?php if($program == "BCS"){echo("Computer Science");} elseif($program=="BS_IT"){echo("Information Technology");} else{echo("Software Engineering");}?>( Session <?php echo($Session) ?>).I found <?php if($gender=='Male') echo 'him'; else echo 'her'; ?> hardworking and intelligent while performing <?php if($gender=='Male') echo 'his'; else echo 'her'; ?> assignments. <?php if($gender=='Male') echo 'Mr'; else echo 'Miss'; ?>. <?php echo $name;?>  has proven <?php if($gender=='Male') echo 'himself'; else echo 'herself'; ?> to be devoted and hardworking student. <?php if($gender=='Male') echo 'His'; else echo 'Her'; ?> understanding towards the computational problems were appreciable. <?php if($gender=='Male') echo 'He'; else echo 'She'; ?> has the ability to work independently as well as in collaboration with others.<br><br>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I found that <?php if($gender=='Male') echo 'he'; else echo 'she'; ?> has both aptitude and devotion for quality research work and is well suited for any scholership program. I hope that <?php if($gender=='Male') echo 'he'; else echo 'she'; ?> will prove <?php if($gender=='Male') echo 'himself'; else echo 'herself'; ?> as a good and potential candidate.<br>

				<br>

			
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I wish <?php if($gender=='Male') echo 'him'; else echo 'her'; ?> all the best in <?php if($gender=='Male') echo 'his'; else echo 'her'; ?> future.
				

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
			
		<div style="margin-left: -500px ">
			<span style="font-family: Old English Five; font-size: large;" >Dr. Amjad Ali, <br>
Assistant Professor<br> Department of C &amp; S T <br> University of Swat <br>
Email: amjad@uswat.edu.pk</span>
			</div>
			</td>
  		</tr>

  	</table>
	<br>
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
  <p>&nbsp;</p>
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

                                                                                              