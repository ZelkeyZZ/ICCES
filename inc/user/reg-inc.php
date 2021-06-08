<?php
// Include config file
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require_once "../inc/config-inc.php";
 
// Define variables and initialize with empty values
$msg = $username = $password = $confirm_password = $email = $userrank = $firstname = $initials = $lastname = $prefix = "";
$username_err = $password_err = $confirm_password_err = $email_err = $userrank_err = $firstname_err = $initials_err = $lastname_err = $prefix_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
//---------------------------------------------------------------------------------------
	
	// Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please Enter UID.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM table_users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "ID Number Already Registered.";
                } else{
                    $username = trim($_POST["username"]);
					if (!preg_match("/^[0-9]*$/",$username)){
						$username_err = "Invalid ID Number.";
					}
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

//---------------------------------------------------------------------------------------	
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 12){
        $password_err = "Password must have atleast 12 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
	
//---------------------------------------------------------------------------------------
	
	// Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Email Required.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM table_users WHERE email = :email";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $email_err = "Email Already Registered.";
                } else{
                    $email = trim($_POST["email"]);
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
						$email_err="Invalid Email.";
					}
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
	
//---------------------------------------------------------------------------------------
	
	// Validate userlv
    if(empty(trim($_POST["userrank"]))){
        $userrank_err = "No Access Level Set.";     
    } else{
        $userrank = trim($_POST["userrank"]);
    }
	
//---------------------------------------------------------------------------------------
	
	// Validate firstname
    if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Firstname Required.";     
    } else{
        $firstname = trim($_POST["firstname"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)){
			$firstname_err = "Only Letters & White Space Allowed.";
		}
    }
	
	// Validate initials
    if(empty(trim($_POST["initials"]))){
        $initials_err = "Middle Initial Required.";     
    } else{
        $initials = trim($_POST["initials"]);
    }

	// Validate lastname
    if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Lastname Required.";     
    } else{
        $lastname = trim($_POST["lastname"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)){
			$lastname_err = "Only Letters & White Space Allowed."; 
		}
    }
	
	// Validate prefix
    if(empty(trim($_POST["prefix"]))){
        $prefix_err = "Prefix Required.";     
    } else{
        $prefix = trim($_POST["prefix"]);
    }
	
//---------------------------------------------------------------------------------------
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($userrank_err) && empty($firstname_err) && empty($initials_err) && empty($lastname_err) && empty($prefix_err)) {
        
        // Prepare an insert statement
        $sql = "INSERT INTO table_users (username, password, email, userrank) VALUES (:username, :password, :email, :userrank)";
        
        if(isset($_POST["email"])){
            $emailTo = $_POST["email"];
            $pwd = $_POST["password"];
            
            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
            
            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'cyronkaizkher@gmail.com';                     //SMTP username
                $mail->Password   = 'oibrhshyzpatkaay';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            
                //Recipients
                $mail->setFrom('info@informatics.edu.ph', 'ICCES Admin');
                $mail->addAddress($emailTo);     //Add a recipient
                $mail->addReplyTo('no-reply@informatics.edu.ph', 'No-Reply');
                
                //Content
                $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/login";
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Account Verification';
                $mail->Body    = "	<p>Hi ".$_POST['lastname'].", ".$_POST['firstname'].",</p>
                                    <p>Your Account for ICCES has been created.<br/>
                                    Account Details:<br/>
                                    Username : Your Username is your ID Number in your ID Card. <b>".$username."</b>,<br/>
                                    Password : <b>".$pwd."</b>, <br/>
                                    *This password should be temporary and must be changed after logging in.</p>
                                    <p>Click the link to proceed on logging your account - <a href='$url'>Login</a></p>
                                    <p>*First login will verify your Account, Relogin again to Enter.</p>";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                $msg = "Account Created, an E-mail has been sent to ".$emailTo.".";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
		
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
			$stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
			$stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
			$stmt->bindParam(":userrank", $param_userrank, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = $username;
			$param_password = password_hash($password, PASSWORD_DEFAULT);
			$param_email = $email;
			$param_userrank = $userrank;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
				$id = $pdo->lastInsertId();
                echo $id;
                $sql2 = "INSERT INTO table_student_info (userid, studentid, firstname, initials, lastname, prefix) VALUES (:userid, :username, :firstname, :initials, :lastname, :prefix)";

                if(!empty(trim($_POST["userrank"])) && trim($_POST["userrank"]) != "STUDENT"){
                    $sql2 = "INSERT INTO table_employee_info (userid, employeeid, firstname, initials, lastname, prefix) VALUES (:userid, :username, :firstname, :initials, :lastname, :prefix)";
                }

                if($stmt2 = $pdo->prepare($sql2)){
                    
                    // Bind variables to the prepared statement as parameters
                    $stmt2->bindParam(":userid", $param_userid, PDO::PARAM_INT);
                    $stmt2->bindParam(":username", $param_studentid, PDO::PARAM_STR);
                    $stmt2->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
                    $stmt2->bindParam(":initials", $param_initials, PDO::PARAM_STR);
                    $stmt2->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
                    $stmt2->bindParam(":prefix", $param_prefix, PDO::PARAM_STR);
                    
                    // Set parameters
                    $param_userid = $id;
                    $param_studentid = $username;
                    $param_firstname = $firstname;
                    $param_initials = $initials;
                    $param_lastname = $lastname;
                    $param_prefix = $prefix;

                    // Attempt to execute the prepared statement
                    if($stmt2->execute()){
                        
                        // Redirect to login page
                        header("location: ../404/regsuccess.php");
                        exit();
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    } 
                    
                    // Close statement
                    unset($stmt2);
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