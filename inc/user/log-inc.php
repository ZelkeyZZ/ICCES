<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../user/overview.php");
    exit;
}
 
// Include config file
require_once "../inc/config-inc.php";
 
// Define variables and initialize with empty values
$username = $email = $password = $userrank = $status = $infoid = $firstname = $initials = $lastname = $prefix = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "No Username Entered.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "No Password Entered.";
    } else{
        $password = trim($_POST["password"]);
    }
	
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
		
        // Prepare a select statement
        $student = "SELECT table_users.id, table_student_info.id AS infoid, table_student_info.firstname, table_student_info.initials, table_student_info.lastname, table_student_info.prefix, table_users.username, table_users.password, table_users.email, table_users.userrank, table_users.status FROM table_users LEFT JOIN table_student_info ON table_student_info.userid = table_users.id AND table_student_info.studentid = table_users.username WHERE table_users.username = :username AND table_users.userrank = 'STUDENT'";
		
		$employee = "SELECT table_users.id, table_employee_info.firstname, table_employee_info.initials, table_employee_info.lastname, concat(table_employee_info.firstname, ' ', table_employee_info.initials, ' ', table_employee_info.lastname) AS fullname, table_employee_info.prefix, table_users.username, table_users.password, table_users.email, table_users.userrank, table_users.status FROM table_users LEFT JOIN table_employee_info ON table_employee_info.userid = table_users.id AND table_employee_info.employeeid = table_users.username WHERE table_users.username = :username AND table_users.userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN','ADMIN','SUPERADMIN','INSTRUCTOR')";
		
		
        
			if($slogin = $pdo->prepare($student)){
				// Bind variables to the prepared statement as parameters
				$slogin->bindParam(":username", $param_username, PDO::PARAM_STR);
				
				// Set parameters
				$param_username = trim($_POST["username"]);
				
				// Attempt to execute the prepared statement
				if($slogin->execute()){
					// Check if username exists, if yes then verify password
					if($slogin->rowCount() == 1){
						if($row = $slogin->fetch()){
							$id = $row["id"];
							$infoid = $row["infoid"];
							$firstname = $row["firstname"];
							$initials = $row["initials"];
							$lastname = $row["lastname"];
							$prefix = $row["prefix"];
							$username = $row["username"];
							$email = $row["email"];
							$hashed_password = $row["password"];
							$userrank = $row["userrank"];
							$status = $row["status"];
							if(password_verify($password, $hashed_password)){
								// Password is correct, so start a new session
								session_start();
								
								if($status == "Verify"){
									$student = "UPDATE table_users SET status = 'Active' WHERE id = '".$id."'";
									$slogin = $pdo->query($student);
									$slogin->execute();
								}
								
								// Store data in session variables
								$_SESSION["loggedin"] = true;
								$_SESSION["id"] = $id;
								$_SESSION["infoid"] = $infoid;
								$_SESSION["firstname"] = $firstname;
								$_SESSION["initials"] = $initials;
								$_SESSION["lastname"] = $lastname;
								$_SESSION["prefix"] = $prefix;
								$_SESSION["username"] = $username;
								$_SESSION["email"] = $email;
								$_SESSION["userrank"] = $userrank;
								$_SESSION["status"] = $status;
								// Redirect user to welcome page
								header("location: ../user/overview");
								
							} else{
								// Password is not valid, display a generic error message
								$password_err = "Invalid Password Entered.";
							}
						}
					} else{
						// Username doesn't exist, display a generic error message
						$username_err = "UID Entered Does Not Exists.";
					}
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
				
				// Close statement
				unset($stmt);
			}
			
			if($elogin = $pdo->prepare($employee)){
				// Bind variables to the prepared statement as parameters
				$elogin->bindParam(":username", $param_username, PDO::PARAM_STR);
				
				// Set parameters
				$param_username = trim($_POST["username"]);
				
				// Attempt to execute the prepared statement
				if($elogin->execute()){
					// Check if username exists, if yes then verify password
					if($elogin->rowCount() == 1){
						if($row = $elogin->fetch()){
							$id = $row["id"];
							$firstname = $row["firstname"];
							$initials = $row["initials"];
							$lastname = $row["lastname"];
							$fullname = $row["fullname"];
							$prefix = $row["prefix"];
							$username = $row["username"];
							$email = $row["email"];
							$hashed_password = $row["password"];
							$userrank = $row["userrank"];
							$status = $row["status"];
							if(password_verify($password, $hashed_password)){
								// Password is correct, so start a new session
								session_start();
								
								if($status == "Verify"){
									$employee = "UPDATE table_users SET status = 'Active' WHERE id = '".$id."'";
									$elogin = $pdo->query($employee);
									$elogin->execute();
								}
								
								// Store data in session variables
								$_SESSION["loggedin"] = true;
								$_SESSION["id"] = $id;
								$_SESSION["infoid"] = $infoid;
								$_SESSION["firstname"] = $firstname;
								$_SESSION["initials"] = $initials;
								$_SESSION["lastname"] = $lastname;
								$_SESSION["fullname"] = $fullname;
								$_SESSION["prefix"] = $prefix;
								$_SESSION["username"] = $username;
								$_SESSION["email"] = $email;
								$_SESSION["userrank"] = $userrank;
								$_SESSION["status"] = $status;
								// Redirect user to welcome page
								header("location: ../user/overview");
								
							} else{
								// Password is not valid, display a generic error message
								$password_err = "Invalid Password Entered.";
							}
						}
					} else{
						// Username doesn't exist, display a generic error message
						$username_err = "UID Entered Does Not Exists.";
					}
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
				
				// Close statement
				unset($stmt);
			}
    }
    // Close connection
    unset($pdo);
}
?>