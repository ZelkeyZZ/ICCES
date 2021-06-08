<?php
// Validates ID if exists before processing
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
	
	// Include config file
	require_once "../inc/config-inc.php";
	
	// Prepare SELECT Statement
	$sql = "
	SELECT 
	table_student_info.id, 
	table_student_info.studentid,
	CONCAT(table_student_info.lastname,', ',table_student_info.firstname,' ',table_student_info.initials) AS studentname,
	table_yearlevel.yearlevel as studentyear,
	table_courses.course_type as studentcourse,
	table_semester.semesters as studentsem,
	table_student_info.studenttype,
	table_student_info.schoolyear,
	table_student_info.curriculumtype,
	table_student_info.subjects
	FROM table_student_info 
	LEFT JOIN table_courses ON table_courses.id = table_student_info.courseid
	LEFT JOIN table_yearlevel ON table_yearlevel.id = table_student_info.yearid
	LEFT JOIN table_semester ON table_semester.id = table_student_info.semesterid
	WHERE table_student_info.id = :id";
	
	if( $stmt = $pdo->prepare($sql) ){
		
		// Binds Variables into Prepared Statement as Parameters
		$stmt->bindParam(":id", $param_id);
		
		// Set Parameters
		$param_id = trim($_GET["id"]);
		
		// Attempts to Execute Prepared Statement
		if($stmt->execute()){
			if( $stmt -> rowCount() == 1){
				
				//Fetch Row Statement
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
				//Retrieve Individual Field Value
				$id = $row["id"];
				$studentid = $row["studentid"];
				$studentname = $row["studentname"];
				$studentyear = $row["studentyear"];
				$studentcourse = $row["studentcourse"];
				$studentsem = $row["studentsem"];
				$schoolyear = $row["schoolyear"];
				$studenttype = $row["studenttype"];
				$curriculumtype = $row["curriculumtype"];
				$subjects = $row["subjects"];
				
			} 	else{
					// URL doesn't contain valid id parameter. Redirect to error page
					header("location: ../404/info404.php");
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
			header("location: ../404/info404.php");
			exit();
		}
?>