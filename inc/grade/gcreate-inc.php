<?php
// Include config file
require_once "../inc/config-inc.php";
 
// Define variables and initialize with empty values
$studeninfoid = $instructorname = $sbjid = "";
$instructorname_err = $sbjid_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
//===========================================================================================================================

	// Validate subjectcode
    $input_instructorname = trim($_POST["instructorname"]);
    if(empty($input_instructorname)){
        $instructorname_err = "Please enter Instructor Name.";     
    } else{
        $instructorname = $input_instructorname;
    }

    // Validate subjectcode
    $input_sbjid = trim($_POST["sbjid"]);
    if(empty($input_sbjid)){
        $sbjid_err = "Please enter Student Subject.";     
    } else{
        $sbjid = $input_sbjid;
    }
	
//===========================================================================================================================
    
    // Check input errors before inserting in database
    if(empty($instructorname_err) && empty($sbjid_err)){
		
		$dup = "SELECT table_student_grade.studentinfoid, table_student_grade.instructorname, table_student_grade.sbjid FROM table_student_grade LEFT JOIN table_student_subject ON table_student_subject.studentinfoid = table_student_grade.studentinfoid WHERE table_student_grade.sbjid = $input_sbjid LIMIT 1";
		
		$stmt = $pdo->prepare($dup);
		$stmt->execute();
		$row = $stmt->fetch();
		
		if (!$row) {
        // Prepare an insert statement
        $sql = "INSERT INTO table_student_grade (studentinfoid ,instructorname, sbjid) VALUES (:studentinfoid, :instructorname, :sbjid)";
 
			if($stmt = $pdo->prepare($sql)){
				// Bind variables to the prepared statement as parameters
				$stmt->bindParam(":studentinfoid", $param_studentinfoid, PDO::PARAM_STR);
				$stmt->bindParam(":instructorname", $param_instructorname, PDO::PARAM_STR);
				$stmt->bindParam(":sbjid", $param_sbjid, PDO::PARAM_STR);
				
				// Set parameters
				$param_studentinfoid = $_SESSION['infoid'];
				$param_instructorname = $instructorname;
				$param_sbjid = $sbjid;
				
				// Attempt to execute the prepared statement
				if($stmt->execute()){
					// Records created successfully. Redirect to landing page
					header("location: ../404/subjectsuccess.php");
					exit();
				} else{
					header("location: ../404/went404.php");
					exit();
				}
			}
			// Close statement
			unset($stmt);
			
		}	elseif($row) {
			header("location: ../404/grading404.php");
            exit();
			}
    }
    
    // Close connection
    unset($pdo);
}
?>