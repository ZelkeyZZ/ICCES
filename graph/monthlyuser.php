<?php
	/* January */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-01%'");
	$jan = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-01%' AND userrank = 'STUDENT'");
	$jan1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-01%' AND userrank = 'INSTRUCTOR'");
	$jan2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-01%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$jan3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-01%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$jan4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* January */
	/* Febuary */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-02%'"); 
	$feb = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-02%' AND userrank = 'STUDENT'");
	$feb1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-02%' AND userrank = 'INSTRUCTOR'");
	$feb2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-02%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$feb3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-02%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$feb4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* Febuary */
	/* March */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-03%'"); 
	$mar = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-03%' AND userrank = 'STUDENT'");
	$mar1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-03%' AND userrank = 'INSTRUCTOR'");
	$mar2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-03%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$mar3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-03%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$mar4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* March */
	/* April */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-04%'"); 
	$apr = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-04%' AND userrank = 'STUDENT'");
	$apr1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-04%' AND userrank = 'INSTRUCTOR'");
	$apr2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-04%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$apr3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-04%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$apr4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* April */
	/* May */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-05%'"); 
	$may = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-05%' AND userrank = 'STUDENT'");
	$may1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-05%' AND userrank = 'INSTRUCTOR'");
	$may2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-05%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$may3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-05%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$may4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* May */
	/* June */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-06%'"); 
	$jun = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-06%' AND userrank = 'STUDENT'");
	$jun1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-06%' AND userrank = 'INSTRUCTOR'");
	$jun2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-06%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$jun3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-06%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$jun4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* June */
	/* July */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-07%'"); 
	$jul = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-07%' AND userrank = 'STUDENT'");
	$jul1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-07%' AND userrank = 'INSTRUCTOR'");
	$jul2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-07%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$jul3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-07%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$jul4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* July */
	/* August */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-08%'"); 
	$aug = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-08%' AND userrank = 'STUDENT'");
	$aug1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-08%' AND userrank = 'INSTRUCTOR'");
	$aug2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-08%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$aug3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-08%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$aug4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* August */
	/* September */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-09%'"); 
	$sep = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-09%' AND userrank = 'STUDENT'");
	$sep1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-09%' AND userrank = 'INSTRUCTOR'");
	$sep2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-09%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$sep3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-09%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$sep4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* September */
	/* October */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-10%'"); 
	$oct = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-10%' AND userrank = 'STUDENT'");
	$oct1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-10%' AND userrank = 'INSTRUCTOR'");
	$oct2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-10%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$oct3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-10%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$oct4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* October */
	/* November */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-11%'"); 
	$nov = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-11%' AND userrank = 'STUDENT'");
	$nov1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-11%' AND userrank = 'INSTRUCTOR'");
	$nov2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-11%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$nov3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-11%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$nov4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* November */
	/* December */
	$stmt = $pdo->query("SELECT count(*) as total, datecreated FROM table_users WHERE datecreated LIKE '%2021-12%'"); 
	$dec = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(userrank) as students, datecreated FROM table_users WHERE datecreated LIKE '%2021-12%' AND userrank = 'STUDENT'");
	$dec1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(userrank) as instructors, datecreated FROM table_users WHERE datecreated LIKE '%2021-12%' AND userrank = 'INSTRUCTOR'");
	$dec2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$stmt3 = $pdo->query("SELECT count(userrank) as admins, datecreated FROM table_users WHERE datecreated LIKE '%2021-12%' AND userrank IN ('ADMIN','SUPERADMIN')");
	$dec3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$stmt4 = $pdo->query("SELECT count(userrank) as staffs, datecreated FROM table_users WHERE datecreated LIKE '%2021-12%' AND userrank IN ('SERVICES','CASHIER','SCHOOLADMIN','STUDENTAFFAIR','GUIDANCE','CLINIC','LIBRARIAN')");
	$dec4 = $stmt4->fetch(PDO::FETCH_ASSOC);
	/* December */
?>