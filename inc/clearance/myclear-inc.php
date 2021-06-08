<?php
	// Validates ID if exists before processing
	if( isset($_GET["userid"]) && !empty(trim($_GET["userid"])) ) {
		
		// Include config file
		require_once "../inc/config-inc.php";
		
		// Prepare SELECT Statement
		$sql = "SELECT * FROM student_clearance LEFT JOIN table_student_info ON table_student_info.id = student_clearance.studentinfoid WHERE table_student_info.userid = :userid";
		
		if( $stmt = $pdo->prepare($sql) ){
			
			// Binds Variables into Prepared Statement as Parameters
			$stmt->bindParam(":userid", $param_userid);
			
			// Set Parameters
			$param_userid = trim($_GET["userid"]);
			
			// Attempts to Execute Prepared Statement
			if( $stmt->execute() ){
				if( $stmt -> rowCount() == 1){
					
					//Fetch Row Statement
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					
					//Retrieve Individual Field Value
					$userid = $_SESSION['id'];
					$studentid = $_SESSION['username'];
					$studentname = $row["studentname"];
					$yearlevel = $row["yearlevel"];
					$course_type = $row["course_type"];
				} 	else{
						// URL doesn't contain valid id parameter. Redirect to error page
						header("location: ../404/myclear404.php");
						exit();
					}
				
			}	else{
					echo "Oops! Something went wrong. Please try again later.";
				}
		}
		
		// Close statement
		unset($stmt);
		
		// Close connection
		unset($pdo);
		
	}
?>