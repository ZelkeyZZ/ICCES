<?php
$pdo = pdo_connect_mysql();
$msg = '';
// Verifies if the ID Exists
if (isset($_GET['studentinfoid'])) {
    if (!empty($_POST)) {
		
        // Validation
			// Update table_student_info
			$scholartype = isset($_POST['scholartype']) ? $_POST['scholartype'] : '';
			$payment_type = isset($_POST['payment_type']) ? $_POST['payment_type'] : '';
			$misc_fee = isset($_POST['misc_fee']) ? $_POST['misc_fee'] : '';
			$thesis_fee = isset($_POST['thesis_fee']) ? $_POST['thesis_fee'] : '';
			$nstp_fee = isset($_POST['nstp_fee']) ? $_POST['nstp_fee'] : '';
			$lab_fee = isset($_POST['lab_fee']) ? $_POST['lab_fee'] : '';
			$tuiton_fee = isset($_POST['tuiton_fee']) ? $_POST['tuiton_fee'] : '';
			$totaltuiton_fee = isset($_POST['totaltuiton_fee']) ? $_POST['totaltuiton_fee'] : '';
			$total_units = isset($_POST['total_units']) ? $_POST['total_units'] : '';
			$surcharge = isset($_POST['surcharge']) ? $_POST['surcharge'] : '';
			$prelim_installment = isset($_POST['prelim_installment']) ? $_POST['prelim_installment'] : '';
			$prelim_date = isset($_POST['prelim_date']) ? $_POST['prelim_date'] : '';
			$midterm_installment = isset($_POST['midterm_installment']) ? $_POST['midterm_installment'] : '';
			$midterm_date = isset($_POST['midterm_date']) ? $_POST['midterm_date'] : '';
			$finals_installment = isset($_POST['finals_installment']) ? $_POST['finals_installment'] : '';
			$finals_date = isset($_POST['finals_date']) ? $_POST['finals_date'] : '';
			
		
        // Update the record
        $stmt = $pdo->prepare('UPDATE table_student_cor SET scholartype =?, payment_type = ?, misc_fee = ?, thesis_fee = ?, nstp_fee = ?, lab_fee =?, tuiton_fee =?, totaltuiton_fee =?, total_units =?, surcharge =?, prelim_installment =?, prelim_date =?, midterm_installment =?, midterm_date =?, finals_installment =?, finals_date =? WHERE studentinfoid = ?');
        $stmt->execute([$scholartype, $payment_type, $misc_fee, $thesis_fee, $nstp_fee, $lab_fee, $tuiton_fee, $totaltuiton_fee, $total_units, $surcharge, $prelim_installment, $prelim_date, $midterm_installment, $midterm_date, $finals_installment, $finals_date, $_GET['studentinfoid']]);
        $msg = 'Student C.O.R Updated!';
    }
	
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM table_student_cor WHERE studentinfoid = ?');
    $stmt->execute([$_GET['studentinfoid']]);
    $clearance = $stmt->fetch(PDO::FETCH_LAZY);
	
	
    if (!$clearance) {
        exit("The student does not have a C.O.R.");
    }
} else {
    exit('No Student ID specified!');
}
?>