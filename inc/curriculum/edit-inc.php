<?php
$pdo = pdo_connect_mysql();
$msg = '';
// Verifies if the ID Exists
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
		
        // Validation
        $yearid = isset($_POST['yearid']) ? $_POST['yearid'] : '';
        $semesterid = isset($_POST['semesterid']) ? $_POST['semesterid'] : '';
        $curriculumtype = isset($_POST['curriculumtype']) ? $_POST['curriculumtype'] : '';
		$schoolyear = isset($_POST['schoolyear']) ? $_POST['schoolyear'] : '';
		
        // Update the record
        $stmt = $pdo->prepare("UPDATE table_subjects SET yearid = ?, semesterid = ?, curriculumtype = ?, schoolyear = ?  WHERE id = ?");
        $stmt->execute([$yearid, $semesterid, $curriculumtype, $schoolyear, $_GET['id']]);
        $msg = 'Subject Curriculum Updated!';
    }
	
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM table_subjects WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $sbjtcurri = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$sbjtcurri) {
        exit("Subject Curriculum Doesn't Exists.");
    }
} else {
    exit('Subject Curriculum ID specified!');
}
?>