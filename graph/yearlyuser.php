<?php
	/* 2021 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021%'");
	$useryrjan = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021%' AND userrank = 'STUDENT'");
	$useryrjan1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021%' AND userrank = 'INSTRUCTOR'");
	$useryrjan2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryrjan3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryrjan4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2021 */
	/* 2022 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2022%'"); 
	$useryrfeb = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2022%' AND userrank = 'STUDENT'");
	$useryrfeb1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2022%' AND userrank = 'INSTRUCTOR'");
	$useryrfeb2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2022%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryrfeb3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2022%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryrfeb4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2022 */
	/* 2023 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2023%'"); 
	$useryrmar = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2023%' AND userrank = 'STUDENT'");
	$useryrmar1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2023%' AND userrank = 'INSTRUCTOR'");
	$useryrmar2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2023%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryrmar3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2023%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryrmar4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2023 */
	/* 2024 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2024%'"); 
	$useryrapr = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2024%' AND userrank = 'STUDENT'");
	$useryrapr1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2024%' AND userrank = 'INSTRUCTOR'");
	$useryrapr2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2024%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryrapr3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2024%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryrapr4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2024 */
	/* 2025 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2025%'"); 
	$useryrmay = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2025%' AND userrank = 'STUDENT'");
	$useryrmay1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2025%' AND userrank = 'INSTRUCTOR'");
	$useryrmay2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2025%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryrmay3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2025%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryrmay4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2025 */
	/* 2026 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2026%'"); 
	$useryrjun = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2026%' AND userrank = 'STUDENT'");
	$useryrjun1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2026%' AND userrank = 'INSTRUCTOR'");
	$useryrjun2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2026%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryrjun3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2026%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryrjun4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2026 */
	/* 2027 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2027%'"); 
	$useryrjul = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2027%' AND userrank = 'STUDENT'");
	$useryrjul1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2027%' AND userrank = 'INSTRUCTOR'");
	$useryrjul2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2027%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryrjul3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2027%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryrjul4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2027 */
	/* 2028 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2028%'"); 
	$useryraug = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2028%' AND userrank = 'STUDENT'");
	$useryraug1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2028%' AND userrank = 'INSTRUCTOR'");
	$useryraug2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2028%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryraug3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2028%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryraug4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2028 */
	/* 2029 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2029%'"); 
	$useryrsep = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2029%' AND userrank = 'STUDENT'");
	$useryrsep1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2029%' AND userrank = 'INSTRUCTOR'");
	$useryrsep2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2029%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryrsep3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2029%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryrsep4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2029 */
	/* 2030 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2030%'"); 
	$useryroct = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2030%' AND userrank = 'STUDENT'");
	$useryroct1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2030%' AND userrank = 'INSTRUCTOR'");
	$useryroct2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2030%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryroct3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2030%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryroct4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2030 */
	/* 2031 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2031%'"); 
	$useryrnov = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2031%' AND userrank = 'STUDENT'");
	$useryrnov1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2031%' AND userrank = 'INSTRUCTOR'");
	$useryrnov2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2031%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryrnov3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2031%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryrnov4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2031 */
	/* 2032 */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2032%'"); 
	$useryrdec = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2032%' AND userrank = 'STUDENT'");
	$useryrdec1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2032%' AND userrank = 'INSTRUCTOR'");
	$useryrdec2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2032%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$useryrdec3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2032%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$useryrdec4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* 2032 */
?>