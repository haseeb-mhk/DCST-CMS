<?php
include("includes/connection.php");
//$todos = $con->query();
$todos = mysqli_query($con, "SELECT * FROM todos ORDER BY id DESC");
if(isset($_POST['title'])){
   

    $title = $_POST['title'];

    if(empty($title)){
        header("Location:index.php");
    }else {
        $stmt = mysqli_query($con,"INSERT INTO todos(title) VALUE('$title')");
//        $res = $stmt->execute([$title]);

        if($stmt){
            header("Location:index.php"); 
        }else {
            header("Location:/index.php");
        }
        
    }
}


if(isset($_GET['TDID'])){
	$TDID = $_GET['TDID'];
	$delete_todo = mysqli_query($con,"Delete from todos where id = '$TDID'");
	echo("Data deleted successfully");
	header("location:index.php");
	
}
$graduate_students = 0;
$current_students = 0;
$current_year = date('Y');
function startsWithnumber($string) {
    return preg_match('/^[0-9]/', $string) === 1;
}
$count_students = mysqli_query($con,"select * from stduent_roll_list");
while($row = mysqli_fetch_array($count_students)){
	$session = $row["Session"]; 
	$check_status = startsWithnumber($session);
	$en_year = substr($session,0,4);
		$grad_year = (int)$en_year +4;
	if($grad_year<$current_year && $check_status ==1){
		$graduate_students = $graduate_students +1;
	}
	else if($grad_year>=$current_year && $check_status ==1){
		$current_students = $current_students+1;
	}
}
$count = mysqli_num_rows($count_students);
//echo($count." ");
//echo($graduate_students." ");
//echo($current_students." ");

$techers = mysqli_query($con,"select * from teacher_list");
$teacher_count = mysqli_num_rows($techers);


// Assuming $con is your MySQL connection

//$query = ;
$res = mysqli_query($con,"SELECT program, COUNT(*) AS student_count FROM stduent_roll_list  WHERE program IN ('BCS', 'BS-IT', 'SE')  GROUP BY program" );


$data = array();
while ($row = mysqli_fetch_array($res)) {
    $data[$row['program']] = $row['student_count'];
}

// Modified PHP code to fetch session-wise student counts
$query_sessions = "SELECT session, COUNT(*) AS student_count FROM stduent_roll_list WHERE program IN ('BSC', 'BS-IT', 'SE') 
          GROUP BY session, program";
$result_sessions = mysqli_query($con, $query_sessions);

$data_sessions = array();
while ($row2 = mysqli_fetch_assoc($result_sessions)) {
	$sess = $row2["session"];
	if (preg_match('/^[0-9]/', $sess)){
	
    $data_sessions[$row2['session']] = $row2['student_count'];}
	else{
		
	}
}
function startsWithLetter($string) {
    return preg_match('/^(D|d|\()/i', $string) === 1;
}
$a = 0;
$dropped_students = mysqli_query($con,"select * from stduent_roll_list");
while($row_dropped_students=mysqli_fetch_array($dropped_students)){
	$dropped_session = $row_dropped_students['Session'];
	$ch = startsWithLetter($dropped_session);
	if($ch == 1){
		$a = $a+1;
		
	}else{
		
	}
//	if(){
//		echo(" not a letter");
//	}
//	else{
//		echo("letter");
//	}
	
	
	
}

?>






<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Home</title>
	<?php include "includes/links.php"?>
	
	        <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }

        .chart-container {
            position: relative;
            margin: auto;
            width: 80%;
            max-width: 800px;
        }

        .chart-container canvas {
            display: block;
            margin: auto;
            width: 100%;
        }

        /* Custom colors for bars */
        .custom-color-1 {
            background-color: rgba(255, 99, 132, 0.6); /* Red */
            border-color: rgba(255, 99, 132, 1);
        }

        .custom-color-2 {
            background-color: rgba(54, 162, 235, 0.6); /* Blue */
            border-color: rgba(54, 162, 235, 1);
        }

        .custom-color-3 {
            background-color: rgba(255, 206, 86, 0.6); /* Yellow */
            border-color: rgba(255, 206, 86, 1);
        }

        /* Add more custom colors as needed */
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include "includes/header.php"?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
	 <?php include "includes/sidepanel.php"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo($graduate_students) ?></h3>

                <p>Graduate Students</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
              <a href="grad_student.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo($current_students) ?></<sup style="font-size: 20px"></sup></h3>

                <p>Current Students</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="current_students.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo($teacher_count) ?></h3>

                <p>Teachers</p>
              </div>
              <div class="icon">
                <i class=" fas fa-chalkboard-teacher"></i>
              </div>
              <a href="teachers_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo($a);?></h3>

                <p>Drop Students</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-alt-slash"></i>
              </div>
              <a href="dropped_students.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
       
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-12 connectedSortable">

			
	<section class="content">
      <div class="container-fluid">
      
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
<!--			to do list-->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
			  
			  <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  session wise Students except Dropped
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                  <canvas id="sessionChart" width="400" height="400"></canvas>
              </div>
              <!-- /.card-body-->
            </div>
			  <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Program wise Students 
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                 <canvas id="programChart" width="200px" height="200px"></canvas>
              </div>
              <!-- /.card-body-->
            </div>	
            <div class="card">
            

            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
