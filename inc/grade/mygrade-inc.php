<?php
	// Validates ID if exists before processing
	if( isset($_GET["id"]) && !empty(trim($_GET["id"])) ) {
		
		// Include config file
		require_once "../inc/config-inc.php";
		
		// Prepare SELECT Statement
		$sql = "SELECT table_student_grade.id, table_student_grade.studentinfoid, table_student_info.studentid, table_student_grade.sbjid, table_student_grade.prelim_score, table_student_grade.midterm_score, table_student_grade.finals_score, table_student_grade.average_score, table_student_grade.overall_score, table_student_grade.remarks FROM table_student_grade LEFT JOIN table_student_info ON table_student_info.id = table_student_grade.studentinfoid WHERE table_student_info.id = :id";
		
		if( $stmt = $pdo->prepare($sql) ){
			
			// Binds Variables into Prepared Statement as Parameters
			$stmt->bindParam(":id", $param_id);
			
			// Set Parameters
			$param_userid = trim($_GET["id"]);
			
			// Attempts to Execute Prepared Statement
			if( $stmt->execute() ){
				if( $stmt -> rowCount() == 1){
					
					//Fetch Row Statement
					$row = $stmt->fetchAll(PDO::FETCH_LAZY);
					
					//Retrieve Individual Field Value
					$studentinfoid = $_SESSION["infoid"];
					$studentid = $_SESSION["username"];
					$sbjid = $row["sbjid"];
					$prelim_score = $row["prelim_score"];
					$midterm_score = $row["midterm_score"];
					$finals_score = $row["finals_score"];
					$average_score = $row["average_score"];
					$overall_score = $row["overall_score"];
					$remarks = $row["remarks"];
					
				}	else{
						// URL doesn't contain valid id parameter. Redirect to error page
						header("location: ../404/mygrade404.php");
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
		
	} 	else{
			// URL doesn't contain valid id parameter. Redirect to error page
			header("location: ../404/mygrade404.php");
			exit();
		}
?>