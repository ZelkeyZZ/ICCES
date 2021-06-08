<?php

// Connect to MySQL database
$pdo = pdo_connect_mysql();

// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare("
SELECT 
table_student_info.id,
table_student_info.studentid, CONCAT(table_student_info.lastname,', ',table_student_info.firstname,' ',table_student_info.initials) AS studentname,
table_yearlevel.yearlevel, table_courses.course_type AS course
FROM table_student_info 
LEFT JOIN table_yearlevel ON table_yearlevel.id = table_student_info.yearid 
LEFT JOIN table_courses ON table_courses.id = table_student_info.courseid 
ORDER BY table_student_info.id LIMIT :current_page, :record_per_page");
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the records so we can display them in our template.
$studentinfos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_contacts = $pdo->query("
SELECT COUNT(*) 
FROM table_student_info
LEFT JOIN table_yearlevel ON table_yearlevel.id = table_student_info.yearid 
LEFT JOIN table_courses ON table_courses.id = table_student_info.courseid
")->fetchColumn();
?>