<div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                 
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- Map card -->
            <div class="card bg-gradient">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Location
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                 
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="" style="height: 250px; width: 100%;">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3274.1461365838095!2d72.4397125!3d34.8525552!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dc22ebd0d7e8fb%3A0xa2dfaf0f3167971d!2sUniversity%20of%20Swat!5e0!3m2!1sen!2s!4v1706199399522!5m2!1sen!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				  
				  </div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row" style="display: none">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
			 

		
			  
            <!-- TO DO List -->
               <div class="card">
                    <div class="card-header text-center">
                        <h2>To-Do List App</h2>
                    </div>
                    <div class="card-body">
                        <form  method="POST" autocomplete="off">
                            <div class="input-group mb-3">
                                <input type="text" name="title" class="form-control <?= isset($_GET['mess']) && $_GET['mess'] == 'error' ? 'is-invalid' : '' ?>" placeholder="<?= isset($_GET['mess']) && $_GET['mess'] == 'error' ? 'You must do something! Be Productive!' : 'What do you need to do?' ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                        
                        <?php
	$rowctodos = mysqli_num_rows($todos);
	if ($rowctodos <= 0) { ?>
                            <div class="alert alert-secondary text-center" role="alert">
                               <h3 class="text-center">No Task for Today!</h3>
                            </div>
                        <?php } ?>
                        
                        <div class="list-group">
                            <?php while ($todo = mysqli_fetch_array($todos)){ ?>
                                <div class="list-group-item">
									<div class="row">
									
									<div class="col-8">
										<div style="display: inline-block">
                                <input type="checkbox" class="check-box" data-todo-id="<?php echo $todo['id']; ?>" <?php echo $todo['checked'] ? 'checked' : ''; ?>>
                                <span <?php echo $todo['checked'] ? 'class="checked"' : ''; ?>><?php echo $todo['title']; ?></span><br>

											<small class="date-finished">Created: <?php echo $todo['date_time']; ?></small>
											</div>
										</div>
									<div class="col-4"> 
										<a href="index.php?TDID=<?php echo $todo['id']; ?>" class="btn btn-outline-danger btn-sm" style="margin-left: 50px">X</a>
										
										
										</div>
									</div>
                              
                                
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
			
			  
            <!-- solid sales graph -->
            
            <!-- /.card -->

            <!-- Calendar -->
            
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

         
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
	
  <!-- /.content-wrapper -->
   <?php include "includes/footer.php"?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
	     <script>
        var data = <?php echo json_encode($data); ?>;

        var ctx = document.getElementById('programChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Program wise student count',
                    data: Object.values(data),
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)', // Blue
                        'rgba(255, 99, 132, 0.6)', // Red
                        'rgba(75, 192, 192, 0.6)' // Green
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)', // Blue
                        'rgba(255, 99, 132, 1)', // Red
                        'rgba(75, 192, 192, 1)' // Green
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        },
                        title: {
                            display: true,
                            text: 'Number of Students'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Program'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Student Counts by Program'
                    }
                }
            }
        });
    </script>
	  <script>
        var data_sessions_chart = <?php echo json_encode($data_sessions); ?>;

        var ctx_sessions_chart = document.getElementById('sessionChart').getContext('2d');
        var myChart_sessions = new Chart(ctx_sessions_chart, {
            type: 'bar',
            data: {
                labels: Object.keys(data_sessions_chart),
                datasets: [{
                    label: 'Session wise students count',
                    data: Object.values(data_sessions_chart),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)', // Red
                        'rgba(54, 162, 235, 0.6)', // Blue
                        'rgba(255, 206, 86, 0.6)', // Yellow
                        'rgba(75, 192, 192, 0.6)', // Teal
                        'rgba(153, 102, 255, 0.6)', // Purple
                        'rgba(255, 159, 64, 0.6)', // Orange
                        'rgba(201, 203, 207, 0.6)', // Gray
                        'rgba(255, 0, 0, 0.6)', // Bright Red
                        'rgba(0, 255, 0, 0.6)', // Bright Green
                        'rgba(0, 0, 255, 0.6)', // Bright Blue
                        'rgba(255, 255, 0, 0.6)' // Yellow
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)', // Red
                        'rgba(54, 162, 235, 1)', // Blue
                        'rgba(255, 206, 86, 1)', // Yellow
                        'rgba(75, 192, 192, 1)', // Teal
                        'rgba(153, 102, 255, 1)', // Purple
                        'rgba(255, 159, 64, 1)', // Orange
                        'rgba(201, 203, 207, 1)', // Gray
                        'rgba(255, 0, 0, 1)', // Bright Red
                        'rgba(0, 255, 0, 1)', // Bright Green
                        'rgba(0, 0, 255, 1)', // Bright Blue
                        'rgba(255, 255, 0, 1)' // Yellow
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Student Counts by Session',
                        font: {
                            size: 18,
                            weight: 'bold'
                        }
                    }
                }
            }
        });
    </script>
	<script>
    $(document).ready(function() {
        $('.todo-checkbox').change(function() {
            var todoId = $(this).val();
            $.ajax({
                url: 'update_todo_status.php', // Update with your PHP file handling the update
                type: 'POST',
                data: { todo_id: todoId },
                success: function(response) {
                    // Optionally, you can add some code here to handle the response if needed
                    console.log("Status updated successfully");
                }
            });
        });
    });
</script>


	
</body>
</html>
