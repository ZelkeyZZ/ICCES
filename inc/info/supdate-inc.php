<?php
$pdo = pdo_connect_mysql();
$msg = '';
// Verifies if the ID Exists
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
		
        // Validation
			// Update table_student_info
			$studenttype = isset($_POST['studenttype']) ? $_POST['studenttype'] : '';
			$schoolyear = isset($_POST['schoolyear']) ? $_POST['schoolyear'] : '';
			$courseid = isset($_POST['courseid']) ? $_POST['courseid'] : '';
			$yearid = isset($_POST['yearid']) ? $_POST['yearid'] : '';
			$semesterid = isset($_POST['semesterid']) ? $_POST['semesterid'] : '';
			$curriculumtype = isset($_POST['curriculumtype']) ? $_POST['curriculumtype'] : '';
			$subjects = isset($_POST['subjects']) ? $_POST['subjects'] : '';
			
		
        // Update the record
        $stmt = $pdo->prepare('UPDATE table_student_info SET studenttype =?, schoolyear = ?, courseid = ?, yearid = ?, semesterid = ?, curriculumtype =?, subjects =? WHERE id = ?');
        $stmt->execute([$studenttype, $schoolyear, $courseid, $yearid, $semesterid, $curriculumtype, $subjects, $_GET['id']]);
        $msg = 'Student Information Updated!';
    }
	
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM table_student_info WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $clearance = $stmt->fetch(PDO::FETCH_LAZY);
	
	
    if (!$clearance) {
        exit("The student does not have a Student Information.");
    }
} else {
    exit('No Student ID specified!');
}
?>