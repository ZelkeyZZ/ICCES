<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "../inc/config-inc.php";
    
    // Prepare a select statement
	$sql = "SELECT * FROM student_clearance WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Retrieve individual field value
				$id = $row["id"];
				$studentinfoid = $row["studentinfoid"];
                $studentid = $row["studentid"];
                $studentname = $row["studentname"];
                $yearlevel = $row["yearlevel"];
				$course_type = $row["course_type"];
				$registrar_status = $row["registrar_status"];
				$schooladmin_status = $row["schooladmin_status"];
				$studentaffair_status = $row["studentaffair_status"];
				$guidance_status = $row["guidance_status"];
				$services_status = $row["services_status"];
				$cashier_status = $row["cashier_status"];
				$clinic_status = $row["clinic_status"];
				$library_status = $row["library_status"];
				$instructor1_status = $row["instructor1_status"];
				$instructor2_status = $row["instructor2_status"];
				$instructor3_status = $row["instructor3_status"];
				$instructor4_status = $row["instructor4_status"];
				$instructor5_status = $row["instructor5_status"];
				$instructor6_status = $row["instructor6_status"];
				$instructor7_status = $row["instructor7_status"];
				$instructor8_status = $row["instructor8_status"];
				$instructor1_name = $row["instructor1_name"];
				$instructor2_name = $row["instructor2_name"];
				$instructor3_name = $row["instructor3_name"];
				$instructor4_name = $row["instructor4_name"];
				$instructor5_name = $row["instructor5_name"];
				$instructor6_name = $row["instructor6_name"];
				$instructor7_name = $row["instructor7_name"];
				$instructor8_name = $row["instructor8_name"];
				$instructor1_subject = $row["instructor1_subject"];
				$instructor2_subject = $row["instructor2_subject"];
				$instructor3_subject = $row["instructor3_subject"];
				$instructor4_subject = $row["instructor4_subject"];
				$instructor5_subject = $row["instructor5_subject"];
				$instructor6_subject = $row["instructor6_subject"];
				$instructor7_subject = $row["instructor7_subject"];
				$instructor8_subject = $row["instructor8_subject"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: ../../404/cview404.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: 404/cview404.php");
    exit();
}
?>