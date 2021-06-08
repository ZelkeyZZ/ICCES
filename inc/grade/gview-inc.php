<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "../inc/config-inc.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM grading_list WHERE id = :id";
    
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
                $studentid = $row["studentid"];
                $studentname = $row["studentname"];
                $yearlevel = $row["yearlevel"];
				$course_type = $row["course_type"];
				$subject_code = $row["subject_code"];
				$prelim_score = $row["prelim_score"];
				$midterm_score = $row["midterm_score"];
				$finals_score = $row["finals_score"];
				$average_score = $row["average_score"];
				$overall_score = $row["overall_score"];
				$remarks = $row["remarks"];
				$editorname = $row["editorname"];
				$editorrank = $row["editorrank"];
				$datesigned = $row["datesigned"];
				
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: ../404/gview404.php");
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
    header("location: ../404/gview404.php");
    exit();
}
?>