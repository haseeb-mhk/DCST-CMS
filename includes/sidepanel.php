
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="includes/images/download.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> DCST CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Taqweem Dk</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			
			
			<a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a> 
			

			<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Students 
                <xi class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="registration.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Registration 
					   </p>
                </a>
              </li>  
				<li class="nav-item">
                <a href="student_records.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students Record
					  </p>
                </a>
              </li>
            
              
            </ul>
          </li>
				<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-bimobject"></i>
              <p>
               Batch 
                <xi class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
            
             
				<li class="nav-item">
                <a href="Add_batch.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Batch 
					  </p>
                </a>
              </li>	<li class="nav-item">
                <a href="batch_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Batch List
					  </p>
                </a>
              </li>
            
              
            </ul>
          </li>
			
			<li class="nav-item">
            <a href="manage_semester.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Manage Semesters</p>
            </a>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Award Lists 
                <xi class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="insert_semester_wise_AL.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insert award list
					  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_semester_wise_AL.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Current Semester AL
					   </p>
                </a>
              </li>
            
              
            </ul>
          </li>
			<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
               Results 
                <xi class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_current_semester_result.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Current Semester Res
					  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_semester_wise_result.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Semester
					  Wise Result </p>
                </a>
              </li>  
				<li class="nav-item">
                <a href="update_results.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Result
					  </p>
                </a>
              </li>
            
              
            </ul>
          </li>
			
			<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
               Generate Transcript 
                <xi class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dmc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Multiple Semesters
					  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="individual_semester_transcript.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Individual Semester
					   </p>
                </a>
              </li>
            
              
            </ul>
          </li>
			<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
               Manages Course 
                <xi class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="insert_course.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insert new course</p>
                </a>
              </li>
				<li class="nav-item">
                <a href="Course_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Courses List</p>
                </a>
              </li>
				<li class="nav-item">
                <a href="assign_course_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assigned courses</p>
                </a>
              </li>
			
             
            
              
            </ul>
        </li>
			
			<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
               Manages Teachers 
                <xi class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="insert_teacher.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insert new Teacher</p>
                </a>
              </li>
				<li class="nav-item">
                <a href="teachers_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teachers List</p>
                </a>
              </li>
				
             
            
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-certificate"></i>
              <p>
               Certificates and Letters 
                <xi class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="info_EPL.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>English Proficiency Letter</p>
                </a>
              </li>
				<li class="nav-item">
                <a href="info_R_l.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Recommendations Letter</p>
                </a>
              </li>
				<li class="nav-item">
                <a href="info_BC.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bonafide certificate</p>
                </a>
              </li>
			
              <li class="nav-item">
                <a href="info_CC.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Character Certificate</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="info_HC.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hope Certificate</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Info_PC.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Provisional Certificate</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="info_clearance_c.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clearance Certificate</p>
                </a>
              </li>
            </ul>
        </li>
			
			    <li class="nav-header">Bio Data</li>
          <li class="nav-item">
            <a href="Add_new_student_bd.php" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>Add New Student Data </p>
            </a>
          </li>
			<li class="nav-item">
            <a href="student_bd_record.php" class="nav-link">
              <i class="nav-icon fas fas fa-file"></i>
              <p>All Students Records </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Discipline  Records
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Bs_std_bd_records.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BS</p>
                </a>
              </li> <li class="nav-item">
                <a href="Ms_std_bd_records.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MS</p>
                </a>
              </li>
				<li class="nav-item">
                <a href="phd_std_bd_records.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PHD</p>
                </a>
              </li>
              

            </ul>
          </li>
          <li class="nav-item">
            <a href="create_google_form.php" class="nav-link">
              <i class="fab fa-google-plus-g nav-icon"></i>
              <p>Create Google Form</p>
            </a>
          </li>
			<li class="nav-item">
            <a href="import_data_csv.php" class="nav-link">
              <i class="fas fa-file-csv nav-icon" ></i>
              <p>Import Data from CSV</p>
            </a>
          </li> 
			<li class="nav-item">
            <a href="Export_data_csv.php" class="nav-link">
              <i class="fas fa-file-csv nav-icon" style='color:red'></i>
              <p>Export Data-CSV</p>
            </a>
          </li>
		
        
        
          <li class="nav-header">MISCELLANEOUS</li>
         <li class="nav-item">
            <a href="Documentation.html" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>Documentation</p>
            </a>
          </li>
        <li class="nav-item">
            <a href="Developer_info.html" class="nav-link">
              <i class="nav-icon fas fa-code"></i>
              <p>
                 Develope Info</p>
            </a>
          </li>	
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>