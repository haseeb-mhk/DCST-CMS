<?php
// Load the database configuration file
include("includes/connection.php");

if(isset($_POST['btnCSV'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            for ($i = 0; $i < 8; $i++) {
					fgetcsv($csvFile);
					}
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
               echo($line[1]);
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            echo("Data loaded successfully");
        }else{
            echo("please import the file first ");
        }
    }else{
        echo("please import the file in csv format");
    }
}
// Redirect to the listing page
//header("Location: award_list.php".$qstring);