<?php
$pdo = pdo_connect_mysql();
$msg = '';
// Verifies if the ID Exists
if (isset($_GET['studentinfoid'])) {
    if (!empty($_POST)) {
		
        // Validation
			// Update table_student_info
			$goodmoral = isset($_POST['goodmoral']) ? $_POST['goodmoral'] : '';
			$appform = isset($_POST['appform']) ? $_POST['appform'] : '';
			$tor = isset($_POST['tor']) ? $_POST['tor'] : '';
			$form137 = isset($_POST['form137']) ? $_POST['form137'] : '';
			
		
        // Update the record
        $stmt = $pdo->prepare('UPDATE table_student_req SET goodmoral =?, appform = ?, tor = ?, form137 = ? WHERE studentinfoid = ?');
        $stmt->execute([$goodmoral, $appform, $tor, $form137, $_GET['studentinfoid']]);
        $msg = 'Student C.O.R Updated!';
    }
	
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM table_student_req WHERE studentinfoid = ?');
    $stmt->execute([$_GET['studentinfoid']]);
    $clearance = $stmt->fetch(PDO::FETCH_LAZY);
	
	
    if (!$clearance) {
        exit("The student does not have a Student Requisites");
    }
} else {
    exit('No Student ID specified!');
}
?>