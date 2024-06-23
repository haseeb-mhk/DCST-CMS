<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<p>&lt;?php<br>
  include('includes/connection.php');<br>
  $roll_no = $_GET['id'];<br>
  $gender = $_GET['gender'];<br>
</p>
<p>$Std_detail_query = mysqli_query($con, &quot;select * from stduent_roll_list where roll = '$roll_no' &quot;);<br>
  $row_std_detail_query = mysqli_fetch_row($Std_detail_query);<br>
  if($row_std_detail_query){<br>
  $reg_no = $row_std_detail_query[0];<br>
  $roll = $row_std_detail_query[1];<br>
  $name = $row_std_detail_query[2];<br>
  $father_name = $row_std_detail_query[3];<br>
  $Shift = $row_std_detail_query[4];<br>
  $Session = $row_std_detail_query[5];<br>
  $program = $row_std_detail_query[6];</p>
<p>}</p>
<p>&nbsp;</p>
<p>?&gt;<br>
</p>
<p>&nbsp;</p>
<p>&lt;!DOCTYPE html&gt;<br>
  &lt;html&gt;<br>
  &lt;head&gt;<br>
  &lt;meta charset=&quot;utf-8&quot;&gt;<br>
  &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge&quot;&gt;<br>
  &lt;title&gt;Home | Reference Letter&lt;/title&gt;<br>
  &lt;?php include &quot;includes/links.php&quot;?&gt;<br>
  <br>
  <br>
  <br>
  &lt;/head&gt;<br>
  &lt;body&gt;<br>
  &lt;div id=&quot;container&quot;&gt;<br>
  <br>
  &lt;div class=&quot;row&quot;&gt;<br>
  <br>
  <br>
  &lt;div class=&quot;col-12&quot;&gt;<br>
  <br>
  <br>
  &lt;div id=&quot;contents&quot; class=&quot;content&quot; style=&quot;border: ;padding: 20px;&quot;&gt;<br>
  &lt;table style=&quot;width: 100%;margin-left: 30px&quot; border=0 width=&quot;100&quot; &gt;<br>
  &lt;tbody border=0&gt;<br>
  &lt;tr&gt;<br>
  &lt;td align=&quot;right&quot; &gt;&lt;img src=&quot;includes/images/download.png&quot; alt=&quot;&quot; width=&quot;100&quot; height=&quot;100&quot; style=&quot;margin-top: 15px&quot; /&gt;&lt;/td&gt;<br>
  &lt;td align=&quot;left&quot;&gt;<br>
  &lt;span style=&quot;font-size: 40px;font-family:  'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';margin-left: 120px;font-weight: ;&quot; &gt; University of Swat&lt;/span&gt;&lt;br&gt; <br>
  <br>
  &lt;span style=&quot;font-size: 19px;font-family:  'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';margin-left: 130px;font-weight: ;&quot; &gt; Swat, Khyber Pakhtunkhwa, Pakistan &lt;/span&gt;&lt;br&gt; <br>
  <br>
</p>
<p> &lt;/td&gt;<br>
  &lt;!-- &lt;td width=20% align=center &gt;&lt;img src=&quot;images/cs.png&quot; alt=&quot;&quot; width=&quot;140&quot; height=&quot;115&quot; /&gt;&lt;/td&gt; --&gt;<br>
  &lt;/tr &gt;<br>
  &lt;/tbody&gt;<br>
  &lt;/table &gt;</p>
<p>&lt;table style=&quot;width: 100%&quot; border=0&gt;<br>
  <br>
  <br>
  <br>
  &lt;/table&gt;<br>
  &lt;h4 align=&quot;center&quot;&gt;<br>
  &lt;table width=&quot;100%&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; style=&quot;margin-top: 0px;&quot; class=&quot;&quot;&gt;<br>
  &lt;th rowspan=&quot;5&quot; width=&quot;20%&quot;&gt;&lt;/th&gt;<br>
  &lt;tr &gt;<br>
  &lt;td colspan=&quot;2&quot; style=&quot;line-height:1.5em; font-weight: bold;&quot;&gt; &lt;span style=&quot;background-color: black; color: white; font-family: 'Old English Five'; font-size: large; text-decoration-color: white;font-size: 20px&quot;&gt;<br>
  CLEARANCE FOR FINAL TRANSCRIPT &lt;br&gt;<br>
  &lt;/span&gt;</p>
<p> &lt;/td&gt; <br>
  &lt;td width=&quot;25%&quot;&gt;&lt;/td&gt;<br>
  &lt;/tr&gt;</p>
<p> &lt;/table&gt;<br>
  &lt;/h4&gt;<br>
  &lt;br&gt;<br>
  &lt;table width=&quot;100%&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; style=&quot;margin-top: 0px;&quot;&gt;<br>
  &lt;th rowspan=&quot;5&quot; width=&quot;10%&quot;&gt;&lt;/th&gt;<br>
  &lt;tr &gt;<br>
  &lt;td colspan=&quot;2&quot; style=&quot;text-align:justify;  padding 0px;&quot;&gt; &lt;span style=&quot;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; font-size: large; font-size: 20px;text-align: justify;line-height: 2&quot;&gt;</p>
<p> &lt;strong&gt;&lt;u&gt;STUDENT PROFILE / ADMISSION DETAILS:&lt;/u&gt; &lt;/strong&gt;<br>
  &lt;br&gt;</p>
