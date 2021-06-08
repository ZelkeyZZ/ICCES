<?php
	include"../../inc/config-inc.php";
	
	$sql = "SELECT * FROM clearance";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	
	//Retrieve the data from our table.
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	//Get the column names.
	$columnNames = array();
	if(!empty($rows)){
		//We only need to loop through the first row of our result
		//in order to collate the column names.
		$firstRow = $rows[0];
		foreach($firstRow as $colName => $val){
			$columnNames[] = $colName;
		}
	}
	
	//Setup the filename that our CSV will have when it is downloaded.
	$fileName = 'clearance.csv';
	
	//Set the Content-Type and Content-Disposition headers to force the download.
	header('Content-Type: application/excel');
	header('Content-Disposition: attachment; filename="' . $fileName . '"');
	
	//Open up a file pointer
	$fp = fopen('php://output', 'w');
	
	//Start off by writing the column names to the file.
	fputcsv($fp, $columnNames);
	
	//Then, loop through the rows and write them to the CSV file.
	foreach ($rows as $row) {
		fputcsv($fp, $row);
	}
	
	//Close the file pointer.
	fclose($fp);
	
	$stmt = $pdo->query('INSERT IGNORE INTO clearance_archive 
	(id, userid, studentid, firstname, initials, lastname, 
	registrar_status, schooladmin_status, 
	studentaffair_status, guidance_status, 
	services_status, cashier_status, 
	clinic_status, library_status, 
	instructor1_name, instructor1_subject, instructor1_status, 
	instructor2_name, instructor2_subject, instructor2_status, 
	instructor3_name, instructor3_subject, instructor3_status, 
	instructor4_name, instructor4_subject, instructor4_status, 
	instructor5_name, instructor5_subject, instructor5_status, 
	instructor6_name, instructor6_subject, instructor6_status, 
	instructor7_name, instructor7_subject, instructor7_status, 
	instructor8_name, instructor8_subject, instructor8_status, 
	clearance_status, datecreated) 
	SELECT table_clearance.id, table_student_info.userid, table_student_info.studentid, 
	table_student_info.firstname, table_student_info.initials, table_student_info.lastname, 
	table_clearance.registrar_status, table_clearance.schooladmin_status, 
	table_clearance.studentaffair_status, table_clearance.guidance_status, 
	table_clearance.services_status, table_clearance.cashier_status, 
	table_clearance.clinic_status, table_clearance.library_status, 
	table_clearance.instructor1_name, table_clearance.instructor1_subject, table_clearance.instructor1_status, 
	table_clearance.instructor2_name, table_clearance.instructor2_subject, table_clearance.instructor2_status, 
	table_clearance.instructor3_name, table_clearance.instructor3_subject, table_clearance.instructor3_status, 
	table_clearance.instructor4_name, table_clearance.instructor4_subject, table_clearance.instructor4_status, 
	table_clearance.instructor5_name, table_clearance.instructor5_subject, table_clearance.instructor5_status, 
	table_clearance.instructor6_name, table_clearance.instructor6_subject, table_clearance.instructor6_status, 
	table_clearance.instructor7_name, table_clearance.instructor7_subject, table_clearance.instructor7_status, 
	table_clearance.instructor8_name, table_clearance.instructor8_subject, table_clearance.instructor8_status, 
	table_clearance.clearance_status, table_clearance.datecreated 
	FROM table_student_info LEFT JOIN table_clearance ON table_clearance.studentinfoid = table_student_info.id LIMIT 1');
	$stmt->execute();
	
	$stmt1= $pdo->query('DELETE FROM table_clearance');
	$stmt1->execute();
?>