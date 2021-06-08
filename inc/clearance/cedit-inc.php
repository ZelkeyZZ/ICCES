<?php
$pdo = pdo_connect_mysql();
$msg = '';
// Verifies if the ID Exists
if (isset($_GET['studentinfoid'])) {
    if (!empty($_POST)) {
		
        // Validation
		$instructor1_name = isset($_POST['instructor1_name']) ? $_POST['instructor1_name'] : '';
		$instructor2_name = isset($_POST['instructor2_name']) ? $_POST['instructor2_name'] : '';
		$instructor3_name = isset($_POST['instructor3_name']) ? $_POST['instructor3_name'] : '';
		$instructor4_name = isset($_POST['instructor4_name']) ? $_POST['instructor4_name'] : '';
		$instructor5_name = isset($_POST['instructor5_name']) ? $_POST['instructor5_name'] : '';
		$instructor6_name = isset($_POST['instructor6_name']) ? $_POST['instructor6_name'] : '';
		$instructor7_name = isset($_POST['instructor7_name']) ? $_POST['instructor7_name'] : '';
		$instructor8_name = isset($_POST['instructor8_name']) ? $_POST['instructor8_name'] : '';
		
		
        // Update the record
        $stmt = $pdo->prepare("UPDATE student_clearance SET instructor1_name = ?, instructor2_name = ?, instructor3_name = ?, instructor4_name = ?, instructor5_name = ?, instructor6_name = ?, instructor7_name = ?, instructor8_name = ? WHERE studentinfoid = ?");
        $stmt->execute([$instructor1_name, $instructor2_name, $instructor3_name, $instructor4_name, $instructor5_name, $instructor6_name, $instructor7_name, $instructor8_name, $_GET['studentinfoid']]);
        $msg = 'Clearance Signed!';
    }
	
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM student_clearance WHERE studentinfoid = ?');
    $stmt->execute([$_GET['studentinfoid']]);
    $clearance = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$clearance) {
        exit('A Student hasnt yet created a Clearance.');
    }
} else {
    exit('No Student ID specified!');
}
?>