<p> Student Name: _____________________________  Father’s Name: ___________________________ &lt;br&gt;</p>
<p>Date of Birth: ____________________________ Gender: ____________ CGPA: __________________ &lt;br&gt;</p>
<p>Program: _________________________________ Discipline: ___________________________________ &lt;br&gt;</p>
<p>Session: ______________ Class No: _____________________ Registration No: ________________&lt;br&gt;</p>
<p>Department / Institute / School: _______________________________________________________ &lt;br&gt;</p>
<p>Present Address: _________________________________________________________________________&lt;br&gt;<br>
  <br>
  Reason of Clearance: 1) Final Transcript &amp;nbsp;&lt;div style=&quot;width: 20px; height: 20px; border: 2px solid black; display: inline-block;&quot;&gt;&lt;/div&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;<br>
  2) If other Please Mention:&lt;br&gt;<br>
  ________________ &lt;strong&gt;The applicant is required to made clearance from the following: &lt;/strong&gt;&lt;br&gt;&lt;/span&gt;<br>
  <br>
  &lt;table border=&quot;1&quot; width=&quot;80%&quot; style=&quot;text-align: center&quot; &gt;<br>
  &lt;thead&gt;<br>
  &lt;th width=&quot;10%&quot;&gt;S#&lt;/th&gt;<br>
  &lt;th width=&quot;40%&quot;&gt;Department&lt;/th&gt;<br>
  &lt;th width=&quot;30%&quot;&gt;Signature&lt;/th&gt;<br>
  &lt;th width=&quot;30%&quot;&gt;Seal&lt;/th&gt;<br>
  <br>
  <br>
  &lt;/thead&gt;<br>
  &lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;1&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Central Library&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;<br>
  &lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;2&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Chief Proctor&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;<br>
  &lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;3&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Computer Laboratory&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;&lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;4&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Treasurer&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;<br>
  &lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;5&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Admin Officer (Transport)&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;<br>
  &lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;6&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Centralized Resource Lab&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;<br>
  &lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;7&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Hostel Warden &lt;sub&gt; &lt;strong&gt;(for Female Only)&lt;/strong&gt;&lt;/sub&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;<br>
  &lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;8&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Public Library&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;<br>
  &lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;1&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Central Library&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;<br>
  &lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;9&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Head of Department&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;<br>
  &lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;10&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Provost/ ID Card Clearance&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;<br>
  &lt;tr&gt;<br>
  &lt;td width=&quot;10%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;40%&quot;&gt;Alumni Fee (Rs. 200)&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  &lt;td width=&quot;30%&quot;&gt;&lt;/td&gt;<br>
  <br>
  &lt;/tr&gt;<br>
  &lt;tbody<br>
  <br>
  &lt;/table&gt;<br>
  &lt;/table&gt;&lt;br&gt;<br>
  &lt;span style=&quot;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; font-size: large; font-size: 18px;text-align: justify;line-height: 2&quot;&gt;</p>
<p> &lt;strong style=&quot;margin-left: 300px&quot;&gt;	Student’s Signature: ___________________________    &lt;/strong&gt;    &lt;br&gt;<br>
  &lt;strong&gt; Mobile No: ______________________________________ FOR OFFICE USE ONLY:&lt;/strong&gt; &lt;br&gt;</p>
<p>It is certified that Mr/Miss: ______________________________S/D/O&lt;br&gt;<br>
  __________________________  enrolled under Registration No: ___________________in &lt;br&gt;<br>
  program_____________________________ session____________________ has completed his/her&lt;br&gt;<br>
  degree requirements.  _________________________ &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;     ______________________________ </p>
<p> <br>
  &lt;/span&gt;&lt;br&gt;</p>
<p>&lt;span style=&quot;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; font-size: large; font-size: 18px;text-align: justify;line-height: 2;font-weight: bold&quot;&gt;<br>
  Dealing Assistant / Clerk &lt;span style=&quot;margin-left: 150px&quot;&gt;Head / In-charge of the Department&lt;/span&gt; <br>
  <br>
  &lt;/span&gt;<br>
  &lt;/td&gt; <br>
  &lt;td width=&quot;10%&quot;&gt;&lt;/td&gt;<br>
  &lt;/tr&gt;</p>
<p> &lt;/table&gt;<br>
  &lt;br&gt;<br>
  &lt;br&gt;<br>
  &lt;br&gt;</p>
<p> </p>
<p> &lt;/div&gt;<br>
  <br>
  <br>
  &lt;/div&gt;<br>
  <br>
  <br>
  <br>
  <br>
  &lt;/div&gt;<br>
  <br>
</p>
<p>&lt;/div&gt;</p>
<p>&lt;script type=&quot;text/javascript&quot;&gt;<br>
  &lt;!--<br>
  //--&gt;<br>
  &lt;/script&gt;<br>
  &lt;?php //if(isset($_GET['added']) || isset($_GET['addnew'])) echo '&lt;script type=&quot;text/javascript&quot;&gt; document.getElementById(&quot;rollno&quot;).focus(); &lt;/script&gt;'; ?&gt;<br>
</p>
<p>&lt;/body&gt;<br>
  &lt;/html&gt;</p>
<p> </p>
</body>
</html>