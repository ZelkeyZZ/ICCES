<?php
	// CONNECT TO DATABASE
	require "../inc/config-inc.php";
	
	if (isset($_FILES['uploadedfile'])) {   

    // get the csv file and open it up
    $file = $_FILES['uploadedfile']['tmp_name']; 
    $handle = fopen($file, "r"); 
		try { 
			
			// unset the first line like this       
			fgets($handle);
	
			// created loop here
			while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
			
			$dup = "SELECT id FROM table_subjects WHERE schoolyear = '$data[4]' AND subject_code = '$data[0]'";
			$stmt1 = $pdo->prepare($dup);
			$stmt1->execute();
			$row = $stmt1->fetch();
			
				if (!$row) {
					$stmt = $pdo->prepare("INSERT INTO table_subjects (subject_code, subject_name, subject_unit, subject_labunit, schoolyear, yearid, semesterid, curriculumtype) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
					$stmt->execute($data);
					
				} 	elseif($row) {
					header("location: ../404/curriculum404.php");
					exit();
				}
			}       
	
			fclose($handle);
	
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	
		header("location: ../404/currimportsuccess.php");
		exit();

	} else {
		header("location: ../404/currimportfailed.php");
		exit();
	}
?>