<?php
// Include config file
require_once "../inc/config-inc.php";
 
// Define variables and initialize with empty values
$studentinfoid = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
//---------------------------------------------------------------------------------------
	
	if(isset($_POST["sbjid"])){
	$sbjid = $_POST["sbjid"];
	
	// Entry Field
    $studentinfoid = trim($_POST["studentinfoid"]);
	

//---------------------------------------------------------------------------------------

		for ($i = 0; $i < count($_POST["sbjid"]); $i++){
				
				$test = $_POST["sbjid"][$i];
				
				$dup = "SELECT id, studentinfoid FROM table_student_subject WHERE studentinfoid = $studentinfoid AND sbjid = '".$test."'";
				$stmt = $bruh->prepare($dup);
				$stmt->execute();
				$row = $stmt->fetch();
				
			if (!$row) {
			// Prepare an insert statement
			$sql = "INSERT INTO table_student_subject (studentinfoid, sbjid) VALUES (:studentinfoid, :sbjid)";
			
				if($stmt = $pdo->prepare($sql)){
					// Bind variables to the prepared statement as parameters
					$stmt->bindParam(":studentinfoid", $param_studentinfoid, PDO::PARAM_STR);
					$stmt->bindParam(":sbjid", $param_sbjid, PDO::PARAM_STR);
					
					// Set parameters
					$param_studentinfoid = $studentinfoid;
					$param_sbjid = $_POST["sbjid"][$i];
					
					// Attempt to execute the prepared statement
					if($stmt->execute()){
						// Redirect to login page
						//header("location: ../404/currisbjtsuccess.php");
						//exit();
					} else{
						header("location: ../404/went404.php");
						exit();
					}
			
					// Close statement
					unset($stmt);
				}
			} 	elseif($row) {
					header("location: ../404/currisbjt404.php");
					exit();
				}
			
		}
	
	
	
	// Close connection
		unset($pdo);
		
	}	
}
?>