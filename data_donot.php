
									<?php
									header('Content-Type: application/json');

									$conn = mysqli_connect("localhost","root","","lms");

//									$sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";
$sqlQuery = "select count(*) from stduent_roll_list";

									$result = mysqli_query($conn,$sqlQuery);
$data = $result;
//									$data = array();
//									foreach ($result as $row) {
//										$data[] = $row;
//									}

									mysqli_close($conn);

									echo json_encode($data);
									?>
								