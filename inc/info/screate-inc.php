<?php
// Include config file
require_once "../inc/config-inc.php";
 
// Define variables and initialize with empty values
$idnumber = $lastname = $firstname = "";
$idnumber_err = $lastname_err = $firstname_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
//===========================================================================================================================

    // Validate idnumber
    $input_idnumber = trim($_POST["idnumber"]);
    if(empty($input_idnumber)){
        $idnumber_err = "Please enter Student ID.";     
    } else{
        $idnumber = $input_idnumber;
    }
	
//===========================================================================================================================

    // Validate lastname
    $input_lastname = trim($_POST["lastname"]);
    if(empty($input_lastname)){
        $lastname_err = "Please enter Student Lastname.";
    } elseif(!filter_var($input_lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lastname_err = "Please enter a valid name.";
    } else{
        $lastname = $input_lastname;
    }
	
    // Validate lastname
    $input_firstname = trim($_POST["firstname"]);
    if(empty($input_firstname)){
        $firstname_err = "Please enter Student Firstname.";
    } elseif(!filter_var($input_firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $firstname_err = "Please enter a valid name.";
    } else{
        $firstname = $input_firstname;
    }
	
//===========================================================================================================================

    // Check input errors before inserting in database	
	if(empty($idnumber_err) && empty($firstname_err) && empty($lastname_err)){
		
        
        // Prepare an insert statement
		
		$dup = "SELECT * FROM studentinfo WHERE idnumber = '".$_SESSION['username']."'";
		
		$stmt = $pdo->prepare($dup);
		$stmt->execute();
		$row = $stmt->fetch();
		
		
		if (!$row) {
			$sql = "INSERT INTO studentinfo (idnumber, firstname, lastname) VALUES (:idnumber, :firstname, :lastname)";
			
			if($stmt = $pdo->prepare($sql)){
				// Bind variables to the prepared statement as parameters
				$stmt->bindParam(":idnumber", $param_idnumber, PDO::PARAM_STR);
				$stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
				$stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
				
				// Set parameters
				$param_idnumber = $idnumber;
				$param_firstname = $firstname;
				$param_lastname = $lastname;
				
				// Attempt to execute the prepared statement
				if($stmt->execute()){
					header("location: ../404/infosuccess.php");
					exit();
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
	
				// Close statement
				unset($stmt);
			}
		} else{
			header("location: ../404/myinfo404.php");
            exit();
		}
    }
    
    // Close connection
    unset($pdo);
}
?>