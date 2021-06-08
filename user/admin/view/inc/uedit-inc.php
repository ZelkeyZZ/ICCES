<?php
$pdo = pdo_connect_mysql();
$msg = '';
// Verifies if the ID Exists
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
		
        // Validation
		$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
		$student_name = isset($_POST['student_name']) ? $_POST['student_name'] : '';
		$employee_name = isset($_POST['employee_name']) ? $_POST['employee_name'] : '';
		$user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
		$user_rank = isset($_POST['user_rank']) ? $_POST['user_rank'] : '';
		$user_status = isset($_POST['user_status']) ? $_POST['user_status'] : '';
		
        // Update the record
        $stmt = $pdo->prepare('UPDATE test_user_list SET user_status = ? WHERE id = ?');
        $stmt->execute([$user_status, $_GET['id']]);
        $msg = 'User Updated!';
    }
	
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM test_user_list WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        exit("User Doesn't Exists.");
    }
} else {
    exit('No Student ID specified!');
}
?>