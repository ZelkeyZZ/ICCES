<?php
$pdo = pdo_connect_mysql();
$msg = '';
// Verifies if the ID Exists
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
		
        // Validation
        $prelim_score = isset($_POST['prelim_score']) ? $_POST['prelim_score'] : '';
        $midterm_score = isset($_POST['midterm_score']) ? $_POST['midterm_score'] : '';
		$finals_score = isset($_POST['finals_score']) ? $_POST['finals_score'] : '';
		$average_score = isset($_POST['average_score']) ? $_POST['average_score'] : '';
		$overall_score = isset($_POST['overall_score']) ? $_POST['overall_score'] : '';
		$remarks = isset($_POST['remarks']) ? $_POST['remarks'] : '';
		$editorname = isset($_POST['editorname']) ? $_POST['editorname'] : '';
		$editorrank = isset($_POST['editorrank']) ? $_POST['editorrank'] : '';
		
		$editorname = $_SESSION['fullname'];
		$editorrank = $_SESSION['userrank'];
		
        // Update the record
        $stmt = $pdo->prepare('UPDATE grading_list SET prelim_score = ?, midterm_score = ?, finals_score = ?, average_score = ?, overall_score = ?, remarks = ?, editorname = ?, editorrank = ? WHERE id = ?');
        $stmt->execute([$prelim_score, $midterm_score, $finals_score, $average_score, $overall_score, $remarks, $editorname, $editorrank, $_GET['id']]);
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