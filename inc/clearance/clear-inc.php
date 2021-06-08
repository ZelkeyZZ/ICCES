<?php
// Include config file
require_once "../inc/config-inc.php";
 
// Define variables and initialize with empty values
$studentinfoid = $instructor1_name = $instructor1_subject = $instructor2_name = $instructor2_subject = $instructor3_name = $instructor3_subject = $instructor4_name = $instructor4_subject = $instructor5_name = $instructor5_subject = $instructor6_name = $instructor6_subject = $instructor7_name = $instructor7_subject = $instructor8_name = $instructor8_subject = "";

$instructor1_name_err = $instructor1_subject_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
//--------------------------------------------------------------------------	
	
	// Validate instructor1
    if(empty(trim($_POST["instructor1_name"]))){
		$instructor1_name_err = "Field Set Can't Be Empty.";
    } else{
        $instructor1_name = trim($_POST["instructor1_name"]);
    }
	
	// Validate instructor1
    if(empty(trim($_POST["instructor1_subject"]))){
		$instructor1_subject_err = "Field Set Can't Be Empty.";
    } else{
        $instructor1_subject = trim($_POST["instructor1_subject"]);
    }
	
//--------------------------------------------------------------------------
	
	// Field Entry for instructor2 
	$instructor2_name = trim($_POST["instructor2_name"]);
	$instructor2_subject = trim($_POST["instructor2_subject"]);
	
	// Field Entry for instructor3 
	$instructor3_name = trim($_POST["instructor3_name"]);
	$instructor3_subject = trim($_POST["instructor3_subject"]);
	
	// Field Entry for instructor4 
	$instructor4_name = trim($_POST["instructor4_name"]);
	$instructor4_subject = trim($_POST["instructor4_subject"]);
	
	// Field Entry for instructor5
	$instructor5_name = trim($_POST["instructor5_name"]);
	$instructor5_subject = trim($_POST["instructor5_subject"]);
	
	// Field Entry for instructor6 
	$instructor6_name = trim($_POST["instructor6_name"]);
	$instructor6_subject = trim($_POST["instructor6_subject"]);
	
	// Field Entry for instructor7 
	$instructor7_name = trim($_POST["instructor7_name"]);
	$instructor7_subject = trim($_POST["instructor7_subject"]);
	
	// Field Entry for instructor8 
	$instructor8_name = trim($_POST["instructor8_name"]);
	$instructor8_subject = trim($_POST["instructor8_subject"]);

//--------------------------------------------------------------------------
	// Check input errors before inserting in database
    if(empty($instructor1_name_err) && empty($instructor1_subject_err)){
        
        // Prepare an insert statement
		
		$dup = "SELECT * FROM table_clearance WHERE studentinfoid = '".$_SESSION['infoid']."'";
		
		$stmt = $pdo->prepare($dup);
		$stmt->execute();
		$row = $stmt->fetch();
		
		
		if (!$row) {
			$sql = "INSERT INTO table_clearance (studentinfoid, instructor1_name, instructor1_subject, instructor2_name, instructor2_subject, instructor3_name, instructor3_subject, instructor4_name, instructor4_subject, instructor5_name, instructor5_subject, instructor6_name, instructor6_subject, instructor7_name, instructor7_subject, instructor8_name, instructor8_subject) VALUES (:studentinfoid,:instructor1_name, :instructor1_subject, :instructor2_name, :instructor2_subject, :instructor3_name, :instructor3_subject, :instructor4_name, :instructor4_subject, :instructor5_name, :instructor5_subject, :instructor6_name, :instructor6_subject, :instructor7_name, :instructor7_subject, :instructor8_name, :instructor8_subject)";
			
			if($stmt = $pdo->prepare($sql)){
				// Bind variables to the prepared statement as parameters
				$stmt->bindParam(":studentinfoid", $param_studentinfoid, PDO::PARAM_STR);
				$stmt->bindParam(":instructor1_name", $param_instructor1_name, PDO::PARAM_STR);
				$stmt->bindParam(":instructor2_name", $param_instructor2_name, PDO::PARAM_STR);
				$stmt->bindParam(":instructor3_name", $param_instructor3_name, PDO::PARAM_STR);
				$stmt->bindParam(":instructor4_name", $param_instructor4_name, PDO::PARAM_STR);
				$stmt->bindParam(":instructor5_name", $param_instructor5_name, PDO::PARAM_STR);
				$stmt->bindParam(":instructor6_name", $param_instructor6_name, PDO::PARAM_STR);
				$stmt->bindParam(":instructor7_name", $param_instructor7_name, PDO::PARAM_STR);
				$stmt->bindParam(":instructor8_name", $param_instructor8_name, PDO::PARAM_STR);
				$stmt->bindParam(":instructor1_subject", $param_instructor1_subject, PDO::PARAM_STR);
				$stmt->bindParam(":instructor2_subject", $param_instructor2_subject, PDO::PARAM_STR);
				$stmt->bindParam(":instructor3_subject", $param_instructor3_subject, PDO::PARAM_STR);
				$stmt->bindParam(":instructor4_subject", $param_instructor4_subject, PDO::PARAM_STR);
				$stmt->bindParam(":instructor5_subject", $param_instructor5_subject, PDO::PARAM_STR);
				$stmt->bindParam(":instructor6_subject", $param_instructor6_subject, PDO::PARAM_STR);
				$stmt->bindParam(":instructor7_subject", $param_instructor7_subject, PDO::PARAM_STR);
				$stmt->bindParam(":instructor8_subject", $param_instructor8_subject, PDO::PARAM_STR);
				
				// Set parameters
				$param_studentinfoid = $_SESSION['infoid'];
				$param_instructor1_name = $instructor1_name;
				$param_instructor2_name = $instructor2_name;
				$param_instructor3_name = $instructor3_name;
				$param_instructor4_name = $instructor4_name;
				$param_instructor5_name = $instructor5_name;
				$param_instructor6_name = $instructor6_name;
				$param_instructor7_name = $instructor7_name;
				$param_instructor8_name = $instructor8_name;
				$param_instructor1_subject = $instructor1_subject;
				$param_instructor2_subject = $instructor2_subject;
				$param_instructor3_subject = $instructor3_subject;
				$param_instructor4_subject = $instructor4_subject;
				$param_instructor5_subject = $instructor5_subject;
				$param_instructor6_subject = $instructor6_subject;
				$param_instructor7_subject = $instructor7_subject;
				$param_instructor8_subject = $instructor8_subject;
				
				// Attempt to execute the prepared statement
				if($stmt->execute()){
					header("location: ../404/clearsuccess.php");
					exit();
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
	
				// Close statement
				unset($stmt);
			}
		}	elseif($row) {
			header("location: ../404/clear404.php");
            exit();
		}
	}
    
    // Close connection
    unset($pdo);
}
?>