<?php
// Include config file
require_once "../inc/config-inc.php";
 
// Define variables and initialize with empty values
$subject_code = $subject_name = $subject_unit = $subject_labunit = $schoolyear = $yearid = $semesterid = $curriculumtype = "";
$subject_code_err = $subject_name_err = $subject_unit_err = $subject_labunit_err = $schoolyear_err = $yearid_err = $semesterid_err = $curriculumtype_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
//---------------------------------------------------------------------------------------
 
    // Validate subjectcode
    if(empty(trim($_POST["subject_code"]))){
        $subject_code_err = "Please Enter Subject Code.";     
    } else{
        $subject_code = trim($_POST["subject_code"]);
		if (!preg_match("/^[0-9A-Z]*$/",$subject_code)){
			$subject_code_err = "Only Letters & Number Allowed.";
		}
    }

//---------------------------------------------------------------------------------------	
	
	// Validate subjectname
    if(empty(trim($_POST["subject_name"]))){
        $subject_name_err = "Please Enter Subject Name.";     
    } else{
        $subject_name = trim($_POST["subject_name"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$subject_name)){
			$subject_name_err = "Only Letters & White Space Allowed.";
		}
    }
	
//---------------------------------------------------------------------------------------
	
	// Validate subjectunit
    if(empty(trim($_POST["subject_unit"]))){
        $subject_unit_err = "Please Enter # of Subject Unit.";     
    } else{
        $subject_unit = trim($_POST["subject_unit"]);
    }
	
	// Validate labunit
    if(empty(trim($_POST["subject_labunit"]))){
        $subject_labunit_err = "Please Enter # of Subject Unit. If there's no unit input 0.";     
    } else{
        $subject_labunit = trim($_POST["subject_labunit"]);
    }
	
//---------------------------------------------------------------------------------------

	// Validate yearid
    if(empty(trim($_POST["yearid"]))){
        $yearid_err = "Please Enter Year Level for the Subject.";     
    } else{
        $yearid = trim($_POST["yearid"]);
    }
	
	// Validate semesterid
    if(empty(trim($_POST["semesterid"]))){
        $semesterid_err = "Please Enter Semester for the Subject.";     
    } else{
        $semesterid = trim($_POST["semesterid"]);
    }

//---------------------------------------------------------------------------------------

	// Validate curriculumtype
    if(empty(trim($_POST["curriculumtype"]))){
        $curriculumtype_err = "Please Enter Type of Curriculum.";     
    } else{
        $curriculumtype = trim($_POST["curriculumtype"]);
    }
	
	// Validate schoolyear
    if(empty(trim($_POST["schoolyear"]))){
        $schoolyear_err = "Please Enter School Year for Curriculum.";
    } else{
        $schoolyear = trim($_POST["schoolyear"]);
    }

//---------------------------------------------------------------------------------------
    
    // Check input errors before inserting in database
    if(empty($subject_code_err) && empty($subject_name_err) && empty($subject_unit_err) && empty($subject_labunit_err) && empty($schoolyear_err) && empty($yearid_err) && empty($semesterid_err) && empty($curriculumtype_err)){
		
		$dup = "SELECT id, subject_code FROM table_subjects WHERE schoolyear = $schoolyear AND subject_code = '$subject_code'";
		
		$stmt = $pdo->prepare($dup);
		$stmt->execute();
		$row = $stmt->fetch();
        
		if (!$row) {
        // Prepare an insert statement
        $sql = "INSERT INTO table_subjects (subject_code, subject_name, subject_unit, subject_labunit, schoolyear, yearid, semesterid, curriculumtype) VALUES (:subject_code, :subject_name, :subject_unit, :subject_labunit, :schoolyear, :yearid, :semesterid, :curriculumtype)";
         
			if($stmt = $pdo->prepare($sql)){
				// Bind variables to the prepared statement as parameters
				$stmt->bindParam(":subject_code", $param_subject_code, PDO::PARAM_STR);
				$stmt->bindParam(":subject_name", $param_subject_name, PDO::PARAM_STR);
				$stmt->bindParam(":subject_unit", $param_subject_unit, PDO::PARAM_STR);
				$stmt->bindParam(":subject_labunit", $param_subject_labunit, PDO::PARAM_STR);
				$stmt->bindParam(":schoolyear", $param_schoolyear, PDO::PARAM_STR);
				$stmt->bindParam(":yearid", $param_yearid, PDO::PARAM_STR);
				$stmt->bindParam(":semesterid", $param_semesterid, PDO::PARAM_STR);
				$stmt->bindParam(":curriculumtype", $param_curriculumtype, PDO::PARAM_STR);
				
				// Set parameters
				$param_subject_code = $subject_code;
				$param_subject_name = $subject_name;
				$param_subject_unit = $subject_unit;
				$param_subject_labunit = $subject_labunit;
				$param_schoolyear = $schoolyear;
				$param_yearid = $yearid;
				$param_semesterid = $semesterid;
				$param_curriculumtype = $curriculumtype;
				
				// Attempt to execute the prepared statement
				if($stmt->execute()){
					// Redirect to login page
					header("location: ../404/currisbjtsuccess.php");
					exit();
				} else{
					header("location: ../404/went404.php");
					exit();
				}
	
				// Close statement
				unset($stmt);
			}
		} 	elseif($row) {
			header("location: ../404/curriculum404.php");
            exit();
		}
    }
    
    // Close connection
    unset($pdo);
}
?>