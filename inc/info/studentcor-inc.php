<?php
// Include config file
require_once "../inc/config-inc.php";
 
// Define variables and initialize with empty values
$studentinfoid = "";
$studentinfoid_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
//===========================================================================================================================

    // Validate idnumber
    $input_studentinfoid = trim($_POST["studentinfoid"]);
    if(empty($input_studentinfoid)){
        $studentinfoid_err = "Please Choose A Student.";     
    } else{
        $studentinfoid = $input_studentinfoid;
    }
	
//===========================================================================================================================

    // Check input errors before inserting in database	
	if(empty($studentinfoid_err)){
		
        
        // Prepare an insert statement
		
		$dup = "SELECT * FROM table_student_cor LEFT JOIN table_student_info ON table_student_info.id = table_student_cor.studentinfoid WHERE table_student_cor.studentinfoid = '".$_POST["studentinfoid"]."'";
		
		$stmt = $pdo->prepare($dup);
		$stmt->execute();
		$row = $stmt->fetch();
		
		
		if (!$row) {
			$sql = "INSERT INTO table_student_cor (studentinfoid) VALUES (:studentinfoid)";
			
			if($stmt = $pdo->prepare($sql)){
				// Bind variables to the prepared statement as parameters
				$stmt->bindParam(":studentinfoid", $param_studentinfoid, PDO::PARAM_STR);
				
				// Set parameters
				$param_studentinfoid = $studentinfoid;
				
				// Attempt to execute the prepared statement
				if($stmt->execute()){
					header("location: ../404/corinfosuccess.php");
					exit();
				} else{
					header("location: ../404/went404.php");
					exit();
				}
	
				// Close statement
				unset($stmt);
			}
		} else{
			header("location: ../404/corinfo404.php");
            exit();
		}
    }
    
    // Close connection
    unset($pdo);
}
?>