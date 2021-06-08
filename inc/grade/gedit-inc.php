<?php
$pdo = pdo_connect_mysql();
$msg = '';
// Verifies if the ID Exists
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
		
        // Validation
        $instructorname = isset($_POST['instructorname']) ? $_POST['instructorname'] : '';
		
        // Update the record
        $stmt = $pdo->prepare('UPDATE grading_list SET instructorname = ? WHERE id = ?');
        $stmt->execute([$instructorname, $_GET['id']]);
        $msg = 'Grade Update!';
    }
	
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM testing WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $grade = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$grade) {
        exit("The student does not have a subject.");
    }
} else {
    exit('No Student ID specified!');
}
?>