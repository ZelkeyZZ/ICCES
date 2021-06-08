<?php
$pdo = pdo_connect_mysql();
$msg = '';
// Verifies if the ID Exists
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
		
        // Validation
        $library_status = isset($_POST['library_status']) ? $_POST['library_status'] : '';
        $services_status = isset($_POST['services_status']) ? $_POST['services_status'] : '';
        $guidance_status = isset($_POST['guidance_status']) ? $_POST['guidance_status'] : '';
        $cashier_status = isset($_POST['cashier_status']) ? $_POST['cashier_status'] : '';
		$studentaffair_status = isset($_POST['studentaffair_status']) ? $_POST['studentaffair_status'] : '';
		$registrar_status = isset($_POST['registrar_status']) ? $_POST['registrar_status'] : '';
		$clinic_status = isset($_POST['clinic_status']) ? $_POST['clinic_status'] : '';
		$schooladmin_status = isset($_POST['schooladmin_status']) ? $_POST['schooladmin_status'] : '';
		$instructor1_status = isset($_POST['instructor1_status']) ? $_POST['instructor1_status'] : '';
		$instructor2_status = isset($_POST['instructor2_status']) ? $_POST['instructor2_status'] : '';
		$instructor3_status = isset($_POST['instructor3_status']) ? $_POST['instructor3_status'] : '';
		$instructor4_status = isset($_POST['instructor4_status']) ? $_POST['instructor4_status'] : '';
		$instructor5_status = isset($_POST['instructor5_status']) ? $_POST['instructor5_status'] : '';
		$instructor6_status = isset($_POST['instructor6_status']) ? $_POST['instructor6_status'] : '';
		$instructor7_status = isset($_POST['instructor7_status']) ? $_POST['instructor7_status'] : '';
		$instructor8_status = isset($_POST['instructor8_status']) ? $_POST['instructor8_status'] : '';
		$clearance_status = isset($_POST['clearance_status']) ? $_POST['clearance_status'] : '';
		$editorname = isset($_POST['editorname']) ? $_POST['editorname'] : '';
		$editorrank = isset($_POST['editorrank']) ? $_POST['editorrank'] : '';
		
		$editorname = $_SESSION['fullname'];
		$editorrank = $_SESSION['userrank'];
		
		
        // Update the record
        $stmt = $pdo->prepare("UPDATE student_clearance SET library_status =?, services_status = ?, guidance_status = ?, cashier_status = ?, studentaffair_status = ?, registrar_status = ?, clinic_status = ?, schooladmin_status = ?, instructor1_status = ?, instructor2_status = ?, instructor3_status = ?, instructor4_status = ?, instructor5_status = ?, instructor6_status = ?, instructor7_status = ?, instructor8_status = ?, clearance_status = ?, editorname = ?, editorrank = ?  WHERE id = ?");
        $stmt->execute([$library_status, $services_status, $guidance_status, $cashier_status, $studentaffair_status, $registrar_status, $clinic_status, $schooladmin_status, $instructor1_status, $instructor2_status, $instructor3_status, $instructor4_status, $instructor5_status, $instructor6_status, $instructor7_status, $instructor8_status, $clearance_status, $editorname, $editorrank, $_GET['id']]);
        $msg = 'Clearance Signed!';
    }
	
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM student_clearance WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $clearance = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$clearance) {
        exit('A Student hasnt yet created a Clearance.');
    }
} else {
    exit('No Student ID specified!');
}
?>